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

if ( !function_exists( 'print_attribute_radios' ) ) {
	function print_attribute_radios( $checked_value, $value, $label, $name ,$vi) {
		// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
		//echo $checked_value;
		//echo 'This is the checked value';
		$checked = sanitize_title( $checked_value ) === $checked_value ? checked( $checked_value, sanitize_title( $value ), false ) : checked( $checked_value, $value, false );

		$input_name = 'attribute_' . esc_attr($name) ;
		$esc_value = esc_attr( $value );
		$id = esc_attr( $name . '_v_' . $value);
		$smallval = strtolower(str_replace(" ","-", $value));
		$smallval1 = str_replace("(", "", $smallval);
		$smallval2 = str_replace(")", "", $smallval1);
		$filtered_label = apply_filters('woocommerce_variation_option_name', $label);
		if($vi <=  2) {
			if( strpos($label, 'Writer') !== false ){
				$count = $vi;
			} elseif (strpos($label, 'schrijver') !== false) {
                $count = $vi;
			} elseif (strpos($label, 'Schrijver') !== false){
                $count = $vi;
			} else {
				$count = '';
				$custompayclass = 'pay-'.$vi;
			}
			printf( '<div><label for="%3$s"><input type="radio" class="variation_price" data-variation="'.$count.'" name="%1$s" value="%2$s" id="%3$s" %4$s><div class="labelback"></div>%5$s<div class="label-writer-text %6$s '.$custompayclass.'"></div>
				<span id="varUpdation'.$count.'"></span></label></div>', $input_name, $esc_value, $id, $checked, $filtered_label, $smallval2 );
		}	
	}
}

global $product;

$attribute_keys = array_keys( $attributes );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>
<?php $critically_acclaimed_writer = get_field( "critically_acclaimed_writer" ); ?>
<?php $senior_writer = get_field( "senior_writer" ); ?>
<?php $junior_writer = get_field( "junior_writer" ); ?>
<?php $single_payment = get_field( "single_payment" ); ?>
<?php $ten_percent_deposit = get_field('10_refundable_deposit');?>
<?php $instalment_x2_to_be_paid = get_field( "instalment_x2_to_be_paid" ); ?>
<div class="alldatav" style="display: none;">
	<?php if(!empty($critically_acclaimed_writer)){ ?>
	<div class="premium-writer"><?php echo $critically_acclaimed_writer; ?></div>
	<?php } ?>
	<?php if(!empty($senior_writer)){ ?>
	<div class="senior-writer"><?php echo $senior_writer; ?></div>
	<?php } ?>
	<?php if(!empty($junior_writer)){ ?>
	<div class="junior-writer"><?php echo $junior_writer; ?></div>
	<?php } ?>
	<?php if(!empty($ten_percent_deposit)){?>
	<div class="pay-2"><?php echo $ten_percent_deposit;?></div>
	<?php } ?>
	<?php if(!empty($single_payment)){ ?>
	<div class="pay-0"><?php echo $single_payment; ?></div>
	<?php } ?>
	<?php if(!empty($instalment_x2_to_be_paid)){ ?>
	<div class="pay-1"><?php echo $instalment_x2_to_be_paid; ?></div>
	<?php } ?>
</div>
<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( wp_json_encode( $available_variations ) ) ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
	<?php else : ?>
		<div class="variations">
			<?php $i = 0; ?>
				<?php foreach ( $attributes as $name => $options ) : ?>
						<div class="label">
							<label for="<?php echo sanitize_title( $name ); ?>"><?php echo wc_attribute_label( $name ); ?></label>
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

									foreach ( $terms as $term ) {
										
										if ( ! in_array( $term->slug, $options ) ) {
											continue;
										}
										echo '<div class="skl">';
										print_attribute_radios( $checked_value, $term->slug, $term->name, $sanitized_name,$vi);
										echo '</div>';
										
									}
								} else {
									$vi=0;
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