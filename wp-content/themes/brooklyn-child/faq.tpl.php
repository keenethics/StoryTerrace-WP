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
        
        <div class="ut-scroll-up-waypoint" data-section="section-<?php echo ut_clean_section_id($post->post_name); ?>"></div>

<?php get_footer(); ?>