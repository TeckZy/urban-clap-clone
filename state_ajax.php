<?php include "admin/AMframe/config.php";
$country_id=isSet($val) ? $val : '' ;
$DropDownQry = "SELECT state_id,state_name from state where state_country_id='$country_id' and state_status='1' order by state_name asc";
$state = $drop->get_dropdown($db,$DropDownQry,NULL);
echo $state;
?>



