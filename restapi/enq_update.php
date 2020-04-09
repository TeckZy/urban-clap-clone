<?php
require "Core/Config.php";

$enq_id=isset($_POST['enq_id']) ? $_POST['enq_id'] : '';
$enq_status=isset($_POST['enq_status']) ? $_POST['enq_status'] : '';

if($enq_id!="")
{
$enq_id=$db->escap($enq_id);
$enq_status=$db->escap($enq_status);

$db->que("update sent_enquiry set prof_response='$enq_status' where id='$enq_id'");
$rawdata=array("Result"=>"Success");
$succ='1';
}
else
{
$rawdata=array("Result"=>"Failed");
}
$raw=array($rawdata);
$rest->DispResponse($raw);

if($succ=='1'){
	
	if($enq_status=='3'){
		$prof_id=$db->Extract_Single("select senter_id from sent_enquiry where id='$enq_id'");
		$fcm_token=$db->Extract_Single("select fcm_token from register where id='$prof_id'");
		$msg=array
			(
				'message' 	=> 'Order Request was Accepted',
				'type'		=> 'Order',
				'vibrate'	=> 1,
				'sound'		=> 1,
				'largeIcon'	=> 'large_icon',
				'smallIcon'	=> 'small_icon'
			);
	}else if($enq_status=='4'){
		$prof_id=$db->Extract_Single("select receiver_id from sent_enquiry where id='$enq_id'");
		$fcm_token=$db->Extract_Single("select fcm_token from register where id='$prof_id'");
		$msg=array
			(
				'message' 	=> 'Order Request was Completed',
				'type'		=> 'complete',
				'vibrate'	=> 1,
				'sound'		=> 1,
				'largeIcon'	=> 'large_icon',
				'smallIcon'	=> 'small_icon'
			);
	}
	$db->notification($fcm_token,$msg);
}



?>