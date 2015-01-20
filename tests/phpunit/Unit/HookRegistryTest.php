<?php

namespace SES\Tests;

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
class HookRegistryTest extends \PHPUnit_Framework_TestCase {

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
			$this->assertInternalType(
				'boolean',
				call_user_func_array( $hook, $arguments )
			);
		}
	}

}
