<?php
$lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
/******************** lawyerpress lite THEME OPTIONS ******************************************/
//Support section
    $wp_customize->register_section_type( Pro::class );

     $wp_customize->add_section(new Pro($wp_customize,'support_links',array(
            'priority' => 1,
            'title'       => __( 'Lawyerpress-Pro', 'lawyerpress-lite' ),
            'button_text' => __( 'Go Pro',        'lawyerpress-lite' ),
            'button_url'  => 'https://codethemes.co/product/lawyerpress/'
            
            )
        )
    );

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    /*        Product Cat   */
    $product_categories = get_terms('product_cat');
    if (is_wp_error($product_categories))
        $product_categories = array();
    $count = count($product_categories);
    if ($count > 0 && !is_wp_error($product_categories)) {
        $select_categories = array();
        $select_categories[''] = __('Select', 'lawyerpress-lite');
        foreach ($product_categories as $product_category) {
            $select_categories[$product_category->term_id] = $product_category->name;
        }
    } else {
        $select_categories = array('' => __('Select', 'lawyerpress-lite'));
    }

    $wp_customize->add_section('lawyerpress_lite_product_categories', array(
        'title' => __('Product Categories', 'lawyerpress-lite'),
        'priority' => 11,
        'panel' => 'layout_pro_options_panel'
    ));

}


	$wp_customize->add_section('lawyerpress_lite_custom_header', array(
		'title' => __('General Options', 'lawyerpress-lite'),
		'priority' => 1,
		'panel' => 'layout_pro_options_panel'
	));
	$wp_customize->add_setting( 'lawyerpress_lite_theme_options[lawyerpress_lite_reset_all]', array(
		'default' => 0,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'lawyerpress_lite_reset_alls',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( 'lawyerpress_lite_theme_options[lawyerpress_lite_reset_all]', array(
		'priority'=>50,
		'label' => __('Reset all default settings. (Refresh it to view the effect)', 'lawyerpress-lite'),
		'section' => 'lawyerpress_lite_custom_header',
		'type' => 'checkbox',
	));

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    $wp_customize->add_section('lawyerpress_lite_feature_section', array(
        'title' => __('Featured Section', 'lawyerpress-lite'),
        'priority' => 6,
        'panel' => 'layout_pro_options_panel'
    ));
}
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    $wp_customize->add_section('lawyerpress_lite_recent_section', array(
        'title' => __('Recent Section', 'lawyerpress-lite'),
        'priority' => 4,
        'panel' => 'layout_pro_options_panel'
    ));
}

    $wp_customize->add_section('lawyerpress_lite_cta_section', array(
        'title' => __('CTA Section', 'lawyerpress-lite'),
        'priority' => 5,
        'panel' => 'layout_pro_options_panel'
    ));
    $wp_customize->add_setting('lawyerpress_lite_theme_options[cta_title]', array(
        'capability' => 'edit_theme_options',
        'default' => $lawyerpress_lite_settings['cta_title'],
        'sanitize_callback' => 'esc_html',
        'type' => 'option',
    ));
    $wp_customize->add_control('lawyerpress_lite_theme_options[cta_title]', array(
        'label' => __('Section Title', 'lawyerpress-lite'),
        'priority' => 1,
        'section' => 'lawyerpress_lite_cta_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('lawyerpress_lite_theme_options[cta_description]', array(
        'capability' => 'edit_theme_options',
        'default' => $lawyerpress_lite_settings['cta_description'],
        'sanitize_callback' => 'esc_html',
        'type' => 'option',
    ));
    $wp_customize->add_control('lawyerpress_lite_theme_options[cta_description]', array(
        'label' => __('Section Description', 'lawyerpress-lite'),
        'priority' => 1,
        'section' => 'lawyerpress_lite_cta_section',
        'type' => 'text',
    ));
    $wp_customize->add_setting('lawyerpress_lite_theme_options[cta_button]', array(
        'capability' => 'edit_theme_options',
        'default' => $lawyerpress_lite_settings['cta_button'],
        'sanitize_callback' => 'esc_html',
        'type' => 'option',
    ));
    $wp_customize->add_control('lawyerpress_lite_theme_options[cta_button]', array(
        'label' => __('Button Title', 'lawyerpress-lite'),
        'priority' => 1,
        'section' => 'lawyerpress_lite_cta_section',
        'type' => 'text',
    ));
    $wp_customize->add_setting('lawyerpress_lite_theme_options[cta_link]', array(
        'capability' => 'edit_theme_options',
        'default' => $lawyerpress_lite_settings['cta_button'],
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
    ));
    $wp_customize->add_control('lawyerpress_lite_theme_options[cta_link]', array(
        'label' => __('Button Link', 'lawyerpress-lite'),
        'priority' => 1,
        'section' => 'lawyerpress_lite_cta_section',
        'type' => 'text',
    ));

$wp_customize->add_setting('lawyerpress_lite_theme_options[cta_Backgroundimage]',
    array(
        'type' => 'option',
        'default' => $lawyerpress_lite_settings['cta_Backgroundimage'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,'lawyerpress_lite_theme_options[cta_Backgroundimage]',
        array(

            'section' => 'lawyerpress_lite_cta_section',
            'label' => esc_html__('Upload Background Image', 'lawyerpress-lite'),
            'settings' => 'lawyerpress_lite_theme_options[cta_Backgroundimage]'
        ) )
);


	/*Blog Section*/

    $wp_customize->add_section('lawyerpress_lite_blogoption', array(
            'title' => __('Blog Options', 'lawyerpress-lite'),
            'priority' => 7,
            'panel' => 'layout_pro_options_panel'
        ));

        $wp_customize->add_setting('lawyerpress_lite_theme_options[blog_description]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'lawyerpress_lite_sanitize_page',
            'default' => $lawyerpress_lite_settings['blog_description'],
        )
    );
    $wp_customize->add_control('lawyerpress_lite_theme_options[blog_description]',
        array(
            'type' => 'dropdown-pages',
            'section' => 'lawyerpress_lite_blogoption',
            'label' => esc_html__('Select Page For Blog Title & Description', 'lawyerpress-lite'),
            'settings' => 'lawyerpress_lite_theme_options[blog_description]'
        )
    );


