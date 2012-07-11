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
        <link href="<?= base_url() ?>css/slider.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>        
        <script src="<?php echo base_url(); ?>js/scrollpagination.js"></script>
        <script src="<?php echo base_url(); ?>js/slider.js"></script>        
        <script src="<?php echo base_url(); ?>js/home.js"></script>


        <script type="text/javascript">
            $(document).ready(function(){
                /*$("#country_active").hide(); 
                $("#vCountryCode").click(function() {
                    $("#country_inactive").hide();						  
                    $("#country_active").show();
                });*/
                $("#country_cancel, #country_active").click(function() {						  
                    $("#location").show();						  
                    $(".filter_bar_selected_location").hide();
                });
		
            });

        </script> 

        <script type="text/javascript">
            $(document).ready(function(){
                $(".filter_bar_selected").hide(); 
                $("#services").click(function() {
                    $("#services").hide();						  
                    $(".filter_bar_selected").show();
                });
                $("#selected, .selected_entry, #location, .searchfield, #budget").click(function() {
                    $("#services").show();						  
                    $(".filter_bar_selected").hide();
                });
            });

        </script> 

        <script type="text/javascript">
            $(document).ready(function(){
                $(".filter_bar_selected_location").hide(); 
                $("#location").click(function() {
                    $("#location").hide();						  
                    $(".filter_bar_selected_location").show();
                });
                $("#selected, .selected_entry, .searchfield, #services, #budget").click(function() {
                    $("#location").show();						  
                    $(".filter_bar_selected_location").hide();
                });
            });

        </script> 

        <script type="text/javascript">
            $(document).ready(function(){
                $(".filter_bar_selected_budget").hide(); 
                $("#budget").click(function() {
                    $("#budget").hide();						  
                    $(".filter_bar_selected_budget").show();
                });
                $("#selected, .selected_entry, .searchfield, #location, #services").click(function() {
                    $("#budget").show();						  
                    $(".filter_bar_selected_budget").hide();
                });
            });

        </script>
    </head>

    <body>
        <div id="inner_container" style="height:136px;">
            <div class="create_account_pop">

                <div id="logo"><a href="<?php echo base_url()?>"><img alt="Servlio" src="images/logo.png" /></a></div>
                <div id="accounts_text">Find services you need by location and budget.</div>
                <?php $login = $this->session->userdata('iUserId');?>
                <?php if(empty($login)) :?>
                <a href="users/signup" class="btn" title="Apply" style="width:95px; float:right; font-size:15px; height:28px; padding-top:2px; margin-top:2px; margin-left:0px;">Get Listed</a>
                <div id="login" style="margin-right:17px;"><a href="users/login">Login</a></div>
                <?php else :?>
                <div style="margin-right:17px;float:right;" id="login"><a href="users/signout">Logout</a></div>                
                <div style="margin-right:17px;" id="login"><a href="users/account">My account</a></div>
                <?php endif; ?>
                <div id="favourite_num" style="margin-right:10px;">)</div>
                <div id="favourite_num"><?echo $this->session->userdata('tot_fav');?></div>
                <div id="favourite_num">(</div>
                <div id="login"><a href="favorites/">Favourites</a></div>
                <div class="clearfloat"></div>

            </div>  
            <div id="filter_bar">
                <?php
                    if($search_text!="") {
                      $selected_val = "textsearch";
                      ?>
                      <input type="hidden" name="selected_text" id="selected_text" value="<?=$search_text?>">
                      <?
                    } elseif($service_id!="") {
                      $selected_val = "servicesearch";
                      ?>
                        <input type="hidden" name="selected_service" id="selected_service" value="<?=$service_id?>">
                      <?  
                    } elseif($budget_select!="") {
                      $selected_val = "budgetsearch";
                      ?>
                        <input type="hidden" name="selected_budget" id="selected_budget" value="<?=$budget_select?>">
                      <?  
                    } 
                    if($country!="" && $city!="") {
                      $selected_val = "countrysearch";
                    } 

                    if($selected_val == "countrysearch") {?>
                        <input type="hidden" name="selected_country" id="selected_country" value="<?=$country?>">
                        <input type="hidden" name="selected_city" id="selected_city" value="<?=$city?>">
                    <? }
                    //echo $selected_val;
                ?>
                <input type="hidden" name="selected_val" id="selected_val" value="<?=$selected_val?>">

                <div class="filter_bar_button" id="services">ALL SERVICES <img src="images/droplist.png" style="margin-left:112px;" /></div>
                <div class="filter_bar_selected" style="height:auto; padding-bottom:15px;">
                    <div id="selected" style="height:40px; padding-top:8px; cursor:pointer;">
                        <div style="margin-left:14px; float:left;">ALL SERVICES </div>
                        <img src="images/droplist.png" style="margin-left:115px; float:left; margin-top:9px;" />
                        <div class="clearfloat"></div>
                    </div>

                    <div class="selected_entry_header" style="font-size:11px;">Popular</div>
                    <select class="list" name="iServiceId" id="iServiceId">
                        <option value="volvo">Choose a service</option>
                            <?php
                            foreach ($popularservices as $key => $val) {
                                ?>                            
                                <option value="<?= $val['iServiceId'] ?>"><?= $val['vService'] ?></option>
                            <? } ?>
                    </select>

                </div>
                <div class="filter_bar_button_center" id="location">ALL LOCATIONS <img src="images/droplist.png" style="margin-left:100px;" /></div>
                <div class="filter_bar_selected_location">
                    <div id="selected" style="height:40px; padding-top:8px; cursor:pointer;">
                        <div style="margin-left:14px; float:left;">ALL LOCATIONS </div>
                        <img src="images/droplist.png" style="margin-left:103px; float:left; margin-top:9px;" />
                        <div class="clearfloat"></div>
                    </div>
                    <div class="selected_entry_header" style="font-size:11px;">Choose a location</div>
                    <select class="list" name="iCountryId" id="iCountryId">
                        <option value="All">All locations</option>
                            <?php
                            foreach ($popularcountry as $key => $val) {
                                ?>                            
                                <option value="<?= $val['vCountryCode'] ?>"><?= $val['vCountry'] ?></option>
                            <? } ?>
                    </select>
                    <div id="filter_link"><a href="home/locations">List all locations</a></div>                    
                </div>
                <div class="filter_bar_button_center" id="budget">ALL BUDGETS <img src="images/droplist.png" style="margin-left:113px;" /></div>
                <div class="filter_bar_selected_budget">
                    <div id="selected" style="height:40px; padding-top:8px; cursor:pointer;">
                        <div style="margin-left:14px; float:left;">ALL BUDGETS </div>
                        <img src="images/droplist.png" style="margin-left:115px; float:left; margin-top:9px;" />
                        <div class="clearfloat"></div>
                    </div>
                    <div class="selected_entry_header" style="font-size:11px;">Choose a budget</div>
                    <select class="list" name="budget_select" id="budget_select">
                        <option value="volvo">All budgets</option>
                        <option value="25">Under 25</option>
                        <option value="25-50">25 - 50</option>
                        <option value="50-75">50 - 75</option>
                        <option value="75-100">75 - 100</option>
                        <option value="100">Over 100</option>
                    </select>

                </div>
                <div id="filter_bar_button_end"><input type="text"  class="searchfield" name="search_text" id="search_text" placeholder="Search"/></div>
                <div class="clearfloat"></div>
            </div>
        </div>
        <div id="inner_container">
            <input type="hidden" id="currpage" value="1">
            <div id="ajax_content">
                <?php echo $this->load->view('home/homepage_ajax'); ?>
            </div>
            <div class="clearfloat"></div>
            <div id="card_loader"></div>
            <div class="clearfloat"></div>
            <div id="logo_icon_text">© 2012 Area 20 Technology Ltd. All screenshots are owned by their respective owners.</div>
        </div>

    </body>
</html>
