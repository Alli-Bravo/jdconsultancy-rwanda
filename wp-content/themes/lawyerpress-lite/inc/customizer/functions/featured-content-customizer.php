<?php
/**
 * Theme Customizer Functions
 *
 * @package lawyerpress-lite
 * @since lawyerpress lite 1.0
 */
/******************** lawyerpress lite SLIDER SETTINGS ******************************************/
$lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();

$wp_customize->add_section( 'lawyerpress_lite_page_post_options', array(
	'title' => __('Slider Option','lawyerpress-lite'),
	'priority' => 1,
	'panel' =>'layout_pro_options_panel'
));
for ( $i=1; $i <= $lawyerpress_lite_settings['lawyerpress_lite_slider_no'] ; $i++ ) {
	$wp_customize->add_setting('lawyerpress_lite_theme_options[lawyerpress_lite_featured_page_slider_'. $i .']', array(
		'default' =>'',
		'sanitize_callback' =>'lawyerpress_lite_sanitize_page',
		'type' => 'option',
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( 'lawyerpress_lite_theme_options[lawyerpress_lite_featured_page_slider_'. $i .']', array(
		'priority' => 220 . $i,
		'label' => __(' Page Slider', 'lawyerpress-lite') . ' ' . $i ,
		'section' => 'lawyerpress_lite_page_post_options',
		'type' => 'dropdown-pages',
	));
}



     /******************************/
        /***** For lawyerpress lite call to action *****/
        /******************************/

        $wp_customize->add_section('lawyerpress_lite_callout_section', array(
            'title' => __('Call Out Options', 'lawyerpress-lite'),
            'panel' => 'layout_pro_options_panel',
            'priority' => 3,
        ));

        $wp_customize->add_setting('lawyerpress_lite_theme_options[lawyerpress_lite_callout_section_pages_title]', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_html',
            'default' => $lawyerpress_lite_settings['lawyerpress_lite_callout_section_pages_title'],
             'type' => 'option',

        ));

        $wp_customize->add_control('lawyerpress_lite_theme_options[lawyerpress_lite_callout_section_pages_title]', array(
            'label' => __('Callout Title', 'lawyerpress-lite'),
            'section' => 'lawyerpress_lite_callout_section',
            'type' => 'text',
            'priority' => 2,
        ));
        $wp_customize->add_setting('lawyerpress_lite_theme_options[lawyerpress_lite_callout_section_pages_description]', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_html',
            'default' => $lawyerpress_lite_settings['lawyerpress_lite_callout_section_pages_description'],
             'type' => 'option',

        ));

        $wp_customize->add_control('lawyerpress_lite_theme_options[lawyerpress_lite_callout_section_pages_description]', array(
            'label' => __('Callout Description', 'lawyerpress-lite'),
            'section' => 'lawyerpress_lite_callout_section',
            'type' => 'text',
            'priority' => 3,
        ));

        $wp_customize->add_setting('lawyerpress_lite_theme_options[lawyerpress_lite_callout_section_pages_selection]', array(
           'default' => $lawyerpress_lite_settings['lawyerpress_lite_callout_section_pages_selection'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'lawyerpress_lite_text_sanitize',
             'type' => 'option',
        ));
        $wp_customize->add_control(new Lawyerpress_Lite_Page_Dropdown_control($wp_customize, 'lawyerpress_lite_theme_options[lawyerpress_lite_callout_section_pages_selection]', array(
            'label' => __('Select 3 Pages To Show Below Slider', 'lawyerpress-lite'),
            'description' => __('Select a category to display post below the slider', 'lawyerpress-lite'),
            'section' => 'lawyerpress_lite_callout_section',
            'priority' => 4,

        )));


 /******************************/
        /***** For lawyerpress lite about us option *****/
        /******************************/

        $wp_customize->add_section('lawyerpress_lite_aboutus_section', array(
            'title' => __('About Us Options', 'lawyerpress-lite'),
            'panel' => 'layout_pro_options_panel',
            'priority' => 2,
        ));

       
          $wp_customize->add_setting(
            'lawyerpress_lite_theme_options[lawyerpress_lite_aboutus_page]',
            array(
                'default' => $lawyerpress_lite_settings['lawyerpress_lite_aboutus_page'],
                'type' => 'option',
                'sanitize_callback' => 'absint',
                'capability' => 'edit_theme_options'
            )
                );
        $wp_customize->add_control('lawyerpress_lite_theme_options[lawyerpress_lite_aboutus_page]', array(
            'label' => esc_html__('Choose About Us Page :', 'lawyerpress-lite'),
            'type' => 'dropdown-pages',
            'section' => 'lawyerpress_lite_aboutus_section',
            
        ));
       
