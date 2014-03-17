<?php
/**
 * Elgg login form
 *
 * @package Elgg
 * @subpackage Core
 */
?>

<div class="form-group">
	<label class="control-label"><?php echo elgg_echo('loginusername'); ?></label>
	<?php echo elgg_view('input/text', array(
		'name' => 'username',
		'class' => 'elgg-autofocus',
		));
	?>
</div>
<div class="form-group">
	<label class="control-label"><?php echo elgg_echo('password'); ?></label>
	<?php echo elgg_view('input/password', array('name' => 'password')); ?>
</div>

<?php echo elgg_view('login/extend', $vars); ?>

<div class="form-group">
	<label class="checkbox">
		<input type="checkbox" name="persistent" value="true" />
		<?php echo elgg_echo('user:persistent'); ?>
	</label>
	
	<?php echo elgg_view('input/submit', array('value' => elgg_echo('login'))); ?>
	
	<?php 
	if (isset($vars['returntoreferer'])) {
		echo elgg_view('input/hidden', array('name' => 'returntoreferer', 'value' => 'true'));
	}
	?>
</div><div>
	<ul class="nav">
	<?php
		if (elgg_get_config('allow_registration')) {
			echo '<li><a href="' . elgg_get_site_url() . 'register">' . elgg_echo('register') . '</a></li>';
		}
	?>
		<li>
			<a href="<?php echo elgg_get_site_url(); ?>forgotpassword"><?php echo elgg_echo('user:password:lost'); ?></a>
		</li>
	</ul>
</div>
