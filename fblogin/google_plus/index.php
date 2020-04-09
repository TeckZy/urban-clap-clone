<?php
//@session_start(); //session start
require_once ('../admin/AMframe/config.php');
require_once ('libraries/Google/autoload.php');


//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '360144004572-lcj4ailmjg2c7mg07vpdhk5j6t56848q.apps.googleusercontent.com'; 
$client_secret = 'TR3n4jC1ZmJOIQUWFHy8Nb7k';
$redirect_uri = 'http://thavasu.com/demo/exclusivescript/services/google_plus/';


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
	
	//check if user exist in database using COUNT
	$row= $db->singlerec("select * from register where email='$g_email'");
	$email_count=$db->numrows("select * from register where email='$g_email'");
	$password=base64_encode(rand(0,9999));
	$pass=md5($password);
	 if($email_count==0){

	 		$insert=$db->insertrec("insert into register(email,firstname,password,decrypt_pass,active_status,email_active_status,temp_key,crcdt,login_ip_addr) values ('$g_email','$g_name','$pass','$password','1','1','','$date','$ip')");
	 		
			$userid=$insert;	
			$_SESSION['userid']=$userid;
			
			$to_email = $g_email;
			$fromemail = $siteemail;
			$subject  = "Account activation from $sitetitle";
			$url="$siteurl/signin.php";
			$text="Thank you for registering with us, Kindly click the below link for activating your account <br> <a href='$url'>$url</a><br><br>Your Email Id: $g_email<br> Password: $password<br><br><br>Thanks for joining with us!!!";
			
			$message = $email_temp->style_green($siteinfo,$text,$to_email);
			$com_obj->email($fromemail,$to_email,$subject,$message);
			echo "<script>window.location='$siteurl/settings.php';</script>"; exit;
	}else if($email_count>0){

		$userid=$row['id'];
		$_SESSION['userid']=$userid;
		echo "<script>window.location='$siteurl/settings.php';</script>"; exit;
	}

}


?>

