<?php
/**
 * Write access
 *
 * Removes the public option found in input/access
 *
 * @uses $vars['value'] The current value, if any
 * @uses $vars['options_values']
 * @uses $vars['name'] The name of the input field
 * @uses $vars['entity'] Optional. The entity for this access control (uses write_access_id)
 */

$options = get_write_access_array();
unset($options[ACCESS_PUBLIC]);

$defaults = array(
	'class' => 'elgg-input-access',
	'disabled' => FALSE,
	'value' => get_default_access(),
	'options_values' => $options,
);

if (isset($vars['entity'])) {
	$defaults['value'] = $vars['entity']->write_access_id;
	unset($vars['entity']);
}

$vars = array_merge($defaults, $vars);

if ($vars['value'] == ACCESS_DEFAULT) {
	$vars['value'] = get_default_access();
}
$vars['value'] = ($vars['value'] == ACCESS_PUBLIC) ? ACCESS_LOGGED_IN : $vars['value'];

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

if ($options && count($options) > 0) {
	echo "<ul class=\"$class\" id = \"write-access\">";
	foreach ($options as $label => $option) {

		$vars['checked'] = in_array(elgg_strtolower($option), $value);
		$vars['value'] = $option;

		$attributes = elgg_format_attributes($vars);

		// handle indexed array where label is not specified
		// @deprecated 1.8 Remove in 1.9
		if (is_integer($label)) {
			elgg_deprecated_notice('$vars[\'options\'] must be an associative array in input/radio', 1.8);
			$label = $option;
		}

		echo "<li class=\"radio inline\"><label><input type=\"radio\" $attributes />$label</label></li>";
	}
	echo '</ul>';
	}