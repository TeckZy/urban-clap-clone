<?php 
include "includes/title.php";
if(!(isset($_SESSION['pid'])) && !(isset($_SESSION['pemail'])) && !(isset($_SESSION['pfname'])))
{
header("location:login.php");

echo "<script>window.location='login.php'</script>";

}
$uid=$_SESSION['pid'];
$rid=base64_decode($_GET['id']);
$sentr_id=$db->singlerec("select * from sent_enquiry where id='$rid'");
$sen_id=$sentr_id['senter_id'];

//first_qus
$qusans1=$sentr_id['qusans1'];
$qusans1=json_decode($qusans1, true);
$qusid=$qusans1['qus1'];
$getqus=$com_obj->getQus($qusid);
$mainhead=!empty($getqus['main_head'])?$getqus['main_head']:'';
$subhead=!empty($getqus['sub_head'])?$getqus['sub_head']:'';
$final_q1="<div class='form-group mb25'>
	<h4>$mainhead<h4>
		<h5>$subhead</h5>";
if(($qusans1['ans1'] && $qusans1['qus1'])) $q1=$final_q1."<br>"."<p>".$qusans1['ans1']."</p></div>"; 
elseif(($qusans1['ans2'] && $qusans1['qus1'])) $q1=$final_q1."<br>"."<p>".$qusans1['ans2']."</p></div>"; 
elseif(($qusans1['ans3'] && $qusans1['qus1'])) $q1=$final_q1."<br>"."<p>".$qusans1['ans3']."</p></div>";
elseif(($qusans1['ans4'] && $qusans1['qus1'])) $q1=$final_q1."<br>"."<p>".$qusans1['ans4']."</p></div>"; 
elseif(($qusans1['ans5'] && $qusans1['qus1'])) $q1=$final_q1."<br>"."<p>".$qusans1['ans5']."</p></div>"; else $q1="";

//second_qus
$qusans2=$sentr_id['qusans2'];
$qusans2=json_decode($qusans2, true);
$qusid=$qusans2['qus1'];
$getqus2=$com_obj->getQus($qusid);
$mainhead=!empty($getqus2['main_head'])?$getqus2['main_head']:'';
$subhead=!empty($getqus2['sub_head'])?$getqus2['sub_head']:'';
$final_q2="<div class='form-group mb25'>
	<h4>$mainhead<h4>
		<h5>$subhead</h5>";
if(($qusans2['ans1']) && $qusans2['qus1']) $q2=$final_q2."<br>"."<p>".implode(',',$qusans2['ans1'])."</p></div>"; 
elseif(($qusans2['ans2']) && $qusans2['qus1']) $q2=$final_q2."<br>"."<p>".implode(',',$qusans2['ans2'])."</p></div>"; 
elseif(($qusans2['ans3']) && $qusans2['qus1']) $q2=$final_q2."<br>"."<p>".implode(',',$qusans2['ans3'])."</p></div>";
elseif(($qusans2['ans4']) && $qusans2['qus1']) $q2=$final_q2."<br>"."<p>".implode(',',$qusans2['ans4'])."</p></div>"; 
elseif(($qusans2['ans5']) && $qusans2['qus1']) $q2=$final_q2."<br>"."<p>".implode(',',$qusans2['ans5'])."</p></div>"; else $q2="";

//third_qus
$qusans3=$sentr_id['qusans3'];
$qusans3=json_decode($qusans3, true);
$qusid=$qusans3['qus1'];
$getqus3=$com_obj->getQus($qusid);
$mainhead=!empty($getqus3['main_head'])?$getqus3['main_head']:'';
$subhead=!empty($getqus3['sub_head'])?$getqus3['sub_head']:'';
$final_q3="<div class='form-group mb25'>
	<h4>$mainhead<h4>
		<h5>$subhead</h5>";
if(($qusans3['ans1'] && $qusans3['qus1'])) $q3=$final_q3."<br>"."<p>".$qusans3['ans1']."</p></div>"; 
elseif(($qusans3['ans2'] && $qusans3['qus1'])) $q3=$final_q3."<br>"."<p>".$qusans3['ans2']."</p></div>"; 
elseif(($qusans3['ans3'] && $qusans3['qus1'])) $q3=$final_q3."<br>"."<p>".$qusans3['ans3']."</p></div>";
elseif(($qusans3['ans4'] && $qusans3['qus1'])) $q3=$final_q3."<br>"."<p>".$qusans3['ans4']."</p></div>"; 
elseif(($qusans3['ans5'] && $qusans3['qus1'])) $q3=$final_q3."<br>"."<p>".$qusans3['ans5']."</p></div>"; else $q3="";

