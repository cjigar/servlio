$(document).ready(function($){
	$('#ajax_content').scrollPagination({
		'contentPage': 'home/homepage_ajax', // the page where you are searching for results
		'contentData': {'page':$('#currpage').val()}, // you can pass the children().size() to know where is the pagination
		'scrollTarget': $(window), // who gonna scroll? in this example, the full window
		'heightOffset': 100, // how many pixels before reaching end of the page would loading start? positives numbers only please
		'beforeLoad': function(){ // before load, some function, maybe display a preloader div
			$('#loading').fadeIn();	
		},
		'afterLoad': function(elementsLoaded){ // after loading, some function to animate results and hide a preloader div
			 $('#card_loader').fadeOut();
			 var i = 0;
			 $(elementsLoaded).fadeInWithDelay();
		}
	});
});