<?php
/**
 * twitter_bootstrap plugin settings
 */

// set default value
if (!isset($vars['entity']->display_header)) {
	$vars['entity']->display_header = 'no';
}

if (!isset($vars['entity']->display_footer)) {
	$vars['entity']->display_footer = 'no';
}

echo '<div class="elgg-fieldset">';
echo elgg_echo('twitter_bootstrap:displayheaderlogo');
echo ' ';
echo elgg_view('input/select', array(
	'name' => 'params[display_header_logo]',
	'options_values' => array(
		'no' => elgg_echo('option:no'),
		'yes' => elgg_echo('option:yes')
	),
	'value' => $vars['entity']->display_header_logo,
));
echo '</div>';

echo '<div class="elgg-fieldset">';
echo elgg_echo('twitter_bootstrap:displayfooter');
echo ' ';
echo elgg_view('input/select', array(
	'name' => 'params[display_footer]',
	'options_values' => array(
		'no' => elgg_echo('option:no'),
		'yes' => elgg_echo('option:yes')
	),
	'value' => $vars['entity']->display_footer,
));
echo '</div>';

echo '<div class="elgg-fieldset">';
echo elgg_echo('twitter_bootstrap:profile2');
echo ' ';
echo elgg_view('input/select', array(
	'name' => 'params[profile2]',
	'options_values' => array(
		'no' => elgg_echo('option:no'),
		'yes' => elgg_echo('option:yes')
	),
	'value' => $vars['entity']->profile2,
));
echo '<a href="https://github.com/twentyfiveautumn/profile2"> get profile2</a></div>';

echo '<div class="elgg-fieldset">';
echo elgg_echo('tbs:require:email');
echo ' ';
echo elgg_view('input/select', array(
	'name' => 'params[require_email_login]',
	'options_values' => array(
		'no' => elgg_echo('option:no'),
		'yes' => elgg_echo('option:yes')
	),
	'value' => $vars['entity']->require_email_login,
));
echo '<a href="http://www.zend.com/company/community/framework/downloads"> Zend framework required</a>';
echo '</div>';