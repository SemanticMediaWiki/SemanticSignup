<?php

/**
 * Created on 7 Jan 2008 by Serhii Kutnii
 */
class SES_UserAccountDataChecker extends SES_DataChecker {
	
	public $mUsername = '';
	public $mPassword = '';
	public $mEmail = '';
	public $mRealname = '';
	public $mDomain = '';
	public $mLanguage = '';
	public $mRemember = false;
	public $mUser = null;
	
	protected function populateData() {
		$this->mUsername = $this->getUserDataValue( 'wpName', 'nousername' );
		$name = trim( $this->mUsername );
		$this->mUser = User::newFromName( $name, 'creatable' );
		if ( !$this->mUser ) {
			$this->error( wfMsg( 'noname' ) );
		}
					
		global $sesRealNameRequired;
		$this->mRealname = $this->getUserDataValue('wpRealName', $sesRealNameRequired ? 'norealname' : null);
		
		$this->mPassword = $this->getUserDataValue('wpPassword');
		$retype = $this->getUserDataValue('wpRetype');
		if (strcmp($this->mPassword, $retype))
			$this->error(wfMsg('nopwdmatch'));
			
		$this->mDomain = $this->getUserDataValue('wpDomain');
		
		global $wgEmailConfirmToEdit;
		$this->mEmail = $this->getUserDataValue('wpEmail', $wgEmailConfirmToEdit ? 'noemailtitle' : null );
		
		$this->mLanguage = $this->getUserDataValue('uselang');
		
		global $wgRequest;
		$this->mRemember = $wgRequest->getCheck('wpRemember');
	}
	
	//Checks
	
	public function checkDomainValidity()
	{
		global $wgAuth;
		
		if( !$wgAuth->validDomain( $this->mDomain ) )
			$this->error(wfMsg('wrongpassword'));
	}
	
	public function checkDomainUser()
	{
		global $wgAuth;

		if( ('local' != $this->mDomain) && ('' != $this->mDomain)
			&& !$wgAuth->canCreateAccounts() && ( !$wgAuth->userExists($this->mName) || !$wgAuth->authenticate($this->mName, $this->mPassword) ) )
				$this->error(wfMsg('wrongpassword'));
	}
	
	public function checkCreatePermissions()
	{
		global $wgUser;
		 
		if (!$wgUser->isAllowed( 'createaccount' ) || $wgUser->isBlockedFromCreateAccount() )
			$this->error(wfMsg('createforbidden'));
	}
	
	public function checkSorbs()
	{
		global $wgProxyWhitelist;
		global $wgEnableSorbs;
		$ip = wfGetIP();
		if ( $wgEnableSorbs && !in_array( $ip, $wgProxyWhitelist ) &&
		  $wgUser->inSorbsBlacklist( $ip ) )
		 	$this->error(wfMsg('sorbs_create_account_reason'));
	}
	
	public function checkUserExists()
	{
		if ($this->mUser->idForName())
			$this->error(wfMsg('userexists'));
	}
	
	public function checkPasswordLength()
	{
		if (!$this->mUser->isValidPassword($this->mPassword))
		{
			global $wgMinimalPasswordLength;
			$this->error(wfMsgExt('passwordtooshort', array( 'parsemag' ), $wgMinimalPasswordLength));
		}
	}
	
	public function checkEmailValidity()
	{
		global $wgEnableEmail;
		if ($wgEnableEmail && !User::isValidEmailAddr($this->mEmail))
			$this->error(wfMsg('invalidemailaddress'));
	}
	
