<? include 'header.php';
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
	$GetImg = $db->singlerec("select img from register where id='$id'");
	$img=$GetImg["img"];
	
	if($img!="noimage.png"){
		$RemoveImage = "../uploads/profile/$img";
		unlink($RemoveImage);
	}
	
	$GetlyrImg = $db->singlerec("select lic_id_proof from request where user_id='$id'");
	if(count($GetlyrImg)!=0) {
		$lyr_proof=$GetlyrImg["lic_id_proof"];
		
		if($lyr_proof!=""){
			$RemoveImage = "../uploads/company-id-proof/$lyr_proof";
			unlink($RemoveImage);
		}
	
		$db->insertrec("delete from question_mgmt where id='$id'");
	}
	$db->insertrec("delete from question_mgmt where id='$id'");
	
	echo "<script>location.href='questionsmgmt.php?act=delt'</script>";	
    header("location:questionsmgmt.php?act=delt");
    exit ;
}
if($status == "1") {
    $db->insertrec("update question_mgmt set status='0' where id='$id'");
	
	echo "<script>location.href='questionsmgmt.php?act=sts'</script>";
    header("location:questionsmgmt.php?act=sts");
    exit ;
}
else if($status == "0") {   
    $db->insertrec("update question_mgmt set status='1' where id='$id'");
	echo "<script>location.href='questionsmgmt.php?act=sts'</script>";
	header("location:questionsmgmt.php?act=sts");
    exit ;
}
$numbers = array(4, 6, 2, 22, 11);
rsort($numbers);
$filter=""; 
$orderby="order by id desc";
if($search){
	if($daterange !=""){
		$startdate=substr($daterange,0,10);
		$enddate=substr($daterange,-10);
		$filter .="and crcdt between '$startdate' and '$enddate'";
	} 
	
	if($approvest !="" && $approvest !=0){
		if($approvest==2){$approvest=0;}
		$filter .="and active_status='$approvest'";
	}
}
$GetRecords=$db->get_all("select * from question_mgmt order by id desc");
$sno = 1;
if(count($GetRecords)==0)
    $Message="No Record found";
$disp = "";
foreach($GetRecords as $i=>$GetRecord) {
    $idvalue = $GetRecord['id'];
	$cat_id = $GetRecord['cat_id'];
	$sub_cat_id = $GetRecord['sub_cat_id'];
	$question_type=$GetRecord['question_type'];
	$reg_ip=$GetRecord['ip'];	
	$active_status = $GetRecord['status'] ;
	$crcdt=$GetRecord['crcdt'];		
	$q_type=$GetRecord['q_type'];		
	
    if($active_status == '0'){
        $DisplayStatus = "<a href='questionsmgmt.php?id=$idvalue&status=$active_status' title='Activate' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>";
		$Title = "Active";
		$status_active = "Deactive";
	}	
    else if($active_status == '1'){
        $DisplayStatus = "<a href='questionsmgmt.php?id=$idvalue&status=$active_status' title='Deactivate' class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>";
		$Title = "Deactive";
		$status_active = "Active";
	}
	if($question_type==0) $type="Input Box";
	if($question_type==1) $type="Check Box";
	if($question_type==2) $type="Radio Button";
	if($question_type==3) $type="Dropdown Box";
	
	if(empty($cat_id) && $q_type==5){
		$cat_name="Compulsory";
	}else{
		$cat_name=$com_obj->cat_name($cat_id);
	}
	$cat_name="<a href='#.php?id=$idvalue' target='_blank'>$GT_RightSign $cat_name</a>";
	$EditLink = "<a href='questionsmgmtupd.php?upd=2&id=$idvalue' title='Edit'  class='btn btn-sm btn-icon btn-secondary btn-warning' ><i class='fa fa-pencil-square-o'></i></a>";
    $disp .="<tr>
				<td  align='left'>$sno</td>
				<td  align='left' class='name'>$cat_name</td>
				<td  align='left'>$type</td>
				<td  align='left'>$reg_ip</td>				
				<td  align='left'>$crcdt</td>				
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
				<a href='qusview.php?id=$idvalue' title='View company Details' class='btn btn-sm btn-icon btn-secondary' data-toggle='tooltip'><i class='fa fa-search'></i></a>
				    $DisplayStatus
				    $EditLink
					<a href='questionsmgmt.php?id=$idvalue&act=del' title='Delete' onclick='return makesure()' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>				
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
            <h3 class="content-header-title mb-0">All Questions</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $Message;?></h4>
	                <h4 class="card-title">All Questions</h4>
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
				        <a href="questionsmgmtupd.php?upd=1" class="btn btn-info nrdr_r_zero">Add New</a>
					</div>
	                <div class="card-block card-dashboard table-responsive">
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					               <th>S.No.</th>
									<th>Category</th>
									<th>Question Type</th>
									<th>Register IP</th>
									<th>Date</th>	
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

<? include 'footer.php'; ?>