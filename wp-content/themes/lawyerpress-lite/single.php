<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lawyerpress-lite
 */

get_header();
$lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
$check_sidebar = $lawyerpress_lite_settings['lawyerpress_lite_sidebar_display'];
$sidebar_status = $lawyerpress_lite_settings['lawyerpress_lite_sidebar_status'];
$check_sidebar = $lawyerpress_lite_settings['lawyerpress_lite_sidebar_display'];
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
                            while (have_posts()) : the_post();

                                get_template_part('template-parts/content', get_post_format()); ?>

                              <div class="post-button blog-section"> 
                                <?php
                                if ( get_previous_post() ) {
                                    ?>
                                    <div class="prev_button">
                                        <div class="arrow">
                                            <?php previous_post_link( '%link', '<span class="pagi_text"><i class="fa fa-angle-double-left"></i> ' . esc_html__( 'Previous Post', 'lawyerpress-lite' ) . '</span><p class="nav_title"> %title </p>', 'lawyerpress-lite' ); ?>
                                        </div>
                                    </div>
                                    <?php
                                }

                                if ( get_next_post() ) {
                                    ?>
                                    <div class="next_button">
                                        <div class="arrow">
                                            <?php next_post_link( '%link', '<span class="pagi_text">' . esc_html__( 'Next Post', 'lawyerpress-lite' ) . ' <i class="fa fa-angle-double-right"></i></span><p class="nav_title"> %title </p>', 'lawyerpress-lite' ); ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div> <?php

                                // If comments are open or we have at least one comment, load up the comment template.
                                if (comments_open() || get_comments_number()) :
                                    comments_template();
                                endif;

                            endwhile; // End of the loop.
                            ?>

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
