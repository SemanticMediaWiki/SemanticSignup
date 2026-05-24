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

class SemanticSignup {

	public static function initExtension( $credits = [] ) {
		// See https://phabricator.wikimedia.org/T151136
		define( 'SES_VERSION', isset( $credits['version'] ) ? $credits['version'] : 'UNKNOWN' );
	}

	public static function onExtensionFunction() {
		if ( !defined( 'SMW_VERSION' ) ) {

			if ( PHP_SAPI === 'cli' || PHP_SAPI === 'phpdbg' ) {
				die( "\nThe 'Semantic Signup' extension requires 'Semantic MediaWiki' to be installed and enabled.\n" );
			} else {
				die(
					'<b>Error:</b> The <a href="https://github.com/SemanticMediaWiki/SemanticSignup/">Semantic Signup</a> ' .
					'extension requires <a href="https://www.semantic-mediawiki.org/wiki/Semantic_MediaWiki">Semantic MediaWiki</a> to be ' .
					'installed and enabled.<br />'
				);
			}
		}

		$hookRegistry = new HookRegistry();
		$hookRegistry->register( $GLOBALS['wgHooks'] );
	}
}
