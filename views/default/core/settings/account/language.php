<?php
/**
 * Provide a way of setting your language prefs
 *
 * @package Elgg
 * @subpackage Core
 */

$user = elgg_get_page_owner_entity();

if ($user) {
	$label = elgg_echo('user:language:label') . ': ';
	$value = elgg_view("input/select", array(
		'name' => 'language',
		'value' => $user->language,
		'options_values' => get_installed_translations(),
		'class' => 'form-control',
		'id' => 'language'
	));
	
echo <<<EOT
		<div class="form-group">
		<label for="language" class="col-sm-2 control-label">{$label}</label>
		<div class="col-sm-10">
			{$value}
		</div>
	</div>
EOT;
}
