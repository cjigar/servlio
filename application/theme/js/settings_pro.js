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
    $('#savecardinfo').click(function(){
        $("#frmsettings").submit();
    });
    
    
    $(".location_delete_link").click(function(e){
        e.preventDefault();
        var no = $(this).attr('data-location');
        $("#location_"+no).fadeOut('fast');
    });
    
    $("#signup_subtitle_link").click(function(){
        $.each($(".locationpro"), function(i, obj) {
            if(!$(obj).is(':visible')) {
                $(obj).find('input').show();
                $(obj).fadeIn('fast');
                return false;
            }
        });
    });
    
});

$(function() {
    function split( val ) {
        return val.split( /,\s*/ );
    }
    function extractLast( term ) {
        return split( term ).pop();
    }
    $("#vCountryCode_0").change(function(){
        $("#vCountry_0").val($("#vCountryCode_0 :selected").text());
        if($(this).val()=='US') {
            $("#vState_0").show();
        } else {
            $("#vState_0").hide();
        }
    });
    
    $("#vCountryCode_1").change(function(){
        $("#vCountry_1").val($("#vCountryCode_1 :selected").text());
        if($(this).val()=='US') {
            $("#vState_1").show();
        } else {
            $("#vState_1").hide();
        }
    });
    
    $("#vCountryCode_2").change(function(){
        $("#vCountry_2").val($("#vCountryCode_2 :selected").text());
        if($(this).val()=='US') {
            $("#vState_2").show();
        } else {
            $("#vState_2").hide();
        }
    });
    
    
    $( "#vState_0" )
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
                vCountryCode:$('#vCountryCode_0').val()
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
            $("#vState_0").val(this.value);
            $('#vStateCode_0').val(ui.item.id);
            return false;
        }
    });
    
    $( "#vCity_0" )
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
                vCountryCode:$('#vCountryCode_0').val()
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
            $("#vCity_0").val(this.value);
            $('#iCityId_0').val(ui.item.id);
            return false;
        }
    });
    
    $( "#vState_1" )
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
                vCountryCode:$('#vCountryCode_1').val()
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
            $("#vState_1").val(this.value);
            $('#vStateCode_1').val(ui.item.id);
            return false;
        }
    });
    
    $( "#vCity_1" )
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
                vStateCode:$('#vStateCode_1').val(),
                vCountryCode:$('#vCountryCode_1').val()
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
            $("#vCity_1").val(this.value);
            $('#iCityId_1').val(ui.item.id);
            return false;
        }
    });
    
    $( "#vState_2" )
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
                vCountryCode:$('#vCountryCode_2').val()
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
            $("#vState_2").val(this.value);
            $('#vStateCode_2').val(ui.item.id);
            return false;
        }
    });
    
    $( "#vCity_2" )
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
                vStateCode:$('#vStateCode_2').val(),
                vCountryCode:$('#vCountryCode_2').val()
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
            $("#vCity_2").val(this.value);
            $('#iCityId_2').val(ui.item.id);
            return false;
        }
    });
    
});
                