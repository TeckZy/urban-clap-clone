<?php 
include "includes/title.php";
if(!(isset($_SESSION['pid'])) && !(isset($_SESSION['pemail'])) && !(isset($_SESSION['pfname'])))
{
header("location:login");
echo "<script>window.location='login'</script>";
}


$prf_d1 = isset($prf_d1)?$prf_d1:'';
$uid=$_SESSION['pid'];

$prf_lastname=isset($prf_lastname)?$prf_lastname:'';
$prf_phone=isset($prf_phone)?$prf_phone:'';
$country=isset($country)?$country:'';
$state=isset($state)?$state:'';
$city=isset($city)?$city:'';
$prf_address=isset($prf_address)?$prf_address:'';
$prf_intro=isset($prf_intro)?$prf_intro:'';
$prf_docname1=isset($prf_docname1)?$prf_docname1:'';
$prf_docname2=isset($prf_docname2)?$prf_docname2:'';
$prf_cat=isset($prf_cat)?$prf_cat:'';
$prf_sub=isset($prf_sub)?$prf_sub:'';
$prf_explocation=isset($prf_explocation)?$prf_explocation:'';
$prf_spcl=isset($prf_spcl)?$prf_spcl:'';
$prf_spcl_2=isset($prf_spcl_2)?$prf_spcl_2:'';
$prf_spc_3=isset($prf_spc_3)?$prf_spc_3:'';
$prf_spc_4=isset($prf_spc_4)?$prf_spc_4:'';
$prf_spc_5=isset($prf_spc_5)?$prf_spc_5:'';
$prf_spc_6=isset($prf_spc_6)?$prf_spc_6:'';
$prf_spc_7=isset($prf_spc_7)?$prf_spc_7:'';
$prf_spc_8=isset($prf_spc_8)?$prf_spc_8:'';
$prf_spc_9=isset($prf_spc_9)?$prf_spc_9:'';
$prf_spc_10=isset($prf_spc_10)?$prf_spc_10:'';
$prf_qulalification=isset($prf_qulalification)?$prf_qulalification:'';
$prf_qulalification_2=isset($prf_qulalification_2)?$prf_qulalification_2:'';
$prf_qulalification_3=isset($prf_qulalification_3)?$prf_qulalification_3:'';
$prf_qulalification_4=isset($prf_qulalification_4)?$prf_qulalification_4:'';
$prf_qulalification_5=isset($prf_qulalification_5)?$prf_qulalification_5:'';
$prf_qulalification_6=isset($prf_qulalification_6)?$prf_qulalification_6:'';
$prf_qulalification_7=isset($prf_qulalification_7)?$prf_qulalification_7:'';
$prf_qulalification_8=isset($prf_qulalification_8)?$prf_qulalification_8:'';
$prf_qulalification_9=isset($prf_qulalification_9)?$prf_qulalification_9:'';
$prf_qulalification_10=isset($prf_qulalification_10)?$prf_qulalification_10:'';
$prf_exp=isset($prf_exp)?$prf_exp:'';
$prf_expp=isset($prf_expp)?$prf_expp:'';
$prf_exp1=isset($prf_exp1)?$prf_exp1:'';
$prf_expp1=isset($prf_expp1)?$prf_expp1:'';
$prf_fee=isset($prf_fee)?$prf_fee:'';
$prf_amt=isset($prf_amt)?$prf_amt:'';
$key_specify=isset($key_specify)?$key_specify:'';
$key_qualify=isset($key_qualify)?$key_qualify:'';
if(isset($prfedit_upd)){
	$prf_lastname=$db->escapstr($prf_lastname);
	$prf_phone=$db->escapstr($prf_phone);
	$country=$db->escapstr($country);
	$state=$db->escapstr($state);
	$city=$db->escapstr($city);
	$prf_locality=$db->escapstr($prf_locality);
	$prf_address=$db->escapstr($prf_address);
	$prf_intro=$db->escapstr($prf_intro);
	$prf_docname1=$db->escapstr($prf_docname1);
	$prf_docname2=$db->escapstr($prf_docname2);
	$prf_cat=$db->escapstr($prf_cat);
	$prf_sub=$db->escapstr($prf_sub);
	$prf_explocation=$db->escapstr($prf_explocation);
	$prf_spcl=$db->escapstr($prf_spcl);
	$prf_spcl_2=$db->escapstr($prf_spcl_2);
	$prf_spc_3=$db->escapstr($prf_spc_3);
	$prf_spc_4=$db->escapstr($prf_spc_4);
	$prf_spc_5=$db->escapstr($prf_spc_5);
	$prf_spc_6=$db->escapstr($prf_spc_6);
	$prf_spc_7=$db->escapstr($prf_spc_7);
	$prf_spc_8=$db->escapstr($prf_spc_8);
	$prf_spc_9=$db->escapstr($prf_spc_9);
	$prf_spc_10=$db->escapstr($prf_spc_10);
	$prf_qulalification=$db->escapstr($prf_qulalification);
	$prf_qulalification_2=$db->escapstr($prf_qulalification_2);
	$prf_qulalification_3=$db->escapstr($prf_qulalification_3);
	$prf_qulalification_4=$db->escapstr($prf_qulalification_4);
	$prf_qulalification_5=$db->escapstr($prf_qulalification_5);
	$prf_qulalification_6=$db->escapstr($prf_qulalification_6);
	$prf_qulalification_7=$db->escapstr($prf_qulalification_7);
	$prf_qulalification_8=$db->escapstr($prf_qulalification_8);
	$prf_qulalification_9=$db->escapstr($prf_qulalification_9);
	$prf_qulalification_10=$db->escapstr($prf_qulalification_10);
	$prf_exp=$db->escapstr($prf_exp);
	$prf_expp=$db->escapstr($prf_expp);
	$prf_exp1=$db->escapstr($prf_exp1);
	$prf_expp1=$db->escapstr($prf_expp1);
	$prf_fee=$db->escapstr($prf_fee);
	$prf_amt=$db->escapstr($prf_amt);
	$prf_d1=isset($_FILES['prf_d1']['tmp_name'])?$_FILES['prf_d1']['tmp_name']:'';
	$prf_d2=isset($_FILES['prf_d2']['tmp_name'])?$_FILES['prf_d2']['tmp_name']:'';
	/* $prf_g1=isset($_FILES['prf_g1']['tmp_name'])?$_FILES['prf_g1']['tmp_name']:'';
	$prf_g2=isset($_FILES['prf_g2']['tmp_name'])?$_FILES['prf_g2']['tmp_name']:'';
	$prf_g3=isset($_FILES['prf_g3']['tmp_name'])?$_FILES['prf_g3']['tmp_name']:'';
	$prf_g4=isset($_FILES['prf_g4']['tmp_name'])?$_FILES['prf_g4']['tmp_name']:''; */
	$edit_ip=$_SERVER['REMOTE_ADDR'];
	$chg_date=date("Y-m-d H:i:s");
	$prof_cat = $db->escapstr($prof_cat);
	$prof_sub = $db->escapstr($prof_sub);
	$key_specify=$_POST['key_specify'];
	$jsonspecify=json_encode((object)$key_specify);
	$key_qualify=$_POST['key_qualify'];
	$jsonqualify=json_encode((object)$key_qualify);
	
	$set ="lname='$prf_lastname'";
	$set .=",contact_no1='$prf_phone'";
	$set .=",country='$country'";
	$set .=",state='$state'";
	$set .=",city='$city'";
	$set .=",cat_id='$prf_cat'";
	$set .=",sub_catid='$prf_sub'";
	$set .=",user_locality='$prf_locality'";
	$set .=",user_address='$prf_address'";
	$set .=",about_self='$prf_intro'";
	$set .=",doc_name1='$prf_docname1'";
	$set .=",doc_name2='$prf_docname2'";
	$set .=",specification1='$jsonspecify'";
	$set .=",specification2='$prf_spc_2'";
	$set .=",specification3='$prf_spc_3'";
	$set .=",specification4='$prf_spc_4'";
	$set .=",specification5='$prf_spc_5'";
	$set .=",specification6='$prf_spc_6'";
	$set .=",specification7='$prf_spc_7'";
	$set .=",specification8='$prf_spc_8'";
	$set .=",specification9='$prf_spc_9'";
	$set .=",specification10='$prf_spc_l0'";
	$set .=",qualification1='$jsonqualify'";
	$set .=",qualification2='$prf_qulalification_2'";
	$set .=",qualification3='$prf_qulalification_3'";
	$set .=",qualification4='$prf_qulalification_4'";
	$set .=",qualification5='$prf_qulalification_5'";
	$set .=",qualification6='$prf_qulalification_6'";
	$set .=",qualification7='$prf_qulalification_7'";
	$set .=",qualification8='$prf_qulalification_8'";
	$set .=",qualification9='$prf_qulalification_9'";
	$set .=",qualification10='$prf_qulalification_10'";
	$set .=",estimate_fee='$prf_fee'";
	$set .=",fee_duration='$prf_amt'";
	$set .=",exp1='$prf_exp'";
	$set .=",exp2='$prf_exp1'";
	$set .=",exp_dur1='$prf_expp'";
	$set .=",exp_dur2='$prf_expp1'";
	$set .=",exp_location='$prf_explocation'";
	$set .=",chngdt='$chg_date'";
	$set .=",edit_ip='$edit_ip'";
	$error="";
	
	if($prf_d1!=''){
		$file_to=uniqid();
		$file1=$com_obj->upload_image("prf_d1",$file_to,500,500,"uploads/profdoc/","NULL");
		if($file1){
			$img=$com_obj->img_Name;
			$set .= ",doc_img1='$img'";
		}
		else {
			$error.="$com_obj->img_Err <br>";
		}
	}
	
	if($prf_d2!=''){
		$file_to=uniqid();
		$file2=$com_obj->upload_image_new("prf_d2",$file_to,500,500,"uploads/profdoc/","NULL");
		if($file2){
			$img=$com_obj->img_Name;
			$set .= ",doc_img2='$img'";
		}
		else {
			$error.="$com_obj->img_Err <br>";
		}
	}
	
/* 	for($i=0; $i<=3; $i++) {
	  $name2 = rand(11111,99999).uniqid();  
	  $name1 = "prf_g".$i;
	  $dbgal = "gallery_img".($i+1);
	  if(isset($_FILES["$name1"]["tmp_name"])) { 
	   if (is_uploaded_file($_FILES["$name1"]["tmp_name"]))
	   {
		$path='uploads/profgallery/';
		$img_upl=$com_obj->upload_image("$name1","$name2","500","500","$path","");
		if($img_upl) {
		 $gal=$com_obj->img_Name;
		 $set  .= ",$dbgal = '$gal'";
		}
		else {
		 $err= $com_obj->img_Err;
		header("location:prof-profile-edit&err=$err");
		echo "<script>location.href='prof-profile-edit&err=$err'</script>";
		exit;

		}
	   }    
	  }  
	 } */
	

	$db->insertrec("update register set $set where id='$uid'");
	header("location:prof-profile?succ");
	echo "<script>location.href='prof-profile?succ';</script>";
	exit;
	
	
}

