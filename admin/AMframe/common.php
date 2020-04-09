<?php
require 'PHPMailerAutoload.php';

class common extends database {
	public $img_Name;
	
	function drop_down($array,$getval,$getname){
		$list = "";
		for($astrn=1; $astrn<count($array); $astrn++){
			if($astrn == $getval)
				$list .= "<input type='radio' id='$getname' name='$getname' value='$astrn' checked>$array[$astrn] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			else	
				$list .= " <input type='radio' id='$getname' name='$getname' value='$astrn'>$array[$astrn]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		return $list;
	}
	//========================================================================	
	function dropdown($array,$getval,$getname){
		$list = "<option value='0'>--select--</option>";
		for($astrn=1; $astrn<count($array); $astrn++){
			if($astrn == $getval)
				$list .= "<option value='$astrn' selected>$array[$astrn]</option>";
			else	
				$list .= "<option value='$astrn'>$array[$astrn]</option>";
		}
		return $list;
	}
	//========================================================================	
	function dropdownval($array,$getval){
		$list = "";
		for($astrn=0; $astrn<count($array); $astrn++){
			if($astrn == $getval)
				$list .= "<option value='$astrn' selected>$array[$astrn]</option>";
			else	
				$list .= "<option value='$astrn'>$array[$astrn]</option>";
		}
		return $list;
	}
	//========================================================================	
	function dropdown_support($array,$getval){
		$list = "<option value='0'>--select--</option>";
		for($astrn=1; $astrn<count($array); $astrn++){
			if($astrn==1){$astr=1;}else if($astrn==2){$astr=7;}else if($astrn==3){$astr=10;}
			if($astr == $getval)
				$list .= "<option value='$astr' selected>$array[$astrn]</option>";
			else	
				$list .= "<option value='$astr'>$array[$astrn]</option>";
		}
		return $list;
	}
	function dropdown_array_view($array,$getval){
		$ret = $array[$getval];
		return $ret;
	}
	//========================================================================	
	function drop_down_view($array,$getval){
		$list = "";
		for($astrn=1; $astrn<count($array); $astrn++){
			if($astrn == $getval)
				$list .= $array[$astrn];
		}
		return $list;
	}
	
	function email($from,$to,$subject,$msg){
		$from="no-reply@smsemailmarketing.in";
		$mail = new PHPMailer;	
		$mail->IsSMTP();                           
		$mail->SMTPDebug = false;
		$mail->SMTPAuth = true; 
		$mail->SMTPSecure = 'ssl';
		$mail->Host = 'trailblazer.websitewelcome.com';  
		$mail->Port = 465;  
		$mail->IsHTML(true);     
		$mail->Username = $from;         
		$mail->Password = 'dD}O-RnM#7]K';                         
		$mail->setFrom($from, 'Professional service');      
		$mail->Subject = $subject;
		$mail->Body    = $msg;
		$mail->addAddress($to, 'User');   
		
		if(!$mail->send()) {
			$ret = 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			$ret = "scs";
		}
		return $ret;
	}
	
	function encrypt($text,$key){
	
	}
	
	function singup_mail($from,$to,$url){
		$subject = "Confirm your account for V6Asia";
		$message ="<body bgcolor='#E1E1E1' leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'><center style='background-color:#f1f1f1;'> <table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='620' style='color:#FFFFFF; background:#1976D2;'> <tr > <td align='center' valign='top' class='textContent' style='font-size:12px; font-family: Helvetica,Arial,sans-serif; padding:10px;'> Support Email: support@v6asia.com </td> </tr> </table><table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='620' id='emailBody'> <tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF;' bgcolor='#ffffff'><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'><tr><td align='center' valign='top' width='600' class='flexibleContainerCell'> <!-- // CONTENT TABLE --> <table border='0' cellpadding='15' cellspacing='0' width='100%'><tr><td align='center' valign='top' class='textContent'> <a href='http://www.v6asia.com/' target='_blank'> <img src='http://www.v6asia.com/admin/uploads/general_setting/logo.png' class='img-responsive'></a></td></tr></table><!-- // CONTENT TABLE --></td></tr></table><!-- // FLEXIBLE CONTAINER --></td></tr></table><table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding: 40px; background:#D3E6F9;' bgcolor='#ffffff'><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'><tr><td align='center' valign='top' width='600' class='flexibleContainerCell'><table border='0' cellpadding='0' cellspacing='0' width='100%' style='font-size:16px;'><tr><td align='center' valign='top' class='textContent' style='font-size: 16px; font-family: Helvetica,Arial,sans-serif; color:#4C4C4C; font-weight: 600;'>To activate, click below link. If you believe this is an error, ignore this message and we'll never bother you again.</td></tr> <tr><td align='center' valign='top' class='textContent' style='padding-top: 30px;' ><a style='color:#FFFFFF;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:135%; padding: 10px 20px; background: #F79118; border-radius: 30px;' href='$url' target='_blank'>Click here</a></td></tr></table><!-- // CONTENT TABLE --></td></tr></table><!-- // FLEXIBLE CONTAINER --></td></tr></table><!-- // CENTERING TABLE --> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding: 10px; background:#1976D2;'> <tr> <td></td> </tr> </table> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding:26px; background:#d8dde4;'> <tr> <td align='center' style='color:#999;'> <table width='200' border='0' cellspacing='2' cellpadding='0'> <tr> <td><a href='www.facebook.com' target='_blank'><img src='http://www.v6asia.com/images/social/facebook.png' width='32'></a></td> <td><a href='https://twitter.com' target='_blank'><img src='http://www.v6asia.com/images/social/twitter.png' width='32'></a></td> <td><a href='https://plus.google.com/' target='_blank'><img src='http://www.v6asia.com/images/social/google-plus.png' width='32'></a></td> <td><a href='https://www.linkedin.com/' target='_blank'><img src='http://www.v6asia.com/images/social/linkedin.png' width='32'></a></td> </tr> </table> </td> </tr> <tr> <td align='center' style='color:#999; font-family: Helvetica,Arial,sans-serif; font-size: 12px;'> Copyright &copy; 2016 www.v6asia.com. All rights reserved. If you do not want to recieve emails from us, you can <a href='#'>unsubscribe</a>. </td> </tr> </table> </td></tr><!-- // MODULE ROW --> </table> </center> </body>";
		$headers .='Reply-To: '. $to . "\r\n" ;
		$headers .='X-Mailer: PHP/' . phpversion();
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: <'.$from.'>' . "\r\n";
		
		@mail($to, $subject, $message, $headers);
	}
	
	function randuniq($id){
		$str='';
		$str.=substr(str_shuffle("01234123456789123489abcdeefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);
		$str.=$id;
		$str.=substr(rand(0,time()),-4);
		return $str;
	}
	
	function dtdiff($d1){
		$d1 = strtotime($d1);
		$d2 = time();
		$mindiff = round(($d2-$d1)/60);
		$hourdiff = round(($d2-$d1)/(60*60));
		$daydiff = round(($d2-$d1)/(60*60*24));
		
		//singular
		 if($mindiff==1){
			return 	'1 minute ago';
		}else if($hourdiff==1){
			return 	'1 hour ago';
		}else if($daydiff==1){
			return 	'1 day ago';	
		}else if(round($daydiff/7)==1){
			return 	'1 week ago';	
		}else if(round($daydiff/30)==1){
			return 	'1 month ago';	
		}else if(round($daydiff/365)==1){
			return 	'1 year ago';	
		}
		//flural
		if($mindiff == 0){
			return 	'just now';	
		}else if($mindiff<60){
			return 	$mindiff.' minutes ago';
		}else if($hourdiff<24){
			return 	$hourdiff.' hours ago';	
		}else if($daydiff<7){
			return 	$daydiff.' days ago';	
		}else if($daydiff<31){
			return 	round($daydiff/7).' weeks ago';	
		}else if($daydiff<365){
			return 	round($daydiff/30).' months ago';	
		}else if($daydiff>365){
			return 	round($daydiff/365).' years ago';	
		}
	}
	
	function upload_image($name1,$name2,$width,$height,$path,$acn){		
		$acn = isset($acn)?$acn:'new';
		$fpath = $_FILES[$name1]['tmp_name'];
		if(!empty($fpath)){
			$fpath = $_FILES[$name1]['tmp_name'] ;
			$fname = $_FILES[$name1]['name'];
			$image_info = getimagesize($_FILES[$name1]["tmp_name"]);
			$image_width = $image_info[0];
			$image_height = $image_info[1];
			
			$size=filesize($_FILES[$name1]['tmp_name']);
			$getext = substr(strrchr($fname, '.'), 1);
			$ext = strtolower($getext);
			
			if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif' && $ext != 'bmp' && $ext != 'pdf') {
				$this->img_Err="Mismatch file format";
				return false;
			}
			else if($size>1048576) {
				$this->img_Err="File size exceeded";
				return false;
			}
			else if($image_width<$width || $image_height<$height){ 
				$this->img_Err="Image must be greater than or equal to $width x $height pixels";
				return false;
			}
			else {
				$NgImg = "$name2.$ext";
				$img_size = "$path/$NgImg";
				
				move_uploaded_file($fpath,$img_size);
			
				if($image_width!=$width && $image_height!=$height){
					$resizeObj = new resize($img_size);
					$resizeObj -> resizeImage($width, $height, 'exact');
					$resizeObj -> saveImage($img_size, 72);
			    }
				
				$this->img_Name="$NgImg";
				$this->img_Err="ok";
				
				return true;
			}
		}
		else{
			$this->img_Err="Image missing";
			return false;
		}
	}
	
	function upload_image_new($name1,$name2,$width,$height,$path,$acn){		
		$acn = isset($acn)?$acn:'new';
		$fpath = $_FILES[$name1]['tmp_name'];
		if(!empty($fpath)){
			$fpath = $_FILES[$name1]['tmp_name'] ;
			$fname = $_FILES[$name1]['name'];
			$image_info = getimagesize($_FILES[$name1]["tmp_name"]);
			$image_width = $image_info[0];
			$image_height = $image_info[1];
			
			$size=filesize($_FILES[$name1]['tmp_name']);
			$getext = substr(strrchr($fname, '.'), 1);
			$ext = strtolower($getext);
			
			if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif' && $ext != 'bmp' && $ext != 'pdf') {
				$this->img_Err="Mismatch file format";
				return false;
			}
			else if($size>1048576) {
				$this->img_Err="File size exceeded";
				return false;
			}
			else if($image_width<$width || $image_height<$height){ 
				$this->img_Err="Image must be greater than or equal to $width x $height pixels";
				return false;
			}
			else {
				$NgImg = "$name2.$ext";
				$img_size = "$path/$NgImg";
				
				move_uploaded_file($fpath,$img_size);
			
				if($image_width!=$width && $image_height!=$height){
					$resizeObj = new resize($img_size);
					$resizeObj -> resizeImage($width, $height, 'exact');
					$resizeObj -> saveImage($img_size, 72);
			    }
				
				$this->img_Name="$NgImg";
				$this->img_Err="ok";
				
				return true;
			}
		}
		else{
			$this->img_Err="Image missing";
			return false;
		}
	}
	
	function upload_image_g4($name1,$name2,$width,$height,$path,$acn){		
		$acn = isset($acn)?$acn:'new';
		$fpath = $_FILES[$name1]['tmp_name'];
		if(!empty($fpath)){
			$fpath = $_FILES[$name1]['tmp_name'] ;
			$fname = $_FILES[$name1]['name'];
			$image_info = getimagesize($_FILES[$name1]["tmp_name"]);
			$image_width = $image_info[0];
			$image_height = $image_info[1];
			
			$size=filesize($_FILES[$name1]['tmp_name']);
			$getext = substr(strrchr($fname, '.'), 1);
			$ext = strtolower($getext);
			
			if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif' && $ext != 'bmp' && $ext != 'pdf') {
				$this->img_Err="Mismatch file format";
				return false;
			}
			else if($size>1048576) {
				$this->img_Err="File size exceeded";
				return false;
			}
			else if($image_width<$width || $image_height<$height){ 
				$this->img_Err="Image must be greater than or equal to $width x $height pixels";
				return false;
			}
			else {
				$NgImg = "$name2.$ext";
				$img_size = "$path/$NgImg";
				
				move_uploaded_file($fpath,$img_size);
			
				if($image_width!=$width && $image_height!=$height){
					$resizeObj = new resize($img_size);
					$resizeObj -> resizeImage($width, $height, 'exact');
					$resizeObj -> saveImage($img_size, 72);
			    }
				
				$this->img_Name="$NgImg";
				$this->img_Err="ok";
				
				return true;
			}
		}
		else{
			$this->img_Err="Image missing";
			return false;
		}
	}
	
