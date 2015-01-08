<?php

namespace SES\Tests;

use SES\SignupFields;

/**
 * @covers \SES\SignupFields
 *
 * @group semantic-signup
 *
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class SignupFieldsTest extends \PHPUnit_Framework_TestCase {

	public function testCanConstruct() {

		$userFieldsCreateTemplate = $this->getMockBuilder( '\SES\UserFieldsCreateTemplate' )
			->disableOriginalConstructor()
			->getMock();

		$this->assertInstanceOf(
			'\SES\SignupFields',
			new SignupFields( $userFieldsCreateTemplate )
		);
	}

	public function testExecute() {

		$userFieldsCreateTemplate = $this->getMockBuilder( '\SES\UserFieldsCreateTemplate' )
			->disableOriginalConstructor()
			->getMock();

		$instance = new SignupFields( $userFieldsCreateTemplate );

		$this->assertInternalType(
			'array',
			$instance->parse( array() )
		);
	}

}
