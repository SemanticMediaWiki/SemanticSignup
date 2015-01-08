<?php

namespace SES\Tests;

use SES\RedirectFormFinder;

/**
 * @covers \SES\RedirectFormFinder
 *
 * @group semantic-signup
 *
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class RedirectFormFinderTest extends \PHPUnit_Framework_TestCase {

	public function testCanConstruct() {

		$this->assertInstanceOf(
			'\SES\RedirectFormFinder',
			new RedirectFormFinder()
		);
	}

	public function testRedirectToUrlForInvalidForm() {

		$outputPage = $this->getMockBuilder( '\OutputPage' )
			->disableOriginalConstructor()
			->getMock();

		$outputPage->expects( $this->never() )
			->method( 'redirect' );

		$instance = $this->getMockBuilder( '\SES\RedirectFormFinder' )
			->disableOriginalConstructor()
			->setMethods( array( 'hasForm' ) )
			->getMock();

		$instance->expects( $this->once() )
			->method( 'hasForm' )
			->will( $this->returnValue( false ) );

		$this->assertTrue(
			$instance->redirectToUrl( $outputPage )
		);
	}

	public function testRedirectToUrlForValidForm() {

		$outputPage = $this->getMockBuilder( '\OutputPage' )
			->disableOriginalConstructor()
			->getMock();

		$outputPage->expects( $this->once() )
			->method( 'redirect' );

		$instance = $this->getMockBuilder( '\SES\RedirectFormFinder' )
			->disableOriginalConstructor()
			->setMethods( array( 'hasForm' ) )
			->getMock();

		$instance->expects( $this->once() )
			->method( 'hasForm' )
			->will( $this->returnValue( true ) );

		$this->assertFalse(
			$instance->redirectToUrl( $outputPage )
		);
	}

}
