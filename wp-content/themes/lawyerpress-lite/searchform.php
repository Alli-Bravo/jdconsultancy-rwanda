<?php
/**
 * Displays the searchform
 *
 * @package lawyerpress-lite
 * @since lawyerpress lite 1.0
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<?php
		$lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
		$lawyerpress_lite_search_form = $lawyerpress_lite_settings['lawyerpress_lite_search_text'];
		if($lawyerpress_lite_search_form !='Search &hellip;'): ?>
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'lawyerpress-lite' ); ?></span>
	</label>
	<label>	
	<input type="search" name="s" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr($lawyerpress_lite_search_form); ?>" autocomplete="off" value="<?php echo get_search_query(); ?>"></label>
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
	<?php else: ?>
	<label>
	<input type="search" name="s" class="search-field" placeholder="<?php esc_attr_e( 'Search &hellip;', 'lawyerpress-lite' ); ?>" autocomplete="off"></label>
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
	<?php endif; ?>
</form> <!-- end .search-form -->