<?php include 'header.php';
include 'leftmenu.php'; $msg="";
$act = isSet($act) ? $act : '' ;
$sts = isSet($sts) ? $sts : '' ; 
if(isset($addsuc)){
	$msg = "<center><span style='color:green'>Profile successfully updated!</span></center>";
}

if(isset($filter))
{
$from2=date('Y-m-d',strtotime($from1));	
$to2=date('Y-m-d',strtotime($to1));	

if((isset($from1))&&(isset($to1)))
{
	$sql="SELECT * FROM appointment Where user_id= $id";
	$sql.= " and date between '".$from1."' and '".$to1."'"; 
	$getrecord=$db->get_all($sql);
}
	
}  

			$GetContact = $db->singlerec("select ctc_num from cms where id='1'");
			$contact_num = $GetContact['ctc_num'];
			$url = "$siteurl";

if($act == "acpt") {
    $db->insertrec("update appointment set approve_status='1' where id='$uid'");
	$get_info=$db->singlerec("select * from appointment where id='$uid'");
	$get_case=$db->singlerec("select * from category where id='$get_info[case_type]'");
	//$userid=base64_encode($uid);
			$to_email = $com_obj->get_mailid($get_info['user_id']);
			$fromemail = $com_obj->get_mailid($get_info['lawyer_id']);
			$subject  = "Appointment approved by ".$com_obj->get_name($get_info['lawyer_id']);
			$text ="Your Appointment has been approved by the $keyword,";
			$text .="<center><table><tr><td> $keyword Name : </td><td>".$com_obj->get_name($get_info['lawyer_id'])."</td></tr><tr><td> Category : </td><td>".ucfirst($get_case['category_name'])."</td></tr>
			<tr><td> Appointment Date : </td><td>".date("d-m-Y",strtotime($get_info['book_date'])) ."</td></tr>
			<tr><td> Appointment Time : </td><td>$get_info[time] </td></tr></table></center>";
            $text .= "<a href='$siteurl/login.php'><b>CLICK HERE</b></a> to Login for view details."; 			
			
			//$message = $email_temp->style_green($siteinfo,$text,$com_obj->get_name($get_info['user_id']));
			$message = $email_temp->style_blue($siteinfo,'','',$text,$contact_num,$url);
			$com_obj->email($fromemail,$to_email,$subject,$message);
    header("location:company-view.php?id=$id&sts=acpt");
    exit ;
    }
	if($act == "cncl") {
    $db->insertrec("update appointment set approve_status='2' where id='$uid'");
	$get_info=$db->singlerec("select * from appointment where id='$uid'");
	$get_case=$db->singlerec("select * from category where id='$get_info[case_type]'");
	//$userid=base64_encode($uid);
			$to_email = $com_obj->get_mailid($get_info['user_id']);
			$fromemail = $com_obj->get_mailid($get_info['lawyer_id']);
			$subject  = "Appointment Cancelled by ".$com_obj->get_name($get_info['lawyer_id']);
			$text ="Your Appointment has been Cancelled by the $keyword,";
			$text .="<center><table><tr><td> $keyword Name : </td><td>".$com_obj->get_name($get_info['lawyer_id'])."</td></tr><tr><td> Category : </td><td>".ucfirst($get_case['category_name'])."</td></tr>
			<tr><td> Appointment Date : </td><td>".date("d-m-Y",strtotime($get_info['book_date'])) ."</td></tr>
			<tr><td> Appointment Time : </td><td>$get_info[time] </td></tr></table></center>";
            $text .= "<a href='$siteurl/login.php'><b>CLICK HERE</b></a> to Login for view details."; 			
			$message = $email_temp->style_blue($siteinfo,'','',$text,$contact_num,$url);
			//echo $message; exit;
			$com_obj->email($fromemail,$to_email,$subject,$message);
    header("location:company-view.php?id=$id&sts=cncl");
    exit ;
    }
	if($sts == "acpt") {
		echo "<script>swal('Yes','Approved this appointment','success');</script>";	
	}
	if($sts == "cncl") {
		echo "<script>swal('','Cancelled this appointment','warning');</script>";
	}
