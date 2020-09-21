<?php
/**
 * Wishlist page template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 2.0.12
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly
?>

<?php do_action( 'yith_wcwl_before_wishlist_form' ); ?>

<form id="yith-wcwl-form" action="" method="post" class="woocommerce">

    <?php wp_nonce_field( 'yith-wcwl-form', 'yith_wcwl_form_nonce' ) ?>

    <!-- TITLE -->
    <?php
    do_action( 'yith_wcwl_before_wishlist_title' );

    if( ! empty( $page_title ) ) :
    ?>
     
        <?php if( $is_custom_list ): ?>
            <div class="hidden-title-form">
                <input type="text" value="<?php echo esc_attr($page_title); ?>" name="<?php echo esc_attr('wishlist_name','online-eshop'); ?>"/>
                <button>
                    <?php echo apply_filters( 'yith_wcwl_save_wishlist_title_icon', '<i class="fa fa-check"></i>' )?>
                    <?php _e( 'Save', 'online-eshop' )?>
                </button>
                <a class="hide-title-form btn button">
                    <?php echo apply_filters( 'yith_wcwl_cancel_wishlist_title_icon', '<i class="fa fa-remove"></i>' )?>
                    <?php _e( 'Cancel', 'online-eshop' )?>
                </a>
            </div>
        <?php endif; ?>
    <?php
    endif;

     do_action( 'yith_wcwl_before_wishlist' ); ?>

    <!-- WISHLIST TABLE -->
	<table class="wishlist-table table" data-pagination="<?php echo esc_attr( $pagination )?>" data-per-page="<?php echo esc_attr( $per_page )?>" data-page="<?php echo esc_attr( $current_page )?>" data-id="<?php echo $wishlist_id ?>" data-token="<?php echo esc_attr($wishlist_token); ?>">
        <?php $column_count = 2; ?>
        <tbody>
        <?php
        if( count( $wishlist_items ) > 0 ) :
	        $added_items = array();
            foreach( $wishlist_items as $item ) :
                global $product;

	            $item['prod_id'] = yit_wpml_object_id ( $item['prod_id'], 'product', true );

	            if( in_array( $item['prod_id'], $added_items ) ){
		            continue;
	            }

	            $added_items[] = $item['prod_id'];
	            $product = wc_get_product( $item['prod_id'] );
	            $availability = $product->get_availability();
	            $stock_status = isset( $availability['class'] ) ? $availability['class'] : false;

                if( $product && $product->exists() ) : ?>
                    <tr id="yith-wcwl-row-<?php echo esc_attr($item['prod_id']); ?>" data-row-id="<?php echo esc_attr($item['prod_id']); ?>">
	                    <?php if( $show_cb ) : ?>
		                    <td class="product-checkbox">
			                    <input type="checkbox" value="<?php echo esc_attr( $item['prod_id'] ) ?>" name="add_to_cart[]" <?php echo ( ! $product->is_type( 'simple' ) ) ? 'disabled="disabled"' : '' ?>/>
		                    </td>
	                    <?php endif ?>

                        <?php if( $is_user_owner ): ?>
                        <td>
                            <a href="<?php echo esc_url( add_query_arg( 'remove_from_wishlist', $item['prod_id'] ) ) ?>" class="close-ico remove_from_wishlist" title="<?php echo apply_filters( 'yith_wcwl_remove_product_wishlist_message_title',__( 'Remove this product', 'online-eshop' )); ?>"><i class="fa fa-close"></i></a>
                        </td>
                        <?php endif; ?>
                        <td>
                            <div class="products-detail">
                                <div class="dbox">
                                    <div class="dleft">
                                        <figure><a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item['prod_id'] ) ) ) ?>"><?php echo
                                        $product->get_image() ?></a></figure>
                                    </div>
                                    <div class="dright">
                                        <span><?php echo apply_filters( 'yith_wcwl_wishlist_view_name_heading', __( 'By Brand Name', 'online-eshop' ) ) ?></span>
                                        <h4><a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item['prod_id'] ) ) ) ?>">
                                            <?php echo apply_filters( 'woocommerce_in_cartproduct_obj_title', esc_html($product->get_title()), $product ) ?></a><?php do_action( 'yith_wcwl_table_after_product_name', $item ); ?></h4>
                                        <?php if( $show_last_column ): ?>
                                        <?php if( $show_last_column ):
                                        if( $show_dateadded && isset( $item['dateadded'] ) ):
                                            echo '<span class="dateadded">' . sprintf( __( 'Added on : %s', 'online-eshop' ), date_i18n( get_option( 'date_format' ), strtotime( $item['dateadded'] ) ) ) . '</span>';
                                        endif;
                                        ?>

                                        <!-- Add to cart button -->
                                        <?php if( $show_add_to_cart && isset( $stock_status ) && $stock_status != 'out-of-stock' ): ?>
                                            <?php woocommerce_template_loop_add_to_cart(); ?>
                                        <?php endif ?>

                                        <!-- Change wishlist -->
                                        <?php if( $available_multi_wishlist && is_user_logged_in() && count( $users_wishlists ) > 1 && $move_to_another_wishlist && $is_user_owner ): ?>
                                        <select class="change-wishlist selectBox">
                                            <option value=""><?php _e( 'Move', 'online-eshop' ) ?></option>
                                            <?php
                                            foreach( $users_wishlists as $wl ):
                                                if( $wl['wishlist_token'] =['wishlist_token'] ){
                                                    continue;
                                                }
                                            ?>
                                                <option value="<?php echo esc_attr( $wl['wishlist_token'] ) ?>">
                                                    <?php
                                                    $wl_title = ! empty( $wl['wishlist_name'] ) ? esc_html( $wl['wishlist_name'] ) : esc_html( $default_wishlsit_title );
                                                    if( $wl['wishlist_privacy'] == 1 ){
                                                        $wl_privacy = __( 'Shared', 'online-eshop' );
                                                    }
                                                    elseif( $wl['wishlist_privacy'] == 2 ){
                                                        $wl_privacy = __( 'Private', 'online-eshop' );
                                                    }
                                                    else{
                                                        $wl_privacy = __( 'Public', 'online-eshop' );
                                                    }

                                                    echo sprintf( '%s - %s', $wl_title, $wl_privacy );
                                                    ?>
                                                </option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <?php endif; ?>

                                        <!-- Remove from wishlist -->
                                        <?php if( $is_user_owner && $repeat_remove_button ): ?>
                                            <a href="<?php echo esc_url( add_query_arg( 'remove_from_wishlist', $item['prod_id'] ) ) ?>" class="remove_from_wishlist button" title="<?php echo apply_filters( 'yith_wcwl_remove_product_wishlist_message_title',esc_attr( 'Remove this product', 'online-eshop' )); ?>"><?php _e( 'Remove', 'online-eshop' ) ?></a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <?php if( $show_price ) : ?>
                            <td>
                                <div class="price">
                                <span><?php echo apply_filters( 'yith_wcwl_wishlist_view_price_heading', __( 'Price', 'online-eshop' ) ) ?></span>
                                <?php
                                $base_product = $product->is_type( 'variable' ) ? $product->get_variation_regular_price( 'max' ) : $product->get_price();
                                echo $base_product ? $product->get_price_html() : apply_filters( 'yith_free_text', __( 'Free!', 'online-eshop' ), $product );
                                ?>
                                </div>
                            </td>
                        <?php endif ?>

                        <?php if( $show_stock_status ) : ?>
                            <td class="text-right">
                                <div class="quantity">
                                <span><?php echo apply_filters( 'yith_wcwl_wishlist_view_stock_heading', __( 'Stock Status', 'online-eshop' ) ) ?></span>
                                <?php echo $stock_status == 'out-of-stock' ? __( 'Out of Stock', 'online-eshop' ) : __( 'In Stock', 'online-eshop' ); ?>
                                </div>
                            </td>
                        <?php endif ?>

                    </tr>
                <?php
                endif;
            endforeach;
        else: ?>
            <tr>
                <td colspan="<?php echo esc_attr( $column_count ) ?>" class="wishlist-empty"><?php echo apply_filters( 'yith_wcwl_no_product_to_remove_message', __( 'No products were added to the wishlist', 'online-eshop' ) ) ?></td>
            </tr>
        <?php
        endif;

        if( ! empty( $page_links ) ) : ?>
            <tr class="pagination-row">
                <td colspan="<?php echo esc_attr( $column_count ) ?>"><?php echo $page_links ?></td>
            </tr>
        <?php endif ?>
        </tbody>

        <tfoot>
        <tr>
	        <td colspan="<?php echo esc_attr( $column_count ) ?>">
	            <?php if( $show_cb ) : ?>
		            <div class="custom-add-to-cart-button-cotaniner">
		                <a href="<?php echo esc_url( add_query_arg( array( 'wishlist_products_to_add_to_cart' => '', 'wishlist_token' => $wishlist_token ) ) ) ?>" class="button alt" id="custom_add_to_cart"><?php echo apply_filters( 'yith_wcwl_custom_add_to_cart_text', __( 'Add the selected products to the cart', 'online-eshop' ) ) ?></a>
		            </div>
	            <?php endif; ?>

	            <?php if ( $is_user_owner && $show_ask_estimate_button && $count > 0 ): ?>
		            <div class="ask-an-estimate-button-container">
	                    <a href="<?php echo ( $additional_info || ! is_user_logged_in() ) ? '#ask_an_estimate_popup' : $ask_estimate_url ?>" class="btn button ask-an-estimate-button" <?php echo ( $additional_info ) ? 'data-rel="prettyPhoto[ask_an_estimate]"' : '' ?> >
	                    <?php echo apply_filters( 'yith_wcwl_ask_an_estimate_icon', '<i class="fa fa-shopping-cart"></i>' )?>
	                    <?php echo apply_filters( 'yith_wcwl_ask_an_estimate_text', __( 'Ask for an estimate', 'online-eshop' ) ) ?>
	                </a>
		            </div>
	            <?php endif; ?>

		       
	        </td>
        </tr>
        </tfoot>

    </table>

    <?php wp_nonce_field( 'yith_wcwl_edit_wishlist_action', 'yith_wcwl_edit_wishlist' ); ?>

    <?php if( ! $is_default ): ?>
        <input type="hidden" value="<?php echo esc_attr($wishlist_token); ?>" name="wishlist_id" id="wishlist_id">
    <?php endif; ?>

    <?php do_action( 'yith_wcwl_after_wishlist' ); ?>

</form>

<?php do_action( 'yith_wcwl_after_wishlist_form' ); ?>

<?php if( $show_ask_estimate_button && ( ! is_user_logged_in() || $additional_info ) ): ?>
	<div id="ask_an_estimate_popup">
		<form action="<?php echo $ask_estimate_url ?>" method="post" class="wishlist-ask-an-estimate-popup">
			<?php if( ! is_user_logged_in() ): ?>
				<label for="reply_email"><?php echo apply_filters( 'yith_wcwl_ask_estimate_reply_mail_label', __( 'Your email', 'online-eshop' ) ) ?></label>
				<input type="email" value="" name="reply_email" id="reply_email">
			<?php endif; ?>
			<?php if( ! empty( $additional_info_label ) ):?>
				<label for="additional_notes"><?php echo esc_html( $additional_info_label ) ?></label>
			<?php endif; ?>
			<textarea id="additional_notes" name="additional_notes"></textarea>

			<button class="btn button ask-an-estimate-button ask-an-estimate-button-popup" >
				<?php echo apply_filters( 'yith_wcwl_ask_an_estimate_icon', '<i class="fa fa-shopping-cart"></i>' )?>
				<?php echo apply_filters( 'yith_wcwl_ask_an_estimate_text', __( 'Ask for an estimate', 'online-eshop' ) ) ?>
			</button>
		</form>
	</div>
<?php endif; ?>