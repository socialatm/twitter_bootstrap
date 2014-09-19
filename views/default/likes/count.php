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
	$params = array(
		'text' => $likes_string,
		'title' => elgg_echo('likes:see'),
		'href' => "#likes-$guid",
		'data-toggle' => "tooltip",
		'data-placement' => "bottom",
	);
	$list = elgg_view('output/url', $params);
	$list .= "<div class='elgg-likes hidden clearfix' id='likes-$guid'>";	// do not remove class="elgg-likes' or you'll break the popup
	$list .= elgg_list_annotations(array(
		'guid' => $guid,
		'annotation_name' => 'likes',
		'limit' => 99,
		'list_class' => 'elgg-list-likes'
	));
	$list .= "</div>";
	echo $list;
}
