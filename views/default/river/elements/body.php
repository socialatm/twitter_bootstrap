<?php
/**
 * Body of river item
 *
 * @uses $vars['item']        ElggRiverItem
 * @uses $vars['summary']     Alternate summary (the short text summary of action)
 * @uses $vars['message']     Optional message (usually excerpt of text)
 * @uses $vars['attachments'] Optional attachments (displaying icons or other non-text data)
 * @uses $vars['responses']   Alternate respones (comments, replies, etc.)
 */

$item = $vars['item'];
$entity = $item->getObjectEntity();
$item_guid = $entity->guid;

if ($entity->canEdit()) {
	elgg_unregister_menu_item('river', 'comment');
	elgg_unregister_menu_item('river', 'delete');

	elgg_register_menu_item('river', ElggMenuItem::factory(array(
		'name' => 'edit',
			'text' => elgg_echo('edit'),
			'title' => elgg_echo('edit:this'),
			'href' => "my_status/edit/{$item_guid}",
			'priority' => 100,
			'link_class' => 'status-edit',
	)));
	
	elgg_register_menu_item('river', ElggMenuItem::factory(array(
		'name' => 'delete',
				'href' => elgg_add_action_tokens_to_url("action/river/delete?id=$item->id"),
				'text' => elgg_view_icon('delete'),
				'title' => elgg_echo('river:delete'),
				'confirm' => elgg_echo('deleteconfirm'),
				'priority' => 200,
	)));

}
	$access = elgg_view('output/access', array('entity' => $entity));
	elgg_register_menu_item('river', ElggMenuItem::factory(array(
		'name' => 'access',
		'text' => $access,
		'href' => false,
		'priority' => 50,
	)));

if(elgg_get_context() != 'widgets') {	
	$menu = elgg_view_menu('river', array(
		'item' => $item,
		'sort_by' => 'priority',
		'class' => 'elgg-menu-hz elgg-menu-entity',
	));
}

// river item header
$timestamp = elgg_view_friendly_time($item->getTimePosted());

$summary = elgg_extract('summary', $vars, elgg_view('river/elements/summary', array('item' => $vars['item'])));
if ($summary === false) {
	$subject = $item->getSubjectEntity();
	$summary = elgg_view('output/url', array(
		'href' => $subject->getURL(),
		'text' => $subject->name,
		'class' => 'elgg-river-subject',
		'is_trusted' => true,
	));
}

$message = elgg_extract('message', $vars, false);
if ($message !== false) {
	$message = "<div class=\"elgg-river-message\">$message</div>";
}

$attachments = elgg_extract('attachments', $vars, false);
if ($attachments !== false) {
	$attachments = "<div class=\"elgg-river-attachments clearfix\">$attachments</div>";
}

$responses = elgg_view('river/elements/responses', $vars);
if ($responses) {
	$responses = "<div class=\"elgg-river-responses\">$responses</div>";
}

$group_string = '';
$object = $item->getObjectEntity();
$container = $object->getContainerEntity();
if ($container instanceof ElggGroup && $container->guid != elgg_get_page_owner_guid()) {
	$group_link = elgg_view('output/url', array(
		'href' => $container->getURL(),
		'text' => $container->name,
		'is_trusted' => true,
	));
	$group_string = elgg_echo('river:ingroup', array($group_link));
}

// inline comment form
$message = elgg_extract('message', $vars, false);

if(elgg_get_context() != 'widgets') {	
$form_vars = array('id' => "status-edit-{$object->getGUID()}", 'class' => '');
$body_vars = array('description' => $message, 'inline' => true, 'guid' => $object->getGUID());
$form = elgg_view_form('my_status/save', $form_vars, $body_vars);
}

echo <<<RIVER
$menu
<div class="elgg-river-summary">$summary $group_string <span class="elgg-river-timestamp">$timestamp</span></div>
<p>$message</p>
$form
$attachments
$responses
RIVER;
