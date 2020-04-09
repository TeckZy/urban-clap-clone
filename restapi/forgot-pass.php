<?php
require "Core/Config.php";

$email=isset($_POST['email']) ? $_POST['email'] : '';


if($email!=""){

	$email=$db->escap($email);
	
	$getpsw=$db->getPsw($email);
	if(!empty($getpsw)){
		$subject="Forget Password";
		$getres=$email_temp->forgotpass($siteinfo,$getpsw);
		$email_temp->email($from_email,$email,$subject,$getres);
		$rawdata=array("Result"=>"Success");
	}
else
	{
	$rawdata=array("Result"=>"Failed");
	}
}
$raw=array($rawdata);
$rest->DispResponse($raw);
?>