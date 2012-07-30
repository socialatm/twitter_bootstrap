<?php
/**
 * Elgg page header
 * In the default theme, the header lives between the topbar and main content area.
 */
 
// drop-down login
//echo elgg_view('core/account/login_dropdown');

// link back to main site.
 echo elgg_view('page/elements/header_logo', $vars);

// insert site-wide navigation
echo elgg_view_menu('site');