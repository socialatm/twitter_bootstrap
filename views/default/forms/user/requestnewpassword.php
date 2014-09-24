<?php
/**
 * Elgg forgotten password.
 *
 * @package Elgg
 * @subpackage Core
 */
?>
<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo elgg_echo('loginusername'); ?></label>
	<div class="col-sm-9">
	<?php
	echo elgg_view('input/text', array(
		'name' => 'username',
		'value' => $name,
		'class' => 'elgg-autofocus col-lg-8',
	));
	?>
	</div>
</div>
<!--	Add captcha hook	-->
<?php if(elgg_view('input/captcha', $vars)){ ?>
<div class="form-group">
	<div class="col-sm-12">
		<?php echo elgg_view('input/captcha', $vars); ?>
	</div>
</div>

<?php } ?>

<div class="form-group">
	<div class="col-sm-12">
		<?php echo elgg_view('input/submit', array('name' => 'submit', 'value' => elgg_echo('request'), 'class' => 'btn btn-success',)); ?>
	</div>
</div>
