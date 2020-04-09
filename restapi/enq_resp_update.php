<?php
require "Core/Config.php";

$enq_id=isset($_POST['enq_id']) ? $_POST['enq_id'] : '';
$senter_id=isset($_POST['user_id']) ? $_POST['user_id'] : '';
$responser_id=isset($_POST['prof_id']) ? $_POST['prof_id'] : '';
$cat_id=isset($_POST['cat_id']) ? $_POST['cat_id'] : '';
$contact_no=isset($_POST['contact_no']) ? $_POST['contact_no'] : '';
$email=isset($_POST['email']) ? $_POST['email'] : '';
$message=isset($_POST['message']) ? $_POST['message'] : '';


if($enq_id!="")
{
$responser_autoid=$db->escap($enq_id);
$responser_id=$db->escap($responser_id);
$senter_id=$db->escap($senter_id);
$fcm_token=$db->Extract_Single("select fcm_token from register where id='$senter_id'");
$cat_id=$db->escap($cat_id);
$contact_no=$db->escap($contact_no);
$email=$db->escap($email);
$message=$db->escap($message);
$date=date("Y-m-d");

$set="senter_id='$senter_id'";
$set.=",responser_id='$responser_id'";
$set.=",responser_autoid='$responser_autoid'";
$set.=",cat_id='$cat_id'";
$set.=",contact_no='$contact_no'";
$set.=",email='$email'";
$set.=",message='$message'";
$set.=",crcdt='$date'";
$set.=",status='1'";
	
$db->que("insert into response set $set");
$db->que("update sent_enquiry set prof_response='1' where id='$responser_autoid'");
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
	$msg=array
			(
				'message' 	=> 'New Response Received',
				'type'		=> 'request',
				'vibrate'	=> 1,
				'sound'		=> 1,
				'largeIcon'	=> 'large_icon',
				'smallIcon'	=> 'small_icon'
			);
$db->notification($fcm_token,$msg);
}	
?>