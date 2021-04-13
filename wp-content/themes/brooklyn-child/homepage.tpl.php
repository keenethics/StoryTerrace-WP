<?php
/* Template Name: Homepage */
get_header();

// Banner Section 
$top_left_image = get_field('top_left_image');
$top_main_title = get_field('top_main_title');
$top_big_title = get_field('top_big_title');

//Buttons Settings
$show_primary_cta = get_field('show_primary_cta');
$top_button_text = get_field('top_button_text');
$top_button_link = get_field('top_button_link');
$show_secondary_cta = get_field('show_secondary_cta');
$secondary_cta_text = get_field('secondary_cta_text');
$secondary_cta_link = get_field('secondary_cta_link');
$secondary_cta_popup = get_field('secondary_cta_popup_code');
$top_last_image = get_field('top_last_image');
$center_left_image = get_field('center_left_image');
$center_image = get_field('center_image');
$center_right_image = get_field('center_right_image');
$bottom_text = get_field('bottom_text');
$bottom_large_text = get_field('bottom_large_text');
$bottom_right_image = get_field('bottom_right_image');
$popup_hub_code = get_field('popup_hub_code');
$show_search = get_field('show_search');
$search_button_text = get_field('search_button_text');
$search_placeholder = get_field('search_placeholder');
$search_result_link = get_field('search_result_link');

// Brand Section
$brands_title = get_field('brands_title');

// How it Works Section
$how_left_title = get_field('how_left_title');
$how_big_title = get_field('how_big_title');
$how_left_video_title = get_field('how_left_video_title');
$how_left_video_description = get_field('how_left_video_description');
$how_left_video_image = get_field('how_left_video_image');
$how_left_video_link = get_field('how_left_video_link');
$how_right_description = get_field('how_right_description');
// Our Writer Section
$ourwriters_main_title = get_field('ourwriters_main_title');
$ourwriters_big_title = get_field('ourwriters_big_title');
$ourwriters_description = get_field('ourwriters_description');
$ourwriters_button_text = get_field('ourwriters_button_text');
$ourwriters_button_link = get_field('ourwriters_button_link');
$ourwriters_writer_image = get_field('ourwriters_writer_image');

// Testimonials Section
$testimonials_main_title = get_field('testimonials_main_title');
$testimonials_big_title = get_field('testimonials_big_title');
$testimonials_description = get_field('testimonials_description');

//Books Sample
$bookssample_main_title = get_field('bookssample_main_title');
$bookssample_big_title = get_field('bookssample_big_title');
$bookssample_btntitle = get_field('bookssample_btntitle');
$bookssample_btn_link = get_field('bookssample_btn_link');
$bookssample_description = get_field('bookssample_description');
$show_sub_heading = get_field('show_sub_heading');
$sub_heading = get_field('sub_heading_top_title');
$book_art_content = get_field('book_art_content', get_the_ID());
?>

