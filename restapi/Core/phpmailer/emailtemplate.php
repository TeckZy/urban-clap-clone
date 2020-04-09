<?php
class emailtemplate {

	function style_blue($siteinfo,$text){
		$sitetitle = $siteinfo['sitetitle'];
		$siteurl = $siteinfo['siteurl'];
		$sitelogo = $siteinfo['sitelogo'];
		$sitelogo = $siteurl."/admin/assets/generalsetting/".$sitelogo;
		$siteemail = $siteinfo['siteemail'];
		$contact_num=$siteinfo['adminno'];
		$_fb = $siteinfo['fburl'];
		$_tw = $siteinfo['twurl'];
		$year = date("Y");
		$username = ucwords($username);
		
		$msg = "<div style='background:#f5f5f5;margin:0 auto'>
   <table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto; 100%'>
      <tbody>
         <tr>
            <td valign='top' style='padding-left:0px'></td>
         </tr>
         <tr>
            <td>
               <table width='600' style='background:rgba(200, 223, 243, 0.78);border:1px solid #42bfe8;border-radius: 6px;'>
                  <tbody>
                     <tr>
                        <td>
                           <table style='width:100%'>
                              <tbody>
                                 <tr style='border-bottom:1px solid #a2a2a2;'>
                                    <td valign='top' style='padding:2px 6px;border:0px'>
                                       <table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='100%'>
                                          <tbody>
                                             <tr>
                                                <!--<td valign='top' style='padding:0px'> <a href='#' target='_blank' data-saferedirecturl='#'> <img border='0' src='img/logo.png' alt='' style='display:block' > </a> </td>-->
                                                
												<td align='left' valign='top' style='padding:0px;padding:12px 10px 5px 5px'>
                                                   <table cellspacing='0' cellpadding='0' border='0'>
                                                      <tbody>
                                                         <tr>
                                                            <td align='left' valign='middle' style='width:50%;vertical-align:middle;padding-left:0px;font:bold 11px arial; color:##1420AF;'> Email: <span align='left' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#a2a2a2;line-height:20px'>$siteemail</span></td>
                                                            
                                                         </tr>
														 
                                                      </tbody>
                                                   </table>
                                                </td>
												
												<td align='right' valign='top' style='padding:0px;padding:12px 10px 5px 5px'>
                                                   <table cellspacing='0' cellpadding='0' border='0'>
                                                      <tbody>
                                                         <tr>
                                                            <td align='right' valign='middle' style='width:50%;vertical-align:middle;padding-left:0px;font:bold 11px arial; color:##1420AF;'> Call Us: <span align='right' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:##1420AF;line-height:20px'>$contact_num</span></td>
                                                            
                                                         </tr>
														 
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td valign='top' style='padding:0px;border:0px'>
                                       <table cellspacing='0' cellpadding='0' border='0' bgcolor='#a2a2a2' width='100%' height='1'>
                                          <tbody>
                                             <tr></tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <tr> </tr>
                     <tr style=''>
                       <td align='' >                          
						   <div style='font:bold 30px arial;padding:10px 5px 15px;color:#00bff5;text-align:center; '>
                              <!--Logo Here
							  <br>-->
							  <img src='$sitelogo' style='max-width:100px;'>
                           </div>
						   <div style='font:bold 14px arial;padding:5px;color:#333; '>
                             Hello $username,
                           </div>
                        </td>
                     </tr>
                     <tr style=''>
                        <td align='center' >
                           <div style='font:normal 22px arial;padding:10px 5px 15px;color:##1420AF; '> 
							$title
                           </div>
                        </td>
                     </tr>          
                   <tr>
                       <!-- <td align='center'>
                           <table>
                              <tbody>
                                 <tr>
                                    <td align='center' bgcolor='#00bff5' style='background:#00bff5; padding:15px 18px;-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;'>
                                       <div >
                                           <div  align='center'> <a target='_blank' href='$url' style='color:#ffffff;font:bold 12px arial;text-decoration:none;'>Click Here</a> </div> 
                                       </div> 
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>-->
                        </tr>
                     
					 
					<tr style=''>
                        <td>
							<p style='color: #333;font:normal 14px arial; padding:30px;text-align:center;'>$text</p>
                        </td>
                     </tr>
					 
                     <tr style='border-bottom:1px solid #dadada;'>
                        <td valign='top' style='padding:15px 1px 15px 18px;font:normal 14px arial;color:#000;    border-bottom: 1px solid #dadada;'>Warm Regards,<br><br> <span style='color:#00bff5'><b>Team $sitetitle</b></span> </td>
                     </tr>
                     <tr>
                        <td valign='top' style='padding: 5px 1px 5px 18px;font:normal 14px arial;color:#000;'>
                           <table style='width: 100%;' cellspacing='0' cellpadding='0' border='0'>
                              <tbody>
                                 <tr>
                                    <td valign='top' style='padding-left:0px'>
                                       <table cellspacing='0' cellpadding='0' border='0' height='75'>
                                          <tbody>
                                             <tr>
                                                <td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000000;font:bold 16px arial;line-height:20px;text-align: center;'> CALL <br> <span style='font:bold 12px arial;color:#00bff5;line-height:20px'> $contact_num </span> <br> </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                    <td valign='middle' style='padding-left:20px'> <img border='0' width='1' height='60' alt='' style='display:block'> </td>
                                    <td valign='middle' style='vertical-align:middle;padding-left:0px'>
                                       <table cellspacing='0' cellpadding='0' border='0' height='75'>
                                          <tbody>
                                             <tr>
                                                <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px;text-align: center;'> EMAIL <br> <a href='mailto:info@smartb2b.com' style='color:#00bff5;font:bold 12px arial;text-decoration:none;' target='_blank'> $siteemail </a> </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                    <td valign='middle' style='vertical-align:middle;padding-left:15px'> <img border='0' width='1' height='60' alt='' style='display:block'> </td>
                                   <!-- <td valign='top' style='padding-left:15px'>
                                       <table cellspacing='0' cellpadding='0' border='0' height='75'>
                                          <tbody>
                                             <tr>
                                                <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px;text-align: center;'> Website <br> <span style='color:#006fb4;text-decoration:none;font:normal 12px arial'> <a href='$siteurl' style='color:#00bff5;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'> $siteurl </a> </span> </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>-->
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
         <!--<tr>
            <td>
               <table>
                  <tbody>
                     <tr>
                        <td>
                           <table width='600'>
                              <tbody>
                                 <tr>
                                    <td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'> Want to Unsubscribe? We are sorry to see you go, but happy to make it easy on you.<a href='#' target='_blank'>Unsubscribe</a> </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>-->
      </tbody>
   </table>

</div>";
return $msg;
	}
	
	
	function forgotpass($siteinfo,$pass){
		$sitetitle = $siteinfo['sitetitle'];
		$siteurl = $siteinfo['siteurl'];
		$sitelogo = $siteurl."/admin/uploads/general_setting/".$siteinfo['sitelogo'];
		$siteemail = $siteinfo['siteemail'];
		$_fb = $siteinfo['fburl'];
		$_tw = $siteinfo['twurl'];
		$_gp = $siteinfo['gpurl'];
		$_ln = $siteinfo['lnurl'];	
		
	$msg = "<div style='background-color:#f2f2f4;margin:0;padding:0'>
	   <table style='width:100%' cellspacing='0' cellpadding='0' border='0'>
		  <tbody>
			 <tr>
				<td style='padding:0;margin:0;background-color:#f2f2f4;padding-left:15px;padding-right:15px' align='center'>
				   <table style='max-width:700px' width='100%' cellspacing='0' cellpadding='0'>
					  <tbody>
						 <tr>
							<td>
							   <table style='padding-bottom:2%' width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor=''>
								  <tbody>
									 <tr>
										<td style='font-family:Arial;font-size:13px' width='75%'>
										   <div style='width:160px'>
											  <a href='#' target='_blank' data-saferedirecturl='#'>
											  <img  src='$sitelogo' style='display:block;width:100%;height:auto;padding-top:8%'>
											  </a>
										   </div>
										</td>
										<td style='text-align:right!important' width='25%'>
										   <div style='text-align:right!important;display:inline-block!important;vertical-align:bottom!important;padding-top:20%!important'>
											  <a href='#' style='color:#666666;    font-family: sans-serif;font-size:12px!important;text-decoration:none' target='_blank' data-saferedirecturl='#'>Ask for Help</a>
										   </div>
										</td>
									 </tr>
								  </tbody>
							   </table>
							</td>
						 </tr>
						 <tr style='margin:0px;margin-top:3%;padding:0px;background-color:white;width:100%'>
							<td style='font-family:Arial;font-size:13px;padding-left:25px;padding-top:4%;padding-right:25px;border-radius:4px'>
								  <p style='width:115px;height:30px;font-family:Helvetica;font-size:20px;font-weight:bold;font-style:normal;font-stretch:normal;line-height:1;letter-spacing:normal;color:#444444'>Hey,</p>
								 
								  <hr style='width:100%;opacity:0.1;border:solid 1px #3878e9;margin-top:2%'>
									<table style='width:100%;margin-top:5%' border='0'>
									  <tbody><tr>
										<td style='width:100%;text-align:center;border:solid 1px #ebf1fc;background-color:#fff;height:50px;line-height:50px'>
										 
										  <p style='font-family:Helvetica;font-size:20px;font-weight:bold;font-style:normal;font-stretch:normal;line-height:normal;letter-spacing:normal;text-align:center;color:#444444;margin-bottom:0;margin-top:0px'>Your Password is : $pass</p>
										</td>
									  </tr>  
									</tbody></table>
									<table style='width:300px;border-radius:2px;background-color:transparent;margin-top:5%' align='center'>
									  <tbody><tr>
										<td style='width:300px;border-radius:5px;color: #FFF;text-transform: uppercase;font-weight: 600;letter-spacing: 0.7px;background-image: -webkit-linear-gradient(0deg,#ff934b 0%,#ff5e62 100%);background-image: -ms-linear-gradient(0deg,#ff934b 0%,#ff5e62 100%);padding:10px;text-align:center;'>
										  <a href='$siteurl/login' style='text-decoration:none!important;font-size:20px;color:white' target='_blank' data-saferedirecturl='$siteurl/login.php'>Visit Site</a>
										</td>
									  </tr>
									</tbody></table>
									<hr style='width:100%;opacity:0.1;border:solid 1px #3878e9;margin-top:10%'>
									<p style='text-align:center;height:20px;font-family:Helvetica;font-size:12px;font-weight:400;font-style:normal;font-stretch:normal;line-height:1;letter-spacing:normal;color:#666666'>
									</p>
								  </td>
						 </tr>
						 <tr>
							<td>
							   <p style='margin-top:20px;margin-bottom:20px;font-family:sans-serif;font-weight:500;color:#777;font-size:14px;line-height:1.5;color:#777;text-align:center'>In case of any queries, please get in touch at<a style='color:#1fbad6'> <span>$siteemail</span></a> </p>
							</td>
						 </tr>
						 <tr style='text-align:center'>
							<td style='padding-bottom:3%;text-align:center'>
							   <center style='text-align:center'>
								  <a href='$_fb' style='text-decoration:none' target='_blank' data-saferedirecturl='#'>
								  <img src='$siteurl/img/social/fb.png' style='margin-left:3%' width='4%;'>
								  </a>
								  <a href='$_tw' style='text-decoration:none' target='_blank' data-saferedirecturl='#'>
								  <img src='$siteurl/img/social/twitter.png' style='margin-left:3%' width='4%;'>
								  </a>
								  <a href='$_gp' style='text-decoration:none' target='_blank' data-saferedirecturl='#'>
								  <img src='$siteurl/img/social/gp.png' style='margin-left:3%' width='4%;'>
								  </a>
								  <a href='$_ln' style='text-decoration:none' target='_blank' data-saferedirecturl='#'>
								  <img src='$siteurl/img/social/lin.png' style='margin-left:3%' width='4%;'>
								  </a>
							   </center>
							</td>
						 </tr>
					  </tbody>
				   </table>
				</td>
			 </tr>
		  </tbody>
	   </table>

	</div>";
	
		return $msg;
	}
	
	function email($from,$to,$subject,$msg){
		$from="no-reply@smsemailmarketing.in";
		$mail = new PHPMailer;	
		$mail->IsSMTP();                           
		$mail->SMTPDebug = false;
		$mail->SMTPAuth = true; 
		$mail->SMTPSecure = 'ssl';
		$mail->Host = 'trailblazer.websitewelcome.com';  
		$mail->Port = 465;  
		$mail->IsHTML(true);     
		$mail->Username = $from;         
		$mail->Password = 'dD}O-RnM#7]K';                         
		$mail->setFrom($from, 'Professional service');      
		$mail->Subject = $subject;
		$mail->Body    = $msg;
		$mail->addAddress($to, 'User');   
		
		if(!$mail->send()) {
			$ret = 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			$ret = "scs";
		}
		return $ret;
	}
	

}
?>