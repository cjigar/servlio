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
            vCompanyLogo:{
                required:true
            },
            iCurrencyId:{
                required:true
            },                                         
            vEmail:{
                required:true,
                email:true
            },
            vRetPassword : {
                equalTo: "#vPassword"
            }
            
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
            vCompanyLogo:{
                required:"Please upload company logo"
            },
            iCurrencyId:{
                required:"Please select currency"
            },                                         
            vEmail:{
                required:"Please enter email",
                email:"Please enter proper email"
            },
            vRetPassword : {
                equalTo: "Please enter the same password as above"
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
        $("#frmsettings").submit();
    });
    
    $("#vCountryCode").change(function(){
        $("#vCountry").val($("#vCountryCode :selected").text());
        if($(this).val()=='US') {
            $("#vState").fadeIn('fast');
        } else {
            $("#vState").fadeOut('fast');
        }
       
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
    
});
                