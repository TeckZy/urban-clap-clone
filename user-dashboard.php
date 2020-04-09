<?php 
include "includes/title.php";
if(!(isset($_SESSION['id'])) && !(isset($_SESSION['email'])) && !(isset($_SESSION['fname'])))
{
header("location:login");

echo "<script>window.location='login'</script>";

}
$basename=basename($_SERVER['PHP_SELF']);
$responsid=isset($responsid)?$responsid:'';
$compid=isset($compid)?$compid:'';
$cancelid=isset($cancelid)?$cancelid:'';
$resp_arrray=isset($resp_arrray)?$resp_arrray:'';
if(!empty($compid)){
	//$responsid=base64_decode($responsid);
	$compid=base64_decode($compid);
	
	$db->insertrec("update sent_enquiry set prof_response='4' where id='{$compid}'");
	
	$db->insertrec("update response set status='4' where id='{$responsid}'");
	header("Location: user-dashboard?completed");
	echo "<script>href.location='user-dashboard?completed'</script>";
	exit;
}
if(!empty($cancelid)){	
	$cancelid=base64_decode($cancelid);
	//echo "update sent_enquiry set status='6' where id='{$cancelid}'"; exit;
	$db->insertrec("update sent_enquiry set status='6' where id='{$cancelid}'");
	header("Location: user-dashboard?canceled");
	echo "<script>href.location='user-dashboard?canceled'</script>";
	exit;
}

?>
<body>

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
     <?php include "includes/header.php"; ?>
    <section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_2.jpg" data-natural-width="1400" data-natural-height="470">
               <div class="parallax-content-1">
                  <div class="animated fadeInDown">
                     <div id="search_bar_container" style="background:transparent;">
                        <div class="container">
						<?php include"search.php"; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

	<section class="container-fluid margin_31 test3_bg">
       <div class="container mt30 mb30">
		  <div class="row">
			<?php include "leftmenu.php"; ?>
			<div class="col-lg-9 col-md-9">
                     <div class="col-sm-12 profile_box">
					   <div class="row mt20 ">
<?php $dashcount=$com_obj->userDashboardCount($_SESSION['id']); ?>
            <div class="col-md-3 wow zoomIn" data-wow-delay="0.2s">
                <div class="feature_home">
                    <i class=" icon_set_1_icon-53"></i>
                    <h3><span><?php echo !empty($dashcount['ordercount'])?$dashcount['ordercount']:'0';?></span> Orders</h3>
                    <a href="user-order.php" class="btn_dflt_outline btn">View All</a>
                </div>
            </div>
            
            <div class="col-md-3 wow zoomIn" data-wow-delay="0.2s">
                <div class="feature_home">
                    <i class=" icon_set_1_icon-93"></i>
                    <h3><span><?php echo !empty($dashcount['reqcount'])?$dashcount['reqcount']:'0'; ?></span> Request</h3>
                    <a href="user-request.php" class="btn_dflt_outline btn">View All</a>
                </div>
            </div>
            
            <div class="col-md-3 wow zoomIn" data-wow-delay="0.6s">
                <div class="feature_home">
                    <i class=" icon_set_1_icon-82"></i>
                    <h3><span><?php echo !empty($dashcount['favcount'])?$dashcount['favcount']:'0'; ?> </span> My Favourite</h3>
                    <a href="user-favourite.php" class="btn_dflt_outline btn">View All</a>
                </div>
            </div>
			
			<div class="col-md-3 wow zoomIn" data-wow-delay="0.8s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-85"></i>
                    <h3><span><?php echo !empty($dashcount['revcount'])?$dashcount['revcount']:'0'; ?> </span> My Review</h3>
                    <a href="user-review.php" class="btn_dflt_outline btn">View All</a>
                </div>
            </div>
        </div>
