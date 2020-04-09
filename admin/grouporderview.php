<? include 'header.php';
include 'leftmenu.php'; 
$msg="";
if(isset($addsuc)){
	$msg = "<center><span style='color:green'>Profile successfully updated!</span></center>";
}
$user_id = $db->escapstr($id);
//filter start
$rid=$user_id;
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

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Order Details</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $msg;?></h4>
	                <h4 class="card-title">User Order Details</h4>
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
				    <div class="row">
						<div class="col-sm-6">
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Name</b></label>
							    <div class="col-sm-8">
									<label> <?php echo ucfirst($username); ?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Email</b></label>
							    <div class="col-sm-8">
									<label><?php echo $email; ?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Contact Number</b></label>
							    <div class="col-sm-8">
									<label><?php echo !empty($phone)?$phone:'---'; ?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Address</b></label>
							    <div class="col-sm-8">
									<label> <?php echo $address; ?><br><?php echo $city; ?><br><?php echo $state; ?><br><?php echo $country; ?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Service Reqirement</b></label>
							    <div class="col-sm-8">
									<label><?php echo $q1; ?>
								   <?php echo $q2; ?>
									
								   <?php echo $q3; ?>
								   
								   <?php echo $q4; ?>
								   
								   <?php echo $q7; ?>
								   
								   <?php echo $q6; ?>
								   
								   <?php echo $q5; ?></label>
								</div>
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

<? include 'footer.php'; ?>