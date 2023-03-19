<?php

/**
 * Template Name: Catalog_single_product
 * Template post type: page*/

get_header();
?>

<div class="back-color">
    <!-- Catalog Section
    ================================================== -->
    <section class="catalog-section">

        <div class="container">

            <div class="row">

                <div class="col-md-6 col-12">
                    <div class="catalog-head">
                        <div>
                            <h2><?php echo get_field('catalog_single_product_heading'); ?></h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-12">

                    <div class="row">

                        <div class="col-6">
                            <div class="sort">
                                <p>За ціною</p>
                                <img class="sort-img" src="../vape shop/image/arrow-bottom.png" alt="">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="sort">
                                <p>За датою</p>
                                <img class="sort-img" src="../vape shop/image/arrow-top.png" alt="">
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-lg-3 col-md-2 col-3 catalog-link">
                    <?php
                    if (have_rows('catalog_single_product_sidebar')) :
                        while (have_rows('catalog_single_product_sidebar')) : the_row();
                            $image = get_sub_field('catalog_single_product_link_img');
                            $img = wp_get_attachment_image($image, 'full', 'false', array('class' => 'catalog-img'));
                            $sidebar_link = get_sub_field('catalog_single_product_link');
                    ?>
                            <div>
                                <a href="<?php echo $sidebar_link; ?>"><?php echo $img; ?></a>
                            </div>
                    <?php
                        endwhile;
                    endif; ?>

                </div>

                <div class="col-lg-9 col-md-10 col-9">

                    <div class="card-row">

                        <div class="catalog-card">
                            <div class="catalog-card-img">
                                <img class="catalog-img" src="../vape shop/image/catalog-card-img1.png" alt="">
                            </div>
                            <div class="catalog-card-name">
                                <p>Vape name</p>
                            </div>
                            <div class="catalog-card-price">
                                <div class="catalog-price">240 грн</div>
                                <div class="catalog-busket">В корзину</div>
                            </div>
                        </div>

                        <div class="catalog-card">
                            <div class="catalog-card-img">
                                <img class="catalog-img" src="../vape shop/image/catalog-card-img1.png" alt="">
                            </div>
                            <div class="catalog-card-name">
                                <p>Vape name</p>
                            </div>
                            <div class="catalog-card-price">
                                <div class="catalog-price">240 грн</div>
                                <div class="catalog-busket">В корзину</div>
                            </div>
                        </div>

                        <div class="catalog-card">
                            <div class="catalog-card-img">
                                <img class="catalog-img" src="../vape shop/image/catalog-card-img1.png" alt="">
                            </div>
                            <div class="catalog-card-name">
                                <p>Vape name</p>
                            </div>
                            <div class="catalog-card-price">
                                <div class="catalog-price">240 грн</div>
                                <div class="catalog-busket">В корзину</div>
                            </div>
                        </div>

                        <div class="catalog-card">
                            <div class="catalog-card-img">
                                <img class="catalog-img" src="../vape shop/image/catalog-card-img1.png" alt="">
                            </div>
                            <div class="catalog-card-name">
                                <p>Vape name</p>
                            </div>
                            <div class="catalog-card-price">
                                <div class="catalog-price">240 грн</div>
                                <div class="catalog-busket">В корзину</div>
                            </div>
                        </div>

                        <div class="catalog-card">
                            <div class="catalog-card-img">
                                <img class="catalog-img" src="../vape shop/image/catalog-card-img1.png" alt="">
                            </div>
                            <div class="catalog-card-name">
                                <p>Vape name</p>
                            </div>
                            <div class="catalog-card-price">
                                <div class="catalog-price">240 грн</div>
                                <div class="catalog-busket">В корзину</div>
                            </div>
                        </div>

                        <div class="catalog-card">
                            <div class="catalog-card-img">
                                <img class="catalog-img" src="../vape shop/image/catalog-card-img1.png" alt="">
                            </div>
                            <div class="catalog-card-name">
                                <p>Vape name</p>
                            </div>
                            <div class="catalog-card-price">
                                <div class="catalog-price">240 грн</div>
                                <div class="catalog-busket">В корзину</div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>


    <?php get_footer();