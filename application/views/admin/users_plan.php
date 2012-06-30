<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
        <script type="text/javascript">
            $(document).ready(function(){
                $('#page_effect').fadeIn(400);
            });
        </script>
    </head>
    <body>
    <div id="top_banner">
        <div id="inner_container_cp">
            <div id="left_side">
                <div id="page_title">Servlio Control Panel</div>
                <div id="tab_container">
                    <div id="tab_selected" >
                        <li><a href="accounts.html">Accounts</a></li>
                    </div>
                    <div class="clearfloat"></div>
                </div>
            </div>
            <div id="right_side">
                <div id="user_image_border"><a href="user.html"><img src="images/chuka.jpg"/></a></div>
                <div id="user_details_container">
                    <div id="user_name"><a href="#"><?php echo $this->session->userdata('vFirstName');?></a></div>
                    <div id="logout"><a href="admin/logout">Sign out</a></div>
                    <div class="clearfloat"></div>
                </div>
                <div class="clearfloat"></div>
            </div>
            <div class="clearfloat"></div>
        </div>
    </div>
    <div id="page_effect" style="display:none;">
        <div id="inner_container3">
             <table border="1" width="100%">
                <tbody>
                    <tr>
                        <td id="structure_left">
	                       <div id="left_side2">
                                <div id="structure_left_container">
                                    <div id="main_header" style="margin-bottom:20px;">
                        		      <div id="main_header_text">ACCOUNTS</div>
                                        <div class="clearfloat"></div>
                                    </div>
                                    <div class="clearfloat"></div>
                                    <table border="1" width="100%">
                                        <tbody>
                                            <tr>
                                                <th class="account_header">ID</th>
                                                <th class="account_header">Company</th>
                                                <th class="account_header">Country</th>
                                                <th class="account_header" id="delete">Plan</th>
                                                <th class="account_header">Joined</th>
                                                <th class="account_header2" id="delete">Status</th>
                                            </tr>
                                            <?php for($i=0;$i<count($results);$i++){?>
                                            <tr class="account_cell_tr">
                                                <td class="account_cell">
                                                    <div class="account_text"><a href="account_details.html"><?php echo $results[$i]['iUserId']?></a></div>
                                                </td>
                                                <td class="account_cell">
	                                               <div class="account_text"><?php echo $results[$i]['vCompanyName']?></div>
                                                </td>
                                                <td class="account_cell" >
                                                    <div class="account_text"><?php echo $results[$i]['country']?></div>       
                                                </td>
                                                <td class="account_cell">
                                                    <div class="account_text"><?php echo $results[$i]['eType']?></div>
                                                </td>
                                                <td class="account_cell">
                                                    <div class="account_text"><?php echo date('M j, Y',strtotime($results[$i]['dtAddedDate']));?></div>
                                                </td>
                                                <td class="account_cell">
                                                    <div class="account_text2"><?php if($results[$i]['eStatus'] == '1'){echo "Active"; }else{echo "Inactive";}?></div>
                                                </td>
                                            </tr>
                                            <?}?>
                                            <tr>
                                                <td align="right" colspan="6">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="right" colspan="6" style="text-decoration:none;"><?php echo $links;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </td>
                        <td id="structure_right">
                            <form name="frmsearch" id="frmsearch" method="post" action="admin/search_a" >
                                <input value="<?php echo $searchkeyword;?>" type="text" name="search" id="search" class="searchfield" style="width:86%;" placeholder="Search"/>
                            </form>
                            <div class="clearfloat"></div> 
                            <div id="payments_header4" style="margin-top:10px;">Sort</div>
                            <div class="clearfloat"></div>  
                            <a style="text-decoration:none;" href="<?php echo base_url().'admin/users_plan/mr';?>"><div id="filter_text">Most recent</div></a>  
                            <a style="text-decoration:none;" href="<?php echo base_url().'admin/users_plan/mu';?>"><div id="filter_text_ns">Most users</div></a>  
                            <a style="text-decoration:none;" href="<?php echo base_url().'admin/users_plan/ms';?>"><div id="filter_text_ns">Most services</div></a>  
                            <a style="text-decoration:none;" href="<?php echo base_url().'admin/users_plan/mb';?>"><div id="filter_text_ns">Most bookings</div></a>  
                            <a style="text-decoration:none;" href="<?php echo base_url().'admin/users_plan/mp';?>"><div id="filter_text_ns">Most prices</div></a>  
                            <a style="text-decoration:none;" href="<?php echo base_url().'admin/users_plan/mst';?>"><div id="filter_text_ns">Status</div></a>  
                        </td>
                    </tr>
                </tbody>
            </table>
        </div><!--inner_container3-->
        </div>
</body>
</html>

