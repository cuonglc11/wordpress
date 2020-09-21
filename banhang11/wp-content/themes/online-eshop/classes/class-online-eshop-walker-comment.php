<?php
/**
 * Custom comment walker for this theme
 *
 * @package Online Eshop
 * @since 1.0
 */

/**
 * This class outputs custom comment walker for HTML5 friendly Online Eshop comment and threaded replies.
 *
 * @since 1.0.0
 */
class Online_Eshop_Walker_Comment extends Walker_Comment {

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {

		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

		?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'media dbox parent' : 'media dbox', $comment ); ?>>
			<div class="dleft">
        		<figure>
        			<?php
					$comment_author_url = get_comment_author_url( $comment );
					$comment_author     = get_comment_author( $comment );
					$avatar             = get_avatar( $comment, $args['avatar_size'] );
					if ( 0 != $args['avatar_size'] ) {
						if ( empty( $comment_author_url ) ) {
							echo $avatar;
						}
					} ?>
        		</figure>
    		</div>
    		<div class="dright">
    			<div class="media-body">
    				<h5 class="mt-0">
    				<?php
        				printf(
							'%1$s <span>%2$s %3$s </span>',
							esc_html($comment_author),
							get_comment_date( '', $comment ),
							__('- ', 'online-eshop')
        				);
        				comment_reply_link(
							array_merge(
								$args,
								array(
									'depth'     => $depth,
									'max_depth' => $args['max_depth']
								)
							)
						);

						edit_comment_link( __( 'Edit', 'online-eshop' ), '<span class="edit-link"><i class="fa fa-pencil-square-o"></i>', '</span>' );
    				?>
    				</h5>
					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'online-eshop' ); ?></p>
					<?php endif; ?>

					<?php comment_text(); ?><!-- .comment-content -->

				</div>
			</div>
	<?php
	}
}