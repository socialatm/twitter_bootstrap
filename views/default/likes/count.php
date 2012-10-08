<?php
/**
 * Count of who has liked something
 *
 *  @uses $vars['entity']
 */

$list = '';
$num_of_likes = likes_count($vars['entity']);
$guid = $vars['entity']->getGUID();

if ($num_of_likes) {
	// display the number of likes
	if ($num_of_likes == 1) {
		$likes_string = elgg_echo('likes:userlikedthis', array($num_of_likes));
	} else {
		$likes_string = elgg_echo('likes:userslikedthis', array($num_of_likes));
	}

	$content = elgg_list_annotations(array(
		'guid' => $guid,
		'annotation_name' => 'likes',
		'limit' => 99,
		'list_class' => 'elgg-list-likes'
	));
	
	$params = array(
		'text' => $likes_string,
		'rel' => 'clickover',
		'href' => "#",
		'data-placement' => "top",
		'data-content' => "$content",
		'data-html' => "true",
		'data-global_close' => "false",
		'data-original-title' => "<button class=\"close\" data-dismiss=\"clickover\" >x</>",
	);
	$list = elgg_view('output/url', $params);
	
	echo $list;
}