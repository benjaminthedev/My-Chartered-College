jQuery(document).ready(function($) {

	/* Added cookie law functionality.
	window.addEventListener("load", function(){
	window.cookieconsent.initialise({
	  "palette": {
	    "popup": {
	      "background": "#1b2342",
	      "text": "#ffffff"
	    },
	    "button": {
	      "background": "#ee7ea0",
	      "text": "#ffffff"
	    }
	  },
	  "content": {
	    "message": "This website uses cookies to ensure you get the best experience.",
	    "link": "Find out more",
	    "href": "https://my.chartered.college/privacy/"
	  }
	})}); */


	/* Simple accordion. */
	var allPanels = $('.accordion > dd').hide();
    
	$('.js-accordion > dt > a').click(function() {
		$('.js-accordion > dt > a').removeClass('active');
		$('i', this).toggleClass('fa-chevron-down');
		$('i', this).toggleClass('fa-chevron-up');
		$(this).parent().next().slideToggle();
		return false;
	});


	// Modal button.
	$('.js-modal-btn').modalVideo();
	$(".js-modal-btn-vimeo").modalVideo({channel:'vimeo'});


	// Add a subtle fade-in effect to pages.
	$('body').fadeIn(1000);


	// Add a subtle fade-out effect when links are clicked.
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
        $('body').fadeOut(1000);
    });

	// Generic tabs used in various locations across the site.
	// These tabs require one tab-container always being on show by default.
	// I.e. it's not possible to close all tabs.
	// Used on popular posts on front-page.php
	$('.js-tabs li').click(function(){

		// Get the data attr of the clicked item.
		var tab_id = $(this).attr('data-tab');

		// Remove the current class from all tabs.
		$('.js-tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		// Add the current class to the tabe header and tab content.
		$(this).addClass('current');
		$('#'+tab_id).addClass('current');
	})

	// A slightly different set of tabs. These allow all tabs to be closed.
	// Used on post filtering.
	$('.js-reveal li').click(function() {

		// Get the data attr of the clicked item.
		var reveal_id = $(this).attr('data-reveal');
		$('.js-reveal li').removeClass('active');
		$('.js-reveal li').addClass('disabled');

		if ( $('#'+reveal_id).hasClass('hidden') ) {
			$(this).removeClass('disabled');
			$(this).addClass('active');
			
			// If the clicked item has a class of hidden,
			// Hide all .reveal-content blocks.
			// Remove the hidden class from the targetted item and add visible
			$('.reveal-content').removeClass('visible').addClass('hidden');
			$('#'+reveal_id).removeClass('hidden').addClass('visible');

		} else {
			$('.js-reveal li').removeClass('disabled');
			$(this).removeClass('active');

			// If the clicked item has a class of visible.
			// Hide all .reveal-content blocks including the targetted one.
			$('.reveal-content').removeClass('visible').addClass('hidden');
		}
	});

	// A carousel used for the featured video block.
	$('.js-featured-video').owlCarousel({
		items: 1,
		nav: true,
		autoplay: false,
		loop: true,
		dots: true,
		animateOut: 'fadeOut',
		mouseDrag: false,
		navText: [''],
	});

	// A carousel used for article lists.
	$('.js-articles-list').owlCarousel({
		items: 4,
		nav: true,
		autoplay: false,
		loop: true,
		dots: false,
		margin: 30,
		animateOut: 'fadeOut',
		responsiveClass:true,
		autoHeight: false,
		navText: [''],
	    responsive: {
	        0: {
	            items:1,
	        },
	        768: {
	            items:4,
	        },
	    }
	});

	// Toggle the references block when the references link is clicked.
	$('.js-toggle-references').click(function() {
		$('.references__toggle').toggleClass('active');
		$('.references__list').slideToggle();
	});

	// Toggle the searchform on click.
	$('.js-search-toggle').click(function(){
		$('.search-bar').toggle();
	});
	
});


// When posts are refreshed by filtering, fire matchHeight again
// to ensure everything still matches.
jQuery(document).on('facetwp-loaded', function() {
	jQuery('.post').matchHeight({
		byRow: false,
	});
});


jQuery(document).on('facetwp-refresh', function() {
	jQuery('.post').matchHeight({
		byRow: false,
	});
});


// To eliminate any issues with matchHeight,
//force it to fire when the window is resized.
jQuery(window).load(function() {

	// Fire matchHeight with JS here as we want to include some options
	// that can't be done using the data-mh attribute.

	jQuery('.post').matchHeight({
		byRow: true,
	});

});

// To eliminate any issues with matchHeight,
//force it to fire when the window is resized.
jQuery(window).resize(function() {

	// Fire matchHeight with JS here as we want to include some options
	// that can't be done using the data-mh attribute.

	jQuery('.post').matchHeight({
		byRow: true,
	});


});