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
$container = elgg_get_entities(array('guid' => $container_guid ));
$container = $container[0];

$default_access = $container->getPrivateSetting('elgg_default_access');
	if ($default_access === null) {
		$default_access = elgg_get_config('default_access');
	}
$access_name = get_write_access_array()["$default_access"];
$guid = elgg_extract('guid', $vars, null);
$shares = elgg_extract('shares', $vars, array());
$textbox = elgg_extract('textbox', $vars);

/***** set the access	*****/
$access_label = elgg_echo('my:status:access');
$value = elgg_view('input/accesslist', array(
	'name' => 'access_id',
	'id' => 'access_id',
	'value' => $vars['access_id'],
));

$access_input =  
<<<EOT
	<div class="form-group">
		<label for="access-id-{$container_guid}" class="col-sm-3 control-label">{$access_label}</label>
		<div class="col-sm-9">
			<div id="access-id-{$container_guid}" data-initialize="selectlist"  class="btn-group selectlist">
				<button type="button" data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" aria-expanded="false">
					<span class="selected-label pull-left">{$access_name}</span>
					<span class="glyphicon glyphicon-triangle-bottom pull-left" aria-hidden="true" style="margin-left: 10px;"></span>
					<span class="sr-only">Toggle Dropdown</span>
				</button>
				{$value}
				<input type="text" aria-hidden="true" readonly="readonly" id="access_id" name="access_id" class="hidden hidden-field" />
			</div>
		</div>
	</div>
EOT;

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
  <div class="col-md-9"><?php echo $access_input; ?></div>
  <div class="col-md-3"><?php echo elgg_view('input/submit', array('value' => elgg_echo("my:status:go"), 'id' => 'status_submit', 'class' => 'btn btn-primary btn-sm pull-right')); ?></div>
</div>

<?php
	echo elgg_view('input/hidden', array('name' => 'container_guid', 'value' => $container_guid));
	if ($guid){ echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $guid));}
