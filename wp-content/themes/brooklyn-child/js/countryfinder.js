/*!
 * JavaScript Cookie v2.1.4
 * https://github.com/js-cookie/js-cookie
 *
 * Copyright 2006, 2015 Klaus Hartl & Fagner Brack
 * Released under the MIT license
 */
;(function (factory) {
	var registeredInModuleLoader = false;
	if (typeof define === 'function' && define.amd) {
		define(factory);
		registeredInModuleLoader = true;
	}
	if (typeof exports === 'object') {
		module.exports = factory();
		registeredInModuleLoader = true;
	}
	if (!registeredInModuleLoader) {
		var OldCookies = window.Cookies;
		var api = window.Cookies = factory();
		api.noConflict = function () {
			window.Cookies = OldCookies;
			return api;
		};
	}
}(function () {
	function extend () {
		var i = 0;
		var result = {};
		for (; i < arguments.length; i++) {
			var attributes = arguments[ i ];
			for (var key in attributes) {
				result[key] = attributes[key];
			}
		}
		return result;
	}

	function init (converter) {
		function api (key, value, attributes) {
			var result;
			if (typeof document === 'undefined') {
				return;
			}

			// Write

			if (arguments.length > 1) {
				attributes = extend({
					path: '/'
				}, api.defaults, attributes);

				if (typeof attributes.expires === 'number') {
					var expires = new Date();
					expires.setMilliseconds(expires.getMilliseconds() + attributes.expires * 864e+5);
					attributes.expires = expires;
				}

				// We're using "expires" because "max-age" is not supported by IE
				attributes.expires = attributes.expires ? attributes.expires.toUTCString() : '';

				try {
					result = JSON.stringify(value);
					if (/^[\{\[]/.test(result)) {
						value = result;
					}
				} catch (e) {}

				if (!converter.write) {
					value = encodeURIComponent(String(value))
						.replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent);
				} else {
					value = converter.write(value, key);
				}

				key = encodeURIComponent(String(key));
				key = key.replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent);
				key = key.replace(/[\(\)]/g, escape);

				var stringifiedAttributes = '';

				for (var attributeName in attributes) {
					if (!attributes[attributeName]) {
						continue;
					}
					stringifiedAttributes += '; ' + attributeName;
					if (attributes[attributeName] === true) {
						continue;
					}
					stringifiedAttributes += '=' + attributes[attributeName];
				}
				return (document.cookie = key + '=' + value + stringifiedAttributes);
			}

			// Read

			if (!key) {
				result = {};
			}

			// To prevent the for loop in the first place assign an empty array
			// in case there are no cookies at all. Also prevents odd result when
			// calling "get()"
			var cookies = document.cookie ? document.cookie.split('; ') : [];
			var rdecode = /(%[0-9A-Z]{2})+/g;
			var i = 0;

			for (; i < cookies.length; i++) {
				var parts = cookies[i].split('=');
				var cookie = parts.slice(1).join('=');

				if (cookie.charAt(0) === '"') {
					cookie = cookie.slice(1, -1);
				}

				try {
					var name = parts[0].replace(rdecode, decodeURIComponent);
					cookie = converter.read ?
						converter.read(cookie, name) : converter(cookie, name) ||
						cookie.replace(rdecode, decodeURIComponent);

					if (this.json) {
						try {
							cookie = JSON.parse(cookie);
						} catch (e) {}
					}

					if (key === name) {
						result = cookie;
						break;
					}

					if (!key) {
						result[name] = cookie;
					}
				} catch (e) {}
			}

			return result;
		}

		api.set = api;
		api.get = function (key) {
			return api.call(api, key);
		};
		api.getJSON = function () {
			return api.apply({
				json: true
			}, [].slice.call(arguments));
		};
		api.defaults = {};

		api.remove = function (key, attributes) {
			api(key, '', extend(attributes, {
				expires: -1
			}));
		};

		api.withConverter = init;

		return api;
	}

	return init(function () {});
}));

// ToDo: move to pure js
function setIpAddressCookie(data) {
	//Use the users IP to get their country code from freegeoip.net
	var userip = data.ip;
	if (!userip.length) {
		return null;
	}
	jQuery.ajax({
		dataType: 'jsonp',
		jsonp: 'callback',
		jsonpCallback: 'setClientCountry',
		headers: {"Access-Control-Allow-Origin" : "*", "Origin" : "https://" + window.location.host},
		url: 'https://freegeoip.net/json/' + data.ip,
		success: function( response ) {
			//console.log('SUCCESS!');
			//console.log(response);
		}, 
		error: function(errorMsg){
			//console.log('oops');
			//console.log(errorMsg);
		}
	});
}

// Set a cookie with the country code
function setClientCountry(data){
	Cookies.set('_clientCountry', data.country_code, {expires: 365});
	//console.log(data.country_code);
	redirectOnCounty();
}

// detect search engines|bots
function bot_detected() {
	if (/bot|crawl|slurp|spider/.test(navigator.userAgent)) {
		//console.log('This is a bot');
		return true;
	} else {
		//console.log('This is NOT a bot');
		return false;
	}
}

// See if manually changed language cookie is set
function redirectOnCounty() {
	// If the user hasn't been navigating the site already
	if (document.referrer.indexOf("storyterrace.com") === -1) {
		// Check country code and redirect
		var clientCountry = Cookies.get('_clientCountry');
		//var americas = ["AI", "AG", "AW", "BS", "BB", "BZ", "BM", "BQ", "VG", "CA", "KY", "CR", "CU", "CW", "DM", "DO", "SV", "GL", "GD", "GP", "GT", "HT", "HN", "JM", "MQ", "MX", "PM", "MS", "CW", "KN", "NI", "PA", "PR", "BQ", "BQ", "SX", "KN", "LC", "PM", "VC", "TT", "TC", "US", "VI", "AR", "BO", "BR", "CL", "CO", "EC", "FK", "GF", "GY", "GY", "PY", "PE", "SR", "UY", "VE"];
		var thisurl = window.location.pathname;
		if ((clientCountry === 'GB') && (thisurl.indexOf("en-GB") === -1)) {
			//console.log('Redirect to en-GB');
			window.location.href = "https://" + window.location.host + "/en-GB/";
		} else if ((clientCountry === "NL") && (thisurl.indexOf("nl") === -1)){
			//console.log('Redirect to NL');
			window.location.href = "https://" + window.location.host + "/nl/";
		} else {
			//console.log('No redirect triggered');
		}
	}
}

(function(){
	// if spider is detected -> SKIP
	if(bot_detected()) {
		return false;
	}
	// Only redirect if on key pages
	// TODO: These need to map to the correct nl pages
	if (location.pathname == "/" 
		/*||
		location.pathname == "/how-it-works/" ||
		location.pathname == "/pricing/" ||
		location.pathname == "/ourwriters/" ||
		location.pathname == "/the-team/" ||
		location.pathname == "/about-us/" ||
		location.pathname == "/contact/" ||
		location.pathname == "/become-a-writer/" ||
		location.pathname == "/testimonials/" ||
		location.pathname == "/faq/"*/
		) {
		// See if our country code cookie is there
		if (!Cookies.get('_clientCountry')) {
			// If not then get the ip (then the country (then redirect))
			var script = document.createElement('script');
			script.src = 'https://api.ipify.org?format=jsonp&callback=setIpAddressCookie';
			document.getElementsByTagName('head')[0].appendChild(script);
		} else {
			// Otherwise cookie has been set and redirect
			redirectOnCounty();
		}
	} else {
		console.log('Deep link');
	}
})();