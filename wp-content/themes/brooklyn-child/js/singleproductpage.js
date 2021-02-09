	jQuery(document).ready(function ($) {
		var variationSections = [
			'.variations_form .p0',
			'.variations_form .p1',
			'.variations_form .p2'
		]
		var variationInputClass = '.variation_price';
		var dataVariationPrice = 'data-variation-price';

		// add currency symbol and plus or minus
		function getPriceWithSymbol(number, symbol) {
			return number ? number < 0 ? '-' + symbol + Math.abs(number) : '+' + symbol + number : '';
		}

		function addPriceToAllVariations(selectorArray) {
			//ToDo: optimzie array
			addPriceToVariation(selectorArray[0] + ' ' + variationInputClass, selectorArray[1] + ' ' + variationInputClass + ':checked', selectorArray[2] + ' ' + variationInputClass + ':checked');
			addPriceToVariation(selectorArray[1] + ' ' + variationInputClass, selectorArray[2] + ' ' + variationInputClass + ':checked', selectorArray[0] + ' ' + variationInputClass + ':checked');
			addPriceToVariation(selectorArray[2] + ' ' + variationInputClass, selectorArray[0] + ' ' + variationInputClass + ':checked', selectorArray[1] + ' ' + variationInputClass + ':checked');
		}

		// create array with writer level and interview format
		function createCombination(variant, firstSelector, secondSelector) {
			var compare = [];
			compare.push($(variant).val(), $(firstSelector).val(), $(secondSelector).val());	

			console.log('compare = ', compare);
			return compare;
		}

		// add price to the variation data-variation-price 
		function addPriceToVariation(currentVariation, secondVariation, thirdVariation) {
			$(currentVariation).each(function() {
				var result = filterFromData(createCombination(this, secondVariation, thirdVariation));
				
				$(this).attr(dataVariationPrice, result);
			})
		}

		// filter json data from woocommerce form
		function filterFromData(compare) {
			var formData = $('.variations_form').data('product_variations');

			for (var i=0; i < formData.length; i++) {
				var a = formData[i].attributes;				
				var result = Object.keys(a).map(function(key){
					// if (key !== 'attribute_pa_payment-plan') return a[key];	
					return a[key];									
				})			
				



				// slice relust array for GB and NL locale
				if (JSON.stringify(result.sort()) == JSON.stringify(compare.sort())) {	
					// console.log(JSON.stringify(result.sort()));
					// console.log(JSON.stringify(compare.sort()));
					console.log('formData[i].display_price = ', formData[i].display_price);
					return formData[i].display_price;
				}	
			}			
		}

		// get price from .amount element and calculate diff
		function calculatePricingDiff(variant) {
			var generalVaration = variant.find(variationInputClass);
			var shopSymbol = $('.price .woocommerce-Price-currencySymbol')[0].textContent;

			function findPricingDiff(variant) {
				var generalVaration = variant.find(variationInputClass);
				var activeVariation = generalVaration.filter(':checked');
				var passiveVariation = generalVaration.filter(':not(:checked)');

				console.log('passiveVariation = ', passiveVariation);

				passiveVariation.each(function () {
					var pricingDiff = $(this).attr(dataVariationPrice) - activeVariation.attr(dataVariationPrice);

					console.log('$(this).parents()', $(this).closest('#pa_payment-plan').length);
					//if ($(this).parents('#pa_payment-plan')) return;
					
					//dont add diff for payment plan section
					if ($(this).closest('#pa_payment-plan').length) return;

	
					$(this).siblings('.variation-diff-price').html(getPriceWithSymbol(pricingDiff, shopSymbol));
				})
			}

			// run pricing diff function
			findPricingDiff(variant);

			// calculate diff on click to the variant
			generalVaration.on('change', function () {
				$(this).siblings('.variation-diff-price').html('');

				console.log('$(this).siblings = ', $(this).siblings('.variation-diff-price'))
				
				addPriceToAllVariations(variationSections);

				$.each(variationSections, function(...value) {
					console.log('value = ', value[1]);
			
					findPricingDiff($(value[1]));
				});
			});
		};

		// run all variations functions
		addPriceToAllVariations(variationSections);

		$.each(variationSections, function(...value) {
			calculatePricingDiff($(value[1]));
		});

		$(".btn-gotocart").click(function () {
			$(".cartload").addClass('addgry');

			setTimeout(function () {
				$(".single_add_to_cart_button").click();
			}, 500);

			return false;
		});

		if ($(window).width() <= 767) {
			$(".btn-continue").click(function () {
				$("html, body").animate({
					scrollTop: 0
				}, "slow");
			});
		}

		$(".variation_price").click(function () {
			// change text on the product page bottom
			var $totalPriceElement = $('.product-footer .tps');
			var totalPriceElementText = $totalPriceElement.data('total-price-text');

			if ($(this).parents('#pa_payment-plan').length) {
				if ($(this).val().startsWith('single-payment')) {
					$totalPriceElement.text(totalPriceElementText);
				} else {
					$totalPriceElement.text($('.variations_form').data('first-payment-text'));
				}	
			} else {
				if ($totalPriceElement[0].innerText === totalPriceElementText) return;				

				$totalPriceElement.text(totalPriceElementText);
			}

			$('.form-row-wide').each(function () {
				var spinnerx = $(this);
				spinnerx.find("input").val(0);
				spinnerx.find("input").trigger("change");
			});
		});

		$('.form-row-wide').each(function () {
			var spinnerx = $(this);
			spinnerx.find("input").val(0);
			spinnerx.find("input").trigger("change");
		});

		$('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.wc-pao-addon-input-multiplier');
		
		$('.form-row-wide').each(function () {
			var spinner = $(this),
				input = spinner.find('input[type="number"]'),
				btnUp = spinner.find('.quantity-up'),
				btnDown = spinner.find('.quantity-down'),
				min = input.attr('min'),
				max = input.attr('max');
			var curen = $('.woocommerce-Price-currencySymbol').html();
			btnUp.click(function () {
				var oldValue = parseFloat(input.val());
				if (oldValue >= max) {
					var newVal = oldValue;
				} else {
					var newVal = oldValue + 1;
				}
				spinner.find("input").val(newVal);
				spinner.find("input").trigger("change");
				var pird = $('.variations_form .price .woocommerce-Price-amount').text();
				var numfinal = pird.replace(/[^\d.]/g, '');
				var dataprice = $('.wc-pao-addon-input-multiplier').attr('data-price');
				var addoncheckbox = $('.addon-checkbox').attr('data-price');
				var incrnum = parseInt(numfinal) + parseInt(dataprice);
				var numx = incrnum.toLocaleString();
				var ftil = curen + numx + '.00';
				var newf = $('.variations_form .price .woocommerce-Price-amount').html(ftil);
				$('.quantity-down').attr('style', '');
			});

			btnDown.click(function () {
				var oldValue = parseFloat(input.val());
				if (oldValue <= min) {
					var newVal = oldValue;
				} else {
					var newVal = oldValue - 1;
				}
				spinner.find("input").val(newVal);
				spinner.find("input").trigger("change");
				newvals = input.val();
				var pird = $('.variations_form .price .woocommerce-Price-amount').text();
				var numfinal = pird.replace(/[^\d.]/g, '');
				var datapricem = $('.wc-pao-addon-input-multiplier').attr('data-price');
				var incrnum = parseInt(numfinal) - parseInt(datapricem);
				var numx = incrnum.toLocaleString();
				var ftil = curen + numx + '.00';
				var newf = $('.variations_form .price .woocommerce-Price-amount').html(ftil);

				if (newvals == 0) {
					$('.prie2').show();
					$('.quantity-down').css('pointer-events', 'none');
				}
			});
		});

		$('.form-row-wide label').hide();

		setInterval(function () {
			$('.prie2').html($('.variations_form .price .woocommerce-Price-amount').html())
		}, 100);

		setInterval(function () {
			$('.prie').html($('.wc-pao-addon-totals dd:eq(1)').html());
		}, 100);

		$('.quantity-down').css('pointer-events', 'none');

		setTimeout(function () {
			$('.woocommerce-variation-add-to-cart').hide();
			$('.quantity,.wc-pao-addon-choose-additional-copies').hide();
			$('.wc-pao-addon').hide();
			$('#product-addons-total').hide();
		}, 200);

		$('.wccpf-field').change(function () {
			if ($(this).prop('checked')) {
				var curen = $('.woocommerce-Price-currencySymbol').html();
				var pird = $('.variations_form .price .woocommerce-Price-amount').text();
				var numfinal = pird.replace(/[^\d.]/g, '');
				$p = $(this).attr('value');
				var incrnum = parseInt(numfinal) + parseInt($p);
				var numx = incrnum.toLocaleString();
				var ftil = curen + numx + '.00';
				var newf = $('.variations_form .price .woocommerce-Price-amount').html(ftil);

			} else {
				var curen = $('.woocommerce-Price-currencySymbol').html();
				var pird = $('.variations_form .price .woocommerce-Price-amount').text();
				var numfinal = pird.replace(/[^\d.]/g, '');
				$p = $(this).attr('value');
				var incrnum = parseInt(numfinal) - parseInt($p);
				var numx = incrnum.toLocaleString();
				var ftil = curen + numx + '.00';
				var newf = $('.variations_form .price .woocommerce-Price-amount').html(ftil);
			}
		});
		$('.wccpf-field').after("<span></span>");
	});