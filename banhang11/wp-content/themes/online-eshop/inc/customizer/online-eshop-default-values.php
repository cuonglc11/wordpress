<?php
if(!function_exists('online_eshop_get_option_defaults_values')):
	/******************** SHOPPINGCART DEFAULT OPTION VALUES ******************************************/
	function online_eshop_get_option_defaults_values() {
		global $online_eshop_default_values;
		$online_eshop_default_values = array(

			'online_eshop_disable_post_author' => 0,
			'online_eshop_disable_post_date' => 0,
			'online_eshop_disable_post_comments' => 0,
			'online_eshop_sidebar_position' => 'floatright',
			
			'online_eshop_tag_text' => __('Continue Reading','online-eshop'),
			'online_eshop_excerpt_length'	=> '50',
			'online_eshop_reset_all' => 0,
			'online_eshop_blog_post_image' => 'on',
			'online_eshop_header_display' => 'header_text',
			'online_eshop_footer_column_section'	=>'4',
			'online_eshop_disable_promotion_section' => 0,
			'online_eshop_deisable_blogpost_sec' => 0,

			'online_eshop_disable_top_bar' => 0,
			'online_eshop_disable_top_social_icons' => 0,
			'online_eshop_disable_mycart' => 1,
			'online_eshop_disable_search_form' => 0,
			'online_eshop_disable_add_section'	=> 1,
			'online_eshop_disable_buttom_social_icons'	=> 1,
			'online_eshop_enable_product_detail_sidebar' => 1,
			'online_eshop_top_social_icon_url_1' => '#',
			'online_eshop_top_social_icon_url_2' => '#',
			'online_eshop_top_social_icon_url_3' => '#',
			'online_eshop_top_social_icon_url_4' => '#',
			'online_eshop_top_social_icon_url_5' => '#',

			'online_eshop_img-product-promotion-image-1' => '',
			'online_eshop_img-product-promotion-image-2' => '',
			'online_eshop_product_promotion_url_1' => '',
			'online_eshop_product_promotion_url_2' => '',
			'online_eshop_product_background_color' => 'off',
			'online_eshop_big_promo_category'	=> 'off',
			'online_eshop_display_featured_brand'	=> 'below-widget',
			'online_eshop_display_advertisement'	=> 'above-slider',
			'online_eshop_breadcrumb_subtitle_display' => '',
			'online_eshop_footer_copyright_text' => '',


			/* Slider Settings */
			'online_eshop_default_category'	=> 'post_category',
			'online_eshop_slider_type'	=> 'default_slider',
			'online_eshop_enable_slider' => 'disable',
			'online_eshop_category_slider' =>array(),
			'online_eshop_default_category_slider' => '',
			'online_eshop_slider_number'	=> '3',

			/* Layer Slider */
			'online_eshop_slideshow_image_1' => '',
			'online_eshop_slideshow_image_2' => '',
			'online_eshop_slideshow_image_3' => '',
			'online_eshop_slideshow_toptext_1' => '',
			'online_eshop_slideshow_toptext_2' => '',
			'online_eshop_slideshow_toptext_3' => '',
			'online_eshop_slideshow_midtext_1' => '',
			'online_eshop_slideshow_midtext_2' => '',
			'online_eshop_slideshow_midtext_3' => '',
			'online_eshop_slideshow_bottext_1' => '',
			'online_eshop_slideshow_bottext_2' => '',
			'online_eshop_slideshow_bottext_3' => '',
			'online_eshop_slideshow_btn_url_1' => '#',
			'online_eshop_slideshow_btn_url_2' => '#',
			'online_eshop_slideshow_btn_url_3' => '#',
			/* Features */
			'online_eshop_feature_icon_class_1' => 'fa-truck',
			'online_eshop_feature_icon_class_2' => 'fa-credit-card',
			'online_eshop_feature_icon_class_3' => 'fa-headphones',
			'online_eshop_feature_icon_class_4' => 'fa-clock-o',
			'online_eshop_feature_title_1' => '',
			'online_eshop_feature_title_2' => '',
			'online_eshop_feature_title_3' => '',
			'online_eshop_feature_title_4' => '',
			'online_eshop_feature_subtitle_1' => '',
			'online_eshop_feature_subtitle_2' => '',
			'online_eshop_feature_subtitle_3' => '',
			'online_eshop_feature_subtitle_4' => '',
	
			/* Frontpage Blog Posts */
			'online_eshop_blogpost_title'	=> 'RECENT POSTS',
			'online_eshop_blogpost_subtitle' => 'Check out the best offers to stay in trend',
			'online_eshop_blogpost_category' => '',
			'online_eshop_num_posts' => '3',
			/* Frontpage Product Categories */
			'online_eshop_disable_product_categories'	=> 1,
			'online_eshop_total_categories'	=> '5',
			'online_eshop_categor_heading'	=> '',
			/*Social Icons */
			'online_eshop_adv_ban_position' => 'above-slider',

			/*Contact template*/
			'online_eshop_contact_icon_image_1' => '',
			'online_eshop_contact_icon_image_2' => '',
			'online_eshop_contact_icon_image_3' => '',
			'online_eshop_contact_title_1' => '',
			'online_eshop_contact_title_2' => '',
			'online_eshop_contact_title_3' => '',
			'online_eshop_contact_description_1' => '',
			'online_eshop_contact_description_2' => '',
			'online_eshop_contact_description_3' => '',
			'online_eshop_top_login_menu' => 'Login',
			'online_eshop_top_login_menu_url' => '#',
			'online_eshop_top_Register_menu' => 'Register',
			'online_eshop_top_register_menu_url' => '#',
			
			

			);
		return apply_filters( 'online_eshop_get_option_defaults_values', $online_eshop_default_values );
	}
endif;