$(document).ready(function($){
  

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



