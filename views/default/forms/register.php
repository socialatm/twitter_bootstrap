<?php
/**
 * Elgg register form
 *
 * @package Elgg
 * @subpackage Core
 */

$password = $password2 = '';
$username = get_input('u');
$email = get_input('e');
$name = get_input('n');
$password_again = elgg_echo('passwordagain');

if (elgg_is_sticky_form('register')) {
	extract(elgg_get_sticky_values('register'));
	elgg_clear_sticky_form('register');
}

?>
<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo elgg_echo('register:name'); ?></label>
	<div class="col-sm-9">
	<?php
	echo elgg_view('input/text', array(
		'name' => 'name',
		'value' => $name,
		'class' => 'elgg-autofocus col-lg-8',
	));
	?>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo elgg_echo('loginusername'); ?></label>
	<div class="col-sm-9">
	<?php
	echo elgg_view('input/text', array(
		'name' => 'email',
		'value' => $email,
		'class' => 'col-lg-8',
	));
	?>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo elgg_echo('username'); ?></label>
	<div class="col-sm-9">
	<?php
	echo elgg_view('input/text', array(
		'name' => 'username',
		'value' => $username,
		'class' => 'col-lg-8',
	));
	?>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo elgg_echo('password'); ?></label>
	<div class="col-sm-9">
	<?php
	echo elgg_view('input/password', array(
		'name' => 'password',
		'value' => $password,
		'class' => 'col-lg-8',
	));
	?>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo elgg_echo('password'); ?></label>
	<div class="col-sm-9">
	<?php
	echo elgg_view('input/password', array(
		'name' => 'password2',
		'value' => $password2,
		'placeholder' => $password_again,
		'class' => 'col-lg-8',
	));
	?>
	</div>
</div>

<!--	view to extend to add more fields to the registration form	-->
<?php if(elgg_view('register/extend', $vars)){ ?>

<div class="form-group">
	<div class="col-sm-12">
		<?php echo elgg_view('register/extend', $vars); ?>
	</div>
</div>
<?php } ?>

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
		<?php echo elgg_view('input/submit', array('name' => 'submit', 'value' => elgg_echo('register'), 'class' => 'btn btn-success',)); ?>
		<?php echo elgg_view('input/reset', array('name' => 'reset', 'value' => elgg_echo('reset'), 'class' => 'btn btn-default',)); ?>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-12">
		<?php
			echo elgg_view('input/hidden', array('name' => 'friend_guid', 'value' => $vars['friend_guid']));
			echo elgg_view('input/hidden', array('name' => 'invitecode', 'value' => $vars['invitecode']));
		?>
	</div>
</div>
