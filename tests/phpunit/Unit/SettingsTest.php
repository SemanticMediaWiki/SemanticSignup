<?php

namespace SES\Tests;

use PHPUnit\Framework\TestCase;
use SES\Settings;

/**
 * @covers \SES\Settings
 *
 * @group semantic-signup
 *
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class SettingsTest extends TestCase {

	public function testCanConstruct() {

		$this->assertInstanceOf(
			'\SES\Settings',
			new Settings()
		);
	}

	public function testGetSettings() {

		$instance = new Settings();

		$this->assertIsArray(
			$instance->getSettings()
		);
	}

}
