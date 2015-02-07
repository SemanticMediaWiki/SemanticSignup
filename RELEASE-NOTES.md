These are the release notes for the SemanticSignup extension.

## Version 1.0 (2015-02-07)

* Installation is now done via Composer
* Added compatibility with MediaWiki 1.19 - 1.25
* Added compatibility with Semantic MediaWiki 2.x
* Added compatibility with Semantic Forms 3.x
* Added compatibility with PHP 5.4 - 5.6 and with HHVM
* #1 Fixed class `SemanticSignup` not found
* #2 Added basic tests, fixed null `formName` error, and added a check for `botName` to exists and to have the correct rights (`createaccount`) (164576f)
* #3 Removed deprecated `wfMsg` references
* #8 Deprecated usage of `wgAllowRealName`
* #10 Fixed JS registration of SF module
* Replaced deprecated Title::escapeFullURL calls
* Replaced deprecated User::isValidEmailAddr call

## Version 0.5 (2014-04-01)

* Migrated to JSON i18n
* Removed compatibility with PHP 5.2

## Version 0.4 (2013-08-02)

* Added compatibility with ConfirmEdit.
* Added compatibility with MediaWiki 1.18 and above.
* Added compatibility with Semantic Forms 2.0 and above.

## Version 0.3 (2011-08-15)

* Added compatibility with MediaWiki 1.16 and above, removed compatibility with MediaWiki below 1.16.
* Added compatibility with Semantic MediaWiki 1.6 and above.
* Added INSTALL file.
* Added checks for dependencies (MW, SMW, & SF)
* Rewrote setting handling, breaking compatibility with older versions.
* Moved entry point to SemanticSignup.php.
* Moved code to standard i18n, hooks and settings files.
* Split DataChecker classes code to separate files.
* Make use of semantic extension type.
* Changed the signupfields tag extension into a parser function.
* Stylized code.

## Version 0.2 (2009-02-07)

* Added configuration setting $sesSignupBotName.
* README sections 3 and 4 updated.

## Version 0.1 (2009-01-30)

* Initial release
