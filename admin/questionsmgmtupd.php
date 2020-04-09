<?php include 'header.php';
include 'leftmenu.php';
$upd = isset($upd)?$upd:'';
$msg = isset($msg)?$msg:'';
$id = isSet($id) ? $db->escapstr($id) : '' ;
$admin_main_cat = isset($admin_main_cat)?$admin_main_cat:'';
$admin_sub_cat = isset($admin_sub_cat)?$admin_sub_cat:'';
$qus_type = isset($qus_type)?$qus_type:'';
$admin_main_head = isset($admin_main_head)?$admin_main_head:'';
$admin_qus = isset($admin_qus)?$admin_qus:'';
$admin_choice1 = isset($admin_choice1)?$admin_choice1:'';
$admin_choice2 = isset($admin_choice2)?$admin_choice2:'';
$admin_choice3 = isset($admin_choice3)?$admin_choice3:'';
$admin_choice4 = isset($admin_choice4)?$admin_choice4:'';
$admin_choice5 = isset($admin_choice5)?$admin_choice5:'';
$type = isSet($type)?$type:'';
$qus_t=isSet($qus_t)?$qus_t:'';
$q_type=isSet($q_type)?$q_type:'';
$admin_budget_from=isSet($admin_budget_from)?$admin_budget_from:'';
$admin_budget_to=isSet($admin_budget_to)?$admin_budget_to:'';

if(isset($_submit)) {
	$date=date("Y-m-d H:i:s");
	$ip=$_SERVER['REMOTE_ADDR'];
	$admin_main_cat=$db->escapstr($admin_main_cat);
	$admin_sub_cat=$db->escapstr($admin_sub_cat);
	$qus_type=$db->escapstr($qus_type);
	$admin_main_head=$db->escapstr($admin_main_head);
	$admin_qus=$db->escapstr($admin_qus);
	$admin_choice1=$db->escapstr($admin_choice1);
	$admin_choice2=$db->escapstr($admin_choice2);
	$admin_choice3=$db->escapstr($admin_choice3);
	$admin_choice4=$db->escapstr($admin_choice4);
	$admin_choice5=$db->escapstr($admin_choice5);
	$qus_t=$db->escapstr($qus_t);
	$admin_budget_from=$db->escapstr($admin_budget_from);
	$admin_budget_to=$db->escapstr($admin_budget_to);
	
	$livepage = $_SERVER['REQUEST_URI'];
	$cur_url = basename($livepage);
	
	$set  ="cat_id='$admin_main_cat'";
	$set .=",sub_cat_id='$admin_sub_cat'";
	$set .=",question_type='$qus_type'";
	$set .=",q_type='$qus_t'";
	$set .=",main_heading='$admin_main_head'";
	$set .=",sub_heading='$admin_qus'";
	$set .=",choice1='$admin_choice1'";
	$set .= ",choice2 = '$admin_choice2'";
	$set .= ",choice3 = '$admin_choice3'";
	$set .= ",choice4 = '$admin_choice4'";
	$set .= ",choice5 = '$admin_choice5'";
	$set .= ",budget_from = '$admin_budget_from'";
	$set .= ",budget_to = '$admin_budget_to'";
	
	if($upd==1) {
		$set .= ",crcdt = '$date'";
		$set .= ",ip = '$ip'";
		$db->insertrec("insert into question_mgmt set $set");
		echo "<script>location.href='questionsmgmt.php?act=add'</script>";
		header("location:questionsmgmt.php?act=add");
	} else if($upd==2) {
		$set .=",chngdt='$date'";
		$db->insertrec("update question_mgmt set $set where id='$id'");
		echo "<script>location.href='questionsmgmt.php?act=upd'</script>";
		header("location:questionsmgmt.php?act=upd");
	}
	
}

$GetRecord = $db->singlerec("select * from question_mgmt where id='$id'");
@extract($GetRecord);
$admin_main_cat=$GetRecord['cat_id'];
$admin_sub_cat=$GetRecord['sub_cat_id'];
$question_type=$GetRecord['question_type'];
$admin_main_head=$GetRecord['main_heading'];
$admin_qus=$GetRecord['sub_heading'];
$admin_choice1=$GetRecord['choice1'];
$admin_choice2=$GetRecord['choice2'];
$admin_choice3=$GetRecord['choice3'];
$admin_choice4=$GetRecord['choice4'];
$admin_choice5=$GetRecord['choice5'];
$admin_budget_from=$GetRecord['budget_from'];
$admin_budget_to=$GetRecord['budget_to'];
$q_type=$GetRecord['q_type'];
?>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Questions</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title">Add New Questions</h4>
					<?php echo $msg; ?>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block card-dashboard table-responsive">
	               
					<form name="usrfrm" class="form-horizontal" action="" method="post" onsubmit="return frm_valid()" enctype="multipart/form-data">
                         <div id="err"></div>
							<div class="panel-body">
