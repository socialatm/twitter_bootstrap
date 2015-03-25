<?php

/**
 * Group edit form
 *
 * This view contains the group tool options provided by the different plugins
 *
 * @package ElggGroups
 */

$tools = elgg_get_config("group_tool_options");
if ($tools) {
	usort($tools, create_function('$a, $b', 'return strcmp($a->label, $b->label);'));
?>
<div class="table-responsive">
<table class="table table-hover">
	<tbody>

<?php	
	foreach ($tools as $group_option) {
		$group_option_toggle_name = $group_option->name . "_enable";
		$value = elgg_extract($group_option_toggle_name, $vars);
		?>
		<tr>
			<td>
				<h4><?php echo $group_option->label; ?></h4>
			</td>
			<td>
				<h4>
				<label class="radio-inline">
				<?php if ($value == "yes"){$checked = 'checked="checked"';} ?>
				<input type="radio" name="<?php echo $group_option_toggle_name?>" id="<?php echo $group_option_toggle_name?>" value="yes" <?php echo $checked; ?>><?php echo elgg_echo("option:yes") ?>
				</label>
				<label class="radio-inline">
				<?php unset($checked); if ($value == "no"){$checked = 'checked="checked"';} ?>
				<input type="radio" name="<?php echo $group_option_toggle_name?>" id="<?php echo $group_option_toggle_name?>" value="no" <?php echo $checked; ?>><?php echo elgg_echo("option:no") ?>
				</label>
				</h4>
			</td>
		</tr>
<?php
	}
}
?>

	</tbody>
</table>
</div>
