<?php
include "AMframe/config.php";
$emailx=isset($emailx)?$emailx:'';
if(isset($emailx)){
	$chk=$db->singlerec("select count(*) as tot from register where email='$emailx' and user_role='0'");
	$total=$chk['tot'];
	if($total=='0'){
		echo "0";  //valid
	}else{
		echo "1";
	}
}

?>