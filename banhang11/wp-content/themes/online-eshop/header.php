<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Online Eshop
 * @since 1.0
 */
global $template;

$online_eshop_settings = online_eshop_get_theme_options();

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php   
    if ( function_exists( 'wp_body_open' ) )
    wp_body_open();
    ?>
    <a class="skip-link screen-reader-text" href="#content"><?php echo esc_html__( 'Skip to content', 'online-eshop' ); ?></a>
    <!--Preloader area -->
    <div id="preloader">
        <div id="status" class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
	<!--Header area start here-->
    <header>
        <?php
        $disable_top_bar = $online_eshop_settings['online_eshop_disable_top_bar'];
        if($disable_top_bar == 0 ): ?>
        <div class="topbar topbar-color">
            <div class="container">
                <?php get_template_part( 'template-parts/header/top', 'header' ); ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="header-middel update-header-middel">
            <div class="container">
                <?php get_template_part( 'template-parts/header/middle', 'header' ); ?>
            </div>
        </div>
        <div class="main-menu update-main-menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <!-- menu -->
                    <nav id="site-navigation" class="main-navigation">
                       <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>

                                 <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'primary',
                                        'menu_id'        => 'primary-menu',
                                    ) );
                                    ?>
                    </nav>
                        
                        <!-- Mobile Menu  End -->
                    </div>
                </div>
            </div>
            <?php
            $disable_search = $online_eshop_settings['online_eshop_disable_search_form'];
            if($disable_search == 0 ): ?>
            <div class="cat-ser">
                <div class="search-box">
                    <form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                        <label class="screen-reader-text"><?php echo esc_html__('Search for:','online-eshop'); ?></label>
                        <input type="search" placeholder="<?php esc_attr_e('Search your item here...', 'online-eshop'); ?>" name="s" autocomplete="off">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </header>
    <!--Header area end here-->
    <?php if( basename($template) != 'online-eshop-template.php' ) { ?>
    <!--Breadcumb area start here-->
    <section class="breadcumb-area">
        <div class="container">
            <div class="row">
                <?php online_eshop_header_title_display(); ?>
            </div>
        </div>
    </section>
    <!--Breadcumb area end here-->
    <?php } ?>