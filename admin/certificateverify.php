<?php include 'header.php';
include 'leftmenu.php'; 
$Message=isSet($Message)?$Message:'';
if(isset($_REQUEST['inact1']))
{
	$id=$_REQUEST['inact1'];
	$act=$db->insertrec("update register set certification_verify='0' where id='$id'");
	header("location:certificateverify.php?inactsucc");
	echo "<script>window.location='certificateverify.php?inactsucc';</script>";
	exit;
}

if(isset($_REQUEST['act1']))
{
	$id=$_REQUEST['act1'];
	$act=$db->insertrec("update register set certification_verify='1' where id='$id'");
	header("location:certificateverify.php?actsucc");
	echo "<script>window.location='certificateverify.php?actsucc';</script>";
	exit;
}

if(isset($_REQUEST['inact2']))
{
	$id=$_REQUEST['inact2'];
	$act=$db->insertrec("update register set certification_verify2='0' where id='$id'");
	header("location:certificateverify.php?inactsucc");
	echo "<script>window.location='certificateverify.php?inactsucc';</script>";
	exit;
}

if(isset($_REQUEST['act2']))
{
	$id=$_REQUEST['act2'];
	$act=$db->insertrec("update register set certification_verify2='1' where id='$id'");
	header("location:certificateverify.php?actsucc");
	echo "<script>window.location='certificateverify.php?actsucc';</script>";
	exit;
}

if(isset($_REQUEST['delete']))
{
	$did=$_REQUEST['delete'];
	$det=$db->insertrec("delete from register where id='".$did."'");
	header("location:certificateverify.php?del");
	echo "<script>window.location='certificateverify.php?del';</script>";
	exit;
}

?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Certificate Management</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $Message;?></h4>
	                <h4 class="card-title">All Certificate</h4>
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
				    <!--<div class="col-sm-12" style="text-align: right;">
				        <a href="bannerupd.php?update=1" class="btn btn-info nrdr_r_zero">Add New</a>
					</div>-->
	                <div class="card-block card-dashboard table-responsive">
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					               <th>S.No.</th>
									<th>Image1</th>
									<th>Image2</th>
									<th width="250">Professional Name</th>
									<th>Certificate Status 1</th>
									<th>Certificate Status 2</th>
					                 <th style="min-width: 200px;" class='cntrhid'>Action</th>
					            </tr>
					        </thead>
							<tbody>
							      <?php
									$cer=$db->get_all("select * from register where user_role='1' order by id desc");
									$i=1;
									
									foreach($cer as $verify){
											$nameid=$verify['id'];
											$name=$com_obj->get_name($nameid);
											$img1=$verify['doc_img1'];
											$img2=$verify['doc_img2'];
											if(empty($img1)){
												$img1="noimage.jpg";
											}
											if(empty($img2)){
												$img2="noimage.jpg";
											}
									?>
								<tr>
									        <td>
												<?php echo $i; ?>
											</td>
											<td><img src="<?php echo $siteurl; ?>/uploads/profdoc/<?php echo $img1; ?>" width="50" height="50" style="vertical-align:middle;"/></td>
											<td><img src="<?php echo $siteurl; ?>/uploads/profdoc/<?php echo $img2; ?>" width="50" height="50" style="vertical-align:middle;"/></td>
											<td>
											<?php echo ucfirst($name); ?>
											
											</td>
											<td><?php if($verify['certification_verify']=='0') { ?>
													<a  href="certificateverify.php?act1=<?php echo $verify['id'];?>" title='Verified' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>
													<?php } if($verify['certification_verify']=='1') { ?>
												    <a  href="certificateverify.php?inact1=<?php echo $verify['id']; ?>"  title='Unverified'class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>
												  <?php } ?></td>
											
											<td>
											<?php if($verify['certification_verify2']=='0') { ?>
													<a  href="certificateverify.php?act2=<?php echo $verify['id'];?>" title='Verified' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>
													<?php } if($verify['certification_verify2']=='1') { ?>
												    <a  href="certificateverify.php?inact2=<?php echo $verify['id']; ?>"  title='Unverified'class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>
												  <?php } ?></td>
											</td>
											<td>
												<div class='btn-group btn-group-xs'>
													<!--<?php if($verify['certification_verify']=='0') { ?>
													<a  href="certificateverify.php?act=<?php echo $verify['id'];?>" title='Activate' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>
													<?php } if($verify['certification_verify']=='1') { ?>
												    <a  href="certificateverify.php?inact=<?php echo $verify['id']; ?>"  title='Deactivate'class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>
												  <?php } ?>
												  <!--<a  href='bannerupd.php?update=<?php echo $verify['ban_id']; ?>' title='Edit'class='btn btn-sm btn-icon btn-secondary btn-warning' ><i class='fa fa-pencil-square-o'></i></a>
												  <a href="banner.php?delete=<?php echo $verify['ban_id'];?>" title='Delete' onclick='return makesure()' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>-->
												   <a href="certificationview.php?view=<?php echo $verify['id'];?>"  class='btn btn-sm btn-icon btn-secondary' data-toggle='tooltip'><i class='fa fa-search'></i></a>
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