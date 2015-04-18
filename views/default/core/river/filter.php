<?php
/**
 * Content filter for river
 *
 * @uses $vars[]
 */

// create selection array
$options = array();
$options['type=all'] = elgg_echo('river:select', array(elgg_echo('all')));
$registered_entities = elgg_get_config('registered_entities');

if (!empty($registered_entities)) {
	foreach ($registered_entities as $type => $subtypes) {
		// subtype will always be an array.
		if (!count($subtypes)) {
			$label = elgg_echo('river:select', array(elgg_echo("item:$type")));
			$options["type=$type"] = $label;
		} else {
			foreach ($subtypes as $subtype) {
				$label = elgg_echo('river:select', array(elgg_echo("item:$type:$subtype")));
				$options["type=$type&subtype=$subtype"] = $label;
			}
		}
	}
}

$params = array(
	'id' => 'elgg-river-selector',
	'options_values' => $options,
);
$selector = $vars['selector'];
if ($selector) {
	$params['value'] = $selector;
}

$value = elgg_view('input/selectlist', $params);
$button_label = $options[$params['value']];

echo <<<EOT
	
			<div id="elgg-river-selector-wrapper" data-initialize="selectlist"  class="btn-group btn-block selectlist">
				<button id="elgg-river-selector-button" type="button" data-toggle="dropdown" class="btn btn-primary btn-block dropdown-toggle" aria-expanded="false">
					<span class="selected-label pull-left">{$button_label}</span>
					<span class="glyphicon glyphicon-triangle-bottom pull-left" aria-hidden="true" style="margin-left: 10px;"></span>
					<span class="sr-only">Toggle Dropdown</span>
				</button>
				{$value}
				<input type="text" aria-hidden="true" readonly="readonly" id="elgg-river-selector" name="elgg-river-selector" class="hidden hidden-field" />
			</div>
		
EOT;
elgg_require_js('twitter_bootstrap/activity.filter');
