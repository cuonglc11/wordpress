<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Online Eshop
 * @since 1.0
 */

get_header(); ?>
<!--Login and register area start here-->
<section class="Error-area section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="error-diss">
                    <h1 class="error-title"><i class="fa fa-map-signs"></i><?php echo esc_html__( '404!', 'online-eshop' ); ?></h1>
                    <h2 class="mt-0"><?php echo esc_html__( 'Oops! Page Not Found', 'online-eshop' ); ?></h2>
                    <p><?php echo esc_html__( 'The page you were looking for could not be found.', 'online-eshop' ); ?></p>
                    <a href="<?php echo esc_url( home_url('/')); ?>" class="btn1"><?php echo esc_html__( 'Return Home', 'online-eshop' ); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Login and register area end here-->
<?php get_footer();