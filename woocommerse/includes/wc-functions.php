<?php

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

function add_to_cart_custom() {
    $test = '<div class="review-busket">' . woocommerce_template_single_add_to_cart() . '</div>';
    $test = str_replace('<div class="quantity">', '<div class="suka">', $test);
    return $test;
}
add_action('woocommerce_single_product_summary', 'add_to_cart_custom', 10);