	function upload_files($name1,$name2,$path,$acn){		
		$acn = isset($acn)?$acn:'new';
		$fpath = $_FILES[$name1]['tmp_name'];
		if(!empty($fpath)){
			$fpath = $_FILES[$name1]['tmp_name'] ;
			$fname = $_FILES[$name1]['name'];
			$image_info = getimagesize($_FILES[$name1]["tmp_name"]);
			$image_width = $image_info[0];
			$image_height = $image_info[1];
			
			$size=filesize($_FILES[$name1]['tmp_name']);
			$getext = substr(strrchr($fname, '.'), 1);
			$ext = strtolower($getext);
			
			if($ext != 'pdf' ) {
				$this->img_Err="Mismatch file format,Please select PDF file format only";
				return false;
			}
			else if($size>2000000) {
				$this->img_Err="File size exceeded";
				return false;
			}
			/* else if($image_width<$width || $image_height<$height){ 
				$this->img_Err="Image must be greater than or equal to $width x $height pixels";
				return false;
			} */
			else {
				$NgImg = "$name2.$ext";
				$img_size = "$path/$NgImg";
				
				move_uploaded_file($fpath,$img_size);
			
				/* if($image_width!=$width && $image_height!=$height){
					$resizeObj = new resize($img_size);
					$resizeObj -> resizeImage($width, $height, 'exact');
					$resizeObj -> saveImage($img_size, 72);
			    } */
				
				$this->img_Name="$NgImg";
				$this->img_Err="ok";
				
				return true;
			}
		}
		else{
			$this->img_Err="Image missing";
			return false;
		}
	}
	
