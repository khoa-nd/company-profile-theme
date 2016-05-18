<?php
/**
 * Company Page
 */

while ( have_posts() ) : the_post();

global $redux_demo; 
$access_state = $redux_demo['access-state'];

if ( !is_user_logged_in() && $access_state == 1) {

	$login = home_url('/')."login?info=accesspage";
	wp_redirect( $login ); exit;

}

$td_this_post_id = $post->ID;

if(empty($td_this_post_id)) {

	$page = get_page($post->ID);
	$td_this_post_id = $page->ID;

} 

$wpjobus_company_cover_image = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_company_cover_image',true));
$wpjobus_company_fullname = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_company_fullname',true));
$wpjobus_company_tagline = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_company_tagline',true));
$company_industry = esc_attr(get_post_meta($td_this_post_id, 'company_industry',true));
$td_company_team_size = esc_attr(get_post_meta($td_this_post_id, 'company_team_size',true));
$resume_about_me = html_entity_decode(get_post_meta($td_this_post_id, 'company-about-me',true));
$wpjobus_company_foundyear = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_company_foundyear',true));
$wpjobus_company_profile_picture = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_company_profile_picture',true));
$company_location = esc_attr(get_post_meta($td_this_post_id, 'company_location',true));

$wpjobus_resume_prof_title = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_prof_title',true));
$td_resume_career_level = esc_attr(get_post_meta($td_this_post_id, 'resume_career_level',true));

$wpjobus_resume_comm_level = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_comm_level',true));
$wpjobus_resume_comm_note = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_comm_note',true));

$wpjobus_resume_org_level = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_org_level',true));
$wpjobus_resume_org_note = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_org_note',true));

$wpjobus_resume_job_rel_level = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_job_rel_level',true));
$wpjobus_resume_job_rel_note = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_job_rel_note',true));

$wpjobus_company_services = get_post_meta($td_this_post_id, 'wpjobus_company_services',true);
$wpjobus_company_expertise = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_company_expertise',true));

$wpjobus_resume_education = get_post_meta($td_this_post_id, 'wpjobus_resume_education',true);
$wpjobus_resume_award = get_post_meta($td_this_post_id, 'wpjobus_resume_award',true);
$wpjobus_company_clients = get_post_meta($td_this_post_id, 'wpjobus_company_clients',true);
$wpjobus_company_testimonials = get_post_meta($td_this_post_id, 'wpjobus_company_testimonials',true);

$wpjobus_resume_remuneration = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_remuneration',true));
$wpjobus_resume_remuneration_per = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_remuneration_per',true));

$wpjobus_resume_job_freelance = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_job_freelance',true));
$wpjobus_resume_job_part_time = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_job_part_time',true));
$wpjobus_resume_job_full_time = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_job_full_time',true));
$wpjobus_resume_job_internship = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_job_internship',true));
$wpjobus_resume_job_volunteer = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_resume_job_volunteer',true));

$wpjobus_company_portfolio = get_post_meta($td_this_post_id, 'wpjobus_company_portfolio',true);


$wpjobus_company_address = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_company_address',true));
$wpjobus_company_phone = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_company_phone',true));
$wpjobus_company_website = esc_url(get_post_meta($td_this_post_id, 'wpjobus_company_website',true));
$wpjobus_company_email = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_company_email',true));
$wpjobus_company_publish_email = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_company_publish_email',true));
$wpjobus_company_facebook = esc_url(get_post_meta($td_this_post_id, 'wpjobus_company_facebook',true));
$wpjobus_company_linkedin = esc_url(get_post_meta($td_this_post_id, 'wpjobus_company_linkedin',true));
$wpjobus_company_twitter = esc_url(get_post_meta($td_this_post_id, 'wpjobus_company_twitter',true));
$wpjobus_company_googleplus = esc_url(get_post_meta($td_this_post_id, 'wpjobus_company_googleplus',true));

$wpjobus_company_googleaddress = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_company_googleaddress',true));
$wpjobus_company_longitude = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_company_longitude',true));
$wpjobus_company_latitude = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_company_latitude',true));

get_header(); 

global $redux_demo;
$contact_email = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_company_email',true));
$wpcrown_contact_email_error = esc_attr($redux_demo['contact-email-error']);
$wpcrown_contact_name_error = esc_attr($redux_demo['contact-name-error']);
$wpcrown_contact_message_error = esc_attr($redux_demo['contact-message-error']);
$wpcrown_contact_thankyou = esc_attr($redux_demo['contact-thankyou-message']);
$wpcrown_contact_test_error = esc_attr($redux_demo['contact-test-error']);

