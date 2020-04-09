<?php 
include "includes/title.php";
if(!(isset($_SESSION['pid'])) && !(isset($_SESSION['pemail'])) && !(isset($_SESSION['pfname'])))
{
header("location:login");
echo "<script>window.location='login'</script>";
}
$del=isset($del)?$del:'';
$reqdel=isset($reqdel)?$reqdel:'';
if(isset($_REQUEST['del'])){
	$del=base64_decode($_REQUEST['del']);
	$db->insertrec("update sent_enquiry set prof_response='6' where id='$del'");
	header("Location: prof-dashboard?canceled");
	echo "<script>href.location='prof-dashboard?canceled'</script>";
	exit;
}
if(isset($_REQUEST['reqdel'])){
	$del=base64_decode($_REQUEST['reqdel']);
	$db->insertrec("update sent_enquiry set prof_response='6' where id='$del'");
	header("Location: prof-dashboard?canceled");
	echo "<script>href.location='prof-dashboard?canceled'</script>";
	exit;
}
$uid=$_SESSION['pid'];
$res_number=isset($res_number)?$res_number:'';
$res_email=isset($res_email)?$res_email:'';
$res_message=isset($res_message)?$res_message:'';
$_senterid=isset($_senterid)?$_senterid:'';
$_receiverid=isset($_receiverid)?$_receiverid:'';
$form_id=isset($form_id)?$form_id:'';
$_cat_id=isset($_cat_id)?$_cat_id:'';
if(isset($profes_response)){
	$res_number=$db->escapstr($res_number);
	$res_email=$db->escapstr($res_email);
	$res_message=$db->escapstr($res_message);
	$_senterid=$db->escapstr(base64_decode($_senterid));
	$_receiverid=$db->escapstr(base64_decode($_receiverid));
	$_senterid=$db->escapstr($_senterid);
	$_receiverid=$db->escapstr($_receiverid);
	$form_id=$db->escapstr(base64_decode($form_id));
	$_cat_id=$db->escapstr(base64_decode($_cat_id));
	
	$date=date("Y-m-d H:i:s");
	$set="senter_id='$_senterid'";
	$set.=",responser_id='$_receiverid'";
	$set.=",responser_autoid='$form_id'";
	$set.=",cat_id='$_cat_id'";
	$set.=",contact_no='$res_number'";
	$set.=",email='$res_email'";
	$set.=",message='$res_message'";
	$set.=",crcdt='$date'";
	$set.=",status='3'";
	
	$db->insertrec("insert into response set $set");
	$db->insertrec("update sent_enquiry set prof_response='3' where id='$form_id'");
	header("Location: prof-dashboard?success");
	echo "<script>href.location='prof-dashboard?success'</script>";
	exit;
}

if(isset($profesdashboard_response)){
	$res_number=$db->escapstr($res_number);
	$res_email=$db->escapstr($res_email);
	$res_message=$db->escapstr($res_message);
	$_senterid=$db->escapstr(base64_decode($_senterid));
	$_receiverid=$db->escapstr(base64_decode($_receiverid));
	$_senterid=$db->escapstr($_senterid);
	$_receiverid=$db->escapstr($_receiverid);
	$form_id=$db->escapstr(base64_decode($form_id));
	$_cat_id=$db->escapstr(base64_decode($_cat_id));
	
	$date=date("Y-m-d H:i:s");
	$set="senter_id='$_senterid'";
	$set.=",responser_id='$_receiverid'";
	$set.=",responser_autoid='$form_id'";
	$set.=",cat_id='$_cat_id'";
	$set.=",contact_no='$res_number'";
	$set.=",email='$res_email'";
	$set.=",message='$res_message'";
	$set.=",crcdt='$date'";
	$set.=",status='1'";
	
	$db->insertrec("insert into response set $set");
	$db->insertrec("update sent_enquiry set prof_response='1' where id='$form_id'");
	header("Location: prof-order?success");
	echo "<script>href.location='prof-order?success'</script>";
	exit;
}
?>
<body>

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
     <?php include "includes/header.php"; ?>
    <section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_2.jpg" data-natural-width="1400" data-natural-height="470">
               <?php include "welcomeprofession.php"; ?>
            </section>

  

	
	<section class="container-fluid margin_31 test3_bg">
       <div class="container mt30 mb30">
		  <div class="row">
			<?php include "profleftmenu.php"; ?>
			<div class="col-lg-9 col-md-9">
                     <div class="col-sm-12 profile_box">
					   <div class="row mt20 ">
