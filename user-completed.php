<?php 
include "includes/title.php";
if(!(isset($_SESSION['id'])) && !(isset($_SESSION['email'])) && !(isset($_SESSION['fname'])))
{
header("location:login");
echo "<script>window.location='login'</script>";
}
$responsid=isset($responsid)?$responsid:'';
$compid=isset($compid)?$compid:'';
if(!empty($responsid) && $compid){
	$responsid=base64_decode($responsid);
	$compid=base64_decode($compid);
	$db->insertrec("update sent_enquiry set prof_response='4' where id='{$compid}'");
	$db->insertrec("update response set status='4' where id='{$responsid}'");
	header("Location: user-order?completed");
	echo "<script>href.location='user-order?completed'</script>";
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
<?php if(isset($completed)) { ?> 
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
      <div class="col-sm-12 profile_box">
		<div class="row mb10">
		   <div class="col-sm-12">
		       <h3 class="clr_txt">My Order Completed List</h3>
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
						      <th>Order Type</th>
						   </tr>
					   </thead>
					   <tbody>
<?php 
$sesid=$_SESSION['id'];
$i=1;
//echo "select * from sent_enquiry where senter_id='$sesid'  and status!='6' and status='0' and prof_response='4' "; exit;
$reqInfo=$db->get_all("select * from sent_enquiry where senter_id='$sesid'  and status!='6' and status='0' and prof_response='4'");
foreach($reqInfo as $req){
	$resp=$db->singlerec("select * from response where responser_autoid='$req[id]'");
	$enqid=$req['id'];
	$catid=$req['cat_id'];
	$profidd=$req['receiver_id'];
	$resp_name=$com_obj->get_name($profidd);
	$catname=$com_obj->cat_name($catid);
	$date=$req['crcdt'];
	$date=date("Y-m-d",strtotime($date));
	$status=$req['status'];
	$res_status=$req['prof_response'];
	$respstat=$resp['status'];
	$responser_name=$resp['responser_id'];
	$res_senterid=$resp['senter_id'];
	$__respid=$resp['id'];
	//$resp_name=$com_obj->get_name($responser_name);
	//$url=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$url="user-completed";
	$mark_url=$url."?compid=".base64_encode($enqid)."&responsid=".base64_encode($__respid);
	if($res_status==3){
		$resp_arrray=array("mark" => "Mark as Completed", "progress"=> "In Progress","btnprocess" =>"btn-info" , "res_url" => $mark_url);
	}elseif($res_status==4){
		$resp_arrray=array("mark" => "Work Completed", "progress"=> "Completed","btnprocess" =>"btn-success" ,"res_url" => "#");
	}else{
		$resp_arrray=array("mark" => "Work Completed", "progress"=> "Pending","btnprocess" =>"btn-danger" , "res_url" => "#");
	}
	$role=$req['role'];
	if($role==0){
		$ordertype="<div style='color:#5e6aff;'><b>Group Order</b></div>";
	}else{
		$ordertype="<div style='color:#ff5e62'><b>Individual Order</b></div>";
	}
	
?>
					        <tr>
							   <td><?php echo $i; ?></td>
							   <td><a href="list-detail?uid=<?php echo base64_encode($responser_name); ?>"><?php echo ucfirst($resp_name); ?></a></td>
							   <td><?php echo $date; ?></td>
							   <td><?php echo $catname; ?></td>
							   <td>
							     <ul class="edt_list"  style="width:142px">
								    <li><a href="<?php echo $resp_arrray['res_url']; ?>" class="btn-sm btn-danger"><?php echo $resp_arrray['mark']; ?></a></li>
								 </ul>
							   </td>
							   <td>
							     <ul class="edt_list">
								    <li><a href="#" class="btn-sm <?php echo $resp_arrray['btnprocess']; ?>"><?php echo $resp_arrray['progress']; ?></a></li>
								 </ul>
							   </td>
							   <td><a href="user-order-details?id=<?php echo base64_encode($enqid); ?>&catid=<?php echo base64_encode($catid); ?>" target="_blank">View</a> </td>
							   <td><?php echo $ordertype; ?></td>
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
	<!-- ************************* Login Model ******************-->
	
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modbgcol">
      <div class="modal-header modhed">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cancel-circled2" aria-hidden="true" style="font-size: 27px;"></span></button>
        <h4 class="modal-title headsig" id="myModalLabel">Sign In</h4>
      </div>
      <div class="modal-body">
	     <div class="row">
		             <div class="col-md-1 col-sm-1">
					  </div> 
					<div class="col-md-10 col-sm-10">
						<div class="form-group sigfonsiz">
							<label> Role </label>
							 <ul class="maidtype">
								 <li><input type="radio" name="New Maid"> Maid Advisor</li>
								 <li><input type="radio" name="New Maid"> Maid User</li>
								 <li><input type="radio" name="New Maid"> Guest</li>
							 </ul>
							
						</div>
					</div>
					  <div class="col-md-1 col-sm-1">
					  </div>
				</div>
        <div class="row">
	   
					 <div class="col-md-1 col-sm-1">
					  </div>
					<div class="col-md-10 col-sm-10">
						<div class="form-group sigfonsiz">
							<label>Email Address</label>
							<input type="email" class="form-control singinpu" id="firstname_booking" name="firstname_booking">
						</div>
					</div>
					 <div class="col-md-1 col-sm-1">
	                </div>
				</div>
			<div class="row">
			         <div class="col-md-1 col-sm-1">
	                 </div>
					<div class="col-md-10 col-sm-10">
						<div class="form-group sigfonsiz">
							<label>Password</label>
							<input type="password" class="form-control singinpu" id="firstname_booking" name="firstname_booking">
						</div>
					</div>
					 <div class="col-md-1 col-sm-1">
	                </div>
				</div>
				
				<div class="row">
				
				  <div class="col-md-12 col-sm-12 remb">
				     <div class="form-group">
				     <input type="checkbox">  Rember me
					 </div>
				  </div>
				</div>
				
				
				<div class="row">
			         <div class="col-md-1 col-sm-1">
	                 </div>
					<div class="col-md-10 col-sm-10">
						
							
							<a href="#" class="btn_3 form-control">Sign in</a>
							
						
					</div>
					 <div class="col-md-1 col-sm-1">
	                </div>
				</div>
      </div>
      <div class="modal-footer modfot">
	  
	  <div class="row">
	     <div class="col-md-1 col-sm-1">
	      </div>
			  <div class="col-md-10 col-sm-10 regfor">
					<a href="register.php"  class=" pull-left" >Register</a>
					<a href="#" class="">Forgot Password</a>
			  </div>		
		 <div class="col-md-1 col-sm-1">
	      </div>
      </div>
    </div>
  </div>
</div>
</div>
		
	<!-- ************************* Login Model ******************-->	
		
		
	<!-- ************************* Register Model ******************-->
	
	
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modbgcol">
      <div class="modal-header modhed">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cancel-circled2" aria-hidden="true" style="font-size: 27px;"></span></button>
        <h4 class="modal-title headsig" id="myModalLabel">Register</h4>
      </div>
      <div class="modal-body">
	     <div class="row">
	   
					 <div class="col-md-1 col-sm-1">
					  </div>
					<div class="col-md-10 col-sm-10">
						<div class="form-group sigfonsiz">
							<label>Name</label>
							<input type="text" class="form-control singinpu" id="firstname_booking" name="firstname_booking">
						</div>
					</div>
					 <div class="col-md-1 col-sm-1">
	                </div>
			</div>
	    
         <div class="row">
	   
					 <div class="col-md-1 col-sm-1">
					  </div>
					<div class="col-md-10 col-sm-10">
						<div class="form-group sigfonsiz">
							<label>Email Address</label>
							<input type="email" class="form-control singinpu" id="firstname_booking" name="firstname_booking">
						</div>
					</div>
					 <div class="col-md-1 col-sm-1">
	                </div>
			</div>
			<div class="row">
			         <div class="col-md-1 col-sm-1">
	                 </div>
					<div class="col-md-10 col-sm-10">
						<div class="form-group sigfonsiz">
							<label>Password</label>
							<input type="password" class="form-control singinpu" id="firstname_booking" name="firstname_booking">
						</div>
					</div>
					 <div class="col-md-1 col-sm-1">
	                </div>
				</div>
				
				
				
				
				<div class="row">
			         <div class="col-md-1 col-sm-1">
	                 </div>
					<div class="col-md-10 col-sm-10">
						
							
							<a href="#" class="btn_3 form-control">Submit</a>
							
						
					</div>
					 <div class="col-md-1 col-sm-1">
	                </div>
				</div>
      </div>
      <div class="modal-footer modfot">
	  
	  <div class="row">
	     <div class="col-md-1 col-sm-1">
	      </div>
			  <div class="col-md-10 col-sm-10 regfor">
					<a href="#"  class=" pull-left" >Login</a>
					
			  </div>		
		 <div class="col-md-1 col-sm-1">
	      </div>
      </div>
    </div>
  </div>
</div>
</div>
		
	<!-- ************************* Register Model ******************-->	
			



	
		

	
		
		
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