?>

	<section id="popup-login">

		<div class="container">

			<div class="resume-skills">

				<a id="close-popup-login" href="#" data-rel="tooltip" rel="top" title="<?php _e( "close", "themesdojo" ); ?>" ><i class="fa fa-times"></i></a>

				<h1 class="resume-section-title"><i class="fa fa-check"></i><?php _e( 'Login', 'themesdojo' ); ?></h1>
				<h3 class="resume-section-subtitle"><?php _e( 'Don\'t have an account?', 'themesdojo' ); ?> <a id="open-register-popup" href="#"><?php _e( 'Sign up now.', 'themesdojo' ); ?></a></h3>

				<div class="divider"></div>

				<div class="full" style="margin-bottom: 0;">

					<div class="one_half first" style="margin-bottom: 0;">

						<form id="wpjobus-login" type="post" action="" >

							<div class="full" style="margin-bottom: 0;">  
						  	
							  	<span class="one_third first">
									<h3><?php _e( 'Username:', 'themesdojo' ); ?></h3>
								</span>

								<span class="two_third">
									<input type="text" name="userName" id="userName" value="" class="input-textarea" placeholder="" />
									<label for="userName" class="error userNameError"></label>
								</span>

							</div>

							<div class="full" style="margin-bottom: 0;">

								<span class="one_third first">
									<h3><?php _e( 'Password:', 'themesdojo' ); ?></h3>
								</span>

								<span class="two_third">
									<input type="password" name="userPassword" id="userPasswordRegister" value="" class="input-textarea" placeholder="" />
									<label for="userPassword" class="error userPasswordError"></label>

									<fieldset class="input-full-width" style="padding: 0;">
										<input name="rememberme" type="checkbox" value="forever" style="float: left; width: auto; margin-right: 5px; margin-top: 2px;"/><span style="margin-left: 10px; float: left; margin-bottom: 10px;"><?php _e( 'Remember me', 'themesdojo' ); ?></span>
										<a style="float: right;" class="" href="<?php $reset = home_url('/')."reset"; echo $reset; ?>"><?php _e( 'Forgot Password', 'themesdojo' ); ?></a>
									</fieldset>

								</span>

							</div>
							
							<input type="hidden" name="action" value="wpjobusLoginForm" />
							<?php wp_nonce_field( 'wpjobusLogin_html', 'wpjobusLogin_nonce' ); ?>

							<input style="margin-bottom: 0;" name="submit" type="submit" value="<?php _e( 'Login', 'themesdojo' ); ?>" class="input-submit">	 

							<span class="submit-loading"><i class="fa fa-refresh fa-spin"></i></span>
						  	  
						</form>

						<div id="success">
							<span>
							   	<h3><?php _e( 'Login successful.', 'themesdojo' ); ?></h3>
							</span>
						</div>
							 
						<div id="error">
							<span>
							   	<h3><?php _e( 'Something went wrong, try refreshing and submitting the form again.', 'themesdojo' ); ?></h3>
							</span>
						</div>

						<script type="text/javascript">

						jQuery(function($) {
							jQuery('#wpjobus-login').validate({
						        rules: {
						            userName: {
						                required: true,
						                minlength: 3
						            },
						            userPasswordRegister: {
						                required: true,
						                minlength: 1,
						            }
						        },
						        messages: {
							        userName: {
							            required: "<?php _e( 'Please provide a username', 'themesdojo' ); ?>",
							            minlength: "<?php _e( 'Your username must be at least 3 characters long', 'themesdojo' ); ?>"
							        },
							        userPasswordRegister: {
							            required: "<?php _e( 'Please provide a password', 'themesdojo' ); ?>",
							            minlength: "<?php _e( 'Your password must be at least 6 characters long', 'themesdojo' ); ?>"
							        }
							    },
						        submitHandler: function(form) {
						        	jQuery('#wpjobus-login .input-submit').css('display','none');
						        	jQuery('#wpjobus-login .submit-loading').css('display','block');
						            jQuery(form).ajaxSubmit({
						            	type: "POST",
								        data: jQuery(form).serialize(),
								        url: '<?php echo admin_url('admin-ajax.php'); ?>', 
						                success: function(data) {
						                	if(data == 1) {
						                		jQuery("#userName").addClass("error");
						                		jQuery(".userNameError").text("<?php _e( 'Username doesn’t exists. Please try another one.', 'themesdojo' ); ?>");
						                		jQuery('.userNameError').css('display','block');

						                		jQuery('#wpjobus-login .input-submit').css('display','block');
						        				jQuery('#wpjobus-login .submit-loading').css('display','none');
						                	}

						                	if(data == 2) {
						                		jQuery("#userPassword").addClass("error");
						                		jQuery(".userPasswordError").text("<?php _e( 'Password doesn’t exists. Please try another one.', 'themesdojo' ); ?>");
						                		jQuery('.userPasswordError').css('display','block');

						                		jQuery('#wpjobus-login .input-submit').css('display','block');
						        				jQuery('#wpjobus-login .submit-loading').css('display','none');
						                	}

						                	if(data == 3) {
						                		jQuery("#userName").addClass("error");
						                		jQuery(".userNameError").text("<?php _e( 'Username doesn’t exists. Please try another one.', 'themesdojo' ); ?>");
						                		jQuery('.userNameError').css('display','block');

						                		jQuery("#userPassword").addClass("error");
						                		jQuery(".userPasswordError").text("<?php _e( 'Password doesn’t exists. Please try another one.', 'themesdojo' ); ?>");
						                		jQuery('.userPasswordError').css('display','block');

						                		jQuery('#wpjobus-login .input-submit').css('display','block');
						        				jQuery('#wpjobus-login .submit-loading').css('display','none');
						                	}

						                	if(data == 4) {
						                		jQuery('#wpjobus-login :input').attr('disabled', 'disabled');
							                    jQuery('#wpjobus-login').fadeTo( "slow", 0, function() {
							                        jQuery(this).find(':input').attr('disabled', 'disabled');
							                        jQuery(this).find('label').css('cursor','default');
							                        jQuery('#success').fadeIn();

      												var delay = 10;
      												setTimeout(function(){ window.location.reload(); }, delay); 
							                    });
						                	}

						                	if(data == 5) {
						                		jQuery('#wpjobus-login').fadeTo( "slow", 0, function() {
							                        jQuery('#error').fadeIn();
							                    });
						                	}
						                },
						                error: function(data) {
						                    jQuery('#wpjobus-login').fadeTo( "slow", 0, function() {
						                        jQuery('#error').fadeIn();
						                    });
						                }
						            });
						        }
						    });
						});
						</script>

					</div>

					<div class="one_half social-links" style="margin-bottom: 0;">

						<?php 					
							if(get_option('users_can_register')) { //Check whether user registration is enabled by the administrator
						?>

						<h3 style="margin-top: 0;"><?php _e( 'Social account login', 'themesdojo' ); ?></h3>

						<?php
						/**
						 * Detect plugin. For use on Front End only.
						 */
						include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

						// check for plugin using plugin name
						if ( is_plugin_active( "nextend-facebook-connect/nextend-facebook-connect.php" ) ) {
						  //plugin is activated
						
						?>

						<a class="register-social-button-facebook" href="<?php echo get_site_url(); ?>/wp-login.php?loginFacebook=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;"><i class="fa fa-facebook-square"></i> Facebook</a>

						<?php } ?>

						<?php
						/**
						 * Detect plugin. For use on Front End only.
						 */
						include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

						// check for plugin using plugin name
						if ( is_plugin_active( "nextend-twitter-connect/nextend-twitter-connect.php" ) ) {
						  //plugin is activated
						
						?>
						
						<a class="register-social-button-twitter" href="<?php echo get_site_url(); ?>/wp-login.php?loginTwitter=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginTwitter=1&redirect='+window.location.href; return false;"><i class="fa fa-twitter-square"></i> Twitter</a>

						<?php } ?>

						<?php
						/**
						 * Detect plugin. For use on Front End only.
						 */
						include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

						// check for plugin using plugin name
						if ( is_plugin_active( "nextend-google-connect/nextend-google-connect.php" ) ) {
						  //plugin is activated
						
						?>

						<a class="register-social-button-google" href="<?php echo get_site_url(); ?>/wp-login.php?loginGoogle=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginGoogle=1&redirect='+window.location.href; return false;"><i class="fa fa-google-plus-square"></i> Google</a>

						<?php } ?>

						<?php } ?>

					</div>

				</div>

			</div>

		</div>

		<div id="close-login" class="close-login"></div>

		<script type="text/javascript">

			jQuery(function($) {

				document.getElementById('close-login').addEventListener('click', function(e) {
											
					jQuery('#popup-login').css('display','none');

				});

				document.getElementById('close-popup-login').addEventListener('click', function(e) {
											
					jQuery('#popup-login').css('display','none');

				});

				document.getElementById('open-register-popup').addEventListener('click', function(e) {
											
					jQuery('#popup-login').css('display','none');
					jQuery('#popup-register').css('display','block');

				});

			});
		</script>

	</section>

	<section id="popup-register">

		<div class="container">

			<div class="resume-skills">

				<a id="close-popup-register" data-rel="tooltip" rel="top" title="<?php _e( "close", "themesdojo" ); ?>" href="#"><i class="fa fa-times"></i></a>

				<h1 class="resume-section-title"><i class="fa fa-check"></i><?php _e( 'Register an Account', 'themesdojo' ); ?></h1>
				<h3 class="resume-section-subtitle"><?php _e( 'Have an account?', 'themesdojo' ); ?> <a id="open-login-popup" href="#"><?php _e( 'Login now.', 'themesdojo' ); ?></a></h3>

				<div class="divider"></div>

				<div class="full" style="margin-bottom: 0;">

					<?php 					
						if(get_option('users_can_register')) { //Check whether user registration is enabled by the administrator
					?>

					<div class="one_half first" style="margin-bottom: 0;">

						<form id="wpjobus-register" type="post" action="" >  
						  	
						  	<span class="one_half first">
								<h3><?php _e( 'Username:', 'themesdojo' ); ?></h3>
							</span>

							<span class="one_half">
								<input type="text" name="userName" id="userName" value="" class="input-textarea" placeholder="" />
								<label for="userName" class="error userNameError"></label>
							</span>

							<span class="one_half first">
								<h3><?php _e( 'Email:', 'themesdojo' ); ?></h3>
							</span>

							<span class="one_half">
								<input type="text" name="userEmail" id="userEmail" value="" class="input-textarea" placeholder="" />
								<label for="userEmail" class="error userEmailError"></label>
							</span>

							<span class="one_half first">
								<h3><?php _e( 'Password:', 'themesdojo' ); ?></h3>
							</span>

							<span class="one_half">
								<input type="password" name="userPassword" id="userPassword" value="" class="input-textarea" placeholder="" />
							</span>

							<span class="one_half first">
								<h3><?php _e( 'Repeat Password:', 'themesdojo' ); ?></h3>
							</span>

							<span class="one_half">
								<input type="password" name="userConfirmPassword" id="userConfirmPassword" value="" class="input-textarea" placeholder="" />
							</span>
							 
							<?php

								global $redux_demo; 
								$account_type = $redux_demo['account-state'];

								$key = 'account_type';
								$single = true;
								$user_account_type = get_user_meta( $td_user_id, $key, $single );

								if($account_type == 2) {

							?>

							<span class="one_half first">
								<h3><?php _e( 'Account type:', 'themesdojo' ); ?></h3>
							</span>

							<span class="one_half">
								<select name="account_type" id="account_type" style="width: 100%; margin-bottom: 10px;">
									<option value='job-seeker' <?php selected( "job-seeker", $user_account_type ); ?>><?php _e( 'Job Seeker', 'themesdojo' ); ?></option>
									<option value='job-offer' <?php selected( "job-offer", $user_account_type ); ?>><?php _e( 'Job Offer', 'themesdojo' ); ?></option>
								</select>
							</span>

							<?php } ?>
							
							<input type="hidden" name="action" value="wpjobusRegisterForm" />
							<?php wp_nonce_field( 'wpjobusRegister_html', 'wpjobusRegister_nonce' ); ?>

							<input style="margin-bottom: 0;" name="submit" type="submit" value="<?php _e( 'Register', 'themesdojo' ); ?>" class="input-submit">	 

							<span class="submit-loading"><i class="fa fa-refresh fa-spin"></i></span>
						  	  
						</form>

						<div id="successRegister">
							<span>
							   	<h3><?php _e( 'Registration successful.', 'themesdojo' ); ?></h3>
							</span>
						</div>
							 
						<div id="errorRegister">
							<span>
							   	<h3><?php _e( 'Something went wrong, try refreshing and submitting the form again.', 'themesdojo' ); ?></h3>
							</span>
						</div>

						<script type="text/javascript">

						jQuery(function($) {
							jQuery('#wpjobus-register').validate({
						        rules: {
						            userName: {
						                required: true,
						                minlength: 3
						            },
						            userEmail: {
						                required: true,
						                email: true
						            },
						            userPassword: {
						                required: true,
						                minlength: 6,
						            },
						            userConfirmPassword: {
						                required: true,
						                minlength: 6,
						                equalTo: "#userPassword"
						            }
						        },
						        messages: {
							        userName: {
							            required: "<?php _e( 'Please provide a username', 'themesdojo' ); ?>",
							            minlength: "<?php _e( 'Your username must be at least 3 characters long', 'themesdojo' ); ?>"
							        },
							        userEmail: {
							            required: "<?php _e( 'Please provide an email address', 'themesdojo' ); ?>",
							            email: "<?php _e( 'Please enter a valid email address', 'themesdojo' ); ?>"
							        },
							        userPassword: {
							            required: "<?php _e( 'Please provide a password', 'themesdojo' ); ?>",
							            minlength: "<?php _e( 'Your password must be at least 6 characters long', 'themesdojo' ); ?>"
							        },
							        userConfirmPassword: {
							            required: "<?php _e( 'Please provide a password', 'themesdojo' ); ?>",
							            minlength: "<?php _e( 'Your password must be at least 6 characters long', 'themesdojo' ); ?>",
							            equalTo: "<?php _e( 'Please enter the same password as above', 'themesdojo' ); ?>"
							        }
							    },
						        submitHandler: function(form) {
						        	jQuery('#wpjobus-register .input-submit').css('display','none');
						        	jQuery('#wpjobus-register .submit-loading').css('display','block');
						            jQuery(form).ajaxSubmit({
						            	type: "POST",
								        data: jQuery(form).serialize(),
								        url: '<?php echo admin_url('admin-ajax.php'); ?>', 
						                success: function(data) {
						                	if(data == 1) {
						                		jQuery("#userName").addClass("error");
						                		jQuery(".userNameError").text("<?php _e( 'Username exists. Please try another one.', 'themesdojo' ); ?>");
						                		jQuery('.userNameError').css('display','block');

						                		jQuery('#wpjobus-register .input-submit').css('display','block');
						        				jQuery('#wpjobus-register .submit-loading').css('display','none');
						                	}

						                	if(data == 2) {
						                		jQuery("#userEmail").addClass("error");
						                		jQuery(".userEmailError").text("<?php _e( 'Email exists. Please try another one.', 'themesdojo' ); ?>");
						                		jQuery('.userEmailError').css('display','block');

						                		jQuery('#wpjobus-register .input-submit').css('display','block');
						        				jQuery('#wpjobus-register .submit-loading').css('display','none');
						                	}

						                	if(data == 3) {
						                		jQuery("#userName").addClass("error");
						                		jQuery(".userNameError").text("<?php _e( 'Username exists. Please try another one.', 'themesdojo' ); ?>");
						                		jQuery('.userNameError').css('display','block');

						                		jQuery("#userEmail").addClass("error");
						                		jQuery(".userEmailError").text("<?php _e( 'Email exists. Please try another one.', 'themesdojo' ); ?>");
						                		jQuery('.userEmailError').css('display','block');

						                		jQuery('#wpjobus-register .input-submit').css('display','block');
						        				jQuery('#wpjobus-register .submit-loading').css('display','none');
						                	}

						                	if(data == 4) {
							                    jQuery('#wpjobus-register :input').attr('disabled', 'disabled');
							                    jQuery('#wpjobus-register').fadeTo( "slow", 0, function() {
							                        jQuery(this).find(':input').attr('disabled', 'disabled');
							                        jQuery(this).find('label').css('cursor','default');
							                        jQuery('#successRegister').fadeIn();

      												var delay = 10;
      												setTimeout(function(){ window.location.reload(); }, delay); 
							                    });
						                	}

						                	if(data == 5) {
						                		jQuery('#wpjobus-register').fadeTo( "slow", 0, function() {
							                        jQuery('#errorRegister').fadeIn();
							                    });
						                	}
						                },
						                error: function(data) {
						                    jQuery('#wpjobus-register').fadeTo( "slow", 0, function() {
						                        jQuery('#errorRegister').fadeIn();
						                    });
						                }
						            });
						        }
						    });
						});
						</script>

					</div>

					<div class="one_half social-links" style="margin-bottom: 0;">

						<h3 style="margin-top: 0;"><?php _e( 'Social account register', 'themesdojo' ); ?></h3>

						<?php
						/**
						 * Detect plugin. For use on Front End only.
						 */
						include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

						// check for plugin using plugin name
						if ( is_plugin_active( "nextend-facebook-connect/nextend-facebook-connect.php" ) ) {
						  //plugin is activated
						
						?>

						<a class="register-social-button-facebook" href="<?php echo get_site_url(); ?>/wp-login.php?loginFacebook=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;"><i class="fa fa-facebook-square"></i> Facebook</a>

						<?php } ?>

						<?php
						/**
						 * Detect plugin. For use on Front End only.
						 */
						include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

						// check for plugin using plugin name
						if ( is_plugin_active( "nextend-twitter-connect/nextend-twitter-connect.php" ) ) {
						  //plugin is activated
						
						?>
						
						<a class="register-social-button-twitter" href="<?php echo get_site_url(); ?>/wp-login.php?loginTwitter=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginTwitter=1&redirect='+window.location.href; return false;"><i class="fa fa-twitter-square"></i> Twitter</a>

						<?php } ?>

						<?php
						/**
						 * Detect plugin. For use on Front End only.
						 */
						include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

						// check for plugin using plugin name
						if ( is_plugin_active( "nextend-google-connect/nextend-google-connect.php" ) ) {
						  //plugin is activated
						
						?>

						<a class="register-social-button-google" href="<?php echo get_site_url(); ?>/wp-login.php?loginGoogle=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginGoogle=1&redirect='+window.location.href; return false;"><i class="fa fa-google-plus-square"></i> Google</a>

						<?php } ?>

					</div>

					<?php }
						
						else echo "<span class='registration-closed'>Registration is currently disabled. Please try again later.</span>";

					?>

				</div>

			</div>

		</div>

		<div id="close-register" class="close-register"></div>

		<script type="text/javascript">

			jQuery(function($) {

				document.getElementById('close-register').addEventListener('click', function(e) {
											
					jQuery('#popup-register').css('display','none');

				});

				document.getElementById('close-popup-register').addEventListener('click', function(e) {
											
					jQuery('#popup-register').css('display','none');

				});

				document.getElementById('open-login-popup').addEventListener('click', function(e) {
											
					jQuery('#popup-login').css('display','block');
					jQuery('#popup-register').css('display','none');

				});

			});
		</script>

	</section>

	<section id="resume-cover-image">

		<?php 
			if (current_user_can('administrator')) {
		?>

		<div class="admin-settings-header">

			<div class="admin-settings-header-top">

				<div class="container">

					<div class="one_fifth first">

						<span><?php _e( 'Status:', 'themesdojo' ); ?> <?php echo get_post_status($td_this_post_id); ?></span>

					</div>

					<div class="one_fifth">

						<span><?php _e( 'Type:', 'themesdojo' ); ?> <?php $wpjobus_post_reg_status = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_featured_post_status',true)); echo $wpjobus_post_reg_status; ?></span>

					</div>

					<div class="one_fifth">

						<span><?php _e( 'Submitted on:', 'themesdojo' ); ?> <?php echo get_the_time('d/m/Y', $td_this_post_id); ?></span>

					</div>

					<div class="one_fifth">

						<?php if($wpjobus_post_reg_status == "featured") { ?>

						<span><?php _e( 'Expires on:', 'themesdojo' ); ?> <?php $wpjobus_post_exp = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_featured_expiration_date',true)); if(!empty($wpjobus_post_exp)) { echo $time = date("m/d/Y", $wpjobus_post_exp); } ?></span>

						<?php } ?>

					</div>

					<div class="one_fifth">

						<?php

							$author_id = $wpdb->get_results( "SELECT DISTINCT post_author FROM `{$wpdb->prefix}posts` WHERE post_type = 'company' and ID = '".$td_this_post_id."' ORDER BY `ID` DESC");

							foreach ($author_id as $key => $value) {
							    
							    $td_result_author = $value->post_author;

							}

						?>

						<span style="float: right;"><?php _e( 'Username:', 'themesdojo' ); ?> <?php $td_user_info = get_userdata($td_result_author); echo $td_user_info->user_login; ?></span>

					</div>

				</div>

			</div>

			<div class="admin-settings-header-content">

				<div class="container">

					<div class="one_fourth first" style="margin-bottom: 0;">

						<h3><?php _e( 'Admin Menu', 'themesdojo' ); ?></h3>

					</div>

					<div class="three_fourth" style="margin-bottom: 0; margin: 18px 0;">

						<div style="float: right">

							<form id="wpjobus-add-company" type="post" action="" >

								<span style="margin-right: 10px; margin-top: 12px;"><?php _e( 'Status:', 'themesdojo' ); ?></span>

								<?php $post_status = get_post_status($td_this_post_id); ?>

								<select name="post-status" id="post-status" style="width: 150px; margin-right: 30px; margin-bottom: 0;">
									<option value='publish' <?php selected( $post_status, "publish" ); ?>>publish</option>
									<option value='draft' <?php selected( $post_status, "draft" ); ?>>draft</option>
									<option value='pending' <?php selected( $post_status, "pending" ); ?>>pending</option>
								</select>

								<span style="margin-right: 10px; margin-top: 12px;"><?php _e( 'Type:', 'themesdojo' ); ?></span>

								<select name="post-type" id="post-type" style="width: 150px; margin-right: 30px; margin-bottom: 0;">
									<option value='featured' <?php selected( $wpjobus_post_reg_status, "featured" ); ?>>featured</option>
									<option value='regular' <?php selected( $wpjobus_post_reg_status, "regular" ); ?>>regular</option>
								</select>

								<div class="exp-days-block" style="display: <?php if($wpjobus_post_reg_status == "featured") { ?>block;<?php } else { ?>none;<?php } ?>">

									<span style="margin-right: 10px; margin-top: 12px;"><?php _e( 'Expires in:', 'themesdojo' ); ?></span>

									<?php 

										if($wpjobus_post_reg_status == "featured") {

											$wpjobus_featured_expiration_date = esc_attr(get_post_meta($td_this_post_id, 'wpjobus_featured_expiration_date',true));

											$start = current_time('timestamp');
											$end = $wpjobus_featured_expiration_date;

											$days_between = ceil(abs($end - $start) / 86400); 

										} else {

											$days_between = "";
											
										}

									?>

									<input type="text" name="exp-time" id="exp-time" value="<?php echo $days_between; ?>" class="input-textarea" placeholder="" style="width: 50px; margin-right: 10px; margin-bottom: 0;"/>

									<span style="margin-right: 30px; margin-top: 12px;"><?php _e( 'days', 'themesdojo' ); ?></span>

								</div>

								<input type="hidden" id="featPostId" name="featPostId" value="<?php echo $td_this_post_id; ?>">

								<input style="margin: 0;" name="submit" type="submit" value="Update" class="input-submit">
								<span class="submit-loading" style="margin: 0;"><i class="fa fa-refresh fa-spin"></i></span>

								<span id="success" style="float: left; width: auto; margin: 10px 0;"><?php _e( 'Done', 'themesdojo' ); ?></span>

								<input type="hidden" name="action" value="wpjobusAdminFeaturedCompanyForm" />
								<?php wp_nonce_field( 'wpjobusAdminFeaturedCompanyForm_html', 'wpjobusAdminFeaturedCompanyForm_nonce' ); ?>

							</form>

							<script type="text/javascript">

								jQuery(function($) {

									$("#post-type").change(function(){

										if($(this).val() == "featured" ) {

									    	jQuery('.exp-days-block').css('display','block');

									 	} else {

									   		jQuery('.exp-days-block').css('display','none');

									  	}

									});

									jQuery('#wpjobus-add-company').validate({
										rules: {
										},
										messages: {
										},
										submitHandler: function(form) {
										    jQuery('#wpjobus-add-company .input-submit').css('display','none');
										    jQuery('#wpjobus-add-company .submit-loading').css('display','block');
										    jQuery(form).ajaxSubmit({
										        type: "POST",
												data: jQuery(form).serialize(),
												url: '<?php echo admin_url('admin-ajax.php'); ?>', 
										        success: function(data) {
										            jQuery('#wpjobus-add-company .submit-loading').css('display','none');
										        	jQuery('#success').fadeIn(); 

				      								<?php $redirect_link = home_url('/')."?post_type=company&p=".$td_this_post_id."&preview=true"; ?>

				      								var delay = 1;
				      								setTimeout(function(){ window.location = '<?php echo $redirect_link; ?>';}, delay);
										        },
										        error: function(data) {
										        	jQuery('#wpjobus-add-company .input-submit').css('display','block');
										        	jQuery('#wpjobus-add-company .submit-loading').css('display','none');

										            jQuery('#error').fadeIn();
										        }
										    });
										}
									});

								});

							</script>

						</div>

					</div>

				</div>

			</div>

		</div>

		<?php } ?>

		<div class="bannerText">
			<?php 

				global $redux_demo, $td_website_type; 
				$td_website_type = $redux_demo['homepage-state'];

				if(($td_website_type == 1) or empty($td_website_type)) {

			?>
			<div class="menu-nav-trigger">
				<span class="zebra-line top"></span>
				<span class="zebra-line middle"></span>
				<span class="zebra-line bottom"></span>
			</div>
			<?php } ?>
			<span class="banner-hello">
				<span class="company-list-icon" style="float: none;">
					<span class="helper-company"></span>
					<img class="center-img-comp" src="<?php echo $wpjobus_company_profile_picture; ?>" alt="">
				</span>
			</span>
	      	<h1><?php echo $wpjobus_company_fullname; ?></h1>
	      	<h2><?php echo $wpjobus_company_tagline; ?></h2>
	      	<span class="cover-resume-breadcrumbs"><a href="<?php echo home_url('/'); ?>"><i class="fa fa-home"></i></a> <i class="fa fa-chevron-right"></i> <a href="<?php echo home_url('/'); ?>/companies"><?php _e( 'Companies', 'themesdojo' ); ?></a> <i class="fa fa-chevron-right"></i> <?php echo $company_industry; ?> </span>

	      	<span class="like-listing">

	      		<?php 

	      			$td_user_id = get_current_user_id();

	      			global $wpdb;
	      			$myFav = $wpdb->get_results( 'SELECT id FROM wpjobus_favorites WHERE user_id = "'.$td_user_id.'" AND listing_id = "'.$td_this_post_id.'" ' );

	      			if(empty($myFav)) {
	      				$favStatus = 0;
	      			} else {
	      				$favStatus = 1;
	      			}

	      		?>

	      		<span id="like-listing-container" class="like-listing-container">
	      			<i class="fa fa-heart-o" <?php if(empty($myFav)) { ?>style="display: block"<?php } else { ?>style="display: none"<?php } ?> ></i>
	      			<i class="fa fa-heart" <?php if(empty($myFav)) { ?>style="display: none"<?php } else { ?>style="display: block"<?php } ?>></i>
	      		</span>

	      		<i class="fa fa-spinner fa-spin"></i>

	      		<?php 

	      			$td_user_id = get_current_user_id(); 

	      			if(empty($td_user_id)) {

	      		?>

	      		<script type="text/javascript">

						jQuery(function($) {

							document.getElementById('like-listing-container').addEventListener('click', function(e) {
											
								$.fn.favoriteForm();

								e.preventDefault();

							});

							$.fn.favoriteForm = function() {

								jQuery('#popup-login').css('display', 'block');

							}

						});

				</script>

	      		<?php

	      			} else {

	      		?>

	      		<form id="favorite-form" method="post" class="form">

	      			<input name="favorite_listing_id" id="favorite_listing_id" type="hidden" value="<?php echo $td_this_post_id; ?>" />
	      			<input name="favorite_user_id" id="favorite_user_id" type="hidden" value="<?php echo $td_user_id; ?>" />
	      			<input name="favorite_status" id="favorite_status" type="hidden" value="<?php echo $favStatus; ?>" />
	      			<input name="favorite_type" id="favorite_type" type="hidden" value="company" />

					<input type="hidden" name="action" value="favoriteForm" />
					<?php wp_nonce_field( 'favoriteForm_html', 'favoriteForm_nonce' ); ?>

				</form>

	      		<script type="text/javascript">

						jQuery(function($) {

							document.getElementById('like-listing-container').addEventListener('click', function(e) {
											
								$.fn.favoriteForm();

								e.preventDefault();

							});

							$.fn.favoriteForm = function() {

								jQuery('#favorite-form').ajaxSubmit({
									type: "POST",
									data: jQuery('#favorite-form').serialize(),
									url: '<?php echo admin_url('admin-ajax.php'); ?>',
									beforeSend: function() {
										jQuery('#like-listing-container .fa').css('display', 'none');
							        	jQuery('.like-listing .fa-spinner').css('display', 'inline-block');
							        	jQuery('#like-listing-container .fa-heart-o').removeClass("bounce");
							        	jQuery('#like-listing-container .fa-heart').removeClass("bounce");
							        },	 
								    success: function(response) {
								    	if(response == 1) {
											jQuery('#like-listing-container .fa-heart').css('display', 'block');
											jQuery('#like-listing-container .fa-heart').addClass("bounce");
								        	jQuery('.like-listing .fa-spinner').css('display', 'none');
								        	jQuery('#favorite_status').val(1);
										} 
										if(response == 0) {
											jQuery('#like-listing-container .fa-heart-o').css('display', 'block');
											jQuery('#like-listing-container .fa-heart-o').addClass("bounce");
								        	jQuery('.like-listing .fa-spinner').css('display', 'none');
								        	jQuery('#favorite_status').val(0);
										} 
								       	return false;
									}
								});

							}

						});

				</script>

				<?php } ?>

	      	</span>

	    </div>

		<div class="coverImageHolder">
			<img src="<?php echo $wpjobus_company_cover_image; ?>" alt="" class="bgImg">
		</div>

	</section>

	<section id="company-menu">

		<div class="container">

			<ul class="nav navbar-nav">

				<li class="menuItem active backtophome"><a href="#backtop"><i class="fa fa-home"></i><?php _e( 'Home', 'themesdojo' ); ?></a></li>
				<li class="menuItem"><a href="#resume-about-block"><i class="fa fa-file-text-o"></i><?php _e( 'Profile', 'themesdojo' ); ?></a></li>
				<li class="menuItem"><a href="#resume-jobs-block"><i class="fa fa-bullhorn"></i><?php _e( 'Job Offers', 'themesdojo' ); ?></a></li>
				<li class="menuItem"><a href="#resume-experience-block"><i class="fa fa-building"></i><?php _e( 'Clients', 'themesdojo' ); ?></a></li>
				<li class="menuItem"><a href="#resume-portfolio-block"><i class="fa fa-bookmark"></i><?php _e( 'Portfolio', 'themesdojo' ); ?></a></li>
				<li class="menuItem"><a href="#resume-contact-block"><i class="fa fa-envelope"></i><?php _e( 'Contact', 'themesdojo' ); ?></a></li>

			</ul>

			<select id="mobile-nav-bar" onchange="location = this.options[this.selectedIndex].value;">

				<option value="#backtop"><?php _e( 'Home', 'themesdojo' ); ?></option>
				<option value="#resume-about-block"><?php _e( 'Profile', 'themesdojo' ); ?></option>
				<option value="#resume-jobs-block"><?php _e( 'Job Offers', 'themesdojo' ); ?></option>
				<option value="#resume-experience-block"><?php _e( 'Clients', 'themesdojo' ); ?></option>
				<option value="#resume-portfolio-block"><?php _e( 'Portfolio', 'themesdojo' ); ?></option>
				<option value="#resume-contact-block"><?php _e( 'Contact', 'themesdojo' ); ?></option>

			</select>

		</div>

	</section>

	<section id="resume-about-block">

		<div class="container">

			<div class="full" style="display: inline-block;">

				<div class="full">

					<?php 

						$content = $resume_about_me;

						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);

						echo $content;

					?>

				</div>

				<div class="full" style="text-align: center;">

					<span class="company-est-year-block">
						<i class="fa fa-calendar"></i>
						<span class="experience-period"><?php _e( 'Est. In', 'themesdojo' ); ?></span>
						<span class="experience-subtitle"><?php echo $wpjobus_company_foundyear; ?></span>
					</span>

					<span class="company-team-block">
						<i class="fa fa-users"></i>
						<span class="experience-period"><?php echo $td_company_team_size; ?></span>
						<span class="experience-subtitle"><?php _e( 'People', 'themesdojo' ); ?></span>
					</span>

					<?php 

						$id = get_the_ID();

						global $wpdb;

						$querystr = "SELECT DISTINCT ID FROM $wpdb->posts, $wpdb->postmeta WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id AND $wpdb->postmeta.meta_key = 'job_company' AND $wpdb->postmeta.meta_value = $id AND $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'job' AND $wpdb->posts.post_date < NOW() ORDER BY $wpdb->posts.post_date DESC
							";

						$pageposts = $wpdb->get_results($querystr, OBJECT);

						$jobs_offer = 0;

					?>

					<?php if ($pageposts): ?>
					<?php global $td_postOf; ?>
					<?php foreach ($pageposts as $td_postOf): ?>
						
					<?php $jobs_offer++; ?>

					<?php endforeach; ?>
						

					<span class="company-jobs-block">
						<i class="fa fa-bullhorn"></i>
						<span class="experience-period"><?php echo $jobs_offer; ?></span>
						<span class="experience-subtitle"><?php if($jobs_offer > 1){ ?><?php _e( 'Jobs', 'themesdojo' ); ?><?php } else { ?><?php _e( 'Job', 'themesdojo' ); ?><?php } ?></span>
					</span>

					<?php endif; ?>

				</div>

			</div>

		</div>

	</section>

	<section id="resume-skills-block">

		<div class="container">

			<div class="resume-skills">

				<h1 class="resume-section-title"><i class="fa fa-bar-chart-o"></i><?php _e( 'Services', 'themesdojo' ); ?></h1>
				<h3 class="resume-section-subtitle"><?php _e( 'Here’s an overview of the services we provide.', 'themesdojo' ); ?></h3>


				<?php 

					$current = -1;

					if(!empty($wpjobus_company_services)) {

					for ($i = 0; $i < (count($wpjobus_company_services)); $i++) {

						$current++;
				?>

				<div class="one_third <?php if($current%3 ==0) { echo 'first '; } ?>" style="text-align: center;">

					<span class="company-services-icon"><?php echo $wpjobus_company_services[$i][1]; ?></span>
					<span class="company-services-devider"></span>
					<span class="company-services-title"><?php echo esc_attr($wpjobus_company_services[$i][0]); ?></span>
					<span class="company-services-desc"><?php echo esc_attr($wpjobus_company_services[$i][2]); ?></span>

				</div>

				<?php } } ?>


				<?php if (!empty($wpjobus_company_expertise)) { ?>

				<div class="divider"></div>

				<h1 class="resume-section-title"><i class="fa fa-cogs"></i><?php _e( 'Expertise', 'themesdojo' ); ?></h1>
				<h3 class="resume-section-subtitle"><?php _e( 'What we are good at.', 'themesdojo' ); ?></h3>

				<div class="full hobbies-block" style="text-align: center;">

					<?php $wpjobus_company_expertise = str_replace(", ", ",", $wpjobus_company_expertise); $wpjobus_company_expertise = str_replace(",", "</span><span class='hobbies-item'>", $wpjobus_company_expertise); ?>

					<span class="hobbies-item"><?php echo $wpjobus_company_expertise; ?></span>

				</div>

				<?php } ?>

			</div>

		</div>

	</section>

	<section id="resume-jobs-block">

		<div class="container">

			<div class="resume-skills">

				<h1 class="resume-section-title"><i class="fa fa-bullhorn"></i><?php _e( 'Job Offers', 'themesdojo' ); ?></h1>
				<h3 class="resume-section-subtitle"><?php _e( 'We’re hiring! Please check our job offers and contact us.', 'themesdojo' ); ?></h3>

				<div class="work-experience-holder">

					<?php 

						$querystr2 = "SELECT DISTINCT ID FROM $wpdb->posts, $wpdb->postmeta WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id AND $wpdb->postmeta.meta_key = 'job_company' AND $wpdb->postmeta.meta_value = $id AND $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'job' AND $wpdb->posts.post_date < NOW() ORDER BY $wpdb->posts.post_date DESC
						";

						$pageposts2 = $wpdb->get_results($querystr2, OBJECT);

					?>

					<?php if ($pageposts2): ?>
					<?php global $td_jobOffer; ?>
				 	<?php foreach ($pageposts2 as $td_jobOffer): ?>
					<?php setup_postdata($td_jobOffer); ?>

					    <div class="job-offers-post" id="post-<?php the_ID(); ?>">
					     	<div class="one_third first" style="margin-bottom: 0;">
					     		<h3><a href="<?php $td_result_job_id = $td_jobOffer->ID; $joblink = home_url('/')."job/".$td_result_job_id; echo $joblink; ?>"><?php echo $wpjobus_job_fullname = esc_attr(get_post_meta($td_jobOffer->ID, 'wpjobus_job_fullname',true)); ?></a></h3>
					     	</div>
					     	<div class="two_third" style="margin-bottom: 0;">

					     		<div class="one_third first" style="margin-bottom: 0;">
					     			<span class="job-location"><i class="fa fa-map-marker"></i><?php echo $td_job_location = esc_attr(get_post_meta($td_jobOffer->ID, 'job_location',true)); ?></span>
					     		</div>

					     		<div class="one_third" style="margin-bottom: 0;">
					     			<span class="job-time"><i class="fa fa-calendar"></i><?php the_time('F jS, Y') ?></span>
					     		</div>

					     		<div class="one_third" style="margin-bottom: 0;">
					     			<?php

					     				$company_id = $td_this_post_id;
					     				global $redux_demo;
										$colorState = 0;

										if(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][0] ) {
											$colorState = 1;
											$color = "#16a085";
										} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][1] ) {
											$colorState = 1;
											$color = "#3498db";
										} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][2] ) {
											$colorState = 1;
											$color = "#e74c3c";
										} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][3] ) {
											$colorState = 1;
											$color = "#1abc9c";
										} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][4] ) {
											$colorState = 1;
											$color = "#8e44ad";
										} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][5] ) {
											$colorState = 1;
											$color = "#9b59b6";
										} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][6] ) {
											$colorState = 1;
											$color = "#34495e";
										} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][7] ) {
											$colorState = 1;
											$color = "#e67e22";
										} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][8] ) {
											$colorState = 1;
											$color = "#e74c3c";
										} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][9] ) {
											$colorState = 1;
											$color = "#16a085";
										} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][10] ) {
											$colorState = 1;
											$color = "#2980b9";
										} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][11] ) {
											$colorState = 1;
											$color = "#2ecc71";
										}

									?>

					     			<span class="job-offers-post-badge" style="<?php if($colorState ==1) { ?>background-color: <?php echo $color; ?>; border: solid 2px <?php echo $color; ?>;<?php } ?>">
										<span class="job-offers-post-badge-job-type" style="<?php if($colorState ==1) { ?>color: <?php echo $color; ?>;<?php } ?>"><?php echo $wpjobus_job_type = esc_attr(get_post_meta($td_jobOffer->ID, 'wpjobus_job_type',true)); ?></span>
										<span class="job-offers-post-badge-amount"><?php echo $wpjobus_job_remuneration = esc_attr(get_post_meta($td_jobOffer->ID, 'wpjobus_job_remuneration',true)); ?></span>
										<span class="job-offers-post-badge-amount-per">/<?php echo $wpjobus_job_remuneration_per = esc_attr(get_post_meta($td_jobOffer->ID, 'wpjobus_job_remuneration_per',true)); ?></span>
									</span>
					     		</div>

					     	</div>
					    </div>

					<?php endforeach; ?>
					  
					<?php else : ?>
					    <h3 class="resume-section-subtitle"><?php _e( 'We are sorry, but there are no jobs available.', 'themesdojo' ); ?></h3>
					<?php endif; ?>

				</div>

			</div>

		</div>

	</section>

	<section id="resume-experience-block">

		<div class="container">

			<div class="resume-skills">

				<h1 class="resume-section-title"><i class="fa fa-building"></i><?php _e( 'Clients', 'themesdojo' ); ?></h1>
				<h3 class="resume-section-subtitle"><?php _e( 'Here’s a list of companies which are our beloved clients.', 'themesdojo' ); ?></h3>

				<div class="divider" style="margin-top: 20px;"></div>

				<div class="work-experience-holder">

					<?php 

						if(!empty($wpjobus_company_clients)) {

							for ($i = 0; $i < (count($wpjobus_company_clients)); $i++) {
					?>

					<span class="work-experience-block">

						<span class="work-experience-first-block">

							<span class="work-experience-first-block-content">

								<span class="work-experience-org-name"><?php echo esc_attr($wpjobus_company_clients[$i][0]); ?></span>
								<span class="work-experience-job-title"><?php echo esc_attr($wpjobus_company_clients[$i][1]); ?></span>

							</span>

						</span>

						<span class="work-experience-second-block">

							<span class="work-experience-second-block-content">

								<span class="work-experience-period"><?php echo esc_attr($wpjobus_company_clients[$i][2]); ?> - <?php echo esc_attr($wpjobus_company_clients[$i][3]); ?></span>

								<?php 

									$return = esc_url($wpjobus_company_clients[$i][4]);
									$url = esc_url($wpjobus_company_clients[$i][4]);
									if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) { $return = 'http://' . $url; }

								?>

								<span class="work-experience-job-type"><a href="<?php echo $return; ?>"><?php echo esc_url($wpjobus_company_clients[$i][4]); ?></a></span>

							</span>

						</span>

						<span class="work-experience-third-block">

							<span class="work-experience-third-block-content">

								<span class="work-experience-notes"><?php echo esc_attr($wpjobus_company_clients[$i][5]); ?></span>

							</span>

						</span>

					</span>

					<?php } } ?>

				</div>

				<?php if(!empty($wpjobus_company_testimonials)) { ?>

				<h1 class="resume-section-title"><i class="fa fa-comment"></i><?php _e( 'Testimonials', 'themesdojo' ); ?></h1>
				<h3 class="resume-section-subtitle"><?php _e( 'Here’s what clients are saying about our company. ', 'themesdojo' ); ?></h3>

				<div id="owl-demo" class="owl-carousel owl-theme">

					<?php 
						for ($i = 0; $i < (count($wpjobus_company_testimonials)); $i++) {
					?>
 
				  	<div class="item">

				  		<div class="resume-testimonials">

				  			<span class="resume-testimonials-image">

				  				<?php 

				  					$wpjobus_company_testimonials_profile_picture = esc_url($wpjobus_company_testimonials[$i][3]);

					  				require_once(get_template_directory() . '/inc/BFI_Thumb.php'); 
									$params = array( 'width' => 70, 'height' => 70, 'crop' => true );
									echo "<img src='" . bfi_thumb( "$wpjobus_company_testimonials_profile_picture", $params ) . "' alt='" . esc_attr($wpjobus_company_testimonials[$i][0]) . "'/>";

								?>

				  			</span>

				  			<span class="resume-testimonials-quote"><i class="fa fa-quote-right"></i></span>

				  			<div class="resume-testimonials-note"><?php echo esc_attr($wpjobus_company_testimonials[$i][2]); ?></div>

				  			<div class="resume-testimonials-author-box"><span class="resume-testimonial-author"><?php echo esc_attr($wpjobus_company_testimonials[$i][0]); ?></span> <span class="resume-testimonial-author-position"><?php echo esc_attr($wpjobus_company_testimonials[$i][1]); ?></span></div>

				  		</div>

				  	</div>

				  	<?php } ?>
				 
				</div>

				<?php } ?>

			</div>

		</div>

	</section>

	<section id="resume-portfolio-block">

		<div class="container">

			<h1 class="resume-section-title"><i class="fa fa-bookmark"></i><?php _e( 'Portfolio', 'themesdojo' ); ?></h1>
			<h3 class="resume-section-subtitle"><?php _e( 'Here are some of my works.', 'themesdojo' ); ?></h3>

			<section class="ff-container">

				<?php

					$categories = 0;

					if(!empty($wpjobus_company_portfolio)) {

						for ($i = 0; $i < (count($wpjobus_company_portfolio)); $i++) {

							if(!empty($wpjobus_company_portfolio[$i][1])) {
								$categories++;
							}

						}

					}

				?>

				<?php if($categories > 0) { ?>
 
			    <input id="select-type-all" name="radio-set-1" type="radio" class="ff-selector-type-all" checked="checked" />
			    <label for="select-type-all" class="ff-label-type-all"><?php _e( 'All', 'themesdojo' ); ?></label>

			    <?php 

			    if(!empty($wpjobus_company_portfolio)) {

				    for ($i = 0; $i < (count($wpjobus_company_portfolio)); $i++) {

						if(!empty($wpjobus_company_portfolio[$i][1])) {
							$all_project_cat[] = $wpjobus_company_portfolio[$i][1];
						}

					}

				}

				?>

					<?php

					$catProjID = 0;

					$directors = array_unique($all_project_cat);
					foreach ($directors as $director) { $catProjID++; $directorClass_0 = preg_replace('/^\/[^a-zA-Z0-9_ -%][().][\/]/s', '_', $director); $directorClass = preg_replace('/\s*,\s*/', '_', $directorClass_0); ?>

						<style>

				    		.ff-container input.ff-selector-type-<?php echo $directorClass; ?>:checked ~ label.ff-label-type-<?php echo $directorClass; ?> {
							    background: #999;
							    color: #fff;
							    padding: 10px 20;
							}

							.ff-container input.ff-selector-type-<?php echo $directorClass; ?>:checked ~ .ff-items .ff-item-type-<?php echo $directorClass; ?> {
							    opacity: 1;
							}

							.ff-container input.ff-selector-type-<?php echo $directorClass; ?>:checked ~ .ff-items li:not(.ff-item-type-<?php echo $directorClass; ?>) {
							    opacity: 0.1;
							}

							.ff-container input.ff-selector-type-<?php echo $directorClass; ?>:checked ~ .ff-items li:not(.ff-item-type-<?php echo $directorClass; ?>) span {
							    display: none;
							}


				    	</style>

						<input id="select-type-<?php echo $directorClass; ?>" name="radio-set-1" type="radio" class="ff-selector-type-<?php echo $directorClass; ?>" />
				    	<label for="select-type-<?php echo $directorClass; ?>" class="ff-label-type-<?php echo $directorClass; ?>"><?php echo $director; ?></label>

					<?php } ?>

			    <?php } ?>
			     
			    <div class="clr"></div>
			     
			    <ul class="ff-items <?php if($categories == 0) { ?>visibile-projects<?php } ?>">

			    	<?php 

			    	$current = -1;

			    	if(!empty($wpjobus_company_portfolio)) {

					    for ($p = 0; $p < (count($wpjobus_company_portfolio)); $p++) {

					    	$directorClassProj_0 = preg_replace('/[^a-zA-Z0-9_ -%][().][\/]/s', '_', $wpjobus_company_portfolio[$p][1]); $directorClassProj = preg_replace('/\s*,\s*/', '_', $directorClassProj_0);
					    	$current++;

						?>

				        <li class="ff-item-type-<?php echo $directorClassProj; ?> <?php if($current%3 ==0) { echo 'first'; } ?>">
				            <a href="<?php echo $wpjobus_company_portfolio[$p][3]; ?>" data-lightbox="portfolio" data-title="<?php echo $wpjobus_company_portfolio[$p][2]; ?>">
				                <span><?php echo $wpjobus_company_portfolio[$p][0]; ?></span>

				                <?php 

									require_once(get_template_directory() . '/inc/BFI_Thumb.php'); 
									$params = array( 'width' => 430, 'height' => 247, 'crop' => true );
									$wpjobus_company_portfolio_img = $wpjobus_company_portfolio[$p][3];
									echo "<img src='" . bfi_thumb( "$wpjobus_company_portfolio_img", $params ) . "' alt='" . $wpjobus_company_portfolio[$p][0] . "'/>";

								?>

				            </a>
				        </li>

				    <?php } } ?>

			    </ul>
			     
			</section>

		</div>

	</section>

	<section id="resume-contact-block">

		<div id="resume-map"></div>

		<script type="text/javascript">
					var mapDiv,
						map,
						infobox;
					jQuery(document).ready(function($) {

						mapDiv = $("#resume-map");
						mapDiv.height(600).gmap3({
							map: {
								options: {
									"center": [<?php echo $wpjobus_company_latitude; ?>,<?php echo $wpjobus_company_longitude; ?>]
									,"zoom": 16
									,"draggable": true
									,"mapTypeControl": true
									,"mapTypeId": google.maps.MapTypeId.ROADMAP
									,"scrollwheel": false
									,"panControl": true
									,"rotateControl": false
									,"scaleControl": true
									,"streetViewControl": true
									,"zoomControl": true
									<?php global $redux_demo; $map_style = $redux_demo['map-style']; if(!empty($map_style)) { ?>,"styles": <?php echo $map_style; ?> <?php } ?>
								}
							}
							,marker: {
								values: [

								<?php

									$iconPath = get_template_directory_uri() .'/images/icon-services.png';

								?>

								{
									<?php require_once(get_template_directory() . "/inc/BFI_Thumb.php"); ?>
									<?php $params = array( "width" => 230, "height" => 150, "crop" => true ); $image = wp_get_attachment_image_src( get_post_thumbnail_id( $td_this_post_id ), "single-post-thumbnail" ); ?>

									latLng: [<?php echo $wpjobus_company_latitude; ?>,<?php echo $wpjobus_company_longitude; ?>],
									options: {
										icon: "<?php echo esc_url($iconPath); ?>",
										shadow: "<?php echo get_template_directory_uri() ?>/images/shadow.png",
									}
								}	
									
								],
								options:{
									draggable: false
								}
							}
							 		 	});

						map = mapDiv.gmap3("get");

					    infobox = new InfoBox({
					    	pixelOffset: new google.maps.Size(-50, -65),
					    	closeBoxURL: '',
					    	enableEventPropagation: true
					    });
					    mapDiv.delegate('.infoBox .close','click',function () {
					    	infobox.close();
					    });

					    if (Modernizr.touch){
					    	map.setOptions({ draggable : false });
					        var draggableClass = 'inactive';
					        var draggableTitle = "Activate map";
					        var draggableButton = $('<div class="draggable-toggle-button '+draggableClass+'">'+draggableTitle+'</div>').appendTo(mapDiv);
					        draggableButton.click(function () {
					        	if($(this).hasClass('active')){
					        		$(this).removeClass('active').addClass('inactive').text("Activate map");
					        		map.setOptions({ draggable : false });
					        	} else {
					        		$(this).removeClass('inactive').addClass('active').text("Deactivate map");
					        		map.setOptions({ draggable : true });
					        	}
					        });
					    }

					});
		</script>

		<div class="container">

			<div class="resume-contact">

				<div class="two_third first">

					<?php

						global $redux_demo; 
						$company_contact_title = $redux_demo['company-contact-title'];

						if(!empty($company_contact_title)) {

					?>

					<h1 class="resume-section-title" style="margin-bottom: 10px;"><i class="fa fa-list-ul"></i><?php echo $company_contact_title; ?></h1>

					<?php } ?>

					<?php

						global $redux_demo; 
						$company_contact_subtitle = $redux_demo['company-contact-subtitle'];

						if(!empty($company_contact_subtitle)) {

					?>

					<h3 class="resume-section-subtitle"><?php echo $company_contact_subtitle; ?></h3>

					<?php } ?>

					<div id="resume-contact">
                        
                        <?php

							global $redux_demo; 
							$company_contact_state = $redux_demo['company-contact-state'];

							if($company_contact_state == 1) {

						?>

						<form id="contact" type="post" action="" >  
						  	
						  	<span class="contact-name">
								<input type="text"  name="contactName" id="contactName" value="" class="input-textarea" placeholder="<?php _e("Name*", "themesdojo"); ?>" />
							</span>
							 
							<span class="contact-email">
								<input type="text" name="email" id="email" value="" class="input-textarea" placeholder="<?php _e("Email*", "themesdojo"); ?>" />
							</span>

							<span class="contact-message">
							    <textarea name="message" id="message" cols="8" rows="8" ></textarea>
							</span>

							<span class="contact-test">
							    <p style="margin-top: 20px;"><?php _e("Human test. Please input the result of 5+3=?", "themesdojo"); ?></p>
							    <input type="text" onfocus="if(this.value=='')this.value='';" onblur="if(this.value=='')this.value='';" name="answer" id="humanTest" value="" class="input-textarea" />
							</span>

							<input type="text" name="receiverEmail" id="receiverEmail" value="<?php echo $wpjobus_company_email; ?>" class="input-textarea" style="display: none;"/>

							<input type="hidden" name="action" value="wpjobContactForm" />
							<?php wp_nonce_field( 'scf_html', 'scf_nonce' ); ?>

							<input style="margin-bottom: 0;" name="submit" type="submit" value="<?php _e( 'Send Message', 'themesdojo' ); ?>" class="input-submit">	 

							<span class="submit-loading"><i class="fa fa-refresh fa-spin"></i></span>
						  	  
						</form>

						<div id="success">
							<span>
							   	<h3><?php echo $wpcrown_contact_thankyou; ?></h3>
							</span>
						</div>
							 
						<div id="error">
							<span>
							   	<h3><?php _e( 'Something went wrong, try refreshing and submitting the form again.', 'themesdojo' ); ?></h3>
							</span>
						</div>

						<script type="text/javascript">

						jQuery(function($) {
							jQuery('#contact').validate({
						        rules: {
						            contactName: {
						                required: true
						            },
						            email: {
						                required: true,
						                email: true
						            },
						            message: {
						                required: true
						            },
						            answer: {
						                required: true,
						                answercheck: true
						            }
						        },
						        messages: {
						            name: {
						                required: "<?php echo $wpcrown_contact_name_error; ?>"
						            },
						            email: {
						                required: "<?php echo $wpcrown_contact_email_error; ?>"
						            },
						            message: {
						                required: "<?php echo $wpcrown_contact_message_error; ?>"
						            },
						            answer: {
						                required: "<?php echo $wpcrown_contact_test_error; ?>"
						            }
						        },
						        submitHandler: function(form) {
						        	jQuery('#contact .input-submit').css('display','none');
						        	jQuery('#contact .submit-loading').css('display','block');
						            jQuery(form).ajaxSubmit({
						            	type: "POST",
								        data: jQuery(form).serialize(),
								        url: '<?php echo admin_url('admin-ajax.php'); ?>', 
						                success: function(data) {
						                   	jQuery('#contact :input').attr('disabled', 'disabled');
						                    jQuery('#contact').fadeTo( "slow", 0, function() {
						                    	jQuery('#contact').css('display','none');
						                        jQuery(this).find(':input').attr('disabled', 'disabled');
						                        jQuery(this).find('label').css('cursor','default');
						                        jQuery('#success').fadeIn();
						                    });
						                },
						                error: function(data) {
						                    jQuery('#contact').fadeTo( "slow", 0, function() {
						                        jQuery('#error').fadeIn();
						                    });
						                }
						            });
						        }
						    });
						});
						</script>
                        
                        <?php } elseif($company_contact_state == 2) { ?>

							<?php $company_contact_form = $redux_demo['company-contact-form-7']; echo do_shortcode($company_contact_form); ?>

						<?php } elseif($company_contact_state == 3) { ?>

							<?php $company_contact_form = $redux_demo['company-gravity-forms']; echo do_shortcode("[gravityform title=false id=".$company_contact_form." ajax=true]"); ?>

						<?php } elseif($company_contact_state == 4) { ?>

							<?php $company_contact_form = $redux_demo['company-ninja-forms']; echo do_shortcode($company_contact_form); ?>

						<?php } ?>

					</div>

				</div>

				<div class="one_third">

					<h1 class="resume-section-title" style="margin-bottom: 80px;"><i class="fa fa-envelope"></i><?php _e( 'Contact Details', 'themesdojo' ); ?></h1>

					<?php if(!empty($wpjobus_company_address)) { ?>

					<span class="resume-contact-info">

						<i class="fa fa-map-marker"></i><span><?php echo $wpjobus_company_address; ?></span>

					</span>

					<?php } ?>

					<?php if(!empty($wpjobus_company_phone)) { ?>

					<span class="resume-contact-info">

						<i class="fa fa-mobile"></i><span><?php echo $wpjobus_company_phone; ?></span>

					</span>

					<?php } ?>

					<?php if(!empty($wpjobus_company_website)) { ?>

					<span class="resume-contact-info">

						<?php 

							$return = $wpjobus_company_website;
							$url = $wpjobus_company_website;
							if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) { $return = 'http://' . $url; }

						?>

						<i class="fa fa-link"></i><span><a href="<?php echo $return; ?>"><?php echo $wpjobus_company_website; ?></a></span>

					</span>

					<?php } ?>

					<?php if(!empty($wpjobus_company_email)) { ?>

					<?php if(!empty($wpjobus_company_publish_email)) { ?>

					<span class="resume-contact-info">

						<i class="fa fa-envelope-o"></i><span><a href="mailto:<?php echo $wpjobus_company_email; ?>"><?php echo $wpjobus_company_email; ?></a></span>

					</span>

					<?php } } ?>

					<?php if(!empty($wpjobus_company_facebook)) { ?>

					<span class="resume-contact-info">

						<?php 

							$return = $wpjobus_company_facebook;
							$url = $wpjobus_company_facebook;
							if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) { $return = 'http://' . $url; }

						?>

						<i class="fa fa-facebook-square"></i><span><a href="<?php echo $return; ?>"><?php _e( 'Facebook', 'themesdojo' ); ?></a></span>

					</span>

					<?php } ?>

					<?php if(!empty($wpjobus_company_linkedin)) { ?>

					<span class="resume-contact-info">

						<?php 

							$return = $wpjobus_company_linkedin;
							$url = $wpjobus_company_linkedin;
							if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) { $return = 'http://' . $url; }

						?>

						<i class="fa fa-linkedin-square"></i><span><a href="<?php echo $return; ?>"><?php _e( 'LinkedIn', 'themesdojo' ); ?></a></span>

					</span>

					<?php } ?>

					<?php if(!empty($wpjobus_company_twitter)) { ?>

					<span class="resume-contact-info">

						<?php 

							$return = $wpjobus_company_twitter;
							$url = $wpjobus_company_twitter;
							if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) { $return = 'http://' . $url; }

						?>

						<i class="fa fa-twitter-square"></i><span><a href="<?php echo $return; ?>"><?php _e( 'Twitter', 'themesdojo' ); ?></a></span>

					</span>

					<?php } ?>

					<?php if(!empty($wpjobus_company_googleplus)) { ?>

					<span class="resume-contact-info">

						<?php 

							$return = $wpjobus_company_googleplus;
							$url = $wpjobus_company_googleplus;
							if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) { $return = 'http://' . $url; }

						?>

						<i class="fa fa-google-plus-square"></i><span><a href="<?php echo $return; ?>"><?php _e( 'Google+', 'themesdojo' ); ?></a></span>

					</span>

					<?php } ?>

				</div>

			</div>

		</div>

	</section>

<?php endwhile; ?>

<?php get_footer(); ?>