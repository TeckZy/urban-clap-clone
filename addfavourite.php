<?php
include "admin/AMframe/config.php";
$userid=$_GET['userid'];
$favid=$_GET['favid'];
if(!empty($userid) && !empty($favid)){
	$check=$db->singlerec("select count(*) as tot from favourite where userid='{$userid}' and favouriterid='{$favid}'");
	if($check['tot']==0){
		$date=date("Y-m-d H:i:s");
		$ip=$_SERVER['REMOTE_ADDR'];
		$set="userid='$userid'";
		$set.=",favouriterid='$favid'";
		$set.=",ip='$ip'";
		$set.=",crcdt='$date'";
		$set.=",status='0'";
		$db->insertrec("insert into favourite set $set");
		echo "0";
	}else{
		echo "1";
	}
}
?>