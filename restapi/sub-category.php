<?php
require_once "Core/Config.php";

$category=isset($_POST['category']) ? $_POST['category'] : '';
$category=$db->getCategoryid($category);

$rawdata=$db->fetch_all("select category_name as sub_category from category where active_status='1' and parent_id='$category' order by category_name asc");
$rest->DispResponse($rawdata);
?>