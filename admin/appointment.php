<?php include'header.php';
include'leftmenu.php'; 
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $db->escapstr($id) : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$f_status = isSet($f_status) ? $f_status : '' ;
$Message=isSet($Message)?$Message:'';
$search=isSet($search)?$search:'';
$daterange=isSet($daterange)?$daterange:'';
$approvest=isSet($approvest)?$approvest:'';
$highest=isSet($highest)?$highest:'';
$active_status=isSet($active_status)?$active_status:'';
$mobile=isSet($mobile)?$mobile:'';
$country=isSet($country)?$country:'';
$Title=isSet($Title)?$Title:'';
$user_access=isSet($user_access)?$user_access:'';
$DisplayStatus=isSet($DisplayStatus)?$DisplayStatus:'';
$GetContact = $db->singlerec("select ctc_num from cms where id='1'");
$contact_num = $GetContact['ctc_num'];
$url = "$siteurl";
if($act == "del") {
   
	$db->insertrec("delete from appointment where id='$id'");
	
	echo "<script>location.href='appointment.php?act=delt'</script>";	
    header("location:appointment.php?act=delt");
    exit ;
}
if($status == "1") {
    $db->insertrec("update appointment set approve_status='1' where id='$id'");
	$get_info=$db->singlerec("select * from appointment where id='$id'");
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
	echo "<script>location.href='appointment.php?act=sts'</script>";
    header("location:appointment.php?act=sts");
    exit ;
}
else if($status == "2") {
    $db->insertrec("update appointment set approve_status='2' where id='$id'");
     $get_info=$db->singlerec("select * from appointment where id='$id'");
	$get_case=$db->singlerec("select * from category where id='$get_info[case_type]'");
	
			$to_email = $com_obj->get_mailid($get_info['user_id']);
			$fromemail = $com_obj->get_mailid($get_info['lawyer_id']);
			$subject  = "Appointment Cancelled by ".$com_obj->get_name($get_info['lawyer_id']);
			$text ="Your Appointment has been Cancelled by the $keyword,";
			$text .="<center><table><tr><td> $keyword Name : </td><td>".$com_obj->get_name($get_info['lawyer_id'])."</td></tr><tr><td> Category : </td><td>".ucfirst($get_case['category_name'])."</td></tr>
			<tr><td> Appointment Date : </td><td>".date("d-m-Y",strtotime($get_info['book_date'])) ."</td></tr>
			<tr><td> Appointment Time : </td><td>$get_info[time] </td></tr></table></center>";
            $text .= "<a href='$siteurl/login.php'><b>CLICK HERE</b></a> to Login for view details."; 			
			$message = $email_temp->style_blue($siteinfo,'','',$text,$contact_num,$url);
			echo $message; exit;
			$com_obj->email($fromemail,$to_email,$subject,$message);
    echo "<script>location.href='appointment.php?act=sts'</script>";
	header("location:appointment.php?act=sts");
    exit ;
}

$numbers = array(4, 6, 2, 22, 11);
rsort($numbers);
$filter=""; 
$orderby="order by id desc";
if($search){
	if($daterange !=""){
		$startdate=substr($daterange,0,10);
		$enddate=substr($daterange,-10);
		$filter .="and crcdt between '$startdate' and '$enddate'";
	} 
	
	if($approvest !="" && $approvest !=0){
		if($approvest==2){$approvest=0;}
		$filter .="and active_status='$approvest'";
	}
}



if($act == "delt")
    $Message = "Deleted Successfully" ;
else if($act == "upd")
    $Message = "Updated Successfully" ;
else if($act == "add")
    $Message = "Added Successfully" ;
else if($act == "sts")
    $Message = "Status Changed Successfully" ;
else if($act == "fsts")
    $Message = "Added to Featured List" ;
else if($act == "frsts")
    $Message = "Removed from Featured List" ;
