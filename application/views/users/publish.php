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
            .err {
                border: 1px red solid  !important;
                background-color: #FFD3D5;
                -webkit-box-shadow: 0 0 5px white,inset 0px 1px 2px #666;
                -moz-box-shadow: 0 0 5px #fff, inset 0px 1px 2px #666;
            }
        </style>
        <script>
            $(document).ready(function() {
                $("#formpublish").validate({
                    rules:{
                        vPassword : {
                            required:true                            
                        },
                        vConfPassword : {
                            required:true,
                            equalTo: "#vPassword"
                        }
                    },
                    errorPlacement:function(error, element) {
                        error.appendTo(element);
            
                    }
                    
                });
            });
        </script>    
    </head>

    <body>
        <div id="inner_container" style="height:79px;">
            <div class="create_account_pop" style="margin-top:-7px; position:fixed;">

                <div id="logo"><a href="<?php echo base_url()?>"><img alt="Servlio" src="images/logo.png" /></a></div>
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
            <form name="formpublish" id="formpublish" action="users/publish_a"  method="post">
                <input type="hidden" name="vEmail" value="<?php echo $basic['vEmail'] ?>" /> 
                <input type="hidden" name="iUserId" value="<?php echo $basic['iUserId'] ?>" /> 
                <div id="signup_left2" style="width:450px;">
                    <div id="signup_form_text6">Create your Basic account</div>
                    <div id="signup_form_subtext" style="font-size:14px; color:#444;">Before publishing your listing, you'll need to create an account. Once created, you can update your listing and manage account settings at any time.</div>
                    <div id="signup_form_text6"></div>
                    <input  type="password"  onfocus="this.value=''" name="vPassword" id="vPassword" class="signup_input_login3" style="width:450px; margin-top:15px;" placeholder="Password" />
                    <input  type="password" onmfocus="this.value=''" name="vConfPassword" id="vConfPassword" class="signup_input_login3" style="width:450px; margin-top:15px;" placeholder="Retype password" />
                    <div id="signup_subtitle" style="margin-top:20px;">When you click Create account &amp; Publish you'll be agreeing to our <a href="#">User Agreement</a>.</div>
                    <a href="javascript:;" class="btn" id="login_btn" title="Apply" style="width:199px;font-size:15px; height:28px; padding-top:2px; margin-top:0px; margin-left:0px;">Create account & Publish</a>
                    <div class="clearfloat"></div>
                </div>
            </form>
            <div id="signup_right" style="margin-left:213px;">
                <div id="upgrade_top3">
                    <div id="upgrade_header2">Your listing card</div>
                    <div id="listing_card_small3">
                        <div id="listing_card_small_details_container">
                            <div id="listing_card_small_name"><?php echo $basic['vCompanyName'] ?></div>
                            <div class="clearfloat"></div>
                            <div id="listing_card_small_location" ><?php echo $basic['vCity'] ?></div>
                            <div id="listing_card_small_location3" >,</div>
                            <div id="listing_card_small_location2" ><?php echo $basic['vCountry'] ?></div>
                            <div class="clearfloat"></div>
                            <div id="listing_card_small_profession"><?php echo (isset($basic['vService']) && !empty($basic['vService'])) ? $basic['vService'] : $basic['vServiceName'] ?></div>
                        </div>
                        <div class="clearfloat"></div>
                        <div id="card_small_img">
                            <?php if (is_file(APPPATH."theme/uploads/2_" . $basic['vImage'])) { ?>
                                <img src="uploads/2_<?php echo $basic['vImage'] ?>" width="209" height="163" />
                            <?php } ?>
                        </div>
                        <div id="listing_card_small_price">
                            <div id="listing_card_large_price_small">From</div>
                            <div id="listing_card_large_price_currency_small"><?php echo $basic['vCurrencySymbol'] ?></div>
                            <div id="listing_card_large_price_num_small"><?php echo $basic['fPrice'] ?></div>
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
        $("#formpublish").submit();
    });
    
</script>    