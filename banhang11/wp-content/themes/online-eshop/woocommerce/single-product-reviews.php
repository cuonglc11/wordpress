<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
	<div id="comments">
		<h2 class="woocommerce-Reviews-title">
			<?php
			$count = $product->get_review_count();
			if ( $count && wc_review_ratings_enabled() ) {
				/* translators: 1: reviews count 2: product name */
				$reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'online-eshop' ) ), esc_html( $count ), '<span>' . esc_html(get_the_title()) . '</span>' );
				echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
			} else {
				echo esc_html__( 'Reviews', 'online-eshop' );
			}
			?>
		</h2>

		<?php if ( have_comments() ) : ?>
			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args',
						array(
							'prev_text' => '&larr;',
							'next_text' => '&rarr;',
							'type'      => 'list',
						)
					)
				);
				echo '</nav>';
			endif;
			?>
		<?php else : ?>
			<p class="woocommerce-noreviews"><?php echo esc_html__( 'There are no reviews yet.', 'online-eshop' ); ?></p>
		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div class="form-area floatleft">
			<?php
			$commenter    = wp_get_current_commenter();
			$comment_form = array(
				/* translators: %s is product title */
				'title_reply'         => have_comments() ? __( 'Add a review', 'online-eshop' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'online-eshop' ), get_the_title() ),
				/* translators: %s is product title */
				'title_reply_to'      => __( 'Leave a Reply to %s', 'online-eshop' ),
				'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
				'title_reply_after'   => '</span>',
				'comment_notes_after' => '',
				'submit_button' => '<div class="btn-area"><button class="btn1" type="submit" id="%2$s">'.__( 'Submit', 'online-eshop').'</button></div>',
				'label_submit'        => '',
				'logged_in_as'        => '',
				'comment_field'       => '',
			);

			$name_email_required = (bool) get_option( 'require_name_email', 1 );
			$fields              = array(
				'author' => array(
					'type'     => 'text',
					'value'    => $commenter['comment_author'],
					'placeholder' => __( 'Name *', 'online-eshop' ),
					'required' => $name_email_required,
				),
				'email' => array(
					'type'     => 'email',
					'value'    => $commenter['comment_author_email'],
					'placeholder' => __( 'Email *', 'online-eshop' ),
					'required' => $name_email_required,
				),
			);

			$comment_form['fields'] = array();
			$field_html  = '<fieldset><div class="row">';
			foreach ( $fields as $key => $field ) {
				$fa_class = ($key == 'author') ? 'user' : 'envelope';
				$field_html .= '<div class="col-sm-6 feld"><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" placeholder="' . esc_attr( $field['placeholder'] ) . '" ' . ( $field['required'] ? 'required' : '' ) . ' /><span><i class="fa fa-' . esc_attr( $fa_class ) . '"></i></span></div>';
			}
			$field_html  .= '</div></fieldset>';

			$account_page_url = wc_get_page_permalink( 'myaccount' );
			if ( $account_page_url ) {
				/* translators: %s opening and closing link tags respectively */
				$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( __( 'You must be %1$slogged in%2$s to post a review.', 'online-eshop' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
			}

			if ( wc_review_ratings_enabled() ) {
				$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . __( 'Your rating', 'online-eshop' ) . '</label><select name="rating" id="rating" required>
					<option value="">' . __( 'Rate&hellip;', 'online-eshop' ) . '</option>
					<option value="5">' . __( 'Perfect', 'online-eshop' ) . '</option>
					<option value="4">' . __( 'Good', 'online-eshop' ) . '</option>
					<option value="3">' . __( 'Average', 'online-eshop' ) . '</option>
					<option value="2">' . __( 'Not that bad', 'online-eshop' ) . '</option>
					<option value="1">' . __( 'Very poor', 'online-eshop' ) . '</option>
				</select></div>';
			}

			$comment_form['comment_field'] .= '<fieldset><div class="feld"><textarea id="comment" name="comment" placeholder="'.__('Comment here *','online-eshop').'" required></textarea><span class="msg"><i class="fa fa-pencil-square-o"></i></span></div></fieldset>';

			comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
			?>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required"><?php echo esc_html__( 'Only logged in customers who have purchased this product may leave a review.', 'online-eshop' ); ?></p>
	<?php endif; ?>

	<div class="clear"></div>
</div>
