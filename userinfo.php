<?php
$_id=$_SESSION['id'];
$uInfo=$db->singlerec("select * from register where  id='$_id'");
$_fname=ucfirst($uInfo['fname']);
$_lname=ucfirst($uInfo['lname']);
$_email=$uInfo['email'];
$_phone=$uInfo['contact_no1'];
$_country=$uInfo['country'];
$_state=ucfirst($uInfo['state']);
$_city=ucfirst($uInfo['city']);
$_address=ucfirst($uInfo['user_address']);
$_locality=ucfirst($uInfo['user_locality']);
$country=getCountry($_country);
$state=getState($_state);
$city=getCity($_city);
$u_img=$uInfo['img'];
if(empty($u_img)){
	$u_img="uploads/userprofile/noimage.jpg";
}
?>
<section class="container-fluid margin_31 test3_bg">
       <div class="container mt30 mb30">
		  <div class="row">
			
			<?php include "leftmenu.php"; ?>
			
			<div class="col-lg-9 col-md-9">
                     <div class="col-sm-12 profile_box">
					   <div class="row mt20 mb20">
            <div class="col-md-8 wow zoomIn" data-wow-delay="0.2s">
                <div class="col-sm-12 profile_box">
                    <form class="user_frm form-horizontal mt30">
					    <div class="form-group">
						    <label class="col-sm-4">First Name</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <p class="dtl"><?php echo !empty($_fname)?$_fname:'---'; ?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-4">Last Name</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <p class="dtl"><?php echo !empty($_lname)?$_lname:'---'; ?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-4">Email ID</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <p class="dtl"><?php echo !empty($_email)?$_email:'---'; ?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-4">Phone Number</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <p class="dtl"><?php echo !empty($_phone)?$_phone:'---'; ?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-4">State</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <p class="dtl"><?php echo !empty($state)?$state:'---'; ?></p>
							</div>
						</div>
						
						
						<div class="form-group">
						    <label class="col-sm-4">City</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <p class="dtl"><?php echo !empty($city)?$city:'---'; ?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-4">Locality</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <p class="dtl"><?php echo !empty($_locality)?$_locality:'---'; ?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-4">Address</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <p class="dtl"><?php echo !empty($_address)?$_address:'---'; ?></p>
							</div>
						</div>
						
						
					</form>
                </div>
            </div>
            
			<?php include "profilepic.php"; ?>
        </div>
		
		
					 </div>
                  </div>
		  </div>
      </div>
    </section> 