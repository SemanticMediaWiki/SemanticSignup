<?php

namespace SES\Tests;

use FauxRequest;
use MediaWiki\SpecialPage\SpecialPageFactory;
use PHPUnit\Framework\TestCase;
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
class SpecialSemanticSignupTest extends TestCase {

	public function testCanConstruct() {

		$request = new FauxRequest( array(), true );
		$specialPage = SpecialPageFactory::getPage( 'SemanticSignup' );

		$title = $specialPage->getPageTitle();

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
