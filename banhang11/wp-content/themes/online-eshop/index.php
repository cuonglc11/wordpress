<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Online Eshop
 * @since 1.0
 */

get_header(); ?>
<section id="content" class="blog-page-area section">
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