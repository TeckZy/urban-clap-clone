<?php
require_once "Core/Config.php";

$userid=isset($_POST['userid']) ? $_POST['userid'] : '';

$rawdata=$db->fetch_all("select * from sent_enquiry where senter_id='$userid' and prof_response!='4' and role ='0'");
$i=0;


$a=array();
foreach($rawdata as $r)
{
$resp=$db->fetch("select * from response where responser_autoid='$r[id]'");
$respstat=$resp['status'];
$responser_name=$resp['responser_id'];
	if(empty($responser_name)){
		$resp_name=$db->get_name($r['receiver_id']);
	}else{
		$resp_name=$db->get_name($responser_name);
	}
$r['date']=	$r['crcdt'];
$cat=$db->getCategoryname($r['cat_id']);

if($cat=="")
{
$r['cat_name']="";
}
else
{
$r['cat_name']=$cat;
}
$r["name"]=$resp_name;
$r["type"]=$r["role"];

$a[$i]=$r;
$i++;
}   
$rest->DispResponse($a);
?>