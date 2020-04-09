<?php 
include "includes/title.php";
if(!(isset($_SESSION['id'])) || !(isset($_SESSION['email'])) || !(isset($_SESSION['fname'])))
{
header("location:login");

echo "<script>window.location='login'</script>";

}
$_id=$_SESSION['id'];
$uInfo=$db->singlerec("select * from register where  id='$_id'");
$_fname=ucfirst($uInfo['fname']);
$_lname=ucfirst($uInfo['lname']);
$_email=$uInfo['email'];
$_phone=$uInfo['contact_no1'];
$_country=$uInfo['country'];
$_state=$uInfo['state'];
$_city=$uInfo['city'];
$_phone=$uInfo['contact_no1'];
$_locality=$uInfo['user_locality'];
$_address=$uInfo['user_address'];
$u_img=$uInfo['img'];
if(empty($u_img)){
	$u_img="uploads/userprofile/noimage.jpg";
}

if(isset($d_save)){
	$d_lastname=$db->escapstr($d_lastname);
	$d_phone=$db->escapstr($d_phone);
	$country=$db->escapstr($country);
	$state=$db->escapstr($state);
	$city=$db->escapstr($city);
	$locality=$db->escapstr($d_locality);
	$address=$db->escapstr($d_address);
	
	$set="lname='$d_lastname'";
	$set.=",contact_no1='$d_phone'";
	$set.=",country='$country'";
	$set.=",state='$state'";
	$set.=",city='$city'";
	$set.=",user_locality='$locality'";
	$set.=",user_address='$address'";
	$db->insertrec("update register set $set where id='$_id'");
	header("location:user-profile?succ");
	echo "<script>location.href='user-profile?succ'</script>";
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
                     <div class="col-sm-12 profile_box">
					   <div class="row mt20 mb20">
            <div class="col-md-8 wow zoomIn" data-wow-delay="0.2s">
                <div class="col-sm-12 profile_box">
<?php if(isset($edit)) { ?> 
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok Orange"></i>
		<strong class="Orange">
			Please update your profile details!!!
		</strong>

	</div>
<?php } ?>
                    <form class="form-horizontal user_frm mt30" method="post" id="d_upd" name="d_upd" enctype="multipart-form/data" action="<?php $_SERVER['PHP_SELF']; ?>">
					    <div class="form-group mt15">
						    <label class="col-sm-4">First Name</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <input type="text" name="d_firstname" id="d_firstname" class="form-control" readonly value="<?php echo !empty($_fname)?$_fname:''; ?>"/>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group mt15">
						    <label class="col-sm-4">Last Name</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
								<input type="text" name="d_lastname" id="d_lastname" class="form-control" value="<?php echo !empty($_lname)?$_lname:''; ?>"/>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group mt15">
						    <label class="col-sm-4">Email ID</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
								<input type="email" name="d_email" id="d_email" readonly class="form-control" value="<?php echo !empty($_email)?$_email:''; ?>"/>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group mt15">
						    <label class="col-sm-4">Phone Number</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
								<input type="text" name="d_phone" id="d_phone" class="form-control" value="<?php echo !empty($_phone)?$_phone:''; ?>"/>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group mt15">
						    <label class="col-sm-4">Country</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <select class="form-control" name="country" id="country" onchange="return get_state(this.value);">
								    <option>Select Country</option>
								    <?=$drop->get_dropdown($db,"select country_id,country_name from country where country_status='1' order by country_name asc",$_country);?> 
								</select>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group mt15">
						    <label class="col-sm-4">State</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <select class="form-control" name="state" onchange="return get_city(this.value);" id="states">
								    <option>Select State</option>
								    <?=$drop->get_dropdown($db,"SELECT state_id,state_name FROM state WHERE state_country_id='$_country' and state_status='1' order by state_name asc",$_state);?>
								</select>
							</div>
						</div>
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-4">City</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <select class="form-control" name="city" id="city1">
								    <option>Select City</option>
								    <?=$drop->get_dropdown($db,"SELECT city_id,city_name from city WHERE city_state_id='$_state' and city_status='1' and city_state_id!='0' order by city_name asc",$_city);?>
								</select>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group mt15">
						    <label class="col-sm-4">Locality</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
								<input type="text" name="d_locality" id="d_locality" class="form-control" value="<?php echo !empty($_locality)?$_locality:''; ?>"/>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group mt15">
						    <label class="col-sm-4">Address</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <textarea rows="6" name="d_address" id="d_address" value="<?php echo !empty($_address)?$_address:''; ?>" class="form-control"><?php echo !empty($_address)?$_address:''; ?></textarea>
							</div>
						</div>
						
						<div class="clearfix"></div>
						<div class="form-group mt15 text-center">
						   <button class="btn btn-success" name="d_save">Save</button>
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
	
	
<!--*********************** Footer ****************************-->

	<?php include "includes/footer.php"; ?>

<div id="toTop"></div><!-- Back to top button -->

 <!-- Common scripts -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>
<!--Validate JS-->
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
function get_state(val){
		 $.ajax({
			 url: "state_ajax.php?val="+val, 
			success: function(result){
			$("#states").html(result);
		}
		});
	}
function get_city(val){
	 $.ajax({url: "city_ajax.php?val="+val, success: function(result){
        $("#city1").html(result);
    }});
}
</script>	

<script>
$().ready(function(){
	$.validator.setDefaults({
		submitHandler:function(){
			form.submit();
		}
	});
	
	$("#d_upd").validate({
		rules: {
			d_lastname: "required",
			d_phone: "required",
			country: "required",
			state: "required",
			city1: "required",
			d_locality: "required",
			d_address: "required"
		},
		messages: {
			d_lastname: "Please enter your lastname",
			d_phone: "Please enter your phone number",
			country: "Please select your country",
			state: "Please select your state",
			city1: "Please select your city",
			d_locality: "Please enter your locality",
			d_address: "Please Enter your address"
		}
	});
});
</script>
  </body>
</html>