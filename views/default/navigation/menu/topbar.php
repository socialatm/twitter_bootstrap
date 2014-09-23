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

/*****	Right Side Menu	*****/

if(elgg_is_logged_in()){
	$username = '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> '.$username.' <b class="caret"></b></a>';
	$username .= '<ul class="dropdown-menu">';
		foreach ($alt_items as $menu_item) {
			$username .= elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
		}
	$username .= '</ul>';
}else{
	$username = '<a href="'.elgg_get_config('url').'login" class=" "><i class="glyphicon glyphicon-lock"></i> '.$username.' </a>';
}

/*****	end Right Side Menu	*****/

/***** Topbar main menu	*****/

$topbar_main_menu = '';

foreach ($default_items as $menu_item) {
	$topbar_main_menu .= elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
}

/***** end Topbar main menu	*****/

/***** Bootstrap 3	*****/
$new_topbar = '<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			<a class="navbar-brand" href="'.$site_url.'">'.$site_name.'</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					'.$topbar_main_menu.'
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						'.$username.'
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
    </div>';
echo $new_topbar;
/*****	END Bootstrap 3	*****/
