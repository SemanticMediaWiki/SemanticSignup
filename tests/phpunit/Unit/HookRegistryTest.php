<?php

namespace SES\Tests;

use PHPUnit\Framework\TestCase;
use SES\HookRegistry;

/**
 * @covers \SES\HookRegistry
 *
 * @group semantic-signup
 *
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class HookRegistryTest extends TestCase {

	public function testCanConstruct() {

		$this->assertInstanceOf(
			'\SES\HookRegistry',
			new HookRegistry()
		);
	}

	public function testRegister() {

		$parser = $this->getMockBuilder( '\Parser' )
			->disableOriginalConstructor()
			->getMock();

		$wgHooks = array();

		$instance = new HookRegistry();
		$instance->register( $wgHooks );

		$this->assertNotEmpty(
			$wgHooks
		);

		$this->assertHookIsExcutable(
			$wgHooks,
			'ParserFirstCallInit',
			array( &$parser )
		);

		$template = '';

		$this->assertHookIsExcutable(
			$wgHooks,
			'UserCreateForm',
			array( &$template )
		);
	}

	private function assertHookIsExcutable( $wgHooks, $hookName, $arguments ) {
		foreach ( $wgHooks[ $hookName ] as $hook ) {
			$this->assertIsBool(
				call_user_func_array( $hook, $arguments )
			);
		}
	}

}
