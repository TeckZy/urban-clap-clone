<?php 
include "includes/title.php";
if(!(isset($_SESSION['id'])) && !(isset($_SESSION['email'])) && !(isset($_SESSION['fname'])))
{
header("location:login");
echo "<script>window.location='login'</script>";
}
$responsid=isset($responsid)?$responsid:'';
$compid=isset($compid)?$compid:'';
$cancelid=isset($cancelid)?$cancelid:'';
if(!empty($compid)){
	$sndid=base64_decode($sid);
	$compid=base64_decode($compid);
	$Getres=$db->singlerec("select * from sent_enquiry where  id='$compid' and prof_response='3' and role='1'");
	$cat=$Getres['cat_id'];	
        $res_id=$Getres['receiver_id'];
	$catname=$com_obj->cat_name($cat);
	$bud_frm=$Getres['comp_budget_from'].' '.$site_currency;
	$bud_to=$Getres['comp_budget_to'].' '.$site_currency;
	$loc=ucfirst($Getres['comp_location']);
	$compqus=$Getres['comp_qusans'];
	$compqus=json_decode($compqus, true);
	if(!empty($compqus['ans1'])) $status=$compqus['ans1']; 
	elseif(!empty($compqus['ans2'])) $status=$compqus['ans2']; 
	elseif(!empty($compqus['ans3'])) $status=$compqus['ans3'];
	elseif(!empty($compqus['ans4'])) $status=$compqus['ans4']; 
	elseif(!empty($compqus['ans5'])) $status=$compqus['ans5']; else $status="-";
	
	$Uinfo=$db->singlerec("select * from register where id='$res_id'");
	$username=$Uinfo['fname'].' '.$Uinfo['lname'];
	$uemail=$Uinfo['email'];
	$url=$siteurl."prof-completed";
	$sub="Service Completion";
	$text="Your service has been completed successfully.<br><br>Your Service Order Details are,<br>";
	$info="How soon would you like to hire?<br>$status<br><br>Budget Min:$bud_frm <br>Budget Max:$bud_to <br>Location : $loc";
	$msg=$email_temp->response_mail($url,$text,$info,$siteinfo,$username);
	$sts=$com_obj->email("",$uemail,$sub,$msg);
	$db->insertrec("update sent_enquiry set prof_response='4' where id='{$compid}' and cat_id='$cat' and role='1'");
	header("Location: user-completed?completed");
	echo "<script>location.href='user-completed?completed';</script>";
	exit;
}
if(isset($cancelid)){
	$cancelid=base64_decode($cancelid);
	$db->insertrec("update sent_enquiry set status='6',prof_response='6' where id='{$cancelid}'");
	/* header("Location: user-order?canceled");
	echo "<script>location.href='user-order?canceled';</script>"; */
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


<?php if(isset($canceled)) { ?> 
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
<?php if(isset($order)){ ?>
<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok green"></i>
		<strong class="green">
			Your Order Posted Successfully !!!
		</strong>

	</div>
<?php } ?>
                     <div class="col-sm-12 profile_box">
					  
		
		<div class="row mb10">
		   <div class="col-sm-12">
		       <h3 class="clr_txt">My Order</h3>
		   </div>
		   <div class="clearfix"></div>
		   <div class="col-sm-12">
		       <div class="table-responsive">
			       <table id="example" class="table table-striped table-bordered appointments_tbl" cellspacing="0" width="100%">
				  
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
//echo "select * from sent_enquiry where senter_id='$sesid' and prof_response!='4'and role='1' and status ='0'"; exit;
$reqInfo=$db->get_all("select * from sent_enquiry where senter_id='$sesid' and prof_response!='4'and role='1' and status ='0'");
foreach($reqInfo as $req){
	$resp=$db->singlerec("select * from response where responser_autoid='$req[id]'");
	$enqid=$req['id'];
	$catid=$req['cat_id'];
	$catname=$com_obj->cat_name($catid);
	$date=$req['crcdt'];
	$date=date("Y-m-d",strtotime($date));
	$sentid=$req['senter_id'];
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
	//$url=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$viw_url="user-order";
	//$mark_url=$viw_url."?compid=".base64_encode($enqid)."&responsid=".base64_encode($__respid);
	$mark_url=$viw_url."?compid=".base64_encode($enqid)."&sid=".base64_encode($sentid);
	$usr_cancel=$viw_url."?cancelid=".base64_encode($enqid);
	if($res_status==3){
		$resp_arrray=array("mark" => "Mark as Completed", "progress"=> "In Progress", "btnprocess" =>"btn-info" , "res_url" => $mark_url);
	}else if($res_status==4){
		$resp_arrray=array("mark" => "Work Completed", "progress"=> "Completed", "btnprocess" =>"btn-success" , "res_url" => "#");
	}else if($res_status==6){
		$resp_arrray=array("mark" => "Cancelled", "progress"=> "Cancelled", "btnprocess" =>"btn-danger" , "res_url" => "#");
	}else{
		$resp_arrray=array("mark" => "Cancel", "progress"=> "Pending", "btnprocess" =>"btn-danger" , "res_url" => $usr_cancel);
	}
	
?>
					        <tr>
							   <td><?php echo $i; ?></td>
							   <td><a href="list-detail?uid=<?php echo base64_encode($req['receiver_id']); ?>"><?php echo ucfirst($resp_name); ?></a></td>
							   <td><?php echo $date; ?></td>
							   <td><?php echo !empty($catname)?$catname:'Sent To All'; ?></td>
							   <td>
							     <ul class="edt_list">
								    <li><a href="<?php echo $resp_arrray['res_url']; ?>" class="btn-sm <?php echo $resp_arrray['btnprocess']; ?>"><?php echo $resp_arrray['mark']; ?></a></li>
								 </ul>
							   </td>
							   <td>
							     <ul class="edt_list">
								    <li><a href="#" class="btn-sm <?php echo $resp_arrray['btnprocess']; ?>"><?php echo $resp_arrray['progress']; ?></a></li>
								 </ul>
							   </td>
							   
							   <td><a href="user-order-details?id=<?php echo base64_encode($enqid); ?>&catid=<?php echo base64_encode($catid); ?>" target="_blank">View</a> </td>
							</tr>
<?php $i++; } ?>
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