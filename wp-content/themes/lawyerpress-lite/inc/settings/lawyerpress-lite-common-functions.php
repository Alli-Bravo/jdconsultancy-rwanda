<?php
/**
 * Custom functions
 *
 * @package lawyerpress-lite
 * @since lawyerpress lite 1.0
 */

/******************** Remove div and replace with ul**************************************/
if (! function_exists('lawyerpress_lite_wp_page_menu')) {
	add_filter('wp_page_menu', 'lawyerpress_lite_wp_page_menu');
	function lawyerpress_lite_wp_page_menu($page_markup) {
		preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
		$divclass   = $matches[1];
		$replace    = array('<div class="'.$divclass.'">', '</div>');
		$new_markup = str_replace($replace, '', $page_markup);
		$new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
		return $new_markup;
	}
}


/********************* Used wp_page_menu filter hook *********************************************/
if (! function_exists('lawyerpress_lite_wp_page_menu_filter')) {
	function lawyerpress_lite_wp_page_menu_filter($text) {
		$replace = array(
			'current_page_item' => 'current-menu-item',
		);
		$text = str_replace(array_keys($replace), $replace, $text);
		return $text;
	}
	add_filter('wp_page_menu', 'lawyerpress_lite_wp_page_menu_filter');
}

/**************************************************************************************/
if (! function_exists('lawyerpress_lite_get_featured_posts')) {
	function lawyerpress_lite_get_featured_posts() {
		return apply_filters( 'lawyerpress_lite_get_featured_posts', array() );
	}
}
/************ Return bool if there are featured Posts ********************************/
if (! function_exists('lawyerpress_lite_has_featured_posts')) {
	function lawyerpress_lite_has_featured_posts() {
		return ! is_paged() && (bool) lawyerpress_lite_get_featured_posts();
	}
}

/**************************** Display Header Title ***********************************/
if (! function_exists('lawyerpress_lite_display_header_title')) {

    add_filter('get_the_archive_title', 'lawyerpress_lite_display_header_title');
    function lawyerpress_lite_display_header_title($title)
    {
        $format = get_post_format();
        $lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
        if (is_archive()) {
            if (is_category()) :
                $lawyerpress_lite_header_title = esc_html__('Category: ', 'lawyerpress-lite') . ucfirst(single_cat_title('', FALSE));
            elseif (is_tag()) :
                if ($lawyerpress_lite_settings['lawyerpress_lite_blog_layout'] != 'photography_layout'):
                    $lawyerpress_lite_header_title = esc_html__('Tag: ', 'lawyerpress-lite') . ucfirst(single_tag_title('', FALSE));
                endif;

            elseif (is_author()) :
                the_post();
                $lawyerpress_lite_header_title = esc_html__('Author: ', 'lawyerpress-lite') . ucfirst(get_the_author());
            elseif (is_day()) :
                $lawyerpress_lite_header_title = esc_html__('Day: ', 'lawyerpress-lite') . get_the_date();
            elseif (is_month()) :
                $lawyerpress_lite_header_title = esc_html__('Month: ', 'lawyerpress-lite') . get_the_date('F Y');
            elseif (is_year()) :
                $lawyerpress_lite_header_title = esc_html__('Year: ', 'lawyerpress-lite') . get_the_date('Y');
            elseif ($format == 'audio') :
                $lawyerpress_lite_header_title = esc_html__('Audios', 'lawyerpress-lite');
            elseif ($format == 'aside') :
                $lawyerpress_lite_header_title = esc_html__('Asides', 'lawyerpress-lite');
            elseif ($format == 'image') :
                $lawyerpress_lite_header_title = esc_html__('Images', 'lawyerpress-lite');
            elseif ($format == 'gallery') :
                $lawyerpress_lite_header_title = esc_html__('Galleries', 'lawyerpress-lite');
            elseif ($format == 'video') :
                $lawyerpress_lite_header_title = esc_html__('Videos', 'lawyerpress-lite');
            elseif ($format == 'status') :
                $lawyerpress_lite_header_title = esc_html__('Status', 'lawyerpress-lite');
            elseif ($format == 'quote') :
                $lawyerpress_lite_header_title = esc_html__('Quotes', 'lawyerpress-lite');
            elseif ($format == 'link') :
                $lawyerpress_lite_header_title = esc_html__('Links', 'lawyerpress-lite');
            elseif ($format == 'chat') :
                $lawyerpress_lite_header_title = esc_html__('Chats', 'lawyerpress-lite');
            elseif (class_exists('WooCommerce') && (is_shop() || is_product_category())):
                $lawyerpress_lite_header_title = woocommerce_page_title(false);
            elseif (class_exists('bbPress') && is_bbpress()) :
                $lawyerpress_lite_header_title = esc_html(get_the_title());
            else :
                $lawyerpress_lite_header_title = esc_html__('Archive:', 'lawyerpress-lite');
            endif;
        } elseif (is_home()) {
            $lawyerpress_lite_header_title = esc_html(get_the_title(get_option('page_for_posts')));
        } elseif (is_404()) {
            $lawyerpress_lite_header_title = __('Page NOT Found', 'lawyerpress-lite');
        } elseif (is_search()) {
            $search_query = get_search_query();
            $lawyerpress_lite_header_title = sprintf('Search Results for: ' . ucfirst($search_query) . '', 'lawyerpress-lite');
        } elseif (is_page_template()) {
            $lawyerpress_lite_header_title = get_the_title();
        } else {
            $lawyerpress_lite_header_title = get_the_title();
        }
        return $lawyerpress_lite_header_title;

    }
}
/********************* Custom Header setup ************************************/
if (! function_exists('lawyerpress_lite_custom_header_setup')) {
	function lawyerpress_lite_custom_header_setup() {
		$args = array(
			'default-text-color'     => '',
			'default-image'          => '',
			'height'                 => apply_filters( 'lawyerpress_lite_header_image_height', 400 ),
			'width'                  => apply_filters( 'lawyerpress_lite_header_image_width', 2500 ),
			'random-default'         => false,
			'max-width'              => 2500,
			'flex-height'            => true,
			'flex-width'             => true,
			'random-default'         => false,
			'header-text'			 => false,
			'uploads'				 => true,
			'wp-head-callback'       => '',
			'default-image'			 => '',
		);
		add_theme_support( 'custom-header', $args );
	}
	add_action( 'after_setup_theme', 'lawyerpress_lite_custom_header_setup' );
}

