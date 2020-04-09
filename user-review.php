<?php 
include "includes/title.php";
if(!(isset($_SESSION['id'])) && !(isset($_SESSION['email'])) && !(isset($_SESSION['fname'])))
{
header("location:login");
echo "<script>window.location='login'</script>";
}
$delete=isset($delete)?$delete:'';
if(!empty($delete)){
	$delete=base64_decode($delete);
	$db->insertrec("delete from review where review_id='{$delete}'");
	header("Location: user-review?delete");
	echo "<script>href.location='user-review?delete'</script>";
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
                           <?php include "search.php"; ?>
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
<?php if(isset($_REQUEST['delete'])) { ?> 
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok green"></i>
		<strong class="green">
			Your Review Deleted Successfully !!!
		</strong>

	</div>
<?php } ?>
                     <div class="col-sm-12 profile_box">
					  
		
		<div class="row mb10">
		   <div class="col-sm-12">
		       <h3 class="clr_txt">My Reviews</h3>
		   </div>
		   <div class="clearfix"></div>
		   <div class="col-sm-12">
		       <div class="table-responsive">
			       <table id="example" class="table table-striped table-bordered appointments_tbl" cellspacing="0" width="100%">
				       <thead>
					       <tr>
						      <th>S.No</th>
						      <th>Professional Name</th>
						      <th>Review</th>
							  <th>Action</th>
						      <th>View Profile</th>
						   </tr>
					   </thead>
					   <tbody>
<?php
$getInfo=$db->get_all("select * from review where user_id='$_SESSION[id]' and active_status='0'");
$i=1;
foreach($getInfo as $info){
	$profesion_id=$info['professionalid'];
	$stars=$info['stars'];
	$msg=$info['comment'];
	$prof_name=$com_obj->get_name($profesion_id);
?>
					        <tr>
							   <td><?php echo $i; ?></td>
							   <td><?php echo ucfirst($prof_name); ?></td>
							   <td><?php echo $stars ; ?> Stars</td>
							   <td>
							     <ul class="edt_list">
								    <!--<li><a href="#" class="btn-sm btn-success">Edit</a></li>-->
									<li><a href="user-review?delete=<?php echo base64_encode($info['review_id']); ?>" class="btn-sm btn-danger">Delete</a></li>
								 </ul>
							   </td>
							   <td><a href="list-detail?uid=<?php echo base64_encode($profesion_id); ?>" target="_blank">View Profile</a> </td>
							</tr>
<?php $i++; } ?>
					   </tbody>
				   </table>
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