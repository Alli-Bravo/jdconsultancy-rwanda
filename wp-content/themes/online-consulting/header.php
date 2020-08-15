<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Online Consulting
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#site_content_panel">
<?php esc_html_e( 'Skip to content', 'online-consulting' ); ?>
</a>

<?php
$online_consulting_show_hdr_contact_details_area 	= get_theme_mod('online_consulting_show_hdr_contact_details_area', false);
$online_consulting_show_home_slider_section 	  	= get_theme_mod('online_consulting_show_home_slider_section', false);
$online_consulting_show_3column_services_sections 	= get_theme_mod('online_consulting_show_3column_services_sections', false);
$online_consulting_show_site_welcomepageinfo_area	 = get_theme_mod('online_consulting_show_site_welcomepageinfo_area', false);
?>
<div id="sitelayout" <?php if( get_theme_mod( 'online_consulting_boxlayout' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($online_consulting_show_home_slider_section)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>

<div class="site-header <?php echo esc_attr($inner_cls); ?> <?php if( get_theme_mod('online_consulting_stickyheader',false) == false ) { ?>no-sticky<?php } ?>"> 
  <div class="container">   
      <div class="logo">
        <?php online_consulting_the_custom_logo(); ?>
           <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
      </div><!-- logo -->
      
      
    <?php if( $online_consulting_show_hdr_contact_details_area != ''){ ?> 
      <div class="cotact_info_area">      
        <?php 
            $online_consulting_site_hdr_office_hours = get_theme_mod('online_consulting_site_hdr_office_hours');
               if( !empty($online_consulting_site_hdr_office_hours) ){ ?> 
               <div class="infobox">
                 <i class="far fa-clock"></i>
                 <span>
			       <?php esc_html_e('Contact Time','online-consulting'); ?>
                   <strong><?php echo esc_html($online_consulting_site_hdr_office_hours); ?></strong>
                </span>
              </div>
         <?php } ?> 
         
         
         <?php 
            $online_consulting_site_hdr_teldetails = get_theme_mod('online_consulting_site_hdr_teldetails');
               if( !empty($online_consulting_site_hdr_teldetails) ){ ?> 
               <div class="infobox">
                 <i class="fas fa-phone-volume"></i>
                 <span>
			       <?php esc_html_e('Phone Number','online-consulting'); ?>
                   <strong><?php echo esc_html($online_consulting_site_hdr_teldetails); ?></strong>
                </span>
              </div>
         <?php } ?> 
         
         
         <?php 
            $online_consulting_site_hdr_email_info = get_theme_mod('online_consulting_site_hdr_email_info');
               if( !empty($online_consulting_site_hdr_email_info) ){ ?> 
               <div class="infobox">
                 <i class="fas fa-envelope-open-text"></i>
                 <span>
			       <?php esc_html_e('Contact Email','online-consulting'); ?>
                   <strong><a href="<?php echo esc_url('mailto:'.get_theme_mod('online_consulting_site_hdr_email_info')); ?>">
				   <?php echo esc_html($online_consulting_site_hdr_email_info); ?></a></strong>
                </span>
              </div>
         <?php } ?>
          </div>
	<?php } ?>  
     

 <div class="clear"></div> 
    <div class="navigation_bar">
         <div class="toggle">
           <a class="toggleMenu" href="#"><?php esc_html_e('Menu','online-consulting'); ?></a>
         </div><!-- toggle --> 
         <div class="site-navi">                   
            <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
         </div><!--.site-navi -->
         <div class="clear"></div>  
   </div><!--.navigation_bar -->
  <div class="clear"></div> 
  </div><!-- .container --> 
</div><!--.site-header --> 
  
<?php 
if ( is_front_page() && !is_home() ) {
if($online_consulting_show_home_slider_section != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('online_consulting_home_slide_pagecol'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('online_consulting_home_slide_pagecol'.$i,true));
	  }
	}
?> 
<div class="slider_wrapper">                
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo esc_attr( $j ); ?>" class="nivo-html-caption">         
    	<h2><?php the_title(); ?></h2>
    	<?php the_excerpt(); ?>
		<?php
        $online_consulting_home_slide_buttontext = get_theme_mod('online_consulting_home_slide_buttontext');
        if( !empty($online_consulting_home_slide_buttontext) ){ ?>
            <a class="slide_morebtn" href="<?php the_permalink(); ?>"><?php echo esc_html($online_consulting_home_slide_buttontext); ?></a>
        <?php } ?>                  
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>   
<?php } ?>
<?php } } ?>
       
        
<?php if ( is_front_page() && ! is_home() ) {
 if( $online_consulting_show_3column_services_sections != ''){ ?>  
  <div id="sections_first">
     <div class="container">        
       <?php 
        for($n=1; $n<=3; $n++) {    
        if( get_theme_mod('online_consulting_3page_servicesbx'.$n,false)) {      
            $queryvar = new WP_Query('page_id='.absint(get_theme_mod('online_consulting_3page_servicesbx'.$n,true)) );		
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
            <div class="page_three_box <?php if($n % 3 == 0) { echo "last_column"; } ?>">                                       
                <?php if(has_post_thumbnail() ) { ?>
                <div class="page_img_box"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>        
                <?php } ?>
                <div class="page_content">              	
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <?php the_excerpt(); ?>
                </div>                      
            </div>
            <?php endwhile;
            wp_reset_postdata();                                  
        } } ?>                                 
    <div class="clear"></div>  
   </div><!-- .container -->
</div><!-- #sections_first -->              
<?php } ?>



<?php if( $online_consulting_show_site_welcomepageinfo_area != ''){ ?>  
<section id="sections_second">
<div class="container">                               
<?php 
if( get_theme_mod('online_consulting_sitewel_pgebox',false)) {     
$queryvar = new WP_Query('page_id='.absint(get_theme_mod('online_consulting_sitewel_pgebox',true)) );			
    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
     <div class="about_imgcol"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>    
     <div class="about_content_column">   
     <h3><?php the_title(); ?></h3>   
     <?php the_content(); ?>     
    </div>                                          
    <?php endwhile;
     wp_reset_postdata(); ?>                                    
    <?php } ?>                                 
<div class="clear"></div>                       
</div><!-- container -->
</section><!-- #sections_second-->
<?php } ?>
<?php } ?>