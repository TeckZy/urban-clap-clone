<? include 'header.php';
include 'leftmenu.php';
$msg=isSet($Message)?$Message:'';
$title = isset($title)?$title:'';
$size = isset($size)?$size:'';
$width = isset($width)?$width:'';
$height = isset($height)?$height:'';
$title = isset($title)?$title:'';
$GetRecord = $db->singlerec("select * from slider where id='".$_GET['update']."'");
$title=$GetRecord['sliderlocation'];
$ban_link=$GetRecord['slider_text1'];
$ban_link2=$GetRecord['slider_text2'];

$size=$GetRecord['slider_size'];
$img=$GetRecord['sliderimg'];
if(isset($_REQUEST['updt']))
{
	$ban_id = $db->escapstr($_REQUEST['update']);
	$ban_title = $db->escapstr($_REQUEST['title']);
	$ban_size = $db->escapstr($_REQUEST['size']);

	$ban_link = $db->escapstr($_REQUEST['link']);
	$ban_link2 = $db->escapstr($_REQUEST['link2']);
	$ban_image=$db->escapstr($_FILES['bimage']['name']);
if($ban_title == "")
	{ 
		header("Location:indexslider.php?error");
		exit;
	}
	
	if($ban_size == "")
	{
		header("Location:indexslider.php?error");
		exit;
	}
	
	if($ban_image == "") 
	{
		if($_REQUEST['imagehide'] == "") 
		{
			header("Location:indexslider.php?not-a-image");
			exit;
		} 
		else 
		{
			$cate_img_small = $_REQUEST['imagehide'];
		}
		
	}
	 else
    {
		if($_REQUEST['imagehide'] != "")
		 {
			unlink("uploads/indexslider/original/".$_REQUEST['imagehide']);
			unlink("uploads/indexslider/thumb/".$_REQUEST['imagehide']);
			unlink("uploads/indexslider/mid/".$_REQUEST['imagehide']);			
		}		
		$img_size = filesize($_FILES['bimage']['tmp_name']);		
		if($img_size > 1048576) 
		{
			header("Location:indexslider.php?largeimage");
			exit;
		}
		else
		{
			$split_name = explode(".",$ban_image);			
			if(($split_name[1] == 'jpg') || ($split_name[1] == 'jpeg') || ($split_name[1] == 'gif') || ($split_name[1] == 'png') ||($split_name[1] == 'JPG') || ($split_name[1] == 'JPEG') || ($split_name[1] == 'GIF') || ($split_name[1] == 'PNG'))
			{		
				$cate_img_small = "ban".date("dmY")."-".rand("100","999").".".$split_name[1];
				$image_path = "uploads/indexslider/thumb/";
				$image_path_thumb = "uploads/indexslider/mid/";	
				move_uploaded_file($_FILES['bimage']['tmp_name'],"uploads/indexslider/original/".$cate_img_small);			
				$resizeObj = new resize("uploads/indexslider/original/".$cate_img_small);
				$resizeObj -> resizeImage(150, 150, 'exact');
				$resizeObj -> saveImage($image_path.$cate_img_small, 100);			
				$resizeObj -> resizeImage(60, 60, 'exact');
				$resizeObj -> saveImage($image_path_thumb.$cate_img_small, 100);
		    }
			else
			{
				header("Location:indexslider.php?not-a-image");
				exit;
			}
		
		}
		
	}	
	$update1 = $db->insertrec("UPDATE slider SET sliderlocation='$ban_title',slider_size='$ban_size',slider_text1='$ban_link',slider_text2='$ban_link2',sliderimg='$cate_img_small' WHERE id=$ban_id");
	header("Location:indexslider.php?editsuccess");		
    ?>
	<script>
	window.location="indexslider.php?editsuccess";
	</script>	
	<?php
}

