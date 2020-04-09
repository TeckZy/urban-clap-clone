<?php
require_once "Core/Config.php";

$userid=isset($_POST['userid']) ? $_POST['userid'] : '';
$image=isset($_POST['image']) ? $_POST['image'] : '';
$imagename = isset($_POST['imagename'])? $_POST['imagename'] : '';


 if($userid!="")
 
{
            $name=$db->Extract_Single("select img from register where id='$userid'");
			$getext = substr(strrchr($imagename, '.'), 1);
			$ext = strtolower($getext);
			$name2 = "uploads/userprofile/".rand(11111,99999).uniqid().".".$ext;
			if($name!="")
			{
			$url="../$name";
			unlink($url);
			}
			$set ="img='$name2'"; 
			file_put_contents("../$name2",base64_decode($image));
		} 
	
		$db->que("update register set $set where id='$userid'");
		$rawdata=array("Result"=>"Success");
		$raw=array($rawdata);
		$rest->DispResponse($raw);