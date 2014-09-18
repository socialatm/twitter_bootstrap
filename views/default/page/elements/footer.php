<?php
/**
 * Elgg footer
 * The standard HTML footer that displays across the site
 *
 * @package Elgg
 * @subpackage Core
 *
 */

//bootstrapped

$footer_menu = elgg_view_menu('footer', array('sort_by' => 'priority', 'class' => 'elgg-menu-hz'));

echo <<<HTML
	<div class="row">
		<div class="col-md-9">
			Powered by the <a href="http://elgg.org">Elgg engine</a> and <a href="http://getbootstrap.com/">Twitter Bootstrap</a>.
		</div>
		<div class="col-md-3">
			{$footer_menu}
		</div>
	</div>
HTML;
?>