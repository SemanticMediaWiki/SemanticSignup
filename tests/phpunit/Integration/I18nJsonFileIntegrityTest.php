<?php

namespace SES\Tests\Integration;

use PHPUnit\Framework\TestCase;
use SMW\Tests\Utils\UtilityFactory;

/**
 * @group semantic-signup
 * @group medium
 *
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class I18nJsonFileIntegrityTest extends TestCase {

	/**
	 * @dataProvider i18nFileProvider
	 */
	public function testI18NJsonDecodeEncode( $file ) {

		$jsonFileReader = UtilityFactory::getInstance()->newJsonFileReader( $file );

		$this->assertIsInt(
			$jsonFileReader->getModificationTime()
		);

		$this->assertIsArray(
			$jsonFileReader->read()
		);
	}

	public function i18nFileProvider() {

		$provider = [];
		$location = $GLOBALS['wgMessagesDirs']['SemanticSignup'];

		$bulkFileProvider = UtilityFactory::getInstance()->newBulkFileProvider( $location[0] );
		$bulkFileProvider->searchByFileExtension( 'json' );

		foreach ( $bulkFileProvider->getFiles() as $file ) {
			$provider[] = array( $file );
		}

		return $provider;
	}

}
