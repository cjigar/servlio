$(document).ready(function() {

    $("#frmadd").validate({
        rules:{
            iCategoryId:{
                required:true
            },
            iServiceId:{
                required:true
            },
            vImage:{
                required:true
            },                                
            fPrice:{
                required:true
            }
        },
        messages:{
            iCategoryId:{
                required:"Please select category"
            },
            iServiceId:{
                required:"Please select service"
            },
            vImage:{
                required:"Please select service image"
            },                                
            fPrice:{
                required:"Please enter price"
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
    
    $("#vServiceName").focusout(function(){
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
    
    $("#fPrice").focusout(function(){
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
                