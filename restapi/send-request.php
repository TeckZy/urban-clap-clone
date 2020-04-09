<?php
require "Core/Config.php";

$senter_id=isset($_POST['senter_id']) ? $_POST['senter_id'] : '';
$cat_id=isset($_POST['cat_id']) ? $_POST['cat_id'] : '';
$ans=isset($_POST['ans']) ? $_POST['ans'] : '';
$ch1="";
$k=1;
$date=date("Y-m-d");
$as1="1";
$as2="2";
$as3="3";
$as4="4";
$as5="5";
$ip = $_SERVER['REMOTE_ADDR'];
if($senter_id!="")
{
	$senter_id=$db->escap($senter_id);
	
	$cat_id=$db->escap($cat_id);
	$ans=$db->escap($ans);
	
	$ans1=explode("*,*", $ans);
	$budjet=explode("-", $ans1[0]);
	$from=$budjet[0];
	$to=$budjet[1];
	
	$size=sizeof($ans1);
	$location=$ans1[$size-1];
	
$ch_ay=explode(":", $ans1[1]);
    $ch=$ch_ay[0];
	$ans2=$ch_ay[1];


if($ch==$as1)
{
$anss1=$ans2;

}
else
{
$anss1="";
}

if($ch==$as2)
{
$anss2=$ans2;

}
else
{
$anss2="";
}

if($ch==$as3)
{
$anss3=$ans2;

}
else
{
$anss3="";
}

if($ch==$as4)
{
$anss4=$ans2;

}
else
{
$anss4="";
}

if($ch==$as5)
{
$anss5=$ans2;

}
else
{
$anss5="";
}

$json_comp1=json_encode(array("qus1" => "", "ans1" => "",
								 "qus2" => "", "ans2" => "",
								 "qus3" => "", "ans3" => "",
								 "qus4" => "", "ans4" => "",
								 "qus5" => "", "ans5" => ""));

$json_comp=json_encode(array("qus1" => "14", "ans1" => $anss1,
								 "qus2" => "14", "ans2" => $anss2,
								 "qus3" => "14", "ans3" => $anss3,
								 "qus4" => "14", "ans4" => $anss4,
								 "qus5" => "14", "ans5" => $anss5));

	$set="senter_id='$senter_id'";
	
	$set.=",cat_id='$cat_id'";
	$set.=",qusans1='$json_comp1'";
	$set.=",qusans2='$json_comp1'";
	$set.=",qusans3='$json_comp1'";
	$set.=",qusans4='$json_comp1'";
	$set.=",comp_qusans='$json_comp'";
	$set.=",comp_budget_from='$from'";
	$set.=",comp_budget_to='$to'";
	$set.=",comp_location='$location'";
	$set.=",ip='$ip'";
	$set.=",crcdt='$date'";
	$set.=",status='0'";
	$set.=",role='0'";

$rec_id=$db->fetch_all("select id, fcm_token from register where cat_id='$cat_id' and user_role='1'");
foreach($rec_id as $rec)
{
$st=",receiver_id='$rec[id]'";
$result=$db->que("insert into sent_enquiry set $set $st");
}
$rawdata=array("Result"=>"Success");
$succ=1;
}
else
{
$rawdata=array("Result"=>"Failed");
}
$raw=array($rawdata);
$rest->DispResponse($raw); 

if($succ==1)
{
foreach($rec_id as $rec)
{
$fcm_token=$rec['fcm_token'];
$msg=array
			(
				'message' 	=> 'New Request Received',
				'type'		=> 'request',
				'vibrate'	=> 1,
				'sound'		=> 1,
				'largeIcon'	=> 'large_icon',
				'smallIcon'	=> 'small_icon'
			);
$db->notification($fcm_token,$msg);
}
}
?>