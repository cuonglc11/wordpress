<?php
/**
 * The sidebar containing the main Sidebar area.
 *
 * @package Online Eshop
 * @since 1.0
 */

$online_eshop_settings = online_eshop_get_theme_options();
$sidebar_position = $online_eshop_settings['online_eshop_sidebar_position'];
?>
<div class="col-md-3 col-sm-12 <?php echo esc_attr($sidebar_position);?>">
	<div class="sideberb">
	<?php dynamic_sidebar( 'online_eshop_blog_sidebar' ); ?>
	</div>
</div>