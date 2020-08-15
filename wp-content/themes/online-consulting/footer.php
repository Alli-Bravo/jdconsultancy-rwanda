<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Online Consulting
 */
 
?>

<div class="site-footer">
           <div class="container fixfooter">           
          <?php if ( is_active_sidebar( 'footer-widget-column-1' ) ) : ?>
                <div class="widget-column-1">  
                    <?php dynamic_sidebar( 'footer-widget-column-1' ); ?>
                </div>
           <?php endif; ?>
          
          <?php if ( is_active_sidebar( 'footer-widget-column-2' ) ) : ?>
                <div class="widget-column-2">  
                    <?php dynamic_sidebar( 'footer-widget-column-2' ); ?>
                </div>
           <?php endif; ?>
           
           <?php if ( is_active_sidebar( 'footer-widget-column-3' ) ) : ?>
                <div class="widget-column-3">  
                    <?php dynamic_sidebar( 'footer-widget-column-3' ); ?>
                </div>
           <?php endif; ?> 
           
           <?php if ( is_active_sidebar( 'footer-widget-column-4' ) ) : ?>
                <div class="widget-column-4">  
                    <?php dynamic_sidebar( 'footer-widget-column-4' ); ?>
                </div>
           <?php endif; ?>          
           
           <div class="clear"></div>
      </div><!--end .container-->            

        <div class="footer-bottom"> 
            <div class="container">
                <div class="powerby">
				   <?php bloginfo('name'); ?> - <?php esc_html_e('Proudly Powered by WordPress','online-consulting'); ?>               
                </div>                        	
                <div class="design-by">
				   <?php esc_html_e('Theme by Grace Themes','online-consulting'); ?>
                </div>
                <div class="clear"></div>
                                
             </div><!--end .container-->             
        </div><!--end .footer-bottom-->  
                     
     </div><!--end #site-footer-->
</div><!--#end sitelayout-->

<?php wp_footer(); ?>
</body>
</html>