	function upload_video($name1,$name2,$path,$acn){		
		$acn = isset($acn)?$acn:'new';
		$fpath = $_FILES[$name1]['tmp_name'];
		if(!empty($fpath)){
			$fpath = $_FILES[$name1]['tmp_name'] ;
			$fname = $_FILES[$name1]['name'];
			
			$size=filesize($_FILES[$name1]['tmp_name']);
			$getext = substr(strrchr($fname, '.'), 1);
			$ext = strtolower($getext);
			
			if($ext != 'mp4' && $ext != 'avi' && $ext != 'flv' && $ext != 'wmv' && $ext != 'm4v' && $ext != 'amv' && $ext != 'mng') {
				$this->img_Err="Mismatch video file format";
				return false;
			}
			//25 MB
			else if($size>26246026 ) {
				$this->img_Err="Video file size exceeded";
				return false;
			}
			else {
				$NgImg = "$name2.$ext";
				$img_size = "$path/$NgImg";
				
				move_uploaded_file($fpath,$img_size);
				
				$this->img_Name="$NgImg";
				$this->img_Err="ok";
				
				return true;
			}
		}
		else{
			$this->img_Err="Image missing";
			return false;
		}
	}
	
	function upload_logo($name1,$name2,$width,$height,$r1,$r2,$path){
				
		$acn = isset($acn)?$acn:'new';
		$fpath = $_FILES[$name1]['tmp_name'];
		if(!empty($fpath)){
			$fpath = $_FILES[$name1]['tmp_name'] ;
			$fname = $_FILES[$name1]['name'];
			$image_info = getimagesize($_FILES[$name1]["tmp_name"]);
			$image_width = $image_info[0];
			$image_height = $image_info[1];
			
			$size=filesize($_FILES[$name1]['tmp_name']);
			$getext = substr(strrchr($fname, '.'), 1);
			$ext = strtolower($getext);
			
			if($size>1048576){
				$this->img_Err="File size exceeded";
				return false;
			}
			if($image_width<$width || $image_height<$height){ 
				$this->img_Err="Too small";
				return false;
			}
			if(($image_width*$r2)!=($image_height*$r1)){ 
				$this->img_Err="Miss match aspect ratio";
				return false;
			}
			
			if($ext == 'png')
			{
				$NgImg = "$name2.$ext";
				$img_size = "$path/$NgImg";
				
				move_uploaded_file($fpath,$img_size);
			
				if($image_width!=$width && $image_height!=$height){
					$resizeObj = new resize($img_size);
					$resizeObj -> resizeImage($width, $height, 'exact');
					$resizeObj -> saveImage($img_size, 72);
			    }
				
				$this->img_Name="$NgImg";
				$this->img_Err="ok";
				
				return true;
			}
			else{
				$this->img_Err="Missmatch file format";
				return false;
			}
		}else{
				$this->img_Err="Image missing";
				return false;
		}
	}
	
	function profileid($id){
		$strv=str_shuffle("01234123456789123489");
		$stlen=strlen($id);
		if($stlen==1)
			$ret=substr($strv, 0, 5);
		else if($stlen==2)
			$ret=substr($strv, 0, 4);
		else if($stlen==3)
			$ret=substr($strv, 0, 3);
		else if($stlen==4)
			$ret=substr($strv, 0, 2);
		else if($stlen==5)
			$ret=substr($strv, 0, 1);
		else
			$ret=$id;
		
		$str="V6".$id.$ret;
		return $str;
	}
	
	function review_count($crs_id) {
		$getcount=database::singlerec("select count(*) as tot from review where course_id='$crs_id'");
		$count=$getcount['tot'];
		return (int)$count;
	}
	
	function following($user_id){
		$getFollowcount=database::singlerec("select count(*) as total from follows where from_id='$user_id'");
		$followcount=$getFollowcount['total'];
		return (int)$followcount;
	}
	
	function followers($user_id){
		$getcount=database::singlerec("select count(*) as total from follows where to_id='$user_id'");
		$followcount=$getcount['total'];
		return (int)$followcount;
	}
	
	function buy_count($buy_id){
		$buycount=database::singlerec("select count(*) as total from checkout where course_id='$buy_id' and pay_status='1'");
		$count=$buycount['total'];
		return (int)$count;
	}
	
	function rating_count($rate_id){
		$ratecount=database::singlerec("select sum(stars)as tot, count(*) as ratetot from review where professionalid='$rate_id'");
		$sum=(int)$ratecount['tot'];
		$count=(int)$ratecount['ratetot'];
		if($count==0){
			echo "0 average based on $count rating";
		}
		else{
			$avg=$sum/$count;
			echo " $avg average based on $count ratings";
		}
		
	}
	
	function percentage($per){
		$percents=database::singlerec("select sum(stars)as tot, count(*) as ratetot from review where professionalid='$per'");
		$sum=(int)$percents['tot'];
		$count=(int)$percents['ratetot'];
		if($count==0){
			$star=(($count/5)*100);
			echo "$star";
		}
		else{
			$avg=$sum/$count;
			$star=(($avg/5)*100);
			echo " $star";
		}
	}
	
	
	function star_percentage($course_id,$rating){
		$starper=database::singlerec("select sum(rating)as rate,count(*) as count from review where course_id='$course_id' and rating=$rating");
		$totstar=database::singlerec("select count(*) as count from review where course_id='$course_id'");
		$sum=(int)$starper['rate'];
		$count=(int)$starper['count'];
		$tot=$totstar['count']*5;
		$percent=($sum/$tot)*100;
		return $percent;
		
	}
	function star_count($course_id,$rating){
		$starcount=database::singlerec("select count(*) as counts from review where course_id='$course_id' and rating='$rating'");
		$count=$starcount['counts'];
		return (int)$count;
		
	}
	function course($cid){
		$courses=database::singlerec("select count(*)as total from course where user_id='$cid'");
		$count=$courses['total'];
		return (int)$count;
	}
	
	function review_rating($pid){
		$crsid=database::get_all("select * from course where user_id='$pid'");
		$cn=0;
		foreach($crsid as $crs){
			$crid=$crs['id']; 
			$reviews=database::singlerec("select count(*)as tat from review where course_id='$crid'");
			$count=$reviews['tat'];
			$cn=$cn + $count;
		}
		return (int)$cn;
	}
	
