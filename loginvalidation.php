<?php
include "admin/AMframe/config.php";
$mail=$_GET['mail'];
$role=$_GET['role'];
if(isset($mail)){
	$chk=$db->singlerec("select count(*) as tot from register where (email='$mail' or fname='$mail') and user_role='$role'");
	$total=$chk['tot'];
	if(!empty($total)){
		echo "0";
	}else{
		echo "1";
	}
}

?>