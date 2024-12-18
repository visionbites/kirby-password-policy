# Kirby password policy plugin
A small kirby plugin to enforce a password policy on user creation or password change

## Install

- Copy plugin folder into `site/plugins` or
- `composer require visionbites/password-policy`

## Setup
By default, the plugin enforces a password length of 12 characters with at least one number and one symbol out of `!@#$%^&*`.
To change this you can set the used regex in your config.

That could look like this to require 16 characters: 
```php
'visionbites.password-policy.password_regex' => '/^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{16,}$/'
```
In that case you should adapt the error messages for the different languages:
```php
// in site/languages/de.php

return [
  'translations' => [
    'visionbites.password-policy.error-message' => 'Das Passwort muss mindestens 16 Zeichen lang sein und eine Zahl und ein Sonderzeichen enthalten.',
  ]
];
```

## Options

there is really only one option at the moment:

| Option            | Default                                                  | Description                                            |
|-------------------|----------------------------------------------------------|--------------------------------------------------------|
| `password_regex`  | `/^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{12,}$/` | the default regex to compare new passwords against     |


## Todos
- [ ] adapt the password change dialog to reflect the requirements

## Disclaimer
This plugin is provided "as is" with no warranties or guarantee. Use it at your own risk. Test before using in production.
The plugin does not enforce password strength on existing and unchanged passwords. 

## License

[MIT](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia animal abuse, violence or any other form of hate speech.
