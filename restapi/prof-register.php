<?php
require "Core/Config.php";

$username=isset($_POST['name']) ? $_POST['name'] : '';
$email=isset($_POST['email']) ? $_POST['email'] : '';
$category=isset($_POST['category']) ? $_POST['category'] : '';
$sub_category=isset($_POST['sub_category']) ? $_POST['sub_category'] : '';
$pwd=isset($_POST['pwd']) ? $_POST['pwd'] : '';
$date=date("Y-m-d");
$code=base64_encode(time()*27);

$p_username=$db->escap($username);
$p_email=$db->escap($email);
$p_password=$db->escap($pwd);
$p_cat=$db->escap($category);
$p_sub_cat=$db->escap($sub_category);
$category=$db->getCategoryid($p_cat);
$sub_category=$db->getCategoryid($p_sub_cat);

$result=$db->fetch("select id from register where email='$email' and user_role='1'");
if($result['id']!="")
{
$rawdata=array("Result" => "EmailID already exists!", "userid"=>"");
}
else
{
$set="fname='$p_username'";
$set.=",user_role='1'";
$set.=",email='$p_email'";
$set.=",password='$p_password'";
$set.=",cat_id='$category'";
$set.=",sub_catid='$sub_category'";
$set.=",temp_key='$code'";
$set.=",crcdt='$date'";
$set.=",active_status='1'";

$insert=$db->retid("insert into register set $set");
	

if($insert){
$rawdata=array("Result"=>"Registration successfull","prof_id"=>$insert);
}
else{
$rawdata=array("Result"=>"Registration failed","prof_id"=>"");
}
}
$raw=array($rawdata);

$rest->DispResponse($raw);
?>