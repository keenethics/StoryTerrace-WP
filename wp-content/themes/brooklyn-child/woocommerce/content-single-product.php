<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

?>
<?php
$langg =  ICL_LANGUAGE_CODE;
if ($langg == 'en-US') { ?>
<?php
  $payment_text_plan = get_field('payment_text_plan', 'option');
  $shipping_text_plan = get_field('shipping_text_plan', 'option');
  $confirmation_text_plan = get_field('confirmation_text_plan', 'option');
  ?>
<div class="checkout-progress">
  <div class="step step1 active"><span>1</span>
    <?php if (!empty($payment_text_plan)) {
      echo $payment_text_plan;
    } else { ?>Choose Payment Plan <?php } ?>
  </div>

  <div class="step step2"><span>2</span>
    <?php if (!empty($shipping_text_plan)) {
      echo $shipping_text_plan;
    } else { ?>Shipping / Payment Details <?php } ?>
  </div>

  <div class="step step3"><span>3</span>
    <?php if (!empty($confirmation_text_plan)) {
      echo $confirmation_text_plan;
    } else { ?>Confirmation <?php } ?>
  </div>
</div>
<?php } else { ?>
<?php
  $payment_text_plan = get_field('payment_text_plan', 'option');
  $shipping_text_plan = get_field('shipping_text_plan', 'option');
  $confirmation_text_plan = get_field('confirmation_text_plan', 'option');
  ?>
<div style="display: none;" class="checkout-progress">
  <div class="step step1 active"><span>1</span>
    <?php if (!empty($payment_text_plan)) {
      echo $payment_text_plan;
    } else { ?>Choose Payment Plan <?php } ?>
  </div>

  <div class="step step2"><span>2</span>
    <?php if (!empty($shipping_text_plan)) {
      echo $shipping_text_plan;
    } else { ?>Shipping / Payment Details <?php } ?>
  </div>

  <div class="step step3"><span>3</span>
    <?php if (!empty($confirmation_text_plan)) {
      echo $confirmation_text_plan;
    } else { ?>Confirmation <?php } ?>
  </div>
</div>
<?php } ?>
<?php
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
  echo get_the_password_form(); // WPCS: XSS ok.
  return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>

  <?php
  /**
   * woocommerce_before_single_product_summary hook.
   *
   * @hooked woocommerce_show_product_sale_flash - 10
   * @hooked woocommerce_show_product_images - 20
   */
  do_action('woocommerce_before_single_product_summary');
  ?>

  <div class="summary entry-summary">

    <?php
    /**
     * woocommerce_single_product_summary hook.
     *
     * @hooked woocommerce_template_single_title - 5
     * @hooked woocommerce_template_single_rating - 10
     * @hooked woocommerce_template_single_price - 10
     * @hooked woocommerce_template_single_excerpt - 20
     * @hooked woocommerce_template_single_add_to_cart - 30
     * @hooked woocommerce_template_single_meta - 40
     * @hooked woocommerce_template_single_sharing - 50
     * @hooked WC_Structured_Data::generate_product_data() - 60
     */
    do_action('woocommerce_single_product_summary');
    ?>

  </div><!-- .summary -->

  <?php
  /**
   * woocommerce_after_single_product_summary hook.
   *
   * @hooked woocommerce_output_product_data_tabs - 10
   * @hooked woocommerce_upsell_display - 15
   * @hooked woocommerce_output_related_products - 20
   */
  do_action('woocommerce_after_single_product_summary');
  ?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action('woocommerce_after_single_product'); ?>
<?php
$get_help_text = get_field('get_help_text', 'option');
$get_help_number = get_field('get_help_number', 'option');
$get_help_call_text = get_field('get_help_call_text', 'option');
$delivery_text_product = get_field('delivery_text_product', 'option');
$welcome_pack_text = get_field('welcome_pack_text', 'option');
$request_button_text = get_field('request_button_text', 'option');
$continue_buy_button_text = get_field('continue_buy_button_text', 'option');
$continue_option_button_text = get_field('continue_option_button_text', 'option');
$request_form = get_field('request_form', 'option');
$request_form_title = get_field('request_form_title', 'option');
$request_form_description = get_field('request_form_description', 'option');

