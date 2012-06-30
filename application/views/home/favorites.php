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
        <script src="<?php echo base_url(); ?>js/favorite.js"></script>


    </head>

    <body>
        <div id="inner_container" style="height:136px;">
            <div class="create_account_pop">

                <div id="logo"><a href="index.html"><img alt="Servlio" src="images/logo.png" /></a></div>
                <div id="accounts_text">Find services you need by location and budget.</div>

                <a href="users/signup" class="btn" title="Apply" style="width:95px; float:right; font-size:15px; height:28px; padding-top:2px; margin-top:2px; margin-left:0px;">Get Listed</a>
                <div id="login" style="margin-right:17px;"><a href="users/login">Login</a></div>
                <div id="favourite_num" style="margin-right:10px;">)</div>
                <div id="favourite_num">0</div>
                <div id="favourite_num">(</div>
                <div id="login"><a href="favourites.html">Favourites</a></div>
                <div class="clearfloat"></div>

            </div>  
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
                <div class="clearfloat"></div>
            </div>
        </div>
        <div id="inner_container">
            <input type="hidden" name="iUserId" id="iUserId" value="<?=$iUserId?>">
            <input type="hidden" id="currpage" value="1">
            <div id="ajax_content">
                <?php echo $this->load->view('home/homepage_ajax'); ?>
            </div>
            <div class="clearfloat"></div>
            <div id="card_loader"></div>
            <div class="clearfloat"></div>
            <div id="invite_sent">
            		<div id="invite_sent_text">Share your favorites with this link:</div>
                  <div id="invite_sent_text">
                  <?php if($IP!="") {?>
                      <a href="<?=base_url()?>favorites/<?=$IP?>"><?=base_url()?>favorites/<?=$IP?></a>
                  <?php } else { ?>
                      <a href="<?=base_url()?>favorites/<?=$iUserId?>"><?=base_url()?>favorites/<?=$iUserId?></a>
                  <?php } ?>
                  </div>
            </div>            
            <div id="logo_icon_text">© 2012 Area 20 Technology Ltd. All screenshots are owned by their respective owners.</div>
        </div>

    </body>
</html>
