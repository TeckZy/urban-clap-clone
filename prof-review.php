<?php 
include "includes/title.php";
if(!(isset($_SESSION['pid'])) && !(isset($_SESSION['pemail'])) && !(isset($_SESSION['pfname'])))
{
header("location:login");
echo "<script>window.location='login'</script>";
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
		       <h3 class="clr_txt">My Reviews</h3>
		   </div>
		   <div class="clearfix"></div>
		   <div class="col-sm-12">
		       <div class="table-responsive">
			       <table id="example" class="table table-striped table-bordered appointments_tbl" cellspacing="0" width="100%">
				       <thead>
					       <tr>
						      <th>S.No</th>
						      <th>User Name</th>
						      <th>Review</th>
							  <th>Action</th>
						      
						   </tr>
					   </thead>
					   <tbody>
<?php
$getInfo=$db->get_all("select * from review where professionalid='$_SESSION[pid]' and active_status='0'");
$i=1;
foreach($getInfo as $info){
	$userid=$info['user_id'];
	$profesion_id=$info['professionalid'];
	$stars=$info['stars'];
	$msg=$info['comment'];
	$username=$com_obj->get_name($userid);
?>
					        <tr>
							   <td><?php echo $i; ?></td>
							   <td><?php echo ucfirst($username); ?></td>
							   <td><?php echo $com_obj->limit_text($msg,30); ?></td>
							   <td>
							     <ul class="edt_list">
								    <li><a href="list-detail?uid=<?php echo base64_encode($profesion_id); ?>" target="_blank" class="btn-sm btn-success">View</a></li>
									<!--<li><a href="#" class="btn-sm btn-danger">Delete</a></li>-->
								 </ul>
							   </td>
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