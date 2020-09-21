<?php
/**
 * Custom action hooks
 *
 * @package Online Eshop
 * @since 1.0
 */


/*********************** Online Eshop Slider Fatures ***********************************/

function online_eshop_slider_fature() {



	$online_eshop_settings = online_eshop_get_theme_options();

	for ( $i=1; $i <= 4; $i++ ) {

	$icon_class = $online_eshop_settings[ 'online_eshop_feature_icon_class_'. $i ];

	if (!empty ($icon_class)): ?>

		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

            <div class="info-list text-center wow animated fadeIn" data-wow-duration="0.5s">

            	<span><i class="fa <?php echo esc_attr($icon_class);?>"></i></span>

                <h4><?php echo esc_html($online_eshop_settings[ 'online_eshop_feature_title_'. $i ]);?></h4>

                <p><?php echo esc_html($online_eshop_settings[ 'online_eshop_feature_subtitle_'. $i ]);?></p>

            </div>

        </div>

	<?php endif;

	}

}



add_action ('online_eshop_slider_fatures', 'online_eshop_slider_fature');

/*********************** Online Eshop Product Promotion ***********************************/
function online_eshop_product_promotion() {

	$online_eshop_settings = online_eshop_get_theme_options();
	for ( $i = 1; $i <= 2; $i++ ) {
		 
			$online_eshop_product_promotionss = $online_eshop_settings[ 'online_eshop_img-product-promotion-image-'. $i ];
			$online_eshop_product_promotions_title = $online_eshop_settings[ 'online_eshop_product_promotion_title_'. $i ];
			$online_eshop_product_promotions_subtitle = $online_eshop_settings[ 'online_eshop_product_promotion_subtitle_'. $i ];

			 ?>
				<div class="col-md-6">
	                <div class="single-discount-item">
	                	<a class="link-hov style1" href="<?php echo esc_url ($online_eshop_settings['online_eshop_product_promotion_url_'.$i]); ?>">
                           <?php if (!empty($online_eshop_product_promotionss)){ ?>
                           	<img src="<?php echo esc_url ($online_eshop_product_promotionss); ?>">
                           <?php } else { ?>
                           	<img src="<?php echo esc_url(get_template_directory_uri() . '/images/default-promotion.jpg') ?>">
                           <?php } ?>
	                	</a>
	                	<div class="discount-text v1 middle-v <?php if($i==1) { ?> t-right <?php } elseif($i==2) { ?>t-left <?php } ?>"> 
                            <p><?php echo esc_html($online_eshop_product_promotions_title); ?></p> 
                            <h2><?php echo esc_html($online_eshop_product_promotions_subtitle); ?></h2>
                        </div>
	                </div>
	            </div>
			<?php
		
	}
}

add_action ('online_eshop_product_promotions', 'online_eshop_product_promotion');





function online_eshop_fronpage_template_product_category() {

	$online_eshop_settings = online_eshop_get_theme_options();
	$category_heading = $online_eshop_settings['online_eshop_categor_heading'];

	$product_cat_list	= array();
	for ( $i =1 ; $i <= $online_eshop_settings['online_eshop_total_categories'] ; $i++ ) {
		if( isset ( $online_eshop_settings['online_eshop_featured_category_' . $i] ) && $online_eshop_settings['online_eshop_featured_category_' . $i] !='-' ){
			$product_cat_list = array_merge( $product_cat_list, array( $online_eshop_settings['online_eshop_featured_category_' . $i] ) );
		}
	}
	if ( !empty( $product_cat_list ) ) { ?>
		<div class="catagerys-slider wow animated fadeIn" data-wow-duration="1.5s">
		<?php $i = 1;
		foreach ($product_cat_list as $category) {
			$thumbnail_id = get_term_meta( $category, 'thumbnail_id', true );
			$category_link = get_category_link( $category );
			$category_name = get_term( $category );
			$image_attribute = wp_get_attachment_image_src( $thumbnail_id, 'full' ); ?>
		    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		        <div class="categories">
		        	<?php if ( !empty($image_attribute[0]) ) { ?>
		            <figure><img src="<?php echo esc_url( $image_attribute[0] ); ?>"></figure>
		            <?php } else {?>
					<figure> <img src="<?php echo esc_url(get_template_directory_uri() . '/images/default-product.jpg') ?>"></figure>
					<?php } ?>
		            <div class="content">
		            	<?php if ( !empty($category_heading) ) { ?>
		                <span><?php echo esc_html($category_heading); ?></span>
		                <?php } ?>
		                <h3><a href="<?php echo esc_url( $category_link ); ?>"><?php echo esc_html($category_name->name); ?></a></h3>
		            </div>
		        </div>
		    </div>
		    <?php $i++; } ?>
		</div>
	<?php } wp_reset_postdata();
}

add_action ('online_eshop_fronpage_template_product_categories', 'online_eshop_fronpage_template_product_category');

