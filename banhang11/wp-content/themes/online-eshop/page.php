<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Online Eshop
 * @since 1.0
 */

get_header(); ?>
<!--Page area start here-->
<section id="content" class="content-section section">
    <div class="container">
        <div class="row">
    		<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content/content', 'page' );

				

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>
        </div>
    </div>
</section>
<!--Page area end here-->
<?php get_footer();