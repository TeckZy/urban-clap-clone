<? include 'header.php';
include 'leftmenu.php';
$upd = isset($upd)?$upd:'';
$msg = isset($msg)?$msg:'';
$id = isSet($id) ? $db->escapstr($id) : '' ;
$fname = isset($fname)?$fname:'';
$lname = isset($lname)?$lname:'';
$email = isset($email)?$email:'';
$password = isset($password)?$password:'';
$contact_no1 = isset($contact_no1)?$contact_no1:'';
$building = isset($building)?$building:'';
$street = isset($street)?$street:'';
$landmark = isset($landmark)?$landmark:'';
$area = isset($area)?$area:'';
$country = isset($country)?$country:'';
$state = isset($state)?$state:'';
$city = isset($city)?$city:'';
$zip_code = isset($zip_code)?$zip_code:'';
$img = isset($img)?$img:'';
$user_locality=isset($user_locality)?$user_locality:'';
$user_address=isset($user_address)?$user_address:'';

if(isset($_submit)) {
	$date=date("Y-m-d");
	$ip=$_SERVER['REMOTE_ADDR'];
	$firstname=$db->escapstr($fname);
	$lastname=$db->escapstr($lname);
	$email=$db->escapstr($email);
	$password=$db->escapstr($password);
	$phone=$db->escapstr($phone);
	$building=$db->escapstr($building);
	$street=$db->escapstr($street);
	$landmark=$db->escapstr($landmark);
	$area=$db->escapstr($area);
	$country=$db->escapstr($country);	
	$state=$db->escapstr($state);
	$citys=$db->escapstr($city);
	$location=$db->escapstr($loction);
	$address=$db->escapstr($address);

	$set ="fname='$firstname'";
	$set .=",lname='$lastname'";
	$set .= ",password='$password'";
	$set .=",contact_no1='$phone'";
	$set .=",building='$building'";
	$set .=",user_locality='$location'";
	$set .=",user_address='$address'";
	$set .=",street='$street'";
	$set .=",landmark='$landmark'";
	$set .=",area='$area'";
	$set .=",country='$country'";	
	
	
	$livepage = $_SERVER['REQUEST_URI'];
	$cur_url = basename($livepage);
	
	if(isset($_FILES["img"]["tmp_name"]) && !empty($_FILES["img"]["tmp_name"]))
	{
			$name2 = rand(11111,99999).uniqid();
			$err='0';
			$path='../uploads/userprofile';
			$img_upl=$com_obj->upload_image("img",$name2,"330","220","$path","");
			if($img_upl) {
				$main_img=$com_obj->img_Name;
				$set .= ",img = '$path/$main_img'";
			}
			else {
				$err= $com_obj->img_Err;
				
				echo "<script>location.href='$cur_url&err=$err'</script>";
				header("location:$cur_url&err=$err");exit;
			}	
	}
	
	if($upd==1) {
		$set .=",email='$email'";
		$set .=",state='$state'";
		$set .=",city='$city'";
		$set .=",crcdt='$date'";
		$set .=",reg_ip='$ip'";
		$set .=",user_role='0'";
		$set  .= ",active_status = '1'";
		$set  .= ",email_active_status = '1'";

		$db->insertrec("insert into register set $set");
		
		echo "<script>location.href='user-profile.php?act=add'</script>";
		header("location:user-profile.php?act=add");
	} else if($upd==2) {
		if($state!='')
			$set .=",state='$state'";
		if($city!='')
			$set .=",city='$city'";
		
		$set .=",chngdt='$date'";
		$set .=",edit_ip='$ip'";
			//echo "update register set $set where id='$id'";exit;
		$db->insertrec("update register set $set where id='$id'");
		
		echo "<script>location.href='user-profile.php?act=upd'</script>";
		header("location:user-profile.php?act=upd");
	}
	
}

