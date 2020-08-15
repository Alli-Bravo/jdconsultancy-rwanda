<?php
/**
 * Custom functions
 *
 * @package lawyerpress-lite
 * @since lawyerpress lite 1.0
 */


/********************* CONTINUE READING LINKS FOR EXCERPT *********************************/
if (! function_exists('lawyerpress_lite_continue_reading')) {
	function lawyerpress_lite_continue_reading() {
		 return '&hellip; ';
	}
	add_filter('excerpt_more', 'lawyerpress_lite_continue_reading');
}

/***************** USED CLASS FOR BODY TAGS ******************************/
if (! function_exists('lawyerpress_lite_body_class')) {
	function lawyerpress_lite_body_class($classes) {
		$lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
		$lawyerpress_lite_site_layout = $lawyerpress_lite_settings['lawyerpress_lite_design_layout'];

		if (is_page_template('page-templates/page-template-contact.php')) {
				$classes[] = 'contact';
		}
		if ($lawyerpress_lite_site_layout =='boxed-layout') {
			$classes[] = 'boxed-layout';
		}
		if ($lawyerpress_lite_site_layout =='small-boxed-layout') {
			$classes[] = 'boxed-layout-small';
		}
		$classes[] = 'small_image_blog';
		return $classes;
	}
	add_filter('body_class', 'lawyerpress_lite_body_class');
}

/********************** SCRIPTS FOR DONATE/ UPGRADE BUTTON ******************************/
if (! function_exists('lawyerpress_lite_customize_scripts')) {
	function lawyerpress_lite_customize_scripts() {

		// Load the html5 shiv.
		wp_enqueue_script( 'lawyerpress-lite-html5', get_template_directory_uri() . '/assets/js/html5.min.js', array(), '3.7.3' );
		wp_script_add_data( 'lawyerpress-lite-html5', 'conditional', 'lt IE 9' );
	}
	add_action( 'customize_controls_print_scripts', 'lawyerpress_lite_customize_scripts');
}

/*********************** lawyerpress lite PAGE SLIDERS ***********************************/
if (! function_exists('lawyerpress_lite_page_sliders')) {
	function lawyerpress_lite_page_sliders() {
        $lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
        $banner_pages = array_filter(array(
            $lawyerpress_lite_settings['lawyerpress_lite_featured_page_slider_1'],
            $lawyerpress_lite_settings['lawyerpress_lite_featured_page_slider_2'],
            $lawyerpress_lite_settings['lawyerpress_lite_featured_page_slider_3']
        ));
        if(count($banner_pages)>0) {
            $get_featured_posts = new WP_Query(array('posts_per_page' => count($banner_pages), 'post_type' => array('page'), 'post__in' => $banner_pages, 'orderby' => 'post__in',)); 

               if ($get_featured_posts->have_posts()):?>
             <div class="banner-wrapper">
            	<div class="row">
            		<div class="banner-slider"> <?php 
            	
                     while ($get_featured_posts->have_posts()) : $get_featured_posts->the_post();
                        global $post;
                        $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        $url = $image_src[0];
                        if (!empty($image_src)) {
                            $image_style = "style='background-image:url(" . esc_url($url) . ")'"; ?>
                        <?php } else {
                            $image_style = "";
                        }
                        // $excerpt                     = substr(get_the_excerpt(), 0 , 160);
                        ?>
                    <div class="slider-item slider1" <?php echo wp_kses_post($image_style); ?>">
                        <div class="container">
                            <div class="banner-text-wrap">
                                <h2><?php the_title(); ?></h2>
                               
                                 <a href="<?php the_permalink(); ?>" class="btn btn-default">Read More</a>
                            </div>
                        </div>
                    </div>
                   
                    <?php
                endwhile;
                    wp_reset_postdata();  ?>
                      </div>
            			</div>

        					</div>
   			<?php endif; 
           			 wp_reset_query();
        			
        }
	}
}

