<?php

/**
 * Vape Shop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Vape_Shop
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vape_shop_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Vape Shop, use a find and replace
		* to change 'vape-shop' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('vape-shop', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header_menu' => 'Меню у шапці',
			'footer_menu' => 'Меню у подвалі'
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'vape_shop_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'vape_shop_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vape_shop_content_width()
{
	$GLOBALS['content_width'] = apply_filters('vape_shop_content_width', 640);
}
add_action('after_setup_theme', 'vape_shop_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vape_shop_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'vape-shop'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'vape-shop'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'vape_shop_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function vape_shop_scripts()
{
	wp_enqueue_style('vape-shop-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('vape-shop-style', 'rtl', 'replace');

	wp_enqueue_script('vape-shop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

function v_p_styles()
{
	wp_enqueue_style('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
	wp_enqueue_style('vp_style.css', get_template_directory_uri() . '/assets/css/style.css');
}

function v_p_scripts()
{
	wp_enqueue_script('bootsrap_scripts', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js');
	wp_enqueue_script('vp_scripts_js', get_template_directory_uri() . '/assets/js/script.js');
	wp_localize_script(
		'vp_scripts_js',
		'myajax',
		array(
			'url' => admin_url('admin-ajax.php')
		)
	);
}

add_action('wp_enqueue_scripts', 'vape_shop_scripts');
add_action('wp_enqueue_scripts', 'v_p_styles');
add_action('wp_footer', 'v_p_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/woocommerce/includes/wc-functions.php';

require get_template_directory() . '/woocommerce/includes/wc-functions-remove.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * add Option page.
 */
if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title'    => 'Global fields',
		'menu_title'    => 'Global fields',
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));
};

function custom_cart_quantity_change() {

	$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
	$product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

	$cart_item_key = WC()->cart->find_product_in_cart(WC()->cart->generate_cart_id($product_id));

	if ($cart_item_key) {
		WC()->cart->set_quantity($cart_item_key, $quantity);
		echo "Item Quantity Updated Successfully!";
	} else {
		echo "Item not found!";
	}
	wp_die();
};
add_action('wp_ajax_quantity_change', 'custom_cart_quantity_change');
add_action('wp_ajax_nopriv_quantity_change', 'custom_cart_quantity_change');

function add_additional_class_on_li($classes, $item, $args) {
	if (isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_menu_link_class($atts, $item, $args) {
	if (property_exists($args, 'link_class')) {
		$atts['class'] = $args->link_class;
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);
