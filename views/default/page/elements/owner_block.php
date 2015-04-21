<?php
/**
 * Elgg owner block
 * Displays page ownership information
 *
 * @package Elgg
 * @subpackage Core
 *
 */

elgg_push_context('owner_block');

// groups and other users get owner block
$owner = elgg_get_page_owner_entity();
if ($owner instanceof ElggGroup || $owner instanceof ElggUser) {

	$size = elgg_extract('size', $vars, 'tiny');
	$icon = elgg_view_entity_icon($owner, $size, $vars);
	$rel = '';
	if (elgg_get_logged_in_user_guid() == $entity->guid) {
		$rel = 'rel="me"';
	} elseif (check_entity_relationship(elgg_get_logged_in_user_guid(), 'friend', $entity->guid)) {
		$rel = 'rel="friend"';
	}
	$title = "<a href=\"" . $owner->getUrl() . "\" $rel>" . $owner->name . "</a>";

	$header = '	<div class="media">
					<div class="media-left">
						'.$icon.'
					</div>
					<div class="media-body">
						<h3 class="media-heading">'.$title.'</h3>
						<p>
							'.$owner->briefdescription.'
						</p>
					</div>
				</div>';
	
	$body = elgg_view_menu('owner_block', array('entity' => $owner));

	$body .= elgg_view('page/elements/owner_block/extend', $vars);
	
	echo elgg_view('page/components/module', array(
		'header' => $header,
		'body' => $body,
		'class' => 'elgg-owner-block',
	));
}

elgg_pop_context();
