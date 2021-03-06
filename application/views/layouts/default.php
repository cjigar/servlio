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
        <script type="text/javascript">
            $(document).ready(function(){
                $("#cat_services").hide(); 
                $("#categories").click(function() {					  
                    $("#cat_services").fadeIn("fast");
                });
            });
        </script> 
        <script type="text/javascript">
            $(document).ready(function(){
                $("#country_active").hide(); 
                $("#countries").click(function() {
                    $("#country_inactive").hide();						  
                    $("#country_active").show();
                });
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
                <div class="filter_bar_button" id="services">ALL SERVICES <img src="images/droplist.png" style="margin-left:112px;" /></div>
                <div class="filter_bar_selected" style="height:auto; padding-bottom:15px;">
                    <div id="selected" style="height:40px; padding-top:8px; cursor:pointer;">
                        <div style="margin-left:14px; float:left;">ALL SERVICES </div>
                        <img src="images/droplist.png" style="margin-left:115px; float:left; margin-top:9px;" />
                        <div class="clearfloat"></div>
                    </div>
                    
                    <div class="selected_entry_header" style="font-size:11px;">Popular</div>
                    <select class="list">
                        <option value="volvo">Choose a service</option>
                        <option value="volvo">Personal Training</option>
                        <option value="volvo">Pilates</option>
                        <option value="volvo">Yoga</option>
                        <option value="volvo">Jogging</option>
                        <option value="volvo">Boxing</option>
                        <option value="volvo">Bootcamp</option>
                    </select>
                    <div class="selected_entry_header" style="font-size:11px; margin-top:10px;">Category</div>
                    <select class="list"  id="categories">
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
                        <div class="selected_entry_header" style="font-size:11px; margin-top:10px;">Services</div>
                        <select class="list">
                            <option value="volvo">All services</option>
                            <option value="volvo">Personal Training</option>
                            <option value="volvo">Pilates</option>
                            <option value="volvo">Yoga</option>
                            <option value="volvo">Jogging</option>
                            <option value="volvo">Boxing</option>
                            <option value="volvo">Bootcamp</option>
                        </select>
                    </div>


                </div>
                <div class="filter_bar_button_center" id="location">ALL LOCATIONS <img src="images/droplist.png" style="margin-left:100px;" /></div>
                <div class="filter_bar_selected_location">
                    <div id="selected" style="height:40px; padding-top:8px; cursor:pointer;">
                        <div style="margin-left:14px; float:left;">ALL LOCATIONS </div>
                        <img src="images/droplist.png" style="margin-left:103px; float:left; margin-top:9px;" />
                        <div class="clearfloat"></div>
                    </div>
                    <div class="selected_entry_header" style="font-size:11px;">Country</div>
                    <select class="list" id="countries">

                        <option value="volvo">All countries</option>
                        <option value="volvo">United Kingdom</option>
                        <option value="volvo">United States</option>
                        <option value="volvo">Germany</option>
                        <option value="volvo">Canada</option>
                        <option value="volvo">Spain</option>
                    </select>
                    <div class="selected_entry_header" style="font-size:11px; margin-top:10px;">City</div>
                    <input type="text"  class="field" placeholder="City"/>
                    <div id="popup_bottom_cont">
                        <div class="inactive" id="country_inactive" title="Apply">Apply</div>
                        <div class="btn" id="country_active" title="Apply">Apply</div>
                        <div class="cancel" id="country_cancel" title="Cancel">Cancel</div>
                        <div class="clearfloat"></div>
                    </div>
                </div>
                <div class="filter_bar_button_center" id="budget">ALL BUDGETS <img src="images/droplist.png" style="margin-left:113px;" /></div>
                <div class="filter_bar_selected_budget">
                    <div id="selected" style="height:40px; padding-top:8px; cursor:pointer;">
                        <div style="margin-left:14px; float:left;">ALL BUDGETS </div>
                        <img src="images/droplist.png" style="margin-left:115px; float:left; margin-top:9px;" />
                        <div class="clearfloat"></div>
                    </div>
                    <div class="selected_entry_header" style="font-size:11px;">Choose a budget</div>
                    <select class="list">
                        <option value="volvo">All budgets</option>
                        <option value="volvo">Under 25</option>
                        <option value="volvo">25 - 50</option>
                        <option value="volvo">50 - 75</option>
                        <option value="volvo">75 - 100</option>
                        <option value="volvo">Over 100</option>
                    </select>

                </div>
                <div id="filter_bar_button_end"><input type="text"  class="searchfield" placeholder="Search"/></div>
                <div class="clearfloat"></div>
            </div>
        </div>
        <!-- container -->
        <div id="inner_container" style="width:924px;">
            <?php echo $template['body']; ?>  
        </div> 
        <!-- /container -->
        <div id="logo_icon_text">
            &copy; 2012 Area 20 Technology Ltd. All screenshots are owned by their respective owners.
        </div>
    </body>
</html>
