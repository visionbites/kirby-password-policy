<?php

use Kirby\Toolkit\I18n;

Kirby::plugin('visionbites/password-policy', [
	'hooks' => [
		'user.changePassword:before' => function ($user, $password) {
			if (!checkPassword($password)) {
				throw new Exception(I18n::translate('visionbites.password-policy.error-message'));
			}
		},
		'user.create:before' => function (Kirby\Cms\User $user, array $input) {
			if (!checkPassword($input['password'])) {
				throw new Exception(I18n::translate('visionbites.password-policy.error-message'));
			}
		}
	],
	'options' => [
		// Example criteria: at least 12 characters long, includes a number and a special character
		'password_regex' => '/^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{12,}$/',
	],
	'translations' => array(
		'en' => require_once __DIR__ . '/languages/en.php',
		'de' => require_once __DIR__ . '/languages/de.php',
	),
]);


function checkPassword($password) {
	$regex = option('visionbites.password-policy.password_regex') ;
	return preg_match($regex, $password);
}

