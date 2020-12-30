<?php
/* Template Name: How it Works */ 
get_header(); 
//Banner Section
$banner_title = get_field('banner_title');
$banner_big_title = get_field('banner_big_title');
$banner_description = get_field('banner_description');
$banner_video_text = get_field('banner_video_text');
$banner_video_link = get_field('banner_video_link');
// Steps Section
$steps_main_title = get_field('steps_main_title');
//End Section
$end_large_text = get_field('end_large_text');
$end_designed_text = get_field('end_designed_text');
?>   
    <div class="top-banner">
        <div class="container">
            <div class="top-banner__inner">
                <div class="top-banner__col">
                    <div class="center-title">
                        <?php if(!empty($banner_title)){ ?>
                              <h5><?php echo $banner_title; ?></h5>
                        <?php } ?>
                        <?php if(!empty($banner_big_title)){ ?>
                              <h2><?php echo $banner_big_title; ?></h2>
                        <?php } ?>
                        <?php if(!empty($banner_description)){ ?>
                              <p><?php echo $banner_description; ?></p>
                        <?php } ?>
                        <div class="center-title__video">
                            <div class="center-title__videoin">
                                <div class="videoicon" vidurl="<?php echo $banner_video_link; ?>">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                </div>
                                <?php if(!empty($banner_video_text)){ ?>
                                   <h6><?php echo $banner_video_text; ?></h6>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>      
    

    <div class="process-title">
        <div class="container">
            <div class="center-title">
                <?php if(!empty($steps_main_title)){ ?>
                        <h2 class="less"><?php echo $steps_main_title; ?></h2>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="process-step">
        <div class="container">
            <?php 
                    $rows = get_field('steps_list');
                     if($rows)
                        {
                          foreach($rows as $row)
                           {  ?>
                            <div class="process-step__col">
                                <div class="process-step__art">
                                    <div class="process-step__artin">
                                        <img src="<?php echo $row['step_image']['url']; ?>" alt="<?php echo $row['step_image']['alt']; ?>">
                                        <?php if(!empty($row['step_video'] == 'yes')){ ?>
                                            <div class="videoicon" vidurl="<?php echo $row['step_video_link']; ?>">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </div>
                                        <?php } ?>  
                                    </div>
                                </div>
                                <div class="process-step__content">
                                    <div class="process-step__contentin">
                                        <div class="process-step__count">
                                            <span><?php echo $row['step_number']; ?></span>
                                        </div>
                                        <div class="process-step__info">
                                            <h3><?php echo $row['step_title']; ?></h3>
                                            <p><?php echo $row['step_description']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php  }
                        }
                         ?>

        </div>
    </div>

    <div class="stress-free">
        <div class="container">
            <div class="center-title">
                <?php if(!empty($end_large_text)){ ?>
                     <h3 class="large"><?php echo $end_large_text; ?></h3>
                <?php } ?>
                <?php if(!empty($end_designed_text)){ ?>
                <div class="stress-free__greeting">
                    <?php echo $end_designed_text; ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    
<?php get_footer(); ?>
