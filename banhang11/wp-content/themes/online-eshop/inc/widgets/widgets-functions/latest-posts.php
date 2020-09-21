<?php
/**
 * Display Latest Posts
 *
 * @package Online Eshop
 * @since 1.0
 */

class Online_Eshop_Latest_Post_Widgets extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */

	function __construct() {
		$widget_ops = array( 'classname' => 'widget-latest-posts', 'description' => __( 'Displays latest posts', 'online-eshop') );
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct( false, $name  =__('Online Eshop Latest Posts', 'online-eshop'), $widget_ops, $control_ops );
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 */
	public function form( $instance ) {
		$defaults = array( 'posts_style' => 'posts', 'num_posts' => '3', 'posts_title' => '');
		$instance = wp_parse_args( (array) $instance, $defaults );
		$num_posts = ! empty( $instance['num_posts'] ) ? absint( $instance['num_posts'] ) : 3;
		$posts_title = ! empty( $instance['posts_title'] ) ? esc_attr( $instance['posts_title'] ) : '';
		?>
        <p>
        	<label for="<?php echo esc_attr($this->get_field_id('posts_style')); ?>"> <?php echo esc_html__('Posts Style:', 'online-eshop') ?></label>
        	<select class="widefat" id="<?php echo esc_attr($this->get_field_id('posts_style')); ?>" name="<?php echo esc_attr($this->get_field_name('posts_style')); ?>">
				<option value="posts" <?php selected( $instance['posts_style'], 'posts' ); ?>> <?php echo esc_html__('For Sidebar', 'online-eshop') ?> </option>
            	<option value="recent-post" <?php selected( $instance['posts_style'], 'recent-post' ); ?>> <?php echo esc_html__('For Footer', 'online-eshop'); ?> </option>
			</select>
        </p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'num_posts' )); ?>"><?php echo esc_html__( 'Number of posts:', 'online-eshop' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'num_posts' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'num_posts' )); ?>" type="text" value="<?php echo esc_attr( $num_posts ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'posts_title' )); ?>"><?php echo esc_html__( 'Title:', 'online-eshop' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'posts_title' )); ?>" name="<?php echo esc_attr($this->get_field_name('posts_title')); ?>" type="text" value="<?php echo esc_attr( $posts_title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance 			     = $old_instance;
		$instance['posts_style'] = strip_tags( $new_instance['posts_style'] );
		$instance['num_posts'] 	 = absint( $new_instance['num_posts'] );
		$instance['posts_title'] = sanitize_text_field( $new_instance['posts_title'] );
		return $instance;
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 */
	public function widget( $args, $instance ) {
		$online_eshop_settings = online_eshop_get_theme_options();
		extract($args);
		$posts_style = $instance['posts_style'] ? $instance['posts_style'] : 'posts';
		$num_posts   = $instance['num_posts'] ? $instance['num_posts'] : 3;
		$posts_title = apply_filters('widget_title', $instance['posts_title'] );
		echo $before_widget; ?>

		<div class="widghet <?php echo esc_attr($posts_style);?>">
			<?php if(!empty($posts_title) ){ ?>
			<?php if($posts_style == 'posts'): ?>
				<h3><?php echo esc_html($posts_title); ?></h3>
			<?php endif; ?>
			<?php if($posts_style == 'recent-post'): ?>
				<h4><?php echo esc_html($posts_title); ?></h4>
			<?php endif; ?>
			<?php } ?>
			<?php 
			$args = array( 'ignore_sticky_posts' => 1, 'posts_per_page' => $num_posts, 'post_status' => 'publish', 'orderby' => 'comment_count', 'order' => 'desc' );
			$popular = new WP_Query( $args );
			if ( $popular->have_posts() ) :
			while( $popular-> have_posts() ) : $popular->the_post(); ?>
            <div class="post-list">
            	<?php if($posts_style == 'posts'): ?>
            		<div class="dbox">
                	<?php if ( has_post_thumbnail() ) { ?>
                    <div class="dleft">
                        <figure><?php the_post_thumbnail('online-eshop-latest-post-sidebar'); ?></figure>
                    </div>
                    <?php } ?>
                    <div class="dright">
                        <div class="contents">
                        	<?php printf(
	                            '<a href="%1$s" title="%2$s">%3$s</a>',
	                            esc_url( get_permalink() ),
	                            esc_attr( get_the_title() ),
	                            wp_trim_words( get_the_title(), 5 )
	                        ); ?>
                        	<?php
                        		printf( '<span>%1$s</span>',
                        		esc_html( get_the_time(get_option( 'date_format' )) )
								);
							?>
                        </div>
                    </div>
                </div>
            	<?php endif; ?>
            	<?php if($posts_style == 'recent-post'): ?>
            		<div class="post-list">
            			<?php if ( has_post_thumbnail() ) { ?>
                        <figure><?php the_post_thumbnail('online-eshop-latest-post-footer'); ?></figure>
                        <?php } ?>
                        <div class="content">
                        	<?php printf(
	                            '<h5><a href="%1$s" title="%2$s">%3$s</a></h5>',
	                            esc_attr( get_permalink() ),
	                            esc_attr( get_the_title() ),
	                            wp_trim_words( get_the_title(), 3 )
	                        ); ?>
                        	<?php
                        		printf( '<span>%1$s</span>',
                        		esc_html( get_the_time(get_option( 'date_format' )) )
								);
							?>
                        </div>
                    </div>
            	<?php endif; ?>
            </div>
            <?php
				endwhile;
				wp_reset_postdata();
				endif;
			?>
		</div>
		<?php echo $after_widget;
	}
}