<?php include 'header.php';
include 'leftmenu.php'; 
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $db->escapstr($id) : '' ;
$uid = isSet($uid) ? $db->escapstr($uid) : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$req_sts = isSet($req_sts) ? $db->escapstr($req_sts) : '' ;
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
	$GetImg = $db->singlerec("select lic_id_proof from request where id='$id'");
	$img=$GetImg["lic_id_proof"];
	
	if($img!=""){
		$RemoveImage = "../uploads/company-id-proof/$img";
		unlink($RemoveImage);
	}
	
    $db->insertrec("delete from request where id='$id'");
	
	echo "<script>location.href='company-request.php?act=delt'</script>";	
    header("location:company-request.php?act=delt");
    exit ;
}
if($req_sts == "acc") {
	
	$fname = userInfo($uid,'fname');
	$lname = userInfo($uid,'lname');
	$to_email = userInfo($uid,'email');
	$fromemail = $from_email;
	$subject  = "Request Status from $sitetitle";
	$GetContact = $db->singlerec("select ctc_num from cms where id='1'");
	$contact_num = $GetContact['ctc_num'];
	$title = "<center> Your Request Status was Accepted</center>";
	$text="Click the above button to check your status on live.";		
	$url = "$siteurl/company-list.php";			
	$username = $fname." ".$lname;
	
	$message = $email_temp->style_blue($siteinfo,$username,$title,$text,$contact_num,$url);
	
	$com_obj->email($fromemail,$to_email,$subject,$message);
	
	$db->insertrec("update request set request_status='1' where id='$id'");
	
	$lawyerinfo=$db->singlerec("SELECT * FROM request WHERE request_status='1' and id='$id'");
	$title = $lawyerinfo["title"];
	$exp_division = $lawyerinfo["exp_division"];
	$license_id = $lawyerinfo["license_id"];
	$about_self = $lawyerinfo["about_self"];
	$lic_id_proof = $lawyerinfo["lic_id_proof"];
	
	$set ="title='$title'";
	$set .=",practice_court='$exp_division'";
	$set .=",license_id='$license_id'";
	$set .=",about_self='$about_self'";
	$set .=",lic_id_proof='$lic_id_proof'";
	$set .=",user_role='1'";
	
	$db->insertrec("update register set $set where id='$uid'");
		
	echo "<script>location.href='company-request.php?act=sts'</script>";
    header("location:company-request.php?act=sts");
    exit ;
}
else if($req_sts == "rejt") {
	
	$fname = userInfo($uid,'fname');
	$lname = userInfo($uid,'lname');
	$to_email = userInfo($uid,'email');
	$fromemail = $from_email;
	$subject  = "Request Status from $sitetitle";	
	$GetContact = $db->singlerec("select ctc_num from cms where id='1'");
	$contact_num = $GetContact['ctc_num'];
	$title = "<center> Your Request Status was Rejected. Try again.</center>";
	$text="Click the above button to check your status on live.";		
	$url = "$siteurl";			
	$username = $fname." ".$lname;
	
	$message = $email_temp->style_blue($siteinfo,$username,$title,$text,$contact_num,$url);
	
	$com_obj->email($fromemail,$to_email,$subject,$message);
		
	$db->insertrec("update register set lawyer_status='5' where id='$uid'");
	
	$db->insertrec("update request set request_status='2' where id='$id'");
		
	echo "<script>location.href='company-request.php?act=sts'</script>";
    header("location:company-request.php?act=sts");
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
//if(isset($wait)) {
	//$sq = "select * from  request order by id desc";
//} else {
	$sq = "select b.* from  request as b inner join register as r on r.id=b.user_id and (r.lawyer_status='2' or r.lawyer_status='5') order by b.id desc";
//}



$Records=$db->get_all($sq);

$sno = 1;
if(count($Records)==0)
    $Message="No Record found";
	

$disp = "";
foreach($Records as $i=>$GetRecord) 
{
	$idvalue1 = $GetRecord['id'];
    $idvalue = $GetRecord['id'];
	$user_id = $GetRecord['user_id'];
	$exp_division = $GetRecord['exp_division'];
	$title_name=$GetRecord['title'];	
	$user_ip=$GetRecord['user_ip'];
	$req_sts = $GetRecord['request_status'] ;
	$crcdt=$GetRecord['crcdt'];		
	$crcdt=date('d-M-Y',strtotime($crcdt));
	
    if($active_status == '0'){
        $DisplayStatus = $GT_InActive;
		$Title = "Active";
		$status_active = "Deactive";
	}	
    else if($active_status == '1'){
        $DisplayStatus = $GT_Active;
		$Title = "Deactive";
		$status_active = "Active";
	}	
	$fname = userInfo($user_id,'fname');
	$lname = userInfo($user_id,'lname');
	$name = $fname.' '.$lname;
	$title_name = checkLength(stripslashes($title_name),10);
	$exp_division = $com_obj->getExpdiv($exp_division);
	$exp_division = checkLength(stripslashes($exp_division),15);
	if($req_sts==0) {
		$accept = "<a href='company-request.php?req_sts=acc&id=$idvalue&uid=$user_id'> <button class='btn-sm btn-info'>Accept <i class=' icon-ok-circled-1'></i></button> </a>";
		$reject = "<a href='company-request.php?req_sts=rejt&id=$idvalue&uid=$user_id'> <button class='btn-sm btn-warning'>Reject <i class='icon-cancel-circled'></i></button> </a>";
		$req_sts = $accept.' '.$reject;
	}
	if($req_sts==1)
		$req_sts = "<button class='btn-sm btn-success' style='cursor:default;'>Accepted <i class=' icon-ok-circled-1'></i></button>";
	if($req_sts==2)
		$req_sts = "<button class='btn-sm btn-danger' style='cursor:default;'>Rejected <i class='icon-cancel-circled'></i></button>";
	
    $disp .="<tr>
				<td  align='left'>$sno</td>
				<td  align='left' class='name'>$name</td>
				<td  align='left'>$exp_division</td>
				<td  align='left'>$user_ip</td>					
				<td  align='left'>$crcdt</td>
				<td  align='center'>$req_sts </td>				
				<td width='17%'>
				<div class='btn-group btn-group-xs'>
					<a href='company-req-view.php?id=$idvalue1' title='View Company Request Details' class='btn btn-sm btn-icon btn-secondary' data-toggle='tooltip'><i class='fa fa-search'></i></a>
					<a  href='company-request.php?id=$idvalue&act=del' title='Delete' onclick='return makesure()' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>	
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
          <div class="content-header-left col-md-8 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">All <?=$keyword;?> Requests</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $Message;?></h4>
	                
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
				    
	                <div class="card-block card-dashboard table-responsive">
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					               <th>S.No.</th>
								   <th><?=$keyword;?> Name</th>
									<th>Areas of Practice</th>
									<th>User IP</th>
									<th>Request Date</th>
									<th><?=$keyword;?> Status</th>		
					                <th style="min-width: 150px;" class='cntrhid'>Action</th>
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