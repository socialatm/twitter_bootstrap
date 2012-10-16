<?php
/**
 * Elgg tag input
 *
 * Accepts a single tag value
 *
 * @uses $vars['value'] The default value for the tag
 * @uses $vars['class'] Additional CSS class
 */

$vars['class'] = "controls";

$defaults = array(
	'value' => '',
	'disabled' => false,
);

$vars = array_merge($defaults, $vars);
?>

<input type="text" <?php echo elgg_format_attributes($vars); ?> />