<?php
include "admin/AMframe/config.php";
$pass=$_GET['pass'];
$email=$_GET['lmail'];
if(isset($pass)){
	$check=$db->singlerec("select count(*) as tot from register where (email='$email' or fname='$email') and password='$pass'");
	$total_v=$check['tot'];
	if(!empty($total_v)){
		echo "2";
	}else{
		echo "3";
	}
}
?>