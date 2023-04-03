<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
	exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
	echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-8 col-6">
			<?php if ($checkout->get_checkout_fields()) : ?>

				<fieldset>
					<legend>Контактна інформація</legend>
					<div class="row order-form">
						<?php do_action('woocommerce_checkout_billing'); ?>
					</div>
				</fieldset>
		</div>

		<div class="col-md-4 col-6 order-container">
			<div class="order-card">
				<div class="container">
					<div class="order-card-head">
						<p>Сумма замовлення</p>
					</div>
					<div class="order-sum">
						<p>1200 грн</p>
					</div>
					<div class="order-apply">
						<button class="order-apply-button" type="submit" name="button">Підтвердити</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php do_action('woocommerce_checkout_after_customer_details'); ?>

<?php endif; ?>

<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

<h3 id="order_review_heading"><?php esc_html_e('Your order', 'woocommerce'); ?></h3>

<?php do_action('woocommerce_checkout_before_order_review'); ?>

<div id="order_review" class="woocommerce-checkout-review-order">
	<?php do_action('woocommerce_checkout_order_review'); ?>
</div>

<?php do_action('woocommerce_checkout_after_order_review'); ?>

</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>