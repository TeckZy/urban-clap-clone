<style type="text/css">
.show_more_main {
margin: 15px 25px;
}
.show_more {
background-color: #f8f8f8;
background-image: -webkit-linear-gradient(top,#fcfcfc 0,#f8f8f8 100%);
background-image: linear-gradient(top,#fcfcfc 0,#f8f8f8 100%);
border: 1px solid;
border-color: #d3d3d3;
color: #333;
font-size: 12px;
outline: 0;
}
.show_more {
cursor: pointer;
display: block;
padding: 10px 0;
text-align: center;
font-weight:bold;
}
.loding {
background-color: #e9e9e9;
border: 1px solid;
border-color: #c6c6c6;
color: #333;
font-size: 12px;
display: block;
text-align: center;
padding: 10px 0;
outline: 0;
font-weight:bold;
}
.loding_txt {
background-image: url(loading_16.gif);
background-position: left;
background-repeat: no-repeat;
border: 0;
display: inline-block;
height: 16px;
padding-left: 20px;
}

</style>
<?php 
include "includes/title.php";

$_sid=isset($_SESSION['id'])?$_SESSION['id']:'';
$UserData=$db->singlerec("select * from register where id='$_sid' and user_role='0'");
$uid=isset($uid)?$uid:'';
$uid=base64_decode($uid);
$user_location=$com_obj->getLocation($uid);
$radio_box0=isset($radio_box0)?$radio_box0:'';
$radio_box1=isset($radio_box1)?$radio_box1:'';
$radio_box2=isset($radio_box2)?$radio_box2:'';
$radio_box3=isset($radio_box3)?$radio_box3:'';
$radio_box4=isset($radio_box4)?$radio_box4:'';
$prf_input0=isset($prf_input0)?$prf_input0:'';
$prf_input1=isset($prf_input1)?$prf_input1:'';
$prf_input2=isset($prf_input2)?$prf_input2:'';
$prf_input3=isset($prf_input3)?$prf_input3:'';
$prf_input4=isset($prf_input4)?$prf_input4:'';
$prf_select0=isset($prf_select0)?$prf_select0:'';
$prf_select1=isset($prf_select1)?$prf_select1:'';
$prf_select2=isset($prf_select2)?$prf_select2:'';
$prf_select3=isset($prf_select3)?$prf_select3:'';
$prf_select4=isset($prf_select4)?$prf_select4:'';
$radio_box_comp0=isset($radio_box_comp0)?$radio_box_comp0:'';
$radio_box_comp1=isset($radio_box_comp1)?$radio_box_comp1:'';
$radio_box_comp2=isset($radio_box_comp2)?$radio_box_comp2:'';
$radio_box_comp3=isset($radio_box_comp3)?$radio_box_comp3:'';
$radio_box_comp4=isset($radio_box_comp4)?$radio_box_comp4:'';
$prf_type=isset($prf_type)?$prf_type:'';
$radioid=isset($radioid)?$radioid:'';
$checkid=isset($checkid)?$checkid:'';
$input_field=isset($input_field)?$input_field:'';
$selid=isset($selid)?$selid:'';
$prf_checkbox=isset($prf_checkbox)?$prf_checkbox:'';
$catid=isset($catid)?$catid:'';
$comp_location=isset($comp_location)?$comp_location:'';
$budget_from=isset($budget_from)?$budget_from:'';
$budget_to=isset($budget_to)?$budget_to:'';
$radioid_comp=isset($radioid_comp)?$radioid_comp:'';
$catid=$com_obj->getUsercatid($uid);
if(isset($ind_upd)){
	$date=date("Y-m-d H:i:s");
	$ip=$_SERVER['REMOTE_ADDR'];
	//radio box ans and question
	$radio_box0=$db->escapstr($radio_box0);
	$radio_box1=$db->escapstr($radio_box1);
	$radio_box2=$db->escapstr($radio_box2);
	$radio_box3=$db->escapstr($radio_box3);
	$radio_box4=$db->escapstr($radio_box4);
	$radioid=$db->escapstr($radioid);
	$budget_from=$db->escapstr($budget_from);
	$budget_to=$db->escapstr($budget_to);
	$comp_location=$db->escapstr($comp_location);
	$radioid_comp=$db->escapstr($radioid_comp);
	$json_radio=json_encode(array("qus1" => $radioid, "ans1" => $radio_box0,
								  "qus2" => $radioid, "ans2" => $radio_box1,
								  "qus3" => $radioid, "ans3" => $radio_box2,
								  "qus4" => $radioid, "ans4" => $radio_box3,
								  "qus5" => $radioid, "ans5" => $radio_box4));
	//checkbox ans and question
	if(isset($_POST['0prf_checkbox'])) $prf_checkbox0=$_POST['0prf_checkbox']; else $prf_checkbox0="";
	if(isset($_POST['1prf_checkbox'])) $prf_checkbox1=$_POST['1prf_checkbox']; else $prf_checkbox1="";
	if(isset($_POST['2prf_checkbox'])) $prf_checkbox2=$_POST['2prf_checkbox']; else $prf_checkbox2="";
	if(isset($_POST['3prf_checkbox'])) $prf_checkbox3=$_POST['3prf_checkbox']; else $prf_checkbox3="";
	if(isset($_POST['4prf_checkbox'])) $prf_checkbox4=$_POST['4prf_checkbox']; else $prf_checkbox4="";
	$checkboxid=$db->escapstr($checkid);
	$json_checkbox=json_encode(array("qus1" => $checkboxid, "ans1" => $prf_checkbox0,
									 "qus2" => $checkboxid, "ans2" => $prf_checkbox1,
									 "qus3" => $checkboxid, "ans3" => $prf_checkbox2,
									 "qus4" => $checkboxid, "ans4" => $prf_checkbox3,
									 "qus5" => $checkboxid, "ans5" => $prf_checkbox4));
	//input box ans and question
	$prf_input0=$db->escapstr($prf_input0);
	$prf_input1=$db->escapstr($prf_input1);
	$prf_input2=$db->escapstr($prf_input2);
	$prf_input3=$db->escapstr($prf_input3);
	$prf_input4=$db->escapstr($prf_input4);
	$input_field=$db->escapstr($input_field);
	$json_inputbox=json_encode(array("qus1" => $input_field, "ans1" => $prf_input0,
									 "qus2" => $input_field, "ans2" => $prf_input1,
									 "qus3" => $input_field, "ans3" => $prf_input2,
									 "qus4" => $input_field, "ans4" => $prf_input3,
									 "qus5" => $input_field, "ans5" => $prf_input4));
	//select box qus and ans
	$prf_select0=$db->escapstr($prf_select0);
	$prf_select1=$db->escapstr($prf_select1);
	$prf_select2=$db->escapstr($prf_select2);
	$prf_select3=$db->escapstr($prf_select3);
	$prf_select4=$db->escapstr($prf_select4);
	$selid=$db->escapstr($selid);
	$json_selectkbox=json_encode(array("qus1" => $selid, "ans1" => $prf_select0,
									   "qus2" => $selid, "ans2" => $prf_select1,
									   "qus3" => $selid, "ans3" => $prf_select2,
									   "qus4" => $selid, "ans4" => $prf_select3,
									   "qus5" => $selid, "ans5" => $prf_select4));
	//compulsory qus
	$radio_box_comp0=$db->escapstr($radio_box_comp0);
	$radio_box_comp1=$db->escapstr($radio_box_comp1);
	$radio_box_comp2=$db->escapstr($radio_box_comp2);
	$radio_box_comp3=$db->escapstr($radio_box_comp3);
	$radio_box_comp4=$db->escapstr($radio_box_comp4);
	$json_comp=json_encode(array("qus1" => $radioid_comp, "ans1" => $radio_box_comp0,
								 "qus2" => $radioid_comp, "ans2" => $radio_box_comp1,
								 "qus3" => $radioid_comp, "ans3" => $radio_box_comp2,
								 "qus4" => $radioid_comp, "ans4" => $radio_box_comp3,
								 "qus5" => $radioid_comp, "ans5" => $radio_box_comp4));
  
								 
	$compans=$com_obj->mailCompQus($json_comp);
	$checkans=$com_obj->mailcheckboxQus($json_checkbox);
	$inputans=$com_obj->commonmailans($json_inputbox);
	$selectboxqus=$com_obj->commonmailans($json_selectkbox);
	$json_radioqus=$com_obj->commonmailans($json_radio);
	$getname=$com_obj->get_name($_sid);
	$bud=array("bud_frm" => $budget_from, "bud_to" => $budget_to, "comp_loc" => $comp_location);
	$getfname=$com_obj->get_name($_sid);

	//insert process
	$sel_=$db->get_all("select id from register where  cat_id='$catid'");
	$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	//echo "select count(*) as tot from sent_enquiry where senter_id='$_sid' and receiver_id='$uid' and prof_response=0"; exit;
	$chk=$db->singlerec("select count(*) as tot from sent_enquiry where senter_id='$_sid' and receiver_id='$uid' and prof_response=0");
	$total=$chk['tot'];
	if($total==0){
	$set="senter_id='$_sid'";
	$set.=",receiver_id='$uid'";
	$set.=",cat_id='$catid'";
	$set.=",qusans1='$json_radio'";
	$set.=",qusans2='$json_checkbox'";
	$set.=",qusans3='$json_inputbox'";
	$set.=",qusans4='$json_selectkbox'";
	$set.=",comp_qusans='$json_comp'";
	$set.=",comp_budget_from='$budget_from'";
	$set.=",comp_budget_to='$budget_to'";
	$set.=",comp_location='$comp_location'";
	$set.=",ip='$ip'";
	$set.=",crcdt='$date'";
	$set.=",status='0'";
	$set.=",role='1'";
	$toemail=$com_obj->getEmail($uid);
	$subject= "User Order";
	$getmailres=$email_temp->sentQusEmail($siteinfo,$json_radioqus,$selectboxqus,$inputans,$checkans,$compans,$bud,$getname);
	$db->insertrec("insert into sent_enquiry set $set");
	$com_obj->email($from_email,$toemail,$subject,$getmailres);
	echo "<script>location.href='user-order?order'</script>";
	header("location:user-order?order"); exit;
    }else{
		
	    $userid=$db->escapstr(base64_encode($uid));
		echo "<script>location.href='list-detail?uid=$userid&err'</script>";
	    header("location:list-detail?uid=$userid&err"); exit;
	}
	
}
if(!empty($uid)){
$detail=$db->singlerec("select * from register where id='$uid'");
$username=$com_obj->get_name($uid);
$getGen=$com_obj->getProfInfo($uid);
$email=$getGen['email'];
$phone=$getGen['phone'];
$address=$getGen['address'];
$country=getCountry($detail['country']);
$state=getState($detail['state']);
$city=getCity($detail['city']);
$abut_self=$detail['about_self'];
$usr_loc=$detail['user_locality'];

$responsedetails=$db->singlerec("select * from response where responser_id='{$uid}'");
$res_auto_id=$responsedetails['id'];
$res_mail=$responsedetails['email'];
$res_phone=$responsedetails['contact_no'];
$res_msg=$responsedetails['message'];
$responserid=$responsedetails['responser_autoid'];

$fee=$detail['estimate_fee'];
$fee_duration=$detail['fee_duration'];
$amt="";
if(!empty($fee)){
	$amt.=$site_currency." ".$fee;
}
if(!empty($fee) && !empty($fee_duration)){
	$amt.=" / ".$fee_duration;
}else{
	$amt.="";
}
$prf_img=$detail['img'];
if(empty($prf_img)){
	$prf_img="uploads/profprofile/noimage.jpg";
}
$exp1=$detail['exp1'];
$exp2=$detail['exp2'];
$exp1_dur=$detail['exp_dur1'];
$exp2_dur=$detail['exp_dur2'];
$exp_details="";
if(!empty($exp1)){
	$exp_details.=$exp1." ".$exp1_dur;
}
if(!empty($exp2)){
	$exp_details.=$exp2." ".$exp2_dur;
}
}else{
	$msg="";
}
$aru=$detail['specification1'];
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

$qualif=$detail['qualification1'];
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

$no_img="noimage.jpg";


?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<head>
    <!-- CSS -->
    <link href="css/slider-pro.min.css" rel="stylesheet">
    <link href="css/date_time_picker.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.theme.css" rel="stylesheet">
    
     <!-- Google web fonts -->
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
    
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
		<style>
		.parallax-window {
		min-height: 250px;
		background: rgba(0, 0, 0, 0.04);
		}
		.owl-wrapper{min-width:100px !important;}
		.owl-wrapper .owl-item{min-width:100px !important;}
		</style>	
<style>
.loader {
display : none;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
	
</head>
<body>

<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

    <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
    <!-- End Preload -->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

     <!-- Header================================================== -->
    <?php include "includes/header.php"; ?>
    <section class="parallax-window">
    <div class="parallax-content-2">
        <div class="container">
            <div class="row">
                <div class="col-md-1 col-sm-1 padd0i"> 
					<div class="carousel magnific-gallery exp_gallry">
					<div class="item">
						<a href="<?php echo $prf_img; ?>" class="lstimg">
							<img src="<?php echo $prf_img; ?>" alt="Image" class="img-responsive img-circle list_img" style="width:100px;height:100px;">
						</a>
					</div>
					</div>
				</div>
<?php 
$reviewCount=$com_obj->getReviewProfcount($uid);
$reviewCount=$reviewCount['count'];
$totalreview=getStar($reviewCount);
?>
				<div class="col-md-7 col-sm-7 pdl35i">
                    <div class="rating">
						<?php echo $totalreview; ?>
						<span class="cntnt"></span>
					</div>
                    <h1><?php echo ucfirst($username); ?></h1>
					<?php if(!empty($address) || !empty($city) || !empty($state) || !empty($country)): ?>
                    <p class="cntnt"> <i class="fa fa-map-marker" aria-hidden="true"></i>  <?php echo $address; ?> <?php echo $city; ?> <?php echo $state; ?> <?php echo $country; ?></p>
					<?php endif; ?>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div id="price_single_main" class="hotel">
                        <span> <?php echo $amt; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section><!-- End section -->
  
    <div class="container mt30i mb30i">
    <div class="row">
   
  <?php if(isset($succ)){ ?>		
<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok green"></i>
		<strong class="green">
			Review Posted Successfully !!!
		</strong>

	</div>
<?php } ?>  
<?php if(isset($err)){ ?>		
<div class="alert alert-block alert-danger">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok red"></i>
		<strong class="red">
			User already gave request to the professional !!!
		</strong>

	</div>
<?php } ?>     
		<div class="col-md-8" id="single_tour_desc">
            
            <div class="row">
                <div class="col-md-12">
                    <h3>Introduction</h3>
                </div>
                <div class="col-md-12">
                    <p>
                        <?php echo $abut_self; ?>
                    </p>
                </div><!-- End col-md-9  -->
            </div><!-- End row  -->
            
          	<hr>
            
            <div class="row">
                
				<div class="col-md-12">
                    <h3>Experience / Details</h3>
                </div>
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-striped exp_table">
							<tbody>
								<tr>
									<td><b>Professional Experience</b></td>
									<td><?php echo !empty($exp_details)?$exp_details:'No Experience'; ?></td>
								</tr>
								<tr>
									<td><b>Completed Projects</b></td>
									<td><?php echo $com_obj->completeProjCount($uid); ?></td>
								</tr>
								<!--<tr>
									<td><b>Gender</b></td>
									<td>Male</td>
								</tr>
								<tr>
									<td><b>Trial Class</b></td>
									<td>Free</td>
								</tr>-->
								 
							</tbody>
						</table>
					</div>
				</div>
				 
            </div><!-- End row  -->
            
			<!--<div class="row">
				<div class="col-md-12">
					<h3>Gallery</h3>
				</div>
			<div class="col-md-12">
                     <div class="carousel magnific-gallery exp_gallry">
                     	<div class="item">
                        	<a href="<?php echo $siteurl ?>/uploads/profgallery/<?php echo !empty($detail['gallery_img1'])?$detail['gallery_img1']:$no_img; ?>"><img src="<?php echo $siteurl ?>/uploads/profgallery/<?php echo !empty($detail['gallery_img1'])?$detail['gallery_img1']:$no_img; ?>" alt="Image"></a>
                        </div>
                        <div class="item">
                        	<a href="<?php echo $siteurl ?>/uploads/profgallery/<?php echo !empty($detail['gallery_img2'])?$detail['gallery_img2']:$no_img; ?>"><img src="<?php echo $siteurl ?>/uploads/profgallery/<?php echo !empty($detail['gallery_img2'])?$detail['gallery_img2']:$no_img; ?>" alt="Image"></a>
                        </div>
                        <div class="item">
                        	<a href="<?php echo $siteurl ?>/uploads/profgallery/<?php echo !empty($detail['gallery_img3'])?$detail['gallery_img3']:$no_img; ?>"><img src="<?php echo $siteurl ?>/uploads/profgallery/<?php echo !empty($detail['gallery_img3'])?$detail['gallery_img3']:$no_img; ?>" alt="Image"></a>
                        </div>
                        <div class="item">
                        	<a href="<?php echo $siteurl ?>/uploads/profgallery/<?php echo !empty($detail['gallery_img4'])?$detail['gallery_img4']:$no_img; ?>"><img src="<?php echo $siteurl ?>/uploads/profgallery/<?php echo !empty($detail['gallery_img4'])?$detail['gallery_img4']:$no_img; ?>" alt="Image"></a>
                        </div>
                     </div>
                </div>
			</div>
            <hr>-->
			
			
			<div class="row">
				<div class="col-md-12">
					<h3>Information</h3>
				</div>
			
				<div class="col-sm-6">
					<h4>Specializations</h4>
					<ul class="exp_list">
						
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
				
				<div class="col-sm-6">
					<h4>Qualifications</h4>
					<ul class="exp_list">
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
            <hr>

            <div class="row">
                <div class="col-xs-8">
                    <h3>Reviews</h3>
<?php 
if($_sid==true){
$usercnt=$com_obj->getretCount($_sid,$uid);
if($usercnt==0){ 
?>
                    <a href="#" class="btn btn_dflt add_bottom_30" data-toggle="modal" data-target="#myReview-<?php echo $uid; ?>">Leave a review</a>
					
<?php }  } ?>
                </div>
				<div class="col-xs-4">
					<div id="score_detail"><span><?php $cunt=$com_obj->getReviewProfcount($uid); $avg=$cunt['avg']; if(empty($avg)) echo "0"; else echo $avg; ?></span> <small>(Based on <?php $cunt=$cunt['count']; if(empty($cunt)) echo "0"; else echo $cunt; ?> reviews)</small></div><!-- End general_rating -->
				</div>
                <div class="col-md-12">
<?php 
$revw=$db->get_all("select * from review where professionalid='{$uid}' order by review_id limit 10");
foreach($revw as $revwInfo){
	$revid=$revwInfo['review_id'];
	$date=$revwInfo['crcdt'];
	$date=date("d-M-Y",strtotime($date));
	$userid=$revwInfo['user_id'];
	$profid=$revwInfo['professionalid'];
	$userrevname=$com_obj->get_name($userid);
	$comment=$revwInfo['comment'];
	$img=$com_obj->getimg($userid);
	if(empty($img)){
		$img="uploads/userprofile/noimage.jpg";
	}
	$reviewCount=$com_obj->getReview($profid,$userid);
	$totalreview=getStar($reviewCount);
?>
                    <div class="review_strip_single">
                        <img src="<?php echo $siteurl; ?>/<?php echo $img; ?>" alt="Image" class="img-circle" width="80px" height="80px">
                        <small> - <?php echo $date; ?> -</small>
                        <h4><?php echo ucfirst($userrevname); ?></h4>
						<?php if($userid==$_sid){ ?>
						<span class="pull-right"><a href="#" class="btn btn-sm btn-warning add_bottom_30" data-toggle="modal" onclick="return fillform(<?php echo $revid; ?>)" data-target="#myReview-<?php echo $uid; ?>">Edit My Review</a></span>
						<?php } ?>
                        <div class="rating">
                            <?php echo $totalreview; ?>
                        </div>
						<p>
                            <?php echo $com_obj->limit_text($comment,1000); ?>
                        </p>
                        
                    </div><!-- End review strip -->
			<!--<div class="show_more_main text-center" id="show_more_main<?php echo $uid; ?>">
                <span id="<?php echo $uid; ?>" class="show_more btn btn_dflt add_bottom_30" title="Load more posts">Show more</span>
                <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
            </div>-->
<?php } ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(document).on('click','.show_more',function(){
		var ID = $(this).attr('id');
		$('.show_more').hide();
		$('.loding').show();
		$.ajax({
			type:'POST',
			url:'ajax_more.php?id='+ID,
			success:function(html){
				$('#show_more_main'+ID).remove();
				$('.review_strip_single').append(html);
			}
		});
		
	});
});
</script>
					
					<!--<div class="text-center">
						<a href="#" class="btn btn_dflt add_bottom_30">Read More</a>
					</div>-->
                </div>
            </div>
        </div><!--End  single_tour_desc-->
        
        <aside class="col-md-4" id="sidebar" style="z-index:999">
		
        <div class="">
		<div class="box_style_1 expose" id="booking_box">
			<h3 class="inner">- Guarantee -</h3>
			
			<table class="table table_summary">
			<tbody>
			<tr class="">
				<td colspan="2">
					<div class="row">
						<div class="col-xs-3">
						  <img src="img/service.png" class="img-responsive">
						</div>
						<div class="col-xs-9">
							<h4>Service Guarantee</h4>
							<?php 
							$ses_date=$detail['crcdt'];
							$ses_date=date("Y-m-d",strtotime($ses_date));
							?>
							<p>Upto <?php echo $com_obj->dtdiff($ses_date); ?> of service</p>
						</div>
					</div>
				</td>
			</tr>
			
			<?php $verify=$com_obj->certifyverify($uid); if($verify==true):?>
			<tr class="">
				<td colspan="2">
					<div class="row">
						<div class="col-xs-3">
						  <img src="img/verified.png" class="img-responsive">
						</div>
						<div class="col-xs-9">
							<h4>Professionals</h4>
							<p>100% certified professionals</p>
						</div>
					</div>
				</td>
			</tr>
			<?php endif; ?>
			
			<tr class="">
				<td colspan="2">
					<p>Prices for 12 sessions</p>
				</td>
			</tr>
			
			<tr class="total">
				<td>
					Estimation
				</td>
				<td class="text-right">
					<!--$1500<small class="mnth">/ Month</small>-->
					<small class="mnth"><?php echo $amt; ?></small>
				</td>
			</tr>
			</tbody>
			</table>
<?php 
if(isset($_SESSION['id'])){
$recid=base64_decode($uid);	
$Confrm=$db->Extract_Single("select prof_response from sent_enquiry where senter_id='$_sid' and receiver_id='$recid'");
$Userinfo=$db->singlerec("select * from register where id='$_sid' and user_role='0'");
$phone=$Userinfo['contact_no1'];
$address=$Userinfo['user_address'];
$locat=$Userinfo['user_locality'];
if(!empty($phone) && !empty($address) && !empty($locat)){
?>		
			<?php $enable=$com_obj->checkSentButton($_sid); if($enable==true): ?>
			<a class="btn_full" href="#" data-toggle="modal" data-target="#req_qution">Request a Quotation</a> 
			<!--<a class="btn_full" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Request a Quotation</a>-->
			<?php $fav=$com_obj->checkFavourite($_sid,$uid); if($fav==1){?>
			<a class="btn_full_outline" href="javascript:void(0);" onclick="return favourite(<?php echo $_sid; ?>,<?php echo $uid; ?>);"><i class=" icon-heart"></i> Add to whislist</a>
			<div class="loader"></div>
			<?php } else { ?>
			<a class="btn_full_outline" href="javascript:void(0);" onclick="return removefav(<?php echo $_sid; ?>,<?php echo $uid; ?>);"><i class=" icon-heart"></i> Remove Whislist</a>
			<?php } ?>
			<?php endif; ?>
<?php } else{ ?>
<a class="btn_full" href="user-profile-edit?edit" >Request a Quotation</a> 
<?php } }?>			
			
			<div class="row mt20">
				<div class="col-sm-12">
					<h4>Share The Profile</h4>
					<ul class="soci_share">
						<li><a href="http://www.facebook.com/sharer.php?u=<?php echo $siteurl."".basename($_SERVER['PHP_SELF']); ?>?uid=<?php echo base64_encode($uid); ?>" class="" target="_blank"><i class="fa fa-facebook-official fa-2x facebook" aria-hidden="true"></i></a></li>
						<li><a href="http://twitter.com/share?url=<?php echo $siteurl."".basename($_SERVER['PHP_SELF']); ?>?uid=<?php echo base64_encode($uid); ?>" target="_blank" class=""><i class="fa fa-twitter-square fa-2x twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class=""><i class="fa fa-skype skype fa-2x" aria-hidden="true"></i></a></li>
						<li><a href="#" class=""><i class="fa fa-linkedin-square linkedin fa-2x" aria-hidden="true"></i></a></li>
						<li><a href="#" class=""><i class="fa fa-google-plus-square fa-2x googleplus" aria-hidden="true"></i></a></li>
						<li><a href="#" class=""><i class="fa fa-pinterest-square fa-2x pinterest" aria-hidden="true"></i></a></li>
						<li><a href="#" class=""><i class="fa fa-whatsapp fa-2x whatsapp" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div><!--/box_style_1 -->
      </div><!--/end sticky -->
<script>
function favourite(userid,favid){
	if(userid!="" && favid!=""){
		$.ajax({
			type : "post",
			url : "addfavourite.php?userid="+userid+"&favid="+favid,
			success:function(response){
				if(response==0){
					location.href='';
				}else{
					return false;
				}
			}
		});
	}
}

function removefav(userid,favid){
	if(userid!="" && favid!=""){
		$.ajax({
			type : "post",
			url : "removefavourite.php?userid="+userid+"&favid="+favid,
			success:function(response){
				if(response==0){
					location.href='';
				}else{
					return false;
				}
			}
		});
	}
}
</script>
<?php 
$db_banner=$db->get_all("select * from banner where ban_status='0' and ban_location='List Details' order by RAND() limit 3");
foreach($db_banner as $ban):
	$banimage=$ban['ban_image'];
	$banlocation=$ban['ban_link'];
	//echo $banlocation; exit;
?>
	  <div class="col-sm-12 mt20i" >
		<a href="<?php echo $banlocation; ?>" target="_blank" onclick="return getBanid(<?php echo $ban['ban_id']; ?>)" ><img src="<?php echo $siteurl; ?>/admin/uploads/banner/original/<?php echo $banimage; ?>"  class="img-responsive" style="width:100%;"></a>
	  </div>
	 
<?php endforeach; ?>
	  
		</aside>
    </div><!--End row -->
    </div><!--End container -->
<script>
function getBanid(id){
	if(id!=""){
		$.ajax({
			type : "post",
			url : "clickcount.php?id="+id,
			success:function(data){
				
			}
		});
	}
}
</script>
 <?php include "includes/footer.php"; ?>

<div id="toTop"></div><!-- Back to top button --> 
<div id="overlay"></div><!-- Mask on input focus -->   




<!-- Modal -->
<div class="modal fade deflt_mdl" id="req_qution" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Request a Quotation</h4>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-md-12">
      <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">
				<?php 
					$catid=$com_obj->getUsercatid($uid);
					$query=$db->get_all("select * from question_mgmt where cat_id='$catid' and status='1' or q_type='5' order by id asc");
					if(!empty($query)){
					  foreach($query as $i=>$qid){
						$qusId=$qid['id'];
						if($i==0) $class="active"; else $class="disabled";
				?>
                    <li role="presentation" class="<?php echo $class; ?>">
                        <a href="#step<?php echo $i; ?>" data-toggle="tab" aria-controls="step<?php echo $i; ?>" role="tab" title="Step <?php echo $i; ?>">
                            <span class="round-tab">
                                Step <?php echo $i; ?>
                            </span>
                        </a>
                    </li>
					<?php } ?>
					<li role="presentation" class="disabled">
                        <a href="#step6" data-toggle="tab" aria-controls="step6" role="tab" title="complete">
                            <span class="round-tab">
                                Complete
                            </span>
                        </a>
                    </li>
					<?php  } else{ ?>
						<li>No Questions found</li>
					<?php } ?>
                </ul>
            </div>

            <form role="form" method="post">
                <div class="tab-content">
				<?php $catid=$com_obj->getUsercatid($uid);
					  $query=$db->get_all("select * from question_mgmt where cat_id='$catid' and status='1' or q_type='5' order by id asc");
					  foreach($query as $i=>$qid):
						$qusId=$qid['id'];
						$q_ty=$qid['q_type'];
						if($i==0) $class="active"; else $class="disabled";
				?>
                    <div class="tab-pane <?php echo $class; ?>" role="tabpanel" id="step<?php echo $i; ?>">
                        <div class="row">
						<?php 
						$type=$com_obj->getTypeid($qusId); 
						$type=$type['ques_type'];
						$com_typ=$com_obj->getCompType($qusId);
						$qus_typ=$com_typ['questin_type'];
						if($type==0) { $input=$com_obj->input_text_field($qusId,$i);  }
						if($type==1) { $input=$com_obj->getcheckbox_field($qusId,$i); }
						if($type==2) { $input=$com_obj->radiobox_field($qusId,$i); }
						if($type==3) { $input=$com_obj->dropselect_field($qusId,$i); }
						if($qus_typ==5 && $type!=2) { $comp=$com_obj->dropselect_field_from($qusId); }
						?>
							<div class="col-sm-12 mt15 wiz_frm">
								<h3><?php if($qus_typ==5) echo $comp['main_head']; else  echo $input['main_head']; ?></h3>
								<p><?php if($qus_typ==5) echo $comp['sub_head']; else echo $input['sub_head']; ?></p>
								<div class="col-sm-12 mt15i">
								<?php if($qus_typ==5 && $type!=2) echo $comp['input'];  else echo $input['input']; ?>
								</div>
								<input type="hidden" name="<?php echo "question".$i; ?>" value="<?php echo $input['qus_type']; ?>">
								<ul class="list-inline pull-right">
									<?php if($i!=0): ?><li><button type="button" class="btn btn-default prev-step">Previous</button></li><?php endif; ?>
									<li><button type="button" class="btn btn-primary next-step">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></button></li>
								</ul>
							</div>
							
						</div>
                    </div>
					
					<?php endforeach; ?>
                    
					<div class="tab-pane" role="tabpanel" id="step6">
                        <div class="row">
							<div class="col-sm-12 mt15 wiz_frm text-center">
								
								<h3>User Location</h3>
								<!--<p class="pdb30i">1 to 3 interested fitness trainers will respond in 24 hours with their profiles & prices</p>-->
								
								<input type="text" name="comp_location" id="comp_location" value="<?php echo $user_location; ?>" required>
								<ul class="list-inline pull-right">
									<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
									
									<button class="btn btn-success btn-info-full next-step" name="ind_upd">Complete</button>
								</ul>
							</div>
						</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
		</div>
      </div>
    </div>
  </div>
</div>

<?php
$rev_name=isset($rev_name)?$rev_name:'';
$rev_email=isset($rev_email)?$rev_email:'';
$rev_phone=isset($rev_phone)?$rev_phone:'';
$rev_msg=isset($rev_msg)?$rev_msg:'';
$rev_count=isset($rev_count)?$rev_count:'';

if(isset($rev_submit)){
	
	$rev_name=$db->escapstr($rev_name);
	$rev_email=$db->escapstr($rev_email);
	$rev_phone=$db->escapstr($rev_phone);
	$rev_msg=$db->escapstr($rev_msg);
	$rev_count=$db->escapstr($rev_count);
	$senterid=$db->escapstr(base64_decode($senterid));
	$professionalid=$db->escapstr(base64_decode($professionalid));
	$userid=base64_encode($professionalid);
	$date=date("Y-m-d H:i:s");
	
	$set="user_id='$senterid'";
	$set.=",professionalid='$professionalid'";
	$set.=",stars='$rev_count'";
	$set.=",name='$rev_name'";
	$set.=",comment='$rev_msg'";
	$set.=",phone='$rev_phone'";
	$set.=",email='$rev_email'";
	$set.=",crcdt='$date'";
	$set.=",active_status='0'";
	$getuser=$db->singlerec("select * from register where user_role='1' and id='$professionalid'");
	$strcount=$db->Extract_Single("select count(*) as tot from review where user_id='$senterid' and professionalid='$professionalid'");
	
	 $rating = overall_Rate($getuser['id']);	
	
	    $db->insertrec("update register set overall_rate='$rating' where id='$professionalid' and user_role='1'");	
	if($strcount==1){
	  $db->insertrec("update review set $set where user_id='$senterid' and professionalid='$professionalid'");	
	   
     	
		
	  echo "<script>location.href='list-detail?uid=$userid&upd'</script>";
	  header("location:list-detail?uid=$userid&upd");
	}else if($strcount==0){
	$db->insertrec("insert into review set $set");
	    
	echo "<script>location.href='list-detail?uid=$userid&succ'</script>";
	header("location:list-detail?uid=$userid&succ");
	}
}
?>

<!-- Modal Review -->
<div class="modal fade deflt_mdl" id="myReview-<?php echo $uid; ?>" tabindex="-1" role="dialog" aria-labelledby="myReviewLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myReviewLabel">Write your review</h4>
			</div>
			<div class="modal-body">
				<div id="message-review">
				</div>
				<form method="post">
					<div class="form-group">
						<input type="text" name="rev_name" id="rev_name"  class=" form-control" placeholder="Name"  value="<?php echo $UserData['fname'].' '.$UserData['lname'];?>" readonly>
					</div>
					<div class="form-group">
						<input type="text" name="rev_email" id="rev_email"  class=" form-control" placeholder="Email" value="<?php echo $UserData['email']; ?>" readonly>
					</div>
					<div class="form-group">
						<input type="text" name="rev_phone" id="rev_phone" class=" form-control" placeholder="Phone Number" value="<?php echo $UserData['contact_no1'];?>" >
					</div>
					<div class="form-group lead">
						<div id="stars" class="starrr rating" ></div>
						You gave a rating of <span id="count">0</span> star(s)<div id="str"></div>
					</div>
					<input type="hidden" name="rev_count" id="starss">	
					<div class="form-group">
						<textarea name="rev_msg" id="rev_msg" class="form-control" style="height:100px" placeholder="Write your review" required></textarea>
					</div>
					<!--<div class="form-group">
						<input type="text"   class=" form-control" placeholder="Are you human? 3 + 1 =">
					</div>-->
					<!--<input type="hidden" name="rev_count" id="rev_count" />-->
					<input type="hidden" name="senterid" value="<?php echo base64_encode($_sid); ?>">
					<input type="hidden" name="professionalid" value="<?php echo base64_encode($uid); ?>" >
					<div class="form-group text-center">
						<input type="submit" value="Submit" name="rev_submit" class="btn btn_dflt mb10">
					</div>
				</form>
			</div>
		</div>
	</div>
</div><!-- End modal review -->
<script>
function fillform(id){
	if(id!=""){
		$.ajax({
			type : "post",
			dataType: "JSON",
			url : "fillreview.php?id="+id,	
			success: function(response){
				$("#rev_name").val(response.name);
				$("#rev_email").val(response.email);
				$("#rev_phone").val(response.phone);
				$("#rev_msg").val(response.comment);
				$("#str").val(response.stars);
			}
		});
	}
}
</script>
 <!-- Common scripts -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>

 <!-- Specific scripts -->
<script src="js/icheck.js"></script>
<script>
$('input').iCheck({
   checkboxClass: 'icheckbox_square-grey',
   radioClass: 'iradio_square-grey'
 });
 </script>	
 <!-- Date and time pickers -->
<script src="js/jquery.sliderPro.min.js"></script>
<script type="text/javascript">
	$( document ).ready(function( $ ) {
		$( '#Img_carousel' ).sliderPro({
			width: 960,
			height: 500,
			fade: true,
			arrows: true,
			buttons: false,
			fullScreen: false,
			smallSize: 500,
			startSlide: 0,
			mediumSize: 1000,
			largeSize: 3000,
			thumbnailArrows: true,
			autoplay: false
		});
	});
</script>
<script>
function ratings(){
	var rat = document.getElementById("count").innerHTML;
	document.getElementById('rev_count').value=rat;
}
</script>

 <!-- Date and time pickers -->
 <script src="js/bootstrap-datepicker.js"></script>
 <script>
  $('input.date-pick').datepicker('setDate', 'today');
   </script>
   <script>
			$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
			</script>
 <!-- Map -->
 
<script src="js/infobox.js"></script>
<script src="js/starr.js"></script>
 <!-- Carousel -->
<script src="js/owl.carousel.min.js"></script>
<script>
$(document).ready(function(){   
		$(".carousel").owlCarousel({
		items : 4,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [979,3]
		});
    });
</script>
<script src="js/theia-sticky-sidebar.js"></script>
<script>
    jQuery('#sidebar').theiaStickySidebar({
      additionalMarginTop: 80
    });
</script>


<!--Review modal validation -->
<script src="assets/validate.js"></script>
  </body>
</html>