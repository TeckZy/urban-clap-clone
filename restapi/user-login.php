<?php
//include "includes/title.php";

/* if(isset($code)){
	$getcode=$db->Extract_Single("select id from register where temp_key='$code'");
	$db->insertrec("update register set temp_key='',active_status='1',email_active_status='1' where id='$getcode'");
} */

require "Core/Config.php";

$username=isset($_POST['email']) ? $_POST['email'] : '';
$password=isset($_POST['pwd']) ? $_POST['pwd'] : '';
$fcm_token=isset($_POST['fcm_token']) ? $_POST['fcm_token'] : '';

if($username!="" && $password!=""){
	$username=$db->escap($username);
	$password=$db->escap($password);
	if(!empty($username)){
		$chk=$db->fetch("select * from register where (email='$username' or fname='$username') and password='$password' and user_role='0'");
	
		$status=$chk['active_status'];
		$role='0';
		//$e_status=$chk['email_active_status'];
		if(!empty($chk)){
			if($status==1){
				$_SESSION['id']=$chk['id'];
				$_SESSION['email']=$chk['email'];
				$_SESSION['fname']=$chk['fname'];
				$logo=$siteurl."img/".$sitelogo;
				
				
				$db->que("update register set fcm_token='$fcm_token' where id='$chk[id]'");
				
				$rawdata=array("Result"=>"success","userid"=>$chk['id'], "currency"=>$currency,"logo"=>$logo);
			}
			else if($status==0){
			    $rawdata=array("Result"=>"email activation failed","userid"=>"", "currency"=>"","logo"=>"" );	
			}
			
		}else{
			$rawdata=array("Result"=>"Invalid credentials","userid"=>"", "currency"=>"","logo"=>"" );	
		}
	}
	$raw=array($rawdata);
	
	$rest->DispResponse($raw);
}

?>