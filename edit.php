<?php
include "admin/AMframe/config.php";
if(isset($_POST['prf_upd'])){
	
	$uid=$_POST['sid'];
	$prf_lastname=$db->escapstr($prf_lastname);
	echo $uid;exit;
	$prf_phone=$db->escapstr($prf_phone);
	$country=$db->escapstr($country);
	$state=$db->escapstr($state);
	$city=$db->escapstr($city);
	$prf_locality=$db->escapstr($prf_locality);
	$prf_address=$db->escapstr($prf_address);
	$prf_intro=$db->escapstr($prf_intro);
	$prf_docname1=$db->escapstr($prf_docname1);
	$prf_docname2=$db->escapstr($prf_docname2);
	$prf_cat=$db->escapstr($prf_cat);
	$prf_sub=$db->escapstr($prf_sub);
	$prf_explocation=$db->escapstr($prf_explocation);
	$prf_spcl=$db->escapstr($prf_spcl);
	$prf_spcl_2=$db->escapstr($prf_spcl_2);
	$prf_spc_3=$db->escapstr($prf_spc_3);
	$prf_spc_4=$db->escapstr($prf_spc_4);
	$prf_spc_5=$db->escapstr($prf_spc_5);
	$prf_spc_6=$db->escapstr($prf_spc_6);
	$prf_spc_7=$db->escapstr($prf_spc_7);
	$prf_spc_8=$db->escapstr($prf_spc_8);
	$prf_spc_9=$db->escapstr($prf_spc_9);
	$prf_spc_10=$db->escapstr($prf_spc_10);
	$prf_qulalification=$db->escapstr($prf_qulalification);
	$prf_qulalification_2=$db->escapstr($prf_qulalification_2);
	$prf_qulalification_3=$db->escapstr($prf_qulalification_3);
	$prf_qulalification_4=$db->escapstr($prf_qulalification_4);
	$prf_qulalification_5=$db->escapstr($prf_qulalification_5);
	$prf_qulalification_6=$db->escapstr($prf_qulalification_6);
	$prf_qulalification_7=$db->escapstr($prf_qulalification_7);
	$prf_qulalification_8=$db->escapstr($prf_qulalification_8);
	$prf_qulalification_9=$db->escapstr($prf_qulalification_9);
	$prf_qulalification_10=$db->escapstr($prf_qulalification_10);
	$prf_exp=$db->escapstr($prf_exp);
	$prf_expp=$db->escapstr($prf_expp);
	$prf_exp1=$db->escapstr($prf_exp1);
	$prf_expp1=$db->escapstr($prf_expp1);
	$prf_fee=$db->escapstr($prf_fee);
	$prf_amt=$db->escapstr($prf_amt);
	$prf_d1=isset($_FILES['prf_d1']['tmp_name'])?$_FILES['prf_d1']['tmp_name']:'empty';
	$prf_d2=isset($_FILES['prf_d2']['tmp_name'])?$_FILES['prf_d2']['tmp_name']:'';
	$prf_g1=isset($_FILES['prf_g1']['tmp_name'])?$_FILES['prf_g1']['tmp_name']:'';
	$prf_g2=isset($_FILES['prf_g2']['tmp_name'])?$_FILES['prf_g2']['tmp_name']:'';
	$prf_g3=isset($_FILES['prf_g3']['tmp_name'])?$_FILES['prf_g3']['tmp_name']:'';
	$prf_g4=isset($_FILES['prf_g4']['tmp_name'])?$_FILES['prf_g4']['tmp_name']:'';
	$edit_ip=$_SERVER['REMOTE_ADDR'];
	$chg_date=date("Y-m-d H:i:s");
	echo $_FILES['prf_d1'];exit;
	$set ="lname='$prf_lastname'";
	$set .=",contact_no1='$prf_phone'";
	$set .=",country='$country'";
	$set .=",state='$state'";
	$set .=",city='$city'";
	$set .=",user_locality='$prf_locality'";
	$set .=",user_address='$prf_address'";
	$set .=",about_self='$prf_intro'";
	$set .=",doc_name1='$prf_docname1'";
	$set .=",doc_name2='$prf_docname2'";
	$set .=",specification1='$prf_spcl'";
	$set .=",specification2='$prf_spc2'";
	$set .=",specification3='$prf_spc3'";
	$set .=",specification4='$prf_spc4'";
	$set .=",specification5='$prf_spc5'";
	$set .=",specification6='$prf_spc6'";
	$set .=",specification7='$prf_spc7'";
	$set .=",specification8='$prf_spc8'";
	$set .=",specification9='$prf_spc9'";
	$set .=",specification10='$prf_spcl0'";
	$set .=",qualification1='$prf_qulalification'";
	$set .=",qualification2='$prf_qulalification_2'";
	$set .=",qualification3='$prf_qulalification_3'";
	$set .=",qualification4='$prf_qulalification_4'";
	$set .=",qualification5='$prf_qulalification_5'";
	$set .=",qualification6='$prf_qulalification_6'";
	$set .=",qualification7='$prf_qulalification_7'";
	$set .=",qualification8='$prf_qulalification_8'";
	$set .=",qualification9='$prf_qulalification_9'";
	$set .=",qualification10='$prf_qulalification_10'";
	$set .=",exp1='$prf_exp'";
	$set .=",exp2='$prf_exp1'";
	$set .=",exp_dur1='$prf_expp'";
	$set .=",exp_dur2='$prf_expp1'";
	$set .=",exp_location='$prf_explocation'";
	$set .=",chngdt='$chg_date'";
	$set .=",edit_ip='$edit_ip'";
	
	if(isset($_FILES["prf_d1"]["tmp_name"]) && !empty($_FILES["prf_d1"]["tmp_name"])){
		$file_to=uniqid();
		$file=$com_obj->upload_image("prf_d1",$file_to,500,500,"uploads/profdoc/","NULL");
		if($file){
			$img=$com_obj->img_Name;
			$set .= ",doc_img1='$img'";
		}
		else {
			$error.="$com_obj->img_Err <br>";
		}
	}
	
	if($prf_d2!=''){
		$file_to=uniqid();
		$file=$com_obj->upload_image("prf_d2",$file_to,500,500,"uploads/profdoc/","NULL");
		if($file){
			$img=$com_obj->img_Name;
			$set .= ",doc_img2='$img'";
		}
		else {
			$error.="$com_obj->img_Err <br>";
		}
	}
	
	if($prf_g1!=''){
		$file_to=uniqid();
		$file=$com_obj->upload_image("prf_g1",$file_to,500,500,"uploads/profgallery/","NULL");
		if($file){
			$img=$com_obj->img_Name;
			$set .= ",gallery_img1='$img'";
		}
		else {
			$error.="$com_obj->img_Err <br>";
		}
	}
	
	if($prf_g2!=''){
		$file_to=uniqid();
		$file=$com_obj->upload_image("prf_g2",$file_to,500,500,"uploads/profgallery/","NULL");
		if($file){
			$img=$com_obj->img_Name;
			$set .= ",gallery_img2='$img'";
		}
		else {
			$error.="$com_obj->img_Err <br>";
		}
	}
	
	if($prf_g3!=''){
		$file_to=uniqid();
		$file=$com_obj->upload_image("prf_g3",$file_to,500,500,"uploads/profgallery/","NULL");
		if($file){
			$img=$com_obj->img_Name;
			$set .= ",gallery_img3='$img'";
		}
		else {
			$error.="$com_obj->img_Err <br>";
		}
	}
	
	if($prf_g4!=''){
		$file_to=uniqid();
		$file=$com_obj->upload_image("prf_g4",$file_to,500,500,"uploads/profgallery/","NULL");
		if($file){
			$img=$com_obj->img_Name;
			$set .= ",gallery_img4='$img'";
		}
		else {
			$error.="$com_obj->img_Err <br>";
		}
	}

	$db->insertrec("update register set $set where id='$uid'");
	
	
}
?>