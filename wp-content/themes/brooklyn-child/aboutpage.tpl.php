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

	<style type="text/css">
		.request{
		    position: relative;
		    background-image: url(//storyterrace.com/wp-content/themes/brooklyn-child/assets/css/../images/request-bg.jpg);
		    background-position: center center;
		    background-size: cover;
		    padding: 86px 0;
		    z-index: 1;
		}
		.request:before{
		    content: "";
		    position: absolute;
		    top: 0;
		    right: 0;
		    bottom: 0;
		    left: 0;
		    background-color: rgba(72,72,72,.488);
		    z-index: -1;
		}
		.request .justify-content-center {
		    -ms-flex-pack: center!important;
		    justify-content: center!important;
		}
		.request__inner {
		    position: relative;
		    z-index: 9;
		    text-align: center;
		    max-width: 900px;
		    width: 100%;
		}
		.request__inner img {
		    margin-bottom: 43px;
		}
		.request__inner * {
		    color: #fff!important;
		}
		.request__inner h5 {
			font-size: 17px;
			letter-spacing: .3px;
		    text-transform: uppercase;
			margin-top: 0;
			margin-bottom: 10px;
			font-weight: 500;
			line-height: 1.1;
			font-family: Gotham-Medium !important;
		}
		.request__inner h2 {
			font-size: 56px;
		    margin: 32px 0;
		}
		.request__inner p {
			max-width: 650px;
    		margin: auto;
		    font-size: 21px;
		    line-height: 1.6;
		}
		@media only screen and (max-width: 1280px){
			.request__inner p {
			    font-size: 18px;
			}
		}
		@media only screen and (max-width: 1080px){
			.request__inner img {
			    margin-bottom: 23px;
			}
			.request__inner h5 {
				font-size: 15px;
				line-height: 1.3;
			}
			.request__inner h2 {
				font-size: 36px;
			    margin: 12px 0 17px;
			}
		}
		@media (max-width: 767px){
			.request {
			    padding: 40px 0;
			}
			.request__inner h5 {
			    font-size: 14px;
			}
			.request__inner h2{
			    font-size: 23px;
			    line-height: 1.2;
			}
			.request__inner p {
		    	font-size: 14px;
			}
		}
	</style>

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
						  esc_html_e( 'No In The Media Found', 'text-domain' );
						endif;
						?>
		           
		        </div>
		 </div>
		</div>


		<?php //get_template_part( 'model', 'content' ); ?>
		<?php //get_template_part( 'common', 'banner' ); ?>
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