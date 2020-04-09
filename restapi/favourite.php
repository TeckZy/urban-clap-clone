<?php
require_once "Core/Config.php";

$userid=isset($_POST['userid']) ? $_POST['userid'] : '';
$prof_id=isset($_POST['prof_id']) ? $_POST['prof_id'] : '';
$key=isset($_POST['key']) ? $_POST['key'] : '';
if($key==1)
{
$date=date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];
$set="userid='$userid'";
$set.=",favouriterid='$prof_id'";
$set.=",ip='$ip'";
$set.=",crcdt='$date'";
$set.=",status='0'";
$que=$db->que("insert into favourite set $set");
}
else
{
$que=$db->que("delete from favourite where userid='$userid' and favouriterid='$prof_id'");
}

if($que)
{
$rawdata=array("Result"=>"Success");

}	   
$rest->DispResponse(array($rawdata));
?>