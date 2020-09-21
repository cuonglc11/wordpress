<?php
/**
 * Theme Customizer Functions
 *
 * @package Online Eshop
 * @since 1.0
 */
$online_eshop_settings = online_eshop_get_theme_options();
/********************** SHOPPINGCART DEFAULT PANEL ***********************************/
$wp_customize->add_section('header_image', array(
	'title' => __('Header Media', 'online-eshop'),
	'priority' => 20,
	'panel' => 'online_eshop_wordpress_default_panel'
));
$wp_customize->add_section('colors', array(
	'title' => __('Colors', 'online-eshop'),
	'priority' => 30,
	'panel' => 'online_eshop_wordpress_default_panel'
));
$wp_customize->add_section('background_image', array(
	'title' => __('Background Image', 'online-eshop'),
	'priority' => 40,
	'panel' => 'online_eshop_wordpress_default_panel'
));
$wp_customize->add_section('nav', array(
	'title' => __('Navigation', 'online-eshop'),
	'priority' => 50,
	'panel' => 'online_eshop_wordpress_default_panel'
));

$wp_customize->add_section('static_front_page', array(
	'title' => __('Static Front Page', 'online-eshop'),
	'priority' => 60,
	'panel' => 'online_eshop_wordpress_default_panel'
));

$wp_customize->add_section('title_tagline', array(
	'title' => __('Site Title & Logo Options', 'online-eshop'),
	'priority' => 10,
	'panel' => 'online_eshop_wordpress_default_panel'
));
$wp_customize->add_section('breadcrumb_subtitle', array(
	'title' => __('Breadcrumb Sub Title Text', 'online-eshop'),
	'priority' => 15,
	'panel' => 'online_eshop_wordpress_default_panel'
));
$wp_customize->add_section('footer_copyright_text', array(
	'title' => __('Footer Copyright Text', 'online-eshop'),
	'priority' => 20,
	'panel' => 'online_eshop_wordpress_default_panel'
));

$wp_customize->add_section('online_eshop_custom_header', array(
	'title' => __('Options', 'online-eshop'),
	'priority' => 503,
	'panel' => 'online_eshop_options_panel'
));

$wp_customize->add_section( 'product_promotion', array(
	'title' => __( 'Product Promotion', 'online-eshop' ),
	'priority' => 504,
	'panel' => 'online_eshop_options_panel'
));

/********************  SHOPPINGCART THEME OPTIONS *****************************************/
// title_tagline
$wp_customize->add_setting('online_eshop_theme_options[online_eshop_header_display]', array(
	'capability' => 'edit_theme_options',
	'default' => $online_eshop_settings['online_eshop_header_display'],
	'sanitize_callback' => 'online_eshop_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control('online_eshop_theme_options[online_eshop_header_display]', array(
	'label' => __('Site Logo/ Text Options', 'online-eshop'),
	'priority' => 105,
	'section' => 'title_tagline',
	'type' => 'select',
		'choices' => array(
		'header_text' => __('Display Site Title Only','online-eshop'),
		'header_logo' => __('Display Site Logo Only','online-eshop')
	),
));

// breadcrumb_subtitle
$wp_customize->add_setting('online_eshop_theme_options[online_eshop_breadcrumb_subtitle_display]', array(
	'capability' => 'edit_theme_options',
	'default' => $online_eshop_settings['online_eshop_breadcrumb_subtitle_display'],
	'sanitize_callback' => 'wp_kses_post',
	'type' => 'option',
));
$wp_customize->add_control('online_eshop_theme_options[online_eshop_breadcrumb_subtitle_display]', array(
	'label' => __('Breadcrumb Subtitle', 'online-eshop'),
	'priority' => 105,
	'section' => 'breadcrumb_subtitle',
	'type' => 'textarea'
));

// footer_copyright_text
$wp_customize->add_setting('online_eshop_theme_options[online_eshop_footer_copyright_text]', array(
	'capability' => 'edit_theme_options',
	'default' => $online_eshop_settings['online_eshop_footer_copyright_text'],
	'sanitize_callback' => 'wp_kses_post',
	'type' => 'option',
));
$wp_customize->add_control('online_eshop_theme_options[online_eshop_footer_copyright_text]', array(
	'label' => __('Copyright Text', 'online-eshop'),
	'priority' => 105,
	'section' => 'footer_copyright_text',
	'type' => 'textarea'
));

// online_eshop_custom_header
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_disable_top_bar]', array(
	'default' => $online_eshop_settings['online_eshop_disable_top_bar'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_disable_top_bar]', array(
	'priority'=>5,
	'label' => __('Disable Top Bar', 'online-eshop'),
	'section' => 'online_eshop_custom_header',
	'type' => 'checkbox',
));
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_disable_top_social_icons]', array(
	'default' => $online_eshop_settings['online_eshop_disable_top_social_icons'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_disable_top_social_icons]', array(
	'priority'=>10,
	'label' => __('Disable Top Social Icons', 'online-eshop'),
	'section' => 'online_eshop_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_disable_mycart]', array(
	'default' => $online_eshop_settings['online_eshop_disable_mycart'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_disable_mycart]', array(
	'priority'=>20,
	'label' => __('Disable Mycart Button', 'online-eshop'),
	'section' => 'online_eshop_custom_header',
	'type' => 'checkbox',
));
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_disable_add_section]', array(
	'default' => $online_eshop_settings['online_eshop_disable_add_section'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_disable_add_section]', array(
	'priority'=>25,
	'label' => __('Disable Ad Section', 'online-eshop'),
	'section' => 'online_eshop_custom_header',
	'type' => 'checkbox',
));
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_disable_search_form]', array(
	'default' => $online_eshop_settings['online_eshop_disable_search_form'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_disable_search_form]', array(
	'priority'=>30,
	'label' => __('Disable Search Form', 'online-eshop'),
	'section' => 'online_eshop_custom_header',
	'type' => 'checkbox',
));
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_disable_buttom_social_icons]', array(
	'default' => $online_eshop_settings['online_eshop_disable_buttom_social_icons'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_disable_buttom_social_icons]', array(
	'priority'=>40,
	'label' => __('Disable Bottom Social Icons', 'online-eshop'),
	'section' => 'online_eshop_custom_header',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_enable_product_detail_sidebar]', array(
	'default' => $online_eshop_settings['online_eshop_enable_product_detail_sidebar'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_enable_product_detail_sidebar]', array(
	'priority'=>50,
	'label' => __('Enable Product Detail Sidebar', 'online-eshop'),
	'section' => 'online_eshop_custom_header',
	'type' => 'checkbox',
));