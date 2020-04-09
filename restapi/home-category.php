<?php
require_once "Core/Config.php";

$rawdata=$db->fetch_all("select * from category where parent_id='0' and active_status='1'");
$i=0;
$a=array();
foreach($rawdata as $r)
{
$r["img"]=$siteurl."admin/uploads/category/".$r["img"];
$a[$i]=$r;
$i++;
} 
$rest->DispResponse($a);
?>