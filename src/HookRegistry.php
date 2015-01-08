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
		$wgHooks['UserCreateForm'][] = function ( $template ) {

			if ( Title::newFromText( Settings::get( 'formName' ), SF_NS_FORM ) === null ) {
				return true;
			}

			$url = htmlspecialchars( SpecialPage::getTitleFor( 'SemanticSignup' )->getFullURL() );

			wfRunHooks( 'SemanticSignupBeforeRedirect', array( &$url ) );

			global $wgOut;
			$wgOut->redirect( $url );

			return false;
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
