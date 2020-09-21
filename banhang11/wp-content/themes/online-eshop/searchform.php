<?php
/**
 * Displays the searchform
 *
 * @package Online Eshop
 * @since 1.0
 */
?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
	<label class="screen-reader-text"><?php echo esc_html__('Search for:','online-eshop'); ?></label>
	<input type="search" name="s" placeholder="<?php esc_attr_e('Search here', 'online-eshop'); ?>" autocomplete="off" />
	<button type="submit"><i class="fa fa-search"></i></button>
</form> <!-- end .search-form -->