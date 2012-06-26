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
            <div id="breadcrumb"><a href="account_pro.html">Account</a></div>
            <div id="breadcrumb">&rarr;</div> 
            <div id="breadcrumb" style="color:#666">New service</div> 
            <div class="booking_btn_back" id="payb3">
                <div style="margin-top:0px; float:left;"><a href="javascript:javascript:history.go(-1)">&larr; Back</a></div></div>
            <div class="clearfloat"></div>

            <div id="signup_left" style="width:443px;">

                <div id="signup_form_text6" style="margin-top:10px;">Add a service</div>

                <div id="signup_service_bg" style="width:370px;">

                    <div id="signup_form_text8" style="margin-top:0px;">Category</div>
                    <select class="list"  id="categories" style="margin-left:0px; margin-top:10px;">
                        <option value="volvo">Choose a category</option>
                        <option value="volvo">All categories</option>
                        <option value="volvo">Beauty</option>
                        <option value="volvo">Charity</option>
                        <option value="volvo">Dental</option>
                        <option value="volvo">Events</option>
                        <option value="volvo">Fitness</option>
                        <option value="volvo">Medical</option>
                        <option value="volvo">Restaurants</option>
                        <option value="volvo">Shopping</option>
                        <option value="volvo">Spas &amp; Wellness</option>
                        <option value="volvo">Other</option>
                    </select>
                    <div id="cat_services">
                        <div id="signup_form_text8">Service</div>
                        <div id="signup_form_subtext">If your service is not listed, choose “My service is not listed”.</div>
                        <select class="list" style="margin-left:0px; margin-top:10px;">
                            <option value="volvo">All services</option>
                            <option value="volvo">Personal Training</option>
                            <option value="volvo">Pilates</option>
                            <option value="volvo">Yoga</option>
                            <option value="volvo">Jogging</option>
                            <option value="volvo">Boxing</option>
                            <option value="volvo">Bootcamp</option>
                            <option value="volvo">My service is not listed</option>
                        </select>
                    </div>
                    <div id="not_listed">
                        <div id="signup_form_text8">Enter service name</div>
                        <div id="signup_form_subtext">As you type we'll make recommendations — please select one if it's close.</div>
                        <input  type="text" onfocus="this.value=''" name="field" class="signup_input_login3" style="margin-top:10px;" placeholder="Service name" />

                        <div id="signup_subtitle" style="margin-top:10px;">e.g. 'Personal Training', 'Yoga', or 'Health Club'</div>
                    </div>

                    <div id="signup_form_text8">Main image</div>
                    <div id="signup_form_subtext">Upload an image that best represents this service. You can always change it after your listing has been created.</div>
                    <input  type="file" onfocus="this.value=''" name="field" class="signup_file" value="" />
                    <div id="signup_subtitle">For best results upload a 650 x 350 jpg or png.</div>


                    <div id="signup_form_text8">Gallery</div>
                    <div id="signup_form_subtext">Add up to 5 images of this service.</div>

                    <input  type="file" onfocus="this.value=''" name="field" class="signup_file" value="" />

                    <input  type="file" onfocus="this.value=''" name="field" class="signup_file" value="" />

                    <input  type="file" onfocus="this.value=''" name="field" class="signup_file" value="" />

                    <input  type="file" onfocus="this.value=''" name="field" class="signup_file" value="" />

                    <input  type="file" onfocus="this.value=''" name="field" class="signup_file" value="" />
                    <div id="signup_subtitle">For best results upload a 650 x 350 jpg or png.</div>
                    <div id="signup_form_text8">Description</div>
                    <textarea class="new_service_input_area" onfocus="this.value=''"  cols="45" rows="5" name='sDescription' style="width:347px;" ></textarea>
                    <div id="signup_subtitle"><span style="color:#333;">280</span></div>
                    <div id="signup_form_text8">Price</div>
                    <div id="signup_form_currency" style="margin-top:16px;">From:</div> 
                    <input  type="text" onfocus="this.value=''" name="field" class="signup_input_login3" style="width:60px; font-size:13px; height:26px; margin-top:10px; margin-left:9px; padding-left:6px;"/>
                    <div class="clearfloat"></div>
                    <div id="signup_sepline"></div>
                </div>
                <a href="account_pro.html" class="btn" title="Apply" style="width:125px;font-size:15px; height:28px; padding-top:2px; margin-top:20px; margin-left:0px;">Create service</a>
                <div class="clearfloat"></div>
                <div id="logo_icon_text">© 2012 Area 20 Technology Ltd. All screenshots are owned by their respective owners.</div>
            </div>
            <div id="signup_right" style="width:450px;">
                <div id="large_list_bg" style="margin-top:38px;">

                    <div id="upgrade_header2">Your listing card</div>

                    <div id="listing_card_large" style="margin-top:0px; margin-bottom:0px;">
                        <div id="listing_card_large_details_container">
                            <div id="listing_card_large_name">Matt Roberts</div>
                            <div class="clearfloat"></div>
                            <div id="listing_card_large_location" >Soho</div>
                            <div id="listing_card_large_location3">,</div>
                            <div id="listing_card_large_location2">London</div>
                            <div class="clearfloat"></div>
                            <div id="listing_card_large_profession" >Service</div>
                            <div class="clearfloat"></div>
                        </div>
                        <div id="listing_card_large_logo"><img src="images/mrlogo.jpg"/></div>
                        <div class="clearfloat"></div>
                        <div id="service_card_image_loader2"></div>
                        <div id="card_large_dots_container">
                        </div>
                        <div id="listing_card_large_description"></div>
                        <div id="listing_card_large_bottom_container">
                            <div id="listing_card_large_price">From</div>
                            <div id="listing_card_large_price_num">£</div>
                            <div id="listing_card_large_price_num">0</div>
                            <div class="clearfloat"></div>
                        </div>
                    </div>
                    <div class="clearfloat"></div>
                </div>
                <div class="clearfloat"></div>
            </div> 
    </body>
</html>    