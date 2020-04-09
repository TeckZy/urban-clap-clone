 <link rel="stylesheet" type="text/css" href="assets/css/grey.css">
 <link rel="stylesheet" type="text/css" href="assets/css/style.css">
 <link rel="stylesheet" type="text/css" href="assets/css/bootstrap2.css">
<?php include 'header.php';
include 'leftmenu.php';
$upd = isset($upd)?$upd:'';
$msg = isset($msg)?$msg:'';
$id = isSet($id) ? $db->escapstr($id) : '' ;
$fname = isset($fname)?$fname:'';
$lname = isset($lname)?$lname:'';
$email = isset($email)?$email:'';
$password = isset($password)?$password:'';
$contact_no1 = isset($contact_no1)?$contact_no1:'';
$building = isset($building)?$building:'';
$street = isset($street)?$street:'';
$landmark = isset($landmark)?$landmark:'';
$area = isset($area)?$area:'';
$country = isset($country)?$country:'';
$state = isset($state)?$state:'';
$city = isset($city)?$city:'';
$zip_code = isset($zip_code)?$zip_code:'';
$img = isset($img)?$img:'';
$sentername = isSet($sentername)?$sentername:'';
$profname = isSet($profname)?$profname:'';
$radio_box0=isset($radio_box0)?$radio_box0:'';
$radio_box1=isset($radio_box1)?$radio_box1:'';
$radio_box2=isset($radio_box2)?$radio_box2:'';
$radio_box3=isset($radio_box3)?$radio_box3:'';
$radio_box4=isset($radio_box4)?$radio_box4:'';
$prf_input0=isset($prf_input0)?$prf_input0:'';
$prf_input1=isset($prf_input1)?$prf_input1:'';
$prf_input2=isset($prf_input2)?$prf_input2:'';
$prf_input3=isset($prf_input3)?$prf_input3:'';
$prf_input4=isset($prf_input4)?$prf_input4:'';
$prf_select0=isset($prf_select0)?$prf_select0:'';
$prf_select1=isset($prf_select1)?$prf_select1:'';
$prf_select2=isset($prf_select2)?$prf_select2:'';
$prf_select3=isset($prf_select3)?$prf_select3:'';
$prf_select4=isset($prf_select4)?$prf_select4:'';
$radio_box_comp0=isset($radio_box_comp0)?$radio_box_comp0:'';
$radio_box_comp1=isset($radio_box_comp1)?$radio_box_comp1:'';
$radio_box_comp2=isset($radio_box_comp2)?$radio_box_comp2:'';
$radio_box_comp3=isset($radio_box_comp3)?$radio_box_comp3:'';
$radio_box_comp4=isset($radio_box_comp4)?$radio_box_comp4:'';
$prf_type=isset($prf_type)?$prf_type:'';
$radioid=isset($radioid)?$radioid:'';
$checkid=isset($checkid)?$checkid:'';
$input_field=isset($input_field)?$input_field:'';
$selid=isset($selid)?$selid:'';
$prf_checkbox=isset($prf_checkbox)?$prf_checkbox:'';
$comp_location=isset($comp_location)?$comp_location:'';
$budget_from=isset($budget_from)?$budget_from:'';
$budget_to=isset($budget_to)?$budget_to:'';
$radioid_comp=isset($radioid_comp)?$radioid_comp:'';

