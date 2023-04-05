<?php

/**
 * Template Name: Contacts_page
 * Template post type: page*/

get_header();
?>

<div class="back-color">
        <!-- Contacts Section
    ================================================== -->
        <section class="contacts-section">

            <div class="container">

                <div class="contacts-head">
                    <div>
                        <h2><?php echo get_field('contacts_head'); ?></h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-12 map-responsive">
                        <?php echo get_field('contacts_map'); ?>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="container">
                            <div class="contacts-text-head">
                                <h4><?php echo get_field('contacts_content_head'); ?></h4>
                            </div>

                            <div class="contacts-text">
                                <p><?php echo get_field('contacts_content'); ?></p>
                            </div>

                            <div>
                                <div class="contacts-info">
                                    <img class="contacts-img" src="<?php echo get_template_directory_uri() . '/assets/image/contacts-img-1.png'; ?>" alt="">
                                    <p><?php echo get_field('header_phone', 'option'); ?></p>
                                </div>
                                <div class="contacts-info">
                                    <img class="contacts-img" src="<?php echo get_template_directory_uri() . '/assets/image/contacts-img-2.png'; ?>" alt="">
                                    <p><?php echo get_field('address', 'option'); ?></p>
                                </div>
                                <div class="contacts-info">
                                    <img class="contacts-img" src="<?php echo get_template_directory_uri() . '/assets/image/contacts-img-3.png'; ?>" alt="">
                                    <p><?php echo get_field('header_work_time', 'option'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php get_footer(); ?>