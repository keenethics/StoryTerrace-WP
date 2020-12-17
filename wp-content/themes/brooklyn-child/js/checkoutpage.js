jQuery(document).ready(function($){
    var animTime = 300,
        clickPolice = false;
    
    $(document).on('touchstart click', '.acc-btn', function(){
      if(!clickPolice){
         clickPolice = true;
        
        var currIndex = $(this).index('.acc-btn'),
            targetHeight = $('.acc-content-inner').eq(currIndex).outerHeight();
     
        $('.acc-btn h1').removeClass('selected');
        $(this).find('h1').addClass('selected');
        
        $('.acc-content').stop().animate({ height: 0 }, animTime);
        $('.acc-content').eq(currIndex).stop().animate({ height: targetHeight }, animTime);

        setTimeout(function(){ clickPolice = false; }, animTime);
      }
      
    });
    $(".mute-text:contains('Additional')").html("Extra copies:");
    
    
    $( "#ship-to-different-address-checkbox" ).click(function() {
    	if ($('input#ship-to-different-address-checkbox').is(':checked')) {
    		
    		
    		 setTimeout(function(){ 
    		 	var oldh = $('.woocommerce-shipping-fields').parent().parent().height();
    		 	var heightful = $('.woocommerce-shipping-fields').height();
  	   	    var newht = parseInt(heightful) + parseInt(oldh);
  	   	   $('.woocommerce-shipping-fields').parent().parent().css('height',newht+'px');
          //console.log(pheightful);
  	   }, 500);
     } else {
     	 $('.woocommerce-shipping-fields').parent().parent().css('height','300');
     }
    });
  
});