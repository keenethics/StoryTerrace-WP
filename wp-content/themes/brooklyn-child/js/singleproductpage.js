	var allPrices = [];
	$(document).ready(function() {
		var result = [];
		$(".woocommerce-Price-amount").each(function(){
			var priceVal = $(this).html();
			var curen = $('.woocommerce-Price-currencySymbol').html();
			var priceVal = priceVal.replace('<span class="woocommerce-Price-currencySymbol">' + curen +'</span>',"");
			var priceVal = priceVal.replace('<bdi>',"");
			var priceVal = priceVal.replace('</bdi>',"");
			var priceVal = priceVal.replace(',',"");
			priceVal = parseInt(priceVal);
			// console.log(priceVal);
			allPrices.push(priceVal);
			$.each(allPrices, function(i, e) {
				if ($.inArray(e, result) == -1) result.push(e);
			});
		});

		result=result.sort(function(a, b){return b-a});

		$('.variations_form input').on('change', function() {
			var data = $('input[name=attribute_writer-level]:checked', '.variations_form').attr("data-variation");
			var data1 = $('input[name=attribute_schijversniveau]:checked', '.variations_form').attr("data-variation");
			var data2 = $('input[name=attribute_niveau-schrijver]:checked', '.variations_form').attr("data-variation");
			var curen = $('.woocommerce-Price-currencySymbol').html();
			if (data == 0 || data1 == 0 || data2 == 0){
				var variOne="";
				var variTwo=result[0]-result[1];
				var variThree=result[0]-result[2];
				$("#varUpdation0").html(variOne);
				$("#varUpdation1").html("-" + curen + variTwo);
				$("#varUpdation2").html("-" + curen + variThree);	 
			}
			if (data == 1 || data1 == 1 || data2 == 1){
				var variOne=result[0]-result[1];
				var variTwo="";
				var variThree=result[1]-result[2];
				$("#varUpdation0").html("+" + curen + variOne);
				$("#varUpdation1").html(variTwo);
				$("#varUpdation2").html("-" + curen + variThree);
			}
			if (data == 2 || data1 == 2 || data2 == 2){
				var variOne=result[0]-result[2];
				var variTwo=result[1]-result[2];
				var variThree="";
				$("#varUpdation0").html("+" + curen + variOne);
				$("#varUpdation1").html("+" + curen + variTwo);
				$("#varUpdation2").html(variThree);
			}
		});
		$(".btn-gotocart").click(function(){
			//$(".cartload").hide();
			//$( ".cartload" ).hide();
			$( ".cartload" ).addClass('addgry');
			//$(".done").addClass("finish");
			//$(".newcon").show();
			//$(".newloader").show();
			
			//$(".newloader").removeClass("hide-loading");
			//$(".newloader").addClass("loading");
			//$(".addshowgr").show();
			setTimeout(function() {
				//$(".newloader").addClass("hide-loading");
		      // For failed icon just replace ".done" with ".failed"
		      //$(".done").addClass("finish");
		  }, 4000);
			setTimeout(function() {
				// $(".newloader").removeClass("loading");
				// $(".newloader").removeClass("hide-loading");
				// $(".done").removeClass("finish");
				//$(".failed").removeClass("finish");
			}, 5000);
			setTimeout(function() {
			$(".single_add_to_cart_button").click(); 
		   }, 500);
			return false;
		});
		if($(window).width() <= 767) {
			$(".btn-continue").click(function() {
				$("html, body").animate({ scrollTop: 0 }, "slow");
			});
		}
		$(".variation_price").click(function(){
			jQuery('.form-row-wide').each(function() {
				var spinnerx = jQuery(this);
				spinnerx.find("input").val(0);
				spinnerx.find("input").trigger("change");
			});
		});
		jQuery('.form-row-wide').each(function() {
			var spinnerx = jQuery(this);
			spinnerx.find("input").val(0);
			spinnerx.find("input").trigger("change");
		});
		jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.wc-pao-addon-input-multiplier');
		jQuery('.form-row-wide').each(function() {
			var spinner = jQuery(this),
			input = spinner.find('input[type="number"]'),
			btnUp = spinner.find('.quantity-up'),
			btnDown = spinner.find('.quantity-down'),
			min = input.attr('min'),
			max = input.attr('max');
			var curen = $('.woocommerce-Price-currencySymbol').html();
			btnUp.click(function() {
				var oldValue = parseFloat(input.val());
				if (oldValue >= max) {
					var newVal = oldValue;
				} else {
					var newVal = oldValue + 1;
				}
				spinner.find("input").val(newVal);
				spinner.find("input").trigger("change");
				var pird = $('.variations_form .price .woocommerce-Price-amount').text();
				var numfinal = pird.replace( /[^\d.]/g, '' );
				var dataprice = $('.wc-pao-addon-input-multiplier').attr('data-price');
				var addoncheckbox = $('.addon-checkbox').attr('data-price');
				var incrnum  = parseInt(numfinal)+ parseInt(dataprice);
				var numx = incrnum.toLocaleString();
				var ftil = curen + numx + '.00';
				var newf =  $('.variations_form .price .woocommerce-Price-amount').html(ftil);
				$('.quantity-down').attr('style','');
			});

			btnDown.click(function() {
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
				var numfinal = pird.replace( /[^\d.]/g, '' );
				var datapricem = $('.wc-pao-addon-input-multiplier').attr('data-price');
				var incrnum  = parseInt(numfinal)- parseInt(datapricem);
				var numx = incrnum.toLocaleString();
				var ftil = curen + numx + '.00';
				var newf =  $('.variations_form .price .woocommerce-Price-amount').html(ftil);
				if(newvals == 0){
					$('.prie2').show();
					$('.quantity-down').css('pointer-events','none');
				}
			});

		});		   
		$(".btn-continue").click(function(){
			$(".p1").show(); 
			$(".btn-gotocart").show(); 
			$(".p0").hide(); 
			$(".btn-continue").hide(); 
			$(".btn-request").hide(); 
			$(".checkout-progress").show(); 
			$(".wril").hide(); 
			$(".wrip").show(); 
			$('.wc-pao-addon-choose-additional-copies').show();
			$('.wc-pao-addon-container').show();
			$('.quantity').hide();
			$('.woocommerce-variation-add-to-cart').show(); 
			return false;
		});
		$('.form-row-wide label').hide();
		setInterval(function(){ 
			$('.prie2').html($('.variations_form .price .woocommerce-Price-amount').html());
		}, 100);
		setInterval(function(){ 
			$('.prie').html($('.wc-pao-addon-totals dd:eq(1)').html());
		}, 100);
		$('.quantity-down').css('pointer-events','none');
		setTimeout(function(){ 
			$('.woocommerce-variation-add-to-cart').hide(); 
			$('.quantity,.wc-pao-addon-choose-additional-copies').hide(); 
			$('.wc-pao-addon').hide(); 
			$('#product-addons-total').hide(); 
		}, 200);
		var datav = $('.alldatav .premium-writer').html();
		$('.skl .premium-writer').html(datav);
		var datav1 = $('.alldatav .senior-writer').html();
		$('.skl .senior-writer').html(datav1);
		$('.skl .senior-schrijver').html(datav1);
		var datav2 = $('.alldatav .junior-writer').html();
		$('.skl .junior-writer').html(datav2);
		$('.skl .junior-schrijver').html(datav2);
		var datav3 = $('.alldatav .single-payment').html();
		$('.skl .single-payment').html(datav3);
		$('.skl .eenmalige-betaling').html(datav3);
		var datav4 = $('.alldatav .instalment-x2-to-be-paid').html();
		$('.skl .instalment-x2-to-be-paid').html(datav4);
		$('.skl .in-termijnen-twee-betalingen').html(datav4);
		$('.p1').hide();
		var pay0 = $('.alldatav .pay-0').html();
		$('.skl .pay-0').html(pay0);
		var pay1 = $('.alldatav .pay-1').html();
		$('.skl .pay-1').html(pay1);
		var pay2 = $('.alldatav .pay-2').html();
		$('.skl .pay-2').html(pay2);
	});
	$(document).ready(function(){
		  jQuery('.wccpf-field').change(function() {
		        if ($(this).prop('checked')) {
		        	var curen = $('.woocommerce-Price-currencySymbol').html();
		            var pird = $('.variations_form .price .woocommerce-Price-amount').text();
				    var numfinal = pird.replace( /[^\d.]/g, '' );
				    $p = $(this).attr('value');
				    var incrnum  = parseInt(numfinal)+ parseInt($p);
				    var numx = incrnum.toLocaleString();
				    var ftil = curen + numx + '.00';
				    var newf =  $('.variations_form .price .woocommerce-Price-amount').html(ftil);

		        }
		        else {
		            var curen = $('.woocommerce-Price-currencySymbol').html();
		            var pird = $('.variations_form .price .woocommerce-Price-amount').text();
				    var numfinal = pird.replace( /[^\d.]/g, '' );
				    $p = $(this).attr('value');
				    var incrnum  = parseInt(numfinal)-parseInt($p);
				    var numx = incrnum.toLocaleString();
				    var ftil = curen + numx + '.00';
				    var newf =  $('.variations_form .price .woocommerce-Price-amount').html(ftil);
		        }
         });
		  $('.wccpf-field').after( "<span></span>" );
	});