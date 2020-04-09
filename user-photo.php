<?php 
include "includes/title.php";
$id=$_SESSION['id'];
if(!(isset($_SESSION['id'])) || !(isset($_SESSION['email'])) || !(isset($_SESSION['fname'])))
{
header("location:login");
echo "<script>window.location='login'</script>";
}
$uInfo=$db->singlerec("select * from register where id='$id'");
$u_img=$uInfo['img'];
if(empty($u_img)){
	$u_img="uploads/userprofile/noimage.jpg";
}
?>
<body>

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
    <?php include "includes/header.php"; ?>
    <section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_2.jpg" data-natural-width="1400" data-natural-height="470">
               <div class="parallax-content-1">
                  <div class="animated fadeInDown">
                     <div id="search_bar_container" style="background:transparent;">
                        <div class="container">
                           <?php include"search.php"; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

  

	
	<section class="container-fluid margin_31 test3_bg">
       <div class="container mt30 mb30">
		  <div class="row">
			<?php include "leftmenu.php"; ?>
			
			<div class="col-lg-9 col-md-9">
                     <div class="col-sm-12 profile_box">
					  
		
		<div class="row mb10">
		   <div class="col-sm-12">
		       <h3 class="clr_txt">Change Profile Picture</h3>
		   </div>
		   <div class="clearfix"></div>
		   <div class="col-sm-12">
		       <div class="row mt20 mb20">
					<div class="col-sm-3">
					</div>
					<form class="form-horizontal" method="post" action="categoryupd.php" enctype="multipart/form-data">
					<div class="col-md-6 wow zoomIn" data-wow-delay="0.6s">
						<div class="feature_home">
							<img src="<?php echo $siteurl ?>/<?=$u_img; ?>" class="img-circle mb20" width="250" height="250">
							
							
							<!--<div class="file-upload">
										
										<input id="" value="<?echo $id;?>" class="" type="file" name="file-upload">
										<button type="button" class="file-upload__label">Upload Picture</button>
									</div>-->
							<div class="file-upload">
							
								<!--<label for="upload" class="file-upload__label">Choose Picture</label>-->
								<input type="hidden" name="idvalue" value="<?echo $id;?>" />
								<input id="file" class="file-upload__label" type="file" name="file">
								<br />
								<span id="uploaded_image"></span>
							</div>
						</div>
					</div>
					</form>
				</div>
		   </div>
		</div>
		
		
					 </div>
                  </div>
		  </div>
      </div>
    </section> 
	

 
		
<!--*********************** Footer ****************************-->
<?php include "includes/footer.php"; ?>

<div id="toTop"></div><!-- Back to top button -->

 <!-- Common scripts -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
/* $(document).ready(function(){
 $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
   if(fsize > 2000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image').html("<label class='text-success'>Image Upload Successfully...</label>");
	 location.href='';
    }
   });
  }
 });
}); */

 $(document).ready(function(){
 $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
   return false;
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
   if(fsize > 2000000)
  {
   alert("Image File Size is very big");

  }
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image').html("<label class='text-success'>Image Upload Successfully...</label>");
	 location.href='';
    }
   });
  }
 });
}); 
</script>


  </body>
</html>