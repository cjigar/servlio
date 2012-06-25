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
            /*iCityId:{
              required:true
            },*/
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
            }/*,
            vDescription:{
                required:true
            }*/,
            iCurrencyId:{
                required:true
            },                                
            fPrice:{
                required:true
            },                                         
            vEmail:{
                required:true,
                email:true
            },
            fPrice:{
                required:true
            }
        /*,
            vWebSite:{
                required:true
            },
            vTwitter:{
                required:true
            },
            vPhone:{
                required:true
            }*/
        },
        messages:{
            vCompanyName:{
                required:"Please enter company name"
            },
            vCountryCode:{
                required:"Please select country"
            },
            vState:{
                required:"Please select state"
            },
            /*iCityId:{
                required:"Please select city"
            },*/
            vCompanyLogo:{
                required:"Please upload company logo"
            },
            iCategoryId:{
                required:"Please select category"
            },
            iServiceId:{
                required:"Please select service"
            },
            vImage:{
                required:"Please select service image"
            },
            vDescription:{
                required:"Please enter description"
            },
            iCurrencyId:{
                required:"Please select currency"
            },                                
            fPrice:{
                required:"Please enter price"
            },                                         
            vEmail:{
                required:"Please enter email",
                email:"Please enter proper email"
            },
            vWebSite:{
                required:"Please enter website"
            },
            vTwitter:{
                required:"Please enter your twitter url"
            },
            vPhone:{
                required:"Please enter your phone"
            }
        },
        errorPlacement:function(error, element){
            if(element.attr("name") == "vCountry") {
                $('#country_err').show();
                error.appendTo("#country_err");
            }
            if(element.attr("name") == "vState") {
                $('#state_err').show();
                error.appendTo("#state_err");
            }
            if(element.attr("name") == "vCity") {
                $('#city_err').show();
                error.appendTo("#city_err");
                error.css("padding-left","10px");
            }                                                                
        }
    });
    $('#sbmtButton').click(function(){
        $("#frmadd").submit();
    })
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
    $("#vCompanyName").focusout(function(){
        if($.trim($(this).val())=='') {
            $('#listing_card_small_name').html('Company name');
        } else {
            $('#listing_card_small_name').html($(this).val());
        }
    });
    
    $("#vCountryCode").change(function(){
        
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
    
    $("#iServiceId").change(function() {
        if($.trim($('#iServiceId option:selected').text())=='') {
            $('#listing_card_small_profession').html('Services');
        } else {
            $('#listing_card_small_profession').html($('#iServiceId option:selected').text());
        }
    });
    
    $("#vServiceName").focusout(function(){
        if($.trim($(this).val())=='') {
            $('#listing_card_small_profession').html('Services');
        } else {
            $('#listing_card_small_profession').html($(this).val());
        }
    });
    
    $("#iCurrencyId").change(function(){
        alert($(this).attr('data-symbol'))
        if($.trim($('#iCountryId option:selected').text())=='') {
            $('#listing_card_large_price_currency_small').html('£');
        } else {
            $('#listing_card_large_price_currency_small').html($(this).attr('data-symbol'));
        }
    });
    
    $("#fPrice").focusout(function(){
        if($.trim($(this).val())=='') {
            $('#listing_card_large_price_num_small').html('0');
        } else {
            $('#listing_card_large_price_num_small').html($(this).val());
        }
    });
    
    
});
                