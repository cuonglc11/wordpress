<?php
/**
 * Custom template tags for this theme
 *
 * @package Online Eshop
 * @since 1.0
 */

if ( ! function_exists( 'online_eshop_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function online_eshop_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html( '%s', 'post date', 'online-eshop' ),
			'<a href="' . esc_url( get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')) ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span>' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;


if ( ! function_exists( 'online_eshop_posted_by' ) ) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function online_eshop_posted_by() {
		printf(
			/* translators: 1: default text. 2: post author. */
			'<span>%1$s %2$s</span>',
			__( 'By', 'online-eshop' ),
			esc_html( get_the_author() )
		);
	}
endif;


if ( ! function_exists( 'online_eshop_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function online_eshop_post_thumbnail() {
		if ( ! online_eshop_can_show_post_thumbnail() ) {
			return;
		}?>
		<?php
			$online_eshop_settings = online_eshop_get_theme_options();
			$disable_post_author = $online_eshop_settings['online_eshop_disable_post_author'];
		?>
		<figure><?php the_post_thumbnail(); if($disable_post_author == 0) { online_eshop_posted_by();} ?></figure><!-- .post-thumbnail -->

		<?php
	}
endif;

if ( ! function_exists( 'online_eshop_comment_form' ) ) :
	/**
	 * Documentation for function.
	 */
	function online_eshop_comment_form( $order ) {
		if ( true === $order || strtolower( $order ) === strtolower( get_option( 'comment_order', 'asc' ) ) ) {

			comment_form(
				array(
					'logged_in_as' => null,
					'title_reply'  => null,
				)
			);
		}
	}
endif;


if ( ! function_exists( 'online_eshop_the_posts_navigation' ) ) :
	/**
	 * Documentation for function.
	 */
	function online_eshop_the_posts_navigation() {
		the_posts_pagination(
			array(
				'type'     => 'list',
				'prev_text' => '<span>' . __( 'Previous', 'online-eshop' ).'</span>',
				'next_text' => '<span>' . __( 'Next', 'online-eshop' ).'</span>',
				'before_page_number' => '',
			)
		);
	}
endif;

if ( ! function_exists( 'online-eshop_blog_post_read_more' ) ) :
	/**
	 * Documentation for function.
	 */
	function online_eshop_blog_post_read_more() {
		printf(
			'<a href="%1$s" class="btn7">%2$s <i class="fa fa-long-arrow-right"></i></a>',
			esc_url( get_permalink() ),
			__( 'Read More', 'online-eshop' )
		);
	}
endif;