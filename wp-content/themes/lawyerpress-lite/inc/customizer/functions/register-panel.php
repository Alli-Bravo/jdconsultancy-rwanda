<?php
/**
 * Theme Customizer Functions
 *
 * @package lawyerpress-lite
 * @since lawyerpress lite 1.0
 */
/******************** lawyerpress lite CUSTOMIZE REGISTER *********************************************/
add_action( 'customize_register', 'lawyerpress_lite_customize_register_options', 20 );
function lawyerpress_lite_customize_register_options( $wp_customize ) {
	$wp_customize->add_panel( 'layout_pro_options_panel', array(
		'priority' => 2,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options', 'lawyerpress-lite' ),
		'description' => '',
	) );
}
function layout_pro_register_theme_panel($wp_customize)
{
    $wp_customize->add_panel( 'layout_pro_options_panel', array(
        'priority' => 2,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' =>  esc_html__( 'Theme\'s Theme Options', 'lawyerpress-lite' ),
        'description' => '',
    ) );
}
add_action('customize_register','layout_pro_register_theme_panel');

add_action( 'customize_register', 'lawyerpress_lite_customize_register_featuredcontent' );
function lawyerpress_lite_customize_register_featuredcontent( $wp_customize ) {
	$wp_customize->add_panel( 'lawyerpress_lite_featuredcontent_panel', array(
		'priority' => 31,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Slider Options', 'lawyerpress-lite' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'lawyerpress_lite_customize_register_widgets' );
function lawyerpress_lite_customize_register_widgets( $wp_customize ) {
	$wp_customize->add_panel( 'widgets_register', array(
		'priority' => 33,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Widgets', 'lawyerpress-lite' ),
		'description' => '',
	) );
}

?>