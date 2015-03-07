<?php
/**
 * twitter bootstrap login page.
 *
 * If the user is logged in, this page will forward to the front page.
 *
 * @package Elgg.Core
 * @subpackage Accounts
 */

if (elgg_is_logged_in()) {
	forward('');
}

$site = elgg_get_site_entity();
$site_name = $site->name;

$login_url = elgg_get_site_url();
if (elgg_get_config('https_login')) {
	$login_url = str_replace("http:", "https:", $login_url);
}

$lost = elgg_echo('user:password:lost');
$title = elgg_echo('login');
$form .= elgg_view_form('login', array('action' => "{$login_url}action/login", 'class' => 'form-horizontal'));
$message = elgg_echo('login:page:message', array($site_name));

$content = <<<HTML
<!-- Page content starts -->
<div class="row">
	<div class="col-md-6">
		{$message}
 	</div>
	<div class="col-md-6">
		<div class="well">
			<!-- Title -->
            <h4 class="title">Login to Your Account</h4>
			<p>&nbsp;</p>
            <div class="form">
            <!-- Login form -->
				{$form}
				<h5></h5>
                <!-- Forgot Password link -->
                Don't remember your Password? <a href="{$login_url}forgotpassword">{$lost}</a>
HTML;
				if (elgg_get_config('allow_registration')) {
					$content .= '<!-- Register link -->
					<p>Don\'t have an Account? <a href="'.$login_url.'register">Register</a></p>';
				}
$content .= <<<HTML
			</div> 
		</div>
	</div>
</div>
<!-- Page content ends -->
HTML;

if (elgg_get_config('walled_garden')) {
	elgg_load_css('elgg.walled_garden');
	$body = elgg_view_layout('walled_garden', array('content' => $content));
	echo elgg_view_page($title, $body, 'walled_garden');
} else {
	$body = elgg_view_layout('one_column', array('content' => $content));
	echo elgg_view_page($title, $body);
}
