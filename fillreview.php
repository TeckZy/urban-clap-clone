<?php
include "admin/AMframe/config.php";
$getid=$_GET['id'];
if(!empty($getid)){
	$info=$com_obj->getReviewInfo($getid);
	echo json_encode($info);
}
?>