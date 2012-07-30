<?php
/**
 * Elgg global system message list
 * Lists all system messages
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['object'] The array of message registers
 */

if (isset($vars['object']) && is_array($vars['object']) && sizeof($vars['object']) > 0) {
	echo '<div class="alert alert-success bootstrap-messages span8">';
	echo '<a class="close" data-dismiss="alert" href="#">&times;</a>';
	foreach ($vars['object'] as $type => $list ) {
		foreach ($list as $message) {
			echo autop($message);
		}
	}
	echo '</div>';
}
