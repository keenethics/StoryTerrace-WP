
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

if(!empty($bbs_background_image)){ ?>
<div class="request">
    <?php echo wp_get_attachment_image( $bbs_background_image['id'], "large", "", array( "class" => "request__background-image" ) );  ?>

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