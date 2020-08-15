<?php
/**
 * Display all lawyerpress lite functions and definitions
 *
 * @package lawyerpress-lite
 * @since lawyerpress lite 1.0
 */

/************************************************************************************************/
if (!function_exists('lawyerpress_lite_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function lawyerpress_lite_setup()
    {
        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        $GLOBALS['content_width'] = apply_filters( 'lawyerpress_lite_setup', 790 );

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on lawyerpress lite, use a find and replace
         * to change 'lawyerpress-lite' to the name of your theme in all the template files
         */
        load_theme_textdomain('lawyerpress-lite', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');

        /*
         * Let WordPress manage the document title.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');

        register_nav_menus(array(
            'primary' => __('Main Menu', 'lawyerpress-lite'),
        ));

        /*
        * Enable support for custom logo.
        *
        */
        add_theme_support('custom-logo', array(
            'flex-width' => true,
            'flex-height' => true,
        ));
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        //Indicate widget sidebars can use selective refresh in the Customizer.
        add_theme_support('customize-selective-refresh-widgets');

        /*
         * Switch default core markup for comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'comment-form', 'comment-list', 'gallery', 'caption',
        ));

        /**
         * Add support for the Aside Post Formats
         */
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('lawyerpress_lite_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        add_editor_style(get_template_directory() . '/assets/css/editor-style.css');

        /**
         * Making the theme WooCommerce compatible
         */
        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
    }
endif; // lawyerpress_lite_setup
add_action('after_setup_theme', 'lawyerpress_lite_setup');

add_image_size('lawyerpress-lite-blog-image', 700, 480, true);
add_image_size('lawyerpress-lite-callout-image', 800, 600, true);

/***************************************************************************************/
function lawyerpress_lite_content_width()
{
    if (is_page_template('page-templates/gallery-template.php') || is_attachment()) {
       $GLOBALS['content_width'] = apply_filters( 'lawyerpress_lite_content_width', 1170 );
    }
}

add_action('template_redirect', 'lawyerpress_lite_content_width');

/***************************************************************************************/
if (!function_exists('lawyerpress_lite_get_theme_options')):
    function lawyerpress_lite_get_theme_options()
    {
        return wp_parse_args(get_option('lawyerpress_lite_theme_options', array()), lawyerpress_lite_get_option_defaults_values());
    }
endif;

/***************************************************************************************/
require get_template_directory() . '/inc/customizer/lawyerpress-lite-default-values.php';
require(get_template_directory() . '/inc/settings/lawyerpress-lite-functions.php');
require(get_template_directory() . '/inc/settings/lawyerpress-lite-nav-walker.php');
require(get_template_directory() . '/inc/settings/lawyerpress-lite-common-functions.php');
require(get_template_directory() . '/inc/settings/lawyerpress-lite-tgmp.php');
require(get_template_directory() . '/inc/template-tags.php');
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/inc/footer-details.php';
require get_template_directory() . '/information/feature-about-page.php';
require get_template_directory() . '/information/lawyerpress-lite-notifications-utils.php' ;


//TGMPA plugin
require get_template_directory() . '/plugin-activation.php';

/************************ lawyerpress lite Widgets  *****************************/
require get_template_directory() . '/inc/widgets/widgets-functions/register-widgets.php';

/************************ lawyerpress lite Customizer  *****************************/
require get_template_directory() . '/inc/customizer/functions/sanitize-functions.php';
require get_template_directory() . '/inc/customizer/functions/register-panel.php';

function lawyerpress_lite_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '#site-title a',
            'container_inclusive' => false,
            'render_callback' => 'lawyerpress_lite_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector' => '#site-description',
            'container_inclusive' => false,
            'render_callback' => 'lawyerpress_lite_customize_partial_blogdescription',
        ));
    }
    require get_template_directory() . '/inc/customizer/functions/customizer-control.php';
    require get_template_directory() . '/inc/customizer/functions/design-options.php';
    require get_template_directory() . '/inc/customizer/functions/theme-options.php';
    require get_template_directory() . '/inc/customizer/functions/featured-content-customizer.php';

}

require get_template_directory() . '/inc/customizer/functions/class-pro-discount.php';

/**
 * Render the site title for the selective refresh partial.
 * @see lawyerpress_lite_customize_register()
 * @return void
 */
function lawyerpress_lite_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 * @see lawyerpress_lite_customize_register()
 * @return void
 */
function lawyerpress_lite_customize_partial_blogdescription()
{
    bloginfo('description');
}

add_action('customize_register', 'lawyerpress_lite_customize_register');
/**
 * Enqueue script for custom customize control.
 */
function theme_slug_custom_customize_enqueue()
{
    wp_enqueue_style('lawyerpress-lite-customizer-style', trailingslashit(get_template_directory_uri()) . 'inc/customizer/css/customizer-control.css');
}

add_action('customize_controls_enqueue_scripts', 'theme_slug_custom_customize_enqueue');


