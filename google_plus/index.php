<?php
//@session_start(); //session start
require_once ('../admin/AMframe/config.php');
require_once ('libraries/Google/autoload.php');

  $gen=$db->singlerec("select * from general_setting where id='1'");
				$gappid=$db->escapstr($gen['gappid']);
				$gkey=$db->escapstr($gen['gkey']);
				$greurl=$db->escapstr($gen['greurl']); 
//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = $gappid;
$client_secret = $gkey;
$redirect_uri = $greurl;


//incase of logout request, just unset the session var
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
}

/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

//$client->setScopes(array("https://www.googleapis.com/auth/plus.me https://www.googleapis.com/auth/moderator"));
//$client->setScopes(array("https://www.googleapis.com/auth/plus.profile.emails.read"));

//https://www.googleapis.com/auth/plus.profile.emails.read https://www.googleapis.com/auth/userinfo.email //https://www.googleapis.com/auth/plus.profile.emails.read https://www.googleapis.com/auth/userinfo.profile

/************************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 ************************************************/
$service = new Google_Service_Oauth2($client);

/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
*/
  
if (isset($_GET['code'])) {

  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}


//Display user info or display login url as per the info we have.
//echo '<div style="margin:20px">';
if (isset($authUrl)){ 
	header("location:$authUrl");
	echo "<script>location.href='$authUrl';</script>";
	exit;
} else {
	$user = $service->userinfo->get(); //get user info 
	$g_name=$user->name;
	$g_email=$user->email;
	//echo "Name : $g_name <br>";
//	echo "Email :$g_email <br>";exit;
	$date=date("Y-m-d");
	$ip=$_SERVER['REMOTE_ADDR'];
	$role=$_SESSION['gooleselectrole'];

	$row= $db->singlerec("select * from register where email='$g_email'");
	$email_count=$db->numrows("select * from register where email='$g_email'");
	$password="gp".rand(0,999999);
	
	$set="user_role='$role'";
	$set.=",email='$g_email'";
	$set.=",fname='$g_name'";
	$set.=",password='$password'";
	$set.=",active_status='1'";
	$set.=",email_active_status='1'";
	$set.=",temp_key=''";
	$set.=",crcdt='$date'";
	$set.=",reg_ip='$ip'";
	
	$respemail=$row['email'];
	 if($respemail!=$g_email){
			if($role==0){
				/*user redirection*/
				$insert=$db->insertid("insert into register set $set");
				$uid=$insert;	
				$_SESSION['id']=$uid;
				$_SESSION['email']=$g_email;
				$_SESSION['fname']=$g_name;
				
				$sub="Account Details";
		        $text= "Your Login Details are below,<br><br>Username : $g_email<br>Password : $password";	
		        $url="$siteurl/login";
		        $msg=$email_temp->social_login($url,$text,$siteinfo,$g_name);
		        $com_obj->email("",$g_email,$sub,$msg);
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
				$_SESSION['pemail']=$g_email;
				$_SESSION['pfname']=$g_name;
				
				$sub="Account Details";
		        $text= "Your Login Details are below,<br><br>Username : $g_email<br>Password : $password";	
		        $url="$siteurl/login";
		        $msg=$email_temp->social_login($url,$text,$siteinfo,$g_name);
		        $com_obj->email("",$g_email,$sub,$msg);
				echo "<script>window.location='$siteurl/prof-dashboard';</script>"; 
			}
			
	}else if($respemail!=$g_email){
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

}
unset($_SESSION['gooleselectrole']);

?>

<input type='hidden' autocomplete='off' class='form-control'  name='key_specify[]' value=''>
<input type='hidden' autocomplete='off' class='form-control'  name='key_qualify[]' value=''>