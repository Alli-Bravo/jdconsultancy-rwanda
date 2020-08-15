jQuery( document ).ready(function() {
	 jQuery(document).on('click', '#customize-control-lawyerpress_lite_theme_options-lawyerpress_lite_product_cat_lists select>option', function(e) {

            if(jQuery(this).hasClass('cat_selected')){
                jQuery(this).removeClass('cat_selected');
            }
            else {
                jQuery(this).addClass('cat_selected');
            }
            var last_valid_selection = null;
            jQuery('#customize-control-lawyerpress_lite_theme_options-lawyerpress_lite_product_cat_lists select').change(function(event) {
                if (jQuery(this).val().length > 4) {
                    alert('Please select up to four categories only');
                    jQuery(this).val(last_valid_selection);
                    jQuery(this).find('option').removeAttr('selected');
                } else {
                    last_valid_selection = jQuery(this).val();
                }
            });
        });

});


// added for pro upsell
wp.customize.sectionConstructor['lawyer-customize-pro'] = wp.customize.Section.extend( {

    // No events for this type of section.
    attachEvents: function () {},

    // Always make the section active.
    isContextuallyActive: function () {
        return true;
    }
} );