<?php
/**
 * Theme Customizer Functions
 *
 * @package Online Eshop
 * @since 1.0
 */
$online_eshop_settings = online_eshop_get_theme_options();

$wp_customize->add_section('online_eshop_layout_options', array(
	'title' => __('Layout Options', 'online-eshop'),
	'priority' => 102,
	'panel' => 'online_eshop_options_panel'
));

$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_disable_post_author]', array(
	'default' => $online_eshop_settings['online_eshop_disable_post_author'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_disable_post_author]', array(
	'priority'=>40,
	'label' => __('Disable Author', 'online-eshop'),
	'section' => 'online_eshop_layout_options',
	'type' => 'checkbox',
));
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_disable_post_date]', array(
	'default' => $online_eshop_settings['online_eshop_disable_post_date'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_disable_post_date]', array(
	'priority'=>50,
	'label' => __('Disable Date', 'online-eshop'),
	'section' => 'online_eshop_layout_options',
	'type' => 'checkbox',
));
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_disable_post_comments]', array(
	'default' => $online_eshop_settings['online_eshop_disable_post_comments'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_disable_post_comments]', array(
	'priority'=>60,
	'label' => __('Disable Comments', 'online-eshop'),
	'section' => 'online_eshop_layout_options',
	'type' => 'checkbox',
));
$wp_customize->add_setting('online_eshop_theme_options[online_eshop_sidebar_position]', array(
   'default'        => $online_eshop_settings['online_eshop_sidebar_position'],
   'sanitize_callback' => 'online_eshop_sanitize_select',
   'type'                  => 'option',
   'capability'            => 'manage_options'
));
$wp_customize->add_control('online_eshop_theme_options[online_eshop_sidebar_position]', array(
   'priority'  =>90,
   'label'      => __('Sidebar Position', 'online-eshop'),
   'section'    => 'online_eshop_layout_options',
   'type'       => 'select',
   'choices'    => array(
       'floatright' => __('On Right', 'online-eshop'),
       'floatnone' => __('On Left', 'online-eshop')
   ),
));

$wp_customize->add_section('online_eshop_top_header_options', array(
	'title' => __('Top Header Options', 'online-eshop'),
	'priority' => 103,
	'panel' => 'online_eshop_options_panel'
));

$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_top_login_menu]', array(
	'default' => $online_eshop_settings['online_eshop_top_login_menu'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_top_login_menu]', array(
	'priority'=>12,
	'label' => __('Enter Login Menu Text', 'online-eshop'),
	'section' => 'online_eshop_top_header_options',
	'type' => 'text',
));

$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_top_login_menu_url]', array(
	'default' => $online_eshop_settings['online_eshop_top_login_menu_url'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_top_login_menu_url]', array(
	'priority'=>12,
	'label' => __('Enter Login Menu Url', 'online-eshop'),
	'section' => 'online_eshop_top_header_options',
	'type' => 'url',
));

$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_top_Register_menu]', array(
	'default' => $online_eshop_settings['online_eshop_top_Register_menu'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_top_Register_menu]', array(
	'priority'=>12,
	'label' => __('Enter Register Menu Text', 'online-eshop'),
	'section' => 'online_eshop_top_header_options',
	'type' => 'text',
));

$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_top_register_menu_url]', array(
	'default' => $online_eshop_settings['online_eshop_top_register_menu_url'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_top_register_menu_url]', array(
	'priority'=>12,
	'label' => __('Enter Register Menu Url', 'online-eshop'),
	'section' => 'online_eshop_top_header_options',
	'type' => 'url',
));

//social Icon

	$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_top_social_icon_url_1]', array(
		'default' => $online_eshop_settings['online_eshop_top_social_icon_url_1'],
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
	));
	$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_top_social_icon_url_1]', array(
		'priority'=>10,
		'label' => __(' Enter Facebook Page URL', 'online-eshop'),
		'section' => 'online_eshop_top_header_options',
		'type' => 'url',
	));


	$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_top_social_icon_url_2]', array(
		'default' => $online_eshop_settings['online_eshop_top_social_icon_url_2'],
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
	));
	$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_top_social_icon_url_2]', array(
		'priority'=>10,
		'label' => __(' Enter Twitter Page URL', 'online-eshop'),
		'section' => 'online_eshop_top_header_options',
		'type' => 'url',
	));


	$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_top_social_icon_url_3]', array(
		'default' => $online_eshop_settings['online_eshop_top_social_icon_url_3'],
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
	));
	$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_top_social_icon_url_3]', array(
		'priority'=>10,
		'label' => __(' Enter Instagram Page URL', 'online-eshop'),
		'section' => 'online_eshop_top_header_options',
		'type' => 'url',
	));	


	$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_top_social_icon_url_4]', array(
		'default' => $online_eshop_settings['online_eshop_top_social_icon_url_4'],
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
	));
	$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_top_social_icon_url_4]', array(
		'priority'=>10,
		'label' => __(' Enter Pinterest Page URL', 'online-eshop'),
		'section' => 'online_eshop_top_header_options',
		'type' => 'url',
	));

	$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_top_social_icon_url_5]', array(
		'default' => $online_eshop_settings['online_eshop_top_social_icon_url_5'],
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
	));
	$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_top_social_icon_url_5]', array(
		'priority'=>10,
		'label' => __(' Enter Youtube Page URL', 'online-eshop'),
		'section' => 'online_eshop_top_header_options',
		'type' => 'url',
	));