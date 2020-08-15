<?php
/**
 * Theme Customizer Functions
 *
 * @package lawyerpress-lite
 * @since lawyerpress lite 1.0
 */
/********************* lawyerpress lite CUSTOMIZER SANITIZE FUNCTIONS *******************************/

function lawyerpress_lite_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function lawyerpress_lite_sanitize_page( $input ) {
	if(  get_post( $input ) ){
		return $input;
	}
	else {
		return '';
	}
}

function lawyerpress_lite_reset_alls( $input ) {
	 if ( $input == 1 ) {
        delete_option( 'lawyerpress_lite_theme_options');
        $input=0;
        return $input;
    }
    else {
        return '';
    }
}

if(!function_exists('lawyerpress_lite_sanitize_checkbox')):
    function lawyerpress_lite_sanitize_checkbox( $input ) {
         return ( ( isset( $input ) && true == $input ) ? true : false );
    }
endif;

if( !function_exists( 'lawyerpress_lite_text_sanitize' ) ) :
    function lawyerpress_lite_text_sanitize( $value ) {
        if(is_array($value)){
            return array_map('strip_tags', $value);

        } else{
            return wp_strip_all_tags( $value );
        }

    }
endif;