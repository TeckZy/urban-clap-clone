<?php include 'header.php';
include 'leftmenu.php'; 
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $db->escapstr($id) : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$Message=isSet($Message)?$Message:'';
$search=isSet($search)?$search:'';
$daterange=isSet($daterange)?$daterange:'';
$approvest=isSet($approvest)?$approvest:'';
$highest=isSet($highest)?$highest:'';
$active_status=isSet($active_status)?$active_status:'';
$mobile=isSet($mobile)?$mobile:'';
$country=isSet($country)?$country:'';
$Title=isSet($Title)?$Title:'';
$user_access=isSet($user_access)?$user_access:'';
$DisplayStatus=isSet($DisplayStatus)?$DisplayStatus:'';
if($act == "del") {
	$db->insertrec("delete from sent_enquiry where id='$id'");
	echo "<script>location.href='allorder.php?act=delt'</script>";	
    header("location:allorder.php?act=delt");
    exit ;
}
if($status == "1") {
    $db->insertrec("update sent_enquiry set status='0' where id='$id'");
	
	echo "<script>location.href='allorder.php?act=sts'</script>";
    header("location:allorder.php?act=sts");
    exit ;
}
else if($status == "0") {   
    $db->insertrec("update sent_enquiry set status='1' where id='$id'");
	echo "<script>location.href='allorder.php?act=sts'</script>";
	header("location:allorder.php?act=sts");
    exit ;
}

$GetRecords=$db->get_all("select * from sent_enquiry where role='0' order by id desc");
$sno = 1;
if(count($GetRecords)==0){
    $Message="No Record found";
}
$disp = "";
foreach($GetRecords as $req){
	$idvalue=$req['id'];
	$senterid=$req['senter_id'];
	$receiverid=$req['receiver_id'];
	$catid=$req['cat_id'];
	$rle=$req['role'];
	if($rle=='0'){
		$role="Group";
	}
	$catname=$com_obj->cat_name($catid);
	$username=$com_obj->get_name($senterid);
	$recevername=$com_obj->get_name($receiverid);
	$date=$req['crcdt'];
	$date=date("Y-m-d",strtotime($date));
	$budget_from=$req['comp_budget_from'];
	$budget_to=$req['comp_budget_to'];
	$location=ucfirst($req['comp_location']);
	$comp_qus=$req['comp_qusans'];
	$comp_qus=json_decode($comp_qus, true);
	if(!empty($comp_qus['ans1'])) $status=$comp_qus['ans1']; 
	elseif(!empty($comp_qus['ans2'])) $status=$comp_qus['ans2']; 
	elseif(!empty($comp_qus['ans3'])) $status=$comp_qus['ans3'];
	elseif(!empty($comp_qus['ans4'])) $status=$comp_qus['ans4']; 
	elseif(!empty($comp_qus['ans5'])) $status=$comp_qus['ans5']; else $status="-";
	$date=$req['crcdt'];
	$date=date("Y-m-d",strtotime($date));
	$genInfo=$com_obj->getProfInfo($receiverid);
	if(!empty($location)) $loc=$location; else $loc="-";
	$active_status=$req['status'];
	$profsts=$req['prof_response'];
	if($profsts==0){
		$state="<div style='color:orange;'><b>Awaiting Response</b></div>";
	}else if($profsts==1){
		$state="<div style='color:blue;'><b>Request Send</b></div>";
	}else if($profsts==2){
		$state="<div style='color:red;'><b>Not Interest</b></div>";
	}else if($profsts==3){
		$state="<div style='color:#2dcee3;'><b>User Accept</b></div>";
	}else if($profsts==4){
		$state="<div style='color:green;'><b>Completed</b></div>";
	}else if($profsts==6){
		$state="<div style='color:red;'><b>Cancelled</b></div>";
	}
	
    if($active_status == '1'){
        $DisplayStatus = "<a href='allorder.php?id=$idvalue&status=$active_status' title='Activate' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>";
		$Title = "Active";
		$status_active = "Deactive";
	}	
    else if($active_status == '0'){
        $DisplayStatus = "<a href='allorder.php?id=$idvalue&status=$active_status' title='Deactivate' class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>";
		$Title = "Deactive";
		$status_active = "Active";
	}
    $name = $username;
	$name="<a href='grouporderview.php?id=$idvalue' target='_blank'>$GT_RightSign $name</a>";
	//$EditLink = "<a href='allorderprofileupd.php?upd=2&id=$idvalue' title='Edit'  class='btn btn-sm btn-icon btn-secondary btn-warning' ><i class='fa fa-pencil-square-o'></i></a>";
	
    $disp .="<tr>
				<td  align='left'>$sno</td>
				<td  align='left' class='name'>".ucfirst($username)."</td>
				<td  align='left' class='name'>".ucfirst($recevername)."</td>
				<td  align='left'>$date</td>
				<td  align='left'>$budget_from - $budget_to</td>
                <td  align='left'>$role</td>					
				<td  align='left'>$loc</td>
                <td  align='left'>$state</td>					
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
				<a href='grouporderview.php?id=$idvalue' title='View company Details' class='btn btn-sm btn-icon btn-secondary' data-toggle='tooltip'><i class='fa fa-search'></i></a>
				    $DisplayStatus
					<a href='allorder.php?id=$idvalue&act=del' title='Delete' onclick='return makesure()' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>				
				</div>
				</td>
			</tr>";
			$sno++;
}
if($act == "delt")
    $Message = "Deleted Successfully" ;
else if($act == "upd")
    $Message = "Updated Successfully" ;
else if($act == "add")
    $Message = "Added Successfully" ;
else if($act == "sts")
    $Message = "Status Changed Successfully" ;
else if($act == "fsts")
    $Message = "Added to Featured List" ;
else if($act == "frsts")
    $Message = "Removed from Featured List" ;
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">All Order Request</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $Message;?></h4>
	                <h4 class="card-title">All Requested Order Users</h4>
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
				        <a href="allorderprofileupd.php?upd=1" class="btn btn-info nrdr_r_zero">Add New</a>
					</div>
	                <div class="card-block card-dashboard table-responsive">
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					               <th>S.No.</th>
									<th>Senter Name</th>
									<th>Receiver Name</th>
									  <th>Order Date</th>
									  <th>Budget</th>
									   <th>Role</th>
									  <th>Location</th>
									  <th>Status</th>
					                <th style="min-width: 200px;" class='cntrhid'>Action</th>
					            </tr>
					        </thead>
							<tbody><?echo $disp; ?></tbody>
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