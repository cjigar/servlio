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

    </head>

    <body>

        <div id="inner_container" style="height:79px;">
            <div class="create_account_pop" style="margin-top:-7px; position:fixed;">

                <div id="logo"><a href="<?php echo base_url()?>"><img alt="Servlio" src="images/logo.png" /></a></div>
                <div id="accounts_text">Locations</div>
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
                <div id="login"><a href="home/favourites">Favourites</a></div>
                <div class="clearfloat"></div>

            </div>  
        </div>
        <div id="inner_container">
            <div id="breadcrumb"><a href="<?php echo base_url()?>">Home</a></div>
            <div id="breadcrumb">&rarr;</div> 
            <div id="breadcrumb" style="color:#666">Locations</div> 
            <div class="booking_btn_back" id="payb3">
                <div style="margin-top:0px; float:left;"><a href="javascript:javascript:history.go(-1)">&larr; Back</a></div></div>
            <div class="clearfloat"></div>
            <div id="location_header" style="margin-top:10px;">Top locations</div>

            <div class="clearfloat"></div>
            <div id="location_sepline2"></div>
            <div id="location_sepline3"></div>
            
            <?php for($k=0;$k<count($top_location);$k++) {?>
                <div id="locations_container">
                    <div id="locations_location4"><a href="<?php echo base_url()?>?city=<?php echo $top_location[$k]['iCityId']?>"><?php echo $top_location[$k]['vCity']?></a></div>
                </div>
            <?php } ?>
            
            <div class="clearfloat"></div>
            
            <?php foreach($location as $key => $val) {?>
            <div id="location_header"><a href="<?php echo base_url()?>?country=<?php echo ($key=='US')? 'US' : $val[0][0]['vCountryCode']?>"><?php echo ($key=='US')? 'United States' : $val[0][0]['vCountry']?></a></div> 
            <div class="clearfloat"></div>
            <div id="location_sepline2"></div>
            <div id="location_sepline3"></div>
             <?php 
                if($key=='US') {
                foreach($val as $row) {
                
                    ?>    
                <div id="locations_container">
                    <div id="locations_letters"><a href="#"><?php echo $row[0]['vState']?></a></div> 
                    <?php for($l=0;$l<count($row);$l++) {?>
                    <div id="locations_location"><a href="<?php echo base_url()?>?city=<?php echo $row[$l]['iCityId']?>"><?php echo $row[$l]['vCity']?></a></div>
                    <? } ?>
                </div>
                <?php }
                } else { $val = $val[0]; 
                for($l=0;$l<count($val);$l++) {?>
                <div id="locations_container">
                    <div id="locations_location"><a href="<?php echo base_url()?>?city=<?php echo $val[$l]['iCityId']?>"><?php echo $val[$l]['vCity']?></a></div>
                </div>
                <?php } } ?>
            <div class="clearfloat"></div>
            
            <?php } ?>
            
            <div id="location_header">Other countries</div> 
            <div class="clearfloat"></div>
            <div id="location_sepline2"></div>
            <div id="location_sepline3"></div>
             <?php for($j=0;$j<count($other);$j++) {?>
            <div id="locations_container">
               
                <div id="locations_location"><a href="<?php echo base_url()?>?country=<?php echo $other[$j]['vCountryCode']?>"><?php echo $other[$j]['vCountry']?></a></div>
                
            </div>
            <?php } ?>
            <div class="clearfloat"></div>
           <div id="logo_icon_text">© 2012 Area 20 Technology Ltd. All screenshots are owned by their respective owners.</div>        


        </div>

    </body>
</html>
