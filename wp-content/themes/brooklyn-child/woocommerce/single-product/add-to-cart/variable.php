<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

global $product;
$attribute_keys = array_keys( $attributes );
var_dump($attribute_keys);
echo '<br><br>';
var_dump($attributes);

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( wp_json_encode( $available_variations ) ) ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
	<?php else : ?>
		<div class="variations">
			<?php $i = 0; ?>
				<?php foreach ( $attributes as $name => $options ) : ?>
						<div class="variation-label">
							<h3><?php echo __( 'Choose ', 'storyterrace' ) . wc_attribute_label( $name ); ?></h3>
							<div class="variation-label-description">
								<?php echo get_field(convert_text_to_underscore( wc_attribute_label( $name ) ) . '_description'); ?>
							</div>
						</div>
						<?php
						$sanitized_name = sanitize_title( $name );
						if ( isset( $_REQUEST[ 'attribute_' . $sanitized_name ] ) ) {
							$checked_value = $_REQUEST[ 'attribute_' . $sanitized_name ];
						} elseif ( isset( $selected_attributes[ $sanitized_name ] ) ) {
							$checked_value = $selected_attributes[ $sanitized_name ];
						} else {
							$checked_value = '';
						}
						?>
						<div class="value p<?php echo $i; ?>" id="<?php echo sanitize_title( $name ); ?>" >
							<?php
							if ( ! empty( $options ) ) {
								if ( taxonomy_exists( $name ) ) {
									// Get terms if this is a taxonomy - ordered. We need the names too.
									$terms = wc_get_product_terms( $product->get_id(), $name, array( 'fields' => 'all' ) );

									$vi = 0;
									foreach ( $terms as $term ) {
										
										if ( ! in_array( $term->slug, $options ) ) {
											continue;
										}
										
										echo '<div class="skl">';
										print_attribute_radios( $checked_value, $term->slug, $term->name, $sanitized_name, $vi, $term->description);
										echo '</div>';
										$vi++;
										
									}
								} else {
									$vi = 0;
									foreach ( $options as $option ) {
										
										echo '<div class="skl">';
										print_attribute_radios( $checked_value, $option, $option, $sanitized_name,$vi);
										echo '</div>';
										$vi++;
									}
								}
							}

							?>
						</div>
				<?php 
                  $i++;
				endforeach; ?>
		</div>

		<div class="single_variation_wrap">
			<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );