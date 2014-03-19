<?php
/**
 * Elgg page header
 * In the default theme, the header lives between the topbar and main content area.
 */
 
if (elgg_get_plugin_setting('display_header_logo', 'twitter_bootstrap') == 'yes') {
	echo elgg_view('page/elements/header_logo', $vars);
	}
