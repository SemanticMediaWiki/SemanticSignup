<?php

/**
 * File defining the settings for the SemanticSignup extension.
 * More info can be found at http://www.mediawiki.org/wiki/Extension:SemanticSignup#Settings
 *
 *                          NOTICE:
 * Changing one of these settings can be done by copying or cutting it,
 * and placing it in LocalSettings.php, AFTER the inclusion of this extension.
 *
 * @file SemanticSignup.settings.php
 * @ingroup SemanticSignup
 *
 * @licence GNU GPL v3+
 * @author Serg Kutny
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

/*
 * I need real name to be required on user signup for my purposes 
 * so I make this feature configurable
 */
$sesRealNameRequired = false;
$sesSignupFormName = '';
$sesSignupBotName = '';