if(isset($_submit)) {
	$date=date("Y-m-d H:i:s");
	$ip=$_SERVER['REMOTE_ADDR'];
	//radio box ans and question
	$radio_box0=$db->escapstr($radio_box0);
	$radio_box1=$db->escapstr($radio_box1);
	$radio_box2=$db->escapstr($radio_box2);
	$radio_box3=$db->escapstr($radio_box3);
	$radio_box4=$db->escapstr($radio_box4);
	$radioid=$db->escapstr($radioid);
	$budget_from=$db->escapstr($budget_from);
	$budget_to=$db->escapstr($budget_to);
	$comp_location=$db->escapstr($comp_location);
	$radioid_comp=$db->escapstr($radioid_comp);
	$catid=$db->escapstr($catid);
	$senterid=$db->escapstr($senterid);
	$receiverid=$db->escapstr($receiverid);
	$json_radio=json_encode(array("qus1" => $radioid, "ans1" => $radio_box0,
								  "qus2" => $radioid, "ans2" => $radio_box1,
								  "qus3" => $radioid, "ans3" => $radio_box2,
								  "qus4" => $radioid, "ans4" => $radio_box3,
								  "qus5" => $radioid, "ans5" => $radio_box4));
	//checkbox ans and question
	if(isset($_POST['0prf_checkbox'])) $prf_checkbox0=$_POST['0prf_checkbox']; else $prf_checkbox0="";
	if(isset($_POST['1prf_checkbox'])) $prf_checkbox1=$_POST['1prf_checkbox']; else $prf_checkbox1="";
	if(isset($_POST['2prf_checkbox'])) $prf_checkbox2=$_POST['2prf_checkbox']; else $prf_checkbox2="";
	if(isset($_POST['3prf_checkbox'])) $prf_checkbox3=$_POST['3prf_checkbox']; else $prf_checkbox3="";
	if(isset($_POST['4prf_checkbox'])) $prf_checkbox4=$_POST['4prf_checkbox']; else $prf_checkbox4="";
	$checkboxid=$db->escapstr($checkid);
	$json_checkbox=json_encode(array("qus1" => $checkboxid, "ans1" => $prf_checkbox0,
									 "qus2" => $checkboxid, "ans2" => $prf_checkbox1,
									 "qus3" => $checkboxid, "ans3" => $prf_checkbox2,
									 "qus4" => $checkboxid, "ans4" => $prf_checkbox3,
									 "qus5" => $checkboxid, "ans5" => $prf_checkbox4));
	//input box ans and question
	$prf_input0=$db->escapstr($prf_input0);
	$prf_input1=$db->escapstr($prf_input1);
	$prf_input2=$db->escapstr($prf_input2);
	$prf_input3=$db->escapstr($prf_input3);
	$prf_input4=$db->escapstr($prf_input4);
	$input_field=$db->escapstr($input_field);
	$json_inputbox=json_encode(array("qus1" => $input_field, "ans1" => $prf_input0,
									 "qus2" => $input_field, "ans2" => $prf_input1,
									 "qus3" => $input_field, "ans3" => $prf_input2,
									 "qus4" => $input_field, "ans4" => $prf_input3,
									 "qus5" => $input_field, "ans5" => $prf_input4));
									
	//select box qus and ans
	$prf_select0=$db->escapstr($prf_select0);
	$prf_select1=$db->escapstr($prf_select1);
	$prf_select2=$db->escapstr($prf_select2);
	$prf_select3=$db->escapstr($prf_select3);
	$prf_select4=$db->escapstr($prf_select4);
	$selid=$db->escapstr($selid);
	$json_selectkbox=json_encode(array("qus1" => $selid, "ans1" => $prf_select0,
									   "qus2" => $selid, "ans2" => $prf_select1,
									   "qus3" => $selid, "ans3" => $prf_select2,
									   "qus4" => $selid, "ans4" => $prf_select3,
									   "qus5" => $selid, "ans5" => $prf_select4));
									   
	//compulsory qus
	$radio_box_comp0=$db->escapstr($radio_box_comp0);
	$radio_box_comp1=$db->escapstr($radio_box_comp1);
	$radio_box_comp2=$db->escapstr($radio_box_comp2);
	$radio_box_comp3=$db->escapstr($radio_box_comp3);
	$radio_box_comp4=$db->escapstr($radio_box_comp4);
	$json_comp=json_encode(array("qus1" => $radioid_comp, "ans1" => $radio_box_comp0,
								 "qus2" => $radioid_comp, "ans2" => $radio_box_comp1,
								 "qus3" => $radioid_comp, "ans3" => $radio_box_comp2,
								 "qus4" => $radioid_comp, "ans4" => $radio_box_comp3,
								 "qus5" => $radioid_comp, "ans5" => $radio_box_comp4));
	$compans=$com_obj->mailCompQus($json_comp);
	$checkans=$com_obj->mailcheckboxQus($json_checkbox);
	$inputans=$com_obj->commonmailans($json_inputbox);
	$selectboxqus=$com_obj->commonmailans($json_selectkbox);
	$json_radioqus=$com_obj->commonmailans($json_radio);
	$getname=$com_obj->get_name($receiverid);
	$bud=array("bud_frm" => $budget_from, "bud_to" => $budget_to, "comp_loc" => $comp_location);
	//$getfname=$com_obj->get_name($_sid);
	
	$set="senter_id='$senterid'";
	$set.=",receiver_id='$receiverid'";
	$set.=",cat_id='$catid'";
	$set.=",qusans1='$json_radio'";
	$set.=",qusans2='$json_checkbox'";
	$set.=",qusans3='$json_inputbox'";
	$set.=",qusans4='$json_selectkbox'";
	$set.=",comp_qusans='$json_comp'";
	$set.=",comp_budget_from='$budget_from'";
	$set.=",comp_budget_to='$budget_to'";
	$set.=",comp_location='$comp_location'";
	$set.=",ip='$ip'";
	$set.=",crcdt='$date'";
	$set.=",status='0'";
	$set.=",role='1'";
	$toemail=$com_obj->getEmail($receiverid);
	$subject= "User Order";
	$getmailres=$email_temp->sentQusEmail($siteinfo,$json_radioqus,$selectboxqus,$inputans,$checkans,$compans,$bud,$getname);
	$db->insertrec("insert into sent_enquiry set $set");
	$com_obj->email($from_email,$toemail,$subject,$getmailres);
	
}

