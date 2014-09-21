<?php
/**
 * twitter bootstrap login page.
 *
 * If the user is logged in, this page will forward to the front page.
 *
 * @package Elgg.Core
 * @subpackage Accounts
 */

if (elgg_is_logged_in()) {
	forward('');
}

$ts = time();
$token = generate_action_token($ts);

$login_url = elgg_get_site_url();
if (elgg_get_config('https_login')) {
	$login_url = str_replace("http:", "https:", $login_url);
}

$lost = elgg_echo('user:password:lost');
$title = elgg_echo('login');
$content = <<<HTML

<!-- Page content starts -->
<div class="row">
	<div class="col-md-6">
                  <!-- Some content -->
                  <h3 class="title">Register Today <span class="color">!!!</span></h3>
                  <h4 >Morbi tincidunt posuere turpis eu laoreet</h4>
                  <p>Nullam in est urna. In vitae adipiscing enim. Curabitur rhoncus condimentum lorem, non convallis dolor faucibus eget. In vitae adipiscing enim. Curabitur rhoncus condimentum lorem, non convallis dolor faucibus eget. In ut nulla est. </p>
                  <h5>Maecenas hendrerit neque id</h5>
                  <ul>
                    <li>Etiam adipiscing posuere justo, nec iaculis justo dictum non</li>
                    <li>Cras tincidunt mi non arcu hendrerit eleifend</li>
                    <li>Aenean ullamcorper justo tincidunt justo aliquet et lobortis diam faucibus</li>
                    <li>Maecenas hendrerit neque id ante dictum mattis</li>
                    <li>Vivamus non neque lacus, et cursus tortor</li>
                  </ul>

                  <p>Nullam in est urna. In vitae adipiscing enim. In ut nulla est. Nullam in est urna. In vitae adipiscing enim. Curabitur rhoncus condimentum lorem, non convallis dolor faucibus eget. In ut nulla est. </p>
	</div>
                <!-- Login form -->
	<div class="col-md-6">
		<div class="formy well">
                    <!-- Title -->
                     <h4 class="title">Login to Your Account</h4>
					 <p>&nbsp;</p>
                                  <div class="form">
                                      <!-- Login form (not working)-->
									<form class="form-horizontal" role="form" action="{$login_url}action/login" method="post">
										<input type="hidden" name="__elgg_token" value={$token}>
										<input type="hidden" name="__elgg_ts" value={$ts}>
                                 								  
                                         <div class="form-group">
                                           <label for="username" class="col-lg-2 control-label">Email</label>
                                           <div class="col-lg-8">
                                             <input type="email" class="form-control" id="username" name="username" placeholder="Email">
                                           </div>
                                         </div>
                                         <div class="form-group">
                                           <label for="password" class="col-lg-2 control-label">Password</label>
                                           <div class="col-lg-8">
                                             <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                           </div>
                                         </div>
                                         <div class="form-group">
                                           <div class="col-lg-offset-2 col-lg-8">
                                             <div class="checkbox">
                                               <label>
                                                 <input type="checkbox" name="persistent"> Remember me
                                               </label>
                                             </div>
                                           </div>
                                         </div>
                                         <div class="form-group">
                                           <div class="col-lg-offset-2 col-lg-10">
                                             <button type="submit" class="btn btn-default">Sign in</button>
                                             <button type="reset" class="btn btn-default">Reset</button>
                                           </div>
                                         </div>
                                       </form>
                                      
                                      <hr />
									  
									  <h5></h5>
                                      <!-- Forgot Password link -->
                                             Don't remember your Password? <a href="{$login_url}forgotpassword">{$lost}</a>

                                      <h5>New Account</h5>
                                      <!-- Register link -->
                                             Don't have an Account? <a href="{$login_url}register">Register</a>
			</div> 
		</div>
	</div>
</div>
<!-- Page content ends -->
HTML;

if (elgg_get_config('walled_garden')) {
	elgg_load_css('elgg.walled_garden');
	$body = elgg_view_layout('walled_garden', array('content' => $content));
	echo elgg_view_page($title, $body, 'walled_garden');
} else {
	$body = elgg_view_layout('one_column', array('content' => $content));
	echo elgg_view_page($title, $body);
}
