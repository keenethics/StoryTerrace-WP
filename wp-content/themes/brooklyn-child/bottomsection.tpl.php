<?php
/* Template Name: Bottom Section */ 
$ut_page_skin = get_post_meta( $post->ID , 'ut_section_skin' , true);
$ut_page_class = get_post_meta( $post->ID , 'ut_section_class' , true);
$ut_get_sidebar_settings = ut_get_sidebar_settings();
get_header(); ?>
        <div class="grid-container">
        	
            <?php $grid = !empty( $ut_get_sidebar_settings ) && $ut_get_sidebar_settings['primary_sidebar'] != 'no_sidebar' && is_active_sidebar( $ut_get_sidebar_settings['primary_sidebar'] ) ? 'grid-75 tablet-grid-75 mobile-grid-100' : 'grid-100 tablet-grid-100 mobile-grid-100'; ?>
            
            <div id="primary" class="grid-parent <?php echo $grid; ?> <?php echo $ut_page_skin; ?> <?php echo $ut_page_class; ?>">
            
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'partials/content', 'page' ); ?>
			
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>

			<?php endwhile; // end of the loop. ?>
			
            </div><!-- close #primary -->
            
            <?php get_sidebar('page'); ?>
            
		</div><!-- close grid-container -->


<?php //get_template_part( 'model', 'content' ); ?>

<?php include_once( 'bottom-banner-section.php' ); ?>   
        <div class="ut-scroll-up-waypoint" data-section="section-<?php echo ut_clean_section_id($post->post_name); ?>"></div>
  <script type="text/javascript">
	 $(document).ready(function() {
		$("#t1Tab .col-md-4").slice(0, 9).show().css("display", "inline-block").last().addClass("last4");
		$("#t2Tab .col-md-4").slice(0, 9).show().css("display", "inline-block").last().addClass("last4");
		$("#t3Tab .col-md-4").slice(0, 9).show().css("display", "inline-block").last().addClass("last4");
		        $(".jscroll-next a").on('click', function (e) {
		            e.preventDefault();
		             $("#t1Tab .col-md-4:hidden").slice(0, 9).fadeIn( "slow" ).css("display", "inline-block").last().addClass("last4");
		                 var dblock = $('#t1Tab .col-md-4').filter(function() {
		                    return $(this).css('display') == 'none';
		                }).length;
		                if(0 == dblock) {
		                    $('.jscroll-next a').hide();
		                }
		        });
		        $(".jscroll-next1 a").on('click', function (e) {
		            e.preventDefault();
		             $("#t2Tab .col-md-4:hidden").slice(0, 9).fadeIn( "slow" ).css("display", "inline-block").last().addClass("last4");
		                 var dblock = $('#t2Tab .col-md-4').filter(function() {
		                    return $(this).css('display') == 'none';
		                }).length;
		              
		                if(0 == dblock) {
		                    $('.jscroll-next1 a').hide();
		                }
		        });
		        $(".jscroll-next2 a").on('click', function (e) {
		            e.preventDefault();
		             $("#t3Tab .col-md-4:hidden").slice(0, 9).fadeIn( "slow" ).css("display", "inline-block").last().addClass("last4");
		                 var dblock = $('#t3Tab .col-md-4').filter(function() {
		                    return $(this).css('display') == 'none';
		                }).length;
		               
		                if(0 == dblock) {
		                    $('.jscroll-next2 a').hide();
		                }
		        });
});

</script>
<style type="text/css">
	#t1Tab .col-md-4, #t2Tab .col-md-4, #t3Tab .col-md-4 {
		display: none;
	}
</style>      
<?php get_footer(); ?>
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