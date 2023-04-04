<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

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
                    <h2>Каталог</h2>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-3 col-md-2 col-3 catalog-link">
                    <?php
                    if (have_rows('catalog_sidebar')) :
                        while (have_rows('catalog_sidebar')) : the_row();
                            $image = get_sub_field('catalog_sidebar_image');
                            $img = wp_get_attachment_image($image, 'full', 'false', array('class' => 'catalog-img'));
                    ?>
                            <div>
                                <a href="<?php echo get_sub_field('catalog_sidebar_link'); ?>"><?php echo $img; ?></a>
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