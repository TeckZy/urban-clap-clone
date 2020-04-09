<?php 
include "includes/title.php"; 

if(isset($_POST['buk_submit'])){
	//$userrole=$db->escapstr($user_role);
	$username=$db->escapstr($reg_username);
	$email=$db->escapstr($reg_email);
	$password=$db->escapstr($reg_password);
	$confirm_password=$db->escapstr($reg_confirm_password);
	/* if($userrole==1){
	$key_specify=$_POST['key_specify'];
	$jsonspecify=json_encode((object)$key_specify);
	$key_qualify=$_POST['key_qualify'];
	$jsonqualify=json_encode((object)$key_qualify);
	} */
	$ip=$_SERVER['REMOTE_ADDR'];
	$date=date("Y-m-d");
	$code=base64_encode(time()*27);
	if(!empty($email)){
		$set="fname='$username'";
		$set.=",user_role='0'";
		$set.=",email='$email'";
		$set.=",password='$password'";
		$set.=",temp_key='$code'";
		/* if($userrole==1){
		$set .=",specification1='$jsonspecify'";
		$set .=",qualification1='$jsonqualify'";
		} */
		$set.=",crcdt='$date'";
		$set.=",reg_ip='$ip'";
		$set.=",active_status='0'";
		$insert=$db->insertid("insert into register set $set");
		$user=base64_encode($insert);
		$sub="Account activation";
		$text= "We're happy to have you with us! You can book Profesionals on <span>".$sitetitle."</span>.";	
		$url="$siteurl/login?code=$code&user=$user";
		$msg=$email_temp->active_mail($url,$text,$siteinfo,$username);
		$com_obj->email("",$email,$sub,$msg);
		header("location:login?sucreg");
		echo "<script>location.href='login?sucreg';</script>";
		exit;
	}else{
		header("location:register?regerr");
		echo "<script>location.href='register?regerr';</script>";
		exit;
	}
}

?>
         <body>
            <div class="layer"></div>
            <!-- Mobile menu overlay mask -->
            <!-- Header================================================== -->
            <?php include "includes/header.php"; ?>
            <!-- End Header -->
            <div class="container-fluid" style="background-color:#fff;">
               <div class="container margin_70">
                  <div class="row">
                     <div class="col-md-12 main_title textle">
                        <h2 style="color:#575757;letter-spacing:1px;font-size: 23px;">Register</h2>
                     </div>
                     <div class="col-md-12" style="margin-top: -37px;">
                        <hr>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3"></div>
                     <div class="col-md-6">
					 
                        <div class="box_style_1 pad56">
                           <div class="row">
						   <?php if(isset($_REQUEST['regerr'])) { ?>
				<p style="color:#ff5d56;font-size: 24px;
    font-style: italic;
    margin-bottom: 33px;
    text-align: center;font-weight: 500;"> Something trouble in registration.</p>
			<?php }?>
                              <form id="buk_register" name="buk_register" action="<?php $_SERVER['PHP_SELF']; ?>" method="post"  enctype="multipart/form-data">
                              
							  <!--<div class="form-group sigfonsiz">
								<select class="form-control singinpu" name="user_role" id="user_role" >
									<option value="">Select User Role</option>
									<option value="0">User</option>
									<option value="1">Professionalist</option>
								</select>
							  </div>-->
							  
							  <div class="form-group sigfonsiz">
								<input type="text" class="form-control singinpu" id="reg_username" name="reg_username" placeholder="User name" onchange="return checkuser(this.value);">
							  </div>
							  <div id="usrerr"></div>
							  
							  <div class="form-group sigfonsiz">
								<input type="email" class="form-control singinpu error" onchange="return checkmail(this.value);" id="reg_email" name="reg_email" placeholder="Email">
							  </div>
							  <div id="err" style="margin-bottom:16px; color: red; padding: 0 5px;"></div>
							  
							  <div class="form-group sigfonsiz">
								<input type="password" class="form-control singinpu" id="reg_password" name="reg_password" placeholder="Password">
							  </div>
							  
							  <div class="form-group sigfonsiz">
								<input type="password" class="form-control singinpu" id="reg_confirm_password" name="reg_confirm_password" placeholder="Confirm Password">
							  </div>
							  <input type='hidden' autocomplete='off' class='form-control'  name='key_specify[]' value=''>
							  <input type='hidden' autocomplete='off' class='form-control'  name='key_qualify[]' value=''>
							  
							  <div class="form-group sigfonsiz">
								<button class="btn_2 btn agelogbt btn-block " name="buk_submit" id="buk_submit" type="submit">Register</button>
							  </div>
							  
							  <!--<div class="form-group">
								<p class="text-center mb15">or</p>
								
								<a href="user-profile.php" class="btn btn-block fb-btn"><i class="fa fa-facebook" aria-hidden="true"></i> Register With Facebook</a>
								
								<a href="user-profile.php" class="mt15i btn btn-block gplus-btn"><i class="fa fa-google-plus" aria-hidden="true"></i> Register With Google Plus</a>
							  </div>-->
							  
							  
							  <div class="agentregfor">
                                    <span>Already User?  <a href="login.php"  class="" > Login Now</a></span>
                                 </div>
							  
							  </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--End row -->
               </div>
               <!--End container -->
            </div>
            <?php include "includes/footer.php"; ?>
            <!-- End footer -->
            <div id="toTop"></div>
            <!-- Back to top button -->
            <!-- Common scripts -->
            <script src="js/jquery-1.11.2.min.js"></script>
            <script src="js/common_scripts_min.js"></script>
            <script src="js/functions.js"></script>
			<!--Validate JS-->
           <script src="js/jquery.js"></script>
           <script src="js/jquery.validate.js"></script>
            <!-- Specific scripts -->
            <script src="js/icheck.js"></script>
            <script>  
               $('input').iCheck({
                  checkboxClass: 'icheckbox_square-grey',
                  radioClass: 'iradio_square-grey'
                });
            </script>

