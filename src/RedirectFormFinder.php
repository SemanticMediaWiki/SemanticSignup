<?php

namespace SES;

use OutputPage;
use SpecialPage;

/**
 * @license GNU GPL v3+
 * @since 1.0
 *
 * @author mwjames
 */
class RedirectFormFinder {

	/**
	 * @var FormPrinterHandler
	 */
	private $formPrinterHandler;

	/**
	 * @since 1.1
	 *
	 * @param FormPrinterHandler $formPrinterHandler
	 */
	public function __construct( FormPrinterHandler $formPrinterHandler ) {
		$this->formPrinterHandler = $formPrinterHandler;
	}

	/**
	 * @since 1.0
	 *
	 * @param OutputPage $output
	 *
	 * @return boolean
	 */
	public function redirectToUrl( $output ) {

		if ( !$this->formPrinterHandler->canUseForm() ) {
			return true;
		}

		$url = htmlspecialchars( SpecialPage::getTitleFor( 'SemanticSignup' )->getFullURL() );

		wfRunHooks( 'SemanticSignupBeforeRedirect', array( &$url ) );

		$output->redirect( $url );

		return false;
	}
}
