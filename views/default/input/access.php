<?php
/**
 * Elgg access level input
 * Displays the You Decide button
 *
 * @uses $vars['value']          The current value, if any
 * @uses $vars['options_values'] Array of value => label pairs (overrides default)
 * @uses $vars['name']           The name of the input field
 * @uses $vars['entity']         Optional. The entity for this access control (uses access_id)
 * @uses $vars['class']          Additional CSS class
 */
 
if (isset($vars['class'])) {
	$vars['class'] = "hide elgg-input-access {$vars['class']}";
} else {
	$vars['class'] = "hide elgg-input-access";
}

$defaults = array(
	'disabled' => false,
	'value' => get_default_access(),
	'options_values' => get_write_access_array(),
);

if (isset($vars['entity'])) {
	$defaults['value'] = $vars['entity']->access_id;
	unset($vars['entity']);
}

$vars = array_merge($defaults, $vars);

if ($vars['value'] == ACCESS_DEFAULT) {
	$vars['value'] = get_default_access();
}

foreach ($vars['options_values'] as $label => $option) {
	$vars['options'][$option] = $label;
	unset($vars['options_values']);
}

if (is_array($vars['value'])) {
	$vars['value'] = array_map('elgg_strtolower', $vars['value']);
} else {
	$vars['value'] = array(elgg_strtolower($vars['value']));
}

$options = $vars['options'];
unset($vars['options']);

$value = $vars['value'];
unset($vars['value']);

/*****	here comes the You Decide button	*****/
	
if ($options && count($options) > 0) {

	echo '<div class="btn-toolbar">';
	echo "<div class=\"btn-group\" id = \"read-access\">";
	
	$count = 1;

	foreach ($options as $label => $option) {

		$vars['checked'] = in_array(elgg_strtolower($option), $value);
		$vars['value'] = $option;
		$attributes = elgg_format_attributes($vars);

		if($option < 3) {
			echo "<label class=\"btn btn-sm\"><input type=\"radio\" $attributes />$label</label>";
		}
		
		if(count($options) > 4 and $count == 4) {
			echo '<a class="btn btn-sm">More</a>';
			echo '<a class="btn btn-sm dropdown-toggle" data-toggle="dropdown" href="#" id="read-access-caret"><span class="caret"></span></a>';
			echo '<div class="dropdown-menu pull-right">';
		}
		
		if($count > 4) {
			echo "<label><input type=\"radio\" $attributes />$label</label>";
			if($count == count($options)) {
			echo '</div>';
			}
		}
	
		$count++;
	}	/*****	end foreach ($options as $label => $option)	*****/
	echo '</div>';
	echo '</div>';
	}
