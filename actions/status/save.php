<?php
/*****
 * Save a Status Update
 * @elgg-release: 1.9.1
 *****/
 
$htmlawed_config = array(
		// seems to handle about everything we need.
		'safe' => true,
		// remove comments/CDATA instead of converting to text
		'comment' => 1,
		'cdata' => 1,
		'deny_attribute' => 'class, on*',
		'hook_tag' => 'htmlawed_tag_post_processor',
		'schemes' => '*:http,https,ftp,news,mailto,rtsp,teamspeak,gopher,mms,callto',
	);
 
$title = elgg_echo('item:object:status');
$description = get_input('description', null, false);
$access_id = get_input('access_id');
$guid = get_input('guid');
$share = get_input('share');
$container_guid = get_input('container_guid', elgg_get_logged_in_user_guid());
$description = htmLawed($description, $htmlawed_config);

// make sure the post isn't blank
if (empty($description)) {
	register_error(elgg_echo("my:status:blank"));
	forward('activity');
}

elgg_make_sticky_form('status');

if (is_null($guid)) {
	$status = new ElggObject;
	$status->subtype = "status";
	$status->container_guid = (int)$container_guid;
	$new = true;
} else {
	$status = get_entity($guid);
	if (!$status->canEdit()) {
		echo system_message(elgg_echo('my:status:save:failed'));
		die(); 
	}
}

$status->title = $title;
$status->description = $description;
$status->access_id = $access_id;

if ($status->save()) {

	elgg_clear_sticky_form('status');

	// @todo
	if (is_array($shares) && sizeof($shares) > 0) {
		foreach($shares as $share) {
			$share = (int) $share;
			add_entity_relationship($status->getGUID(), 'share', $share);
		}
	}
	
/*****	if $guid is not null it means this is an edit	*****/
if(!is_null($guid)){
	echo $status->description;		//	return the new description
	die();
};

//add to river only if new
	if ($new) {
$river_item = elgg_create_river_item(array(
			'view' => 'river/object/status/create',
			'action_type' => 'create',
			'subject_guid' => elgg_get_logged_in_user_guid(),
			'object_guid' => $status->getGUID(),
			'target_guid' => $target_guid,
			'access_id' => $status->access_id,
			'posted' => $posted,
			'annotation_id' => $annotation_id,
		));

	}
	
	$options = array( 'entity' => $status, 'full_view' => TRUE, 'limit' => 1, 'pagination' => FALSE );
	$return = elgg_list_river($options);
	echo $return;
	die();

} else {
	register_error(elgg_echo('my:status:save:failed'));
	forward(REFERER);
}
