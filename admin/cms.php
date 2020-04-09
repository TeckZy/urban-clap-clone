<? include "header.php";
include "leftmenu.php";
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act = isSet($act) ? $act : '' ;
$page = isSet($page) ? $page : '' ;
$Message = isSet($Message) ? $Message : '' ;
$aboutus=isSet($aboutus)?$aboutus:'';
$about_text=isSet($about_text)?$about_text:'';
$about_text1=isSet($about_text1)?$about_text1:'';
$services=isSet($services)?$services:'';
$services_text1=isSet($services_text1)?$services_text1:'';
$services_text2=isSet($services_text2)?$services_text2:'';
$welcome_text=isSet($welcome_text)?$welcome_text:'';
$what_wedo=isSet($what_wedo)?$what_wedo:'';
$terms=isSet($terms)?$terms:'';
$privacy=isSet($privacy)?$privacy:'';
$home_footer1=isSet($home_footer1)?$home_footer1:'';
$home_footer2=isSet($home_footer2)?$home_footer2:'';
$ctc_addr=isSet($ctc_addr)?$ctc_addr:'';
$ctc_email=isSet($ctc_email)?$ctc_email:'';
$ctc_num=isSet($ctc_num)?$ctc_num:'';
$whatweare=isSet($whatweare)?$whatweare:'';
$contactus_text=isSet($contactus_text)?$contactus_text:'';
$lat=isset($lat)?$lat:'';
$lon=isset($lon)?$lon:'';

if(isset($submit1)){
    $crcdt = time();
	$aboutus = trim(addslashes($aboutus));
	$about_text = trim(addslashes($about_text));
	$about_text1 = trim(addslashes($about_text1));
	$services = trim(addslashes($services));
	$services_text1 = trim(addslashes($services_text1));
	$services_text2 = trim(addslashes($services_text2));
	$welcome_text = trim(addslashes($welcome_text));
	$what_wedo = trim(addslashes($what_wedo));
	$whatweare = trim(addslashes($whatweare));
	$terms = trim(addslashes($terms));
	$privacy = trim(addslashes($privacy));
	$home_footer1 = trim(addslashes($home_footer1));
	$home_footer2 = trim(addslashes($home_footer2));
	$contactus_text = trim(addslashes($contactus_text));
	$lat = $db->escapstr($lat);
	$lon = $db->escapstr($lon);
	$ctc_addr = trim(addslashes($ctc_addr));
	$ctc_email = $db->escapstr($ctc_email);
	$ctc_num = $db->escapstr($ctc_num);
	
	$set  = "aboutus = '$aboutus'";
	$set  .=",lat='$lat'";
	$set  .=",lon='$lon'";
	$set  .= ",about_text = '$about_text'";
	$set  .= ",about_text1 = '$about_text1'";
	$set  .= ",services = '$services'";
	$set  .= ",services_text1 = '$services_text1'";
	$set  .= ",services_text2 = '$services_text2'";
	$set  .= ",welcome_text = '$welcome_text'";
	$set  .= ",what_wedo = '$what_wedo'";
	$set  .= ",whatweare='$whatweare'";
	$set  .= ",terms = '$terms'";
	$set  .= ",privacy = '$privacy'";
	$set  .= ",home_footer1 = '$home_footer1'";
	$set  .= ",home_footer2 = '$home_footer2'";
	$set  .= ",contactus_text = '$contactus_text'";
	$set  .= ",ctc_addr = '$ctc_addr'";
	$set  .= ",ctc_email = '$ctc_email'";
	$set  .= ",ctc_num = '$ctc_num'";
	$set  .= ",ipaddr = '$ipaddress'";
	$set  .= ",chngdt = '$crcdt'";    
	$set  .= ",userchng = '$usrcre_name'";
	$db->insertrec("update cms set $set where id='1'");
	echo "<script>location.href='cms.php?act=upd'</script>";
	header("location:cms.php?act=upd");
	exit;
}
if($upd == 1)
	$hidimg = "style='display:none;'";
else if($upd == 2)
	$hidimg = "";

