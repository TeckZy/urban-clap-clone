<?php
class emailtemplate {

	function sentQusEmail($siteinfo,$qus1="",$qus2="",$qus3="",$qus4="",$qus5="",$comp=array(),$username){
		$sitetitle = $siteinfo['sitetitle'];
		$siteurl = $siteinfo['siteurl'];
		$sitelogo = $siteurl."/admin/uploads/general_setting/".$siteinfo['sitelogo'];
		$siteemail = $siteinfo['siteemail'];
		$site_currency=  $siteinfo['site_currency'];
		$_fb = $siteinfo['fburl'];
		$_tw = $siteinfo['twurl'];
		$_gp = $siteinfo['gpurl'];
		$_ln = $siteinfo['lnurl'];	
		$bud_frm=$comp['bud_frm'];
		$bud_to=$comp['bud_to'];
		$comp_loc=$comp['comp_loc'];
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
								  <p style='font-weight:600;height:30px;font-family:Helvetica;font-size:16px;font-weight:normal;font-style:normal;font-stretch:normal;line-height:1.25;letter-spacing:normal;color:#666666'>".ucfirst($username)." is interested in hiring you.</p>
								  <p style='font-family:Helvetica;font-size:14px;font-weight:normal;font-style:normal;font-stretch:normal;line-height:1.25;letter-spacing:normal;color:#666666'>Read the details of the request and decide if you are qualified, interested, and available to meet ".ucfirst($username)." needs. If yes, '<strong>Respond</strong>' to ".ucfirst($username)." with a personalized message and custom quote.</p>
								  <hr style='width:100%;opacity:0.1;border:solid 1px #3878e9;margin-top:2%'>
									<table style='width:100%;margin-top:5%' border='0'>
									  <tbody><tr>
										<td style='width:100%;text-align:center;border:solid 1px #ebf1fc;background-color:#fff;height:50px;line-height:50px'>
										 
										  <p style='font-family:Helvetica;font-size:20px;font-weight:bold;font-style:normal;font-stretch:normal;line-height:normal;letter-spacing:normal;text-align:center;color:#444444;margin-bottom:0;margin-top:0px'>".ucfirst($username)."</p>
										</td>
									  </tr>  ";                                 
									  if(!empty($qus1)){ 
										$msg.="<tr>
										<td style='width:100%;padding-left:5%;height:40px;border:solid 1px #ebf1fc;background-color:#fff;padding-top:10px;padding-bottom:20px'>
										  <p style='font-family:Helvetica;font-size:12px;font-weight:normal;font-style:normal;font-stretch:normal;line-height:1;letter-spacing:normal;color:#888888;margin-bottom:0'>$qus1</p>
										</td>
									  </tr> ";
									   } 
									if(!empty($qus2)){
									  $msg.="<tr>
										<td style='width:100%;padding-left:5%;height:40px;border:solid 1px #ebf1fc;background-color:#fff;padding-top:10px;padding-bottom:20px'>
										</td>
									  </tr> ";
									}
									if(!empty($qus3)){
									  $msg.="<tr>
										<td style='width:100%;padding-left:5%;height:40px;border:solid 1px #ebf1fc;background-color:#fff;padding-top:10px;padding-bottom:20px'>
										  <p style='font-family:Helvetica;font-size:12px;font-weight:normal;font-style:normal;font-stretch:normal;line-height:1;letter-spacing:normal;color:#888888;margin-bottom:0'>$qus3</p>
										</td>
									  </tr> ";
									}
									if(!empty($qus4)){
									  $msg.="<tr>
										<td style='width:100%;padding-left:5%;height:40px;border:solid 1px #ebf1fc;background-color:#fff;padding-top:10px;padding-bottom:20px'>
										  <p style='font-family:Helvetica;font-size:12px;font-weight:normal;font-style:normal;font-stretch:normal;line-height:1;letter-spacing:normal;color:#888888;margin-bottom:0'>$qus4</p>
										</td>
									  </tr> ";
									}
									if(!empty($qus5)){
									  $msg.="<tr>
										<td style='width:100%;padding-left:5%;height:40px;border:solid 1px #ebf1fc;background-color:#fff;padding-top:10px;padding-bottom:20px'>
										  <p style='font-family:Helvetica;font-size:12px;font-weight:normal;font-style:normal;font-stretch:normal;line-height:1;letter-spacing:normal;color:#888888;margin-bottom:0'>$qus5</p>
										</td>
									  </tr> ";
									}
									if(!empty($bud_frm) || !empty($bud_to) || !empty($comp_loc)){
									  $msg.="<tr>
										<td style='width:100%;padding-left:5%;height:40px;border:solid 1px #ebf1fc;background-color:#fff;padding-top:10px;padding-bottom:20px'>
										  <p style='font-family:Helvetica;font-size:18px;font-weight:normal;font-style:normal;font-stretch:normal;line-height:normal;letter-spacing:normal;color:#444444;margin-top:5px'>Budget From: $bud_frm 
 $site_currency</p>
										  <p style='font-family:Helvetica;font-size:18px;font-weight:normal;font-style:normal;font-stretch:normal;line-height:normal;letter-spacing:normal;color:#444444;margin-top:5px'>Budget To: $bud_to 
 $site_currency</p>
										  <p style='font-family:Helvetica;font-size:18px;font-weight:normal;font-style:normal;font-stretch:normal;line-height:normal;letter-spacing:normal;color:#444444;margin-top:5px'>Location: $comp_loc</p>
										</td>
									  </tr> ";
									}
									$msg.="</tbody></table>
									<table style='width:300px;border-radius:2px;background-color:transparent;margin-top:5%' align='center'>
									  <tbody><tr>
										<td style='width:300px;border-radius:5px;color: #FFF;text-transform: uppercase;font-weight: 600;letter-spacing: 0.7px;background-image: -webkit-linear-gradient(0deg,#ff934b 0%,#ff5e62 100%);background-image: -ms-linear-gradient(0deg,#ff934b 0%,#ff5e62 100%);padding:10px;text-align:center;'>
										  <a href='$siteurl/prof-order' style='text-decoration:none!important;font-size:20px;color:white' target='_blank' data-saferedirecturl='$siteurl/prof-order'>Respond</a>
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
	
	function active_mail($url,$text,$siteinfo,$username){
		$sitetitle = $siteinfo['sitetitle'];
		$siteurl = $siteinfo['siteurl'];
		$sitelogo = $siteurl."/admin/uploads/general_setting/".$siteinfo['sitelogo'];
		$siteemail = $siteinfo['siteemail'];
		$_fb = $siteinfo['fburl'];
		$_tw = $siteinfo['twurl'];
		$_gp = $siteinfo['gpurl'];
		$_ln = $siteinfo['lnurl'];
        global $fname;		
		
	$msg=	"<div style='background-color:#f2f2f4;margin:0;padding:0'>
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
                                          <img  src='".$sitelogo."' style='display:block;width:100%;height:auto;padding-top:8%'>
                                          </a>
                                       </div>
                                    </td>
                                    <!--<td style='text-align:right!important' width='25%'>
                                       <div style='text-align:right!important;display:inline-block!important;vertical-align:bottom!important;padding-top:20%!important'>
                                          <a href='#' style='color:#666666;    font-family: sans-serif;font-size:12px!important;text-decoration:none' target='_blank' data-saferedirecturl='#'>Ask for Help</a>
                                       </div>
                                    </td>-->
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <tr style='margin:0px;margin-top:3%;padding:0px;background-color:white;width:100%'>
                        <td style='padding-left:5%;padding-right:5%;vertical-align:top;margin-bottom:0px;padding-bottom:0px'>
                           <center>
                              <table style='border-radius:3px;background-color:black;border:1px solid white;margin-top:0px;margin-bottom:5%;width:60%' cellspacing='0' cellpadding='0' border='0'>
                              </table>
                           </center>
                           <div style='text-align:left'>
                              <b style='font-size:20px;color:#444444'>Welcome to ".$sitetitle.",</b><br>
                           </div><br>
                           <p style='font-family:sans-serif;font-weight:500;color:#666666;font-size:14px;text-align:left;line-height:1.5em'>
                             ".$text."
                           </p>
                           <div style='border-bottom:solid 1px #3878e9;opacity:0.1'></div>
                           <p style='font-family:sans-serif;font-weight:500;color:#666666;font-size:14px;text-align:left;line-height:1.5em'>
                           </p><br>
                           <p style='font-family:sans-serif;font-weight:500;color:#666666;font-size:14px;text-align:left;line-height:1.5'>Hi ".ucfirst($username).",</p><br>
                            <b>Thank you for registering with us,Kindly activate your account to login to the site.</b>
                          
                           <center>
                              <p style='font-family:sans-serif;font-weight:500;color:#000;font-size:20px;text-align:center;line-height:1.5'><b></b></p>
                              <p style='font-family:sans-serif;font-weight:500;color:#777;font-size:14px;text-align:center;line-height:1.5em'>
                              </p>
                           </center>
                           <center>
                              <table style='border-radius:3px;    background-image: -webkit-linear-gradient(0deg,#ff934b 0%,#ff5e62 100%);
    background-image: -ms-linear-gradient(0deg,#ff934b 0%,#ff5e62 100%);border:1px solid white;margin-top:0px;margin-top:5%;margin-bottom:5%;width:50%' cellspacing='0' cellpadding='0' border='0'>
                                 <tbody>
								 <tr >
								   <p style='font-family:Helvetica;font-weight:500;color:#444444;font-size:20px;text-align:center;line-height:1.25em;display:inline-block;margin:0px!important'></p>
								 </tr>
                                    <tr>
                                       <td style='padding-top:16px;padding-right:15px;padding-bottom:16px;padding-left:15px' valign='middle' align='center'>
                                          <a href='$url' style='color:#ffffff;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:500;text-decoration:none' target='_blank' data-saferedirecturl='#'>Activate Email
                                          </a>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </center>
                           <div style='border-bottom:solid 1px #3878e9;opacity:0.1'></div>
                           
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <p style='margin-top:20px;margin-bottom:20px;font-family:sans-serif;font-weight:500;color:#777;font-size:14px;line-height:1.5;color:#777;text-align:center'>In case of any queries, please get in touch at<a style='color:#1fbad6'> ".$siteemail."</a> </p>
                        </td>
                     </tr>
                     <tr style='text-align:center'>
                        <td style='padding-bottom:3%;text-align:center'>
                           <center style='text-align:center'>
                              <a href='".$_fb."' style='text-decoration:none' target='_blank' data-saferedirecturl='#'>
                              <img src='".$siteurl."/img/fb.png' style='margin-left:3%' width='4%;'>
                              </a>
                              <a href='".$_tw."' style='text-decoration:none' target='_blank' data-saferedirecturl='#'>
                              <img src='".$siteurl."/img/twitter.png' style='margin-left:3%' width='4%;'>
                              </a>
                              <a href='".$_gp."' style='text-decoration:none' target='_blank' data-saferedirecturl='#'>
                              <img src='".$siteurl."/img/gp.png' style='margin-left:3%' width='4%;'>
                              </a>
                              <a href='".$_ln."' style='text-decoration:none' target='_blank' data-saferedirecturl='#'>
                              <img src='".$siteurl."/img/lin.png' style='margin-left:3%' width='4%;'>
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
	
function response_mail($url,$text,$info,$siteinfo,$username){
		$sitetitle = $siteinfo['sitetitle'];
		$siteurl = $siteinfo['siteurl'];
		$sitelogo = $siteurl."/admin/uploads/general_setting/".$siteinfo['sitelogo'];
		$siteemail = $siteinfo['siteemail'];
		$_fb = $siteinfo['fburl'];
		$_tw = $siteinfo['twurl'];
		$_gp = $siteinfo['gpurl'];
		$_ln = $siteinfo['lnurl'];
       
	$msg=	"<div style='background-color:#f2f2f4;margin:0;padding:0'>
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
                                          <img  src='".$sitelogo."' style='display:block;width:100%;height:auto;padding-top:8%'>
                                          </a>
                                       </div>
                                    </td>
                                    <!--<td style='text-align:right!important' width='25%'>
                                       <div style='text-align:right!important;display:inline-block!important;vertical-align:bottom!important;padding-top:20%!important'>
                                          <a href='#' style='color:#666666;    font-family: sans-serif;font-size:12px!important;text-decoration:none' target='_blank' data-saferedirecturl='#'>Ask for Help</a>
                                       </div>
                                    </td>-->
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <tr style='margin:0px;margin-top:3%;padding:0px;background-color:white;width:100%'>
                        <td style='padding-left:5%;padding-right:5%;vertical-align:top;margin-bottom:0px;padding-bottom:0px'>
                           <center>
                              <table style='border-radius:3px;background-color:black;border:1px solid white;margin-top:0px;margin-bottom:5%;width:60%' cellspacing='0' cellpadding='0' border='0'>
                              </table>
                           </center>
                           <div style='text-align:left'>
                              <b style='font-size:20px;color:#444444'>Hi ".ucfirst($username).",</b><br>
                           </div><br>
                           <p style='font-family:sans-serif;font-weight:500;color:#666666;font-size:14px;text-align:left;line-height:1.5em'>
                             ".$text."
                           </p>
                           <div style='border-bottom:solid 1px #3878e9;opacity:0.1'></div>
                           <p style='font-family:sans-serif;font-weight:500;color:#666666;font-size:14px;text-align:left;line-height:1.5em'>
                           </p><br>
                           <p style='font-family:sans-serif;font-weight:500;color:#666666;font-size:14px;text-align:left;line-height:1.5'><center> <b style='font-size:20px;color:#444444'>".ucfirst($username)."</b><br></center></p>
                          
                           <center>
                              <p style='font-family:sans-serif;font-weight:500;color:#000;font-size:20px;text-align:center;line-height:1.5'><b></b></p>
                              <p style='font-family:sans-serif;font-weight:500;color:#777;font-size:14px;text-align:center;line-height:1.5em'>
                              </p>
                           </center>
                           <center>
                              <table style='border-radius:3px;    
    background-image: -ms-linear-gradient(0deg,#ff934b 0%,#ff5e62 100%);border:1px solid white;margin-top:0px;margin-top:5%;margin-bottom:5%;width:50%' cellspacing='0' cellpadding='0' border='0'>
                                 <tbody>
								 <tr >
								  <p style='font-family:sans-serif;font-weight:500;color:#666666;font-size:14px;text-align:left;line-height:1.5em'><b>
								".$info."</b></p>
								 </tr>
                                    <tr>
                                       <td  style='padding-top:16px;padding-right:15px;padding-bottom:16px;padding-left:15px;background-image: -webkit-linear-gradient(0deg,#ff934b 0%,#ff5e62 100%);' valign='middle' align='center'>
                                          <a href='$url'   style='color:#ffffff;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:500;text-decoration:none' target='_blank' data-saferedirecturl='#'>View Response
                                          </a>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </center>
                           <div style='border-bottom:solid 1px #3878e9;opacity:0.1'></div>
                           
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <p style='margin-top:20px;margin-bottom:20px;font-family:sans-serif;font-weight:500;color:#777;font-size:14px;line-height:1.5;color:#777;text-align:center'>In case of any queries, please get in touch at<a style='color:#1fbad6'> ".$siteemail."</a> </p>
                        </td>
                     </tr>
                     <tr style='text-align:center'>
                        <td style='padding-bottom:3%;text-align:center'>
                           <center style='text-align:center'>
                              <a href='".$_fb."' style='text-decoration:none' target='_blank' data-saferedirecturl='#'>
                              <img src='".$siteurl."/img/fb.png' style='margin-left:3%' width='4%;'>
                              </a>
                              <a href='".$_tw."' style='text-decoration:none' target='_blank' data-saferedirecturl='#'>
                              <img src='".$siteurl."/img/twitter.png' style='margin-left:3%' width='4%;'>
                              </a>
                              <a href='".$_gp."' style='text-decoration:none' target='_blank' data-saferedirecturl='#'>
                              <img src='".$siteurl."/img/gp.png' style='margin-left:3%' width='4%;'>
                              </a>
                              <a href='".$_ln."' style='text-decoration:none' target='_blank' data-saferedirecturl='#'>
                              <img src='".$siteurl."/img/lin.png' style='margin-left:3%' width='4%;'>
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

function notice_mail($siteinfo,$username,$title,$text,$contact_num){		
		$sitetitle = $siteinfo['website_title'];
		$siteurl = $siteinfo['website_url'];
		$sitelogo = $siteurl."/admin/uploads/general_setting/".$siteinfo['img'];
		$siteemail = $siteinfo['admin_email'];
		$_fb = $siteinfo['fburl'];
		$_tw = $siteinfo['twurl'];
		$_gp = $siteinfo['gplusurl'];
		$_ln = $siteinfo['linkedinurl'];		
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
							  <img src='$sitelogo' style='max-width:250px;'>
                           </div>
						   <div style='font:bold 14px arial;padding:5px;color:#333; '>
                             Hi $username,
                           </div>
                        </td>
                     </tr>
                     <tr style=''>
                        <td align='center' >
                           <div style='font:normal 22px arial;padding:10px 5px 15px;color:#1420AF; '> 
							$title
                           </div>
                        </td>
                     </tr>          
                  
					<tr style=''>
                        <td style='padding:10px;'>
							<p style='color: #333;font:normal 14px arial; text-align:center;'>$text</p>
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
                                    <td valign='top' style='padding-left:15px'>
                                       <table cellspacing='0' cellpadding='0' border='0' height='75'>
                                          <tbody>
                                             <tr>
                                                <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px;text-align: center;'> Website <br> <span style='color:#006fb4;text-decoration:none;font:normal 12px arial'> <a href='#' style='color:#00bff5;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'> $siteurl </a> </span> </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
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
	
	function social_login($url,$text,$siteinfo,$username){
		$sitetitle = $siteinfo['sitetitle'];
		$siteurl = $siteinfo['siteurl'];
		$sitelogo = $siteurl."/admin/uploads/general_setting/".$siteinfo['sitelogo'];
		$siteemail = $siteinfo['siteemail'];
		$_fb = $siteinfo['fburl'];
		$_tw = $siteinfo['twurl'];
		$_gp = $siteinfo['gpurl'];
		$_ln = $siteinfo['lnurl'];
        global $fname;		
		
	$msg=	"<div style='background-color:#f2f2f4;margin:0;padding:0'>
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
                                          <img  src='".$sitelogo."' style='display:block;width:100%;height:auto;padding-top:8%'>
                                          </a>
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <tr style='margin:0px;margin-top:3%;padding:0px;background-color:white;width:100%'>
                        <td style='padding-left:5%;padding-right:5%;vertical-align:top;margin-bottom:0px;padding-bottom:0px'>
                           <center>
                              <table style='border-radius:3px;background-color:black;border:1px solid white;margin-top:0px;margin-bottom:5%;width:60%' cellspacing='0' cellpadding='0' border='0'>
                              </table>
                           </center>
                           <div style='text-align:left'>
                              <b style='font-size:20px;color:#444444'>Welcome to ".$sitetitle.",</b><br>
                           </div><br>

                           <p style='font-family:sans-serif;font-weight:500;color:#666666;font-size:14px;text-align:left;line-height:1.5em'>
                           </p><br>
                           <p style='font-family:sans-serif;font-weight:500;color:#666666;font-size:14px;text-align:left;line-height:1.5'>Hi ".ucfirst($username).",</p>
                           <b>$text</b>
                           <center>
                              <p style='font-family:sans-serif;font-weight:500;color:#000;font-size:20px;text-align:center;line-height:1.5'><b></b></p>
                              <p style='font-family:sans-serif;font-weight:500;color:#777;font-size:14px;text-align:center;line-height:1.5em'>
                              </p>
                           </center>
                           <center>
                              <table style='border-radius:3px;    background-image: -webkit-linear-gradient(0deg,#ff934b 0%,#ff5e62 100%);
    background-image: -ms-linear-gradient(0deg,#ff934b 0%,#ff5e62 100%);border:1px solid white;margin-top:0px;margin-top:5%;margin-bottom:5%;width:50%' cellspacing='0' cellpadding='0' border='0'>
                                 <tbody>
								 <tr >
								  <p style='font-family:Helvetica;font-weight:500;color:#444444;font-size:20px;text-align:center;line-height:1.25em;display:inline-block;margin:0px!important'></p>
								 </tr>
                                    <tr>
                                       <td style='padding-top:16px;padding-right:15px;padding-bottom:16px;padding-left:15px' valign='middle' align='center'>
                                          <a href='$url' style='color:#ffffff;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:500;text-decoration:none' target='_blank' data-saferedirecturl='#'>Login Here
                                          </a>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </center>
                           <div style='border-bottom:solid 1px #3878e9;opacity:0.1'></div>
                           
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <p style='margin-top:20px;margin-bottom:20px;font-family:sans-serif;font-weight:500;color:#777;font-size:14px;line-height:1.5;color:#777;text-align:center'>In case of any queries, please get in touch at<a style='color:#1fbad6'> ".$siteemail."</a> </p>
                        </td>
                     </tr>
                     <tr style='text-align:center'>
                        <td style='padding-bottom:3%;text-align:center'>
                           <center style='text-align:center'>
                              <a href='".$_fb."' style='text-decoration:none' target='_blank' data-saferedirecturl='#'>
                              <img src='".$siteurl."/img/fb.png' style='margin-left:3%' width='4%;'>
                              </a>
                              <a href='".$_tw."' style='text-decoration:none' target='_blank' data-saferedirecturl='#'>
                              <img src='".$siteurl."/img/twitter.png' style='margin-left:3%' width='4%;'>
                              </a>
                              <a href='".$_gp."' style='text-decoration:none' target='_blank' data-saferedirecturl='#'>
                              <img src='".$siteurl."/img/gp.png' style='margin-left:3%' width='4%;'>
                              </a>
                              <a href='".$_ln."' style='text-decoration:none' target='_blank' data-saferedirecturl='#'>
                              <img src='".$siteurl."/img/lin.png' style='margin-left:3%' width='4%;'>
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
	
	
}
?>