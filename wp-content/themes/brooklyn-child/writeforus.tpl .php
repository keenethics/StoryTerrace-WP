<?php
/* Template Name: Write For Us */ 
$ut_page_skin = get_post_meta( $post->ID , 'ut_section_skin' , true);
$ut_page_class = get_post_meta( $post->ID , 'ut_section_class' , true);
$ut_get_sidebar_settings = ut_get_sidebar_settings();
get_header(); ?>
		

            <?php $grid = !empty( $ut_get_sidebar_settings ) && $ut_get_sidebar_settings['primary_sidebar'] != 'no_sidebar' && is_active_sidebar( $ut_get_sidebar_settings['primary_sidebar'] ) ? 'grid-75 tablet-grid-75 mobile-grid-100' : 'grid-100 tablet-grid-100 mobile-grid-100'; ?>
            
            <div id="primary" class="grid-parent <?php echo $grid; ?> <?php echo $ut_page_skin; ?> <?php echo $ut_page_class; ?>">
	            <div class="writers-section">
	        		<div class="container">
		        		<h1 class="page-Bigtitle border-title text-center"><?php echo get_the_title(); ?></h1>
			        	<?php 
			            $rows = get_field('writers_for_us');
							if($rows) { foreach($rows as $row) { ?>
							<div class="grid-15 tablet-grid-20 mobile-grid-100 writer-grid" style="margin-top: <?php echo $row['writer_margin_for_us']; ?>px;">
								<div class="writer">
									<img src="<?php echo $row['writer_image_for_us']; ?>" width="180" height="180" alt="" class="img-card">
									<div class="bio">
										<h5><?php echo $row['writer_name_for_us']; ?><small><?php echo $row['writer_position_for_us']; ?></small></h5>
											<p><?php echo $row['writer_description_for_us']; ?></p>
										<h6><?php echo $row['writer_place_for_us']; ?></h6>
									</div>
								</div>
					        </div>
									
							<?php 	} }
			        	?>
		        	</div>
	            </div>

	            <div class="full-width-container writeUs-content">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'partials/content', 'page' ); ?>
					
						<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() )
								comments_template();
						?>

					<?php endwhile; // end of the loop. ?>
				</div>
				
            </div><!-- close #primary -->
            
            <?php get_sidebar('page'); ?>
            

	
        <div class="ut-scroll-up-waypoint" data-section="section-<?php echo ut_clean_section_id($post->post_name); ?>"></div>
        
<?php get_footer(); ?>
