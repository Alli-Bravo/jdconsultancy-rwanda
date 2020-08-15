<?php 
$lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
        $page_content = $lawyerpress_lite_settings['lawyerpress_lite_callout_section_pages_selection'];
        $page_title = $lawyerpress_lite_settings['lawyerpress_lite_callout_section_pages_title'];
          $page_description = $lawyerpress_lite_settings['lawyerpress_lite_callout_section_pages_description'];
      
        
         if ($page_content != 'none') {
            $callout_arg = array(
                'post_type'     => 'page',
                'post_status'    => 'publish',
                'post__in'       => (array)$page_content,
                'posts_per_page' => 3,
                );
           
          

    $callout_query = new WP_Query($callout_arg);
  
 if ($callout_query->have_posts()):?>
 <div class="callout-section section">
<div class="container">
    <div class="row"> 
         <div class="section-title text-center">
              <h2><?php echo esc_html($page_title) ?></h2>
              <p><?php echo esc_html($page_description) ?></p>
            </div>
                    <?php while ($callout_query->have_posts()) : $callout_query->the_post();
                    global $post;
                     $post_thumbnail_id = get_post_thumbnail_id($post->ID);
                      $featured_image = wp_get_attachment_image_src($post_thumbnail_id , 'lawyerpress-lite-callout-image');
                    
                     $excerpt = substr(get_the_excerpt(), 0 , 140);
                  $title_attribute     = the_title_attribute( 'echo=0' );
                  $thumbnail_id        = get_post_thumbnail_id( get_the_ID() );
                  $img_meta            = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
                  $img_alt             = ! empty( $img_meta ) ? $img_meta : $title_attribute;
                          ?>
        <div class="col-md-4 col-sm-6">
              <div class="service-icon">
                     
                 <img src="<?php echo esc_url($featured_image[0]);?>" alt="<?php echo esc_attr($img_alt); ?>"> 
                  
                </div>
            <div class="serviceBox service-layout2 service-free">

                <a href="<?php the_permalink();?>"><h3 class="title"><?php the_title(); ?></h3></a>
                <p class="description">
                    <?php echo esc_attr($excerpt); ?>
                </p>
            </div>
        </div>
        <?php   endwhile;
        wp_reset_postdata(); ?>
              
    </div>
</div>
</div>
    <?php 
     endif; 
        wp_reset_query();
    }