<? include 'header.php';
include 'leftmenu.php'; 
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $db->escapstr($id) : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$f_status = isSet($f_status) ? $f_status : '' ;
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
$featured_member=isSet($featured_member)?$featured_member:'';

if($act == "del") {
	$GetImg = $db->singlerec("select img,lic_id_proof from register where id='$id'");
	$img=$GetImg["img"];
	$lic_id_proof=$GetImg["lic_id_proof"];
	
	if($img!="noimage.png"){
		$RemoveImage = "../uploads/profile/$img";
		unlink($RemoveImage);
	}
	if($lic_id_proof!=""){
		$RemoveImage = "../uploads/company-id-proof/$lic_id_proof";
		unlink($RemoveImage);
	}
	
    $db->insertrec("delete from register where id='$id'");
	// $db->insertrec("delete from request where user_id='$id'");
	// $db->insertrec("delete from review where professionalid='$id'");
	// $db->insertrec("delete from review where professionalid='$id'");
	// $db->insertrec("delete from appointment where professionalid='$id'");
	
	echo "<script>location.href='company-profile.php?act=delt'</script>";	
    header("location:company-profile.php?act=delt");
    exit ;
}
if($status == "1") {
    $db->insertrec("update register set active_status='0' where id='$id'");
	
	echo "<script>location.href='company-profile.php?act=sts'</script>";
    header("location:company-profile.php?act=sts");
    exit ;
}
else if($status == "0") {
   
	$db->insertrec("update register set active_status='1' where id='$id'");
	
	echo "<script>location.href='company-profile.php?act=sts'</script>";
	header("location:company-profile.php?act=sts");
    exit ;
}

if($featured_member == "0") {
    $db->insertrec("update register set featured_member='1' where id='$id'");
	
	echo "<script>location.href='company-profile.php?act=sts'</script>";
    header("location:company-profile.php?act=sts");
    exit ;
}
else if($featured_member == "1") {
   
	$db->insertrec("update register set featured_member='0' where id='$id'");
	
	echo "<script>location.href='company-profile.php?act=sts'</script>";
	header("location:company-profile.php?act=sts");
    exit ;
}
$numbers = array(4, 6, 2, 22, 11);
rsort($numbers);
//print_r($numbers);

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

$GetRecords=$db->get_all("select * from register where user_role='1' order by id desc");

$sno = 1;
if(count($GetRecords)==0)
    $Message="No Record found";
$disp = "";
foreach($GetRecords as $i=>$GetRecord) {
    $idvalue = $GetRecord['id'];
	$fname = $GetRecord['fname'];
	$lname = $GetRecord['lname'];
	//$title=$GetRecord['title'];
	$reg_ip=$GetRecord['reg_ip'];	
	$featured_member=$GetRecord['featured_member'];	
	$active_status = $GetRecord['active_status'] ;
	$overall_rating = $GetRecord['overall_rate'] ;
	$crcdt=$GetRecord['crcdt'];		
	$crcdt=date('d-M-Y',strtotime($crcdt));
	
    if($active_status == '0'){
        $DisplayStatus = "<a href='company-profile.php?id=$idvalue&status=$active_status' title='Activate' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>";
		$Title = "Active";
		$status_active = "Deactive";
	}	
    else if($active_status == '1'){
        $DisplayStatus = "<a href='company-profile.php?id=$idvalue&status=$active_status' title='Deactivate' class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>";
		$Title = "Deactive";
		$status_active = "Active";
	}
	
	if($featured_member== '0'){
		$featured = "<a href='company-profile.php?id=$idvalue&featured_member=$featured_member' title='Set as featured' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>";
	}else if($featured_member == '1'){
		$featured = "<a href='company-profile.php?id=$idvalue&featured_member=$featured_member' title='Set as unfeatured' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-check'></i></a>";
	}
	
	$name = $fname.' '.$lname;
	$title="<a href='company-view.php?id=$idvalue' target='_blank'>$GT_RightSign $Title</a>";
	
	$reviews = $db->Extract_Single("select count(professionalid) from  review where professionalid='$idvalue'"); 
	
	$reviews="<a target='_blank' href='review.php?id=$idvalue'>$GT_RightSign $reviews</a>";
	
	/* $rating = overall_Rate($idvalue);	
	$db->insertrec("update register set overall_rate='$rating' where id='$idvalue' and user_role='1'"); */
	
	$EditLink = "<a href='company-profileupd.php?upd=2&id=$idvalue' title='Edit'  class='btn btn-sm btn-icon btn-secondary btn-warning' ><i class='fa fa-pencil-square-o'></i></a>";
	
    $disp .="<tr>
				<td  align='left'>$sno</td>				
			
				<td  align='left' class='name'>$name</td>
				<td  align='left'>$reviews</td>
				<td  align='left'>$overall_rating</td>
				<td  align='left'>$reg_ip</td>				
				<td  align='left'>$crcdt</td>			
				<td width='17%'>
				<div class='btn-group btn-group-xs'>
				<a href='company-view.php?id=$idvalue' title='View company Details' class='btn btn-sm btn-icon btn-secondary' data-toggle='tooltip'><i class='fa fa-search'></i></a>
					$DisplayStatus
					$EditLink
					<a  href='company-profile.php?id=$idvalue&act=del'  title='Delete' onclick='return makesure()' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>	
					$featured					
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
            <h3 class="content-header-title mb-0"><?=$keyword;?>s</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $Message;?></h4>
	                <h4 class="card-title">All <?=$keyword;?>s</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			<div class="heading-elements">
	                    <ul class="list-inline mb-0">
	                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
	                       <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
	                    </ul>
	                </div>
	            </div>
	            <div class="card-body collapse in">
				    <div class="col-sm-12" style="text-align: right;">
				        <a href="company-profileupd.php?upd=1" class="btn btn-info nrdr_r_zero">Add New</a>
					</div>
	                <div class="card-block card-dashboard table-responsive">
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					                <th>S.No.</th>
                                    <th><?=$keyword;?> Name</th>
									<th>Reviews</th>
									<th>Avg. Ratings</th>
									<th>Register IP</th>
									<th>Join Date</th>
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
	</div>
</section>
<!--/ HTML (DOM) sourced data -->

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

<? include 'footer.php'; ?>