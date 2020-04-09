<?php
require_once "Core/Config.php";

$userid=isset($_POST['userid']) ? $_POST['userid'] : '';
$rawdata=$db->fetch_all("select * from review where professionalid='$userid'");
$a=array();
$i=0;
foreach($rawdata as $r)
{
$prof_id=$r['user_id'];
$us=$db->fetch("select * from register where id='$prof_id'");

$r['user_name']=$us['fname']." ".$us['lname'];

$r['prof_id']=$r['professionalid'];


$a[$i]=$r;

$i++;
}

$rest->DispResponse($a);

?>