<?php
/**
 * Theme Customizer Functions
 *
 * @package Online Eshop
 * @since 1.0
 */
/******************** SHOPPINGCART CUSTOMIZE REGISTER *********************************************/
add_action( 'customize_register', 'online_eshop_customize_register_wordpress_default' );
function online_eshop_customize_register_wordpress_default( $wp_customize ) {
	
	$wp_customize->add_panel( 'online_eshop_wordpress_default_panel', array(
		'priority' => 5,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'WordPress Settings', 'online-eshop' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'online_eshop_customize_register_options');
function online_eshop_customize_register_options( $wp_customize ) {
	$wp_customize->add_panel( 'online_eshop_options_panel', array(
		'priority' => 6,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options', 'online-eshop' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'online_eshop_customize_register_frontpage_options');
function online_eshop_customize_register_frontpage_options( $wp_customize ) {
	$wp_customize->add_panel( 'online_eshop_frontpage_panel', array(
		'priority' => 7,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Front Page Template', 'online-eshop' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'online_eshop_customize_register_colors' );
function online_eshop_customize_register_colors( $wp_customize ) {
	$wp_customize->add_panel( 'colors', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Colors', 'online-eshop' ),
		'description' => '',
	) );
}