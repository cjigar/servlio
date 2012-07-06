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
        <script src="<?php echo base_url(); ?>js/settings.js"></script>
        <style>
             .err {
                border: 1px red solid  !important;
                background-color: #FFD3D5;
                -webkit-box-shadow: 0 0 5px white,inset 0px 1px 2px #666;
                -moz-box-shadow: 0 0 5px #fff, inset 0px 1px 2px #666;
            }
        </style>
    </head>
    <body>
        <div id="inner_container" style="height:79px;">
            <div class="create_account_pop" style="margin-top:-7px; position:fixed;">
                <div id="logo"><a href="<?php echo base_url(); ?>"><img alt="Servlio" src="images/logo.png" /></a></div>
                <div id="accounts_text">Connect to customers in your area.</div>
                <div style="margin-right:17px;float:right;" id="login"><a href="users/signout">Logout</a></div>                
                <div style="margin-right:17px;" id="login"><a href="users/account">My account</a></div>
            </div>  
        </div>

        <div id="inner_container" style="width:924px;">
            <div id="inner_container" style="width:924px;">
                <div id="breadcrumb"><a href="users/account">Account</a></div>
                <div id="breadcrumb">&rarr;</div> 
                <div id="breadcrumb" style="color:#666">Settings</div> 
                <div class="booking_btn_back" id="payb3">
                    <div style="margin-top:0px; float:left;"><a href="javascript:javascript:history.go(-1)">&larr; Back</a></div></div>
                <div class="clearfloat"></div>
                <form name="frmsettings" id="frmsettings" action="users/settings_a" method="post" enctype="multipart/form-data" > 
                    <div id="signup_left">
                        <div id="signup_form_text6" style="margin-top:10px;">Company details</div>
                        <input  type="text" value="<?php echo $basic['vCompanyName'] ?>" name="vCompanyName" id="vCompanyName"  class="signup_input_login3"  placeholder="Company name" style="width:450px; margin-top:15px;" />
                        
                        <div id="signup_form_text8">About your company</div>
                        <textarea class="new_service_input_area" id="vAbout" name="vAbout" style="width:441px;"><?php echo $basic['vAbout']?></textarea>
                        <div id="signup_subtitle"><span style="color:#333;">280</span></div>
                        
                        <div id="signup_form_text8">Location of headquarterCompanys</div>
                        <div id="signup_subtitle">You can add more locations later.</div>
                        
                        <input type="hidden" name="iCompanyLocationId" id="iCompanyLocationId" value="<?php echo $basic['iCompanyLocationId'] ?>" />
                        <input type="hidden" name="vCountry" id="vCountry" value="<?php echo $basic['vCountry'] ?>" />
                        <?php echo country_dropdown('vCountryCode', 'vCountryCode', array('US', 'CA', 'GB', 'DE', 'BR', 'IT', 'ES', 'AU', 'NZ', 'HK'), ' class="signup_input_loc2" ', $basic['vCountryCode']);?>
                        <input  type="text"  name="vState" id="vState" value="<?php echo $basic['vState'] ?>" class="signup_input_login3" style="width:139px; float:left; font-size:13px; margin-top:0px; padding-left:5px; height:21px; margin-left:10px; <?php echo ($basic['vCountryCode'] != 'US') ? 'display:none;' : '' ?>" placeholder="State" />
                        <input type ="hidden" name="vStateCode" id="vStateCode" value="<?php echo $basic['vStateCode'] ?>" />
                        <input  type="text"  name="vCity" id="vCity" value="<?php echo $basic['vCity'] ?>" class="signup_input_login3" style="width:139px; float:left; font-size:13px; margin-top:0px; padding-left:5px; height:21px; margin-left:10px;" placeholder="City" />
                        <input type ="hidden" name="iCityId" id="iCityId" value="<?php echo $basic['iCityId'] ?>" />

                        <div class="clearfloat"></div>

                        <div id="signup_form_text8">Address</div>
                        <input  type="text" name="vAddress" id="vAddress" class="signup_input_login3" placeholder="Address" style="width:450px; margin-top:15px;" value="<?php echo $basic['vAddress'] ?>" />
                        <div id="signup_sepline2"></div>
                        <div id="signup_form_text8" class="vCompanyLogo" style="margin-top:20px;" >Company logo</div>
                        <div id="update_images"><img src="uploads/<?php echo $basic['vCompanyLogo'] ?>"/></div>
                        <div class="clearfloat"></div>
                        <input type="hidden" name="vOldCompanyLogo" id="vOldCompanyLogo" value="<?php echo $basic['vCompanyLogo'] ?>" />
                        <input  type="file" name="vCompanyLogo" id="vCompanyLogo" onfocus="this.value=''"  class="signup_file" value="" />
                        <div id="signup_subtitle">Gif, jpg, or png. We’ll resize what you have.</div>
                        <div id="signup_sepline2"></div>
                        <div id="signup_form_text8" style="margin-top:20px;">Service price currency</div>
                        <div id="radio_btn_cont3" style="margin-left:0px;">
                            <select class="currency" style="margin-left:0px;" name="iCurrencyId" id="iCurrencyId">
                                <?php foreach ($currency as $row): ?>       
                                    <option class="<?php echo $row['vCurrencyVal'] ?>" data-format="%u%n" data-symbol="<?php echo $row['vCurrencySymbol'] ?>" value="<?php echo $row['iCurrencyId'] ?>"><?php echo $row['vCurrency'] ?></option>
                                <?php endforeach; ?>   
                            </select>
                        </div>			
                        <div class="clearfloat"></div> 
                        <div id="signup_form_text6" style="margin-top:40px;">Account details</div>
                        <input  type="text" name="vEmail" readonly id="vEmail" value="<?php echo $basic['vEmail'] ?>" class="signup_input_login3" style="width:450px; margin-top:15px;" placeholder="Email" />
                        <div class="clearfloat"></div>
                        <input  type="password" onfocus="this.value=''" name="vPassword" id="vPassword" class="signup_input_login3" style="width:450px; margin-top:15px;" placeholder="New password" />
                        <div class="clearfloat"></div>
                        <input  type="password" onfocus="this.value=''" name="vRetPassword" id="vRetPassword" class="signup_input_login3" style="width:450px; margin-top:15px;" placeholder="Retype password" />
                        <div class="clearfloat"></div>
                        <div id="signup_form_text6" style="margin-top:40px;">Contact details</div>
                        <input  type="text"  name="vWebSite" id="vWebSite" value="<?php echo $basic['vWebSite'] ?>" class="signup_input_login3" style="width:450px; margin-top:10px;" placeholder="Website URL" />
                        <div class="clearfloat"></div>
                        <div id="signup_subtitle" style="margin-top:8px; margin-bottom:10px;">e.g. 'http://www.yourdomain.com'</div>
                        <input  type="text" name="vTwitter" id="vTwitter" value="<?php echo $basic['vTwitter'] ?>" class="signup_input_login3" style="width:450px;" placeholder="Twitter URL" />
                        <div class="clearfloat"></div>
                        <div id="signup_subtitle" style="margin-top:8px; margin-bottom:10px;">e.g. 'https://twitter.com/yourname'</div>
                        <input  type="text" name="vPhone" id="vPhone" value="<?php echo $basic['vPhone'] ?>" class="signup_input_login3" style="width:450px;" placeholder="Telephone" />
                        <div class="clearfloat"></div>
                        <a href="javascript:;" id="sbmtButton" class="btn" title="Apply" style="width:75px;font-size:15px; height:28px; padding-top:2px; margin-top:20px; margin-left:0px;">Update</a>
                        <div class="clearfloat"></div>
                        <div id="cancel_account"><a href="users/cancelaccount">Cancel your Fitlister account</a> &#8212; No undo. All account info will be permanently deleted.</div>
                        <div id="logo_icon_text">© 2012 Area 20 Technology Ltd. All screenshots are owned by their respective owners.</div>
                    </div>
                </form>
                <div class="clearfloat"></div>
            </div>      
    </body>
</html>