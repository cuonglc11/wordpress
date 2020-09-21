<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Online Eshop
 * @since 1.0
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'online-eshop' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>
</div>