<?php 
$cunt=$db->singlerec("select count(*) as tot from question_mgmt where q_type='5'");
$cunt=$cunt['tot'];
if($cunt<=2 && $upd==2) $class=""; else $class="readonly";
?>
							<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Question Type <span class="req">*</span> </label>
									<div class="col-sm-9">
										<select class="form-control" name="qus_t" id="qus_t" onchange="return hide(this.value);" <?php echo $class; ?>>
											<option value=""> Select Type </option>
											<option <?php if($q_type==5) echo "selected"; ?> value="5">Compulsory</option>
										<select><span class="req">Max 2 question only add compulsory</span>
									</div>
							</div>

							<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Question Input Type <span class="req">*</span> </label>
									<div class="col-sm-9">
										<select class="form-control" name="qus_type" id="qus_type" onchange="return hidefield(this.value);">
											<option value=""> Select Type </option>
											<option <?php if($question_type==0) echo "selected"; ?> value="0">Input Box</option>
											<option <?php if($question_type==1) echo "selected"; ?> value="1">Checkbox</option>
											<option <?php if($question_type==2) echo "selected"; ?> value="2">Radio Button</option>
											<option <?php if($question_type==3) echo "selected"; ?> value="3">Dropdown Box</option>
										<select>
									</div>
								</div>
								<div class="form-group col-sm-12" id="main">
									<label class="col-sm-3 control-label"> Main Category <span class="req">*</span> </label>
									<div class="col-sm-9">
										<select class="form-control" name="admin_main_cat" id="admin_main_cat" onchange="return get_subcat(this.value),checkstatus(this.value);">
										<option value=""> Select Category </option>
										<?=$drop->get_dropdown($db,"select id,category_name from category where active_status='1' and parent_id='0' order by category_name asc",$admin_main_cat);?> 
								</select>
									</div>
								</div>
								
								<div class="form-group col-sm-12" id="sub">
									<label class="col-sm-3 control-label"> Sub Category </label>
									<div class="col-sm-9">
										<select class="form-control" name="admin_sub_cat" id="admin_sub_cat">
										     <option value=''> Select Your Service </option>
                                              <?=$drop->get_dropdown($db,"select id,category_name from category where active_status='1' and parent_id!='0' order by category_name asc",$admin_sub_cat);?>
										</select>
									</div>
								</div>
								
								</div>
								
																
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Main Heading  </label>
									<div class="col-sm-9">
										<input type="text" name="admin_main_head" class="form-control" value="<?php echo $admin_main_head; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Question? </label>
									<div class="col-sm-9">
										<input type="text" name="admin_qus" class="form-control" value="<?php echo $admin_qus; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12" id="_choice1">
									<label class="col-sm-3 control-label"> Choice1  </label>
									<div class="col-sm-9">
										<input type="text" name="admin_choice1" id="admin_choice1" class="form-control" value="<?php echo $admin_choice1; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12" id="_choice2">
									<label class="col-sm-3 control-label"> Choice2  </label>
									<div class="col-sm-9">
										<input type="text" name="admin_choice2" id="admin_choice1" class="form-control" value="<?php echo $admin_choice2; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12" id="_choice3">
									<label class="col-sm-3 control-label"> Choice3  </label>
									<div class="col-sm-9">
										<input type="text" name="admin_choice3" id="admin_choice1" class="form-control" value="<?php echo $admin_choice3; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12" id="_choice4">
									<label class="col-sm-3 control-label"> Choice4  </label>
									<div class="col-sm-9">
										<input type="text" name="admin_choice4" id="admin_choice1" class="form-control" value="<?php echo $admin_choice4; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12" id="_choice5">
									<label class="col-sm-3 control-label"> Choice5  </label>
									<div class="col-sm-9">
										<input type="text" name="admin_choice5" id="admin_choice1" class="form-control" value="<?php echo $admin_choice5; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12" id="budget">
									<label class="col-sm-3 control-label"> Budget From  </label>
									<div class="col-sm-9">
										<input type="text" name="admin_budget_from" id="admin_choice1" class="form-control" value="<?php echo $admin_budget_from; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12" id="budget_to">
									<label class="col-sm-3 control-label"> Budget To  </label>
									<div class="col-sm-9">
										<input type="text" name="admin_budget_to" id="admin_choice1" class="form-control" value="<?php echo $admin_budget_to; ?>" />
									</div>
								</div>
								
					  
					  <div class="form-actions center col-sm-12">
								<a href="questionsmgmt.php" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Cancel
								</a>
								<button type="submit" name="_submit" id="save_btn" class="btn btn-primary">
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
	<input type="hidden" name="h2" id="h2" />
<?php
if($question_type==0){ ?>
<script>
$(document).ready(function(){
	hidefield(0);
});
</script>
<?php } ?>
<script>
function hidefield(id){
	var f1=document.getElementById("h2").value;
	if(id==0){
		$("#_choice1").hide();
		$("#_choice2").hide();
		$("#_choice3").hide();
		$("#_choice4").hide();
		$("#_choice5").hide();
		$("#budget").hide();
		$("#budget_to").hide();
	}else{
		$("#_choice1").show();
		$("#_choice2").show();
		$("#_choice3").show();
		$("#_choice4").show();
		$("#_choice5").show();
	}
	
	if(id==3 && f1==5){
		$("#_choice1").hide();
		$("#_choice2").hide();
		$("#_choice3").hide();
		$("#_choice4").hide();
		$("#_choice5").hide();
		$("#main").hide();
		$("#sub").hide();
		$("#budget").show();
		$("#budget_to").show();
	}
	
	if(id==2 && f1==5){
		$("#main").hide();
		$("#sub").hide();
		$("#budget").hide();
		$("#budget_to").hide();
	}
	
}

