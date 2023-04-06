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


function add_custom_checkout_fields( $fields ) {

    $fields['billing']['billing_first_name'] = array(
        'label' => __('', 'woocommerce'),
        'placeholder' => _x('Имя', 'Имя', 'woocommerce'),
        'required' => true,
        'class' => array('col-md-8 col-12'),
        'clear' => true
    );

    $fields['billing']['billing_last_name'] = array(
        'label' => __('', 'woocommerce'),
        'placeholder' => _x('Прізвище', 'Имя', 'woocommerce'),
        'required' => true,
        'class' => array('col-md-8 col-12'),
        'clear' => true
    );

    $fields['billing']['billing_city'] = array(
        'label' => __('', 'woocommerce'),
        'placeholder' => _x('Місто', 'Имя', 'woocommerce'),
        'required' => true,
        'class' => array('col-md-8 col-12'),
        'clear' => true
    );

    $fields['billing']['billing_phone'] = array(
        'label' => __('', 'woocommerce'),
        'placeholder' => _x('Телефон', 'Имя', 'woocommerce'),
        'required' => true,
        'class' => array('col-md-8 col-12'),
        'clear' => true
    );

    $fields['billing']['billing_email'] = array(
        'label' => __('', 'woocommerce'),
        'placeholder' => _x('Email', 'Имя', 'woocommerce'),
        'required' => true,
        'class' => array('col-md-8 col-12'),
        'clear' => true
    );

    return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'add_custom_checkout_fields');
 
function woocommerce_remove_uah_symbol( $valyuta_symbol, $valyuta_code ) {
	if( $valyuta_code === 'UAH' ) {
		return 'грн'; 
		
	}
	return $valyuta_symbol;
}
add_filter('woocommerce_currency_symbol', 'woocommerce_remove_uah_symbol', 9999, 2);




