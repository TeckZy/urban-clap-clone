<?php
require "Core/Config.php";

$userid=isset($_POST['userid']) ? $_POST['userid'] : '';
$curpsw=isset($_POST['password']) ? $_POST['password'] : '';
$newpsw=isset($_POST['new-password']) ? $_POST['new-password'] : '';
$conpsw=isset($_POST['confirm-password']) ? $_POST['confirm-password'] : '';

if($userid!=""){
	$userid=$db->escap($userid);
	$curpsw=$db->escap($curpsw);
	$newpsw=$db->escap($newpsw);
	$conpsw=$db->escap($conpsw);
	$pass=$db->Extract_Single("select password from register where id='$userid'");
	
	
	if(($newpsw==$conpsw) &&($curpsw==$pass))
	{

		$db->que("update register set password='$newpsw' where id='$userid'");
		$rawdata=array("Result"=>"Success");
	}
	else
	{
	$rawdata=array("Result"=>"Failed");
	}
}
else
{
$rawdata=array("Result"=>"Failed");
}
$raw=array($rawdata);
$rest->DispResponse($raw);
?>