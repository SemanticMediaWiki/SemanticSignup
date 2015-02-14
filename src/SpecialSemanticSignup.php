<?php

namespace SES;

use SpecialPage;
use Exception;
use SiteStatsUpdate;
use Sanitizer;
use Title;
use Article;
use User;

/**
 * Special page to replace SpecialUserLogin/signup with an equivalent
 * SemanticForms form page and allow for additional (structured) data
 * to be collected on signup and used on the new user's userpage.
 *
 * @license GNU GPL v3+
 * @since 1.0
 *
 * @author Serhii Kutnii
 * @author Jeroen De Dauw <jeroendedauw@gmail.com>
 */
class SpecialSemanticSignup extends SpecialPage {

	private $mUserDataChecker = null;
	private $mUserPageUrl = '';

	/**
	 * @var FormHandler
	 */
	private $formHandler;

	public function __construct() {
		parent::__construct( 'SemanticSignup' );
		$this->mIncludable = false;

		$signupFactory = new SignupFactory();

		$this->mUserDataChecker = $signupFactory->newUserAccountDataChecker();
		$this->formHandler = $signupFactory->newFormPrinterHandler();
	}

	private function userSignup() {

        //Hook for dynamic signup control
        wfRunHooks('SemanticSignupUserSignup');

		// Get user input and check the environment
		$this->mUserDataChecker->run();

		// Throw if data getting or environment checks have failed which indicates that account creation is impossible
		$checker_error = $this->mUserDataChecker->getError();
		if ( $checker_error ) {
			throw new Exception( $checker_error );
		}

		$user = $this->mUserDataChecker->mUser;

		$user->setEmail( $this->mUserDataChecker->mEmail );
		$user->setRealName( $this->mUserDataChecker->mRealname );

		$abortError = '';
		if ( !wfRunHooks( 'AbortNewAccount', array( $user, &$abortError ) ) )  {
			// Hook point to add extra creation throttles and blocks
			wfDebug( "LoginForm::addNewAccountInternal: a hook blocked creation\n" );
			throw new Exception( $abortError );
		}

		global $wgAccountCreationThrottle;
		global $wgUser, $wgRequest;

		if ( $wgAccountCreationThrottle && $wgUser->isPingLimitable() )  {
			$key = wfMemcKey( 'acctcreate', 'ip', $wgRequest->getIP() );
			$value = $wgMemc->incr( $key );

			if ( !$value ) {
				$wgMemc->set( $key, 1, 86400 );
			}

			if ( $value > $wgAccountCreationThrottle ) {
				throw new Exception( wfMessage( 'ses-throttlehit' )->text() );
			}
		}

		global $wgAuth;

		$addedUser = $wgAuth->addUser(
			$user,
			$this->mUserDataChecker->mPassword,
			$this->mUserDataChecker->mEmail,
			$this->mUserDataChecker->mRealname
		);

		if ( !$addedUser ) {
			throw new Exception( 'externaldberror' );
		}


		$user->addToDatabase();

		if ( $wgAuth->allowPasswordChange() )  {
			$user->setPassword( $this->mUserDataChecker->mPassword );
		}

		$user->setToken();

		$wgAuth->initUser( $user, false );

		$user->setOption( 'rememberpassword', $this->mUserDataChecker->mRemember ? 1 : 0 );
		$user->saveSettings();

		# Update user count
		$ssUpdate = new SiteStatsUpdate( 0, 0, 0, 0, 1 );
		$ssUpdate->doUpdate();

		global $wgLoginLanguageSelector;
		$language = $this->mUserDataChecker->mLanguage;

		if ( $wgLoginLanguageSelector && $language ) {
			$user->setOption( 'language', $language );
		}

		global $wgEmailAuthentication;

		if ( $wgEmailAuthentication && Sanitizer::validateEmail( $user->getEmail() ) ) {
			$status = $user->sendConfirmationMail();

			if ( !$status->isGood() ) {
				throw new Exception( wfMessage( 'ses-emailfailed' )->text() . "\n" . $status->getMessage() );
			}
		}

		$user->saveSettings();
		wfRunHooks( 'AddNewAccount', array( $user ) );
	}

	private function userLogin() {
		$user = $this->mUserDataChecker->mUser;
		$user->saveSettings();
		$user->invalidateCache();
		$user->setCookies();
	}

	private function createUserPage() {

		$page_title = Title::newFromText( $this->mUserDataChecker->mUser->getName(), NS_USER );
		$this->mUserPageUrl = htmlspecialchars( $page_title->getFullURL() );

		// FIXME
		if ( !$this->formHandler->canUseForm() ) {
			# code...
		}

		$this->formHandler->setSubmitState( true );
		$data_text = $this->formHandler->getTemplateText();

		$user_page = new Article( $page_title );

		global $wgUser;
		$wgUser = $this->mUserDataChecker->mUser;
		// TODO: doEdit removed; use internal API call
		$user_page->doEdit( $data_text, '', EDIT_FORCE_BOT );
	}

	private function printForm() {
		global $wgUser, $wgOut;

		/*
		 * SemanticForms disable the form automatically if current user hasn't got edit rights
		 * so we have to use a bot account for the form request. Current user is being saved in
		 * the $old_user variable to be restored afterwards
		 */
		$old_user = null;

		if ( $wgUser->isAnon() ) {
			$old_user = $wgUser;
			$wgUser = User::newFromName( Settings::get( 'botName' ) );
		}

		if ( !$wgUser instanceOf User || !$wgUser->isAllowedToCreateAccount() || $wgUser->idForName() == 0 ) {
			$wgOut->addHTML( '<div class="error errorbox">' . wfMessage( 'ses-nobotname' )->text() . '</div>' );
			return true;
		}

		if ( !$this->formHandler->canUseForm() ) {
			$wgOut->addHTML( '<div class="error errorbox">' . wfMessage( 'ses-noformname' )->text() . '</div>' );
			return true;
		}

		$this->formHandler->setSubmitState( false );
		$form_text = $this->formHandler->getFormText();

        /* Run hook allow externals to modify output of form */
       // wfRunHooks('SemanticSignupPrintForm', array( &$form_text, &$javascript_text, &$data_text, &$form_page_title, &$generated_page_name ) );

		$text = <<<END
				<form name="createbox" id="sfForm" onsubmit="return validate_all()" action="" method="post" class="createbox">
END;
		$text .= $form_text . '</form>';

		$wgOut->addMeta( 'robots', 'noindex,nofollow' );
		$wgOut->addHTML( $text );

		// Restore the current user.
		if ( $old_user ) {
			$wgUser = $old_user;
		}
	}

	private function executeOnSubmit() {
		global $wgOut;

		try {
			$this->userSignup();
			$this->createUserPage();
			$this->userLogin();
			$wgOut->redirect( $this->mUserPageUrl );
		}
		catch ( Exception $e ) {
			$wgOut->addHTML( '<div class="error">' . $e->getMessage() . '</div>' );
			$this->printForm();
		}

		return true;
	}

	public function execute( $par ) {
		global $wgRequest, $wgOut;

		$this->setHeaders();

        //Hook for dynamic control page access
        if(!wfRunHooks('SemanticSignupUserSignupSpecial')) return true;

		if ( $wgRequest->getCheck( 'wpSave' ) ) {
			return $this->executeOnSubmit();
		} else {
			$this->printForm();
			return true;
		}
	}

}
