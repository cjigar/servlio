
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
        <script src="<?php echo base_url(); ?>js/profile.js"></script>
    </head>

    <body>
        <div id="inner_container" style="height:79px;">
            <div class="create_account_pop" style="margin-top:-7px; position:fixed;">
                <div id="logo"><a href="<?php echo base_url() ?>"><img alt="Servlio" src="images/logo.png" /></a></div>
                <div id="accounts_text">Find services you need by location and budget.</div>
                <?php $login = $this->session->userdata('iUserId'); ?>
                <?php if (empty($login)) : ?>
                    <a href="users/signup" class="btn" title="Apply" style="width:95px; float:right; font-size:15px; height:28px; padding-top:2px; margin-top:2px; margin-left:0px;">Get Listed</a>
                    <div id="login" style="margin-right:17px;"><a href="users/login">Login</a></div>
                <?php else : ?>
                    <div style="margin-right:17px;float:right;" id="login"><a href="users/signout">Logout</a></div>                
                    <div style="margin-right:17px;" id="login"><a href="users/account">My account</a></div>
                <?php endif; ?>
                <div id="favourite_num" style="margin-right:10px;">)</div>
                <div id="favourite_num"><? echo $this->session->userdata('tot_fav'); ?></div>
                <div id="favourite_num">(</div>
                <div id="login"><a href="favorites/">Favourites</a></div>
                <div class="clearfloat"></div>
            </div>  
        </div>
        <?php
        /*
        if (file_exists($this->config->config['upload_path'] . $udetail[0]['vImage'])) {
            $udetail[0]['vImage'] = $this->config->config['upload_url'] . '4_' . $udetail[0]['vImage'];
        } 
        if (file_exists($this->config->config['upload_path'] . $udetail[0]['vCompanyLogo'])) {
            $udetail[0]['vCompanyLogo'] = $this->config->config['upload_url'] . $udetail[0]['vCompanyLogo'];
        }
        */
        $image_group = $udetail[0]['image_group'];
        $image_group_arr = explode(",", $image_group);
        for ($j = 0; $j < count($image_group_arr); $j++) {
            if (file_exists($this->config->config['upload_path'] . $image_group_arr[$j]) && $image_group_arr[$j] != "") {
                $udetail[0]['image_data'][] = $this->config->config['upload_url'] . $image_group_arr[$j];
            }
        }
        ?>        
        <div id="inner_container">
            <div id="breadcrumb"><a href="/">Home</a></div>
            <div id="breadcrumb">&rarr;</div> 
            <div id="breadcrumb" style="color:#666"><?php echo $udetail[0]['vCompanyName'] ?></div> 
            <div class="booking_btn_back" id="payb3">
                <div style="margin-top:0px; float:left;"><a href="javascript:javascript:history.go(-1)">&larr; Back</a></div></div>
            <div class="clearfloat"></div>
            <div id="large_profile">

                <div id="large_profile_details_container">
                    <div id="profile_logo">
                    
                        <?php if (is_file(APPPATH . 'theme/uploads/' . $udetail[0]['vCompanyLogo'])) : ?>
                            <img src="<?php echo 'uploads/'.$udetail[0]['vCompanyLogo'] ?>" width="118" height="84" />
                        <?php endif; ?>
                    </div>
                    <div id="large_profile_text_container">
                        <div id="large_profile_name"><?php echo $udetail[0]['vCompanyName'] ?></div>
                        <div class="error_msg2"><?php echo $this->session->flashdata('signin'); ?></div>
                        <a href="#" id="twit"><span>Twitter</span></a>
                        <?php if ($udetail[0]['vTwitter'] != "") { ?>
                            <div class="sep_dot"></div>
                            <div class="link"><a href="<?php echo $udetail[0]['vTwitter'] ?>" target="_blank"><?php echo $udetail[0]['vTwitter'] ?></a></div>
                        <?php } ?>
                        <?php if ($udetail[0]['vEmail'] != "") { ?>
                            <div class="sep_dot"></div>
                            <div class="link"><a href="mailto:<?php echo $udetail[0]['vEmail'] ?>"><?php echo $udetail[0]['vEmail'] ?></a></div>
                        <?php } ?>
                        <?php if ($udetail[0]['vPhone'] != "") { ?>
                            <div class="sep_dot"></div>
                            <div class="link"><?php echo $udetail[0]['vPhone'] ?></div>
                        <?php } ?>
                        <div class="clearfloat"></div>
                        <div class="fblike"> 
                            <script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
                            <div>
                                <a href="http://twitter.com/share" class="twitter-share-button"
                                   data-url="http://servlio.com/123456"
                                   data-via="servlio"
                                   data-text="Checking out Matt Roberts"
                                   data-related="anywhere:The Javascript API"
                                   data-count="none">Tweet</a>
                            </div>
                        </div>             
                        <?php if ($listingdata[$i]['iUserFavoriteId'] == "") { ?>
                            <div id="addfav_<?= $udetail[0]['iCompanyServiceId'] ?>" class="popup_finish_btn" id="close" title="Add to favourites" style="float:left; margin-top:7px; padding-top:3px; height:15px;"><img src="images/favourite.png" width="11" height="11" /></div>
                        <?php } else { ?>
                            <div class="popup_finish_btn_fav" id="close" >Its your Favorite</div>
                        <?php } ?>                        


                        <div class="clearfloat"></div>
                    </div>

                    <div class="clearfloat"></div>

                    <div id="profile_container_left">
                        <div id="profile_header4" style="margin-top:10px;">About</div>
                        <div id="profile_header5" style="margin-top:10px;"><?php echo (isset($udetail[0]['vService']) && !empty($udetail[0]['vService'])) ? $udetail[0]['vService'] : (!empty($udetail[0]['vServiceName']) ? $udetail[0]['vServiceName'] : '--'); ?></div>
                        <div class="clearfloat"></div>
                        <div id="profile_sepline_left"></div>
                        <div id="large_profile_container_image">
                                   
                        <?php if (is_file(APPPATH.'theme/uploads/4_'.$udetail[0]['vImage'])) : ?>    
                             <img src="<?php echo 'uploads/4_'.$udetail[0]['vImage'] ?>" width="655" height="471" /> 
                        <?php endif; ?>
                        </div> 
                        <div id="profile_text3">
                            <?php echo nl2br($udetail[0]['vDescription']) ?>
                        </div>
                    </div>
                    <div id="profile_container_right">
                        <div id="profile_header4" style="margin-top:10px;">About</div>
                        <div id="profile_header5" style="margin-top:10px;"><?php echo $udetail[0]['vCompanyName'] ?></div>
                        <div class="clearfloat"></div>
                        <div id="profile_sepline"><?php echo nl2br($udetail[0]['vAbout']) ?></div>
                        <div id="profile_text"></div>
                        <div id="profile_header4">Address</div>
                        <div class="clearfloat"></div>
                        <div id="profile_sepline"></div>
                        <div id="profile_text"><?php echo (isset($udetail[0]['vAddress']) && !empty($udetail[0]['vAddress'])) ? $udetail[0]['vAddress'] : '--'; ?></div>
                        <div id="profile_header4">Locations covered</div>
                        <div class="clearfloat"></div>
                        <div id="profile_sepline"></div>
                        <div id="profile_text"><a href="index.html"><?php echo $udetail[0]['vCity'] ?>, <?php echo (isset($udetail[0]['vState'])) ? $udetail[0]['vState'] . ',' : '' ?><?php echo $udetail[0]['vCountry'] ?></a></div>
                        <div id="profile_header4">Price</div>
                        <div class="clearfloat"></div>
                        <div id="profile_sepline"></div>
                        <div id="profile_text">
                            <div id="listing_card_large_price_small">From</div> 
                            <div id="listing_card_large_price_currency_small"><? echo $udetail[0]['vCurrencySymbol'] ?></div>
                            <div id="listing_card_large_price_num_small"><? echo $udetail[0]['fPrice'] ?></div>                        
                        </div>                        
                    </div>
                </div>
                <div class="clearfloat"></div>
                <div id="profile_bottom_container">
                    <div id="action_container_text">Like what you see? Contact Matt Roberts.</div>
                    <div id="action_container_subtext">(Let them know Servlio sent you.)</div>
                    <div id="action_container">
                        <?php if (isset($udetail[0]['vWebSite']) && !empty($udetail[0]['vWebSite'])): ?>
                            <div class="link"><a href="<?php echo $udetail[0]['vWebSite'] ?>" target="_blank" style="font-size:18px;"><?php echo $udetail[0]['vWebSite'] ?></a></div>
                            <div class="sep_dot" style="background-color:#666;"></div>
                        <?php endif; ?>
                        <div class="link"><a href="mailto:<?php echo $udetail[0]['vEmail'] ?>" style="font-size:18px;"><?php echo $udetail[0]['vEmail'] ?></a></div>
                        <div class="sep_dot" style="background-color:#666;"></div>
                        <div class="link" style="color:#CCC;"><?php echo $udetail[0]['vPhone'] ?></div>
                        <div class="clearfloat"></div>
                    </div>
                </div>
            </div><!--large_profile -->
            <div id="logo_icon_text">© 2012 Area 20 Technology Ltd. All screenshots are owned by their respective owners.</div>
        </div>
    </body>
</html>
