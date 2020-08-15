<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
                    <section class="content-area">
                        <main id="main" class="site-main">

                            <?php if (have_posts()) : ?>

                                <header class="page-header">
                                    <h1 class="page-title">
                                        <?php
                                        /* translators: %s: search query. */
                                        printf(esc_html__('Search Results for: %s', 'lawyerpress-lite'), '<span>' . get_search_query() . '</span>');
                                        ?>
                                    </h1>
                                </header><!-- .page-header -->

                                <?php
                                /* Start the Loop */
                                while (have_posts()) :
                                    the_post();

                                    /**
                                     * Run the loop for the search to output the results.
                                     * If you want to overload this in a child theme then include a file
                                     * called content-search.php and that will be used instead.
                                     */
                                    get_template_part('template-parts/content', 'search');

                                endwhile;

                                the_posts_navigation();

                            else :

                                get_template_part('template-parts/content', 'none');

                            endif;
                            ?>

                        </main><!-- #main -->
                    </section><!-- #primary -->
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