<?php $dashcount=$com_obj->profesionDashboardCount($_SESSION['pid']); ?>
            <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
                <div class="feature_home">
                    <i class=" icon_set_1_icon-53"></i>
                    <h3><span><?php echo !empty($dashcount['proforder'])?$dashcount['proforder']:'0'; ?></span> Orders</h3>
                    <a href="prof-order" class="btn_dflt_outline btn">View All</a>
                </div>
            </div>
			
			<div class="col-md-4 wow zoomIn" data-wow-delay="0.4s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-51"></i>
                    <h3><span><?php echo !empty($dashcount['profreq'])?$dashcount['profreq']:'0'; ?></span> Request</h3>
                    <a href="prof-request" class="btn_dflt_outline btn">View All</a>
                </div>
            </div>
            
            
			
			<div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                <div class="feature_home">
                    <i class=" icon-users-outline"></i>
                    <h3><span><?php echo !empty($dashcount['revcount'])?$dashcount['revcount']:'0'; ?> </span> Users Review</h3>
                    <a href="prof-review" class="btn_dflt_outline btn">View All</a>
                </div>
            </div>
        </div>
<?php if(isset($_REQUEST['success'])) { ?> 
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok green"></i>
		<strong class="green">
			Response Sent Successfully !!!
		</strong>

	</div>
<?php } ?>
<?php if(isset($_REQUEST['canceled'])) { ?> 
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok green"></i>
		<strong class="green">
			Order Cancelled Successfully !!!
		</strong>

	</div>
<?php } ?>		
		<div class="row mb10">
		   <div class="col-sm-12">
		       <h3 class="clr_txt">Recent Order</h3>
		   </div>
		   <div class="clearfix"></div>
		   <div class="col-sm-12">
		       <div class="table-responsive">
			       <table class="table table-striped appointments_tbl">
				       <thead>
					       <tr>
						      <th>S.No</th>
						      <th>User Name</th>
						      <th>Order Date</th>
						      <th>Budget</th>
						      <th>Location</th>
						      <th>Response</th>
						      <th>View</th>
						   </tr>
					   </thead>
					   <tbody>