	function review_star($sid){
		$starid=database::get_all("select id from course where user_id='$sid'");
		$suminit=0;
		$cinit=0;
		$starinit=0;
		foreach($starid as $str){
			$stid=$str['id'];
			$restar=database::singlerec("select sum(rating)as rate,count(*)as tar from review where course_id='$stid'");
			$sums=(int)$restar['rate'];
			$countt=(int)$restar['tar'];
			$suminit=$suminit+$sums;
			$cinit=$cinit+$countt;
			if(!empty($suminit) && !empty($cinit)) {
				$avg=$suminit/$cinit;
				$star=(($avg/5)*100);
				$starinit=$starinit+$star;
			}
		}
		$percent=$starinit/count($starid);
		return (int)$percent;
	}
	
	function buy_student($user_id){
		$pstd=database::get_all("select id from course where user_id ='$user_id'");
		$bn=0;
		foreach($pstd as $std){
			$stdid=$std['id'];
			$paystud=database::singlerec("select count(*) as stud from checkout where course_id='$stdid' and pay_status='1'");
			$scount=$paystud['stud'];
			$bn=$bn + $scount;
		}
		return (int)$bn;
	}
	
	function total_revenue($user_id){
		$revenue=database::singlerec("select sum(a.price)as sum from course as a inner join checkout as b on a.id=b.course_id where a.user_id='$user_id' and pay_status='1'");
		$count=$revenue['sum'];
		return (int)$count;
	}
	
	function approved_user(){
		$getuser=database::singlerec("select count(*) as tat from register where active_status='1' and user_role='0'");
		$count=$getuser['tat'];
		return (int)$count;
	}
	function approved_appointment(){
		$getuser=database::singlerec("select count(*) as tat from appointment");
		$count=$getuser['tat'];
		return (int)$count;
	}
	function pending_user(){
		$penduser=database::singlerec("select count(*) as total from register where active_status='0' and user_role='0'");
		$counts=$penduser['total'];
		return (int)$counts;
	}
	
	function approved_course(){
		$getcourse=database::singlerec("select count(*) as tot from course where active_status='1'");
		$count=$getcourse['tot'];
		return (int)$count;
	}
	
	function pending_course(){
		$pendcourse=database::singlerec("select count(*) as total from course where active_status='0'");
		$counts=$pendcourse['total'];
		return (int)$counts;
	}
	
