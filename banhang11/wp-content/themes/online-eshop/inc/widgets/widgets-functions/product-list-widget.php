<?php
/**
 * Display products with layout 1 & 2.
 *
 * @package Online Eshop
 * @since 1.0
 */

class Online_Eshop_Product_List_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */

	function __construct() {
		$widget_ops = array( 'classname' => 'online-eshop-product-list', 'description' => __( 'Displays list of products on Online Eshop Template', 'online-eshop') );
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct( false, $name = __('Online Eshop Product List', 'online-eshop'), $widget_ops, $control_ops );
	}

	function form($instance) {
		$instance = wp_parse_args(( array ) $instance, array('title' => '', 'subtitle' => '', 'number' => '5', 'category' => '', 'product_type'=> 'latest', 'product_style' => 'for_page' ));
		$title    = esc_attr($instance['title']);
		$subtitle    = esc_attr($instance['subtitle']);
		$number = absint( $instance[ 'number' ] );
		$category = absint($instance[ 'category' ]);
		$product_type = $instance[ 'product_type' ];
		$product_style = $instance[ 'product_style' ];
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title'));?>"><?php echo esc_html__('Title:', 'online-eshop');?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title'));?>" name="<?php echo esc_attr($this->get_field_name('title'));?>" type="text" value="<?php echo esc_attr($title);?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('subtitle'));?>"><?php echo esc_html__('Sub Title:', 'online-eshop');?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('subtitle'));?>" name="<?php echo esc_attr($this->get_field_name('subtitle'));?>" type="text" value="<?php echo esc_attr($subtitle);?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php echo esc_html__( 'Number of Post:', 'online-eshop' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo absint($number); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'category' )); ?>"><?php echo esc_html__( 'Select Product Category', 'online-eshop' ); ?>:</label>
			<?php wp_dropdown_categories( array( 'show_option_none' => __( '--Select Category--', 'online-eshop' ), 'name' => esc_attr($this->get_field_name( 'category')), 'selected' => $category, 'taxonomy'	=> 'product_cat', 'class' => 'widefat' ) ); ?>
			<br>
			<span><?php echo esc_html__('Product Category will display only  when Category is selected from Options dropdown. ','online-eshop'); ?></span>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'product_type' )); ?>"><?php echo esc_html__( 'Options:', 'online-eshop' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'product_type' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'product_type' )); ?>">
				<option value="latest" <?php selected( $instance['product_type'], 'latest'); ?>><?php echo esc_html__( 'All Latest', 'online-eshop' ); ?></option>
				<option value="category" <?php selected( $instance['product_type'], 'category'); ?>><?php echo esc_html__( 'Category', 'online-eshop' ); ?></option>
			</select>
		</p>
		<p>
        	<label for="<?php echo esc_attr($this->get_field_id('product_style')); ?>"> <?php esc_html_e('Product Style:', 'online-eshop') ?></label>
        	<select class="widefat" id="<?php echo esc_attr($this->get_field_id('product_style')); ?>" name="<?php echo esc_attr($this->get_field_name('product_style')); ?>">
				<option value="for_page" <?php selected( $instance['product_style'], 'for_page' ); ?>> <?php esc_html_e('For Page', 'online-eshop') ?> </option>
            	<option value="for_sidebar" <?php selected( $instance['product_style'], 'for_sidebar' ); ?>> <?php esc_html_e('For Sidebar', 'online-eshop') ?> </option>
			</select>
        </p>
		<?php
	}
	function update($new_instance, $old_instance) {

		$instance  = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['subtitle'] = sanitize_text_field($new_instance['subtitle']);
		$instance[ 'number' ] = absint( $new_instance[ 'number' ] );
		$instance[ 'category' ] = absint($new_instance[ 'category' ]);
		$instance[ 'product_type' ] = sanitize_text_field($new_instance[ 'product_type' ]);
		$instance[ 'product_style' ] = sanitize_text_field($new_instance[ 'product_style' ]);
		return $instance;
	}
	function widget($args, $instance) {
		extract($args);
		extract($instance);
		global $post;
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$subtitle = isset( $instance[ 'subtitle' ] ) ? $instance[ 'subtitle' ] : '';
		$number = empty( $instance[ 'number' ] ) ? 5 : $instance[ 'number' ];
		$category = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
		$product_type = isset( $instance[ 'product_type' ] ) ? $instance[ 'product_type' ] : 'latest';
		$product_style = isset( $instance[ 'product_style' ] ) ? $instance[ 'product_style' ] : 'latest';

		if ( $product_type == 'category' ){  // Displays Selected Category
			$args = array(
				'posts_per_page' => absint($number),
				'post_type' => 'product',
				'tax_query' => array(
					array(
						'taxonomy'  => 'product_cat',
						'field'     => 'term_id',
						'terms'     => $category
					)
				),
			);
		} else {
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => absint($number),
				'orderby'	=> 'date',
				'order'	=> 'DESC',
			);
		}
		echo $before_widget; ?>
		<?php if ($product_style == 'for_page'): ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="section-heading">
					<?php if ( $title!='') { ?>
	                <h2><?php echo esc_html($title); ?></h2>
	                <?php } ?>
	                <?php if ( $subtitle != '' ) { ?>
					<p><?php echo esc_html($subtitle); ?></p>
					<?php } ?>
	            </div>
			</div>
			<div class="featured-slider wow animated fadeIn" data-wow-duration="1.5s">
			<?php
			$get_product_posts = new WP_Query( $args );

			while( $get_product_posts->have_posts() ):$get_product_posts->the_post();
				$product = wc_get_product( $get_product_posts->post->ID );
				$thumbnail_id = get_post_thumbnail_id();
				$image_attribute = wp_get_attachment_image_src($thumbnail_id, 'full');  ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="product-list">
						<?php if ( $image_attribute[0] ) { ?>
	                    <figure>
	                    	<img src="<?php echo esc_url( $image_attribute[0] ); ?>">
	                        <ul>
	                        	<?php if( function_exists( 'YITH_WCWL' ) ) { ?>
					            <li><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></li>
					            <?php } ?>
					            <li><?php woocommerce_template_loop_add_to_cart( $product );?></li>
	                        </ul>
	                    </figure>
	                    <?php } ?>
	                   <div class="content">
	                        <h4><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span><?php echo wp_kses_post($product->get_price_html());?></span></h4>
	                        <?php printf(
					            '<p>%1$s</p>',
					            wp_trim_words( $product->get_short_description(), 4, '' )
					        ); ?>
	                    </div>
	                </div>
				</div>
				<?php
					endwhile;
					wp_reset_postdata();
				?>
			</div>
		<?php endif; ?>
		<?php if ($product_style == 'for_sidebar'): ?>
			<?php if ( '' != $title ) { ?>
			<div class="heading">
                <h4><?php echo esc_html($title); ?></h4>
            </div>
            <?php } ?>
			<div class="sale-pro">
			<?php $get_product_posts = new WP_Query( $args );
			while( $get_product_posts->have_posts() ):$get_product_posts->the_post();
				$product = wc_get_product( $get_product_posts->post->ID );
				$thumbnail_id = get_post_thumbnail_id();
				$image_attribute = wp_get_attachment_image_src($thumbnail_id, 'full'); ?>
                <div class="pro-list">
                    <div class="dbox">
                    	<?php if ( $image_attribute[0] ) { ?>
                        <div class="dleft">
                            <img src="<?php echo esc_url( $image_attribute[0] ); ?>" alt="<?php the_title_attribute();?>">
                        </div>
                        <?php } ?>
                        <div class="dright">
                            <div class="con">
                                <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <strong><?php echo esc_html($product->get_price_html()); ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
					endwhile;
					wp_reset_postdata();
				?>
            </div>
		<?php endif; ?>
	<?php echo $after_widget;
	}
}