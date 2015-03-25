<?php
/**
 * Group profile summary
 *
 * Icon and profile fields
 *
 * @uses $vars['group']
 */

if (!isset($vars['entity']) || !$vars['entity']) {
	echo elgg_echo('groups:notfound');
	return true;
}

$group = $vars['entity'];
$owner = $group->getOwnerEntity();

if (!$owner) {
	// not having an owner is very bad so we throw an exception
	$msg = "Sorry, '" . 'group owner' . "' does not exist for guid:" . $group->guid;
	throw new InvalidParameterException($msg);
}

?>

<div class="panel panel-default">
<div class="media panel-body">
	<div class="media-left">
		<?php
			// we don't force icons to be square so don't set width/height
			echo elgg_view_entity_icon($group, 'large', array(
				'href' => '',
				'width' => '',
				'height' => '',
				'class' => 'media-object img-responsive'
			));
		?>
		<p>
			<h5><?php echo elgg_echo("groups:owner"); ?>: 
				<?php
					echo elgg_view('output/url', array(
						'text' => $owner->name,
						'value' => $owner->getURL(),
						'is_trusted' => true,
					));
				?>
			</h5>
		</p>
		<p>
			<?php
				$num_members = $group->getMembers(array('count' => true));
				echo elgg_echo('groups:members') . ": " . $num_members;
			?>
		</p>
	</div>
	<div class="media-body">
		<?php
			echo elgg_view('groups/profile/fields', $vars);
		?>
    </div>
</div>
</div>
