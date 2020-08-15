<?php
/**
 * Displays the header content
 *
 * @package lawyerpress-lite
 * @since lawyerpress lite 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="<?php bloginfo('charset'); ?>"/>
        <link rel="profile" href="http://gmpg.org/xfn/11"/>
        <?php if ( is_singular() && pings_open() ) { 
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
       } ?>
        <?php wp_head(); ?>
    </head>
<?php
$lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
if (in_array('layout-pro/layout-pro.php', apply_filters('active_plugins', get_option('active_plugins')))) {
$breadcrumb_metabox = get_post_meta(get_the_ID(),'_my_custom_field', true); }
?> 

<body <?php body_class('woocommerce'); ?>>
<div id="page">
    <?php
    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) && in_array('ecommerce-addons-for-elementor/ecommerce-addons-for-elementor.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
<div id="mySidenav" class="sidenav">
    <a class="closebtn"><i class="fa fa-times"
                           aria-hidden="true"><span><?php echo esc_html__('close', 'lawyerpress-lite') ?></span></i></a>
        <div class="widget_shopping_cart_content"><?php woocommerce_mini_cart(); ?></div>
</div>
    <?php }
    ?>
<header id="top" class="header hero">
    <?php
    if (in_array('layout-pro/layout-pro.php', apply_filters('active_plugins', get_option('active_plugins')))) {
        $layout_pro_customizer = layout_pro_customizer_get_theme_options();
        $header_menu = $layout_pro_customizer['header_option'];
        if ($header_menu != 'menu-below-banner') {
            echo do_shortcode('[layout_pro_multiple_header]');
        }
    } else {
        ?>
        <div class="nav-wrapper header-default header-mobile-hide">
            <div class="container">
                <div class="row">
                    <nav id="primary-nav" class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar-collapse" aria-expanded="false">
                                <span class="sr-only"><?php echo esc_html__('Toggle navigation', 'lawyerpress-lite'); ?></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="site-branding">
                            <?php
                            the_custom_logo();
                            ?>
                            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                      rel="home"><?php bloginfo('name'); ?></a></h1>
                            <?php
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) : ?>
                                <p class="site-description"><?php echo esc_html($description) ; /* WPCS: xss ok. */ ?></p>
                                <?php
                            endif; ?>
                        </div><!-- .site-branding -->
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="navbar-collapse">

                            <?php
                            $args = array(
                                'theme_location' => 'primary',
                                'container' => '',
                                'items_wrap' => '<ul class="nav navbar-nav navbar-right">%3$s</ul>',
                                'walker' => new Lawyerpress_Lite_Nav_Walker(),
                                'fallback_cb' => 'Lawyerpress_Lite_Nav_Walker::fallback'
                            );
                            wp_nav_menu($args);//extract the content from apperance-> nav menu
                            ?>

                        </div><!-- End navbar-collapse -->
                    </nav>
                </div>
            </div>
        </div>


        <?php
    }
    if (is_page_template('page-templates/home-template.php')) {
        lawyerpress_lite_page_sliders();
    }
   
    ?>
</header>
<?php
if (in_array('layout-pro/layout-pro.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    $layout_pro_customizer = layout_pro_customizer_get_theme_options();
    $header_menu = $layout_pro_customizer['header_option'];
    if ($header_menu == 'menu-below-banner') {
        echo do_shortcode('[layout_pro_multiple_header]');
    }
}
if (!is_page_template('page-templates/home-template.php')) {
    if (in_array('layout-pro/layout-pro.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    if($breadcrumb_metabox=='unchecked'|| is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()){
    wp_kses_post(lawyerpress_lite_breadcrumb());
  }
 }
}
?>