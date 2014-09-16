<?php
/**
 * Elgg one-column layout
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['content'] Content string
 * @uses $vars['class']   Additional class to apply to layout
 */

$class = 'container';
if (isset($vars['class'])) {
	$class = "$class {$vars['class']}";
}

// navigation defaults to breadcrumbs
$nav = elgg_extract('nav', $vars, elgg_view('navigation/breadcrumbs'));

?>
	<div class="container">									<!-- container	-->
		<div class="row" id="">								<!-- row		-->
			<div class="col-md-12">							<!-- content	-->
				<?php
				echo $nav;
				echo elgg_view('page/layouts/elements/header', $vars);
				echo $vars['content'];
				?>
			</div>											<!-- /content	-->									
		</div>												<!-- /row		-->
	</div>													<!-- /container	-->
