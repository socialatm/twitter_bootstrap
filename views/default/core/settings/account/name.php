<?php
/**
 * Provide a way of setting your full name.
 *
 * @package Elgg
 * @subpackage Core
 */

$user = elgg_get_page_owner_entity();
if ($user) {
	// need the user's guid to make sure the correct user gets updated
	echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $user->guid));
	$label = elgg_echo('name') . ': ';
	$value = $user->name;

echo <<<EOT
		<div class="form-group">
		<label for="name" class="col-sm-2 control-label">{$label}</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" placeholder="{$label}" value="{$value}">
		</div>
	</div>
EOT;
	
}
