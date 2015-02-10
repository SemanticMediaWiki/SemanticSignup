<?php

namespace SES\Tests;

use SES\SignupFactory;

/**
 * @covers \SES\SignupFactory
 *
 * @group semantic-signup
 *
 * @license GNU GPL v2+
 * @since 1.1
 *
 * @author mwjames
 */
class SignupFactoryTest extends \PHPUnit_Framework_TestCase {

	public function testCanConstruct() {

		$this->assertInstanceOf(
			'\SES\SignupFactory',
			new SignupFactory()
		);
	}

	public function testCanConstructFormPrinterHandler() {

		$instance = new SignupFactory();

		$this->assertInstanceOf(
			'\SES\FormPrinterHandler',
			$instance->newFormPrinterHandler()
		);
	}

	public function testCanConstructUserAccountDataChecker() {

		$instance = new SignupFactory();

		$this->assertInstanceOf(
			'\SES\UserAccountDataChecker',
			$instance->newUserAccountDataChecker()
		);
	}

}
