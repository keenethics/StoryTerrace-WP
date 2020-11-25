<?php
/* Template Name: Contact Page */ 
$ut_page_skin = get_post_meta( $post->ID , 'ut_section_skin' , true);
$ut_page_class = get_post_meta( $post->ID , 'ut_section_class' , true);
$ut_get_sidebar_settings = ut_get_sidebar_settings();
$contact_main_title = get_field( "contact_main_title",get_the_ID() );
$form_code_hubspot = get_field( "form_code_hubspot",get_the_ID() );
$contact_address = get_field( "contact_address",get_the_ID() );
$contact_email = get_field( "contact_email",get_the_ID() );
$contact_phone_number = get_field( "contact_phone_number",get_the_ID() );
$contact_location_title = get_field( "contact_location_title",get_the_ID() );
$media_inquiries_title = get_field( "media_inquiries_title",get_the_ID() );
$media_inquiries_email = get_field( "media_inquiries_email",get_the_ID() );
get_header(); ?>
		<div class="contact-pageContent">
	<div class="contactContent-wrapper">
		<?php if(!empty($contact_main_title)){ ?>
		    <h1 class="page-Bigtitle border-title"><?php echo $contact_main_title; ?></h1>
		<?php } ?>
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-6 contactLeft">
				<?php if(!empty($contact_location_title)){ ?>
				      <h2><?php echo $contact_location_title; ?></h2>
				<?php } ?>      
				<address>
					 <?php if(!empty($contact_address)){ echo $contact_address; }?>
				</address>
				<div class="contact-info">
					<?php if(!empty($contact_phone_number)){ ?>
					       <a class="ctcphone" href="tel:<?php echo $contact_phone_number; ?>"><?php echo $contact_phone_number; ?></a>
					<?php } ?>
					<?php if(!empty($contact_email)){ ?>
					      <a class="ctcemail" href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a>
					<?php } ?>
					<?php if(!empty($media_inquiries_email)){ ?>
						<div class="contact-info__media">
							<?php if(!empty($media_inquiries_title)){ ?>
						  		<h4><?php echo $media_inquiries_title; ?></h4>
						  	<?php } ?>
					      	<a class="ctcemail" href="mailto:<?php echo $media_inquiries_email; ?>"><?php echo $media_inquiries_email; ?></a>
						</div>
					<?php } ?>

				</div>
				<ul class="footer-social-media">
					<?php  $rows = get_field('contact_social_media');
						if($rows){ foreach($rows as $row) { ?>
						<li><a href="<?php  echo $row['social_link']; ?>"><img src="<?php  echo $row['social_image']; ?>" alt="facebook"></a></li>
					     <?php } 
				     } ?>
				</ul>
			</div>
			<div class="col-xs-12 col-md-7 col-lg-6 contactRight">
				<div id="hubspotContactContainer">
					<?php if(!empty($form_code_hubspot)){ echo $form_code_hubspot; }?>
				</div>
			</div>
		</div>
	</div>
</div>
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

        <div class="ut-scroll-up-waypoint" data-section="section-<?php echo ut_clean_section_id($post->post_name); ?>"></div>
        
<?php get_footer(); ?>