<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Online Consulting
 */

get_header(); ?>

<div class="container">
    <div id="site_content_panel">
        <div class="left_panel_content">
            <header class="page-header">
                <h1 class="entry-title"><?php esc_html_e( '404 Not Found', 'online-consulting' ); ?></h1>                
            </header><!-- .page-header -->
            <div class="page-content">
                <p><?php esc_html_e( 'Looks like you have taken a wrong turn.....Dont worry... it happens to the best of us.', 'online-consulting' ); ?></p>  
            </div><!-- .page-content -->
        </div><!-- left_panel_content-->   
        <?php get_sidebar();?>       
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>