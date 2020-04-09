<?php 
include "includes/title.php";
if(!(isset($_SESSION['id'])) && !(isset($_SESSION['email'])) && !(isset($_SESSION['fname'])))
{
header("location:login");
echo "<script>window.location='login'</script>";
}
$canid=isset($canid)?$canid:'';
$act=isset($act)?$act:'';
if(isset($comp)){
	$revid=$db->escapstr($comp);
	$catid=$db->escapstr($cat);
	$pid=$db->escapstr($pid);
	$Chckval=$db->singlerec("select * from sent_enquiry where  id='$revid' and cat_id='$catid' and role='0'");
	$res_status=$Chckval['prof_response'];
	$catid=$Chckval['cat_id'];
	$cat_name=$com_obj->cat_name($catid);
	$bud_frm=$Chckval['comp_budget_from'].' '.$site_currency;
	$bud_to=$Chckval['comp_budget_to'].' '.$site_currency;
	$loc=ucfirst($Chckval['comp_location']);
	$compqus=$Chckval['comp_qusans'];
	$compqus=json_decode($compqus, true);
	if(!empty($compqus['ans1'])) $status=$compqus['ans1']; 
	elseif(!empty($compqus['ans2'])) $status=$compqus['ans2']; 
	elseif(!empty($compqus['ans3'])) $status=$compqus['ans3'];
	elseif(!empty($compqus['ans4'])) $status=$compqus['ans4']; 
	elseif(!empty($compqus['ans5'])) $status=$compqus['ans5']; 
	else $status="-";
	if($res_status==3){
	$userinfo=$db->singlerec("select * from register where id='$pid' and active_status='1' and user_role='1'");
	$username=$userinfo['fname'].' '.$userinfo['lname'];
	$mail=$userinfo['email'];
	$url=$siteurl."prof-completed";
	$sub="Service Completion";
	$text="Your service  has been completed successfully.<br><br>Your Service completion Details are,<br>";
	$info="How soon would you like to hire?<br>$status<br><br>Budget Min:$bud_frm<br>Budget Max:$bud_to<br>Location : $loc";
	$msg=$email_temp->response_mail($url,$text,$info,$siteinfo,$username);
	$sts=$com_obj->email("",$mail,$sub,$msg);
	$db->insertrec("update sent_enquiry  set prof_response='4' where  cat_id='$catid' and id='$revid' and role='0'");
	header("Location: user-completed?completed");
	echo "<script>href.location='user-completed?completed'</script>";
	}
}

/* if(isset($canid)){
	$canid=base64_decode($_REQUEST['canid']);
	$db->insertrec("update sent_enquiry set status='6' where id='$canid'");
	header("Location: user-request?canceled");
	echo "<script>href.location='user-request?canceled'</script>";
	exit;
} */

?>
<body>
<style>
.notresponse {
   pointer-events: none;
   cursor: default;
}
.response{
   cursor: default;
}
</style>


   

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
    <?php include "includes/header.php"; ?>
    <section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_2.jpg" data-natural-width="1400" data-natural-height="470">
               <div class="parallax-content-1">
                  <div class="animated fadeInDown">
                     <div id="search_bar_container" style="background:transparent;">
                        <div class="container">
                           <?php include "search.php"; ?>
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
<?php if(isset($canceled)) {  ?> 
	<div class="alert alert-block alert-danger">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok red"></i>
		<strong class="red">
			User order cancelled Successfully !!!
		</strong>

	</div>
<?php } ?>
<?php if(isset($accept)) {  ?> 
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok green"></i>
		<strong class="green">
			User order accepted Successfully !!!
		</strong>

	</div>
<?php } ?>
<?php if(isset($succ)) { ?> 
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok green"></i>
		<strong class="green">
			Your Request posted Successfully !!!
		</strong>

	</div>
<?php } ?>
                     <div class="col-sm-12 profile_box">
		<div class="row mb10">
		   <div class="col-sm-12">
		       <h3 class="clr_txt">My Request</h3>
		   </div>
		   <div class="clearfix"></div>
		   <div class="col-sm-12">
		       <div class="table-responsive">
			       <table id="example" class="table table-striped table-bordered appointments_tbl" cellspacing="0" width="100%">
				       <thead>
					       <tr>
						      <th>S.No</th>
							   <th>Name</th>
						      <th>Order Date</th>
						      <th>Category</th>
						      <!--<th>Action</th>-->
						      <!-- <th>Status</th> -->
						      <th>Respose</th>
							  <th>Status</th>
						   </tr>
					   </thead>
					   <tbody>
