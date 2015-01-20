## Configuration

Configuration of SemanticSignup is done by assigning to $egSemanticSignupSettings in your
[[Manual:LocalSettings.php|LocalSettings.php]] file. These statements need to be placed
AFTER the inclusion of SemanticSignup.

You should NOT modify the settings file, but can have a look at it to get an idea of
how to use the  settings, in case the below descriptions do not suffice.

### Require name

Require entering a real name during the registration process?

Default: `$egSemanticSignupSettings['requireName'] = false;` // true or false

### Form name

The name of the form you want to use for signup.

Default: `$egSemanticSignupSettings['formName'] = '';`

Example: `$egSemanticSignupSettings['formName'] = 'Signup_form';`

### Bot name

The name of the user to create the user page with. This user needs
sufficient priviliges to create new pages in the User: namespace.

Default: `$egSemanticSignupSettings['botName'] = '';`

Example: `$egSemanticSignupSettings['botName'] = 'Admin';`

### Enable Captcha

If captcha should be enabled (requires ConfirmEdit extension to be installed) ?

Default: `$egSemanticSignupSettings['useCaptcha'] = true;`
