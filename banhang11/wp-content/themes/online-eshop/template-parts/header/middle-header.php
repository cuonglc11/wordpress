<?php
/**
 * Displays the middle header
 *
 * @package Online Eshop
 * @since 1.0
 */
$online_eshop_settings = online_eshop_get_theme_options();
?>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="logo">
            <?php do_action('online_eshop_site_branding'); ?>
        </div>
    </div>
    <?php
    if ( (is_active_sidebar('online_eshop_ad_banner')) ) {
    $disable_add_section = $online_eshop_settings['online_eshop_disable_add_section'];
    if($disable_add_section == 0 ):
    ?>
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="add-wapper-img">
            <?php dynamic_sidebar ('online_eshop_ad_banner'); ?>
        </div>
    </div>
<?php endif; } ?>
</div>