<?php
$psesid=$_SESSION['pid'];
$i=1;
$catid=$db->singlerec("select cat_id from register where id='$psesid' and user_role='1' and active_status='1'");
$catid=$catid['cat_id'];
$reqInfo=$db->get_all("select * from sent_enquiry where cat_id='$catid' and role='1' and status!='6'  and prof_response='0' and receiver_id='$psesid' ");
$i=1;
$ordermsg="No Recent Order Found";
if(!empty($reqInfo)){
	foreach($reqInfo as $req){
		$id=$req['id'];
		$senterid=$req['senter_id'];
		$receiverid=$req['receiver_id'];
		$catid=$req['cat_id'];
		$catname=$com_obj->cat_name($catid);
		$username=$com_obj->get_name($senterid);
		$date=$req['crcdt'];
		$date=date("Y-m-d",strtotime($date));
		$budget_from=$req['comp_budget_from'];
		$budget_to=$req['comp_budget_to'];
		$location=ucfirst($req['comp_location']);
		$comp_qus=$req['comp_qusans'];
		$comp_qus=json_decode($comp_qus, true);
		if(!empty($comp_qus['ans1'])) $status=$comp_qus['ans1']; 
		elseif(!empty($comp_qus['ans2'])) $status=$comp_qus['ans2']; 
		elseif(!empty($comp_qus['ans3'])) $status=$comp_qus['ans3'];
		elseif(!empty($comp_qus['ans4'])) $status=$comp_qus['ans4']; 
		elseif(!empty($comp_qus['ans5'])) $status=$comp_qus['ans5']; else $status="-";
		$date=$req['crcdt'];
		$date=date("Y-m-d",strtotime($date));
		$genInfo=$com_obj->getProfInfo($receiverid);
?>
					        <tr>
							   <td><?php echo $i; ?></td>
							   <td><?php echo ucfirst($username); ?></td>
							   <td><?php echo $date; ?></td>
							   <td><?php echo $budget_from." - ".$budget_to; ?></td>
							   <td><?php if(!empty($location)) echo $location; else echo "-"; ?></td>
							   <td>
					
							     <ul class="edt_list">
								    <li><a href="prof-order?actresp=<?php echo base64_encode($id); ?>&sid=<?php echo base64_encode($senterid)?>" class="btn-sm btn-success">Accept</a></li>
									<li><a href="prof-dashboard?del=<?php echo base64_encode($id); ?>" onclick="if(confirm('Are you sure want to cancel this order?')) { return true; }else { return false; }" class="btn-sm btn-danger"><i class=" icon-trash"></i></a></li>
								 </ul>
							   </td>
							   <td><a href="prof-order-details?id=<?php echo base64_encode($id); ?>" target="_blank">View</a> </td>
							</tr>
<div class="modal fade deflt_mdl" id="prof_response-<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Response To <?php echo ucfirst($username); ?></h4>
      </div>
      <div class="modal-body">
		<div class="row">
			<div class="col-sm-12">
				<form action="#">
					<div class="form-group">
						<label>Contact Number</label>
						<input class="form-control" name="res_number" value="<?php echo !empty($genInfo['phone'])?$genInfo['phone']:''; ?>" type="text">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" name="res_email" value="<?php echo !empty($genInfo['email'])?$genInfo['email']:''; ?>" type="text">
					</div>
					<div class="form-group">
						<label>Enter The Message</label>
						<textarea class="form-control" name="res_message" rows="5"></textarea>
					</div>
					
					<input type="hidden" name="form_id" value="<?php echo base64_encode($id); ?>" />
					<input type="hidden" name="_senterid" value="<?php echo base64_encode($senterid); ?>" />
					<input type="hidden" name="_receiverid" value="<?php echo base64_encode($uid); ?>" />
					<input type="hidden" name="_cat_id" value="<?php echo base64_encode($catid); ?>" />
					<div class="form-group text-center">
						<button class="btn_2 btn agelogbt" name="profes_response" type="submit">Send Now</button>
					</div>
				</form>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>
<?php $i++; } } else { ?>
							<tr><td colspan="7" class="text-center"><?php echo $ordermsg; ?></td></tr>
<?php } ?>
					   </tbody>
				   </table>
			   </div>
		   </div>
		</div>
		
		<div class="row mb10">
		   <div class="col-sm-12">
		       <h3 class="clr_txt">Recent Request</h3>
		   </div>
		   <div class="clearfix"></div>
		   <div class="col-sm-12">
		       <div class="table-responsive">
			       <table class="table table-striped appointments_tbl">
				       <thead>
					       <tr>
						      <th>S.No</th>
						      <th>User Name</th>
						      <th>Order Date</th>
						      <th>Budget</th>
						      <th>Location</th>
						      <th>Response</th>
						      <th>View</th>
						   </tr>
					   </thead>
					   <tbody>
					   <?php