if ( ! function_exists( 'lawyerpress_lite_the_featured_video' ) ) {
    function lawyerpress_lite_the_featured_video( $content ) {

        $ori_url = explode( "\n", esc_html( $content ) );
        $url = esc_url( $ori_url[0] );

        $w = get_option( 'embed_size_w' );
        if ( !is_single() )
            $url = str_replace( '448', $w, $url );

        if ( 0 === strpos( $url, 'https://' ) ) {
            $embed_url = wp_oembed_get( esc_url( $url ) );
            print_r($embed_url);
            $content = trim( str_replace( $url, '', esc_html( $content ) ) );
        }
        elseif ( preg_match ( '#^<(script|iframe|embed|object)#i', $url ) ) {
            $h = get_option( 'embed_size_h' );
            echo esc_url( $url );
            if ( !empty( $h ) ) {

                if ( $w === $h ) $h = ceil( $w * 0.75 );
                $url = preg_replace(
                    array( '#height="[0-9]+?"#i', '#height=[0-9]+?#i' ),
                    array( sprintf( 'height="%d"', $h ), sprintf( 'height=%d', $h ) ),
                    $url
                    );
                echo esc_url( $url );
            }

            $content = trim( str_replace( $url, '', $content ) );
        }
    }
}

if (! function_exists('lawyerpress_lite_single_content')) {
    function lawyerpress_lite_single_content($post) {
        $content = trim(  get_post_field('post_content', $post->ID) );
        /*$new_content =  preg_match_all("/\[[^\]]*\]/", $content, $matches);
        if ( has_post_format('gallery')) {
            echo wp_kses_post($post->post_content);
        }
        else {*/
            the_content();
        /*}*/
    }
}
 /* for excerpt*/
if (!function_exists('lawyerpress_lite_get_excerpt')) :
    function lawyerpress_lite_get_excerpt($post_id, $count)
    {
        $title = get_the_title($post_id);
        $content_post = get_post($post_id);
        $excerpt = $content_post->post_content;

        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);


        $excerpt = preg_replace('/\s\s+/', ' ', $excerpt);
        $excerpt = preg_replace('#\[[^\]]+\]#', ' ', $excerpt);
        $strip = explode(' ', $excerpt);
        foreach ($strip as $key => $single) {
            if (!filter_var($single, FILTER_VALIDATE_URL) === false) {
                unset($strip[$key]);
            }
        }
        $excerpt = implode(' ', $strip);

        $excerpt = substr($excerpt, 0, $count);
        if (strlen($excerpt) >= $count) {
            $excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
            $excerpt = $excerpt . '...';
        }
        if($title)
            return $excerpt;
        else
            return '<a href="'.esc_url(get_the_permalink($post_id)).'">'.$excerpt.'</a>';

    }
