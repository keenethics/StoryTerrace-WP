        
    <?php ut_before_footer_hook(); ?>
           
    <?php if( ut_return_csection_config('ut_activate_csection' , 'on') == 'on' ) {
            
        /* contact section headline */ 
        $ut_csection_header_expertise_slogan = ot_get_option('ut_csection_header_expertise_slogan');
        $ut_csection_header_slogan           = ot_get_option('ut_csection_header_slogan');
        $ut_csection_header_slogan_glow      = ot_get_option('ut_csection_header_slogan_glow') ;
        $ut_csection_header_style            = ot_get_option('ut_csection_header_style' , 'pt-style-1');
        $ut_csection_header_style            = ( $ut_csection_header_style == 'global' ) ? ot_get_option('ut_global_headline_style') : $ut_csection_header_style;
                
        /* contact section background and overlay - available inside theme options as well as on pages */
        $ut_csection_overlay                 = ut_return_csection_config( 'ut_csection_overlay' , 'on' );        
        
        /* contact section background and overlay - currently only located inside theme options panel */
        $ut_csection_background_type         = ot_get_option('ut_csection_background_type' , 'image');
        $ut_csection_parallax                = ot_get_option('ut_csection_parallax' , 'off') == 'on' ? 'parallax-background parallax-section' : '';
        $ut_csection_overlay_pattern         = ot_get_option('ut_csection_overlay_pattern' , 'off') == 'on' ? 'parallax-overlay-pattern' : '';
        
        /* google map */
        $ut_csection_map                     = ot_get_option( 'ut_csection_map' );
        $ut_csection_map_class               = $ut_csection_map && $ut_csection_background_type == 'map' ? 'contact-map' : '';
        
        /* section video class */
        $ut_csection_video_source            = ot_get_option('ut_csection_video_source' , 'youtube');
        $ut_section_video_class              = $ut_csection_background_type == 'video' && $ut_csection_video_source == 'selfhosted' ? 'ut-video-section' : '';
                
        /* contact section skin */
        $ut_csection_skin                    = ot_get_option( 'ut_csection_skin');
        
        /* contact section areas */
        $ut_left_csection_content_area       = ot_get_option('ut_left_csection_content_area');
        $ut_right_csection_content_area      = ot_get_option('ut_right_csection_content_area');
        
        $ut_left_csection_content_area_width = !empty($ut_right_csection_content_area) ? 'grid-45 suffix-5 mobile-grid-100 tablet-grid-50' : 'grid-100 mobile-grid-100 tablet-grid-100';
        $ut_right_csection_content_area_width= !empty($ut_left_csection_content_area) ? 'grid-50 mobile-grid-100 tablet-grid-50' : 'grid-100  mobile-grid-100 tablet-grid-100';
        
        
    } ?>
            
    <?php ut_after_footer_hook(); // action hook, see inc/ut-theme-hooks.php ?>

    <?php 
        /* footer title */
        $footer_1_title = get_field('footer_1_title','options');
        $footer_2_title = get_field('footer_2_title','options');
        $footer_3_title = get_field('footer_3_title','options');

        /* custom fields */
        $contact_number = get_field('contact_number','options');
        $email_address = get_field('email_address','options');
        $address = get_field('address','options');
        $copyright_text = get_field('copyright_text','options');

        /* social fields */
        $social_title = get_field('social_title','options');
        $social_twitter_link = get_field('social_twitter_link','options');
        $social_instagram_link = get_field('social_instagram_link','options');
        $social_linkedin_link = get_field('social_linkedin_link','options');
        $social_facebook_link = get_field('social_facebook_link','options');
        $social_youtube_link = get_field('social_youtube_link','options');

        $subscribe_form_title = get_field('subscribe_form_title','options');
        $subscribe_hubspot_form = get_field('subscribe_hubspot_form','options');

        $show_free_consultation_form = get_field('show_free_consultation_form','options');
        $free_consultation_form = get_field('free_consultation_form','options');
    ?>

    <?php include_once( 'bottom-banner-section.php' ); ?> 
    
    <div class="footer">
        <div class="container">
            <div class="footer__inner d-flex">
                <div class="footer__col footer__col--logo">
                    <a href="/"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/logo-icon--lined.svg" alt="."></a>
                </div>
                <div class="footer__col footer__col--menu">
                    <?php if($footer_1_title){ ?>
                           <h6><?php echo $footer_1_title; ?></h6>
                    <?php } ?>
                    <ul>
                        <?php 
                            $rows = get_field('footer_menu_1','options');
                            if($rows)
                            {
                              foreach($rows as $row)
                                {  ?>
                                    <li><a href="<?php echo $row['menu_link']; ?>"><?php echo $row['menu_text']; ?></a></li>
                               <?php  }
                            }
                         ?>
                    </ul>
                </div>
                <div class="footer__col footer__col--menu mbl__menu">
                    <?php if($footer_2_title){ ?>
                           <h6><?php echo $footer_2_title; ?></h6>
                    <?php } ?>
                    <ul>
                        <?php 
                            $rows = get_field('footer_menu_2','options');
                            if($rows)
                            {
                              foreach($rows as $row)
                                {  ?>
                                    <li><a href="<?php echo $row['menu_link']; ?>"><?php echo $row['menu_text']; ?></a></li>
                               <?php  }
                            }
                         ?>
                    </ul>
                </div>
                <div class="footer__col footer__col--menu d-flex flex-column">
                    <div class="footer__info">
                        <?php if($footer_3_title){ ?>
                           <h6><?php echo $footer_3_title; ?></h6>
                        <?php } ?>
                        <ul style="display: none;">
                            <?php if($contact_number){ ?>
                                  <li><a href="tel:<?php echo $contact_number; ?>"><?php echo $contact_number; ?></a></li>
                            <?php } ?>
                            <?php if($email_address){ ?>
                                  <li><a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a></li>
                            <?php } ?>      
                        </ul>
                        <address>
                            <?php if($contact_number){ ?>
                            <a href="tel:<?php echo $contact_number; ?>"><?php echo $contact_number; ?></a><br>
                            <?php } ?>
                            <?php if($email_address){ ?>
                            <a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a><br>
                            <?php } ?>
                            <?php if(!empty($address)){
                                  echo $address;
                            } ?>
                        </address>
                    </div>
                    <div class="footer__copy">
                        <p>&copy; <?php echo date('Y'); ?> <?php if($copyright_text) { echo $copyright_text; } ?></p>
                    </div>
                </div>
                <div class="footer__col footer__col--form d-flex flex-column">
                    <div class="footer__form">
                        <?php if($subscribe_form_title){ ?>
                            <p><?php echo $subscribe_form_title;?></p>
                        <?php }?>
                        <?php if(!empty($subscribe_hubspot_form)) { ?>
                        <div class="footer__forminner d-flex">
                          <?php echo $subscribe_hubspot_form; ?>
                        </div>
                    <?php } ?>
                    </div>
                    <div class="footer__lang">
                        <?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
                                <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
                        <?php endif; ?>
                    </div>
                    <div class="footer__social">
                        <?php if($social_twitter_link || $social_instagram_link || $social_facebook_link || $social_linkedin_link || $social_youtube_link){?>
                            <?php if($social_title) { ?>
                                <h6><?php echo $social_title;?></h6>
                            <?php }?>
                            <ul>
                                <li>
                                    <?php if($social_twitter_link){ ?>
                                        <a target="_blank" href="<?php echo $social_twitter_link;?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if($social_instagram_link){ ?>
                                        <a target="_blank" href="<?php echo $social_instagram_link;?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if($social_facebook_link){ ?>
                                        <a target="_blank" href="<?php echo $social_facebook_link;?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if($social_linkedin_link){ ?>
                                        <a target="_blank" href="<?php echo $social_linkedin_link;?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if($social_youtube_link){ ?>
                                        <a target="_blank" href="<?php echo $social_youtube_link;?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                    <?php } ?>
                                </li>
                            </ul>
                        <?php }?>
                    </div>
                    <div class="footer__socialmobile">
                        <?php if($social_twitter_link || $social_instagram_link || $social_facebook_link || $social_linkedin_link || $social_youtube_link){ ?>                            
                            <ul>
                                <li>
                                    <?php if($social_twitter_link){ ?>
                                        <a target="_blank" href="<?php echo $social_twitter_link;?>">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/twitter.svg" alt=".">
                                        </a>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if($social_instagram_link){ ?>
                                        <a target="_blank" href="<?php echo $social_instagram_link;?>">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/instagram.svg" alt=".">
                                        </a>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if($social_facebook_link){ ?>
                                        <a target="_blank" href="<?php echo $social_facebook_link;?>">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/facebook.svg" alt=".">
                                        </a>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if($social_linkedin_link){ ?>
                                        <a target="_blank" href="<?php echo $social_linkedin_link;?>">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/linkedin.svg" alt=".">
                                        </a>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if($social_youtube_link){ ?>
                                        <a target="_blank" href="<?php echo $social_youtube_link;?>">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/youtube.svg" alt=".">
                                        </a>
                                    <?php } ?>
                                </li>
                            </ul>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="videopopup">
        <div class="videopopup__outer">
            <div class="videopopup__inner">
                <i class="fa fa-times videopopup__close" aria-hidden="true"></i>
                <div class="videopopup__wrap">
                    <iframe width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>        
    </div>
    
    <!-- Free Consultation Popup -->
    <?php if (!is_home() || !is_front_page() && !empty($free_consultation_form) && $show_free_consultation_form == 'yes') { ?>
        <div class="globalpopup free-consultation">
            <div class="globalpopup__outer">
                <div class="globalpopup__inner">
                    <i class="fa fa-times globalpopup__close free-consultation__close" aria-hidden="true"></i>
                    <div class="globalpopup__wrap">
                        <div class="globalpopup__bottom">
                            <?php echo $free_consultation_form; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php wp_footer(); ?>
    <script type="text/javascript">
    /* <![CDATA[ */        
        
        <?php ut_java_footer_hook(); // action hook, see inc/ut-theme-hooks.php ?> 
        
        <?php if( ot_get_option('ut_google_analytics') ) : ?>
          
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', '<?php echo stripslashes( ot_get_option('ut_google_analytics') ); ?>', 'auto');
          ga('send', 'pageview');
          
        <?php endif; ?>
             
     /* ]]> */
    </script>
    </body>
</html>

<style type="text/css">
a.romw-link {
    display: none !important;
}
</style>
<script type="text/javascript">
    
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
        }
        return "";
    }

    function checkCookie() {
        var cookieVal = getCookie("CloseCovidMsg");
        if (cookieVal == "yes") {
            jQuery('.golden-top-bar').hide().remove();
        } else {
            jQuery('.golden-top-bar').show();
        }
    }

    jQuery(document).ready(function(){
        checkCookie();
        jQuery('.close-bar').on('click', function(){
            jQuery('.golden-top-bar').hide().remove();
            setCookie("CloseCovidMsg", 'yes', 1);
        });
    });

</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<?php $selectedlangs = ICL_LANGUAGE_CODE; 
      if($selectedlangs != 'en-US'){ 
        if(is_page(array( 39350, 36707))) {
            //echo $selectedlangs;
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($){
                setTimeout(function(){
                   homedata = $('.icl-en-US a').attr('href');
                   newurlshome = homedata+'/?home=us';
                   $('.icl-en-US a').attr('href',newurlshome);
               }, 5000);
            });
        </script>
<?php } 
}?>