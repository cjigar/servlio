$(document).ready(function() {

    $("#frmsettings").validate({
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
            iCity : {
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
        errorPlacement:function(error, element){
            error.appendTo(element);
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
    
    $("#vAbout").bind('keyup', function() {
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
    
});
                