<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>

<div class="back-color">
        <!-- Review Section
    ================================================== -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <?php echo $product->get_image('full', array('class' => 'review-img')); ?>
                    </div>
                    <div class="col-md-6 col-12 review-text-content">
                        <div class="review-head container-review">
                            <p><?php echo $product->get_name(); ?></p>
                        </div>
                        <div class="review-subhead container-review">
                            <p><?php echo $product->get_short_description(); ?></p>
                        </div>
                        <div class="review-subhead container-review">
                            <p><?php echo $product->get_description(); ?></p>
                        </div>
                        <div class="review-order container-review">
                            <div class="review-price">
                                <p><?php echo $product->get_price(); ?> грн.</p>
                            </div>
                            <div class="review-busket">
                                <a href="#">В корзину</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


