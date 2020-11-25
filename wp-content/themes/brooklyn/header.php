<?php

/*
 * The header for our theme
 * by www.unitedthemes.com
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--
##########################################################################################

BROOKLYN THEME BY UNITED THEMES 
WWW.UNITEDTHEMES.COM

BROOKLYN THEME DESIGNED BY MARCEL MOERKENS
BROOKLYN THEME DEVELOPED BY MARCEL MOERKENS & MATTHIAS NETTEKOVEN 

POWERED BY UNITED THEMES - WEB DEVELOPMENT FORGE EST.2011

COPYRIGHT 2011 - 2015 ALL RIGHTS RESERVED BY UNITED THEMES

##########################################################################################
-->
<head>

	<!-- GeoIP redirect added by Paul Willis 06/2017 -->
	<script src="/wp-content/_countryfinder.js"></script>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>

    <?php ut_meta_hook(); //action hook, see inc/ut-theme-hooks.php ?>
    
        
    <?php if ( defined('WPSEO_VERSION') ) : ?>
		
        <!-- Title -->
        <title><?php wp_title(); ?></title>

	<?php else : ?>
    	
   		<?php ut_meta_theme_hook(); ?>
    
    <?php endif; ?>
    
    <!-- RSS & Pingbacks -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    
    <!-- Favicon -->
	<?php if( ot_get_option( 'ut_favicon' ) ) : ?>
        
        <?php 
        
        /* get icon info */
        $favicon = ot_get_option( 'ut_favicon' );
        $favicon_info = pathinfo( $favicon ); 
        $type = NULL;
        
        if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'png' ) {
            $type = 'type="image/png"';
        }
        
         if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'ico' ) {
            $type = 'type="image/x-icon"';
        }
        
         if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'gif' ) {
            $type = 'type="image/gif"';
        }
        
        ?>
                
        <link rel="shortcut&#x20;icon" href="<?php echo $favicon; ?>" <?php echo $type; ?> />
        <link rel="icon" href="<?php echo $favicon; ?>" <?php echo $type; ?> />
        
    <?php endif; ?>
    
    <!-- Apple Touch Icons -->    
    <?php if( ot_get_option( 'ut_apple_touch_icon_iphone' ) ) :?>
    <link rel="apple-touch-icon" href="<?php echo ot_get_option( 'ut_apple_touch_icon_iphone' ); ?>">
    <?php endif; ?>
    
    <?php if( ot_get_option( 'ut_apple_touch_icon_ipad' ) ) : ?>
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo ot_get_option( 'ut_apple_touch_icon_ipad' ); ?>" />
    <?php endif; ?>
    
    <?php if( ot_get_option( 'ut_apple_touch_icon_iphone_retina' ) ) : ?>
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo ot_get_option( 'ut_apple_touch_icon_iphone_retina' ); ?>" />
    <?php endif; ?>
    
    <?php if( ot_get_option( 'ut_apple_touch_icon_ipad_retina' ) ) :?>
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo ot_get_option( 'ut_apple_touch_icon_ipad_retina' ); ?>" />
    <?php endif; ?>
        
    <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]--> 
    	
    <?php wp_head(); ?>

<!-- Hotjar Tracking Code for www.storyterrace.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:547327,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>    

</head>

<?php 

/*
|--------------------------------------------------------------------------
| Scroll Effect and Speed
|--------------------------------------------------------------------------
*/

$scrollto 		= ot_get_option('ut_scrollto_effect');
$scrollto 		= !empty( $scrollto['easing'] ) ? $scrollto['easing'] : 'easeInOutExpo' ;
$scrollspeed 	= ot_get_option('ut_scrollto_speed'  , '650'); 

?>
<script src="/wp-content/uploads/2016/08/screentime.js"></script>

<style>.async-hide { opacity: 0 !important} </style>
<script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
(a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
})(window,document.documentElement,'async-hide','dataLayer',4000,
{'GTM-MQ6WB39':true});</script>

<script>
// Google Analytics
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-68490367-3', 'auto');
ga('require', 'GTM-MQ6WB39');
ga('require', 'linkid');
ga('send', 'pageview');
// End Google Analytics


