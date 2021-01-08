<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php get_template_part('partials/header', 'preconnect') ?>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <?php ut_meta_hook(); //action hook, see inc/ut-theme-hooks.php 
    ?>

    <?php if (defined('WPSEO_VERSION')) : ?>

        <!-- Title -->
        <title><?php wp_title(); ?></title>

    <?php else : ?>

        <?php ut_meta_theme_hook(); ?>

    <?php endif; ?>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "https://storyterrace.com/",
            "logo": "https://storyterrace.com/storyterrace.ico"
        }
    </script>
    <!-- RSS & Pingbacks -->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <!-- Preload Fonts -->
    <link rel="preload" as="font" type="font/woff2" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/webfonts/Gotham-Book.woff" crossorigin="anonymous">
    <link rel="preload" as="font" type="font/woff2" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/webfonts/Gotham-Medium.woff" crossorigin="anonymous">
    <link rel="preload" as="font" type="font/woff2" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/font-awesome.woff" crossorigin="anonymous">

    <!-- Favicon -->
    <?php if (ot_get_option('ut_favicon')) {
        /* get icon info */
        $favicon = ot_get_option('ut_favicon');
        $favicon_info = pathinfo($favicon);
        $type = NULL;

        if (isset($favicon_info['extension']) && $favicon_info['extension'] == 'png') {
            $type = 'type="image/png"';
        }

        if (isset($favicon_info['extension']) && $favicon_info['extension'] == 'ico') {
            $type = 'type="image/x-icon"';
        }

        if (isset($favicon_info['extension']) && $favicon_info['extension'] == 'gif') {
            $type = 'type="image/gif"';
        }
    } ?>

    <!-- Apple Touch Icons -->
    <?php if (ot_get_option('ut_apple_touch_icon_iphone')) : ?>
        <link rel="apple-touch-icon" href="<?php echo ot_get_option('ut_apple_touch_icon_iphone'); ?>">
    <?php endif; ?>

    <?php if (ot_get_option('ut_apple_touch_icon_ipad')) : ?>
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo ot_get_option('ut_apple_touch_icon_ipad'); ?>" />
    <?php endif; ?>

    <?php if (ot_get_option('ut_apple_touch_icon_iphone_retina')) : ?>
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo ot_get_option('ut_apple_touch_icon_iphone_retina'); ?>" />
    <?php endif; ?>

    <?php if (ot_get_option('ut_apple_touch_icon_ipad_retina')) : ?>
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo ot_get_option('ut_apple_touch_icon_ipad_retina'); ?>" />
    <?php endif; ?>

    <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

    <?php wp_head(); ?>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PJMTMX');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-68490367-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-68490367-3');
    </script>

</head>

<?php

/*
|--------------------------------------------------------------------------
| Scroll Effect and Speed
|--------------------------------------------------------------------------
*/

$scrollto         = ot_get_option('ut_scrollto_effect');
$scrollto         = !empty($scrollto['easing']) ? $scrollto['easing'] : 'easeInOutExpo';
$scrollspeed     = ot_get_option('ut_scrollto_speed', '650');

?>
<script src="/wp-content/uploads/2016/08/screentime.js"></script>

