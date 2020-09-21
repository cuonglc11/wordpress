<?php
/**
 * Custom functions
 *
 * @package Online Eshop
 * @since 1.0
 *
 *
 * Print post excerpt based on length.
 *
 * @param  integer $length
 */
if ( ! function_exists( 'online_eshop_entry_excerpt' ) ) {
   
    function online_eshop_entry_excerpt( $length )
    {
        $excerpt = explode(' ', get_the_excerpt(), $length);

        if (count($excerpt) >= $length) {
            array_pop($excerpt);
            $excerpt = implode(" ", $excerpt) . '';
        }
        else {
            $excerpt = implode(" ", $excerpt);
        }
        $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

        return $excerpt;
    }
}

/**
 * Print blog post categoy
 *
 * @param  array $online_eshop_categories_lists
 */
if( !function_exists( 'online_eshop_categories_lists' ) ):
    function online_eshop_categories_lists() {
        $online_eshop_cat_args = array(
            'type'       => 'post',
            'taxonomy'   => 'category',
        );
        $online_eshop_categories = get_categories( $online_eshop_cat_args );
        $online_eshop_categories_lists = array('' => __('--Select--','online-eshop'));
        foreach( $online_eshop_categories as $category ) {
            $online_eshop_categories_lists[esc_attr( $category->slug )] = esc_html( $category->name );
        }
        return $online_eshop_categories_lists;
    }
endif;


/**
 * Print product post categoy
 *
 * @param  array $online_eshop_prod_categories_lists
 */
if( !function_exists( 'online_eshop_product_categories_lists' ) ) {

    function online_eshop_product_categories_lists() {
		$online_eshop_prod_categories_lists = array(
			'-' => __( '--Select Category--', 'online-eshop' ),
		);

		$online_eshop_prod_categories = get_categories(
			array(
				'taxonomy'   => 'product_cat',
				'hide_empty' => 0,
				'title_li'   => '',
			)
		);

		if ( ! empty( $online_eshop_prod_categories ) ) :
			foreach ( $online_eshop_prod_categories as $online_eshop_prod_cat ) :

				if ( ! empty( $online_eshop_prod_cat->term_id ) && ! empty( $online_eshop_prod_cat->name ) ) :
					$online_eshop_prod_categories_lists[ $online_eshop_prod_cat->term_id ] = $online_eshop_prod_cat->name;
				endif;

			endforeach;
		endif;
		return $online_eshop_prod_categories_lists;
	}
}

/* Header Right WooCommerce Cart and WishList Icon */
add_action ('online_eshop_mycart_button_display','online_eshop_mycart_button');

function online_eshop_mycart_button(){
    if ( class_exists( 'woocommerce' ) ) { ?>
    <li class="cart-dropdown">
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>">
            <i class="fa fa-shopping-cart"></i>
            <span><?php echo esc_html__('My Cart', 'online-eshop'); echo '('.wp_kses_data ( WC()->cart->get_cart_contents_count() ) .')'; ?></span>
        </a>
        <?php the_widget( 'WC_Widget_Cart', '' ); ?>
    </li>
    <?php }
}