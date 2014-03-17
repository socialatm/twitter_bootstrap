<?php
/**
 * Site navigation menu
 *
 * @uses $vars['menu']['default']
 * @uses $vars['menu']['more']
 */

$default_items = elgg_extract('default', $vars['menu'], array());
$more_items = elgg_extract('more', $vars['menu'], array());
$search = elgg_echo('search');
$more = elgg_echo('more');

/***** start featured menu	*****/
$featured_menu = '';
foreach ($default_items as $menu_item) {
	$featured_menu .= elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
}
/*****	END featured menu	*****/

/*****	start more menu	*****/
$more_menu = '';
if ($more_items){
	$more_menu .= elgg_view('navigation/menu/elements/section', array(
		'class' => 'dropdown-menu', 
		'items' => $more_items,
		));
	}
/*****	End more menu	*****/

/*****	new site navbar	*****/

$site_navbar = '<!-- Static navbar -->
	<div class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					'.$featured_menu.'
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$more.' <b class="caret"></b></a>
						'.$more_menu.'
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<form class="navbar-form navbar-left" role="search" action="'.elgg_get_site_url().'search" method="get">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="'.$search.'" name="q" />
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary">'.$search.'</button>
							</span>
						</div>
						<input type="hidden" name="search_type" value="all" />
					</form>
				</ul>
			</div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	</div>';
	  
echo $site_navbar;
