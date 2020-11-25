<?php
$bs_title = get_field( "bs_title",get_the_ID() );
$bs_description = get_field( "bs_description",get_the_ID() );
$bs_request_button_text = get_field( "bs_request_button_text",get_the_ID() );
$bs_request_button_link = get_field( "bs_request_button_link",get_the_ID() );
$bs_backgroundimage = get_field( "bs_backgroundimage",get_the_ID() );
$bs_hubspot_form_code = get_field( "bs_hubspot_form_code",get_the_ID() );
$bs_frontimage = get_field( "bs_frontimage",get_the_ID() ); 
$bs_title_popup = get_field( "bs_title_popup",get_the_ID() );
$bs_popup_description = get_field( "bs_popup_description",get_the_ID() );
$bs_background_color = get_field( "bs_background_color",get_the_ID() );
?>
<style type="text/css">
<?php if(!empty($bs_backgroundimage)){ ?>
    .ready-book-section {
        text-align: center;
        background: url(<?php echo $bs_backgroundimage; ?>);
        background-position: center bottom;
        background-size: cover;
        padding: 40px 0 140px 0;
    }
<?php } ?>
</style>
<?php if($bs_frontimage){ ?>
<div class="full-width-container ready-book-section faq-prefooter" style="background-color: <?php if(!empty($bs_background_color)){ echo $bs_background_color; } else { echo '#C6BDBF'; }?>;">
    <div class="grid-container">
        <?php if(!empty($bs_frontimage)){ ?>
        <div class="grid-50 mobile-grid-100 tablet-grid-100 faq-footer-img">
            <img src="<?php echo $bs_frontimage; ?>" alt="books-img">
        </div>
        <?php } ?>
        <?php ?>
        <div class="grid-50 mobile-grid-100 tablet-grid-100">
            <?php if(!empty($bs_title)){ ?>
                    <h2 id="layerContent"><?php echo $bs_title; ?></h2>
            <?php } ?>
            <?php if(!empty($bs_description)){  echo $bs_description; }?>
            <?php if(!empty($bs_request_button_text)){ ?>
                <a href="#" class="cta_button" data-toggle="modal" data-target="#myModal1" type="button"><?php echo $bs_request_button_text; ?></a>
            <?php } ?>
        </div>
    </div>
</div>
<?php }else{ ?>

     <div class="full-width-container ready-book-section" style="background-color: <?php if(!empty($bs_background_color)){ echo $bs_background_color; } else { echo '#C6BDBF'; }?>;">
	    <div class="grid-container">
	        <div class="grid-100 mobile-grid-100 tablet-grid-100">
	        	<?php if(!empty($bs_title)){ ?>
	                <h2 id="layerContent"><?php echo $bs_title; ?></h2>
	            <?php } ?>
	            <?php if(!empty($bs_description)){  echo $bs_description; }?>
	            <?php if(!empty($bs_request_button_text)){ ?>
	            <a href="#" class="cta_button" data-toggle="modal" data-target="#myModal1" type="button"><?php echo $bs_request_button_text; ?></a>
	            <?php } ?>
	        </div>
	    </div>
	</div>


<?php } ?>
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content contactRight bottom-popup">
          <div class="modal-body">
            <h2 class="title"><?php if(!empty($bs_title_popup)){ echo $bs_title_popup; } else { ?>Request Writer Match<?php } ?></h2>
           <?php if(!empty($bs_popup_description)){ echo $bs_popup_description; } else { ?> <p>Our biography packages start from £1350. Submit your details to request a match with one of our writers. </p>
           <?php } ?>
            <div class="popup-form">
                <?php if(!empty($bs_hubspot_form_code)){ echo $bs_hubspot_form_code; } else { ?>
                   <?php echo do_shortcode('[contact-form-7 id="36659" title="Request Writer Match - Demo"]'); 
                } ?>
            </div>
          </div>
        </div>
      </div>
    </div>