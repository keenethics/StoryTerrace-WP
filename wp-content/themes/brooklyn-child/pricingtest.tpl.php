<?php
/* Template Name: Price test */ 
$ut_page_skin = get_post_meta( $post->ID , 'ut_section_skin' , true);
$ut_page_class = get_post_meta( $post->ID , 'ut_section_class' , true);
$ut_get_sidebar_settings = ut_get_sidebar_settings();
$price_main_title = get_field( "price_main_title_test" );
$price_main_description = get_field( "price_main_description_test" );
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <div class="full-width-container packages-pricing">
    <div class="grid-container">
        <?php if(!empty($price_main_title)){?>
              <h2 class="title"><?php echo $price_main_title;  ?></h2>
       <?php } ?>
       <?php if(!empty($price_main_description)) { echo $price_main_description; } ?>
        <div class="pricing-area">
             <?php if( have_rows('packages') ): ?>
                    <?php while( have_rows('packages') ): the_row(); ?>
                        <div class="grid-33 tablet-grid-33 mobile-grid-100">
                            <div class="pricing-box">
                                <div class="image-section"></div>
                                   <div class="content-section">
                                    <h1><?php the_sub_field('package_title'); ?></h1>
                                    <h3><?php the_sub_field('package_description'); ?></h3>
                                    <div class="price-list">
                                        <?php if( have_rows('package_features') ): ?>
                                            <ul>
                                            <?php while( have_rows('package_features') ): the_row(); ?>
                                                <li><?php the_sub_field('feature'); ?></li>
                                            <?php endwhile; ?>
                                            </ul>
                                        <?php endif; //if( get_sub_field('items') ): ?>
                                        <div class="gift-wrapper">Welcome Gift Box: <span><?php the_sub_field('package_welcome_gift'); ?></span></div>
                                    </div>
                                     <div class="price">from <span>$<?php the_sub_field('package_price'); ?></span></div>
                                     <a class="learn-more" href="<?php echo get_sub_field('package_select_book_link'); ?>"><?php the_sub_field('package_select_book_text'); ?></a>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; // while( has_sub_field('to-do_lists') ): ?>
            <?php endif; // if( get_field('to-do_lists') ): ?>
        </div>
    </div>
</div>


<div class="full-width-container ready-book-section" style="background-color: #C6BDBF;">
    <div class="grid-container">
        <div class="grid-100 mobile-grid-100 tablet-grid-100">
            <h2 id="layerContent">Any special requests?</h2>
            <p>If you have any questions, or need a custom package, just get<br>in touch with our team</p>
            <a href="" class="cta_button">Request Writer Match</a>
        </div>
    </div>
</div>

               
            <?php endwhile; // end of the loop. ?>
 
<div class="ut-scroll-up-waypoint" data-section="section-<?php echo ut_clean_section_id($post->post_name); ?>"></div>
        
<?php get_footer(); ?>
