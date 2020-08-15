<?php
/**
 * @package Online Consulting
 */
?>
 <div class="posts_default_style">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>        
         <?php if (has_post_thumbnail() ){ ?>
			<div class="blogthumbimg">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</div>
		<?php } ?> 
        
        <header class="entry-header">           
            <h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
            <?php if ( 'post' == get_post_type() ) : ?>
                <div class="blog_postmeta">
                    <div class="post-date"><?php echo esc_html( get_the_date() ); ?></div><!-- post-date --> 
                    <?php if( get_theme_mod( 'online_consulting_hide_postcategory' ) == '') { ?> 
                      <span class="blogpost_cat"><?php the_category( __( ', ', 'online-consulting' ));?></span>
                   <?php } ?>                                             
                </div><!-- .blog_postmeta -->
            <?php endif; ?>
        </header><!-- .entry-header -->
          
        <?php if ( is_search() || !is_single() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
           	<?php the_excerpt(); ?>
            <a class="blogpostmorebtn" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more &rarr;','online-consulting'); ?></a>         
        </div><!-- .entry-summary -->
        <?php else : ?>
        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'online-consulting' ) ); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'online-consulting' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
        <?php endif; ?>
        <div class="clear"></div>
    </article><!-- #post-## -->
</div>