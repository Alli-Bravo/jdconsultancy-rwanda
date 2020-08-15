<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lawyerpress-lite
 */

get_header();
$lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
$check_sidebar = $lawyerpress_lite_settings['lawyerpress_lite_sidebar_display'];
$sidebar_status = $lawyerpress_lite_settings['lawyerpress_lite_sidebar_status'];
$col = 8;
if (is_active_sidebar('layout_pro_left_sidebar') && is_active_sidebar('lawyerpress_lite_main_sidebar'))
    $col = 4;
elseif ((!is_active_sidebar('layout_pro_left_sidebar') && !is_active_sidebar('lawyerpress_lite_main_sidebar')) || ($sidebar_status == 'hide-sidebar'))
    $col = 12;
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    if (is_cart() || get_the_ID() == get_option('woocommerce_checkout_page_id') || get_the_ID() == get_option('woocommerce_myaccount_page_id')) {
        $col = 12;
    }
}
?>
    <div class="sec-content section">
        <div class="container">
            <div class="row">
                <?php
                if (($col != 12) && ($sidebar_status == 'show-sidebar')) {
                    if (is_active_sidebar('layout_pro_left_sidebar')) {
                        echo '<div class="col-md-4">';
                        dynamic_sidebar('layout_pro_left_sidebar');
                        echo '</div>';
                    }
                }
                ?>
                <div class="col-md-<?php echo esc_attr($col); ?>">
                    <div class="content-area">
                        <main id="main" class="site-main">

                            <?php
                            while (have_posts()) :
                                the_post();

                                get_template_part('template-parts/content', 'page');

                                // If comments are open or we have at least one comment, load up the comment template.
                                if (comments_open() || get_comments_number()) :
                                    comments_template();
                                endif;

                            endwhile; // End of the loop.
                            ?>

                        </main><!-- #main -->
                    </div><!-- #content-area -->
                </div>
                <?php
                if (($col != 12)) {
                    if (is_active_sidebar('lawyerpress_lite_main_sidebar') && ($sidebar_status == 'show-sidebar')) {
                        echo '<div class="col-md-4">';
                        dynamic_sidebar('lawyerpress_lite_main_sidebar');
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

<?php
get_footer();
