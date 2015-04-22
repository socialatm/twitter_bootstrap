<?php
/**
 * Group edit form
 *
 * This view contains the group profile field configuration
 *
 * @package ElggGroups
 */

$name = elgg_extract("name", $vars);
$group_profile_fields = elgg_get_config("group");

?>

<div class="form-group row">
	<label for="icon" class="col-sm-2 control-label">
		<?php echo elgg_echo("groups:icon"); ?>
	</label>
	<div class="col-sm-10">
		<input type="file" id="icon" name="icon"/>
		<p class="help-block">
			<?php echo elgg_echo("groups:icon:help"); ?>
		</p>
	</div>
</div>

<div class="form-group row">
	<label for="name" class="col-sm-2 control-label">
		<?php echo elgg_echo("groups:name"); ?>
	</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="name" name="name" placeholder="<?php echo $name; ?>" value="<?php echo $name; ?>" />
	</div>
</div>

<?php

// show the configured group profile fields
foreach ((array)$group_profile_fields as $shortname => $valtype) {
	if ($valtype == "hidden") {
		echo elgg_view("input/hidden", array(
			"name" => $shortname,
			"value" => elgg_extract($shortname, $vars),
		));
		continue;
	}

	$label = elgg_echo("groups:{$shortname}");
	$input = elgg_view("input/{$valtype}", array(
		"name" => $shortname,
		"value" => elgg_extract($shortname, $vars),
	));
	

	echo '<div class="form-group row">
			<label for="name" class="col-sm-2 control-label">'
				.$label.
			'</label>
			<div class="col-sm-10">'
				.$input.
			'</div>
		</div>';
}