if(isset($err)) {
	$msg = "<font color='red'><b>$err</b></font>" ;
}
$GetRecord = $db->singlerec("select * from sent_enquiry where id='$id' ");
$senterid=$GetRecord['senter_id'];
$receiverid=$GetRecord['receiver_id'];
$qus1=$GetRecord['qusans1'];
$radio=$com_obj->commonmailansonly($GetRecord['qusans1']);
$input=$com_obj->commonmailansonly($GetRecord['qusans3']);
$select=$com_obj->commonmailansonly($GetRecord['qusans4']);
$checkbux=$com_obj->mailcheckboxQusonly($GetRecord['qusans2']);
$compqus=$com_obj->mailCompQusonly($GetRecord['comp_qusans']);
@extract($GetRecord);
?>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Order Request</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title">Add New Order Request</h4>
					<?php echo $msg; ?>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block card-dashboard table-responsive">
	               
					<form name="usrfrm" class="form-horizontal" action="" method="post" onsubmit="return frm_valid()" enctype="multipart/form-data">
                         
							<div class="panel-body">
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Select User <span class="req">*</span> </label>
									<div class="col-sm-9">
										<select class="form-control" name="sentername" onchange="return curusr(this.value)" id="sentername"/>
										<option>Select User</option>
										<?=$drop->get_dropdown($db,"select id,fname from register where user_role='0' and active_status='1'",$senterid); ?>
										</select>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Select Professional <span class="req">*</span> </label>
									<div class="col-sm-9">
										<select class="form-control" name="profname" onchange="return groupqus(this.value)" id="profname"/>
										<option>Select Professional</option>
										<?=$drop->get_dropdown($db,"select id,fname from register where user_role='1' and active_status='1'",$receiverid); ?>
										</select>
									</div>
								</div>
								
								<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<div id="formqus"></div>
					</div>
					<div class="col-sm-2"></div>
			   </div>
						
						<input type="hidden" name="senterid" id="senterid" value=""/>
					  <div class="form-actions center col-sm-12">
								<a href="user-profile.php" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Cancel
								</a>
								<button type="submit" name="_submit" class="btn btn-primary">
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
<script>
function curusr(curid){
	document.getElementById('senterid').value=curid;
}
</script>
<?php if(!empty($receiverid)){ ?>
<script>
$().ready(function(){
	var tempid="<?php echo $receiverid; ?>";
	groupqus(tempid);
});
</script>
<?php } ?>
<script>
function groupqus(profid){
	var cur = document.getElementById('senterid').value;
	var autoid = "<?php echo $id; ?>";
	if(profid!=""){
		$.ajax({
		type : "post",
		url : "qusform.php?id="+profid+"&autoid="+autoid,
		success:function(response){
			$("#formqus").html(response);
		}
	 });
	}
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
			$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
			</script>

			 <!--Wizard-->
	   <script src="assets/js/jquery-1.11.2.min.js"></script>
            <script src="assets/js/common_scripts_min.js"></script>
            <script src="assets/js/functions.js"></script>
			
			
       <script src="asstes/plugins/parsley/parsley.min.js"></script>
        <!--Javascript parsely plugin-->

       <script src="assets/plugins/customjs.js"></script>
        <!--Javascript Myjs-->
<?php include 'footer.php'; ?>