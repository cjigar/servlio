$(document).ready(function() {

    $("#frmadd").validate({
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
    
   
    
    
    $("#iServiceId").change(function() {
        if($.trim($('#iServiceId option:selected').text())=='') {
            $('#listing_card_large_profession').html('Services');
        } else {
            $('#listing_card_large_profession').html($('#iServiceId option:selected').text());
        }
        
        if($(this).val()=='-1') {
            $("#not_listed").fadeIn('fast');
        } else {
            $("#not_listed").fadeOut('fast');
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
                