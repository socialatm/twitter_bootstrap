<?php
/**
 * Filter navigation menu - bootstrap specific
 *
 * @uses $vars['menu']['default']
 * @uses $vars['menu']['more']
 */

$default_items = elgg_extract('default', $vars['menu'], array());
if(elgg_get_context() == 'activity'){echo '<span>'.elgg_view('core/river/filter', array('selector' => $selector)).'</span>';}
echo '<ul class="nav nav-tabs">';
foreach ($default_items as $menu_item) {
	echo elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
}
echo '</ul>';