	public function __construct()
	{
		$this->addCheck(array(&$this, 'checkDomainValidity'), array());
		$this->addCheck(array(&$this, 'checkDomainUser'), array());
		$this->addCheck(array(&$this, 'checkCreatePermissions'), array());
		$this->addCheck(array(&$this, 'checkSorbs'), array());
		$this->addCheck(array(&$this, 'checkUserExists'), array());
		$this->addCheck(array(&$this, 'checkPasswordLength'), array());
		$this->addCheck(array(&$this, 'checkEmailValidity'), array());
	}
 }

 class SemanticSignup extends SpecialPage
 {
	private $mUserDataChecker = null;
	private $mUserPageUrl = '';
	
	public function __construct()
	{
		parent::__construct('SemanticSignup');
		$this->mIncludable = false;

		$this->mUserDataChecker = new SES_UserAccountDataChecker();
	}
	
	private function userSignup()
	{
		//Get user input and check the environment
		$this->mUserDataChecker->run();
		
		//Throw if data getting or environment checks have failed which indicates that account creation is impossible
		$checker_error = $this->mUserDataChecker->getError();
		if ($checker_error)
			throw new Exception($checker_error);
			
		$user = $this->mUserDataChecker->mUser; 
		
		$user->setEmail( $this->mUserDataChecker->mEmail );
		$user->setRealName( $this->mUserDataChecker->mRealname );
		
		$abortError = '';
		if( !wfRunHooks( 'AbortNewAccount', array( $user, &$abortError ) ) ) 
		{
			// Hook point to add extra creation throttles and blocks
			wfDebug( "LoginForm::addNewAccountInternal: a hook blocked creation\n" );
			throw new Exception( $abortError );
		}

		global $wgAccountCreationThrottle;
		global $wgUser;		
		if ( $wgAccountCreationThrottle && $wgUser->isPingLimitable() ) 
		{
			$key = wfMemcKey( 'acctcreate', 'ip', wfGetIP() );
			$value = $wgMemc->incr( $key );
			
			if ( !$value ) {
				$wgMemc->set( $key, 1, 86400 );
			}
			
			if ( $value > $wgAccountCreationThrottle ) 
				throw new Exception(wfMsg('throttlehit'));
		}
		
		global $wgAuth;
		
		if( !$wgAuth->addUser( $user, $this->mUserDataChecker->mPassword, 
			$this->mUserDataChecker->mEmail, $this->mUserDataChecker->mRealname ) ) 
				throw new Exception('externaldberror');		
				
		$user->addToDatabase();
		
		if ( $wgAuth->allowPasswordChange() ) 
		{
			$user->setPassword($this->mUserDataChecker->mPassword);
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
		if( $wgLoginLanguageSelector && $language )
			$user->setOption( 'language', $language );
		
		global $wgEmailAuthentication;
		if( $wgEmailAuthentication && User::isValidEmailAddr( $user->getEmail() ) ){
			$err = $user->sendConfirmationMail();
			if (WikiError::isError($err))
				throw new Exception(wfMsg('emailfailed'));
		}
		
		$user->saveSettings();
		wfRunHooks('AddNewAccount', array($user));
	}
	
	private function createUserPage() {
		$form_title = Title::newFromText( SemanticSignupSettings::get( 'formName' ), SF_NS_FORM );
		$form = new Article($form_title);
		$form_definition = $form->getContent();
		
		$page_title = Title::newFromText($this->mUserDataChecker->mUser->getName(), NS_USER);
		$this->mUserPageUrl = $page_title->escapeFullUrl();

		global $sfgFormPrinter;
		list ($form_text, $javascript_text, $data_text, $form_page_title, $generated_page_name) =
			$sfgFormPrinter->formHTML($form_definition, true, false);

		$user_page = new Article($page_title);
		
		global $wgUser;
		$wgUser = $this->mUserDataChecker->mUser;
		$user_page->doEdit( $data_text, '', EDIT_FORCE_BOT );
	}

	private function printForm() {
		global $sesSignupBotName;
		global $wgUser;

		/*
		 * SemanticForms disable the form automatically if current user hasn't got edit rights 
		 * so we have to use a bot account for the form request. Current user is being saved in 
		 * the $old_user variable to be restored afterwards
		 */
		$old_user = null;
		if ($wgUser->isAnon())	
		{	
			$old_user = $wgUser;
			$wgUser = User::newFromName($sesSignupBotName);
		}
		
		$form_title = Title::newFromText( SemanticSignupSettings::get( 'formName' ), SF_NS_FORM );
		$form = new Article($form_title);
		$form_definition = $form->getContent();
		
		global $sfgFormPrinter;
		list ($form_text, $javascript_text, $data_text, $form_page_title, $generated_page_name) =
			$sfgFormPrinter->formHTML($form_definition, false, false);
			
		$text =<<<END
				<form name="createbox" onsubmit="return validate_all()" action="" method="post" class="createbox">
END;
		$text .= $form_text.'</form>';
		
		global $sfgScriptPath, $sfgYUIBase, $wgOut;
		$mainCssUrl = $sfgScriptPath . '/skins/SF_main.css';
		$wgOut->addLink( array(
			'rel' => 'stylesheet',
			'type' => 'text/css',
			'media' => "screen, projection",
			'href' => $mainCssUrl
		));
		$wgOut->addLink( array(
			'rel' => 'stylesheet',
			'type' => 'text/css',
			'media' => "screen, projection",
			'href' => $sfgYUIBase . "autocomplete/assets/skins/sam/autocomplete.css"
		));
		$wgOut->addLink( array(
			'rel' => 'stylesheet',
			'type' => 'text/css',
			'media' => "screen, projection",
			'href' => $sfgScriptPath . '/skins/SF_yui_autocompletion.css'
		));
		$wgOut->addLink( array(
			'rel' => 'stylesheet',
			'type' => 'text/css',
			'media' => "screen, projection",
			'href' => $sfgScriptPath . '/skins/floatbox.css'
		));
		$wgOut->addScript('<script type="text/javascript" src="' . $sfgYUIBase . 'yahoo/yahoo-min.js"></script>' . "\n");
		$wgOut->addScript('<script type="text/javascript" src="' . $sfgYUIBase . 'dom/dom-min.js"></script>' . "\n");
		$wgOut->addScript('<script type="text/javascript" src="' . $sfgYUIBase . 'event/event-min.js"></script>' . "\n");
		$wgOut->addScript('<script type="text/javascript" src="' . $sfgYUIBase . 'get/get-min.js"></script>' . "\n");
		$wgOut->addScript('<script type="text/javascript" src="' . $sfgYUIBase . 'connection/connection-min.js"></script>' . "\n");
		$wgOut->addScript('<script type="text/javascript" src="' . $sfgYUIBase . 'json/json-min.js"></script>' . "\n");
		$wgOut->addScript('<script type="text/javascript" src="' . $sfgYUIBase . 'datasource/datasource-min.js"></script>' . "\n");
		$wgOut->addScript('<script type="text/javascript" src="' . $sfgYUIBase . 'autocomplete/autocomplete-min.js"></script>' . "\n");
		$wgOut->addScript('<script type="text/javascript" src="' . $sfgScriptPath . '/libs/SF_yui_autocompletion.js"></script>' . "\n");
		$wgOut->addScript('<script type="text/javascript" src="' . $sfgScriptPath . '/libs/floatbox.js"></script>' . "\n");
	
	    global $wgFCKEditorDir;
	    if ($wgFCKEditorDir)
	        $wgOut->addScript('<script type="text/javascript" src="' . "$wgScriptPath/$wgFCKEditorDir" . '/fckeditor.js"></script>' . "\n");
		if (! empty($javascript_text))
			$wgOut->addScript('		<script type="text/javascript">' . "\n" . $javascript_text . '</script>' . "\n");
		$wgOut->addMeta('robots','noindex,nofollow');
		$wgOut->addHTML($text);
		
		//Restoring the current user
		if ($old_user)
			$wgUser = $old_user;
	}
	
	private function executeOnSubmit() {
		global $wgOut;
		
		try {
			$this->userSignup();
			$this->createUserPage();
			
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
		
		if ( $wgRequest->getCheck( 'wpSave' ) ) {
			return $this->executeOnSubmit();
		} else {
			$this->printForm();
			return true;
		} 
	}
}
 