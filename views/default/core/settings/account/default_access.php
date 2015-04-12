<?php
/**
 * Provide a way of setting your default access
 *
 * @package Elgg
 * @subpackage Core
 */
if (elgg_get_config('allow_user_default_access')) {
	$user = elgg_get_page_owner_entity();

	if ($user) {
		$default_access = $user->getPrivateSetting('elgg_default_access');
		if ($default_access === null) {
			$default_access = elgg_get_config('default_access');
		}

		$label = elgg_echo('default_access:label') . ': ';
		$value = elgg_view("input/access", array(
		'name' => 'default_access',
		'value' => $default_access,
		'class' => 'form-control',
		'id' => 'default_access'
	));
	
echo <<<EOT
		<div class="form-group">
		<label for="default_access" class="col-sm-2 control-label">{$label}</label>
		<div class="col-sm-10">
			{$value}
		</div>
	</div>
EOT;
	}
}
