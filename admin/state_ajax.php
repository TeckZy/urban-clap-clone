<? include "AMframe/config.php";
ob_start(); 
$country_id=isSet($country_id) ? $country_id : '' ;
$DropDownQry = "SELECT state_id,state_name from state where state_country_id='$country_id' and state_status='1' order by state_name asc";
$state = $drop->get_dropdown($db,$DropDownQry,NULL);
echo $state;
?>



