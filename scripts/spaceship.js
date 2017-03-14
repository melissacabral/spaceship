jQuery.noConflict();
jQuery( document ).ready(function( $ ) {

	//simple parallax on header image
	$(window).scroll(function(){
		var windowTop = $(window).scrollTop();
		$('#header').css({
			"background-position-y" :   windowTop / 3
		});
	});

	//smooth scroll
	$(function() {
		$('a[href*="#"]:not([href="#"])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html, body').animate({
						scrollTop: target.offset().top
					}, 1000);
					return false;
				}
			}
		});
	});
	
});