?>
<div class="product-footer">
  <?php if ($langg == 'en-US') { ?>
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 shipping-text">
    <div class="phone-number">
      <?php if (!empty($get_help_text)) { ?>
      <h5 class="phone"><strong><?php echo $get_help_text; ?></strong><br>
        <a href="tel:<?php echo $get_help_number; ?>">
          <?php if (!empty($get_help_call_text)) {
              echo $get_help_call_text . ":";
            } ?> <?php echo $get_help_number; ?>
        </a>
      </h5>
      <?php } ?>
    </div>

    <div class="delivery-content">
      <?php if (!empty($delivery_text_product)) { ?>
      <h5 class="delivery"><strong><?php echo $delivery_text_product; ?></strong></h5>
      <?php } ?>
    </div>

    <div class="welcome-content">
      <?php if (!empty($welcome_pack_text)) { ?>
      <h5 class="gift"><strong><?php echo $welcome_pack_text; ?></strong></h5>
      <?php } ?>
    </div>
  </div>
  <?php } else { ?>
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 shipping-text">
    <?php if (!empty($get_help_text)) { ?>
    <h5 class="phone"><strong><?php echo $get_help_text; ?></strong><br>
      <a href="tel:<?php echo $get_help_number; ?>">
        <?php if (!empty($get_help_call_text)) {
            echo $get_help_call_text;
          } ?>: <?php echo $get_help_number; ?>
      </a>
    </h5>
    <?php } ?>
  </div>
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 shipping-text">
    <?php if (!empty($delivery_text_product)) { ?>
    <h5 class="delivery"><strong><?php echo $delivery_text_product; ?></strong></h5>
    <?php } ?>
  </div>
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 shipping-text">
    <?php if (!empty($welcome_pack_text)) { ?>
    <h5 class="gift"><strong><?php echo $welcome_pack_text; ?></strong></h5>
    <?php } ?>
  </div>
  <?php } ?>
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 continue-checkout">
    <?php if ($langg == 'en-US') { ?>
    <h4 class="t-price"><span class='tps'>Total Price:</span><span class="prie2"></span><span class="prie3"></span></h4>
    <div class="addshowgr" style="
              display: none;
          "><a class="btn-gotocart addgry" href="#">Continue</a></div>
    <a class="btn-gotocart cartload" style="display: none;" href="#">
      <?php if (!empty($continue_option_button_text)) {
          echo $continue_option_button_text;
        } else { ?>Continue<?php } ?>
    </a>
    <i class="btn-tick fa fa-check done"></i>
    <?php } else { ?>
    <h4 class="t-price"><span class='tps'>Total Price:</span><span class="prie2"></span><span class="prie3"></span></h4>
    <?php if (!empty($request_button_text)) { ?>
    <a href="#" class="btn-request" data-toggle="modal" data-target="#myModal1"><?php echo $request_button_text; ?></a>
    <?php } ?>
    <a class="btn-continue" href="#">
      <?php if (!empty($continue_buy_button_text)) {
        echo $continue_buy_button_text;
        } else { ?>Continue Buying Online<?php } ?>
    </a>

    <div class="addshowgr" style="display: none;">
      <a class="btn-gotocart addgry" href="#">Continue</a>
    </div>
    <a class="btn-gotocart cartload" style="display: none;" href="#">
      <?php if (!empty($continue_option_button_text)) {
          echo $continue_option_button_text;
        } else { ?>Continue<?php } ?>
    </a>
    <i class="btn-tick fa fa-check done"></i>
    <?php } ?>
  </div>
