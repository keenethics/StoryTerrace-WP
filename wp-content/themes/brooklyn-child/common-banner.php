
<?php
$bbs_background_image = get_field( "bbs_background_image",'option');
$bbs_title = get_field( "bbs_title",'option');
$bbs_big_title = get_field( "bbs_big_title",'option');
$bbs_description = get_field( "bbs_description",'option');
$bbs_button_text = get_field( "bbs_button_text",'option');
$bbs_button_link = get_field( "bbs_button_link",'option');
$bbs_popup_code = get_field( "bbs_popup_code",'option');
$show_search_banner = get_field('show_search_banner','option');
$search_button_text_banner = get_field('search_button_text_banner','option');
$search_placeholder_banner = get_field('search_placeholder_banner','option');
$search_result_link_banner = get_field('search_result_link_banner','option');
if(!empty($bbs_background_image)){
?>
<style type="text/css">
    .request{
        background-image: url(<?php echo $bbs_background_image['url']; ?>) !important;
    }
</style>
<div class="request">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="request__inner">
                    <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/logo-icon--red.svg" alt=".">
                    <?php if(!empty($bbs_title)){ ?>
                          <h5><?php echo $bbs_title; ?></h5>
                    <?php } ?>
                    <?php if(!empty($bbs_big_title)){ ?>
                          <h2><?php echo $bbs_big_title; ?></h2>
                    <?php } ?>
                    <?php if(!empty($bbs_description)){ ?>
                            <p><?php echo $bbs_description; ?></p>
                    <?php } ?>
                    <?php if($show_search_banner == 'yes'){ ?>
                        <div class="writer-search footer-banners-search">
                            <form id="zipcodebot" class="writer-search-form">
                              <div class="input-group">
                                <input class="zipf" type="text" placeholder="<?php if(!empty($search_placeholder_banner)){ echo $search_placeholder_banner; } else { ?>Enter Postal Code<?php } ?>">
                                <input type="submit" value="<?php if(!empty($search_button_text_banner)){ echo $search_button_text_banner; } else { ?>Search Writers<?php } ?>">
                              </div>
                            </form>
                        </div>
                        <script>
                          jQuery(document).ready(function($){
                            $( "#zipcodebot" ).submit(function( event ) {
                              event.preventDefault();
                              var zipf = $('.zipf').val();
                              urlredf = '<?php echo $search_result_link_banner; ?>';
                              window.location = urlredf+'/?zip='+zipf;
                            });
                          });

                        </script>
                    <?php } else { 
                         if(!empty($bbs_button_text)){  ?>
                            <div class="request__link">
                                <?php if(!empty($bbs_button_text)){ ?>
                                <a class="bottombtn" href="<?php echo $bbs_button_link; ?>"><?php echo $bbs_button_text; ?></a>
                                <?php } ?>
                            </div>
                    <?php } 
                }?>
                </div>
            </div>
        </div>
</div>  
<?php } ?>
<!-- Homepage Banner Popup -->
<?php if(!empty($bbs_popup_code)){ ?>
    <div class="globalpopup bottombanner">
        <div class="globalpopup__outer">
            <div class="globalpopup__inner">
                <i class="fa fa-times globalpopup__close bottombanner__close" aria-hidden="true"></i>
                <div class="globalpopup__wrap">
                    <div class="globalpopup__bottom">
                         <?php echo $bbs_popup_code; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>  
  <script type="text/javascript">
        jQuery(document).ready(function($){
            jQuery(".bottombtn").click(function(event) {
                event.preventDefault();
                jQuery("html").addClass("html--oh");
                jQuery(".bottombanner").fadeIn();
            });
            jQuery(".bottombanner__close").click(function() {
                jQuery("html").removeClass("html--oh");
                jQuery(".bottombanner").fadeOut();
            });
        })
    </script>   
    <style type="text/css">
    .request {
    position: relative;
    background-image: url(../images/request-bg.jpg);
    background-position: center center;
    background-size: cover;
    padding: 86px 0;
}

.request::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: rgba(72, 72, 72, 0.488);
}

.request__inner {
    position: relative;
    z-index: 9;
    text-align: center;
    max-width: 900px;
    width: 100%;
}

.request__inner * {
    color: #fff !important;
}

.request__inner img {
    margin-bottom: 43px;
}

.request__inner h5 {
    text-transform: uppercase;
}

.request__inner h2 {
    margin: 32px 0;
}

.request__inner p {
    font-size: 21px;
    line-height: 1.6;
}

.request__link {
    margin-top: 50px;
}

.request__link a {  
    padding: 26px 52px;
    font-weight: 500;
    background-color: #ED5243;
    color: #fff;
    text-align: center;
    font-size: 14px;
    letter-spacing: 2px;
    font-family: 'Gotham-Medium' !important;
    text-transform: uppercase;
}

.request__link a:hover {
    background-color: #0C1B1E;
}
.request h2 {
    font-size: 56px;
}
.request .d-flex.justify-content-center {
    justify-content: center!important;
}
.request h5 {
    font-size: 17px;
    letter-spacing: 0.3px;
}
/* Responsive */
@media only screen and (max-width: 1600px) {

     .request__inner p {
        font-size: 18px;
        line-height: 1.5;
    }
    .request h2 {
    font-size: 46px;
}
}
@media only screen and (max-width: 1280px) {
     .request__inner p {
        font-size: 18px;
    }
}
@media only screen and (max-width: 1080px) {
       .request__inner img {
        margin-bottom: 23px;
    }
    .request__inner h2 {
        margin: 12px 0 17px;
    }
    .request__link {
        margin-top: 30px;
    }
    .request__link a {
        padding: 20px 32px;
    }
    .request h2 {
    font-size: 36px;
}
}
@media only screen and (max-width: 767px) {

    .request {
        padding: 40px 0;
    }
    .request__inner p {
        font-size: 14px;
    }
    .request__link a {
        font-size: 11px;
        letter-spacing: 1.2px;
        padding: 16px 24px;
    }
    .request h2 {
    font-size: 23px;
    line-height: 1.2;
}
.request h5 {
        font-size: 14px;
        margin-top: 0;
    margin-bottom: 10px;
    font-weight: 500;
    line-height: 1.1;
    color: #0C1B1E;
    font-family: 'Gotham-Medium' !important;
    }
}
</style> 