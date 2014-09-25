<?php
/**
 * twitter bootstrap sidebar contents
 * @uses $vars['sidebar'] Optional content that is displayed at the bottom of sidebar
 * anything you add here will show on all twitter bootstrap sidebars
 */


	echo elgg_view_menu('extras', array(
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

	echo elgg_view('page/elements/owner_block', $vars);

	echo elgg_view_menu('page', array('sort_by' => 'name'));

	echo elgg_view('page/elements/comments_block', array(
		'subtypes' => '',
		'owner_guid' => elgg_get_page_owner_guid(),
	));


// optional 'sidebar' parameter
if (isset($vars['sidebar'])) {
	echo $vars['sidebar'];
}