/*************************** ENQUEING STYLES AND SCRIPTS ****************************************/
if (! function_exists('lawyerpress_lite_scripts')) {
	function lawyerpress_lite_scripts() {
		$lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
		wp_enqueue_style('lawyerpress-lite-css', get_template_directory_uri().'/assets/css/lawyerpress-lite.css');
		wp_enqueue_style( 'lawyerpress-lite-style', get_stylesheet_uri() );
		// wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/font-awesome/css/font-awesome.min.css');
		wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), false, true);
		wp_enqueue_script('slick-jquery', get_template_directory_uri().'/assets/js/slick.min.js', array('jquery'), false, true);
//		wp_enqueue_script('lawyerpress-lite-main', get_template_directory_uri().'/assets/js/lawyerpress-lite.js', array('jquery'), false, true);
		wp_enqueue_script('jquery-sticky', get_template_directory_uri().'/assets/sticky/jquery.sticky.min.js', array('jquery'), false, true);
		wp_enqueue_script('lawyerpress-lite-app', get_template_directory_uri().'/assets/js/app.js', array('jquery'), false, true);
		
		wp_style_add_data('IE-9', 'conditional', 'lt IE 9');
		wp_enqueue_style('lawyerpress-lite-responsive', get_template_directory_uri().'/assets/css/responsive.css');
		wp_enqueue_style('slick-css', get_template_directory_uri().'/assets/css/slick.css');

		/********* Adding Multiple Fonts ********************/
		$lawyerpress_lite_googlefont = array();
		array_push( $lawyerpress_lite_googlefont, 'Raleway');
		array_push( $lawyerpress_lite_googlefont, 'Cormorant:500');
		$lawyerpress_lite_googlefonts = implode("|", $lawyerpress_lite_googlefont);
		wp_register_style( 'lawyerpress_lite_google_fonts', '//fonts.googleapis.com/css?family='.$lawyerpress_lite_googlefonts);
		wp_enqueue_style( 'lawyerpress_lite_google_fonts' );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'lawyerpress_lite_scripts' );
}

if (! function_exists('lawyerpress_lite_blog_post_format')) {
	function lawyerpress_lite_blog_post_format($post_format, $post_id) {

		if (is_single()){
			$single_post_format_class = 'single-post-format';
		} else {
			$single_post_format_class = '';
		}

		$lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();

		if($post_format == 'video'){ ?>
			<div class="post-video <?php echo esc_attr($single_post_format_class);?>">
				<div class="post-video-holder">
					<?php
			            $content = trim(  get_post_field('post_content', $post_id) );
			            $new_content =  preg_match_all("/\[[^\]]*\]/", $content, $matches);
			            if( $new_content){
			                echo do_shortcode( $matches[0][0] );
			            }
			            else{
			                echo esc_html( lawyerpress_lite_the_featured_video( $content ) );
			            }
			        ?>
				</div>
			</div>
		<?php
		}
		elseif($post_format == 'audio'){
			?>
				<div class="post-audio <?php echo esc_attr($single_post_format_class);?>">
					<div class="post-audio-holder">
						<?php
							$content = trim(  get_post_field('post_content', $post_id) );
				              $ori_url = explode( "\n", esc_html( $content ) );
				            $new_content =  preg_match_all("/\[[^\]]*\]/", $content, $matches);
				            if( $new_content){
				                echo do_shortcode( $matches[0][0] );
				            }
				            elseif (preg_match ( '#^<(script|iframe|embed|object)#i', $content )) {
				                $regex = '/https?\:\/\/[^\" ]+/i';
				                preg_match_all($regex, $ori_url[0], $matches);
				                $urls = ($matches[0]);
				                 print_r('<iframe src="'.$urls[0].'" width="100%" height="240" frameborder="no" scrolling="no"></iframe>');
				            } elseif (0 === strpos( $content, 'https://' )) {
				                $embed_url = wp_oembed_get( esc_url( $ori_url[0] ) );
				                print_r($embed_url);
				            }
						?>
					</div>
				</div>
			<?php
		}
		elseif ($post_format == 'gallery') {
			//Get the alt and title of the image
				$post_thumbnail_id = get_post_thumbnail_id( $post_id );
				$attachment =  get_post($post_thumbnail_id);
				$gallery = get_post_gallery( $post_id, false );
                 $ids = explode( ",", $gallery['ids'] );
						if( $ids ) {
							?>
						<div class="post-gallery">
							<?php foreach ( $ids as $key => $images ) {
							$link   = wp_get_attachment_url( $images ); ?>
								<div class="post-gallery-item">
									<div class="post-gallery-item-holder" style="background-image: url('<?php echo esc_url( $link); ?>');" alt= "<?php echo esc_attr( $attachment->post_excerpt );?>">
									</div>
								</div>
							<?php
							}
							?>
						</div>
					<?php

			}
		}
		else
		{
					if( has_post_thumbnail()) { ?>
						<div class="post-image-content">
							<figure class="post-featured-image">
								<a href="<?php the_permalink();?>" title="<?php echo the_title_attribute('echo=0'); ?>">
								<?php the_post_thumbnail('lawyerpress-lite-blog-image'); ?>
								</a>
							</figure><!-- end.post-featured-image  -->
						</div> <!-- end.post-image-content -->
		<?php
					}

		}
}
}

