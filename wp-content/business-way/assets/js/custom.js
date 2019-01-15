jQuery(document).ready(function($){     
    //LightCase
		
		$('a[data-rel^=lightcase]').lightcase();


	/*----------------------------- Scroll To Top -----------------------*/

	jQuery(window).on('scroll',function () {

		if (jQuery(this).scrollTop() > 600) {

			jQuery('#scrollup').fadeIn();

		} else {

			jQuery('#scrollup').fadeOut();

		}

	});


	jQuery('#scrollup').on('click',function(){

		jQuery('html, body').animate({

		scrollTop: 0

	}, 1500);

	return false;

	});

    /*owl carousel slider------------------------*/

	jQuery("#owl-demo").owlCarousel({

		items:1,

		autoplay: true,

		loop: true,

		dots:false,

		mouseDrag:false,

		nav: true,

		navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],

        transitionStyle:"fade",

		animateIn: 'fadeIn',

		animateOut: 'fadeOutLeft'

    });



    /*owl carousel slider------------------------*/

	jQuery("#test-slide").owlCarousel({

		items: 1,

		autoplay: true,

		loop: true,

		dots:false,

		mouseDrag:false,

		nav: true,

		navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],

        transitionStyle:"fade",

		animateIn: 'fadeIn',

		animateOut: 'fadeOutLeft'

    });

	

    /*owl carousel slider------------------------*/

	jQuery("#home-two-test").owlCarousel({

		items: 1,

		autoplay: true,

		loop: true,

		dots:false,

		mouseDrag:false,

		nav: false,

		transitionStyle:"fade",

		animateIn: 'fadeInRight',

		animateOut: 'fadeOutLeft'

    });	

	/*-------------- Gmaps ------------------*/	

	var map;

	jQuery('.ev-map-display').each(function() {

		var element = jQuery(this).attr('id');		

		var lan=jQuery('#lan').val();

        var lng=jQuery('#lng').val();

		map = new GMaps({

		el: '#' + element,

		center: new google.maps.LatLng(lng,lan),

		zoom:5,

		scrollwheel: false,

		styles: [

				{

					"featureType": "water",

					"elementType": "geometry",

					"stylers": [

						{

							"color": "#222"

						}

					]

				},

				{

					"featureType": "landscape",

					"elementType": "geometry",

					"stylers": [

						{

							"color": "#555"

						}

					]

				},

				{

					"featureType": "road.highway",

					"elementType": "geometry.fill",

					"stylers": [

						{

							"color": "#333333"

						},

						{

							"lightness": 17

						}

					]

				},

				{

					"featureType": "road.highway",

					"elementType": "geometry.stroke",

					"stylers": [

						{

							"color": "#fefefe"

						},

						{

							"lightness": 30

						},

						{

							"weight": 0.3

						}

					]

				},

				{

					"featureType": "road.arterial",

					"elementType": "geometry",

					"stylers": [

						{

							"color": "#333333"

						},

						{

							"lightness":20

						}

					]

				},

				{

					"featureType": "road.local",

					"elementType": "geometry",

					"stylers": [

						{

							"color": "#333333"

						},

						{

							"lightness": 17

						}

					]

				},

				{

					"featureType": "poi",

					"elementType": "geometry",

					"stylers": [

						{

							"color": "#ccc"

						},

						{

							"lightness": 22

						}

					]

				},

				{

					"featureType": "poi.park",

					"elementType": "geometry",

					"stylers": [

						{

							"color": "#dedede"

						},

						{

							"lightness": 22

						}

					]

				},

				{

					"elementType": "labels.text.stroke",

					"stylers": [

						{

							"visibility": "on"

						},

						{

							"color": "#333"

						},

						{

							"lightness": 7

						}

					]

				},

				{

					"elementType": "labels.text.fill",

					"stylers": [

						{

							"saturation": 37

						},

						{

							"color": "#333333"

						},

						{

							"lightness": 41

						}

					]

				},

				{

					"elementType": "labels.icon",

					"stylers": [

						{

							"visibility": "off"

						}

					]

				},

				{

					"featureType": "transit",

					"elementType": "geometry",

					"stylers": [

						{

							"color": "#f2f2f2"

						},

						{

							"lightness": 20

						}

					]

				},

				{

					"featureType": "administrative",

					"elementType": "geometry.fill",

					"stylers": [

						{

							"color": "#000"

						},

						{

							"lightness": 1

						}

					]

				},

				{

					"featureType": "administrative",

					"elementType": "geometry.stroke",

					"stylers": [

						{

							"color": "#000"

						},

						{

							"lightness": 1

						},

						{

							"weight": 1.3

						}

					]

				}

			]

		});

		map.addMarker({

		lat: lng,

		lng: lan,

			title: '',

			icon:'',

		   

		});

	});
	
	 jQuery(window).load(function(){

	    //Portfolio container     

	    var $container = jQuery('.portfolioContainer');

	    $container.isotope({

	      filter: '*',

	      animationOptions: {

	        duration: 750,

	        easing: 'linear',

	        queue: false

	      }

	    });

	 

	    jQuery('.portfolioFilter a').on('click', function(){

	      jQuery('.portfolioFilter a').removeClass('current');

	      jQuery(this).addClass('current');

	   

	      var selector = jQuery(this).attr('data-filter');

	         $container.isotope({

	        filter: selector,

	        animationOptions: {

	          duration: 750,

	          easing: 'linear',

	          queue: false

	        }

	       });

	       return false;

	    });

  	});

	/*----------- fixed-nav ------------*/

	jQuery('#nav').onePageNav();

	

	

	/*----------- wow ------------*/

	new WOW().init();

	

	

	/*-------------- Pre-loader ------------------*/

	jQuery(window).on('load',function() {

		jQuery("#preloader").delay(1000).fadeOut(500);

		jQuery(".inTurnBlurringTextG").on('click',function() {

			jQuery("#loader").fadeOut(500);

		});

	});

	 jQuery(window).load(function(){

    //Portfolio container     
    var $container = jQuery('.portfolioContainer');
    $container.isotope({
      filter: '*',
      animationOptions: {
        duration: 750,
        easing: 'linear',
        queue: false
      }
    });
 
    jQuery('.portfolioFilter a').on('click', function(){
      jQuery('.portfolioFilter a').removeClass('current');
      jQuery(this).addClass('current');
   
      var selector = jQuery(this).attr('data-filter');
         $container.isotope({
        filter: selector,
        animationOptions: {
          duration: 750,
          easing: 'linear',
          queue: false
        }
       });
       return false;
    });

  });
  

});



(function($) {
	
	"use strict";
	
	$(window).scroll(function () {
        if ($(window).scrollTop() >= 1) {
            $(".navbar").addClass("affix");
        }else {
            $(".navbar").removeClass("affix");
        }
    });


    //Submenu Dropdown Toggle
    if($('.main-menu  li.menu-item-has-children ul').length){
        $('.main-menu  li.menu-item-has-children').append('<div class="dropdown-btn"><Span class="fa fa-angle-down"></span></div>');

        //Dropdown Button
        $('.main-menu li.menu-item-has-children .dropdown-btn').on('click', function() {
            $(this).prev('ul').slideToggle(500);
        });


        //Disable dropdown parent link
        $('.navbar-nav li.menu-item-has-children > a').on('click', function(e) {
            e.preventDefault();
        });
    }

})(window.jQuery);



