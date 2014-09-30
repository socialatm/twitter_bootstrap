<?php
/**
 * Profile owner block
 */

$user = elgg_get_page_owner_entity();

if (!$user) {
	// no user so we quit view
	echo elgg_echo('viewfailure', array(__FILE__));
	return TRUE;
}

$icon = elgg_view_entity_icon($user, 'large', array(
	'use_hover' => false,
	'use_link' => false,
));

// grab the actions and admin menu items from user hover
$menu = elgg_trigger_plugin_hook('register', "menu:user_hover", array('entity' => $user), array());
$builder = new ElggMenuBuilder($menu);
$menu = $builder->getMenu();
$actions = elgg_extract('action', $menu, array());
$admin = elgg_extract('admin', $menu, array());

$profile_actions = '';
if (elgg_is_logged_in() && $actions) {
	$profile_actions = '<ul class="elgg-menu profile-action-menu mvm clearfix">';
	foreach ($actions as $action) {
		$profile_actions .= '<li>' . elgg_view_menu_item($action, array('class' => 'btn btn-primary')) . '</li>';
	}
	$profile_actions .= '</ul>';
}

// if admin, display admin links
$admin_links = '';
if (elgg_is_admin_logged_in() && elgg_get_logged_in_user_guid() != elgg_get_page_owner_guid()) {
	$text = elgg_echo('admin:options');

$admin_links .= '
<div class="panel panel-default">
	<div class="panel-body">
		<ul class="nav">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					'.$text.'<span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">';
					foreach ($admin as $menu_item) {
						$admin_links .= elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
						}
$admin_links .= '
				</ul>
			</li>
		</ul>
	</div>
</div>';
}

// content links
$content_menu = elgg_view_menu('owner_block', array(
	'entity' => elgg_get_page_owner_entity(),
	'class' => 'nav',
));

echo <<<HTML
	<div id="profile-owner-block" class="well">
		$icon
		$profile_actions
		$content_menu
		$admin_links
	</div>
HTML;