if((isset($_REQUEST['submit'])) )
{
	
	$ban_title = $db->escapstr($_REQUEST['title']);
	$ban_size = $db->escapstr($_REQUEST['size']); 
	$ban_link = $db->escapstr($_REQUEST['link']);
	$ban_link2 = $db->escapstr($_REQUEST['link2']);
	$ban_image=$db->escapstr($_FILES['bimage']['name']);
    
	if($ban_image == "")
	{
		header("Location:indexslider.php?error");
		exit;
	}
	else 
	{
	
	$img_size = filesize($_FILES['bimage']['tmp_name']);
			if($img_size > 1048576) 
			{
				header("Location:indexslider.php?largeimage");
				exit;
			}
			else
			{
			$split_name = explode(".",$ban_image);
			if(($split_name[1] == 'jpg') || ($split_name[1] == 'jpeg') || ($split_name[1] == 'gif') || ($split_name[1] == 'png') ||($split_name[1] == 'JPG') || ($split_name[1] == 'JPEG') || ($split_name[1] == 'GIF') || ($split_name[1] == 'PNG'))
			{
			$cate_img_small = "ban".date("dmY")."-".rand("100","999").".".$split_name[1];
			$image_path = "uploads/indexslider/thumb/";
			$image_path_thumb = "uploads/indexslider/mid/";
			
			move_uploaded_file($_FILES['bimage']['tmp_name'],"uploads/indexslider/original/".$cate_img_small);
			//small image
			$resizeObj = new resize("uploads/indexslider/original/".$cate_img_small);

			// *** 2) Resize image (options: exact, portrait, landscape, auto, crop) landscape
			$resizeObj -> resizeImage(150, 150, 'exact');

			$resizeObj -> saveImage($image_path.$cate_img_small, 100);
			
			$resizeObj -> resizeImage(60, 60, 'exact');

			$resizeObj -> saveImage($image_path_thumb.$cate_img_small, 100);
		  }
		  else
		  {
			  header("Location:indexslider.php?not-a-image");
			  exit;
		  }
		
		 $insert = $db->insertrec("INSERT INTO slider (sliderimg,slider_size,slider_text1,slider_text2,sliderlocation,slider_date) VALUES ('$cate_img_small','$ban_size','$ban_link','$ban_link2','$ban_title',NOW())");
         header("Location:indexslider.php?succ");
         		 
	}
	
	if($ban_title == "")
	{
		header("Location:indexslider.php?error");
		exit;
	}
	
	 header("Location:indexslider.php?succ"); 

}
}

 ?>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Ad Slider</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title">Add new Slider</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block card-dashboard table-responsive">
	               <form name="myfor" id="myfor" method="post" enctype="multipart/form-data"  class="form-horizontal" >
                         
							<div class="panel-body">
								<div class="form-group col-sm-12 ">
									<label class="col-sm-3 control-label"> Slider  Location <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="title" id="title" class="form-control" value="Home Page"  readonly />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Slider  pixels <span class="req">*</span> </label>
									<div class="col-sm-9">
										<select class="form-control" name="size" id="ind"  >
                                          <?php  foreach($GT_slider as $val) {
									 ?>
									  <option <?php if($GetRecord['slider_size']== "$val") {echo "selected";} ?>  ><?php echo $val; ?></option>
								    <?php } ?>
                                         </select>
										 </div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Slider Image <span class="req">*</span> </label>
								
									<div class="col-sm-6">
										<input type="file" name="bimage" id="bimage" class="form-control"  />
										<input type="hidden" name="imagehide" id="imgg" value="<?=$img;?>" />
									</div>
									
									 <? If(isset($update) && ($update!=1)) {?>
									<div class="col-sm-3">
									    
										<img src="uploads/indexslider/original/<? echo $img; ?>"  height="70" />
									</div>
									<? } ?>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Slider Text1 <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="link" id="link" class="form-control" value="<?=$ban_link;?>"/>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Slider Text2 <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="link2" id="link2" class="form-control" value="<?=$ban_link2;?>"/>
									</div>
								</div>
					
					       <div class="form-actions center col-sm-12">
						   <? If(isset($update) && ($update!=1) ) {?>
								<a type="button" href="indexslider.php" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Cancel
								</a>
								<button type="submit"  class="btn btn-primary" name="updt" onClick="return ban_validate1()">
									<i class="fa fa-check-square-o"></i> Save
								</button>
						   <? } else { ?>
						   <a type="button" href="indexslider.php" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Cancel
								</a>
								<button type="submit"  class="btn btn-primary" name="submit" onClick="return ban_validate()">
									<i class="fa fa-check-square-o"></i> Save
								</button>
						   <?  } ?>								
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
<script>
	
	function ban_validate()
	{
	
	if(document.getElementById('ind').value=="")
	{
	alert("Please Select the Slider size");
	document.getElementById('ind').focus();
	return false;
	
	}
	
	if(document.getElementById('bimage').value=="")
	{
		alert("Please enter the the Slider Image");
		document.getElementById('bimage').focus();
		return false;
	}
	else
	{
		var ss=document.getElementById('bimage').value;
		var index=ss.lastIndexOf(".");				
		var sstring=ss.substring(index+1);
		var ssivanew=sstring.toLowerCase();
		if(ssivanew!="jpg" && ssivanew!="png" && ssivanew!="jpeg" && ssivanew!="gif" && ssivanew!="JPG" && ssivanew!="PNG" && ssivanew!="JPEG" && ssivanew!="GIF")
		{
			  alert("Please upload .jpg , .png , .jpeg , .gif files only");
			  document.getElementById('bimage').value="";
			  document.getElementById('bimage').focus();
			  return false;
		 }
	}
		
	if(document.getElementById('link').value=="")
	{
	alert("Please Enter the slider Text1");
	document.getElementById('link').focus();
	return false;
	
	}
	if(document.getElementById('link2').value=="")
	{
	alert("Please Enter the slider Text2");
	document.getElementById('link2').focus();
	return false;
	
	}
	}
	</script>
	<script>
	
	function ban_validate1()
	{
	
	if(document.getElementById('width').value=="")
	{
	alert("Please Enter the Slider width");
	document.getElementById('width').focus();
	return false;
	}
	
	if(document.getElementById('height').value=="")
	{
	alert("Please Enter the Slider height");
	document.getElementById('height').focus();
	return false;
	}
	
	if(document.getElementById('imgg').value=="")
	{
	if(document.getElementById('bimage').value=="")
	{
		alert("Please enter the the Slider Image");
		document.getElementById('bimage').focus();
		return false;
	}
	else
	{
		var ss=document.getElementById('bimage').value;
		var index=ss.lastIndexOf(".");				
		var sstring=ss.substring(index+1);
		var ssivanew=sstring.toLowerCase();
		if(ssivanew!="jpg" && ssivanew!="png" && ssivanew!="jpeg" && ssivanew!="gif" && ssivanew!="JPG" && ssivanew!="PNG" && ssivanew!="JPEG" && ssivanew!="GIF")
		{
			  alert("Please upload .jpg , .png , .jpeg , .gif files only");
			  document.getElementById('bimage').value="";
			  document.getElementById('bimage').focus();
			  return false;
		 }
	}
	}
	
	if(document.getElementById('link').value=="")
	{
	alert("Please Enter the Slider Text1");
	document.getElementById('text').focus();
	return false;
	
	}
	if(document.getElementById('link2').value=="")
	{
	alert("Please Enter the Slider Text2");
	document.getElementById('text2').focus();
	return false;
	
	}
	}
	</script>
<? include 'footer.php'; ?>