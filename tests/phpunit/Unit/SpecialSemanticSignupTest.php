<?php

namespace SES\Tests;

use SES\SpecialSemanticSignup;

/**
 * @covers \SES\SpecialSemanticSignup
 *
 * @group semantic-signup
 *
 * @license GNU GPL v2+
 * @since 1.1
 *
 * @author mwjames
 */
class SpecialSemanticSignupTest extends \PHPUnit_Framework_TestCase {

	public function testCanConstruct() {

		$request = new \FauxRequest( array(), true );
		$specialPage = \SpecialPageFactory::getPage( 'SemanticSignup' );

		// Deprecated: Use of SpecialPage::getTitle was deprecated in MediaWiki 1.23
		$title = method_exists( $specialPage, 'getPageTitle') ? $specialPage->getPageTitle() : $specialPage->getTitle();

		$context = \RequestContext::newExtraneousContext( $title );
		$context->setRequest( $request );

		$specialPage->setContext( clone $context );

		//$context->setUser( $this->getUser() );
		//$specialPage->setContext( $context );

		$this->assertInstanceOf(
			'\SES\SpecialSemanticSignup',
			$specialPage
		);
	}

}
