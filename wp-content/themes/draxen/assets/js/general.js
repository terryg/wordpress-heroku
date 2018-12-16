// JavaScript Document
jQuery(document).ready(function() {
	
	var draxenViewPortWidth = '',
		draxenViewPortHeight = '';

	function draxenViewport(){

		draxenViewPortWidth = jQuery(window).width(),
		draxenViewPortHeight = jQuery(window).outerHeight(true);	
		
		if( draxenViewPortWidth > 1200 ){
			
			jQuery('.main-navigation').removeAttr('style');
			
			var draxenSiteHeaderHeight = jQuery('.site-header').outerHeight();
			var draxenSiteHeaderWidth = jQuery('.site-header').width();
			var draxenSiteHeaderPadding = ( draxenSiteHeaderWidth * 2 )/100;
			var draxenMenuHeight = jQuery('.menu-container').height();
			
			var draxenMenuButtonsHeight = jQuery('.site-buttons').height();
			
			var draxenMenuPadding = ( draxenSiteHeaderHeight - ( (draxenSiteHeaderPadding * 2) + draxenMenuHeight ) )/2;
			var draxenMenuButtonsPadding = ( draxenSiteHeaderHeight - ( (draxenSiteHeaderPadding * 2) + draxenMenuButtonsHeight ) )/2;
		
			
			jQuery('.menu-container').css({'padding-top':draxenMenuPadding});
			jQuery('.site-buttons').css({'padding-top':draxenMenuButtonsPadding});
			
			
		}else{

			jQuery('.menu-container, .site-buttons, .header-container-overlay, .site-header').removeAttr('style');

		}	
	
	}

	jQuery(window).on("resize",function(){
		
		draxenViewport();
		
	});
	
	draxenViewport();


	jQuery('.site-branding .menu-button').on('click', function(){
				
		if( draxenViewPortWidth > 1200 ){

		}else{
			jQuery('.main-navigation').slideToggle();
		}				
		
				
	});	

		
	
});		