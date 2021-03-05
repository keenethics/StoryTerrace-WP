<?php
/* Template Name: Team Page */

$ut_page_skin = get_post_meta($post->ID, 'ut_section_skin', true);
$ut_page_class = get_post_meta($post->ID, 'ut_section_class', true);
$ut_get_sidebar_settings = ut_get_sidebar_settings();
$grid = !empty($ut_get_sidebar_settings) && $ut_get_sidebar_settings['primary_sidebar'] !== 'no_sidebar' && is_active_sidebar($ut_get_sidebar_settings['primary_sidebar']) ? 'grid-75 tablet-grid-75 mobile-grid-100' : 'grid-100 tablet-grid-100 mobile-grid-100';

// global $sitepress;
// $lang='en-GB';
// $sitepress->switch_lang($lang);

$query_args = array(
	'post_type' => 'team',
	'post_status' => 'publish',
	'order' => 'ASC',
	'orderby' => 'menu_order',
	'suppress_filters' => true
);

// The Query
$the_query = new WP_Query($query_args);

get_header(); ?>

<div class="grid-container">

	<div id="primary" class="grid-parent <?php echo $grid; ?> <?php echo $ut_page_skin; ?> <?php echo $ut_page_class; ?>">

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="grid-100 mobile-grid-100 tablet-grid-100">
				<div class="entry-content clearfix">
					<div class="the-team-wrapper writer-tabs-group">
						<div class="tab-pane">

							<?php if ($the_query->have_posts()) {
								while ($the_query->have_posts()) {
									$the_query->the_post();
									var_dump($the_query);
									get_template_part('partials/content', 'team');
								}

								/* Restore original Post Data */
								wp_reset_postdata();
							} else {
								get_template_part('partials/content', 'none');
							}

							// If comments are open or we have at least one comment, load up the comment template
							if (comments_open() || '0' != get_comments_number())
								comments_template();
							?>

						</div><!-- close .tab-pane -->

					</div><!-- close .the-team-wrapper -->

				</div><!-- close .entry-content -->

			</div><!-- close .grid-100 -->

		</div><!-- close #post -->

	</div><!-- close #primary -->

	<?php get_sidebar('page'); ?>

</div><!-- close grid-container -->

<div class="ut-scroll-up-waypoint" data-section="section-<?php echo ut_clean_section_id($post->post_name); ?>"></div>
<?php get_footer(); ?>