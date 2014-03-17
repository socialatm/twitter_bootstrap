<?php
/**
 * Elgg forgotten password.
 *
 * @package Elgg
 * @subpackage Core
 */
?>

<div class="mtm">
	<?php echo elgg_echo('user:password:text'); ?>
</div>
<div class="form-group">
	<label class="control-label"><?php echo elgg_echo('loginusername'); ?></label>
	<?php echo elgg_view('input/text', array(
		'name' => 'username',
		'class' => 'elgg-autofocus',
		));
	?>
</div>
<?php echo elgg_view('input/captcha'); ?>
<div class="form-group">
	<?php echo elgg_view('input/submit', array('value' => elgg_echo('request'))); ?>
</div>
