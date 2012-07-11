$(document).ready(function() {
    jQuery.validator.messages.required = "";
    $("#frmadd").validate({
        rules:{
            vCompanyName:{
                required:true
            },
            vCountryCode:{
                required:true
            },
            vState:{
                required:true
            },
            vCity:{
                required:true
            },
            iCategoryId:{
                required:true
            },
            iServiceId:{
                required:true
            },
            vImage:{
                required:true
            },
            vDescription:{
                required:true
            },
            fPrice:{
                required:true,
                number:true
            },
            vEmail:{
                required:true,
                email:true,
                isexist : true
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
        $("#frmadd").submit();
    });
    jQuery.validator.addMethod("isexist", function(value, element) { 
        var isSuccess = false;
        $.ajax({
            url:'users/userExist',
            data:{
                email:value
            },
            async: false, 
            success : function(res){
                //console.log((res=="1"));
                isSuccess = (res=="1")?1:0;
            }
        });
        //console.log(isSuccess)
        return isSuccess;
    }, "Email already exists !!");
    
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
    }); 
    
    
});

$(function() {
    function split( val ) {
        return val.split( /,\s*/ );
    }
    function extractLast( term ) {
        return split( term ).pop();
    }

    $( "#vState" )
    // don't navigate away from the field on tab when selecting an item
    .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).data( "autocomplete" ).menu.active ) {
            event.preventDefault();
        }
    })
    .autocomplete({
        source: function( request, response ) {
            $.getJSON( "users/state_suggestions", {
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
            $('#vStateCode').val(ui.item.id);
           
            return false;
        }
    });
    
    $( "#vCity" )
    // don't navigate away from the field on tab when selecting an item
    .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).data( "autocomplete" ).menu.active ) {
            event.preventDefault();
        }
    })
    .autocomplete({
        source: function( request, response ) {
            $.getJSON( "users/city_suggestions", {
                term: extractLast( request.term ),
                vStateCode:$('#vStateCode').val(),
                vCountryCode:$('#vCountryCode').val()
            }, response );
        },
        search: function() {
            // custom minLength
            var term = extractLast( this.value );
            if ( term.length < 1) {
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
            $('#listing_card_small_location').html($('#vCity').val()+",&nbsp;"+$('#vCountryCode option:selected').text());
            return false;
        }
    });
    $("#iCategoryId").change(function() {					  
        $.post('users/getService',{
            iCategoryId:$(this).val()
        },function(res){
          
            $("#iServiceId").html(res);
            $('#iServiceId option:first').attr('selected', 'selected');
            $("#iServiceId").trigger('change');
        });
    });
    $("#iServiceId").change(function(){
        if($(this).val()=='-1') {
            $("#not_listed").fadeIn('fast');
        } else {
            $("#not_listed").fadeOut('fast');
        }
    });
    
    
    //Side Template Filling
    $("#vCompanyName").keyup(function(){
        if($.trim($(this).val())=='') {
            $('#listing_card_small_name').html('Company name');
        } else {
            $('#listing_card_small_name').html($(this).val());
        }
    });
    
    $("#vCountryCode").change(function(){
        $("#vCountry").val($("#vCountryCode :selected").text());
        if($(this).val()=='US') {
            $("#vState").fadeIn('fast');
        } else {
            $("#vState").fadeOut('fast');
        }
            
            
        if($.trim($('#vCountryCode option:selected').text())=='') {
            $('#listing_card_small_location').html('Headquarters');
        } else {
            $('#listing_card_small_location').html($('#vCountryCode option:selected').text());
        }
    });
    $("#vCity").change(function(){
        // $('#listing_card_small_location').html($('#vCity').val()+","+$('#vCountryCode option:selected').text());
        });
    $("#iServiceId").change(function() {
        if($.trim($('#iServiceId option:selected').text())=='') {
            $('#listing_card_small_profession').html('Services');
        } else {
            $('#listing_card_small_profession').html($('#iServiceId option:selected').text());
        }
    });
    
    $("#vServiceName").keyup(function(){
        if($.trim($(this).val())=='') {
            $('#listing_card_small_profession').html('Services');
        } else {
            $('#listing_card_small_profession').html($(this).val());
        }
    });
    
    $("#iCurrencyId").change(function(){
        //alert($('#iCurrencyId option:selected').length)
        if($.trim($('#iCurrencyId option:selected').text())=='') {
            $('#listing_card_large_price_currency_small').html('£');
        } else {
            $('#listing_card_large_price_currency_small').html($('#iCurrencyId option:selected').attr('data-symbol'));
        }
    });
    
    $("#fPrice").keyup(function(){
        if($.trim($(this).val())=='') {
            $('#listing_card_large_price_num_small').html('0');
        } else {
            var intRegex = /^\d+$/;
            var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;
            var str = $(this).val();
            if(intRegex.test(str) || floatRegex.test(str)) {
                $('#listing_card_large_price_num_small').html(str);
            }     
        }
    });
    
});

