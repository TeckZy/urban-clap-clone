<?php
include("../admin/AMframe/config.php");
  $gen=$db->singlerec("select * from general_setting where id='1'");
				$fbappid=$db->escapstr($gen['fbappid']);
				$fbkey=$db->escapstr($gen['fbkey']);
				$fbreurl=$db->escapstr($gen['fbreurl']); 
define('APP_ID',$fbappid);
define('APP_SECRET',$fbkey);
define('REDIRECT_URL',$fbreurl);

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
	header("location:$siteurl/login");
	echo "<script>location.href='$siteurl/login';</script>";
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
	$date=date("Y-m-d");
	$ip=$_SERVER['REMOTE_ADDR'];
    $role=$_SESSION['selectrole'];
	$row= $db->singlerec("select * from register where email='$fb_email'");
	$email_count=$db->numrows("select * from register where email='$fb_email'");
    $password="fb".rand(0,999999);
	
	$set="user_role='$role'";
	$set.=",email='$fb_email'";
	$set.=",fname='$fb_fname'";
	$set.=",lname='$fb_lname'";
	$set.=",password='$password'";
	$set.=",active_status='1'";
	$set.=",email_active_status='1'";
	$set.=",temp_key=''";
	$set.=",crcdt='$date'";
	$set.=",reg_ip='$ip'";
	
	$respemail=$row['email'];
	 if($respemail!=$fb_email){
			if($role==0){
				/*user redirection*/
				$insert=$db->insertid("insert into register set $set");
				$uid=$insert;	
				$_SESSION['id']=$uid;
				$_SESSION['email']=$fb_email;
				$_SESSION['fname']=$fb_fname;
				
				$sub="Account Details";
		        $text= "Your Login Details are below,<br><br>Useremail : $fb_email<br>Password : $password";	
		        $url="$siteurl/login";
		        $msg=$email_temp->social_login($url,$text,$siteinfo,$fb_fname);
		        $com_obj->email("",$fb_email,$sub,$msg);
				echo "<script>window.location='$siteurl/user-profile';</script>"; 
			}else if($role==1){
				/*professional redircetion*/
				    $key_specify="";
                   	$jsonspecify=json_encode((object)$key_specify);
	                $key_qualify="";
                  	$jsonqualify=json_encode((object)$key_qualify);
				$set.=",specification1='$jsonspecify'";
		        $set.=",qualification1='$jsonqualify'";
				$insert=$db->insertid("insert into register set $set");
				$uid=$insert;
				$_SESSION['pid']=$uid;
				$_SESSION['pemail']=$fb_email;
				$_SESSION['pfname']=$fb_fname;
				
				$sub="Account Details";
		        $text= "Your Login Details are below,<br><br>Useremail : $fb_email<br>Password : $password";	
		        $url="$siteurl/login";
		        $msg=$email_temp->social_login($url,$text,$siteinfo,$fb_fname);
		        $com_obj->email("",$fb_email,$sub,$msg);
				echo "<script>window.location='$siteurl/prof-dashboard';</script>"; 
			}
			
	}else if($respemail==$fb_email){
		$uid=$row['id'];
		$user_role = $row['user_role'];
		$fname = $row['fname'];
		$logemail = $row['email'];
		$status=$row['active_status'];
		if($user_role==$role){
			/*user redirection*/
			$_SESSION['id']=$uid;
			$_SESSION['email']=$logemail;
			$_SESSION['fname']=$fname;
			header("location:$siteurl/user-profile");
			echo "<script>window.location='$siteurl/user-profile';</script>"; 
			exit;
		}else if($user_role==$role){
			/*professional redircetion*/
			$_SESSION['pid']=$uid;
			$_SESSION['pemail']=$logemail;
			$_SESSION['pfname']=$fname;
			header("location:$siteurl/prof-dashboard");
			echo "<script>window.location='$siteurl/prof-dashboard';</script>"; 
			exit;
		}else if($status==5){
			echo "<script>window.location='$siteurl/login?del';</script>"; 
		}else{
		echo "<script>location.href='$siteurl/login?err';</script>"; 
	}
	}else{
		echo "<script>location.href='$siteurl/login?err';</script>"; 
	}
}else{ 
	$url = $helper->getLoginUrl(array('scope' => 'email'));
	header("location:$url");
	echo "<script>location.href='$url';</script>";
	exit;
}
unset($_SESSION['selectrole']);