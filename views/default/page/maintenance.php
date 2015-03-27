<?php
/**
 * twitter bootstrap theme Maintenance mode page shell
 *
 * @uses $vars['head']        Parameters for the <head> element
 * @uses $vars['body']        The main content of the page
 * @uses $vars['sysmessages'] A 2d array of various message registers, passed from system_messages()
 */

// render content before head so that JavaScript and CSS can be loaded. See #4032
$messages = elgg_view('page/elements/messages', array('object' => $vars['sysmessages']));
$title = elgg_extract('title', $vars, elgg_get_site_entity()->name);
$html5shiv = elgg_normalize_url('vendors/html5shiv.js');
$favicon = elgg_view('page/elements/shortcut_icon', $vars);
$css = '<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/united/bootstrap.min.css" rel="stylesheet">';

$login_url = elgg_get_site_url();
if (elgg_get_config('https_login')) {
	$login_url = str_replace("http:", "https:", $login_url);
}

$form = elgg_view_form('login', array('action' => "{$login_url}action/login", 'class' => 'form-horizontal'));
$admin_login = elgg_echo('admin:login');
$offline = elgg_echo('offline:maintenance');
$site = elgg_get_site_entity();
$message = $site->getPrivateSetting('elgg_maintenance_message');
$image = '<img src="'.elgg_get_site_url().'mod/twitter_bootstrap/graphics/maintenance.png" class="img-responsive" alt="Responsive image">';

$head = <<<__HEAD
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>$title</title>
	$favicon
	<!--[if lt IE 9]>
		<script src="$html5shiv"></script>
	<![endif]-->
	$css
__HEAD;

$body = <<<__BODY
<div class="container">
	<div class="header clearfix">
		<h3 class="text-muted">{$title}</h3>
	</div>
	<div class="jumbotron">
		<h1>{$offline}</h1>
        <p class="lead">{$message}</p>
	</div>
	<div class="row">
		<div class="col-lg-6">
			{$admin_login}
			<div class="well">
				<div class="form">
					{$form}
				</div>
			</div>
        </div>
		<div class="col-lg-6">
			{$image}
		</div>
	</div>
    <footer class="footer">
		<p>&copy; {$title} 2015</p>
    </footer>
</div> <!-- /container -->
__BODY;

echo elgg_view("page/elements/html", array('head' => $head, 'body' => $body));
