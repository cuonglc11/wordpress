<?php
/**
 * This template to displays woocommerce page
 *
 * @package Online Eshop
 * @since 1.0
 */
$online_eshop_settings = online_eshop_get_theme_options();
$enable_product_detail_sidebar = $online_eshop_settings['online_eshop_enable_product_detail_sidebar'];
$section_class = ( is_single() ) ? 'single-products' : 'products-page';
get_header(); ?>
<!--Product page area start here-->
<section class="<?php echo esc_attr($section_class);?> section">
    <div class="container">
        <div class="row">
        	<?php
            if ( is_single() ) {
                if ( is_active_sidebar('online_eshop_woocommerce_sidebar') && $enable_product_detail_sidebar == '0'  ) {
            ?>
        	<div class="col-md-3 col-sm-12">
        		<div class="sidebar">
        			<?php dynamic_sidebar('online_eshop_woocommerce_sidebar'); ?>
        		</div>
        	</div>
        	<div class="col-md-9 col-sm-12">
        	<?php } else { ?>
        	<div class="col-md-12 col-sm-12">
        	<?php } } else {
                if ( is_active_sidebar('online_eshop_woocommerce_sidebar') ) {
            ?>
            <div class="col-md-3 col-sm-12">
                <div class="sidebar">
                    <?php dynamic_sidebar('online_eshop_woocommerce_sidebar'); ?>
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
            <?php } else { ?>
            <div class="col-md-12 col-sm-12">
            <?php } } ?>
                <div id="products" class="row">
                	<?php woocommerce_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Product page area end here-->
<?php get_footer();