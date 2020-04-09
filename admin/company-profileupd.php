<? include 'header.php';
include 'leftmenu.php';
$upd = isset($upd)?$upd:'';
$msg = isset($msg)?$msg:'';
$id = isSet($id) ? $db->escapstr($id) : '' ;
$fname = isset($fname)?$fname:'';
$lname = isset($lname)?$lname:'';
$email = isset($email)?$email:'';
$password = isset($password)?$password:'';
$title = isset($title)?$title:'';
$exp_division = isset($exp_division)?$exp_division:'';
$practice_yr_since = isset($practice_yr_since)?$practice_yr_since:'';
$license_id = isset($license_id)?$license_id:'';
$lic_proof_img = isset($lic_proof_img)?$lic_proof_img:'';
$lic_proof_img2 = isset($lic_proof_img2)?$lic_proof_img2:'';
$license_issue_date = isset($license_issue_date)?$license_issue_date:'';
$practice_court = isset($practice_court)?$practice_court:'';
$counselling_fee = isset($counselling_fee)?$counselling_fee:'';
$language = isset($language)?$language:'';
$contact_no1 = isset($contact_no1)?$contact_no1:'';
$contact_no2 = isset($contact_no2)?$contact_no2:'';
$building = isset($building)?$building:'';
$street = isset($street)?$street:'';
$landmark = isset($landmark)?$landmark:'';
$area = isset($area)?$area:'';
$building1 = isset($building1)?$building1:'';
$street1 = isset($street1)?$street1:'';
$landmark1 = isset($landmark1)?$landmark1:'';
$area1 = isset($area1)?$area1:'';
$country = isset($country)?$country:'';
$state = isset($state)?$state:'';
$city = isset($city)?$city:'';
//$zip_code = isset($zip_code)?$zip_code:'';
$website = isset($website)?$website:'';
$about_self = isset($about_self)?$about_self:'';
$img = isset($img)?$img:'';
$mon_op=isSet($mon_op)?$mon_op:'';
$mon_cl=isSet($mon_cl)?$mon_cl:'';
$tues_op=isSet($tues_op)?$tues_op:'';
$tues_cl=isSet($tues_cl)?$tues_cl:'';
$wed_op=isSet($wed_op)?$wed_op:'';
$wed_cl=isSet($wed_cl)?$wed_cl:'';
$thurs_op=isSet($thurs_op)?$thurs_op:'';
$thurs_cl=isSet($thurs_cl)?$thurs_cl:'';
$fri_op=isSet($fri_op)?$fri_op:'';
$fri_cl=isSet($fri_cl)?$fri_cl:'';
$sat_op=isSet($sat_op)?$sat_op:'';
$sat_cl=isSet($sat_cl)?$sat_cl:'';
$sun_op=isSet($sun_op)?$sun_op:'';
$sun_cl=isSet($sun_cl)?$sun_cl:'';
$mon=isSet($mon)?$mon:'';
$tues=isSet($tues)?$tues:'';
$wed=isSet($wed)?$wed:'';
$thurs=isSet($thurs)?$thurs:'';
$fri=isSet($fri)?$fri:'';
$sat=isSet($sat)?$sat:'';
$sun=isSet($sun)?$sun:'';
$prf_exp=isSet($prf_exp)?$prf_exp:'';
$prf_expp=isSet($prf_expp)?$prf_expp:'';
$prf_exp1=isset($prf_exp1)?$prf_exp1:'';
$prf_expp1=isset($prf_expp1)?$prf_expp1:'';
$prof_cat=isset($prof_cat)?$prof_cat:'';
$prof_sub=isSet($prof_sub)?$prof_sub:'';
$prf_amt=isSet($prf_amt)?$prf_amt:'';
$exploc=isset($exploc)?$exploc:'';
$prf_address=isSet($prf_address)?$prf_address:'';

