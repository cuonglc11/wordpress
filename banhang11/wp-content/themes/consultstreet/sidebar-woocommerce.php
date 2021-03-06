<?php 
/**
 * The sidebar containing the woocommerce widget area
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package consultstreet
 */

if ( is_active_sidebar( 'woocommerce' )  ) :
?>
<div class="col-lg-8 col-md-8 col-sm-12">
	<div class="sidebar">
		<!--Sidebar-->
		<?php dynamic_sidebar( 'woocommerce' ); ?>
		<!--/Sidebar-->
	</div>
</div>	
<?php endif; ?>