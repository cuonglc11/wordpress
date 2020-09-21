<?php
/**
 * Displays the top header
 *
 * @package Online Eshop
 * @since 1.0
 */
$online_eshop_settings = online_eshop_get_theme_options();
?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 hidden-sm hidden-xs">
		<?php
        $disable_top_social_icons = $online_eshop_settings['online_eshop_disable_top_social_icons'];
        if($disable_top_social_icons == 0 ): 
	    

	    	$online_eshop_top_social_icon_url_1 = $online_eshop_settings[ 'online_eshop_top_social_icon_url_1' ];
		    $online_eshop_top_social_icon_url_2 = $online_eshop_settings[ 'online_eshop_top_social_icon_url_2' ];
		    $online_eshop_top_social_icon_url_3 = $online_eshop_settings[ 'online_eshop_top_social_icon_url_3' ];
		    $online_eshop_top_social_icon_url_4 = $online_eshop_settings[ 'online_eshop_top_social_icon_url_4' ];
		    $online_eshop_top_social_icon_url_5 = $online_eshop_settings[ 'online_eshop_top_social_icon_url_5' ];

		?>

	    <div class="top-l-social">
	       <ul class="list-inline">
	       	<?php if(!empty($online_eshop_top_social_icon_url_1)) { ?>
	            <li><a href="<?php echo esc_attr($online_eshop_top_social_icon_url_1); ?>"><i class="fa fa-facebook"></i></a></li>
	        <?php } if(!empty($online_eshop_top_social_icon_url_2)) {?>
	            <li><a href="<?php echo esc_attr($online_eshop_top_social_icon_url_2); ?>"><i class="fa fa-twitter"></i></a></li>
	        <?php } if(!empty($online_eshop_top_social_icon_url_3)) {?>
	            <li><a href="<?php echo esc_attr($online_eshop_top_social_icon_url_3); ?>"><i class="fa fa-instagram"></i></a></li>
	        <?php } if(!empty($online_eshop_top_social_icon_url_4)) {?>
	            <li><a href="<?php echo esc_attr($online_eshop_top_social_icon_url_4); ?>"><i class="fa fa-pinterest"></i></a></li>
	        <?php } if(!empty($online_eshop_top_social_icon_url_5)) {?>
	             <li><a href="<?php echo esc_attr($online_eshop_top_social_icon_url_5); ?>"><i class="fa fa-youtube"></i></a></li>
	         <?php } ?>

	            
	        </ul>
	    </div>
	    <?php endif; ?>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	    <div class="top-linked text-right">
	        <ul class="list-inline">
	        	<?php
	        	 $online_eshop_top_login_menu  = $online_eshop_settings[ 'online_eshop_top_login_menu'];
	        	 $online_eshop_top_login_menu_url  = $online_eshop_settings[ 'online_eshop_top_login_menu_url'];
	        	 $online_eshop_top_Register_menu  = $online_eshop_settings[ 'online_eshop_top_Register_menu'];
	        	 $online_eshop_top_register_menu_url  = $online_eshop_settings[ 'online_eshop_top_register_menu_url'];

				 if(!empty($online_eshop_top_login_menu)) { 
	        	  ?>
	            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-130"><a href="<?php echo esc_url($online_eshop_top_login_menu_url); ?>"><?php echo esc_html($online_eshop_top_login_menu); ?></a>
	            </li>
	        	<?php } 
	            if(!empty($online_eshop_top_Register_menu)) { 
	        	  ?>
	            <li class=""><a href="<?php echo esc_url($online_eshop_top_register_menu_url); ?>"><?php echo esc_html($online_eshop_top_Register_menu); ?></a>
	            </li>
	        	<?php } ?>
	            <?php
		        $disable_mycart = $online_eshop_settings['online_eshop_disable_mycart'];
		        if($disable_mycart == 0 ):
	            do_action ('online_eshop_mycart_button_display');
	            endif;
	            ?>
	        </ul>
	    </div>
	</div>
</div>