<?php

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

function add_to_cart_custom_single() {
    $button = '<div class="review-busket">' . woocommerce_template_single_add_to_cart() . '</div>'; 
    $button = str_replace('<div>', '<div class="review-busket hidden-btn">', $button);   
    return $button;
}
add_action('woocommerce_single_product_summary', 'add_to_cart_custom_single', 10);

function add_to_cart_custom_catalog() {
    $button = '<div class="catalog-busket">' . woocommerce_template_single_add_to_cart() . '</div>'; 
       
    return $button;
}
add_action('woocommerce_single_product_summary', 'add_to_cart_custom_catalog', 10);