<body id="ut-sitebody" <?php body_class('bodyloader'); ?> data-scrolleffect="<?php echo $scrollto; ?>" data-scrollspeed="<?php echo $scrollspeed; ?>">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJMTMX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <a class="ut-offset-anchor" id="top" style="top:0px !important;"></a>

    <?php ut_before_header_hook(); // action hook, see inc/ut-theme-hooks.php

    /*
    |--------------------------------------------------------------------------
    | Navigation Setting
    |--------------------------------------------------------------------------
    */

    /* skin */
    $ut_navigation_skin = ot_get_option('ut_navigation_skin', 'ut-header-light');

    /* visibility */
    $headerstate = NULL;

    if (is_home() || is_front_page() || is_singular('portfolio') || get_post_meta(get_the_ID(), 'ut_activate_page_hero', true) == 'on') {

        if (ot_get_option('ut_navigation_state', 'off') == 'off') {
            $headerstate = 'ha-header-hide';
        }
    }

    /* width */
    $navigation_width = ot_get_option('ut_navigation_width', 'centered');
    $logo_push = ($navigation_width == 'fullwidth') ? 'push-5' : '';
    $navigation_pull = ($navigation_width == 'fullwidth') ? 'pull-5' : '';

    /* main navigation settings*/
    $mainmenu = array(
        'echo'             => false,
        'container'        => false,
        'container_id'     => 'navigation',
        'fallback_cb'      => 'ut_default_menu',
        'container_class'  => 'grid-80 hide-on-tablet hide-on-mobile ' . $navigation_pull,
        'items_wrap'       => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'theme_location'   => 'primary',
        'walker'           => new ut_menu_walker()
    );

    /* mobile navigation settings */
    $mobilemenu = array(
        'echo'              => false,
        'container'            => 'nav',
        'container_id'        => 'ut-mobile-nav',
        'menu_id'               => 'ut-mobile-menu',
        'menu_class'           => 'ut-mobile-menu',
        'fallback_cb'            => 'ut_default_menu',
        'container_class'      => 'ut-mobile-menu mobile-grid-100 tablet-grid-100 hide-on-desktop',
        'items_wrap'           => '<div class="ut-scroll-pane"><ul id="%1$s" class="%2$s">%3$s</ul></div>',
        'theme_location'       => 'primary',
        'walker'               => new ut_menu_walker()
    );

    /* check if current page has an option tp show a hero */
    $ut_activate_page_hero = get_post_meta(get_the_ID(), 'ut_activate_page_hero', true);
    $curlangs =  ICL_LANGUAGE_CODE;
    ?>
    <div class="header">
        <?php if (get_field('top_bar', get_the_ID())) : ?>
            <?php if ($top_msg = get_field('covid_message', get_the_ID())) : ?>
                <?php

                $more_text = get_field('learn_more_text', get_the_ID());
                $more_link = get_field('learn_more_link', get_the_ID());
                $background_color = get_field('top_bar_background_color', get_the_ID());
                $text_color = get_field('top_bar_text_color', get_the_ID());
                $link_color = get_field('top_bar_link_color', get_the_ID());
                $close_icon_color = get_field('top_bar_close_icon_color', get_the_ID());
                ?>
                <div class="golden-top-bar" style="background:<?php echo $background_color; ?>; display:none;">
                    <p style="color:<?php echo $text_color; ?>!important;">
                        <?php echo $top_msg; ?>
                        <?php if ($more_link) : ?>
                            <a href="<?php echo $more_link; ?>" target="_blank" style="color: <?php echo $link_color; ?>;">
                            <?php endif; ?>
                            <?php echo $more_text; ?>
                            <?php if ($more_link) : ?>
                            </a>
                        <?php endif; ?>
                        <span class="close-bar" style="color: <?php echo $close_icon_color; ?>; border-color: <?php echo $close_icon_color; ?>;">x</span>
                    </p>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="container">
            <div class="header__inner d-flex justify-content-between align-items-center">
                <div class="header__logo">
                    <a href="<?php echo  apply_filters( 'wpml_home_url', get_option( 'home' ) ); ?>">
                        <img width="142" height="34" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.svg" alt="StoryTerrace">
                    </a>                    
                </div>
                <div class="header__menu">
                    <?php

                    /* main and mobile menu cache */
                    if (ot_get_option('ut_use_cache', 'off') == 'on') {

                        $language_prefix =  defined('ICL_LANGUAGE_CODE') ? '_' . ICL_LANGUAGE_CODE : '';

                        $main_menu      = get_transient('ut_main_menu' . get_the_ID() . $language_prefix);
                        $mobile_menu    = get_transient('ut_mobile_menu' . get_the_ID() . $language_prefix);
                        $cacheTime      = ot_get_option('ut_cache_ltime', '10');

                        if ($main_menu === false) {

                            $main_menu = wp_nav_menu($mainmenu);
                            set_transient('ut_main_menu' . get_the_ID() . $language_prefix, $main_menu, 60 * $cacheTime);
                        }

                        if ($mobile_menu === false) {

                            $mobile_menu = wp_nav_menu($mobilemenu);
                            set_transient('ut_mobile_menu' . get_the_ID() . $language_prefix, $mobile_menu, 60 * $cacheTime);
                        }
                    } else {

                        $main_menu   = wp_nav_menu($mainmenu);
                        $mobile_menu = wp_nav_menu($mobilemenu);
                    } ?>

                    <?php if (has_nav_menu('primary')) : ?>

                        <?php echo $main_menu; ?>

                        <div class="ut-mm-trigger tablet-grid-50 mobile-grid-50 hide-on-desktop">
                            <button class="ut-mm-button"></button>
                        </div>

                        <?php echo $mobile_menu; ?>

                    <?php endif; ?>
                </div>
                <?php
                $header_right_button_text = get_field('header_right_button_text', 'option');
                $header_right_button_link = get_field('header_right_button_link', 'option');
                $header_left_button_text = get_field('left_button_text', 'option');
                $header_left_button_link = get_field('left_button_link', 'option');
                ?>
                <div class="top-btn">
                    <div class="header__button login-cta">
                        <?php if ($header_right_button_text) { ?>
                            <a class="" href="<?php echo $header_right_button_link; ?>" target="_blank"><?php echo $header_right_button_text; ?></a>
                        <?php } ?>
                    </div>
                    <div class="header__button signup-cta">
                        <?php if ($header_left_button_text) { ?>
                            <a class="" href="<?php echo $header_left_button_link; ?>" target="_blank"><?php echo $header_left_button_text; ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="header__toggler">
                    <div class="header__togglerinner">
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (is_page(36682) || is_page(37644) || is_page(32679) || is_page(39350) || is_page(36707) || is_page(39348) || is_page(39695) || is_page(32678) || is_page(37383) || is_page(39349) || is_page(37621) || is_page(37559)) { ?>

    <?php
    } else {
        get_template_part('template-part', 'hero');
    } ?>