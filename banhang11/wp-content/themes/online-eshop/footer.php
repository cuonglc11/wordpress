<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Online Eshop
 * @since 1.0
 */

$online_eshop_settings = online_eshop_get_theme_options();
if( is_active_sidebar( 'online_eshop_footer_col_1' ) || is_active_sidebar( 'online_eshop_footer_col_2' ) || is_active_sidebar( 'online_eshop_footer_col_3' ) || is_active_sidebar( 'online_eshop_footer_col_4' )) : ?>
<!--Daily deal area start here-->
<section class="daily-deal footer pd-t100 pd-b50 jarallax bg-img af">
    <div class="container">
        <div class="row">
            <?php get_template_part( 'template-parts/footer/footer', 'top' ); ?>
        </div>
    </div>
</section>
<!--Daily deal area end here-->
<?php endif; ?>

<!--Footer area start here-->
<footer>
    <?php if( is_active_sidebar( 'online_eshop_footer_bottom' ) ) : ?>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php dynamic_sidebar( 'online_eshop_footer_bottom' ); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="copyright">
                    <?php
                    $footer_copyright_text = $online_eshop_settings['online_eshop_footer_copyright_text'];
                    if( !empty( $footer_copyright_text ) ) 
                    {
                    printf( '<p>%1$s</p>', wp_kses_post($footer_copyright_text) );
                    }
                    else
                    {
                    ?>
                    <p> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'online-eshop' ) ); ?>" class="imprint">
                    <?php printf( __( 'Proudly powered by %s', 'online-eshop' ), 'WordPress' ); ?></p>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Footer area end here-->
<?php wp_footer(); ?>

</body>
</html>
