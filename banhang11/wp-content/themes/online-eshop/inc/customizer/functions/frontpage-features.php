<?php
/**
 * Theme Customizer Functions
 *
 * @package Online Eshop
 * @since 1.0
 */

/******************** SHOPPINGCART FRONTPAGE  *********************************************/
/* Frontpage Online Eshop */
$online_eshop_settings = online_eshop_get_theme_options();
$online_eshop_prod_categories_lists = online_eshop_product_categories_lists();


$wp_customize->add_section( 'online_eshop_product_category', array(
	'title' => __('Product Categories', 'online-eshop'),
	'priority' => 12,
	'panel' =>'online_eshop_frontpage_panel'
));



/* Product Categories */
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_disable_product_categories]', array(
	'default' => $online_eshop_settings['online_eshop_disable_product_categories'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_disable_product_categories]', array(
	'priority' => 10,
	'label' => __('Disable Product Category Section', 'online-eshop'),
	'section' => 'online_eshop_product_category',
	'type' => 'checkbox',
));

$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_categor_heading]', array(
	'default' => $online_eshop_settings['online_eshop_categor_heading'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);

$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_categor_heading]', array(
	'priority' => 30,
	'label' => __( 'Title', 'online-eshop' ),
	'section' => 'online_eshop_product_category',
	'type' => 'text',
	)
);

for ( $i=1; $i <= $online_eshop_settings['online_eshop_total_categories'] ; $i++ ) {
	$wp_customize->add_setting(
		'online_eshop_theme_options[online_eshop_featured_category_'. $i .']', array(
			'default'				=>'',
			'capability'			=> 'manage_options',
			'sanitize_callback'	=> 'online_eshop_sanitize_category_select',
			'type'				=> 'option'
		)
	);
	$wp_customize->add_control(
		'online_eshop_theme_options[online_eshop_featured_category_'. $i .']',
		array(
			'priority' => 50 . absint($i),
			'label'       => __( 'Featured Products category #', 'online-eshop' ) . $i ,
			'section'     => 'online_eshop_product_category',
			'choices'     => $online_eshop_prod_categories_lists,
			'type'        => 'select',
		)
	);
}