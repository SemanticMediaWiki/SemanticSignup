<?php
/*
 * Created on 6 Jan 2009 by Serhii Kutnii
 */

$local_dir = dirname(__FILE__).'/';

//Including all the SemanticSignup classes
require_once($local_dir.'SES_Utils.php');
require_once($local_dir.'SES_SignupFields.php');
require_once($local_dir.'SES_Special.php');
require_once($local_dir.'SES_CreateUserHook.php');

$wgAutoloadClasses['SemanticSignup'] = 
$wgAutoloadClasses['SES_UserAccountDataChecker'] = $local_dir.'SES_Special.php';

$wgAutoloadClasses['SES_DataChecker'] = $local_dir.'SES_Utils.php';

$wgAutoloadClasses['SES_SignupFields'] = 
$wgAutoloadClasses['CreateUserFieldsTemplate'] = $local_dir.'SES_SignupFields.php';

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'SemanticSignup',
	'author' => 'Serg Kutny',
	'url' => '',
	'description' => 'A MediaWiki extension built on top of Semantic Forms allowing to populate a user page with semantic data at signup time ',
	'descriptionmsg' => 'ses-desc',
	'version' => '0.0.0',
);

$wgExtensionMessagesFiles['SemanticSignup'] = $local_dir.'SES_Messages.php';
$wgExtensionAliasesFiles['SemanticSignup'] = $local_dir.'SES_Aliases.php';
$wgSpecialPages['SemanticSignup'] = 'SemanticSignup';

/*
 * I need real name to be required on user signup for my purposes 
 * so I make this feature configurable
 */
$sesRealNameRequired = false;
$sesSignupFormName = '';
$sesSignupBotName = '';