/*********************** Online Eshop Slider Fatures ***********************************/
function online_eshop_blog_post_template() {
	
	$online_eshop_settings = online_eshop_get_theme_options();
	$online_eshop_blogpost_category = $online_eshop_settings['online_eshop_blogpost_category'];
	$online_eshop_num_posts = $online_eshop_settings['online_eshop_num_posts'];
	if ( !empty($online_eshop_blogpost_category) ) {
	    query_posts(array( 'ignore_sticky_posts' => 1, 'category_name' => $online_eshop_blogpost_category, 'posts_per_page' => $online_eshop_num_posts, 'orderby' => 'comment_count', 'order' => 'desc','post_status' => 'publish' ));
	}
	else{
	    query_posts('&ignore_sticky_posts=1'.'&posts_per_page='.$online_eshop_num_posts.'&order=desc'.'&orderby=comment_count'.'&post_status=publish');
	}
	while( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	            <div class="blog wow animated fadeInLeft" data-wow-duration="1.5s">
	                <?php online_eshop_post_thumbnail(); ?>
	                <div class="content">
	                    <div class="headings">
	                        <div class="data">
	                            <?php online_eshop_posted_on(); ?>
	                        </div>
	                        <?php printf(
	                            '<h3><a href="%1$s" title="%2$s">%3$s</a></h3>',
	                            esc_url( get_permalink() ),
	                            esc_attr( get_the_title() ),
	                            wp_trim_words( get_the_title(), 5 )
	                        ); ?>
	                    </div>
	                    <p><?php
						echo esc_html(online_eshop_entry_excerpt(15));
						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'online-eshop' ),
								'after'  => '</div>',
							)
						);
						?></p>
	                </div>
	            </div>
	        </div>
	    </div>
	<?php endwhile;
}

add_action ('online_eshop_blog_posts_template', 'online_eshop_blog_post_template');

/*********************** Single Blog Post author data ***********************************/
function online_eshop_single_blog_author() {

    global $online_eshop_img, $online_eshop_firstName, $online_eshop_lastName, $online_eshop_niceName, $online_eshop_description;
    $online_eshop_postId      = get_the_ID();
    $online_eshop_authorMeta  = get_the_author_meta('ID');
    $online_eshop_author      = get_user_by('id',$authorMeta);
    $online_eshop_authorID    = get_userdata( $author->ID );
    $online_eshop_firstName   = esc_attr($online_eshop_authorID->user_firstname);
    $online_eshop_lastName    = esc_attr($online_eshop_authorID->user_lastname);
    $online_eshop_niceName    = esc_attr($online_eshop_authorID->user_nicename);
    $online_eshop_description = $online_eshop_authorID->description;
    $online_eshop_img         = get_avatar( $online_eshop_authorID->user_email, 140 , '','Avatar' );
    $online_eshop_authorImg   = wp_kses($online_eshop_img, array('img' => array('alt' => array(), 'src' => array(), 'srcset' => array(), 'hieght' => array(), 'width' => array()))); ?>
	<div class="dbox">
        <div class="dleft">
            <figure><?php echo wp_kses_post($online_eshop_authorImg); ?></figure>
        </div>
        <div class="dright">
            <div class="content">
            	<?php
            	if ( $online_eshop_firstName != '' || $online_eshop_lastName != '' ):
            		printf(
						'<h4>%1$s<a href="%2$s">%3$s %4$s</a></h4>',
						__('About Admin : ', 'online-eshop'),
						esc_url( get_author_posts_url($online_eshop_authorMeta) ),
						esc_html($online_eshop_firstName),
						esc_html($online_eshop_lastName)
					);
            	else:
            		printf(
						'<h4>%1$s<a href="%2$s">%3$s</a></h4>',
						__('About Admin : ', 'online-eshop'),
						esc_url( get_author_posts_url($online_eshop_authorMeta) ),
						esc_html($online_eshop_niceName)
					);
				endif;
            	?>
                <p><?php echo esc_html($online_eshop_description); ?></p>
            </div>
        </div>
    </div>
    <?php
}

add_action ('online_eshop_single_blog_authors_meta', 'online_eshop_single_blog_author');

/**************************** SOCIAL MENU *********************************************/
// function online_eshop_social_links_display() {
// 	if ( has_nav_menu( 'social-links' ) ) :
// 		wp_nav_menu( array(
// 			'container' 	=> '',
// 			'theme_location' => 'social-links',
// 			'depth'          => 1,
// 			'items_wrap'      => '%3$s',
// 			'link_before'    => '<span class="screen-reader-text">',
// 			'link_after'     => '</span>',
// 		) );
// 	endif;
// }

// add_action ('online_eshop_social_links', 'online_eshop_social_links_display');


/*********************** Online Eshop Contact icons ***********************************/
function online_eshop_template_contact_icon() {

	$online_eshop_settings = online_eshop_get_theme_options();
	
	for ( $i = 1; $i <= 3; $i++ ) {
		$online_eshop_icon_image = $online_eshop_settings[ 'online_eshop_contact_icon_image_'. $i ];
		$online_eshop_contact_title = $online_eshop_settings[ 'online_eshop_contact_title_'. $i ];
		$online_eshop_contact_description = $online_eshop_settings[ 'online_eshop_contact_description_'. $i ];
	?>
		<div class="col-sm-4 text-center">
            <div class="info-list">
            	<?php if(!empty($online_eshop_icon_image)): ?>
                <span><img src="<?php echo esc_url ($online_eshop_icon_image); ?>"></span>
            	<?php endif;?>
                <h4><?php echo esc_html($online_eshop_contact_title); ?></h4>
                <p><?php echo esc_html($online_eshop_contact_description); ?></p>
            </div>
        </div>
    <?php }
}

add_action ('online_eshop_template_contact_icons', 'online_eshop_template_contact_icon');