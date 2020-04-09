<?php
include "admin/AMframe/config.php";
$userid=$_GET['userid'];
$favid=$_GET['favid'];
if(!empty($userid) && !empty($favid)){
	$check=$db->singlerec("select count(*) as tot from favourite where userid='{$userid}' and favouriterid='{$favid}'");
	if($check['tot']==1){
		$db->insertrec("delete from favourite where userid='{$userid}' and favouriterid='{$favid}'");
		echo "0";
	}else{
		echo "1";
	}
}
?>