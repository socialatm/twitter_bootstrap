<?php
/**
 * Elgg user display (details)
 * @uses $vars['entity'] The user entity
 */

$user = elgg_get_page_owner_entity();
$profile_fields = elgg_get_config('profile_fields');

echo '<span class="hidden nickname p-nickname">'.$user->username.'</span>';

// the controller doesn't allow non-admins to view banned users' profiles
if ($user->isBanned()) {
	$title = elgg_echo('banned');
	$reason = ($user->ban_reason === 'banned') ? '' : $user->ban_reason;
	echo "<div class='profile-banned-user'><h4 class='mbs'>$title</h4>$reason</div>";
}

echo elgg_view("profile/status", array("entity" => $user));

$microformats = array(
	'mobile' => 'tel p-tel',
	'phone' => 'tel p-tel',
	'website' => 'url u-url',
	'contactemail' => 'email u-email',
);

echo '	<table class="table table-striped">
			<tbody>';

if (is_array($profile_fields) && sizeof($profile_fields) > 0) {
	foreach ($profile_fields as $shortname => $valtype) {
		if ($shortname == "description") {
			// skip about me and put at bottom
			continue;
		}
		$value = $user->$shortname;
		if (!empty($value)) {

			// fix profile URLs populated by https://github.com/Elgg/Elgg/issues/5232
			// @todo Replace with upgrade script, only need to alter users with last_update after 1.8.13
			if ($valtype == 'url' && $value == 'http://') {
				$user->$shortname = '';
				continue;
			}

			// validate urls
			if ($valtype == 'url' && !preg_match('~^https?\://~i', $value)) {
				$value = "http://$value";
			}

			?>
				<tr>
					<td><?php echo elgg_echo("profile:{$shortname}"); ?>:</td>
			<?php
				$params = array(
					'value' => $value
				);
				$class = (isset($microformats[$shortname]))? $microformats[$shortname] : '';
					
		echo '		<td class="'.$class.'">'.elgg_view("output/{$valtype}", $params).'</td>
				</tr>';
		}
	}
}

if ($user->description) {
	echo 	'<tr>
				<td colspan="4">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="4">'.elgg_echo("profile:aboutme").':</td>
			</tr>
			<tr>
				<td colspan="4" id="profile-user-description">'.elgg_view('output/longtext', array('value' => $user->description,)).'</td>
			</tr>';
}
echo 	'</tbody>
	</table>';
