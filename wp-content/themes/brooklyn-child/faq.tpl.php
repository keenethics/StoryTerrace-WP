<?php
/* Template Name: FAQ Page */ 
$ut_page_skin = get_post_meta( $post->ID , 'ut_section_skin' , true);
$ut_page_class = get_post_meta( $post->ID , 'ut_section_class' , true);
$ut_get_sidebar_settings = ut_get_sidebar_settings();
get_header(); ?>		
        <div class="grid-container">
        	
            <?php $grid = !empty( $ut_get_sidebar_settings ) && $ut_get_sidebar_settings['primary_sidebar'] != 'no_sidebar' && is_active_sidebar( $ut_get_sidebar_settings['primary_sidebar'] ) ? 'grid-75 tablet-grid-75 mobile-grid-100' : 'grid-100 tablet-grid-100 mobile-grid-100'; ?>
            
          <div class="faq-container">
            <?php 
				if( have_rows('faq_section') ):
					while( have_rows('faq_section') ): the_row(); ?>
						<div class="faq-accordion">
							<h3><?php the_sub_field('faq_section_title'); ?></h3>
							<?php 

							// check for rows (sub repeater)
							if( have_rows('faq_questions') ): ?>
								<ul class="accordion">
								<?php 
								while( have_rows('faq_questions') ): the_row();
									?>
									<li>
										<a><?php the_sub_field('question_title_faq'); ?></a>
										<p><?php the_sub_field('question_description_faq'); ?></p>
										</li>
								<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>	

					<?php endwhile;  ?>
				<?php endif; ?>
        </div>
		</div><!-- close grid-container -->
 <?php //get_template_part( 'model', 'content' ); ?>
        <div class="ut-scroll-up-waypoint" data-section="section-<?php echo ut_clean_section_id($post->post_name); ?>"></div>
        <?php //include_once( 'bottom-banner-section.php' ); ?>   
<?php get_footer(); ?>
<script type="text/javascript">
	(function($) {
		$('.accordion > li:eq(0) p').css('display','block');
       $('.accordion > li:eq(0) a').addClass('active').next().slideDown();

    $('.accordion a').click(function(j) {
        var dropDown = $(this).closest('li').find('p');

        $(this).closest('.accordion').find('p').not(dropDown).slideUp();

        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).closest('.accordion').find('a.active').removeClass('active');
            $(this).addClass('active');
        }

        dropDown.stop(false, true).slideToggle();

        j.preventDefault();
    });
})(jQuery);
</script>
<style type="text/css">
	.request {
    position: relative;
    background-image: url(../images/request-bg.jpg);
    background-position: center center;
    background-size: cover;
    padding: 86px 0;
}

.request::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: rgba(72, 72, 72, 0.488);
}

.request__inner {
    position: relative;
    z-index: 9;
    text-align: center;
    max-width: 900px;
    width: 100%;
}

.request__inner * {
    color: #fff !important;
}

.request__inner img {
    margin-bottom: 43px;
}

.request__inner h5 {
    text-transform: uppercase;
}

.request__inner h2 {
    margin: 32px 0;
}

.request__inner p {
    font-size: 21px;
    line-height: 1.6;
}

.request__link {
    margin-top: 50px;
}

.request__link a {  
    padding: 26px 52px;
    font-weight: 500;
    background-color: #ED5243;
    color: #fff;
    text-align: center;
    font-size: 14px;
    letter-spacing: 2px;
    font-family: 'Gotham-Medium' !important;
    text-transform: uppercase;
}

.request__link a:hover {
    background-color: #0C1B1E;
}
.request h2 {
    font-size: 56px;
}
.request .d-flex.justify-content-center {
    justify-content: center!important;
}
.request h5 {
    font-size: 17px;
    letter-spacing: 0.3px;
}
/* Responsive */
@media only screen and (max-width: 1600px) {

	 .request__inner p {
        font-size: 18px;
        line-height: 1.5;
    }
    .request h2 {
    font-size: 46px;
}
}
@media only screen and (max-width: 1280px) {
	 .request__inner p {
        font-size: 18px;
    }
}
@media only screen and (max-width: 1080px) {
	   .request__inner img {
        margin-bottom: 23px;
    }
    .request__inner h2 {
        margin: 12px 0 17px;
    }
    .request__link {
        margin-top: 30px;
    }
    .request__link a {
        padding: 20px 32px;
    }
    .request h2 {
    font-size: 36px;
}
}
@media only screen and (max-width: 767px) {

	.request {
        padding: 40px 0;
    }
    .request__inner p {
        font-size: 14px;
    }
    .request__link a {
        font-size: 11px;
        letter-spacing: 1.2px;
        padding: 16px 24px;
    }
    .request h2 {
    font-size: 23px;
    line-height: 1.2;
}
.request h5 {
        font-size: 14px;
        margin-top: 0;
    margin-bottom: 10px;
    font-weight: 500;
    line-height: 1.1;
    color: #0C1B1E;
    font-family: 'Gotham-Medium' !important;
    }
}
</style>