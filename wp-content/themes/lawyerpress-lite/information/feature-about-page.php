<?php
/**
 * Lite Manager
 *
 * @package lawyerpress-lite
 * @since 1.0.12
 */


/**
 * About page class
 */
require_once get_template_directory() . '/information/lawyerpress-lite-about-page/class-lawyerpress-lite-about-page.php';

/*
* About page instance
*/
$config = array(
	// Menu name under Appearance.
	'menu_name'           => apply_filters( 'lawyerpress_lite_about_page_filter', __( 'About LawyerPress Lite', 'lawyerpress-lite' ), 'menu_name' ),
	// Page title.
	'page_name'           => apply_filters( 'lawyerpress_lite_about_page_filter', __( 'About LawyerPress Lite', 'lawyerpress-lite' ), 'page_name' ),
	// Main welcome title
	/* translators: s - theme name */
	'welcome_title'       => apply_filters( 'lawyerpress_lite_about_page_filter', sprintf( __( 'Welcome to %s! - Version ', 'lawyerpress-lite' ), 'lawyerpress-lite' ), 'welcome_title' ),
	// Main welcome content
	'welcome_content'     => apply_filters( 'lawyerpress_lite_about_page_filter', esc_html__( 'LawyerPress Lite is a responsive multipurpose WordPress theme created keeping multipurpose functionality in mind which caters the website building needs. It is simple yet powerful and versatile multi purpose theme which is not only focused on corporate or business. It is also one of the ideal platforms for initiating any type of projects like agency, events, portfolio, eCommerce, blogs, and so on. Built in with the painstaking attention, LawyerPress Lite provides an aesthetic design and quality performance to enrich the visitors\' experience, hence, helps to take your business to the next level. If you are against of seeking help from the developer, then you may. It also consists dozens of pre-made custom elements. The complete outside the box Elementer Pro Page Builder Plugin is there to efficiently customize the most of the elements of the theme. Wow, the theme has both Elementor elements and pre-made Custom Elements, which means endless possibilities and extensions. With the help of these elements, you can effortlessly create niche focused or any kind of website.', 'lawyerpress-lite' ), 'welcome_content' ),
	/**
	 * Tabs array.
	 *
	 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
	 * the will be the name of the function which will be used to render the tab content.
	 */
	'tabs'                => array(
		'getting_started'     => __( 'Getting Started', 'lawyerpress-lite' ),
		'recommended_actions' => __( 'Required Actions', 'lawyerpress-lite' ),
		'demo_import'         => __( 'Demo Import', 'lawyerpress-lite' ),
		'support'             => __( 'Support', 'lawyerpress-lite' ),
		'changelog'           => __( 'Request Customization Support', 'lawyerpress-lite' ),
		
	),
	// Support content tab.
	'support_content'     => array(
		'first'  => array(
			'title'        => esc_html__( 'Contact Support', 'lawyerpress-lite' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'We want to make sure you have the best experience using LawyerPress Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using LawyerPress Lite as much as we enjoy creating great products.', 'lawyerpress-lite' ),
			'button_label' => esc_html__( 'Contact Support', 'lawyerpress-lite' ),
			'button_link'  => esc_url( 'https://codethemes.co/support' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Documentation', 'lawyerpress-lite' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use LawyerPress Lite.', 'lawyerpress-lite' ),
			'button_label' => esc_html__( 'Read full documentation', 'lawyerpress-lite' ),
			'button_link'  => esc_url('https://docs.codethemes.co/docs/lawyer-press-lite/'),
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'third'  => array(
			'title'        => esc_html__( 'Request Customization Support', 'lawyerpress-lite' ),
			'icon'         => 'dashicons dashicons-portfolio',
			'text'         => esc_html__( 'Want to get the gist on the latest theme changes? Just consult our changelog below to get a taste of the recent fixes and features implemented.', 'lawyerpress-lite' ),
			'button_label' => esc_html__( 'Request Customization Support', 'lawyerpress-lite' ),
			'button_link'  => esc_url( 'https://codethemes.co/support/#customization_support' ),
			'is_button'    => false,
			'is_new_tab'   => false,
		),
	),

	// for democontent tab 
	'demo_import'     => array(),
	// Getting started tab
	'getting_started'     => array(
		'first'  => array(
			'title'               => esc_html__( 'Required actions', 'lawyerpress-lite' ),
			'text'                => esc_html__( 'We have compiled a list of steps for you to take so we can ensure that the experience you have using one of our products is very easy to follow.', 'lawyerpress-lite' ),
			'button_label'        => esc_html__( 'Required actions', 'lawyerpress-lite' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=lawyerpress-lite-welcome&tab=recommended_actions' ) ),
			'is_button'           => false,
			'recommended_actions' => true,
			'is_new_tab'          => false,
		),
		'second' => array(
			'title'               => esc_html__( 'Read full documentation', 'lawyerpress-lite' ),
			'text'                => esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use lawyerpress-lite.', 'lawyerpress-lite' ),
			'button_label'        => esc_html__( 'Documentation', 'lawyerpress-lite' ),
			'button_link'         => esc_url('https://docs.codethemes.co/docs/lawyer-press-lite/'),
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		'third'  => array(
			'title'               => esc_html__( 'Go to the Customizer', 'lawyerpress-lite' ),
			'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'lawyerpress-lite' ),
			'button_label'        => esc_html__( 'Go to the Customizer', 'lawyerpress-lite' ),
			'button_link'         => esc_url( admin_url( 'customize.php' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
	),
	// Free vs PRO array.
	
	// Plugins array.
	// Required actions array.
	'recommended_actions' => array(
		'install_label'    => esc_html__( 'Install and Activate', 'lawyerpress-lite' ),
		'activate_label'   => esc_html__( 'Activate', 'lawyerpress-lite' ),
		'deactivate_label' => esc_html__( 'Deactivate', 'lawyerpress-lite' ),
		'content'          => array(

            'one-click-demo-import'           => array(
                'title'       => 'One Click Demo Import',
                'description' => lawyerpress_lite_get_wporg_plugin_description( 'one-click-demo-import' ),
                'check'       => ( defined( 'OCDM_VERSION' ) || ! lawyerpress_lite_check_passed_time( '259200' ) ),
                'plugin_slug' => 'one-click-demo-import',
                'id'          => 'one-click-demo-import',
                'network'     => 'live',
            ),


			'elementor'           => array(
				'title'       => 'Elementor',
				'description' => lawyerpress_lite_get_wporg_plugin_description( 'elementor' ),
				'check'       => ( defined( 'ELEMENTOR_LITE_VERSION' ) || ! lawyerpress_lite_check_passed_time( '259200' ) ),
				'plugin_slug' => 'elementor',
				'id'          => 'elementor',
                'network'     => 'live',
            ),
            
               'weForms'           => array(
                'title'       => 'weForms',
                'description' => lawyerpress_lite_get_wporg_plugin_description( 'weforms' ),
                'check'       => ( defined( 'CONTACT_VERSION' ) || ! lawyerpress_lite_check_passed_time( '259200' ) ),
                'plugin_slug' => 'weforms',
                'id'          => 'weforms',
                'network'     => 'live',
            ),
            
		),
	),
);
Lawyerpress_Lite_About_Page::init( apply_filters( 'lawyerpress_lite_about_page_array', $config ) );

/*
 * Notifications in customize
 */
require get_template_directory() . '/information/class-lawyerpress-lite-customizer-notify.php';

$config_customizer = array(
	'recommended_plugins'       => array(
		'lawyerpress-lite-companion' => array(
			'recommended' => true,
			/* translators: s - Orbit Fox Companion */
			'description' => sprintf( esc_html__( 'If you want to take full advantage of the options this theme has to offer, please install and activate %s.', 'lawyerpress-lite' ), sprintf( '<strong>%s</strong>', 'Orbit Fox Companion' ) ),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'lawyerpress-lite' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugins', 'lawyerpress-lite' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'lawyerpress-lite' ),
	'activate_button_label'     => esc_html__( 'Activate', 'lawyerpress-lite' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'lawyerpress-lite' ),
);
Lawyerpress_Lite_Customizer_Notify::init( apply_filters( 'Lawyerpress_Lite_Customizer_Notify_array', $config_customizer ) );