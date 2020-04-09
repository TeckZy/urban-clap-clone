<?php
include "admin/AMframe/config.php";
$id=isset($id)?$id:'';
$getcount=$com_obj->getLastCount($id);
if(!empty($id)){
	$totalcount=$getcount+1;
	$db->insertrec("update banner set click_count='$totalcount' where ban_id='$id'");
}
?>