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

		$user_guid = $user->guid;
		$label = elgg_echo('default_access:label') . ': ';
		$value = elgg_view("input/access", array(
		'name' => 'default_access_ul',
		'value' => $default_access,
		'class' => 'dropdown-menu',
		'id' => 'default_access_ul',
		'role' => 'menu'
	));
	
	$access_label = get_write_access_array()["$default_access"];

echo <<<EOT
	<div class="form-group">
		<label for="default-access-{$user_guid}" class="col-sm-2 control-label">{$label}</label>
		<div class="col-sm-10">
			<div id="default-access-{$user_guid}" data-initialize="selectlist"  class="btn-group btn-block selectlist">
				<button type="button" data-toggle="dropdown" class="btn btn-success btn-block dropdown-toggle" aria-expanded="false">
					<span class="selected-label pull-left">{$access_label}</span>
					<span class="glyphicon glyphicon-triangle-bottom pull-left" aria-hidden="true" style="margin-left: 10px;"></span>
					<span class="sr-only">Toggle Dropdown</span>
				</button>
				{$value}
				<input type="text" aria-hidden="true" readonly="readonly" id="default_access" name="default_access" class="hidden hidden-field" />
			</div>
		</div>
	</div>
EOT;

	}
}
