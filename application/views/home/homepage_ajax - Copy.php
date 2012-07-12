<?php

        $page = $this->input->post('page');
?>  
        <input id="totrec" type="hidden" value="<?echo $total_rows?>">  
          <?php 
          #print_R($listingdata);exit;
          for($i=0;$i<count($listingdata);$i++) { 
              if($listingdata[$i]['eType']=="Pro") {
              
          ?>
            <div id="listing_card_large">
                <div id="listing_card_large_details_container">
                    <div id="listing_card_large_name"><a href="profile_pro.html"><?php echo $listingdata[$i]['vCompanyName']?></a></div>
                    <div class="clearfloat"></div>
                    <div id="listing_card_large_location" >
                        <?php echo $listingdata[$i]['vCity']?>
                    </div>
                    <div id="listing_card_large_location3">,</div>
                    <div id="listing_card_large_location2"><?php echo $listingdata[$i]['vCountry']?></div>
                    <div class="clearfloat"></div>
                    <div id="listing_card_large_profession" ><?php echo $listingdata[$i]['vService']?></div>
                    <div class="clearfloat"></div>
                </div>
                <div id="listing_card_large_logo"><a href="profile_pro.html"><img src="images/mrlogo.jpg"/></a></div>
                <div class="clearfloat"></div>
                <div id="arrow_l"></div>
                <div id="arrow_r"></div>
                <div id="card_large_img"><a href="profile_pro.html"><img src="images/mr1.jpg" width="444" height="347" /></a></div>
                <div id="card_large_dots_container">
                    <div class="card_large_dots" id="card_large_dots_active"></div>
                    <div class="card_large_dots"></div>
                    <div class="card_large_dots"></div>
                    <div class="card_large_dots"></div>
                    <div class="card_large_dots_last"></div>
                    <div class="clearfloat"></div>
                </div>
                <div id="listing_card_large_description">Personal Training is all about staying motivated, getting results and getting them on schedule. We recognise that every client is individual, and we know that every client requires a bespoke programme.</div>
                <div id="listing_card_large_bottom_container">
                    <div id="listing_card_large_price">From</div>
                    <div id="listing_card_large_price_num">£</div>
                    <div id="listing_card_large_price_num">45</div>
                    <div class="popup_finish_btn" id="close" title="Add to favourites"><img src="images/favourite.png" width="11" height="11" /></div>
                    <div class="clearfloat"></div>
                </div>
            </div>
          <?php } else { ?>
            <div id="listing_card_small">
                <div id="listing_card_small_details_container">
                    <div id="listing_card_small_name"><a href="profile.html">Matt Roberts</a></div>
                    <div class="clearfloat"></div>
                    <div id="listing_card_small_location" >Soho</div>
                    <div id="listing_card_small_location3" >,</div>
                    <div id="listing_card_small_location2" >London</div>
                    <div class="clearfloat"></div>
                    <div id="listing_card_small_profession">Personal Training</div>
                </div>
                <div class="clearfloat"></div>
                <div id="card_small_img"><a href="profile.html"><img src="images/mr1_small.jpg" width="209" height="163" /></a></div>
                <div id="listing_card_small_price">
                    <div id="listing_card_large_price_small">From</div>
                    <div id="listing_card_large_price_currency_small">£</div>
                    <div id="listing_card_large_price_num_small">45</div>
                    <div class="popup_finish_btn" id="close" title="Add to favourites"><img src="images/favourite.png" width="11" height="11" /></div>
                    <div class="clearfloat"></div>
                </div>
            </div>
         <?php } 
         }
         ?>    
