<?php
require "Core/Config.php";


$username=isset($_POST['name']) ? $_POST['name'] : '';
$email=isset($_POST['email']) ? $_POST['email'] : '';
$pwd=isset($_POST['pwd']) ? $_POST['pwd'] : '';
$date=date("Y-m-d");
$code=base64_encode(time()*27);

if($email!="" && $pwd!=""){
	
	$result=$db->fetch("select id from register where email='$email'");
	if($result['id']!="")
	{
    $rawdata=array("Result" => "EmailID already exists!");
	}
	else
	{
$set="fname='$username'";
$set.=",user_role='0'";
$set.=",email='$email'";
$set.=",password='$pwd'";
$set.=",temp_key='$code'";
$set.=",crcdt='$date'";
$set.=",active_status='1'";

		
//$insert=$db->que("insert into register set $set");
$insert=$db->retid("insert into register set $set");
	

if($insert){
$rawdata=array("Result"=>"Registration successfull");
}
else{
$rawdata=array("Result"=>"Registration failed");
}
}

$raw=array($rawdata);

$rest->DispResponse($raw);
}
?>