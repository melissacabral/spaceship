jQuery.noConflict();
jQuery( document ).ready(function( $ ) {
	var $topbutton = $('.to-top');
	$topbutton.hide();

	//simple parallax on header image
	$(window).scroll(function(){
		var windowTop = $(window).scrollTop();
		$('#header').css({
			"background-position-y" :   windowTop / 3
		});
		if ($(window).scrollTop() > 200) {
			$topbutton.fadeIn();
		} else {
			$topbutton.fadeOut();
		}
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