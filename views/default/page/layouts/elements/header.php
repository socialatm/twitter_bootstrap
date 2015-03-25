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
	'item_class' => 'btn btn-default',
	'class' => "btn-group",
));

if ($title || $buttons) {
	echo '<div class="row"><div class="col-md-7" id="page-title">'.elgg_view_title($vars['title']).'</div><div class="col-md-5" id="title-menu">'.$buttons.'</div></div>';
}
