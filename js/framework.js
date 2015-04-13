/**
 * Custom functions
 */
jQuery( document ).ready(function( $ ) {
/* 	$('#search').hide();
	$('.toolbar .icon-search').click(function(event) {
		// event.preventDefault();
		$('#search').slideToggle();
	}); */
	$('#masthead .hgroup').fitText(3, { minFontSize: '10px', maxFontSize: '36px' });
	$('.toolbar').fitText(.8, { minFontSize: '9px' });
	$('.icon-arrow-right').fitText(.1, { minFontSize: '14px', maxFontSize: '22px' });
	$('.section-title, .page.hentry .entry-title, .widget-title, .page-title').fitText(1.6, { minFontSize: '24px' });
	$('.more').append('<span class="icon-more"></span>');
	$('.menu-main-nav-container').fitText(3, { minFontSize: '12px', maxFontSize: '15px' });
});