<?php

namespace SES;

use SemanticSignupSettings as Settings;

use Parser;
use Title;
use SpecialPage;

/**
 * @license GNU GPL v3+
 * @since 1.0
 *
 * @author mwjames
 */
class HookRegistry {

	/**
	 * @since  1.0
	 *
	 * @param array &$wgHooks
	 *
	 * @return boolean
	 */
	public function register( &$wgHooks ) {

		/**
		 * @see https://www.mediawiki.org/wiki/Manual:Hooks/UserCreateForm
		 */
		$wgHooks['UserCreateForm'][] = function ( &$template ) {

			//FIXME
			global $wgOut;

			$redirectFormFinder = new RedirectFormFinder();

			return $redirectFormFinder->redirectToUrl( $wgOut );
		};

		/**
		 * @see https://www.mediawiki.org/wiki/Manual:Hooks/ParserFirstCallInit
		 */
		$wgHooks['ParserFirstCallInit'][] = function ( $parser ) {

			$signupfieldsParserDefinition = function( $parser ) {

				$signupFields = new SignupFields(
					new UserFieldsCreateTemplate()
				);

				return $signupFields->parser( func_get_args() );
			};

			$parser->setFunctionHook( 'signupfields', $signupfieldsParserDefinition );

			return false;
		};
	}

}