if(isset($_submit)){
	$date=date("Y-m-d");
	$ip=$_SERVER['REMOTE_ADDR'];
	$firstname=$db->escapstr($fname);
	$lastname=$db->escapstr($lname);
	$email=$db->escapstr($email);
	$password=$db->escapstr($password);
	$counselling_fee = $db->escapstr($counselling_fee);
	$language=$db->escapstr($language);
	$phone1=$db->escapstr($phone1);
	$country=$db->escapstr($country);	
	$state=$db->escapstr($state);
	$citys=$db->escapstr($city);
	$website=$db->escapstr($website);
	$about_self = strip_tags($about_self);
	$prf_exp = $db->escapstr($prf_exp);
	$prf_expp = $db->escapstr($prf_expp);
	$prf_exp1 = $db->escapstr($prf_exp1);
	$prf_expp1 = $db->escapstr($prf_expp1);
	$prof_cat = $db->escapstr($prof_cat);
	$prof_sub = $db->escapstr($prof_sub);
	$prf_amt = $db->escapstr($prf_amt);
	$exploc = $db->escapstr($exploc);
	$prf_address = $db->escapstr($prf_address);
	$key_specify=$_POST['key_specify'];
	$jsonspecify=json_encode((object)$key_specify);
	$key_qualify=$_POST['key_qualify'];
	$jsonqualify=json_encode((object)$key_qualify);
	
	$set ="fname='$firstname'";
	$set .=",lname='$lastname'";
	$set .= ",password='$password'";
	$set .=",contact_no1='$phone1'";
	$set .=",country='$country'";
	$set .=",about_self='$about_self'";
	$set .= ",user_role = '1'";
	$set .=",exp1='$prf_exp'";
	$set .=",exp2='$prf_exp1'";
	$set .=",exp_dur1='$prf_expp'";
	$set .=",exp_dur2='$prf_expp1'";
	$set .=",exp_location='$exploc'";
	$set .=",fee_duration='$prf_amt'";
	$set .=",estimate_fee='$counselling_fee'";
	$set .=",cat_id='$prof_cat'";
	$set .=",sub_catid='$prof_sub'";
	$set .=",user_address='$prf_address'";
	$set .=",specification1='$jsonspecify'";
	$set .=",qualification1='$jsonqualify'";

	$livepage = $_SERVER['REQUEST_URI'];
	$cur_url = basename($livepage);
	
	if(isset($_FILES["img"]["tmp_name"]) && !empty($_FILES["img"]["tmp_name"]))
	{
			$name2 = rand(11111,99999).uniqid();
			$err='0';
			$path='../uploads/profprofile';
			$img_upl=$com_obj->upload_image("img",$name2,"400","600","$path","");
			if($img_upl) {
				$main_img=$com_obj->img_Name;
				$set .= ",img = 'uploads/profprofile/$main_img'";
			}
			else {
				$err= $com_obj->img_Err;
				
				echo "<script>location.href='$cur_url&err=$err'</script>";
				header("location:$cur_url&err=$err");exit;
			}	
	}
	
	if($upd==1) {
	
	if (isset($_FILES["lic_proof_img"]["tmp_name"]) && !empty($_FILES["lic_proof_img"]["tmp_name"])) {
			$name2 = rand(11111,99999).uniqid();
			$err='0';
			$path='../uploads/profdoc';
			$img_upl=$com_obj->upload_id_proof("lic_proof_img",$name2,"$path","");
			if($img_upl) {
				$main_img=$com_obj->img_Name;
				$set .= ",doc_img1 = '$main_img'";
			}
			else {
				$err= $com_obj->img_Err;
				
				echo "<script>location.href='$cur_url&err=$err'</script>";
				header("location:$cur_url&err=$err");exit;
			}
	}
	if (isset($_FILES["lic_proof_img2"]["tmp_name"]) && !empty($_FILES["lic_proof_img2"]["tmp_name"])) {
			$name2 = rand(11111,99999).uniqid();
			$err='0';
			$path='../uploads/profdoc';
			$img_upl=$com_obj->upload_id_proof("lic_proof_img2",$name2,"$path","");
			if($img_upl) {
				$main_img=$com_obj->img_Name;
				$set .= ",doc_img2 = '$main_img'";
			}
			else {
				$err= $com_obj->img_Err;
				
				echo "<script>location.href='$cur_url&err=$err'</script>";
				header("location:$cur_url&err=$err");exit;
			}
	}
	
		$set .=",email='$email'";
		$set .=",state='$state'";
		$set .=",city='$city'";
		$set .=",crcdt='$date'";
		$set .=",reg_ip='$ip'";
		$set .= ",active_status = '1'";
//echo "insert into register set $set";exit;
		$db->insertrec("insert into register set $set");
		
		echo "<script>location.href='company-profile.php?act=add'</script>";
		header("location:company-profile.php?act=add");
	} 
	else if($upd==2) {
		if($state!='')
			$set .=",state='$state'";
		if($city!='')
			$set .=",city='$city'";
		
		$set .=",chngdt='$date'";
		$set .=",edit_ip='$ip'";
			//echo "update register set $set where id='$id'";exit;
		$db->insertrec("update register set $set where id='$id'");
		
		echo "<script>location.href='company-profile.php?act=upd'</script>";
		header("location:company-profile.php?act=upd");
	}
	
}

