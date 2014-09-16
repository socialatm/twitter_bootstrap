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

$class = 'container';
if (isset($vars['class'])) {
	$class = "$class {$vars['class']}";
}
?>

<div class="<?php echo $class; ?>">				<!-- container	-->
	<div class="row" id="tbs-content">			<!-- row		-->
		<div class="col-md-3">					<!-- left_sidebar -->
			<?php
				echo elgg_view('page/elements/sidebar_alt', $vars);
			?>
		</div>
		<div class="col-md-6">					<!-- middle	-->
			<?php
				echo elgg_view('page/layouts/elements/header', $vars);
			?>
		</div>
		<div class="col-md-3">					<!-- right_sidebar -->
			<?php
				echo elgg_view('page/elements/sidebar', $vars);
			?>
		</div>
	</div>										<!-- /row		-->				
</div>											<!-- /container	-->
