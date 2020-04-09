<?php 
include "includes/title.php";
if(!(isset($_SESSION['pid'])) && !(isset($_SESSION['pemail'])) && !(isset($_SESSION['pfname'])))
{
header("location:login");
echo "<script>window.location='login'</script>";
}
$pid=$_SESSION['pid'];
$uInfo=$db->singlerec("select * from register where id='$pid'");
$prf_img=$uInfo['img'];
if(empty($prf_img)){
	$prf_img="uploads/profprofile/noimage.jpg";
}
?>
<body>
    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
    <?php include "includes/header.php"; ?>
    <section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_2.jpg" data-natural-width="1400" data-natural-height="470">
               <?php include "welcomeprofession.php"; ?>
			   </section>
	
	<section class="container-fluid margin_31 test3_bg">
       <div class="container mt30 mb30">
		  <div class="row">
			<?php include "profleftmenu.php"; ?>
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
							<img src="<?php echo $siteurl ?>/<?=$prf_img; ?>" class="img-circle mb20" width="250" height="250">
							
							<div class="file-upload">
								<!--<label for="upload" class="file-upload__label">Choose Picture</label>-->
								<input type="hidden" name="idvalue" value="<?echo $pid;?>" />
								<input id="file" class="file-upload__label" onchange="img_validate('file',400,600)" type="file" name="file">
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
function img_validate(id,width,height){
 var fuData = document.getElementById(id);
 var FileUploadPath = fuData.value;
 var action = 'update';
 var form_data = new FormData();
 if(window.FileReader) {   
  if (FileUploadPath != '') {    
   var size = fuData.files[0].size;
   if (size > 1048576) {    
    alert('Maximum allowed size is 1 MB');
    fuData.value="";
    fuData.focus();
    return false;
   } else {   
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
    
    if (Extension == "gif" || Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
     if (fuData.files && fuData.files[0]) {
      var reader = new FileReader();
      //$image = $("#"+showDiv+"");
      reader.onload = function(e) {
       var w, h;
       
       var image = new Image();
       image.src = e.target.result;
       image.onload = function() {
        w = this.width;
        h = this.height;
        localStorage.setItem("width", w);
        localStorage.setItem("height", h);
        if (w > width || h > height) {
			form_data.append("file", document.getElementById(id).files[0]);
		 $.ajax({
			url:"profupload.php",
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
         fuData.value="";
         fuData.focus();
         return false;
         
        } else {
			$('#uploaded_image').html("<label class='text-success'>Please Upload your image size 400x600...</label>").css("color","red");
         $image.attr("src", e.target.result).show();
        }
       }
      }
      reader.readAsDataURL(fuData.files[0]);
     }
    } else {
     alert("Invalid Image File");
     fuData.value="";
     fuData.focus();
     return false;
    }
   }
  }
 } else {
 
 swal("Incompatible browser","Your browser does not support Advance javascript functions so kindly update your browser to latest version..","warning");
 return true;
 }
} 


/*$(document).ready(function(){
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
  var img = document.getElementById("file").value;
	var w = $("img").width();
	var h = $("img").height();
	var defh=470;
	var defw=1400;
	var imageNaturalWidth = $('img').prop('naturalWidth');
var imageNaturalHeight = $('img').prop('naturalHeight');
  var fsize = f.size||f.fileSize;
  /*if(fsize > 2000000)
  {
   alert("Image File Size is very big");
  }*/
  /*if(defw < imageNaturalWidth || defh < imageNaturalHeight){
		alert("Please upload image size 400x600");
	}
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"profupload.php",
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
});*/
</script>

  </body>
</html>