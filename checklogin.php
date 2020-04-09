<?php
include "admin/AMframe/config.php";
$email=$_GET['lmail'];
$pass=$_GET['pass'];
$role=$_GET['role'];
if(isset($email) && isset($pass)){
	$check=$db->singlerec("select count(*) as tot from register where (email='$email' or fname='$email') and password='$pass' and user_role='$role'");
	$total_v=$check['tot'];
	if(!empty($total_v)){
		echo "2";
	}else{
		echo "3";
	}
}
?>