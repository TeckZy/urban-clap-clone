<?php include 'header.php';
include 'leftmenu.php'; 
	$msg="";
if(isset($addsuc)){
	$msg = "<center><span style='color:green'>Profile successfully updated!</span></center>";
}

if(isset($_action_submit)){
	$user_id = $db->escapstr($id);
	$action = $db->escapstr($action);
	$reason = $db->escapstr($reason);
	$action = (int)$action;
	$db->insertrec("update register set approve_status='$action', approve_reason='$reason' where id='$user_id'");
	$from = $siteemail; 
	$to = userInfo($id,'email');
	$subject = "Approve status";
	$msg = $email_temp->standered($siteinfo,$reason);
	$com_obj->email($from,$to,$subject,$msg);
	echo "<script>swal('updated','Updated successfully!','success');</script>";
}			
	$id = isSet($id) ? $db->escapstr($id):'';
	//echo "select * from request where user_id='$id'";exit;
	$GetRecord=$db->get_all("select * from request where id='$id'");      
if(count($GetRecord)==0)
{
    $Message="No Record found";
}
$disp = "";
    for($i = 0 ; $i < count($GetRecord) ; $i++) {
	$idvalue = $GetRecord[$i]['id'];
	$user_id = $GetRecord[$i]['user_id'];	
	$req_sts = $GetRecord[$i]['request_status'];
	$title = $GetRecord[$i]['title'];
	$exp_division = $GetRecord[$i]['exp_division'];	
	$license_id = $GetRecord[$i]['license_id'];	
	$lic_id_proof = $GetRecord[$i]['lic_id_proof'];
	$about_self = $GetRecord[$i]['about_self'];
	$crcdt = $GetRecord[$i]['crcdt'];
	$user_ip = $GetRecord[$i]['user_ip'];
	$crcdt=date('d-M-Y',strtotime($crcdt));
	$fname = userInfo($user_id,'fname');
	$lname = userInfo($user_id,'lname');
	$name = $fname.' '.$lname;	
	$exp_division = $com_obj->getExpdiv($exp_division);
	if($req_sts==0)
		$req_sts = "<span style='color:orange;font-weight:bold;'> Pending </span>";
	if($req_sts==1)
		$req_sts = "<span style='color:green;font-weight:bold;'> Accepted </span>";
	if($req_sts==2)
		$req_sts = "<span style='color:red;font-weight:bold;'> Rejected </span>";
}
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0"><?=$keyword;?> Request</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $msg;?></h4>
	                <h4 class="card-title"><?=$keyword;?> Request Details</h4>
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
				    <div class="row" style="padding-bottom:30px;">
						<div class="col-sm-6">
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>UserName</b></label>
							    <div class="col-sm-8">
									<label> <?php echo $name;?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Title</b></label>
							    <div class="col-sm-8">
									<label><?php echo $title;?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Request Status</b></label>
							    <div class="col-sm-8">
									<label><?php echo $req_sts;?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Key Areas of Practice</b></label>
							    <div class="col-sm-8">
									<label><?php echo $exp_division;?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>License ID</b></label>
							    <div class="col-sm-8">
									<label> <?php echo $license_id; ?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Self About</b></label>
							    <div class="col-sm-8">
									<label><?php echo $about_self;?></label>
								</div>
							</div>
							
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Request Date</b></label>
							    <div class="col-sm-8">
									<label> <?php echo $crcdt;?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>User IP</b></label>
							    <div class="col-sm-8">
									<label>  <?php echo $user_ip; ?></label>
								</div>
							</div>
							
						</div>
						 <?php if($lic_id_proof!="" && file_exists('../uploads/license-id-proof/'.$lic_id_proof)) { ?>
						<div class="col-sm-6">
							<h4>License ID Proof</h4>
							<div class="col-sm-12 ">
								<img src='../uploads/license-id-proof/<?php echo $lic_id_proof; ?>' width='250px' height='200px' >				
							</div>
						</div>
						 <?php } ?>
						 <div class="form-actions center col-sm-12" style="text-align:center;"> 
                            <a type="button" href="company-request.php" class="btn btn-warning mr-1">
									Back
								</a>
						</div>
						
						
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

<?php include 'footer.php'; ?>