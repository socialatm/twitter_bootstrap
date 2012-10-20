<?php
/**
 * Twitter bootstrap theme for Elgg
 * 
 */

elgg_register_event_handler('init', 'system', 'twitter_bootstrap_init');

function twitter_bootstrap_init() {

	//include custom css for this theme
	elgg_extend_view('css/elgg', 'twitter_bootstrap/css');

	//custom js 
	$custom_js = 'mod/twitter_bootstrap/views/default/twitter_bootstrap/custom.js';
	elgg_register_js('custom_js', $custom_js, 'footer', 602);
	
	//bootstrapx-clickover	please see > https://github.com/lecar-red/bootstrapx-clickover
	$bootstrapx_clickover = 'mod/twitter_bootstrap/vendors/bootstrapx-clickover/js/bootstrapx-clickover.js';
	elgg_register_js('bootstrapx_clickover', $bootstrapx_clickover, 'footer', 601);
	
	//we use google jquery instead of Elgg's as it is more up-to-date and required for bootstrap
	$google_jquery = 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js';
	elgg_register_js('jquery', $google_jquery);
	
	//register bootstrap css and js
	$bootstrap_js = 'mod/twitter_bootstrap/vendors/bootstrap/js/bootstrap.min.js';
	elgg_register_js('bootstrap', $bootstrap_js, 'footer', 600);
	
	$bootstrap_css = 'mod/twitter_bootstrap/vendors/bootstrap/css/bootstrap.min.css';
	elgg_register_css('bootstrap_css', $bootstrap_css, 10);
	
	$bootstrap_css_resp = 'mod/twitter_bootstrap/vendors/bootstrap/css/bootstrap-responsive.min.css';
	elgg_register_css('bootstrap_css_resp', $bootstrap_css_resp, 10);

	$get_context = elgg_get_context();
	//we don't want bootstrap loading when in the admin area, not sure this is the best way to do this
	//@todo find out the best approach - perhaps this should be in the pagesetup_handler?
	if($get_context != 'admin'){
		elgg_load_js('bootstrap');
		elgg_load_js('bootstrapx_clickover');
		elgg_load_js('custom_js');
		elgg_load_css('bootstrap_css');
		elgg_load_css('bootstrap_css_resp');
	}
	
	/**
	 * Custom menus
	 **/
	elgg_register_event_handler('pagesetup', 'system', 'bootstrap_theme_pagesetup_handler', 1000);
	elgg_register_page_handler('activity', 'tb_elgg_river_page_handler');
	elgg_register_plugin_hook_handler('register', 'menu:annotation', 'tb_annotation_menu_setup');
	elgg_unregister_plugin_hook_handler('register', 'menu:river', 'elgg_river_menu_setup');
	elgg_register_plugin_hook_handler('register', 'menu:river', 'twitter_bootstrap_river_menu_setup');
	
	// Register some actions
	$action_base = elgg_get_plugins_path() . 'twitter_bootstrap/actions/pages';
	elgg_register_action("pages/river", "$action_base/river.php");
}