if(isset($err)) {

	$msg = "<font color='red'><b>$err</b></font>" ;
}
$GetRecord = $db->singlerec("select * from register where id='$id'");
@extract($GetRecord);
$prf_img=$GetRecord['img'];
if(empty($prf_img)){
	$prf_img="uploads/profprofile/noimage.jpg";
}
?>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Users</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title">Add New User</h4>
					<? echo $msg; ?>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block card-dashboard table-responsive">
	               
					<form name="usrfrm" class="form-horizontal" action="" method="post"  enctype="multipart/form-data">
                         
							<div class="panel-body">
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> First Name <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="fname" class="form-control" value="<? echo $fname; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Last Name <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="lname" class="form-control" value="<? echo $lname; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Email ID <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="email" name="email" id="emailid" class="form-control" onChange="return checkmail()" value="<? echo $email; ?>" <? if($upd==2) echo "readonly"; ?> />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Password <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="password" class="form-control" value="<? echo $password; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Country </label>
									<div class="col-sm-9">
										<select class="form-control" name="country" id="country" onchange="return get_state(this.value);">
										<option value=""> Select Country </option>
										<?=$drop->get_dropdown($db,"select country_id,country_name from country where country_status='1' order by country_name asc",$country);?> 
								</select>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> State </label>
									<div class="col-sm-9">
										<select class="form-control" name="state" onchange="return get_city(this.value);" id="state1">
										     <option value=''> Select State </option>
                                              <?=$drop->get_dropdown($db,"SELECT state_id,state_name FROM state WHERE state_country_id='$country' and state_status='1' order by state_name asc",$state);?>
										</select>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> City </label>
									<div class="col-sm-9">
										<select class="form-control" name="city" id="city1">
											<option value=''> Select City </option>
                                                <?=$drop->get_dropdown($db,"SELECT city_id,city_name from city WHERE city_state_id='$state' and city_status='1' and city_state_id!='0' order by city_name asc",$city);?>
										</select>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Location <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="loction" id="loction" class="form-control" value="<? echo $user_locality; ?>" />
									</div>
								</div>
									<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Address <span class="req">*</span> </label>
									<div class="col-sm-9">
										<textarea type="text" name="address" class="form-control" /><?php echo $user_address; ?></textarea>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Contact Number<span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="phone" class="form-control" value="<? echo $contact_no1; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" />
									</div>
								</div>
								
								<!--<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Building  </label>
									<div class="col-sm-9">
										<input type="text" name="building" class="form-control" value="<? echo $building; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Street </label>
									<div class="col-sm-9">
										<input type="text" name="street" class="form-control" value="<? echo $street; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Landmark  </label>
									<div class="col-sm-9">
										<input type="text" name="landmark" class="form-control" value="<? echo $landmark; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Area  </label>
									<div class="col-sm-9">
										<input type="text" name="area" class="form-control" value="<? echo $area; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Zip Code <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="zipcode" class="form-control" value="<? echo $zip_code; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" />
									</div>
								</div>-->
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Profile Picture </label>
									<div class="col-sm-9">
										<input type="file" name="img" id="img_id" class="form-control" accept="image/*" onchange="img_validate('img_id',330,220)" />
									</div>
								<? if($upd==2) { ?>
									<div class="col-sm-9">
									<img src="<?php echo $siteurl ?>/<?=$prf_img; ?>" width="50" height="50" />
									</div>
								<? } ?>
								</div>
							<!--<p style="font-size:14px;"> **Only jpg, jpeg, png, gif file with dimension above 330X220 & maximum size of 1 MB is allowed. </p>-->
				
					  
					        <div class="form-actions center col-sm-12">
								<a href="user-profile.php" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Cancel
								</a>
								<button type="submit" name="_submit" onclick="return frm_valid()" class="btn btn-primary">
									<i class="fa fa-check-square-o"></i> Save 
								</button>
							</div>
					</form>
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
<script>
function frm_valid() {
	var fname = document.usrfrm.fname.value;
	if(fname=="") {
		alert('First Name fields are mandatory!'); 
		document.usrfrm.fname.focus();
		return false;
	}
	var lname = document.usrfrm.lname.value;
	if(lname=="") {
		alert('Last Name fields are mandatory!'); 
		document.usrfrm.lname.focus();
		return false;
	}
	var email = document.usrfrm.email.value;
	if(email==""){
		alert('Email ID fields are mandatory');
		document.usrfrm.email.focus();
		return false;
	}else if(email!=""){
		var re=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{1,4})$/
		 if(!re.test(email)){
		  alert('Incorrect Email Id');
		  document.usrfrm.email.focus();
		  return false; 
		 }
		
	}
	var password = document.usrfrm.password.value;
	if(password==""){
		alert('Password fields are mandatory');
		document.usrfrm.password.focus();
		return false;
	}else if(password.length < 8 || (password.length > 15)){
		alert('Password length between 8 to 15 characters');
		document.usrfrm.password.focus();
		return false;
	}
	
	var location=document.usrfrm.loction.value;
	if(location=="") {
		alert('Location fields are mandatory!'); 
		document.usrfrm.loction.focus();
		return false;
	}
	var address=document.usrfrm.address.value;
	if(address=="") {
		alert('Address fields are mandatory!'); 
		document.usrfrm.address.focus();
		return false;
	}
	var phone = document.usrfrm.phone.value;
	if(phone==""){
		alert("Contact Number fields are mandatory");
		document.usrfrm.phone.focus();
		return false;
	}else if(phone!="" && ((phone.length < 10) || (phone.length > 15))) {
		alert('Phone Number is not valid!'); 
		document.usrfrm.phone.focus();
		return false;
	}
}

