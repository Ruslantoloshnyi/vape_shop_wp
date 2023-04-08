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
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
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

            <?php
            $grid_fields = get_field('grid_section');
            $grid_img_1 = wp_get_attachment_image($grid_fields['grid_img_1'], 'full', false, ['class' => 'front-grid-img']);
            $grid_img_2 = wp_get_attachment_image($grid_fields['grid_img_2'], 'full', false, ['class' => 'front-grid-img']);
            $grid_img_3 = wp_get_attachment_image($grid_fields['grid_img_3'], 'full', false, ['class' => 'front-grid-img']);
            $grid_img_4 = wp_get_attachment_image($grid_fields['grid_img_4'], 'full', false, ['class' => 'front-grid-img']);
            $grid_img_5 = wp_get_attachment_image($grid_fields['grid_img_5'], 'full', false, ['class' => 'front-grid-img']);
            $grid_img_6 = wp_get_attachment_image($grid_fields['grid_img_6'], 'full', false, ['class' => 'front-grid-img']);
            $grid_img_7 = wp_get_attachment_image($grid_fields['grid_img_7'], 'full', false, ['class' => 'front-grid-img']);
            ?>

            <div>
                <h2><?php echo $grid_fields['grid_heading']; ?></h2>
            </div>

            <div class="grid-container">

                <div class="front-grid-item1">
                    <?php echo $grid_img_1; ?>
                </div>

                <div class="front-grid-item2">
                    <?php echo $grid_img_2; ?>
                </div>

                <div class="front-grid-item3">
                    <?php echo $grid_img_3; ?>
                </div>

                <div class="front-grid-item4">
                    <?php echo $grid_img_4; ?>
                </div>

                <div class="front-grid-item5">
                    <?php echo $grid_img_5; ?>
                </div>

                <div class="front-grid-item6">
                    <?php echo $grid_img_6; ?>
                </div>

                <div class="front-grid-item7">
                    <?php echo $grid_img_7; ?>
                </div>

            </div>

        </div>

    </section> <!-- Grid section End -->

    <?php get_footer(); ?>