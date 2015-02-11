<?php
/**
 * Title menu
 *
 * @uses $vars['name']                 Name of the menu
 * @uses $vars['menu']                 Array of menu items
 * @uses $vars['class']                Additional CSS class for the menu
 * @uses $vars['item_class']           Additional CSS class for each menu item
 */
 
// we want css classes to use dashes
$vars['name'] = preg_replace('/[^a-z0-9\-]/i', '-', $vars['name']);
$item_class = elgg_extract('item_class', $vars, '');
$class = " {$vars['class']}";

foreach ($vars['menu'] as $section => $menu_items) {
	echo elgg_view('navigation/menu/elements/title', array(
		'items' => $menu_items,
		'class' => $class,
		'name' => $vars['name'],
		'item_class' => $item_class
	));
}
