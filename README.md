# Semantic Signup

[![Latest Stable Version](https://poser.pugx.org/mediawiki/semantic-signup/version.png)](https://packagist.org/packages/mediawiki/semantic-signup)
[![Packagist download count](https://poser.pugx.org/mediawiki/semantic-signup/d/total.png)](https://packagist.org/packages/mediawiki/semantic-signup)
[![Dependency Status](https://www.versioneye.com/php/mediawiki:semantic-signup/badge.png)](https://www.versioneye.com/php/mediawiki:semantic-signup)

Semantic Signup (a.k.a. SES) is a [Semantic Mediawiki][smw] extension that uses
Semantic Forms to improve the user registration process.

## Requirements

- PHP 5.3.2 or later
- MediaWiki 1.19 or later
- [Semantic MediaWiki][smw] 1.9+
- [Semantic Forms][sf] 2.8+

## Installation

The recommended way to install Semantic Signup is by using [Composer][composer] with an entry in MediaWiki's `composer.json`.

```json
{
	"require": {
		"mediawiki/semantic-signup": "~1.0"
	}
}
```
1. From your MediaWiki installation directory, execute
   `composer require mediawiki/semantic-signup:~1.0`
2. Navigate to _Special:Version_ on your wiki and verify that the package
   have been successfully installed.

## Usage

This extension tweaks user registration process in order to make
users populate their user pages with semantic data at registration time.
Whenever the user registration form is requested the user is redirected
to the Semantic Signup special page where he has to enter the usual
account data and some additional information into a semantic form.
When the form is submitted, the usual account information is used
to register the new user account and a new "User:Username" page is
created and populated with the additional data provided via the form.

For details on how to adjust the settings and prepare the required form and
template, please have a look at the [configuration guideline](CONFIGURATION.md).


## Contribution and support

If you want to contribute work to the project please subscribe to the developers mailing list and
have a look at the contribution guideline.

* [File an issue](https://github.com/SemanticMediaWiki/SemanticSignup/issues)
* [Submit a pull request](https://github.com/SemanticMediaWiki/SemanticSignup/pulls)
* Ask a question on [the mailing list](https://semantic-mediawiki.org/wiki/Mailing_list)
* Ask a question on the #semantic-mediawiki IRC channel on Freenode.

### Tests

This extension provides unit and integration tests that are run by a [continues integration platform][travis]
but can also be executed using `composer phpunit` from the extension base directory.

## License

[GNU General Public License, version 3 or later][gpl-licence].

[gpl-licence]: https://www.gnu.org/copyleft/gpl.html
[smw]: https://github.com/SemanticMediaWiki/SemanticMediaWiki
[sf]: https://www.mediawiki.org/wiki/Extension:Semantic_Forms
[travis]: https://travis-ci.org/SemanticMediaWiki/SemanticSignup
[composer]: https://getcomposer.org/
