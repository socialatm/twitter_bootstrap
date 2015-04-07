<?php
/**
 * Edit form body for external pages
 * 
 * @uses $vars['type']
 * 
 */

$type = $vars['type'];
$description = elgg_get_plugin_setting($type, 'twitter_bootstrap');
$external_page_title = elgg_echo("startpages:$type");
$name = 'params['.$type.']';
$form = elgg_view('input/longtext', array(
	'name' => $name,
	'value' => elgg_get_plugin_setting($type, 'twitter_bootstrap')
));

//construct the form
echo <<<EOT
<div class="mtm">
	<label>{$external_page_title}</label>
	{$form}
</div>

EOT;
