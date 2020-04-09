<?php
require_once "Core/Config.php";

$userid=isset($_POST['enq_id']) ? $_POST['enq_id'] : '';
$userid=$db->escap($userid);
$rawdata=$db->fetch("select * from response where responser_autoid='$userid'");
$result=$db->fetch("select * from register where id='$rawdata[responser_id]'");
$prof_id=$result['id'];
$name=$result['fname']." ".$result['lname'];
$rating=$db->getReviewProfcount($prof_id);
$address=$result['user_address'];

$state=$db->getStatename($result['state']);
$country=$db->getCountryname($result['country']);
$message=$rawdata['message'];
$prof_email=$result['email'];
$prof_contact=$result['contact_no1'];
$exp1=$result['exp1'];
$exp2=$result['exp2'];
$expdur1=$result['exp_dur1'];
$expdur2=$result['exp_dur2'];
$location=$result['exp_location'];
$estimate_fee=$result['estimate_fee'];
$fee_duration=$result['fee_duration'];
$hired_times=$db->completeProjCount($result['id']);
if($result['img']!="")
{
$image=$siteurl.$result['img'];
}
else
{
$image=$siteurl."uploads/userprofile/noimage.jpg";
}

$rawdata=array("prof_id"=>$prof_id, "name"=>$name,"rating"=>$rating,"address"=>$address, 
"state"=>$state, "country"=>$country,"message"=>$message,"prof_email"=>$prof_email,
"prof_contact"=>$prof_contact, "exp1"=>$exp1, "exp2"=>$exp2, "expdur1"=>$expdur1, 
"expdur2"=>$expdur2, "location"=>$location, "estimate_fee"=>$estimate_fee, 
"fee_duration"=>$fee_duration, "hired_times"=>$hired_times, "image"=>$image );

$raw=array($rawdata);

$rest->DispResponse($raw);

?>