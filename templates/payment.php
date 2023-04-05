<?php

/**
 * Template Name: Payment_page
 * Template post type: page*/

get_header();
?>

<div class="back-color">

        <section>
            <div class="container">
                <div class="payment-head">
                    <h2>Оплата</h2>
                </div>
                <div class="back">
                    <?php echo get_field('pay_content'); ?>
                </div>

                <div class="payment-head">
                    <h2>Доставка</h2>
                </div>

                <div class="back delivery">
                    <?php echo get_field('delivery_content'); ?>
                </div>
            </div>
        </section>

<?php get_footer(); ?>