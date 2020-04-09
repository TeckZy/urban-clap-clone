<?php include "AMframe/config.php";
ob_Start();
$val=isset($val) ? $val : '';
$DropDownQry="select id,category_name from category where parent_id='$val' order by category_name asc";
$subcat=$drop->get_dropdown($db,$DropDownQry,"NULL");
if(!empty($subcat)){
	echo $subcat;
}else{
	echo "<option>No Service Available</option>";
}
?>