<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
	
	$options = array();

	// Header Options Area
	$options[] = array(
		'name' => __( 'General', 'thbusiness' ),
		'type' => 'heading'
	);

	// Header Logo upload option
	$options[] = array(
		'name' 	=> __( 'Header Logo', 'thbusiness' ),
		'desc' 	=> __( 'Upload logo for your header.Most suitable dimensions are 293px wide and 87px height.', 'thbusiness' ),
		'id' 	=> 'thbusiness_site_logo_image',
		'type' 	=> 'upload'
	);

	// Header logo and text display type option
	$header_display_array = array(
		'logo_only' 	=> __( 'Header Logo Only', 'thbusiness' ),
		'text_only' 	=> __( 'Header Text Only', 'thbusiness' ),
		'none'		 	=> __( 'Disable', 'thbusiness' )
	);

	$options[] = array(
		'name' 		=> __( 'Show', 'thbusiness' ),
		'desc' 		=> __( 'Choose the option that you want.', 'thbusiness' ),
		'id' 		=> 'thbusiness_show_site_logo_text',
		'std' 		=> 'text_only',
		'type' 		=> 'radio',
		'options' 	=> $header_display_array 
	);

	// Favicon activate option
	$options[] = array(
		'name' 		=> __( 'Activate favicon', 'thbusiness' ),
		'desc' 		=> __( 'Check to activate favicon. Upload fav icon from below option', 'thbusiness' ),
		'id' 		=> 'thbusiness_activate_favicon',
		'std' 		=> '0',
		'type' 		=> 'checkbox'
	);

	// Favicon icon upload
	$options[] = array(
		'name' 	=> __( 'Upload favicon', 'thbusiness' ),
		'desc' 	=> __( 'Upload favicon for your site.', 'thbusiness' ),
		'id' 	=> 'thbusiness_favicon',
		'type' 	=> 'upload'
	);

	// Footer Links
	$options[] = array(
		'name'	=>	__( 'Left Footer Text', 'thbusiness' ),
		'desc'	=>	__( 'Text that displays in the left bottom footer of the website.(Copyright Container)', 'thbusiness' ),
		'id'	=>	'thbusiness_left_footer_text',
		'std'	=>	'',
		'type'	=>	'textarea'
	);

	// Top Bar Options Area
	$options[] = array(
		'name' => __( 'Top Bar', 'thbusiness' ),
		'type' => 'heading'
	);	
	
	// Activate Top Bar
	$options[] = array(
		'name' => __('Activate Topbar?', 'thbusiness'),
		'desc' => __('Check this checkbox to activate the topbar.', 'thbusiness'),
		'id' => 'thbusiness_topbar',
		'std' => '1',
		'type' => 'checkbox');	
		
	// Telephone Text
	$options[] = array(
		'name' => __( 'Telephone Text', 'thbusiness' ),
		'desc' => __( 'Enter your text here.eg: Call Us, Contact, Call Now', 'thbusiness' ),
		'id' => 'thbusiness_telephone_text',
		'std' => 'Call Us:',
		'type' => 'text');	

	// Telephone Number
	$options[] = array(
		'name' => __( 'Telephone Number', 'thbusiness' ),
		'desc' => __( 'Enter your telephone number here.', 'thbusiness' ),
		'id' => 'thbusiness_telephone_num',
		'std' => '+7.123.456.789',
		'type' => 'text');

	// Email Text
	$options[] = array(
		'name' => __( 'Email Text', 'thbusiness' ),
		'desc' => __( 'Enter your text here.eg: Email Us, Contact, Email Now', 'thbusiness' ),
		'id' => 'thbusiness_email_text',
		'std' => 'Email:',
		'type' => 'text');	

	// Email Address
	$options[] = array(
		'name' => __( 'Email Address', 'thbusiness' ),
		'desc' => __( 'Enter your email address here.', 'thbusiness' ),
		'id' => 'thbusiness_email_add',
		'std' => 'hello@thbusiness.com',
		'type' => 'text');		

	$options[] = array(
		'name' => __('Add your custom text here', 'thbusiness'),
		'desc' => __( 'You can add a custom text here.', 'thbusiness' ),
		'id' => 'thbusiness_topbar_textarea',
		'std' => '',
		'type' => 'textarea' );

	$options[] = array(
		'name' => __('Check this to show the social icons area.', 'thbusiness'),
		'desc' => __('Check this checkbox to show the social media icons.', 'thbusiness'),
		'id' => 'thbusiness_social_area',
		'std' => '1',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Follow us text', 'thbusiness'),
		'desc' => __('Enter your text. eg: Follow Us', 'thbusiness'),
		'id' => 'thbusiness_social_text',
		'std' => 'Follow Us',
		'type' => 'text');

	$options[] = array(
		'name' => __('Facebook Address', 'thbusiness'),
		'desc' => __('Enter your facebook url', 'thbusiness'),
		'id' => 'facebook',
		'std' => 'http://www.facebook.com/themezhut',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Twitter Address', 'thbusiness'),
		'desc' => __('Enter your twitter url', 'thbusiness'),
		'id' => 'twitter',
		'std' => 'http://www.twitter.com/ThemezHut',
		'type' => 'text');

	$options[] = array(
		'name' => __('Google Plus Address', 'thbusiness'),
		'desc' => __('Enter your google plus url', 'thbusiness'),
		'id' => 'googleplus',
		'std' => 'http://www.google.com/+Themezhutthemes',
		'type' => 'text');

	$options[] = array(
		'name' => __('LinkedIn Address', 'thbusiness'),
		'desc' => __('Enter your linkedin url', 'thbusiness'),
		'id' => 'linkedin',
		'std' => 'http://www.linkedin.com',
		'type' => 'text');

	$options[] = array(
		'name' => __('Youtube Address', 'thbusiness'),
		'desc' => __('Enter your youtube url', 'thbusiness'),
		'id' => 'youtube',
		'std' => 'http://www.youtube.com',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Dribbble Address', 'thbusiness'),
		'desc' => __('Enter your dribbble url', 'thbusiness'),
		'id' => 'dribbble',
		'std' => 'https://dribbble.com/',
		'type' => 'text');

	$options[] = array(
		'name' => __('Github Address', 'thbusiness'),
		'desc' => __('Enter your github url', 'thbusiness'),
		'id' => 'github',
		'std' => 'http://www.github.com',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Flickr Address', 'thbusiness'),
		'desc' => __('Enter your flickr url', 'thbusiness'),
		'id' => 'flickr',
		'std' => 'http://www.flickr.com',
		'type' => 'text');
		
	// Slider Section.
	$options[] = array(
	'name' => __( 'Slider', 'thbusiness' ),
	'type' => 'heading'
	);

	// Slider activate option
	$options[] = array(
		'name' 		=> __( 'Activate slider', 'thbusiness' ),
		'desc' 		=> __( 'Check to activate slider.', 'thbusiness' ),
		'id' 		=> 'thbusiness_activate_slider',
		'std' 		=> '0',
		'type' 		=> 'checkbox'
	);

	// Slide options
	for( $i=1; $i<=5; $i++) {
		$options[] = array(
			'name' 	=>	sprintf( __( 'Image Upload #%1$s', 'thbusiness' ), $i ),
			'desc' 	=> __( 'Upload slider image.', 'thbusiness' ),
			'id' 	=> 'thbusiness_slider_image'.$i,
			'type' 	=> 'upload'
		);
		$options[] = array(
			'name' 	=> sprintf( __( 'Slider Title %1$s', 'thbusiness' ), $i ),
			'desc' 	=> __( 'Enter title for your slider.', 'thbusiness' ),
			'id' 	=> 'thbusiness_slider_title'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
		$options[] = array(
			'name' 	=> sprintf( __( 'Slider Description %1$s', 'thbusiness' ), $i ),
			'desc' 	=> __( 'Enter your slider description.', 'thbusiness' ),
			'id' 	=> 'thbusiness_slider_text'.$i,
			'std' 	=> '',
			'type' 	=> 'textarea'
		);
		$options[] = array(
			'name' 	=> sprintf( __( 'Slider redirect link %1$s', 'thbusiness' ), $i ),
			'desc' 	=> __( 'Enter link to redirect when clicked the button.', 'thbusiness' ),
			'id' 	=> 'thbusiness_slider_link'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);	
		$options[] = array(
			'name' 	=> sprintf( __( 'Slider redirect link button text %1$s', 'thbusiness' ), $i ),
			'desc' 	=> __( 'Enter text for button.', 'thbusiness' ),
			'id' 	=> 'thbusiness_slider_link_text'.$i,
			'std' 	=> 'Read More',
			'type' 	=> 'text'
		);	
	}
	
	// Custom Scripts
	$options[] = array(
		'name' => __( 'Custom CSS', 'thbusiness' ),
		'type' => 'heading'
	);
	
	$options[] = array(
		'name'	=>	__( 'Add Your Custom CSS Here', 'thbusiness' ),
		'desc'	=>	__( 'You can add your custom styles here.', 'thbusiness' ),
		'id'	=>	'thbusiness_customcss',
		'std'	=>	'',
		'type'	=>	'textarea'
	);	
	

return $options;
}

add_action('optionsframework_after','thbusiness_options_after', 100);

function thbusiness_options_after() { ?>

	<div class="th-options-panel-details-box">
		<h3> THBusiness Theme </h3>
		<div class="option-panel-btn"><a class="option-btn-details" target="_blank" href="<?php echo esc_url( 'http://www.themezhut.com/themes/thbusiness' ); ?>"><?php esc_attr_e( 'Theme Details' , 'thbusiness' ); ?></a></div>
		<div class="option-panel-btn"><a class="option-btn-demo" target="_blank" href="<?php echo esc_url( 'http://www.themezhut.com/demo/thbusiness' ); ?>"><?php esc_attr_e( 'Theme Demo' , 'thbusiness' ); ?></a></div>	
		<div class="option-panel-btn"><a class="option-btn-documentation" target="_blank" href="<?php echo esc_url( 'http://www.themezhut.com/thbusiness-theme-documentation' ); ?>"><?php esc_attr_e( 'Theme Setup Guide' , 'thbusiness' ); ?></a></div>
	</div>

<?php }