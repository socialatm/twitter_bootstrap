<?php
/**
 * Elgg text input
 * Displays a text input field
 *
 * @package Elgg
 * @subpackage Core
 *
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