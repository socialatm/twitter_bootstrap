<?php
/**
 * Page edit form body
 *
 * @package ElggPages
 */

$variables = elgg_get_config('pages');
$user = elgg_get_logged_in_user_entity();
$entity = elgg_extract('entity', $vars);

/* we set the default category here. @todo maybe make an admin setting to do it...	*/

	$variables['universal_categories_list[]'] = 'hidden';
	$vars['universal_categories_list[]'] = 'General';
	$variables['universal_category_marker'] = 'hidden';
	$vars['universal_category_marker'] = 'on';	// without this it ain't gonna work

/*	let's make write access private and hidden	@todo maybe make an admin setting to do it...*/

	$variables['write_access_id'] = 'hidden';
	$vars['write_access_id'] = '0';	// without this it ain't gonna work

/*	let's make read access default to friends. user can change if they want to.	@todo maybe make an admin setting to do it...*/

	$vars['access_id'] = '-2';
	
/*	let's make tags default to 'status'. we'll hide it when we're done.	@todo maybe make an admin setting to do it...*/
	$variables['tags'] = 'hidden';
	$vars['tags'] = 'status';	// @todo maybe this should be translateable?
	
/*	let's make the title default to the users display name and the time. we'll hide it when we're done.	@todo maybe make an admin setting to do it... set time format and all that*/
	$title = $user->name;
	$variables['title'] = 'hidden';
	$vars['title'] = $user->name.' - '.date("F j, Y, g:i a") ;

$can_change_access = true;
if ($user && $entity) {
	$can_change_access = ($user->isAdmin() || $user->getGUID() == $entity->owner_guid);
}

foreach ($variables as $name => $type) {
	// don't show read / write access inputs for non-owners or admin when editing
	if (($type == 'access' || $type == 'write_access') && !$can_change_access) {
		continue;
	}

	/* for now lets only print the label if the field is not hidden	*/

	if ($type != 'hidden') { 
		echo '<div class="form-group row">';
		
	/*	only print the label for the read access	*/
	if ($name === 'access_id') {
		echo '<div class= "col-md-9"><label class="control-label" id="access_id_label">'.elgg_echo("pages:$name").'</label>';
		}
	
	}
		echo elgg_view("input/$type", array(
			'name' => $name,
			'value' => $vars[$name],
		));
	
	if ($type != 'hidden') { 
	
		if ($name === 'access_id') {
		echo '</div><div class = "col-md-3">'.elgg_view('input/button', array('value' => elgg_echo('save'), 'class' => 'pull-right btn btn-primary', 'id' => 'access_id_btn', 'type' => 'submit'  )).'</div>';
		}
		echo '</div>';
	}
}

if ($vars['guid']) {
	echo elgg_view('input/hidden', array(
		'name' => 'page_guid',
		'value' => $vars['guid'],
	));
}

echo elgg_view('input/hidden', array(
	'name' => 'container_guid',
	'value' => $vars['container_guid'],
));
if ($vars['parent_guid']) {
	echo elgg_view('input/hidden', array(
		'name' => 'parent_guid',
		'value' => $vars['parent_guid'],
	));
}
