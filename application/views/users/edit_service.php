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
        <script src="<?php echo base_url(); ?>js/edit_service.js"></script>
        <style>
            .err{
                color: #FF0000;
            }
        </style>

    </head>
    <?php $type = $this->session->userdata('eType'); ?>
    <body>
        <div id="inner_container" style="height:79px;">
            <div class="create_account_pop" style="margin-top:-7px; position:fixed;">
                <div id="logo"><a href="<?php echo base_url(); ?>"><img alt="Servlio" src="images/logo.png" /></a></div>
                <div id="accounts_text">Connect to customers in your area.</div>
            </div>  
        </div>
        <div id="inner_container" style="width:924px;">
            <div id="breadcrumb"><a href="users/account">Account</a></div>
            <div id="breadcrumb">&rarr;</div> 
            <div id="breadcrumb" style="color:#666">Edit service</div> 
            <div class="booking_btn_back" id="payb3">
                <div style="margin-top:0px; float:left;"><a href="javascript:javascript:history.go(-1)">&larr; Back</a></div></div>
            <div class="clearfloat"></div>
            <form name="frmeditservice" id="frmeditservice" action="users/edit_service_a" method="post" enctype="multipart/form-data">
                <input type="hidden" name="iCompanyServiceId" value="<?php echo $basic['iCompanyServiceId']; ?>" />
                <div id="signup_left" style="<?php echo ($type=='Basic')?'':'width:443px;'?>">
                    <div id="signup_form_text6" style="margin-top:10px;">Edit this service</div>
                    <div id="signup_service_bg" style="<?php echo ($type=='Basic')?'':'width:370px;'?>">
                        <div id="signup_form_text8" style="margin-top:0px;">Category</div>

                        <select class="list" id="iCategoryId" name="iCategoryId" style="margin-left:0px; margin-top:10px;">
                            <option value="">Choose a category</option>
                            <?php foreach ($categories as $key => $val) { ?>                            
                                <option value="<?= $val['iCategoryId'] ?>" <?php echo ($val['iCategoryId'] == $basic['iCategoryId']) ? 'selected' : '' ?>><?= $val['vCategory'] ?></option>
                            <? } ?>
                        </select>
                        <div>
                            <div id="signup_form_text8">Locations</div>
                            <select name="iCompanyLocationId" name="iCompanyLocationId">
                                <?php foreach ($location as $row) : ?>
                                    <option <?php echo ($row['iCompanyLocationId'] == $basic['iCompanyLocationId']) ? 'selected="selected"' : '' ?> value="<?php echo $row['iCompanyLocationId'] ?>">
                                        <?php echo (isset($row['vCity']) && !empty($row['vCity']) ? $row['vCity'] : ''); ?>
                                        <?php echo (isset($row['vState']) && !empty($row['vState']) ? (isset($row['vCity']) && !empty($row['vCity']) ? ',' . $row['vState'] : $row['vState']) : ''); ?>
                                        <?php echo (isset($row['vCountry']) && !empty($row['vCountry']) ? (isset($row['vState']) && !empty($row['vState']) ? ',' . $row['vCountry'] : $row['vCountry']) : ''); ?>
                                    </option>  
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div id="cat_services">
                            <div id="signup_form_text8">Service</div>
                            <div id="signup_form_subtext">If your service is not listed, choose “My service is not listed”.</div>
                            <select class="list" style="margin-left:0px; margin-top:10px;" name="iServiceId" id="iServiceId">

                            </select>
                        </div>
                        <div id="not_listed" style="<?php echo ($basic['iServiceId'] > 0) ? 'display:none' : '' ?>">

                            <div id="signup_form_text8">Enter service name</div>
                            <div id="signup_form_subtext">As you type we'll make recommendations — please select one if it's close.</div>
                            <input  type="text"  name="vServiceName" id="vServiceName" value="<?php echo $basic['vServiceName'] ?>" class="signup_input_login3" style="margin-top:10px;" placeholder="Service name" />

                            <div id="signup_subtitle" style="margin-top:10px;">e.g. 'Personal Training', 'Yoga', or 'Health Club'</div>
                        </div>

                        <div id="signup_form_text8">Main image</div>
                        <div id="signup_form_subtext">Upload an image that best represents this service. You can always change it after your listing has been created.</div>
                        <div id="update_images"><img src="uploads/<?php echo $basic['vImage'] ?>" style="width:120px;height:93px;"/></div>
                        <div class="clearfloat"></div>
                        <input  type="file" onfocus="this.value=''" name="vImage" class="signup_file" value="" />
                        <input type="hidden" name="vOldImage" value="<?php echo $basic['vImage'] ?>" />
                        <div id="signup_subtitle">For best results upload a 650 x 350 jpg or png.</div>

                        
                        <?php if ($type == 'Basic') : ?>
                            <div id="signup_form_text8">Gallery</div>
                            <div id="signup_form_subtext"><a href="users/publish_pro">Upgrade to Pro</a> to add up to 5 extra images of this service.</div>
                        <?php else: ?>
                            <div id="signup_form_text8">Gallery</div>
                            <div id="signup_form_subtext">Add up to 5 images of this service.</div>
                            
                            <input type="hidden" name="iTemplateId" value="<?php echo $gallery[0]['iTemplateId']?>" />
                            <input type="hidden" name="vOldGalleryImage" value="<?php echo $gallery[0]['vImage']?>" />
                            <?php if(file_exists(APPPATH.'theme/uploads/'.$gallery[0]['vImage'])) :?>
                            <div id="update_images"><img src="uploads/<?php echo $gallery[0]['vImage'] ?>" style="width:120px;height:93px;"/></div>
                            <?php endif;?>
                            <input  type="file" onfocus="this.value=''" name="vGalleryImage" id="vGalleryImage" class="signup_file" value="" />
                            
                            <input type="hidden" name="iTemplateId1" value="<?php echo $gallery[1]['iTemplateId']?>" />
                            <input type="hidden" name="vOldGalleryImage1" value="<?php echo $gallery[1]['vImage']?>" />
                            <?php if(file_exists(APPPATH.'theme/uploads/'.$gallery[1]['vImage'])) :?>
                            <div id="update_images"><img src="uploads/<?php echo $gallery[1]['vImage'] ?>" style="width:120px;height:93px;"/></div>
                            <?php endif;?>
                            <input  type="file" onfocus="this.value=''" name="vGalleryImage1" id="vGalleryImage1" class="signup_file" value="" />

                            <input type="hidden" name="iTemplateId2" value="<?php echo $gallery[2]['iTemplateId']?>" />
                            <input type="hidden" name="vOldGalleryImage2" value="<?php echo $gallery[2]['vImage']?>" />
                            <?php if(file_exists(APPPATH.'theme/uploads/'.$gallery[2]['vImage'])) :?>
                            <div id="update_images"><img src="uploads/<?php echo $gallery[2]['vImage'] ?>" style="width:120px;height:93px;"/></div>
                            <?php endif;?>
                            <input  type="file" onfocus="this.value=''" name="vGalleryImage2" id="vGalleryImage2" class="signup_file" value="" />

                            <input type="hidden" name="iTemplateId3" value="<?php echo $gallery[3]['iTemplateId']?>" />
                            <input type="hidden" name="vOldGalleryImage3" value="<?php echo $gallery[3]['vImage']?>" />
                            <?php if(file_exists(APPPATH.'theme/uploads/'.$gallery[3]['vImage'])) :?>
                            <div id="update_images"><img src="uploads/<?php echo $gallery[3]['vImage'] ?>" style="width:120px;height:93px;"/></div>
                            <?php endif;?>
                            <input  type="file" onfocus="this.value=''" name="vGalleryImage3" id="vGalleryImage3" class="signup_file" value="" />
                            
                            <input type="hidden" name="iTemplateId4" value="<?php echo $gallery[4]['iTemplateId']?>" />
                            <input type="hidden" name="vOldGalleryImage4" value="<?php echo $gallery[4]['vImage']?>" />
                            
                            <?php if(file_exists(APPPATH.'theme/uploads/'.$gallery[4]['vImage'])) :?>
                            <div id="update_images"><img src="uploads/<?php echo $gallery[4]['vImage'] ?>" style="width:120px;height:93px;"/></div>
                            <?php endif;?>
                            <input  type="file" onfocus="this.value=''" name="vGalleryImage4" id="vGalleryImage4" class="signup_file" value="" />
                            <div id="signup_subtitle">For best results upload a 650 x 350 jpg or png.</div>
                        <? endif; ?>
                        <div id="signup_form_text8">Description</div>
                        <textarea class="new_service_input_area" style="width:347px;"  cols="45" rows="5" name='vDescription' id='vDescription' ><?php echo $basic['vDescription']; ?></textarea>
                        <div id="signup_subtitle"><span style="color:#333;">280</span></div>



                        <div id="signup_form_text8">Price</div>

                        <div id="signup_form_currency" style="margin-top:16px;">From:</div> 
                        <input  type="text" onfocus="this.value=''" name="fPrice" id="fPrice" value="<?php echo $basic['fPrice'] ?>" class="signup_input_login3" style="width:60px; font-size:13px; height:26px; margin-top:10px; margin-left:9px; padding-left:6px;"/>

                        <div class="clearfloat"></div>

                        <div id="signup_sepline"></div>
                    </div>
                    <a href="javascript:;" id="sbmtButton" class="btn" title="Apply" style="width:95px;font-size:15px; height:28px; padding-top:2px; margin-top:20px; margin-left:0px;">Update</a>
                    <div class="clearfloat"></div>
                    <div id="logo_icon_text">© 2012 Area 20 Technology Ltd. All screenshots are owned by their respective owners.</div>
                </div>
            </form>
            <?php if ($type == 'Basic') : ?>
                <div id="signup_right">
                    <div id="upgrade_top3" style="margin-top:10px; height:320px;">
                        <div id="upgrade_header2">Your listing card</div>
                        <div id="listing_card_small3" >
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
                            <div id="card_small_img"><img src="uploads/<?php echo $basic['vImage'] ?>" width="209" height="163" /></div>
                            <div id="listing_card_small_price">
                                <div id="listing_card_large_price_small">From</div>
                                <div id="listing_card_large_price_currency_small"><?php echo $basic['vCurrencySymbol'] ?></div>
                                <div id="listing_card_large_price_num_small"><?php echo $basic['fPrice'] ?></div>
                                <div class="clearfloat"></div>
                            </div>
                            <div class="clearfloat"></div>		
                        </div>
                        <div class="clearfloat"></div>
                        <div id="upgrade_point2" style="margin-top:8px;">Want a large listing card? <a href="javascript:;" id="frmeditservice">Upgrade</a>.</div>
                    </div>
                </div>
            <?php else : ?>
                <div id="signup_right" style="width:450px;">
                    <div id="large_list_bg" style="margin-top:38px;">

                        <div id="upgrade_header2">Your listing card</div>

                        <div id="listing_card_large" style="margin-top:0px; margin-bottom:0px;">
                            <div id="listing_card_large_details_container">
                                <div id="listing_card_large_name"><?php echo $basic['vCompanyName'] ?></div>
                                <div class="clearfloat"></div>
                                <div id="listing_card_large_location" ><?php echo $basic['vCity'] ?></div>
                                <div id="listing_card_large_location3">,</div>
                                <div id="listing_card_large_location2"><?php echo $basic['vCountry'] ?></div>
                                <div class="clearfloat"></div>
                                <div id="listing_card_large_profession" ><?php echo $basic['vService'] ?></div>
                                <div class="clearfloat"></div>
                            </div>
                            <div id="listing_card_large_logo"><img src="uploads/<?php echo $basic['vCompanyLogo'] ?>"/></div>
                            <div class="clearfloat"></div>
                            <div id="service_card_image_loader2"><img style="height:347px;width:444px;" src="uploads/<?php echo $basic['vImage'] ?>"/></div>
                            <div id="card_large_dots_container">
                            </div>
                            <div id="listing_card_large_description"></div>
                            <div id="listing_card_large_bottom_container">
                                <div id="listing_card_large_price">From</div>
                                <div id="listing_card_large_price_num"><?php echo $basic['vCurrencySymbol'] ?></div>
                                <div id="listing_card_large_price_num"><?php echo $basic['fPrice'] ?></div>
                                <div class="clearfloat"></div>
                            </div>
                        </div>
                        <div class="clearfloat"></div>
                    </div>
                    <div class="clearfloat"></div>
                </div> 
            <?php endif; ?>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        var getServices = function() {
            $.post('users/getService',{
                iCategoryId:<?php echo $basic['iCategoryId'] ?>
            },function(res){
                $("#iServiceId").html(res);
                $("#iServiceId option").filter(function() {
                    //may want to use $.trim in here
                    return $(this).val() == '<?php echo $basic['iServiceId'] ?>'; 
                }).attr('selected', true);
            });
        }
        getServices();
    });
    
    $("#iCategoryId").change(function() {					  
        $.post('users/getService',{
            iCategoryId:$(this).val()
        },function(res){
            $("#iServiceId").html(res);
            $('#iServiceId option:first').attr('selected', 'selected');
        });
    });
    $("#iServiceId").change(function(){
        if($(this).val()=='-1') {
            $("#not_listed").fadeIn('fast');
        } else {
            $("#not_listed").fadeOut('fast');
        }
    });
</script>    