// Riveted
!function(e,n){"function"==typeof define&&define.amd?define([],n):"object"==typeof module&&module.exports?module.exports=n():e.riveted=n()}(this,function(){var e=function(){function e(e){e=e||{},p=parseInt(e.reportInterval,10)||5,g=parseInt(e.idleTimeout,10)||30,k=e.gaGlobal||"ga","function"==typeof window[k]&&(w=!0),"undefined"!=typeof _gaq&&"function"==typeof _gaq.push&&(I=!0),"undefined"!=typeof dataLayer&&"function"==typeof dataLayer.push&&(h=!0),T="gaTracker"in e&&"string"==typeof e.gaTracker?e.gaTracker+".send":"send","function"==typeof e.eventHandler&&(s=e.eventHandler),"function"==typeof e.userTimingHandler&&(m=e.userTimingHandler),y="nonInteraction"in e&&(e.nonInteraction===!1||"false"===e.nonInteraction)?!1:!0,t(document,"keydown",v),t(document,"click",v),t(window,"mousemove",n(v,500)),t(window,"scroll",n(v,500)),t(document,"visibilitychange",o),t(document,"webkitvisibilitychange",o)}function n(e,n){var t,i,o,a=null,r=0,u=function(){r=new Date,a=null,o=e.apply(t,i)};return function(){var c=new Date;r||(r=c);var d=n-(c-r);return t=this,i=arguments,0>=d?(clearTimeout(a),a=null,r=c,o=e.apply(t,i)):a||(a=setTimeout(u,d)),o}}function t(e,n,t){e.addEventListener?e.addEventListener(n,t,!1):e.attachEvent?e.attachEvent("on"+n,t):e["on"+n]=t}function i(){clearTimeout(H),r()}function o(){(document.hidden||document.webkitHidden)&&i()}function a(){_+=1,_>0&&_%p===0&&s(_)}function r(){b=!0,clearInterval(E)}function u(){i(),L=!0}function c(){L=!1}function d(){b=!1,clearInterval(E),E=setInterval(a,1e3)}function l(){var e=new Date,n=e-D;R=!0,m(n),E=setInterval(a,1e3)}function f(){D=new Date,_=0,R=!1,b=!1,clearInterval(E),clearTimeout(H)}function v(){L||(R||l(),b&&d(),clearTimeout(H),H=setTimeout(i,1e3*g+100))}var s,m,p,g,y,w,I,T,h,k,R=!1,b=!1,L=!1,_=0,D=new Date,E=null,H=null;return m=function(e){h?dataLayer.push({event:"RivetedTiming",eventCategory:"Riveted",timingVar:"First Interaction",timingValue:e}):(w&&window[k](T,"timing","Riveted","First Interaction",e),I&&_gaq.push(["_trackTiming","Riveted","First Interaction",e,null,100]))},s=function(e){h?dataLayer.push({event:"Riveted",eventCategory:"Riveted",eventAction:"Time Spent",eventLabel:e,eventValue:p,eventNonInteraction:y}):(w&&window[k](T,"event","Riveted","Time Spent",e.toString(),p,{nonInteraction:y}),I&&_gaq.push(["_trackEvent","Riveted","Time Spent",e.toString(),p,y]))},{init:e,trigger:v,setIdle:i,on:c,off:u,reset:f}}();return e});

riveted.init();
//End Riveted
</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '889074011178862');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=889074011178862&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<body id="ut-sitebody" <?php body_class(); ?> data-scrolleffect="<?php echo $scrollto; ?>" data-scrollspeed="<?php echo $scrollspeed; ?>">

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KMMW8F"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PJMTMX');</script>
<!-- End Google Tag Manager -->

<a class="ut-offset-anchor" id="top" style="top:0px !important;"></a>

<?php 

/*
|--------------------------------------------------------------------------
| Pre Loader Overlay
|--------------------------------------------------------------------------
*/

if( ot_get_option('ut_use_image_loader') == 'on' ) : 
	
	if( ut_dynamic_conditional('ut_use_image_loader_on') ) : ?>
	
	<div class="ut-loader-overlay"></div>

	<?php endif; ?>

<?php endif; ?>


<?php ut_before_header_hook(); // action hook, see inc/ut-theme-hooks.php ?> 


<?php

/*
|--------------------------------------------------------------------------
| Navigation Setting
|--------------------------------------------------------------------------
*/

/* skin */
$ut_navigation_skin = ot_get_option('ut_navigation_skin' , 'ut-header-light');

/* visibility */
$headerstate = NULL;

if( is_home() || is_front_page() || is_singular('portfolio') || get_post_meta( get_the_ID() , 'ut_activate_page_hero' , true ) == 'on' ) {
	
	if( ot_get_option('ut_navigation_state' , 'off') == 'off' ) {
		$headerstate = 'ha-header-hide';
	}

}

/* width */
$navigation_width = ot_get_option('ut_navigation_width' , 'centered');
$logo_push = ( $navigation_width == 'fullwidth' ) ? 'push-5' : '';
$navigation_pull = ( $navigation_width == 'fullwidth' ) ? 'pull-5' : '';
			
/* main navigation settings*/
$mainmenu = array('echo'             => false,
                  'container'        => 'nav',
                  'container_id'     => 'navigation',
                  'fallback_cb' 	 => 'ut_default_menu',
                  'container_class'  => 'grid-80 hide-on-tablet hide-on-mobile ' . $navigation_pull ,
                  'items_wrap'       => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  'theme_location'   => 'primary', 
                  'walker'           => new ut_menu_walker()
);

