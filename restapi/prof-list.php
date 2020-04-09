<?php
require_once "Core/Config.php";

$userid=isset($_POST['cat_id']) ? $_POST['cat_id'] : '';

$rawdata=$db->fetch_all("select a.id as prof_id, a.img, a.fname, a.lname, a.exp1, a.exp_dur1, a.estimate_fee, a.fee_duration from register as a LEFT JOIN review on a.id=review.professionalid where a.active_status='1' and a.user_role='1' and a.cat_id='$userid'");
$i=0;
$a=array();
foreach($rawdata as $r)
{
$id=$r['prof_id'];
if($r["img"]!="")
{
$r["img"]=$siteurl.$r["img"];
}
else
{
$r["img"]=$siteurl."uploads/userprofile/noimage.jpg";
}

if($r["lname"]=="")
{
$r["lname"]='';
}

if($r["fname"]=="")
{
$r["fname"]='';
}

$r["hired_times"]=$db->completeProjCount($id);
$r['rating']=$db->getReviewProfcount($id);
$a[$i]=$r;
$i++;
}  
$rest->DispResponse($a);
?>