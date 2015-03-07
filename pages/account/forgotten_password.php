<?php
/**
 * Assembles and outputs the forgotten password page.
 *
 * @package Elgg.Core
 * @subpackage Registration
 */

if (elgg_is_logged_in()) {
	forward();
}

$title = elgg_echo("user:password:lost");
$site = elgg_get_site_entity();
$site_name = $site->name;

$form = elgg_view_form('user/requestnewpassword', array(
		'class' => 'form form-horizontal',
		));

$content = '
<div class="row">
	<div class="col-md-6">
		<!-- Some content -->
		<h3 class="title">Lost your '.$site_name.' password?</h3>
		<h4 >No worries, you\'ll be logged back in before you know it.</h4>
        <h5>Put more interesting content here:</h5>
        <ul>
			<li>Line item 1.</li>
            <li>Line item 2.</li>
            <li>Line item 3.</li>
            <li>Line item 4.</li>
            <li>Line item 5.</li>
		</ul>
        <p>Thank you. At '.$site_name.'. we\'ve got you covered. 
		</p>		
	</div>
	<div class="col-md-6 well">
		<!-- Title -->
		<h4 class="title">'.$title.'</h4>
	<!--	<p>&nbsp;</p>	-->
			'.$form.'
		<h5>'.elgg_echo('user:password:text').'</h5>
	</div>
</div>
';

$body = elgg_view_layout("one_column", array('content' => $content));
echo elgg_view_page($title, $body);