/******************* lawyerpress lite Header Display *************************/
if (!function_exists('lawyerpress_lite_the_custom_logo')) {
    function lawyerpress_lite_header_display()
    {
        ?>
        <div id="site-branding">
            <?php if (has_custom_logo()) {

                the_custom_logo();

                echo '<p id="site-description">';
                bloginfo('description');
                echo '</p>';

            } else { ?>
                <h1 id="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                       rel="home"> <?php bloginfo('name'); ?> </a>

                </h1>  <!-- end .site-title -->
                <p id="site-description"> <?php bloginfo('description'); ?> </p> <!-- end #site-description -->
            <?php } ?>
        </div> <!-- end #site-branding -->
        <?php
    }

    add_action('lawyerpress_lite_site_branding', 'lawyerpress_lite_header_display');
}


if (!function_exists('lawyerpress_lite_the_custom_logo')) :
    /**
     * Displays the optional custom logo.
     * Does nothing if the custom logo is not available.
     */
    function lawyerpress_lite_the_custom_logo()
    {
        if (function_exists('the_custom_logo')) {
            the_custom_logo();
        }
    }
endif;

/* Header Image */
if (!function_exists('lawyerpress_lite_woocommerce_header_add_to_cart_fragment')) {

    function lawyerpress_lite_header_image_display()
    {
        $lawyerpress_lite_header_image = get_header_image();
        $lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
        if (!empty($lawyerpress_lite_header_image)) {
            ?>
            <a href="<?php echo esc_url(home_url('/')); ?>"><img
                        src="<?php echo esc_url($lawyerpress_lite_header_image); ?>" class="header-image"
                        width="<?php echo esc_attr(get_custom_header()->width); ?>"
                        height="<?php echo esc_attr(get_custom_header()->height); ?>"
                        alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
            </a>
            <?php
        }
    }
    add_action('lawyerpress_lite_header_image', 'lawyerpress_lite_header_image_display');
}


// for information landing page
define( 'LAWYERPRESS_LITE_VERSION', '1.0.0' );

    function lawyerpress_lite_get_wporg_plugin_description( $slug ) {

        $plugin_transient_name = 'lawyerpress_lite_t_' . $slug;

        $transient = get_transient( $plugin_transient_name );

        if ( ! empty( $transient ) ) {

            return $transient;

        } else {

            $plugin_description = '';

            if ( ! function_exists( 'plugins_api' ) ) {
                require_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
            }

            $call_api = plugins_api(
                'plugin_information', array(
                    'slug'   => $slug,
                    'fields' => array(
                        'short_description' => true,
                    ),
                )
            );

            if ( ! empty( $call_api ) ) {
                if ( ! empty( $call_api->short_description ) ) {
                    $plugin_description = strtok( $call_api->short_description, '.' );
                }
            }

            set_transient( $plugin_transient_name, $plugin_description, 10 * DAY_IN_SECONDS );

            return $plugin_description;

        }
    }

    function lawyerpress_lite_check_passed_time( $no_seconds ) {
        $activation_time = get_option( 'lawyerpress_lite_time_activated' );
        if ( ! empty( $activation_time ) ) {
            $current_time    = time();
            $time_difference = (int) $no_seconds;
            if ( $current_time >= $activation_time + $time_difference ) {
                return true;
            } else {
                return false;
            }
        }

        return true;
    }

if ( ! function_exists ( 'lawyerpress_lite_demo_import_files' ) ) {

    function lawyerpress_lite_demo_import_files()
    {
        return array(
            array(
                'import_file_name' => __('Demo One', 'lawyerpress-lite'),
                'import_file_url' => esc_url('https://codethemes.co//wp-content/uploads/theme_updates/demo_content/lawyerpress-lite/Nat4rMBh.xml'),
                'import_widget_file_url' => esc_url('https://codethemes.co//wp-content/uploads/theme_updates/demo_content/lawyerpress-lite/T287JgpA.wie'),
                'import_customizer_file_url' => esc_url('https://codethemes.co//wp-content/uploads/theme_updates/demo_content/lawyerpress-lite/M7Qd2qzR.dat'),
                'import_preview_image_url' => esc_url('https://codethemes.co//wp-content/uploads/theme_updates/demo_content/lawyerpress-lite/screenshot.png'),
                'import_notice' => __( 'After you import this demo, you will have to choose the Home Page separately from customizer.', 'lawyerpress-lite' ),
                'preview_url' => esc_url('https://demo.codethemes.co/lawyerpress-lite/'),
            ),
             
            
           
        );
    }

    add_filter('pt-ocdi/import_files', 'lawyerpress_lite_demo_import_files');
}

add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'NPR': $currency_symbol = 'NPR '; break;
     }
     return $currency_symbol;
}

if (!function_exists('lawyerpress_lite_is_url')):
    function lawyerpress_lite_is_url($uri)
    {
        if (preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $uri)) {
            return $uri;
        } else {
            return false;
        }
    }
endif;