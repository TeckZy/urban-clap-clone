<?php
include "admin/AMframe/config.php";
if($_FILES["file"]["name"] != '')
{
 $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $name = "userimg".date("Y-m-d").'-'.rand(100, 999) . '.' . $ext;
 $location = 'uploads/userprofile/' . $name;  
 $file=move_uploaded_file($_FILES["file"]["tmp_name"], $location);
 //echo '<img src="'.$location.'" height="150" width="225" class="img-thumbnail" />';
 if($file){
	 $db->insertrec("update register set img='$location' where id='$_SESSION[id]'");
 }
}
?>