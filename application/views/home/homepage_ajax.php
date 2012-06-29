<?php

        $page = $this->input->post('page');
?>  
        <input id="totrec" type="hidden" value="<?echo $total_rows?>">  
          <?php 

          for($i=0;$i<count($listingdata);$i++) { 
              if($listingdata[$i]['eType']=="Pro") {
              
              $image_group = $listingdata[$i]['image_group'];
              $image_group_arr = explode(",",$image_group);
              if(file_exists($this->config->config['upload_path'].$listingdata[$i]['vImage'])) {
                  $listingdata[$i]['image_data'][] = $this->config->config['upload_url'].$listingdata[$i]['vImage'];
              }
              if(file_exists($this->config->config['upload_path'].$listingdata[$i]['vCompanyLogo'])) {
                  $listingdata[$i]['vCompanyLogo'] = $this->config->config['upload_url'].$listingdata[$i]['vCompanyLogo'];
              }              
                            
              for($j=0;$j<count($image_group_arr);$j++) {
              
                  
                  if(file_exists($this->config->config['upload_path'].$image_group_arr[$j]) && $image_group_arr[$j]!="") {
                      $listingdata[$i]['image_data'][] = $this->config->config['upload_url'].$image_group_arr[$j];
                  }
              }
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
                <div id="listing_card_large_logo" ><a href="profile_pro.html">
                    <img src="<?php echo $listingdata[$i]['vCompanyLogo']?>" />
                </a></div>
                <div class="clearfloat"></div>
                <div id="card_large_img"><a href="profile_pro.html">
                  <div id="slider-<?echo $i?>" class="glidecontentwrapper module" >
                        <?php
                        $image_slide = $listingdata[$i]['image_data']; 
                        for($j=0;$j<count($image_slide);$j++) {
                        ?>
                          <div class="glidecontent glidecontent<?echo $i?>">
                            <img  src="https://encrypted-tbn0.google.com/images?q=tbn:ANd9GcQeGQYrG8U5NwsoOOr_ztCcAqTy37AJyi4BMf_dJp9_su4xsUIg"/>
                          </div>
                          <div class="glidecontent glidecontent<?echo $i?>">
                            <img src="<?php echo $image_slide[$j]?>" data-thumb="<?php echo $image_slide[$j]?>"/>
                          </div>
                          <div class="glidecontent glidecontent<?echo $i?>">
                            <img src="<?php echo $image_slide[$j]?>" data-thumb="<?php echo $image_slide[$j]?>"/>
                          </div>                                                    
                          <div class="glidecontent glidecontent<?echo $i?>">
                            <img src="<?php echo $image_slide[$j]?>" data-thumb="<?php echo $image_slide[$j]?>"/>
                          </div>
                          <div class="glidecontent glidecontent<?echo $i?>">
                            <img src="<?php echo $image_slide[$j]?>" data-thumb="<?php echo $image_slide[$j]?>"/>
                          </div>
                          <div class="glidecontent glidecontent<?echo $i?>">
                            <img src="<?php echo $image_slide[$j]?>" data-thumb="<?php echo $image_slide[$j]?>"/>
                          </div>
                          <div class="glidecontent glidecontent<?echo $i?>">
                            <img  src="<?php echo $image_slide[$j]?>" data-thumb="<?php echo $image_slide[$j]?>"/>
                          </div>                                                                                                        
                          
                        <?php } ?>
                  </div>                
                </a></div>
                <div id="card_large_dots_container<?echo $i?>" class="card_large_dots_container">
                    <div id="arrow_l" class="prev"></div>
                    <div id="arrow_r" class="next"></div>                
                    <div class="card_large_dots toc" id="card_large_dots_active"></div>
                    <div class="card_large_dots toc"></div>
                    <div class="card_large_dots toc"></div>
                    <div class="card_large_dots toc"></div>
                    <div class="card_large_dots toc"></div>
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
            <script>
            $(document).ready(function() {
                
                featuredcontentglider.init({
                	gliderid: "slider-<?echo $i?>", //ID of main glider container
                	contentclass: "glidecontent<?echo $i?>", //Shared CSS class name of each glider content
                	togglerid: "card_large_dots_container<?echo $i?>", //ID of toggler container
                	remotecontent: "", //Get gliding contents from external file on server? "filename" or "" to disable
                	selected: 0, //Default selected content index (0=1st)
                	persiststate: false, //Remember last content shown within browser session (true/false)?
                	speed: 500, //Glide animation duration (in milliseconds)
                	direction: "rightleft", //set direction of glide: "updown", "downup", "leftright", or "rightleft"
                	autorotate: true, //Auto rotate contents (true/false)?
                	autorotateconfig: [4000, 10] //if auto rotate enabled, set [milliseconds_btw_rotations, cycles_before_stopping]
                });                  
            });
            </script>
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
