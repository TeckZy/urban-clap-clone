<?php include "admin/AMframe/config.php";
$id=isSet($id) ? $id : '' ;
$DropDownQry = "select id,category_name from category where active_status='1' and parent_id='$id' order by category_name asc";
$subcat = $drop->get_dropdown($db,$DropDownQry,NULL);
if(!empty($subcat)){
	echo $subcat;
}else{
	echo "<option>No Service Available</option>";
}
?>