/* mobile navigation settings */						 
$mobilemenu = array('echo'              => false,
                    'container'        	=> 'nav',
                    'container_id'    	=> 'ut-mobile-nav',
                    'menu_id'		   	=> 'ut-mobile-menu',
                    'menu_class'	   	=> 'ut-mobile-menu',
                    'fallback_cb' 	   	=> 'ut_default_menu',
                    'container_class'  	=> 'ut-mobile-menu mobile-grid-100 tablet-grid-100 hide-on-desktop',
                    'items_wrap'       	=> '<div class="ut-scroll-pane"><ul id="%1$s" class="%2$s">%3$s</ul></div>',
                    'theme_location'   	=> 'primary', 
                    'walker'           	=> new ut_menu_walker()
);

/* check if current page has an option tp show a hero */
$ut_activate_page_hero = get_post_meta( get_the_ID() , 'ut_activate_page_hero' , true );                    				

?>

<!-- header section -->
<header id="header-section" class="ha-header <?php echo $navigation_width; ?> <?php echo ( ot_get_option('ut_navigation_state' , 'off') == 'on_transparent' && ( is_home() || is_front_page() || is_singular('portfolio') || ( is_page() && $ut_activate_page_hero == 'on' ) ) ) ? 'ha-transparent' : $ut_navigation_skin; ?> <?php echo $headerstate; ?>">
    
    <?php if( $navigation_width == 'centered' ) :?>
    
    <div class="grid-container">
    
	<?php endif; ?>	
        
        <div class="ha-header-perspective">
        	<div class="ha-header-front">
            	
                <div class="grid-20 tablet-grid-50 mobile-grid-50 <?php echo $logo_push; ?>">
                
					<?php if ( get_theme_mod( 'ut_site_logo' ) ) : ?>
                        
                        <?php 
                        
                        $sitelogo = !is_front_page() && !is_home() && ( $ut_activate_page_hero == 'off' || empty($ut_activate_page_hero) ) ? get_theme_mod( 'ut_site_logo_alt' ) : get_theme_mod( 'ut_site_logo' );                        
                        
                        $alternate_logo = get_theme_mod( 'ut_site_logo_alt' ) ? get_theme_mod( 'ut_site_logo_alt' ) : get_theme_mod( 'ut_site_logo' ) ;?>
                        
                        <div class="site-logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img data-altlogo="<?php echo $alternate_logo; ?>" src="<?php echo $sitelogo; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
                        </div>
                        
                    <?php else : ?>
                    
                    	<div class="site-logo">
                        	<h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        </div>
                        
                    <?php endif; ?>             	
                
                </div>    
                
                <?php
                
                /* main and mobile menu cache */
                if( ot_get_option('ut_use_cache' , 'off') == 'on' ) {
                    
                    $language_prefix =  defined('ICL_LANGUAGE_CODE') ? '_' . ICL_LANGUAGE_CODE : '';
                    
                    $main_menu      = get_transient('ut_main_menu' . get_the_ID() . $language_prefix );
                    $mobile_menu    = get_transient('ut_mobile_menu' . get_the_ID() . $language_prefix  );
                    $cacheTime      = ot_get_option('ut_cache_ltime' , '10');
                    
                    if ($main_menu === false) {
                        
                        $main_menu = wp_nav_menu( $mainmenu );                        
                        set_transient('ut_main_menu' . get_the_ID() . $language_prefix , $main_menu, 60*$cacheTime);
                        
                    } 
                    
                    if ($mobile_menu === false) {
                        
                        $mobile_menu = wp_nav_menu( $mobilemenu );
                        set_transient('ut_mobile_menu' . get_the_ID() . $language_prefix  , $mobile_menu, 60*$cacheTime);
                        
                    } 
                                       
                    
                } else {
                    
                    $main_menu   = wp_nav_menu( $mainmenu );
                    $mobile_menu = wp_nav_menu( $mobilemenu );
                    
                } ?>                
                
                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                	
					<?php echo $main_menu; ?>
                    
                    <div class="ut-mm-trigger tablet-grid-50 mobile-grid-50 hide-on-desktop">
                    	<button class="ut-mm-button"></button>
                    </div>
                    
					<?php echo $mobile_menu; ?>
                                        
                <?php endif; ?>
                                                        
                </div>
            </div><!-- close .ha-header-perspective -->
    
	<?php if( $navigation_width == 'centered') :?>        
	
    </div> 
    
    <?php endif; ?>
    
</header><!-- close header -->

<div class="clear"></div>

<?php get_template_part( 'template-part', 'hero' ); ?>       

<?php ut_before_content_hook(); // action hook, see inc/ut-theme-hooks.php ?>

<div id="main-content" class="wrap ha-waypoint" data-animate-up="ha-header-hide" data-animate-down="ha-header-small">
	
    <a class="ut-offset-anchor" id="to-main-content"></a>
		
        <div class="main-content-background">