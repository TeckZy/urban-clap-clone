<?php
date_default_timezone_set('Asia/Kolkata');
ob_start();
require_once "Database.php";
require_once "Rest.php";
$db=new Database();
$rest=new Rest();
$ContentType='application/json';

$email_temp = new emailtemplate();

// API access key from FCM API's Console for notification
define( 'API_ACCESS_KEY', 'AAAAFT0t0ng:APA91bFm7sBjMY0weyVOfMXZBMtO0EVJuAAR1qgYfo6RQYzpvVIrtmzsuIy6lpKpbBmuMdE9-kj2Mp06r-vMRy3d70cKOc0ET1NCMMkbv8P6bifO4sVkWYfxcguK4JRaDZfGcDmD5ZgP' );


$GetSite = $db->fetch("select * from general_setting where id='1'");
$currency=$GetSite['currency'];
$siteurl = $GetSite['website_url'];

$sitelogo = $GetSite['img'];
$sitetitle = ucwords($GetSite['website_title']);
$sitetitle_main = $sitetitle;
$siteurl = $GetSite['website_url'];
$siteemail = $GetSite['admin_email'];
$from_email = $siteemail;
$fburl = $GetSite['fburl'];
$twurl = $GetSite['twurl'];
$gpurl = $GetSite['gplusurl'];
//$admin_commission=$GetSite['comm_per_ride'];
$lnurl = $GetSite['linkedinurl'];
//$amt_per_referral = $GetSite['amt_per_referral'];
$sitelogo = $GetSite['img'];
//$sitepaypalemil = $GetSite['paypal_email'];
//$site_currency = $GetSite['default_currency'];
$admin_no = $GetSite['admin_phno'];
//$amt_per_referral = $GetSite['amt_per_referral'];
//$paypalkey=$GetSite['paypal_api_key'];
//$paypalenv=$GetSite['paypal_env'];
$siteinfo = array("siteemail"=>$siteemail,"siteurl"=>$siteurl,
					"sitetitle"=>$sitetitle,
					"sitelogo"=>$sitelogo,
					"fburl"=>$fburl,
					"twurl"=>$twurl,
					"gpurl"=>$gpurl,
					"lnurl"=>$lnurl,
                                        "adminno"=>$admin_no);  
   
?>