if(isset($err)) {
	//$err = $db->escapstr($id);
	$msg = "<font color='red'><b>$err</b></font>" ;
}
$GetRecord = $db->singlerec("select * from register where id='$id'");
@extract($GetRecord);

$editInfo=$db->singlerec("select * from register where id='$id'");
$prof_cat=$editInfo['cat_id'];
$prof_sub=$editInfo['sub_catid'];
$prf_img=$editInfo['img'];
if(empty($prf_img)){
	$prf_img="uploads/profprofile/noimage.jpg";
}
 ?>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0"><?=$keyword;?></h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title"><? if($upd==1) { echo "Add"; } else { echo "Edit"; } ?> New <?=$keyword;?></h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block card-dashboard table-responsive">
	                <form name="lyrfrm" id="User" class="form-horizontal" action="" method="post"  enctype="multipart/form-data">
                         <input type="hidden" name="upd" value="<? echo $upd; ?>" />
						 <input type="hidden" name="service_ct" id="ser_count" />
					<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> User First Name <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="fname" class="form-control" value="<? echo $fname; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> User Last Name <span class="req">*</span> </label>
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
										<input type="text" name="password" minlength="8" class="form-control" value="<? echo $password; ?>" />
									</div>
								</div>
								
								<!--<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> <?=$keyword;?> Title <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="title" class="form-control" value="<? echo $title; ?>" />
									</div>
								</div>
							
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Practicing Since <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="practice_yr_since" class="form-control" placeholder="Year You Started Practicing"  onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" maxlength="4" value="<? echo $practice_yr_since; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Practicing In <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="practice_in" class="form-control" value="<? echo $practice_court; ?>" />
									</div>
								</div>-->
								
							<? if($upd==1) { ?>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> ID Proof <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="file" name="lic_proof_img" id="idProof" class="form-control" />
										<br /><p style="font-size:14px;"> Only jpg, jpeg, png, gif, pdf, bmp file with maximum size of 1 MB is allowed. </p>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> ID Proof 2</span> </label>
									<div class="col-sm-9">
										<input type="file" name="lic_proof_img2" id="idProof2" class="form-control" onChange="return valid_imgid()" />
										<br /><p style="font-size:14px;"> Only jpg, jpeg, png, gif, pdf, bmp file with maximum size of 1 MB is allowed. </p>
									</div>
								</div>
							
								
								<? } ?>
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Professional Experience <span class="req">*</span> </label>
									<div class="col-sm-9">
										
								<div class="row">
									<div class="col-sm-6">
										<div class="row">
											<div class="col-sm-6">
												<input type="text" name="prf_exp" id="prf_exp" class="form-control" value="<?php echo !empty($editInfo['exp1'])?$editInfo['exp1']:''; ?>" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" />
											</div>
											<div class="col-sm-6">
												<select class="form-control" name="prf_expp" id="prf_expp">
													<option>Years</option>
													<option <?php if($editInfo['exp_dur1']=="days") echo "selected" ?> value="days">Days</option>
													<option <?php if($editInfo['exp_dur1']=="months") echo "selected" ?> value="months">Months</option>
													<option <?php if($editInfo['exp_dur1']=="years") echo "selected" ?> value="years">Years</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="row">
											<div class="col-sm-6">
												<input type="text" name="prf_exp1" id="prf_exp1" class="form-control" value="<?php echo !empty($editInfo['exp2'])?$editInfo['exp2']:''; ?>" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" />
											</div>
											<div class="col-sm-6">
												<select class="form-control" name="prf_expp1" id="prf_expp1">
													<option>Months</option>
													<option <?php if($editInfo['exp_dur2']=="days") echo "selected" ?> value="days">Days</option>
													<option <?php if($editInfo['exp_dur2']=="months") echo "selected" ?> value="months">Months</option>
													<option <?php if($editInfo['exp_dur2']=="years") echo "selected" ?> value="years">Years</option>
												</select>
											</div>
										</div>
									</div>
								</div>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label">Select Category <span class="req">*</span> </label>
									<div class="col-sm-9">
										<select class="form-control" name="prof_cat" onchange="return get_subcat(this.value);" id="prof_cat">
									<option value="">Select Category</option>
									<?=$drop->get_dropdown($db,"select id,category_name from category where active_status='1' and parent_id='0' order by category_name asc",$prof_cat);?> 
								</select>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label">Select Sub Category <span class="req">*</span> </label>
									<div class="col-sm-9">
										<select class="form-control" name="prof_sub" id="prof_sub">
									<option value="">Select your service</option>
									<?=$drop->get_dropdown($db,"select id,category_name from category where active_status='1' and parent_id!='0' order by category_name asc",$prof_sub);?>  
								</select>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-4 control-label"> Estimate Amount <span class="req">*</span> </label>
								   <div class="col-sm-4">  
							<input type="text" name="counselling_fee" class="form-control" value="<?php echo !empty($editInfo['estimate_fee'])?$editInfo['estimate_fee']:''; ?>" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" />
							</div>
							<div class="col-sm-4">
										<select class="form-control" name="prf_amt" id="prf_amt">
											<option>Select Duration</option>
											<option <?php if($editInfo['fee_duration']=="Per Hour") echo "selected" ?> value="Per Hour">Per Hour</option>
											<option <?php if($editInfo['fee_duration']=="Per Days") echo "selected" ?> value="Per Days">Per Days</option>
											<option <?php if($editInfo['fee_duration']=="Per Months") echo "selected" ?> value="Per Months">Per Months</option>
											<option <?php if($editInfo['fee_duration']=="Per Years") echo "selected" ?> value="Per Years">Per Years</option>
										</select>
									</div>
								</div>
								
								
							
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Country </label>
									<div class="col-sm-9">
										<select class="form-control" name="country" id="country" onchange="return get_state(this.value);">
										<?=$drop->get_dropdown($db,"select country_id,country_name from country where country_status='1' order by country_name asc",$country);?> 
										</select>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> State </label>
									<div class="col-sm-9">
										<select class="form-control" name="state" id="state1" onchange="return get_city(this.value);"><option value=''> Select State </option>
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
									<label class="col-sm-3 control-label"> Contact Number<span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="phone1" class="form-control" value="<? echo $contact_no1; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" />
									</div>
								</div>
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label">Location <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="exploc" class="form-control" value="<? echo $editInfo['exp_location']; ?>" />
									</div>
								</div>
								<!--<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Contact Number 2 </label>
									<div class="col-sm-9">
										<input type="text" name="phone2" class="form-control" value="<? echo $contact_no2; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" />
									</div>
								</div>-->
								
								<!--<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Address <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="building" class="form-control" placeholder="Building" value="<? echo $building; ?>" /> <br />
										<input type="text" name="street" class="form-control" placeholder="Street" value="<? echo $street; ?>" /><br />
										<input type="text" name="landmark" class="form-control" placeholder="Landmark" value="<? echo $landmark; ?>" /><br />
										<input type="text" name="area" class="form-control" placeholder="Area" value="<? echo $area; ?>" />
									</div>
								</div>-->
								
								<div class="form-group  col-sm-12">
									<label class="col-sm-3 control-label">Address <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="prf_address" class="form-control" placeholder="Area" value="<? echo $editInfo['user_address']; ?>" />
									</div>
								</div>
								
								<!--<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Zip Code <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="zipcode" class="form-control" value="<? //echo $editInfo['zip_code']; ?>" />
									</div>
								</div>-->
								
								<!--<div class="form-group  col-sm-12">
									<label class="col-sm-3 control-label"> Website  </label>
									<div class="col-sm-9">
										<input type="text" name="website" class="form-control" placeholder="http://www.example.com" value="<? echo $website; ?>" />
									</div>
								</div>-->
								
								<div class="form-group  col-sm-12">
									<label class="col-sm-3 control-label"> About <?=$keyword;?> <span class="req">*</span> </label>
									<div class="col-sm-9">
										<textarea rows="6" name="about_self" id="aboutSelf" class="form-control tiny"> <? echo $about_self; ?> 
										</textarea>
									</div>
								</div>
								 <input type='hidden' autocomplete='off' class='form-control'  name='key_specify[]' value=''>
							  <input type='hidden' autocomplete='off' class='form-control'  name='key_qualify[]' value=''>
							  
							  
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Main Image </label>
									<div class="col-sm-6">
										<input type="file" name="img" id="img_id" class="form-control" accept="image/*" onchange="img_validate('img_id',400,600)" />
										<br /><p style="font-size:14px;"> Only jpg, jpeg, png, gif file with dimension above 400x600 & maximum size of 1 MB is allowed. </p>
									</div>
								<? if($upd==2) { ?>
									<div class="col-sm-3">
									<img src="<?php echo $siteurl ?>/<?=$prf_img; ?>" width="50" height="50" />
									</div>
								<? } ?>
							<div class="form-actions center col-sm-12">
								<a href="company-profile.php" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Cancel
								</a>
								<button type="submit" name="_submit" onclick="return profilevalid()" class="btn btn-primary">
									<i class="fa fa-check-square-o"></i> Save 
								</button>
							</div>
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
    <!-- ////////////////////////////////////////////////////////////////////////////-->
