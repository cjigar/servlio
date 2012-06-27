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
        <script src="<?php echo base_url(); ?>js/jquery_validate.js"></script>
        <style>
            .err{
                color: #FF0000;
            }
        </style>

    </head>

    <body>
        <div id="inner_container" style="height:79px;">
            <div class="create_account_pop" style="margin-top:-7px; position:fixed;">

                <div id="logo"><a href="index.html"><img alt="Servlio" src="images/logo.png" /></a></div>
                <div id="accounts_text">Connect to customers in your area.</div>


            </div>  
        </div>
        <div id="inner_container" style="width:924px;">
            <div id="upgrade_breadcrumb_container">
                <div id="upgrade_breadcrumb_num">1</div>
                <div id="upgrade_breadcrumb_header">Create your listing</div>
                <div id="upgrade_arrow2"></div>
                <div id="upgrade_breadcrumb_num">2</div>
                <div id="upgrade_breadcrumb_header">Upgrade</div>
                <div id="upgrade_arrow2"></div>
                <div id="upgrade_breadcrumb_num_active">3</div>
                <div id="upgrade_breadcrumb_header2">Publish</div>
                <div class="clearfloat"></div>
            </div>
            <div id="signup_left2">
                <div id="signup_form_text6">Create your Pro account</div>

                <div id="signup_form_subtext" style="font-size:14px; color:#444;">Before publishing your listing, you'll need to create an account. Once created, you can update your listing and manage account settings at any time.</div>
                <div id="signup_form_text6"></div>


                <input  type="text" onfocus="this.value=''" name="field" class="signup_input_login3" style="width:350px; margin-top:15px;" placeholder="Password" />

                <input  type="text" onfocus="this.value=''" name="field" class="signup_input_login3" style="width:350px; margin-top:15px;" placeholder="Retype password" />


                <div id="signup_form_text6" style="margin-top:40px;">Enter payment details</div>

                <div id="card_bg">



                    <input  type="text" onfocus="this.value=''" name="field" class="signup_input_login3" style="width:350px; margin-top:15px;" placeholder="Card number" />
                    <div id="payments_cards" style="margin-top:15px; margin-bottom:20px;"></div>
                    <div class="clearfloat"></div>





                    <div id="signup_form_text8" style="margin-top:20px;">Expires on</div>
                    <div style="margin-top:5px;">
                        <select  type="text" onfocus="this.value=''" name="field" />

                        <option value="volvo">1 - January</option>
                        <option value="volvo">2 - February</option>
                        <option value="volvo">3 - March</option>
                        <option value="volvo">4 - April</option>
                        <option value="volvo">5 - May</option>
                        <option value="volvo">6 - June</option>
                        <option value="volvo">7 - July</option>
                        <option value="volvo">8 - August</option>
                        <option value="volvo">9 - September</option>
                        <option value="volvo">10 - October</option>
                        <option value="volvo">11 - November</option>
                        <option value="volvo">12 - December</option>
                        </select> 
                        <select  type="text" onfocus="this.value=''" name="field" />

                        <option value="volvo">2011</option>
                        <option value="volvo">2012</option>
                        <option value="volvo">2013</option>
                        <option value="volvo">2014</option>
                        <option value="volvo">2015</option>
                        <option value="volvo">2016</option>
                        <option value="volvo">2017</option>
                        <option value="volvo">2018</option>
                        <option value="volvo">2019</option>
                        <option value="volvo">2020</option>
                        <option value="volvo">2021</option>
                        <option value="volvo">2022</option>
                        <option value="volvo">2023</option>
                        <option value="volvo">2024</option>
                        <option value="volvo">2025</option>
                        <option value="volvo">2026</option>

                        </select> 
                        <div class="clearfloat"></div>
                    </div>
                    <div id="signup_form_text8" style="margin-top:20px;">Safety code <span style="color:#999; font-size:11px; font-weight:normal;">&#8212; Last 3 digits on back of your card.</span></div>
                    <input  type="text" onfocus="this.value=''" name="field" class="signup_input_login3" style="width:50px; margin-top:10px;" />



                    <div id="signup_subtitle" style="margin-top:20px;">When you click Create account &amp; Publish you'll be charged £49.00. You are also agreeing to our <a href="#">User Agreement</a>. Thanks for signing up! </div>
                </div>








                <a href="account_pro.html" class="btn" title="Apply" style="width:199px;font-size:15px; height:28px; padding-top:2px; margin-top:0px; margin-left:0px;">Create account & Publish</a>
                <div class="clearfloat"></div>







            </div>


            <div id="signup_right" style="margin-left:93px;">
                <div id="large_list_bg">

                    <div id="upgrade_header2">Your listing card</div>

                    <div id="listing_card_large" style="margin-top:0px; margin-bottom:0px;">
                        <div id="listing_card_large_details_container">
                            <div id="listing_card_large_name">Matt Roberts</div>
                            <div class="clearfloat"></div>
                            <div id="listing_card_large_location" >Soho</div>
                            <div id="listing_card_large_location3">,</div>
                            <div id="listing_card_large_location2">London</div>
                            <div class="clearfloat"></div>
                            <div id="listing_card_large_profession" >Personal Training</div>
                            <div class="clearfloat"></div>
                        </div>
                        <div id="listing_card_large_logo"><img src="images/mrlogo.jpg"/></div>
                        <div class="clearfloat"></div>
                        <div id="card_large_img"><img src="images/mr1.jpg" width="444" height="347" /></div>
                        <div id="card_large_dots_container">

                        </div>
                        <div id="listing_card_large_description">Personal Training is all about staying motivated, getting results and getting them on schedule. We recognise that every client is individual, and we know that every client requires a bespoke programme.</div>
                        <div id="listing_card_large_bottom_container">
                            <div id="listing_card_large_price">From</div>
                            <div id="listing_card_large_price_num">£</div>
                            <div id="listing_card_large_price_num">45</div>

                            <div class="clearfloat"></div>
                        </div>
                    </div>
                    <div class="clearfloat"></div>



                </div>

            </div>
            <div class="clearfloat"></div>

            <div id="logo_icon_text">© 2012 Area 20 Technology Ltd. All screenshots are owned by their respective owners.</div>

            <div class="clearfloat"></div>


        </div>
    </body>
</html>
<script>
    $("#login_btn").click(function() {
        $("#fromlogin").submit();
    });
    $("#reset_btn").click(function(){
        $("#fromlogin")[0].reset();
    });
</script>    