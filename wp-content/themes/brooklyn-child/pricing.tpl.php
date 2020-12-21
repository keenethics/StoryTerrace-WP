<?php
/* Template Name: Price */ 
get_header(); //Top Section 
$top_title = get_field('top_title');
$top_title_big = get_field('top_title_big');
$top_description = get_field('top_description');
$package_level = get_field('package_level');
$package_level_tooltip = get_field('package_level_tooltip');
$package_select_text = get_field('package_select_text');
//Banner Image
$banner_large_text = get_field('banner_large_text');
$banner_name = get_field('banner_name');
$banner_image = get_field('banner_image');
//Faq Section
$faq_main_title = get_field('faq_main_title');
$faq_button_text = get_field('faq_button_text');
$faq_button_link = get_field('faq_button_link');
//additional section
$as_title = get_field('as_title');
$as_big_text = get_field('as_big_text');
$as_description = get_field('as_description');
$as_button_text = get_field('as_button_text');
$as_button_link = get_field('as_button_link');
$as_popup_title = get_field('as_popup_title');
$as_popup_description = get_field('as_popup_description');
$as_popup_hs_form = get_field('as_popup_hs_form');
$fixfoot_main_title = get_field('fixfoot_main_title');
$fixfoot_description = get_field('fixfoot_description');
$fixfootbutton_text = get_field('fixfootbutton_text');
$fixfoot_hubform = get_field('fixfoot_hubform');
$show_search = get_field('show_search_price');
$search_button_text_price = get_field('search_button_text_price');
$search_placeholder_price = get_field('search_placeholder_price');
$search_result_link_price = get_field('search_result_link_price');
$curlangss =  ICL_LANGUAGE_CODE;
?>
<?php if(!empty($banner_image)){ ?>   
<style type="text/css">
  .unexamined {
    background-image: url(<?php echo $banner_image; ?>) !important;
  }
</style>
<?php } ?>
  <div class="grey-banner">
    <div class="container">
      <div class="grey-banner__inner">
        <div class="center-title">
          <?php if(!empty($top_title)){ ?>
              <h5><?php echo $top_title; ?></h5>
            <?php } ?>
            <?php if(!empty($top_title_big)){ ?>
              <h2><?php echo $top_title_big; ?></h2>
          <?php } ?>
          <?php if(!empty($top_description)){ ?>
              <p><?php echo $top_description; ?></p>
          <?php } ?>          
        </div>
      </div>
    </div>
  </div>    
  

  <div class="pricing">
    <div class="container">
      <div class="pricing__wrap">
        <div class="pricing__center">
          <div class="pricing__inner d-flex">
            <?php 
            $i = 1;
            $rows = get_field('packages_list');
             if($rows)
                {
                  foreach($rows as $row)
                  { ?>
                  <?php if($curlangss == 'en-US'){ ?>
                  <div class="pricing__col <?php echo 'hl'.$i; ?>">
                    <div class="pricing__cell">
                      <div class="pricing__top">
                        <img src="<?php echo $row['image']; ?>" alt=".">
                        <h6><?php echo $row['title']; ?></h6>
                        <p><?php echo $row['large_text']; ?></p>
                      </div>
                      <div class="pricing__bottom">
                        <div class="pricing__middle">
                          <h6><?php echo $package_level; ?> <?php if(!empty($package_level_tooltip )){?><span data-title="<?php echo $package_level_tooltip; ?>"><i class="fa fa-question-circle"></i></span><?php } ?></h6>
                          <div class="pricing__select"> 
                            <select name="" id="">
                              <?php if($i == 1){ ?>
                                  <option data-cl="compact" data-writers="compact-1" data-discount="<?php echo $row['book_first_price_discount']; ?>" value="<?php echo "$".number_format($row['book_first_price']);?>"><?php echo $package_select_text; ?></option>
                                <?php }elseif ($i == 2) { ?>
                                  <option data-cl="complete" data-writers="complete-2" data-discount="<?php echo $row['book_first_price_discount']; ?>" value="<?php echo "$".number_format($row['book_first_price']);?>"><?php echo $package_select_text; ?></option>
                                <?php }elseif ($i == 3) { ?>
                                  <option data-cl="novella" data-writers="novella-2" data-discount="<?php echo $row['book_first_price_discount']; ?>" value="<?php echo "$".number_format($row['book_first_price']);?>"><?php echo $package_select_text; ?></option>
                                <?php } ?>
                              <?php $writer_levels = $row['writer_levels']; $y=1;
                                                              foreach ($writer_levels as $writerlevels) {
                                                                echo '<option data-original="'.$writerlevels['level_price'].'" data-discount="$'.number_format($writerlevels['discount_price_writers']).'" data-cl="'.strtolower($row['title']).'" data-writers="'.strtolower($row['title']).'-'.$y.'" value="$'.number_format($writerlevels['level_price']).'">'.$writerlevels['level_name'].'</option>';
                                                              $y++; }
                              ?>
                            </select>
                          </div>
                          <div class="pricing__price">
                            <div class="price-now">
                              <span>Pay Now</span>
                              <div class="pay-price"><?php echo "$".number_format($row['book_first_price']); ?></div>
                            </div>
                            <div class="or-price">OR</div>
                            <div class="price-discounted">
                              <span>As Low As</span>
                              <!-- <div class="discpunt-price <?php //echo strtolower($row['title']).'-price'; ?>"><?php //echo "$".number_format($row['book_first_price_discount'])."/mo"; ?></div> -->
                              <div class="discpunt-price"><?php echo "$".number_format($row['book_first_price_discount'])."/mo"; ?></div>
                                <div class="affirm-logo">
                                <span>with</span>
                                <?php $writer_levels = $row['writer_levels']; $z=1; 
                                    foreach ($writer_levels as $writerlevels) { 
                                      if($i == 2 ){ ?>
                                      <div class="affirm-price-data <?php if($z == 1 || $z == 3){ }else{ echo 'this-price'; } ?> <?php echo strtolower($row['title']); ?>" <?php if($z == 1 || $z == 3){ ?>style="display: none;"<?php } ?> id="<?php echo strtolower($row['title']).'-'.$z; ?>">
                                        <p id="learn-more" class="affirm-as-low-as" data-page-type="product" data-amount="<?php echo floatval( $writerlevels['level_price'] * 100 ) ?>"></p>
                                      </div>
                                      <?php }elseif ($i == 3) { ?>
                                      <div class="affirm-price-data <?php if($z == 1 || $z == 3){ }else{ echo 'this-price'; } ?> <?php echo strtolower($row['title']); ?>" <?php if($z == 1 || $z == 3){ ?>style="display: none;"<?php } ?> id="<?php echo strtolower($row['title']).'-'.$z; ?>">
                                        <p id="learn-more" class="affirm-as-low-as" data-page-type="product" data-amount="<?php echo floatval( $writerlevels['level_price'] * 100 ) ?>"></p>
                                      </div>
                                    <?php }elseif ($i == 1) { ?>
                                      <div class="affirm-price-data <?php if($z == 2 || $z == 3){ }else{ echo 'this-price'; } ?> <?php echo strtolower($row['title']); ?>" <?php if($z == 2 || $z == 3){ ?>style="display: none;"<?php } ?> id="<?php echo strtolower($row['title']).'-'.$z; ?>">
                                        <p id="learn-more" class="affirm-as-low-as" data-page-type="product" data-amount="<?php echo floatval( $writerlevels['level_price'] * 100 ) ?>"></p>
                                      </div>
                                    <?php } ?>
                                  <?php $z++; } ?>
                               </div>
                            </div>
                          </div>
                        </div>          
                        <ul>
                          <?php $check_list = $row['check_list'];
                                                    foreach ($check_list as $checklist) {
                                                      echo '<li>'.$checklist['list_text'].'</li>';
                                                    }
                           ?>
                          <li class="pricing__gift"><?php echo $row['gift_text']; ?></li>
                        </ul>
                        <div class="pricing__btn">
                          <a data-price-link="<?php echo $row['book_button_link']; ?>" href="<?php echo $row['book_button_link']; ?>" class="link-filled link-filled--sm"><?php echo $row['book_button_text']; ?></a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php }else{ ?>
                    <div class="pricing__col <?php echo 'hl'.$i; ?>">
                      <div class="pricing__cell">
                        <div class="pricing__top">
                          <img src="<?php echo $row['image']; ?>" alt=".">
                          <h6><?php echo $row['title']; ?></h6>
                          <p><?php echo $row['large_text']; ?></p>
                        </div>
                        <div class="pricing__bottom">
                          <div class="pricing__middle">
                            <h6><?php echo $package_level; ?> <?php if(!empty($package_level_tooltip )){?><span data-title="<?php echo $package_level_tooltip; ?>"><i class="fa fa-question-circle"></i></span><?php } ?></h6>
                            <div class="pricing__select"> 
                              <select name="" id="">
                                <option value="<?php echo $row['book_first_price'];?>"><?php echo $package_select_text; ?></option>
                                <?php $writer_levels = $row['writer_levels']; 
                                                                foreach ($writer_levels as $writerlevels) {
                                                                  echo '<option value="'.$writerlevels['level_price'].'">'.$writerlevels['level_name'].'</option>';
                                                                }
                                ?>
                              </select>
                            </div>
                            <div class="pricing__price">
                              <?php echo $row['book_first_price']; ?>
                            </div>
                          </div>          
                          <ul>
                            <?php $check_list = $row['check_list'];
                                                      foreach ($check_list as $checklist) {
                                                        echo '<li>'.$checklist['list_text'].'</li>';
                                                      }
                             ?>
                            <li class="pricing__gift"><?php echo $row['gift_text']; ?></li>
                          </ul>
                          <div class="pricing__btn">
                            <a data-price-link="<?php echo $row['book_button_link']; ?>" href="<?php echo $row['book_button_link']; ?>" class="link-filled link-filled--sm"><?php echo $row['book_button_text']; ?></a>
                          </div>
                        </div>
                      </div>
                     </div>
                <?php } ?>
                    <?php  $i++;  }
                        }
                         ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="additional" id="additional-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="center-title">
            <?php if(!empty($as_title)){ ?>
                 <h5><?php echo $as_title; ?></h5>
            <?php } ?>
            <?php if(!empty($as_big_text)){ ?>     
                 <h2><?php echo $as_big_text; ?></h2>
              <?php } ?>
              <?php if(!empty($as_description)){ ?>
                <p><?php echo $as_description; ?></p>
            <?php } ?>    
          </div>
        </div>
      </div>
      <div class="additional__inner">
        <div class="additional__cols">
          <?php 
                    $rows = get_field('additional_services_list');
                     if($rows)
                        {  
                          foreach($rows as $row)
                           {  ?>
                            <div class="additional__col">
                <div class="additional__cell">
                  <img src="<?php echo $row['image_as']?>" alt=".">
                  <h3><?php echo $row['main_title'] ?></h3>
                  <p><?php echo $row['description_as'] ?></p>
                </div>
              </div>
                    <?php }
                    
                    } ?> 
        </div>
      </div>
      <?php if(!empty($as_button_text)){ ?>
          <div class="additional__link">
            <a href="<?php echo $as_button_link; ?>" class="link-outlined getaquotebtn"><?php echo $as_button_text; ?></a>
          </div>
       <?php } ?>
    </div>
  </div>


  <div class="unexamined">
    <div class="container">
      <div class="center-title">
        <?php if(!empty($banner_large_text)){ ?>
            <h2><?php echo $banner_large_text; ?></h2>
          <?php } ?>
          <?php if(!empty($banner_name)){ ?>
            <div class="unexamined__name">
              <?php echo $banner_name; ?>
            </div>
          <?php } ?>
      </div>
    </div>
  </div>


  <div class="pricingfaq">
    <div class="container">
      <div class="pricingfaq__wrap">
        <div class="center-title">
          <?php if(!empty($faq_main_title)){ ?>
             <h3><?php  echo $faq_main_title; ?></h3>
            <?php } ?>
        </div>
        <div class="pricingfaq__inner">
          <?php 
                    $rows = get_field('faq_list');
                     if($rows)
                        { 
                        $i = 0;  
                          foreach($rows as $row)
                           {  
                           
                            ?>
                            <div class="pricingfaq__row <?php if($i == 0){ echo 'pricingfaq__row--active'; } ?>">
              <div class="pricingfaq__title">
                <h5><?php echo $row['faq_title']; ?></h5>
                <div class="pricingfaq__icon"></div>
              </div>
              <div class="pricingfaq__content">
                <p><?php echo $row['faq_description']; ?></p>
              </div>
          </div>
                    <?php   $i++; }
                    
                    } ?>        
        </div>
        <div class="pricingfaq__link">
          <?php if(!empty($faq_button_text)){ ?>
             <a href="<?php  echo $faq_button_link; ?>" class="link-outlined"><?php  echo $faq_button_text; ?></a>
          <?php } ?>   
        </div>
      </div>
    </div>
  </div> 
