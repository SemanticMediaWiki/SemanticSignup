<?php

namespace SES;

use User;
use Sanitizer;
use Exception;

/**
 * @license GNU GPL v3+
 * @since 1.0
 *
 * @author Serhii Kutnii
 */
class UserAccountDataChecker extends DataChecker {

	public $mUsername = '';
	public $mPassword = '';
	public $mEmail = '';
	public $mRealname = '';
	public $mDomain = '';
	public $mLanguage = '';
	public $mRemember = false;
	public $mUser = null;

	public function __construct() {
		$this->addCheck( array( &$this, 'checkDomainValidity' ), array() );
		$this->addCheck( array( &$this, 'checkDomainUser' ), array() );
		$this->addCheck( array( &$this, 'checkCreatePermissions' ), array() );
		$this->addCheck( array( &$this, 'checkSorbs' ), array() );
		$this->addCheck( array( &$this, 'checkUserExists' ), array() );
		$this->addCheck( array( &$this, 'checkPasswordLength' ), array() );
		$this->addCheck( array( &$this, 'checkEmailValidity' ), array() );
	}

	// Checks

	public function checkDomainValidity() {
		global $wgAuth;

		if ( !$wgAuth->validDomain( $this->mDomain ) )
			$this->error( wfMessage( 'wrongpassword' )->text() );
	}

	public function checkDomainUser() {
		global $wgAuth;

		if ( ( 'local' != $this->mDomain ) && ( '' != $this->mDomain )
			&& !$wgAuth->canCreateAccounts() && ( !$wgAuth->userExists( $this->mName ) || !$wgAuth->authenticate( $this->mName, $this->mPassword ) ) )
				$this->error( wfMessage( 'wrongpassword' )->text() );
	}

	public function checkCreatePermissions() {
		global $wgUser;

		if ( !$wgUser->isAllowed( 'createaccount' ) || $wgUser->isBlockedFromCreateAccount() )
			$this->error( wfMessage( 'ses-createforbidden' )->text() );
	}

	public function checkSorbs() {
		global $wgProxyWhitelist;
		global $wgEnableSorbs, $wgRequest;
		$ip = $wgRequest->getIP();
		if ( $wgEnableSorbs && !in_array( $ip, $wgProxyWhitelist ) &&
		  $wgUser->inSorbsBlacklist( $ip ) )
		 	$this->error( wfMessage( 'sorbs_create_account_reason' )->text() );
	}

	public function checkUserExists() {
		if ( $this->mUser->idForName() )
			$this->error( wfMessage( 'ses-userexists' )->text() );
	}

	public function checkPasswordLength() {
		if ( !$this->mUser->isValidPassword( $this->mPassword ) )
		{
			global $wgMinimalPasswordLength;
			$this->error( wfMessage( 'passwordtooshort' )->numParams( $wgMinimalPasswordLength )->text() );
		}
	}

	public function checkEmailValidity() {
		global $wgEnableEmail;
		if ( $wgEnableEmail && $this->mEmail !== '' && !Sanitizer::validateEmail( $this->mEmail ) ) {
			$this->error( wfMessage( 'invalidemailaddress' )->text() );
		}
	}

	protected function populateData() {
		$this->mUsername = $this->getUserDataValue( 'wpName', 'nousername' );
		$name = trim( $this->mUsername );
		$this->mUser = User::newFromName( $name, 'creatable' );
		if ( !$this->mUser ) {
			$this->error( wfMessage( 'ses-noname' )->text() );
		}

		global $sesRealNameRequired;
		$this->mRealname = $this->getUserDataValue( 'wpRealName', $sesRealNameRequired ? 'norealname' : null );

		$this->mPassword = $this->getUserDataValue( 'wpPassword' );
		$retype = $this->getUserDataValue( 'wpRetype' );
		if ( strcmp( $this->mPassword, $retype ) )
			$this->error( wfMessage( 'ses-nopwdmatch' )->text() );

		$this->mDomain = $this->getUserDataValue( 'wpDomain' );

		global $wgEmailConfirmToEdit;
		$this->mEmail = $this->getUserDataValue( 'wpEmail', $wgEmailConfirmToEdit ? 'noemailtitle' : null );

		$this->mLanguage = $this->getUserDataValue( 'uselang' );

		global $wgRequest;
		$this->mRemember = $wgRequest->getCheck( 'wpRemember' );
	}

}
