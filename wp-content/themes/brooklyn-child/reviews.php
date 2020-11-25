<?php
$review_mobile_title = get_field('review_mobile_title','option');
$review_title = get_field('review_title','option');
$left_side_review = get_field('left_side_review','option');
$review_image = get_field('review_image','option');
$review_based = get_field('review_based','option');
$review_button_text = get_field('review_button_text','option');
$review_button_link = get_field('review_button_link','option');
$customer_review = get_field('customer_review','option');
$review_badge_code = get_field('review_badge_code','option');
$review_popup_code = get_field('review_popup_code','option');
?>
<div class="customer-reviews">
	<div class="customer-reviews__mobiletitle">
		<div class="container">
			<?php if(!empty($review_mobile_title)){ ?>
			  <h5><?php echo $review_mobile_title; ?></h5>
		    <?php } ?>
		</div>
	</div>
	<div class="container">
		<div class="d-flex justify-content-between">
			<div class="customer-reviews__col">
				<?php if($review_title){?>
					<h2><?php echo $review_title;?></h2>
				<?php }?>
				<div class="customer-reviews__google d-flex align-items-center">
					<!--<div class="customer-reviews__googleleft">
						<?php //if($left_side_review){?>
							<span><?php //echo $left_side_review;?></span>
						<?php //}?>
					</div>-->
					<!-- <div class="customer-reviews__googleright">
						<div class="customer-reviews__googlerighttop d-flex">
							<?php //if($review_image){?>
								<img src="<?php //echo $review_image; ?>" alt=".">
							<?php //}?>
							<?php //if($review_based){?>
								<span>
									<?php //echo $review_based;?>
								</span>
							<?php //}?>
						</div>
						<ul class="d-flex">
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
						</ul>
					</div> -->
					<?php if(!empty($review_badge_code)){ 
                             echo $review_badge_code;
                         } else {
						?>
				     	<div data-token="eaKwSLG8banRKwELYPAnECk5qN3SOfHf0jTMMhRk82i5SMsgE5" class="romw-badge"></div>
                     <script src="https://reviewsonmywebsite.com/js/embedLoader.js?id=9b3acdde2be3481c94dd" type="text/javascript"></script>
                   <?php } ?>
				</div>
				<div class="customer-reviews__link">
				   <?php if($review_button_link){?>
						<a href="<?php echo $review_button_link;?>" class="link-underline ratelink"><?php echo $review_button_text;?></a>
					<?php }?>
					<?php if(!empty($review_popup_code)){ 
                             echo $review_popup_code;
                         } else {
						?>
						<div data-token="E9X2Tzv6hMSMYrIpoisAHcRICmTdQaCGY0J1VzA5Nu3pHPfrlu" class="romw-reviews"></div> 
					<script src="https://reviewsonmywebsite.com/js/embedLoader.js?id=9b3acdde2be3481c94dd" type="text/javascript"></script>	
						<?php } ?>				
					
				</div>
			</div>
			<div class="customer-reviews__col">
				<div class="customer-sliders">
					<?php if($customer_review){?>
						<?php foreach($customer_review as $customer){?>
						<div class="customer-sliderscol">
							<p><?php echo $customer['review_content']; ?></p>
							<div class="customer__person">
								<div class="customer__personleft">
									<img src="<?php echo $customer['client_image']; ?>" alt=".">
								</div>
								<div class="customer__personright">
									<p><?php echo $customer['client_name']; ?></p>
									<?php $stars = $customer['number_of_star'];?>
									<ul>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
									</ul>
								</div>
							</div>
						</div>
					<?php }}?>
				</div>
			</div>
		</div>
	</div>
	<div class="customer-reviews__mobilelink">
		 <?php if($review_button_link){?>
						<a href="<?php echo $review_button_link;?>" class="link-underline ratelink"><?php echo $review_button_text;?></a>
					<?php }?>
					<?php if(!empty($review_popup_code)){ 
                             echo $review_popup_code;
                         } else {
						?>
						<div data-token="E9X2Tzv6hMSMYrIpoisAHcRICmTdQaCGY0J1VzA5Nu3pHPfrlu" class="romw-reviews"></div> 
					
						<?php } ?>	
	</div>
</div>