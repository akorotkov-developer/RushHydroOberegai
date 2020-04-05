$(function(){
	
	$("#mainslider").owlCarousel({
	 items : 1, dots: true, autoplay: true, nav:true	
	});
	
	$('#callphone').mask('+7(999)999 99 99');
	
	var validator = $("#ordercall").validate({
		rules: { 
			name: { required: true }, 
			phone: { required: true }, 
			code: { required: true } 			
		}, 
		messages: { 
			name: { required: 'Обязательное поле' }, 
			phone: { required: 'Обязательное поле' },
			code: { required: 'Обязательное поле' } 			
		}
	});
	
	$('.shadow_all').click(function(){ popupclose() })
	
	$("a.fancybox").fancybox({

	   'transitionIn'  :   'elastic',
	   'transitionOut' :   'elastic',
	   'speedIn'       :   600, 
	   'speedOut'      :   200, 
	   'overlayShow'   :   false

	});

	
})

function popupclose(){
	$('.shadow_all').fadeOut(); $('.popups').slideUp();
}
function popupshow(block){
	st = $(window).scrollTop(); $('.shadow_all').fadeIn(); 
	$('#'+block).css('top',st+110); $('#'+block).slideDown();
}