<?php

namespace SES;

use Title;

/**
 * @license GNU GPL v2+
 * @since 1.1
 *
 * @author mwjames
 */
class SignupFactory {

	/**
	 * @since  1.1
	 *
	 * @return FormPrinterHandler
	 */
	public function newFormPrinterHandler() {

		$form = Title::newFromText(
			Settings::get( 'formName' ),
			SF_NS_FORM
		);

		return new FormPrinterHandler(
			$form,
			$GLOBALS['sfgFormPrinter']
		);
	}

	/**
	 * @since 1.1
	 *
	 * @return UserAccountDataChecker
	 */
	public function newUserAccountDataChecker() {
		return new UserAccountDataChecker();
	}

}
