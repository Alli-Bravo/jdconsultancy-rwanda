<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lawyerpress-lite
 */
$lawyerpress_lite_settings = lawyerpress_lite_get_theme_options();
$blog_meta = $lawyerpress_lite_settings['lawyerpress_lite_entry_meta_blog'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() && ($blog_meta == 'show-meta') ) :?>
		<div class="entry-meta">
			<?php
			lawyerpress_lite_posted_on();
			lawyerpress_lite_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php lawyerpress_lite_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
        <a class="more-link" title="" href="<?php echo esc_url(get_the_permalink()) ?>"><?php echo esc_html__('Read More','lawyerpress-lite');?></a>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
