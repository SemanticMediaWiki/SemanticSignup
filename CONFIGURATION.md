## Configuration

Configuration of the Semantic Signup extension is done by assigning values to the
`$egSemanticSignupSettings` parameter in your "LocalSettings.php" file.


### Real name

Is entering a real name during the registration process required?

Default: `$egSemanticSignupSettings['requireName'] = false;` // true or false


### Form name

The name of the form that should be used for signup.

Default: `$egSemanticSignupSettings['formName'] = '';` // no form assinged

Example: `$egSemanticSignupSettings['formName'] = 'UserSignup';`


### Bot name

The name of the user to automatically create the user page with. This user needs
sufficient privileges to create an user account as well as creating new pages in
the `User:` namespace.

Default: `$egSemanticSignupSettings['botName'] = '';` // no user assigned

Example: `$egSemanticSignupSettings['botName'] = 'Admin';`


### CAPTCHA

Is completing a CAPTCHA required during the registration process? Note that this 
requires the ConfirmEdit extension to be installed.

Default: `$egSemanticSignupSettings['useCaptcha'] = true;` // true or false

Example: `$egSemanticSignupSettings['useCaptcha'] = false;` // not recommended (only if ConfirmEdit extension is not installed)


## Usage

Create a form a template and respective propertie(s) to be used for user pages
(see the [docu of Semantic Forms](https://www.mediawiki.org/wiki/Extension:Semantic_Forms)
for details on how to do this). After the form, template and properties were created
the `{{#signupfields:}}` parser function needs to be added to the form right above the
"for template" tag. Voilà.

### Example

"Form:UserSignup"
``` text
<includeonly>
{{#signupfields:}}
{{{for template|UserSignup}}}
{| class="formtable"
! Institution: 
| {{{field|Institution|mandatory}}}
|-
! About me:
| {{{field|About|input type=textarea|rows=3|autogrow}}}
|}
{{{end template}}}

{{{standard input|save|label=Create account}}}{{{standard input|cancel}}}
</includeonly>
```

"Template:UserSignup"
``` text
<includeonly>
;Institution
[[Institution::{{{Institution|}}}]]

;About me
{{{About|No information provided yet.}}}
</includeonly>
