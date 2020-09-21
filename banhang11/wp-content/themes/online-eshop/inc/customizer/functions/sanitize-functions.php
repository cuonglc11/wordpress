<?php
/**
 * Theme Customizer Functions
 *
 * @package Online Eshop
 * @since 1.0
 */
/********************* SHOPPINGCART CUSTOMIZER SANITIZE FUNCTIONS *******************************/
function online_eshop_checkbox_integer( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function online_eshop_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

function online_eshop_sanitize_category_select($input) {
	
	$input = sanitize_key( $input );
	return ( ( isset( $input ) && true == $input ) ? $input : '' );
}

function online_eshop_numeric_value( $input ) {
	if(is_numeric($input)){
	return $input;
	}
}

function online_eshop_reset_alls( $input ) {
	if ( $input == 1 ) {
		delete_option( 'online_eshop_theme_options');
		$input=0;
		return absint($input);
	} 
	else {
		return '';
	}
}

/************** Active Callback *************************************/
function online_eshop_post_category_callback( $control ) {
   if ( $control->manager->get_setting('online_eshop_theme_options[online_eshop_default_category]')->value() == 'post_category' ) {
      return true;
   } else {
      return false;
   }
}


function online_eshop_product_category_callback( $control ) {
    if ( $control->manager->get_setting('online_eshop_theme_options[online_eshop_default_category]')->value() == 'product_category' ) {
      return true;
   } else {
      return false;
   }
}