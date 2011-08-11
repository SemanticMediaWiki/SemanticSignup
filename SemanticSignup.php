<?php

/**
 * Initialization file for the Semantic Signup extension.
 * 
 * Documentation:	 		http://www.mediawiki.org/wiki/Extension:SemanticSignup
 * Support					http://www.mediawiki.org/wiki/Extension_talk:SemanticSignup
 * Source code:			    http://svn.wikimedia.org/viewvc/mediawiki/trunk/extensions/SemanticSignup
 *
 * @file SemanticSignup.php
 * @ingroup SemanticSignup
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

/**
 * This documenation group collects source code files belonging to SemanticSignup.
 *
 * @defgroup SemanticSignup SemanticSignup
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

if ( version_compare( $wgVersion, '1.16', '<' ) ) {
	die( '<b>Error:</b> Semantic Signup requires MediaWiki 1.16 or above.' );
}

// Show a warning if Semantic MediaWiki is not loaded.
if ( ! defined( 'SMW_VERSION' ) ) {
	die( '<b>Error:</b> You need to have <a href="http://semantic-mediawiki.org/wiki/Semantic_MediaWiki">Semantic MediaWiki</a> installed in order to use Semantic Watchlist.' );
}

if ( version_compare( SMW_VERSION, '1.6 alpha', '<' ) ) {
	die( '<b>Error:</b> Semantic Signup requires Semantic MediaWiki 1.6 or above.' );
}

define( 'SemanticSignup_VERSION', '0.3 alpha' );

$wgExtensionCredits[defined( 'SEMANTIC_EXTENSION_TYPE' ) ? 'semantic' : 'specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'SemanticSignup',
	'version' => SemanticSignup_VERSION,
	'author' => array(
		'Serg Kutny',
		'[http://www.mediawiki.org/wiki/User:Jeroen_De_Dauw Jeroen De Dauw]',
	),
	'url' => 'http://www.mediawiki.org/wiki/Extension:Semantic_Watchlist',
	'descriptionmsg' => 'ses-desc'
);

$wgExtensionMessagesFiles['SemanticSignup'] = dirname( __FILE__ ) . '/SemanticSignup.i18n.php';
$wgExtensionAliasesFiles['SemanticSignup'] = dirname( __FILE__ ) . '/SemanticSignup.i18n.aliases.php';

$wgAutoloadClasses['SemanticSignupHooks'] = dirname( __FILE__ ) . '/SemanticSignup.hooks.php';
$wgAutoloadClasses['SemanticSignup'] = dirname( __FILE__ ) . '/includes/SES_Special.php';
$wgAutoloadClasses['SES_UserAccountDataChecker'] = dirname( __FILE__ ) . '/includes/SES_Special.php'; 
$wgAutoloadClasses['SES_DataChecker'] = dirname( __FILE__ ) . '/includes/SES_Utils.php';
$wgAutoloadClasses['SES_SignupFields'] = dirname( __FILE__ ) . '/includes/SES_SignupFields.php';
$wgAutoloadClasses['CreateUserFieldsTemplate'] = dirname( __FILE__ ) . '/includes/SES_SignupFields.php';

$wgSpecialPages['SemanticSignup'] = 'SemanticSignup';

$wgHooks['UserCreateForm'][] = 'SemanticSignupHooks::onUserCreateForm';
$wgHooks['ParserFirstCallInit'][] = 'SemanticSignupHooks::onParserFirstCallInit';

require_once 'SemanticSignup.settings.php';
