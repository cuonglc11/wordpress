<?php
/**
 * Output a single payment method
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment-method.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="panel-heading" role="tab" id="payment_method_<?php echo esc_attr( $gateway->id ); ?>">
	<h4 class="panel-title">
	    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo esc_attr( $gateway->id ); ?>" aria-controls="collapse<?php echo esc_attr( $gateway->id ); ?>" aria-expanded="<?php echo esc_attr( $true ); ?>">
	    	<input id="payment_method_<?php echo esc_attr( $gateway->id ); ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />
	        <span class="pd-l5">
	        	<?php echo wp_kses_post($gateway->get_title()); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?>
	        	<?php echo wp_kses_post($gateway->get_icon()); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?>
	        </span>
	    </a>
	</h4>
</div>
<?php if ( $gateway->has_fields() || $gateway->get_description() ) : ?>
<div id="collapse<?php echo esc_attr( $gateway->id ); ?>" class="panel-collapse collapse <?php echo esc_attr( $in ); ?>" role="tabpanel" aria-labelledby="payment_method_<?php echo esc_attr( $gateway->id ); ?>">
	<div class="panel-body"><?php $gateway->payment_fields(); ?></div>
</div>
<?php endif; ?>