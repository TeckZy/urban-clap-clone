<?php include 'header.php';
include 'leftmenu.php'; 
$Message=isSet($Message)?$Message:'';
if(isset($_REQUEST['inact']))
{
	$id=$_REQUEST['inact'];
	$act=$db->insertrec("update testimonials set slider_status='0' where id='$id'");
	header("location:testimonial.php?inactsucc");
	echo "<script>window.location='testimonial.php?inactsucc';</script>";
	
}

if(isset($_REQUEST['act']))
{
	$id=$_REQUEST['act'];
	$act=$db->insertrec("update testimonials set slider_status='1' where id='$id'");
	header("location:testimonial.php?actsucc");
	echo "<script>window.location='testimonial.php?actsucc';</script>";
}

if(isset($_REQUEST['delete']))
{
	
	$did=$_REQUEST['delete'];
	$det=$db->insertrec("delete from testimonials where id='".$did."'");
	header("location:testimonial.php?del");
	echo "<script>window.location='testimonial.php?del';</script>";
}
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Testimonials Management</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $Message;?></h4>
	                <h4 class="card-title">All Testimonials</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			<div class="heading-elements">
	                    <ul class="list-inline mb-0">
	                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
	                        <!--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>-->
	                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
	                        <!--<li><a data-action="close"><i class="ft-x"></i></a></li>-->
	                    </ul>
	                </div>
	            </div>
	            <div class="card-body collapse in">
				    <div class="col-sm-12" style="text-align: right;">
				        <a href="testimonialupd.php?update=1" class="btn btn-info nrdr_r_zero">Add New</a>
					</div>
	                <div class="card-block card-dashboard table-responsive">
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					               <th>S.No.</th>
									<th>Image</th>
									<th width="250">Location</th>
									<th>Client Name</th>
									<th width="300">Text</th>			
					                 <th style="min-width: 200px;" class='cntrhid'>Action</th>
					            </tr>
					        </thead>
							<tbody>
							      <?php
									$ban=$db->get_all("select * from testimonials order by id desc");
									$i=1;
									$num=$db->numrows("select * from testimonials");
									
									foreach($ban as $row_ban){
									?>
								<tr>
									        <td>
												<?php echo $i; ?>
											</td>
											<td><img src="uploads/testimonials/mid/<?php echo $row_ban['sliderimg']; ?>" width="50" height="50" style="vertical-align:middle;"/></td>
											
											<td>
											<?php echo $row_ban['sliderlocation']; ?>
											
											</td>
											<td><?php echo $row_ban['slider_text1']; ?></td>
											<td>
											<?php echo $row_ban['slider_text2']; ?>
											
											</td>
											
											<td>
												<div class='btn-group btn-group-xs'>
													<?php if($row_ban['slider_status']=='1') { ?>
													<a  href="testimonial.php?inact=<?php echo $row_ban['id'];?>" title='Activate' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>
													<?php } if($row_ban['slider_status']=='0') { ?>
												    <a  href="testimonial.php?act=<?php echo $row_ban['id']; ?>"  title='Deactivate'class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>
														
													 
												  <?php } ?>
												  <a  href='testimonialupd.php?update=<?php echo $row_ban['id']; ?>' title='Edit'class='btn btn-sm btn-icon btn-secondary btn-warning' ><i class='fa fa-pencil-square-o'></i></a>
												  <a href="testimonial.php?delete=<?php echo $row_ban['id'];?>" title='Delete' onclick='return makesure()' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>
												   <!--<a href="bannerview.php?view=<?php echo $row_ban['id'];?>" onclick="showpop2('<?php echo $row_ban['id']; ?>','<?php echo $row_ban['ban_location']; ?>','<?php echo $row_ban['ban_width']; ?>','<?php echo $row_ban['ban_height']; ?>','<?php echo $row_ban['ban_image']; ?>','<?php echo $row_ban['ban_link']; ?>');" class='btn btn-sm btn-icon btn-secondary' data-toggle='tooltip'><i class='fa fa-search'></i></a>-->
												</div>
												</td>
										</tr>

									<?php $i++; }?>
                                    </tbody>
					    </table>
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

<?php include 'footer.php'; ?>