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

$footer_menu = elgg_view_menu('footer', array('sort_by' => 'priority', 'class' => 'elgg-menu-hz pull-right'));

echo <<<HTML
	<div class="row-fluid">
		<div class="span6">
			Powered by the <a href="http://elgg.org">Elgg engine</a> and <a href="http://twitter.github.com/bootstrap/">Twitter Bootstrap</a>.
		</div>
		<div class="span6">
			{$footer_menu}
		</div>
	</div>
HTML;
?>