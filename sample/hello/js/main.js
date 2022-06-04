(function($) {
	"use strict";

	$(window).on('load', function() {
	    $('.preloader').fadeOut('slow', function() {
	        $('.preloader-left').addClass('slide-left');
	    });

	    $('#lionhero').owlCarousel({
	        animateOut: 'fadeOut',
	        nav: true,
	        navText: [
	            '<i class="ion-ios-arrow-thin-left"></i>',
	            '<i class="ion-ios-arrow-thin-right"></i>'
	        ],
	        items: 1,
	        navSpeed: 400,
	        loop: true,
	        autoplay: true,
	        autoplayTimeout: 4000,
	        autoplayHoverPause: true,
	    });

	    $('#liontextslider').owlCarousel({
	        nav: false,
	        items: 1,
	        navSpeed: 400,
	        loop: true,
	        autoplay: true,
	        autoplayTimeout: 4000,
	        autoplayHoverPause: true,
	    });

	    $('#liontestimonial').owlCarousel({
	        nav: true,
	        navText: [
	            '<i class="ion-ios-arrow-thin-left"></i>',
	            '<i class="ion-ios-arrow-thin-right"></i>'
	        ],
	        items: 1,
	        navSpeed: 400,
	        loop: true,
	        autoplay: true,
	        autoplayTimeout: 4000,
	        autoplayHoverPause: true,
	    });

	    //Portfolio masonry
	    var $container = $('#portfolio-container');
	    $container.isotope({
	        masonry: {
	            columnWidth: '.portfolio-item'
	        },
	        itemSelector: '.portfolio-item'
	    });
	    $('#filters').on('click', 'li', function() {
	        $('#filters li').removeClass('active');
	        $(this).addClass('active');
	        var filterValue = $(this).attr('data-filter');
	        $container.isotope({ filter: filterValue });
	    });
	});

	// Typing Animation (Typed.js)
	var element = $('#element');
	element.typed({
	    strings: element.data('string'),
	    typeSpeed: 0,
	    loop: true,
	    startDelay: 500,
	    backDelay: 3000,
	    contentType: 'html',
	});

	//Video background
	$('.player').mb_YTPlayer({
	    containment: '#video-wrapper',
	    mute: true,
	    showControls: false,
	    quality: 'default',
	    startAt: 5
	});

	$(document).on('click','.open-sidebar',function(){
        $('aside').toggleClass('show');
        $(this).toggleClass('active');
        $('.content-blocks').toggleClass('hide-overflow');
    });

	$(document).on('click','.mobile-menu',function(){
        $('.inline-menu').toggleClass('active');
    });
	
	$('input[type="submit"]').replaceWith('<button type="submit" class="btn">' + $('input[type="submit"]').val() +'</button>');

	
	//start ajaxify

	//Click on Menu Block element of home page
	$(document).on('click','.menu-blocks a',function(e){ 
	  	e.preventDefault();
	  	var pageurl = $(this).attr('href');   
	  	if(pageurl!=window.location){
			window.history.pushState({path:pageurl},'',pageurl);
			$('#page-content-block').addClass('content-blocks');
    		$('#page-content').addClass('content');
    		$('.name-block').addClass('reverse');
        	$('.name-block-container').addClass('reverse');
        	$('.inline-menu-container').show();
        	$('.menu-blocks').hide();
			$('.menu-item').removeClass('current-menu-item');
			$('a[href="'+pageurl+'"]').parent().addClass('current-menu-item');
		    loadPageContent(pageurl);
		}
	});

	//Inline menu link
	$(document).on('click','.inline-menu a',function(e){ 
	  	e.preventDefault();
	  	$('.inline-menu').removeClass('active');
	  	var pageurl = $(this).attr('href');   
	  	if(pageurl!=window.location){
			window.history.pushState({path:pageurl},'',pageurl);
			$('#page-content-block').addClass('content-blocks');
    		$('#page-content').addClass('content');
			$('body').removeClass('menu2');
	        if ($(window).width() > 767) {
	          $('.inline-menu-container').removeClass('style2');
	        }
	        $('.status').show();
			$('.menu-item').removeClass('current-menu-item');
			$('a[href="'+pageurl+'"]').parent().addClass('current-menu-item');
		    loadPageContent(pageurl);
		}
	});

	//category & tag page, single post, single post navigation. comment pagination, single portfolio, portfolio category
	$(document).on('click','.post-catetory a, .open-post, .post-nav a, .comment-pagination a, .open-project, .tags a, .project-nav a',function(e){ 
	  	e.preventDefault();
	  	var pageurl = $(this).attr('href');   
	  	if(pageurl!=window.location){
			window.history.pushState({path:pageurl},'',pageurl);
			$('.menu-item').removeClass('current-menu-item');
			$('a[href="'+pageurl+'"]').parent().addClass('current-menu-item');
		    loadPageContent(pageurl);
		}
	});

	//blog page and page break pagination
	$(document).on('click','.pagination a',function(e){ 
	  	e.preventDefault();
	  	var pageurl = $(this).attr('href');   
	  	if(pageurl!=window.location){
			window.history.pushState({path:pageurl},'',pageurl);
		    loadPageContent(pageurl);
		}
	});

	//browser next and prev button
	window.addEventListener('popstate', function(event) {
	    if (event.state) {
	        var pageurl = location.href;
			$('.menu-item').removeClass('current-menu-item');
			$('a[href="'+pageurl+'"]').parent().addClass('current-menu-item');
	        loadPageContent(pageurl);
	    }
	}, false);

	function loadPageContent(pageurl) {
		$('.content').removeClass('animated fadeIn');
		$('.content').empty();
	    $('.content').load(pageurl + ' .content > *', function(c){
	    	var pagetitle = c.match(/<title[^>]*>([^<]+)<\/title>/)[1];
	    	$('head title').html(pagetitle);
		    if ($('#liontestimonial').length > 0) { 
			    $('#liontestimonial').owlCarousel({
			        nav: true,
			        navText: [
			            '<i class="ion-ios-arrow-thin-left"></i>',
			            '<i class="ion-ios-arrow-thin-right"></i>'
			        ],
			        items: 1,
			        navSpeed: 400,
			        loop: true,
			        autoplay: true,
			        autoplayTimeout: 4000,
			        autoplayHoverPause: true,
			    });
			}
		    if ($('#portfolio-container').length > 0) { 
		    	var $container = $('#portfolio-container');
		        $container.imagesLoaded(function(){
				    $container.isotope({
				        masonry: {
				            columnWidth: '.portfolio-item'
				        },
				        itemSelector: '.portfolio-item'
				    });
		        });
			    $('#filters').on('click', 'li', function() {
			        $('#filters li').removeClass('active');
			        $(this).addClass('active');
			        var filterValue = $(this).attr('data-filter');
			        $container.isotope({ filter: filterValue });
			    });
			}
		    if ($('.wpcf7-form').length > 0) { 
    			wpcf7.initForm( $('.wpcf7-form') );
			}
		    if ($('#map').length > 0) { 
		    	eval($('#map').data('mapjs'));
			}
			if ($('#menu-block-js').length > 0) { 
		    	eval($('#menu-block-js').data('menu-block-js'));
			}
			$('.content').addClass('animated fadeIn');
	    });
	}
	//end ajaxify

})(jQuery);