<?php
include "includes/title.php";

if(isset($code)){
	$getcode=$db->Extract_Single("select id from register where temp_key='$code'");
	$db->insertrec("update register set temp_key='',active_status='1',email_active_status='1' where id='$getcode'");
}

if(isset($_POST['log_submit'])){
	$username=$db->escapstr($log_email);
	$password=$db->escapstr($log_password);
	$prof_type=$db->escapstr($prof_type);
	if(!empty($username)){
		$chk=$db->singlerec("select * from register where (email='$username' or fname='$username') and password='$password' and user_role='$prof_type'");
		$status=$chk['active_status'];
		$role=$chk['user_role'];
		$e_status=$chk['email_active_status'];
		if(!empty($chk)){
			if($status==1 && $role==0){
				$_SESSION['id']=$chk['id'];
				$_SESSION['email']=$chk['email'];
				$_SESSION['fname']=$chk['fname'];
				header("location:user-profile");
				echo "<script>location.href='user-profile';</script>";
				exit;
			}else if($status==1 && $role==1){
				$_SESSION['pid']=$chk['id'];
				$_SESSION['pemail']=$chk['email'];
				$_SESSION['pfname']=$chk['fname'];
				header("location:prof-dashboard");
				echo "<script>location.href='prof-dashboard';</script>";
				exit;
			}else if($status==0 && $e_status==0){
			    header("location:login?inactmail");
				echo "<script>location.href='login?inactmail';</script>";
				exit;	
			}
			else if($status==0){
				header("location:login?inact");
				echo "<script>location.href='login?inact';</script>";
				exit;
			}else if($status==5){
				header("location:login?del");
				echo "<script>location.href='login?del';</script>";
				exit;
			}
		}else{
			header("location:login?err");
			echo "<script>location.href='login?err';</script>";
			exit;
		}
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
                        <h2 style="color:#575757;letter-spacing:1px;font-size: 23px;">Login</h2>
                     </div>
                     <div class="col-md-12" style="margin-top: -37px;">
                        <hr>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3"></div>
                     <div class="col-md-6">
                        <div class="box_style_1 pad56">
						<?php if(isset($_REQUEST['err'])) { ?>
							<p style="color:#ff5d56;font-size: 24px;
    font-style: italic;
    margin-bottom: 33px;
    text-align: center;font-weight: 500;"> Invalid Username/Password.</p>
						<?php }?>
						<?php if(isset($_REQUEST['inact'])) { ?>
							<p style="color:#ff5d56;font-size: 24px;
    font-style: italic;
    margin-bottom: 33px;
    text-align: center;font-weight: 500;"> Your Account has been inactive please contact admin.</p>
						<?php }?>
						<?php if(isset($_REQUEST['del'])) { ?>
							<p style="color:#ff5d56;font-size: 24px;
    font-style: italic;
    margin-bottom: 33px;
    text-align: center;font-weight: 500;"> Your Account has been deleted.</p>
						<?php }?>
						<?php if(isset($_REQUEST['sucreg'])) { ?>
							<p style="color:#24a3b5;font-size: 24px;
    font-style: italic;
    margin-bottom: 33px;
    text-align: center;font-weight: 500;"> Registered successfully,Please activate Your account through your email</p>
						<?php }?>
						<?php if(isset($_REQUEST['inactmail'])) { ?>
							<p style="color:#ff5d56;font-size: 24px;
    font-style: italic;
    margin-bottom: 33px;
    text-align: center;font-weight: 500;"> Your login account is not verified in your email.</p>
						<?php }?>
						<?php if(isset($_REQUEST['code'])) { ?>
							<p style="color:#24a3b5;font-size: 24px;
    font-style: italic;
    margin-bottom: 33px;
    text-align: center;font-weight: 500;"> Your email verified successfully.Kindly login your profile</p>
						<?php }?>
						
                           <div class="row">
                              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="log_chk" id="log_chk"  enctype="multipart-form/data">
							  <div class="form-group sigfonsiz">
								<!-- <label>User name / Email </label> -->
								<select class="form-control singinpu" name="prof_type" id="prof_type" onchange="return sociallogin(this.value)">
									<option value="">Select Login Type</option>
									<option value="0">User</option>
									<option value="1">Professionalist</option>
								</select>
							  </div>
							  <div class="form-group sigfonsiz">
								<!-- <label>User name / Email </label> -->
								<input type="text" class="form-control singinpu" id="log_email" name="log_email" placeholder="User name / Email" onChange="return checkmail(this.value);">
							  </div>
							  <div id="err"></div>
							  
							  <div class="form-group sigfonsiz">
								<!-- <label>Password</label> -->
								<input type="password" class="form-control singinpu" id="log_password" name="log_password" placeholder="Password" onKeyUp="return checkpass(this.value);">
							  </div>
							  <div id="errr"></div>
							  <input type="hidden" id="mail_hidden"/>
							  <div class="form-group sigfonsiz">
								<button class="btn_2 btn agelogbt btn-block " id="log_submit" name="log_submit" type="submit">Login</button>
							  </div>
							  
							 <!-- <div class="form-group">
								<p class="text-center mb15">or</p>
								<div id="errmsg"></div>
								<a href="javascript:;" class="btn btn-block fb-btn" id="fb-btn"><i class="fa fa-facebook" aria-hidden="true"></i> Login With Facebook</a>
								
								<a href="javascript:;" class="mt15i btn btn-block gplus-btn" id="gplus-btn"><i class="fa fa-google-plus" aria-hidden="true"></i> Login With Google Plus</a>
							  </div> -->
							  
							  
							  <div class="agentregfor">
                                    <span>New user?  <a href="register"  class="" > Register Now</a></span>
                                    <a href="forgot-pass" class="pull-right">Forgot Password?</a>
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
			<script type="text/javascript">
			function checkmail(mail){
				document.getElementById('mail_hidden').value=mail;
				var role = document.getElementById('prof_type').value;
				if(mail!=""){
					$.ajax({
						type: "post",
						url: "loginvalidation.php?mail="+mail+"&role="+role,
						success:function(resposeText){
							if(resposeText==0){
								$("#err").show().html("<b>Valid!</b>").css("background","#008000").css("color","white");
								$("#log_submit").prop('disabled',false);
							}else if(resposeText==1){
								$("#err").show().html("<b>Invalid Email Address!</b>").css("background","#ffd0d0").css("color","red");
								$("#log_submit").prop('disabled',true);
							}
						}
					});
				}else{
					$("#err").hide();
				}
			}
			
			function checkpass(pass){
				var lmail=document.getElementById('mail_hidden').value;
				var role = document.getElementById('prof_type').value;
				if(pass!="" && lmail!=""){
					$.ajax({
						type : "post",
						url : "checklogin.php?lmail="+lmail+"&pass="+pass+"&role="+role,
						success:function(response){
							if(response==2){
								$("#errr").show().html("<b>Valid!</b>").css("background","#008000").css("color","white");
								$("#log_submit").prop('disabled',false);
							}else if(response==3){
								$("#errr").show().html("<b>Invalid Password!</b>").css("background","#ffd0d0").css("color","red");
								$("#log_submit").prop('disabled',true);
							}
						}
					});
				}else{
					$("#errr").hide();
				}
			}
			</script>
			<script>
			$.validator.setDefaults({
				submitHandler:function(){
					form.submit();
				}
			});
			
			$().ready(function(){
				$("#log_chk").validate({
					rules:{
						prof_type: "required",
						log_email: "required",
						log_password: "required"
					},
					messages:{
						prof_type: "please select login type",
						log_email: "This field is required",
						log_password: "Please enter the password"
					}
				});
			});
			</script>
         </body>
      </html>
<input type="hidden" name="sociallogin" id="sociallogin" />
<input type="hidden" id="theContent" value="<?php echo $siteurl; ?>/fblog_new" />
	  <script>
	  function sociallogin(val){
		  document.getElementById('sociallogin').value=val;
	  }
	  $().ready(function(){
		  $("#fb-btn").prop('disabled',true).css("cursor", "not-allowed");
		  $(".fb-btn").bind('click',function(role){ 
				var role=document.getElementById('sociallogin').value;
				$("#errmsg").html("<b>Please Select Login type..!!</b>").css("background","#ffd0d0").css("color","red");
				if(role!=""){
					$("#fb-btn").prop('disabled',false).css("cursor","pointer");
					$("#errmsg").html("<b>Proceed to login..!!</b>").css("background","green").css("color","#fff");
					$.ajax({
						type : "POST",
						url : "socialredirect.php?role="+role,
						success:function(response){
							if(response==1){
							    sessionStorage.setItem("selectrole", 1);
								  var value = sessionStorage.getItem("selectrole");
								window.location="<?php echo $siteurl; ?>/fblog_new";
							}else if(response==0){
							    sessionStorage.setItem("selectrole", 0);
								var value = sessionStorage.getItem("selectrole");
								window.location="<?php echo $siteurl; ?>/fblog_new";
							}
						}
					})
				}else{
					$("#errmsg").html("<b>Please Select Login type..!!</b>").css("background","#ffd0d0").css("color","red");
				}
		  });
	  });
	  </script>
	  <script>
	  $().ready(function(){
		  $("#gplus-btn").prop('disabled',true).css("cursor", "not-allowed");
		  $(".gplus-btn").bind('click',function(role){ 
				var role=document.getElementById('sociallogin').value;
				$("#errmsg").html("<b>Please Select Login type..!!</b>").css("background","#ffd0d0").css("color","red");
				if(role!=""){
					$("#gplus-btn").prop('disabled',false).css("cursor","pointer");
					$("#errmsg").html("<b>Proceed to login..!!</b>").css("background","green").css("color","#fff");
					$.ajax({
						type : "POST",
						url : "googleplusredirect.php?role="+role,
						success:function(response){
							if(response==1){
							    sessionStorage.setItem("gooleselectrole", 1);
								var value = sessionStorage.getItem("gooleselectrole");
								window.location="<?php echo $siteurl; ?>/google_plus";
							}else if(response==0){
							    sessionStorage.setItem("gooleselectrole", 0);
								var value = sessionStorage.getItem("gooleselectrole");
								window.location="<?php echo $siteurl; ?>/google_plus";
							}
						}
					})
				}else{
					$("#errmsg").html("<b>Please Select Login type..!!</b>").css("background","#ffd0d0").css("color","red");
				}
		  });
	  });
	  </script>