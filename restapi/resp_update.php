<?php
require "Core/Config.php";

$resp_id=isset($_POST['enq_id']) ? $_POST['enq_id'] : '';
$resp_status=isset($_POST['resp_status']) ? $_POST['resp_status'] : '';

if($resp_id!="")
{
$resp_id=$db->escap($resp_id);
$resp_status=$db->escap($resp_status);
$prof_id=$db->Extract_Single("select receiver_id from sent_enquiry where id='$resp_id'");
$fcm_token=$db->Extract_Single("select fcm_token from register where id='$prof_id'");


if($resp_status==2)
{
$db->que("update response set status='6' where responser_autoid='$resp_id'");
$db->que("update sent_enquiry set prof_response='$resp_status' where id='$resp_id'");
$resp_msg="User Not Interested";
$succ=1;
$msg=array
			(
				'message' 	=>$resp_msg ,
				'type'		=> 'request',
				'vibrate'	=> 1,
				'sound'		=> 1,
				'largeIcon'	=> 'large_icon',
				'smallIcon'	=> 'small_icon'
			);
}
else if($resp_status==4)
{
$db->que("update response set status='$resp_status' where responser_autoid='$resp_id'");
$db->que("update sent_enquiry set prof_response='$resp_status' where id='$resp_id'");
$resp_msg="Order Request Completed";
$succ=1;
$msg=array
			(
				'message' 	=>$resp_msg ,
				'type'		=> 'complete',
				'vibrate'	=> 1,
				'sound'		=> 1,
				'largeIcon'	=> 'large_icon',
				'smallIcon'	=> 'small_icon'
			);
}
else 
{
$db->que("update response set status='$resp_status' where responser_autoid='$resp_id'");
$db->que("update sent_enquiry set prof_response='$resp_status' where id='$resp_id'");
$resp_msg="Response Accepted by the User";
$succ=1;
$msg=array
			(
				'message' 	=>$resp_msg ,
				'type'		=> 'request',
				'vibrate'	=> 1,
				'sound'		=> 1,
				'largeIcon'	=> 'large_icon',
				'smallIcon'	=> 'small_icon'
			);
}
$rawdata=array("Result"=>"Success");

}
else
{
$rawdata=array("Result"=>"Failed");
}
$raw=array($rawdata);
$rest->DispResponse($raw);

if($succ==1)
{
$db->notification($fcm_token,$msg);
}
?>