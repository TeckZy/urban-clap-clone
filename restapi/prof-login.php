<?php

require "Core/Config.php";

$username=isset($_POST['email']) ? $_POST['email'] : '';
$password=isset($_POST['pwd']) ? $_POST['pwd'] : '';
$fcm_token=isset($_POST['fcm_token']) ? $_POST['fcm_token'] : '';
if($username!="" && $password!=""){
	$username=$db->escap($username);
	$password=$db->escap($password);
	if(!empty($username)){
		$chk=$db->fetch("select * from register where (email='$username' or fname='$username') and password='$password' and user_role='1'");
		$status=$chk['active_status'];
		$role='0';
		//$e_status=$chk['email_active_status'];
		if(!empty($chk)){
			if($status==1){
				$_SESSION['id']=$chk['id'];
				$_SESSION['email']=$chk['email'];
				$_SESSION['fname']=$chk['fname'];
				$db->que("update register set fcm_token='$fcm_token' where id='$chk[id]'");
				$rawdata=array("Result"=>"success","userid"=>$chk['id'], "currency"=>$currency);
			}
			else if($status==0){
			    $rawdata=array("Result"=>"Not Verified Yet","userid"=>"" );	
			}
			
		}else{
			$rawdata=array("Result"=>"Invalid credentials","userid"=>"" );	
		}
	}
	$raw=array($rawdata);
	
	$rest->DispResponse($raw);
}
?>