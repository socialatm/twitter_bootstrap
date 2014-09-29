<?php
/**
 * Widget object
 *
 * @uses $vars['entity']      ElggWidget
 * @uses $vars['show_access'] Show the access control in edit area? (true)
 * @uses $vars['class']       Optional additional CSS class
 */

$widget = $vars['entity'];
if (!elgg_instanceof($widget, 'object', 'widget')) {
	return true;
}

$show_access = elgg_extract('show_access', $vars, true);

// @todo catch for disabled plugins
$widget_types = elgg_get_widget_types('all');

$handler = $widget->handler;

$title = $widget->getTitle();

$edit_area = '';
$can_edit = $widget->canEdit();
if ($can_edit) {
	$edit_area = elgg_view('object/widget/elements/settings', array(
		'widget' => $widget,
		'show_access' => $show_access,
	));
}
$controls = elgg_view('object/widget/elements/controls', array(
	'widget' => $widget,
	'show_edit' => $edit_area != '',
));

$url = elgg_get_config('url');
$ts = time();
$token = generate_action_token($ts);

$edit_button = '<a class="elgg-menu-content elgg-widget-edit-button" rel="toggle" title="Customize this widget" href="#widget-edit-'.$widget->guid.'">
					<span class="glyphicon glyphicon-cog pull-right"></span>
				</a>';

$delete_button = '<a class="elgg-menu-content elgg-widget-delete-button" data-elgg-widget-type="'.$handler.'" id="elgg-widget-delete-button-'.$widget->guid.'" title="Remove '.$title.'" href="'.$url.'action/widgets/delete?widget_guid='.$widget->guid.'&amp;__elgg_ts='.$ts.'&amp;__elgg_token='.$token.'">
<span class="glyphicon glyphicon-remove pull-right"></span>
</a>';

$collapse_button = '<a class="elgg-menu-content elgg-widget-collapse-button elgg-state-active elgg-widget-collapsed" rel="toggle" href="#elgg-widget-content-'.$widget->guid.'">
<span class="glyphicon glyphicon-chevron-down"></span></a>';

// don't show content for default widgets
if (elgg_in_context('default_widgets')) {
	$content = '';
} else {
	if (elgg_view_exists("widgets/$handler/content")) {
		$content = elgg_view("widgets/$handler/content", $vars);
	} else {
		elgg_deprecated_notice("widgets use content as the display view", 1.8);
		$content = elgg_view("widgets/$handler/view", $vars);
	}
}

$widget_id = "elgg-widget-$widget->guid";
$widget_instance = preg_replace('/[^a-z0-9-]/i', '-', "elgg-widget-instance-$handler");
if ($can_edit) {
	$widget_class = "elgg-state-draggable $widget_instance";
} else {
	$widget_class = "elgg-state-fixed $widget_instance";
}

$additional_class = elgg_extract('class', $vars, '');
if ($additional_class) {
	$widget_class = "$widget_class $additional_class";
}

$new = <<<HTML
<div id="elgg-widget-{$widget->guid}" class="panel panel-default elgg-module-widget {$widget_class}">
	<div class="panel-heading elgg-widget-handle">
		<h3 class="panel-title">
			{$collapse_button}
			{$title}
			{$delete_button}
			{$edit_button}
		</h3>
	</div>
	<div id="widget-edit-{$widget->guid}" class="panel-body elgg-widget-edit">
		{$edit_area}
	</div>
	<div class="panel-body elgg-body">
		{$content}
	</div>
</div>
HTML;

echo $new;
