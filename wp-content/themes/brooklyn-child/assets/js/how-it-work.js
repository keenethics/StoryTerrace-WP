/*!
 * How It Works page specific scripts
 */

jQuery(function ($) {
    var $ctaButtonElement = $('.top-banner .videoicon');

    // activate vido popup for certain query paramater from email
    if (window.location.search.includes('video=active')) {
        $ctaButtonElement.trigger('click');
    }
});