<?php 
include "includes/title.php";
if(!(isset($_SESSION['pid'])) && !(isset($_SESSION['pemail'])) && !(isset($_SESSION['pfname'])))
{
header("location:login");
echo "<script>window.location='login'</script>";
}
$_id=$_SESSION['pid'];
$uInfo=$db->singlerec("select * from register where  id='$_id'");
$_fname=ucfirst($uInfo['fname']);
$_lname=ucfirst($uInfo['lname']);
$_uname=$com_obj->get_name($_id);
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
$fee=$uInfo['estimate_fee'];
$fee_duration=$uInfo['fee_duration'];
$amt="";
if(!empty($fee)){
	$amt.=$site_currency." ".$fee;
}
if(!empty($fee) && !empty($fee_duration)){
	$amt.=" / ".$fee_duration;
}else{
	$amt.="No Budget Found";
}

$exp1=$uInfo['exp1'];
$exp2=$uInfo['exp2'];
$exp1_dur=$uInfo['exp_dur1'];
$exp2_dur=$uInfo['exp_dur2'];
$exp_details="";
if(!empty($exp1)){
	$exp_details.=$exp1." ".$exp1_dur;
}
if(!empty($exp2)){
	$exp_details.=$exp2." ".$exp2_dur;
}
$cat_name=$com_obj->cat_name($uInfo['cat_id']);
$sub_cat=$com_obj->cat_name($uInfo['sub_catid']);
$no_img="noimage.jpg";
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
<?php if(isset($_REQUEST['succ'])) { ?> 
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok green"></i>
		<strong class="green">
			Your Profile Updated Successfully..!!!
		</strong>

	</div>
<?php } ?>
                     <div class="col-sm-12 profile_box">
					   <div class="row mt20 mb20">
            <div class="col-md-12 wow zoomIn" data-wow-delay="0.2s">
                <div class="col-sm-12 profile_box">
                    <form class="user_frm form-horizontal mt30">
					    
						
						<h3 class="clr_txt">Basic Details</h3>
						<div class="row">
						<div class="col-sm-9">
						
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
						</div>
						<div class="col-md-3 wow zoomIn" data-wow-delay="0.4s">
						<?php $verify=$com_obj->certifyverify($_id); if($verify==true):?>
							<h5 class="clr_txt">Profile Verification</h5>
						<div class="col-sm-12">
								<img src="img/verified.png" class="mb20">
						</div>
						<?php endif; ?>
						<div class="clearfix"></div>
							<div class="feature_home">
								<img src="<?php echo $siteurl ?>/<?=$u_img; ?>" class="img-circle mb20" width="150" height="150">
								<a href="prof-photo" class="btn_1 outline">Change Picture</a>
							</div>
						</div>
						</div>
						<h3 class="clr_txt">Introduction</h3>
						
						<div class="form-group">
						    <label class="col-sm-12">Introduction	</label>
							<div class="col-sm-12">
							    <p class="dtl"><?php echo !empty($uInfo['about_self'])?$uInfo['about_self']:'---'; ?></p>
							</div>
						</div>
						
						<h3 class="clr_txt">Experience Details</h3>
						
						<div class="form-group">
						    <label class="col-sm-4">Professional Category</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <p class="dtl"><?php echo !empty($cat_name)?$cat_name:''; ?></p>
							</div>
						</div>
						
						<?php if(!empty($sub_cat)){ ?>
						<div class="form-group">
						    <label class="col-sm-4">Sub-Category</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <p class="dtl"><?php echo $sub_cat; ?></p>
							</div>
						</div>
						<?php } ?>
						
						<div class="form-group">
						    <label class="col-sm-4">Professional Experience</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <p class="dtl"><?php echo !empty($exp_details)?$exp_details:'No Experience'; ?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-4">Location</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <p class="dtl"><?php echo !empty($uInfo['exp_location'])?$uInfo['exp_location']:'---'; ?></p>
							</div>
						</div>
						
						<!--<div class="form-group">
						    <label class="col-sm-4">Trial Class	</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <p class="dtl">Free</p>
							</div>
						</div>-->
						
						<div class="form-group">
						    <label class="col-sm-4">Estimation	</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <p class="dtl"><?php echo $amt; ?></p>
							</div>
						</div>
						
						<!--<h3 class="clr_txt">Gallery</h3>
						
						<div class="row">
							<div class="col-sm-3 mt5i">
								<img src="<?php echo $siteurl ?>/uploads/profgallery/<?php echo !empty($uInfo['gallery_img1'])?$uInfo['gallery_img1']:$no_img; ?>" alt="Image" class="img-responsive mt10" >
							</div>
							<div class="col-sm-3 mt5i">
								<img src="<?php echo $siteurl ?>/uploads/profgallery/<?php echo !empty($uInfo['gallery_img2'])?$uInfo['gallery_img2']:$no_img; ?>" alt="Image" class="img-responsive mt10" >
							</div>
							<div class="col-sm-3 mt5i">
								<img src="<?php echo $siteurl ?>/uploads/profgallery/<?php echo !empty($uInfo['gallery_img3'])?$uInfo['gallery_img3']:$no_img; ?>" alt="Image" class="img-responsive mt10" >
							</div>
							<div class="col-sm-3 mt5i">
								<img src="<?php echo $siteurl ?>/uploads/profgallery/<?php echo !empty($uInfo['gallery_img4'])?$uInfo['gallery_img4']:$no_img; ?>" alt="Image" class="img-responsive mt10" >
							</div>
						</div>-->
						
						<h3 class="clr_txt">Information Details</h3>
						
						<div class="row">
							<div class="form-group col-sm-6">
								<label class="col-sm-12">Specializations	</label>
								<div class="col-sm-12">
									<ul class="exp_list">
									<?php 
									$aru=$uInfo['specification1'];
									$spec1=json_decode($aru,true);
									$specify0=isset($spec1['0'])?$spec1['0']:'';
									$specify1=isset($spec1['1'])?$spec1['1']:'';
									$specify2=isset($spec1['2'])?$spec1['2']:'';
									$specify3=isset($spec1['3'])?$spec1['3']:'';
									$specify4=isset($spec1['4'])?$spec1['4']:'';
									$specify5=isset($spec1['5'])?$spec1['5']:'';
									$specify6=isset($spec1['6'])?$spec1['6']:'';
									$specify7=isset($spec1['7'])?$spec1['7']:'';
									$specify8=isset($spec1['8'])?$spec1['8']:'';
									$specify9=isset($spec1['9'])?$spec1['9']:'';
									$specify10=isset($spec1['10'])?$spec1['10']:'';
									?>
									<?php if(!empty($specify0)){ ?>
									<li><?php echo $specify0; ?></li>
									<?php } ?>
									<?php if(!empty($specify1)){ ?>
									<li><?php echo $specify1; ?></li>
									<?php } ?>
									<?php if(!empty($specify2)){ ?>
									<li><?php echo $specify2; ?></li>
									<?php } ?>
									<?php if(!empty($specify3)){ ?>
									<li><?php echo $specify3; ?></li>
									<?php } ?>
									<?php if(!empty($specify4)){ ?>
									<li><?php echo $specify4; ?></li>
									<?php } ?>
									<?php if(!empty($specify5)){ ?>
									<li><?php echo $specify5; ?></li>
									<?php } ?>
									<?php if(!empty($specify6)){ ?>
									<li><?php echo $specify6; ?></li>
									<?php } ?>
									<?php if(!empty($specify7)){ ?>
									<li><?php echo $specify7; ?></li>
									<?php } ?>
									<?php if(!empty($specify8)){ ?>
									<li><?php echo $specify8; ?></li>
									<?php } ?>
									<?php if(!empty($specify9)){ ?>
									<li><?php echo $specify9; ?></li>
									<?php } ?>
									<?php if(!empty($specify10)){ ?>
									<li><?php echo $specify10; ?></li>
									<?php } ?>
									</ul>
								</div>
							</div>
							
							<div class="form-group col-sm-6">
								<label class="col-sm-12">Qualifications	</label>
								<div class="col-sm-12">
									<ul class="exp_list">
									<?php
									$qual=$uInfo['qualification1'];
									$qualif1=json_decode($qual,true);
									$qualif0=isset($qualif1['0'])?$qualif1['0']:'';
									$qualif11=isset($qualif1['1'])?$qualif1['1']:'';
									$qualif2=isset($qualif1['2'])?$qualif1['2']:'';
									$qualif3=isset($qualif1['3'])?$qualif1['3']:'';
									$qualif4=isset($qualif1['4'])?$qualif1['4']:'';
									$qualif5=isset($qualif1['5'])?$qualif1['5']:'';
									$qualif6=isset($qualif1['6'])?$qualif1['6']:'';
									$qualif7=isset($qualif1['7'])?$qualif1['7']:'';
									$qualif8=isset($qualif1['8'])?$qualif1['8']:'';
									$qualif9=isset($qualif1['9'])?$qualif1['9']:'';
									$qualif10=isset($qualif1['10'])?$qualif1['10']:'';
									?>
									<?php if(!empty($qualif0)){ ?>
									<li><?php echo $qualif0; ?></li>
									<?php } ?>
									<?php if(!empty($qualif11)){ ?>
									<li><?php echo $qualif11; ?></li>
									<?php } ?>
									<?php if(!empty($qualif2)){ ?>
									<li><?php echo $qualif2; ?></li>
									<?php } ?>
									<?php if(!empty($qualif3)){ ?>
									<li><?php echo $qualif3; ?></li>
									<?php } ?>
									<?php if(!empty($qualif4)){ ?>
									<li><?php echo $qualif4; ?></li>
									<?php } ?>
									<?php if(!empty($qualif5)){ ?>
									<li><?php echo $qualif5; ?></li>
									<?php } ?>
									<?php if(!empty($qualif6)){ ?>
									<li><?php echo $qualif6; ?></li>
									<?php } ?>
									<?php if(!empty($qualif7)){ ?>
									<li><?php echo $qualif7; ?></li>
									<?php } ?>
									<?php if(!empty($qualif8)){ ?>
									<li><?php echo $qualif8; ?></li>
									<?php } ?>
									<?php if(!empty($qualif9)){ ?>
									<li><?php echo $qualif9; ?></li>
									<?php } ?>
									<?php if(!empty($qualif10)){ ?>
									<li><?php echo $qualif10; ?></li>
									<?php } ?>
									</ul>
								</div>
							</div>
						</div>
						
						
					</form>
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
					<a href="register.html"  class=" pull-left" >Register</a>
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
<script src="js/functions.js"></script>

  </body>
</html>