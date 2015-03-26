<?php
/*****	
 * Add or Edit a Status	
 *****/

$title = elgg_echo('item:object:status');
$description = elgg_extract('description', $vars, '');

//	default to ACCESS_FRIENDS if $vars['access_id'] is not set
$vars['access_id'] = isset($vars['access_id'])? $vars['access_id'] : ACCESS_FRIENDS;

$container_guid = elgg_extract('container_guid', $vars);

$container_guid = is_null($container_guid)? elgg_get_logged_in_user_guid() : $container_guid;
$guid = elgg_extract('guid', $vars, null);
$shares = elgg_extract('shares', $vars, array());
$textbox = elgg_extract('textbox', $vars);

/***** set the access	*****/
$access_label = elgg_echo('my:status:access');
$access_input = elgg_view('input/access', array(
	'name' => 'access_id',
	'id' => 'status_access_id',
	'value' => $vars['access_id'],
));
$status_label = elgg_echo('my:status:edit');

?>

<div class="elgg-riverbox">
	<?php echo elgg_view('input/longtext', array(
		'name' => 'description',
		'value' => $description, 
		'placeholder' => elgg_echo("status:placeholder"),
		'rows' => '2',
		'cols' => '50',
		'class' => 'col-md-12'
		)); ?>
</div>

<div class="row">
  <div class="col-md-8"><?php echo '<label id = "status_access_label">'.$access_label.'</label>'.$access_input; ?></div>
  <div class="col-md-4"><?php echo elgg_view('input/submit', array('value' => elgg_echo("my:status:go"), 'id' => 'status_submit', 'class' => 'btn btn-primary btn-sm pull-right')); ?></div>
</div>

<?php
	echo elgg_view('input/hidden', array('name' => 'container_guid', 'value' => $container_guid));
	if ($guid){ echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $guid));}
?>
