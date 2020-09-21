<?php
/**
 * Online_Eshop_WooCommerce_Hooks setup
 *
 * @package Online Eshop
 * @since   1.0
 */

/**
 * Main Online_Eshop_WooCommerce_Hooks Class.
 *
 * @class Online_Eshop_WooCommerce_Hooks
 */
class Online_Eshop_WooCommerce_Hooks
{

    /**
     * The single instance of the class.
     *
     * @var Online_Eshop_WooCommerce_Hooks
     * @since 1.0.0
     */
    protected static $_instance = null;


    /**
     * Main Online_Eshop_WooCommerce_Hooks Instance.
     *
     * Ensures only one instance of Online_Eshop_WooCommerce_Hooks is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @see mb_ae_addons()
     * @return Online_Eshop_WooCommerce_Hooks - Main instance.
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        self::$_instance->hooks();

        return self::$_instance;
    }

    public function hooks()
    {
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
    	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
        
        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );

        remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
        add_action( 'online_eshop_woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 10 );

        remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
        
    	add_action('woocommerce_shop_loop_item_title', array($this, 'online_eshop_woocommerce_template_loop_product_title'), 10);
        add_action('online_eshop_woocommerce_single_product_image_thumbnail_html', array($this, 'online_eshop_woocommerce_single_product_thumbnail'), 10);
    }

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	public function online_eshop_woocommerce_template_loop_product_title() {
		echo '<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . esc_html(get_the_title()) . '</a>';
	}

    /**
     * Show the single product image gallery.
     */
    public function online_eshop_woocommerce_single_product_thumbnail() {
        global $product;
        $attachments_ids = array();
        if(has_post_thumbnail())
            $attachments_ids = array(get_post_thumbnail_id());
        $attachments_ids = array_merge($attachments_ids, $product->get_gallery_image_ids());
        if('variable' === $product->get_type())
            foreach($product->get_available_variations() as $variation) {
                if(has_post_thumbnail($variation['variation_id']))
                    $thumbnail_id = get_post_thumbnail_id($variation['variation_id']);
                    if(!in_array($thumbnail_id, $attachments_ids))
                        $attachments_ids[] = $thumbnail_id;
            }
        if(empty($attachments_ids)) return;
        echo '<div class="slider-for">';
        $count1 = 1;
        foreach($attachments_ids as $attachments_id) {
            $full_image_url = wp_get_attachment_image_src($attachments_id, 'full'); ?>
        <div class="img-slid">
            <a class="pops" href="<?php echo esc_url($full_image_url[0]);?>">
                <img src="<?php echo esc_url($full_image_url[0]); ?>">
            </a>
        </div>
        <?php $count1++; }
        echo '</div>';
        if ( count($attachments_ids) > 1 ) {
            echo '<div class="sliders-nav">';
            $count2 = 1;
            foreach($attachments_ids as $attachments_id) {
                $full_image_url = wp_get_attachment_image_src($attachments_id, 'full'); ?>
            <div class="img-slid">
                <img src="<?php echo esc_url($full_image_url[0]); ?>">
            </div>
            <?php $count2++; }
            echo '</div>';
        }
    }
}

Online_Eshop_WooCommerce_Hooks::instance();