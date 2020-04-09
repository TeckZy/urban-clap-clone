<?php


require "Core/Config.php";

$uid=isset($_POST['userid']) ? $_POST['userid'] : '';

if($uid!=""){
$uid=$db->escap($uid);
$uInfo=$db->fetch("select * from register where  id='$uid'");
$_fname=ucfirst($uInfo['fname']);
$_lname=ucfirst($uInfo['lname']);
$_email=$uInfo['email'];
$_phone=$uInfo['contact_no1'];
if($uInfo['country']!="")
{
$country=$db->getCountryname($uInfo['country']);
}
else
{
$country="";
}
if($uInfo['state']!="")
{
$state=$db->getStatename($uInfo['state']);
}
else
{
$state="";
}
if($uInfo['city']!="")
{
$city=$db->getCityname($uInfo['city']);
}
else
{
$city="";
}
$_address=ucfirst($uInfo['user_address']);
$u_img=$uInfo['img'];
if(empty($u_img)){
$u_img=$siteurl."uploads/userprofile/noimage.jpg";
}
$rawdata=array("first-name"=>$_fname,"last-name"=>$_lname,"email"=>$_email, "mobile"=>$_phone, "country"=>$country,"state"=>$state,"city"=>$city,"image"=>$u_img, "address"=>$_address);
$raw=array($rawdata);
$rest->DispResponse($raw);
}

?>


