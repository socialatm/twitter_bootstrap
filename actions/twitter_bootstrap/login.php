<?php
/**
 * Elgg login action
 *
 * @package Elgg.Core
 * @subpackage User.Authentication
 */

$session = elgg_get_session();

// set forward url
if ($session->has('last_forward_from')) {
	$forward_url = $session->get('last_forward_from');
	$forward_source = 'last_forward_from';
} elseif (get_input('returntoreferer')) {
	$forward_url = REFERER;
	$forward_source = 'return_to_referer';
} else {
	// forward to main index page
	$forward_url = '';
	$forward_source = null;
}

$username = get_input('username');
$password = get_input('password', null, false);
$persistent = (bool) get_input("persistent");
$result = false;

/*****	confirm it's an emal address	*****/
$validator = new Zend\Validator\EmailAddress();
if(!$validator->isValid($username)){
	register_error(elgg_echo('login:empty'));
	forward();
}

/*****	confirm password is not empty	*****/
$validator = new Zend\Validator\NotEmpty();
if(!$validator->isValid($password)){
	register_error(elgg_echo('login:empty'));
	forward();
}

$users = get_user_by_email($username);
$username = $users[0]->username;

$result = elgg_authenticate($username, $password);
if ($result !== true) {
	register_error($result);
	forward(REFERER);
}

$user = get_user_by_username($username);
if (!$user) {
	register_error(elgg_echo('login:baduser'));
	forward(REFERER);
}

try {
	login($user, $persistent);
	// re-register at least the core language file for users with language other than site default
	register_translations(dirname(dirname(__FILE__)) . "/languages/");
} catch (LoginException $e) {
	register_error($e->getMessage());
	forward(REFERER);
}

// elgg_echo() caches the language and does not provide a way to change the language.
// @todo we need to use the config object to store this so that the current language
// can be changed. Refs #4171
if ($user->language) {
	$message = elgg_echo('loginok', array(), $user->language);
} else {
	$message = elgg_echo('loginok');
}

// clear after login in case login fails
$session->remove('last_forward_from');
unset($validator);

$params = array('user' => $user, 'source' => $forward_source);
$forward_url = elgg_trigger_plugin_hook('login:forward', 'user', $params, $forward_url);

system_message($message);
forward($forward_url);
