<?php
include "admin/AMframe/config.php";
$roleid=isset($role)?$role:'';
if($roleid==1){
	$_SESSION['gooleselectrole']=$roleid;
	echo 1;
}else if($roleid==0){
	$_SESSION['gooleselectrole']=$roleid;
	echo 0;
}
?>