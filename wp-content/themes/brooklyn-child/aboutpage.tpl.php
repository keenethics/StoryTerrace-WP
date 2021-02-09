<?php
/* Template Name: About Page */ 
$ut_page_skin = get_post_meta( $post->ID , 'ut_section_skin' , true);
$ut_page_class = get_post_meta( $post->ID , 'ut_section_class' , true);
$ut_get_sidebar_settings = ut_get_sidebar_settings();
$inmedia_main_title = get_field("inmedia_main_title");
$inmedia_main_description = get_field("inmedia_main_description");
$inmedia_main_button_text = get_field("inmedia_main_button_text");
$inmedia_main_button_link = get_field("inmedia_main_button_link");
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
		
		<div class="full-width-container aboutMedia" id="in-the-media">
		 <div class="grid-container">
		        <div class="inmedia">
		           <?php if(!empty($inmedia_main_title)){ ?>
		        	    <h1 class="page-Bigtitle border-title"><?php echo $inmedia_main_title; ?></h1>
		           <?php } ?>
		            <div class="smallDesc"><?php if(!empty($inmedia_main_description)){ echo $inmedia_main_description; } ?></div>
		            <?php 
						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						$args = array(
						  'post_type'   => 'inthemedia',
						  'post_status' => 'publish',
						  'posts_per_page' => 6,
						  'paged' => $paged,
						  'order'   => 'DESC'
						 );
						 
						$inthemedia = new WP_Query( $args );
						if( $inthemedia->have_posts() ) :
						?>
					 	<div class="medialist">
						    <?php
						      while( $inthemedia->have_posts() ) :
						        $inthemedia->the_post();
						        $inthemedia_custom_link = get_field( "inthemedia_custom_link",get_the_ID() );
						        $inthemedia_custom_date = get_field( "inthemedia_custom_date",get_the_ID() );
						        ?>
						        <div class="mediablock">
								    <a target="_blank" href="<?php echo $inthemedia_custom_link; ?>">
										<?php echo get_the_post_thumbnail(); ?>
										<h3><?php echo get_the_title(); ?></h3>
										<div class="media-date"><?php echo $inthemedia_custom_date; ?></div>
													 	</a>
								</div> 
						        <?php
						      endwhile;
						    ?>
						  	<div class="load-more-block">
						        <div class="jscroll-next"><?php next_posts_link( 'Load More', $inthemedia->max_num_pages) ?></div>
							</div>
						</div>
						<?php
						wp_reset_postdata();
						else :
						  esc_html_e( 'No In The Media Found', 'storyterrace' );
						endif;
						?>
		           
		        </div>
		 </div>
		</div>
		<div class="ut-scroll-up-waypoint" data-section="section-<?php echo ut_clean_section_id($post->post_name); ?>"></div>  
		
<?php get_footer(); ?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.jscroll.min.js"></script>
<script type="text/javascript">
	var $jq = jQuery.noConflict();
$jq(document).ready(function() {
	$jq('.inmedia').jscroll({
	    nextSelector: '.jscroll-next a',
	    contentSelector: '.medialist',
	    autoTrigger: false
	});
});
</script>
<style type="text/css">
.medialist {
   display: -webkit-box;
   display: -ms-flexbox;
   display: flex;
   -ms-flex-wrap: wrap;
       flex-wrap: wrap;
   -webkit-box-pack: start;
       -ms-flex-pack: start;
           justify-content: flex-start;
}
</style>