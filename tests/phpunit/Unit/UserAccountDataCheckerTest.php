<?php

namespace SES\Tests;

use PHPUnit\Framework\TestCase;
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
class UserAccountDataCheckerTest extends TestCase {

	public function testCanConstruct() {

		$this->assertInstanceOf(
			'\SES\UserAccountDataChecker',
			new UserAccountDataChecker()
		);
	}

}
