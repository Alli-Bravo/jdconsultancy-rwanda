<?php
/**
 *Online Consulting About Theme
 *
 * @package Online Consulting
 */

//about theme info
add_action( 'admin_menu', 'online_consulting_abouttheme' );
function online_consulting_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'online-consulting'), __('About Theme Info', 'online-consulting'), 'edit_theme_options', 'online_consulting_guide', 'online_consulting_mostrar_guide');   
} 

//Info of the theme
function online_consulting_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'online-consulting'); ?></h3>
		   </div>
          <p><?php esc_html_e('Online Consulting is a free finance WordPress theme oriented to consulting, business and financial services. It is perfect platform to create a professional website for business consultant, accountants, investment firms, insurance, tax advisor, startups, financial advisor, marketing and any other consultancy corporations. This is a versatile, tech-savvy and responsive multipurpose website theme that is developed to satisfy all business needs. This theme can also be used for corporate, business, personal blog, law firm, banking, ecommerce, fashion blog, yoga, charity, gym, travel, news, education, transport and any other general business needs. This theme is the perfect and reliable toolkit for crafting impressive websites to grow your online business.', 'online-consulting'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'online-consulting'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'online-consulting'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'online-consulting'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'online-consulting'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'online-consulting'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'online-consulting'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'online-consulting'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'online-consulting'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'online-consulting'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">    
     <a href="<?php echo esc_url( online_consulting_live_demo ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'online-consulting'); ?></a> | 
    <a href="<?php echo esc_url( online_consulting_theme_doc ); ?>" target="_blank"><?php esc_html_e('Documentation', 'online-consulting'); ?></a>    
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>