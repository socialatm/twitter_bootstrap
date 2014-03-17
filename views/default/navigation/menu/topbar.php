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

if(elgg_is_logged_in()){
//required for responsive
echo <<<HTML
		<a class="btn navbar-btn" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="glyphicon glyphicon-bar"></span>
            <span class="glyphicon .glyphicon-bar"></span>
            <span class="glyphicon .glyphicon-bar"></span>
         </a>
HTML;

}

//output site title
echo '<a href="'.$site_url.'" class="navbar-brand">'.$site_name.'</a>';

if(elgg_is_logged_in()){

//personal dropdown menu
echo <<<HTML
		<div class="btn-group pull-right"><!--open button group -->
		<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="glyphicon glyphicon-user icon-white"></i> $username
            <span class="caret"></span>
        </a>
HTML;

//dropdown contents
echo '<ul class="dropdown-menu">';

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

echo '</ul>';
echo '</div><!-- /button group -->';

}else{

	echo '<div class="btn-group pull-right"><!--open button group -->
			<a class="btn btn-primary" href="'.$CONFIG->url.'login">
				<i class="glyphicon glyphicon-asterisk icon-white"></i>'.
				$username.'
			</a>
		</div>';
}

//create the logo and tools menu
echo '<div class="navbar-collapse navbar-collapse-margin-issue">';
echo '<ul class="nav">';
foreach ($default_items as $menu_item) {
	echo elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
}
echo '</ul>';
echo '</div>';
