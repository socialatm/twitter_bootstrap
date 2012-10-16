<?php
/**
 * Edit profile form
 *
 * @uses vars['entity']
 */

?>

<div class="control-group">
	<label class="control-label"><?php echo elgg_echo('user:name:label'); ?></label>
	<?php echo elgg_view('input/text', array('class' => "controls", 'id' => 'name', 'name' => 'name', 'value' => $vars['entity']->name)); ?>
</div>
<?php

$profile_fields = elgg_get_config('profile_fields');
if (is_array($profile_fields) && count($profile_fields) > 0) {
	foreach ($profile_fields as $shortname => $valtype) {
		$metadata = elgg_get_metadata(array(
			'guid' => $vars['entity']->guid,
			'metadata_name' => $shortname
		));
		if ($metadata) {
			if (is_array($metadata)) {
				$value = '';
				foreach ($metadata as $md) {
					if (!empty($value)) {
						$value .= ', ';
					}
					$value .= $md->value;
					$access_id = $md->access_id;
				}
			} else {
				$value = $metadata->value;
				$access_id = $metadata->access_id;
			}
		} else {
			$value = '';
			$access_id = ACCESS_DEFAULT;
		}

?>
<div class="control-group">
	<label class="control-label"><?php echo elgg_echo("profile:{$shortname}") ?></label>
	<?php
		$params = array(
			'name' => $shortname,
			'value' => $value,
		);
		echo elgg_view("input/{$valtype}", $params);
		$params = array(
			'name' => "accesslevel[$shortname]",
			'value' => $access_id,
		);
		echo elgg_view('input/access', $params);
	?>
</div>
<?php
	}
}
?>
<div class="control-group">
<?php
	echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $vars['entity']->guid));
	echo elgg_view('input/submit', array('value' => elgg_echo('save')));
?>
</div>
<?php 
return FALSE;
