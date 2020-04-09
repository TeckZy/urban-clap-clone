<?php
include "admin/AMframe/config.php";
$mail=$_GET['mail'];
if(isset($mail)){
	$chk=$db->singlerec("select count(*) as tot from register where email='$mail' and user_role='1'");
	$total=$chk['tot'];
	if($total=='0'){
		echo "0"; //valid
	}else{
		echo "1";
	}
}

?>