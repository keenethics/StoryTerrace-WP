<?php
/* Template Name: Press Page */ 
get_header();

/*Inquiry Section*/
$text_inquiry = get_field('text_inquiry');
$email_inquiry = get_field('email_inquiry');
$press_materials = get_field('press_materials');
$fact_sheet = get_field('fact_sheet');
$press_materials_new = get_field('press_materials_new');
$logos = get_field('logos');
?>
<div class="pressbanner">
  <div class="pagecenter">
    <div class="pressbanner_inner">
      <h2><?php the_title(); ?></h2>
    </div>
  </div>
</div>

<div class="pressinquiries">
  <div class="pagecenter">
    <div class="pressinquiries__inner">
      <div class="pressinquiries__col pressinquiries__col--left">
        <?php if(!empty($text_inquiry)){ ?>
        <h5><?php echo $text_inquiry; ?> <?php echo '<a href="mailto:'.$email_inquiry.'">'.$email_inquiry.'</a>'; ?></h5>
          <?php } ?>
      </div>
      <div class="pressinquiries__col pressinquiries__col--right">
        <?php if($press_materials){ ?>
            <?php if($press_materials['open_link_in_new_window_press'] == 1){ ?>
              <h5><a href="<?php echo $press_materials['press_materials_url']; ?>" target="_blank"><?php echo $press_materials['press_materials_label']; ?></a></h5>
            <?php }else{ ?>
              <h5><a href="<?php echo $press_materials['press_materials_url']; ?>"><?php echo $press_materials['press_materials_label']; ?></a></h5>
            <?php } ?>
          <?php } ?>
        <ul>
          <?php if($fact_sheet){ ?>
            <li>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/donwload.svg" alt="">
              <?php if($fact_sheet['open_link_in_new_window_fact'] == 1){ ?>
                <a href="<?php echo $fact_sheet['fact_sheet_url']; ?>" target="_blank"><?php echo $fact_sheet['fact_sheet_label']; ?></a>
              <?php }else{ ?>
                <a href="<?php echo $fact_sheet['fact_sheet_url']; ?>"><?php echo $fact_sheet['fact_sheet_label']; ?></a>
              <?php } ?>
            </li>
          <?php } ?>
          <?php if($press_materials_new){ ?>
            <li>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/donwload.svg" alt="">
              <?php if($press_materials_new['open_link_in_new_window_press_new'] == 1){ ?>
                <a href="<?php echo $press_materials_new['press_materials_url_new']; ?>" target="_blank"><?php echo $press_materials_new['press_materials_label_new']; ?></a>
              <?php }else{ ?>
                <a href="<?php echo $press_materials_new['press_materials_url_new']; ?>"><?php echo $press_materials_new['press_materials_label_new']; ?></a>
              <?php } ?>
            </li>
          <?php } ?>
          <?php if($logos){ ?>
            <li>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/donwload.svg" alt="">
              <?php if($logos['open_link_in_new_window_logo'] == 1){ ?>
                <a href="<?php echo $logos['logos_url']; ?>" target="_blank"><?php echo $logos['logos_label']; ?></a>
              <?php }else{ ?>
                <a href="<?php echo $logos['logos_url']; ?>"><?php echo $logos['logos_label']; ?></a>
              <?php } ?>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php
$banner_image = get_field('banner_image');
$banner_title = get_field('banner_title');
$banner_category = get_field('banner_category');
$open_link_in_new_window_banner = get_field('open_link_in_new_window_banner');
$banner_link = get_field('banner_link');
$banner_logo = get_field('banner_logo');
$banner_author_name = get_field('banner_author_name');
$banner_time = get_field('banner_time');
?>
<div class="presspostbanner">
  <div class="pagecenter">
    <div class="presspostbanner__inner">
      <div class="presspostbanner__image">
        <?php if(!empty($banner_image)){ ?>
        <img src="<?php echo $banner_image; ?>" alt="<?php echo $banner_title; ?>">
         <?php } ?>
      </div>
      <div class="presspostbanner__content">
        <div class="presspostbanner__contentleft">
          <?php if(!empty($banner_category)){ ?>
               <h5><?php echo $banner_category; ?></h5>
              <?php } ?>
          <?php if(!empty($banner_title)){ ?>
            <?php if($open_link_in_new_window_banner == 1){ ?>
              <h2><a href="<?php echo $banner_link; ?>" target="_blank"><?php echo $banner_title; ?></a></h2>
            <?php }else{ ?>
              <h2><a href="<?php echo $banner_link; ?>"><?php echo $banner_title; ?></a></h2>
            <?php } ?>
          <?php } ?>   
        </div>
        <div class="presspostbanner__contentright">
          <div class="presspostbanner__logo">
            <?php if(!empty($banner_logo)){ ?>
              <img src="<?php echo $banner_logo; ?>" alt="<?php echo $banner_title; ?>">
            <?php } ?>  
          </div>
          <div class="presspostbannerinfo">
            <?php if(!empty($banner_author_name)){ ?>
                  <p><?php echo "by ".$banner_author_name; ?></p>
              <?php } ?>
              <?php if(!empty($banner_time)){ ?>
                  <div class="presspostbanner__time"><?php echo $banner_time; ?></div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php

?>
<div class="pressblog">
  <div class="pagecenter">
    <div class="pressblog__inner">
      <?php 

        $rows = get_field('featured_posts');
        if($rows)
        {
          foreach($rows as $row)
          { ?>
            <div class="pressblog__col">
              <div class="pressblog__cell">
                <div class="pressblog__image">
                  <img src="<?php echo $row['featured_posts_image']; ?>" alt="<?php echo $featured_posts_title; ?>">
                  <?php if($row['select_link_posts'] == 'video'){ ?>
                    <div class="pressblog__videoicon" customtext="<?php echo $row['custom_title_featured']; ?>" customlink="<?php echo $row['link_featured']; ?>" titleforpopup="<?php echo $row['featured_posts_title']; ?>" videolink="https://www.youtube.com/embed/<?php echo $row['featured_posts_video_link']; ?>?autoplay=1">
                      <i class="fa fa-play" aria-hidden="true"></i>
                    </div>
                  <?php } ?>  
                </div>
                <div class="pressblog__content">
                  <div class="pressblog__info">
                    <h6><?php echo $row['featured_posts_category']; ?></h6>
                    <h3>
                      <?php if($row['open_link_in_new_window_featured'] == 1){ ?>
                          <?php if($row['featured_posts_link']){ ?>
                            <a href="<?php echo $row['featured_posts_link']; ?>" target="_blank"><?php echo $row['featured_posts_title']; ?></a>
                          <?php }else{ ?>
                            <a href="<?php echo $row['link_featured']; ?>" target="_blank"><?php echo $row['featured_posts_title']; ?></a>
                          <?php } ?>
                      <?php }else{ ?>
                          <?php if($row['featured_posts_link']){ ?>
                            <a href="<?php echo $row['featured_posts_link']; ?>"><?php echo $row['featured_posts_title']; ?></a>
                          <?php }else{ ?>
                            <a href="<?php echo $row['link_featured']; ?>"><?php echo $row['featured_posts_title']; ?></a>
                          <?php } ?>
                      <?php } ?>
                    </h3>
                  </div>
                </div>
                <div class="pressblog__logo">
                  <img src="<?php echo $row['featured_posts_logo']; ?>" alt="<?php echo $row['$featured_posts_title']; ?>">
                </div>
              </div>
            </div>
            
          <?php }
        } ?>
    </div>

    <div class="pressquotes">
      <div class="pressquotes__slider">
        <?php 

        $rows = get_field('quotes');
        if($rows)
        {
          foreach($rows as $row)
          { ?>
            <div>
              <div class="pressquotes__col">
                <p><?php echo $row['quote_text']; ?></p>
                <div class="pressquotes__logo">
                  <img src="<?php echo $row['quote_logo']; ?>" alt="<?php echo $row['quote_text']; ?>">
                </div>
              </div>
            </div>
          <?php }
        } ?>
      </div>
    </div>
  </div>
</div>



<div class="presspost">
     <div class="pagecenter">
        <div class="presspost__top">
          <div class="presspost__topleft">
            <button onclick="FWP.reset()">View All</button>
            <?php echo do_shortcode('[facetwp facet="category_media_search"]'); ?>
          </div>
          <div class="presspost__topright">
            <?php echo do_shortcode('[facetwp facet="category_search_input_media"]'); ?>
          </div>
        </div>
            
            <div class="presspost__inner">
              <div class="presspost__lists">
                <?php 
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $args = array(
              'post_type'   => 'inthemedia',
              'post_status' => 'publish',
              'posts_per_page' => 10,
              'paged' => $paged,
              'order'   => 'DESC',
              'facetwp' => true,
             );
             
            $inthemedia = new WP_Query( $args );
            if( $inthemedia->have_posts() ) :
            ?>
            <div class="presspost__wrap">
                <?php
                  while( $inthemedia->have_posts() ) :
                    $inthemedia->the_post();
                    $inthemedia_custom_link = get_field( "inthemedia_custom_link",get_the_ID() );
                    $inthemedia_custom_date = get_field( "inthemedia_custom_date",get_the_ID() );
                    ?>
                    <div class="presspost__col">
                      <div class="presspost__content">
                        <a target="_blank" href="<?php echo $inthemedia_custom_link; ?>">
                           <h3><?php echo get_the_title(); ?></h3>
                         </a>
                        <div class="presspost__date">
                          <?php echo $inthemedia_custom_date; ?>                          
                        </div>
                      </div>
                      <div class="presspost__image">
                        <?php echo get_the_post_thumbnail(); ?>
                      </div>                        
                  </div> 
                    <?php
                  endwhile;
                ?>
               
            </div>
            <?php
            wp_reset_postdata();
            else :
              esc_html_e( 'No In The Media Found', 'text-domain' );
            endif;
            ?>
               <div style="display: none;" class="jscroll-next"><?php next_posts_link( 'Load More', $inthemedia->max_num_pages) ?></div>
           </div>
            </div>
             <div class="presspost__loadmore load-more-block">
                <div class="jscroll-nexts"><a href="#"><?php echo 'Load More'; ?></a></div>
            </div>
     </div>
</div>

<div class="presspopup">
  <div class="presspopup__wrap">
    <div class="presspopup__inner">
      <div class="presspopup__close">       
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cross.svg" alt=".">
      </div>
      <div class="presspopup__top">
        <div class="presspopup__topleft">
          <div class="presspopup__topleftinner">
            <h5>Brought To Book – Can Platform Tech Help Us All To <br>Tell Our Life Stories?</h5>
          </div>
        </div>
        <div class="presspopup__topright">
          <p>Check it at</p>
          <a class="customlinks" href="/press/"><h6>New york times</h6></a>
        </div>
      </div>
      <div class="presspopup__video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/cpsa_a6iF6U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>  

<script>
  jQuery(document).ready(function() {
    jQuery(".pressquotes__slider").slick({
      arrows: false,
      dots: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
    });

    jQuery(".pressblog__videoicon").on("click" , function() {
      jQuery("body").addClass("oh");
      jQuery(".presspopup").fadeIn();
      var titleforpopup = jQuery(this).attr('titleforpopup');
      var videolink = jQuery(this).attr('videolink');
      var customtext = jQuery(this).attr('customtext');
      var customlink = jQuery(this).attr('customlink');
      jQuery('.presspopup__topleftinner h5').text(titleforpopup);
      jQuery('.presspopup__video iframe').attr('src',videolink);
      jQuery('.presspopup__topright h6').text(customtext);
      jQuery('.presspopup__topright .customlinks').attr('href',customlink);
    });

    jQuery(".presspopup__close").on("click" , function() {
      jQuery("body").removeClass("oh");
      jQuery(".presspopup").fadeOut();
      jQuery('.presspopup__video iframe').attr('src','');
    });

  });
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<script>
jQuery(document).ready(function($) {
  $('.presspost').jscroll({
      nextSelector: '.jscroll-next a',
      contentSelector: '.presspost__lists',
      autoTrigger: false,
      callback: neueFade,
  });
  $('.jscroll-nexts').click(function(event){
     event.preventDefault();
    $('.jscroll-next a')[0].click();
  });
  function neueFade() {
    var newadded = $('.jscroll-added').html();
    $('.presspost__inner').append(newadded);
    $('.jscroll-added').remove();
  }
});
</script>

<?php  get_footer(); ?>