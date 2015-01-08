<?php

namespace SES\Tests;

use SES\UserAccountDataChecker;

/**
 * @covers \SES\UserAccountDataChecker
 *
 * @group semantic-signup
 *
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class UserAccountDataCheckerTest extends \PHPUnit_Framework_TestCase {

	public function testCanConstruct() {

		$this->assertInstanceOf(
			'\SES\UserAccountDataChecker',
			new UserAccountDataChecker()
		);
	}

}