function bootstrap_theme_pagesetup_handler() {
	
	$owner = elgg_get_page_owner_entity();
	$user = elgg_get_logged_in_user_entity();

	/**
	 * TOPBAR customizations
	 */
	 
	elgg_unregister_menu_item('topbar', 'elgg_logo');

	if (elgg_is_active_plugin('reportedcontent')) {
		elgg_unregister_menu_item('footer', 'report_this');

		//@todo figure out where to place this
		
		$href = "javascript:elgg.forward('reportedcontent/add'";
		$href .= "+'?address='+encodeURIComponent(location.href)";
		$href .= "+'&title='+encodeURIComponent(document.title));";
			
		elgg_register_menu_item('footer', array(
			'name' => 'report_this',
			'href' => $href,
			'text' => elgg_view_icon('report-this') . elgg_echo('reportedcontent:this'),
			'title' => elgg_echo('reportedcontent:this:tooltip'),
			'priority' => 10,
		));
	}

	if(elgg_is_logged_in()){
	
		if (elgg_is_active_plugin('profile')) {
			elgg_unregister_menu_item('topbar', 'profile');
			elgg_register_menu_item('topbar', array(
				'href' => "/profile/$user->username",
				'name' => 'profile',
				'text' => elgg_echo('profile'),
				'priority' => 3,
			));
		}
		
		elgg_unregister_menu_item('topbar', 'friends');
		elgg_register_menu_item('topbar', array(
			'href' => "/friends/$user->username",
			'name' => 'friends',
			'text' => elgg_echo('friends')
		));
		
		if (elgg_is_active_plugin('messages')) {
			elgg_unregister_menu_item('topbar', 'messages');
			elgg_register_menu_item('topbar', array(
				'name' => 'messages',
				'priority' => 1000,
				'text' => elgg_echo('messages'),
				'href' => "/messages/inbox/$user->username",
				'link_class' => '',
				//'contexts' => array('profile'),
			));
		}

		//redo user dropdown in topbar to remove logos and provide opportunity to style
		if(elgg_is_admin_logged_in()){
			elgg_unregister_menu_item('topbar', 'administration');
			elgg_register_menu_item('topbar', array(
				'href' => '/admin',
				'name' => 'administration',
				'section' => 'alt',
				'text' => elgg_echo('admin'),
			));
		}
		elgg_unregister_menu_item('topbar', 'usersettings');
		elgg_register_menu_item('topbar', array(
			'href' => "/settings/user/$user->username",
			'name' => 'usersettings',
			'section' => 'alt',
			'text' => elgg_echo('settings'),
		));
		if (elgg_is_active_plugin('dashboard') && elgg_is_logged_in()) {
			elgg_unregister_menu_item('topbar', 'dashboard');
			elgg_register_menu_item('topbar', array(
				'href' => '/dashboard',
				'name' => 'dashboard',
				'section' => 'alt',
				'text' => elgg_echo('dashboard'),
			));
		}

	}//end if statement
}

function tb_elgg_river_page_handler($page) {
global $CONFIG;

	elgg_set_page_owner_guid(elgg_get_logged_in_user_guid());

	// make a URL segment available in page handler script
	$page_type = elgg_extract(0, $page, 'all');
	$page_type = preg_replace('[\W]', '', $page_type);
	if ($page_type == 'owner') {
		$page_type = 'mine';
	}
	set_input('page_type', $page_type);

	// content filter code here
	$entity_type = '';
	$entity_subtype = '';

	require_once("{$CONFIG->pluginspath}twitter_bootstrap/pages/river.php");
	return true;
}

/**
 * Adds a delete link to "generic_comment" annotations
 * @access private
 */
function tb_annotation_menu_setup($hook, $type, $return, $params) {
	$annotation = $params['annotation'];

	if ($annotation->name == 'generic_comment' && $annotation->canEdit()) {
		$url = elgg_http_add_url_query_elements('action/comments/delete', array(
			'annotation_id' => $annotation->id,
		));

		$options = array(
			'name' => 'delete',
			'href' => $url,
			'text' => "<span class=\"close\">&times;</span>",
			'confirm' => elgg_echo('deleteconfirm'),
			'encode_text' => false
		);
		$return[] = ElggMenuItem::factory($options);
	}

	return $return;
}

/**
 * Add the comment and like links to river actions menu
 * @access private
 */
function twitter_bootstrap_river_menu_setup($hook, $type, $return, $params) {
	if (elgg_is_logged_in()) {
		$item = $params['item'];
		$object = $item->getObjectEntity();
		// comments and non-objects cannot be commented on or liked
				
		if (elgg_is_admin_logged_in()) {
			$options = array(
				'name' => 'delete',
				'href' => "action/river/delete?id=$item->id",
				'text' => elgg_view_icon('delete'),
				'title' => elgg_echo('delete'),
				'confirm' => elgg_echo('deleteconfirm'),
				'is_action' => true,
				'priority' => 200,
			);
			$return[] = ElggMenuItem::factory($options);
		}
	}

	return $return;
}