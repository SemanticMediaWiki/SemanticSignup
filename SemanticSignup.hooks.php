<?php

/**
 * Static class for hooks handled by the SemanticSignup extension.
 * 
 * @since 0.3
 * 
 * @file SemanticSignup.hooks.php
 * @ingroup SemanticSignup
 * 
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
final class SemanticSignupHooks {

    /**
     * @since 0.3
     *
     * @param $template
     * 
     * @return false
     */
	public static function onUserCreateForm( $template ) {
		$semantic_signup_title = SemanticSignup::getTitleFor( 'SemanticSignup' );
		$url = $semantic_signup_title->escapeFullURL();
		
		global $wgOut;
		$wgOut->redirect( $url );
		
		return false;
	}
	
    /**
     * @since 0.3
     * 
     * @return true
     */
	public static function onParserFirstCallInit() {
        global $wgParser;
        $wgParser->setHook( 'signupfields', 'SES_SignupFields::render' );
        return true;		
	}

}
