<?php
/**
 * Functions which enhance the theme by hooking into Online Eshop
 *
 * @package Online Eshop
 * @since 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function online_eshop_body_classes( $classes ) {

	if ( is_singular() ) {
		// Adds `singular` to singular pages.
		$classes[] = 'singular';
	} else {
		// Adds `hfeed` to non singular pages.
		$classes[] = 'hfeed';
	}

	// Adds a class if image filters are enabled.
	if ( online_eshop_image_filters_enabled() ) {
		$classes[] = 'image-filters-enabled';
	}

	return $classes;
}
add_filter( 'body_class', 'online_eshop_body_classes' );


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function online_eshop_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'online_eshop_pingback_header' );


/**
 * Determines if post thumbnail can be displayed.
 */
function online_eshop_can_show_post_thumbnail() {
	return apply_filters( 'online_eshop_can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
}

/**
 * Returns true if image filters are enabled on the theme options.
 */
function online_eshop_image_filters_enabled() {
	return 0 !== get_theme_mod( 'image_filter', 1 );
}

/**
 * Add custom sizes attribute to responsive image functionality for post thumbnails.
 *
 * @origin Online Eshop 1.0
 *
 * @param array $attr  Attributes for the image markup.
 * @return string Value for use in post thumbnail 'sizes' attribute.
 */
function online_eshop_post_thumbnail_sizes_attr( $attr ) {

	if ( is_admin() ) {
		return $attr;
	}

	if ( ! is_singular() ) {
		$attr['sizes'] = '(max-width: 34.9rem) calc(100vw - 2rem), (max-width: 53rem) calc(8 * (100vw / 12)), (min-width: 53rem) calc(6 * (100vw / 12)), 100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'online_eshop_post_thumbnail_sizes_attr', 10, 1 );

/**
 * Returns the size for avatars used in the theme.
 */
function online_eshop_get_avatar_size() {
	return 100;
}


/**
 * Convert HSL to HEX colors
 */
function online_eshop_hsl_hex( $h, $s, $l, $to_hex = true ) {

	$h /= 360;
	$s /= 100;
	$l /= 100;

	$r = $l;
	$g = $l;
	$b = $l;
	$v = ( $l <= 0.5 ) ? ( $l * ( 1.0 + $s ) ) : ( $l + $s - $l * $s );
	if ( $v > 0 ) {
		$m;
		$sv;
		$sextant;
		$fract;
		$vsf;
		$mid1;
		$mid2;

		$m       = $l + $l - $v;
		$sv      = ( $v - $m ) / $v;
		$h      *= 6.0;
		$sextant = floor( $h );
		$fract   = $h - $sextant;
		$vsf     = $v * $sv * $fract;
		$mid1    = $m + $vsf;
		$mid2    = $v - $vsf;

		switch ( $sextant ) {
			case 0:
				$r = $v;
				$g = $mid1;
				$b = $m;
				break;
			case 1:
				$r = $mid2;
				$g = $v;
				$b = $m;
				break;
			case 2:
				$r = $m;
				$g = $v;
				$b = $mid1;
				break;
			case 3:
				$r = $m;
				$g = $mid2;
				$b = $v;
				break;
			case 4:
				$r = $mid1;
				$g = $m;
				$b = $v;
				break;
			case 5:
				$r = $v;
				$g = $m;
				$b = $mid2;
				break;
		}
	}
	$r = round( $r * 255, 0 );
	$g = round( $g * 255, 0 );
	$b = round( $b * 255, 0 );

	if ( $to_hex ) {

		$r = ( $r < 15 ) ? '0' . dechex( $r ) : dechex( $r );
		$g = ( $g < 15 ) ? '0' . dechex( $g ) : dechex( $g );
		$b = ( $b < 15 ) ? '0' . dechex( $b ) : dechex( $b );

		return "#$r$g$b";

	}

	return "rgb($r, $g, $b)";
}

if( ! function_exists( 'online_eshop_admin_notice' ) ) :
/**
 * Addmin notice for getting started page
*/
function online_eshop_admin_notice(){
    global $pagenow;
    $theme_args      = wp_get_theme();
    $meta            = get_option( 'online_eshop_admin_notice' );
    $name            = $theme_args->__get( 'Name' );
    $current_screen  = get_current_screen();
    
    if( 'themes.php' == $pagenow && !$meta ){
        
        if( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ){
            return;
        }

        if( is_network_admin() ){
            return;
        }

        if( ! current_user_can( 'manage_options' ) ){
            return;
        } ?>

        <div class="welcome-message notice notice-info">
            <div class="notice-wrapper">
                <div class="notice-text">
                    <h3><?php esc_html_e( 'Congratulations!', 'online-eshop' ); ?></h3>
                    <p><?php printf( __( '%1$s is now installed and ready to use. Click below to see theme documentation, plugins to install and other details to get started.', 'online-eshop' ), esc_html( $name ) ) ; ?></p>
                    <p><a href="<?php echo esc_url( admin_url( 'themes.php?page=online-eshop-getting-started' ) ); ?>" class="button button-primary" style="text-decoration: none;"><?php esc_html_e( 'Go to the getting started.', 'online-eshop' ); ?></a></p>
                    <p class="dismiss-link"><strong><a href="?online_eshop_admin_notice=1"><?php esc_html_e( 'Dismiss', 'online-eshop' ); ?></a></strong></p>
                </div>
            </div>
        </div>
    <?php }
}
endif;
add_action( 'admin_notices', 'online_eshop_admin_notice' );

if( ! function_exists( 'online_eshop_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function online_eshop_update_admin_notice(){
    if ( isset( $_GET['online_eshop_admin_notice'] ) && $_GET['online_eshop_admin_notice'] = '1' ) {
        update_option( 'online_eshop_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'online_eshop_update_admin_notice' );