function checkmail() {
var emailx = document.getElementById("emailid").value;
  $.ajax({
	     type: 'POST',
	     url: "checkusrmail.php",
        data: {
		"emailx":emailx,
		},
  success: function(data){
		 if(data==1)
		{
			alert('Email Id already Exists!');
			document.getElementById("emailid").value="";
			document.getElementById("emailid").focus(); 		
			return false;
		} if(data==0){
			return true;
		} 		
    }});
}

function img_validate(id,width,height){
	var fuData = document.getElementById(id);
	var FileUploadPath = fuData.value;
	var action = 'update';
	if(window.FileReader) {   
		if (FileUploadPath != '') {				
			var size = fuData.files[0].size;
			if (size > 1048576) {				
				swal('File size exceeded!!', 'Maximum allowed size is 1 MB', 'error');
				fuData.value="";
				fuData.focus();
				return false;
			} else {			
				var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
				
				if (Extension == "gif" || Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
					if (fuData.files && fuData.files[0]) {
						var reader = new FileReader();
						
						reader.onload = function(e) {
							var w, h;
							
							var image = new Image();
							image.src = e.target.result;
							image.onload = function() {
								w = this.width;
								h = this.height;
								localStorage.setItem("width", w);
								localStorage.setItem("height", h);
								if (w < width || h < height) {
									
									swal("Too short!","Your image size (" + w + 'x' + h + "). size should grater than ("+width+"x"+height+").","error");
									fuData.value="";
									fuData.focus();
									return false;
									
								} else {
								
									$image.attr("src", e.target.result).show();
								}
							}
						}
						reader.readAsDataURL(fuData.files[0]);
					}
				} else {
					swal("Invalid file format!","Profile picture only allows file types of GIF, PNG, JPG and JPEG. ","error");
					fuData.value="";
					fuData.focus();
					return false;
				}
			}
		}
	} else {
	
	swal("Incompatible browser","Your browser does not support Advance javascript functions so kindly update your browser to latest version..","warning");
	return true;
	}
}
</script>
<script>
function get_state(val){
		 $.ajax({
			 url: "../state_ajax.php?val="+val, 
			success: function(result){
			$("#state1").html(result);
		}
		});
	}
function get_city(val){
	 $.ajax({url: "../city_ajax.php?val="+val, success: function(result){
        $("#city1").html(result);
    }});
}
</script>

       <script src="asstes/plugins/parsley/parsley.min.js"></script>
        <!--Javascript parsely plugin-->

       <script src="assets/plugins/customjs.js"></script>
        <!--Javascript Myjs-->
<? include 'footer.php'; ?>