<?php

/**
 * Template Name: front_page
 * Template post type: page*/

get_header();
?>

<div class="back-color">
    <!-- Slider Section
    ================================================== -->
    <section class="front-slider-section">
        <div class="container-fluid front-slider">

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <?php
                    if (have_rows('slider_image')) :
                        while (have_rows('slider_image')) : the_row();
                            $image = get_sub_field('slider_img');
                            $attr = ['class' => 'd-block w-100'];
                            $img = wp_get_attachment_image($image, 'full', false, $attr);
                    ?>
                            <div class="carousel-item active">
                                <?php echo $img; ?>
                            </div>
                    <?php
                        endwhile;
                    endif; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </section> <!-- Slider section End -->

    <!-- Sale Section
    ================================================== -->
    <section class="front-sale-section">
        <div class="container">
            <div class="row">
                <?php
                if (have_rows('slider_image')) :
                    while (have_rows('sale_image')) : the_row();
                        $sale_image = get_sub_field('sale_img');
                        $sale_img = wp_get_attachment_image($sale_image, 'full', false, ['class' => 'sale-img']);
                ?>
                        <div class="col-lg-4 col-12 front-sale">
                           <?php echo $sale_img; ?>
                        </div>
                <?php
                    endwhile;
                endif; ?>
            </div>
        </div>
    </section> <!-- Sale section End -->

    <!-- Grid Section
    ================================================== -->
    <section class="front-grid">

        <div class="container">

            <div>
                <h2>Популярні категорії</h2>
            </div>

            <div class="grid-container">

                <div class="front-grid-item1">
                    <img class="front-grid-img" src="../vape shop/image/grid-img-1.jpg" alt="">
                </div>

                <div class="front-grid-item2">
                    <img class="front-grid-img" src="../vape shop/image/grid-img-2.jpg" alt="">
                </div>

                <div class="front-grid-item3">
                    <img class="front-grid-img" src="../vape shop/image/grid-img-3.jpg" alt="">
                </div>

                <div class="front-grid-item4">
                    <img class="front-grid-img" src="../vape shop/image/grid-img-4.jpg" alt="">
                </div>

                <div class="front-grid-item5">
                    <img class="front-grid-img" src="../vape shop/image/grid-img-5.jpg" alt="">
                </div>

                <div class="front-grid-item6">
                    <img class="front-grid-img" src="../vape shop/image/grid-img-6.jpg" alt="">
                </div>

                <div class="front-grid-item7">
                    <img class="front-grid-img" src="../vape shop/image/grid-img-7.jpg" alt="">
                </div>

            </div>

        </div>

    </section> <!-- Grid section End -->




    <?php get_footer(); ?>