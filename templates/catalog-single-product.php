<?php

/**
 * Template Name: Catalog_single_product
 * Template post type: page*/

get_header();
?>
<?php $catagory_name = get_field('catalog_single_product_heading'); ?>

<div class="back-color">
    <!-- Catalog Section
    ================================================== -->
    <section class="catalog-section">

        <div class="container">

                    <div class="catalog-head">
                        <div>
                            <h2><?php echo $catagory_name; ?></h2>
                        </div>
                    </div>         
           
            <div class="row">
                <div class="col-lg-3 col-md-2 col-3 catalog-link">
                    <?php
                    if (have_rows('sidebar', 'option')) :
                        while (have_rows('sidebar', 'option')) : the_row();
                            $image = get_sub_field('sidebar_image', 'option');
                            $img = wp_get_attachment_image($image, 'full', 'false', array('class' => 'catalog-img'));
                    ?>
                            <div>
                                <a href="<?php echo get_sub_field('sidebar_link', 'option'); ?>"><?php echo $img; ?></a>
                            </div>
                    <?php
                        endwhile;
                    endif; ?>
                </div>

                <div class="col-lg-9 col-md-10 col-9">

                    <div class="card-row">
                        <?php

                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field'    => 'name',
                                    'terms'    => $catagory_name,
                                ),
                            ),
                        );
                        $catagory_products = new WP_Query($args);

                        if ($catagory_products->have_posts()) :
                            while ($catagory_products->have_posts()) :
                                $catagory_products->the_post();
                                $product = wc_get_product(get_the_ID());
                        ?>
                                <div class="catalog-card">
                                    <div class="catalog-card-img">
                                        <a href="<?php the_permalink(); ?>"><?php echo $product->get_image('full', array('class' => 'catalog-img')); ?></a>
                                    </div>
                                    
                                        <div class="catalog-card-name">
                                            <p><?php echo $product->get_name(); ?></p>
                                        </div>
                                        <div class="catalog-card-price">
                                            <div class="catalog-price"><?php echo $product->get_price(); ?> грн</div>
                                            <div class="catalog-busket"><a href="<?php the_permalink(); ?>">До товару</a></div>
                                        </div>
                                    
                                </div>
                        <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <?php get_footer(); ?>