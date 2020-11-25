<?php
/**
 * Variable product add to cart
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 *
 * Modified to use radio buttons instead of dropdowns
 * @author 8manos
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( !function_exists( 'print_attribute_radio' ) ) {
	function print_attribute_radio( $checked_value, $value, $label, $name ,$vi) {
		// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
		echo $checked_value;
		echo 'This is the checked value';
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
<?php $instalment_x2_to_be_paid = get_field( "instalment_x2_to_be_paid" ); ?>
<div class="alldatav" style="display: none;">
	<?php if(!empty($critically_acclaimed_writer)){ ?>
	<div class="critically-acclaimed-writer"><?php echo $critically_acclaimed_writer; ?></div>
	<?php } ?>
	<?php if(!empty($senior_writer)){ ?>
	<div class="senior-writer"><?php echo $senior_writer; ?></div>
	<?php } ?>
	<?php if(!empty($junior_writer)){ ?>
	<div class="junior-writer"><?php echo $junior_writer; ?></div>
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
										print_attribute_radio( $checked_value, $term->slug, $term->name, $sanitized_name,$vi);
										echo '</div>';
										
									}
								} else {
									$vi=0;
									foreach ( $options as $option ) {
										
										echo '<div class="skl">';
										print_attribute_radio( $checked_value, $option, $option, $sanitized_name,$vi);
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

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<div class="single_variation_wrap">
			<?php
				do_action( 'woocommerce_before_single_variation' );
				do_action( 'woocommerce_single_variation' );
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>
<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
