<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Online Eshop
 * @since 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
} ?>
<?php if ( have_comments() ) : ?>
<div class="comments-area floatleft">
	<div class="comments-heading">
		<h2><?php $comments_number = get_comments_number(); printf(_nx('Comment <span>(%1$s)</span>', 'Comments <span>(%1$s)</span>', $comments_number, 'Comments', 'online-eshop' ), number_format_i18n( $comments_number ), get_the_title() ); ?></h2>
	</div><!-- .comments-heading -->

	<?php
	// Show comment form at top if showing newest comments at the top.
	if ( comments_open() ) {
		online_eshop_comment_form( 'desc' );
	}
	?>
	<div class="comments-list">
		<?php
		wp_list_comments(
			array(
				'walker'      => new Online_Eshop_Walker_Comment(),
				'avatar_size' => online_eshop_get_avatar_size(),
				'short_ping'  => true,
				'style'       => 'div',
			)
		);
		?>
	</div><!-- .comment-list -->
</div>
<?php endif; // if have_comments();	

// Show comment form at bottom if showing newest comments at the bottom.
if ( comments_open() && 'asc' === strtolower( get_option( 'comment_order', 'asc' ) ) ) : ?>
	<div class="form-area floatleft">
		<?php comment_form();; ?>
	</div>
	<?php
endif;
?>