<?php
/* Template Name: Checkout */

global $woocommerce;
$ut_page_skin = get_post_meta($post->ID, 'ut_section_skin', true);
$ut_page_class = get_post_meta($post->ID, 'ut_section_class', true);
$ut_get_sidebar_settings = ut_get_sidebar_settings();

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

$payment_text_plan = get_field('payment_text_plan', 'option');
$shipping_text_plan = get_field('shipping_text_plan', 'option');
$confirmation_text_plan = get_field('confirmation_text_plan', 'option');

get_header(); ?>

<div class="grid-container">
  <?php $grid = !empty($ut_get_sidebar_settings) && $ut_get_sidebar_settings['primary_sidebar'] != 'no_sidebar' && is_active_sidebar($ut_get_sidebar_settings['primary_sidebar']) ? 'grid-75 tablet-grid-75 mobile-grid-100' : 'grid-100 tablet-grid-100 mobile-grid-100'; ?>

  <div id="primary" class="grid-parent <?php echo $grid; ?> <?php echo $ut_page_skin; ?> <?php echo $ut_page_class; ?>">
    
    <div class="checkout-progress">
      <div class="step step1 success active">
        <span>1</span>
        <?php if (!empty($payment_text_plan)) {
          echo $payment_text_plan;
        } else { ?>Package Details <?php } ?>
      </div>

      <div class="step step2 active">
        <span>2</span>
        <?php if (!empty($shipping_text_plan)) {
          echo $shipping_text_plan;
        } else { ?>Shipping / Payment Details <?php } ?>
      </div>

      <div class="step step3">
        <span>3</span>
        <?php if (!empty($confirmation_text_plan)) {
          echo $confirmation_text_plan;
        } else { ?>Confirmation <?php } ?>
      </div>
    </div>

    <?php while (have_posts()) : the_post(); ?>

      <?php get_template_part('partials/content', 'page'); ?>

      <?php
      // If comments are open or we have at least one comment, load up the comment template
      if (comments_open() || '0' != get_comments_number())
        comments_template();
      ?>

    <?php endwhile; // end of the loop. 
    ?>
    <?php $langg =  ICL_LANGUAGE_CODE;
    if ($langg == 'en-US') { ?>
      <div class="product-footer">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 shipping-text">
          <div class="phone-number">
            <?php if (!empty($get_help_text)) { ?>
              <h5 class="phone"><strong><?php echo $get_help_text; ?></strong><br> <a href="tel:<?php echo $get_help_number; ?>"><?php echo $get_help_number; ?></a></h5>
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


        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 continue-checkout">
          <h4><span class="instt">Total Price</span>: <span class="prie"></span></h4>
          <?php $price = $woocommerce->cart->total; ?>
          <div class="learn-more-affirm"><span>Or</span>
            <p id="learn-more" class="affirm-as-low-as" data-amount="<?php echo $woocommerce->cart->total * 100; ?>" data-affirm-color="blue" data-learnmore-show="true" data-page-type="product"></p>
            <a class="btn-gotocart" href="#">Complete</a>
          </div>
        </div>
      </div>
    <?php } else { ?>
      <div class="product-footer">
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 shipping-text">
          <?php if (!empty($get_help_text)) { ?>
            <h5 class="phone"><strong><?php echo $get_help_text; ?></strong><br> <a href="tel:<?php echo $get_help_number; ?>">Call: <?php echo $get_help_number; ?></a></h5>
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
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 continue-checkout">
          <h4><span class="instt">Total Price</span>: <span class="prie"></span></h4>
          <a class="btn-gotocart" href="#">Complete</a>
        </div>
      </div>
    <?php } ?>
  </div><!-- close #primary -->

  <?php //get_sidebar('page'); 
  ?>

</div><!-- close grid-container -->

<div class="ut-scroll-up-waypoint" data-section="section-<?php echo ut_clean_section_id($post->post_name); ?>"></div>
<?php get_footer(); ?>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".btn-gotocart").click(function() {
      $("#place_order").click();
      return false;
    });
    $('.tabs-gateway li.payment_method_stripe').insertAfter('.payment_methods .wc_payment_method.payment_method_stripe');
    $('.tabs-gateway li.payment_method_paypal').insertAfter('.payment_methods .wc_payment_method.payment_method_paypal');
    $('.tabs-gateway li.payment_method_affirm').insertAfter('.payment_methods .wc_payment_method.payment_method_affirm');
  });
</script>
<?php $lang =  ICL_LANGUAGE_CODE;
if ($lang == 'en-US') { ?>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      var error_affirm = $('.woocommerce-notices-wrapper .woocommerce-error').text().includes("Your order can no longer be cancelled. Please contact us if you need assistance");
      if (error_affirm == true) {
        $('.woocommerce-notices-wrapper .woocommerce-error').remove();
      }
      setInterval(function() {
        var tnewprice = $('.order-total .woocommerce-Price-amount').html();
        $('.prie').html(tnewprice.replace('.00', ""));
      }, 100);
      if ($('.variation-PaymentPlan p').is(':contains("Instal")')) {
        $('.psub').text('First Payment');
        $('.instt').text('First Payment');
      }
    });
  </script>
<?php } ?>
<?php if ($lang == 'en-GB') { ?>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      setInterval(function() {
        var tnewprice = $('.order-total .woocommerce-Price-amount').html();
        $('.prie').html(tnewprice);
      }, 100);
      $('div.learn-more-affirm span').remove();
      $('li.payment_method_affirm').remove();
      if ($('.variation-PaymentPlan p').is(':contains("Instal")')) {
        $('.psub').text('First Payment');
        $('.instt').text('First Payment');
      }
    });
  </script>
<?php }

if ($lang == 'nl') { ?>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      setInterval(function() {
        var tnewprice = $('.order-total .woocommerce-Price-amount').html();
        $('.prie').html(tnewprice);
      }, 100);
      $('div.learn-more-affirm span').remove();
      $('li.payment_method_affirm').remove();
      $('.btn-gotocart').text('Compleet');
      $('.instt').text('Totale prijs');
      if ($('.deskcart a').is(':contains("betaling")')) {
        $('.psub').text('Eerste betaling');
        $('.instt').text('Eerste betaling');

      }
    });
  </script>
<?php } ?>