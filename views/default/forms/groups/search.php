<?php
/**
 * Group search form
 *
 * @uses $vars['entity'] ElggGroup
 */

$params = array(
	'name' => 'q',
	'class' => 'form-control',
);

echo '<div class="input-group">';
echo elgg_view('input/text', $params);
echo elgg_view('input/hidden', array(
	'name' => 'container_guid',
	'value' => $vars['entity']->getGUID(),
));
echo '<span class="input-group-btn">';
echo elgg_view('input/submit', array('value' => elgg_echo('search')));
echo '</span>';
echo '</div>';
