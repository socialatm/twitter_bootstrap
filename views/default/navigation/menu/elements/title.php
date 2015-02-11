<?php
/**
 * Menu group
 *
 * @uses $vars['items']                Array of menu items
 * @uses $vars['class']                Additional CSS class for the section
 * @uses $vars['name']                 Name of the menu
 * @uses $vars['item_class']           Additional CSS class for each menu item
 */
 
$items = elgg_extract('items', $vars, array());
$class = elgg_extract('class', $vars, '');
$item_class = elgg_extract('item_class', $vars, '');

echo '<div class="'.$class.' pull-right" role="group" aria-label="...">';

if (is_array($items)) {
	foreach ($items as $menu_item) {
		echo '<a class="'.$item_class.'" href="'.$menu_item->getHref().'" role="group">'.$menu_item->getText().'</a>';
	}
}
echo '</div>';
