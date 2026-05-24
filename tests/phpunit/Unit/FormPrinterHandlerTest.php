<?php

namespace SES\Tests;

use MediaWiki\Title\Title;
use PHPUnit\Framework\TestCase;
use SES\FormPrinterHandler;

/**
 * @covers \SES\FormPrinterHandler
 *
 * @group semantic-signup
 *
 * @license GNU GPL v2+
 * @since 1.1
 *
 * @author mwjames
 */
class FormPrinterHandlerTest extends TestCase {

	public function testCanConstruct() {

		$this->assertInstanceOf(
			'\SES\FormPrinterHandler',
			new FormPrinterHandler()
		);
	}

	public function testCanUseForm() {

		$instance = new FormPrinterHandler();

		$this->assertFalse(
			$instance->canUseForm()
		);

		$title = $this->getMockBuilder( Title::class )
			->disableOriginalConstructor()
			->getMock();

		$title->expects( $this->once() )
			->method( 'exists' )
			->will( $this->returnValue( true ) );

		$title->expects( $this->any() )
			->method( 'canExist' )
			->will( $this->returnValue( true ) );

		$instance = new FormPrinterHandler( $title );

		$this->assertTrue(
			$instance->canUseForm()
		);

	}

	public function testGetFormText() {

		$title = $this->getMockBuilder( Title::class )
			->disableOriginalConstructor()
			->getMock();

		$title->expects( $this->any() )
			->method( 'exists' )
			->will( $this->returnValue( true ) );

		$title->expects( $this->any() )
			->method( 'canExist' )
			->will( $this->returnValue( true ) );

		$instance = new FormPrinterHandler( $title );

		$this->assertEmpty(
			$instance->getFormText()
		);

		$formPrinter = $this->getMockBuilder( '\PFFormPrinter' )
			->disableOriginalConstructor()
			->getMock();

		$formPrinter->expects( $this->once() )
			->method( 'formHTML' )
			->will( $this->returnValue( array( 'Foo', '', '', '', '' ) ) );

		$instance = new FormPrinterHandler(
			$title,
			$formPrinter
		);

		$this->assertEquals(
			'Foo',
			$instance->getFormText()
		);
	}

	public function testGetTemplateText() {

		$title = $this->getMockBuilder( Title::class )
			->disableOriginalConstructor()
			->getMock();

		$title->expects( $this->any() )
			->method( 'exists' )
			->will( $this->returnValue( true ) );

		$title->expects( $this->any() )
			->method( 'canExist' )
			->will( $this->returnValue( true ) );

		$instance = new FormPrinterHandler( $title );

		$this->assertEmpty(
			$instance->getTemplateText()
		);

		$formPrinter = $this->getMockBuilder( '\PFFormPrinter' )
			->disableOriginalConstructor()
			->getMock();

		$formPrinter->expects( $this->once() )
			->method( 'formHTML' )
			->will( $this->returnValue( array( '', '', 'Bar', '', '' ) ) );

		$instance = new FormPrinterHandler(
			$title,
			$formPrinter
		);

		$this->assertEquals(
			'Bar',
			$instance->getTemplateText()
		);
	}

}
