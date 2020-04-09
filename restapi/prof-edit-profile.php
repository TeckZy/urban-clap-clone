<?php
require "Core/Config.php";

$userid=isset($_POST['userid']) ? $_POST['userid'] : '';
$lastname=isset($_POST['lname']) ? $_POST['lname'] : '';
$mobile=isset($_POST['mobile']) ? $_POST['mobile'] : '';
$country=isset($_POST['country']) ? $_POST['country'] : '';
$state=isset($_POST['state']) ? $_POST['state'] : '';
$city=isset($_POST['city']) ? $_POST['city'] : '';
$address=isset($_POST['address']) ? $_POST['address'] : '';
$category=isset($_POST['category']) ? $_POST['category'] : '';
$sub_category=isset($_POST['sub_category']) ? $_POST['sub_category'] : '';
$exp1=isset($_POST['exp1']) ? $_POST['exp1'] : '';
$exp2=isset($_POST['exp2']) ? $_POST['exp2'] : '';
$expdur1=isset($_POST['expdur1']) ? $_POST['expdur1'] : '';
$expdur2=isset($_POST['expdur2']) ? $_POST['expdur2'] : '';
$location=isset($_POST['location']) ? $_POST['location'] : '';
$estimate_fee=isset($_POST['estimate_fee']) ? $_POST['estimate_fee'] : '';
$fee_duration=isset($_POST['fee_duration']) ? $_POST['fee_duration'] : '';
$prf_intro=isset($_POST['intro']) ? $_POST['intro'] : '';

$doc1=isset($_POST['doc_image']) ? $_POST['doc_image'] : '';
$doc1_name = isset($_POST['doc_image_name'])? $_POST['doc_image_name'] : '';


$specify=isset($_POST['key_specify']) ? $_POST['key_specify'] : '';
$key_specify=explode(",", $specify);
$qualify=isset($_POST['key_qualify']) ? $_POST['key_qualify'] : '';
$key_qualify=explode(",", $qualify);


if($userid!="")
{
	$prf_lastname=$db->escap($lastname);
	$prf_phone=$db->escap($mobile);
	$country=$db->escap($country);
	$country=$db->getCountryid($country);
	$state=$db->escap($state);
	$state=$db->getStateid($state);
	$city=$db->escap($city);
	$city=$db->getCityid($city);
	$prf_address=$db->escap($address);
	$prf_intro=$db->escap($prf_intro);
	
	$prf_cat=$db->escap($category);
	$prf_cat=$db->getCategoryid($prf_cat);
	
	$prf_sub=$db->escap($sub_category);
	$prf_sub=$db->getCategoryid($prf_sub);
	
	
	$prf_explocation=$db->escap($prf_explocation);
	$prf_exp=$db->escap($exp1);
	$prf_expp=$db->escap($exp2);
	$prf_exp1=$db->escap($expdur1);
	$prf_expp1=$db->escap($expdur2);
	$prf_locality=$db->escap($location);
	$prf_fee=$db->escap($estimate_fee);
	$prf_amt=$db->escap($fee_duration);
	$chg_date=date("Y-m-d H:i:s");
$jsonspecify=json_encode((object)$key_specify);
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
	$set .=",specification1='$jsonspecify'";
	$set .=",qualification1='$jsonqualify'";
	$set .=",estimate_fee='$prf_fee'";
	$set .=",fee_duration='$prf_amt'";
	$set .=",exp1='$prf_exp'";
	$set .=",exp2='$prf_expp'";
	$set .=",exp_dur1='$prf_exp1'";
	$set .=",exp_dur2='$prf_expp1'";
	$set .=",exp_location='$prf_locality'";
	$set .=",chngdt='$chg_date'";
	
if($doc1!="")
 {
            $name=$db->Extract_Single("select doc_img1 from register where id='$userid'");
			$getext = substr(strrchr($doc1_name, '.'), 1);
			$ext = strtolower($getext);
			$name2 = rand(11111,99999).uniqid().".".$ext;
			if($name!="")
			{
			$url="../uploads/profdoc/$name";
			unlink($url);
			}
			$set ="doc_img1='$name2'"; 
			file_put_contents("../uploads/profdoc/$name2",base64_decode($doc1));
			
} 
	
	$error="";
	
	$result=$db->que("update register set $set where id='$userid'");
	
if($result){
$rawdata=array("Result"=>"Success");
}
}
else
{
$rawdata=array("Result"=>"Failed");
}
$raw=array($rawdata);
$rest->DispResponse($raw);
?>