function hide(id){
	document.getElementById('h2').value=id;
	
	
}
</script>
<script>
function frm_valid() {
	var fname = document.usrfrm.fname.value;
	var lname = document.usrfrm.lname.value;
	var email = document.usrfrm.email.value;
	var password = document.usrfrm.password.value;
	var phone = document.usrfrm.phone.value;
	var country = document.usrfrm.country.value;
	var zipcode = document.usrfrm.zipcode.value;
	
	if(fname=="" || lname=="" || email=="" || password=="" || phone=="" || country=="" || zipcode=="") {
		swal('Oops!', 'Star marked fields are mandatory!', 'error'); 
		return false;
	}
	if(password!="" && ((password.length < 6) || (password.length > 15))) {
		swal('Oops!', 'Password length between 6 to 15 characters only!', 'error'); 
		return false;
	}
	if(phone!="" && ((phone.length < 10) || (phone.length > 15))) {
		swal('Oops!', 'Phone Number is not valid!', 'error'); 
		return false;
	}
	if(zipcode!="" && ((zipcode.length < 5) || (zipcode.length > 6))) {
		swal('Oops!', 'Zipcode is not valid!', 'error'); 
		return false;
	}
}

function checkmail() {
var x = document.getElementById("emailid").value;
  $.ajax({url: "../checkmail.php",
        type: 'POST',
        data: {reg_email:x} ,
  success: function(result){
		 if(result==1)
		{
			swal('Oops!', 'Email Id already Exists!', 'error');
			document.getElementById("emailid").value="";
			document.getElementById("emailid").focus(); 		
			return false;
		} if(result==0){
			return true;
		} 		
    }});
}

function img_validate(id,width,height){
	var fuData = document.getElementById(id);
	var FileUploadPath = fuData.value;
	var action = 'update';
	if(window.FileReader) {   
		if (FileUploadPath != '') {				
			var size = fuData.files[0].size;
			if (size > 1048576) {				
				swal('File size exceeded!!', 'Maximum allowed size is 1 MB', 'error');
				fuData.value="";
				fuData.focus();
				return false;
			} else {			
				var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
				
				if (Extension == "gif" || Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
					if (fuData.files && fuData.files[0]) {
						var reader = new FileReader();
						
						reader.onload = function(e) {
							var w, h;
							
							var image = new Image();
							image.src = e.target.result;
							image.onload = function() {
								w = this.width;
								h = this.height;
								localStorage.setItem("width", w);
								localStorage.setItem("height", h);
								if (w < width || h < height) {
									
									swal("Too short!","Your image size (" + w + 'x' + h + "). size should grater than ("+width+"x"+height+").","error");
									fuData.value="";
									fuData.focus();
									return false;
									
								} else {
								
									$image.attr("src", e.target.result).show();
								}
							}
						}
						reader.readAsDataURL(fuData.files[0]);
					}
				} else {
					swal("Invalid file format!","Profile picture only allows file types of GIF, PNG, JPG and JPEG. ","error");
					fuData.value="";
					fuData.focus();
					return false;
				}
			}
		}
	} else {
	
	swal("Incompatible browser","Your browser does not support Advance javascript functions so kindly update your browser to latest version..","warning");
	return true;
	}
}
</script>
<script>
function get_state(val){
		 $.ajax({
			 url: "../state_ajax.php?val="+val, 
			success: function(result){
			$("#state1").html(result);
		}
		});
	}
function get_city(val){
	 $.ajax({url: "../city_ajax.php?val="+val, success: function(result){
        $("#city1").html(result);
    }});
}
</script>
<script>
function get_subcat(id){
	if(id!=""){
		$.ajax({
			type: "post",
			url : "subcatajax.php?val="+id,
			success:function(response){
				$("#admin_sub_cat").html(response);
			}
		});
	}
}

function checkstatus(id){
	if(id!=""){
		$.ajax({
			type: "post",
			url : "checkqus.php?val="+id,
			success:function(response){
				if(response==3){
					$("#save_btn").prop("disabled",true);
					$("#err").show().html("<b>You set only 3 question for one category.</b>").css("background","#ffd0d0").css("color","red");
				}else{
					$("#save_btn").prop("disabled",false);
					$("#err").hide();
				}
			}
		});
	}
}
</script>

       <script src="asstes/plugins/parsley/parsley.min.js"></script>
        <!--Javascript parsely plugin-->

       <script src="assets/plugins/customjs.js"></script>
        <!--Javascript Myjs-->
<?php include 'footer.php'; ?>