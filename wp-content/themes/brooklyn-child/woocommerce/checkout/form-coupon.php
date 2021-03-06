<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.4
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() ) { // @codingStandardsIgnoreLine.
	return;
}

if ( empty( WC()->cart->applied_coupons ) ) {
	$info_message = apply_filters( 'woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'woocommerce' ) . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>' );
	//wc_print_notice( $info_message, 'notice' );
}
?>
<div class="item-review">
	<form class="checkout_coupon" method="post">
			<div class="input-group">
				<span class="coupon-text">Coupon / Promo code</span>
				<div class="form-control">
					<div class="input-wrapper">
						<input type="text" name="coupon_code" class="input-coupon" placeholder="<?php esc_attr_e( 'XXX-XXX', 'woocommerce' ); ?>" id="coupon_code" value="" />
						<input type="submit" class="btn-submit" name="apply_coupon" value="<?php esc_attr_e( 'Apply', 'woocommerce' ); ?>" />
					</div>
				</div>
			</div>
	</form>
</div>