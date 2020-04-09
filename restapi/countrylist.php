<?php
require_once "Core/Config.php";

$rawdata=$db->fetch_all("select country_name as country from country where country_status='1'");
$rest->DispResponse($rawdata);
?>