<?php
require_once "Core/Config.php";
$state=isset($_POST['state']) ? $_POST['state'] : '';

$resp=$db->fetch_all("select city_name as city from city as a INNER JOIN state as b ON a.city_state_id=b.state_id where b.state_name='$state'");
$rest->DispResponse($resp);
?>