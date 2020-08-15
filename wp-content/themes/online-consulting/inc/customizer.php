<?php    
/**
 *Online Consulting Theme Customizer
 *
 * @package Online Consulting
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function online_consulting_customize_register( $wp_customize ) {	
	
	function online_consulting_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function online_consulting_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	} 
	
	function online_consulting_sanitize_phone_number( $phone ) {
		// sanitize phone
		return preg_replace( '/[^\d+]/', '', $phone );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'online_consulting_panel_section', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'online-consulting' ),		
	) );
	
	//Layout Options
	$wp_customize->add_section('online_consulting_layout_option',array(
		'title' => __('Site Layout Options','online-consulting'),			
		'priority' => 1,
		'panel' => 	'online_consulting_panel_section',          
	));		
	
	$wp_customize->add_setting('online_consulting_boxlayout',array(
		'sanitize_callback' => 'online_consulting_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'online_consulting_boxlayout', array(
    	'section'   => 'online_consulting_layout_option',    	 
		'label' => __('Check to Box Layout','online-consulting'),
		'description' => __('If you want to box layout please check the Box Layout Option.','online-consulting'),
    	'type'      => 'checkbox'
     )); //Layout Section 
	
	$wp_customize->add_setting('online_consulting_site_color_options',array(
		'default' => '#2684e5',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'online_consulting_site_color_options',array(
			'label' => __('Color Options','online-consulting'),			
			'description' => __('More color options in PRO Version','online-consulting'),
			'section' => 'colors',
			'settings' => 'online_consulting_site_color_options'
		))
	);
	
	$wp_customize->add_setting('online_consulting_site_hovercolor_options',array(
		'default' => '#1a50a9',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'online_consulting_site_hovercolor_options',array(
			'label' => __('Hover Color Options','online-consulting'),			
			'description' => __('More color options in PRO Version','online-consulting'),
			'section' => 'colors',
			'settings' => 'online_consulting_site_hovercolor_options'
		))
	);	
	
	 //Site Sticky Header
	$wp_customize->add_section('online_consulting_sticky_header_sec',array(
			'title'	=> __('Sticky Header','online-consulting'),			
			'priority' => null,
			'panel' => 	'online_consulting_panel_section',
	));		
	
	$wp_customize->add_setting('online_consulting_stickyheader',array(
			'default' => null,
			'sanitize_callback' => 'online_consulting_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'online_consulting_stickyheader', array(
    	   'section'   => 'online_consulting_sticky_header_sec',    	 
		   'label'	=> __('Check to show sticky header on scroll','online-consulting'),
    	   'type'      => 'checkbox'
     )); //end sticky header Section 		 
	
	
	//Site Header Contact info
	$wp_customize->add_section('online_consulting_site_hdr_contact_details',array(
		'title' => __('Header Contact info','online-consulting'),				
		'priority' => null,
		'panel' => 	'online_consulting_panel_section',
	));	
	
	$wp_customize->add_setting('online_consulting_site_hdr_office_hours',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('online_consulting_site_hdr_office_hours',array(	
		'type' => 'text',
		'label' => __('Add office time','online-consulting'),
		'section' => 'online_consulting_site_hdr_contact_details',
		'setting' => 'online_consulting_site_hdr_office_hours'
	));	
	
	$wp_customize->add_setting('online_consulting_site_hdr_teldetails',array(
		'default' => null,
		'sanitize_callback' => 'online_consulting_sanitize_phone_number'	
	));
	
	$wp_customize->add_control('online_consulting_site_hdr_teldetails',array(	
		'type' => 'text',
		'label' => __('Add phone number here','online-consulting'),
		'section' => 'online_consulting_site_hdr_contact_details',
		'setting' => 'online_consulting_site_hdr_teldetails'
	));	
	
	
	$wp_customize->add_setting('online_consulting_site_hdr_email_info',array(
		'sanitize_callback' => 'sanitize_email'
	));
	
	$wp_customize->add_control('online_consulting_site_hdr_email_info',array(
		'type' => 'text',
		'label' => __('Add email address here.','online-consulting'),
		'section' => 'online_consulting_site_hdr_contact_details'
	));	
	
	
	$wp_customize->add_setting('online_consulting_show_hdr_contact_details_area',array(
		'default' => false,
		'sanitize_callback' => 'online_consulting_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'online_consulting_show_hdr_contact_details_area', array(
	   'settings' => 'online_consulting_show_hdr_contact_details_area',
	   'section'   => 'online_consulting_site_hdr_contact_details',
	   'label'     => __('Check To show This Section','online-consulting'),
	   'type'      => 'checkbox'
	 ));//Show Header Contact Info
	
	
	
	// Header Slider Section		
	$wp_customize->add_section( 'online_consulting_homeslider_sections', array(
		'title' => __('Slider Section', 'online-consulting'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 730 pixel.','online-consulting'), 
		'panel' => 	'online_consulting_panel_section',           			
    ));
	
	$wp_customize->add_setting('online_consulting_home_slide_pagecol1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'online_consulting_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('online_consulting_home_slide_pagecol1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider first:','online-consulting'),
		'section' => 'online_consulting_homeslider_sections'
	));	
	
	$wp_customize->add_setting('online_consulting_home_slide_pagecol2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'online_consulting_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('online_consulting_home_slide_pagecol2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider second:','online-consulting'),
		'section' => 'online_consulting_homeslider_sections'
	));	
	
	$wp_customize->add_setting('online_consulting_home_slide_pagecol3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'online_consulting_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('online_consulting_home_slide_pagecol3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider third:','online-consulting'),
		'section' => 'online_consulting_homeslider_sections'
	));	// Slider Section Options	
	
	$wp_customize->add_setting('online_consulting_home_slide_buttontext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('online_consulting_home_slide_buttontext',array(	
		'type' => 'text',
		'label' => __('Add slider Read more button name here','online-consulting'),
		'section' => 'online_consulting_homeslider_sections',
		'setting' => 'online_consulting_home_slide_buttontext'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('online_consulting_show_home_slider_section',array(
		'default' => false,
		'sanitize_callback' => 'online_consulting_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'online_consulting_show_home_slider_section', array(
	    'settings' => 'online_consulting_show_home_slider_section',
	    'section'   => 'online_consulting_homeslider_sections',
	     'label'     => __('Check To Show This Section','online-consulting'),
	   'type'      => 'checkbox'
	 ));//Show Home Slider Section	
	 
	 
	 // Services Section
	$wp_customize->add_section('online_consulting_services_3col_area', array(
		'title' => __('Three Column Services','online-consulting'),
		'description' => __('Select pages from the dropdown for services section','online-consulting'),
		'priority' => null,
		'panel' => 	'online_consulting_panel_section',          
	));	
	
	$wp_customize->add_setting('online_consulting_3page_servicesbx1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'online_consulting_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'online_consulting_3page_servicesbx1',array(
		'type' => 'dropdown-pages',			
		'section' => 'online_consulting_services_3col_area',
	));		
	
	$wp_customize->add_setting('online_consulting_3page_servicesbx2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'online_consulting_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'online_consulting_3page_servicesbx2',array(
		'type' => 'dropdown-pages',			
		'section' => 'online_consulting_services_3col_area',
	));
	
	$wp_customize->add_setting('online_consulting_3page_servicesbx3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'online_consulting_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'online_consulting_3page_servicesbx3',array(
		'type' => 'dropdown-pages',			
		'section' => 'online_consulting_services_3col_area',
	));
	
	
	$wp_customize->add_setting('online_consulting_show_3column_services_sections',array(
		'default' => false,
		'sanitize_callback' => 'online_consulting_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'online_consulting_show_3column_services_sections', array(
	   'settings' => 'online_consulting_show_3column_services_sections',
	   'section'   => 'online_consulting_services_3col_area',
	   'label'     => __('Check To Show This Section','online-consulting'),
	   'type'      => 'checkbox'
	 ));//Show three column Services Sections	 
	 
	 
	 // Welcome Page Section 
	$wp_customize->add_section('online_consulting_site_welcomeinfo_sections', array(
		'title' => __('Welcome Section','online-consulting'),
		'description' => __('Select Pages from the dropdown for welcome section','online-consulting'),
		'priority' => null,
		'panel' => 	'online_consulting_panel_section',          
	));		
	
	$wp_customize->add_setting('online_consulting_sitewel_pgebox',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'online_consulting_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'online_consulting_sitewel_pgebox',array(
		'type' => 'dropdown-pages',			
		'section' => 'online_consulting_site_welcomeinfo_sections',
	));		
	
	$wp_customize->add_setting('online_consulting_show_site_welcomepageinfo_area',array(
		'default' => false,
		'sanitize_callback' => 'online_consulting_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'online_consulting_show_site_welcomepageinfo_area', array(
	    'settings' => 'online_consulting_show_site_welcomepageinfo_area',
	    'section'   => 'online_consulting_site_welcomeinfo_sections',
	    'label'     => __('Check To Show This Section','online-consulting'),
	    'type'      => 'checkbox'
	));//Show Welcome Section 
	 
	//Sidebar Settings
	$wp_customize->add_section('online_consulting_sidebar_options', array(
		'title' => __('Sidebar Options','online-consulting'),		
		'priority' => null,
		'panel' => 	'online_consulting_panel_section',          
	));	
	
	$wp_customize->add_setting('online_consulting_hidesidebar_from_homepage',array(
		'default' => false,
		'sanitize_callback' => 'online_consulting_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'online_consulting_hidesidebar_from_homepage', array(
	   'settings' => 'online_consulting_hidesidebar_from_homepage',
	   'section'   => 'online_consulting_sidebar_options',
	   'label'     => __('Check to hide sidebar from latest post page','online-consulting'),
	   'type'      => 'checkbox'
	 ));// Hide sidebar from latest post page
	 
	 
	 $wp_customize->add_setting('online_consulting_hidesidebar_singlepost',array(
		'default' => false,
		'sanitize_callback' => 'online_consulting_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'online_consulting_hidesidebar_singlepost', array(
	   'settings' => 'online_consulting_hidesidebar_singlepost',
	   'section'   => 'online_consulting_sidebar_options',
	   'label'     => __('Check to hide sidebar from single post','online-consulting'),
	   'type'      => 'checkbox'
	 ));// hide sidebar single post
	 
	 $wp_customize->add_setting('online_consulting_hidesidebar_pages',array(
		'default' => false,
		'sanitize_callback' => 'online_consulting_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'online_consulting_hidesidebar_pages', array(
	   'settings' => 'online_consulting_hidesidebar_pages',
	   'section'   => 'online_consulting_sidebar_options',
	   'label'     => __('Check to hide sidebar from all pages','online-consulting'),
	   'type'      => 'checkbox'
	 ));//hide sidebar from all pages
		 
}
add_action( 'customize_register', 'online_consulting_customize_register' );

function online_consulting_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .posts_default_style h2 a:hover,
        #sidebar ul li a:hover,						
        .posts_default_style h3 a:hover,       
		.hdr_social a:hover,       						
        .postmeta a:hover,
		.page_three_box:hover h3,
		#sidebar ul li::before,
		.page_three_box:hover h3 a,
        .button:hover,
		.blog_postmeta a:hover,
		.site-footer ul li a:hover, 
		.site-footer ul li.current_page_item a,
		.about_content_column h3 span       				
            { color:<?php echo esc_html( get_theme_mod('online_consulting_site_color_options','#2684e5')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,		
        .nivo-controlNav a.active,
		.navigation_bar,
		.site-navi ul li ul,				
        .learnmore,
		.nivo-caption .slide_morebtn:hover,
		a.blogreadmore,
		.about_content_column .btnstyle1,													
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,
		.page_three_box .page_img_box,	
		.blogpostmorebtn:hover,	
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('online_consulting_site_color_options','#2684e5')); ?>;}
			
		
		.tagcloud a:hover,
		.hdr_social a:hover,
		.about_content_column p,
		h3.widget-title::after,		
		blockquote	        
            { border-color:<?php echo esc_html( get_theme_mod('online_consulting_site_color_options','#2684e5')); ?>;}
			
	.site-navi ul li a:hover, 
	.site-navi ul li.current-menu-item a,
	.site-navi ul li.current-menu-parent a.parent,
	.site-navi ul li.current-menu-item ul.sub-menu li a:hover        
            { background-color:<?php echo esc_html( get_theme_mod('online_consulting_site_hovercolor_options','#1a50a9')); ?>;}		
			
	    								
		
         	
    </style> 
<?php                      
}
         
add_action('wp_head','online_consulting_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function online_consulting_customize_preview_js() {
	wp_enqueue_script( 'online_consulting_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '19062019', true );
}
add_action( 'customize_preview_init', 'online_consulting_customize_preview_js' );