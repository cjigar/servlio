$(document).ready(function() {

    $("#frmeditservice").validate({
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
            vImage : {
                mainimage : true
                
            },
            iCurrencyId:{
                required:true
            },                                         
            vDescription:{
                required:true
            },
            fPrice : {
                required:true
            }
            
        },
        errorPlacement:function(error, element){
            error.appendTo(element);                                                               
        }
    });
    
    $.validator.addMethod("mainimage", 
        function(value, element) {
            return ($("#vOldImage").val()) ? 1 :0;
        });
    
    $('#sbmtButton').click(function(){
        $("#frmeditservice").submit();
    });
    $("#vDescription").bind('keyup', function() {
        var characterLimit = 280;
        var charactersUsed = $(this).val().length;
        if(charactersUsed > characterLimit){
            charactersUsed = characterLimit;
            $(this).val($(this).val().substr(0,characterLimit));
            $(this).scrollTop($(this)[0].scrollHeight);
        }
        var charactersRemaining = characterLimit - charactersUsed;
        $("#signup_subtitle > span").html(charactersRemaining);
        $("#listing_card_large_description").html($(this).val());
    }); 
    
    
    $("#vCountryCode").change(function(){
        $("#vCountry").val($("#vCountryCode :selected").text());
        if($(this).val()=='US') {
            $("#vState").fadeIn('fast');
        } else {
            $("#vState").fadeOut('fast');
        }
        if($.trim($('#vCountryCode option:selected').text())=='') {
            $('#listing_card_large_location').html('Headquarters');
        } else {
            $('#listing_card_large_location').html($('#vCountryCode option:selected').text());
        }
    });
    $("#vCity").change(function(){
        $('#listing_card_large_location').html($('#vCity').val()+","+$('#vCountryCode option:selected').text());
    });
    $("#iServiceId").change(function() {
        if($.trim($('#iServiceId option:selected').text())=='') {
            $('#listing_card_large_profession').html('Services');
        } else {
            $('#listing_card_large_profession').html($('#iServiceId option:selected').text());
        }
    });
    
    $("#vServiceName").keydown(function(){
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
    
    $("#fPrice").keydown(function(){
        if($.trim($(this).val())=='') {
            $('#listing_card_large_price_num').html('0.00');
        } else {
            
            $('#listing_card_large_price_num').html($(this).val());
        }
    });
});

         