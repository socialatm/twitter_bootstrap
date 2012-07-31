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
	elgg_register_js('custom_js', $custom_js);
	
	//we use google jquery instead of Elgg's as it is more up-to-date and required for bootstrap
	$google_jquery = 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js';
	elgg_register_js('google_jquery', $google_jquery, 'head', 10);
	
	//register bootstrap css and js
	$bootstrap_js = 'mod/twitter_bootstrap/vendors/bootstrap/js/bootstrap.min.js';
	elgg_register_js('bootstrap', $bootstrap_js, 'footer');
	
	$bootstrap_css = 'mod/twitter_bootstrap/vendors/bootstrap/css/bootstrap.min.css';
	elgg_register_css('bootstrap_css', $bootstrap_css, 10);
	
	$bootstrap_css_resp = 'mod/twitter_bootstrap/vendors/bootstrap/css/bootstrap-responsive.min.css';
	elgg_register_css('bootstrap_css_resp', $bootstrap_css_resp, 10);

	//unregister internal jquery as we will link to Google to get the latest library, required for bootstrap
	elgg_unregister_js('jquery');
	//elgg_unregister_js('jquery-ui');
	
	//load ibraries @todo not sure if this is the best place to do this?
	elgg_load_js('google_jquery');
		
	$get_context = elgg_get_context();
	if($get_context != 'admin'){
		elgg_load_js('bootstrap');
		elgg_load_js('custom_js');
		elgg_load_css('bootstrap_css');
		elgg_load_css('bootstrap_css_resp');
	}
	
	/**
	 * Custom menus
	 **/
	elgg_register_event_handler('pagesetup', 'system', 'bootstrap_theme_pagesetup_handler', 1000);
	
	//Elgg only includes the search bar in the header by default,
	//but I am not sure where the best location is yet - header, topbar or... ?
	if (elgg_is_active_plugin('search')) {
		//elgg_extend_view('page/elements/topbar', 'search/search_box');
		elgg_unextend_view('page/elements/header', 'search/search_box');
	}
	
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