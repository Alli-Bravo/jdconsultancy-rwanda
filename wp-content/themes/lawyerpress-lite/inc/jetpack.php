<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package lawyerpress-lite
 * @since lawyerpress lite 1.0
 */
/*********** lawyerpress lite ADD THEME SUPPORT FOR INFINITE SCROLL **************************/
if (! function_exists('lawyerpress_lite_jetpack_setup')) {
	function lawyerpress_lite_jetpack_setup() {
		add_theme_support( 'infinite-scroll', array(
			'container' => 'main',
			'footer'    => 'page',
		) );
	}
	add_action( 'after_setup_theme', 'lawyerpress_lite_jetpack_setup' );
}