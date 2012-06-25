<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo isset($template['title']) ? $template['title'] : 'Servlio'; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo (isset($template['metadata'])) ? $template['metadata'] : ''; ?>
        <meta name="description" content="<?php echo isset($metaDesc) ? $metaDesc : 'Servlio'; ?>" />
        <meta name="keyword" content="<?php echo isset($metaKeyword) ? $metaKeyword : 'Servlio'; ?>" />
        <meta name="generator" content="Servlio" />
        <base href="<?= base_url(); ?>">
        <link href="<?= base_url() ?>css/style.css" rel="stylesheet" />
        <link href="<?= base_url() ?>css/start/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
        
        <script src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script>
        <script src="<?php echo base_url(); ?>js/cycle.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery_validate.js"></script>
        <style>
                .err{
                        color: #FF0000;
                }
        </style>
	    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	    <script src="<?php echo base_url(); ?>js/signup.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#cat_services").hide(); 
                $("#iCategoryId").click(function() {					  
                    $("#cat_services").fadeIn("fast");
                });
            });
        
        </script> 
        <script type="text/javascript">
            $(document).ready(function(){
                $("#country_active").hide(); 
                $("#iCountryId").click(function() {
                    $("#country_inactive").hide();						  
                    $("#country_active").show();
                });
                $("#country_cancel, #country_active").click(function() {						  
                    $("#location").show();						  
                    $(".filter_bar_selected_location").hide();
                });
		
            });
        </script> 
        <script type="text/javascript">
            $(document).ready(function(){
                $(".filter_bar_selected").hide(); 
                $("#services").click(function() {
                    $("#services").hide();						  
                    $(".filter_bar_selected").show();
                });
                $("#selected, .selected_entry, #location, .searchfield, #budget").click(function() {
                    $("#services").show();						  
                    $(".filter_bar_selected").hide();
                });
            });

        </script> 
        <script type="text/javascript">
            $(document).ready(function(){
                $(".filter_bar_selected_location").hide(); 
                $("#location").click(function() {
                    $("#location").hide();						  
                    $(".filter_bar_selected_location").show();
                });
                $("#selected, .selected_entry, .searchfield, #services, #budget").click(function() {
                    $("#location").show();						  
                    $(".filter_bar_selected_location").hide();
                });
                    
                                
            });

        </script> 
        <script type="text/javascript">
            $(document).ready(function(){
                $(".filter_bar_selected_budget").hide(); 
                $("#budget").click(function() {
                    $("#budget").hide();						  
                    $(".filter_bar_selected_budget").show();
                });
                $("#selected, .selected_entry, .searchfield, #location, #services").click(function() {
                    $("#budget").show();						  
                    $(".filter_bar_selected_budget").hide();
                });
            });

        </script>        
    </head>

    <body>

        <div style="height:79px;" id="inner_container">
            <div style="margin-top:-7px; position:fixed;" class="create_account_pop">
                <div id="logo"><a href="index.html"><img src="images/logo.png" alt="Servlio"></a></div>
                <div id="accounts_text">Connect to customers in your area.</div>
            </div>  
        </div>

        <div id="inner_container" style="width:924px;">
            <div id="upgrade_breadcrumb_container">
                <div id="upgrade_breadcrumb_num_active">1</div>
                <div id="upgrade_breadcrumb_header2">Create your listing</div>
                <div id="upgrade_arrow2"></div>
                <div id="upgrade_breadcrumb_num">2</div>
                <div id="upgrade_breadcrumb_header">Upgrade</div>
                <div id="upgrade_arrow2"></div>
                <div id="upgrade_breadcrumb_num">3</div>
                <div id="upgrade_breadcrumb_header">Publish</div>
                <div class="clearfloat"></div>
            </div>
            
            <form name="frmadd" id="frmadd" action="users/signup_a" method="post" enctype="multipart/form-data">
                <div id="signup_left">
                    <div id="signup_form_text6">Tell us about your company</div>
                    <input onfocus="this.value=''" name="vCompanyName" id="vCompanyName" class="signup_input_login3" placeholder="Company name" style="width:450px; margin-top:15px;" type="text" value="<?=(isset($vCompanyName)?$vCompanyName:"")?>">
                    <div id="signup_form_text8">Location of headquarters</div>
                    <div id="signup_subtitle">You can add more locations later.</div>

                    <?php
                    echo country_dropdown('vCountryCode', 'vCountryCode', array('US','CA','GB','DE','BR','IT','ES','AU','NZ','HK'),' class="signup_input_loc2" ');
                    ?>
                    <div id="state_id" style="diplay:none;">
                        <input onfocus="this.value=''" name="vState" id="vState" class="signup_input_login3" style="width:139px; float:left; font-size:13px; margin-top:0px; padding-left:5px; height:21px; margin-left:10px;" placeholder="State" type="text">
                        <input type="hidden" name="vStateCode" id="vStateCode" />
                    </div>
                    
                    <input onfocus="this.value=''" name="vCity" id="vCity" class="signup_input_login3" style="width:139px; float:left; font-size:13px; margin-top:0px; padding-left:5px; height:21px; margin-left:10px;" placeholder="City" type="text">
                    <input type="hidden" name="iCityId" id="iCityId" />
                    
                    <div class="clearfloat"></div>
                    <div id="country_err" style="float:left;"></div>
                    <div id="state_err" style="float:left;"></div>
                    <div id="city_err" style="float:left;"></div>
                    <div class="clearfloat"></div>


                    <div id="signup_sepline2"></div>

                    <div id="signup_form_text8" style="margin-top:20px;">Company logo</div>
                    <input onfocus="this.value=''" name="vCompanyLogo" id="vCompanyLogo" class="signup_file" value="" type="file">
                    <div id="signup_subtitle">Gif, jpg, or png. We’ll resize what you have.</div>




                    <div id="signup_form_text6" style="margin-top:40px;">Now tell us about your main service</div>
                    <div id="signup_subtitle">You can add more services later.</div>
                    <div id="signup_service_bg">

                        <div id="signup_form_text8" style="margin-top:0px;">Category</div>
                        
                        <select class="list" id="iCategoryId" name="iCategoryId" style="margin-left:0px; margin-top:10px;">
                            <option value="volvo">Choose a category</option>
                            <option value="volvo">All categories</option>
                            <?php
                                foreach($categories as $key=>$val) {
                            ?>                            
                            <option value="<?=$val['iCategoryId']?>"><?=$val['vCategory']?></option>
                            <? } ?>
                        </select>
                        <div style="display: none;" id="cat_services">
                            <div id="signup_form_text8">Service</div>
                            <div id="signup_form_subtext">If your service is not listed, choose “My service is not listed”.</div>
                            <select class="list" style="margin-left:0px; margin-top:10px;" name="iServiceId" id="iServiceId">
                                
                            </select>
                        </div>
                        <div style="display: none;" id="not_listed">

                            <div id="signup_form_text8">Enter service name</div>
                            <div id="signup_form_subtext">As you type we'll make recommendations — please select one if it's close.</div>
                            <input onfocus="this.value=''" name="vServiceName" id="vServiceName" class="signup_input_login3" style="margin-top:10px;" placeholder="Service name" type="text">

                            <div id="signup_subtitle" style="margin-top:10px;">e.g. 'Personal Training', 'Yoga', or 'Health Club'</div>
                        </div>

                        <div id="signup_form_text8">Image</div>
                        <div id="signup_form_subtext">Upload an image that best represents this service. You can always change it after your listing has been created.</div>
                        <input onfocus="this.value=''" name="vImage" id="vImage" class="signup_file" value="" type="file"  />
                        <div id="signup_subtitle">For best results upload a 650 x 350 jpg or png.</div>


                        <div id="signup_form_text8">Description</div>
                        <textarea class="new_service_input_area" onfocus="this.value=''" cols="45" rows="5" name="vDescription" id="vDescription"></textarea>
                        <div id="signup_subtitle"><span style="color:#333;">280</span></div>



                        <div id="signup_form_text8">Price</div>
                        <div id="signup_form_currency">Currency:</div>  
                        <div id="radio_btn_cont3">
                            <select class="currency" name="iCurrencyId" id="iCurrencyId" style="margin-left:0px;">
                             <?php foreach($currency as $row): ?>       
                                    <option class="<?php echo $row['vCurrencyVal']?>" data-format="%u%n" data-symbol="<?php echo $row['vCurrencySymbol']?>" value="<?php echo $row['vCurrencyVal']?>"><?php echo $row['vCurrency']?></option>
                             <?php endforeach;?>   
                            </select>
                        </div>			
                        <div class="clearfloat"></div> 
                        <div id="signup_form_currency" style="margin-top:16px;">From:</div> 
                        <input onfocus="this.value=''" name="fPrice" id="fPrice" class="signup_input_login3" style="width:60px; font-size:13px; height:26px; margin-top:10px; margin-left:9px; padding-left:6px;" type="text">

                        <div class="clearfloat"></div>

                        <div id="signup_sepline"></div>



                    </div>



                    <div id="signup_form_text6" style="margin-top:40px;">Finally, how will customers contact you?</div>
                    <input onfocus="this.value=''" name="vEmail" id="vEmail" class="signup_input_login3" style="width:450px; margin-top:15px;" placeholder="Email" type="text">
                    <div class="clearfloat"></div>

                    <input onfocus="this.value=''" name="vWebSite" id="vwebSite" class="signup_input_login3" style="width:450px; margin-top:10px;" placeholder="Website" type="text">
                    <div class="clearfloat"></div>
                    <div id="signup_subtitle" style="margin-top:8px; margin-bottom:10px;">e.g. 'http://www.yourdomain.com'</div>


                    <input onfocus="this.value=''" name="vTwitter" id="vTwitter" class="signup_input_login3" style="width:450px;" placeholder="Twitter" type="text">
                    <div class="clearfloat"></div>
                    <div id="signup_subtitle" style="margin-top:8px; margin-bottom:10px;">e.g. 'https://twitter.com/yourname'</div>


                    <input onfocus="this.value=''" name="vPhone" id="vPhone" class="signup_input_login3" style="width:450px;" placeholder="Telephone" type="text">

                    <div class="clearfloat"></div>

                    <a href="javascript:;" id="sbmtButton" class="btn" title="Apply" style="width:95px;font-size:15px; height:28px; padding-top:2px; margin-top:20px; margin-left:0px;">Continue</a>
                    <div class="clearfloat"></div>
                    <div id="logo_icon_text">© 2012 Area 20 Technology Ltd. All screenshots are owned by their respective owners.</div>
                </div>
            </form>    

            <div id="signup_right">
                <div id="upgrade_top3">
                    <div id="upgrade_header2">Your listing card</div>
                    <div id="listing_card_small3">
                        <div id="listing_card_small_details_container">
                            <div id="listing_card_small_name">Company name</div>
                            <div class="clearfloat"></div>
                            <div id="listing_card_small_location">Headquarters</div>
                            <div id="listing_card_small_location3"></div>
                            <div id="listing_card_small_location2"></div>
                            <div class="clearfloat"></div>
                            <div id="listing_card_small_profession">Service</div>
                        </div>
                        <div class="clearfloat"></div>
                        <div id="card_small_img"><img src="images/default_image.jpg" height="163" width="209"></div>
                        <div id="listing_card_small_price">
                            <div id="listing_card_large_price_small">From</div>
                            <div id="listing_card_large_price_currency_small">£</div>
                            <div id="listing_card_large_price_num_small">0</div>

                            <div class="clearfloat"></div>
                        </div>


                        <div class="clearfloat"></div>		
                    </div>
                    <div class="clearfloat"></div>


                </div>
            </div>
        </div>
    </body>
</html>