<?php

use SES\HookRegistry;

/**
 * @see https://github.com/SemanticMediaWiki/SemanticSignup/
 * @link https://www.mediawiki.org/wiki/Extension:SemanticSignup
 *
 * @license GNU GPL v3+
 * @author Jeroen De Dauw <jeroendedauw@gmail.com>
 *
 * @defgroup SES SemanticSignup
 * @codeCoverageIgnore
 */
call_user_func( function () {

	if ( !defined( 'MEDIAWIKI' ) ) {
		die( 'This file is part of the SemanticSignup extension, it is not a valid entry point.' );
	}

	if ( version_compare( $GLOBALS[ 'wgVersion' ], '1.19', 'lt' ) ) {
		die( '<b>Error:</b> This version of <a href="https://github.com/SemanticMediaWiki/SemanticSignup/">SemanticSignup</a> is only compatible with MediaWiki 1.19 or above. You need to upgrade MediaWiki first.' );
	}

	define( 'SES_VERSION', '1.0-alpha' );

	// Register extension info
	$GLOBALS[ 'wgExtensionCredits' ][ 'semantic' ][ ] = array(
		'path' => __FILE__,
		'name' => 'Semantic Signup',
		'version' => SES_VERSION,
		'author' => array(
			'Serg Kutny',
			'[https://www.mediawiki.org/wiki/User:Jeroen_De_Dauw Jeroen De Dauw]',
			'[https://www.mediawiki.org/wiki/User:Nischayn22 Nischay Nahata]',
		),
		'url' => 'https://www.mediawiki.org/wiki/Extension:SemanticSignup',
		'descriptionmsg' => 'ses-desc'
	);

	$GLOBALS['wgMessagesDirs']['semanticsignup'] = __DIR__ . '/i18n';
	$GLOBALS['wgExtensionMessagesFiles']['semanticsignup'] = __DIR__ . '/SemanticSignup.i18n.php';
	$GLOBALS['wgExtensionMessagesFiles']['semanticsignup-magic'] = __DIR__ . '/SemanticSignup.i18n.magic.php';
	$GLOBALS['wgExtensionMessagesFiles']['semanticsignup-alias'] = __DIR__ . '/SemanticSignup.i18n.aliases.php';

	$GLOBALS['wgAutoloadClasses']['SemanticSignupSettings'] = __DIR__ . '/SemanticSignup.settings.php';
	$GLOBALS['wgAutoloadClasses']['SpecialSemanticSignup'] = __DIR__ . '/includes/SpecialSemanticSignup.php';
	$GLOBALS['wgAutoloadClasses']['SES_DataChecker'] = __DIR__ . '/includes/SES_DataChecker.php';
	$GLOBALS['wgAutoloadClasses']['SES_UserAccountDataChecker'] = __DIR__ . '/includes/SES_UserAccountDataChecker.php';

	$GLOBALS['wgSpecialPages']['SemanticSignup'] = 'SpecialSemanticSignup';

	$GLOBALS['egSemanticSignupSettings'] = array();

	$GLOBALS['wgAutoloadClasses']['SES\HookRegistry'] = __DIR__ . '/src/HookRegistry.php';
	$GLOBALS['wgAutoloadClasses']['SES\SignupFields'] = __DIR__ . '/src/SignupFields.php';
	$GLOBALS['wgAutoloadClasses']['SES\UserFieldsCreateTemplate'] = __DIR__ . '/src/UserFieldsCreateTemplate.php';
	$GLOBALS['wgAutoloadClasses']['SES\RedirectFormFinder'] = __DIR__ . '/src/RedirectFormFinder.php';

	// Finalize extension setup
	$GLOBALS['wgExtensionFunctions'][] = function() {

		$hookRegistry = new HookRegistry();
		$hookRegistry->register( $GLOBALS['wgHooks'] );
	};

} );