<?php 
$sesid=$_SESSION['id'];
$i=1;
$reqInfo=$db->get_all("select * from sent_enquiry where senter_id='$sesid' and role='0' and status!='6'  and status='0' and prof_response!='4' order by id desc");
foreach($reqInfo as $req){
	$resp=$db->singlerec("select responser_autoid,status from response where responser_autoid='$req[id]'");
	$enqid=$req['id'];
	$catid=$req['cat_id'];
	$profid=$req['receiver_id'];
	$pfname=$db->singlerec("select fname,lname from register where id='$profid' and user_role='1'");
	$catname=$com_obj->cat_name($catid);
	$date=$req['crcdt'];
	$date=date("Y-m-d",strtotime($date));
	$status=$req['status'];
	$res_status=$req['prof_response'];
	if($res_status==0){
		$resstatus="<div style='color:orange;'><b>Awaiting Response</b></div>";
	}else if($res_status==1){
		$resstatus="<div style='color:blue;'><b>Response Received</b></div>";
	}else if($res_status==3){
		$resstatus="<div style='color:#2dcee3;'><b>Accept</b></div>";
	}else if($res_status==2){
		$resstatus="<div style='color:red;'><b>Not Interest</b></div>";
	}else if($res_status==6){
		$resstatus="<div style='color:red;'><b>Cancelled</b></div>";
	}
	$respstat=$resp['status'];
	
?>
					        <tr>
							   <td><?php echo $i; ?></td>
							   <td><a href='list-detail?uid=<?php echo base64_encode($profid); ?>'><?php echo $pfname['fname'].' '.$pfname['lname']; ?></a></td>
							   <td><?php echo $date; ?></td>
							   <td><?php echo !empty($catname)?$catname:'Sent to All'; ?></td>
							   <!--<td>
							     <ul class="edt_list">
								    <li><a href="user-request.php?canid=<?php //echo base64_encode($req['id']); ?>" onclick="if(confirm('Are you sure want to cancel your order')) { return true; } else { return false; }" class='btn-sm btn-danger' >Cancel</a></li>
								 </ul>
							   </td>-->
							   <!--<td>
							     <ul class="edt_list">
								    <li><a href="#" class="btn-sm btn-warning">Pending</a></li>
								 </ul>
							   </td>-->
							   <?php if(!empty($resp) && ($res_status!=3)){?>
							   <td><a href="user-request-details?id=<?php echo base64_encode($enqid); ?>&catid=<?php echo base64_encode($catid); ?>"  <?php if($status==0){ echo "class='response'"; } else { echo "class='notresponse'"; } ?>>View Respose</a> </td>
							   <?php }else if(!empty($resp) && ($res_status==3)){?>
							   <td><a href="user-request?comp=<?php echo $enqid; ?>&cat=<?php echo $catid;  ?>&pid=<?php echo $profid; ?>" title="Click to complete" <?php if($status==0){ echo "class='response'"; } else { echo "class='notresponse'"; } ?>>Mark as Completed</a> </td>
                               <?php } else{ ?> 
							    <td><a href="#" >Not Response</a> </td>
							   <?php } ?>
							   <td><?php echo $resstatus; ?></td>
							</tr>
<?php  $i++; } ?>
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
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

  </body>
</html>