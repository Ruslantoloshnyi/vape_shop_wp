<?php

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
// remove_action( 'woocommerce_single_product_summary', 'WC_Structured_Data::generate_product_data()', 60 );
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

function remove_checkout_fields( $fields ) {
	unset($fields['order']['order_comments']['placeholder']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_city_field']);
    unset($fields['billing']['billing_state']);
    
    return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_fields' ); 


