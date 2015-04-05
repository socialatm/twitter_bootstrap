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
echo '<h3>'.elgg_echo('twitter_bootstrap:displayheaderlogo').'</h3>';
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
echo '<h3>'.elgg_echo('twitter_bootstrap:displayfooter').'</h3>';
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
echo '<h3>'.elgg_echo('twitter_bootstrap:profile2').'</h3>';
echo '<h2><a href="https://community.elgg.org/plugins/1896759"> get profile2</a></h2></div>';

echo '<div class="elgg-fieldset">';
echo '<h3>'.elgg_echo('tbs:require:email').'</h3>';
echo ' ';
echo elgg_view('input/select', array(
	'name' => 'params[require_email_login]',
	'options_values' => array(
		'no' => elgg_echo('option:no'),
		'yes' => elgg_echo('option:yes')
	),
	'value' => $vars['entity']->require_email_login,
));
echo '</div>';

/*****	My Status settings	*****/

	if (!isset($vars['entity']->num_entries)) {
		$vars['entity']->num_entries = 10;
	}
	if (!isset($vars['entity']->river_post)) {
		$vars['entity']->river_post = 'yes';
	}
	
echo '<div class="elgg-module-main">';
echo '<h3>'.elgg_echo('my:status:num_entries').'</h3>';
?>
    <select name='params[num_entries]'>
		<option value="5"  <?php if ($vars['entity']->num_entries == 5 ) echo ' selected="yes" '; ?>>5</option>
		<option value="10" <?php if ($vars['entity']->num_entries == 10) echo ' selected="yes" '; ?>>10</option>
		<option value="15" <?php if ($vars['entity']->num_entries == 15) echo ' selected="yes" '; ?>>15</option>
		<option value="20" <?php if ($vars['entity']->num_entries == 20) echo ' selected="yes" '; ?>>20</option>
		<option value="25" <?php if ($vars['entity']->num_entries == 25) echo ' selected="yes" '; ?>>25</option>
		<option value="30" <?php if ($vars['entity']->num_entries == 30) echo ' selected="yes" '; ?>>30</option>
    </select>

	</div>
	<div class="elgg-module-main">
<?php

echo '<h3>'.elgg_echo('my:status:river:post').'</h3>';

echo elgg_view('input/dropdown', array(
	'name' => 'params[river_post]',
	'options_values' => array(
		'yes' => elgg_echo('option:yes'),
		'no' => elgg_echo('option:no')
	),
	'value' => $vars['entity']->river_post,
));
echo '</div>';

echo '<div class="elgg-module-main">';
echo '<h3>Twitter Bootstrap Theme v1.10</h3>
Programmers: Ray Peaslee<br />
<a href="http://twentyfiveautumn.com/">twentyfiveautumn.com</a><br />
License: <a href="http://www.gnu.org/licenses/gpl-2.0.html">GNU General Public License v2</a>
</p>';
echo '</div>';



