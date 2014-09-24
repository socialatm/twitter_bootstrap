<?php
/*****	Twitter bootstrap theme for Elgg	start page	*****/

elgg_register_event_handler('init', 'system', 'twitter_bootstrap_init');

function twitter_bootstrap_init() {

	//include twitter bootstrap css
	elgg_extend_view('css/elgg', 'twitter_bootstrap/css');
	
	//register bootstrap css and js
	$bootstrap_js = 'mod/twitter_bootstrap/vendors/bootstrap/js/bootstrap.min.js';
	elgg_register_js('bootstrap', $bootstrap_js, 'footer');
	
	$bootstrap_css = 'mod/twitter_bootstrap/vendors/bootstrap/css/bootstrap.min.css';
	elgg_register_css('bootstrap_css', $bootstrap_css );
	
	$bootstrap_css_theme = 'mod/twitter_bootstrap/vendors/bootstrap/css/bootstrap-theme.min.css';
	elgg_register_css('bootstrap_css_theme', $bootstrap_css_theme );
	
	//register bootstrap-select css and js
	$bootstrap_select_js = 'mod/twitter_bootstrap/vendors/bootstrap-select/js/bootstrap-select.min.js';
	elgg_register_js('bootstrap_select', $bootstrap_select_js, 'footer');
	
	$bootstrap_select_css = 'mod/twitter_bootstrap/vendors/bootstrap-select/css/bootstrap-select.min.css';
	elgg_register_css('bootstrap_select_css', $bootstrap_select_css );
	
	// register twitter bootstrap JavaScript
	$tbs_js = elgg_get_simplecache_url('js', 'twitter_bootstrap/tbs');
	elgg_register_simplecache_view('js/twitter_bootstrap/tbs');
	elgg_register_js('elgg.tbs', $tbs_js, 'footer');

	$get_context = elgg_get_context();
	//we don't want bootstrap loading when in the admin area.
	if($get_context != 'admin'){
		elgg_load_js('bootstrap');
		elgg_load_css('bootstrap_css');
		elgg_load_css('bootstrap_css_theme');
		elgg_load_js('bootstrap_select');
		elgg_load_css('bootstrap_select_css');
		elgg_load_js('elgg.tbs');
	}
	
	// Register event handlers
	
	elgg_register_event_handler('pagesetup', 'system', 'tbs_pagesetup_handler', 1000);
	
	// Register plugin hook handlers
	
	// Register page handlers
	elgg_register_page_handler('login', 'tbs_user_account_page_handler');
	elgg_register_page_handler('register', 'tbs_user_account_page_handler');
	elgg_register_page_handler('forgotpassword', 'tbs_user_account_page_handler');
	
	// Register actions
	if(elgg_get_plugin_setting('require_email_login', 'twitter_bootstrap') === 'yes') {
		$action_path = elgg_get_plugins_path() . 'twitter_bootstrap/actions';
		elgg_register_action('login', $action_path.'/login.php', 'public');
		elgg_register_action('register', $action_path.'/register.php', 'public');
		elgg_register_action('logout', $action_path.'/logout.php', '');
		elgg_register_action('comment/save', $action_path.'/comment/save.php', '');
	}	
	
	// set site menu default activity to friends
	$item = new ElggMenuItem('activity', elgg_echo('activity'), 'activity/friends/'.elgg_get_logged_in_user_entity()->username);
	elgg_register_menu_item('site', $item);
}

function tbs_pagesetup_handler() {
	
	$owner = elgg_get_page_owner_entity();
	$user = elgg_get_logged_in_user_entity();

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

		$text = '<span>'.elgg_echo('messages').'</span>';
		$tooltip = elgg_echo("messages");
		
		// get unread messages
		$num_messages = (int)messages_count_unread();
		if ($num_messages != 0) {
						
			$text = '<span style="color: #fff">'.elgg_echo('messages').' <i class="glyphicon glyphicon-envelope icon-white" ></i> ['.$num_messages.'] </span>';
			$tooltip .= " [" . elgg_echo("messages:unreadcount", array($num_messages)) . "] ";
		}
			elgg_unregister_menu_item('topbar', 'messages');
			elgg_register_menu_item('topbar', array(
				'name' => 'messages',
				'priority' => 1000,
				'text' => $text,
				'href' => 'messages/inbox/'.elgg_get_logged_in_user_entity()->username,
				'title' => $tooltip,
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

/**
 * Page handler for account related pages
 *
 * @param array  $page_elements Page elements
 * @param string $handler The handler string
 *
 * @return bool
 * @access private
 */
function tbs_user_account_page_handler($page_elements, $handler) {
	
	$base_dir = elgg_get_config('pluginspath')."twitter_bootstrap/" . 'pages/account';
	switch ($handler) {
		case 'login':
			require_once("$base_dir/login.php");
			break;
		case 'forgotpassword':
			require_once("$base_dir/forgotten_password.php");
			break;
		case 'register':
			require_once("$base_dir/register.php");
			break;
		default:
			return false;
	}
	return true;
}
