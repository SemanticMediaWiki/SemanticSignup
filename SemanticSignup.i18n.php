<?php

/**
 * /**
 * Internationalization file for the SemanticSignup extension.
 * Created on 7 Jan 2008
 *
 * @file SemanticSignup.i18n.php
 * @ingroup SemanticSignup
 *
 * @author Serhii Kutnii
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

$messages = array();
 
$messages['en'] = array(
	'semanticsignup' => 'Semantic Signup',
	'ses-desc' => 'A MediaWiki extension built on top of Semantic Forms allowing to populate a user page with semantic data at signup time',
	'nousername' => 'Username has not been specified',
	'nopwdmatch' => 'Password and password confirmation don\'t match',
	'norealname' => 'Real name is required but has not been specified',
	'userexists' => 'User already exists',
	'invaliduname' => 'Username specified is not allowed',
	'emailfailed' => 'Confirmation email sending failed',
	'createforbidden' => 'Current user is not allowed to create accounts',
	'throttlehit' => 'New user accounts number maximum per day has been exceeded for this IP',
	'ses_userexists' => 'User already exists'
);

$magicWords = array();

/** English (English) */
$magicWords['en'] = array(
	'signupfields' => array( 0, 'signupfields' ),
);
