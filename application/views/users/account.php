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
    </head>
    <body>
        <div id="inner_container" style="height:79px;">
            <div class="create_account_pop" style="margin-top:-7px; position:fixed;">
                <div id="logo"><a href=""<?= base_url(); ?>"><img alt="Servlio" src="images/logo.png" /></a></div>
                <div id="accounts_text">Connect to customers in your area.</div>
                <?php $login = $this->session->userdata('iUserId');?>
                <?php if(empty($login)) :?>
                <a href="users/signup" class="btn" title="Apply" style="width:95px; float:right; font-size:15px; height:28px; padding-top:2px; margin-top:2px; margin-left:0px;">Get Listed</a>
                <div id="login" style="margin-right:17px;"><a href="users/login">Login</a></div>
                <?php else :?>
                <div style="margin-right:17px;float:right;" id="login"><a href="users/signout">Logout</a></div>                
                <div style="margin-right:17px;" id="login"><a href="users/account">My account</a></div>
                <?php endif; ?>
                <div class="clearfloat"></div>
            </div>  
        </div>
        <div id="inner_container" style="width:924px;">
            <div id="signup_left" style="width:675px;">
                <div id="signup_form_text6">Your <?php echo $this->session->userdata('eType'); ?> account</div>
                <div class="error_msg2"><?php echo $this->session->flashdata('signin'); ?></div>
                <div id="profile_header4" style="margin-top:40px;">Services</div>
                <div id="profile_header5" style="margin-top:42px; font-size:13px;"> 
                    <?php if ($this->session->userdata('eType') == 'Basic') : ?>
                        &#8211; <a href="users/publish_pro">Upgrade to Pro</a> to add more services.
                    <?php endif; ?>
                </div>
                <div class="clearfloat"></div>
                <div id="profile_sepline_left" style="margin-bottom:14px;"></div>
                <?php  foreach($account as $basic) :?>
                
                <div id="listing_card_small_profile">
                    <div id="listing_card_small_details_container">
                        <div id="listing_card_small_name"><a href="users/publish_pro"><?php echo $basic['vCompanyName'] ?></a></div>
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
                        <a href="users/profile/<?php echo $basic['iCompanyServiceId']?>">
                            <img src="uploads/2_<?php echo $basic['vImage'] ?>" width="209" height="163" />
                        </a>
                        <?php } ?>
                    </div>
                    <div id="listing_card_small_price">
                        <div id="listing_card_large_price_small">From</div>
                        <div id="listing_card_large_price_currency_small"><?php echo $basic['vCurrencySymbol'] ?></div>
                        <div id="listing_card_large_price_num_small"><?php echo $basic['fPrice'] ?></div>
                        <a href="users/edit_service/<?php echo $basic['iCompanyServiceId'] ?>" class="popup_finish_btn" id="close" title="Add to favourites" style="color:#444; font-size:13px; padding-top:0px; width:50px; height:19px;">Edit</a>
                        <div class="clearfloat"></div>
                    </div>
                </div>
                <?php  endforeach;  ?>
                <?php    $type = $this->session->userdata('eType');  ?>
                <?php if(count($account)==1):?>
                <a href="users/<?php echo ($type=='Basic')?'publish_pro':'new_service'?>" id="listing_card_small_profile_new"></a>
                <a href="users/<?php echo ($type=='Basic')?'publish_pro':'new_service'?>" id="listing_card_small_profile_new"></a>
                <?php elseif(count($account)==2):?>
                <a href="users/<?php echo ($type=='Basic')?'publish_pro':'new_service'?>" id="listing_card_small_profile_new"></a>
                <?php endif ?>
                <div class="clearfloat"></div>          
            </div>
            <div id="signup_right" style="width:218px;">
                <div id="account_bg6"><a href="users/settings">Settings<br /><br /><span style="font-size:13px; font-weight:normal; color:#666; line-height:18px;">Edit company and account settings.</span></a></div>
                <?php if ($this->session->userdata('eType') == 'Basic') : ?>
                    <div id="account_upgrade">
                        <div id="upgrade_header3">Upgrade</div>
                        <div id="upgrade_subtitle2">Cancel anytime.</div>
                        <div id="upgrade_header">Pro</div>
                        <div id="upgrade_point_price" style="margin-top:10px;">£49<span style="color:#999; font-size:11px; font-weight:bold;">/mo</span></div>
                        <div id="account_upgrade_text1">Large interactive listing card</div>
                        <div id="account_upgrade_text1">Listed above Basic</div>
                        <div id="account_upgrade_text1"><span style="font-weight:bold; color:#09F;">3</span> services</div>
                        <div id="account_upgrade_text1"><span style="font-weight:bold; color:#09F;">3</span> locations</div>
                        <div id="account_upgrade_text1">Image galleries</div>
                        <a href="users/publish_pro" class="btn" title="Apply" style="width:166px;font-size:15px; height:28px; padding-top:2px; margin-top:20px; margin-bottom:5px; margin-left:13px;">Upgrade to Pro</a>
                        <div class="clearfloat"></div>
                    </div>
                <?php else : ?>
                <?php endif; ?>
            </div>
            <div class="clearfloat"></div>
            <div id="logo_icon_text">© 2012 Area 20 Technology Ltd. All screenshots are owned by their respective owners.</div>
            <div class="clearfloat"></div>
        </div>
    </body>
</html>   