?>
      <div class="app-content content container-fluid">
         <div class="content-wrapper">
            <div class="content-header row">
               <div class="content-header-left col-md-6 col-xs-12 mb-2">
                  <h3 class="content-header-title mb-0">Bookings</h3>
               </div>
            </div>
            <div class="content-body">
               <!-- HTML (DOM) sourced data -->
               <section id="html">
                  <div class="row">
                     <div class="col-xs-12">
                        <div class="card">
                           <div class="card-header">
                              <h4 class="card-title">All Bookings</h4>
                              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                              <div class="heading-elements">
                                 <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <!-- <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>-->
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                 </ul>
                              </div>
                           </div>
                           <div class="card-body collapse in">
                              <div class="card-block card-dashboard table-responsive">
                                 <table class="table table-striped table-bordered tbl_appment sourced-data">
                                    <thead>
                                       <tr>
                                          <th class="hidden">S.No</th>
                                          <th>Bookings</th>
                                       </tr>
                                    </thead>
                                    <tbody>
									<?php 
									$GetRecords=$db->get_all("select * from appointment order by id desc");
                                    $sno = 1;
                                    if(count($GetRecords)==0)
                                    $Message="No Record found";
                                    $disp = "";
									foreach($GetRecords as $i=>$GetRecord) {
                                       $idvalue = $GetRecord['id'];
	                                   $booking_id = $GetRecord['booking_id'];
	                                   $user_id = $GetRecord['user_id'];
									   $usermail=$db->Extract_Single("select email from register where id= '".$GetRecord['user_id']."';");
									    $phone=$db->Extract_Single("select contact_no1 from register where id= '".$GetRecord['lawyer_id']."';");
	                                   $lawyer_id = $GetRecord['lawyer_id'];
									   $lawyermail=$db->Extract_Single("select email from register where id= '".$GetRecord['lawyer_id']."';");
	                                   $imag=$db->Extract_Single("select img from register where id= '".$GetRecord['lawyer_id']."';");
									   $book_date=$GetRecord['book_date'];
	                                   $time=$GetRecord['time'];
	                                   $case_type=$GetRecord['case_type'];
	                                   $getcase=$db->singlerec("select * from category where id='$case_type'");
	                                   $comment = $GetRecord['comment'] ;	
	                                   $approve_status = $GetRecord['approve_status'] ;
	                                   $getAmount=$db->singlerec("select pay_amount from  transaction where trans_id='$booking_id'");
	                                   $tot_amount = $getAmount["pay_amount"];
                                       if($approve_status == '0'){
                                        $DisplayStatus ="<a href='appointment.php?id=$idvalue&status=1' title='$Title' data-toggle='tooltip'><button class='btn-sm btn-info'>Accept <i class=' icon-ok-circled-1'></i></button></a>";				   
		                                $DisplayStatus .=  "<a href='appointment.php?id=$idvalue&status=2' title='$Title'  data-toggle='tooltip'><button class='btn-sm btn-warning'>Cancel <i class='icon-cancel-circled'></i></button></a>";					    
	                                   }	
                                       else if($approve_status == '1'){
                                       $DisplayStatus ="<button class='btn-sm btn-success'>Accepted <i class=' icon-ok-circled-1'></i></button>";				   
		
	                                   }
                                       else if($approve_status == '2'){
                                       $DisplayStatus =  "<button class='btn-sm btn-danger'>Cancelled <i class='icon-cancel-circled'></i></button>";					    
		                               }	
									   ?>
                                       <tr>
                                          <td class="hidden"><?php echo $i+1;?></td>
										  <td>
                                             <div class="card-block">
                                                <div class="card card-color-new">
                                                   <div class="row card-hdr">
                                                      <div class="col-xs-2 card-left text-left">
                                                         <span class="text-center"><?=$sno;?></span>
                                                      </div>
                                                      <div class="col-xs-8 pull-right text-right card-right">
                                                         <em>Booking ID :</em> <span><?=$booking_id;?></span>
                                                      </div>
                                                   </div>
                                                   <div class="row card-bdy">
                                                      <div class="col-xs-4 text-left">
                                                         <div class="card-img">
                                                            <img class="img-thumbnail" src="../uploads/profile/<?=$imag;?>" alt="">
                                                         </div>
                                                         <div class="card-info">
                                                            <a href="#" class="card-name" target="_blank"><?=$com_obj->get_name($lawyer_id);?></a>
                                                            <div class="card-text"><?=ucfirst($getcase['category_name']);?></div>
                                                            <div class="card-text"><?=$lawyermail;?></div>
                                                         </div>
                                                      </div>
                                                      <div class="col-xs-3 appointment-time text-center">
                                                         <div class="appointment-date"><i class="fa fa-calendar"></i><span><?=date('d-M-Y',strtotime($book_date));?></span></div>
                                                         <div><i class="fa fa-hourglass-o"></i><span>At <?=$time;?></span></div>
                                                      </div>
                                                      <div class="col-xs-4 text-left patient-info">
                                                         <a href="index.php?route=user/edit&amp;id=86" class="patient-name" target="_blank">
                                                         <i class="fa fa-user-o"></i> <?=$com_obj->get_name($user_id);?>                                        </a>
                                                         <p class="patient-other">
                                                            <i class="fa fa-envelope-o"></i>
                                                            <?=$usermail;?>                                       
                                                         </p>
                                                         <p class="patient-other">
                                                            <i class="fa fa-phone"></i> 
                                                            <?=$phone;?>                                       
                                                         </p>
                                                      </div>
                                                      <div class="card-action col-sm-12">
                                                         <div class="btn-group btn-sm pull-right" role="group" aria-label="Basic example">
                                                           <?php if($approve_status == '0'){ ?>
                                                            <a href="appointment.php?id=<?=$idvalue;?>&status=1" title="Accept" type="button" class="btn btn-sm btn-icon btn-secondary btn-success"><i class="fa fa-check"></i></a>
                                                            <a href="appointment.php?id=<?=$idvalue;?>&status=2" title="Reject" type="button" class="btn btn-sm btn-icon btn-secondary btn-warning"><i class="fa fa-times"></i></a>
														   <?php } ?>
														   <?php if($approve_status == '1'){ ?>
														      <label type="button" title ="Accepted" class="btn btn-sm btn-icon btn-secondary btn-info"><i class="fa fa-check"></i>Accepted</label>
														   <?php }?>
														    <?php if($approve_status == '2'){ ?>
															 <label  type="button" title ="Rejected" class="btn btn-sm btn-icon btn-secondary btn-info"><i class="fa fa-times"></i>Rejected</label>
														   <?php }?>
                                                            <a onclick='return makesure();' href='appointment.php?id=<?=$idvalue;?>&act=del'  type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>				
				
                                                         </div>
                                                      </div>
                                                      <!--<div class="row card-ftr"></div>-->
                                                   </div>
                                                </div>
                                             </div>
                                          </td>
                                       </tr>
									   
									   <?php $sno++;
                                       } ?>
									   
									
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <!--/ HTML (DOM) sourced data -->
            </div>
         </div>
      </div>
      <!-- ////////////////////////////////////////////////////////////////////////////-->
   <?php include'footer.php'; ?>