$GetRecord = $db->singlerec("select * from cms where id='1'");
@extract($GetRecord);
$aboutus = stripslashes($aboutus);
$about_text = stripslashes($about_text);
$about_text1 = stripslashes($about_text1);
$services = stripslashes($services);
$services_text1 = stripslashes($services_text1);
$services_text2 = stripslashes($services_text2);
$welcome_text = stripslashes($welcome_text);
$what_wedo = stripslashes($what_wedo);
$whatweare = stripcslashes($whatweare);
$terms = stripslashes($terms);
$privacy = stripslashes($privacy);
$home_footer1 = stripslashes($home_footer1);
$home_footer2 = stripslashes($home_footer2);
$ctc_addr = stripslashes($ctc_addr);
$ctc_email = stripslashes($ctc_email);
$ctc_num = stripslashes($ctc_num);
$contactus_text = stripcslashes($contactus_text);
$lat = stripcslashes($lat);
$lon = stripcslashes($lon);

if($act=="upd") {
	$Message = "<font color='green'><b>Updated Successfully</b></font>" ;
}
?>


    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Settings</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				<h3 class="panel-title"><?echo $Message;?></h3>
	                <h4 class="card-title">CMS Settings</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block card-dashboard table-responsive">
	                <form method="post" action="cms.php" enctype="multipart/form-data" class="form-horizontal" >
					<input type="hidden" name="idvalue" value="<? echo $id; ?>" />
					<input type="hidden" name="pg" value="<? echo $page; ?>" />
					<input type="hidden" name="upd" value="<? echo $upd; ?>" />
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Latitude</label>
						<div class="col-sm-12"><input type="text" class="form-control" name="lat" value="<? echo $lat; ?>" /></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Longitude</label>
						<div class="col-sm-12"><input type="text" class="form-control" name="lon" value="<? echo $lon; ?>" /></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">About Us  <font color="red">*</font></label>
						<div class="col-sm-12"><textarea name="aboutus" class="form-control tiny" ><? echo $aboutus; ?></textarea></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">What We do  <font color="red">*</font></label>
						<div class="col-sm-12"><textarea name="what_wedo" class="form-control tiny" ><? echo $what_wedo; ?></textarea></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">What We are  <font color="red">*</font></label>
						<div class="col-sm-12"><textarea name="whatweare" class="form-control tiny" ><? echo $whatweare; ?></textarea></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">About Text1</label>
						<div class="col-sm-12"><textarea name="about_text" class="form-control tiny" ><? echo $about_text; ?></textarea></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">About Text2</label>
						<div class="col-sm-12"><textarea name="about_text1" class="form-control tiny" ><? echo $about_text1; ?></textarea></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Our Services </label>
						<div class="col-sm-12"><textarea name="services" class="form-control tiny" ><? echo $services; ?></textarea></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Services Text1</label>
						<div class="col-sm-12"><textarea name="services_text1" class="form-control tiny" ><? echo $services_text1; ?></textarea></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Services Text2</label>
						<div class="col-sm-12"><textarea name="services_text2" class="form-control tiny" ><? echo $services_text2; ?></textarea></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Terms and Conditions </label>
						<div class="col-sm-12"><textarea name="terms" class="form-control tiny" ><? echo $terms; ?></textarea></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Privacy</label>
						<div class="col-sm-12"><textarea name="privacy" class="form-control tiny" ><? echo $privacy; ?></textarea></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Home Footer1</label>
						<div class="col-sm-12"><textarea name="home_footer1" class="form-control tiny" ><? echo $home_footer1; ?></textarea></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Home Footer2</label>
						<div class="col-sm-12"><textarea name="home_footer2" class="form-control tiny" ><? echo $home_footer2; ?></textarea></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Contact Us Text</label>
						<div class="col-sm-12"><textarea name="contactus_text" class="form-control tiny" ><? echo $contactus_text; ?></textarea></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Contact Address</label>
						<div class="col-sm-12"><textarea name="ctc_addr" class="form-control tiny" ><? echo $ctc_addr; ?></textarea></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Contact Email</label>
						<div class="col-sm-12"><input type="email" class="form-control" name="ctc_email" value="<? echo $ctc_email; ?>" /></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Contact Number</label>
						<div class="col-sm-12"><input type="text" class="form-control" name="ctc_num" value="<? echo $ctc_num; ?>" /></div>
					</div>

					  
					  
					  <div class="form-actions center col-sm-12">
								<button type="reset" class="btn btn-warning mr-1" name="reset">
									<i class="ft-x"></i> Reset
								</button>
								<button type="submit" class="btn btn-primary" name="submit1" >
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