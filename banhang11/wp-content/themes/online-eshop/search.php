<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Online Eshop
 * @since 1.0
 */

get_header(); ?>
<section class="blog-page-area section">
    <div class="container">
        <div class="row">
        	<?php if ( is_active_sidebar('online_eshop_blog_sidebar') ) { ?>
        	<?php get_sidebar(); ?>
        	<div class="col-md-9 col-sm-12 pd-l0 pd-r20">
        	<?php } else { ?>
        	<div class="col-md-12 col-sm-12 pd-l0 pd-r20">
        	<?php } ?>
                <div class="blog-list">
					<?php
					if ( have_posts() ) {
						// Load posts loop.
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/content/content' );
						}
						// Previous/next page navigation.
						online_eshop_the_posts_navigation();
					} else {
						// If no content, include the "No posts found" template.
						get_template_part( 'template-parts/content/content', 'none' );
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section><!-- .content-area -->
<?php get_footer();