jQuery(document).ready(function($){

	var localDev = true;

	if(localDev == true) {
		loadReload();
	}
	
	$('#mobile-menu').mmenu({
		panelNodetype: 'div',
		offCanvas: {position: 'right'},
		slidingSubmenus: false,
	});
	
	$('#grid').mediaBoxes({
		boxesToLoadStart: 1000,
	});
	
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: 'slide',
			directionNav: false,
			touch: false,
		});
	});
	
	$('#user_login').attr( 'placeholder', 'Username' );
	$('#user_pass').attr( 'placeholder', 'Password' ); 
	
	// Remove add to cart option from WooCommerce WishList dropdown
	$('option[value="add-to-cart"]').remove();
	
	$('.filter-group').click(function(e) {
		if ($(this).hasClass('open')) {
			$(this).find('.sub-filters').slideUp();
			$(this).removeClass('open');
			$(this).find('.fa').removeClass('fa-angle-down').addClass('fa-angle-right');
		} else {
			$(this).find('.sub-filters').slideDown();
			$(this).addClass('open');
			$(this).find('.fa').removeClass('fa-angle-right').addClass('fa-angle-down');
		}
		
	});
	
	$('.close_btn').click(function(){
		
	});
	
	//Locator Form
	$('.js-enter_zip').click(function(e){
		e.preventDefault();
		var zip = $(this).siblings('.js-input_zip').val();
		var newUrl = "/store-locator?addressInput="+zip;
		window.location = newUrl;
	});
	
	$('.fancybox').fancybox({
	});
	
	function occasionUrl() {
		var pathname = window.location;
		var pathSearch = pathname.hash;
		if (pathSearch.indexOf('#') > -1) {
			var occasion = pathSearch.split("#").pop().split("&").shift().split("/").shift();
			var filter = 'a[data-filter=".'+occasion+'"]';
			//console.log(filter);
			$(filter).trigger('click');
			$('.occasion-filter').find('.sub-filters').slideDown();
			$('.occasion-filter').addClass('open');
			$('.occasion-filter').find('.fa').removeClass('fa-angle-right').addClass('fa-angle-down');
		}
	}
	occasionUrl();
	
	$('.js-occasion').click(function(e) {
		e.preventDefault();
		var path = window.location;
		var pathName = path.pathname;
		var anchor = $(this).find('a').attr('href').split("#").pop();
		//console.log(anchor);
		if (pathName.indexOf('shop-occasion') > -1) {
			var filter = 'a[data-filter=".'+anchor+'"]';
			//console.log(filter);
			$(filter).trigger('click');
			$('.occasion-filter').find('.sub-filters').slideDown();
			$('.occasion-filter').addClass('open');
			$('.occasion-filter').find('.fa').removeClass('fa-angle-right').addClass('fa-angle-down');
		} else {
			window.location = $(this).find('a').attr('href');
		}
	})
	
});