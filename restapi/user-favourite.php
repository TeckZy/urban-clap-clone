<?php
require_once "Core/Config.php";

$userid=isset($_POST['userid']) ? $_POST['userid'] : '';
$rawdata=$db->fetch_all("select * from favourite where userid='$userid'");
$a=array();
$i=0;
foreach($rawdata as $r)
{
$prof_id=$r['favouriterid'];
$us=$db->fetch("select * from register where id='$prof_id'");
$r['prof_name']=$us['fname']." ".$us['lname'];
$r['cat_name']=$db->getCategoryname($us['cat_id']);

if($us['img']!="")
{
$r['image']=$siteurl.$us['img'];
}
else
{
$r['image']=$siteurl."uploads/userprofile/noimage.jpg";
}
$r['prof_id']=$r['favouriterid'];

$a[$i]=$r;
$i++;
}
   
$rest->DispResponse($a);
?>