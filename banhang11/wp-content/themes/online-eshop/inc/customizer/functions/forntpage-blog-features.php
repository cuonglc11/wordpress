<?php
/**
 * Theme Customizer Functions
 *
 * @package Online Eshop
 * @since 1.0
 */

/******************** SHOPPINGCART FRONTPAGE  *********************************************/
/* Frontpage blog Online Eshop */

$online_eshop_categories_lists = online_eshop_categories_lists();

$wp_customize->add_section( 'online_eshop_frontpage_blogposts', array(
	'title' => __('Blog Posts', 'online-eshop'),
	'priority' => 13,
	'panel' =>'online_eshop_frontpage_panel'
));

// Blog Posts
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_deisable_blogpost_sec]', array(
	'default' => $online_eshop_settings['online_eshop_deisable_blogpost_sec'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_deisable_blogpost_sec]', array(
	'priority'=>10,
	'label' => __('Disable Blog Section', 'online-eshop'),
	'section' => 'online_eshop_frontpage_blogposts',
	'type' => 'checkbox',
));
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_blogpost_title]', array(
	'default' => $online_eshop_settings['online_eshop_blogpost_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_blogpost_title]', array(
	'priority' => 15,
	'label' => __( 'Title', 'online-eshop' ),
	'section' => 'online_eshop_frontpage_blogposts',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_blogpost_subtitle]', array(
	'default' => $online_eshop_settings['online_eshop_blogpost_subtitle'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_blogpost_subtitle]', array(
	'priority' => 20,
	'label' => __( 'Sub Title', 'online-eshop' ),
	'section' => 'online_eshop_frontpage_blogposts',
	'type' => 'text',
	)
);

$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_blogpost_category]', array(
		'default'			=> '',
		'capability'		=> 'manage_options',
		'sanitize_callback'	=> 'online_eshop_sanitize_category_select',
		'type'				=> 'option'
	));
$wp_customize->add_control('online_eshop_theme_options[online_eshop_blogpost_category]',
	array(
		'priority' 		  => 25,
		'label'			  => __('Select Post Category', 'online-eshop'),
		'description'	  => __('By default no posts is displayed', 'online-eshop'),
		'section'		  => 'online_eshop_frontpage_blogposts',
		'type'			  =>'select',
		'choices'	=>  $online_eshop_categories_lists 
	)
);

$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_num_posts]', array(
	'default' => $online_eshop_settings['online_eshop_num_posts'],
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_num_posts]', array(
	'priority' => 30,
	'label' => __( 'Number of Posts', 'online-eshop' ),
	'section' => 'online_eshop_frontpage_blogposts',
	'type' => 'text',
	)
);



$wp_customize->add_section( 'online_eshop_popular_category', array(
	'title' => __('Popular Collection', 'online-eshop'),
	'priority' => 11,
	'panel' =>'online_eshop_frontpage_panel'
));



/* popular Collection */
$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_deisable_popular_sec]', array(
	'default' => 0,
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_deisable_popular_sec]', array(
	'priority' => 10,
	'label' => __('Disable Popular Collection Section', 'online-eshop'),
	'section' => 'online_eshop_popular_category',
	'description' => __('Recommended Image size for Collection 1 & 2 ( 960 * 432 ) & for 3,4,5 (700 * 600)','online-eshop'),
	'type' => 'checkbox',
));

$online_eshop_popular_no = 5;
for( $i = 1; $i <= $online_eshop_popular_no; $i++ ) {
        $online_eshop_popular_page   = 'online_eshop_popular_page_' .$i;
        $online_eshop_popular_btn   = 'online_eshop_popular_btn_' .$i;
		$online_eshop_popular_btn_url   = 'online_eshop_popular_btn_url_' .$i;
	        $wp_customize->add_setting( $online_eshop_popular_page,
            array(
                'default'           => 1,
                'sanitize_callback' => 'online_eshop_sanitize_dropdown_pages',
            )
        );

        $wp_customize->add_control( $online_eshop_popular_page,
            array(
                'label'     => __( 'Popular Collection', 'online-eshop' ) .$i,
                'section'   => 'online_eshop_popular_category',
                'type'      => 'dropdown-pages',
                'priority'  => 11,
            )
        );	

        $wp_customize->add_setting( $online_eshop_popular_btn, 
        array(
		'default' =>'Know More',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( $online_eshop_popular_btn, 
		array(
		'priority'=>11,
		'label' => __('Enter Popular Collection Button Text', 'online-eshop'),
		'section' => 'online_eshop_popular_category',
		'type' => 'text',
	));
	$wp_customize->add_setting( $online_eshop_popular_btn_url, array(
		'default' =>'#',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control( $online_eshop_popular_btn_url,
	 array(
		'priority'=>11,
		'label' => __('Enter Popular Collection Button Url', 'online-eshop'),
		'section' => 'online_eshop_popular_category',
		'type' => 'text',
	));
}




/* Features */
$wp_customize->add_section( 'online_eshop_features', array(
	'title' => __('Bottom Features', 'online-eshop'),
	'priority' => 14,
	'panel' =>'online_eshop_frontpage_panel'
));

$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_disable_features]', array(
	'default' => 0,
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_disable_features]', array(
	'priority' => 10,
	'label' => __('Disable Bottom Features', 'online-eshop'),
	'section' => 'online_eshop_features',
	'type' => 'checkbox',
));

