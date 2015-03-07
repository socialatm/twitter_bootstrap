<?php
class TbsMenu {
	function __construct() {
		elgg_unregister_menu_item('footer', 'powered');
	}
}