if(isset($_action_submit)){
	$user_id = $db->escapstr($id);
	$action = $db->escapstr($action);
	$reason = $db->escapstr($reason);
	$action = (int)$action;
	$db->insertrec("update register set approve_status='$action', approve_reason='$reason' where id='$user_id'");
	$from = $siteemail; 
	$to = userInfo($id,'email');
	$subject = "Valobit approve status";
	$msg = $email_temp->standered($siteinfo,$reason);
	$com_obj->email($from,$to,$subject,$msg);
	echo "<script>swal('updated','Updated successfully!','success');</script>";
}
$id = isSet($id) ? $db->escapstr($id):'';
	
	$GetRecord=$db->get_all("select * from register where id='$id'");
                     
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";

    for($i = 0 ; $i < count($GetRecord) ; $i++) {
	$idvalue = $GetRecord[$i]['id'];
	$fname = $GetRecord[$i]['fname'];	
	$lname = $GetRecord[$i]['lname'];
	$email=$GetRecord[$i]['email'];
	$password=$GetRecord[$i]['password'];	
	$gender=$GetRecord[$i]['gender'];
	$contact_no1=$GetRecord[$i]['contact_no1'];	
	$contact_no2=$GetRecord[$i]['contact_no2'];
	$country=$GetRecord[$i]['country'];
	$state=$GetRecord[$i]['state'];
	$city=$GetRecord[$i]['city'];
	$building=$GetRecord[$i]['building'];
	$street=$GetRecord[$i]['street'];
	$landmark=$GetRecord[$i]['landmark'];
	$area=$GetRecord[$i]['area'];
	$building1=$GetRecord[$i]['building1'];
	$street1=$GetRecord[$i]['street1'];
	$landmark1=$GetRecord[$i]['landmark1'];
	$area1=$GetRecord[$i]['area1'];
	$zip_code=$GetRecord[$i]['zip_code'];
//	$website=$GetRecord[$i]['website'];
	$about_self=$GetRecord[$i]['about_self'];
	$img=$GetRecord[$i]['img'];
	$idproof=$GetRecord[$i]['doc_img1'];
	if(empty($img)){
		$img="noimage.jpg";
	}
	if(empty($idproof)){
		$idproof="noimage.jpg";
	}
	
	$user_adrs=$GetRecord[$i]['user_address'];
	
	if($state=='') {
		$state = "<span style='color:#70829A;'>Not Given</span>";
	} else {
		$state = getState($state);
	}
	if($city=='') {
		$city = "<span style='color:#70829A;'>Not Given</span>";
	} else {
		$city = getCity($city);
	}	
	
}

 
?>
<style>
.table th, .table td {
    padding: 10px;
}
</style>


   <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0"><?=$keyword;?> Management</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $msg;?></h4>
	                <h4 class="card-title"><?=$keyword;?> Details</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			<div class="heading-elements">
	                    <ul class="list-inline mb-0">
	                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
	                        <!--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>-->
	                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
	                        <!--<li><a data-action="close"><i class="ft-x"></i></a></li>-->
	                    </ul>
	                </div>
	            </div>
	            <div class="card-body collapse in">
				<div class="row">
						<div class="col-sm-6">
				           <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">User Name</label>
							<div class="col-xs-7 name">
							  <?php echo $fname.' '.$lname;?>
							</div>
						  </div>
						  
						  <!--<div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle"><?=$keyword;?> Title</label>
							<div class="col-xs-7 name">
							  <?php echo $title;?>
							</div>
						  </div>-->
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Email</label>
							<div class="col-xs-7">
							  <?php echo $email;?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Password</label>
							<div class="col-xs-7">
							  <?php echo $password;?>
							</div>
						  </div>
						
						   <!--<div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Membership Number </label>
							<div class="col-xs-7">
							  <?php echo $license_id;?>
							</div>
						  </div>
						  
						   <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Membership Issue Date </label>
							<div class="col-xs-7">
							  <?php echo $license_issue_date;?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Practicing Since</label>
							<div class="col-xs-7">
							  <?php echo $practice_yr_since;?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Practicing In</label>
							<div class="col-xs-7">
							  <?php echo Ucfirst($practice_court);?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Experience in</label>
							<div class="col-xs-7">
							  <?php echo $com_obj->getExpdiv($exp_division); ?>
							</div>
						  </div>
						  
						 
						 
						   <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Counselling fee</label>
							<div class="col-xs-7">
							  <?php echo $counselling_fee;?>
							</div>
							
						  </div>-->
						
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Country</label>
							<div class="col-xs-7">
							  <?php echo getCountry($country);?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">State</label>
							<div class="col-xs-7">
							  <?php echo $state;?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">City</label>
							<div class="col-xs-7">
							  <?php echo $city; ?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Contact Number 1</label>
							<div class="col-xs-7">
							  <?php echo $contact_no1;?>
							</div>
						  </div>
						  
						  <!--<div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle"> User Address </label>
							<div class="col-xs-7 name">
							  <?php echo $address; ?>
							</div>
						  </div>-->
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle"> <?=$keyword;?> Address</label>
							<div class="col-xs-7 name">
							  <?php echo $user_adrs; ?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle"> Zipcode</label>
							<div class="col-xs-7 name">
							  <?php echo $zip_code; ?>
							</div>
						  </div>
						  
						  <!--<div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle"> Website</label>
							<div class="col-xs-7">
							  <?php echo $website; ?>
							</div>
						  </div>
						</div>-->
					   <div class="col-md-6 col-sm-12">
					    <h4 style="padding:10px 0; font-weight:bold;">Profile Picture</h4>
						 <div class="form-group row">
							<div class="col-xs-7">	
							<?php if($img!=""){		?>					
							<img src='<?php echo $siteurl; ?>/<?php echo $img; ?>' width='250px' height='200px' />	<?php } ?>						
							</div>
						</div>
						<!--<?php if($lic_id_proof!="" && file_exists('../uploads/company-id-proof/'.$lic_id_proof)) { ?>
						<div class="form-group row">
							<div class="col-xs-7">						
								<img src='<?php echo $siteurl; ?>/uploads/profprofile/<?php echo $lic_id_proof; ?>' width='250px' height='200px' />							
							</div>
						</div>
						<?php } ?>-->
						<!--<div class="form-group row">
							<div class="col-xs-7">						
								<h3>Business Timings</h3>
					<table class="table table-striped">					
						<tbody>
							 <tr> <td> <strong>Monday</strong> </td> <td> <?=$mon;?> </td> </tr>
							 <tr> <td> <strong>Tuesday</strong> </td> <td> <?=$tues;?> </td> </tr>
							 <tr> <td> <strong>Wednesday</strong> </td> <td> <?=$wed;?> </td> </tr>
							 <tr> <td> <strong>Thursday</strong> </td> <td> <?=$thurs;?> </td> </tr>
							 <tr> <td> <strong>Friday</strong> </td> <td><?=$fri;?> </td> </tr>
							 <tr> <td> <strong>Saturday</strong> </td> <td> <?=$sat;?> </td> </tr>
							 <tr> <td> <strong>Sunday</strong> </td> <td> <?=$sun;?></td> </tr>
						</tbody>
						</table>
							</div>
						</div>-->
					   </div>
					   <div class="col-md-6 col-sm-12">
					    <h4 style="padding:10px 0; font-weight:bold;">ID proof</h4>
						 <div class="form-group row">
							<div class="col-xs-7">
						<?php if($idproof!="" && file_exists('../uploads/profdoc/'.$idproof)){ ?>							
						<img src='../uploads/profdoc/<?php echo $idproof; ?>' width='250px' height='200px' />	
						<?php } ?>					
							</div>
						</div>
					</div>
					   <div class="col-sm-12">
						  <div class="form-group">
							<label class="col-xs-3 control-label fieldtitle" style='margin-left: 5px;'>About Self</label>
							<div class="col-xs-9" style ="margin-left: -45px;">
							   <?php echo stripslashes($about_self);?> 
							</div>
						  </div>
					  </div>
					  
					  
					  <!--<div class="col-sm-12">
					  <h4 class="card-title" style="padding-left:15px;">Booking Details</h4>
								<div class="table-responsive col-sm-12">
								<table id="demo-dt-basic" class="table table-striped table-bordered sourced-data">
                                    <thead>
                                        <tr>
											<th style="width:30px;">No</th>
											<th>User name</th>
											<th >Date</th>
											<th>Time</th>
											<th>status </th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?
								    if((isset($filter))&&(isset($from1))&&(isset($to1)))
									{
							         $sql="SELECT * FROM appointment Where lawyer_id= $id";
									 if(($from1 !="") and($to1 != ""))
									 {
										 $from2=date('Y-m-d',strtotime($from1));
										$to2=date('Y-m-d',strtotime($to1));
	                                 $sql.= " and book_date between '".$from2."' and '".$to2."'";
									 }
									 $GetRecords=$db->get_all($sql);
									 $GetRecords1=$db->numrows($sql);
									
									}
									else{
									$GetRecords=$db->get_all("select * from appointment where lawyer_id='$id' order by id desc");
                                    $GetRecords1=$db->numrows("select * from appointment where lawyer_id='$id'");
									}
							       $sno = 1;
							    if(($GetRecords1) > 0)
							    { ?>
							
						   <?
							foreach($GetRecords as $i=>$GetRecord) {
								$idvalue = $GetRecord['id'];
								$usr_id = $GetRecord['user_id'];
								$lyr_id = $GetRecord['lawyer_id'];
								$book_date=$GetRecord['book_date'];
								$time=$GetRecord['time'];
								$approve=$GetRecord['approve_status'];
								$usrname = userInfo($usr_id,'fname');
									
							?>
									   <tr>
									        <td style="width:30px;" align='left'><?php echo $sno; ?></td>
											<td  align='left'><?php echo $usrname ?></td>
					                        <td  align='left'><?php echo date('d-M-Y',strtotime($book_date)); ?></td>
											<td  align='left'><?php echo $time; ?></td>
                                           
											<td>		
						<?php if ($approve== 0) {?> 					   
						<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#appt<?=$sno;?>" aria-expanded="false" aria-controls="appt0">
						Action
						</button>
						<div class="collapse" id="appt<?=$sno;?>">
						<div class="well nopadding" style="padding:0;">
							<div class="row">
								<div class="col-sm-12">
									<ul class="layr_appmnt">
									<li><a href="company-view.php?id=<?=$id;?>&uid=<?=$idvalue;?>&act=acpt" class="accept">Accept <i class=" icon-ok-circled-1"></i></a></li>
										<li><a href="company-view.php?id=<?=$id;?>&uid=<?=$idvalue;?>&act=cncl" class="cancel">Cancel <i class="icon-cancel-circled"></i></a></li>
									</ul>
									
									
								</div>
							</div>
						</div>
						</div>
							<?php } else if ($approve == 1){?>
								<label class="btn btn-success">Accepted <i class=" icon-ok-circled-1"></i></label>
							   <?php } else if ($approve== 2) {?>
							    <label class="btn btn-danger">Cancelled <i class="icon-cancel-circled"></i></label>
							   <?php } ?>
							   </td>
									   </tr>
									<?php $sno++; }
									} 
									?>
									</tbody>
                                </table>
								</div>
								
								<div class="form-actions col-sm-12" style="text-align:center;    padding-bottom: 20px;">
								<a  href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Back
								</a>
								 <a href="company-profileupd.php?upd=2&id=<?php echo $id; ?>" class="btn btn-primary">
									<i class="fa fa-check-square-o"></i> Edit
								</a>
							</div>
							
								</div>-->
					   </div>
					   </div>
					</div>
				</div>
                <!--End view-->
				</div>
				</div>
            </div>
<?php include 'footer.php'; ?>