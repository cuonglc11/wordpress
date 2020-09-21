<?php
/**
 * Theme Customizer Functions
 *
 * @package Online Eshop
 * @since 1.0
 */

/********************* Color Option **********************************************/
$wp_customize->add_section( 'color_styles', array(
	'title' => __('Color Options','online-eshop'),
	'priority' => 10,
	'panel' =>'colors'
));

$wp_customize->add_setting( 'theme_color_styles', array(
	'default' => '#ea2c58',
	'sanitize_callback'	=> 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color_styles', array(
	'description' => __( 'Theme Color Styles', 'online-eshop' ),
	'section' => 'color_styles',
	'priority' => 10,
) ) );