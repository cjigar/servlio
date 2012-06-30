$(document).ready(function($){
  

  //alert(keyparam);
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
  $("#cat_services").hide();
  $("#iCategoryId").click(function() {					  
      $("#cat_services").fadeIn("fast");
  });  	
  $("#iCategoryId").change(function() {
				  
      $.post('home/getService',{
          iCategoryId:$(this).val()
          },function(res){
        
          $("#iServiceId").html(res);
          $('#iServiceId option:first').attr('selected', 'selected');
          $("#iServiceId").trigger('change');
      });
  });	
    function split( val ) {
        return val.split( /,\s*/ );
    }
    function extractLast( term ) {
        return split( term ).pop();
    }    
    $( "#vCity" ).bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).data( "autocomplete" ).menu.active ) {
            event.preventDefault();
        }
    })
    .autocomplete({
        source: function( request, response ) {
            $.getJSON( "home/city_suggestions", {
                term: extractLast( request.term ),
                vCountryCode:$('#vCountryCode').val()
            }, response );
        },
        search: function() {
            // custom minLength
            var term = extractLast( this.value );
            if ( term.length < 2 ) {
                return false;
            }
        },
        focus: function() {
            // prevent value inserted on focus
            return false;
        },
        select: function( event, ui ) {
            this.value = ui.item.value;
            $('#iCityId').val(ui.item.id);
            return false;
        }
    });
    $('#search_text').keydown(function (e){
        if(e.keyCode == 13){
            window.location = "?search_text="+$(this).val();
        }
    })    
    $('#country_active').click(function(){
        if($('#vCountryCode').val()!="") {  
            str_var = "?country="+$('#vCountryCode').val();
        }
        if($('#iCityId').val()!="") {
            str_var += "&city="+$('#iCityId').val();
        }
        window.location = str_var; 
    });
    $('#popular_service, #iServiceId, #budget_select').change(function(){
        if($(this).attr("id")=="popular_service" || $(this).attr("id")=="iServiceId") {
            window.location = "?service_id="+$(this).val();
        }  else if($(this).attr("id")=="budget_select") {
            window.location = "?budget_select="+$(this).val();
        } 
    })
    $('.popup_finish_btn').live("click",function(){
          iCompanyServiceId = $(this).attr("id");
          ids = iCompanyServiceId.split("_");
          $.post('home/AddToFavorite',{
              iCompanyServiceId:ids[1]
              },function(res){
              $('#'+iCompanyServiceId).removeClass("popup_finish_btn").addClass("popup_finish_btn_fav");
              $('#'+iCompanyServiceId).html(res);
          });
    }); 	
});



