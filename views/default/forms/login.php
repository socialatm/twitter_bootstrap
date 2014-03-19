<?php
/**
 * Elgg login form
 *
 * @package Elgg
 * @subpackage Core
 */
?>

<div class="form-group text-right">
	<label class="col-sm-3 control-label"><?php echo elgg_echo('loginusername'); ?></label>
	<div class="col-sm-9">
		<?php echo elgg_view('input/text', array(
			'name' => 'username',
			'class' => 'elgg-autofocus',
			));
		?>
	</div>
</div>

<div class="form-group text-right">
	<label class="col-sm-4 control-label"><?php echo elgg_echo('password'); ?></label>
	<div class="col-sm-8">
		<?php echo elgg_view('input/password', array('name' => 'password', 'class' => '')); ?>
	</div>
</div>

<div>
<?php echo elgg_view('login/extend', $vars); ?>
</div>
<div class="form-group">
	<div class="col-sm-12">
		<label class="control-label"><?php echo elgg_echo('user:persistent'); ?></label>
		<input type="checkbox" name="persistent" value="true" />
	</div>	
</div>

<div class="form-group">
	<div class="col-sm-12">
		<?php echo elgg_view('input/submit', array('value' => elgg_echo('login'), 'class' => 'btn btn-success',)); ?>
		<?php 
			if (isset($vars['returntoreferer'])) {
			echo elgg_view('input/hidden', array('name' => 'returntoreferer', 'value' => 'true'));
			}
		?>
	</div>
</div>

<div>
	<ul class="nav nav-pills">
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
