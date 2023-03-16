<?php

/**
 * Template Name: catalog
 * Template post type: page*/

get_header();
?>

<?php
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 8,
    'orderby'        => 'rand',
);
$products = new WP_Query($args);
?>

<div class="back-color">
    <!-- Catalog Section
    ================================================== -->
    <section class="catalog section">
        <div class="container">
            <div class="catalog-head">
                <div>
                    <h2>Каталог</h2>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-3 col-md-2 col-3 catalog-link">
                    <div>
                        <a href="#"><img class="catalog-img" src="../vape shop/image/catalog-link1.png" alt=""></a>
                    </div>
                    <div>
                        <a href="#"><img class="catalog-img" src="../vape shop/image/catalog-link2.png" alt=""></a>
                    </div>
                    <div>
                        <a href="#"><img class="catalog-img" src="../vape shop/image/catalog-link3.png" alt=""></a>
                    </div>
                </div>

                <div class="col-lg-9 col-md-10 col-9">

                    <div class="card-row">
                        <?php
                        if ($products->have_posts()) :
                            while ($products->have_posts()) :
                                $products->the_post();
                                $product = wc_get_product(get_the_ID());
                        ?>
                                <div class="catalog-card">
                                    <div class="catalog-card-img">
                                        <?php echo $product->get_image( array( 270, 270 ) ); ?>
                                    </div>
                                    <div class="catalog-card-name">
                                        <p><?php echo $product->get_name(); ?></p>
                                    </div>
                                    <div class="catalog-card-price">
                                        <div class="catalog-price"><?php echo $product->get_price(); ?> грн.</div>
                                        <div class="catalog-busket">В корзину</div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;                         
                        ?>

                    </div>

                </div>

            </div>
        </div>

    </section>

    <!-- Pagination -->
    <section class="pagination-section">

        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link"><img src="../vape shop/image/pagination-left.png" alt=""><a>

                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#"><img src="../vape shop/image/pagination-right.png" alt=""></a>
                </li>
            </ul>
        </nav>

    </section> <!-- Pagination end -->






    <?php get_footer(); ?>