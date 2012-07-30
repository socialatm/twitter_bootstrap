<?php
/**
 * Topbar navigation menu - bootstrap specific
 *
 * @uses $vars['menu']['default']
 * @uses $vars['menu']['alt']
 */

$default_items = elgg_extract('default', $vars['menu'], array());
$alt_items = elgg_extract('alt', $vars['menu'], array());
$user = elgg_get_logged_in_user_entity();
$username = $user->name;
if(!$username){
	$username = elgg_echo('login');
}
$site = elgg_get_site_entity();
$site_name = $site->name;
$site_url = $site->url;

//required for responsive
echo <<<HTML
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </a>
HTML;


//output site title
echo '<a href="'.$site_url.'" class="brand">'.$site_name.'</a>';

//personal dropdown menu
echo <<<HTML
		<div class="btn-group pull-right"><!--open button group -->
		<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-user icon-white"></i> $username
            <span class="caret"></span>
        </a>
		
HTML;

//dropdown contents
echo '<ul class="dropdown-menu">';

if(elgg_is_logged_in()){
	foreach ($alt_items as $menu_item) {
		echo elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
	}

	if ($more_items) {
		echo elgg_view('navigation/menu/elements/section', array(
			'class' => 'elgg-menu elgg-menu-site elgg-menu-site-more dropdown-menu', 
			'items' => $more_items,
		));
		echo '<li class="divider"></li>';
	}
}else{
	echo '<li class="dropdown" style="padding:10px">';
	echo elgg_view_form('login');
	echo '</li>';
}
echo '</ul>';
echo '</div><!-- /button group -->';

//create the logo and tools menu
echo '<div class="nav-collapse nav-collapse-margin-issue">';
echo '<ul class="nav">';
foreach ($default_items as $menu_item) {
	echo elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
}
echo '</ul>';
echo '</div>';
