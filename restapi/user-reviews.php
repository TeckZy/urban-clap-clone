<?php
require_once "Core/Config.php";

$userid=isset($_POST['userid']) ? $_POST['userid'] : '';
$rawdata=$db->fetch_all("select * from review where user_id='$userid'");
$a=array();
$i=0;
foreach($rawdata as $r)
{
$prof_id=$r['professionalid'];
$us=$db->fetch("select * from register where id='$prof_id'");

$r['prof_name']=$us['fname']." ".$us['lname'];

$r['cat_name']=$db->getCategoryname($us['cat_id']);


$r['prof_id']=$r['professionalid'];


$a[$i]=$r;

$i++;
}

$rest->DispResponse($a);

?>