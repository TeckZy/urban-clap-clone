<?php
require_once "Core/Config.php";
$catid=isset($_POST['catid']) ? $_POST['catid'] : '';

$resp=$db->fetch_all("select * from question_mgmt where cat_id='$catid' and status='1' or q_type='5' order by q_type desc");
$rest->DispResponse($resp);
?>