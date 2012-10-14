<?php
/**
 * Site navigation menu
 *
 * @uses $vars['menu']['default']
 * @uses $vars['menu']['more']
 */

$default_items = elgg_extract('default', $vars['menu'], array());
$more_items = elgg_extract('more', $vars['menu'], array());

echo <<<HTML
	<div class="navbar">
    <div class="navbar-inner">
    <ul class="nav">
HTML;
foreach ($default_items as $menu_item) {
	echo elgg_view('navigation/menu/elements/item', array('item' => $menu_item)).'<li class="divider-vertical"></li>';
}
if ($more_items) {
	echo '<li class="elgg-more dropdown">';
	$more = elgg_echo('more');
	echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$more .' <b class="caret white"></b></a>';
	echo elgg_view('navigation/menu/elements/section', array(
		'class' => 'elgg-menu elgg-menu-site elgg-menu-site-more dropdown-menu', 
		'items' => $more_items,
	));
	echo '</li>';
	}
	
	$search = elgg_echo('search');
	
echo '</ul><form class="form-search navbar-search pull-right" action="'.elgg_get_site_url().'search" method="get">';
echo <<<HTML
	<div class="input-append">
    <input type="text" class="search-query" placeholder="" name="q">
	<button type="submit" class="btn">{$search}</button>
	</div>
	<input type="hidden" name="search_type" value="all" />
    </form>
	</div>
    </div>
HTML;


    



