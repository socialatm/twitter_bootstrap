<?php
/**
 * add start pages menu
 *
 * @uses $vars['type']
 */

$type = $vars['type'];
$pages = array('tbs_settings', 'tbs_login', 'tbs_register', 'tbs_lost_password', 'tbs_header_news');
$tabs = array();
foreach ($pages as $page) {
	$tabs[] = array(
		'title' => elgg_echo("startpages:$page"),
		'url' => "admin/plugin_settings/twitter_bootstrap?type=$page",
		'selected' => $page == $type,
	);
}

echo elgg_view('navigation/tabs', array('tabs' => $tabs, 'class' => 'elgg-form-settings'));
