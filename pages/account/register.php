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
	'class' => 'form',
);

$body_params = array(
	'friend_guid' => $friend_guid,
	'invitecode' => $invitecode
);
$content .= elgg_view_form('register', $form_params, $body_params);
$form = elgg_view_form('register', $form_params, $body_params);

$content = '
<div class="row">
	<div class="col-md-6">
		<!-- Some content -->
		<h3 class="title">Register at '.$site_name.'</h3>
        <h4 >Fill out this one quick form and you\'re ready to go</h4>
        <h5>Here is what it all means:</h5>
        <ul>
			<li><b>Name:</b> What people will see on the website.</li>
            <li><b>Email:</b> In case you forget your password or want to receive notifications from other website members. We do not share, EVER!!</li>
            <li><b>Username:</b> Internal use only. Does not appear on the website and can not be changed.</li>
            <li><b>Password:</b> So nobody can get into your stuff.</li>
            <li><b>Password:</b> Again, just to be sure you spelled it right.</li>
		</ul>
        <p>Thank you and welcome to '.$site_name.'. See, I told you it was quick. 
		</p>		
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
