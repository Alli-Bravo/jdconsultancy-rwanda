<?php
/**
 * @package lawyerpress-lite
 * @since lawyerpress lite 1.0
 */
?>
<?php
/************************* lawyerpress lite FOOTER DETAILS **************************************/
if (! function_exists('lawyerpress_lite_site_footer')) {
	function lawyerpress_lite_site_footer() {
		$lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
		if ( is_active_sidebar( 'lawyerpress_lite_footer_options' ) ) :
			dynamic_sidebar( 'lawyerpress_lite_footer_options' );
		else:
			echo '<div class="copyright">';
			echo esc_html__('Theme by ', 'lawyerpress-lite');
		 	echo '<a href="'.esc_url('https://codethemes.co/').'" target="_blank">'. ' ' .esc_html__('Code Themes', 'lawyerpress-lite').'</a>';
		 	 ?>
		</div>
		<?php endif;
	}
	add_action( 'lawyerpress_lite_sitegenerator_footer', 'lawyerpress_lite_site_footer');
}