<?php
/**
 * Elgg global system message list
 * Lists all system messages
 * @elgg-release: 1.9.4
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['object'] The array of message registers
 */

if (isset($vars['object']) && is_array($vars['object']) && sizeof($vars['object']) > 0) {
	foreach ($vars['object'] as $type => $list ) {
		if(!empty($list)) {
		$type = ($type === 'error')? 'danger':$type; 
		echo '<div class="alert alert-'.$type.' bootstrap-messages col-md-12">';
		echo '<a class="close" data-dismiss="alert" href="#">&times;</a>';
			foreach ($list as $message) {
				echo elgg_autop($message);
			}
		echo '</div>';
		}
	}
}
