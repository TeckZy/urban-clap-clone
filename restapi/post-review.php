<?php
require "Core/Config.php";

$rev_msg=isset($_POST['message']) ? $_POST['message'] : '';
$rev_count=isset($_POST['rating']) ? $_POST['rating'] : '';
$userid=isset($_POST['userid']) ? $_POST['userid'] : '';
$prof_id=isset($_POST['prof_id']) ? $_POST['prof_id'] : '';
$rev_id=isset($_POST['rev_id']) ? $_POST['rev_id'] : '';


if($userid!="")
{

	$rev_msg=$db->escap($rev_msg);
	$rev_count=$db->escap($rev_count);
	$senterid=$db->escap($userid);
	$rev_id=$db->escap($rev_id);
	
	$us=$db->fetch("select fname, img, lname, email, contact_no1 from register where 
	id='$senterid'");
	$rev_name=$us['fname']." ".$us['lname'];
	$rev_email=$us['email'];
	$rev_phone=$us['contact_no1'];
	
	if($us['img']!="")
	{
	$img=$siteurl.$us['img'];
	}
	else
	{
	$img=$siteurl."uploads/userprofile/noimage.jpg";
	}
	
	$professionalid=$db->escap($prof_id);
	$userid=$professionalid;
	$date=date("Y-m-d");
	
	$set="user_id='$senterid'";
	$set.=",professionalid='$professionalid'";
	$set.=",stars='$rev_count'";
	$set.=",name='$rev_name'";
	$set.=",comment='$rev_msg'";
	$set.=",phone='$rev_phone'";
	$set.=",email='$rev_email'";
	$set.=",crcdt='$date'";
	$set.=",active_status='0'";
	$getuser=$db->fetch("select * from register where user_role='1' and id='$professionalid'");
    $rating =$db->overall_Rate($getuser['id']);	
	
	    $db->que("update register set overall_rate='$rating' where id='$professionalid' and user_role='1'");	
	if($rev_id){
	  $db->que("update review set $set where review_id='$rev_id'");	
	   
     	
		
	 $rawdata=array("Result"=>"Success", "rev_id"=>$rev_id, "name"=>$rev_name, "image"=>$img, "date"=>$date);
	}
	else
	{
	$qry="insert into review set $set";
	$rev_id=$db->retid($qry);
	$rawdata=array("Result"=>"Success", "rev_id"=>$rev_id, "name"=>$rev_name, "image"=>$img, "date"=>$date);
	}
$raw=array($rawdata);
$rest->DispResponse($raw);
}
?>