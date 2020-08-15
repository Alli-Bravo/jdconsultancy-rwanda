<?php
/**
 *
 * @package lawyerpress-lite
 * @since lawyerpress lite 1.0
 */
/**************** lawyerpress lite REGISTER WIDGETS ***************************************/
if (! function_exists('lawyerpress_lite_widgets_initi')) {
	add_action('widgets_init', 'lawyerpress_lite_widgets_initi');
	function lawyerpress_lite_widgets_initi() {

		register_sidebar(array(
				'name' => __('Right Sidebar', 'lawyerpress-lite'),
				'id' => 'lawyerpress_lite_main_sidebar',
				'description' => __('Shows widgets at Main Sidebar.', 'lawyerpress-lite'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h2 class="widget-title">',
				'after_title' => '</h2>',
			)); 

		
	}
}
 if (!in_array('layout-pro/layout-pro.php', apply_filters('active_plugins', get_option('active_plugins')))) { 
if (! function_exists('lawyerpress_lite_widgets_footer_initi')) {
	add_action('widgets_init', 'lawyerpress_lite_widgets_footer_initi');
	function lawyerpress_lite_widgets_footer_initi() {
		register_sidebar( array(
            'name'          => __( 'Footer 1','lawyerpress-lite' ),
            'id'            => 'footer-1',
            'description'   => __( 'Footer 1','lawyerpress-lite' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
            ) );

        register_sidebar( array(
            'name'          => __( 'Footer 2','lawyerpress-lite' ),
            'id'            => 'footer-2',
            'description'   => __( 'Footer 2','lawyerpress-lite' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
            ) );

        register_sidebar( array(
            'name'          => __( 'Footer 3','lawyerpress-lite' ),
            'id'            => 'footer-3',
            'description'   => __( 'Footer 3','lawyerpress-lite' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
            ) );

	}
}
}