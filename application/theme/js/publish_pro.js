$(document).ready(function() {
    
    $("#frmpublish_pro").validate({
        rules:{
            vPassword:{
                required:true
            },
            vRetPassword:{
                required:true,
                equalTo: "#vPassword"
            },
            cardnumber:{
                required:true,
                number:true
            },
            cardexpirymonth: {
                required:true
            },
            cardexpiryyear : {
                required:true
            },
            cardcvc: {
                required:true
            }
        },
        errorPlacement:function(error, element) {
            error.appendTo(element);
            
        }
    });
});
         