<?php
/**
 * Theme Customizer Functions
 *
 * @package lawyerpress-lite
 * @since lawyerpress lite 1.0
 */
$lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
/******************** lawyerpress lite LAYOUT OPTIONS ******************************************/

    $wp_customize->add_setting( 'lawyerpress_lite_theme_options[lawyerpress_lite_sidebar_status]', array(
        'default' => $lawyerpress_lite_settings['lawyerpress_lite_sidebar_status'],
        'sanitize_callback' => 'lawyerpress_lite_sanitize_select',
        'type' => 'option',
    ));
    $wp_customize->add_control( 'lawyerpress_lite_theme_options[lawyerpress_lite_sidebar_status]', array(
        'priority'=>45,
        'label' => __('Show / Hide Sidebar', 'lawyerpress-lite'),
        'section' => 'lawyerpress_lite_custom_header',
        'type'	=> 'select',
        'choices' => array(
            'show-sidebar' => __('Show Sidebar','lawyerpress-lite'),
            'hide-sidebar' => __('Hide Sidebar','lawyerpress-lite'),
        ),
    ));

	$wp_customize->add_setting( 'lawyerpress_lite_theme_options[lawyerpress_lite_entry_meta_blog]', array(
		'default' => $lawyerpress_lite_settings['lawyerpress_lite_entry_meta_blog'],
		'sanitize_callback' => 'lawyerpress_lite_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control( 'lawyerpress_lite_theme_options[lawyerpress_lite_entry_meta_blog]', array(
		'priority'=>45,
		'label' => __('Meta for blog page', 'lawyerpress-lite'),
		'section' => 'lawyerpress_lite_custom_header',
		'type'	=> 'select',
		'choices' => array(
		'show-meta' => __('Show Meta','lawyerpress-lite'),
		'hide-meta' => __('Hide Meta','lawyerpress-lite'),
	),
	));
	$wp_customize->add_setting('lawyerpress_lite_theme_options[lawyerpress_lite_design_layout]', array(
		'default'        => $lawyerpress_lite_settings['lawyerpress_lite_design_layout'],
		'sanitize_callback' => 'lawyerpress_lite_sanitize_select',
		'type'                  => 'option',
	));
	$wp_customize->add_control('lawyerpress_lite_theme_options[lawyerpress_lite_design_layout]', array(
	'priority'  =>50,
	'label'      => __('Design Layout', 'lawyerpress-lite'),
	'section'    => 'lawyerpress_lite_custom_header',
	'type'       => 'select',
	'checked'   => 'checked',
	'choices'    => array(
		'wide-layout' => __('Full Width Layout','lawyerpress-lite'),
		'boxed-layout' => __('Boxed Layout','lawyerpress-lite'),
	),
));
?>