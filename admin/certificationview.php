<?php include 'header.php';
include 'leftmenu.php'; 
$msg="";
if(isset($addsuc)){
	$msg = "<center><span style='color:green'>Profile successfully updated!</span></center>";
}
$id = isSet($view) ? $db->escapstr($view):'';
	$docid=$db->escapstr($_GET['view']);
	$GetRecord=$db->singlerec("select * from register where id='$docid' and user_role='1'");
    $nameid=$GetRecord['id'];
	$name=$com_obj->get_name($nameid);
	$img1=$GetRecord['doc_img1'];
	$img2=$GetRecord['doc_img2'];
	if(empty($img1)){
		$img1="noimage.jpg";
	}
	if(empty($img2)){
		$img2="noimage.jpg";
	}
	
	if($GetRecord['certification_verify']==1) $status1="Verified"; else $status1="Not Verified";
	if($GetRecord['certification_verify2']==1) $status2="Verified"; else $status2="Not Verified";
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
				 <h4 class='succ_msg'><?echo $msg;?></h4>
	                <h4 class="card-title">Certificate details</h4>
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
				    <div class="row" style="padding-bottom:30px;">
						<div class="col-sm-6">
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Professional Name</b></label>
							    <div class="col-sm-8">
									<label>  <?php echo ucfirst($name);?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Certificate Image1</b></label>
							    <div class="col-sm-8">
									<img src="<?php echo $siteurl; ?>/uploads/profdoc/<?php echo $img1; ?>" height="70" style="vertical-align:middle;"/>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Certificate Image2</b></label>
							    <div class="col-sm-8">
									<img src="<?php echo $siteurl; ?>/uploads/profdoc/<?php echo $img2; ?>" height="70" style="vertical-align:middle;"/>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Certificate1 Verify Status</b></label>
							    <div class="col-sm-8">
									<label>  <?php echo $status1;?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Certificate2 Verify Status</b></label>
							    <div class="col-sm-8">
									<label>  <?php echo $status2;?></label>
								</div>
							</div>
							
							 <div class="form-actions center col-sm-12" style="text-align:center;"> 

						      <a type="button" href="certificateverify.php" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Back
								</a>
								<!--<a href="bannerupd.php?update=<?php echo $docid; ?>" type="submit"  class="btn btn-primary" name="submit" onClick="return ban_validate()">
									<i class="fa fa-check-square-o"></i> Edit
								</a>-->
						 							
							</div>
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