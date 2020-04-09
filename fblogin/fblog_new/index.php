<?php
include("../admin/AMframe/config.php");
define('APP_ID', '144384326320532');
define('APP_SECRET', '2217a132322608fef2c7b34fea61c8d5');
define('REDIRECT_URL','http://thavasu.com/demo/exclusivescript/services/fblog_new');

require_once('lib/Facebook/FacebookSession.php');
require_once('lib/Facebook/FacebookRequest.php');
require_once('lib/Facebook/FacebookResponse.php');
require_once('lib/Facebook/FacebookSDKException.php');
require_once('lib/Facebook/FacebookRequestException.php');
require_once('lib/Facebook/FacebookRedirectLoginHelper.php');
require_once('lib/Facebook/FacebookAuthorizationException.php');
require_once('lib/Facebook/FacebookAuthorizationException.php');
require_once('lib/Facebook/GraphObject.php');
require_once('lib/Facebook/GraphUser.php');
require_once('lib/Facebook/GraphSessionInfo.php');
require_once('lib/Facebook/Entities/AccessToken.php');
require_once('lib/Facebook/HttpClients/FacebookCurl.php');
require_once('lib/Facebook/HttpClients/FacebookHttpable.php');
require_once('lib/Facebook/HttpClients/FacebookCurlHttpClient.php');

//USING NAMESPACES
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphSessionInfo;
use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookCurl;

FacebookSession::setDefaultApplication(APP_ID,APP_SECRET);
$helper = new FacebookRedirectLoginHelper(REDIRECT_URL);
$sess = $helper->getSessionFromRedirect();

if(isset($error)) {
	header("location:$siteurl/signin.php");
	echo "<script>location.href='$siteurl/signin.php';</script>";
	exit;
}

if(isset($sess)){
	$request  = new FacebookRequest($sess, 'GET', '/me?fields=first_name,last_name,email');
	//fields=name,first_name,last_name,email,link,gender,locale,picture
	$response = $request->execute();
	$graph = $response->getGraphObject(GraphUser::className());
	$fb_fname = $graph->getFirstName();
	$fb_lname = $graph->getLastName();
	$fb_email= $graph->getEmail();
	//echo $fb_fname;exit;
	$date=date("Y-m-d");
	$ip=$_SERVER['REMOTE_ADDR'];
	$row= $db->singlerec("select * from register where email='$fb_email'");
	$email_count=$db->numrows("select * from register where email='$fb_email'");
	$password=base64_encode(rand(0,9999));
	$pass=md5($password);

	 if($email_count==0){

		$insert=$db->insertid("insert into register(email,firstname,lastname,user_type,password,decrypt_pass,active_status,email_active_status,temp_key,crcdt,login_ip_addr) values ('$fb_email','$fb_fname','$fb_lname','','$pass','$password','1','1','','$date','$ip')");
	
			$userid=$insert;	
            $_SESSION['userid']=$userid;
			
			$to_email = $fb_email;
			$fromemail = $siteemail;
			$subject  = "Account activation from $sitetitle";
			$url="$siteurl/signin.php";
			$text="Thank you for registering with us, Kindly click the below link for activating your account <br> <a href='$url'>$url</a><br><br>Your Email Id: $fb_email<br> Password: $password<br><br><br>Thanks for joining with us!!!";
			$message = $email_temp->style_green($siteinfo,$text,$to_email);
			$com_obj->email($fromemail,$to_email,$subject,$message);
			echo "<script>window.location='$siteurl/settings.php';</script>"; exit;
		
	}else if($email_count>0){

		$userid=$row['id'];
		$_SESSION['userid']=$userid;
		echo "<script>window.location='$siteurl/settings.php';</script>"; exit;
	}
}else{ 
	$url = $helper->getLoginUrl(array('scope' => 'email'));
	header("location:$url");
	echo "<script>location.href='$url';</script>";
	exit;
}