<?php
/**
* Template part for displaying posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
 * @package Online Eshop
 * @since 1.0
*/
$online_eshop_settings = online_eshop_get_theme_options();
$online_eshop_disable_post_date = $online_eshop_settings['online_eshop_disable_post_date'];
$online_eshop_disable_post_comments = $online_eshop_settings['online_eshop_disable_post_comments'];
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('blog_details_con'); ?>>
    <div class="blogdetails">
        <?php online_eshop_post_thumbnail(); ?>
        <div class="content">
            <div class="headings">
                <?php if($online_eshop_disable_post_date == 0) { ?>
                <div class="data">
                    <?php online_eshop_posted_on(); ?>
                </div>
                <?php } ?>
                <?php the_title( sprintf( '<h3><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' );	?>
            </div>
            <?php if($online_eshop_disable_post_comments == 0) { ?>
            <ul class="blog-meta">
                <li><i class='fa fa-comments-o'></i> <span><?php comments_number( __('1 Comment', 'online-eshop' ), __('No Comments', 'online-eshop' ) ); ?></span></li>
                <li><?php the_tags('<span class="tag-links">', '|', '</span>'); ?></li>
            </ul>
             <?php } ?>
            <?php the_content(); ?>
        </div>
    </div>
    <!-- Author Meta Start-->
    <?php
	    global $description;
	    $authorMeta  = get_the_author_meta('ID');
	    $author      = get_user_by('id',$authorMeta);
	    $authorID    = get_userdata( $author->ID );
	    $description = $authorID->description;
    ?>
    <?php if( !empty($description) ): ?>
    <div class="admindetails">
        <?php do_action ('online_eshop_single_blog_authors_meta'); ?>
    </div>
	<?php endif; ?>
	<!-- Author Meta End-->
	<!-- Coment Areaa Start-->
    <?php if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif; ?>
    <!-- Coment Areaa End-->
</div>