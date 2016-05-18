<?php
/**
 * Template name: Edit Resume
 */

if ( !is_user_logged_in() ) { 

	$login = home_url('/')."login";
	wp_redirect( $login ); exit;

} 

$page = get_page($post->ID);
$td_current_page_id = $page->ID;

global $current_user, $td_user_id, $td_user_info;
get_currentuserinfo();
$td_user_id = $current_user->ID; // You can set $td_user_id to any users, but this gets the current users ID.
$td_user_info = get_userdata($td_user_id);

$user_error = 0;

$query = new WP_Query(array('post_type' => 'resume', 'posts_per_page' =>'-1', 'post_status' => 'publish, draft, pending') );

if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
	
if(isset($_GET['post'])) {
		
	if($_GET['post'] == $post->ID) {
		
		$td_current_post = $post->ID;

		$postID = $_GET['post'];

		$post_author_id = get_post_field( 'post_author', $postID );

		if($post_author_id == $td_user_id)  {

			$wpjobus_resume_cover_image = esc_url(get_post_meta($post->ID, 'wpjobus_resume_cover_image',true));
			$wpjobus_resume_fullname = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_fullname',true));
			$td_resume_gender = esc_attr(get_post_meta($post->ID, 'resume_gender',true));
			$td_resume_month_birth = esc_attr(get_post_meta($post->ID, 'resume_month_birth',true));
			$td_resume_day_birth = esc_attr(get_post_meta($post->ID, 'resume_day_birth',true));
			$td_resume_year_birth = esc_attr(get_post_meta($post->ID, 'resume_year_birth',true));
			$td_resume_location = esc_attr(get_post_meta($post->ID, 'resume_location',true));
			$td_resume_industry = esc_attr(get_post_meta($post->ID, 'resume_industry',true));
			$resume_about_me = html_entity_decode(get_post_meta($post->ID, htmlentities('resume-about-me'),true));
			$td_resume_years_of_exp = esc_attr(get_post_meta($post->ID, 'resume_years_of_exp',true));
			$wpjobus_resume_profile_picture = esc_url(get_post_meta($post->ID, 'wpjobus_resume_profile_picture',true));

			$wpjobus_resume_prof_title = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_prof_title',true));
			$td_resume_career_level = esc_attr(get_post_meta($post->ID, 'resume_career_level',true));

			$wpjobus_resume_comm_level = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_comm_level',true));
			$wpjobus_resume_comm_note = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_comm_note',true));

			$wpjobus_resume_org_level = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_org_level',true));
			$wpjobus_resume_org_note = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_org_note',true));

			$wpjobus_resume_job_rel_level = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_rel_level',true));
			$wpjobus_resume_job_rel_note = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_rel_note',true));

			$wpjobus_resume_skills = get_post_meta($post->ID, 'wpjobus_resume_skills',true);
			$wpjobus_resume_native_language = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_native_language',true));
			$wpjobus_resume_languages = get_post_meta($post->ID, 'wpjobus_resume_languages',true);

			$wpjobus_resume_hobbies = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_hobbies',true));

			$wpjobus_resume_education = get_post_meta($post->ID, 'wpjobus_resume_education',true);
			$wpjobus_resume_award = get_post_meta($post->ID, 'wpjobus_resume_award',true);
			$wpjobus_resume_work = get_post_meta($post->ID, 'wpjobus_resume_work',true);
			$wpjobus_resume_testimonials = get_post_meta($post->ID, 'wpjobus_resume_testimonials',true);

			$wpjobus_resume_file = esc_url(get_post_meta($post->ID, 'wpjobus_resume_file',true));
			$wpjobus_resume_file_name = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_file_name',true));

			$wpjobus_resume_remuneration = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_remuneration',true));
			$wpjobus_resume_remuneration_per = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_remuneration_per',true));

			$wpjobus_resume_job_type = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_type',true));

			$wpjobus_resume_job_freelance = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_freelance',true));
			$wpjobus_resume_job_part_time = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_part_time',true));
			$wpjobus_resume_job_full_time = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_full_time',true));
			$wpjobus_resume_job_internship = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_internship',true));
			$wpjobus_resume_job_volunteer = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_volunteer',true));

			$wpjobus_resume_portfolio = get_post_meta($post->ID, 'wpjobus_resume_portfolio',true);


			$wpjobus_resume_address = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_address',true));
			$wpjobus_resume_phone = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_phone',true));
			$wpjobus_resume_website = esc_url(get_post_meta($post->ID, 'wpjobus_resume_website',true));
			$wpjobus_resume_email = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_email',true));
			$wpjobus_resume_publish_email = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_publish_email',true));
			$wpjobus_resume_facebook = esc_url(get_post_meta($post->ID, 'wpjobus_resume_facebook',true));
			$wpjobus_resume_linkedin = esc_url(get_post_meta($post->ID, 'wpjobus_resume_linkedin',true));
			$wpjobus_resume_twitter = esc_url(get_post_meta($post->ID, 'wpjobus_resume_twitter',true));
			$wpjobus_resume_googleplus = esc_url(get_post_meta($post->ID, 'wpjobus_resume_googleplus',true));

			$wpjobus_resume_googleaddress = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_googleaddress',true));

			$wpjobus_resume_longitude = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_longitude',true));
			if(empty($wpjobus_resume_longitude)) {
				$wpjobus_resume_longitude = 0;
			}

			$wpjobus_resume_latitude = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_latitude',true));
			if(empty($wpjobus_resume_latitude)) {
				$wpjobus_resume_latitude = 0;
			}

		} else {

			$user_error = 1;

		}

	}

}

endwhile; endif;
wp_reset_query();

global $td_current_post;

