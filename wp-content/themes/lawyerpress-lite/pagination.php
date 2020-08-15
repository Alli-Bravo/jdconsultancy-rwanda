<?php
/**
 * The template for displaying pagination.
 *
 * @package lawyerpress-lite
 * @since lawyerpress lite 1.0
 */
$lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
if ( !class_exists( 'Jetpack') || class_exists( 'Jetpack') && !Jetpack::is_module_active( 'infinite-scroll' )){
	echo '<div class="container">';
	if ( function_exists('wp_pagenavi' ) ) :
		wp_pagenavi();
	else:
	global $wp_query;
		if ( $wp_query->max_num_pages > 1 ) : ?>
		<ul class="default-wp-page clearfix">
            <li class="previous">
                <?php previous_posts_link( __( '&laquo; Previous Page', 'lawyerpress-lite'  ) ); ?>
            </li>
			<li class="next">
				<?php next_posts_link( __( 'Next Page &raquo;', 'lawyerpress-lite'  ) ); ?>
			</li>
		</ul>
		<?php  endif;
	endif;
	echo '</div> <!-- end .container -->';
}?>