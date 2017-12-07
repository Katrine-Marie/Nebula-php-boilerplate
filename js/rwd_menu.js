$(function(){
	
	// test browser width in different browsers
	function getWidth() {
		if (self.innerHeight) {
			return self.innerWidth;
		}

		if (document.documentElement && document.documentElement.clientWidth) {
			return document.documentElement.clientWidth;
		}

		if (document.body) {
			return document.body.clientWidth;
		}
	}
	
	// creates mobile navigation
	function mobileNav(){
		$('.main-navigation').addClass('mobile-nav');
			
		// if buttons with a class of show-nav and hide-nav don't exist, add them
		var showNav = $('.main-navigation').children('button.show-nav');
		if(showNav.length === 0){
			$('.main-navigation').append('<button class="show-nav">Menu</button>');
		}
		var hideNav = $('.site-menu').children('button.hide-nav');
		if(hideNav.length === 0){
			$('.site-menu').prepend('<button class="hide-nav">Close</button>');
		}
	}
	
	// if browser window is smaller than 960px and no resize event has fired, 
	// meaning that the browser loads in a small window
	if(getWidth() <= 960){
		mobileNav();
		
		$('button.show-nav').on('click', function(){
			$('.main-navigation').addClass('expanded');
			$('body').css({'height':'100vh', 'overflow-y':'hidden'});
		});
		$('button.hide-nav').on('click', function(){
			$('.main-navigation').removeClass('expanded');
			$('body').css({'height':'auto', 'overflow-y':'visible'});
		});
	}
	
	// test if window has been resized
	$(window).resize(function() {
		
		// if browser window is smaller than 960px
		if(getWidth() <= 960){
			mobileNav();
			
			$('button.show-nav').on('click', function(){
				$('.main-navigation').addClass('expanded');
				$('body').css({'height':'100vh', 'overflow-y':'hidden'});
			});
			$('button.hide-nav').on('click', function(){
				$('.main-navigation').removeClass('expanded');
				$('body').css({'height':'auto', 'overflow-y':'visible'});
			});
			
		}
		// if browser window is larger than 960px
		else {
			$('.main-navigation').removeClass('mobile-nav');
			$('.main-navigation').removeClass('expanded');
			$('button.show-nav').remove();
			$('button.hide-nav').remove();
			
		}
		
	}); // end of resize function
	
	// setting up scroll variables
	var $window = $(window);
	var $slideIn = $('.main-navigation');
	var slideZone = $('.site-content').offset().top - $window.height() + 550;
	
	// make the menu stick to the top of the screen on scroll
	$window.on('scroll', function() {
		if (slideZone < $window.scrollTop()) {
			$slideIn.css('position','fixed');
			$slideIn.animate({
				'top': '5px'
			}, 300);
		} else {
			$slideIn.stop(true).animate({
				'top': '-70px'
			}, 300);
			$slideIn.css('position','static');
		}
	});
	
}); // end of document ready