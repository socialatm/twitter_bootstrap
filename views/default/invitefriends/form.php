<?php
/**
 * Elgg invite form wrapper
 *
 * @package ElggInviteFriends
 */
 
$form_vars = array('class' => 'form-horizontal');
$body_vars = array(); 

echo elgg_view_form('invitefriends/invite', $form_vars, $body_vars);
