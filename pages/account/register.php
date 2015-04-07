<?php
/**
 * Assembles and outputs the registration page.
 *
 * Since 1.8, registration can be disabled via administration.  If this is
 * the case, calls to this page will forward to the network front page.
 *
 * If the user is logged in, this page will forward to the network
 * front page.
 *
 * @package Elgg.Core
 * @subpackage Registration
 */

// check new registration allowed
if (elgg_get_config('allow_registration') == false) {
	register_error(elgg_echo('registerdisabled'));
	forward();
}

$friend_guid = (int) get_input('friend_guid', 0);
$invitecode = get_input('invitecode');

// only logged out people need to register
if (elgg_is_logged_in()) {
	forward();
}

$site = elgg_get_site_entity();
$site_name = $site->name;

// create the registration url - including switching to https if configured
$register_url = elgg_get_site_url() . 'action/register';
if (elgg_get_config('https_login')) {
	$register_url = str_replace("http:", "https:", $register_url);
}
$form_params = array(
	'action' => $register_url,
	'class' => 'form form-horizontal',
);

$body_params = array(
	'friend_guid' => $friend_guid,
	'invitecode' => $invitecode
);

$message = elgg_get_plugin_setting('tbs_register', 'twitter_bootstrap');
$form = elgg_view_form('register', $form_params, $body_params);

$content = '
<div class="row">
	<div class="col-md-6">
		'.$message.'
	</div>
	<div class="col-md-6 well">
		<!-- Title -->
		<h4 class="title">Quick Register</h4>
	<!--	<p>&nbsp;</p>	-->
			'.$form.'
	</div>
</div>
';
$body = elgg_view_layout("one_column", array('content' => $content));
echo elgg_view_page($title, $body);
