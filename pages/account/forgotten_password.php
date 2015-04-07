<?php
/**
 * Assembles and outputs the forgotten password page.
 *
 * @package Elgg.Core
 * @subpackage Registration
 */

if (elgg_is_logged_in()) {
	forward();
}

$title = elgg_echo("user:password:lost");
$site = elgg_get_site_entity();
$site_name = $site->name;

$form = elgg_view_form('user/requestnewpassword', array(
		'class' => 'form form-horizontal',
		));

$message = elgg_get_plugin_setting('tbs_lost_password', 'twitter_bootstrap');

$content = '
<div class="row">
	<div class="col-md-6">
		'.$message.'
	</div>
	<div class="col-md-6 well">
		<!-- Title -->
		<h4 class="title">'.$title.'</h4>
			'.$form.'
		<h5>'.elgg_echo('user:password:text').'</h5>
	</div>
</div>
';

$body = elgg_view_layout("one_column", array('content' => $content));
echo elgg_view_page($title, $body);
