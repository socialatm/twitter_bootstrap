<?php
/**
 * Header for layouts
 *
 * @uses $vars['title']  Title
 * @uses $vars['header'] Optional override for the header
 */

if (isset($vars['header'])) {
	echo '<div class="elgg-head clearfix">';
	echo $vars['header'];
	echo '</div>';
	return;
}

$title = elgg_extract('title', $vars, '');

$buttons = elgg_view_menu('title', array(
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz btn btn-default',
));

if ($title || $buttons) {
	echo '<div class="row"><div class="col-md-9">'.elgg_view_title($vars['title'], array('class' => 'elgg-heading-main')).'</div><div class="col-md-3">'.$buttons.'</div></div>';
}
