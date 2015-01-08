<?php

namespace SES\Tests;

use SES\UserFieldsCreateTemplate;

/**
 * @covers \SES\UserFieldsCreateTemplate
 *
 * @group semantic-signup
 *
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class UserFieldsCreateTemplateTest extends \PHPUnit_Framework_TestCase {

	public function testCanConstruct() {

		$this->assertInstanceOf(
			'\SES\UserFieldsCreateTemplate',
			new UserFieldsCreateTemplate()
		);
	}

	public function testExecute() {

		$instance = new UserFieldsCreateTemplate();

		$instance->set( 'link', 'http:://example.org' );
		$instance->set( 'header', 'Foo' );
		$instance->set( 'usedomain', false );
		$instance->set( 'useemail', false );
		$instance->set( 'userealname', false );

		// MW developers are marvellous creatures
		// QuickTemplate::msgWiki is calling `global $wgOut;`

		$outputPage = $this->getMockBuilder( '\OutputPage' )
			->disableOriginalConstructor()
			->getMock();

		$GLOBALS['wgOut'] = $outputPage;

		ob_start();
		$instance->execute();
		$text = ob_get_clean();

		$this->assertInternalType(
			'string',
			$text
		);
	}

}
