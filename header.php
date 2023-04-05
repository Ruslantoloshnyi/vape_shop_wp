<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vape_Shop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php $link = get_the_permalink(7);
    $image = get_field('header_cart_image', 'option');
    $img = wp_get_attachment_image($image, 'full', 'false', array('class' => 'busket-img'));
    ?>

    <header>
        <div class="container">
            <div class="header-title">
                <div class="header-slogan">
                    <h2><?php echo get_field('header_slogan', 'option'); ?></h2>
                </div>
                <div>
                    <div class="header-busket">
                        <div class="contact">
                            <p class="phone"><?php echo get_field('header_phone', 'option'); ?></p>
                            <p class="work-time"><?php echo get_field('header_work_time', 'option'); ?></p>
                        </div>
                        <div>
                            <a href="<?php echo $link; ?>">
                                <div class="busket">
                                    <div>
                                        <?php echo $img; ?>
                                    </div>
                                    <div>
                                        <p><?php echo WC()->cart->get_cart_contents_count(); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <section>
                <nav class="navbar navbar-expand-md navbar-light bg-vape-shop">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            
                            <?php wp_nav_menu([
                                'menu' => 'header_menu',
                                'menu_class' => 'navbar-nav',
                                'add_li_class' => 'nav-item',
                                'link_class' => 'nav-link'
                            ]); ?>

                        </div>
                    </div>
                </nav>
            </section>
        </div>
    </header> <!-- Header End -->