if (! function_exists('lawyerpress_lite_author_description')) {
	function lawyerpress_lite_author_description($author_id) {
		$author_name = get_the_author_meta( 'display_name' );
        $author_firstname = get_the_author_meta( 'first_name' );
        $author_lastname = get_the_author_meta( 'last_name' );
        $author_id = get_the_author_meta( 'ID' );
        $author_description = get_the_author_meta('description', $author_id);
        $author_image = get_avatar($author_id);
		?>
		 <div class="author-bio">
            <div class="row">
                <div class="col-md-2">
                    <div class="author-image">
                        <?php echo wp_kses_post($author_image); ?>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="author-desc">
                        <span class="author-name"><a href="<?php echo esc_url(get_author_posts_url( $author_id));?>"><?php if ( $author_firstname && $author_lastname ) { ?><?php echo esc_html($author_firstname). ' ' . esc_html( $author_lastname); ?><?php } else { echo esc_html($author_name);}?></a></span>
                        <?php if ($author_description) { ?>
                            <p><?php echo wp_kses_post($author_description); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}
if (!function_exists('lawyerpress_lite_check_sidebar')) :
function lawyerpress_lite_check_sidebar(){
        $col = 0;
        if ( in_array('layout-pro/layout-pro.php', apply_filters('active_plugins', get_option('active_plugins'))) && is_active_sidebar('layout_pro_left_sidebar')) {
        $col = $col + 4;
    }
    if( is_active_sidebar('lawyerpress_lite_main_sidebar')){
            $col = $col + 4;
    }
    return $col;
}
endif;




if (!function_exists('lawyerpress_lite_breadcrumb')) {
function lawyerpress_lite_breadcrumb()
{
    $header_image = get_header_image();
    $blog = get_option('show_on_front');
    $blog_page = get_option('page_for_posts');
    $current_author = get_user_by( 'slug', get_query_var( 'author_name' ) );
    ?>
    <div class="inner-banner-wrap"
         <?php if ($header_image) { ?>style="background-image:url(<?php echo esc_url($header_image); ?>)"<?php } ?>>
        <div class="container">
            <div class="row">
                <div class="inner-banner-content">
                    <?php
                    if (is_archive()) {
                        the_archive_title('<h2>', '</h2>');
                    }
                    if ((is_single() || is_page()) && !isset($_GET['rl_favorite'])) {
                        the_title('<h2>', '</h2>');
                    }
                    ?>

                    <div class="header-breadcrumb">

                        <?php
                        if( in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) ) {
                            woocommerce_breadcrumb();
                        }
                        elseif(($blog=='page') && !is_front_page() && is_home()){
                            echo '<h2>'.esc_html(get_the_title($blog_page)).'</h2>';
                        }

                                            else{

                            $delimiter = '';
                            $home = esc_html__( 'Home', 'lawyerpress-lite' ); // text for the 'Home' link
                            $before = '<li>'; // tag before the current crumb
                            $after = '</li>'; // tag after the current crumb
                            echo '<ul class="breadcrumb">';
                            global $post;
                            $homeLink = home_url();
                            echo '<li><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a></li>' . wp_kses_post($delimiter) . ' ';
                            if ( is_category() ) {
                                global $wp_query;
                                $cat_obj = $wp_query->get_queried_object();
                                $thisCat = $cat_obj->term_id;
                                $thisCat = get_category( $thisCat );
                                $parentCat = get_category( $thisCat->parent );
                                if ($thisCat->parent != 0)
                                    echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
                                echo wp_kses_post($before) . single_cat_title('', false) . wp_kses_post($after);
                            } elseif (is_day()) {
                                echo '<li><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_attr( get_the_time( 'Y' ) ) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                echo '<li><a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) )) . '">' . esc_attr( get_the_time('F') ) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                echo wp_kses_post($before) . esc_attr( get_the_time( 'd' ) ) . wp_kses_post($after);
                            } elseif ( is_month() ) {
                                echo '<li><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_attr( get_the_time( 'Y' ) ) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                echo wp_kses_post($before) . esc_attr( get_the_time('F') ) . wp_kses_post($after);
                            } elseif ( is_year() ) {
                                echo wp_kses_post($before) . esc_attr( get_the_time( 'Y' ) ) . wp_kses_post($after);
                            } elseif ( is_single() && !is_attachment() ) {
                                if ( get_post_type() != 'post' ) {
                                    $post_type = get_post_type_object( get_post_type() );
                                    $slug = $post_type->rewrite;
                                    echo '<li><a href="' . esc_url( $homeLink ) . '/' . esc_attr($slug['slug']) . '/">' . esc_html($post_type->labels->singular_name) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                    echo wp_kses_post($before) . esc_html( get_the_title() ) . wp_kses_post($after);
                                } else {
                                    $cat = get_the_category();
                                    $cat = $cat[0];
                                    //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                                    echo wp_kses_post($before) . esc_html( get_the_title() ) . wp_kses_post($after);
                                }

                            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
                                $post_type = get_post_type_object(get_post_type());
                                if(!empty($post_type)){
                                    echo wp_kses_post($before) . esc_html($post_type->labels->singular_name) . wp_kses_post($after);
                                }
                            } elseif (is_attachment()) {
                                $parent = get_post($post->post_parent);
                                $cat = get_the_category($parent->ID);
                                echo '<li><a href="' . esc_url(get_permalink($parent)) . '">' . esc_html( $parent->post_title ) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                echo wp_kses_post($before) . esc_attr( get_the_title() ) . wp_kses_post($after);
                            } elseif ( is_page() && !$post->post_parent ) {
                                echo wp_kses_post($before) . esc_attr( get_the_title() ) . wp_kses_post($after);
                            } elseif ( is_page() && $post->post_parent ) {
                                $parent_id = $post->post_parent;
                                $breadcrumbs = array();
                                while ( $parent_id ) {
                                    $page = get_page($parent_id);
                                    $breadcrumbs[] = '<li><a href="' . esc_url( get_permalink($page->ID) ) . '">' . esc_html(get_the_title($page->ID)) . '</a></li>';
                                    $parent_id = $page->post_parent;
                                }
                                $breadcrumbs = array_reverse($breadcrumbs);
                                foreach ($breadcrumbs as $crumb)
                                    echo wp_kses_post($crumb) . ' ' . wp_kses_post($delimiter) . ' ';
                                echo wp_kses_post($before) . esc_html(get_the_title()) . wp_kses_post($after);
                            } elseif ( is_search() ) {
                                echo wp_kses_post($before) . esc_html__( "Search results for:&nbsp;","lawyerpress-lite" )  .'"'. esc_html(get_search_query()) . '"' . wp_kses_post($after);

                            } elseif ( is_tag() ) {
                                echo wp_kses_post($before) . esc_html__( 'Tag','lawyerpress-lite' ) . single_tag_title( '', false ) . wp_kses_post($after);
                            } elseif ( is_author() ) {
                                global $author;
                                $userdata = get_userdata( $author );
                                echo wp_kses_post($before) . esc_html__( "Articles posted by","lawyerpress-lite" ) .' '. esc_html($userdata->display_name) . wp_kses_post($after);
                            } elseif (is_404()) {
                                echo wp_kses_post($before) . esc_html__( "Error 404","lawyerpress-lite" ) . wp_kses_post($after);
                            }
                                 elseif ( is_page_template('page-templates/template-contact.php')) {
                                echo wp_kses_post($before) . esc_attr( get_the_title() ) . wp_kses_post($after);
                            }
                            }

                        echo '</ul>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
}


// 