get_header(); ?>

	<section id="blog">

		<div class="container">

			<div class="resume-skills">

				<?php if($user_error == 1) { ?>

				<h2><?php _e( 'We are sorry but this isn\'t your resume.', 'themesdojo' ); ?></h2>

				<?php } else { ?>

				<form id="wpjobus-add-resume" type="post" action="" >

					<input type="hidden" id="postID" name="postID" value="<?php echo $td_current_post; ?>">

					<h1 class="resume-section-title"><i class="fa fa-file-text-o"></i><?php _e( 'Edit Your Resume', 'themesdojo' ); ?></h1>
					<h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Hey. It’s easier than it looks. Take a deep breath and complete the fields below. You’ll have a beautiful resume page!', 'themesdojo' ); ?></h3>

					<div class="divider"></div>

					<div class="full" style="margin-bottom: 0;">

						<div class="one_half first">

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Full Name:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type="text" name="fullName" id="fullName" value="<?php if(!empty($wpjobus_resume_fullname)) { echo $wpjobus_resume_fullname; } ?>" class="input-textarea" placeholder="" style="margin-bottom: 0;"/>
									<label for="fullName" class="error userNameError"></label>
								</span>

							</span>

							<span class="full" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Gender:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<select name="resume_gender" id="resume_gender" style="width: 100%;">
										<option value="Male" <?php selected( $td_resume_gender, 'Male' ); ?>>Male</option>
										<option value="Female" <?php selected( $td_resume_gender, 'Female' ); ?>>Female</option>
									</select>
								</span>

							</span>

							<span class="full" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Date of birth:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">

									<select name="resume_month_birth" id="resume_month_birth" style="width: 26%; width: -webkit-calc(30% - 10px); width: calc(30% - 10px); margin-right: 10px;">
										<?php 
											echo $td_resume_month_birth;

											for ($i = 1; $i <= 12; $i++) {
										?>
										<option value='<?php echo $i; ?>' <?php selected( $td_resume_month_birth, $i ); ?>><?php echo $i; ?></option>
										<?php 
											}
										?>
									</select>

									<select name="resume_day_birth" id="resume_day_birth" style="width: 26%; width: -webkit-calc(30% - 10px); width: calc(30% - 10px); margin-right: 10px;">
										<?php 
											for ($i = 1; $i <= 31; $i++) {
										?>
										<option value='<?php echo $i; ?>' <?php selected( $td_resume_day_birth, $i ); ?>><?php echo $i; ?></option>
										<?php 
											}
										?>
									</select>

									<select name="resume_year_birth" id="resume_year_birth" style="width: 40%;">
										<?php 
											$thisYear = date("Y");
											for ($i = $thisYear; $i >= 1934; $i--) {
										?>
										<option value='<?php echo $i; ?>' <?php selected( $td_resume_year_birth, $i ); ?>><?php echo $i; ?></option>
										<?php 
											}
										?>
									</select>
								</span>

							</span>

							<span class="full" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Years of experience:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<select name="resume_years_of_exp" id="resume_years_of_exp" style="width: 100%;">
										<?php 
											for ($i = 1; $i <= 20; $i++) {
										?>
										<option value='<?php echo $i; ?>' <?php selected( $td_resume_years_of_exp, $i ); ?>><?php echo $i; ?></option>
										<?php 
											}
										?>
									</select>
								</span>

							</span>

							<span class="full" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Industry:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<select name="resume_industry" id="resume_industry" style="width: 100%; margin-right: 10px;">
										<?php 
											global $redux_demo; 
											for ($i = 0; $i < count($redux_demo['resume-industries']); $i++) {
										?>
										<option value='<?php echo $redux_demo['resume-industries'][$i]; ?>' <?php selected( $td_resume_industry, $redux_demo["resume-industries"][$i] ); ?>><?php echo $redux_demo['resume-industries'][$i]; ?></option>
										<?php 
											}
										?>
									</select>
								</span>

							</span>

							<span class="full" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Location:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<select name="resume_location" id="resume_location" style="width: 100%; margin-right: 10px;">
										<?php 
											global $redux_demo; 
											for ($i = 0; $i < count($redux_demo['resume-locations']); $i++) {
										?>
										<option value='<?php echo $redux_demo['resume-locations'][$i]; ?>' <?php selected( $td_resume_location, $redux_demo["resume-locations"][$i] ); ?>><?php echo $redux_demo['resume-locations'][$i]; ?></option>
										<?php 
											}
										?>
									</select>
								</span>

							</span>

							<span class="full" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'CV File (PDF, doc)', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">

									<input type="text" value="<?php echo $wpjobus_resume_file_name; ?>" class="input-textarea file-name" placeholder="" style="margin-bottom: 0;"/>

									<span class="full" style="margin-bottom: 0; margin-top: 10px;">

						                <input class="criteria-image-url" type="text" size="36" name="wpjobus_resume_file" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_file)) echo $wpjobus_resume_file; ?>" />
						                <input class="criteria-image-url-name" type="text" size="36" name="wpjobus_resume_file_name" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_file_name)) echo $wpjobus_resume_file_name; ?>" />
						                <i class="fa fa-trash-o" <?php if(!empty($wpjobus_resume_file_name)) { ?>style="display: block;"<?php } ?>></i><input class="criteria-file-remove button" id="wpjobus_resume_file" type="button" value="Remove" <?php if(!empty($wpjobus_resume_file_name)) { ?>style="display: block;"<?php } ?>/>
						                <i class="fa fa-cloud-upload" <?php if(!empty($wpjobus_resume_file_name)) { ?>style="display: none;"<?php } ?>></i><input class="criteria-file button" id="your_image_url_button" type="button" value="Upload File" <?php if(!empty($wpjobus_resume_file_name)) { ?>style="display: none;"<?php } ?>/>

						            </span>

								</span>

					            <script>
						            var image_custom_uploader_file;
						            var $thisItem = '';

						            jQuery(document).on('click','.criteria-file', function(e) {
						                e.preventDefault();

						                $thisItem = jQuery(this);

						                //If the uploader object has already been created, reopen the dialog
						                if (image_custom_uploader) {
						                    image_custom_uploader.open();
						                    return;
						                }

						                //Extend the wp.media object
						                image_custom_uploader_file = wp.media.frames.file_frame = wp.media({
						                    title: 'Choose File',
						                    button: {
						                        text: 'Choose File'
						                    },
						                    multiple: false
						                });

						                //When a file is selected, grab the URL and set it as the text field's value
						                image_custom_uploader_file.on('select', function() {
						                    attachment = image_custom_uploader_file.state().get('selection').first().toJSON();
						                    var url = '';
						                    url = attachment['url'];
						                    var filename ='';
						                    filename = attachment['filename'];
						                    $thisItem.parent().parent().parent().find('.criteria-image-url').val(url);
						                    $thisItem.parent().parent().parent().find('.criteria-image-url-name').val(filename);
						                    $thisItem.parent().parent().parent().find('.file-name').val(filename);
						                    $thisItem.parent().parent().parent().find('.criteria-file').css("display", "none");
						                    $thisItem.parent().parent().parent().find('.criteria-file-remove').css("display", "block");
						                    $thisItem.parent().parent().parent().find(".fa-cloud-upload").css("display", "none");
									        $thisItem.parent().parent().parent().find(".fa-trash-o").css("display", "block");
						                });

						                //Open the uploader dialog
						                image_custom_uploader_file.open();
						             });

						             jQuery(document).on('click','.criteria-file-remove', function(e) {
						                jQuery(this).parent().parent().parent().find('.criteria-image-url').val('');
						                jQuery(this).parent().parent().parent().find('.criteria-image-url-name').val('');
						                jQuery(this).parent().parent().parent().find('.file-name').val('');
						                jQuery(this).parent().parent().parent().find('.criteria-file').css("display", "block");
						                jQuery(this).parent().parent().parent().find(".fa-cloud-upload").css("display", "block");
									    jQuery(this).parent().parent().parent().find(".fa-trash-o").css("display", "none");
						                jQuery(this).css("display", "none");
						             });
								</script>

							</span>

						</div>

						<div class="one_half">

							<span class="full" style="margin-bottom: 0;">

								<span class="one_half first" style="margin-bottom: 0;">
									<h3><?php _e( 'About Me:', 'themesdojo' ); ?></h3>
								</span>

							</span>

							<?php 
									
								$settings = array(
										'wpautop' => true,
										'postContent' => 'content',
										'media_buttons' => false,
										'editor_css' => '<style>.mceToolba { background-color: #faf9f4; padding: 5px; }</style>',
										'tinymce' => array(
											'theme_advanced_buttons1' => 'bold,italic,underline,blockquote,separator,strikethrough,bullist,numlist,justifyleft,justifycenter,justifyright,undo,redo,link,unlink,fullscreen',
											'theme_advanced_buttons2' => 'pastetext,pasteword,removeformat,|,charmap,|,outdent,indent,|,undo,redo',
											'theme_advanced_buttons3' => '',
											'theme_advanced_buttons4' => ''
										),
										'quicktags' => false
								);
											
								wp_editor( $resume_about_me, 'postContent', $settings );

							?>

						</div>

					</div>

					<div class="full">

						<div class="one_half first">

							<span class="full" style="margin-bottom: 0;">

								<span class="full" style="margin-bottom: 0;">
									<h3><i class="fa fa-camera"></i><?php _e( 'Profile Picture:', 'themesdojo' ); ?></h3>
								</span>

								<div style="width: 100%; float: left;">
									<img class="criteria-image" id="your_image_url_img" src="<?php if (!empty($wpjobus_resume_profile_picture)) echo $wpjobus_resume_profile_picture; ?>" style="float: left; width: auto; margin-bottom: 20px; margin-top: 10px; max-height: 340px;" /> 
								</div>
					            <input class="criteria-image-url" id="your_image_url" type="text" size="36" name="wpjobus_resume_profile_picture" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_profile_picture)) echo $wpjobus_resume_profile_picture; ?>" />
					            <input class="criteria-image-id" id="your_image_id" type="text" size="36" name="wpjobus_resume_profile_picture_id" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_profile_picture_id)) echo $wpjobus_resume_profile_picture_id; ?>" />
					            <i class="fa fa-trash-o"></i><input class="criteria-image-button-remove button" id="your_image_url_button_remove" type="button" value="Delete Image" /> </br>
					            <i class="fa fa-cloud-upload"></i><input class="criteria-image-button button" id="your_image_url_button" type="button" value="Upload Image" />

					            <script>
									var image_custom_uploader;
									var $thisItem = '';

									jQuery(document).on('click','.criteria-image-button', function(e) {
									    e.preventDefault();

									    $thisItem = jQuery(this);

									    //If the uploader object has already been created, reopen the dialog
									    if (image_custom_uploader) {
									        image_custom_uploader.open();
									        return;
									    }

									    //Extend the wp.media object
									    image_custom_uploader = wp.media.frames.file_frame = wp.media({
									        title: 'Choose Image',
									        button: {
									            text: 'Choose Image'
									        },
									        multiple: false
									    });

									    //When a file is selected, grab the URL and set it as the text field's value
									    image_custom_uploader.on('select', function() {
									        attachment = image_custom_uploader.state().get('selection').first().toJSON();
									        var url = '';
									        url = attachment['url'];
									        var attachId = '';
									        attachId = attachment['id'];
									        $thisItem.parent().find('.criteria-image-id').val(attachId);
									        $thisItem.parent().find('.criteria-image-url').val(url);
									        $thisItem.parent().find( "img.criteria-image" ).attr({
									            src: url
									        });
									        $thisItem.parent().find(".criteria-image-button").css("display", "none");
									        $thisItem.parent().find(".fa-cloud-upload").css("display", "none");
									        $thisItem.parent().find(".criteria-image-button-remove").css("display", "block");
									        $thisItem.parent().find(".fa-trash-o").css("display", "block");
									    });

									    //Open the uploader dialog
									    image_custom_uploader.open();
									});

									jQuery(document).on('click','.criteria-image-button-remove', function(e) {
									    jQuery(this).parent().find('.criteria-image-url').val('');
									    jQuery(this).parent().find( "img.criteria-image" ).attr({
									        src: ''
									    });
									    jQuery(this).parent().find(".criteria-image-button").css("display", "block");
									    jQuery(this).parent().find(".fa-cloud-upload").css("display", "block");
									    jQuery(this).css("display", "none");
									    jQuery(this).parent().find(".fa-trash-o").css("display", "none");
									});
								</script>

							</span>

						</div>

						<div class="one_half">

							<span class="full" style="margin-bottom: 0;">

								<span class="full" style="margin-bottom: 0;">
									<h3><i class="fa fa-picture-o"></i><?php _e( 'Cover Image:', 'themesdojo' ); ?></h3>
								</span>

								<div style="width: 100%; float: left;">
									<img class="criteria-image" id="your_cover_url_img" src="<?php if (!empty($wpjobus_resume_cover_image)) echo $wpjobus_resume_cover_image; ?>" style="float: left; width: auto; margin-bottom: 20px; margin-top: 10px; max-height: 340px;" /> 
								</div>
					            <input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="wpjobus_resume_cover_image" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_cover_image)) echo $wpjobus_resume_cover_image; ?>" />
					            <input class="criteria-image-id" id="your_cover_id" type="text" size="36" name="wpjobus_resume_cover_image_id" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_cover_image_id)) echo $wpjobus_resume_cover_image_id; ?>" />
					            <i class="fa fa-trash-o"></i><input class="criteria-image-button-remove button" id="your_image_url_button_remove<?php echo $i; ?>2" type="button" value="Delete Image" /> </br>
					            <i class="fa fa-cloud-upload"></i><input class="criteria-image-button button" id="your_image_url_button<?php echo $i; ?>2" type="button" value="Upload Image" />

					            <script>
									var image_custom_uploader;
									var $thisItem = '';

									jQuery(document).on('click','.criteria-image-button', function(e) {
									    e.preventDefault();

									    $thisItem = jQuery(this);

									    //If the uploader object has already been created, reopen the dialog
									    if (image_custom_uploader) {
									        image_custom_uploader.open();
									        return;
									    }

									    //Extend the wp.media object
									    image_custom_uploader = wp.media.frames.file_frame = wp.media({
									        title: 'Choose Image',
									        button: {
									            text: 'Choose Image'
									        },
									        multiple: false
									    });

									    //When a file is selected, grab the URL and set it as the text field's value
									    image_custom_uploader.on('select', function() {
									        attachment = image_custom_uploader.state().get('selection').first().toJSON();
									        var url = '';
									        url = attachment['url'];
									        var attachId = '';
									        attachId = attachment['id'];
									        $thisItem.parent().find('.criteria-image-id').val(attachId);
									        $thisItem.parent().find('.criteria-image-url').val(url);
									        $thisItem.parent().find( "img.criteria-image" ).attr({
									            src: url
									        });
									        $thisItem.parent().find(".criteria-image-button").css("display", "none");
									        $thisItem.parent().find(".fa-cloud-upload").css("display", "none");
									        $thisItem.parent().find(".criteria-image-button-remove").css("display", "block");
									        $thisItem.parent().find(".fa-trash-o").css("display", "block");
									    });

									    //Open the uploader dialog
									    image_custom_uploader.open();
									});

									jQuery(document).on('click','.criteria-image-button-remove', function(e) {
									    jQuery(this).parent().find('.criteria-image-url').val('');
									    jQuery(this).parent().find( "img.criteria-image" ).attr({
									        src: ''
									    });
									    jQuery(this).parent().find(".criteria-image-button").css("display", "block");
									    jQuery(this).parent().find(".fa-cloud-upload").css("display", "block");
									    jQuery(this).css("display", "none");
									    jQuery(this).parent().find(".fa-trash-o").css("display", "none");
									});
								</script>

							</span>

						</div>

						<div class="divider"></div>

					</div>

					<h1 class="resume-section-title"><i class="fa fa-bar-chart-o"></i><?php _e( 'Skills', 'themesdojo' ); ?></h1>
					<h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Be descriptive and creative on your skills.', 'themesdojo' ); ?></h3>

					<div class="divider"></div>

					<div class="full" style="margin-bottom: 0;">

						<div class="one_half first">

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Professional Title:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="review-name" class='input-textarea' name='wpjobus_resume_prof_title' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_prof_title; ?>' placeholder="" />
								</span>

							</span>

						</div>

						<div class="one_half">

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Career Level:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<select name="resume_career_level" id="resume_career_level" style="width: 100%; margin-right: 10px;">
										<?php 
											global $redux_demo; 
											for ($i = 0; $i < count($redux_demo['resume_career_level']); $i++) {
										?>
										<option value='<?php echo $redux_demo['resume_career_level'][$i]; ?>' <?php selected( $td_resume_career_level, $redux_demo["resume_career_level"][$i] ); ?>><?php echo $redux_demo['resume_career_level'][$i]; ?></option>

										<?php 
											}
										?>
									</select>
								</span>

							</span>

						</div>

					</div>

					<div class="full" style="margin-bottom: 0;">

						<div class="one_half first">

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3 style="color: #2dcc70;"><?php _e( 'Communication level:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="review-name" class='' name='wpjobus_resume_comm_level' style="width: 100%; float: left; margin-bottom: 0;" value='<?php echo $wpjobus_resume_comm_level; ?>' placeholder="70%" />
									<span class="info-text" style="margin-left: 0;"><?php _e( '%(1 to 100 value)', 'themesdojo' ); ?></span>
								</span>

							</span>

						</div>

						<div class="one_half">

							<span class="full" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Notes:', 'themesdojo' ); ?></h3>
								</span>

							</span>

							<span class="full" >

								<?php 
									
									$settings = array(
											'wpautop' => true,
											'skillsNotes' => 'content',
											'media_buttons' => false,
											'editor_css' => '<style>.mceToolba { background-color: #faf9f4; padding: 5px; }</style>',
											'tinymce' => array(
												'theme_advanced_buttons1' => 'bold,italic,underline,blockquote,separator,strikethrough,bullist,numlist,justifyleft,justifycenter,justifyright,undo,redo,link,unlink,fullscreen',
												'theme_advanced_buttons2' => 'pastetext,pasteword,removeformat,|,charmap,|,outdent,indent,|,undo,redo',
												'theme_advanced_buttons3' => '',
												'theme_advanced_buttons4' => ''
											),
											'quicktags' => false
									);
												
									wp_editor( $wpjobus_resume_comm_note, 'skillsNotes', $settings );

								?>

							</span>

						</div>

					</div>

					<div class="full" style="margin-bottom: 0;">

						<div class="one_half first">

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3 style="color: #e84c3d;"><?php _e( 'Organizational level:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="review-name" class='' name='wpjobus_resume_org_level' style="width: 100%; float: left; margin-bottom: 0;" value='<?php echo $wpjobus_resume_org_level; ?>' placeholder="70%" />
									<span class="info-text" style="margin-left: 0;"><?php _e( '%(1 to 100 value)', 'themesdojo' ); ?></span>
								</span>

							</span>

						</div>

						<div class="one_half">

							<span class="full" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Notes:', 'themesdojo' ); ?></h3>
								</span>

							</span>

							<span class="full" >

								<?php 
									
									$settings = array(
											'wpautop' => true,
											'orgNotes' => 'content',
											'media_buttons' => false,
											'editor_css' => '<style>.mceToolba { background-color: #faf9f4; padding: 5px; }</style>',
											'tinymce' => array(
												'theme_advanced_buttons1' => 'bold,italic,underline,blockquote,separator,strikethrough,bullist,numlist,justifyleft,justifycenter,justifyright,undo,redo,link,unlink,fullscreen',
												'theme_advanced_buttons2' => 'pastetext,pasteword,removeformat,|,charmap,|,outdent,indent,|,undo,redo',
												'theme_advanced_buttons3' => '',
												'theme_advanced_buttons4' => ''
											),
											'quicktags' => false
									);
												
									wp_editor( $wpjobus_resume_org_note, 'orgNotes', $settings );

								?>

							</span>

						</div>

					</div>

					<div class="full" style="margin-bottom: 0;">

						<div class="one_half first">

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3 style="color: #34495e;"><?php _e( 'Job Related level:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="review-name" class='' name='wpjobus_resume_job_rel_level' style="width: 100%; float: left; margin-bottom: 0;" value='<?php echo $wpjobus_resume_job_rel_level; ?>' placeholder="70%" />
									<span class="info-text" style="margin-left: 0;"><?php _e( '%(1 to 100 value)', 'themesdojo' ); ?></span>
								</span>

							</span>

						</div>

						<div class="one_half">

							<span class="full" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Notes:', 'themesdojo' ); ?></h3>
								</span>

							</span>

							<span class="full" >

								<?php 
									
									$settings = array(
											'wpautop' => true,
											'jobNotes' => 'content',
											'media_buttons' => false,
											'editor_css' => '<style>.mceToolba { background-color: #faf9f4; padding: 5px; }</style>',
											'tinymce' => array(
												'theme_advanced_buttons1' => 'bold,italic,underline,blockquote,separator,strikethrough,bullist,numlist,justifyleft,justifycenter,justifyright,undo,redo,link,unlink,fullscreen',
												'theme_advanced_buttons2' => 'pastetext,pasteword,removeformat,|,charmap,|,outdent,indent,|,undo,redo',
												'theme_advanced_buttons3' => '',
												'theme_advanced_buttons4' => ''
											),
											'quicktags' => false
									);
												
									wp_editor( $wpjobus_resume_job_rel_note, 'jobNotes', $settings );

								?>

							</span>

						</div>

						<div class="divider"></div>

					</div>

					<div class="full" style="margin-bottom: 0;">

						<div id="review_criteria">
							<?php 

								if(!empty($wpjobus_resume_skills)) {

								for ($i = 0; $i < (count($wpjobus_resume_skills)); $i++) {

							?>
							
							<div class="full option_item" id="<?php echo $i; ?>">

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Skill', 'themesdojo' ); ?> <span><?php echo ($i+1); ?></span></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<input type='text' id='wpjobus_resume_skills[<?php echo $i; ?>][0]' name='wpjobus_resume_skills[<?php echo $i; ?>][0]' value='<?php if (!empty($wpjobus_resume_skills[$i][0])) echo $wpjobus_resume_skills[$i][0]; ?>' class='criteria_name' placeholder="Title">
									</span>

								</span>

								<span class="one_half"  style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3><?php _e( 'Value:', 'themesdojo' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<input type='text' id='wpjobus_resume_skills[<?php echo $i; ?>][1]' name='wpjobus_resume_skills[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_skills[$i][1])) {echo $wpjobus_resume_skills[$i][1];} ?>' class='slider_value' placeholder="70%">
									</span>

								</span>

								<button name="button_del_criteria" type="button" class="button-secondary button_del_criteria"><i class="fa fa-trash-o"></i><?php _e( 'Delete Skill', 'themesdojo' ); ?></button>
								
							</div>
							
							<?php 
								} }
							?>


						</div>

						<div id="template_criterion">
							
							<div class="option_item full" id="999">

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Skill', 'themesdojo' ); ?> <span>999</span></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<input type='text' id='' name='' value='' class='criteria_name' placeholder="Title">
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3><?php _e( 'Value:', 'themesdojo' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<input type='text' id='' name='' value='' class='slider_value' placeholder="70%">
									</span>

								</span>
								
								<button name="button_del_criteria" type="button" class="button-secondary button_del_criteria"><i class="fa fa-trash-o"></i><?php _e( 'Delete Skill', 'themesdojo' ); ?></button>
							</div>

						</div>

						<div class="option_item">
							<button type="button" name="submit_add_criteria" id='submit_add_criteria' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new skill', 'themesdojo' ); ?></button>
						</div>

						<div class="divider"></div>

					</div>

					<div class="full" style="margin-bottom: 0;">

						<div class="one_half first" style="margin-bottom: 20px;">

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Native Language', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="review-name" class='' name='wpjobus_resume_native_language' style="width: 100%; float: left; margin-bottom: 0;" value='<?php echo $wpjobus_resume_native_language; ?>' placeholder="" />
								</span>

							</span>

						</div>

						<div class="divider"style="margin-top: 0px;"></div>

					</div>

					<div class="full" style="margin-bottom: 0;">

						<div id="resume_languages">
							<?php 

								if(!empty($wpjobus_resume_languages)) {

								for ($i = 0; $i < (count($wpjobus_resume_languages)); $i++) {

							?>
							
							<div class="full option_item" id="<?php echo $i; ?>">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Language', 'themesdojo' ); ?> <span><?php echo ($i+1); ?></span></h3>
									</span>
								</div>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Name', 'themesdojo' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<input type='text' id="wpjobus_resume_languages[<?php echo $i; ?>][0]" class="resume_lang_title" name='wpjobus_resume_languages[<?php echo $i; ?>][0]' style="width: 100%; float: left;" value='<?php if (!empty($wpjobus_resume_languages[$i][0])) echo $wpjobus_resume_languages[$i][0]; ?>' placeholder="" />
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3><?php _e( 'Understanding', 'themesdojo' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<select class="resume_lang_understanding" name="wpjobus_resume_languages[<?php echo $i; ?>][1]" id="wpjobus_resume_languages[<?php echo $i; ?>][1]" style="width: 100%; margin-right: 10px;">
											<option value='Level 1' <?php if(!empty($wpjobus_resume_languages[$i][1])) { selected( $wpjobus_resume_languages[$i][1], "Level 1" ); } ?>><?php _e( 'Level 1', 'themesdojo' ); ?></option>
											<option value='Level 2' <?php if(!empty($wpjobus_resume_languages[$i][1])) { selected( $wpjobus_resume_languages[$i][1], "Level 2" ); } ?>><?php _e( 'Level 2', 'themesdojo' ); ?></option>
											<option value='Level 3' <?php if(!empty($wpjobus_resume_languages[$i][1])) { selected( $wpjobus_resume_languages[$i][1], "Level 3" ); } ?>><?php _e( 'Level 3', 'themesdojo' ); ?></option>
											<option value='Level 4' <?php if(!empty($wpjobus_resume_languages[$i][1])) { selected( $wpjobus_resume_languages[$i][1], "Level 4" ); } ?>><?php _e( 'Level 4', 'themesdojo' ); ?></option>
											<option value='Level 5' <?php if(!empty($wpjobus_resume_languages[$i][1])) { selected( $wpjobus_resume_languages[$i][1], "Level 5" ); } ?>><?php _e( 'Level 5', 'themesdojo' ); ?></option>
										</select>
									</span>

								</span>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Speaking', 'themesdojo' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<select class="resume_lang_speaking" name="wpjobus_resume_languages[<?php echo $i; ?>][2]" id="wpjobus_resume_languages[<?php echo $i; ?>][2]" style="width: 100%; margin-right: 10px;">
											<option value='Level 1' <?php if(!empty($wpjobus_resume_languages[$i][2])) { selected( $wpjobus_resume_languages[$i][2], "Level 1" ); } ?>><?php _e( 'Level 1', 'themesdojo' ); ?></option>
											<option value='Level 2' <?php if(!empty($wpjobus_resume_languages[$i][2])) { selected( $wpjobus_resume_languages[$i][2], "Level 2" ); } ?>><?php _e( 'Level 2', 'themesdojo' ); ?></option>
											<option value='Level 3' <?php if(!empty($wpjobus_resume_languages[$i][2])) { selected( $wpjobus_resume_languages[$i][2], "Level 3" ); } ?>><?php _e( 'Level 3', 'themesdojo' ); ?></option>
											<option value='Level 4' <?php if(!empty($wpjobus_resume_languages[$i][2])) { selected( $wpjobus_resume_languages[$i][2], "Level 4" ); } ?>><?php _e( 'Level 4', 'themesdojo' ); ?></option>
											<option value='Level 5' <?php if(!empty($wpjobus_resume_languages[$i][2])) { selected( $wpjobus_resume_languages[$i][2], "Level 5" ); } ?>><?php _e( 'Level 5', 'themesdojo' ); ?></option>
										</select>
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3><?php _e( 'Writing', 'themesdojo' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<select class="resume_lang_writing" name="wpjobus_resume_languages[<?php echo $i; ?>][3]" id="wpjobus_resume_languages[<?php echo $i; ?>][3]" style="width: 100%; margin-right: 10px;">
											<option value='Level 1' <?php if(!empty($wpjobus_resume_languages[$i][3])) { selected( $wpjobus_resume_languages[$i][3], "Level 1" ); } ?>><?php _e( 'Level 1', 'themesdojo' ); ?></option>
											<option value='Level 2' <?php if(!empty($wpjobus_resume_languages[$i][3])) { selected( $wpjobus_resume_languages[$i][3], "Level 2" ); } ?>><?php _e( 'Level 2', 'themesdojo' ); ?></option>
											<option value='Level 3' <?php if(!empty($wpjobus_resume_languages[$i][3])) { selected( $wpjobus_resume_languages[$i][3], "Level 3" ); } ?>><?php _e( 'Level 3', 'themesdojo' ); ?></option>
											<option value='Level 4' <?php if(!empty($wpjobus_resume_languages[$i][3])) { selected( $wpjobus_resume_languages[$i][3], "Level 4" ); } ?>><?php _e( 'Level 4', 'themesdojo' ); ?></option>
											<option value='Level 5' <?php if(!empty($wpjobus_resume_languages[$i][3])) { selected( $wpjobus_resume_languages[$i][3], "Level 5" ); } ?>><?php _e( 'Level 5', 'themesdojo' ); ?></option>
										</select>
									</span>

								</span>

								<button name="button_del_language" type="button" class="button-secondary button_del_language"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'themesdojo' ); ?></button>
								
							</div>
							
							<?php 
								} }
							?>


						</div>

						<div id="template_language">
							
							<div class="full option_item" id="999">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Language', 'themesdojo' ); ?> <span>999</span></h3>
									</span>
								</div>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Name', 'themesdojo' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<input type='text' id="" class="resume_lang_title" name='' style="width: 100%; float: left;" value='' placeholder="" />
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3><?php _e( 'Understanding', 'themesdojo' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<select class="resume_lang_understanding" name="" id="" style="width: 100%; margin-right: 10px;">
											<option value='Level 1'><?php _e( 'Level 1', 'themesdojo' ); ?></option>
											<option value='Level 2'><?php _e( 'Level 2', 'themesdojo' ); ?></option>
											<option value='Level 3'><?php _e( 'Level 3', 'themesdojo' ); ?></option>
											<option value='Level 4'><?php _e( 'Level 4', 'themesdojo' ); ?></option>
											<option value='Level 5'><?php _e( 'Level 5', 'themesdojo' ); ?></option>
										</select>
									</span>

								</span>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Speaking', 'themesdojo' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<select class="resume_lang_speaking" name="" id="" style="width: 100%; margin-right: 10px;">
											<option value='Level 1'><?php _e( 'Level 1', 'themesdojo' ); ?></option>
											<option value='Level 2'><?php _e( 'Level 2', 'themesdojo' ); ?></option>
											<option value='Level 3'><?php _e( 'Level 3', 'themesdojo' ); ?></option>
											<option value='Level 4'><?php _e( 'Level 4', 'themesdojo' ); ?></option>
											<option value='Level 5'><?php _e( 'Level 5', 'themesdojo' ); ?></option>
										</select>
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3><?php _e( 'Writing', 'themesdojo' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<select class="resume_lang_writing" name="" id="" style="width: 100%; margin-right: 10px;">
											<option value='Level 1'><?php _e( 'Level 1', 'themesdojo' ); ?></option>
											<option value='Level 2'><?php _e( 'Level 2', 'themesdojo' ); ?></option>
											<option value='Level 3'><?php _e( 'Level 3', 'themesdojo' ); ?></option>
											<option value='Level 4'><?php _e( 'Level 4', 'themesdojo' ); ?></option>
											<option value='Level 5'><?php _e( 'Level 5', 'themesdojo' ); ?></option>
										</select>
									</span>

								</span>

								<button name="button_del_language" type="button" class="button-secondary button_del_language"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'themesdojo' ); ?></button>
							</div>

						</div>

						<div class="option_item">
							<button type="button" name="submit_add_language" id='submit_add_language' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new language', 'themesdojo' ); ?></button>
						</div>

						<div class="divider"></div>

					</div>

					<div class="full" style="margin-bottom: 0;">

						<div class="one_fifth first">

							<h3 class="skill-item-title"><?php _e( 'Hobbies:', 'themesdojo' ); ?></h3>

						</div>

						<div class="four_fifth">

							<input type='text' id="review-name" class='' name='wpjobus_resume_hobbies' style="width: 100%; float: left; margin-bottom: 0;" value='<?php echo $wpjobus_resume_hobbies; ?>' placeholder="" />
							<span class="info-text" style="margin-left: 0;"><?php _e( 'Insert multiple hobbies and separate them using commas', 'themesdojo' ); ?></span>

						</div>

						<div class="divider" style="margin-top: 20px;"></div>

					</div>

					<h1 class="resume-section-title"><i class="fa fa-university"></i><?php _e( 'Education', 'themesdojo' ); ?></h1>
					<h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Fill in the education related info using the fields below.', 'themesdojo' ); ?></h3>

					<div class="divider"></div>

					<div class="full" style="margin-bottom: 0;">

						<div id="resume_institution">
							<?php 

								if(!empty($wpjobus_resume_education)) {

								for ($i = 0; $i < (count($wpjobus_resume_education)); $i++) {

							?>
							
							<div class="full option_item" id="<?php echo $i; ?>">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Institution', 'themesdojo' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
									</span>
								</div>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Institution Name', 'themesdojo' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id="wpjobus_resume_education[<?php echo $i; ?>][0]" class="criteria_name" name='wpjobus_resume_education[<?php echo $i; ?>][0]' style="width: 100%; float: left;" value='<?php if (!empty($wpjobus_resume_education[$i][0])) echo $wpjobus_resume_education[$i][0]; ?>' placeholder="" />
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Qualification & Faculty:', 'themesdojo' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id='wpjobus_resume_education[<?php echo $i; ?>][1]' name='wpjobus_resume_education[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_education[$i][1])) echo $wpjobus_resume_education[$i][1]; ?>' class='criteria_name_two' placeholder="" style="width: 100%;">
									</span>

								</span>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Period:', 'themesdojo' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='wpjobus_resume_education[<?php echo $i; ?>][2]' name='wpjobus_resume_education[<?php echo $i; ?>][2]' value='<?php if (!empty($wpjobus_resume_education[$i][2])) echo $wpjobus_resume_education[$i][2]; ?>' class='criteria_from_time' placeholder="" style="width: 40%"> <span style="float: left; margin: 10px;">-</span> <input type='text' id='wpjobus_resume_education[<?php echo $i; ?>][3]' name='wpjobus_resume_education[<?php echo $i; ?>][3]' value='<?php if (!empty($wpjobus_resume_education[$i][3])) echo $wpjobus_resume_education[$i][3]; ?>' class='criteria_to_time' placeholder="" style="width: 40%">
										</span>

									</span>

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Location:', 'themesdojo' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='wpjobus_resume_education[<?php echo $i; ?>][4]' name='wpjobus_resume_education[<?php echo $i; ?>][4]' value='<?php if (!empty($wpjobus_resume_education[$i][4])) echo $wpjobus_resume_education[$i][4]; ?>' class='criteria_location' placeholder="" style="width: 100%;">
										</span>

									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Notes:', 'themesdojo' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<textarea class="criteria_notes" name="wpjobus_resume_education[<?php echo $i; ?>][5]" id='wpjobus_resume_education[<?php echo $i; ?>][5]' cols="70" rows="4" ><?php if (!empty($wpjobus_resume_education[$i][5])) echo $wpjobus_resume_education[$i][5]; ?></textarea>
									</span>

								</span>

								<button name="button_del_institution" type="button" class="button-secondary button_del_institution"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'themesdojo' ); ?></button>
								
							</div>
							
							<?php 
								} }
							?>


						</div>

						<div id="template_education">
							
							<div class="full option_item" id="999">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Institution', 'themesdojo' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
									</span>
								</div>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Institution Name', 'themesdojo' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id="" class="criteria_name" name='' style="width: 100%; float: left;" value='' placeholder="" />
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Qualification & Faculty:', 'themesdojo' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id='' name='' value='' class='criteria_name_two' placeholder="" style="width: 100%;">
									</span>

								</span>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Period:', 'themesdojo' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='' name='' value='' class='criteria_from_time' placeholder="" style="width: 40%"> <span style="float: left; margin: 10px;">-</span> <input type='text' id='' name='' value='' class='criteria_to_time' placeholder="" style="width: 40%">
										</span>

									</span>

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Location:', 'themesdojo' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='' name='' value='' class='criteria_location' placeholder="" style="width: 100%;">
										</span>

									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Notes:', 'themesdojo' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<textarea class="criteria_notes" name="" id='' cols="70" rows="4" ></textarea>
									</span>

								</span>

								<button name="button_del_institution" type="button" class="button-secondary button_del_institution"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'themesdojo' ); ?></button>
							</div>

						</div>

						<div class="option_item">
							<button type="button" name="submit_add_institution" id='submit_add_institution' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new institution', 'themesdojo' ); ?></button>
						</div>

						<div class="divider"></div>

					</div>

					<h1 class="resume-section-title"><i class="fa fa-trophy"></i><?php _e( 'Awards', 'themesdojo' ); ?></h1>
					<h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Let everybody know how good you are!', 'themesdojo' ); ?></h3>

					<div class="divider"></div>

					<div class="full" style="margin-bottom: 0;">

						<div id="resume_award">
							<?php 

								if(!empty($wpjobus_resume_award)) {

								for ($i = 0; $i < (count($wpjobus_resume_award)); $i++) {

							?>
							
							<div class="full option_item" id="<?php echo $i; ?>">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Award', 'themesdojo' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
									</span>
								</div>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Prize:', 'themesdojo' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id="wpjobus_resume_award[<?php echo $i; ?>][0]" class="criteria_name" name='wpjobus_resume_award[<?php echo $i; ?>][0]' style="width: 100%; float: left;" value='<?php if (!empty($wpjobus_resume_award[$i][0])) echo $wpjobus_resume_award[$i][0]; ?>' placeholder="" />
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Competition Name:', 'themesdojo' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id='wpjobus_resume_award[<?php echo $i; ?>][1]' name='wpjobus_resume_award[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_award[$i][1])) echo $wpjobus_resume_award[$i][1]; ?>' class='criteria_name_two' placeholder="" style="width: 100%;">
									</span>

								</span>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Year:', 'themesdojo' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='wpjobus_resume_award[<?php echo $i; ?>][2]' name='wpjobus_resume_award[<?php echo $i; ?>][2]' value='<?php if (!empty($wpjobus_resume_award[$i][2])) echo $wpjobus_resume_award[$i][2]; ?>' class='criteria_from_time' placeholder="" style="width: 100%;">
										</span>

									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Location:', 'themesdojo' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='wpjobus_resume_award[<?php echo $i; ?>][3]' name='wpjobus_resume_award[<?php echo $i; ?>][3]' value='<?php if (!empty($wpjobus_resume_award[$i][3])) echo $wpjobus_resume_award[$i][3]; ?>' class='criteria_location' placeholder="" style="width: 100%;">
										</span>

									</span>

								</span>

								<button name="button_del_award" type="button" class="button-secondary button_del_award" style="margin-top: 30px;"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'themesdojo' ); ?></button>
								
							</div>
							
							<?php 
								} }
							?>


						</div>

						<div id="template_award">
							
							<div class="full option_item" id="999">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Award', 'themesdojo' ); ?> <span class="num">999</span></h3>
									</span>
								</div>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Prize:', 'themesdojo' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id="" class="criteria_name" name='' style="width: 100%; float: left;" value='' placeholder="" />
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Competition Name:', 'themesdojo' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id='' name='' value='' class='criteria_name_two' placeholder="" style="width: 100%;">
									</span>

								</span>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Year:', 'themesdojo' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='' name='' value='' class='criteria_from_time' placeholder="" style="width: 100%;">
										</span>

									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Location:', 'themesdojo' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='' name='' value='' class='criteria_location' placeholder="" style="width: 100%;">
										</span>

									</span>

								</span>

								<button name="button_del_award" type="button" class="button-secondary button_del_award" style="margin-top: 30px;"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'themesdojo' ); ?></button>
							</div>

						</div>

						<div class="option_item">
							<button type="button" name="submit_add_award" id='submit_add_award' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new award', 'themesdojo' ); ?></button>
						</div>

						<div class="divider"></div>

					</div>

					<h1 class="resume-section-title"><i class="fa fa-building"></i><?php _e( 'Work Experience', 'themesdojo' ); ?></h1>
					<h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Name the organizations in which you gained your precious experience and professional expertise.', 'themesdojo' ); ?></h3>

					<div class="divider"></div>

					<div class="full" style="margin-bottom: 0;">

						<div id="resume_work">
							<?php 

								if(!empty($wpjobus_resume_work)) {

								for ($i = 0; $i < (count($wpjobus_resume_work)); $i++) {

							?>
							
							<div class="full option_item" id="<?php echo $i; ?>">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Work Experience', 'themesdojo' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
									</span>
								</div>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Organizationn Name:', 'themesdojo' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id='wpjobus_resume_work[<?php echo $i; ?>][0]' name='wpjobus_resume_work[<?php echo $i; ?>][0]' value='<?php if (!empty($wpjobus_resume_work[$i][0])) echo $wpjobus_resume_work[$i][0]; ?>' class='criteria_name' placeholder="" style="width: 100%; float: left;">
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Job Position:', 'themesdojo' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id='wpjobus_resume_work[<?php echo $i; ?>][1]' name='wpjobus_resume_work[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_work[$i][1])) echo $wpjobus_resume_work[$i][1]; ?>' class='criteria_name_two' placeholder="" style="width: 100%;">
									</span>

								</span>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Period:', 'themesdojo' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='wpjobus_resume_work[<?php echo $i; ?>][2]' name='wpjobus_resume_work[<?php echo $i; ?>][2]' value='<?php if (!empty($wpjobus_resume_work[$i][2])) echo $wpjobus_resume_work[$i][2]; ?>' class='criteria_from_time' placeholder="" style="width: 40%;"> <span style="float: left; margin: 10px;">-</span> <input type='text' id='wpjobus_resume_work[<?php echo $i; ?>][3]' name='wpjobus_resume_work[<?php echo $i; ?>][3]' value='<?php if (!empty($wpjobus_resume_work[$i][3])) echo $wpjobus_resume_work[$i][3]; ?>' class='criteria_to_time' placeholder="" style="width: 40%;">
										</span>

									</span>

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Job type:', 'themesdojo' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<select class="resume_work_job_type" name="wpjobus_resume_work[<?php echo $i; ?>][4]" id="wpjobus_resume_work[<?php echo $i; ?>][4]" style="width: 100%; margin-right: 10px;">
												<?php 
													global $redux_demo; 
													for ($q = 0; $q < count($redux_demo['job-type']); $q++) {
												?>
													<option value='<?php echo $redux_demo['job-type'][$q]; ?>' <?php if(!empty($wpjobus_resume_work[$i][4])) { selected( $wpjobus_resume_work[$i][4], $redux_demo["job-type"][$q] ); } ?>><?php echo $redux_demo['job-type'][$q]; ?></option>
												<?php 
													}
												?>
											</select>
										</span>

									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Notes:', 'themesdojo' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<textarea class="criteria_notes" name="wpjobus_resume_work[<?php echo $i; ?>][5]" id='wpjobus_resume_work[<?php echo $i; ?>][5]' cols="70" rows="4" ><?php if (!empty($wpjobus_resume_work[$i][5])) echo $wpjobus_resume_work[$i][5]; ?></textarea>
									</span>

								</span>

								<button name="button_del_work" type="button" class="button-secondary button_del_work"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'themesdojo' ); ?></button>
								
							</div>
							
							<?php 
								} }
							?>


						</div>

						<div id="template_work">
							
							<div class="full option_item" id="999">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Work Experience', 'themesdojo' ); ?> <span class="num">999</span></h3>
									</span>
								</div>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Organizationn Name:', 'themesdojo' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id='' name='' value='' class='criteria_name' placeholder="" style="width: 100%; float: left;">
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Job Position:', 'themesdojo' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id='' name='' value='' class='criteria_name_two' placeholder="" style="width: 100%;">
									</span>

								</span>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Period:', 'themesdojo' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='' name='' value='' class='criteria_from_time' placeholder="" style="width: 40%;"> <span style="float: left; margin: 10px;">-</span> <input type='text' id='' name='' value='' class='criteria_to_time' placeholder="" style="width: 40%;">
										</span>

									</span>

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Job type:', 'themesdojo' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<select class="resume_work_job_type" name="" id="" style="width: 100%; margin-right: 10px;">
												<?php 
													global $redux_demo; 
													for ($q = 0; $q < count($redux_demo['job-type']); $q++) {
												?>
													<option value='<?php echo $redux_demo['job-type'][$q]; ?>' <?php if(!empty($wpjobus_resume_work[$i][4])) { selected( $wpjobus_resume_work[$i][4], $redux_demo["job-type"][$q] ); } ?>><?php echo $redux_demo['job-type'][$q]; ?></option>
												<?php 
													}
												?>
											</select>
										</span>

									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Notes:', 'themesdojo' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<textarea class="criteria_notes" name="" id='' cols="70" rows="4" ></textarea>
									</span>

								</span>

								<button name="button_del_work" type="button" class="button-secondary button_del_work"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'themesdojo' ); ?></button>
							</div>

						</div>

						<div class="option_item">
							<button type="button" name="submit_add_work" id='submit_add_work' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new Organizationn', 'themesdojo' ); ?></button>
						</div>

						<div class="divider"></div>

					</div>

					<h1 class="resume-section-title"><i class="fa fa-money"></i><?php _e( 'Testimonials', 'themesdojo' ); ?></h1>
					<h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Let’s see what are people saying about you.', 'themesdojo' ); ?></h3>

					<div class="divider"></div>

					<div class="full" style="margin-bottom: 0;">

						<div id="resume_testimonials">
							<?php 

								if(!empty($wpjobus_resume_testimonials)) {

								for ($i = 0; $i < (count($wpjobus_resume_testimonials)); $i++) {

							?>
							
							<div class="full option_item" id="<?php echo $i; ?>">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Testimonial', 'themesdojo' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
									</span>
								</div>

								<div class="full" style="margin-bottom: 0;">

									<span class="one_half first"  style="margin-bottom: 0;">

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Full Name:', 'themesdojo' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<input type='text' id='wpjobus_resume_testimonials[<?php echo $i; ?>][0]' name='wpjobus_resume_testimonials[<?php echo $i; ?>][0]' value='<?php if (!empty($wpjobus_resume_testimonials[$i][0])) echo $wpjobus_resume_testimonials[$i][0]; ?>' class='criteria_name' placeholder="" style="width: 100%;">
											</span>

										</div>

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Organizationn:', 'themesdojo' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<input type='text' id='wpjobus_resume_testimonials[<?php echo $i; ?>][1]' name='wpjobus_resume_testimonials[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_testimonials[$i][1])) echo $wpjobus_resume_testimonials[$i][1]; ?>' class='criteria_name_two' placeholder="" style="width: 100%;">
											</span>

										</div>

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Testimonial:', 'themesdojo' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<textarea class="criteria_notes" name="wpjobus_resume_testimonials[<?php echo $i; ?>][2]" id='wpjobus_resume_testimonials[<?php echo $i; ?>][2]' cols="70" rows="4" ><?php if (!empty($wpjobus_resume_testimonials[$i][2])) echo $wpjobus_resume_testimonials[$i][2]; ?></textarea>
											</span>

										</div>

									</span>

									<span class="one_half" style="margin-bottom: 0;">

										<span class="full" style="margin-bottom: 0;">
											<h3><i class="fa fa-picture-o"></i><?php _e( 'Picture:', 'themesdojo' ); ?></h3>
										</span>

										<div style="width: 100%; float: left;">
											<img class="criteria-image" id="your_cover_url_img" src="<?php echo $wpjobus_resume_testimonials[$i][3]; ?>" style="float: left; width: auto; margin-bottom: 20px; margin-top: 10px; max-height: 100px;" /> 
										</div>
										
							            <input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="wpjobus_resume_testimonials[<?php echo $i; ?>][3]" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php echo $wpjobus_resume_testimonials[$i][3]; ?>"/>
							            <i class="fa fa-trash-o"></i><input class="criteria-image-button-remove button" id="your_image_url_button_remove<?php echo $i; ?>2" type="button" value="Delete Image" /> </br>
							            <i class="fa fa-cloud-upload"></i><input class="criteria-image-button button" id="your_image_url_button<?php echo $i; ?>2" type="button" value="Upload Image" />

							            <script>
											var image_custom_uploader;
											var $thisItem = '';

											jQuery(document).on('click','.criteria-image-button', function(e) {
											    e.preventDefault();

											    $thisItem = jQuery(this);

											    //If the uploader object has already been created, reopen the dialog
											    if (image_custom_uploader) {
											        image_custom_uploader.open();
											        return;
											    }

											    //Extend the wp.media object
											    image_custom_uploader = wp.media.frames.file_frame = wp.media({
											        title: 'Choose Image',
											        button: {
											            text: 'Choose Image'
											        },
											        multiple: false
											    });

											    //When a file is selected, grab the URL and set it as the text field's value
											    image_custom_uploader.on('select', function() {
											        attachment = image_custom_uploader.state().get('selection').first().toJSON();
											        var url = '';
											        url = attachment['url'];
											        var attachId = '';
											        attachId = attachment['id'];
											        $thisItem.parent().find('.criteria-image-url').val(url);
											        $thisItem.parent().find( "img.criteria-image" ).attr({
											            src: url
											        });
											        $thisItem.parent().find(".criteria-image-button").css("display", "none");
											        $thisItem.parent().find(".fa-cloud-upload").css("display", "none");
											        $thisItem.parent().find(".criteria-image-button-remove").css("display", "block");
											        $thisItem.parent().find(".fa-trash-o").css("display", "block");
											    });

											    //Open the uploader dialog
											    image_custom_uploader.open();
											});

											jQuery(document).on('click','.criteria-image-button-remove', function(e) {
											    jQuery(this).parent().find('.criteria-image-url').val('');
											    jQuery(this).parent().find( "img.criteria-image" ).attr({
											        src: ''
											    });
											    jQuery(this).parent().find(".criteria-image-button").css("display", "block");
											    jQuery(this).parent().find(".fa-cloud-upload").css("display", "block");
											    jQuery(this).css("display", "none");
											    jQuery(this).parent().find(".fa-trash-o").css("display", "none");
											});
										</script>

									</span>

								</div>

								<button name="button_del_testimonial" type="button" class="button-secondary button_del_testimonial"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'themesdojo' ); ?></button>
								
							</div>
							
							<?php 
								} }
							?>


						</div>

						<div id="template_testimonials">
							
							<div class="full option_item" id="999">
								
								<div class="full" style="margin-bottom: 0;">

									<div class='full' style="margin-bottom: 0;">
										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Testimonial', 'themesdojo' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
										</span>
									</div>

									<span class="one_half first"  style="margin-bottom: 0;">

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Full Name:', 'themesdojo' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<input type='text' id='' name='' value='' class='criteria_name' placeholder="" style="width: 100%;">
											</span>

										</div>

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Organizationn:', 'themesdojo' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<input type='text' id='' name='' value='' class='criteria_name_two' placeholder="" style="width: 100%;">
											</span>

										</div>

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Testimonial:', 'themesdojo' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<textarea class="criteria_notes" name="" id='' cols="70" rows="4" ></textarea>
											</span>

										</div>

									</span>

									<span class="one_half" style="margin-bottom: 0;">

										<span class="full" style="margin-bottom: 0;">
											<h3><i class="fa fa-picture-o"></i><?php _e( 'Picture:', 'themesdojo' ); ?></h3>
										</span>

										<div style="width: 100%; float: left;">
											<img class="criteria-image" id="your_cover_url_img" src="" style="float: left; width: auto; margin-bottom: 20px; margin-top: 10px; max-height: 100px;" /> 
										</div>
										
							            <input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="" />
							            <i class="fa fa-trash-o"></i><input class="criteria-image-button-remove button" id="your_image_url_button_remove<?php echo $i; ?>2" type="button" value="Delete Image" /> </br>
							            <i class="fa fa-cloud-upload"></i><input class="criteria-image-button button" id="your_image_url_button<?php echo $i; ?>2" type="button" value="Upload Image" />

							            <script>
											var image_custom_uploader;
											var $thisItem = '';

											jQuery(document).on('click','.criteria-image-button', function(e) {
											    e.preventDefault();

											    $thisItem = jQuery(this);

											    //If the uploader object has already been created, reopen the dialog
											    if (image_custom_uploader) {
											        image_custom_uploader.open();
											        return;
											    }

											    //Extend the wp.media object
											    image_custom_uploader = wp.media.frames.file_frame = wp.media({
											        title: 'Choose Image',
											        button: {
											            text: 'Choose Image'
											        },
											        multiple: false
											    });

											    //When a file is selected, grab the URL and set it as the text field's value
											    image_custom_uploader.on('select', function() {
											        attachment = image_custom_uploader.state().get('selection').first().toJSON();
											        var url = '';
											        url = attachment['url'];
											        var attachId = '';
											        attachId = attachment['id'];
											        $thisItem.parent().find('.criteria-image-url').val(url);
											        $thisItem.parent().find( "img.criteria-image" ).attr({
											            src: url
											        });
											        $thisItem.parent().find(".criteria-image-button").css("display", "none");
											        $thisItem.parent().find(".fa-cloud-upload").css("display", "none");
											        $thisItem.parent().find(".criteria-image-button-remove").css("display", "block");
											        $thisItem.parent().find(".fa-trash-o").css("display", "block");
											    });

											    //Open the uploader dialog
											    image_custom_uploader.open();
											});

											jQuery(document).on('click','.criteria-image-button-remove', function(e) {
											    jQuery(this).parent().find('.criteria-image-url').val('');
											    jQuery(this).parent().find( "img.criteria-image" ).attr({
											        src: ''
											    });
											    jQuery(this).parent().find(".criteria-image-button").css("display", "block");
											    jQuery(this).parent().find(".fa-cloud-upload").css("display", "block");
											    jQuery(this).css("display", "none");
											    jQuery(this).parent().find(".fa-trash-o").css("display", "none");
											});
										</script>

									</span>

								</div>

								<button name="button_del_testimonial" type="button" class="button-secondary button_del_testimonial"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'themesdojo' ); ?></button>
							</div>

						</div>

						<div class="option_item">
							<button type="button" name="submit_add_testimonial" id='submit_add_testimonial' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new testimonial', 'themesdojo' ); ?></button>
						</div>

						<div class="divider"></div>

					</div>

					<h1 class="resume-section-title"><i class="fa fa-money"></i><?php _e( 'Salary & Job Types', 'themesdojo' ); ?></h1>
					<h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Let companies know your financial expectations.', 'themesdojo' ); ?></h3>

					<div class="divider"></div>

					<div class="full" style="margin-bottom: 0;">

						<div class="one_half first">

							<span class="full" style="margin-bottom: 0;">

								<span class="one_half first" style="margin-bottom: 0;">
									<h3><?php _e( 'Remuneration Amount:', 'themesdojo' ); ?></h3>
								</span>

								<span class="one_half" style="margin-bottom: 0;">
									<input type='text' id="review-name" class='' name='wpjobus_resume_remuneration' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_remuneration; ?>' placeholder="" />
								</span>

							</span>

						</div>

						<div class="one_half">

							<span class="full" style="margin-bottom: 0;">

								<span class="one_fourth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Per:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fourth" style="margin-bottom: 0;">
									<select name="wpjobus_resume_remuneration_per" id="wpjobus_resume_remuneration_per" style="width: 100%;">
										<?php 
											global $redux_demo; 
											for ($i = 0; $i < count($redux_demo['job-remuneration-per']); $i++) {
										?>
										<option value='<?php echo $redux_demo['job-remuneration-per'][$i]; ?>' <?php selected( $wpjobus_resume_remuneration_per, $redux_demo["job-remuneration-per"][$i] ); ?>><?php echo $redux_demo['job-remuneration-per'][$i]; ?></option>
										<?php 
											}
										?>
									</select>
								</span>

							</span>

						</div>

						<div class="full">

							<span class="one_fifth first" style="margin-bottom: 0;">
								<h3><?php _e( 'Job Types:', 'themesdojo' ); ?></h3>
							</span>

							<span class="four_fifth" style="margin-bottom: 0; margin-top: 11px;">

								<?php 
									global $redux_demo; 
									for ($i = 0; $i < count($redux_demo['job-type']); $i++) {
								?>

									<span style="margin-right: 20px; float: left;">
										<input type="hidden" class='' name='wpjobus_resume_job_type[<?php echo $i; ?>][0]' value='<?php echo $i; ?>'/>
										<input type="checkbox" class='' name='wpjobus_resume_job_type[<?php echo $i; ?>][1]' style="width: 10px; margin-right: 5px; float: left; margin-top: 7px; margin-bottom: 10px;" value='<?php echo $redux_demo['job-type'][$i]; ?>' placeholder="" <?php if (!empty($wpjobus_resume_job_type[$i][1])) { ?>checked<?php } ?>/><?php echo $redux_demo['job-type'][$i]; ?>
									</span>
								<?php 
									}
								?>

							</span>

						</div>

					</div>

					<h1 class="resume-section-title"><i class="fa fa-bookmark"></i><?php _e( 'Portfolio', 'themesdojo' ); ?></h1>
					<h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Upload your finest and brilliant work!', 'themesdojo' ); ?></h3>

					<div class="divider"></div>

					<div class="full" style="margin-bottom: 0;">

						<div id="resume_portfolio">
							<?php 

								if(!empty($wpjobus_resume_portfolio)) {

								for ($i = 0; $i < (count($wpjobus_resume_portfolio)); $i++) {

							?>
							
							<div class="full option_item" id="<?php echo $i; ?>">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Project', 'themesdojo' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
									</span>
								</div>

								<div class="full" style="margin-bottom: 0;">

									<span class="one_half first"  style="margin-bottom: 0;">

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Name:', 'themesdojo' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<input type='text' id='wpjobus_resume_portfolio[<?php echo $i; ?>][0]' name='wpjobus_resume_portfolio[<?php echo $i; ?>][0]' value='<?php if (!empty($wpjobus_resume_portfolio[$i][0])) echo $wpjobus_resume_portfolio[$i][0]; ?>' class='criteria_name' placeholder="" style="width: 100%;">
											</span>

										</div>

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Category:', 'themesdojo' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<input type='text' id='wpjobus_resume_portfolio[<?php echo $i; ?>][1]' name='wpjobus_resume_portfolio[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_portfolio[$i][1])) echo $wpjobus_resume_portfolio[$i][1]; ?>' class='criteria_name_two' placeholder="" style="width: 100%;">
												<span class="info-text" style="margin-left: 0;"><?php _e( 'You can leave it empty', 'themesdojo' ); ?></span>
											</span>

										</div>

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Note:', 'themesdojo' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<textarea class="criteria_notes" name="pjobus_resume_portfolio[<?php echo $i; ?>][2]" id='pjobus_resume_portfolio[<?php echo $i; ?>][2]' cols="70" rows="4" ><?php if (!empty($wpjobus_resume_portfolio[$i][2])) echo $wpjobus_resume_portfolio[$i][2]; ?></textarea>
											</span>

										</div>

									</span>

									<span class="one_half" style="margin-bottom: 0;">

										<span class="full" style="margin-bottom: 0;">
											<h3><i class="fa fa-picture-o"></i><?php _e( 'Picture:', 'themesdojo' ); ?></h3>
										</span>

										<div style="width: 100%; float: left;">
											<img class="criteria-image" id="your_cover_url_img" src="<?php if (!empty($wpjobus_resume_portfolio[$i][3])) echo $wpjobus_resume_portfolio[$i][3]; ?>" style="float: left; width: auto; margin-bottom: 20px; margin-top: 10px; max-height: 100px;" /> 
										</div>
										
							            <input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="wpjobus_resume_portfolio[<?php echo $i; ?>][3]" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_portfolio[$i][3])) echo $wpjobus_resume_portfolio[$i][3]; ?>"/>
							            <i class="fa fa-trash-o" <?php if (!empty($wpjobus_resume_portfolio[$i][3])) { ?>style="display: block;"<?php  } ?>></i><input class="criteria-image-button-remove button" id="your_image_url_button_remove<?php echo $i; ?>2" type="button" value="Delete Image" <?php if (!empty($wpjobus_resume_portfolio[$i][3])) { ?>style="display: block;"<?php  } ?>/> </br>
							            <i class="fa fa-cloud-upload" <?php if (!empty($wpjobus_resume_portfolio[$i][3])) { ?>style="display: none;"<?php  } ?>></i><input class="criteria-image-button button" id="your_image_url_button<?php echo $i; ?>2" type="button" value="Upload Image" <?php if (!empty($wpjobus_resume_portfolio[$i][3])) { ?>style="display: none;"<?php  } ?>/>

							            <script>
											var image_custom_uploader;
											var $thisItem = '';

											jQuery(document).on('click','.criteria-image-button', function(e) {
											    e.preventDefault();

											    $thisItem = jQuery(this);

											    //If the uploader object has already been created, reopen the dialog
											    if (image_custom_uploader) {
											        image_custom_uploader.open();
											        return;
											    }

											    //Extend the wp.media object
											    image_custom_uploader = wp.media.frames.file_frame = wp.media({
											        title: 'Choose Image',
											        button: {
											            text: 'Choose Image'
											        },
											        multiple: false
											    });

											    //When a file is selected, grab the URL and set it as the text field's value
											    image_custom_uploader.on('select', function() {
											        attachment = image_custom_uploader.state().get('selection').first().toJSON();
											        var url = '';
											        url = attachment['url'];
											        var attachId = '';
											        attachId = attachment['id'];
											        $thisItem.parent().find('.criteria-image-url').val(url);
											        $thisItem.parent().find( "img.criteria-image" ).attr({
											            src: url
											        });
											        $thisItem.parent().find(".criteria-image-button").css("display", "none");
											        $thisItem.parent().find(".fa-cloud-upload").css("display", "none");
											        $thisItem.parent().find(".criteria-image-button-remove").css("display", "block");
											        $thisItem.parent().find(".fa-trash-o").css("display", "block");
											    });

											    //Open the uploader dialog
											    image_custom_uploader.open();
											});

											jQuery(document).on('click','.criteria-image-button-remove', function(e) {
											    jQuery(this).parent().find('.criteria-image-url').val('');
											    jQuery(this).parent().find( "img.criteria-image" ).attr({
											        src: ''
											    });
											    jQuery(this).parent().find(".criteria-image-button").css("display", "block");
											    jQuery(this).parent().find(".fa-cloud-upload").css("display", "block");
											    jQuery(this).css("display", "none");
											    jQuery(this).parent().find(".fa-trash-o").css("display", "none");
											});
										</script>

									</span>

								</div>

								<button name="button_del_portfolio" type="button" class="button-secondary button_del_portfolio"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'themesdojo' ); ?></button>
								
							</div>
							
							<?php 
								} }
							?>


						</div>

						<div id="template_portfolio">
							
							<div class="full option_item" id="999">
								
								<div class="full" style="margin-bottom: 0;">

									<div class='full' style="margin-bottom: 0;">
										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Project', 'themesdojo' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
										</span>
									</div>

									<span class="one_half first"  style="margin-bottom: 0;">

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Name:', 'themesdojo' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<input type='text' id='' name='' value='' class='criteria_name' placeholder="" style="width: 100%;">
											</span>

										</div>

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Category:', 'themesdojo' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<input type='text' id='' name='' value='' class='criteria_name_two' placeholder="" style="width: 100%;">
												<span class="info-text" style="margin-left: 0;"><?php _e( 'You can leave it empty', 'themesdojo' ); ?></span>
											</span>

										</div>

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Note:', 'themesdojo' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<textarea class="criteria_notes" name="" id='' cols="70" rows="4" ></textarea>
											</span>

										</div>

									</span>

									<span class="one_half" style="margin-bottom: 0;">

										<span class="full" style="margin-bottom: 0;">
											<h3><i class="fa fa-picture-o"></i><?php _e( 'Picture:', 'themesdojo' ); ?></h3>
										</span>

										<div style="width: 100%; float: left;">
											<img class="criteria-image" id="your_cover_url_img" src="" style="float: left; width: auto; margin-bottom: 20px; margin-top: 10px; max-height: 100px;" /> 
										</div>
										
							            <input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="" />
							            <i class="fa fa-trash-o"></i><input class="criteria-image-button-remove button" id="your_image_url_button_remove<?php echo $i; ?>2" type="button" value="Delete Image" /> </br>
							            <i class="fa fa-cloud-upload"></i><input class="criteria-image-button button" id="your_image_url_button<?php echo $i; ?>2" type="button" value="Upload Image" />

							            <script>
											var image_custom_uploader;
											var $thisItem = '';

											jQuery(document).on('click','.criteria-image-button', function(e) {
											    e.preventDefault();

											    $thisItem = jQuery(this);

											    //If the uploader object has already been created, reopen the dialog
											    if (image_custom_uploader) {
											        image_custom_uploader.open();
											        return;
											    }

											    //Extend the wp.media object
											    image_custom_uploader = wp.media.frames.file_frame = wp.media({
											        title: 'Choose Image',
											        button: {
											            text: 'Choose Image'
											        },
											        multiple: false
											    });

											    //When a file is selected, grab the URL and set it as the text field's value
											    image_custom_uploader.on('select', function() {
											        attachment = image_custom_uploader.state().get('selection').first().toJSON();
											        var url = '';
											        url = attachment['url'];
											        var attachId = '';
											        attachId = attachment['id'];
											        $thisItem.parent().find('.criteria-image-url').val(url);
											        $thisItem.parent().find( "img.criteria-image" ).attr({
											            src: url
											        });
											        $thisItem.parent().find(".criteria-image-button").css("display", "none");
											        $thisItem.parent().find(".fa-cloud-upload").css("display", "none");
											        $thisItem.parent().find(".criteria-image-button-remove").css("display", "block");
											        $thisItem.parent().find(".fa-trash-o").css("display", "block");
											    });

											    //Open the uploader dialog
											    image_custom_uploader.open();
											});

											jQuery(document).on('click','.criteria-image-button-remove', function(e) {
											    jQuery(this).parent().find('.criteria-image-url').val('');
											    jQuery(this).parent().find( "img.criteria-image" ).attr({
											        src: ''
											    });
											    jQuery(this).parent().find(".criteria-image-button").css("display", "block");
											    jQuery(this).parent().find(".fa-cloud-upload").css("display", "block");
											    jQuery(this).css("display", "none");
											    jQuery(this).parent().find(".fa-trash-o").css("display", "none");
											});
										</script>

									</span>

								</div>

								<button name="button_del_portfolio" type="button" class="button-secondary button_del_portfolio"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'themesdojo' ); ?></button>
							</div>

						</div>

						<div class="option_item">
							<button type="button" name="submit_add_portfolio" id='submit_add_portfolio' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new project', 'themesdojo' ); ?></button>
						</div>

						<div class="divider"></div>

					</div>

					<h1 class="resume-section-title"><i class="fa fa-envelope"></i><?php _e( 'Contact Details', 'themesdojo' ); ?></h1>
					<h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'We’re almost done! Fill in the contact details accurately.', 'themesdojo' ); ?></h3>

					<div class="divider"></div>

					<div class="full" style="margin-bottom: 0;">

						<div class="one_half first">

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Address:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type="text" name="wpjobus_resume_address" id="wpjobus_resume_address" style="width: 100%; float: left;" value="<?php echo $wpjobus_resume_address; ?>" class="input-textarea" placeholder="" />
								</span>

							</span>

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Phone number:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_resume_phone" class='input-textarea' name='wpjobus_resume_phone' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_phone; ?>' placeholder="" />
								</span>

							</span>

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Website:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_resume_website" class='input-textarea' name='wpjobus_resume_website' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_website; ?>' placeholder="" />
								</span>

							</span>

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Email:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_resume_email" class='input-textarea' name='wpjobus_resume_email' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_email; ?>' placeholder="" />
									<span class="full" style="margin-bottom: 0;">
										<input type="checkbox" class='' name='wpjobus_resume_publish_email' style="width: 10px; margin-right: 5px; float: left; margin-top: 7px;" value='publish_email' placeholder="" <?php if (!empty($wpjobus_resume_publish_email)) { ?>checked<?php } ?>/><?php _e( 'Publish my email address', 'themesdojo' ); ?>
									</span>
								</span>

							</span>

						</div>

						<div class="one_half">

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Facebook:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_resume_facebook" class='input-textarea' name='wpjobus_resume_facebook' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_facebook; ?>' placeholder="" />
								</span>

							</span>

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'LinkedIn:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_resume_linkedin" class='input-textarea' name='wpjobus_resume_linkedin' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_linkedin; ?>' placeholder="" />
								</span>

							</span>

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Twitter:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_resume_twitter" class='input-textarea' name='wpjobus_resume_twitter' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_twitter; ?>' placeholder="" />
								</span>

							</span>

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Google+:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_resume_googleplus" class='input-textarea' name='wpjobus_resume_googleplus' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_googleplus; ?>' placeholder="" />
								</span>

							</span>

						</div>

						<div class="full" >

							<span class="one_fifth first" style="margin-bottom: 0;">
								<h3><?php _e( 'Google Maps Address:', 'themesdojo' ); ?></h3>
							</span>

							<span class="four_fifth" style="margin-bottom: 0;">
								<input type='text' id="address" class='input-textarea' name='wpjobus_resume_googleaddress' style="width: 100%; float: left; margin-bottom: 0;" value='<?php echo $wpjobus_resume_googleaddress; ?>' placeholder="" />
								<p class="help-block"><?php _e('Start typing an address and select from the dropdown.', 'themesdojo') ?></p>
							</span>

						</div>

						<div class="full">

							<div id="map-canvas"></div>

							<style>

								#map-canvas {
									display: block;
									width: 100%;
									height: 470px;
									position: relative;
									margin-bottom: 10px;
								}

							</style>

							<script type="text/javascript">

								jQuery(document).ready(function($) {

									var geocoder;
									var map;
									var marker;

									var geocoder = new google.maps.Geocoder();

									function geocodePosition(pos) {
									  geocoder.geocode({
									    latLng: pos
									  }, function(responses) {
									    if (responses && responses.length > 0) {
									      updateMarkerAddress(responses[0].formatted_address);
									    } else {
									      updateMarkerAddress('Cannot determine address at this location.');
									    }
									  });
									}

									function updateMarkerPosition(latLng) {
									  jQuery('#latitude').val(latLng.lat());
									  jQuery('#longitude').val(latLng.lng());
									}

									function updateMarkerAddress(str) {
									  jQuery('#address').val(str);
									}

									function initialize() {

									  var latlng = new google.maps.LatLng(<?php echo $wpjobus_resume_latitude; ?>, <?php echo $wpjobus_resume_longitude; ?>);
									  var mapOptions = {
									    zoom: 16,
									    center: latlng
									  }

									  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

									  geocoder = new google.maps.Geocoder();

									  marker = new google.maps.Marker({
									  	position: latlng,
									    map: map,
									    draggable: true
									  });

									  // Add dragging event listeners.
									  google.maps.event.addListener(marker, 'dragstart', function() {
									    updateMarkerAddress('Dragging...');
									  });
									  
									  google.maps.event.addListener(marker, 'drag', function() {
									    updateMarkerPosition(marker.getPosition());
									  });
									  
									  google.maps.event.addListener(marker, 'dragend', function() {
									    geocodePosition(marker.getPosition());
									  });

									}

									google.maps.event.addDomListener(window, 'load', initialize);

									jQuery(document).ready(function() { 
									         
									  initialize();
									          
									  jQuery(function() {
									    jQuery("#address").autocomplete({
									      //This bit uses the geocoder to fetch address values
									      source: function(request, response) {
									        geocoder.geocode( {'address': request.term }, function(results, status) {
									          response(jQuery.map(results, function(item) {
									            return {
									              label:  item.formatted_address,
									              value: item.formatted_address,
									              latitude: item.geometry.location.lat(),
									              longitude: item.geometry.location.lng()
									            }
									          }));
									        })
									      },
									      //This bit is executed upon selection of an address
									      select: function(event, ui) {
									        jQuery("#latitude").val(ui.item.latitude);
									        jQuery("#longitude").val(ui.item.longitude);

									        var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);

									        marker.setPosition(location);
									        map.setZoom(16);
									        map.setCenter(location);

									      }
									    });
									  });
									  
									  //Add listener to marker for reverse geocoding
									  google.maps.event.addListener(marker, 'drag', function() {
									    geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
									      if (status == google.maps.GeocoderStatus.OK) {
									        if (results[0]) {
									          jQuery('#address').val(results[0].formatted_address);
									          jQuery('#latitude').val(marker.getPosition().lat());
									          jQuery('#longitude').val(marker.getPosition().lng());
									        }
									      }
									    });
									  });
									  
									});

								});

							</script>

						</div>

						<div class="full" >

							<div class="one_half first" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Latitude:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type="text" id="latitude" name="wpjobus_resume_latitude" value="<?php echo $wpjobus_resume_latitude; ?>" class="input-textarea">
								</span>

							</div>

							<div class="one_half" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Longitude:', 'themesdojo' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type="text" id="longitude" name="wpjobus_resume_longitude" value="<?php echo $wpjobus_resume_longitude; ?>" class="input-textarea">
								</span>

							</div>

						</div>

					</div>

					<div class="divider"></div>

					<div class="full save-resume-block">

						<div class="full" style="margin-bottom: 0;">

							<div id="success">
								<span>
									<h3><?php _e( 'Resume Updated Successful.', 'themesdojo' ); ?></h3>
								</span>
								<div class="divider"></div>
							</div>
										 
							<div id="error">
								<span>
									<h3><?php _e( 'Something went wrong, try refreshing and submitting the form again.', 'themesdojo' ); ?></h3>
								</span>
								<div class="divider"></div>
							</div>

						</div>

						<input type="hidden" name="action" value="wpjobusEditResumeForm" />
						<?php wp_nonce_field( 'wpjobusEditResume_html', 'wpjobusEditResume_nonce' ); ?>

						<span class="draft-resume-button">

							<input style="margin-bottom: 0;" name="submit" type="submit" value="<?php _e( 'Save As Draft', 'themesdojo' ); ?>" class="input-submit">

							<script>
								jQuery(document).on('click','.draft-resume-button .input-submit', function() {

									$thisItem = jQuery(this);
									$thisItem.parent().parent().parent().find('#postStatus').val('draft');
									
								});
							</script>

						</span>

						<span class="submit-resume-button">

							<input style="margin-bottom: 0;" name="submit" type="submit" value="<?php global $redux_demo, $recipe_state; $recipe_state = $redux_demo['resume-state']; if($recipe_state == "1" or current_user_can('administrator')) { _e( 'Update Resume', 'themesdojo' ); } else { _e( 'Update Resume For Review', 'themesdojo' ) ;} ?>" class="input-submit">	 
							<span class="submit-loading"><i class="fa fa-refresh fa-spin"></i></span>

							<script>
								jQuery(document).on('click','.submit-resume-button .input-submit', function() {

									$thisItem = jQuery(this);
									$thisItem.parent().parent().parent().find('#postStatus').val('published');
									
								});
							</script>

						</span>

					</div>

					<input type="hidden" id="postStatus" name="postStatus" value="">

				</form>

				<script type="text/javascript">

				jQuery(function($) {
					jQuery('#wpjobus-add-resume').validate({
						rules: {
						    fullName: {
						        required: true,
						        minlength: 3
						    },
						    wpjobus_resume_email: {
						        required: true,
						        email: true
						    }
						},
						messages: {
							fullName: {
							    required: "<?php _e( 'Please provide your full name', 'themesdojo' ); ?>",
							    minlength: "<?php _e( 'Your name must be at least 3 characters long', 'themesdojo' ); ?>"
							},
							wpjobus_resume_email: {
							    required: "<?php _e( 'Please provide an email address', 'themesdojo' ); ?>",
							    email: "<?php _e( 'Please enter a valid email address', 'themesdojo' ); ?>"
							}
						},
						submitHandler: function(form) {
							tinyMCE.triggerSave();
						    jQuery('#wpjobus-add-resume .input-submit').css('display','none');
						    jQuery('#wpjobus-add-resume .submit-loading').css('display','block');
						    jQuery(form).ajaxSubmit({
						        type: "POST",
								data: jQuery(form).serialize(),
								url: '<?php echo admin_url('admin-ajax.php'); ?>', 
						        success: function(data) {
						            if(data != 0) {
						        		jQuery('#wpjobus-add-resume .submit-loading').css('display','none');
						        		jQuery('#success').fadeIn();

						        		<?php $redirect_link = home_url('/')."my-account"; ?>

      									var delay = 5;
      									setTimeout(function(){ window.location = '<?php echo $redirect_link; ?>';}, delay);

						            } else {
						            	jQuery('#wpjobus-add-resume .input-submit').css('display','block');
							        	jQuery('#wpjobus-add-resume .submit-loading').css('display','none');

							            jQuery('#error').fadeIn();
						            }
						        },
						        error: function(data) {
						        	jQuery('#wpjobus-add-resume .input-submit').css('display','block');
						        	jQuery('#wpjobus-add-resume .submit-loading').css('display','none');

						            jQuery('#error').fadeIn();
						        }
						    });
						}
					});
				});
				</script>

				<?php } ?>

			</div>
			
		</div>

	</section>

<?php get_footer(); ?>