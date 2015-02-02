<?php

namespace SES\Tests;

use SES\ParserFunctionFactory;

use Title;
use Parser;
use ParserOptions;

/**
 * @covers \SES\ParserFunctionFactory
 *
 * @group semantic-signup
 *
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class ParserFunctionFactoryTest extends \PHPUnit_Framework_TestCase {

	public function testCanConstruct() {

		$this->assertInstanceOf(
			'\SES\ParserFunctionFactory',
			new ParserFunctionFactory()
		);
	}

	public function testNewSignupFieldsParserFunction() {

		$parser = $this->getMockBuilder( '\Parser' )
			->disableOriginalConstructor()
			->getMock();

		$instance = new ParserFunctionFactory();

		list( $name, $definition, $flag ) = $instance->newSignupFieldsParserFunctionDefinition();

		$this->assertEquals(
			'signupfields',
			$name
		);

		$this->assertInstanceOf(
			'\Closure',
			$definition
		);

		$this->assertEquals(
			0,
			$flag
		);

		$this->assertNotEmpty(
			call_user_func_array( $definition, array( $parser ) )
		);
	}

}
