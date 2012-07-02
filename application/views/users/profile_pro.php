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
                <div id="logo"><a href="index.html"><img alt="Servlio" src="images/logo.png" /></a></div>
                <div id="accounts_text">Find services you need by location and budget.</div>
                <a href="signup.html" class="btn" title="Apply" style="width:95px; float:right; font-size:15px; height:28px; padding-top:2px; margin-top:2px; margin-left:0px;">Get Listed</a>
                <div id="login" style="margin-right:17px;"><a href="login.html">Login</a></div>
                <div id="favourite_num" style="margin-right:10px;">)</div>
                <div id="favourite_num">0</div>
                <div id="favourite_num">(</div>
                <div id="login"><a href="favourites.html">Favourites</a></div>
                <div class="clearfloat"></div>
            </div>  
        </div>
        <div id="inner_container">
            <div id="breadcrumb"><a href="/">Home</a></div>
            <div id="breadcrumb">&rarr;</div> 
            <div id="breadcrumb" style="color:#666"><?php echo $udetail['vCompanyName']?></div> 
            <div class="booking_btn_back" id="payb3">
                <div style="margin-top:0px; float:left;"><a href="javascript:javascript:history.go(-1)">&larr; Back</a></div></div>
            <div class="clearfloat"></div>
            <div id="large_profile">
                
                <div id="large_profile_details_container">
                    <div id="profile_logo"><img src="uploads/<?php echo $udetail['vCompanyLogo']?>" width="118" height="84" /></div>
                    <div id="large_profile_text_container">
                        <div id="large_profile_name"><?php echo $udetail['vCompanyName']?></div>
                        <div class="error_msg2"><?php echo $this->session->flashdata('signin');?></div>
                        <a href="#" id="twit"><span>Twitter</span></a>
                        <div class="sep_dot"></div>
                        <div class="link"><a href="<?php echo $udetail['vTwitter']?>" target="_blank"><?php echo $udetail['vTwitter']?></a></div>
                        <div class="sep_dot"></div>
                        <div class="link"><a href="mailto:<?php echo $udetail['vEmail']?>"><?php echo $udetail['vEmail']?></a></div>
                        <div class="sep_dot"></div>
                        <div class="link"><?php echo $udetail['vPhone']?></div>
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
                        <div class="popup_finish_btn" id="close" title="Add to favourites" style="float:left; margin-top:7px; padding-top:3px; height:15px;"><img src="images/favourite.png" width="11" height="11" /></div>                      
                        <div class="clearfloat"></div>
                    </div>
                    <div class="clearfloat"></div>

                    <div id="profile_container_left">
                        <div id="profile_header4" style="margin-top:10px;">About</div>
                        <div id="profile_header5" style="margin-top:10px;"><?php echo (isset($udetail['vService']) && !empty($udetail['vService']))? $udetail['vService'] : '--'; ?></div>
                        <div class="clearfloat"></div>
                        <div id="profile_sepline_left"></div>
                        <div id="large_profile_container_image"><img src="uploads/<?php echo $udetail['vImage']?>"/> </div>


                        <div id="profile_text3">
                            <?php echo nl2br($udetail['vDescription'])?>
                        </div>
                    </div>
                    <div id="profile_container_right">
                        <div id="profile_header4" style="margin-top:10px;">About</div>
                        <div id="profile_header5" style="margin-top:10px;"><?php echo $udetail['vCompanyName']?></div>
                        <div class="clearfloat"></div>
                        <div id="profile_sepline"><?php echo nl2br($udetail['vDescription'])?></div>
                        <div id="profile_text"></div>
                        <div id="profile_header4">Address</div>
                        <div class="clearfloat"></div>
                        <div id="profile_sepline"></div>
                        <div id="profile_text"><?php echo (isset($udetail['vAddress']) && !empty($udetail['vAddress']))?$udetail['vAddress']: '--'; ?></div>
                        <div id="profile_header4">Locations covered</div>
                        <div class="clearfloat"></div>
                        <div id="profile_sepline"></div>
                        <div id="profile_text"><a href="index.html"><?php echo $udetail['vCity']?>, <?php echo (isset($udetail['vState']))? $udetail['vState'].',':'' ?><?php echo $udetail['vCountry']?></a></div>
                    </div>
                </div>
                <div class="clearfloat"></div>
                <div id="profile_bottom_container">
                    <div id="action_container_text">Like what you see? Contact Matt Roberts.</div>
                    <div id="action_container_subtext">(Let them know Servlio sent you.)</div>
                    <div id="action_container">
                        <?php if(isset($udetail['vWebSite']) && !empty($udetail['vWebSite'])):?>
                        <div class="link"><a href="<?php echo $udetail['vWebSite']?>" target="_blank" style="font-size:18px;"><?php echo $udetail['vWebSite']?></a></div>
                        <div class="sep_dot" style="background-color:#666;"></div>
                        <?php endif;?>
                        <div class="link"><a href="mailto:<?php echo $udetail['vEmail']?>" style="font-size:18px;"><?php echo $udetail['vEmail']?></a></div>
                        <div class="sep_dot" style="background-color:#666;"></div>
                        <div class="link" style="color:#CCC;"><?php echo $udetail['vPhone']?></div>
                        <div class="clearfloat"></div>
                    </div>
                </div>
            </div><!--large_profile -->
            <div id="logo_icon_text">© 2012 Area 20 Technology Ltd. All screenshots are owned by their respective owners.</div>
        </div>
 </body>
</html>
