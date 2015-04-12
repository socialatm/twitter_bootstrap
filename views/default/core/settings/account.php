<?php
/**
 * Account settings form wrapper
 * 
 * @package Elgg
 * @subpackage Core
 */

$action_url = elgg_get_site_url();
if (elgg_get_config('https_login')) {
	$action_url = str_replace("http:", "https:", $action_url);
}
$action_url .= 'action/usersettings/save';

echo 	'<div class="panel panel-default">
			<div class="panel-body">';


			echo elgg_view_form('usersettings/save', array(
				'class' => 'form-horizontal',
				'action' => $action_url,
));

echo 		'</div>
		</div>';
