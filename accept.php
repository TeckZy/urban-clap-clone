<?php
include "admin/AMframe/config.php";

$id=isset($id)?$id:'';
$resid=isset($resid)?$resid:'';
$autoid=isset($autoid)?$autoid:'';
$sid=isset($sid)?$sid:'';
$cid=isset($cid)?$cid:'';

$Check_res=$db->singlerec("select * from sent_enquiry where id='$autoid' and cat_id='$cid' and role='0'");
$response=$Check_res['prof_response'];
$catid=$Check_res['cat_id'];
$cat_name=$com_obj->cat_name($catid);
$bud_frm=$Check_res['comp_budget_from'].' '.$site_currency;
$bud_to=$Check_res['comp_budget_to'].' '.$site_currency;
$loc=ucfirst($Check_res['comp_location']);
$compqus=$Check_res['comp_qusans'];
$compqus=json_decode($compqus, true);
if(!empty($compqus['ans1'])) $status=$compqus['ans1']; 
elseif(!empty($compqus['ans2'])) $status=$compqus['ans2']; 
elseif(!empty($compqus['ans3'])) $status=$compqus['ans3'];
elseif(!empty($compqus['ans4'])) $status=$compqus['ans4']; 
elseif(!empty($compqus['ans5'])) $status=$compqus['ans5']; 
else $status="-";
$sendid=$Check_res['senter_id'];
$sentsts=$db->singlerec("select * from register where id='$sendid' and active_status='1'");
$sntname=$sentsts['fname'].''.$sentsts['lname'];

if($response==1){
if(!empty($id) && !empty($resid)){
	$userinfo=$db->singlerec("select * from register where id='$resid' and active_status='1'");
	$username=$userinfo['fname'].' '.$userinfo['lname'];
	$mail=$userinfo['email'];
	$url=$siteurl."prof-progress";
	$sub="Request Accept";
	$text="Your service request has been accepted successfully.<br><br>Your Service request Details are,<br>";
	$info="How soon would you like to hire?<br>$status<br><br>Budget Min:$bud_frm<br>Budget Max:$bud_to<br>Location : $loc";
	$msg=$email_temp->response_mail($url,$text,$info,$siteinfo,$username);
	$sts=$com_obj->email("",$mail,$sub,$msg);
	$sq1=$db->insertrec("update response set status='3' where  id='{$id}'");
	$sq2=$db->insertrec("update sent_enquiry set prof_response='3' where id='{$autoid}'");
	if($sq1 && $sq2)
		echo 1;
	else
		echo 0;
}
}
?>
