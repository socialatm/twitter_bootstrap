<?php

$type = elgg_get_plugin_setting('require_email_login', 'twitter_bootstrap') === 'yes' ? 'email':'text';
$placeholder = elgg_get_plugin_setting('require_email_login', 'twitter_bootstrap') === 'yes' ? elgg_echo('notification:method:email') : elgg_echo('username');
$password = elgg_echo('password');
$remember = elgg_echo('user:persistent');
$login = elgg_echo('login');
$reset = elgg_echo('reset');
$lost = elgg_echo('user:password:lost');

if (elgg_get_config('allow_registration')) {
	$register = '<div><a href="'.$login_url.'register">Register</a></div>';
}

$content = <<< FORM
	<div class="form-group">
		<label for="username">{$placeholder}</label>
		<input type="{$type}" class="form-control" id="username" placeholder="{$placeholder}" name="username">
	</div>
	<div class="form-group">
		<label for="password">{$password}</label>
		<input type="password" class="form-control" id="password" placeholder="{$password}" name="password">
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="persistent">{$remember}
		</label>
	</div>
	<button type="submit" class="btn btn-success">{$login}</button>
	<button type="reset" class="btn btn-default">{$reset}</button>
	<div>
		<a href="{$login_url}forgotpassword">{$lost}</a>
	</div>
	{$register}
FORM;
echo $content;
