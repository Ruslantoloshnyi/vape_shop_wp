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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

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
                            <div class="busket">
                                <div>
                                    <img class="busket-img" src="image/busket.png" alt="">
                                </div>
                                <div>
                                    <p>12</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section>
                <nav class="navbar navbar-expand-md navbar-light bg-vape-shop">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="#" class="nav-link nav-active">Головна</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Каталог</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Контакти</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Оплата і доставка</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Корзина</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </nav>
            </section>
        </div>
    </header> <!-- Header End -->
