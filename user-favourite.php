<?php 
include "includes/title.php";
if(!(isset($_SESSION['id'])) && !(isset($_SESSION['email'])) && !(isset($_SESSION['fname'])))
{
header("location:login");
echo "<script>window.location='login'</script>";
}
$sessionid=isset($_SESSION['id'])?$_SESSION['id']:'';
$favremove=isset($favremove)?$favremove:'';
if(!empty($favremove)){
	$favremove=base64_decode($favremove);
	$db->insertrec("delete from favourite where id='{$favremove}'");
	header("Location: user-favourite?deleted");
	echo "<script>href.location='user-favourite?deleted'</script>";
	exit;
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
<?php if(isset($_REQUEST['deleted'])) { ?> 
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok green"></i>
		<strong class="green">
			Favourite Removed Successfully !!!
		</strong>

	</div>
<?php } ?>
                     <div class="col-sm-12 profile_box">
					  
		
		<div class="row mb10">
		   <div class="col-sm-12">
		       <h3 class="clr_txt"> My Favourite</h3>
		   </div>
		   <div class="clearfix"></div>
		   <div class="col-sm-12">

                    <div class="row mt20 mb20">
<?php 
$favinfo=$db->get_all("select * from favourite where userid='$sessionid' and status='0'"); 
if(!empty($favinfo)){
	foreach($favinfo as $fav){
		$favname=$com_obj->get_name($fav['favouriterid']);
		$uinfo=$db->singlerec("select * from register where id='$fav[favouriterid]'");
		$prf_img=$uinfo['img'];
		if(empty($prf_img)){
			$prf_img="uploads/profprofile/noimage.jpg";
		}
?>
							<div class="col-md-4 wow zoomIn" data-wow-delay="0.1s">
								<div class="feature_home">
									<img src="<?php echo $prf_img; ?>" class="img-circle mb20" width="150" height="150">
									<h5><?php echo ucfirst($favname); ?></h5>
									<a href="list-detail?uid=<?php echo base64_encode($fav['favouriterid']); ?>" class="btn_1 outline">View Profile</a>
								</div>
								<span class="remove"><a href="<?php echo $siteurl ?>/user-favourite?favremove=<?php echo base64_encode($fav['id']); ?>" onclick="return if(confirm('Are you sure want to remove this favourite?')) { return true; }else { return false; }"><i class="icon-cancel-circled"></i></a></span>
							</div>
							
<?php } }else{ ?>
	<h3 class="text-center">No Favourite Found</h3>
<?php } ?>
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

  </body>
</html>