<? 
include'header.php';
include'leftmenu.php';
$id = isSet($id) ? $db->escapstr($id) : '' ;
$img = isSet($img) ? $db->escapstr($img) : '';
$parent_id = isSet($parent_id) ? $db->escapstr($parent_id) : '' ;

if($submit) {
    $crcdt = date("Y-m-d H:i:s");
	
	$category_name = $db->escapstr($category_name);
	//$descript = trim(addslashes($descript));
	$img=isset($_FILES['img']['tmp_name'])?$_FILES['img']['tmp_name']:'';
	$checkStatus = $db->check1column("category","category_name",$category_name);
		$checkStatus=0;
	if($checkStatus == 0){
		$set  = "category_name = '$category_name'";	
		$error='';
		if($img!=''){
			$file_to=uniqid();
			$file=$com_obj->upload_image("img",$file_to,530,280,"uploads/category/","NULL");
			if($file){
				$img=$com_obj->img_Name;
				$set .= ",img='$img'";
			}
			else {
				$error.="$com_obj->img_Err <br>";
			}
		}
		
		//$set  .= ",description = '$descript'";	
		$set  .= ",parent_id = '$parent_id'";
		if($error=='') {
			if($upd == 1) {
				$set  .= ",crcdt = '$crcdt'";    
				$set  .= ",active_status = '1'";
				$db->insertrec("insert into category set $set");
				$act = "add";
			}
			else if($upd == 2){
				$set  .= ",chngdt = '$crcdt'";   
				$db->insertrec("update category set $set where id='$idvalue'");
				$act = "upd";
			}
			//echo "<script>window.history.go(-1);</script>";
			echo "<script>window.location='category.php?act=$act'</script>"; 
			header("location:category.php?act=$act");
			exit;
		}	
		else {
			$error = "<div class='alert alert-danger'><b>Problem with uploading: <br><br>Possible reasons are,</b><br>$error</div>";
		}
	}
	else {
		$Message = "<font color='red'>$category_name Already Exist</font>";
	}
}
if($upd == 1)
	$TextChange = "Add";
else if($upd == 2)
	$TextChange = "Edit";

$GetRecord = $db->singlerec("select * from category where id='$id'");
@extract($GetRecord);
$category_name = stripslashes($GetRecord['category_name']);
//$description = stripslashes($GetRecord['description']);
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Sub Category</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title"><? echo $TextChange;?> Sub Category</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block card-dashboard table-responsive">
	                <form class="form-horizontal" method="post" action="subcategoryupd.php" enctype="multipart/form-data">
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />	
							<input type="hidden" name="parent_id" value="<?echo $parent_id;?>" />	
					  <div class="form-group col-sm-12">
						<label class="col-sm-2 control-label">Sub Category Name</label>
						<div class="col-sm-10">
                         <input type="text" name="category_name" class="form-control" value="<? echo $category_name; ?>" required />
						</div>
					  </div>
					  
					  
					  <!--<div class="form-group col-sm-12">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-10">
						  <textarea rows="5" name="descript" class="form-control" required>  <? echo $description; ?></textarea>
						</div>
					  </div>-->
					  
					  <div class="form-group col-sm-12">
						<label class="col-sm-2 control-label">Image</label>
						<div class="col-sm-10">
						  <input type="file" name="img" class="form-control" value="<?php echo $img; ?>" <? if($upd==1) echo "required"; ?> />
						<? if($upd==2) { ?>
						<img src="<?php echo $siteurl ?>/admin/uploads/category/<? echo $img; ?>" width="100px" height="100px" />
						<? } ?>
						<?php
						echo $error=isset($error)?$error:"";
						?>
						</div>
					  </div>
					  
					 <p style="font-size:14px;"> **Only jpg, jpeg, png, gif, bmp file with dimension above 530X220 & maximum size of 1 MB is allowed. </p>
					  
					  
					  <div class="form-actions center col-sm-12">
								<a href='category.php' class="btn btn-warning mr-1" >
									<i class="ft-x"></i> Cancel
								</a>
								<button type="submit" class="btn btn-primary" name="submit" value="Submit">
									<i class="fa fa-check-square-o"></i> Save
								</button>
							</div>
					  
					  
					</form>
	               
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
<!--/ HTML (DOM) sourced data -->

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="#" target="_blank" class="text-bold-800 grey darken-2">Doctor Booking </a>, All rights reserved. </span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN STACK JS-->
    <script src="assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="assets/js/core/app.js" type="text/javascript"></script>
    <!-- END STACK JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="assets/js/scripts/tables/datatables-extensions/datatables-sources.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>