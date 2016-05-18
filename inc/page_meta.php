<?php

add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
	add_meta_box( 'page_metabox', 'Page Meta', 'wpcrown_page_metabox', 'page', 'normal', 'high' );
}

function wpcrown_page_metabox( $post )
{
	$values = get_post_custom( $post->ID );
	$layerslider_shortcode = isset( $values['layerslider_shortcode'] ) ? esc_attr( $values['layerslider_shortcode'][0] ) : '';
	$parallax_image_url = isset( $values['parallax_image_url'] ) ? esc_attr( $values['parallax_image_url'][0] ) : '';

	$check = isset( $values['page_title_state'] ) ? esc_attr( $values['page_title_state'][0] ) : '';

	$selected = isset( $values['page_slider'] ) ? esc_attr( $values['page_slider'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	
	<div style="padding:20px 0;">

		<span style="font-size: 16px; font-family: 'Armata','Helvetica Neue',Arial,Helvetica,Geneva,sans-serif; font-weight: lighter;">Page Title</span><br/>
			
		<div style="margin-top: 20px; margin-bottom: 20px; float: left; width: 100%; border-top: solid 1px #d7d7d7;"></div>


		<div style="float: left; margin-bottom: 40px; width: 100%;">
		
			<label style="float: left; width: 160px;" for="page_title_state"><strong>Hide title</strong></label>
			
			<div style="margin-left: 30px; float: left;">

				<input type="checkbox" name="page_title_state" id="page_title_state" <?php checked( $check, 'on' ); ?> />
				<span style="font-style: italic; float: left; margin-top: 5px;">Hide the page title.</span>
				
			</div>
			
		</div>


		
		<div id="pageSliderOption">

			<span style="font-size: 16px; font-family: 'Armata','Helvetica Neue',Arial,Helvetica,Geneva,sans-serif; font-weight: lighter;">Page Header</span><br/>
			
			<div style="margin-top: 20px; margin-bottom: 20px; float: left; width: 100%; border-top: solid 1px #d7d7d7;"></div>
			
			<div style="float: left; margin-bottom: 40px; width: 100%;">
			
				<label style="float: left; width: 160px;" for="page_slider"><strong>Page header</strong></label>
				
				<div style="margin-left: 30px; float: left;">
					<select name="page_slider" id="page_slider" style="width: 260px; float: left;">
						<option value="none" <?php selected( $selected, 'none' ); ?>>none</option>
						<option value="Search with map" <?php selected( $selected, 'Search with map' ); ?>>Search widget with map</option>
						<option value="Search with parallax" <?php selected( $selected, 'Search with parallax' ); ?>>Search widget with parallax image</option>
						<option value="LayerSlider" <?php selected( $selected, 'LayerSlider' ); ?>>LayerSlider</option>
					</select>
					<span style="font-style: italic; float: left; margin-top: 5px; width: 100%;">Select page header.</span>
				</div>
				
			</div>

			<div id="parallaximageurl" style="display: none; float: left; margin-bottom: 40px; width: 100%;">
			
				<label style="float: left; width: 160px;" for="parallax_image_url"><strong>Background Image</strong></label>
				
				<div style="margin-left: 30px; float: left;">

					<!-- Outputs the image after save -->
	                <img id="your_image_url_img" src="<?php echo $parallax_image_url; ?>" style="width:150px;"><br />
	                <!-- Outputs the text field and displays the URL of the image retrieved by the media uploader -->
	                <input type="text" name="parallax_image_url" id="parallax_image_url" value="<?php echo $parallax_image_url; ?>" class="regular-text" />
	                <!-- Outputs the save button -->
	                <input type='button' class="additional-user-image button-primary" value="<?php _e( 'Upload Image', 'themesdojo' ); ?>" id="uploadimage"/><br />
	                <span class="description"><?php _e( 'Upload image for background.', 'themesdojo' ); ?></span>

				</div>
				
			</div>
			
			<div id="layerslidershortcode" style="display: none; float: left; margin-bottom: 40px; width: 100%;">
			
				<label style="float: left; width: 160px;" for="layerslider_shortcode"><strong>LayeSlider Shortcode</strong></label>
				
				<div style="margin-left: 30px; float: left;">
					<input style="width: 260px; float: left" type="text" name="layerslider_shortcode" id="layerslider_shortcode" value="<?php echo $layerslider_shortcode; ?>" />
					<span style="font-style: italic; float: left; margin-top: 5px; width: 100%;">Enter layerslider shortcode (leave empty for "[layerslider id="1"]").</span>
				</div>
				
			</div>

		</div>

		<script>
		jQuery(document).ready(function(){ 

			var val2 = jQuery("#page_slider").val();

			if( val2 === "LayerSlider" ) {
			    jQuery("#layerslidershortcode").css({"display":"block"});
			} else {
			    jQuery("#layerslidershortcode").css({"display":"none"});
			}
			
			jQuery("#page_slider").change(function() {
			    var val2 = jQuery(this).val();
			    if( val2 === "LayerSlider" ) {
			        jQuery("#layerslidershortcode").css({"display":"block"});
			    } else {
			        jQuery("#layerslidershortcode").css({"display":"none"});
			    }
			});

			if( val2 === "Search with parallax" ) {
			    jQuery("#parallaximageurl").css({"display":"block"});
			} else {
			    jQuery("#parallaximageurl").css({"display":"none"});
			}
			
			jQuery("#page_slider").change(function() {
			    var val2 = jQuery(this).val();
			    if( val2 === "Search with parallax" ) {
			        jQuery("#parallaximageurl").css({"display":"block"});
			    } else {
			        jQuery("#parallaximageurl").css({"display":"none"});
			    }
			});

			// User avatar
			var file_frame;
		 
		  	jQuery('.additional-user-image').on('click', function( event ){
		 
			    event.preventDefault();
			 
			    // If the media frame already exists, reopen it.
			    if ( file_frame ) {
			      	file_frame.open();
			      	return;
			    }
			 
			    // Create the media frame.
			    file_frame = wp.media.frames.file_frame = wp.media({
			      	title: jQuery( this ).data( 'uploader_title' ),
			      	button: {
			        	text: jQuery( this ).data( 'uploader_button_text' ),
			      	},
			      	multiple: false  // Set to true to allow multiple files to be selected
			    });
			 
			    // When an image is selected, run a callback.
			    file_frame.on( 'select', function() {
			      	// We set multiple to false so only get one image from the uploader
			      	attachment = file_frame.state().get('selection').first().toJSON();
			 
			      	// Do something with attachment.id and/or attachment.url here
			      	var url = '';
		            url = attachment['url'];
		            jQuery('#parallax_image_url').val(url);
		            jQuery( "img#your_image_url_img" ).attr({
		                src: url
		            });
			    });
			 
			    // Finally, open the modal
			    file_frame.open();

		  	});

		});
		</script>



		
		<?php 
		//Begin shortcode array
			$shortcodes = array(

				'wpjobus_stats' => array(
					'attr' => array(
						'title' => 'text',
						'subtitle' => 'text',
						'button_text' => 'text',
						'button_url' => 'text',
					),
					'desc' => array(
						'title' => 'Enter the title',
						'subtitle' => 'Enter the subtitle',
						'button_text' => 'Enter button text',
						'button_url' => 'Enter button url',
					)
				),

				'register_accounts' => array(
					'attr' => array(
						'employer_title' => 'text',
						'employer_desc' => 'text',
						'candidate_title' => 'text',
						'candidate_desc' => 'text',
					),
					'desc' => array(
						'employer_title' => 'Enter employer account title',
						'employer_desc' => 'Enter employer account description',
						'candidate_title' => 'Enter candidate account title',
						'candidate_desc' => 'Enter candidate account description',
					)
				),

				'recent_news' => array(
					'attr' => array(
						'title' => 'text',
						'subtitle' => 'text',
						'button_text' => 'text',
						'button_url' => 'text',
					),
					'desc' => array(
						'title' => 'Enter the title',
						'subtitle' => 'Enter the subtitle',
						'button_text' => 'Enter button text',
						'button_url' => 'Enter button url',
					)
				),

				'entry_title' => array(
					'attr' => array(
						'title' => 'text',
						'subtitle' => 'text',
					),
					'desc' => array(
						'title' => 'Enter your title here',
						'subtitle' => 'Enter your subtitle here',
					)
				),

				'normal_button' => array(
					'attr' => array(
						'type' => 'select',
						'url' => 'text',
					),
					'desc' => array(
						'type' => 'List type',
						'url' => 'Enter button link here',
					),
					'options' => array(
						'blue-navy' => 'blue-navy',
						'green' => 'green',
						'orange' => 'orange',
						'gray' => 'gray',
						'rose' => 'rose',
						'purple' => 'purple',
						'pink' => 'pink',
						'brown' => 'brown',
						'yellow' => 'yellow',
						'red' => 'red',
						'light-gray' => 'light-gray',
						'dark-blue' => 'dark-blue',
						'black' => 'black',
					),
					'content' => TRUE,
					'content_text' => 'Enter button text',
				),

				'large_button' => array(
					'attr' => array(
						'type' => 'select',
						'url' => 'text',
					),
					'desc' => array(
						'type' => 'List type',
						'url' => 'Enter button link here',
					),
					'options' => array(
						'blue-navy' => 'blue-navy',
						'green' => 'green',
						'orange' => 'orange',
						'gray' => 'gray',
						'rose' => 'rose',
						'purple' => 'purple',
						'pink' => 'pink',
						'brown' => 'brown',
						'yellow' => 'yellow',
						'red' => 'red',
						'light-gray' => 'light-gray',
						'dark-blue' => 'dark-blue',
						'black' => 'black',
					),
					'content' => TRUE,
					'content_text' => 'Enter button text',
				),

				'big_button' => array(
					'attr' => array(
						'type' => 'select',
						'url' => 'text',
					),
					'desc' => array(
						'type' => 'List type',
						'url' => 'Enter button link here',
					),
					'options' => array(
						'blue-navy' => 'blue-navy',
						'green' => 'green',
						'orange' => 'orange',
						'gray' => 'gray',
						'rose' => 'rose',
						'purple' => 'purple',
						'pink' => 'pink',
						'brown' => 'brown',
						'yellow' => 'yellow',
						'red' => 'red',
						'light-gray' => 'light-gray',
						'dark-blue' => 'dark-blue',
						'black' => 'black',
					),
					'content' => TRUE,
					'content_text' => 'Enter button text',
				),

				'testimonials' => array(
					'attr' => array(
						'title' => 'text',
						'subtitle' => 'text',
					),
					'desc' => array(
						'title' => 'Enter the title',
						'subtitle' => 'Enter the subtitle',
					)
				),

				'action_box' => array(
					'attr' => array(
						'title' => 'text',
						'action_btn_text' => 'text',
						'action_btn_link' => 'text',
						'color_btn_text' => 'text',
						'color_btn_link' => 'text',
						'color_btn_bg_color' => 'text',
					),
					'desc' => array(
						'title' => 'Enter the text here',
						'action_btn_text' => 'Enter the action button text here',
						'action_btn_link' => 'Enter the action button link here',
						'color_btn_text' => 'Enter the color button text here',
						'color_btn_link' => 'Enter the color button link here',
						'color_btn_bg_color' => 'Enter the color background color (#e25050)',
					)
				),
				
				'circle_navigation' => array(
					'attr' => array(
						'img_url' => 'text',
						'url' => 'text',
					),
					'desc' => array(
						'img_url' => 'Image URL',
						'url' => 'Enter button link here',
					),
					'content' => TRUE,
					'content_text' => 'Enter button text here (Short text)',
				),

				'dropcap' => array(
					'attr' => array(),
					'desc' => array(),
					'content' => TRUE,
				),
				
				'quote' => array(
					'attr' => array(),
					'desc' => array(),
					'content' => TRUE,
				),
				
				'toggle' => array(
					'attr' => array(
						'title' => 'text',
					),
					'desc' => array(
						'title' => 'Enter toggle title',
					),
					'content' => TRUE,
					'content_text' => 'Toggle content',
				),

				'faq_toggle' => array(
					'attr' => array(
						'title' => 'text',
					),
					'desc' => array(
						'title' => 'Enter faq question',
					),
					'content' => TRUE,
					'content_text' => 'FAQ answer',
				),

				'featured_companies' => array(
					'attr' => array(
						'title' => 'text',
						'subtitle' => 'text',
					),
					'desc' => array(
						'title' => 'Enter the title',
						'subtitle' => 'Enter the subtitle',
					)
				),
				
				'frame_left' => array(
					'attr' => array(
						'src' => 'text',
						'href' => 'text',
					),
					'desc' => array(
						'src' => 'Enter image URL',
						'href' => 'Enter hyperlink URL for image',
					),
					'content' => TRUE,
					'content_text' => 'Image Caption',
				),
				
				'frame_right' => array(
					'attr' => array(
						'src' => 'text',
						'href' => 'text',
					),
					'desc' => array(
						'src' => 'Enter image URL',
						'href' => 'Enter hyperlink URL for image',
					),
					'content' => TRUE,
					'content_text' => 'Image Caption',
				),
				
				'frame_center' => array(
					'attr' => array(
						'src' => 'text',
						'href' => 'text',
					),
					'desc' => array(
						'src' => 'Enter image URL',
						'href' => 'Enter hyperlink URL for image',
					),
					'content' => TRUE,
					'content_text' => 'Image Caption',
				),

				
				'notification_box' => array(
					'content' => TRUE,
				),
				
				'error_box' => array(
					'content' => TRUE,
				),
				
				'download_box' => array(
					'content' => TRUE,
				),
				
				'information_box' => array(
					'content' => TRUE,
				),
				
				'list' => array(
					'attr' => array(
						'type' => 'select',
					),
					'desc' => array(
						'type' => 'List type',
					),
					'options' => array(
						'arrow' => 'arrow',
						'black bullets' => 'black',
						'red bullets' => 'red',
						'blue bullets' => 'blue',
						'yellow bullets' => 'yellow',
						'green bullets' => 'green',
						'square' => 'square',
						'star' => 'star',
						'arrow_down' => 'arrow_down',
						'arrow_up' => 'arrow_up',
						'arrow_left' => 'arrow_left',
						'arrow_right' => 'arrow_right',
						'bookmark' => 'bookmark',
						'calendar' => 'calendar-list',
						'check' => 'check',
						'clock' => 'clock',
						'cross' => 'cross',
						'crosshair' => 'crosshair',
						'email' => 'email',
						'favorite' => 'favorite',
						'unfavorite' => 'unfavorite',
						'heart' => 'heart',
						'house' => 'house',
						'aminus' => 'minus',
						'plus' => 'plus',
						'musical' => 'musical',
						'speech' => 'speech',
						'vcard' => 'vcard',
						'tag' => 'tag',
					),
					'content' => TRUE,
					'content_text' => 'Enter list (ex: &lt;li&gt;your item&lt;/li&gt;;)',
				),
				
				'chart' => array(
					'attr' => array(
						'width' => 'text',
						'height' => 'text',
						'type' => 'select',
						'title' => 'text',
						'data' => 'text',
						'label' => 'text',
						'colors' => 'text',
					),
					'desc' => array(
						'width' => 'Enter chart width',
						'height' => 'Enter chart height',
						'type' => 'Select chart type',
						'title' => 'Enter chart title',
						'data' => 'Enter chart data (ex: 10,35,40,100)',
						'label' => 'Enter chart labels (ex: 2008|2009|2010|2011)',
						'colors' => 'Enter chart colors (ex: 00ffff,ff0000,666666,cccccc)',
					),
					'options' => array(
						'3dpie' => '3dpie',
						'pie' => 'pie',
						'line' => 'line',
					),
					'content' => FALSE,
				),
				
				'youtube' => array(
					'attr' => array(
						'width' => 'text',
						'height' => 'text',
						'video_id' => 'text',
					),
					'desc' => array(
						'width' => 'Video width in pixels',
						'height' => 'Video height in pixels',
						'video_id' => 'Youtube video ID something like Js9Z8UQAA4E',
					),
					'content' => FALSE,
				),
				
				'vimeo' => array(
					'attr' => array(
						'width' => 'text',
						'height' => 'text',
						'video_id' => 'text',
					),
					'desc' => array(
						'width' => 'Video width in pixels',
						'height' => 'Video height in pixels',
						'video_id' => 'Vimeo video ID something like 9380243',
					),
					'content' => FALSE,
				),
				
				'full' => array(
					'attr' => array(),
					'desc' => array(),
					'content' => TRUE,
				),
				
				'one_half_first' => array(
					'attr' => array(),
					'desc' => array(),
					'content' => TRUE,
				),
				
				'one_half' => array(
					'attr' => array(),
					'desc' => array(),
					'content' => TRUE,
				),
				
				
				'one_third_first' => array(
					'attr' => array(),
					'desc' => array(),
					'content' => TRUE,
				),
				
				'one_third' => array(
					'attr' => array(),
					'desc' => array(),
					'content' => TRUE,
				),
				
				
				'two_third_first' => array(
					'attr' => array(),
					'desc' => array(),
					'content' => TRUE,
				),
				
				'two_third' => array(
					'attr' => array(),
					'desc' => array(),
					'content' => TRUE,
				),
				
				
				'one_fourth_first' => array(
					'attr' => array(),
					'desc' => array(),
					'content' => TRUE,
				),
				
				'one_fourth' => array(
					'attr' => array(),
					'desc' => array(),
					'content' => TRUE,
				),

				'three_fourth_first' => array(
					'attr' => array(),
					'desc' => array(),
					'content' => TRUE,
				),
				
				'three_fourth' => array(
					'attr' => array(),
					'desc' => array(),
					'content' => TRUE,
				),
				
				'facebook' => array(
					'attr' => array(
						'url' => 'text',
					),
					'desc' => array(
						'url' => 'Enter your facebook link',
					)
				),

				'behance' => array(
					'attr' => array(
						'url' => 'text',
					),
					'desc' => array(
						'url' => 'Enter your behance link',
					)
				),

				'dribbble' => array(
					'attr' => array(
						'url' => 'text',
					),
					'desc' => array(
						'url' => 'Enter your dribbble link',
					)
				),

				'evernote' => array(
					'attr' => array(
						'url' => 'text',
					),
					'desc' => array(
						'url' => 'Enter your evernote link',
					)
				),

				'flickr' => array(
					'attr' => array(
						'url' => 'text',
					),
					'desc' => array(
						'url' => 'Enter your flickr link',
					)
				),

				'forrst' => array(
					'attr' => array(
						'url' => 'text',
					),
					'desc' => array(
						'url' => 'Enter your forrst link',
					)
				),

				'googleplus' => array(
					'attr' => array(
						'url' => 'text',
					),
					'desc' => array(
						'url' => 'Enter your googleplus link',
					)
				),

				'linkedin' => array(
					'attr' => array(
						'url' => 'text',
					),
					'desc' => array(
						'url' => 'Enter your linkedin link',
					)
				),

				'paypal' => array(
					'attr' => array(
						'url' => 'text',
					),
					'desc' => array(
						'url' => 'Enter your paypal link',
					)
				),

				'rss' => array(
					'attr' => array(
						'url' => 'text',
					),
					'desc' => array(
						'url' => 'Enter your rss link',
					)
				),

				'tumblr' => array(
					'attr' => array(
						'url' => 'text',
					),
					'desc' => array(
						'url' => 'Enter your tumblr link',
					)
				),

				'twitter' => array(
					'attr' => array(
						'url' => 'text',
					),
					'desc' => array(
						'url' => 'Enter your twitter link',
					)
				),

				'vimeo' => array(
					'attr' => array(
						'url' => 'text',
					),
					'desc' => array(
						'url' => 'Enter your vimeo link',
					)
				),

				'wordpress' => array(
					'attr' => array(
						'url' => 'text',
					),
					'desc' => array(
						'url' => 'Enter your wordpress link',
					)
				),

				'youtube' => array(
					'attr' => array(
						'url' => 'text',
					),
					'desc' => array(
						'url' => 'Enter your youtube link',
					)
				),
				
			);

		?>

		<script>
		jQuery(document).ready(function(){ 
			jQuery('#shortcode_select').change(function() {
				var target = jQuery(this).val();
				jQuery('.rm_section').css('display', 'none');
				jQuery('#div_'+target).css('display', '');
			});	
			
			jQuery('.code_area').click(function() { 
				document.getElementById(jQuery(this).attr('id')).focus();
				document.getElementById(jQuery(this).attr('id')).select();
			});
			
			jQuery('.button').click(function() { 
				var target = jQuery(this).attr('id');
				var gen_shortcode = '';
				gen_shortcode+= '['+target;
				
				if(jQuery('#'+target+'_attr_wrapper .attr').length > 0)
				{
					jQuery('#'+target+'_attr_wrapper .attr').each(function() {
						gen_shortcode+= ' '+jQuery(this).attr('name')+'="'+jQuery(this).val()+'"';
					});
				}
				
				gen_shortcode+= ']';
				
				if(jQuery('#'+target+'_content').length > 0)
				{
					gen_shortcode+= jQuery('#'+target+'_content').val()+'[/'+target+']';
					
					var repeat = jQuery('#'+target+'_content_repeat').val();
					for (count=1;count<=repeat;count=count+1)
					{
						if(count<repeat)
						{
							gen_shortcode+= '['+target+']';
							gen_shortcode+= jQuery('#'+target+'_content').val()+'[/'+target+']';
						}
						else
						{
							gen_shortcode+= '['+target+'_last]';
							gen_shortcode+= jQuery('#'+target+'_content').val()+'[/'+target+'_last]';
						}
					}
				}
				
				jQuery('#'+target+'_code').val(gen_shortcode);
			});
		});
		</script>
		
		<span style="font-size: 16px; font-family: 'Armata','Helvetica Neue',Arial,Helvetica,Geneva,sans-serif; font-weight: lighter;">Shortcode Generator</span><br/>
		
		<div style="margin-top: 20px; margin-bottom: 20px; float: left; width: 100%; border-top: solid 1px #d7d7d7;"></div>
		
		<div style="float: left; margin-bottom: 40px; width: 100%;">
		
			
		
			
		
		
		<?php
			if(!empty($shortcodes))
			{
		?>
				
				<label style="float: left; width: 160px;" for="page_slider"><strong>Select Shortcode</strong></label>
				
				<div style="margin-left: 30px; float: left;">
				
					<select id="shortcode_select" style="width: 260px; float: left;">
						<option value="">---Select---</option>
				
		<?php
				foreach($shortcodes as $shortcode_name => $shortcode)
				{
		?>
		
				<option value="<?php echo $shortcode_name; ?>"><?php echo $shortcode_name; ?></option>
		
		<?php
				}
		?>
					</select>
					<span style="font-style: italic; float: left; margin-top: 5px; width: 100%;">Select shortcode.</span>
				
				</div>
				
				<div style="margin-top: 20px; margin-bottom: 20px; float: left; width: 100%; border-top: solid 1px #d7d7d7;"></div>
		<?php
			}
		?>
		
		<br/><br/>
		
		<?php
			if(!empty($shortcodes))
			{
				foreach($shortcodes as $shortcode_name => $shortcode)
				{
		?>
		
				<div id="div_<?php echo $shortcode_name; ?>" class="rm_section" style="display:none">
					<div class="rm_title">
						<h3><?php echo ucfirst($shortcode_name); ?></h3>
						<div class="clearfix"></div>
					</div>
					
					<div class="rm_text" style="padding: 10px 0 20px 0">
					
					<!-- img src="<?php echo $plugin_url.'/'.$shortcode_name.'.png'; ?>" alt=""/><br/><br/><br/ -->
					
					<?php
						if(isset($shortcode['content']) && $shortcode['content'])
						{
							if(isset($shortcode['content_text']))
							{
								$content_text = $shortcode['content_text'];
							}
							else
							{
								$content_text = 'Your Content';
							}
					?>
					
					<strong><?php echo $content_text; ?>:</strong><br/>
					<input type="hidden" id="<?php echo $shortcode_name; ?>_content_repeat" value="<?php echo $shortcode['repeat']; ?>"/>
					<textarea id="<?php echo $shortcode_name; ?>_content" style="width:100%;height:70px" rows="3" wrap="off"></textarea><br/><br/>
					
					<?php
						}
					?>
				
					<?php
						if(isset($shortcode['attr']) && !empty($shortcode['attr']))
						{
					?>
							
							<div id="<?php echo $shortcode_name; ?>_attr_wrapper">
							
					<?php
							foreach($shortcode['attr'] as $attr => $type)
							{
					?>
					
								<?php echo '<strong>'.ucfirst($attr).'</strong>: '.$shortcode['desc'][$attr]; ?><br/><br/>
								
								<?php
									switch($type)
									{
										case 'text':
								?>
								
										<input type="text" id="<?php echo $shortcode_name; ?>_text" style="width:100%" class="attr" name="<?php echo $attr; ?>"/>
								
								<?php
										break;
										
										case 'select':
								?>
								
										<select id="<?php echo $shortcode_name; ?>_select" style="width:25%" class="attr" name="<?php echo $attr; ?>">
										
											<?php
												if(isset($shortcode['options']) && !empty($shortcode['options']))
												{
													foreach($shortcode['options'] as $select_key => $option)
													{
											?>
											
														<option value="<?php echo $select_key; ?>"><?php echo $option; ?></option>
											
											<?php	
													}
												}
											?>							
										
										</select>
								
								<?php
										break;
									}
								?>
								
								<br/><br/>
					
					<?php
							} //end attr foreach
					?>
					
							</div>
					
					<?php
						}
					?>
					<br/>
					
					<input type="button" id="<?php echo $shortcode_name; ?>" value="Generate Shortcode" class="button"/>
					
					<br/><br/><br/>
					
					<strong>Shortcode:</strong><br/>
					<textarea id="<?php echo $shortcode_name; ?>_code" style="width:90%;height:70px" rows="3" readonly="readonly" class="code_area" wrap="off"></textarea>
					
					</div>
					
				</div>
		
		<?php
				} //end shortcode foreach
			}
		?>
		
		</div>
		
		
		<span style="visibility: hidden;"><p>Page meta end</p></span>
	
	</div>
	
	<?php	
}


add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $td_post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
	
	// now we can actually save the data
	$td_allowed = array( 
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);
	
	// Probably a good idea to make sure your data is set
	if( isset( $_POST['layerslider_shortcode'] ) )
		update_post_meta( $td_post_id, 'layerslider_shortcode', wp_kses( $_POST['layerslider_shortcode'], $td_allowed ) );

	if( isset( $_POST['parallax_image_url'] ) )
		update_post_meta( $td_post_id, 'parallax_image_url', wp_kses( $_POST['parallax_image_url'], $td_allowed ) );
		
	if( isset( $_POST['page_slider'] ) )
		update_post_meta( $td_post_id, 'page_slider', esc_attr( $_POST['page_slider'] ) );

	// This is purely my personal preference for saving checkboxes
	$chk = ( isset( $_POST['page_title_state'] ) && $_POST['page_title_state'] ) ? 'on' : 'off';
	update_post_meta( $td_post_id, 'page_title_state', $chk );
		
}
?>
