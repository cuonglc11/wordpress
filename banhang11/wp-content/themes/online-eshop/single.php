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

<!--Blog single page area start here-->
<section class="blog-single section">
    <div class="container">
        <div class="row">
        	<?php if ( is_active_sidebar('online_eshop_blog_sidebar') ) { ?>
        	<div class="col-md-9 col-sm-12 ">
        	<?php } else { ?>
        	<div class="col-md-12 col-sm-12">
        	<?php } ?>
            <?php
			/* Start the Loop */
			while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content/content', 'single' );
			endwhile; // End of the loop.
			?>
            </div>
            <?php get_sidebar(); ?>
        </div>

    </div>
</section>
<!--Blog single page area end here-->

<?php get_footer();