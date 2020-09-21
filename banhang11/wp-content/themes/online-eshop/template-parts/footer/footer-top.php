<?php
/**
* Displays the footer top area
*
* @package Online Eshop
* @since 1.0
*/

$online_eshop_settings = online_eshop_get_theme_options();
$footer_column = $online_eshop_settings['online_eshop_footer_column_section'];

if( is_active_sidebar( 'online_eshop_footer_col_1' ) && ( $footer_column == '1' || $footer_column == '2' || $footer_column == '3' || $footer_column == '4' ) ) : ?>
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="footer-diss">
            <?php dynamic_sidebar( 'online_eshop_footer_col_1' ); ?>
        </div>
    </div>
    <?php endif; ?>
    <?php if( is_active_sidebar( 'online_eshop_footer_col_2' ) && ( $footer_column == '2' || $footer_column == '3' || $footer_column == '4' ) ) : ?>
    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
        <div class="footer-shop-widget widget">
        <?php dynamic_sidebar( 'online_eshop_footer_col_2' ); ?>
        </div>
    </div>
    <?php endif; ?>
    <?php if( is_active_sidebar( 'online_eshop_footer_col_3' ) && ( $footer_column == '3' || $footer_column == '4' ) ) : ?>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <?php dynamic_sidebar( 'online_eshop_footer_col_3' ); ?>
    </div>
    <?php endif; ?>
    <?php if( is_active_sidebar( 'online_eshop_footer_col_4' ) && $footer_column == '4' ) : ?>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="footer-quick-widget widget">
        <?php dynamic_sidebar( 'online_eshop_footer_col_4' ); ?>
        </div>
    </div>
<?php endif; ?>