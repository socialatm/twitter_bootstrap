<?php
/**
 * Elgg select input
 * Displays a select input field
 *
 * @warning Values of FALSE or NULL will match '' (empty string) but not 0.
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['value']          The current value or an array of current values if multiple is true
 * @uses $vars['options']        An array of strings representing the options for the dropdown field
 * @uses $vars['options_values'] An associative array of "value" => "option"
 *                               where "value" is the name and "option" is
 *                               the value displayed on the button. Replaces
 *                               $vars['options'] when defined.
 * @uses $vars['multiple']       If true, multiselect of values will be allowed in the select box
 * @uses $vars['class']          Additional CSS class
 */
 
//	if we add it here it will get loaded whenever input/selectlist is called
elgg_require_js('fuelux/selectlist');

if (isset($vars['class'])) {
	$vars['class'] = "dropdown-menu {$vars['class']}";
} else {
	$vars['class'] = "dropdown-menu";
}

$defaults = array(
	'disabled' => false,
	'value' => '',
	'options_values' => array(),
	'options' => array(),
);

$vars = array_merge($defaults, $vars);

$options_values = $vars['options_values'];
unset($vars['options_values']);

$options = $vars['options'];
unset($vars['options']);

$value = is_array($vars['value']) ? $vars['value'] : array($vars['value']);
$value = array_map('strval', $value);
unset($vars['value']);

$vars['multiple'] = !empty($vars['multiple']);

// Add trailing [] to name if multiple is enabled to allow the form to send multiple values
if ($vars['multiple'] && !empty($vars['name']) && is_string($vars['name'])) {
    if (substr($vars['name'], -2) != '[]') {
        $vars['name'] = $vars['name'] . '[]';
    }
}

//	sorts the options in alphabetical order and then puts the selected option at the top
if($options_values) {
	asort($options_values);
	$options_values = array($value[0] => $options_values["$value[0]"]) + $options_values;
}

if($options) {
	asort($options);
	$options = array($value[0] => $options["$value[0]"]) + $options;
}
?>
<ul <?php echo elgg_format_attributes($vars); ?>>
<?php

if ($options_values) {
	foreach ($options_values as $opt_value => $option) {

		$option_attrs = elgg_format_attributes(array(
			'data-value' => $opt_value,
			'data-selected' => in_array((string)$opt_value, $value),
		));

		echo '<li '.$option_attrs.'><a href="#">'.$option.'</a></li>';
	}
} else {
	if (is_array($options)) {
		foreach ($options as $option) {

			$option_attrs = elgg_format_attributes(array(
				'data-selected' => in_array((string)$option, $value)
			));

			// echo "<li $option_attrs>$option</li>";
			echo '<li '.$option_attrs.'><a href="#">'.$option.'</a></li>';
		}
	}
}
?>
</ul>