$online_eshop_features_no = 3;
for( $i = 1; $i <= $online_eshop_features_no; $i++ ) {
        $online_eshop_features_page   = 'online_eshop_features_page_' .$i;

	        $wp_customize->add_setting( $online_eshop_features_page,
            array(
                'default'           => 1,
                'sanitize_callback' => 'online_eshop_sanitize_dropdown_pages',
            )
        );

        $wp_customize->add_control( $online_eshop_features_page,
            array(
                'label'     => __( 'Our Features Page', 'online-eshop' ) .$i,
                'section'   => 'online_eshop_features',
                'type'      => 'dropdown-pages',
                'priority'  => 11,
            )
        );	
}


$wp_customize->add_section( 'product_promotion', array(
	'title' => __( 'Product Promotion', 'online-eshop' ),
	'priority' => 10,
	'panel' => 'online_eshop_frontpage_panel'
));

/********************** Product Promotion Image ***********************************/

$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_disable_promotion_section]', array(
	'default' => $online_eshop_settings['online_eshop_disable_promotion_section'],
	'sanitize_callback' => 'online_eshop_checkbox_integer',
	'type' => 'option',
));
$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_disable_promotion_section]', array(
	'priority'=>5,
	'label' => __('Disable Promotion Section', 'online-eshop'),
	'section' => 'product_promotion',
	'type' => 'checkbox',
));

for ( $i=1; $i <= 2; $i++ ) {
	$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_img-product-promotion-image-'.$i.']',array(
		'default'	=> $online_eshop_settings['online_eshop_img-product-promotion-image-'.$i],
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'online_eshop_theme_options[online_eshop_img-product-promotion-image-'.$i.']', array(
		'label' => __('Product Promotion #','online-eshop') .$i,
		'priority'=>10 .$i,
		'description' => __('Recommended Image size ( 660 X 340 )','online-eshop'),
		'section' => 'product_promotion',
		)
	));

	$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_product_promotion_title_'.$i.']', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	));
	$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_product_promotion_title_'.$i.']', array(
		'priority'=>10 .$i,
		'label' => __(' Enter Product Title', 'online-eshop')  .$i,
		'section' => 'product_promotion',
		'type' => 'text',
	));

		$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_product_promotion_subtitle_'.$i.']', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	));
	$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_product_promotion_subtitle_'.$i.']', array(
		'priority'=>10 .$i,
		'label' => __(' Enter Product Sub Title', 'online-eshop')  .$i,
		'section' => 'product_promotion',
		'type' => 'text',
	));

	$wp_customize->add_setting( 'online_eshop_theme_options[online_eshop_product_promotion_url_'.$i.']', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
	));
	$wp_customize->add_control( 'online_eshop_theme_options[online_eshop_product_promotion_url_'.$i.']', array(
		'priority'=>10 .$i,
		'label' => __(' Enter Product Url #', 'online-eshop')  .$i,
		'section' => 'product_promotion',
		'type' => 'url',
	));
}

 $wp_customize->add_section(
      'sidebar-widgets-online_eshop_template',
            array(
                'priority'          => 11,
                'panel'             => 'online_eshop_frontpage_panel',
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'title'             => __( 'Featured Products', 'online-eshop' ),
                'description'       => __( 'Add widgets to show Featured Products', 'online-eshop' ),
            )
        
    );

  $wp_customize->add_section(
      'sidebar-widgets-online_eshop_ad_banner',
            array(
                'priority'          => 1,
                'panel'             => 'online_eshop_frontpage_panel',
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'title'             => __( 'Advertisement Banner', 'online-eshop' ),
                'description'       => __( 'Add Image Widget To Show Advertisement (Recommended Size 728*90)', 'online-eshop' ),
            )
        
    );