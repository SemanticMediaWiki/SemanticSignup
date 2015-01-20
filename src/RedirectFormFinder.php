<?php

namespace SES;

use OutputPage;
use Title;
use SpecialPage;

/**
 * @license GNU GPL v3+
 * @since 1.0
 *
 * @author mwjames
 */
class RedirectFormFinder {

	/**
	 * @since 1.0
	 *
	 * @param OutputPage $output
	 *
	 * @return boolean
	 */
	public function redirectToUrl( $output ) {

		if ( !$this->hasForm() ) {
			return true;
		}

		$url = htmlspecialchars( SpecialPage::getTitleFor( 'SemanticSignup' )->getFullURL() );

		wfRunHooks( 'SemanticSignupBeforeRedirect', array( &$url ) );

		$output->redirect( $url );

		return false;
	}

	/**
	 * @since 1.0
	 *
	 * @return boolean
	 */
	public function hasForm() {
		return Title::newFromText( Settings::get( 'formName' ), SF_NS_FORM ) !== null;
	}

}
