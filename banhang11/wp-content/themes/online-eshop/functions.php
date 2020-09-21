<?php
/**
 * Online Eshop Themes all fucntions 
 * @package Online Eshop
 * @since 1.0
 */

if ( ! function_exists( 'online_eshop_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

	$online_eshop_theme_data = wp_get_theme();
	if( ! defined( 'ONLINE_ESHOP_THEME_VERSION' ) ) define( 'ONLINE_ESHOP_THEME_VERSION', $online_eshop_theme_data->get( 'Version' ) );
	if( ! defined( 'ONLINE_ESHOP_THEME_NAME' ) ) define( 'ONLINE_ESHOP_THEME_NAME', $online_eshop_theme_data->get( 'Name' ) );
	
	function online_eshop_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Online Eshop, use a find and replace
		 * to change 'online-eshop' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'online-eshop', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_image_size( 'online-eshop-latest-post-sidebar', 75, 60, true );
		add_image_size( 'online-eshop-latest-post-footer', 100, 107, true );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary' => __( 'Add Main Menu', 'online-eshop' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'online-eshop' ),
					'shortName' => __( 'S', 'online-eshop' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'online-eshop' ),
					'shortName' => __( 'M', 'online-eshop' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'online-eshop' ),
					'shortName' => __( 'L', 'online-eshop' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'online-eshop' ),
					'shortName' => __( 'XL', 'online-eshop' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'online-eshop' ),
					'slug'  => 'primary',
					'color' => online_eshop_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => __( 'Secondary', 'online-eshop' ),
					'slug'  => 'secondary',
					'color' => online_eshop_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'online-eshop' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'online-eshop' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'online-eshop' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);
		
		$header_info = array(
			'width'         => 1900,
			'height'        => 600,
			'default-image' => get_template_directory_uri() . '/images/banner-bg.jpg',
		);
		add_theme_support( 'custom-header',$header_info );	
		// woocommerce
		if ( class_exists( 'woocommerce' ) ) {

        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        
        }
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'online_eshop_theme_setup' );


/***************************************************************************************/
if(!function_exists('online_eshop_get_theme_options')):
	function online_eshop_get_theme_options() {
	    return wp_parse_args(  get_option( 'online_eshop_theme_options', array() ), online_eshop_get_option_defaults_values() );
	}
endif;

require get_template_directory() . '/inc/settings/online-eshop-common-functions.php';

if (!function_exists('online_eshop_ocdi_files')) :
/**
* OCDI files.
*
* @since 1.0.0
*
* @return array Files.
*/
function online_eshop_ocdi_files() {

return apply_filters( 'aft_demo_import_files', array(
    array(
        'import_file_name'             => esc_html__( 'Online Eshop Default', 'online-eshop' ),
        'import_file_url'            => esc_url('http://themebuilderpro.com/demourl/eshop.xml'),
        'import_widget_file_url'     => esc_url('http://themebuilderpro.com/demourl/eshop.wie'),
        'import_customizer_file_url' => esc_url('http://themebuilderpro.com/demourl/eshop.dat'),
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'eshop-demo/demo-import-content/screenshot.png',
    ),
));
}
endif;
add_filter( 'pt-ocdi/import_files', 'online_eshop_ocdi_files');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/************************ Online Eshop Sidebar  *****************************/
require get_template_directory() . '/inc/widgets/widgets-functions/register-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/latest-posts.php';

if ( class_exists('woocommerce')) {
	require get_template_directory() . '/inc/widgets/widgets-functions/product-list-widget.php';
	require_once get_template_directory() . '/inc/settings/woocommerce.php';
}

/**
 * Load list require plugins
 */
require_once( get_template_directory() . '/inc/required-plugins.php' );

/************************ Online Eshop Customizer  *****************************/
require get_template_directory() . '/inc/customizer/online-eshop-default-values.php';
require get_template_directory() . '/inc/settings/online-eshop-action-hooks.php';
require get_template_directory() . '/inc/customizer/functions/sanitize-functions.php';
require get_template_directory() . '/inc/customizer/functions/register-panel.php';
require get_template_directory() . '/inc/getting-started/getting-started.php';


function online_eshop_customize_register( $wp_customize ) {
	
	require get_template_directory() . '/inc/customizer/functions/design-options.php';
	require get_template_directory() . '/inc/customizer/functions/theme-options.php';
	require get_template_directory() . '/inc/customizer/functions/color-options.php' ;
	require get_template_directory() . '/inc/customizer/functions/featured-content-customizer.php' ;
	if ( class_exists( 'WooCommerce' ) ) {
		require get_template_directory() . '/inc/customizer/functions/frontpage-features.php' ;

	}
	require get_template_directory() . '/inc/customizer/functions/forntpage-blog-features.php' ;
}
add_action( 'customize_register', 'online_eshop_customize_register' );

