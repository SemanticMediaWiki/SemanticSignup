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
 */
if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is part of the SemanticSignup extension, it is not a valid entry point.' );
}

if ( version_compare( $GLOBALS[ 'wgVersion' ], '1.19', 'lt' ) ) {
	die( '<b>Error:</b> This version of <a href="https://github.com/SemanticMediaWiki/SemanticSignup/">SemanticSignup</a> is only compatible with MediaWiki 1.19 or above. You need to upgrade MediaWiki first.' );
}

if ( !defined( 'SF_VERSION' ) || version_compare( SF_VERSION, '2.8', 'lt' ) ) {
   die( '<b>Error:</b> This version of <a href="https://github.com/SemanticMediaWiki/SemanticSignup/">SemanticSignup</a> is only compatible with Semantic Forms 2.8 or above. You need to upgrade <a href="https://www.mediawiki.org/wiki/Extension:Semantic_Forms">Semantic Forms</a> first.' );
}

if ( defined( 'SES_VERSION' ) ) {
	// Do not initialize more than once.
	return 1;
}

define( 'SES_VERSION', '1.1-alpha' );

/**
 * @codeCoverageIgnore
 */
call_user_func( function () {

	// Register extension info
	$GLOBALS['wgExtensionCredits']['semantic'][] = array(
		'path' => __DIR__,
		'name' => 'Semantic Signup',
		'version' => SES_VERSION,
		'author' => array(
			'Serg Kutny',
			'[https://www.mediawiki.org/wiki/User:Jeroen_De_Dauw Jeroen De Dauw]',
			'...'
		),
		'url' => 'https://www.mediawiki.org/wiki/Extension:SemanticSignup',
		'descriptionmsg' => 'ses-desc',
		'license-name' => 'GPL-3.0-or-later'
	);

	$GLOBALS['wgMessagesDirs']['semantic-signup'] = __DIR__ . '/i18n';

	$GLOBALS['wgExtensionMessagesFiles']['semantic-signup'] = __DIR__ . '/i18n/SemanticSignup.i18n.php';
	$GLOBALS['wgExtensionMessagesFiles']['semantic-signup-magic'] = __DIR__ . '/i18n/SemanticSignup.i18n.magic.php';
	$GLOBALS['wgExtensionMessagesFiles']['semantic-signup-alias'] = __DIR__ . '/i18n/SemanticSignup.i18n.aliases.php';

	$GLOBALS['wgSpecialPages']['SemanticSignup'] = '\SES\SpecialSemanticSignup';

	$GLOBALS['egSemanticSignupSettings'] = array();

	// Finalize extension setup
	$GLOBALS['wgExtensionFunctions'][] = function() {

		$hookRegistry = new HookRegistry();
		$hookRegistry->register( $GLOBALS['wgHooks'] );
	};

} );
