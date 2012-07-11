$(document).ready(function() {

    $("#frmnewservice").validate({
        rules:{
            iCategoryId:{
                required:true
            },
            iServiceId : {
                required: function(){
                    if($("#iServiceId").val()!='')
                        return 1;
                        
                    if($("#vServiceName").val()!='')
                        return 1;
                }
            },
            vServiceName : {
                required: function(){
                    if($("#iServiceId").val()!='')
                        return 1;
                        
                    if($("#vServiceName").val()!='')
                        return 1;
                }
            }, 
            iCompanyLocationId : {
                required:true
            },
                                                    
            vDescription:{
                required:true
            },
            fPrice : {
                required:true
            }
            
        },
        errorPlacement:function(error, element) {
            
            if($(element).attr("name") == "vImage") {
                $('.image').css({
                    color:'#F00'
                });
                $("#vImage").next().remove();
                $("#vImage").removeClass('err');
            } else   {
                error.appendTo(element);
            }

        }
    });
    $('#sbmtButton').click(function(){
        $("#frmnewservice").submit();
    });
    
    $("#iCompanyLocationId").change(function(){
        var val = $(this).find(':selected').text().split(",");
        $("#listing_card_large_location").html($.trim(val[0]));
        $("#listing_card_large_location2").html($.trim(val[1]));
    });
    
    
    $("#vDescription").bind('keyup', function() {
        var characterLimit = 280;
        var charactersUsed = $(this).val().length;
        if(charactersUsed > characterLimit){
            charactersUsed = characterLimit;
            $(this).val($(this).val().substr(0,characterLimit));
            $(this).scrollTop($(this)[0].scrollHeight);
        }
        $("#listing_card_large_description").html($(this).val());
        var charactersRemaining = characterLimit - charactersUsed;
        $("#desc_count").html(charactersRemaining);
    }); 

    
});

$(function() {
    function split( val ) {
        return val.split( /,\s*/ );
    }
    function extractLast( term ) {
        return split( term ).pop();
    }

    $("#iCategoryId").change(function() {					  
        $.post('users/getService',{
            iCategoryId:$(this).val()
        },function(res){
            $("#cat_services").show();            
            $("#iServiceId").html(res);
            $('#iServiceId option:first').attr('selected', 'selected');
            $("#iServiceId").trigger('change');
        });
    });
    
    $("#iServiceId").change(function() {
        if($.trim($('#iServiceId option:selected').text())=='') {
            $('#listing_card_large_profession').html('Services');
        } else {
            $('#listing_card_large_profession').html($('#iServiceId option:selected').text());
        }
        
        if($(this).val()=='-1') {
            $("#not_listed").fadeIn('fast');
        } else {
            $("#not_listed").fadeOut('fast');
        }
    });
    
    $("#vServiceName").keyup(function(){
        if($.trim($(this).val())=='') {
            $('#listing_card_large_profession').html('Services');
        } else {
            $('#listing_card_large_profession').html($(this).val());
        }
    });
    
    $("#iCurrencyId").change(function(){
        //alert($('#iCurrencyId option:selected').length)
        if($.trim($('#iCurrencyId option:selected').text())=='') {
            $('#listing_card_large_price_currency').html('£');
        } else {
            $('#listing_card_large_price_currency').html($('#iCurrencyId option:selected').attr('data-symbol'));
        }
    });
    
    $("#fPrice").keyup(function(){
        if($.trim($(this).val())=='') {
            $('#listing_card_large_price_num').html('0.00');
        } else {
            
            $('#listing_card_large_price_num').html($(this).val());
        }
    });
    
});

