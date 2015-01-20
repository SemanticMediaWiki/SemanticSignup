<?php

namespace SES;

/**
 * File defining the settings for the SemanticSignup extension.
 * More info can be found at http://www.mediawiki.org/wiki/Extension:SemanticSignup#Settings
 *
 * NOTICE:
 * Changing one of these settings can be done by assigning to $egSemanticSignupSettings.
 *
 * @since 0.3
 *
 * @license GNU GPL v3+
 * @author Jeroen De Dauw <jeroendedauw@gmail.com>
 */
class Settings {

	protected static function getDefaultSettings() {
		return array(
			'requireName' => false,
			'formName' => '',
			'botName' => '',
			'useCaptcha' => true,
		);
	}

	public static function getSettings() {
		static $settings = false;

		if ( $settings === false ) {
			$settings = array_merge(
				self::getDefaultSettings(),
				$GLOBALS['egSemanticSignupSettings']
			);
		}

		return $settings;
	}

	public static function get( $settingName ) {
		$settings = self::getSettings();
		return array_key_exists( $settingName, $settings ) ? $settings[$settingName] : null;
	}

	public static function set( $key, $value ) {
		$settings = self::getSettings();
		$settings[ $key ] = $value;
	}

}
