<?php
/* Template Name: Testimonials Page */ 
get_header(); 
//Top Section 
$top_main_title = get_field('top_main_title');
$top_big_title = get_field('top_big_title');
$top_description_text = get_field('top_description_text');
?>   

    <div class="blank-banner">
        <div class="container">
            <div class="blank-banner__inner">
                <div class="blank-banner__col">
                    <div class="center-title">
                        <?php if(!empty($top_main_title)){ ?>
                            <h5><?php echo $top_main_title; ?></h5>
                        <?php } ?>
                        <?php if(!empty($top_big_title)){ ?>
                            <h2><?php echo $top_big_title; ?></h2>
                        <?php } ?>
                        <?php if(!empty($top_description_text)){ ?>
                            <p><?php echo $top_description_text; ?></p>
                        <?php } ?>                      
                    </div>
                </div>
            </div>
        </div>
    </div>      
    


    <div class="process-step process-step--testimonials">
        <div class="container">
           <?php 
                    $rows = get_field('testimonials_list');
                     if($rows)
                        {
                          foreach($rows as $row)
                           {  ?>
                            <div class="process-step__col">                                 
                                <div class="process-step__content">
                                    <div class="process-step__contentin">
                                        <div class="process-step__contenttest">
                                            <h3><?php echo $row['title']; ?></h3>
                                            <div class="process-step__time"><?php echo $row['time']; ?></div>
                                            <p><?php echo $row['descripeion']; ?></p>
                                            <div class="process-step__author">
                                                <?php echo $row['mobile_name']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="process-step__art">
                                    <div class="process-step__artin">
                                        <img src="<?php echo $row['image']['url']; ?>" alt="<?php echo $row['image']['alt']; ?>">
                                        <?php if(!empty($row['video_option']=='yes')) {?>
                                                <div class="videoicon" vidurl="<?php echo $row['video_link']; ?>">
                                                    <i class="fa fa-play" aria-hidden="true"></i>
                                                </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="process-step__mobiletop">
                                    <h3><?php echo $row['title']; ?></h3>
                                    <div class="process-step__time"><?php echo $row['time']; ?></div>
                                </div>
                            </div>  
                    <?php  }
                        }
            ?>
        </div>
    </div>

    <?php include_once('reviews.php');?>
    <?php include_once( 'bottom-banner-section.php' ); ?> 
<?php get_footer(); ?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('body').removeClass('testimonials');
    })
</script>