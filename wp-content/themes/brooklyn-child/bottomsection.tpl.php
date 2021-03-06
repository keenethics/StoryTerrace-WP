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

<?php include_once( 'bottom-banner-section.php' ); ?>   
        <div class="ut-scroll-up-waypoint" data-section="section-<?php echo ut_clean_section_id($post->post_name); ?>"></div>
  <script type="text/javascript">
	 jQuery(document).ready(function($) {
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