$editInfo=$db->singlerec("select * from register where id='$uid'");
$e_country=$editInfo['country'];
$e_state=$editInfo['state'];
$e_city=$editInfo['city'];
$edit_country=getCountry($editInfo['country']);
$edit_state=getState($editInfo['state']);
$edit_city=getCity($editInfo['city']);
$prof_cat=$editInfo['cat_id'];
$prof_sub=$editInfo['sub_catid'];

$no_img="noimage.jpg";

$prf_img=$editInfo['img'];
if(empty($prf_img)){
	$prf_img="uploads/profprofile/noimage.jpg";
}
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
                     <div class="col-sm-12 profile_box">
					   <div class="row mt20 mb20">
					   <?php
						if(isset($err)){ ?>
						<p style="color:#ff5d56;font-size: 24px;
    font-style: italic;
    margin-bottom: 33px;
    text-align: center;font-weight: 500;"> Image upload error</p>
						<?php } ?>
            <div class="col-md-12 wow zoomIn" data-wow-delay="0.2s">
                <div class="col-sm-12 profile_box">
                    <form class="user_frm form-horizontal mt30" name="profileupd" id="profileupd" method="POST" enctype="multipart/form-data">
					    <h3 class="clr_txt">Basic Details</h3>
						<div class="row">
						<div class="col-sm-9">
						
						<div class="form-group">
						    <label class="col-sm-4">First Name</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <input type="text" name="prf_firstname" id="prf_firstname" class="form-control" value="<?php echo ucfirst($editInfo['fname']); ?>" readonly />
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-4">Last Name</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<?php $latname=isset($editInfo['lname'])?$editInfo['lname']:''; ?>
							<div class="col-sm-7">
							    <input type="text" name="prf_lastname" id="prf_lastname" class="form-control" value="<?php echo $latname; ?>" >
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-4">Email ID</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <input type="email" name="prf_email" id="prf_email" class="form-control" value="<?php echo $editInfo['email']; ?>" readonly />
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-4">Phone Number</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <input type="text" class="form-control" name="prf_phone" id="prf_phone" value="<?php echo !empty($editInfo['contact_no1'])?$editInfo['contact_no1']:''; ?>" />
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-4">Country</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <select class="form-control" name="country" id="country" onchange="return get_state(this.value);">
								    <option>Select Country</option>
								    <?=$drop->get_dropdown($db,"select country_id,country_name from country where country_status='1' order by country_name asc",$e_country);?> 
								</select>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-4">State</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <select class="form-control" name="state" onchange="return get_city(this.value);" id="state1">
								    <option>Select State</option>
								    <?=$drop->get_dropdown($db,"SELECT state_id,state_name FROM state WHERE state_country_id='$_country' and state_status='1' order by state_name asc",$e_state);?>
								</select>
							</div>
						</div>
						
						
						<div class="form-group">
						    <label class="col-sm-4">City</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <select class="form-control" name="city" id="city1">
								    <option>Select City</option>
								    <?=$drop->get_dropdown($db,"SELECT city_id,city_name from city WHERE city_state_id='$_state' and city_status='1' and city_state_id!='0' order by city_name asc",$e_city);?>
								</select>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-4">Locality</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <input type="text" name="prf_locality" id="prf_locality" class="form-control" value="<?php echo !empty($editInfo['user_locality'])?$editInfo['user_locality']:''; ?>" />
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-4">Address</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <textarea class="form-control" rows="5" name="prf_address" id="prf_address" value="<?php echo !empty($editInfo['user_address'])?$editInfo['user_address']:'---'; ?>"><?php echo !empty($editInfo['user_address'])?$editInfo['user_address']:''; ?></textarea>
							</div>
						</div>
						</div>
						<div class="col-md-3 wow zoomIn" data-wow-delay="0.4s">
							<div class="feature_home">
								<img src="<?php echo $siteurl ?>/<?=$prf_img; ?>" class="img-circle mb20" width="150" height="150">
								<a href="prof-photo.php" class="btn_1 outline">Change Picture</a>
							</div>
						</div>
						</div>
						<h3 class="clr_txt">Introduction</h3>
						
						<div class="form-group">
						    <label class="col-sm-12">Introduction	</label>
							<div class="col-sm-12">
							    <textarea class="form-control" rows="6" name="prf_intro" id="prf_intro"><?php echo !empty($editInfo['about_self'])?$editInfo['about_self']:''; ?></textarea>
							</div>
						</div>
						
						<h3 class="clr_txt">Upload ID Proof </h3>
						
						<div class="form-group">
						    <label class="col-sm-4">ID Proof 1</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <div class="row">
									<!--<div class="col-sm-6">
										<input type="text" class="form-control" name="prf_docname1" id="prf_docname2" value="<?php //echo !empty($editInfo['doc_name1'])?$editInfo['doc_name1']:''; ?>" />
									</div>-->
									
									<?php $photo = $editInfo['doc_img1'];
									if($photo!="" && file_exists('uploads/profdoc/'.$photo)){ ?>
									<div class="col-sm-6">
										<input type="file" class="form-control" name="prf_d1"  />
										<img src="uploads/profdoc/<?php echo $editInfo['doc_img1'] ?>" width="150" height="150">
									</div>
									<?php }else{?>
									<div class="col-sm-6">
									<img src="uploads/profdoc/" width="150" height="150">
										<input type="file" class="form-control" name="prf_d1" id="prf_d1"  />
									</div>
									<?php }?>
								</div>
							</div>
						</div>
						
						<!--<div class="form-group">
						    <label class="col-sm-4">ID Proof 2</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <div class="row">
									<!--<div class="col-sm-6">
										<input type="text" name="prf_docname2" id="prf_docname2" class="form-control" value="<?php //echo !empty($editInfo['doc_name2'])?$editInfo['doc_name2']:''; ?>" />
									</div>-->
									<!--<?php $photo1 = $editInfo['doc_img2'];
									if($photo1!="" && file_exists('uploads/profdoc/'.$photo1)){ ?>
									<div class="col-sm-6">
										<input type="file" class="form-control" name="prf_d2"  />
										<img src="uploads/profdoc/<?php echo $editInfo['doc_img2'] ?>" width="150" height="150">
									</div>
									<?php }else{?>
									<div class="col-sm-6">
										<input type="file" class="form-control" name="prf_d2" id="prf_d2" value="<?php echo !empty($editInfo['doc_img2'])?$editInfo['doc_img2']:''; ?>"  />
									</div>
									<?php }?>
								</div>
							</div>
						</div>-->
						
						<h3 class="clr_txt">Experience Details</h3>
						
						<div class="form-group">
						    <label class="col-sm-4">Category</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <div class="row">
									<div class="col-sm-12">
									<select class="form-control" name="prf_cat" onchange="return get_subcat(this.value);" id="prf_cat">
									<option>Select Category</option>
									<?=$drop->get_dropdown($db,"select id,category_name from category where active_status='1' and parent_id='0' order by category_name asc",$prof_cat);?> 
									</select>
									</div>
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
						    <label class="col-sm-4">Sub-Category</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <div class="row">
									<div class="col-sm-12">
									<select class="form-control" name="prf_sub" id="prf_sub">
									<option>Select your service</option>
									<?=$drop->get_dropdown($db,"select id,category_name from category where active_status='1' and parent_id!='0' order by category_name asc",$prof_sub);?> 
									</select>
									</div>
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
						    <label class="col-sm-4">Professional Experience</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <div class="row">
									<div class="col-sm-6">
										<div class="row">
											<div class="col-sm-6">
												<input type="text" name="prf_exp" id="prf_exp" class="form-control" value="<?php echo !empty($editInfo['exp1'])?$editInfo['exp1']:''; ?>" />
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
												<input type="text" name="prf_exp1" id="prf_exp1" class="form-control" value="<?php echo !empty($editInfo['exp2'])?$editInfo['exp2']:''; ?>" />
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
						
						<div class="form-group">
						    <label class="col-sm-4">Location</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <input type="text" class="form-control" value="<?php echo !empty($editInfo['exp_location'])?$editInfo['exp_location']:''; ?>"  name="prf_explocation" id="prf_explocation"/>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-4">Estimation	Fee</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <div class="row">
									<div class="col-sm-6">
										<input type="text" class="form-control" value="<?php echo !empty($editInfo['estimate_fee'])?$editInfo['estimate_fee']:''; ?>" name="prf_fee" id="prf_fee" />
									</div>
									<div class="col-sm-6">
										<select class="form-control" name="prf_amt" id="prf_amt">
											<option>Select Duration</option>
											<option <?php if($editInfo['fee_duration']=="Per Hour") echo "selected" ?> value="Per Hour">Per Hour</option>
											<option <?php if($editInfo['fee_duration']=="Per Days") echo "selected" ?> value="Per Days">Per Days</option>
											<option <?php if($editInfo['fee_duration']=="Per Months") echo "selected" ?> value="Per Months">Per Months</option>
											<option <?php if($editInfo['fee_duration']=="Per Years") echo "selected" ?> value="Per Years">Per Years</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						
						<!--<h3 class="clr_txt">Gallery</h3>
						<div class="row">
							<div class="col-sm-3 mt5i">
								<input type="file" class="form-control" name="prf_g1" id="prf_g1" value="<?php echo !empty($editInfo['gallery_img1'])?$editInfo['gallery_img1']:''; ?>">
								<img src="<?php echo $siteurl ?>/uploads/profgallery/<?php echo !empty($editInfo['gallery_img1'])?$editInfo['gallery_img1']:$no_img; ?>" alt="Image" class="img-responsive mt10" >
							</div>
							<div class="col-sm-3 mt5i">
								<input type="file" class="form-control" name="prf_g2"  id="prf_g2" value="<?php echo !empty($editInfo['gallery_img2'])?$editInfo['gallery_img2']:''; ?>">
								<img src="<?php echo $siteurl ?>/uploads/profgallery/<?php echo !empty($editInfo['gallery_img2'])?$editInfo['gallery_img2']:$no_img; ?>" alt="Image" class="img-responsive mt10">
							</div>
							<div class="col-sm-3 mt5i">
								<input type="file" class="form-control" name="prf_g3" id="prf_g3" value="<?php echo !empty($editInfo['gallery_img3'])?$editInfo['gallery_img3']:''; ?>">
								<img src="<?php echo $siteurl ?>/uploads/profgallery/<?php echo !empty($editInfo['gallery_img3'])?$editInfo['gallery_img3']:$no_img; ?>" alt="Image" class="img-responsive mt10">
							</div>
							<div class="col-sm-3 mt5i">
								<input type="file" class="form-control" name="prf_g4"  id="prf_g4" value="<?php echo !empty($editInfo['gallery_img4'])?$editInfo['gallery_img4']:''; ?>">
								<img src="<?php echo $siteurl ?>/uploads/profgallery/<?php echo !empty($editInfo['gallery_img4'])?$editInfo['gallery_img4']:$no_img; ?>" alt="Image" class="img-responsive mt10">
							</div>
						</div>-->
						
						<h3 class="clr_txt">Information Details</h3>
						
						<div class="row">
							<div class="form-group col-sm-6">
								<label class="col-sm-12">Specializations	</label>
								<button type="button" name="add" id="add" class="btn btn-success">Add More</button>
								<div class="col-sm-12">
									<div class="row">
									<div class="col-xs-8" id="dynamic_field">
										<?php 
										$aru=$editInfo['specification1'];
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
										$div="";
										if(!empty($specify0)){
											$div.="<input type='text' autocomplete='off' class='form-control'  name='key_specify[]' value='$specify0'>";
										}
										if(!empty($specify1)){
											$div.="<input type='text' autocomplete='off' class='form-control'  name='key_specify[]' value='$specify1'>";
										}
										if(!empty($specify2)){
											$div.="<input type='text' autocomplete='off' class='form-control'  name='key_specify[]' value='$specify2'>";
										}
										if(!empty($specify3)){
											$div.="<input type='text' autocomplete='off' class='form-control'  name='key_specify[]' value='$specify3'>";
										}
										if(!empty($specify4)){
											$div.="<input type='text' autocomplete='off' class='form-control'  name='key_specify[]' value='$specify4'>";
										}
										if(!empty($specify5)){
											$div.="<input type='text' autocomplete='off' class='form-control'  name='key_specify[]' value='$specify5'>";
										}
										if(!empty($specify6)){
											$div.="<input type='text' autocomplete='off' class='form-control'  name='key_specify[]' value='$specify6'>";
										}
										if(!empty($specify7)){
											$div.="<input type='text' autocomplete='off' class='form-control'  name='key_specify[]' value='$specify7'>";
										}
										if(!empty($specify8)){
											$div.="<input type='text' autocomplete='off' class='form-control'  name='key_specify[]' value='$specify8'>";
										}
										if(!empty($specify9)){
											$div.="<input type='text' autocomplete='off' class='form-control'  name='key_specify[]' value='$specify9'>";
										}
										if(!empty($specify10)){
											$div.="<input type='text' autocomplete='off' class='form-control'  name='key_specify[]' value='$specify10'>";
										}
										$cout=count(array_filter($spec1));
										
										?>
										<?php echo $div; ?>
									<input type="text" autocomplete="off" class="form-control"  name="key_specify[]"/>
									</div>
									
								</div>
								</div>
							</div>
							
							<div class="form-group col-sm-6">
								<label class="col-sm-12">Qualifications	</label>
								<div class="col-sm-12">
								<button type="button" name="add" id="addmore" class="btn btn-success">Add More</button>
									<div class="row">
									<?php 
									$qualif=$editInfo['qualification1'];
									$qualif1=json_decode($qualif,true);
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
									$div1="";
									if(!empty($qualif0)){
										$div1.="<input type='text' autocomplete='off' class='form-control'  name='key_qualify[]' value='$qualif0'>";
									}
									if(!empty($qualif11)){
										$div1.="<input type='text' autocomplete='off' class='form-control'  name='key_qualify[]' value='$qualif11'>";
									}
									if(!empty($qualif2)){
										$div1.="<input type='text' autocomplete='off' class='form-control'  name='key_qualify[]' value='$qualif2'>";
									}
									if(!empty($qualif3)){
										$div1.="<input type='text' autocomplete='off' class='form-control'  name='key_qualify[]' value='$qualif3'>";
									}
									if(!empty($qualif4)){
										$div1.="<input type='text' autocomplete='off' class='form-control'  name='key_qualify[]' value='$qualif4'>";
									}
									if(!empty($qualif5)){
										$div1.="<input type='text' autocomplete='off' class='form-control'  name='key_qualify[]' value='$qualif5'>";
									}
									if(!empty($qualif6)){
										$div1.="<input type='text' autocomplete='off' class='form-control'  name='key_qualify[]' value='$qualif6'>";
									}
									if(!empty($qualif7)){
										$div1.="<input type='text' autocomplete='off' class='form-control'  name='key_qualify[]' value='$qualif7'>";
									}
									if(!empty($qualif8)){
										$div1.="<input type='text' autocomplete='off' class='form-control'  name='key_qualify[]' value='$qualif8'>";
									}
									if(!empty($qualif9)){
										$div1.="<input type='text' autocomplete='off' class='form-control'  name='key_qualify[]' value='$qualif9'>";
									}
									if(!empty($qualif10)){
										$div1.="<input type='text' autocomplete='off' class='form-control'  name='key_qualify[]' value='$qualif10'>";
									}
									
									$qulifcount=count(array_filter($qualif1));
									
									?>
									<div class="col-xs-8" id="dynamic_fld">
									<?php echo $div1; ?>
									<input type="text" autocomplete="off" class="form-control"  name="key_qualify[]"/>
									
										
									</div>
									<!--<div class="col-xs-4">
										<p class="mt10"><input type="button" onClick="addchild('dynamic');" class="font14px" value="Add More"><!--<a href="#" class="font14px">Add More</a>--></p>
									<!--</div>-->
								</div>
								</div>
							</div>
						</div>
						
						
						<div class="form-group col-sm-12 text-center">
							<button class="btn_2 btn agelogbt" name="prfedit_upd">Save Profile</button>
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
<!--*********************** Footer ****************************-->
	<?php include "includes/footer.php"; ?>