<?php get_footer(); ?>
 <?php
           $curlangs =  ICL_LANGUAGE_CODE;
         if($curlangs == 'en-US') {
        ?> 
        <script type="text/javascript">
          jQuery(document).ready(function($){
              $(".pricing__select select").change(function (event) {
                  var newval = $(this).parents('.pricing__middle');
                  var current_price = $(this).children("option:selected").val(); 
                  var discount_price = $(this).children("option:selected").data('discount');
                  var cl = $(this).children("option:selected").data('cl');
                  $('.'+cl).css('display', 'none');
                  $('.'+cl).removeClass('this-price');
                  var writers = $(this).children("option:selected").data('writers');
                  $('#'+writers).css('display', 'inline-block');
                  $('#'+writers).addClass('this-price');
                  var affirm_price = newval.find('.this-price #learn-more .affirm-ala-price').text();
                  // newval.find('.pricing__price').html($(this).val());
                  newval.find('.pricing__price .pay-price').html(current_price);
                  newval.find('.pricing__price .discpunt-price').html(affirm_price+'/mo');
                  var fortitle = $(this).parents('.pricing__bottom');
                  urls = fortitle.find('.link-filled').attr('data-price-link');
                  urls = urls.split('?')
                  getselecttect = newval.find(":selected").text();
                  var getselecttect = getselecttect.split(' ').join('+');
                  fortitle.find('.link-filled').attr('href','')
                  fortitle.find('.link-filled').attr('href',urls[0]+'?attribute_writer-level='+getselecttect);
             });     
             $('.hl1 .pricing__select select option:eq(1)').prop('selected', true);
             $('.hl2 .pricing__select select option:eq(2)').prop('selected', true);
             $('.hl3 .pricing__select select option:eq(2)').prop('selected', true);
            // alert('hello');
          });  
        </script>
      <?php }
      if( $curlangs == 'en-GB'){ ?>
        <script type="text/javascript">
           jQuery(document).ready(function($){
             $(".pricing__select select").change(function (event) {
                  var newval = $(this).parents('.pricing__middle');
                  newval.find('.pricing__price').html($(this).val());
                  var fortitle = $(this).parents('.pricing__bottom');
                  urls = fortitle.find('.link-filled').attr('data-price-link');
                  urls = urls.split('?')
                  getselecttect = newval.find(":selected").text();
                  var getselecttect = getselecttect.split(' ').join('+');
                  fortitle.find('.link-filled').attr('href','')
                  fortitle.find('.link-filled').attr('href',urls[0]+'?attribute_writer-level='+getselecttect);
             });     
             $('.hl1 .pricing__select select option:eq(1)').prop('selected', true);
             $('.hl2 .pricing__select select option:eq(2)').prop('selected', true);
             $('.hl3 .pricing__select select option:eq(2)').prop('selected', true); 
            // alert('hello');
          });  
        </script>
          <?php } elseif($curlangs == 'nl') { ?>
        <script type="text/javascript">
          jQuery(document).ready(function($){
             $(".pricing__select select").change(function (event) {
                 var newval = $(this).parents('.pricing__middle');
                 newval.find('.pricing__price').html($(this).val());
                 var fortitle = $(this).parents('.pricing__bottom');
                 urls = fortitle.find('.link-filled').attr('data-price-link');
                 urls = urls.split('?')
                 getselecttect = newval.find(":selected").text();
                 var getselecttect = getselecttect.split(' ').join('+');
                 fortitle.find('.link-filled').attr('href','')
                 fortitle.find('.link-filled').attr('href',urls[0]+'?attribute_schijversniveau='+getselecttect);
             });
             $('.hl1 .pricing__select select option:eq(1)').prop('selected', true);
             $('.hl2 .pricing__select select option:eq(2)').prop('selected', true);
             $('.hl3 .pricing__select select option:eq(1)').prop('selected', true);
          });   
        </script>
          <?php } ?>  
        
     

