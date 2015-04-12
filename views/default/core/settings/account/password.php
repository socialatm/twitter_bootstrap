<?php

/**
 * Provide a way of setting your password
 *
 * @package Elgg
 * @subpackage Core
 */
$user = elgg_get_page_owner_entity();

if ($user) {
	$current_password = elgg_echo('password') . ': ';
	$current_password2 = elgg_echo('user:current_password:label') . ': ';
	$password = elgg_echo('user:password:label') . ': ';
	$password2 = elgg_echo('user:password2:label') . ': ';
	
echo <<<EOT
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">{$current_password}</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" id="current_password" name="current_password" placeholder="{$current_password2}" value="" autocorrect="off" autocapitalize="off">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">{$password}</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" id="password" name="password" placeholder="{$password}" value="" autocorrect="off" autocapitalize="off">
			</div>
		</div>
		<div class="form-group">
			<label for="password2" class="col-sm-2 control-label">{$password}</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" id="password2" name="password2" placeholder="{$password2}" value="" autocorrect="off" autocapitalize="off">
			</div>
		</div>
EOT;
}
