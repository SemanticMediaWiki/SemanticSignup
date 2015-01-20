<?php

namespace SES\Tests;

use SES\DataChecker;

/**
 * @covers \SES\DataChecker
 *
 * @group semantic-signup
 *
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class DataCheckerTest extends \PHPUnit_Framework_TestCase {

	public function testCanConstruct() {

		$instance = $this->getMockBuilder( '\SES\DataChecker' )
			->disableOriginalConstructor()
			->getMockForAbstractClass();

		$this->assertInstanceOf(
			'\SES\DataChecker',
			$instance
		);
	}

}