//fourth_qus
$qusans4=$sentr_id['qusans4'];
$qusans4=json_decode($qusans4, true);
$qusid=$qusans4['qus1'];
$getqus4=$com_obj->getQus($qusid);
$mainhead=!empty($getqus4['main_head'])?$getqus4['main_head']:'';
$subhead=!empty($getqus4['sub_head'])?$getqus4['sub_head']:'';
$final_q4="<div class='form-group mb25'>
	<h4>$mainhead<h4>
		<h5>$subhead</h5>";
if(($qusans4['ans1'] && $qusans4['qus1'])) $q4=$final_q4."<br>"."<p>".$qusans4['ans1']."</p></div>"; 
elseif(($qusans4['ans2'] && $qusans4['qus1'])) $q4=$final_q4."<br>"."<p>".$qusans4['ans2']."</p></div>"; 
elseif(($qusans4['ans3'] && $qusans4['qus1'])) $q4=$final_q4."<br>"."<p>".$qusans4['ans3']."</p></div>";
elseif(($qusans4['ans4'] && $qusans4['qus1'])) $q4=$final_q4."<br>"."<p>".$qusans4['ans4']."</p></div>"; 
elseif(($qusans4['ans5'] && $qusans4['qus1'])) $q4=$final_q4."<br>"."<p>".$qusans4['ans5']."</p></div>"; else $q4="";

//comp_qus
$qusans5=$sentr_id['comp_qusans'];
$qusans5=json_decode($qusans5, true);
$qusid=$qusans5['qus1'];
$getqus5=$com_obj->getQus($qusid);
$mainhead=!empty($getqus5['main_head'])?$getqus5['main_head']:'';
$subhead=!empty($getqus5['sub_head'])?$getqus5['sub_head']:'';
$final_q5="<div class='form-group mb25'>
	<h4>$mainhead<h4>
		<h5>$subhead</h5>";
if(($qusans5['ans1'] && $qusans5['qus1'])) $q5=$final_q5."<br>"."<p>".$qusans5['ans1']."</p></div>"; 
elseif(($qusans5['ans2'] && $qusans5['qus1'])) $q5=$final_q5."<br>"."<p>".$qusans5['ans2']."</p></div>"; 
elseif(($qusans5['ans3'] && $qusans5['qus1'])) $q5=$final_q5."<br>"."<p>".$qusans5['ans3']."</p></div>";
elseif(($qusans5['ans4'] && $qusans5['qus1'])) $q5=$final_q5."<br>"."<p>".$qusans5['ans4']."</p></div>"; 
elseif(($qusans5['ans5'] && $qusans5['qus1'])) $q5=$final_q5."<br>"."<p>".$qusans5['ans5']."</p></div>"; else $q5="";

//comp_loc
$loc=$sentr_id['comp_location'];
if(!empty($loc)) $q6="<div class='form-group mb25'>
	<h4>Your Location?<h4>
		<p>$loc</p>
	</div>";
	else $q6="";
	
//comp_budget
$bud_frm=!empty($sentr_id['comp_budget_from'])?$sentr_id['comp_budget_from']:'';
$bud_to=!empty($sentr_id['comp_budget_to'])?$sentr_id['comp_budget_to']:'';
$amt=$bud_frm." - ".$bud_to;
if(!empty($bud_frm) || !empty($bud_to))$q7="<div class='form-group mb25'>
	<h4>Estimated budget<h4>
		<p>$amt</p>
	</div>";
	else $q7="";

$detail=$db->singlerec("select * from register where id='$sen_id'");
$username=$com_obj->get_name($sen_id);
$getGen=$com_obj->getGen($sen_id);
$email=$getGen['email'];
$phone=$getGen['phone'];
$address=$getGen['address'];
$country=getCountry($detail['country']);
$state=getState($detail['state']);
$city=getCity($detail['city']);

