<?php 
include "AMframe/config.php";
$val=$_GET['val'];
if(!empty($val)){
	$count=$db->singlerec("select count(*) as tot from question_mgmt where cat_id='$val' and question_type!='5' and status='1'");
	echo $count['tot'];
}
?>