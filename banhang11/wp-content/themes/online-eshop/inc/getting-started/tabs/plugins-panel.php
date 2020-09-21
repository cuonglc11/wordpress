<?php
/**
 * Plugin Panel.
 *
 */
?>
<!-- Updates panel -->
<div id="plugins-panel" class="panel-left visible">
	<h4><?php _e( 'Recommended Plugins', 'online-eshop' ); ?></h4>

	<p><?php _e( 'Below is a list of recommended plugins to install that will help you get the most out of Online EShop.', 'online-eshop' ); ?></p>

	<hr/>

	<?php 
	$free_plugins = array(
	                
         'One Click Demo Import' => array(
			'slug' 		=> 'one-click-demo-import',
			'filename' 	=> 'one-click-demo-import.php',
		), 
		'woocommerce' => array(
			'slug' 		=> 'woocommerce',
			'filename' 	=> 'woocommerce.php',
		),
        'YITH WooCommerce Wishlist' => array(
			'slug' 		=> 'yith-woocommerce-wishlist',
			'filename' 	=> 'yith-woocommerce-wishlist.php',
		)
			
	);

	if( $free_plugins ){ ?>
		<h4 class="recomplug-title"><?php esc_html_e( 'Free Plugins', 'online-eshop' ); ?></h4>
		<p><?php esc_html_e( 'These Free Plugins might be handy for you.', 'online-eshop' ); ?></p>
		<div class="recomended-plugin-wrap">
    		<?php
    		foreach( $free_plugins as $plugin ) {
    			$info     = online_eshop_call_plugin_api( $plugin['slug'] );
    			$icon_url = online_eshop_check_for_icon( $info->icons ); ?>    
    			<div class="recom-plugin-wrap">
    				<div class="plugin-img-wrap">
    					<img src="<?php echo esc_url( $icon_url ); ?>" />
    					<div class="version-author-info">
    						<span class="version"><?php printf( esc_html__( 'Version %s', 'online-eshop' ), $info->version ); ?></span>
    						<span class="seperator">|</span>
    						<span class="author"><?php echo esc_html( strip_tags( $info->author ) ); ?></span>
    					</div>
    				</div>
    				<div class="plugin-title-install clearfix">
    					<span class="title" title="<?php echo esc_attr( $info->name ); ?>">
    						<?php echo esc_html( $info->name ); ?>	
    					</span>
                        <div class="button-wrap">
    					   <?php echo Online_Eshop_Getting_Started_Page_Plugin_Helper::instance()->get_button_html( $plugin['slug'] ); ?>
                        </div>
    				</div>
    			</div>
    			<?php
    		} 
            ?>
		</div>
	<?php
	} 
?>
</div><!-- .panel-left -->