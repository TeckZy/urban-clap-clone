<?php
require 'phpmailer/PHPMailerAutoload.php';
require 'phpmailer/emailtemplate.php';
class Database {	
	public $con;
	
	public function __construct(){
	  $host = "localhost";
	  $database = "uc";
	  $user ="root";
	  $password ="";
		$this->con=mysqli_connect($host,$user,$password,$database) or die("Could not connect to database");
	}
	
	public function que($query){
		if(!mysqli_query($this->con,$query)){
			$err2 = mysqli_error($this->con);
			echo "$err2";
			exit;			 
		}
		return true;
	}
	
	public function getQus($qusid){
		$query="select * from question_mgmt where id='$qusid'";
		$result=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($result,MYSQLI_BOTH);
		return array("main_head" => $row['main_heading'],
					 "sub_head" => $row['sub_heading']);
	}
	
	public function getCategoryname($categoryname){
		$query="select category_name from category where id='$categoryname'";
		$result=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($result,MYSQLI_BOTH);
		return $row['category_name'];
	}
	
	
	public function get_name($id){
		$query="select * from register where id='$id'";
		$result=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($result,MYSQLI_BOTH);
		$name=$row['fname']." ".$row['lname'];
	    return $name;
	}
	
	public function  getPsw($email){
		$query="select password from register where email='$email'";
		$result=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($result,MYSQLI_BOTH);
		return $row['password'];
	}
	
	public function completeProjCount($userid){
		$query="select count(*) as tot from sent_enquiry where prof_response='4' and receiver_id='$userid'";
		$result=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($result,MYSQLI_BOTH);
		$complete_count=$row['tot'];
		if(!empty($complete_count)) return $complete_count; else return "0";
	}
	
function getReviewProfcount($profid){
		//$userInfo=database::singlerec("select sum(stars) as tot from review where professionalid='{$profid}' ");
		
		
		$query="select sum(stars) as tot, count(*) as cnt from review where professionalid='$profid'";
		$result=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($result,MYSQLI_BOTH);
		
		
		$cunt=$row['tot'];
		$cnt=$row['cnt'];
		if($cunt>0){
			$avg=$cunt/$cnt;
			return $avg;
//return array("avg" => $avg,"count" => $cunt);
		}else{
			return 0;
		}
	}
	
	public function retid($query){
		if(!mysqli_query($this->con,$query)){
			$err2 = mysqli_error($this->con);
			echo "$err2";
			exit;			
		}
		$result=mysqli_insert_id($this->con);
		return $result;
	}
	public function fetch($query){
		$result = mysqli_query($this->con,$query);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		return $row;
	}
	public function fetch_all($query){
		$result = mysqli_query($this->con,$query);
		$i=0; $row1=array();
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		$row1[$i]= $row;
		$i++;
		}
		return $row1;
	}
	public function num_rows($query1){
	    $query = mysqli_query($this->con,$query1);
		$result = mysqli_num_rows($query);
		return $result;
	}
	public function Extract_Single($query){
        $x = 0;
        mysqli_real_escape_string($this->con,$query); 
		$result = mysqli_query($this->con,$query);
        while($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
            $q[$x] = $row[0];
            $implode[] = $q[$x] ;
            $x++;
        }
        mysqli_free_result($result);
        return @implode(',', $implode);
    }
    
    
    public function overall_Rate($id){
	
	GLOBAL $db;

$ratesum =$db->Extract_Single("select sum(stars) from review where professionalid='$id' and active_status='0'");  
$ratecount =$db->Extract_Single("select count(stars) from review where professionalid='$id' and active_status='0'");   
if($ratecount!=0){
$actual_rate = ($ratesum/$ratecount); 
}else{
$actual_rate = 0;
} 
$actual_rate = number_format($actual_rate, 1, '.', '');
 
 $str="";
 $n=(int)$actual_rate;
 $str = $n;
 
 return $str;
}
        
	function escap($strval){
		$ret=trim(mysqli_real_escape_string($this->con,$strval)); 
		return $ret;
	}
	
	public function getCountryid($countryname){
		$query="select country_id from country where country_name='$countryname'";
		$result=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($result,MYSQLI_BOTH);
		return $row['country_id'];
	}
	public function getStateid($statename){
		$query="select state_id from state where state_name='$statename'";
		$result=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($result,MYSQLI_BOTH);
		return $row['state_id'];
	}
	public function getCityid($cityname){
		$query="select city_id from city where city_name='$cityname'";
		$result=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($result,MYSQLI_BOTH);
		return $row['city_id'];
	}
	
	public function cat_name($countryid){
		$query="select category_name from category where id='$countryid'";
		$result=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($result,MYSQLI_BOTH);
		return $row['category_name'];
	}
	
	public function getCountryname($countryid){
		$query="select country_name from country where country_id='$countryid'";
		$result=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($result,MYSQLI_BOTH);
		return $row['country_name'];
	}
	
	public function getStatename($stateid){
		$query="select state_name from state where state_id='$stateid'";
		$result=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($result,MYSQLI_BOTH);
		return $row['state_name'];
	}
	public function getCityname($cityid){
		$query="select city_name from city where city_id='$cityid'";
		$result=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($result,MYSQLI_BOTH);
		return $row['city_name'];
	}
	
	public function getCategoryid($categoryname){
		$query="select id from category where category_name='$categoryname'";
		$result=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($result,MYSQLI_BOTH);
		return $row['id'];
	}
	
    public function email($from,$to,$subject,$msg){
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
		$mail->setFrom($from, 'PHP Cabs');      
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
	public function distance($lat1, $lon1, $lat2, $lon2, $unit) {
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);

		if ($unit == "K") {
			return ($miles * 1.609344);
		} else if ($unit == "N") {
			return ($miles * 0.8684);
		} else {
			return $miles;
		}
	}
    function GetDrivingDistance($lat1, $lat2, $long1, $long2)
	{
		$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&language=pl-PL";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		$response_a = json_decode($response, true);
		$dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
		$time = $response_a['rows'][0]['elements'][0]['duration']['text'];
		return $dist;
		//return array('distance' => $dist, 'time' => $time);
	}

    //To send notification
	function notification($fcm_token,$msg){
		$registrationIds = array($fcm_token);
		// prep the bundle
		$fields = array
		(
			'registration_ids' 	=> $registrationIds,
			'data'			=> $msg
		);

		$headers = array
		(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
		);

		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		return $result;
	}
	
    function sendsms($number,$message){
		$username="agaramr";
		$password ="ramesh";
		$sender="PHPCAB";
			
		$url="login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($number)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3'); 
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        return $curl_scraped_page = curl_exec($ch);
        curl_close($ch); 
	}
}

while(list($key,$value)=@each($_POST)){
	$$key=trim(addslashes($value));
}
while(list($key,$value)=@each($_GET)){
    $$key=trim(addslashes($value));
}	


?>