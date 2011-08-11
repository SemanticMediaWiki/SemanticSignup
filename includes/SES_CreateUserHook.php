<?php
/*
 * Created on 13 Jan 2009 by Serhii Kutnii
 */

function sesCreateUserRedirect($template)
{
	$semantic_signup_title = SemanticSignup::getTitleFor('SemanticSignup');
	$url = $semantic_signup_title->escapeFullURL();
	
	global $wgOut;
	$wgOut->redirect($url);
	
	return false;
}

$wgHooks['UserCreateForm'][] = 'sesCreateUserRedirect';
