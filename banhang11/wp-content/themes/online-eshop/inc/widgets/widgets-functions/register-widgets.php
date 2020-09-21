<?php
/**
 * @package Online Eshop
 * @since 1.0
 */
/**************** ONLINE ESHOP REGISTER WIDGETS ***************************************/
add_action('widgets_init', 'online_eshop_widgets_init');
function online_eshop_widgets_init() {

	register_sidebar(array(
		'name' => __('Blog Sidebar', 'online-eshop'),
		'id' => 'online_eshop_blog_sidebar',
		'description' => __('Shows widgets at Main Sidebar.', 'online-eshop'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('Advertisement Banner', 'online-eshop'),
		'id' => 'online_eshop_ad_banner',	
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name' => __('Online Eshop Template', 'online-eshop'),
		'id' => 'online_eshop_template',
		'description' => __('Shows widgets on Online Eshop Template.', 'online-eshop'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="section-heading"><h2>',
		'after_title' => '</h2></div></div>',
	));
	
	register_sidebar(array(
		'name' => __('Shopping Sidebar', 'online-eshop'),
		'id' => 'online_eshop_woocommerce_sidebar',
		'description' => __('Add WooCommerce Widgets Only', 'online-eshop'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="heading"><h4>',
		'after_title' => '</h4></div>',
	));

	$online_eshop_settings = online_eshop_get_theme_options();
	for($i =1; $i<= $online_eshop_settings['online_eshop_footer_column_section']; $i++){

		// Registering for Online Eshop Footer Widgets
		register_sidebar(array(
			'name' => __(' Online Eshop Footer Column ', 'online-eshop') . $i,
			'id' => 'online_eshop_footer_col_'.$i,
			'description' => __(' Add Online Eshop Footer Column ', 'online-eshop').$i,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		));
	}

	// Registering for Online Eshop Footer Bottom Widget
	register_sidebar(array(
		'name' => __(' Online Eshop Footer Bottom', 'online-eshop'),
		'id' => 'online_eshop_footer_bottom',
		'description' => __(' Add Online Eshop Footer Column ', 'online-eshop').$i,
		'before_widget' => '<div id="%1$s" class="footer-content %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<span class="screen-reader-text">',
		'after_title' => '</span>',
	));
	//Register Widget.
	register_widget( 'Online_Eshop_Latest_Post_Widgets' );
	
	if ( class_exists('woocommerce')) {
		register_widget( 'Online_Eshop_Product_List_Widget' );
	}
}