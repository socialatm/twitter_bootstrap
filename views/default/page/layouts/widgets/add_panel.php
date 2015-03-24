<?php
/**
 * Widget add panel
 *
 * @uses $vars['widgets']     Array of current widgets
 * @uses $vars['context']     The context for this widget layout
 * @uses $vars['exact_match'] Only use widgets that match the context
 */

$widgets = $vars['widgets'];
$context = $vars['context'];
$exact = elgg_extract('exact_match', $vars, false);

$widget_types = elgg_get_widget_types($context, $exact);
uasort($widget_types, create_function('$a,$b', 'return strcmp($a->name,$b->name);'));

$current_handlers = array();
foreach ($widgets as $column_widgets) {
	foreach ($column_widgets as $widget) {
		$current_handlers[] = $widget->handler;
	}
}

?>
<div class="elgg-widgets-add-panel clearfix panel panel-default" id="widgets-add-panel">
	<p>
		<?php echo elgg_echo('widgets:add:description'); ?>
	</p>
	<ul>
<?php
		foreach ($widget_types as $handler => $widget_type) {
			// check if widget added and only one instance allowed
			if ($widget_type->multiple == false && in_array($handler, $current_handlers)) {
				$class = 'elgg-state-unavailable';
				$tooltip = elgg_echo('widget:unavailable');
			} else {
				$class = 'elgg-state-available';
				$tooltip = $widget_type->description;
			}

			if ($widget_type->multiple) {
				$class .= ' elgg-widget-multiple';
			} else {
				$class .= ' elgg-widget-single';
			}

			echo '<li title="'.$tooltip.'" class="'.$class.' btn btn-default btn-block" data-elgg-widget-type="'.$handler.'">'.$widget_type->name.'</li>';
		}
?>
	</ul>
<?php
	echo elgg_view('input/hidden', array(
		'name' => 'widget_context',
		'value' => $context
	));
	echo elgg_view('input/hidden', array(
		'name' => 'show_access',
		'value' => (int)$vars['show_access']
	));
?>
</div>
