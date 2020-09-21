<?php
/**
 * Checkout Payment Section
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.3
 */

defined( 'ABSPATH' ) || exit;

if ( ! is_ajax() ) {
	do_action( 'woocommerce_review_order_before_payment' );
}
?>
<div class="payment">
    <div class="payment-content text-right">
        <div class="panel-group text-left" id="accordion" role="tablist" aria-multiselectable="true">
        	<div class="panel panel-default">
				<?php if ( WC()->cart->needs_payment() ) :
					if ( ! empty( $available_gateways ) ) {
						$index = 1; $col_class = ''; $true = 'true'; $in = 'in';
						foreach ( $available_gateways as $gateway ) {
							if($index > 1) { $col_class = 'class="collapsed"'; $true = 'false'; $in = 'out'; }
							wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway, 'col_class' => $col_class, 'in' => $in, 'true' => $true ) );
							$index++;
						}
					} else {
						echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? __( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'online-eshop' ) : __( 'Please fill in your details above to see available payment methods.', 'online-eshop' ) ) . '</li>'; // @codingStandardsIgnoreLine
					}
				endif; ?>
			</div>
		</div>
	</div>
</div>

<div class="condition">
	<noscript>
		<?php
		/* translators: $1 and $2 opening and closing emphasis tags respectively */
		printf( __( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'online-eshop' ), '<em>', '</em>' );
		?>
		<br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'online-eshop' ); ?>"><?php echo esc_html__( 'Update totals', 'online-eshop' ); ?></button>
	</noscript>

	<?php wc_get_template( 'checkout/terms.php' ); ?>
</div>
<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

<?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="btn1" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' ); // @codingStandardsIgnoreLine ?>

<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>

<?php
if ( ! is_ajax() ) {
	do_action( 'woocommerce_review_order_after_payment' );
}
