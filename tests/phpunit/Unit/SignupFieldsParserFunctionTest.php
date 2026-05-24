<?php

namespace SES\Tests;

use PHPUnit\Framework\TestCase;
use SES\SignupFieldsParserFunction;

/**
 * @covers \SES\SignupFieldsParserFunction
 *
 * @group semantic-signup
 *
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class SignupFieldsParserFunctionTest extends TestCase {

	public function testCanConstruct() {

		$userFieldsCreateTemplate = $this->getMockBuilder( '\SES\UserFieldsCreateTemplate' )
			->disableOriginalConstructor()
			->getMock();

		$this->assertInstanceOf(
			'\SES\SignupFieldsParserFunction',
			new SignupFieldsParserFunction( $userFieldsCreateTemplate )
		);
	}

	public function testExecute() {

		$userFieldsCreateTemplate = $this->getMockBuilder( '\SES\UserFieldsCreateTemplate' )
			->disableOriginalConstructor()
			->getMock();

		$instance = new SignupFieldsParserFunction( $userFieldsCreateTemplate );

		$this->assertIsArray(
			$instance->parse( array() )
		);
	}

}
