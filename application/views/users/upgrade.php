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
        <script src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script>
        <script src="<?php echo base_url(); ?>js/cycle.js"></script>
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
                <div id="upgrade_breadcrumb_num_active">2</div>
                <div id="upgrade_breadcrumb_header2">Upgrade</div>
                <div id="upgrade_arrow2"></div>
                <div id="upgrade_breadcrumb_num">3</div>
                <div id="upgrade_breadcrumb_header">Publish</div>
                <div class="clearfloat"></div>
            </div>


            <div id="upgrade_title">Continue with a free plan...</div>
            <div id="upgrade_subtitle">You can always upgrade later.</div>


            <div id="upgrade_top">
                <div id="listing_card_small" style="margin-right:20px;">
                    <div id="listing_card_small_details_container">
                        <div id="listing_card_small_name"><a href="javascript://"><?php echo $basic['vCompanyName']?></a></div>
                        <div class="clearfloat"></div>
                        <div id="listing_card_small_location" ><?php echo $basic['vCity']?></div>
                        <div id="listing_card_small_location3" >,</div>
                        <div id="listing_card_small_location2" ><?php echo $basic['vCountry']?></div>
                        <div class="clearfloat"></div>
                        <div id="listing_card_small_profession"><?php echo (isset($basic['vService']) && !empty($basic['vService']))?$basic['vService']:$basic['vServiceName']?></div>
                    </div>
                    <div class="clearfloat"></div>
                    <div id="card_small_img">
                            <a href="profile.html">
                                <img src="uploads/<?php echo $basic['vImage']?>" width="209" height="163" />
                            </a>
                    </div>
                    <div id="listing_card_small_price">
                        <div id="listing_card_large_price_small">From</div>
                        <div id="listing_card_large_price_currency_small"><?php echo $basic['vCurrencySymbol']?></div>
                        <div id="listing_card_large_price_num_small"><?php echo $basic['fPrice']?></div>

                        <div class="clearfloat"></div>
                    </div>
                </div>
                <div id="upgrade_text_container2">
                    <div id="upgrade_header">Basic</div>
                    <div id="upgrade_point_price_basic">FREE</div>
                    <div id="account_upgrade_text1">Small listing card</div>
                    <div id="account_upgrade_text1"><span style="font-weight:bold; color:#333;">1</span> service</div>
                    <div id="account_upgrade_text1"><span style="font-weight:bold; color:#333;">1</span> location</div>
                    <div id="account_upgrade_text1">Standard profile page</div>
                    <a href="users/publish" class="popup_finish_btn" title="Apply" style="width:166px;font-size:15px; color: #666; height:28px; padding-top:6px; margin-top:20px; margin-left:0px;">Continue with Basic</a>
                    <div class="clearfloat"></div>
                </div>	
                <div class="clearfloat"></div>
            </div>
            <div class="clearfloat"></div>
            <div id="upgrade_arrow"></div>
            <div id="upgrade_title">Or upgrade to a Pro.</div>
            <div id="upgrade_subtitle">No commitment. Cancel anytime.</div>

            <div id="upgrade_left">
                <div id="upgrade_text_container">

                    <div id="upgrade_header">Pro</div>
                    <div id="upgrade_point_price">£49<span style="color:#999; font-size:11px; font-weight:bold;">/mo</span></div>

                    <div id="account_upgrade_text1">Large interactive listing card</div>

                    <div id="account_upgrade_text1">Listed above Basic</div>
                    <div id="account_upgrade_text1"><span style="font-weight:bold; color:#09F;">3</span> services</div>
                    <div id="account_upgrade_text1"><span style="font-weight:bold; color:#09F;">3</span> locations</div>
                    <div id="account_upgrade_text1">Image galleries</div>
                    <a href="publish_pro.html" class="btn" title="Apply" style="width:166px;font-size:15px; height:28px; padding-top:2px; margin-top:20px; margin-left:10px;">Upgrade to Pro</a>
                </div>	     

                <div id="listing_card_large" style="margin-top:20px;">
                    <div id="listing_card_large_details_container">
                        <div id="listing_card_large_name"><a href="javascript:;"><?php echo $basic['vCompanyName']?></a></div>
                        <div class="clearfloat"></div>
                        <div id="listing_card_large_location" ><?php echo $basic['vCity']?></div>
                        <div id="listing_card_large_location3">,</div>
                        <div id="listing_card_large_location2"><?php echo $basic['vCountry']?></div>
                        <div class="clearfloat"></div>
                        <div id="listing_card_large_profession" ><?php echo (isset($basic['vService']) && !empty($basic['vService']))?$basic['vService']:$basic['vServiceName']?></div>
                        <div class="clearfloat"></div>
                    </div>
                    <div id="listing_card_large_logo">
                        <a href="javascript:;"><img src="uploads/<?php echo $basic['vCompanyLogo']?>"/></a>
                    </div>
                    <div class="clearfloat"></div>
                    <div id="card_large_img">
                        <a href="profile_pro.html">
                            <img src="uploads/<?php echo $basic['vImage']?>" width="444" height="347" />
                        </a>
                    </div>
                    <div id="card_large_dots_container">

                    </div>
                    <div id="listing_card_large_description"><?php echo $basic['vDescription']?></div>
                    <div id="listing_card_large_bottom_container">
                        <div id="listing_card_large_price">From</div>
                        <div id="listing_card_large_price_num"><?php echo $basic['vCurrencySymbol']?></div>
                        <div id="listing_card_large_price_num"><?php echo $basic['fPrice']?></div>
                        <div class="clearfloat"></div>
                    </div>
                </div>
                <div class="clearfloat"></div>




            </div>

            <div id="upgrade_text_left">
                <div id="upgrade_question_icon">?</div>
                <div id="upgrade_qtext_container">
                    <div id="upgrade_quest_header">Do you take a percentage of each sale?</div>
                    <div id="upgrade_quest_text">Nope! It’s your money - you keep it. Unlike other services, Big Cartel does not charge any listing or per transaction fees. The normal PayPal fees still apply.</div>
                </div>
                <div class="clearfloat"></div>



            </div>

            <div id="upgrade_text_right">
                <div id="upgrade_question_icon">?</div>
                <div id="upgrade_qtext_container">
                    <div id="upgrade_quest_header">Can I change plans or cancel my account later?</div>
                    <div id="upgrade_quest_text">Of course. You can upgrade, downgrade, or cancel your account at any time through your store’s admin area. Everything is month-to-month. No contracts.</div>
                </div>
                <div class="clearfloat"></div>

            </div>

            <div id="upgrade_text_left">
                <div id="upgrade_question_icon">?</div>
                <div id="upgrade_qtext_container">
                    <div id="upgrade_quest_header">Why is there a limit of 300 products?</div>
                    <div id="upgrade_quest_text">Big Cartel is designed for smaller shops. Stores with a lot of products have much more complex needs, and there are plenty of services out there to accommodate them.</div>
                </div>
                <div class="clearfloat"></div>



            </div>

            <div id="upgrade_text_right">
                <div id="upgrade_question_icon">?</div>
                <div id="upgrade_qtext_container">
                    <div id="upgrade_quest_header">How do I pay for my store?</div>
                    <div id="upgrade_quest_text">We use PayPal subscriptions to let you pay with a credit card, bank account, or from your PayPal balance.</div>
                </div>
                <div class="clearfloat"></div>

            </div>
            <div class="clearfloat"></div>

            <div id="logo_icon_text">© 2012 Area 20 Technology Ltd. All screenshots are owned by their respective owners.</div>
        </div> 
    </body>
</html>
