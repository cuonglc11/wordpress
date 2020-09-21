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
<div id="post-<?php the_ID(); ?>" <?php post_class('blog'); ?>>
	<?php online_eshop_post_thumbnail(); ?>
	<div class="content">
        <div class="headings">
            <?php if($online_eshop_disable_post_date == 0) { ?>
            <div class="data">
                <?php online_eshop_posted_on(); ?>
            </div>
            <?php } ?>
            <?php the_title( sprintf( '<h3><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
        </div>
        <?php if($online_eshop_disable_post_comments == 0) { ?>
        <ul class="blog-meta">
            <li><i class='fa fa-comments-o'></i> <span><?php comments_number( __('1 Comment', 'online-eshop' ), __('No Comments', 'online-eshop' ) ); ?></span></li>
        </ul>
        <?php } ?>
        <p><?php echo esc_html(online_eshop_entry_excerpt(56)); ?></p>
		<?php wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'online-eshop' ),
				'after'  => '</div>',
			)
		);
		?>
        <?php online_eshop_blog_post_read_more(); ?>
    </div>
</div>