<div id="toTop"></div><!-- Back to top button -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>
<!--Validate JS-->
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
$().ready(function(){
	$.validator.setDefaults({
		submitHandler:function(){
			form.submit();
		}
	});
	
	$("#profileupd").validate({
		rules: {
			prf_lastname: "required",
			prf_phone : "required",
			country : "required",
			state1 : "required",
			city1 : "required",
			prf_locality: "required",
			prf_address: "required",
			prf_intro: "required",
			prf_docname1: "required",
			prf_docname2: "required",
	   <?php if(empty($editInfo['doc_img1'])){ ?>
			prf_d1: "required",
	   <?php } ?>
			prf_cat: "required",
			prf_explocation: "required",
			/*prf_g1: "required",
			prf_g2: "required",
			prf_g3: "required",
			prf_g4: "required",*/
			prf_spcl: "required",
			prf_qulalification : "required",
			prf_exp: "required",
			prf_expp: "required",
			prf_exp1: "required",
			prf_expp1: "required",
			prf_fee: "required",
			prf_amt: "required"
		},
		messages: {
			prf_lastname: "Please enter your lastname",
			prf_phone : "Please enter your contact number",
			country : "Please select your country",
			state1 : "Please select your state",
			city1 : "Please select your city",
			prf_locality: "Please enter your locality",
			prf_address: "Please enter your address",
			prf_intro: "Please enter your introduction",
			prf_docname1: "Please enter document name",
			prf_docname2: "Please enter document name",
			prf_d1: "Please upload IDproof1",
			prf_cat: "Please select your category",
			prf_explocation: "Please enter your experience location",
			/*prf_g1: "Please upload your galery image",
			prf_g2: "Please upload your galery image",
			prf_g3: "Please upload your galery image",
			prf_g4: "Please upload your galery image",*/
			prf_spcl: "Please enter your specialization",
			prf_qulalification : "Please enter your qualification"
		}
	});
});
</script>
 <!-- Common scripts -->
