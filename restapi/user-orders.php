<?php
require_once "Core/Config.php";

$userid=isset($_POST['userid']) ? $_POST['userid'] : '';

$rawdata=$db->fetch_all("select * from sent_enquiry where senter_id='$userid' and prof_response!='4' and role ='1'");
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


$qusans5=$r['comp_qusans'];
$qusans5=json_decode($qusans5, true);
$qusid=$qusans5['qus1'];
$getqus5=$db->getQus($qusid);
$r["mainhead"]=!empty($getqus5['main_head'])?$getqus5['main_head']:'';
$r["subhead"]=!empty($getqus5['sub_head'])?$getqus5['sub_head']:'';
$r['type']=$r['role'];

if(($qusans5['ans1'] && $qusans5['qus1'])) 
$r['ans']=$qusans5['ans1'];
elseif(($qusans5['ans2'] && $qusans5['qus1'])) 
$r['ans']=$qusans5['ans2'];
elseif(($qusans5['ans3'] && $qusans5['qus1'])) 
$r['ans']=$qusans5['ans3'];
elseif(($qusans5['ans4'] && $qusans5['qus1'])) 
$r['ans']=$qusans5['ans4'];
elseif(($qusans5['ans5'] && $qusans5['qus1'])) 
$r['ans']=$qusans5['ans5']; 
else 
$r['ans']="";

$a[$i]=$r;
$i++;
}   
$rest->DispResponse($a);
?>