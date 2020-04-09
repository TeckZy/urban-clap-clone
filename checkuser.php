<?php
include "admin/AMframe/config.php";
$user=$_GET['user'];
if(isset($user)){
	$check=$db->singlerec("select count(*) as tot from register where  fname='$user' and user_role='0'");
	$total_v=$check['tot'];
	if($total_v=='0'){
		echo "0"; //valid
	}else{
		echo "1";
	}
}
?>