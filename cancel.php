<?php
include "admin/AMframe/config.php";
$id=$_GET['id'];
$resid=$_GET['resid'];
if(!empty($id) && !empty($resid)){
	$sq1 = $db->insertrec("update response set status='6' where responser_autoid='{$resid}'");
	$sq2 = $db->insertrec("update sent_enquiry set prof_response='2' where id='{$resid}'");
	
	if($sq1 && $sq2)
		echo 1;
	else
		echo 0;
	
	
}
?>