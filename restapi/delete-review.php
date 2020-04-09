<?php
require "Core/Config.php";
$rev_id=isset($_POST['rev_id']) ? $_POST['rev_id'] : '';
if($rev_id!="")
{
$rev_id=$db->escap($rev_id);

$db->que("delete from review where review_id='$rev_id'");	
	   
$rawdata=array("Result"=>"Success");
}
else
{
$rawdata=array("Result"=>"Failed");
}
$raw=array($rawdata);
$rest->DispResponse($raw);
?>