?>
<body>



   

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
     <?php include "includes/header.php"; ?>
    <section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_2.jpg" data-natural-width="1400" data-natural-height="470">
               <div class="parallax-content-1">
                  <?php include "welcomeprofession.php"; ?>
				  
				  <div class="animated fadeInDown hidden">
                     <div id="search_bar_container" style="background:transparent;">
                        <div class="container">
                           <div class="search_bar">
                              <div class="col-sm-3 padd0i">
                                 <select title="Search in" class="searchSelect form-control bucol " id="" name="tours_category">
                                    <option value="All Tours"  title="All Tours">Select City</option>
                                    <option value="Museums" title="Museums">USA</option>
                                    <option value="Tickets" title="Tickets">Singapore</option>
                                    <option value="Hotels" title="Hotels">Malysia</option>
                                    <option value="Restaurants" title="Restaurants">India</option>
                                 </select>
                              </div>
                              <div class="col-sm-3 padd0i">
                                 <select title="Search in" class="searchSelect form-control bucol " id="" name="tours_category">
                                    <option value="All Tours"  title="All Tours">Select Area</option>
                                    <option value="Museums" title="Museums">Textas</option>
                                    <option value="Tickets" title="Tickets">Kula Lambur</option>
                                    <option value="Hotels" title="Hotels">Las wekas</option>
                                    <option value="Restaurants" title="Restaurants">Maxture</option>
                                 </select>
                              </div>
                              <div class="col-sm-4 padd0i">
                                 <select title="Search in" class="searchSelect form-control bucol " id="" name="tours_category">
                                    <option value="All Tours"  title="All Tours">Select Type of Service</option>
                                    <option value="Museums" title="Museums">House Keeping</option>
                                    <option value="Tickets" title="Tickets">Cleaning</option>
                                    <option value="Hotels" title="Hotels">Gardining</option>
                                    <option value="Restaurants" title="Restaurants">Washing</option>
                                 </select>
                              </div>
                              <div class="col-sm-2 padd0i"> 
                                 <button class="form-control  bucol sercbt " type="text" autocomplete="off"><i class="icon-search"></i> Search</button>
                              </div>
                           </div>
                           <!-- End search bar-->
                        </div>
                     </div>
                  </div>
               </div>
            </section>

  

	
	<section class="container-fluid margin_31 test3_bg">
       <div class="container mt30 mb30">
		  <div class="row">
			<?php include "profleftmenu.php"; ?>
			<div class="col-lg-9 col-md-9">
                     <div class="col-sm-12 profile_box">
					  
		
		<div class="row mb10">
		   <div class="col-sm-12">
		       <h3 class="clr_txt">User Details</h3>
		   </div>
		   <div class="clearfix"></div>
		   <div class="col-sm-12">
		       <div class="form-group mb25 col-sm-6">
					<h4>User Name<h4>
					<p><?php echo ucfirst($username); ?></p>
			   </div>
			   
			   <div class="form-group mb25 col-sm-6">
					<h4>Email<h4>
					<p><?php echo $email; ?></p>
			   </div>
			   
			   <div class="form-group mb25 col-sm-6">
					<h4>Phone<h4>
					<p><?php echo !empty($phone)?$phone:'---'; ?></p>
			   </div>
			   
			   <div class="form-group mb25 col-sm-6">
					<h4>Address<h4>
					<p><?php echo $address; ?><br><?php echo $city; ?><br><?php echo $state; ?><br><?php echo $country; ?></p>
			   </div>
			   
			   <h3 class="clr_txt">Service Reqirement</h3>
			   
			   <?php echo $q1; ?>
			   
			   <?php echo $q2; ?>
				
			   <?php echo $q3; ?>
			   
			   <?php echo $q4; ?>
			   
			   <?php echo $q7; ?>
			   
			   <?php echo $q6; ?>
			   
			   <?php echo $q5; ?>
			   
			   
			   <!--<div class="form-group mb25">
					<a href="#" class="btn_1 outline"data-toggle="modal" data-target="#prof_response">Response</a>
					<a href="#" class="btn btn-danger-outline">Cancel</a>
			   </div>-->
		   </div>
		</div>
		
		
					 </div>
                  </div>
		  </div>
      </div>
    </section> 
	

 <div class="modal fade deflt_mdl" id="prof_response" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Response To User</h4>
      </div>
      <div class="modal-body">
		<div class="row">
			<div class="col-sm-12">
				<form action="#">
					<div class="form-group">
						<label>Contact Number</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Enter The Message</label>
						<textarea class="form-control" rows="5"></textarea>
					</div>
					<div class="form-group text-center">
						<button class="btn_2 btn agelogbt" type="submit">Send Now</button>
					</div>
				</form>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>
		
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