</div>
<div class="globalpopup modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content contactRight bottom-popup">
      <i class="fa fa-times globalpopup__close topheader__close" data-dismiss="modal" aria-hidden="true"></i>
      <div class="modal-body">
        <?php if (!empty($request_form_title)) { ?>
        <h2 class="title"><?php echo $request_form_title; ?></h2>
        <?php } ?>
        <?php if (!empty($request_form_description)) {
          echo $request_form_description;
        } ?>
        <div class="globalpopup__bottom popup-form">
          <?php if (!empty($request_form)) {
            echo $request_form;
          } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$lang =  ICL_LANGUAGE_CODE;
if ($lang == 'en-US') { ?>
<style type="text/css">
  .wc-pao-addon.wc-pao-addon-choose-additional-copies,
  .wc-pao-addon.wc-pao-addon-chapters,
  .btn-gotocart.cartload {
    display: block !important;
  }

  .woocommerce-variation-add-to-cart.variations_button.woocommerce-variation-add-to-cart-enabled {
    display: block !important;
  }

  .btn-request,
  .btn-continue {
    display: none !important;
  }
</style>

<script type="text/javascript" src="https://storyterrace.com/wp-content/themes/brooklyn-child/assets/js/slick.min.js">
</script>
<script type="text/javascript">
  var $jq = jQuery.noConflict();
  $jq(document).ready(function ($) {
    $('div.learn-more-affirm').insertAfter('.product-footer h4.t-price');
    $('a.affirm-modal-trigger').text('Affirm.');
    $jq(".variation_price").click(function () {
      var tps = $(this).val();
      if (tps == 'Installment (x2 to be paid)' || tps == '10% Refundable Deposit') {
        $jq('.tps').text('First Payment:');
      } else {
        $jq('.tps').text('Total Price:');
      }
    });
    $jq("#payment-plan input:radio:eq(0)").prop("checked", true).trigger("click");
  });
</script>
<?php } else { ?>
<style type="text/css">
  .wc-pao-addon.wc-pao-addon-choose-additional-copies,
  .wc-pao-addon.wc-pao-addon-extra-exemplaaren,
  .wc-pao-addon.wc-pao-addon-chapters,
  .wc-pao-addon.wc-pao-addon-extra-copies,
  .wc-pao-addon.wc-pao-addon-exemplaaren {
    display: block !important;
  }
</style>
<?php } ?>
<?php if ($lang == 'en-GB') { ?>
<script type="text/javascript">
  var $jq = jQuery.noConflict();
  $jq(document).ready(function ($) {
    $('div.learn-more-affirm').remove();
    $jq(".variation_price").click(function () {
      var tps = $(this).val();
      if (tps == 'Instalment (x2 to be paid)' || tps == '10% Refundable Deposit') {
        $jq('.tps').text('First Payment:');
      } else {
        $jq('.tps').text('Total Price:');
      }
    });
    $jq("#payment-plan input:radio:eq(0)").prop("checked", true).trigger("click");
  });
</script>
<?php }

if ($lang == 'nl') { ?>
<script type="text/javascript">
  var $jq = jQuery.noConflict();
  $jq(document).ready(function ($) {
    $jq('div.learn-more-affirm').remove();
    $jq('.tps').html('Totale prijs:');
    $jq('.variation_price').click(function () {
      var tps = $(this).val();

      if (tps == 'In termijnen (twee betalingen)') {
        $jq('.tps').text('Eerste betaling:');
      } else {
        $jq('.tps').text('Totale prijs:');
      }
      if (tps == 'Termijnen (2x een betaling)') {
        $jq('.tps').text('Eerste betaling:');
      } else {
        $jq('.tps').text('Totale prijs:');
      }
    });
    $jq("#payment-plan input:radio:eq(0)").prop("checked", true).trigger("click");
  });
</script>
<?php } ?>
<style type="text/css">
  .btn-gotocart.addgry {
    pointer-events: none !important;
    background-color: gray !important;
    border: 1px solid gray !important;
  }
</style>
