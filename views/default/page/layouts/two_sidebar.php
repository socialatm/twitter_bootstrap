<?php
/**
 * Elgg 2 sidebar layout
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['content']     The content string for the main column
 * @uses $vars['sidebar']     Optional content that is displayed in the sidebar
 * @uses $vars['sidebar_alt'] Optional content that is displayed in the alternate sidebar
 * @uses $vars['class']       Additional class to apply to layout
 */

$class = '';
if (isset($vars['class'])) {
	$class = "$class {$vars['class']}";
}

// navigation defaults to breadcrumbs
$nav = elgg_extract('nav', $vars, elgg_view('navigation/breadcrumbs'));
?>

<div class="row">			<!-- row		-->
	<div class="col-md-3">					<!-- left_sidebar -->
		<?php
			echo elgg_view('page/elements/sidebar_alt', $vars);
		?>
	</div>
	<div class="col-md-6">					<!-- middle	-->
		<?php
			echo $nav;
			echo elgg_view('page/layouts/elements/header', $vars);
			echo $vars['content'];
		?>
	</div>
	<div class="col-md-3">					<!-- right_sidebar -->
		<?php
			echo elgg_view('page/elements/sidebar', $vars);
		?>
	</div>
</div>										<!-- /row		-->				
