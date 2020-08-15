<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lawyerpress-lite
 */

get_header();
$lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
$check_sidebar = $lawyerpress_lite_settings['lawyerpress_lite_sidebar_display'];
$sidebar_status = $lawyerpress_lite_settings['lawyerpress_lite_sidebar_status'];
$col = lawyerpress_lite_check_sidebar();
$content_col = 12 - $col;
if(($sidebar_status == 'hide-sidebar'))
    $content_col = 12;
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
                <div class="col-md-<?php echo esc_attr($content_col); ?>">
                    <div class="content-area">
                        <main id="main" class="site-main">

                            <?php
                            if (have_posts()) : ?>

                                <?php
                                /* Start the Loop */
                                while (have_posts()) : the_post();

                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part('template-parts/content', get_post_format());

                                endwhile;

                                the_posts_navigation();

                            else :

                                get_template_part('template-parts/content', 'none');

                            endif; ?>

                        </main><!-- #main -->
                    </div><!-- #primary -->
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