<script>
	$.validator.setDefaults({
		SubmitHandler: function(){
			form.submit();
		}
	});
	
	$().ready(function(){
		$("#buk_register").validate({
			rules: {
				reg_username: "required",
				reg_email: "required",
				reg_password: {
					required: true,
					minlength: 8
				},
				reg_confirm_password:{
					required:true,
					minlength:8,
					equalTo:"#reg_password",
				},
			},
			messages: {
				reg_username:"Please enter the username",
				reg_email : "Please enter the valid email",
				reg_password:{
					required: "Please enter the password",
					minlength: "The password must be contain 8 char"
				},
				reg_confirm_password:{
					required: "Please enter the confirm password",
					equalTo: "Please enter the same password above ",
					minlength: "Password must be contain 8 digits"
				}
			}
		});
	});
</script>
<script>
function checkmail(mail){
	if(mail!=""){
		$.ajax({
			type : "post",
			url : "checkmail.php?mail="+mail,
			success:function(responseText){
				if(responseText==0){
					$("#err").show().html("<b>Valid Email.!").css("background","#008000").css("color","#ffffff");
					$("#buk_submit").prof("disabled",false);
				}else if(responseText==1){
					$("#err").show().html("<b>This Email already exists.</b>").css("background","#ffd0d0").css("color","red");
					$("#buk_submit").prop("disabled",true);
				}
			}
		});
	}else{
		$("#err").hide();
	}
}
</script>
<script>
function checkuser(user){
	if(user!=""){
		$.ajax({
			type: "post",
			url : "checkuser.php?user="+user,
			success:function(response){
				if(response==0){
					$("#usrerr").show().html("<b>Valid.</b>").css("background","#008000").css("color","#ffffff");
					$("#buk_submit").prop("disabled",false);
				}else if(response==1){
					$("#usrerr").show().html("<b>This user name already exists.</b>").css("background","#ffd0d0").css("color","red");
					$("#buk_submit").prop("disabled",true);
				}
			}
		});
	}else{
		$("#usrerr").hide();
	}
}
</script>
         </body>
      </html>