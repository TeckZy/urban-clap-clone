<?php
require_once "Core/Config.php";
$country=isset($_POST['country']) ? $_POST['country'] : '';

$resp=$db->fetch_all("select state_name as state from state as a INNER JOIN country as b ON a.state_country_id=b.country_id where b.country_name='$country'");

$rest->DispResponse($resp);
?>