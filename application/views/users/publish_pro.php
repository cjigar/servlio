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
        <!-- <script src="<?php echo base_url(); ?>js/stripe.js"></script> -->
        <script type="text/javascript" src="https://js.stripe.com/v1/"></script>
        <style>
            .err{
                color: #FF0000;
            }
        </style>

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
            <form name="frmpublish_pro" id="frmpublish_pro" action="users/publish_pro_a" method="post" enctype="multipart/form-data">
                <input type='hidden' name='stripeToken' id='stripeToken'  value='' />
                <div id="signup_left2">
                    <div id="signup_form_text6">Create your Pro account</div>

                    <div id="signup_form_subtext" style="font-size:14px; color:#444;">Before publishing your listing, you'll need to create an account. Once created, you can update your listing and manage account settings at any time.</div>
                    <div id="signup_form_text6"></div>
                    <input  type="password" onfocus="this.value=''" name="vPassword" class="signup_input_login3" style="width:350px; margin-top:15px;" placeholder="Password" />
                    <input  type="password" onfocus="this.value=''" name="vRetPassword" class="signup_input_login3" style="width:350px; margin-top:15px;" placeholder="Retype password" />
                    <div id="signup_form_text6" style="margin-top:40px;">Enter payment details</div>
                    <div id="card_bg">
                        <input  type="text" value="4242424242424242" name="cardnumber" id="cardnumber" class="signup_input_login3" style="width:350px; margin-top:15px;" placeholder="Card number" />
                        <div id="payments_cards" style="margin-top:15px; margin-bottom:20px;"></div>
                        <div class="clearfloat"></div>
                        <div id="signup_form_text8" style="margin-top:20px;">Expires on</div>
                        <div style="margin-top:5px;">
                            <select name="card-expiry-month" id="card-expiry-month" type="text"  />
                            <option value="01">1 - January</option>
                            <option value="02">2 - February</option>
                            <option value="03">3 - March</option>
                            <option value="04">4 - April</option>
                            <option value="05">5 - May</option>
                            <option value="06">6 - June</option>
                            <option value="07">7 - July</option>
                            <option value="08">8 - August</option>
                            <option value="09">9 - September</option>
                            <option value="10">10 - October</option>
                            <option value="11">11 - November</option>
                            <option value="12" selected="selected">12 - December</option>
                            </select> 
                            <select name="card-expiry-year" id="card-expiry-year"  type="text" onfocus="this.value=''" />
                            <?php $n = date('Y');
                            for ($i = $n; $i < $n + 16; $i++) {
                                ?>
                                <option value="<?php echo $i ?>"> <?php echo $i ?> </option>
<?php } ?>
                            </select> 
                            <div class="clearfloat"></div>
                        </div>
                        <div id="signup_form_text8" style="margin-top:20px;">Safety code <span style="color:#999; font-size:11px; font-weight:normal;">&#8212; Last 3 digits on back of your card.</span></div>
                        <input  type="text" value="132" size="4" name="card-cvc" id="card-cvc" class="signup_input_login3" style="width:50px; margin-top:10px;" />
                        <div id="signup_subtitle" style="margin-top:20px;">When you click Create account &amp; Publish you'll be charged £49.00. You are also agreeing to our <a href="#">User Agreement</a>. Thanks for signing up! </div>
                    </div>
                    <a href="javascript::" id="submit-button" name="submit-button" class="btn" title="Apply" style="width:199px;font-size:15px; height:28px; padding-top:2px; margin-top:0px; margin-left:0px;">Create account & Publish</a>
                    <div class="clearfloat"></div>

                </div>
            </form>


            <div id="signup_right" style="margin-left:93px;">
                <div id="large_list_bg">

                    <div id="upgrade_header2">Your listing card</div>

                    <div id="listing_card_large" style="margin-top:0px; margin-bottom:0px;">
                        <div id="listing_card_large_details_container">
                            <div id="listing_card_large_name"><?php echo $basic['vCompanyName'] ?></div>
                            <div class="clearfloat"></div>
                            <div id="listing_card_large_location" ><?php echo $basic['vCity'] ?></div>
                            <div id="listing_card_large_location3">,</div>
                            <div id="listing_card_large_location2"><?php echo $basic['vCountry'] ?></div>
                            <div class="clearfloat"></div>
                            <div id="listing_card_large_profession" ><?php echo (isset($basic['vService']) && !empty($basic['vService'])) ? $basic['vService'] : $basic['vServiceName'] ?></div>
                            <div class="clearfloat"></div>
                        </div>
                        <div id="listing_card_large_logo"><img src="uploads/<?php echo $basic['vCompanyLogo'] ?>"/></div>
                        <div class="clearfloat"></div>
                        <div id="card_large_img"><img src="uploads/<?php echo $basic['vImage'] ?>" width="444" height="347" /></div>
                        <div id="card_large_dots_container">

                        </div>
                        <div id="listing_card_large_description"><?php echo $basic['vDescription'] ?></div>
                        <div id="listing_card_large_bottom_container">
                            <div id="listing_card_large_price">From</div>
                            <div id="listing_card_large_price_num"><?php echo $basic['vCurrencySymbol'] ?></div>
                            <div id="listing_card_large_price_num"><?php echo $basic['fPrice'] ?></div>

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
<script type="text/javascript">
    $("#submit-button").click(function() {
        $("#frmpublish_pro").submit();
    });
    
    // this identifies your website in the createToken call below
    Stripe.setPublishableKey('<?php echo $this->config->config["Stripe"]["PublishableKey"]?>');
    function stripeResponseHandler(status, response) {
        if (response.error) {
            // re-enable the submit button
            $('#submit-button').removeAttr("disabled");
            // show the errors on the form
            $(".payment-errors").html(response.error.message);
        } else {
            var form$ = $("#frmpublish_pro");
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $("#stripeToken").val(token);
            //form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            // and submit
            form$.get(0).submit();
        }
    }
    
    $(document).ready(function() {
        $("#frmpublish_pro").submit(function(event) {
            // disable the submit button to prevent repeated clicks
            $('.submit-button').attr("disabled", "disabled");
            // createToken returns immediately - the supplied callback submits the form if there are no errors
            Stripe.createToken({
                number: $('#cardnumber').val(),
                cvc: $('#card-cvc').val(),
                exp_month: $('#card-expiry-month').val(),
                exp_year: $('#card-expiry-year').val()
            }, stripeResponseHandler);
            return false; // submit from callback
        });
    });

</script>    