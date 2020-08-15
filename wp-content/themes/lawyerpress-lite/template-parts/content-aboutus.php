<?php $lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
$intro_pages = $lawyerpress_lite_settings['lawyerpress_lite_aboutus_page'];
if (!empty($intro_pages)):
    $intro_pages_arg = array(
        'post_type' => 'page',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'page_id' => $intro_pages);
    $intro_pages_query = new WP_Query($intro_pages_arg);
    if ($intro_pages_query->have_posts()): ?>

        <div class="section about-section">
            <div class="container">
                <div class="row">
                    <?php
                    while ($intro_pages_query->have_posts()):
                        $intro_pages_query->the_post();

                         $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        $url = $image_src[0];
                        if (!empty($image_src)) {
                            $image_style = esc_url($url) ?>
                        <?php } else {
                            $image_style = "";
                        }
                  $title_attribute		= the_title_attribute( 'echo=0' );
                  $thumbnail_id			= get_post_thumbnail_id( get_the_ID() );
                  $img_meta				= get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
                  $img_alt				= ! empty( $img_meta ) ? $img_meta : $title_attribute;
                      $excerpt = substr(get_the_excerpt(), 0 , 400);?>
                            <div class="col-md-6 pull-left">  
                            <div class="section-title">
                                 <h2><?php the_title(); ?></h2>
                            </div>    
                                <div class="about-wrapper">
                                    <p><?php echo esc_attr($excerpt); ?></p>
                                    <a href="<?php echo esc_url(get_permalink($intro_pages)) ?>"
                                       class="btn btn-default"><?php esc_html_e('Read More', 'lawyerpress-lite'); ?></a>
                                </div>
                            </div>
                    <div class="col-md-6 pull-left">
                        <div class="pic">
                        <img src="<?php echo wp_kses_post($image_style); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                    </div>
                    </div>
                            <?php                            
                    endwhile;
                    wp_reset_postdata(); ?>

                </div>
            </div>
        </div>
    <?php endif;
endif;