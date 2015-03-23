<?php
/**
 * Elgg sidebar contents
 *
 * @uses $vars['sidebar'] Optional content that is displayed at the bottom of sidebar
 */

echo elgg_view_menu('extras', array(
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

$context = elgg_get_context();

switch ($context) {
    case 'profile':
		$params = array(
			'num_columns' => 1,
		);
		echo elgg_view_layout('widgets', $params);
		break;
    case 'activity':
        $type = preg_replace('[\W]', '', get_input('type', 'all'));
		$subtype = preg_replace('[\W]', '', get_input('subtype', ''));
		if ($subtype) {
			$selector = "type=$type&subtype=$subtype";
		} else {
			$selector = "type=$type";
		}
	
		echo '<h3 class="media-heading">'.elgg_echo('activity:filter').'</h3>';
		echo elgg_view('core/river/filter', array('selector' => $selector));
		
		echo elgg_view('page/elements/owner_block', $vars);
		echo elgg_view_menu('page', array('sort_by' => 'name'));
        break;
	default:
		echo elgg_view('page/elements/owner_block', $vars);
		echo elgg_view_menu('page', array('sort_by' => 'name'));

		// optional 'sidebar' parameter
		if (isset($vars['sidebar'])) {
			echo $vars['sidebar'];
		}
}
