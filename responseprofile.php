<?php
include "admin/AMframe/config.php";
$id=$_GET['id'];
$respid=$_GET['respid'];
$_id=isset($_SESSION['id'])?$_SESSION['id']:'';
if(!empty($id)){
$detail=$db->singlerec("select * from register where id='$id'");
$username=$com_obj->get_name($id);
$getGen=$com_obj->getProfInfo($id);
$email=$getGen['email'];
$phone=$getGen['phone'];
$address=$getGen['address'];
$country=getCountry($detail['country']);
$state=getState($detail['state']);
$city=getCity($detail['city']);
$abut_self=$detail['about_self'];
$usr_loc=$detail['user_locality'];

$responsedetails=$db->singlerec("select * from response where responser_autoid='{$respid}'");
$res_auto_id=$responsedetails['id'];
$res_mail=$responsedetails['email'];
$res_phone=$responsedetails['contact_no'];
$res_msg=$responsedetails['message'];
$responserid=$responsedetails['responser_autoid'];
$responser_id=$responsedetails['responser_id'];
$sendid=$responsedetails['senter_id'];
$catid=$responsedetails['cat_id'];

$fee=$detail['estimate_fee'];
$fee_duration=$detail['fee_duration'];
$amt="";
if(!empty($fee)){
	$amt.=$site_currency." ".$fee;
}
if(!empty($fee) && !empty($fee_duration)){
	$amt.=" / ".$fee_duration;
}else{
	$amt.="No Budget Found";
}
$prf_img=$detail['img'];
if(empty($prf_img)){
	$prf_img="uploads/profprofile/noimage.jpg";
}
$exp1=$detail['exp1'];
$exp2=$detail['exp2'];
$exp1_dur=$detail['exp_dur1'];
$exp2_dur=$detail['exp_dur2'];
if(!empty($exp1)){
	$exp_details=$exp1." ".$exp1_dur;
}else{
	$exp_details="";
}
if(!empty($exp2)){
	$exp2_details=$exp2." ".$exp2_dur;
}else{
	$exp2_details="";
}
?>
<div class="col-sm-7">
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="respon"><div class="row">
						<div class="col-sm-4">
							<img src="<?php echo $prf_img; ?>" alt="Image" class="img-responsive img-circle list_img" style="width:100px;height:100px;">
						</div>
						<div class="col-md-8 col-sm-8">
<?php 
$reviewCount=$com_obj->getReviewProfcount($id);
$reviewCount=$reviewCount['count'];
//echo $reviewCount; 
$totalreview=getStar($reviewCount);
//echo $totalreview; exit;
?>
							<div class="rating">
							<?php if($reviewCount == 0){?>
								<i class="fa font14px fa-star "></i>
								<i class="fa font14px fa-star "></i>
								<i class="fa font14px fa-star "></i>
								<i class="fa font14px fa-star "></i>
								<i class="fa font14px fa-star"></i>&nbsp;(<?php echo $totalreview; ?>)
							<?php }else{ ?>
								<span class="cntnt font14px"><?php echo $totalreview; ?></span>
							<?php } ?>
							</div>
							<h3><?php echo ucfirst($username); ?> </h3>
							<p class="cntnt"> <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $address; ?> <?php echo $city; ?> <?php echo $state; ?> <?php echo $country; ?></p>
						</div>
						
						<div class="col-sm-12">
							<h4>Response</h4>
							<div class="form-group mb25 col-sm-6">
								<h5>Mail<h5>
								<p><?php echo !empty($res_mail)?$res_mail:$email; ?></p>
						    </div>
							<div class="form-group mb25 col-sm-6">
								<h5>Contact Number<h5>
								<p><?php echo !empty($res_phone)?$res_phone:$phone; ?></p>
						    </div>
							<div class="form-group mb25">
								<h5>Message<h5>
								<p><?php echo !empty($res_msg)?$res_msg:$abut_self; ?></p>
						    </div>
							
						</div>
						
						<div class="col-sm-12">
							<h4 class="clr_txt">Budget</h4>
							<div class="form-group mb25">
								<h5 class="clr_txt">Estimated budget<h5>
								<p class="clr_txt"><?php echo $amt; ?></p>
						    </div>
						</div>
						
						<div class="col-sm-12">
							<h4>Experience / Details</h4>
							<div class="form-group mb25 col-sm-6">
								<h5>Professional Experience<h5>
								<p><?php echo $exp_details; ?> <?php echo $exp2_details; ?></p>
						    </div>
							<div class="form-group mb25 col-sm-6">
							
							<?php 
							//echo "select * from sent_enquiry where senter_id='$_id' and receiver_id='$id' and prof_response=4"; exit;
							$ratesum = $db->get_all("select * from sent_enquiry where senter_id='$_id' and receiver_id='$id' and prof_response=4");  ?>
								<h5>Number of times hired<h5>
								<?php //$count=count($ratesum);
								
								?>
								<p><?php  echo count($ratesum); ?></p>
						    </div>
							<div class="form-group mb25 col-sm-6">
								<h5>Location<h5>
								<p><?php echo !empty($usr_loc)?$usr_loc:'Location Not Available'; ?></p>
						    </div>
					
						</div>
						
						<div class="form-group mb25 col-sm-12">
						<?php $url=(isset($_SERVER["HTTPS"]))? "https" : "http" . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";  ?>
					<a href="javascript:void(0);" name="res_accept" onclick="return accept(<?php echo $res_auto_id; ?>,<?php echo $responser_id; ?>,<?php echo $sendid; ?>,<?php echo $catid; ?>,<?php echo $responserid; ?>);" class="btn btn-success-outline">Accept</a>
					<a href="list-detail?uid=<?php echo base64_encode($id); ?>" class="btn_1 outline">View Full Profile</a>
					<a href="#" onclick="return cancel(<?php echo $res_auto_id; ?>,<?php echo $responserid; ?>);" class="btn btn-danger-outline">Not Interst</a>
			   </div>
					</div></div>
<?php } ?>

<script>
function accept(id,resid,sid,cid,autoid){
	if(id!="" && resid!=""){
		$.ajax({
			type : "post",
			url : "accept.php?id="+id+"&sid="+sid+"&cid="+cid+"&resid="+resid+"&autoid="+autoid,
			success:function(response){
				if(response==0){
					//$("#suc").show().html("<b>The professional accepted successfully..!!</b>").css("background","green").css("color","#fff");
					window.location='user-request?accept';

				}else{
					$("#suc").hide();
				}
			}
		});
	}
}

function cancel(id,resid){
	if(id!="" && resid!=""){
		$.ajax({
			type : "post",
			url : "cancel.php?id="+id+"&resid="+resid,
			success:function(response){
				if(response==0){
					//$("#can").show().html("<b>Professional make not interested successfully..!!</b>").css("background","red").css("color","#fff");
					//window.location.reload()
					window.location='user-request?canceled';
				}else{
					$("#can").hide();
				}
			}
		});
	}
}
</script>