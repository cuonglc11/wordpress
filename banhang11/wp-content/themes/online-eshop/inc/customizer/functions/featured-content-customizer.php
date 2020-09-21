<?php
/**
 * Theme Customizer Functions
 *
 * @package Online Eshop
 * @since 1.0
 */

/******************** SHOPPINGCART SLIDER SETTINGS ******************************************/
$online_eshop_settings = online_eshop_get_theme_options();
$wp_customize->add_section( 'featured_content', array(
	'title' => __( 'Slider Settings', 'online-eshop' ),
	'priority' => 2,
	'panel' => 'online_eshop_frontpage_panel'
));

$wp_customize->add_section( 'product_features', array(
	'title' => __( 'Product Features', 'online-eshop' ),
	'priority' => 3,
	'panel' => 'online_eshop_frontpage_panel'
));

/* WooCommerce Slider Category Section */
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_enable_slider]', array(
	'default' => $online_eshop_settings['online_eshop_enable_slider'],
	'sanitize_callback' => 'online_eshop_sanitize_select',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_enable_slider]', array(
	'priority'=>5,
	'label' => __('Slider Options', 'online-eshop'),
	'section' => 'featured_content',
	'type' => 'select',
	'choices' => array(
		'frontpage' => __('Front Page','online-eshop'),
		'enitresite' => __('Entire Site','online-eshop'),
		'disable' => __('Disable Slider','online-eshop'),
	),
));


$online_eshop_slider_no = 3;
for( $i = 1; $i <= $online_eshop_slider_no; $i++ ) {
        $online_eshop_slider_page   = 'online_eshop_slider_page_' .$i;

	        $wp_customize->add_setting( $online_eshop_slider_page,
            array(
                'default'           => 1,
                'sanitize_callback' => 'online_eshop_sanitize_dropdown_pages',
            )
        );

        $wp_customize->add_control( $online_eshop_slider_page,
            array(
                'label'     => __( 'Slider Image From Page ', 'online-eshop' ) .$i,
                'section'   => 'featured_content',
                'type'      => 'dropdown-pages',
                'priority'  => 10,
            )
        );
	

	
	$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_slideshow_toptext_'.$i.']', array(
		'default' => $online_eshop_settings['online_eshop_slideshow_toptext_'.$i],
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	));
	$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_slideshow_toptext_'.$i.']', array(
		'priority'=>10 .$i,
		'label' => __('Enter Slider Top Text For Slide #', 'online-eshop')  .$i,
		'section' => 'featured_content',
		'type' => 'text',
	));
	$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_slideshow_midtext_'.$i.']', array(
		'default' => $online_eshop_settings['online_eshop_slideshow_midtext_'.$i],
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	));
	$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_slideshow_midtext_'.$i.']', array(
		'priority'=>10 .$i,
		'label' => __('Enter Slider Middel Text For Slide #', 'online-eshop')  .$i,
		'section' => 'featured_content',
		'type' => 'text',
	));
	$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_slideshow_bottext_'.$i.']', array(
		'default' => $online_eshop_settings['online_eshop_slideshow_bottext_'.$i],
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	));
	$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_slideshow_bottext_'.$i.']', array(
		'priority'=>10 .$i,
		'label' => __('Enter Slider Bottom Text For Slide #', 'online-eshop')  .$i,
		'section' => 'featured_content',
		'type' => 'text',
	));
	$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_slideshow_btn_url_'.$i.']', array(
		'default' => $online_eshop_settings['online_eshop_slideshow_btn_url_'.$i],
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
	));
	$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_slideshow_btn_url_'.$i.']', array(
		'priority'=>10 .$i,
		'label' => __('Enter Slider Button Url For Slide #', 'online-eshop')  .$i,
		'section' => 'featured_content',
		'type' => 'text',
	));

		
    }
/********************************* Product Features ************************************/
for ( $i=1; $i <= 4; $i++ ) {
	$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_feature_icon_class_'.$i.']', array(
		'default' => $online_eshop_settings['online_eshop_feature_icon_class_'.$i],
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	));
	$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_feature_icon_class_'.$i.']', array(
		'priority'=>10 .$i,
		'description' =>  __('Get the font awesome icon class name from here <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Click Here</a> and the enter the class name below','online-eshop'),
		'label' => __('Enter Icon Class #', 'online-eshop')  .$i,
		'section' => 'product_features',
		'type' => 'text',
	));
	$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_feature_title_'.$i.']', array(
		'default' => $online_eshop_settings['online_eshop_feature_title_'.$i],
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	));
	$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_feature_title_'.$i.']', array(
		'priority'=>10 .$i,
		'label' => __('Enter Features Title #', 'online-eshop')  .$i,
		'section' => 'product_features',
		'type' => 'text',
	));
	$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_feature_subtitle_'.$i.']', array(
		'default' => $online_eshop_settings['online_eshop_feature_subtitle_'.$i],
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	));
	$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_feature_subtitle_'.$i.']', array(
		'priority'=>10 .$i,
		'label' => __('Enter Features Sub-Title #', 'online-eshop')  .$i,
		'section' => 'product_features',
		'type' => 'text',
	));
}

function online_eshop_sanitize_dropdown_pages( $page_id, $setting ) {
    // Ensure $input is an absolute integer.
    $page_id = absint( $page_id );

    // If $page_id is an ID of a published page, return it; otherwise, return the default.
    return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}