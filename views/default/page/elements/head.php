<?php
/**
 * The standard HTML head
 *
 * @uses $vars['title'] The page title
 */

// Set title
if (empty($vars['title'])) {
	$title = elgg_get_config('sitename');
} else {
	$title = elgg_get_config('sitename') . ": " . $vars['title'];
}

global $autofeed;
if (isset($autofeed) && $autofeed == true) {
	$url = current_page_url;
	if (substr_count($url,'?')) {
		$url .= "&view=rss";
	} else {
		$url .= "?view=rss";
	}
	$url = elgg_format_url($url);
	$feedref = <<<END

	<link rel="alternate" type="application/rss+xml" title="RSS" href="{$url}" />

END;
} else {
	$feedref = "";
}

$js = elgg_get_loaded_js('head');
$css = elgg_get_loaded_css();

$version = elgg_get_version();
$release = elgg_get_version(true);
?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="ElggRelease" content="<?php echo $release; ?>" />
	<meta name="ElggVersion" content="<?php echo $version; ?>" />
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php echo elgg_view('page/elements/shortcut_icon', $vars); ?>

<?php foreach ($css as $link) { ?>
	<link rel="stylesheet" href="<?php echo $link; ?>" type="text/css" />
<?php } ?>

<script type="text/javascript">
// <![CDATA[
	<?php echo elgg_view('js/initialize_elgg'); ?>
// ]]>
</script>

<?php foreach ($js as $script) { ?>
	<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php } ?>

<?php
echo $feedref;

$metatags = elgg_view('metatags', $vars);
if ($metatags) {
	elgg_deprecated_notice("The metatags view has been deprecated. Extend page/elements/head instead", 1.8);
	echo $metatags;
}