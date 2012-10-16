<?php
/**
 * Elgg password input
 * Displays a password input field
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['value'] The current value, if any
 * @uses $vars['name']  The name of the input field
 * @uses $vars['class'] Additional CSS class
 */

$vars['class'] = "controls";

$defaults = array(
	'disabled' => false,
	'value' => '',
);

$attrs = array_merge($defaults, $vars);
?>

<input type="password" <?php echo elgg_format_attributes($attrs); ?> />
