<?php
require "Core/Config.php";

$userid=isset($_POST['userid']) ? $_POST['userid'] : '';
$lastname=isset($_POST['lname']) ? $_POST['lname'] : '';
$mobile=isset($_POST['mobile']) ? $_POST['mobile'] : '';
$country=isset($_POST['country']) ? $_POST['country'] : '';
$state=isset($_POST['state']) ? $_POST['state'] : '';
$city=isset($_POST['city']) ? $_POST['city'] : '';
$address=isset($_POST['address']) ? $_POST['address'] : '';

if($userid!="")
{
	$_id=$db->escap($userid);
    $d_lastname=$db->escap($lastname);
	$d_phone=$db->escap($mobile);
	$country=$db->escap($country);
	$state=$db->escap($state);
	$city=$db->escap($city);
	$address=$db->escap($address);
	$country_id=$db->getCountryid($country);
	$state_id=$db->getStateid($state);
	$city_id=$db->getCityid($city);
	
	$set="lname='$d_lastname'";
	$set.=",contact_no1='$d_phone'";
	$set.=",country='$country_id'";
	$set.=",state='$state_id'";
	$set.=",city='$city_id'";
	$set.=",user_address='$address'";
	$result=$db->que("update register set $set where id='$_id'");
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