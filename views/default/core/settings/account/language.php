<?php
/**
 * Provide a way of setting your language prefs
 *
 * @package Elgg
 * @subpackage Core
 */

$user = elgg_get_page_owner_entity();

if ($user) {

	$lang = get_installed_translations()[$user->language];
	$label = elgg_echo('user:language:label') . ': ';
	$value = elgg_view("input/selectlist", array(
		'name' => 'language_ul',
		'value' => $user->language,
		'options_values' => get_installed_translations(),
		'class' => 'dropdown-menu',
		'id' => 'language_ul',
		'role' => 'menu'
	));
	
echo <<<EOT
	<div class="form-group">
		<label for="language" class="col-sm-2 control-label">{$label}</label>
		<div class="col-sm-10">
			<div id="selectlistIllustration" data-initialize="selectlist"  class="btn-group btn-block selectlist">
				<button type="button" data-toggle="dropdown" class="btn btn-default btn-block dropdown-toggle" aria-expanded="false">
					<span class="selected-label pull-left">{$lang}</span>
					<span class="glyphicon glyphicon-triangle-bottom pull-left" aria-hidden="true" style="margin-left: 10px;"></span>
					<span class="sr-only">Toggle Dropdown</span>
				</button>
				{$value}
				<input type="text" aria-hidden="true" readonly="readonly" id="language" name="language" class="hidden hidden-field" />
			</div>
		</div>
	</div>
EOT;

}
