<?php
if(!function_exists('lawyerpress_lite_get_option_defaults_values')):
	/******************** lawyerpress lite DEFAULT OPTION VALUES ******************************************/
	function lawyerpress_lite_get_option_defaults_values() {
		global $lawyerpress_lite_default_values;
		$lawyerpress_lite_default_values = array(
			'lawyerpress_lite_total_features'			=> '3',
			'lawyerpress_lite_disable_features'		=> 0,
			'lawyerpress_lite_sidebar_display'		=> 0,
			'lawyerpress_lite_design_layout' 			=> 'wide-layout',
			'lawyerpress_lite_sidebar_layout_options' => 'right',
			'lawyerpress_lite_header_display'			=> 'header_text',
			'lawyerpress_lite_categories'				=> array(),
			'lawyerpress_lite_reset_all' 				=> 0,
			'lawyerpress_lite_search_text' 			=> __('Search &hellip;', 'lawyerpress-lite'),
			'lawyerpress_lite_blog_content_layout'	=> '',
			'lawyerpress_lite_sidebar_status'	=> 'show-sidebar',

			/* Slider Settings */
			'lawyerpress_lite_slider_no' 				=> '3',
			'lawyerpress_lite_featured_page_slider_1' 				=> '',
			'lawyerpress_lite_featured_page_slider_2' 				=> '',
			'lawyerpress_lite_featured_page_slider_3' 				=> '',
			
			/* Front page feature */
			'lawyerpress_lite_entry_format_blog' 		=> 'show',
			'lawyerpress_lite_entry_meta_blog' 		=> 'show-meta',		
			
			'lawyerpress_lite_featured_block_title' 	=> '',

			/*CTA Options*/
			'cta_title'                                   => '',
			'cta_description'                              => '',
			'cta_button'                              => '',
			'cta_link'                              => '',
			'cta_Backgroundimage'                   => '',
			
			/* Blog Options*/
			'blog_description'                        => '',

			/* Call Out Options*/
			'lawyerpress_lite_callout_section_pages_title'      => '',
			'lawyerpress_lite_callout_section_pages_description' => '',
			'lawyerpress_lite_callout_section_pages_selection'  => '',
			
			/*About Us Options*/
			'lawyerpress_lite_aboutus_page'                    => '',	
			);
		return apply_filters( 'lawyerpress_lite_get_option_defaults_values', $lawyerpress_lite_default_values );
	}
endif;
?>