	function limit_text($str, $limit) {
		if(strlen($str)>$limit) $str=substr($str,0,$limit).'...';
		return $str;
	}
	/*created on 27/10/2017 */
	function getExpdiv($divIds){
		$divIds = explode(",",$divIds);
		$div = "";
		foreach ($divIds as $divId){
			$div_name = database::singlerec("select category_name from category where id='$divId'");
			$div_name=$div_name['category_name'];
			$div.=ucfirst($div_name).', ';
		}	
		return trim($div,', ');
	}
	/*created on 30/10/2017 */
	function upload_id_proof($name1,$name2,$path,$acn){		
		$acn = isset($acn)?$acn:'new';
		$fpath = $_FILES[$name1]['tmp_name'];
		if(!empty($fpath)){
			$fpath = $_FILES[$name1]['tmp_name'] ;
			$fname = $_FILES[$name1]['name'];
			$image_info = getimagesize($_FILES[$name1]["tmp_name"]);
			$image_width = $image_info[0];
			$image_height = $image_info[1];
			
			$size=filesize($_FILES[$name1]['tmp_name']);
			$getext = substr(strrchr($fname, '.'), 1);
			$ext = strtolower($getext);
			
			if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif' && $ext != 'bmp' && $ext != 'pdf') {
				$this->img_Err="Mismatch file format";
				return false;
			}
			else if($size>1048576) {
				$this->img_Err="File size exceeded";
				return false;
			}
			else {
				$NgImg = "$name2.$ext";
				$img_size = "$path/$NgImg";
				
				move_uploaded_file($fpath,$img_size);
			
				$this->img_Name="$NgImg";
				$this->img_Err="ok";
				
				return true;
			}
		}
		else{
			$this->img_Err="Image missing";
			return false;
		}
	}
	/*created on 01/11/2017 */
	function getReptrim($string) {
		$string = str_replace(',,', ',', $string);
		$string = trim($string,',');
		return ucfirst($string);
	}
	/*created on 02/11/2017 */
	function pending_lawyer(){
		$pendlawyer=database::singlerec("select count(*) as total from request where request_status='0'");
		$counts=$pendlawyer['total'];
		return (int)$counts;
	}
	
	function approved_lawyer(){
		$getlawyer=database::singlerec("select count(*) as tat from register where active_status='1' and user_role='1'");
		$count=$getlawyer['tat'];
		return (int)$count;
	}
	
	function approved_reviews(){
		$getrev=database::singlerec("select count(*) as tat from review where active_status='1'");
		$count=$getrev['tat'];
		return (int)$count;
	}
	
	function get_name($id){
		$getname=database::singlerec("select * from register where id='$id'");
		$name=$getname['fname']." ".$getname['lname'];
		return $name;
	}
	function get_mailid($id){
		$getname=database::singlerec("select * from register where id='$id'");
		$email=$getname['email'];
		return $email;
	}
	/*end created on 02/11/2017 */
	 function get_title($id){
		$getname=database::singlerec("select title from register where id='$id'");
		$title=$getname['title'];
		return $title;
	}
	
	function cat_name($catid){
		$catname=database::singlerec("select category_name from category where id='$catid'");
		return $catname[0];
	}
	
	function getqusid($catid){
		$qusid=database::singlerec("select id from question_mgmt where cat_id='$catid'");
		return $qusid['id'];
	}
	
	function getUsercatid($userid){
		$catid=database::singlerec("select cat_id from register where id='{$userid}'");
		return $catid['cat_id'];
	}
	
	function radiobox($quid){
		$query=database::singlerec("select id,choice1,choice2,choice3,choice4,choice5 from question_mgmt where id='$quid'");
		$ch1=$query['choice1'];
		$ch2=$query['choice2'];
		$ch3=$query['choice3'];
		$ch4=$query['choice4'];
		$ch5=$query['choice5'];
		$val=$query['id'];
		$ans="";
		if(!empty($ch1)){
			$ans.="<div class='form-group'>
					<label><input type='radio' name='radio_1' value='$ch1'>$ch1</label>
				</div>";
		}
		if(!empty($ch2)){
			$ans.="<div class='form-group'>
					<label><input type='radio' name='radio_1' value='$ch2'>$ch2</label>
				</div>";
		}
		if(!empty($ch3)){
			$ans.="<div class='form-group'>
					<label><input type='radio' name='radio_1' value='$ch3'>$ch3</label>
				</div>";
		}
		if(!empty($ch4)){
			$ans.="<div class='form-group'>
					<label><input type='radio' name='radio_1' value='$ch4'>$ch4</label>
				</div>";
		}
		if(!empty($ch5)){
			$ans.="<div class='form-group'>
					<label><input type='radio' name='radio_1' value='$ch5'>$ch5</label>
				</div>";
		}
		if(!empty($val)){
			$ans.="<input type='hidden' name='radioid' value='$val'>";
		}
		return $ans;
	}
	
	function getcheckbox($quid){
		$chkInfo=database::singlerec("select id,choice1,choice2,choice3,choice4,choice5 from question_mgmt where id='$quid'");
		$ch1=$chkInfo['choice1'];
		$ch2=$chkInfo['choice2'];
		$ch3=$chkInfo['choice3'];
		$ch4=$chkInfo['choice4'];
		$ch5=$chkInfo['choice5'];
		$val=$chkInfo['id'];
		$ans="";
		if(!empty($ch1)){
			$ans.="<div class='form-group'>
					<label><input type='checkbox' name='prf_checkbox[]' value='$ch1'>$ch1</label>
				</div>";
		}
		if(!empty($ch2)){
			$ans.="<div class='form-group'>
					<label><input type='checkbox' name='prf_checkbox[]' value='$ch2'>$ch2</label>
				</div>";
		}
		if(!empty($ch3)){
			$ans.="<div class='form-group'>
					<label><input type='checkbox' name='prf_checkbox[]' value='$ch3'>$ch3</label>
				</div>";
		}
		if(!empty($ch4)){
			$ans.="<div class='form-group'>
					<label><input type='checkbox' name='prf_checkbox[]' value='$ch4'>$ch4</label>
				</div>";
		}
		if(!empty($ch5)){
			$ans.="<div class='form-group'>
					<label><input type='checkbox' name='prf_checkbox[]' value='$ch5'>$ch5</label>
				</div>";
		}
		if(!empty($val)){
			$ans.="<input type='hidden' name='checkid' value='$val'>";
		}
		return $ans;
	}
	
	function input_field($quid){
		$input_id=database::singlerec("select id,choice1,choice2,choice3,choice4,choice5 from question_mgmt where id='$quid'");
		$i_id=$input_id['id'];
		$inputfield="";
		if($inputfield==""){
		$inputfield.="<div class='form-group'>
						<label><input type='text' name='prf_type'></label>
					</div>"; 
		}
		if(!empty($i_id)){
			$inputfield.="<input type='hidden' name='input_field' value='$i_id'>";
		}
		return $inputfield;
	}
	
	function dropselect($quid){
		$select=database::singlerec("select id,choice1,choice2,choice3,choice4,choice5 from question_mgmt where id='$quid'");
		$ch1=$select['choice1'];
		$ch2=$select['choice2'];
		$ch3=$select['choice3'];
		$ch4=$select['choice4'];
		$ch5=$select['choice5'];
		$val=$select['id'];
		$ans="<select class='form-group' name='prf_select'>";
		if(!empty($ch1)){
			$ans.="
			<option value='$ch1'>$ch1</option>";
		}
		if(!empty($ch2)){
			$ans.="<option value='$ch2'>$ch2</option>";
		}
		if(!empty($ch3)){
			$ans.="<option value='$ch3'>$ch3</option>";
		}
		if(!empty($ch4)){
			$ans.="<option value='$ch4'>$ch4</option>";
		}
		if(!empty($ch5)){
			$ans.="<option value='$ch5'>$ch5</option>";
		}
		if(!empty($val)){
			$ans.="<input type='hidden' name='selid' value='$val'>";
		}
		return $ans;
	}
	
	function inputbox($quid){
		$info=database::singlerec("select id,main_heading,sub_heading,question_type from question_mgmt where id='$quid'");
		$qtype=$info['question_type'];
		$inputfield="";
		if($info['question_type']==0){
			$inputfield=self::input_field($quid);
		}
		if($info['question_type']==1){
			$inputfield=self::getcheckbox($quid);
		}
		if($info['question_type']==2){
			$inputfield=self::radiobox($quid);
		}
		if($info['question_type']==3){
			$inputfield=self::dropselect($quid);
		}
		return array("id" => $info['id'], "main_head"=> $info['main_heading'], "sub_head" => $info['sub_heading'], "input" => $inputfield, "qus_type" => $info['question_type']);
	}
	
	function getTypeid($quid){		
		$info=database::singlerec("select id,question_type,q_type from question_mgmt where id='$quid'");
		return array("ques_type" => $info['question_type']);
	}
	
	function getCompType($quid){		
		$info=database::singlerec("select id,q_type from question_mgmt where id='$quid'");
		return array("questin_type" => $info['q_type']);
	}
	
	function input_text_field($quid,$name,$chk=""){
		$info=database::singlerec("select id,main_heading,sub_heading,question_type from question_mgmt where id='$quid'");
		$input_id=database::singlerec("select id,choice1,choice2,choice3,choice4,choice5 from question_mgmt where id='$quid'");
		$i_id=$input_id['id'];
		$inputfield="";
		$name="name='prf_input$name'";
		$ans_feild="name='input_field'";
		if($inputfield==""){
		$inputfield.="<div class='form-group'>
						<label><input type='text' $name value='$chk'></label>
					</div>"; 
		}
		if(!empty($i_id)){
			$inputfield.="<input type='hidden' $ans_feild value='$i_id'>";
		}
		return array("id" => $info['id'], "main_head"=> $info['main_heading'], "sub_head" => $info['sub_heading'], "input" => $inputfield, "qus_type" => $info['question_type']);
	}
	
	function getcheckbox_field($quid,$name,$chk=""){
		$arr[]=$chk;
		$info=database::singlerec("select id,main_heading,sub_heading,question_type from question_mgmt where id='$quid'");
		$chkInfo=database::singlerec("select id,choice1,choice2,choice3,choice4,choice5 from question_mgmt where id='$quid'");
		$ch1=$chkInfo['choice1'];
		$ch2=$chkInfo['choice2'];
		$ch3=$chkInfo['choice3'];
		$ch4=$chkInfo['choice4'];
		$ch5=$chkInfo['choice5'];
		$val=$chkInfo['id'];
		if(in_array($chkInfo,$arr)) $chkper1 = "checked=checked"; else $chkper1="";
		$inputfield="";
		if(!empty($ch1)){
			$inputfield.="<div class='form-group'>
					<label><input type='checkbox' name='".$name."prf_checkbox[]' value='$ch1' $chkper1>$ch1</label>
				</div>";
		}
		if(!empty($ch2)){
			$inputfield.="<div class='form-group'>
					<label><input type='checkbox' name='".$name."prf_checkbox[]' value='$ch2'>$ch2</label>
				</div>";
		}
		if(!empty($ch3)){
			$inputfield.="<div class='form-group'>
					<label><input type='checkbox' name='".$name."prf_checkbox[]' value='$ch3'>$ch3</label>
				</div>";
		}
		if(!empty($ch4)){
			$inputfield.="<div class='form-group'>
					<label><input type='checkbox' name='".$name."prf_checkbox[]' value='$ch4'>$ch4</label>
				</div>";
		}
		if(!empty($ch5)){
			$inputfield.="<div class='form-group'>
					<label><input type='checkbox' name='".$name."prf_checkbox[]' value='$ch5'>$ch5</label>
				</div>";
		}
		if(!empty($val)){
			$inputfield.="<input type='hidden' name='checkid' value='$val'>";
		}
		return array("id" => $info['id'], "main_head"=> $info['main_heading'], "sub_head" => $info['sub_heading'], "input" => $inputfield, "qus_type" => $info['question_type']);
	}
	
	function radiobox_field($quid,$name,$chk=""){
		$info=database::singlerec("select id,main_heading,sub_heading,question_type,q_type from question_mgmt where id='$quid'");
		$query=database::singlerec("select id,choice1,choice2,choice3,choice4,choice5 from question_mgmt where id='$quid'");
		$qustype=$info['question_type'];
		$qtype=$info['q_type'];
		$ch1=$query['choice1'];
		$ch2=$query['choice2'];
		$ch3=$query['choice3'];
		$ch4=$query['choice4'];
		$ch5=$query['choice5'];
		$val=$query['id'];
		if($ch1==$chk) $var1 = "checked=checked"; else $var1="";
		if($ch2==$chk) $var2 = "checked=checked"; else $var2="";
		if($ch3==$chk) $var3 = "checked=checked"; else $var3="";
		if($ch4==$chk) $var4 = "checked=checked"; else $var4="";
		if($ch5==$chk) $var5 = "checked=checked"; else $var5="";
		if($qustype==2 && $qtype==5){
			$name="name='radio_box_comp$name'";
		}else{ 
			$name="name='radio_box$name'"; 
		}
		if($qustype==2 && $qtype==5){
			$radname="name='radioid_comp'";
		}else{ 
			$radname="name='radioid'"; 
		}
		
		$inputfield="";
		if(!empty($ch1)){
			$inputfield.="<div class='form-group'>
					<label><input type='radio' $name value='$ch1' $var1>$ch1</label>
				</div>";
		}
		if(!empty($ch2)){
			$inputfield.="<div class='form-group'>
					<label><input type='radio' $name value='$ch2' $var2>$ch2</label>
				</div>";
		}
		if(!empty($ch3)){
			$inputfield.="<div class='form-group'>
					<label><input type='radio' $name value='$ch3' $var3>$ch3</label>
				</div>";
		}
		if(!empty($ch4)){
			$inputfield.="<div class='form-group'>
					<label><input type='radio' $name value='$ch4' $var4>$ch4</label>
				</div>";
		}
		if(!empty($ch5)){
			$inputfield.="<div class='form-group'>
					<label><input type='radio' $name value='$ch5' $var5>$ch5</label>
				</div>";
		}
		if(!empty($val)){
			$inputfield.="<input type='hidden' $radname value='$val'>";
		}
		return array("id" => $info['id'], "main_head"=> $info['main_heading'], "sub_head" => $info['sub_heading'], "input" => $inputfield, "qus_type" => $info['question_type']);
	}
	
	function dropselect_field($quid,$name){
		$info=database::singlerec("select id,main_heading,sub_heading,question_type from question_mgmt where id='$quid'");
		$select=database::singlerec("select id,choice1,choice2,choice3,choice4,choice5 from question_mgmt where id='$quid'");
		$ch1=$select['choice1'];
		$ch2=$select['choice2'];
		$ch3=$select['choice3'];
		$ch4=$select['choice4'];
		$ch5=$select['choice5'];
		$val=$select['id'];
		$name="name='prf_select$name'";
		$inputfield="<select class='form-group' $name>";
		if(!empty($ch1)){
			$inputfield.="
			<option value='$ch1'>$ch1</option>";
		}
		if(!empty($ch2)){
			$inputfield.="<option value='$ch2'>$ch2</option>";
		}
		if(!empty($ch3)){
			$inputfield.="<option value='$ch3'>$ch3</option>";
		}
		if(!empty($ch4)){
			$inputfield.="<option value='$ch4'>$ch4</option>";
		}
		if(!empty($ch5)){
			$inputfield.="<option value='$ch5'>$ch5</option>";
		}
		if(!empty($val)){
			$inputfield.="<input type='hidden' name='selid' value='$val'>";
		}
		return array("id" => $info['id'], "main_head"=> $info['main_heading'], "sub_head" => $info['sub_heading'], "input" => $inputfield, "qus_type" => $info['question_type']);
	}
	
	function dropselect_field_from($quid,$chk=""){
		$info=database::singlerec("select id,main_heading,sub_heading,question_type,q_type,budget_from,budget_to from question_mgmt where id='$quid'");
		$budget_from=$info['budget_from'];
		$budget_to=$info['budget_to'];
		$val=$info['id'];
		$from="name='budget_from'";
		$to="name='budget_to'";
		$inputfrom="min-amount";
		$inputfield="";
		$inputto="max-amount";

		$inputfrom.="<div class='form-group'>
						<label><input type='text' $from id='budget_from' ></label>
					</div>";
		$inputto.="<div class='form-group'>
						<label><input type='text' $to id='budget_to'>
					</div>";
		if(!empty($val)){
			$inputfield.="<input type='hidden' name='budid' value='$val'>";
		}
		return array("id" => $info['id'], "main_head"=> $info['main_heading'], "sub_head" => $info['sub_heading'], "input" => $inputfrom.''.$inputto,  "qus_type" => $info['question_type']);
	}
	
	/*Test Function*/
	function getBud($id){
		$ret=database::singlerec("select * from sent_enquiry where id='{$id}'");
		return array("budfrm" => $ret['comp_budget_from'],"budto" => $ret['comp_budget_to']);
	}
	
	function dropselect_field_fromtest($quid,$chkfr="",$upd=""){
		$qus=self::getBud($chkfr);
		$qusbudfrm=$qus['budfrm'];
		$qusbudto=$qus['budto'];
		$info=database::singlerec("select id,main_heading,sub_heading,question_type,q_type,budget_from,budget_to from question_mgmt where id='$quid'");
		$budget_from=$info['budget_from'];
		$budget_to=$info['budget_to'];
		$val=$info['id'];
		$from="name='budget_from'";
		$to="name='budget_to'";
		$inputfrom="min-amount";
		$inputfield="";
		$inputto="max-amount";
		$inputfrom.="<div class='form-group'>
						<label><input type='text' $from id='budget_from' ></label>
					</div>";
		$inputto.="<div class='form-group'>
						<label><input type='text' $to id='budget_to'>
					</div>";
		if(!empty($val)){
			$inputfield.="<input type='hidden' name='budid' value='$val'>";
		}
		return array("id" => $info['id'], "main_head"=> $info['main_heading'], "sub_head" => $info['sub_heading'], "input" => $inputfrom.''.$inputto,  "qus_type" => $info['question_type']);
	}
	
	function getLocation($userid){
		$info=database::singlerec("select user_locality from register where id='$userid' and user_role='0'");
		$result=$info['user_locality'];
		if(!empty($result)) return $result; else return $result="";
		
	}
	
	function getGen($userid){
		$info=database::singlerec("select * from register where id='$userid' and user_role='0'");
		return array("email" => $info['email'],
					 "phone" => $info['contact_no1'],
					 "address" => $info['user_address']);
	}
	
	function getProfInfo($userid){
		$info=database::singlerec("select * from register where id='$userid' and user_role='1'");
		return array("email" => $info['email'],
					 "phone" => $info['contact_no1'],
					 "address" => $info['user_address']);
	}
	
	function getQus($qusid){
		$info=database::singlerec("select * from question_mgmt where id='$qusid'");
		return array("main_head" => $info['main_heading'],
					 "sub_head" => $info['sub_heading']);
	}
	
	function checkSentButton($userid){
		if(!empty($userid)){
			$info=database::singlerec("select user_role from register where id='{$userid}'");
			$u_role=$info['user_role'];
			if($u_role==0){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	function completeProjCount($userid){
		$info=database::singlerec("select count(*) as tot from sent_enquiry where prof_response='4' and receiver_id='{$userid}'");
		$complete_count=$info['tot'];
		if(!empty($complete_count)) return $complete_count; else return 0;
	}
	
	function checkFavourite($userid,$favid){
		$check=database::singlerec("select count(*) as tot from favourite where userid='{$userid}' and favouriterid='{$favid}'");
		$total=$check['tot'];
		if(!empty($total)) return 0; else return 1;
	}
	
	function getRegid($comid){
		$info=database::singlerec("select id from register where id='{$comid}'");
		return $info['id'];
	}
	
	function userDashboardCount($userid){
		
		//$info=database::singlerec("select count(*) as tot from sent_enquiry where senter_id='$userid' and (role='0' and prof_response='3') or (role='1' and prof_response!='4') and status!='6' and status='0'");
		$info=database::singlerec("select count(*) as tot from sent_enquiry where senter_id='$userid' and role='1' and prof_response!='4' and status!='6' and status='0'");

		$ordercount=$info['tot'];
		$req=database::singlerec("select count(*) as tot from sent_enquiry where senter_id='$userid' and role='0' and status!='6' and prof_response!='4' and status='0'");
		$reqordercount=$req['tot'];
		$fav=database::singlerec("select count(*) as tot from favourite where userid='$userid' and status='0'");
		$favcount=$fav['tot'];
		$rev=database::singlerec("select count(*) as tot from review where user_id='$userid' and active_status='0'");
		$revcount=$rev['tot'];
		return array("ordercount" => $ordercount, "reqcount" => $reqordercount, "favcount" => $favcount, "revcount" => $revcount);
	}
	
	function profesionDashboardCount($profid){
		$proforder=database::singlerec("select count(*) as tot from sent_enquiry where role='1' and status!='6'  and prof_response='0' and receiver_id='$profid' ");
		$profordercount=$proforder['tot'];
		$profreq=database::singlerec("select count(*) as tot from sent_enquiry where role='0' and status!='6' and prof_response='0' and receiver_id='$profid'");
		$proforder=$profreq['tot'];
		$rev=database::singlerec("select count(*) as tot from review where professionalid='$profid' and active_status='0'");
		$revcount=$rev['tot'];
		return array("proforder" => $profordercount, "profreq" => $proforder, "revcount" => $revcount);
	}
	
	function certifyverify($profid){
		if(!empty($profid)){
			$verify=database::singlerec("select certification_verify,certification_verify2 from register where id='{$profid}'");
			$certificate1=$verify['certification_verify'];
			$certificate2=$verify['certification_verify2'];
			if($certificate1==1 && $certificate2==1) return true; else return false;
		}else{
			return false;
		}
	}
	
	function getReghomeCount($stateid){
		$count=database::singlerec("select count(*) as tot from register where state='{$stateid}'");
		$retcount=$count['tot'];
		if(!empty($retcount)) return $retcount; else return 0;
	}
	

	function commonmailans($json_inputbox){
		
		$qusans1=json_decode($json_inputbox,true);
		$qusid=$qusans1['qus1'];
		$getqus=self::getQus($qusid);
		$mainhead=!empty($getqus['main_head'])?$getqus['main_head']:'';
		$subhead=!empty($getqus['sub_head'])?$getqus['sub_head']:'';
		$final_q1="<div class='form-group mb25'>
			<h4>$mainhead<h4>
				<h5>$subhead</h5>";
				
		if((($qusans1['ans1']) && ($qusans1['qus1']))) {
			$q1=$final_q1."<br>"."<p>".$qusans1['ans1']."</p></div>"; 
		}else if(($qusans1['ans2'] && $qusans1['qus1'])) {
		$q1=$final_q1."<br>"."<p>".$qusans1['ans2']."</p></div>"; 
		}else if(($qusans1['ans3'] && $qusans1['qus1'])) {
		$q1=$final_q1."<br>"."<p>".$qusans1['ans3']."</p></div>";
		}else if(($qusans1['ans4'] && $qusans1['qus1'])) {
		$q1=$final_q1."<br>"."<p>".$qusans1['ans4']."</p></div>"; 
		}else if(($qusans1['ans5'] && $qusans1['qus1'])) {
		$q1=$final_q1."<br>"."<p>".$qusans1['ans5']."</p></div>"; 
		}else{ 
		$q1="";
		}
		return $q1;
	}
	
	function mailCompQus($json_comp){
		$qusans5=json_decode($json_comp, true);
		$qusid=$qusans5['qus1'];
		$getqus=self::getQus($qusid);
		$mainhead=!empty($getqus['main_head'])?$getqus['main_head']:'';
		$subhead=!empty($getqus['sub_head'])?$getqus['sub_head']:'';
		$final_q5="<div class='form-group mb25'>
			<h4>$mainhead<h4>
				<h5>$subhead</h5>";
		if(($qusans5['ans1'] && $qusans5['qus1'])) {
			$q5=$final_q5."<br>"."<p>".$qusans5['ans1']."</p></div>"; 
		}else if(($qusans5['ans2'] && $qusans5['qus1'])) {
		$q5=$final_q5."<br>"."<p>".$qusans5['ans2']."</p></div>"; 
		}else if(($qusans5['ans3'] && $qusans5['qus1'])) {
		$q5=$final_q5."<br>"."<p>".$qusans5['ans3']."</p></div>";
		}else if(($qusans5['ans4'] && $qusans5['qus1'])) {
		$q5=$final_q5."<br>"."<p>".$qusans5['ans4']."</p></div>"; 
		}else if(($qusans5['ans5'] && $qusans5['qus1'])) {
		$q5=$final_q5."<br>"."<p>".$qusans5['ans5']."</p></div>";
		}else {
			$q5="";
		}
		return $q5;
	}
	
	function mailcheckboxQus($json_checkbox){
		$qusans2=json_decode($json_checkbox, true);
		$qusid=$qusans2['qus1'];
		$getqus=self::getQus($qusid);
		$mainhead=!empty($getqus['main_head'])?$getqus['main_head']:'';
		$subhead=!empty($getqus['sub_head'])?$getqus['sub_head']:'';
		$final_q2="<div class='form-group mb25'>
			<h4>$mainhead<h4>
				<h5>$subhead</h5>";
		if(($qusans2['ans1'])&& $qusans2['qus1']) {
			$q2=$final_q2."<br>"."<p>".implode(',',$qusans2['ans1'])."</p></div>"; 
		}else if($qusans2['ans2'] && $qusans2['qus1']) {
		$q2=$final_q2."<br>"."<p>".implode(',',$qusans2['ans2'])."</p></div>"; 
		}else if($qusans2['ans3'] && $qusans2['qus1']) {
		$q2=$final_q2."<br>"."<p>".implode(',',$qusans2['ans3'])."</p></div>";
		}else if($qusans2['ans4'] && $qusans2['qus1']) {
		$q2=$final_q2."<br>"."<p>".implode(',',$qusans2['ans4'])."</p></div>"; 
		}else if($qusans2['ans5'] && $qusans2['qus1']){ 
		$q2=$final_q2."<br>"."<p>".implode(',',$qusans2['ans5'])."</p></div>"; 
		}else {
		$q2="";	
		}
		return $q2;

	}
	 
	function getEmail($userid){
		$email=database::singlerec("select email from register where id='$userid'");
		return $email['email'];
	}
	
	function getReviewInfo($id){
		$userInfo=database::singlerec("select * from review where review_id='{$id}'");
		return array("stars" => $userInfo['stars'], "name" => $userInfo['name'], "comment" => $userInfo['comment'], "email" => $userInfo['email'], "crcdt" => $userInfo['crcdt'], "userid" => $userInfo['user_id'], "phone" => $userInfo['phone']);
	}
	
	function getReview($profid,$userid){
		$userInfo=database::singlerec("select sum(stars) as tot from review where professionalid='{$profid}' and user_id='{$userid}'");
		return $userInfo['tot'];
	}
	
	function getReviewProfcount($profid){
		$userInfo=database::singlerec("select sum(stars) as tot from review where professionalid='{$profid}' ");
		$cunt=$userInfo['tot'];
		if($cunt>0){
			$avg=$cunt/5;
			return array("avg" => $avg,"count" => $cunt);
		}else{
			return 0;
		}
	}
	
	function getimg($userid){
		$img=database::singlerec("select img from register where id='$userid'");
		return $img['img'];
	}
	
	function getretCount($id,$profid){
		$usercount=database::singlerec("select count(*) as tot from review where user_id='{$id}' and professionalid='{$profid}'");
		$usercount=$usercount['tot'];
		//if(!empty($usercount)) return 0; else return 1;
		return $usercount;
	}
	
	/*Return Ans Only*/
	 function commonmailansonly($json_inputbox){
		$qusans1=json_decode($json_inputbox,true);
		$qusid=$qusans1['qus1'];
		$getqus=self::getQus($qusid);
		if(($qusans1['ans1'] && $qusans1['qus1'])){ 
		$q1=$qusans1['ans1']; 
		}else if(($qusans1['ans2'] && $qusans1['qus1'])){
		$q1=$qusans1['ans2']; 
		}else if(($qusans1['ans3'] && $qusans1['qus1'])){ 
		$q1=$qusans1['ans3'];
		}else if(($qusans1['ans4'] && $qusans1['qus1'])){
		$q1=$qusans1['ans4']; 
		}else if(($qusans1['ans5'] && $qusans1['qus1'])){
		$q1=$qusans1['ans5'];
		} else {
		$q1=""; }
		return $q1;
	}
	
	function mailcheckboxQusonly($json_checkbox){
		$qusans2=json_decode($json_checkbox, true);
		$qusid=$qusans2['qus1'];
		$getqus=self::getQus($qusid);
		if(!empty($qusans2['qus1'])){
			$q2=@implode(',',$qusans2['ans1']); 
		}else if(!empty($qusans2['qus1'])) {
			$q2=@implode(',',$qusans2['ans2']); 
		}else if(!empty($qusans2['qus1'])){
			$q2=@implode(',',$qusans2['ans3']);
		}else if(!empty($qusans2['qus1'])) {
			$q2=@implode(',',$qusans2['ans4']); 
	    }else if(!empty($qusans2['qus1'])) {
			$q2=@implode(',',$qusans2['ans5']); 
		}else {
			$q2="";
		}
		return $q2;
	}
	
	function mailCompQusonly($json_comp){
		$qusans5=json_decode($json_comp, true);
		$qusid=$qusans5['qus1'];
		$getqus=self::getQus($qusid);
	if(($qusans5['ans1'] && $qusans5['qus1'])){
		$q5=$qusans5['ans1']; 
	}else if(($qusans5['ans2'] && $qusans5['qus1'])) {
		$q5=$qusans5['ans2']; 
	}else if(($qusans5['ans3'] && $qusans5['qus1'])) {
		$q5=$qusans5['ans3'];
	}else if(($qusans5['ans4'] && $qusans5['qus1'])) {
		$q5=$qusans5['ans4']; 
	}else if(($qusans5['ans5'] && $qusans5['qus1'])) {
		$q5=$qusans5['ans5']; 
	}else{
		$q5="";
	}
		return $q5;
	} 
	
	function getRevCount($value){
		$cont=database::singlerec("select count(*) as tot from review where stars='$value'");
		return $cont['tot'];
	}
	
	function getPsw($email){
		$psw=database::singlerec("select password from register where email='{$email}'");
		return $psw['password'];
	}
	
	function getLastCount($id){
		$cunt=database::singlerec("select click_count from banner where ban_id='$id'");
		$cunt=$cunt['click_count'];
		if(!empty($cunt)) return $cunt; else return 0;
	}
	function getBasename(){
		return basename($_SERVER['PHP_SELF']);
	}
	
	function getTodalAmount(){
		$sum=database::singlerec("select sum(estimate_fee) as tot from register where active_status='1'");
		$total=$sum['tot']+500;
		return $total;
	}
	
	function ordercunt(){
		$cunt=database::singlerec("select count(*) as tot from sent_enquiry where prof_response='4'");
		return $cunt['tot'];
	}
}
?>