<div class="banner">
    <div class="banner__row banner__row1">
        <?php
        get_template_part(
            'partials/banner',
            'column',
            array(
                'image_field' => $top_left_image,
                'image_class' => 'banner__art1'
            )
        );
        ?>

        <div class="banner__col">
            <div class="banner__cell">
                <div class="center-title">
                    <?php if (!empty($top_main_title)) { ?>
                        <h5><?php echo $top_main_title; ?></h5>
                    <?php } ?>
                    <?php if (!empty($top_big_title)) { ?>
                        <h2 class="large"><?php echo $top_big_title; ?></h2>
                    <?php } ?>

                    <?php
                    if ($show_sub_heading == 'yes') {
                        if (!empty($sub_heading)) { ?>
                            <p class="subhead-top subhead-top--desktop desksearch"><?php echo $sub_heading; ?></p>
                    <?php }
                    } ?>

                    <?php if ($show_search == 'yes') { ?>
                        <div class="writer-search desksearch">
                            <form id="zipcode" class="writer-search-form">
                                <div class="input-group">
                                    <input class="zipc" type="text" placeholder="<?php if (!empty($search_placeholder)) {
                                                                                        echo $search_placeholder;
                                                                                    } else { ?>Enter Postal Code<?php } ?>">
                                    <input type="submit" value="<?php if (!empty($search_button_text)) {
                                                                    echo $search_button_text;
                                                                } else { ?>Search Writers<?php } ?>">
                                </div>
                            </form>
                        </div>

                        <?php
                        $extra_content = get_field('extra_content');
                        $text_below_search_bar = get_field('text_below_search_bar');
                        $sign_up_text = get_field('sign_up_text');
                        $sign_up_link = get_field('sign_up_link');
                        ?>
                        <?php if ($extra_content) { ?>
                            <div class="search-extra-content desktop-search-extra-content">
                                <p><?php echo $text_below_search_bar; ?> <a href="<?php echo $sign_up_link; ?>" target="_blank"><?php echo $sign_up_text; ?></a></p>
                            </div>
                        <?php } ?>
                        <!-- ToDo: refactor all zip code scripts -->
                        <script>
                            jQuery(document).ready(function($) {
                                $("#zipcode").submit(function(event) {
                                    event.preventDefault();
                                    var zipval = $('.zipc').val();
                                    urlred = '<?php echo $search_result_link; ?>';
                                    window.location = urlred + '/?zip=' + zipval + '&page=' + window.location.pathname;
                                });
                            });
                        </script>
                    <?php } else { ?>
                        <?php if ($show_primary_cta == 'yes') { ?>
                            <div class="center-title__link pop-getstart">
                                <?php if (!empty($top_button_text)) { ?>
                                    <?php if (!empty($top_button_link)) { ?>
                                        <a href="<?php echo $top_button_link; ?>" class="link-filled">
                                        <?php } else { ?>
                                            <a href="JavaScript:Void(0);" class="link-filled banneropen">
                                            <?php } ?>
                                            <?php echo $top_button_text; ?>
                                            </a>
                                        <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if ($show_secondary_cta == 'yes') { ?>
                            <div class="center-title__linkunderline">
                                <?php if (!empty($secondary_cta_text)) { ?>
                                    <?php if (!empty($secondary_cta_link)) { ?>
                                        <a href="<?php echo $secondary_cta_link; ?>" class="link-underline">
                                        <?php } else { ?>
                                            <a href="JavaScript:Void(0);" class="link-underline underclick">
                                            <?php } ?>
                                            <?php echo $secondary_cta_text; ?>
                                            </a>
                                        <?php } ?>
                            </div>
                    <?php }
                    }
                    ?>
                </div>
            </div>
        </div>

        <?php
        get_template_part(
            'partials/banner',
            'column',
            array(
                'image_field' => $top_last_image,
                'image_class' => 'banner__art2'
            )
        );
        ?>
    </div>

    <div class="banner__row banner__row2">
        <?php
        get_template_part(
            'partials/banner',
            'column',
            array(
                'image_field' => $center_left_image,
                'image_class' => 'banner__art3'
            )
        );

        get_template_part(
            'partials/banner',
            'column',
            array(
                'image_field' => $center_image,
                'image_class' => 'banner__art4'
            )
        );
        ?>

        <div class="banner__col">
            <div class="banner__cell">
                <?php
                get_template_part(
                    'partials/banner',
                    'column-image',
                    array(
                        'image_field' => $center_right_image,
                        'image_class' => 'banner__art5 banner__art--hidemobile'
                    )
                );

                get_template_part(
                    'partials/banner',
                    'column-image',
                    array(
                        'image_field' => $top_last_image,
                        'image_size' => 'thumbnail',
                        'image_class' => 'banner__art2 banner__art--hidedesktop'
                    )
                );
                ?>
            </div>
        </div>
    </div>

    <div class="banner__row banner__row4">
        <div class="banner__col">
            <div class="banner__cell">
            </div>
        </div>
        <div class="banner__col">
            <div class="banner__cell">
                <div class="center-title">
                    <?php if ($show_sub_heading == 'yes') {
                        if (!empty($sub_heading)) { ?>
                            <p class="subhead-top"><?php echo $sub_heading; ?></p>
                    <?php }
                    } ?>
                    <?php if ($show_search == 'yes') { ?>
                        <div class="writer-search mobsearch">
                            <form id="zipcode" class="writer-search-form">
                                <div class="input-group">
                                    <input class="zipc" type="text" placeholder="<?php if (!empty($search_placeholder)) {
                                                                                        echo $search_placeholder;
                                                                                    } else { ?>Enter Postal Code<?php } ?>">
                                    <input type="submit" value="<?php if (!empty($search_button_text)) {
                                                                    echo $search_button_text;
                                                                } else { ?>Search Writers<?php } ?>">
                                </div>
                            </form>
                        </div>
                        <?php
                        $extra_content = get_field('extra_content');
                        $text_below_search_bar = get_field('text_below_search_bar');
                        $sign_up_text = get_field('sign_up_text');
                        $sign_up_link = get_field('sign_up_link');
                        ?>
                        <?php if ($extra_content) { ?>
                            <div class="search-extra-content mobile-search-extra-content">
                                <p><?php echo $text_below_search_bar; ?> <a href="<?php echo $sign_up_link; ?>" target="_blank"><?php echo $sign_up_text; ?></a></p>
                            </div>
                        <?php } ?>
                        <!-- ToDo: refactor all zip code scripts -->
                        <script>
                            jQuery(document).ready(function($) {
                                $(".mobsearch #zipcode").submit(function(event) {
                                    event.preventDefault();
                                    var zipval = $('.mobsearch .zipc').val();
                                    urlred = '<?php echo $search_result_link; ?>';
                                    window.location = urlred + '/?zip=' + zipval + '&page=' + window.location.pathname;
                                });
                            });
                        </script>
                    <?php } else { ?>
                        <?php if ($show_primary_cta == 'yes') { ?>
                            <div class="center-title__link pop-getstart">
                                <?php if (!empty($top_button_text)) { ?>
                                    <?php if (!empty($top_button_link)) { ?>
                                        <a href="<?php echo $top_button_link; ?>" class="link-filled">
                                        <?php } else { ?>
                                            <a href="JavaScript:Void(0);" class="link-filled banneropen">
                                            <?php } ?>
                                            <?php echo $top_button_text; ?>
                                            </a>
                                        <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if ($show_secondary_cta == 'yes') { ?>
                            <div class="center-title__linkunderline">
                                <?php if (!empty($secondary_cta_text)) { ?>
                                    <?php if (!empty($secondary_cta_link)) { ?>
                                        <a href="<?php echo $secondary_cta_link; ?>" class="link-underline">
                                        <?php } else { ?>
                                            <a href="JavaScript:Void(0);" class="link-underline underclick">
                                            <?php } ?>
                                            <?php echo $secondary_cta_text; ?>
                                            </a>
                                        <?php } ?>
                            </div>
                    <?php }
                    } ?>

                </div>
            </div>
        </div>
        <div class="banner__col">
            <div class="banner__cell">
            </div>
        </div>
    </div>

    <div class="banner__row banner__row3">
        <div class="banner__col">
            <div class="banner__cell">
            </div>
        </div>
        <div class="banner__col">
            <div class="banner__cell">
                <div class="center-title">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-icon--red-lined.svg" alt=".">
                    <?php if (!empty($bottom_text)) { ?>
                        <h2 class="less"><?php echo $bottom_text; ?></h2>
                    <?php } ?>
                    <?php if (!empty($bottom_large_text)) {
                        echo $bottom_large_text;
                    } ?>
                </div>
            </div>
        </div>

        <?php
        get_template_part(
            'partials/banner',
            'column',
            array(
                'image_field' => $bottom_right_image,
                'image_class' => 'banner__art6'
            )
        );
        ?>
    </div>
</div>

<div class="brands">
    <div class="container">
        <?php if (!empty($brands_title)) { ?>
            <h4><?php echo $brands_title; ?></h4>
        <?php } ?>

        <div class="brands__slider">
            <?php
            $rows = get_field('brand_images');
            if ($rows) {
                foreach ($rows as $row) {  ?>
                    <div>
                        <div class="brands__cell">
                            <img src="<?php echo $row['image']; ?>" alt=".">
                        </div>
                    </div>
            <?php  }
            }
            ?>
        </div>
        <div class="brands__slidermobile">
            <?php
            $rows = get_field('brand_images');
            if ($rows) {
                foreach ($rows as $row) {  ?>
                    <div>
                        <div class="brands__cell">
                            <img src="<?php echo $row['image']; ?>" alt=".">
                        </div>
                    </div>
            <?php  }
            }
            ?>
        </div>
    </div>
</div>

<div class="works">
    <div class="container container__lineicon">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/additional-bg.svg" alt=".">
    </div>
    <div class="container">
        <div class="works__top">
            <?php if (!empty($how_left_title)) { ?>
                <h5><?php echo $how_left_title; ?></h5>
            <?php } ?>
        </div>
        <div class="d-flex justify-content-between">
            <div class="works__left">
                <?php if (!empty($how_big_title)) { ?>
                    <h2><?php echo $how_big_title; ?></h2>
                <?php } ?>
            </div>
            <div class="works__right">
                <?php if (!empty($how_right_description)) { ?>
                    <p><?php echo $how_right_description; ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="works__content d-flex justify-content-between">
            <div class="works__left">
                <div class="works__video d-flex justify-content-around align-items-center">
                    <div class="works__videoleft">
                        <?php if (!empty($how_left_video_title)) { ?>
                            <h3 class="large"><?php echo $how_left_video_title; ?></h3>
                        <?php } ?>
                        <?php if (!empty($how_left_video_description)) { ?>
                            <p><?php echo $how_left_video_description; ?></p>
                        <?php } ?>
                    </div>
                    <div class="works__videoright">
                        <div class="videoicon" vidurl="<?php echo $how_left_video_link; ?>">
                            <i class="fa fa-play" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="works__right">
                <?php
                $rows = get_field('how_right_work_list');
                if ($rows) {
                    foreach ($rows as $row) {  ?>
                        <div class="works__list">
                            <div class="works__number">
                                <span><?php echo $row['list_number']; ?></span>
                            </div>
                            <div class="works__info">
                                <h4><?php echo $row['list_title']; ?></h4>
                                <p><?php echo $row['list_sub_title']; ?></p>
                            </div>
                        </div>
                <?php  }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="our-writers">
    <div class="container">
        <div class="center-title">
            <?php if (!empty($ourwriters_main_title)) { ?>
                <h5><?php echo $ourwriters_main_title; ?></h5>
            <?php } ?>
            <?php if (!empty($ourwriters_big_title)) { ?>
                <h2><?php echo $ourwriters_big_title; ?></h2>
            <?php } ?>
            <?php if (!empty($ourwriters_description)) { ?>
                <p><?php echo $ourwriters_description; ?></p>
            <?php } ?>
            <div class="center-title__link">
                <?php if (!empty($ourwriters_button_text)) { ?>
                    <a href="<?php echo $ourwriters_button_link; ?>" class="link-outlined"><?php echo $ourwriters_button_text; ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="our-writers__art">
        <img class="our-writers__artmobile" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/writers-art--mobile.png" alt=".">
        <?php if (!empty($ourwriters_writer_image)) { ?>
            <img class="our-writers__artdesktop" src="<?php echo $ourwriters_writer_image['url'] ?>" alt="<?php echo $ourwriters_writer_image['alt'] ?>">
        <?php } ?>
    </div>
</div>

<div class="testimonials">
    <div class="container">
        <div class="center-title">
            <?php if (!empty($testimonials_main_title)) { ?>
                <h5><?php echo $testimonials_main_title; ?></h5>
            <?php } ?>
            <?php if (!empty($testimonials_big_title)) { ?>
                <h2><?php echo $testimonials_big_title; ?></h2>
            <?php } ?>
            <?php if (!empty($testimonials_description)) { ?>
                <p><?php echo $testimonials_description; ?></p>
            <?php } ?>
        </div>
        <div class="testimonials__slider testimonials__slider--js">
            <?php
            $rows = get_field('home_testimonials_list');
            if ($rows) {
                foreach ($rows as $row) {  ?>
                    <div class="testimonials__col">
                        <div class="testimonials__cell">
                            <div class="testimonials__grid d-flex justify-content-between align-items-center">
                                <img src="<?php echo $row['video_image']; ?>" alt=".">
                                <div class="testimonials__left">
                                    <div class="testimonials__mobiletop">
                                        <h6><?php echo $row['title']; ?></h6>
                                        <h5><?php echo $row['writer_name']; ?></h5>
                                        <div class="testimonials__time">
                                            <?php echo $row['time']; ?>
                                        </div>
                                    </div>
                                    <p><?php echo $row['description_home_testimonials']; ?></p>
                                </div>
                                <div class="testimonials__right">
                                    <div class="videoicon" vidurl="<?php echo $row['video_link']; ?>">
                                        <i class="fa fa-play" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonials__mobilecontent">
                                <p><?php echo $row['description_home_testimonials']; ?></p>
                            </div>
                        </div>
                    </div>
            <?php  }
            }
            ?>
        </div>
    </div>
</div>
<?php include_once('reviews.php'); ?>

<?php
$do_you_want_to_show_book_section = get_field('do_you_want_to_show_book_section');
?>

<?php if (get_field('do_you_want_to_show_book_section') == 'show') { ?>
    <div class="download-book">
        <div class="container">

            <div class="center-title">
                <?php if (!empty($bookssample_main_title)) { ?>
                    <h5><?php echo $bookssample_main_title; ?></h5>
                <?php } ?>
                <?php if (!empty($bookssample_big_title)) { ?>
                    <h2><?php echo $bookssample_big_title; ?></h2>
                <?php } ?>
                <?php if (!empty($bookssample_description)) { ?>
                    <p><?php echo $bookssample_description; ?></p>
                <?php } ?>
                <p>&nbsp;</p>
                <?php if ($bookssample_btntitle) { ?>
                    <p>
                        <a class="link-underline" href="<?php echo $bookssample_btn_link; ?>"><?php echo $bookssample_btntitle; ?></a>
                    </p>
                <?php } ?>
            </div>

            <div class="download-book__inner">
                <?php if ($book_art_content) {
                    $b = 1;

                    foreach ($book_art_content as $book_art) { ?>
                        <div class="download-book__col">
                            <div class="download-book__cell">
                                <?php if ($book_art['art_image']) { ?>
                                    <div class="download-book__art">
                                        <?php if ($book_art['book_popup_option'] == 'yes') { ?>
                                            <?php if ($book_art['book_text']) { ?>
                                                <a href="#" databook="<?php echo 'clickbook' . $b; ?>" class="bookopen">
                                                <?php } ?>
                                            <?php } ?>
                                            <?php if ($book_art['book_link_option'] == 'yes') { ?>
                                                <?php if ($book_art['book_text_for_link_button']) { ?>
                                                    <a href="<?php echo $book_art['book_link']; ?>">
                                                    <?php } ?>
                                                <?php } ?>
                                                <img src="<?php echo $book_art['art_image']; ?>" alt=".">
                                                    </a>
                                    </div>
                                <?php } ?>
                                <div class="download-book__content">
                                    <?php if ($book_art['art_title']) { ?>
                                        <h4><?php echo $book_art['art_title']; ?></h4>
                                    <?php } ?>
                                    <?php if ($book_art['art_description']) { ?>
                                        <p><?php echo $book_art['art_description']; ?></p>
                                    <?php } ?>
                                    <?php if ($book_art['art_author']) { ?>
                                        <div class="download-book__author">
                                            <?php echo $book_art['art_author']; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($book_art['book_popup_option'] == 'yes') { ?>
                                        <?php if ($book_art['book_text']) { ?>
                                            <a href="#" databook="<?php echo 'clickbook' . $b; ?>" class="link-underline bookopen"><?php echo $book_art['book_text']; ?></a>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($book_art['book_link_option'] == 'yes') { ?>
                                        <?php if ($book_art['book_text_for_link_button']) { ?>
                                            <a href="<?php echo $book_art['book_link']; ?>" class="link-underline"><?php echo $book_art['book_text_for_link_button']; ?></a>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                <?php $b++;
                    }
                } ?>

            </div>

        </div>
    </div>
<?php } ?>
<!-- End show_book_section -->

<!-- Homepage Banner Popup -->
<?php if (!empty($popup_hub_code) && $show_primary_cta == 'yes') { ?>
    <div class="globalpopup bannerpop">
        <div class="globalpopup__outer">
            <div class="globalpopup__inner">
                <i class="fa fa-times globalpopup__close bannerpop__close" aria-hidden="true"></i>
                <div class="globalpopup__wrap">
                    <div class="globalpopup__bottom">
                        <?php echo $popup_hub_code; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Homepage Secondary Banner Popup -->
<?php if (!empty($secondary_cta_popup) && $show_secondary_cta == 'yes') { ?>
    <div class="globalpopup underclick_pop">
        <div class="globalpopup__outer">
            <div class="globalpopup__inner">
                <i class="fa fa-times globalpopup__close underclick__close" aria-hidden="true"></i>
                <div class="globalpopup__wrap">
                    <div class="globalpopup__bottom">
                        <?php echo $secondary_cta_popup; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Books Form -->
<?php if ($book_art_content && $book_art['book_popup_option'] == 'yes') { ?>
    <div class="globalpopup bookspoopup">
        <div class="globalpopup__outer">
            <div class="globalpopup__inner">
                <i class="fa fa-times globalpopup__close book__close" aria-hidden="true"></i>
                <div class="globalpopup__wrap">
                    <div class="globalpopup__bottom">
                        <?php $f = 1;
                        foreach ($book_art_content as $book_art) { ?>
                            <div style="display: none;" class="<?php echo 'clickbook' . $f; ?>">
                                <?php echo $book_art['book_hubspot_form']; ?>
                            </div>
                        <?php $f++;
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php get_footer(); ?>