<script>
function get_subcat(id){
	if(id!=""){
		$.ajax({
			type: "post",
			url : "./subcatajax.php?val="+id,
			success:function(response){
				$("#prof_sub").html(response);
			}
		});
	}
}
</script>
<script>
function profilevalid() {
	//tinymce.triggerSave();
	var fname = document.lyrfrm.fname.value;
	if(fname==""){
		alert('User First Name fields are mandatory');
		document.lyrfrm.fname.focus();
		return false;
	}
	var lname = document.lyrfrm.lname.value;
	if(lname == ""){
		alert('User Last Name fields are mandatory');
		document.lyrfrm.lname.focus();
		return false;
	}
	var email = document.lyrfrm.email.value;
	if(email==""){
		alert('Email ID fields are mandatory');
		document.lyrfrm.email.focus();
		return false;
	}else if(email!=""){
		var re=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{1,4})$/
		 if(!re.test(email)){
		  alert('Incorrect Email Id');
		  document.lyrfrm.email.focus();
		  return false; 
		 }
		
	}
	var password = document.lyrfrm.password.value;
	if(password==""){
		alert('Password fields are mandatory');
		document.lyrfrm.password.focus();
		return false;
	}else if(password.length < 8 || (password.length > 15)){
		alert('Password length between 8 to 15 characters');
		document.lyrfrm.password.focus();
		return false;
	}
	var image = document.lyrfrm.lic_proof_img.value;
	var img = document.lyrfrm.lic_proof_img;
	var checkimg = image.toLowerCase();
	if(image == "") {
		alert("Upload your Bar Council ID Photo");
		document.lyrfrm.lic_proof_img.focus();
		return false;
	}
	if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG|\.gif|\.GIF|\.pdf|\.PDF)$/) && image!="") { 
		// validation of file extension using regular expression before file upload
		alert('Invalid Image Format');
		document.lyrfrm.lic_proof_img.focus();
		return false;
	}
	
	if(image!="" && (img.files[0].size > 1048576)) {
		alert("Image size should not exceed 1 MB");
		document.lyrfrm.lic_proof_img.focus();
		return false;
	}
	var proof2=document.lyrfrm.lic_proof_img2.value;
	var img1 = document.lyrfrm.lic_proof_img2;
	if(proof2!="" && !checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG|\.gif|\.GIF|\.pdf|\.PDF)$/)){
	  alert('Invalid Image Format');
		document.lyrfrm.lic_proof_img2.focus();
		return false;	
	}
	if(proof2!="" && (img1.files[0].size > 1048576)) {
		alert("Image size should not exceed 1 MB");
		document.lyrfrm.lic_proof_img.focus();
		return false;
	}
	
	var prfexp = document.lyrfrm.prf_exp.value;
	if(prfexp==""){
		alert("Experience fields are mandatory");
		document.lyrfrm.prf_exp.focus();
		return false;
	}
	var prfexp1= document.lyrfrm.prf_exp1.value;
	if(prfexp1==""){
		alert("Experience fields are mandatory");
		document.lyrfrm.prf_exp1.focus();
		return false;
	}
	var profcat=document.lyrfrm.prof_cat.value;
	if(profcat==""){
		alert("Category fields are mandatory");
		document.lyrfrm.prof_cat.focus();
		return false;
	}
	var profsub=document.lyrfrm.prof_sub.value;
	if(profsub==""){
		alert("Subcategory fields are mandatory");
		document.lyrfrm.prof_sub.focus();
		return false;
	}
	var counsellingfee=document.lyrfrm.counselling_fee.value;
	if(counsellingfee==""){
		alert("Estimate Amount fields are mandatory");
		document.lyrfrm.counselling_fee.focus();
		return false;
	}
	var phone=document.lyrfrm.phone1.value;
	if(phone==""){
		alert("Contact Number fields are mandatory");
		document.lyrfrm.phone1.focus();
		return false;
	}else if(phone!="" && ((phone.length < 10) || (phone.length > 15))) {
		alert('Phone Number is not valid!'); 
		document.lyrfrm.phone1.focus();
		return false;
	}
	var exploc=document.lyrfrm.exploc.value;
	if(exploc==""){
		alert("Location fields are mandatory");
		document.lyrfrm.exploc.focus();
		return false;
	}
	var prfaddress=document.lyrfrm.prf_address.value;
	if(prfaddress==""){
		alert("Address fields are mandatory");
		document.lyrfrm.prf_address.focus();
		return false;
	}
	var about_self=document.lyrfrm.about_self.value;
	if(about_self==""){
		alert("About Professional are mandatory");
		document.lyrfrm.about_self.focus();
		return false;
	}
}

function checkmail() {
var emailx = document.getElementById("emailid").value;
  $.ajax({
	     type: 'POST',
	     url: "checkpromail.php",
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
						//$image = $("#"+showDiv+"");
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
/* $('#User').submit(function(e){
    var col = $('#exp_div').val();
    if (col==null){
        swal('Oops!', 'Choose Division You Experienced In!', 'error'); 
        return false;
    }else{
        return true;
    }
}); */
</script>
<script>
function get_state(val){
		//alert(val);
		 $.ajax({
			 url: "../state_ajax.php?val="+val, 
			success: function(result){
			$("#state1").html(result);
		}
		});
	}
function get_city(val){
	//alert(val);
	 $.ajax({url: "../city_ajax.php?val="+val, success: function(result){
        $("#city1").html(result);
    }});
}
</script>
<script type="text/JavaScript">
  /*   function validateHhMm(idvalue) {
		var id = document.getElementById(idvalue).value;
		
        var isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/;

        if(id!="" &&  !isValid.test(id)) {
			swal('Oops!', 'Time format is not valid!', 'error'); 
			document.getElementById(idvalue).value="";
			return false;
		} 
    } */
</script>


<? include 'footer.php'; ?>