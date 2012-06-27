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
        $("#frmeditservice").submit();
    });
    
});

         