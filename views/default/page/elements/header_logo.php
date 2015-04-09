<?php
/**
 * Elgg header logo
 */

$site = elgg_get_site_entity();
$site_name = $site->name;
$site_description = $site->description;
$site_url = elgg_get_site_url();
$logo = '<img src="'.$site_url.'mod/twitter_bootstrap/responsive.png" alt="'.$site_name.'" class="img-responsive" id="tbs_logo" />';
$message = elgg_get_plugin_setting('tbs_header_news', 'twitter_bootstrap');
?>
<div class="row">
  <div class="col-md-3">
	<a class="" href="<?php echo $site_url; ?>">
		<?php echo $logo; ?>
	</a>
  </div>
  <div class="col-md-9">
		<?php echo $message; ?>
  </div>
</div>