<script>
$().ready(function(){
	var i="<?php echo $cout; ?>";
	var lim=10;
	$("#add").click(function(){
		if(i==lim){
			alert("You have reached the limit of adding " + i + " inputs");
		}else{
			i++;
			$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" class="form-control" autocomplete="off" name="key_specify[]"/></td><td><button name="remove" id="'+i+'" class="btn  btn_remove">X</button></td><br></tr>');
		}
		});
		
		$(document).on('click','.btn_remove',function(){
			var buttonid=$(this).attr("id");
			$("#row"+buttonid+"").remove();
		});
	
});

$().ready(function(){
	var i="<?php echo $qulifcount; ?>";
	var lim=10;
	$("#addmore").click(function(){
		if(i==lim){
			alert("You have reached the limit of adding " + i + " inputs");
		}else{
			i++;
			$('#dynamic_fld').append('<tr id="row'+i+'"><td><input type="text" class="form-control" autocomplete="off" name="key_qualify[]"/></td><td><button name="remove" id="'+i+'" class="btn  btn_remove">X</button></td><br></tr>');
		}
		});
		
		$(document).on('click','.btn_remove',function(){
			var buttonid=$(this).attr("id");
			$("#row"+buttonid+"").remove();
		});
	
});
</script>
<script>
var counter = 1;
var limit = 10;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "Specializations " + (counter + 1) + " <br><input type='text' name='prf_spcl_"+(counter + 1)+"' class='form-control'>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}
</script>
<script type="text/javascript">
var count=1;
var limit = 10;
function addchild(divName){
	if(count == limit){
		alert("You have reached the limit of adding " + count + " inputs");
	}else{
		var newdiv = document.createElement('div');
		newdiv.innerHTML = "Qualifications " + (count + 1) + "<br><input type='text' name='prf_qulalification_"+(count + 1)+"' class='form-control'>";
		document.getElementById(divName).appendChild(newdiv);
		count++;
	}
}
</script>	

<script>
function get_state(val){
		 $.ajax({
			 url: "state_ajax.php?val="+val, 
			success: function(result){
			$("#state1").html(result);
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
function get_subcat(id){
	if(id!=""){
		$.ajax({
			type: "post",
			url : "subcatajax.php?id="+id,
			success:function(response){
				$("#prof_sub").html(response);
			}
		});
	}
}
</script>

  </body>
</html>