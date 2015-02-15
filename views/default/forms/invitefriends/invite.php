<?php

/**
 * Elgg invite form contents
 *
 * @package ElggInviteFriends
 */

$site = elgg_get_site_entity();
$default_message = elgg_echo('invitefriends:message:default', array($site->name));

$introduction = elgg_echo('invitefriends:introduction');

$emails_label = elgg_echo('invitefriends:emails');
$message_label = elgg_echo('invitefriends:message');
$placeholder = elgg_echo('invitefriends:emails:placeholder');

$emails = elgg_get_sticky_value('invitefriends', 'emails');
$message = elgg_get_sticky_value('invitefriends', 'emailmessage', $default_message);

echo '

<p class="mbm elgg-text-help">'.$introduction.'</p>
<form class="form-horizontal">
	<div class="form-group">
		<label for="invitefriends-emails" class="col-sm-2 control-label">'.$emails_label.'</label>
		<div class="col-sm-10">
			<textarea class="form-control" id ="invitefriends-emails" name ="emails" required = "required" rows="3" placeholder="'.$placeholder.'">'.$emails.'</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">'.$message_label.'</label>
		<div class="col-sm-10">
			<textarea class="form-control" id ="invitefriends-emailmessage" name ="emailmessage" rows="3">'.$message.'</textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-success">'.elgg_echo('invite:friends').'</button>
		</div>
	</div>
</form>
';
