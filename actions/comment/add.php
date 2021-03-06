<?php
/**
 * Action for adding a new comment on the river
 *
 * @package Elgg.Core
 * @subpackage Comments
 */

$entity_guid = (int) get_input('entity_guid', 0, false);
$comment_guid = (int) get_input('comment_guid', 0, false);
$comment_text = get_input('generic_comment');
$is_edit_page = (bool) get_input('is_edit_page', false, false);

if (empty($comment_text)) {
	register_error(elgg_echo("generic_comment:blank"));
	forward(REFERER);
}

if ($comment_guid) {
	// Edit an existing comment
	$comment = get_entity($comment_guid);

	if (!elgg_instanceof($comment, 'object', 'comment')) {
		register_error(elgg_echo("generic_comment:notfound"));
		forward(REFERER);
	}
	if (!$comment->canEdit()) {
		register_error(elgg_echo("actionunauthorized"));
		forward(REFERER);
	}

	$comment->description = $comment_text;
	if ($comment->save()) {
		echo $comment->description;
		die();
	} else {
		register_error(elgg_echo('generic_comment:failure'));
	}
} else {
	// Create a new comment on the target entity
	$entity = get_entity($entity_guid);
	if (!$entity) {
		register_error(elgg_echo("generic_comment:notfound"));
		forward(REFERER);
	}

	$user = elgg_get_logged_in_user_entity();

	$comment = new ElggComment();
	$comment->title = $user->username;
	$comment->description = $comment_text;
	$comment->owner_guid = $user->getGUID();
	$comment->container_guid = $entity->getGUID();
	$comment->access_id = $entity->access_id;
	$guid = $comment->save();

	if (!$guid) {
		register_error(elgg_echo("generic_comment:failure"));
		forward(REFERER);
	}

	// Notify if poster wasn't owner
	if ($entity->owner_guid != $user->guid) {
		$owner = $entity->getOwnerEntity();

		notify_user($owner->guid,
			$user->guid,
			elgg_echo('generic_comment:email:subject', array(), $owner->language),
			elgg_echo('generic_comment:email:body', array(
				$entity->title,
				$user->name,
				$comment_text,
				$entity->getURL(),
				$user->name,
				$user->getURL()
			), $owner->language),
			array(
				'object' => $comment,
				'action' => 'create',
			)
		);
	}

	$comments = elgg_get_entities(array(
		'type' => 'object',
		'subtype' => 'comment',
		'container_guid' => $entity_guid,
		'limit' => 1,
		'order_by' => 'e.time_created desc'
	));

if ($comments) {
	echo elgg_view_entity_list($comments, array('list_class' => 'elgg-river-comments'));
}
	die();
}

if ($is_edit_page) {
	forward($comment->getURL());
}
forward(REFERER);