<?php if(isset($_REQUEST['completed'])) { ?> 
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok green"></i>
		<strong class="green">
			Order Completed Successfully !!!
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
			Your Order Cancelled Successfully !!!
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
						      <th>Professional Name</th>
						      <th>Order Date</th>
						      <th>Category</th>
						      <th>Action</th>
							  <th>Status</th>
						      <th>View</th>
						   </tr>
					   </thead>
					   <tbody>
<?php
$sesid=$_SESSION['id'];
$i=1;
//$reqInfo=$db->get_all("select * from sent_enquiry where senter_id='$sesid'  and (role='0' and prof_response='3') or (role='1' and prof_response!='4') and status!='6' and status='0'  group by cat_id desc limit 5");
//echo "select * from sent_enquiry where senter_id='$sesid'"; exit;
$reqInfo=$db->get_all("select * from sent_enquiry where senter_id='$sesid' order by id desc ");
$msg="No Recent Order Found";
if(!empty($reqInfo)){
	foreach($reqInfo as $req){
	//echo "select * from response where responser_autoid='$req[id]'"; exit;
		$resp=$db->singlerec("select * from response where responser_autoid='$req[id]'");
		$enqid=$req['id'];
		$catid=$req['cat_id'];
		$catname=$com_obj->cat_name($catid);
		$date=$req['crcdt'];
		$date=date("Y-m-d",strtotime($date));
		$status=$req['status'];
		$res_status=$req['prof_response'];
		$respstat=$resp['status'];
		$responser_name=$resp['responser_id'];
		if(empty($responser_name)){
			$resp_name=$com_obj->get_name($req['receiver_id']);
		}else{
			$resp_name=$com_obj->get_name($responser_name);
		}
		$__respid=$resp['id'];
		//echo $__respid; exit;
		//$url=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$viw_url="user-dashboard";
		$mark_url=$viw_url."?compid=".base64_encode($enqid);
		$usr_cancel=$viw_url."?cancelid=".base64_encode($enqid);
		if($res_status==3){
			$resp_arrray=array("mark" => "Mark as Completed", "progress"=> "In Progress", "res_url" => $mark_url);
		}elseif($res_status==4){
			$resp_arrray=array("mark" => "Work Completed", "progress"=> "Completed", "res_url" => "#");
		}
		elseif(($status==6)||($res_status == 6)){
			$resp_arrray=array("mark" => "Cancelled", "progress"=> "None", "res_url" => "#");
		}
		else{
			$resp_arrray=array("mark" => "Cancel", "progress"=> "pending", "res_url" => $usr_cancel);
		}
	
?>
							
					        <tr>
							   <td><?php echo $i; ?></td>
							   <td><a href="list-detail?uid=<?php echo base64_encode($req['receiver_id']); ?>"><?php echo ucfirst($resp_name); ?></a></td>
							   <td><?php echo $date; ?></td>
							   <td><?php echo $catname; ?></td>
							   <td>
							     <ul class="edt_list">
								    <li><a href="<?php echo $resp_arrray['res_url']; ?>" class="btn-sm btn-danger"><?php echo $resp_arrray['mark']; ?></a></li>
								 </ul>
							   </td>
							   <td>
							     <ul class="edt_list">
								    <li><a href="#" class="btn-sm btn-warning"><?php echo $resp_arrray['progress']; ?></a></li>
								 </ul>
							   </td>
							   
							   <td><a href="user-order-details?id=<?php echo base64_encode($enqid); ?>&catid=<?php echo base64_encode($catid); ?>" target="_blank">View</a> </td>
							</tr>
<?php $i++; } } else{ ?>
							<tr>
								<td colspan="7" class="text-center"><?php echo $msg; ?></td>
							</tr>
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
						      <th>Order Date</th>
						      <th>Category</th>
						      <!--<th>Action</th>-->
						      <th>View Respose</th>
						   </tr>
					   </thead>
					   <tbody>
<?php 
$sesid=$_SESSION['id'];
$i=1;
$reqmsg="No Recent Request Found";
$reqInfo=$db->get_all("select * from sent_enquiry where senter_id='$sesid' and role='0' and status!='6' and status='0'  group by cat_id desc limit 5");
if(!empty($reqInfo)){
	foreach($reqInfo as $req){
		$resp=$db->singlerec("select responser_autoid,status from response where responser_autoid='$req[id]'");
		$enqid=$req['id'];
		$catid=$req['cat_id'];
		$catname=$com_obj->cat_name($catid);
		$date=$req['crcdt'];
		$date=date("Y-m-d",strtotime($date));
		$status=$req['status'];
		$res_status=$req['prof_response'];
		$respstat=$resp['status'];
	
?>
					        <tr>
							   <td><?php echo $i; ?></td>
							   <td><?php echo $date; ?></td>
							   <td><?php echo $catname; ?></td>
							   <!--<td>
							     <ul class="edt_list">
								    <li><a href="user-request.php?canid=<?php echo base64_encode($req['id']); ?>" onclick="if(confirm('Are you sure want to cancel your order')) { return true; } else { return false; }" class='btn-sm btn-danger' >Cancel</a></li>
								 </ul>
							   </td>-->
							   <!--<td>
							     <ul class="edt_list">
								    <li><a href="#" class="btn-sm btn-warning">Pending</a></li>
								 </ul>
							   </td>-->
							   <td><a href="user-request-details?id=<?php echo base64_encode($enqid); ?>&catid=<?php echo base64_encode($catid); ?>" target="_blank" <?php if($status==0){ echo "class='response'"; } else { echo "class='notresponse'"; } ?>>View Respose</a> </td>
							</tr>
<?php $i++; } } else { ?>
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