<?php 
include "includes/title.php"; 
$email=isset($email)?$email:'';
if(isset($_psw)){
	$email=$db->escapstr($email);
	$getpsw=$com_obj->getPsw($email);
	if(!empty($getpsw)){
		$subject="Forget Password";
		$getres=$email_temp->forgotpass($siteinfo,$getpsw);
		echo $getres;exit;   
		$com_obj->email($from_email,$email,$subject,$getres);
		header("Location: forgot-pass?succ");
		echo "<script>location.href='forgot-pass?succ';</script>";
		exit;
	}else{
		header("Location: forgot-pass?err");
		echo "<script>location.href='forgot-pass?err';</script>";
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
                        <h2 style="color:#575757;letter-spacing:1px;font-size: 23px;">Forgot Password</h2>
                     </div>
                     <div class="col-md-12" style="margin-top: -37px;">
                        <hr>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3"></div>
                     <div class="col-md-6">
<?php if(isset($_REQUEST['succ'])) { ?> 
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok green"></i>
		<strong class="green">
			Mail sent successfully.Kindly check your mail !!!
		</strong>

	</div>
<?php } ?>
<?php if(isset($_REQUEST['err'])) { ?> 
	<div class="alert alert-block alert-error">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-off red"></i>
		<strong class="red">
			Something went to wrong !!!
		</strong>

	</div>
<?php } ?>
                        <div class="box_style_1 pad56">
                           <div class="row">
							<form method="post">
                              <div class="form-group sigfonsiz">
								
								<input type="email" class="form-control singinpu" name="email" placeholder="User Email">
							  </div>
							  
							  <div class="form-group sigfonsiz">
								<button class="btn_2 btn agelogbt btn-block " name="_psw" type="submit">Get Password</button>
							  </div>
							  
							  <div class="agentregfor">
                                    <span>New user?  <a href="register.php"  class="" > Register Now</a></span>
                                     
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
            <!-- Specific scripts -->
            <script src="js/icheck.js"></script>
            <script>  
               $('input').iCheck({
                  checkboxClass: 'icheckbox_square-grey',
                  radioClass: 'iradio_square-grey'
                });
                
            </script>
         </body>
      </html>