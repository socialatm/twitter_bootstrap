<?php
/*****
 * Twitter bootstrap theme for Elgg	start page	
 * @elgg-release: 1.9.4
 *****/

elgg_register_event_handler('init', 'system', 'twitter_bootstrap_init');

function twitter_bootstrap_init() {

	// don't need it twice
	new TbsMenu;

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
	
	// register the css for the new uploader
	$tbs_upload_css = 'mod/twitter_bootstrap/views/default/css/upload/';
	elgg_register_css('jquery_fileupload_css', $tbs_upload_css.'jquery.fileupload.css');
	elgg_register_css('jquery_fileupload_ui_css', $tbs_upload_css.'jquery.fileupload-ui.css');
	
	// main js files for the uploader
	elgg_define_js('main',
		array(
			'src' => 'mod/twitter_bootstrap/views/default/js/jquery-file-upload/js/main.js',
			'deps' => array(
				'jquery.fileupload-ui',
				'tmpl',
				'load-image',
				'canvas-to-blob',
				'jquery.iframe-transport'
				)
			)
		);
					
	elgg_define_js('jquery.fileupload',
		array(
			'src' => 'mod/twitter_bootstrap/views/default/js/jquery-file-upload/js/jquery.fileupload.js',
			'deps' => array(
				'jquery',
				'jquery.ui.widget'
			)
		)
	);
	
	elgg_define_js('jquery.ui.widget',
		array(
			'src' => 'mod/twitter_bootstrap/views/default/js/jquery-file-upload/js/vendor/jquery.ui.widget.js',
			'deps' => array(
				'jquery',
			)
		)
	);
	
	elgg_define_js('tmpl', array('src' => 'mod/twitter_bootstrap/views/default/js/javascript-templates/js/tmpl.js'));
	elgg_define_js('load-image.all.min', array('src' => 'mod/twitter_bootstrap/views/default/js/javascript-load-image/js/load-image.all.min.js'));
	
	elgg_define_js('jquery.fileupload-image',
		array(
			'src' => 'mod/twitter_bootstrap/views/default/js/jquery-file-upload/js/jquery.fileupload-image.js',
			'deps' => array(
				'jquery',
				'load-image',
				'load-image-meta',
				'load-image-exif',
				'load-image-ios',
				'canvas-to-blob',
				'jquery.fileupload-process'
			)
		)								
	);
		
	elgg_define_js('jquery.iframe-transport',
		array(
			'src' => 'mod/twitter_bootstrap/views/default/js/jquery-file-upload/js/jquery.iframe-transport.js',
			'deps' => array(
				'jquery',
			)
		)
	);
	
	elgg_define_js('jquery.fileupload-validate',
		array(
			'src' => 'mod/twitter_bootstrap/views/default/js/jquery-file-upload/js/jquery.fileupload-validate.js',
			'deps' => array(
				'jquery',
				'jquery.fileupload-process'
			)
		)
	);
	
	elgg_define_js('jquery.fileupload-audio',
		array(
			'src' => 'mod/twitter_bootstrap/views/default/js/jquery-file-upload/js/jquery.fileupload-audio.js',
			'deps' => array(
				'jquery',
				'load-image',
				'jquery.fileupload-process'
			)
		)
	);
	
	elgg_define_js('jquery.fileupload-video',
		array(
			'src' => 'mod/twitter_bootstrap/views/default/js/jquery-file-upload/js/jquery.fileupload-video.js',
			'deps' => array(
				'jquery',
				'load-image',
				'jquery.fileupload-process'
			)
		)
	);
	
	elgg_define_js('canvas-to-blob', array('src' => 'mod/twitter_bootstrap/views/default/js/javascript-canvas-to-blob/js/canvas-to-blob.js'));
	elgg_define_js('jquery.fileupload-ui',
		array(
			'src' => 'mod/twitter_bootstrap/views/default/js/jquery-file-upload/js/jquery.fileupload-ui.js',
			'deps' => array(
				'jquery',
				'tmpl',
				'jquery.fileupload-image',
				'jquery.fileupload-audio',
				'jquery.fileupload-video',
				'jquery.fileupload-validate'
			)
		)
	);

	elgg_define_js('jquery.fileupload-process',
		array(
			'src' => 'mod/twitter_bootstrap/views/default/js/jquery-file-upload/js/jquery.fileupload-process.js',
			'deps' => array(
				'jquery',
				'jquery.fileupload'
			)
		)
	);
	
	elgg_define_js('load-image-meta',
		array(
			'src' => 'mod/twitter_bootstrap/views/default/js/javascript-load-image/js/load-image-meta.js',
			'deps' => array(
				'load-image'
			)
		)
	);
	
	elgg_define_js('load-image', array('src' => 'mod/twitter_bootstrap/views/default/js/javascript-load-image/js/load-image.js'));
	
	elgg_define_js('load-image-exif',
		array(
			'src' => 'mod/twitter_bootstrap/views/default/js/javascript-load-image/js/load-image-exif.js',
			'deps' => array(
				'load-image',
				'load-image-meta'
			)
		)
	);
	
	elgg_define_js('load-image-ios',
		array(
			'src' => 'mod/twitter_bootstrap/views/default/js/javascript-load-image/js/load-image-ios.js',
			'deps' => array(
				'load-image'
			)
		)
	);
		
	elgg_register_plugin_hook_handler('route', 'file', 'tbs_file_upload_handler');
	
	function tbs_file_upload_handler ($hook, $type, $result) {
		if($result['segments'][0] === 'add'){
			$vars['container_guid'] = $result['segments'][1];
			require_once('mod/twitter_bootstrap/pages/upload.php');
			die();
		}
	}
	
	$get_context = elgg_get_context();
	//we don't want bootstrap loading when in the admin area.
	if($get_context != 'admin'){
		elgg_load_css('bootstrap_css');
		elgg_load_css('bootstrap_css_theme');
		elgg_load_css('bootstrap_select_css');
		elgg_load_js('bootstrap');
		elgg_load_js('bootstrap_select');
		elgg_load_js('elgg.tbs');
	}
	
	// Register event handlers
	
	elgg_register_event_handler('pagesetup', 'system', 'tbs_pagesetup_handler', 1000);
	
	// Register plugin hook handlers
	
	// Register page handlers
	elgg_register_page_handler('login', 'tbs_user_account_page_handler');
	elgg_register_page_handler('register', 'tbs_user_account_page_handler');
	elgg_register_page_handler('forgotpassword', 'tbs_user_account_page_handler');
	elgg_register_page_handler('activity', '_tbs_river_page_handler');
	elgg_register_page_handler('profile', 'tbs_profile_page_handler');
	
	// Register actions
	$action_path = elgg_get_plugins_path() . 'twitter_bootstrap/actions';
		
	if(elgg_get_plugin_setting('require_email_login', 'twitter_bootstrap') === 'yes') {
		
		elgg_register_action('login', $action_path.'/login.php', 'public');
		elgg_register_action('register', $action_path.'/register.php', 'public');
		elgg_register_action('logout', $action_path.'/logout.php', '');
		elgg_register_action('comment/save', $action_path.'/comment/save.php', '');
	}	
	
	elgg_register_action('twitter_bootstrap/upload', $action_path.'/twitter_bootstrap/upload.php', '');
	
	// set site menu default activity to friends
	if(elgg_is_logged_in()){
		$item = new ElggMenuItem('activity', elgg_echo('activity'), 'activity/friends/'.elgg_get_logged_in_user_entity()->username);
		elgg_register_menu_item('site', $item);
	}
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

/**
 * Page handler for activity
 *
 * @param array $page
 * @return bool
 * @access private
 */
function _tbs_river_page_handler($page) {
	$base_dir = elgg_get_config('pluginspath')."twitter_bootstrap/" . 'pages';

	elgg_set_page_owner_guid(elgg_get_logged_in_user_guid());

	// make a URL segment available in page handler script
	$page_type = elgg_extract(0, $page, 'all');
	$page_type = preg_replace('[\W]', '', $page_type);
	if ($page_type == 'owner') {
		elgg_gatekeeper();
		$page_username = elgg_extract(1, $page, '');
		if ($page_username == elgg_get_logged_in_user_entity()->username) {
			$page_type = 'mine';
		} else {
			elgg_admin_gatekeeper();	// @TODO if we change this to elgg_atekeeper() will it only anyone with permission to view a users activity page?
			set_input('subject_username', $page_username);
		}
	}
	set_input('page_type', $page_type);

	require_once("$base_dir/river.php");
	return true;
}

function tbs_profile_page_handler($page) {

	$base_dir = elgg_get_config('pluginspath')."/profile/";

	if (isset($page[0])) {
		$username = $page[0];
		$user = get_user_by_username($username);
		elgg_set_page_owner_guid($user->guid);
	} elseif (elgg_is_logged_in()) {
		forward(elgg_get_logged_in_user_entity()->getURL());
	}

	// short circuit if invalid or banned username
	if (!$user || ($user->isBanned() && !elgg_is_admin_logged_in())) {
		register_error(elgg_echo('profile:notfound'));
		forward();
	}

	$action = NULL;
	if (isset($page[1])) {
		$action = $page[1];
	}

	if ($action == 'edit') {
		// use the core profile edit page
		require elgg_get_config('pluginspath')."twitter_bootstrap/pages/profile/edit.php";
		return true;
	}
	
	if(elgg_get_plugin_setting('profile2', 'twitter_bootstrap') != 'yes') {
	
		$content = elgg_view('profile/layout', array('entity' => $user));
	$body = elgg_view_layout('one_column', array(
		'content' => $content
	));
	echo elgg_view_page($user->name, $body);
	return true;
	}

	include $base_dir.'pages/profile/index.php'; 
	return true;
}
