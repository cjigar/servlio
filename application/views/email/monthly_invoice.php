
<html>

<body>

<table width="100%" bgcolor="#ffffff" cellpadding="2" cellspacing="0">
		<tr>
        		<td>
                	
                   		<table  width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0">
                        		<tr>
                                		<td width="40">
                                        <img src="http://area20.com/servlio/images/logo.png"  />
                                        </td>
                                        
                                </tr>
                        		
                        </table> 
                        <table  width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0">  
                                <tr>
                                		<td width="40" style="padding-top:4px;">
                                     
                                        </td>
                                </tr>
                        </table>
                        <table  width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0">    
                                <tr>
                                		
                                        <td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; vertical-align:top;padding-top:20px; line-height:22px;">
                                      Hi <?php echo $data['vCompanyName']?>, <br><br>
                                      Thanks for being a customer! Your card has been charged.<br><br>
                                      
                                      </td>
                                      </tr>
                                      <tr>
                                      <td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; vertical-align:top;padding-bottom:10px; line-height:22px;">
                                      
                                      Billing date: <?php echo $data['billingdate']?><br>
                                      Invoice #: 4328213

                                      
                                      </td>
                                 </tr>
                               </table>
                               <table  width="600px" bgcolor="#ffffff" cellpadding="0" cellspacing="0">    
                                 <tr>
                                 
                                      <td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; width:300px; vertical-align:top; padding-bottom:10px; padding-top:10px; line-height:22px; border-bottom:1px #cccccc solid;  border-top:1px #cccccc solid;">
                                      <?php echo $data['vCompanyName']?><br>
                                      <?php echo $data['vCity']?><br>
                                      <?php echo $data['vState']?>,<?php echo $data['vCountry']?><br>
                                      
                                      </td>
                                      <td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; vertical-align:top;padding-top:10px; line-height:22px; border-bottom:1px #cccccc solid;  border-top:1px #cccccc solid;"> <strong>Bill to:</strong><br>
                                      <?php echo $data['vCompanyName']?><br><br>
                                     
                                      </td>
                                      <td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; vertical-align:top;padding-top:20px; line-height:22px; border-bottom:1px #cccccc solid;  border-top:1px #cccccc solid;">
                                     
                                      </td>
                                
</tr>
<tr>
                                      <td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; width:300px; vertical-align:top;padding-top:10px; line-height:22px;">
                                      <strong>Duration:</strong><br>
                                       <?php echo $data['billingdate']?> &#8212; <?php echo $data['aftermonth']?><br><br>
                                       </td>
                                       <td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; vertical-align:top;padding-top:10px; line-height:22px;">
                                       <strong>Description:</strong><br>
                                       Servlio Pro account<br>
                                       <a href="http://area20.com/servlio/login.html" style="color: #4795DF; text-decoration:none;">servlio.com/323232</a><br><br>
                                       </td>
                                       <td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; vertical-align:top;padding-top:10px; line-height:22px;">
                                       <strong>Price:</strong><br>
                                       $79<br><br>
                                      
                                      </td>
                                     <tr>
                                      <td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; width:300px; vertical-align:top; padding-top:0px; line-height:22px;">
                                     
                                       </td>
                                       <td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; vertical-align:top;padding-top:0px; line-height:22px;">
                                       <strong>Amount Paid:</strong><br>
                                      
                                       </td>
                                       <td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; vertical-align:top;padding-top:0px; line-height:22px;">
                                       <strong>$79</strong>
                                      
                                      
                                      </td>
                                     </tr>
                                     </table>
                                     <table  width="700px" bgcolor="#ffffff" cellpadding="0" cellspacing="0"> 
                                     <tr>
                                      <td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; vertical-align:top;padding-top:20px; line-height:22px;">
                                      
                                      
                                     This charge will appear on your credit card statement as "AREA20.COM".
                                        </td>
                                </tr>
                                
                                <tr>
                                		
                                        <td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; vertical-align:top;padding-top:20px; line-height:22px;">
                                  <a href="http://area20.com/servlio/login.html" style="color: #4795DF; text-decoration:none;">Upgrade, downgrade, or cancel your account</a><br><br></td>
                                </tr>
                                
                        </table>
                        
                       
                
                </td>
        </tr>
</table>

</body>
</html>
