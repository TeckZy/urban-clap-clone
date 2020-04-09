<?php 
include "includes/title.php";
if(!(isset($_SESSION['pid'])) && !(isset($_SESSION['pemail'])) && !(isset($_SESSION['pfname'])))
{
header("location:login");
echo "<script>window.location='login'</script>";
}
$uid=$_SESSION['pid'];
?>
<body>



   

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
     <?php include "includes/header.php"; ?>
    <section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_2.jpg" data-natural-width="1400" data-natural-height="470">
               <?php include"welcomeprofession.php"; ?>
            </section>

  

	
	<section class="container-fluid margin_31 test3_bg">
       <div class="container mt30 mb30">
		  <div class="row">
			<?php include "profleftmenu.php"; ?>
			<div class="col-lg-9 col-md-9">
                     <div class="col-sm-12 profile_box">
<?php if(isset($success)){ ?>
<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok green"></i>
		<strong class="green">
			Request Sent Successfully !!!
		</strong>

	</div>
<?php } ?>					  
		
		<div class="row mb10">
		   <div class="col-sm-12">
		       <h3 class="clr_txt">My Request Response</h3>
		   </div>
		   <div class="clearfix"></div>
		   <div class="col-sm-12">
		       <div class="table-responsive">
			       <table id="example" class="table table-striped table-bordered appointments_tbl" cellspacing="0" width="100%">
				  
				      <thead>
					       <tr>
						      <th>S.No</th>
						      <th>User Name</th>
						      <th>Order Date</th>
						      <th>Budget</th>
						      <th>Location</th>
						      <th style="min-width:100px;">Response</th>
						      <!-- <th>View</th> -->
						   </tr>
					   </thead>
					   <tbody>
<?php
$psesid=$_SESSION['pid'];
$i=1;
$catid=$db->singlerec("select cat_id from register where id='$psesid' and user_role='1' and active_status='1'");
$catid=$catid['cat_id'];
//echo "select * from sent_enquiry where  receiver_id='$psesid' and status!='6' and status='0' and (prof_response='1' or prof_response='2') and role='0'"; exit;
$reqInfo=$db->get_all("select * from sent_enquiry where  receiver_id='$psesid' and status!='6' and status='0' and (prof_response='1' or prof_response='2') and role='0'");
$i=1;
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
	$stat=$req['prof_response'];
	if($stat==1) {
		$res_status="Pending";
		}
	else if($stat==2) {
		$res_status="Not Interest";
	}
?>
					        <tr>
							   <td><?php echo $i; ?></td>
							   <td><?php echo ucfirst($username); ?></td>
							   <td><?php echo $date; ?></td>
							   <td><?php echo $budget_from." - ".$budget_to; ?></td>
							   <td><?php if(!empty($location)) echo $location; else echo "-"; ?></td>
							   
							   <td>
							     <ul class="edt_list">
									<li><a href="javascript:void(0);" class="btn-sm btn-warning"><?php echo $res_status; ?></a></li>
									<li><a href="prof-order-details?id=<?php echo base64_encode($id); ?>" class="btn-sm btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
								 </ul>
							   </td>
							   <!--<td><a href="prof-order-details.html" target="_blank">View</a> </td>-->
							</tr>
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
	
	
	<div class="modal fade deflt_mdl" id="prof_response" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Response To User</h4>
      </div>
      <div class="modal-body">
		<div class="row">
			<div class="col-sm-12">
				<form action="#">
					<div class="form-group">
						<label>Contact Number</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Enter The Message</label>
						<textarea class="form-control" rows="5"></textarea>
					</div>
					<div class="form-group text-center">
						<button class="btn_2 btn agelogbt" type="submit">Send Now</button>
					</div>
				</form>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>
		
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