$psesid=$_SESSION['pid'];
$i=1;
$catid=$db->singlerec("select cat_id from register where id='$psesid' and user_role='1' and active_status='1'");
$catid=$catid['cat_id'];
$reqInfo=$db->get_all("select * from sent_enquiry where cat_id='$catid' and role='0' and status!='6' and prof_response='0' and receiver_id='$psesid' ");
$i=1;
$reqmsg="No Recent Request Found";
if(!empty($reqInfo)){
	foreach($reqInfo as $req){
		$id=$req['id'];
		$senterid=$req['senter_id'];
		$profid=$db->singlerec("select fname,lname,email from register where id='$senterid' and user_role='0'");
		$receiverid=$req['receiver_id'];
		$catid=$req['cat_id'];
		$catname=$com_obj->cat_name($catid);
		$username=$com_obj->get_name($senterid);
		$date=$req['crcdt'];
		$date=date("Y-m-d",strtotime($date));
		$budget_from=$req['comp_budget_from'];
		$budget_to=$req['comp_budget_to'];
		$location=ucfirst($req['comp_location']);
		$comp_qus=$req['comp_qusans'];
		$comp_qus=json_decode($comp_qus, true);
		if(!empty($comp_qus['ans1'])) $status=$comp_qus['ans1']; 
		elseif(!empty($comp_qus['ans2'])) $status=$comp_qus['ans2']; 
		elseif(!empty($comp_qus['ans3'])) $status=$comp_qus['ans3'];
		elseif(!empty($comp_qus['ans4'])) $status=$comp_qus['ans4']; 
		elseif(!empty($comp_qus['ans5'])) $status=$comp_qus['ans5']; else $status="-";
		$date=$req['crcdt'];
		$date=date("Y-m-d",strtotime($date));
		//$genInfo=$com_obj->getProfInfo($receiverid);
?>
					        <tr>
							   <td><?php echo $i; ?></td>
							   <td><?php echo ucfirst($username); ?></td>
							   <td><?php echo $date; ?></td>
							   <td><?php echo $budget_from." - ".$budget_to; ?></td>
							   <td><?php if(!empty($location)) echo $location; else echo "-"; ?></td>
							   <td>
							     <ul class="edt_list">
								    <li><a href="#" class="btn-sm btn-success" data-toggle="modal" data-target="#reqprof_response-<?php echo $id; ?>">Response</a></li>
									<li><a href="prof-dashboard?reqdel=<?php echo base64_encode($id); ?>" onclick="if(confirm('Are you sure want to cancel this order?')) { return true; }else { return false; }" class="btn-sm btn-danger"><i class=" icon-trash"></i></a></li>
								 </ul>
							   </td>
							   <td><a href="prof-request-details?id=<?php echo base64_encode($id); ?>" target="_blank">View</a> </td>
							</tr>
<div class="modal fade deflt_mdl" id="reqprof_response-<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Response To <?php echo ucfirst($username); ?></h4>
      </div>
      <div class="modal-body">
		<div class="row">
			<div class="col-sm-12">
				<form method="post">
					<div class="form-group">
						<label>Contact Number</label>
						<input class="form-control" name="res_number" value="<?php echo $profid['fname'].' '.$profid['lname'];?>" type="text" readonly>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" name="res_email" value="<?php echo $profid['email']; ?>" type="text" readonly>
					</div>
					<div class="form-group">
						<label>Enter The Message</label>
						<textarea class="form-control" name="res_message" rows="5"></textarea>
					</div>
					<input type="hidden" name="form_id" value="<?php echo base64_encode($id); ?>" />
					<input type="hidden" name="_senterid" value="<?php echo base64_encode($senterid); ?>" />
					<input type="hidden" name="_receiverid" value="<?php echo base64_encode($uid); ?>" />
					<input type="hidden" name="_cat_id" value="<?php echo base64_encode($catid); ?>" />
					<div class="form-group text-center">
						<button class="btn_2 btn agelogbt" type="submit" name="profesdashboard_response">Send Now</button>
					</div>
				</form>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>

<?php $i++; } }else{ ?>
							<tr><td colspan="7" class="text-center"><?php echo $reqmsg; ?></td></tr>
<?php } ?>
					   </tbody>
				   </table>
			   </div>
		   </div>
		</div>
					 </div>
                  </div>
		  </div>
      </div>
    </section> 
	
<!--*********************** Footer ****************************-->
<?php include "includes/footer.php"; ?>

<div id="toTop"></div><!-- Back to top button -->

 <!-- Common scripts -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>

  </body>
</html>