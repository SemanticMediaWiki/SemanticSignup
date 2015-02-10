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

		$formPrinterHandler = $this->getMockBuilder( '\SES\FormPrinterHandler' )
			->disableOriginalConstructor()
			->getMock();

		$this->assertInstanceOf(
			'\SES\RedirectFormFinder',
			new RedirectFormFinder( $formPrinterHandler )
		);
	}

	public function testRedirectToUrlForInvalidForm() {

		$outputPage = $this->getMockBuilder( '\OutputPage' )
			->disableOriginalConstructor()
			->getMock();

		$outputPage->expects( $this->never() )
			->method( 'redirect' );

		$formPrinterHandler = $this->getMockBuilder( '\SES\FormPrinterHandler' )
			->disableOriginalConstructor()
			->getMock();

		$formPrinterHandler->expects( $this->once() )
			->method( 'canUseForm' )
			->will( $this->returnValue( false ) );

		$instance = new RedirectFormFinder( $formPrinterHandler );

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

		$formHandler = $this->getMockBuilder( '\SES\FormPrinterHandler' )
			->disableOriginalConstructor()
			->getMock();

		$formHandler->expects( $this->once() )
			->method( 'canUseForm' )
			->will( $this->returnValue( true ) );

		$instance = new RedirectFormFinder( $formHandler );

		$this->assertFalse(
			$instance->redirectToUrl( $outputPage )
		);
	}

}
