<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lawyerpress-lite
 */

if ( ! is_active_sidebar( 'lawyerpress_lite_main_sidebar' ) ) {
    return;
}
?>

<aside class="widget-area">
    <?php dynamic_sidebar( 'lawyerpress_lite_main_sidebar' ); ?>
</aside><!-- #secondary -->
