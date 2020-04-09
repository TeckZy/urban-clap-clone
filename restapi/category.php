<?php
require_once "Core/Config.php";

$rawdata=$db->fetch_all("select category_name as category from category where active_status='1' and parent_id='0' order by category_name asc");
$rest->DispResponse($rawdata);
?>