<?php if(!empty($as_popup_hs_form)){ ?>
  <div class="globalpopup getaquote">
        <div class="globalpopup__outer">
            <div class="globalpopup__inner">
                <i class="fa fa-times globalpopup__close getaquote__close" aria-hidden="true"></i>
                <div class="globalpopup__wrap">
                    <div class="globalpopup__top">
                      <?php if(!empty($as_popup_title)){ ?>
                        <h3><?php echo $as_popup_title; ?></h3>
                       <?php } ?>
                        <?php if(!empty($as_popup_description)){ ?>
                             <p><?php echo $as_popup_description; ?></p>
                        <?php } ?>
                    </div>
                    <div class="globalpopup__bottom">
                         <?php echo $as_popup_hs_form; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
  <script type="text/javascript">
      jQuery(document).ready(function($){
        $('body').removeClass('pricing');
      jQuery(".getaquotebtn").click(function(event) {
        event.preventDefault();
        jQuery("html").addClass("html--oh");
        jQuery(".getaquote").fadeIn();
      });
      jQuery(".getaquote__close").click(function() {
        jQuery("html").removeClass("html--oh");
        jQuery(".getaquote").fadeOut();
      });
      jQuery(".footerfixbtn").click(function(event) {
        event.preventDefault();
        jQuery("html").addClass("html--oh");
        jQuery(".footerfix").fadeIn();
      });
      jQuery(".footerfix__close").click(function() {
        jQuery("html").removeClass("html--oh");
        jQuery(".footerfix").fadeOut();
      });
      var barHeight = jQuery(".pricingbar").outerHeight();
  jQuery("div#hubspot-messages-iframe-container").css({"margin-bottom" : barHeight });
  $( window ).resize(function() {
  var barHeight = jQuery(".pricingbar").outerHeight();
  jQuery("div#hubspot-messages-iframe-container").css({"margin-bottom" : barHeight });
  });
  if ($(window).width() < 768) {
      window.setInterval(function(){
          if ($(".shadow-container").hasClass("active")) {
            jQuery("div#hubspot-messages-iframe-container").css({"margin-bottom" : "0px" });
            jQuery(".pricingbar").css({"display" : "none" });
          } else {
            jQuery("div#hubspot-messages-iframe-container").css({"margin-bottom" : barHeight+'px' });
            jQuery(".pricingbar").css({"display" : "block" });
          }
      }, 300);   
  }
  var pb = jQuery(".pricingbar").outerHeight();
jQuery(".footer").css({"margin-bottom" : pb+'px' });
      })
    </script>
    <?php if(!empty($fixfoot_main_title)){ ?>
    <div class="pricingbar">
      <div class="container">
        <div class="pricingbar__wrap">
           <div class="pricingbar__inner">
            <div class="pricingbar__left">
              <h4><?php echo $fixfoot_main_title; ?></h4>
              <p><?php echo $fixfoot_description; ?></p>
            </div>
            <?php 
             if($show_search == 'yes'){ ?>
                <div class="pricingbar__right">
                  <div class="writer-search">
                    <form id="zipcode" class="writer-search-form">
                        <div class="input-group">
                          <input class="zipc" type="text" placeholder="<?php if($search_placeholder_price){ echo $search_placeholder_price; } else { echo 'Enter Postal Code'; } ?>">
                          <input type="submit" value="<?php if($search_button_text_price){ echo $search_button_text_price; } else { echo 'Search Writers'; } ?>">
                        </div>
                   </form>
                </div>
                </div>
                <script>
              jQuery(document).ready(function($){
                $( "#zipcode" ).submit(function( event ) {
                  event.preventDefault();
                  var zipval = $('.zipc').val();
                  urlred = '<?php echo $search_result_link_price; ?>';
                  window.location = urlred+'/?zip='+zipval;
                });
              });

            </script>
            <style type="text/css">
              .writer-search-form {
                  margin: 0px !important;
              }
              .pricingbar__inner>div.pricingbar__right {
                  width: calc(100% - 501px);
              }
              @media only screen and (max-width: 1024px) {
                          .pricingbar__inner>div.pricingbar__left {
                            width: 100%;
                            text-align: center;
                          }
                          .pricingbar__inner>div.pricingbar__right {
                            width: 100%;
                            margin-top: 16px;
                          }
                          .pricingbar__right .writer-search-form {
                            max-width: 700px;
                            margin: 0 auto;
                            width: 100%;
                          }
                          .writer-search-form input[type="text"],
                          .writer-search-form input[type="submit"] {
                            height: 50px;
                          }
                        }
                        @media(max-width: 767px) {
                  .writer-search-form input[type="submit"] {
                      width:150px;
                      height: 50px;
                      font-size: 12px;
                  }

                  .writer-search-form input[type="text"] {
                      height: 50px
                  }
              }

              @media(max-width: 360px) {
                  .writer-search-form input[type="submit"] {
                      width:130px;
                      font-size: 11px
                  }
              }
            </style>
             <?php } else { 
             if(!empty($fixfootbutton_text)){ ?>
            <div class="pricingbar__right">
               <a href="#" class="link-filled footerfixbtn"><?php echo $fixfootbutton_text; ?></a>
            </div>
          <?php } 
          } ?>
          </div>
        </div>       
      </div>        
</div>
<style type="text/css">
  div#hubspot-messages-iframe-container {
    margin-bottom: 80px;
}
</style>
<?php } ?>

<?php if(!empty($fixfoot_hubform)){ ?>
  <div class="globalpopup footerfix">
        <div class="globalpopup__outer">
            <div class="globalpopup__inner">
                <i class="fa fa-times globalpopup__close footerfix__close" aria-hidden="true"></i>
                <div class="globalpopup__wrap">
                    <div class="globalpopup__bottom">
                         <?php echo $fixfoot_hubform; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<style type="text/css">
  .page-template-pricing-tpl {
    padding-bottom: 0px !important;
}
#hubspot-messages-iframe-container.widget-align-right {
    z-index: 9999;
}
.header {
    z-index: 9999 !important;
}
</style>