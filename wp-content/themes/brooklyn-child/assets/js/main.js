jQuery(document).ready(function() {	
	"use strict";

	// homepage scripts
	jQuery(document).ready(function(){
		jQuery(".banneropen").click(function(event) {
			event.preventDefault();
			jQuery("html").addClass("html--oh");
			jQuery(".bannerpop").fadeIn();
		});
		jQuery(".bannerpop__close").click(function() {
			jQuery("html").removeClass("html--oh");
			jQuery(".bannerpop").fadeOut();
		});

		jQuery(".underclick").click(function(event) {
			event.preventDefault();
			jQuery("html").addClass("html--oh");
			jQuery(".underclick_pop").fadeIn();
		});
		jQuery(".underclick__close").click(function() {
			jQuery("html").removeClass("html--oh");
			jQuery(".underclick_pop").fadeOut();
		});
		
		jQuery(".bookopen").click(function(event) {
			event.preventDefault();
			jQuery("html").addClass("html--oh");
			jQuery(".bookspoopup").fadeIn();
			var databook = $(this).attr('databook');
			$('.globalpopup__bottom .clickbook1, .globalpopup__bottom .clickbook2, .globalpopup__bottom .clickbook3').hide();
			$('.globalpopup__bottom .'+databook).show();
		});
		jQuery(".book__close").click(function() {
			jQuery("html").removeClass("html--oh");
			jQuery(".bookspoopup").fadeOut();
		});
	})

	// pricing scripts
	jQuery(".pricingfaq__title").click(function() {
		var thisParents = jQuery(this).parents(".pricingfaq__row");
		if( thisParents.hasClass("pricingfaq__row--active") ) {
			thisParents.find(".pricingfaq__content").slideUp();
			jQuery(this).parents(".pricingfaq__row").removeClass("pricingfaq__row--active");
		} else {
			thisParents.siblings().find(".pricingfaq__content").slideUp();
			thisParents.find(".pricingfaq__content").slideDown();
			thisParents.siblings().removeClass("pricingfaq__row--active");
			thisParents.addClass("pricingfaq__row--active");
		}
	});

	jQuery(".header__toggler").click(function() {		
		jQuery(".header__menu").slideToggle();
	});

	jQuery(".videoicon").click(function() {
		jQuery("html").addClass("html--oh");
		jQuery(".videopopup").fadeIn();
	});

	jQuery(".getbtnopen").click(function(event) {
		event.preventDefault();
		jQuery("html").addClass("html--oh");
		jQuery(".getstartpop").fadeIn();
	});

	jQuery(".videopopup__close").click(function() {
		jQuery("html").removeClass("html--oh");
		jQuery(".videopopup").fadeOut();
		jQuery(".videopopup__wrap iframe").attr('src','');
	});

	jQuery(".getstartpop__close").click(function() {
		jQuery("html").removeClass("html--oh");
		jQuery(".getstartpop").fadeOut();
	});

	if( jQuery(".brands__slidermobile").length > 0 ) {
		jQuery(".brands__slidermobile").slick({
			arrows: false,
			dots: false,
			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 5000,
			responsive: [
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }
			  ]
		});
	}

	if( window.innerWidth < 768 ) {
		if( jQuery(".customer-sliders").length > 0 ) {
			mobileCustomerSlider();
		}
	}

	jQuery(".testimonials__slider").slick({
		arrows: false,
		dots: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		responsive: [
			    {
			      breakpoint: 767,
			      settings: {
			      	dots: true,
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }
			  ]
	});
});

jQuery(window).resize(function() {

	if( window.innerWidth > 1080 ) {
		jQuery(".header__menu").removeAttr("style");
	}

	if( window.innerWidth >= 768 ) {
        if(jQuery(".customer-sliders").hasClass("slick-initialized")){
            jQuery(".customer-sliders").slick("unslick");
        }
        if(jQuery(".download-book__inner").hasClass("slick-initialized")){
            jQuery(".download-book__inner").slick("unslick");
        }
    }else{
        if(!jQuery(".customer-sliders").hasClass("slick-initialized")){
            if( jQuery(".customer-sliders").length > 0 ) {
				mobileCustomerSlider();
			}
        }
    }
});

jQuery(window).scroll(function($) {
	var sTop = jQuery(window).scrollTop();
	if( jQuery(".banner").length > 0 ) {
		var sTopNegative = -sTop;
		if( sTop > 0 ) {
			jQuery(".banner__art").css({"top" : sTopNegative * 0.20});
		}
	}
	
});

function mobiletestimonialsSlider() {	
	jQuery(".testimonials__slider").slick({
		arrows: false,
		dots: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
	});
}

function mobileCustomerSlider() {	
	jQuery(".customer-sliders").slick({
		arrows: false,
		dots: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
	});

	jQuery(".download-book__inner").slick({
		arrows: false,
		dots: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
	});
}

jQuery(document).ready(function ($) {
	// activate video popup on all pages
	activateVideoPopup();

	setTimeout(function () {
		$('.ratelink').click(function (event) {
			event.preventDefault();

			$('.romw-link')[0].click();
		});
	}, 500);

	// activate free consultation popup
	activatePopupOnClick('.js-free-consultation', '.globalpopup.free-consultation', '.free-consultation__close');

	// execute zip code script for each form
	['#zipcode', '#zipcode-bottom', '#zipcode-mobile'].forEach(function (element) {
		$(element) ? zipTrackingEvent(element) : null;
		console.log(element)
	});

	// control FAQ page accordion
	$('.accordion > li:eq(0) p').css('display','block');
	$('.accordion > li:eq(0) > a').addClass('active').next().slideDown();

	$('.accordion li > a').click(function(event) {		
		var dropDown = $(this).closest('li').find('p');

		event.preventDefault();
		$(this).closest('.accordion').find('p').not(dropDown).slideUp();

		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
		} else {
			$(this).closest('.accordion').find('a.active').removeClass('active');
			$(this).addClass('active');
		}

		dropDown.stop(false, true).slideToggle();		
	});
});
