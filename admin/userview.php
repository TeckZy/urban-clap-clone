<? include 'header.php';
include 'leftmenu.php'; 
$msg="";
if(isset($addsuc)){
	$msg = "<center><span style='color:green'>Profile successfully updated!</span></center>";
}
$user_id = $db->escapstr($id);
//filter start
if(isset($filter1))
{
$from2=date('Y-m-d',strtotime($from1));	
$to2=date('Y-m-d',strtotime($to1));	
echo "<script>alert($from1);</script>";	
$to2=$to1;
$sql="SELECT * FROM appointment Where user_id= $user_id";
	$sql.= " and date between '".$from2."' and '".$to2."'"; 
}
if(isset($_action_submit)){
	
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
	$contact_no1=$GetRecord[$i]['contact_no1'];	
	$country=$GetRecord[$i]['country'];
	$state=$GetRecord[$i]['state'];
	$city=$GetRecord[$i]['city'];
	$building=$GetRecord[$i]['building'];
	$street=$GetRecord[$i]['street'];
	$landmark=$GetRecord[$i]['landmark'];
	$area=$GetRecord[$i]['area'];
	$zip_code=$GetRecord[$i]['zip_code'];
	$img=$GetRecord[$i]['img'];
	$address=$GetRecord[$i]['user_address'];
	
	//$address = $building.','.$street.','.$landmark.','.$area;
	//$address = trim($address,',');
	
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
	
	if(empty($img)){
		$img="uploads/userprofile/noimage.jpg";
	}
}
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">User Details</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $msg;?></h4>
	                <h4 class="card-title">User Profile Details</h4>
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
								<label class="col-sm-4 control-label" ><b>Name</b></label>
							    <div class="col-sm-8">
									<label>  <?php echo $fname.' '.$lname;?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Email</b></label>
							    <div class="col-sm-8">
									<label><?php echo $email;?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Password</b></label>
							    <div class="col-sm-8">
									<label><?php echo $password;?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Contact Number</b></label>
							    <div class="col-sm-8">
									<label><?php echo $contact_no1; ?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Country</b></label>
							    <div class="col-sm-8">
									<label> <?php echo getCountry($country);?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>State</b></label>
							    <div class="col-sm-8">
									<label><?php echo $state;?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>City</b></label>
							    <div class="col-sm-8">
									<label> <?php echo $city; ?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Address</b></label>
							    <div class="col-sm-8">
									<label> <?php echo $address; ?></label>
								</div>
							</div>
							
							
							<!--<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Zipcode</b></label>
							    <div class="col-sm-8">
									<label> <?php echo $zip_code; ?></label>
								</div>
							</div>-->
							
						</div>
						<div class="col-sm-6">
							<h4>Profile Picture</h4>
							<div class="col-sm-12 ">
							<?php if($img!=""){?>
								<img src="<?php echo $siteurl; ?>/<? echo $img; ?>" class="img-responsive" style="max-width: 250px;">
							<?php } ?>
							</div>
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

<? include 'footer.php'; ?>