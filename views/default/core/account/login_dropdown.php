<?php
/**
 * Elgg drop-down login form
 */

if (elgg_is_logged_in()) {
	return true;
}

$login_url = elgg_get_site_url();
if (elgg_get_config('https_login')) {
	$login_url = str_replace("http:", "https:", elgg_get_site_url());
}

$body = elgg_view_form('login', array('action' => "{$login_url}action/login"), array('returntoreferer' => TRUE));
?>
<div class="btn-group pull-right">
	<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
	<i class="glyphicon glyphicon-lock"></i> | Login
	<span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
		<li class="dropdown" style="padding:10px;">
			<?php 
				echo $body;
			?>
		</li>
	</ul>
</div>
