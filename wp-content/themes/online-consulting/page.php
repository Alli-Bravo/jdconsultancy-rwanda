<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Online Consulting
 */

get_header(); ?>

<div class="container">
  <div id="site_content_panel">
         <div class="left_panel_content <?php if( get_theme_mod( 'online_consulting_hidesidebar_pages' ) ) { ?>fullwidth<?php } ?>">               
                <?php while( have_posts() ) : the_post(); ?>                               
                    <?php get_template_part( 'content', 'page' ); ?>
                    <?php
                        //If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() )
                            comments_template();
                        ?>                               
                <?php endwhile; ?>                     
        </div><!-- .left_panel_content-->   
        <?php if( get_theme_mod( 'online_consulting_hidesidebar_pages' ) == '') { ?> 
          	<?php get_sidebar();?>
        <?php } ?>  
<div class="clear"></div>
</div><!-- #site_content_panel --> 
</div><!-- .container --> 
<?php get_footer(); ?>