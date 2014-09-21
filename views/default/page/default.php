<?php
/**
 * Elgg pageshell
 * The standard HTML page shell that everything else fits into
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['title']       The page title
 * @uses $vars['body']        The main content of the page
 * @uses $vars['sysmessages'] A 2d array of various message registers, passed from system_messages()
 */

// backward compatability support for plugins that are not using the new approach
// of routing through admin. See reportedcontent plugin for a simple example.
if (elgg_get_context() == 'admin') {
	if (get_input('handler') != 'admin') {
		elgg_deprecated_notice("admin plugins should route through 'admin'.", 1.8);
	}
	elgg_admin_add_plugin_settings_menu();
	elgg_unregister_css('elgg');
	echo elgg_view('page/admin', $vars);
	return true;
}

// render content before head so that JavaScript and CSS can be loaded. See #4032
$topbar = elgg_view('page/elements/topbar', $vars);
$messages = elgg_view('page/elements/messages', array('object' => $vars['sysmessages']));
$header = elgg_view('page/elements/header', $vars);
$body = elgg_view('page/elements/body', $vars);
$footer = elgg_view('page/elements/footer', $vars);

// Set the content type
header("Content-type: text/html; charset=UTF-8");

$lang = get_current_language();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>">
<head>
<?php echo elgg_view('page/elements/head', $vars); ?>
</head>
<body>
 	<?php echo $topbar; ?>
	<div class="container">
		<div class="row elgg-page-messages" id="system_messages">	
			<div class="col-md-10 col-md-offset-1">
				<?php echo $messages; ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 elgg-page-header">
				<?php echo $header; ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 site-navbar">
				<?php echo elgg_view_menu('site'); ?>
			</div>
		</div>
		<div class="row" id="tbs-content">
			<div class="col-md-12">
				<?php echo $body; ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="elgg-page-footer row">
			<div class="elgg-inner col-md-12">
				<?php echo $footer; ?>
			</div>
		</div>
	</div>
<?php echo elgg_view('page/elements/foot'); ?>
</body>
</html>