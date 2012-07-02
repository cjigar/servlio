$(document).ready(function() {
    
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
            vCompanyLogo:{
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
            /*iCurrencyId:{
                required:true
            },*/                                
            fPrice:{
                required:true
            },
            vEmail:{
                required:true,
                email:true
            }
        
        },
        /*
        showErrors: function(errorMap, errorList) {
            //console.log(errorList);console.log(errorMap);
            if (errorList.length < 1) {
                // clear the error if validation succeeded
                $('label.err').remove();
                return;
            }
            
            console.log(errorList);
            
            $.each(errorList, function(index, error) {
                if($(error.element).attr("name") == "vImage") {
                    $('.image').css({color:'#F00'});
                } else if($(error.element).attr("name") == "vCompanyLogo") {
                    $('.vCompanyLogo').css({color:'#F00'});    
                } else {
                    $(error.element).addClass('err');
                }
                $(error.element).next('label.err').remove();
            });
        },
        */
        errorPlacement:function(error, element) {
            /*if(element.attr("name") == "vCountry") {
                $('#country_err').show();
            }
            if(element.attr("name") == "vState") {
                $('#state_err').show();
            }
            if(element.attr("name") == "vCity") {
                $('#city_err').show();
            } 
            */
            if($(element).attr("name") == "vImage") {
                 $('.image').css({color:'#F00'});
            }
            if($(element).attr("name") == "vCompanyLogo") {
                    $('.vCompanyLogo').css({color:'#F00'});    
            }
            error.appendTo(element);
            //$('div.err').hide();
            //error.appendTo( element.parent("td").next("td") );
            //$(element).next('div.err').first().hide();
            
        }
    });
    $('#sbmtButton').click(function(){
        $("#frmadd").submit();
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
    $("#vCompanyName").keydown(function(){
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
        $('#listing_card_small_location').html($('#vCity').val()+","+$('#vCountryCode option:selected').text());
    });
    $("#iServiceId").change(function() {
        if($.trim($('#iServiceId option:selected').text())=='') {
            $('#listing_card_small_profession').html('Services');
        } else {
            $('#listing_card_small_profession').html($('#iServiceId option:selected').text());
        }
    });
    
    $("#vServiceName").keydown(function(){
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
    
    $("#fPrice").keydown(function(){
        if($.trim($(this).val())=='') {
            $('#listing_card_large_price_num_small').html('0');
        } else {
            $('#listing_card_large_price_num_small').html($(this).val());
        }
    });
    
/*
    $('#vImage').uploadify({
        'swf':site_url+"js/uploadify/uploadify.swf",
        'uploader':site_url+"/users/uploadfile",
        'folder':'uploads/tmp',
        'multi': false,
        'auto': true,
        'fileExt': '*.jpg;*.jpeg;*.png;*.gif',
        'buttonText': 'Browse...',
        'cancelImg': '/svn/handinhand/assets/js/uploadify/cancel.png'
    });
    */
    
});
                