/*!
 * Global assistant functions
 * Declare function in global scope with window
 */

jQuery(document).ready(function ($) {
    "use strict";

    // activate video pupup and pass video src
    window.activateVideoPopup = function(ctaButton, attribute) {
		ctaButton = ctaButton || '.videoicon';
		attribute = attribute || 'vidurl';

		$(ctaButton).click(function () {
			var videoLink = $(this).attr(attribute);
	
			if (videoLink) {
				$('.videopopup__wrap iframe').attr('src', videoLink);
			}
		});
	}

    // video popup activate and deactivate on click 
    window.activatePopupOnClick = function(buttonSelector, popupSelector, closeSelector) {
		$(buttonSelector).click(function(event) {
			event.preventDefault();
			$("html").addClass("html--oh");
			$(popupSelector).fadeIn();
		});
        
		$(closeSelector).click(function() {
			$("html").removeClass("html--oh");
			$(popupSelector).fadeOut();
		});
	}

	// ZIP tracking function event
	window.zipTrackingEvent = function(formSelector, velueSelector) {
		velueSelector = velueSelector || '.zipc';

		$(formSelector).submit(function(event) {
			event.preventDefault();
			var zipValue = $(formSelector).find(velueSelector).val() || '';
			var redirectPage = $(formSelector).data('redirect') || '';
			var referrerLocation = document.location.pathname === '/' ? 'USHomepage' : window.location.pathname;

			window.location = redirectPage + '/?zip=' + zipValue + '&page=' + referrerLocation;
		});
	}
});