<?php
require_once "Core/Config.php";

$userid=isset($_POST['userid']) ? $_POST['userid'] : '';
	
if($userid!="")
{

$userid=$db->escap($userid);

$order_count=$db->Extract_Single("select count(*) as cnt from sent_enquiry 
where role='1' and status!='6' and ( prof_response='0' or prof_response='3') and receiver_id='$userid'");

$req_count=$db->Extract_Single("select count(*) as cnt1 from sent_enquiry 
where role='0' and status!='6'  and ( prof_response='0' or prof_response='3') and receiver_id='$userid'");

$uInfo=$db->fetch("select * from register where  id='$userid'");
$name=ucfirst($uInfo['fname'])." ".ucfirst($uInfo['lname']);
$logo=$siteurl."img/".$sitelogo;
}



$rawdata=array("order_count"=>$order_count,"req_count"=>$req_count,"name"=>$name,"logo"=>$logo);

$orders=$db->fetch_all("select * from sent_enquiry where 
receiver_id='$userid' and role='1' and status!='6'  and ( prof_response='0' or prof_response='3' or prof_response='4') 
order by id desc limit 4");

$request=$db->fetch_all("select * from sent_enquiry where 
receiver_id='$userid' and role='0' and status!='6'  and ( prof_response='0' or prof_response='3' or prof_response='4') 
order by id desc limit 4");

$order_list=array();
$i=0;

foreach($orders as $r)
{
$resp=$db->fetch("select * from response where responser_autoid='$r[id]'");
$usrd=$db->fetch("select * from register where id='$r[senter_id]'");

$r['user_name']=$usrd['fname'].$usrd['lname'];
$r['user_email']=$usrd['email'];
$r['user_mobile']=$usrd['contact_no1'];
$r['user_address']=$usrd['user_address'];

$respstat=$resp['status'];
$responser_name=$resp['responser_id'];
$resp_name=$db->get_name($r['senter_id']);
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

$order_list[$i]=$r;
$i++; 
}

$request_list=array();
$j=0;

foreach($request as $r)
{
$resp=$db->fetch("select * from response where responser_autoid='$r[id]'");
$usrd=$db->fetch("select * from register where id='$r[senter_id]'");

$r['user_name']=$usrd['fname'].$usrd['lname'];
$r['user_email']=$usrd['email'];
$r['user_mobile']=$usrd['contact_no1'];
$r['user_address']=$usrd['user_address'];

$respstat=$resp['status'];
$responser_name=$resp['responser_id'];
$resp_name=$db->get_name($r['senter_id']);
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

$request_list[$j]=$r;
$j++; 
}

$raw=array();
$raw[0]["details"][0]=$rawdata;
$raw[1]["orders"]=$order_list; 
$raw[2]["request"]=$request_list;  
$rest->DispResponse($raw);
?>