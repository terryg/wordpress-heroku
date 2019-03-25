(function( $ ) {
	// NAVIGATION CALLBACK
	var ww = jQuery(window).width();
	jQuery(document).ready(function() { 
		jQuery(".nav li a").each(function() {
			if (jQuery(this).next().length > 0) {
				jQuery(this).addClass("parent");
			};
		})
		jQuery(".toggleMenu").click(function(e) { 
			e.preventDefault();
			jQuery(this).toggleClass("active");
			jQuery(".nav").slideToggle('fast');
		});
		adjustMenu();
	})

	// navigation orientation resize callbak
	jQuery(window).bind('resize orientationchange', function() {
		ww = jQuery(window).width();
		adjustMenu();
	});

	var adjustMenu = function() {
		if (ww < 720) {
			jQuery(".toggleMenu").css("display", "block");
			if (!jQuery(".toggleMenu").hasClass("active")) {
				jQuery(".nav").hide();
			} else {
				jQuery(".nav").show();
			}
			jQuery(".nav li").unbind('mouseenter mouseleave');
		} else {
			jQuery(".toggleMenu").css("display", "none");
			jQuery(".nav").show();
			jQuery(".nav li").removeClass("hover");
			jQuery(".nav li a").unbind('click');
			jQuery(".nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
			jQuery(this).toggleClass('hover');
			});
		}
	}

	/**** Hidden search box ***/
	jQuery('document').ready(function($){
		$('.search-box span i').click(function(){
	        $(".serach_outer").slideDown(1000);
	    });

	    $('.closepop i').click(function(){
	        $(".serach_outer").slideUp(1000);
	    });
	});	
	
})( jQuery );