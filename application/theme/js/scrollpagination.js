/*
**	Anderson Ferminiano
**	contato@andersonferminiano.com -- feel free to contact me for bugs or new implementations.
**	jQuery ScrollPagination
**	28th/March/2011
**	http://andersonferminiano.com/jqueryscrollpagination/
**	You may use this script for free, but keep my credits.
**	Thank you.
*/
var ajaxreq;
(function( $ ){
	 
		 
 $.fn.scrollPagination = function(options) {
  	
		var opts = $.extend($.fn.scrollPagination.defaults, options);  
		var target = opts.scrollTarget;
		if (target == null){
			target = obj; 
	 	}
		opts.scrollTarget = target;
	 
		return this.each(function() {
		  $.fn.scrollPagination.init($(this), opts);
		});

  };
  
  $.fn.stopScrollPagination = function(){
	  return this.each(function() {
	 	$(this).attr('scrollPagination', 'disabled');
	  });
	  
  };
  
  $.fn.scrollPagination.loadContent = function(obj, opts){
	 var target = opts.scrollTarget;
	 var mayLoadContent = $(target).scrollTop()+opts.heightOffset >= $(document).height() - $(target).height();
	 if (mayLoadContent){
		 if (opts.beforeLoad != null){
			opts.beforeLoad(); 
		 }
		 $(obj).children().attr('rel', 'loaded');
		 
     if(ajaxreq && ajaxreq.readyState != 4){
        return false;
     }

    		 ajaxreq = $.ajax({
    			  type: 'POST',
    			  url: opts.contentPage,
    			  data: {'page':$('#currpage').val(),'search_text':$('#selected_text').val(),'service_id':$('#selected_service').val(),'country':$('#selected_country').val(),'city':$('#selected_city').val(),'budget_select':$('#selected_budget').val()},
    			  success: function(data){
            if(data=="0") {
                $('#ajax_content').stopScrollPagination();
                $('#card_loader').fadeOut();
                return false;
            }
    			  $('#currpage').val(parseInt($('#currpage').val())+1);
    				$(obj).append(data); 
    				var objectsRendered = $(obj).children();
    				
    				if (opts.afterLoad != null){
    					opts.afterLoad(objectsRendered);	
    				}
    			  },
    			  dataType: 'html'
    		 });
     }
	 
	 
  };
  
  $.fn.scrollPagination.init = function(obj, opts){
	 var target = opts.scrollTarget;
	 $(obj).attr('scrollPagination', 'enabled');
	
	 $(target).scroll(function(event){
		if ($(obj).attr('scrollPagination') == 'enabled'){
	 		$.fn.scrollPagination.loadContent(obj, opts);		
		}
		else {
			event.stopPropagation();	
		}
	 });
	 
	 $.fn.scrollPagination.loadContent(obj, opts);
	 
 };
	
 $.fn.scrollPagination.defaults = {
      	 'contentPage' : null,
     	 'contentData' : {},
		 'beforeLoad': null,
		 'afterLoad': null	,
		 'scrollTarget': null,
		 'heightOffset': 0		  
 };	
})( jQuery );

	// code for fade in element by element with delay
	$.fn.fadeInWithDelay = function(){
		var delay = 0;
		return this.each(function(){
			$(this).delay(delay).animate({opacity:1}, 200);
			delay += 100;
		});
	};