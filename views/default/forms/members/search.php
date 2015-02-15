<?php
echo '

<div class="input-group">
	<input type="text" name="member_query" required="required" class="form-control">
	<span class="input-group-btn">
		<button class="btn btn-default" type="submit">'.elgg_echo('search').'</button>
	</span>
</div>';

echo "<p class='mtl elgg-text-help'>" . elgg_echo('members:total', array(get_number_users())) . "</p>";