/******************* Online Eshop Header Display *************************/
function online_eshop_header_display(){

	$online_eshop_settings = online_eshop_get_theme_options();
	$header_display = $online_eshop_settings['online_eshop_header_display'];
	if ( function_exists( 'the_custom_logo' ) ) {
		if ( $header_display == 'header_logo' ) {
			the_custom_logo();
		}
	}
	if ( $header_display == 'header_text' ) {
		?>
			<h2 class="site-title">
			<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr(get_bloginfo('name'));?>" rel="home"> <?php bloginfo('name');?> </a>
			</h2>
			<?php
			$site_description = get_bloginfo( 'description', 'display' );
			if ($site_description) { ?>
				<div id="site-description"> <?php bloginfo('description');?> </div> <!-- end #site-description -->
			<?php }
		
	}
}
add_action('online_eshop_site_branding', 'online_eshop_header_display');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function online_eshop_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'online_eshop_content_width', 640 );
}
add_action( 'after_setup_theme', 'online_eshop_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function online_eshop_scripts() {

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array());
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', array());
	wp_enqueue_style('meanmenu', get_template_directory_uri() . '/css/meanmenu.css', array());
    wp_enqueue_style('jquery-owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array());
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array());
    wp_enqueue_style('fontawesome', get_template_directory_uri() .'/css/font-awesome.css', array());
    wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css', array());
    wp_enqueue_style('online-eshop-google-fonts', esc_url(online_eshop_fonts_url()));
    wp_enqueue_style('online-eshop-style', get_stylesheet_uri());
    wp_enqueue_style('online-eshop-responsive', get_template_directory_uri() . '/css/responsive.css', array());
    wp_enqueue_style('online-eshop-custom', get_template_directory_uri() . '/css/custom.css', array());
   
   	wp_enqueue_script('jquery');
   	wp_enqueue_script('tether', get_template_directory_uri() . '/js/tether.js', array(), '', true);
   	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '', true);
   	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
   	wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array(), '', true);
	wp_enqueue_script('meanmenu', get_template_directory_uri() . '/js/jquery.meanmenu.js', array(), '', true);
   	wp_enqueue_script('jarallax', get_template_directory_uri() . '/js/jarallax.js', array(), '', true);
   	wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.js', array(), '', true);
   	wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.js', array(), '', true);
   	wp_enqueue_script('scrollup', get_template_directory_uri() . '/js/jquery.scrollUp.js', array(), '', true);
   	wp_enqueue_script('owl.carousel', get_template_directory_uri() . '/js/owl.carousel.js', array(), '', true);
   		wp_enqueue_script( 'online-eshop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

   	wp_enqueue_script('online-eshop-main', get_template_directory_uri() . '/js/main.js', array(), '', true);	
	
	$online_eshop_custom_css = '';	
    if ( get_header_image() ) {
		$online_eshop_image_url = get_header_image();
	}
	else{
		$online_eshop_image_url = get_template_directory_uri() . '/images/banner-bg.jpg';
	}
	
	$online_eshop_custom_css .='
     .breadcumb-area {
		background: url("' . esc_url( $online_eshop_image_url ) . '");
		background-size: cover; 
		background-position: bottom;
    }';
	wp_add_inline_style( 'online-eshop-style', $online_eshop_custom_css );
}
add_action( 'wp_enqueue_scripts', 'online_eshop_scripts' );




if ( ! function_exists( 'online_eshop_fonts_url' ) ) :
    /**
     * Register Google fonts.
     *
     * Create your own online_eshop_fonts_url() function to override in a child theme.
     *
     * @since league 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function online_eshop_fonts_url()
    {
        $fonts_url = '';
        $fonts     = array();

        if ( 'off' !== _x( 'on', 'Dancing+Script font: on or off', 'online-eshop' ) )
        {
            $fonts[] = 'Dancing+Script:400,700';
        }
        if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'online-eshop' ) )
        {
            $fonts[] = 'Montserrat:100,300,400,500,600,700,800,900';
        }
        if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'online-eshop' ) )
        {
            $fonts[] = 'Roboto:100,300,400,500,700,900';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;


function online_eshop_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'online_eshop_custom_header_args', array(
		'default-text-color'     => '000000',
		'width'                  => 1920,
		'height'                 => 850,
		'flex-height'            => true,
		'wp-head-callback'       => 'online_eshop_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'online_eshop_custom_header_setup' );

if ( ! function_exists( 'online_eshop_header_style' ) ) :

	function online_eshop_header_style() {
		$header_text_color = get_header_textcolor();

		?>
		<style type="text/css">

			.site-title a,#site-description
			 {
			color: #<?php echo esc_attr($header_text_color); ?> !important;
			
			  }

		</style>
		<?php
	}
endif;

/**
 * blockquote removing line break and p tag 
 */
function online_eshop_remove_blockquote_ptag_scripts() {
   $blockquote_js = '
    jQuery.noConflict();
    jQuery(window).load(function() {
        if ( jQuery("div").hasClass( "testimonial-list" ) ) {
        	jQuery("p > *").unwrap();
	        jQuery("br").remove();
	    }
    });';

   wp_add_inline_script( 'jquery-migrate', $blockquote_js );

}
add_action( 'wp_enqueue_scripts', 'online_eshop_remove_blockquote_ptag_scripts' );


/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-online-eshop-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/breadcrumb.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/color-patterns.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


require get_template_directory() . '/inc/customizer/customizer-pro/class-customize.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';