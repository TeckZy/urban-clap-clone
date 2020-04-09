<? include "admin/AMframe/config.php";
ob_start(); 
$state_id=isSet($val) ? $val : '' ;
$DropDownQry = "SELECT city_id,city_name from city where city_state_id='$state_id' and city_status='1' order by city_name asc";
$city = $drop->get_dropdown($db,$DropDownQry,NULL);
echo $city;
?>



