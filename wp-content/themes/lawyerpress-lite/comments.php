<?php
/**
 * The template for displaying comments.
 *
 * @package lawyerpress-lite
 * @since lawyerpress lite 1.0
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
	<h2 class="comments-title">
		<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'lawyerpress-lite' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s Reply to &ldquo;%2$s&rdquo;',
							'%1$s Replies to &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'lawyerpress-lite'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
	</h2>
	<?php //lawyerpress_lite_comment_nav(); ?>
	<?php 
	if ( ! function_exists( 'lawyerpress_lite_default_comment' ) ) {
	function lawyerpress_lite_default_comment(){
		$comment_args = array(
            'prev_text'          => esc_attr( 'Older comments', 'lawyerpress-lite' ),
            'next_text'          => esc_attr( 'Newer comments', 'lawyerpress-lite' ),
            'screen_reader_text' => ''
        );
		return the_comments_navigation( $comment_args );
		}
	}

	lawyerpress_lite_default_comment();
	?>
	<ol class="comment-list">
	<?php
		wp_list_comments( array(
			'style'       => 'ol',
			'short_ping'  => true,
			'avatar_size' => 56,
		) );
	?>
	</ol> <!-- .comment-list -->
	<?php //lawyerpress_lite_comment_nav();
	lawyerpress_lite_default_comment();
	
	 ?>
	<?php endif; // have_comments() ?>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<p class="no-comments">
	<?php esc_html_e( 'Comments are closed.', 'lawyerpress-lite' ); ?>
	</p>
	<?php endif; ?>
	<?php comment_form(); ?>
</div> <!-- .comments-area -->