endif;

//for woocommerce
if ( ! function_exists( 'woocommerce_template_loop_product_link_open' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function woocommerce_template_loop_product_link_open() {
		global $product;

		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

		echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">'.'<h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2>'.'</a>';
	}
}

if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function woocommerce_template_loop_product_title() {
		// this function is overritted in woocommerce_template_loop_product_link_open function
	}
}



if (!function_exists('robolist_lite_blog_post_format')) {
    function robolist_lite_blog_post_format($post_format, $post_id)
    {

        global $post;
        if ($post_format == 'video') {
            $content = strip_tags(get_post_field('post_content', $post->ID));
            $content = strip_shortcodes($content);
            $ori_url = explode("\n", esc_html($content));
            $url = $ori_url[0];
            $url_type = explode(" ", $url);
            if (isset($url_type[1])) {
                $url_type_shortcode = $url_type[1];
            }
            $new_content = get_shortcode_regex();
            if (isset($url_type[1])) {
                if (preg_match_all('/' . $new_content . '/s', $post->post_content, $matches)
                    && array_key_exists(2, $matches)
                    && in_array($url_type_shortcode, $matches[2])

                ) {
                    echo do_shortcode($matches[0][0]);
                }
            } else {
                echo wp_oembed_get(esc_html(robolist_lite_the_featured_video($content)));
            }
            if(is_page_template('page-templates/template-home.php')){
                echo '</div>';
            }
        } elseif ($post_format == 'audio') {
            $html = "";
            $content = trim(get_post_field('post_content', $post_id));
            $ori_url = explode("\n", esc_html($content));
            $new_content = preg_match_all('/\[[^\]]*\]/', $content, $matches);
            if ($new_content) {
                echo do_shortcode($matches[0][0]);
            } elseif (preg_match('#^<(script|iframe|embed|object)#i', $content)) {
                $regex = '/https?\:\/\/[^\" ]+/i';
                preg_match_all($regex, $ori_url[0], $matches);
                $urls = ($matches[0]);
                $html .= ('<iframe src="' . $urls[0] . '" width="100%" height="240" frameborder="no" scrolling="no"></iframe>');
            } elseif (0 === strpos($content, 'https://')) {
                $embed_url = wp_oembed_get(esc_url($ori_url[0]));
                $html .= ($embed_url);
            }
            echo esc_html($html);
        } elseif ($post_format == 'gallery') {
            add_filter( 'shortcode_atts_gallery', 'robolist_lite_shortcode_atts_gallery' );

            $image_url = get_post_gallery_images($post_id);
            $background_style ='';
            $post_thumbnail_id = get_post_thumbnail_id($post_id);
            $attachment = get_post($post_thumbnail_id);
            $image = wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), 'full');
            $category = get_the_category();
            if (!empty($image)) {
                $background_style = "style='background-image:url(" . esc_url($image) . ")'";
            } else {
                $background_style = "";
            }
            if ($image_url) {
                ?>

                <div class="post-gallery">
                    <?php if(is_page_template('page-templates/template-home.php')): ?>
                        <div class="post-img-meta">
                            <a href="<?php echo esc_url(get_category_link($category[0]->term_id)); ?>"
                               class="post-cat"><?php echo esc_attr($category[0]->name); ?></a>
                            <h3 class="post-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
                            </h3>
                        </div>
                    <?php endif; ?>
                    <div class="post-format-gallery">
                        <?php foreach ($image_url as $key => $images) { ?>
                            <div class="slider-item" style="background-image: url('<?php echo esc_url($images); ?>');" alt="<?php echo esc_attr($attachment->post_excerpt); ?>">
                            </div>
                        <?php } ?>
                    </div>

                </div>
            <?php }
        } else {
            $image = wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), 'full');
            $category = get_the_category();
            if (!empty($image)) {
                $background_style = "style='background-image:url(" . esc_url($image) . ")'";
            } else {
                $background_style = "";
            }
            if (has_post_thumbnail() && !is_single() && is_page_template('page-templates/template-home.php')) {
                ?>
                <div class="post-img" <?php echo wp_kses_post($background_style); ?>>

                    <div class="post-img-meta">
                        <a href="<?php echo esc_url(get_category_link($category[0]->term_id)); ?>"
                           class="post-cat"><?php echo esc_attr($category[0]->name); ?></a>
                        <h3 class="post-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
                        </h3>
                    </div>
                </div>
                <?php

            } else {
                the_post_thumbnail();
            }

        }

    }
}


