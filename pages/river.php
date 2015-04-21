<?php
/**
 * Main activity stream list page
 */
 
gatekeeper();
$options = array();

if(elgg_get_plugin_setting('river_post', 'twitter_bootstrap') === 'yes') {
	if (elgg_is_logged_in()) {
		// prepare the form
		$content = elgg_view_form('status/save', array('name' => 'riverjax', 'id' => 'riverjax'), $vars);
	}
}

$num_entries = elgg_get_plugin_setting('num_entries', 'twitter_bootstrap');
$options = array(
	'limit' => (int) max(get_input('limit', $num_entries), 0),
);

$page_type = preg_replace('[\W]', '', get_input('page_type', 'all'));
$type = preg_replace('[\W]', '', get_input('type', 'all'));
$subtype = preg_replace('[\W]', '', get_input('subtype', ''));
if ($subtype) {
	$selector = "type=$type&subtype=$subtype";
} else {
	$selector = "type=$type";
}

if ($type != 'all') {
	$options['type'] = $type;
	if ($subtype) {
		$options['subtype'] = $subtype;
	}
}

switch ($page_type) {
	case 'mine':
		$title = elgg_echo('river:mine');
		$page_filter = 'mine';
		$options['subject_guid'] = elgg_get_logged_in_user_guid();
		break;
	case 'owner':
		$subject_username = get_input('subject_username', '', false);
		$subject = get_user_by_username($subject_username);
		if (!$subject) {
			register_error(elgg_echo('river:subject:invalid_subject'));
			forward('');
		}
		$title = elgg_echo('river:owner', array(htmlspecialchars($subject->name, ENT_QUOTES, 'UTF-8', false)));
		$page_filter = 'subject';
		$options['subject_guid'] = $subject->guid;
		break;
	case 'friends':
		$title = elgg_echo('river:friends');
		$page_filter = 'friends';
		$options['relationship_guid'] = elgg_get_logged_in_user_guid();
		$options['relationship'] = 'friend';
		break;
	default:
		$title = elgg_echo('river:public');
		$page_filter = 'all';
		break;
}

$activity = elgg_list_river($options);
if (!$activity) {
	$activity = elgg_echo('river:none');
}

if (elgg_get_context() == 'activity'){
    elgg_extend_view('page/elements/sidebar', 'page/elements/comments_block', '501');  
}

$params = array(
	'title' => '<h3>'.$title.'</h3>',
	'content' => $content.$activity,
	'filter_context' => $page_filter,
	'class' => 'elgg-river-layout',
);

$body = elgg_view_layout('content', $params);
elgg_require_js("my/status");
echo elgg_view_page($title, $body);
