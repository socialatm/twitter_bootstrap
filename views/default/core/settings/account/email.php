<?php
/**
 * Provide a way of setting your email
 *
 * @package Elgg
 * @subpackage Core
 */

$user = elgg_get_page_owner_entity();

if ($user) {
	$label = elgg_echo('email:address:label') . ': ';
	$value = $user->email;
	
echo <<<EOT
		<div class="form-group">
		<label for="email" class="col-sm-2 control-label">{$label}</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="email" name="email" placeholder="{$label}" value="{$value}" autocorrect="off" autocapitalize="off">
		</div>
	</div>
EOT;
}
