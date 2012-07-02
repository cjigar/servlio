<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo isset($template['title']) ? $template['title'] : 'Servlio'; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo $template['metadata']; ?>
        <meta name="description" content="<?php echo isset($metaDesc) ? $metaDesc : 'Servlio'; ?>" />
        <meta name="keyword" content="<?php echo isset($metaKeyword) ? $metaKeyword : 'Servlio'; ?>" />
        <meta name="generator" content="Servlio" />
        <base href="<?= base_url(); ?>">
        <link href="<?= base_url() ?>css/style.css" rel="stylesheet">
        <link href="<?= base_url() ?>css/start/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery_validate.js"></script>
        <script src="<?php echo base_url(); ?>js/settings_pro.js"></script>
        <style>
            .err{
                color: #FF0000;
            }
        </style>
        <script>
            $(document).ready(function() {
                $("#fromlogin").validate({
                    rules:{
                        vEmail : {
                            required:true,
                            email:true
                        },
                        vPassword : {
                            required:true                            
                        }
                    },
                    messages:{
                        vEmail : {
                            required:"Please enter email",
                            email:"Please enter proper email"
                        },
                        vPassword : {
                            required:"Please enter password"
                        }
                    }
                    
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#change_card").hide(); 
                $("#change_card_link").click(function() {					  
                    $("#change_card").fadeIn("fast");
                    $("#change_card_link").hide(); 
                    $("#cancel_card").show(); 
                });
		
                $("#cancel_card").click(function() {					  
                    $("#change_card").hide();
                    $("#change_card_link").show(); 
			 
                });
		
            });

        </script> 


        <script type="text/javascript">
            $(document).ready(function(){
                $("#past_invoices").hide(); 
                $("#past").click(function() {					  
                    $("#past_invoices").fadeIn("fast");
                    $("#past").hide(); 
                });
		
                $("#past_close").click(function() {					  
                    $("#past_invoices").hide();
                    $("#past").show(); 
			 
                });
		
            });
        </script> 
    </head>

    <body>
        <div id="inner_container" style="height:79px;">
            <div class="create_account_pop" style="margin-top:-7px; position:fixed;">
                <div id="logo"><a href=""<?= base_url(); ?>"><img alt="Servlio" src="images/logo.png" /></a></div>
                <div id="accounts_text">Connect to customers in your area.</div>
           </div>  
        </div>
        <form name="frmsettings" id="frmsettings" action="users/settings_pro_a" method="post" enctype="multipart/form-data" > 
            <div id="inner_container" style="width:924px;">
                <div id="breadcrumb"><a href="users/account">Account</a></div>
                <div id="breadcrumb">&rarr;</div> 
                <div id="breadcrumb" style="color:#666">Settings</div> 
                <div class="booking_btn_back" id="payb3">
                    <div style="margin-top:0px; float:left;"><a href="javascript:javascript:history.go(-1)">&larr; Back</a></div></div>
                <div class="clearfloat"></div>

                <div id="signup_left" style="width:824px;">
                    <div id="signup_form_text6" style="margin-top:10px;">Company details</div>
                    <input  type="text"  name="vCompanyName" name="vCompanyName" value="<?php echo $basic['vCompanyName'] ?>" class="signup_input_login3" placeholder="Company name" style="width:450px; margin-top:15px;" />
                    <div id="signup_form_text8">Locations</div>
                    <div id="signup_subtitle">You can add up to 3 locations.</div>
                    <!--
                    <input type ="hidden" name="iCompanyLocationId[]" id="iCompanyLocationId" value="<?php echo $basic['iCompanyLocationId'] ?>" />
                    
                    <input type ="hidden" name="iCompanyLocationId[]" id="iCompanyLocationId3" value="<?php echo $basic['iCompanyLocationId'] ?>" />
                    <?php
                     country_dropdown('vCountryCode[]', 'vCountryCode', array('US', 'CA', 'GB', 'DE', 'BR', 'IT', 'ES', 'AU', 'NZ', 'HK'), ' class="signup_input_loc2" ', $basic['vCountryCode']);
                    ?>
                    <input type ="hidden" name="vCountry[]" id="vCountry" value="<?php echo $basic['vCountry'] ?>" />
                    
                    <input  type="text"  name="vState[]" id="vState" value="<?php echo $basic['vState'] ?>" class="signup_input_login3" style="width:139px; float:left; font-size:13px; margin-top:0px; padding-left:5px; height:21px; margin-left:10px; <?php echo ($basic['vCountryCode'] != 'US') ? 'display:none1;' : '' ?>" placeholder="State" />
                    <input type ="hidden" name="vStateCode[]" id="vStateCode" value="<?php echo $basic['vStateCode'] ?>" />
                    
                    <input  type="text"  name="vCity[]" id="vCity" value="<?php echo $basic['vCity'] ?>" class="signup_input_login3" style="width:139px; float:left; font-size:13px; margin-top:0px; padding-left:5px; height:21px; margin-left:10px;" placeholder="City" />
                    <input type ="hidden" name="iCityId[]" id="iCityId" value="<?php echo $basic['iCityId'] ?>" />
                    <div class="clearfloat"></div>
                    -->
                    <?php  for($f=0;$f<3;$f++):  ?>
                    <div style="margin-top:10px;" class="locationpro" id="location_<?php echo $f?>" >
                        <input type ="hidden" name="Location[<?php echo $f?>][iCompanyLocationId]" id="iCompanyLocationId_<?php echo $f?>" value="<?php echo $location[$f]['iCompanyLocationId'] ?>" />
                        <input type ="hidden" name="Location[<?php echo $f?>][iCompanyServiceId]" id="iCompanyServiceId_<?php echo $f?>" value="<?php echo $location[$f]['iCompanyServiceId'] ?>" />
                        <?php echo country_dropdown('Location['. $f .'][vCountryCode]', 'vCountryCode_'.$f, array('US', 'CA', 'GB', 'DE', 'BR', 'IT', 'ES', 'AU', 'NZ', 'HK'), ' class="signup_input_loc2" ', $location[$f]['vCountryCode']); ?>
                        <input type ="hidden" name="Location[<?php echo $f?>][vCountry]" id="vCountry_<?php echo $f?>" value="<?php echo $location[$f]['vCountry'] ?>" />
                        <input  type="text"  name="Location[<?php echo $f?>][vState]" id="vState_<?php echo $f?>" value="<?php echo $location[$f]['vState'] ?>" class="signup_input_login3" style="width:139px; float:left; font-size:13px; margin-top:0px; padding-left:5px; height:21px; margin-left:10px; <?php echo (empty($location[$f]['vState'])) ? 'display:none;' : '' ?>" placeholder="State" />
                        <input type ="hidden" name="Location[<?php echo $f?>][vStateCode]" id="vStateCode_<?php echo $f?>" value="<?php echo $location[$f]['vStateCode'] ?>" />
                        <input  type="text"  name="Location[<?php echo $f?>][vCity]" id="vCity_<?php echo $f?>" value="<?php echo $location[$f]['vCity'] ?>" class="signup_input_login3" style="width:139px; float:left; font-size:13px; margin-top:0px; padding-left:5px; height:21px; margin-left:10px;" placeholder="City" />
                        <input type ="hidden" name="Location[<?php echo $f?>][iCityId]" id="iCityId_<?php echo $f?>" value="<?php echo $location[$f]['iCityId'] ?>" />
                        <?php if($f!=0): ?>
                            <div id="signup_delete_link" class="location_delete_link" data-location="<?php echo $f?>">Remove</div>
                        <?php endif;?>
                        <div class="clearfloat"></div>
                    </div>
                    <?php endfor; ?>
                    <!--
                    <div style="margin-top:10px;" id="location_3">
                        <?php
                        echo country_dropdown('vCountryCode[]', 'vCountryCode3', array('US', 'CA', 'GB', 'DE', 'BR', 'IT', 'ES', 'AU', 'NZ', 'HK'), ' class="signup_input_loc2" ', $basic['vCountryCode']);
                        ?>
                        <input type ="hidden" name="vCountry[]" id="vCountry3" value="<?php echo $basic['vCountry'] ?>" />
                        <input  type="text"  name="vState[]" id="vState3" value="<?php echo $basic['vState'] ?>" class="signup_input_login3" style="width:139px; float:left; font-size:13px; margin-top:0px; padding-left:5px; height:21px; margin-left:10px; <?php echo ($basic['vCountryCode'] != 'US') ? 'display:none;' : '' ?>" placeholder="State" />
                        <input type ="hidden" name="vStateCode[]" id="vStateCode3" value="<?php echo $basic['vStateCode'] ?>" />
                        <input  type="text"  name="vCity[]" id="vCity3" value="<?php echo $basic['vCity'] ?>" class="signup_input_login3" style="width:139px; float:left; font-size:13px; margin-top:0px; padding-left:5px; height:21px; margin-left:10px;" placeholder="City" />
                        <input type ="hidden" name="iCityId[]" id="iCityId3" value="<?php echo $basic['iCityId'] ?>" />
                        <div id="signup_delete_link" data-location="3">Remove</div>
                        <div class="clearfloat"></div>
                    </div>
                    -->
                    <div id="signup_subtitle_link">Add another location that you cover</div>
                    <div id="signup_form_text8">Address</div>
                    <input  type="text" name="vAddress" id="vAddress" value="<?php echo $basic['vAddress'] ?>" class="signup_input_login3" placeholder="Address" style="width:450px; margin-top:15px;" />

                    <div id="signup_sepline2"></div>

                    <div id="signup_form_text8" style="margin-top:20px;">Company logo</div>
                    <div id="update_images"><img src="uploads/<?php echo $basic['vCompanyLogo'] ?>"/></div>
                    <div class="clearfloat"></div>
                    <input  type="file" name="vCompanyLogo" id="vCompanyLogo"  class="signup_file" value="" />
                    <div id="signup_subtitle">Gif, jpg, or png. We’ll resize what you have.</div>


                    <div id="signup_sepline2"></div>
                    <div id="signup_form_text8" style="margin-top:20px;">Service price currency</div>
                    <div id="radio_btn_cont3" style="margin-left:0px;">
                        <select class="currency" style="margin-left:0px;" name="iCurrencyId" id="iCurrencyId">
                            <?php foreach ($currency as $row): ?>       
                                <option class="<?php echo $row['vCurrencyVal'] ?>" data-format="%u%n" data-symbol="<?php echo $row['vCurrencySymbol'] ?>" value="<?php echo $row['iCurrencyId'] ?>" <?php echo ($row['iCurrencyId']==$basic['iCurrencyId'])? 'selected="selected"':"" ?> ><?php echo $row['vCurrency'] ?></option>
                            <?php endforeach; ?>   
                        </select>
                    </div>			
                    <div class="clearfloat"></div> 

                    <div id="signup_form_text6" style="margin-top:40px;">Billing</div>
                    <div id="signup_form_subtext" style="color:#333; margin-top:20px;">Next Charge: <?php echo date('F, jS Y',strtotime('+1 Month',strtotime($transinfo[0]['dtAddeddate'])))?></div>
                    <div class="settings_link" style=" margin-top:10px;">Downgrade?</div>
                    <div class="clearfloat"></div> 
                    <div id="signup_sepline2"></div>
                    <div id="signup_form_text8" style="margin-top:22px;">Card details</div>
                    <div id="signup_form_subtext" style="color:#333;">Your credit card on file is xxxx-xxxx-xxxx-<?php echo substr($cardinfo['vCardNumber'], 12, 15) ?></div>
                    <div class="clearfloat"></div>
                    <div id="change_card">
                        <div id="card_bg">
                            <input  type="text" name="vCardNumber" id="vCardNumber" value="<?php echo $cardinfo['vCardNumber']?>" class="signup_input_login3" style="width:350px; margin-top:25px;" placeholder="Card number" />
                            <div id="payments_cards" style="margin-top:15px; margin-bottom:20px;"></div>

                            <div id="signup_form_text8" style="margin-top:20px;">Expires on</div>
                            <div style="margin-top:5px;">
                                <?php $month = array('01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December')?>
                                
                                <select  type="text"  name="vExpireMonth" id="vExpireMonth" />
                                    <?php foreach($month as $key => $val) :?>
                                        <option value="<?php echo $key?>" <?php echo ($key==$cardinfo['vExpireMonth'])?'selected="selected"':''?> ><?php echo $key?> - <?php echo $val?></option>
                                    <?php endforeach;?>
                                </select>
                                
                                <select  type="text" name="vExpireYear" />
                                <?php
                                $n = date('Y');
                                for ($i = $n; $i < $n + 16; $i++) {
                                    ?>
                                    <option value="<?php echo $i ?>" <?php echo ($i==$cardinfo['vExpireYear'])?'selected="selected"':''?> > <?php echo $i ?> </option>
                                <?php } ?>


                                </select> 
                                <div class="clearfloat"></div>
                            </div>
                            <div id="signup_form_text8" style="margin-top:20px;">Safety code <span style="color:#999; font-size:11px; font-weight:normal;">&#8212; Last 3 digits on back of your card.</span></div>
                            <input  type="text" name="vCvv" id="vCvv" value="<?php echo $cardinfo['vCvv'];?>" class="signup_input_login3" style="width:50px; margin-top:10px;" />
                        </div>
                        <a href="javascript:;" id="savecardinfo"  class="btn" title="Apply" style="width:60px;font-size:15px; height:28px; padding-top:2px; margin-top:20px; margin-left:0px;">Save</a>
                        <div class="clearfloat"></div>
                        <div class="settings_link" id="cancel_card" style=" margin-top:15px;">Cancel</div>
                        <div class="clearfloat"></div>
                    </div>

                    <div class="settings_link" id="change_card_link" style=" margin-top:10px;">Change your credit card and billing information</div>

                    <div class="clearfloat"></div>
                    <div id="signup_sepline2"></div>
                    <div id="signup_form_text8" style="margin-top:22px;">Last invoice</div>
                    <div class="account_invoices">
                    <a href="http://area20.com/servlio/email_paid_invoice.html">$<?php echo $this->config->config['Stripe']['Amount']/100?> for Pro on <?php echo date('F, d Y',strtotime($transinfo[0]['dtAddeddate']))?></a></div>
                    <div id="past_invoices">
                        <?php unset($transinfo[0]);?>
                        <?php foreach($transinfo as $row) : ?>
                        <div class="account_invoices">
                                <a href="http://area20.com/servlio/email_paid_invoice.html">
                                    $<?php echo $this->config->config['Stripe']['Amount']/100?> for Pro on <?php echo date('F, d Y',strtotime($row['dtAddeddate']))?>
                                </a>
                        </div>
                        <?php endforeach; ?>
                        <div class="settings_link" id="past_close" style=" margin-top:10px;">Close</div>
                        <div class="clearfloat"></div>
                    </div>
                    
                    <div class="settings_link" id="past" style=" margin-top:10px;">See all past invoices</div>
                    <div class="clearfloat"></div>

                    <div id="signup_form_text6" style="margin-top:40px;">Account details</div>

                    <input  type="text" name="vEmail" id="vEmail" value="<?php echo $basic['vEmail'] ?>" class="signup_input_login3" style="width:450px; margin-top:30px;" placeholder="Email" />
                    <div class="clearfloat"></div>
                    <input  type="password" onfocus="this.value=''" name="vPassword" id="vPasswrod" class="signup_input_login3" style="width:450px; margin-top:15px;" placeholder="New password" />
                    <div class="clearfloat"></div>
                    <input  type="password" onfocus="this.value=''" name="vRetPassword" id="vRetPassword"  class="signup_input_login3" style="width:450px; margin-top:15px;" placeholder="Retype password" />
                    <div class="clearfloat"></div>

                    <div id="signup_form_text6" style="margin-top:40px;">Contact details</div>

                    <input  type="text" name="vWebSite" id="vWebSite" value="<?php echo $basic['vWebSite'] ?>" class="signup_input_login3" style="width:450px; margin-top:10px;" placeholder="Website URL" />
                    <div class="clearfloat"></div>
                    <div id="signup_subtitle" style="margin-top:8px; margin-bottom:10px;">e.g. 'http://www.yourdomain.com'</div>


                    <input  type="text" name="vTwitter" id="vTwitter" value="<?php echo $basic['vTwitter'] ?>" class="signup_input_login3" style="width:450px;" placeholder="Twitter URL" />
                    <div class="clearfloat"></div>
                    <div id="signup_subtitle" style="margin-top:8px; margin-bottom:10px;">e.g. 'https://twitter.com/yourname'</div>
                    <input  type="text" name="vPhone" id="vPhone" value="<?php echo $basic['vPhone'] ?>" class="signup_input_login3" style="width:450px;" placeholder="Telephone" />
                    <div class="clearfloat"></div>

                    <a href="javascript:;" class="btn" id="sbmtButton" title="Apply" style="width:75px;font-size:15px; height:28px; padding-top:2px; margin-top:20px; margin-left:0px;">Update</a>
                    <div class="clearfloat"></div>
                    <div id="cancel_account"><a href="index.html">Cancel your Fitlister account</a> &#8212; No undo. All account info will be permanently deleted.</div>
                    <div id="logo_icon_text">© 2012 Area 20 Technology Ltd. All screenshots are owned by their respective owners.</div>
                </div>
                <div class="clearfloat"></div>
            </div>
        </form>
    </body>
      
</html>