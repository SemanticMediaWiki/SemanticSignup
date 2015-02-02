<?php

namespace SES;

use Parser;

/**
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class ParserFunctionFactory {

	/**
	 * @since  1.0
	 *
	 * @return array
	 */
	public function newSignupFieldsParserFunctionDefinition() {

		$signupfieldsParserDefinition = function( $parser ) {

			$signupFieldsParserFunction = new SignupFieldsParserFunction(
				new UserFieldsCreateTemplate()
			);

			return $signupFieldsParserFunction->parse( func_get_args() );
		};

		return array( 'signupfields', $signupfieldsParserDefinition, 0 );
	}

}
