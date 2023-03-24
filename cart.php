<?php

/**
 * Template Name: Custom Cart Page
 */

get_header();

global $woocommerce;
$items = $woocommerce->cart->get_cart();
$total_price = 0;


?>


<div class="back-color">
    <!-- Busket Section
    ================================================== -->
    <section>

        <div class="container">

            <div class="catalog-head">
                <div>
                    <h2>Корзина</h2>
                </div>
            </div>
            <?php
            foreach ($items as $item => $values) {
                $_product = $values['data'];
                $product_id = $_product->get_id();
                $product_name = $_product->get_name();
                $product_price = $_product->get_price();
                $product_quantity = $values['quantity'];
                $item_price = $product_price * $product_quantity;
                $total_price += $item_price;
            ?>
                <div class="row busket-product-section">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <div class="busket-image">
                                    <img src="../vape shop/image/busket-img.png" alt="">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="busket-product-name">
                                    <p><?php echo $product_name; ?></p>
                                </div>
                                <div class="busket-product-price">
                                    <p><?php echo $product_price; ?> грн</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                                <div class="quantity-step">
                                    <button class="minus-btn" type="button" name="button">
                                        -
                                    </button>
                                    <input id="quantity-input" type="text" name="name" value="4">
                                    <button class="plus-btn" type="button" name="button">
                                        +
                                    </button>
                                </div>
                            </div>

                            <div class="col-6 busket-quantity-price">
                                <p><?php echo $item_price; ?> грн</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }; ?>

            <div class="review-busket busket-button">
                <a href="#">Оформити замовлення</a>
            </div>

        </div>
    </section>

    <?php get_footer(); ?>