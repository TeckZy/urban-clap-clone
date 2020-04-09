<?php
require "Core/Config.php";

$uid=isset($_POST['userid']) ? $_POST['userid'] : '';

if($uid!=""){
$uid=$db->escap($uid);
$uInfo=$db->fetch("select * from register where  id='$uid'");
$_fname=ucfirst($uInfo['fname']);
$_lname=ucfirst($uInfo['lname']);
$_email=$uInfo['email'];
$_phone=$uInfo['contact_no1'];
$_intro=$uInfo['about_self'];
$exp1=$uInfo['exp1'];
$exp2=$uInfo['exp2'];
$expdur1=$uInfo['exp_dur1'];
$expdur2=$uInfo['exp_dur2'];
$location=$uInfo['exp_location'];
$estimate_fee=$uInfo['estimate_fee'];
$fee_duration=$uInfo['fee_duration'];
$aru=$uInfo['specification1'];

$aru=$uInfo['specification1'];
									$spec1=json_decode($aru,true);
									$specify0=isset($spec1['0'])?$spec1['0']:'';
									$specify1=isset($spec1['1'])?$spec1['1']:'';
									$specify2=isset($spec1['2'])?$spec1['2']:'';
									$specify3=isset($spec1['3'])?$spec1['3']:'';
									$specify4=isset($spec1['4'])?$spec1['4']:'';
									$specify5=isset($spec1['5'])?$spec1['5']:'';
									$specify6=isset($spec1['6'])?$spec1['6']:'';
									$specify7=isset($spec1['7'])?$spec1['7']:'';
									$specify8=isset($spec1['8'])?$spec1['8']:'';
									$specify9=isset($spec1['9'])?$spec1['9']:'';
									$specify10=isset($spec1['10'])?$spec1['10']:'';
$qual=$uInfo['qualification1'];
									$qualif1=json_decode($qual,true);
									$qualif0=isset($qualif1['0'])?$qualif1['0']:'';
									$qualif11=isset($qualif1['1'])?$qualif1['1']:'';
									$qualif2=isset($qualif1['2'])?$qualif1['2']:'';
									$qualif3=isset($qualif1['3'])?$qualif1['3']:'';
									$qualif4=isset($qualif1['4'])?$qualif1['4']:'';
									$qualif5=isset($qualif1['5'])?$qualif1['5']:'';
									$qualif6=isset($qualif1['6'])?$qualif1['6']:'';
									$qualif7=isset($qualif1['7'])?$qualif1['7']:'';
									$qualif8=isset($qualif1['8'])?$qualif1['8']:'';
									$qualif9=isset($qualif1['9'])?$qualif1['9']:'';
									$qualif10=isset($qualif1['10'])?$qualif1['10']:'';

if($uInfo['country']!="")
{
$country=$db->getCountryname($uInfo['country']);
}
else
{
$country="";
}
if($uInfo['state']!="")
{
$state=$db->getStatename($uInfo['state']);
}
else
{
$state="";
}
if($uInfo['city']!="")
{
$city=$db->getCityname($uInfo['city']);
}
else
{
$city="";
}
if($uInfo['cat_id']!="")
{
$cat_name=$db->cat_name($uInfo['cat_id']);
}
else
{
$cat_name="";
}

if($uInfo['sub_catid']!="")
{
$sub_cat=$db->cat_name($uInfo['sub_catid']);
}
else
{
$sub_cat="";
}

$_address=ucfirst($uInfo['user_address']);
$u_img=$uInfo['img'];
$doc_imag=$uInfo['doc_img1'];
if(empty($doc_imag)){
$docimg=$siteurl."uploads/userprofile/noimage.jpg";
}
else
{
$docimg=$siteurl."uploads/profdoc/".$doc_imag;
}

if(empty($u_img)){
$uimg=$siteurl."uploads/userprofile/noimage.jpg";
}
else
{
$uimg=$siteurl.$u_img;
}

$rawdata=array("first-name"=>$_fname,"last-name"=>$_lname,"email"=>$_email, "mobile"=>$_phone, "country"=>$country,"state"=>$state,"city"=>$city,"image"=>$uimg, "intro"=>$_intro, "doc_image"=>$docimg, "address"=>$_address, "category"=>$cat_name, "sub_category"=>$sub_cat,  "exp1"=>$exp1, "exp2"=>$exp2, "expdur1"=>$expdur1, "expdur2"=>$expdur2, "location"=>$location, "estimate_fee"=>$estimate_fee, "fee_duration"=>$fee_duration, "specify1"=>$specify1,"specify2"=>$specify2,"specify3"=>$specify3,"specify4"=>$specify4,"specify5"=>$specify5,"specify6"=>$specify6,"specify7"=>$specify7,"specify8"=>$specify8,"specify9"=>$specify9,"specify10"=>$specify10,"specify0"=>$specify0, "qualif0"=>$qualif0, "qualif2"=>$qualif2,"qualif3"=>$qualif3,"qualif4"=>$qualif4,"qualif5"=>$qualif5,"qualif6"=>$qualif6,"qualif7"=>$qualif7,"qualif8"=>$qualif8,"qualif9"=>$qualif9,"qualif10"=>$qualif10,"qualif11"=>$qualif11);
$raw=array($rawdata);
$rest->DispResponse($raw);

}
?>


