<?php

/**
 * Template Name: catalog
 * Template post type: page*/

get_header();
?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 9,
    'orderby'        => 'rand',
    'paged'          => $paged
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
                    <h2><?php echo get_field('catalog_heading'); ?></h2>
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
                        if ($products->have_posts()) :
                            while ($products->have_posts()) :
                                $products->the_post();
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
                                        <div class="catalog-price"><?php echo $product->get_price(); ?> грн.</div>
                                        <?php add_to_cart_custom_catalog(); ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pagination -->
    <section class="pagination-section">
        <nav aria-label="...">
            <?php
                            $pagination_links_string = paginate_links(array(
                                'format' => '?paged=%#%',
                                'current' => max(1, $paged),
                                'total' => $products->max_num_pages,
                                'prev_text' => '<<',
                                'next_text' => '>>',
                                'type'         => 'list'
                            ));
                            $pagination_links_string = str_replace('<li>', '<li class="page-item">', $pagination_links_string);
                            echo $pagination_links_string;
            ?>
        </nav>
    </section> <!-- Pagination end -->
<?php
                        endif;
                        wp_reset_postdata();
?>

<?php get_footer(); ?>