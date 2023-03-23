<?php

/**
 * Template Name: Custom Cart Page
 */

get_header();

global $woocommerce;
$items = $woocommerce->cart->get_cart();

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
                                <p>Гліцерин</p>
                            </div>
                            <div class="busket-product-price">
                                <p>240 грн</p>
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
                                <input type="text" name="name" value="1">
                                <button class="plus-btn" type="button" name="button">
                                    +
                                </button>
                            </div>
                        </div>

                        <div class="col-6 busket-quantity-price">
                            <p>240 грн</p>
                        </div>
                    </div>
                </div>
            </div>           

            <div class="review-busket busket-button">
                <a href="#">Оформити замовлення</a>
            </div>

        </div>
    </section>

    <?php get_footer(); ?>