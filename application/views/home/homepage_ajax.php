<?php

        $page = $this->input->post('page');
?>  
        <input id="totrec" type="hidden" value="<?echo $total_rows?>">  
          <?php 
          //pr($listingdata);
          for($i=0;$i<count($listingdata);$i++) { 
              if($listingdata[$i]['eType']=="Pro") {
              
              $image_group = $listingdata[$i]['image_group'];
              $image_group_arr = explode(",",$image_group);
              
              //echo count($image_group_arr)."<hr />";
              
              if(file_exists($this->config->config['upload_path'].$listingdata[$i]['vCompanyLogo'])) {
                  $listingdata[$i]['vCompanyLogo'] = $this->config->config['upload_url'].$listingdata[$i]['vCompanyLogo'];
              }              
              //Cover  Image insert here...
              if(file_exists($this->config->config['upload_path']."3_".$listingdata[$i]['vImage'])) {
                  $listingdata[$i]['image_data'][] = $this->config->config['upload_url']."3_".$listingdata[$i]['vImage'];
              }
              // Rest of  5 image comes from here.              
              for($j=0;$j<5;$j++) {
                  if(file_exists($this->config->config['upload_path']."3_".$image_group_arr[$j]) && $image_group_arr[$j]!="") {
                      $listingdata[$i]['image_data'][] = $this->config->config['upload_url']."3_".$image_group_arr[$j];
                  }
              }
          ?>
            <div id="listing_card_large">
                <div id="listing_card_large_details_container">
                    <div id="listing_card_large_name"><a href="users/profile_pro/<?=$listingdata[$i]['iCompanyServiceId']?>"><?php echo $listingdata[$i]['vCompanyName']?></a></div>
                    <div class="clearfloat"></div>
                    <div id="listing_card_large_location" >
                    <a href="<?=base_url()?>?city=<?echo $listingdata[$i]['iCityId']?>"><?php echo $listingdata[$i]['vCity']?></a>
                    </div>
                    <div id="listing_card_large_location3">,</div>
                    <div id="listing_card_large_location2"><a href="<?=base_url()?>?country=<?echo $listingdata[$i]['vCountryCode']?>"><?php echo $listingdata[$i]['vCountry']?></a></div>
                    <div class="clearfloat"></div>
                    <div id="listing_card_large_profession" ><?php echo $listingdata[$i]['vService']?></div>
                    <div class="clearfloat"></div>
                </div>
                <div id="listing_card_large_logo" >
                    <?php if(file_exists($this->config->config['upload_path'].$listingdata[$i]['vCompanyLogo'])) {?>
                    <a href="users/profile/<?=$listingdata[$i]['iCompanyServiceId']?>">
                        <img src="<?php echo $listingdata[$i]['vCompanyLogo']?>" />
                    </a>
                    <?php } ?>
                </div>
                <div class="clearfloat"></div>
                <div id="card_large_img"><a href="users/profile_pro/<?=$listingdata[$i]['iCompanyServiceId']?>">
                  <div id="slider-<?echo $listingdata[$i]['iCompanyServiceId']?>" class="glidecontentwrapper module">
                        <?php
                        $image_slide = $listingdata[$i]['image_data']; 
                        for($j=0;$j<count($image_slide);$j++) {
                        ?>
                          <div class="glidecontent glidecontent<?echo $listingdata[$i]['iCompanyServiceId']?>">
                            <img src="<?php echo $image_slide[$j]?>" data-thumb="<?php echo $image_slide[$j]?>" />
                          </div>
                          
                        <?php } ?>
                  </div>                
                </a></div>
                <div id="card_large_dots_container<?echo $listingdata[$i]['iCompanyServiceId']?>" class="card_large_dots_container">
                    <div id="arrow_l" class="prev"></div>
                    <div id="arrow_r" class="next"></div>                
                    <?php for($j=0;$j<count($image_slide);$j++) { ?>
                        <?php if($j==0) {?>
                            <div class="card_large_dots toc" id="card_large_dots_active"></div>
                        <?php } else { ?>
                         <div class="card_large_dots toc"></div>
                    <?php } }?>
                    <div class="clearfloat"></div>
                </div>
                <div id="listing_card_large_description">Personal Training is all about staying motivated, getting results and getting them on schedule. We recognise that every client is individual, and we know that every client requires a bespoke programme.</div>
                <div id="listing_card_large_bottom_container">
                    <div id="listing_card_large_price">From</div>
                    <div id="listing_card_large_price_num"><?echo $listingdata[$i]['vCurrencySymbol']?></div>
                    <div id="listing_card_large_price_num"><?echo $listingdata[$i]['fPrice']?></div>
                    <?php
                    if($listingdata[$i]['iUserFavoriteId']=="") {?>
                        <div class="popup_finish_btn" id="addfav_<?echo $listingdata[$i]['iCompanyServiceId']?>" title="Add to favourites"><img src="images/favourite.png" width="11" height="11" /></div>
                    <?php } else { ?>
                        <div class="popup_finish_btn_fav" id="close" >Its your Favorite</div>
                    <?php } ?>                    
                    <div class="clearfloat"></div>
                </div>
            </div>
            <script>
            $(document).ready(function() {
                
                featuredcontentglider.init({
                	gliderid: "slider-<?echo $listingdata[$i]['iCompanyServiceId']?>", //ID of main glider container
                	contentclass: "glidecontent<?echo $listingdata[$i]['iCompanyServiceId']?>", //Shared CSS class name of each glider content
                	togglerid: "card_large_dots_container<?echo $listingdata[$i]['iCompanyServiceId']?>", //ID of toggler container
                	remotecontent: "", //Get gliding contents from external file on server? "filename" or "" to disable
                	selected: 0, //Default selected content index (0=1st)
                	persiststate: false, //Remember last content shown within browser session (true/false)?
                	speed: 500, //Glide animation duration (in milliseconds)
                	direction: "rightleft", //set direction of glide: "updown", "downup", "leftright", or "rightleft"
                	autorotate: false, //Auto rotate contents (true/false)?
                	autorotateconfig: [4000, 10] //if auto rotate enabled, set [milliseconds_btw_rotations, cycles_before_stopping]
                });                  
            });
            </script>
          <?php } else {
              if(file_exists($this->config->config['upload_path'].$listingdata[$i]['vImage'])) {
                  $listingdata[$i]['vImage'] = $this->config->config['upload_url'].$listingdata[$i]['vImage'];
              }           
          ?>
            <div id="listing_card_small">
                <div id="listing_card_small_details_container">
                    <div id="listing_card_small_name"><a href="users/profile/<?=$listingdata[$i]['iCompanyServiceId']?>"><?php echo $listingdata[$i]['vCompanyName']?></a></div>
                    <div class="clearfloat"></div>
                    <div id="listing_card_small_location" ><?php echo $listingdata[$i]['vCity']?></div>
                    <div id="listing_card_small_location3" >,</div>
                    <div id="listing_card_small_location2" ><?php echo $listingdata[$i]['vCountry']?></div>
                    <div class="clearfloat"></div>
                    <div id="listing_card_small_profession"><?php echo $listingdata[$i]['vService']?></div>
                </div>
                <div class="clearfloat"></div>
                <div id="card_small_img"><a href="users/profile/<?=$listingdata[$i]['iCompanyServiceId']?>"><img src="<?php echo $listingdata[$i]['vImage']?>" width="209" height="163" /></a></div>
                <div id="listing_card_small_price">
                    <div id="listing_card_large_price_small">From</div>
                    <div id="listing_card_large_price_currency_small"><?echo $listingdata[$i]['vCurrencySymbol']?></div>
                    <div id="listing_card_large_price_num_small"><?echo $listingdata[$i]['fPrice']?></div>
                    <?php
                    if($listingdata[$i]['iUserFavoriteId']=="") {?>
                        <div class="popup_finish_btn" id="close" title="Add to favourites"><img src="images/favourite.png" width="11" height="11" /></div>
                    <?php } else { ?>
                        <div class="popup_finish_btn_fav" id="close" >Its your Favorite</div>
                    <?php } ?>
                    <div class="clearfloat"></div>
                </div>
            </div>
         <?php } 
         }
         ?>    
