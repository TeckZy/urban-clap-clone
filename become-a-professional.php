<?php 
include "includes/title.php";

if(isset($prof_upd)){
	$p_username=$db->escapstr($prof_username);
	$p_email=$db->escapstr($prof_email);
	$p_password=$db->escapstr($prof_password);
	$p_conpass=$db->escapstr($prof_confpass);
	$p_cat=$db->escapstr($profcate);
	$p_sub_cat=$db->escapstr($prof_sub);
	$key_specify=$_POST['key_specify'];
	$jsonspecify=json_encode((object)$key_specify);
	$key_qualify=$_POST['key_qualify'];
	$jsonqualify=json_encode((object)$key_qualify);
	$date=date("Y-m-d H:i:s");
	$ip=$_SERVER['REMOTE_ADDR'];
	$code=base64_encode(time()*27);
	if($p_password==$p_conpass){
		$set="fname='$p_username'";
		$set.=",user_role='1'";
		$set.=",email='$p_email'";
		$set.=",password='$p_password'";
		$set.=",cat_id='$p_cat'";
		$set.=",sub_catid='$p_sub_cat'";
		$set.=",specification1='$jsonspecify'";
		$set.=",qualification1='$jsonqualify'";
		$set.=",temp_key='$code'";
		$set.=",crcdt='$date'";
		$set.=",reg_ip='$ip'";
		$insert=$db->insertid("insert into register set $set");
		$user=base64_encode($insert);
		$sub="Account activation";	
		$text= "Expand your service business with <span>".$sitetitle."</span>.";	
		$url="$siteurl/login?code=$code&user=$user";
		$msg=$email_temp->active_mail($url,$text,$siteinfo,$username);
		$com_obj->email("",$p_email,$sub,$msg);
		
			
		
		header("location:login?sucreg");
		echo "<script>location.href='login?sucreg';</script>";
		exit;
	}else{
		header("location:become-a-professional?regerr");
		echo "<script>location.href='become-a-professional?regerr';</script>";
		exit;
	}
}
?>
<body>

<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

    <!-- <div id="preloader"> -->
        <!-- <div class="sk-spinner sk-spinner-wave"> -->
            <!-- <div class="sk-rect1"></div> -->
            <!-- <div class="sk-rect2"></div> -->
            <!-- <div class="sk-rect3"></div> -->
            <!-- <div class="sk-rect4"></div> -->
            <!-- <div class="sk-rect5"></div> -->
        <!-- </div> -->
    <!-- </div> -->
    <!-- End Preload -->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
    <?php include "includes/header.php"; ?>
<section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_2.jpg" data-natural-width="1400" data-natural-height="470">
               <div class="parallax-content-1">
                  <div class="animated fadeInDown">
        <h1>Become A Professional</h1>
        <p>Expand your service business with Us</p>
        </div>
               </div>
            </section>
	<div class="clearfix"></div>	
<div class="container margin_60 pdb20i">
    
        <div class="row">
            
            <div class="col-md-6 col-sm-6">
                <h3>How <span>BookMe</span> Works?</h3>
                
                <ul class="list_order">
                    <li><span>1</span><b>Get verified customer requests</b>
						<p>Get connected with customers looking for your service.</p>
					</li>
                    <li><span>2</span><b>Pay to send quotes</b>
						<p>Pay only to reply to customer leads that match your interests and qualifications.</p>
					</li>
                    <li><span>3</span><b>Chat and get hired</b>
						<p>Chat with the customers, finalise the quotes and get hired</p>
					</li>
                </ul>
               <div class="text-left"> <a href="#" class="btn_2 btn agelogbt">Start now</a></div>
            </div>
			
			<div class="col-sm-6">
                        <div class="box_style_1 pad56">
                           <div class="row">
						   <?php if(isset($_REQUEST['regerr'])) { ?>
				<p style="color:#ff5d56;font-size: 24px;
    font-style: italic;
    margin-bottom: 33px;
    text-align: center;font-weight: 500;"> Something trouble in registration.</p>
			<?php }?>
                              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart-form/data" id="proff_upd" name="proff_upd">
							  <div class="form-group sigfonsiz">
								<!-- <label>User name / Email </label> -->
								<input type="text" class="form-control singinpu" name="prof_username" id="prof_username" placeholder="User name" onChange="return checkusername(this.value);">
							  </div>
							  <div id="err"></div>
							  
							  <div class="form-group sigfonsiz">
								<!-- <label>User name / Email </label> -->
								<input type="email" class="form-control singinpu" name="prof_email" id="prof_email" placeholder="Email" onChange="return checkemail(this.value);">
							  </div>
							  <div id="emailerr"></div>
							  
							  <div class="form-group sigfonsiz">
								<!-- <label>User name / Email </label> -->
								<select class="form-control singinpu" name="profcate" onchange="return get_subcat(this.value);" id="profcate">
									<option value="">Select Category</option>
									<?=$drop->get_dropdown($db,"select id,category_name from category where active_status='1' and parent_id='0' order by category_name asc",$prof_cat);?> 
								</select>
							  </div>
							  
							  <div class="form-group sigfonsiz">
								<!-- <label>User name / Email </label> -->
								<select class="form-control singinpu" name="prof_sub" id="prof_sub">
									<option>Select your service</option>
									<?=$drop->get_dropdown($db,"select id,category_name from category where active_status='1' and parent_id!='0' order by category_name asc",$prof_cat);?> 
								</select>
							  </div>
							  
							  <div class="form-group sigfonsiz">
								<!-- <label>Password</label> -->
								<input type="password" name="prof_password" id="prof_password" class="form-control singinpu" placeholder="Password">
							  </div>
							  
							  <div class="form-group sigfonsiz">
								<!-- <label>Password</label> -->
								<input type="password" name="prof_confpass" id="prof_confpass" class="form-control singinpu" placeholder="Confirm Password">
							  </div>
							  
							   <input type='hidden' autocomplete='off' class='form-control'  name='key_specify[]' value=''>
							  <input type='hidden' autocomplete='off' class='form-control'  name='key_qualify[]' value=''>
							  
							  <div class="form-group sigfonsiz">
								<button class="btn_2 btn agelogbt btn-block" name="prof_upd" id="prof_upd" type="submit">Register Now</button>
							  </div>
							  
							  <!--<div class="agentregfor">
                                    <span>New user?  <a href="register.html"  class="" > Register Now</a></span>
                                    <a href="forgot-pass.html" class="pull-right">Forgot Password?</a>
                                 </div>-->
							  </form>
							  
                           </div>
                           
                           
                           
                        </div>
                     </div>
        </div><!-- End row -->
		
		
		
		<hr>
		
		<div class="main_title pdt20i">
            <h2>Why become an <span> Partner </span> with us?</h2>
            <p>
                Join a community of 65,000+ professionals who have successfully grown their business with Us.
            </p>
        </div>
        
        <div class="row">
        
            <div class="col-md-4 wow zoomIn animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: zoomIn;">
                <div class="feature_home">
                    <i class="icon-chart-line"></i>
                    <h3><span>+Grow</span> your business</h3>
                    <p>
                       Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula.
                    </p>
                    
                </div>
            </div>
            
            <div class="col-md-4 wow zoomIn animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: zoomIn;">
                <div class="feature_home">
                    <i class="icon-user-7"></i>
                    <h3><span>Work on</span> your own terms</h3>
                    <p>
                       Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula.
                    </p>
                    
                </div>
            </div>
            
            <div class="col-md-4 wow zoomIn animated" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: zoomIn;">
                <div class="feature_home">
                    <i class=" icon-edit-3"></i>
                    <h3><span>Business </span> Tools</h3>
                    <p>
                       Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula.
                    </p>
                    
                </div>
            </div>
            
        </div><!--End row -->
        
        
    </div>
	
	
	<hr>	
	
<div class="container margin_60 pdt20i">

            <div class="main_title">
                <h2>What our <span>Professional </span>says</h2>
                <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
            </div>
            
            	<div class="row">
                	<div class="col-md-6">
                    		<div class="review_strip">
                                <img src="img/avatar1.jpg" alt="Image" class="img-circle">
                                <h4>Jhon Doe</h4>
                                <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
                                </p>
                                <div class="rating">
                                    <i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class=" fa fa fa-star"></i><i class=" fa fa fa-star"></i>
                                </div>
                            </div><!-- End review strip -->
                    </div>
                    
                    <div class="col-md-6">
                    		<div class="review_strip">
                                <img src="img/avatar2.jpg" alt="Image" class="img-circle">
                                <h4>Frank Rosso</h4>
                                <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
                                </p>
                                <div class="rating">
                                    <i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class=" fa fa fa-star"></i><i class=" fa fa fa-star"></i>
                                </div>
                            </div><!-- End review strip -->
                    </div>
                </div><!-- End row -->
                <div class="row">
                	<div class="col-md-6">
                    		<div class="review_strip">
                                <img src="img/avatar3.jpg" alt="Image" class="img-circle">
                                <h4>Marc twain</h4>
                                <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
                                </p>
                                <div class="rating">
                                      <i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class=" fa fa fa-star"></i><i class=" fa fa fa-star"></i>
                                </div>
                            </div><!-- End review strip -->
                    </div>
                    
                    <div class="col-md-6">
                    		<div class="review_strip">
                                <img src="img/avatar1.jpg" alt="Image" class="img-circle">
                                <h4>Peter Gabriel</h4>
                                <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
                                </p>
                                <div class="rating">
                                    <i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class=" fa fa fa-star"></i><i class=" fa fa fa-star"></i>
                                </div>
                            </div><!-- End review strip -->
                    </div>
            </div><!-- End row -->
           
        </div>

<!--*********************** Footer ****************************-->

<?php include "includes/footer.php"; ?>

<div id="toTop"></div><!-- Back to top button -->

 <!-- Common scripts -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>

  <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="js/revolution_func.js"></script>

<script>
//Search bar
$(function () {
"use strict";
$("#searchDropdownBox").change(function(){
    var Search_Str = $(this).val();
    //replace search str in span value
    $("#nav-search-in-content").text(Search_Str);
  });
});
</script>
<!--Validate JS-->
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
$().ready(function(){
	$.validator.setDefaults({
		SubmitHandler: function(){
			form.submit();
		}
	});
	
	$("#proff_upd").validate({
		rules: {
			prof_username: "required",
			prof_email : "required",
			profcate : "required",
			prof_password: {
				required: true,
				minlength: 8
			},
			prof_confpass: {
				required: true,
				minlength: 8,
				equalTo: "#prof_password"
			},
		},
		messages: {
			prof_username : "Please enter your username",
			prof_email: "Please enter valid email",
			profcate : "Please select your category",
			prof_password: {
				required: "Please enter the password",
				minlength: "The password must be contain 8 char"
			},
			prof_confpass: {
				required: "Please enter the confirm password",
				equalTo: "Please enter the same password above ",
				minlength: "Password must be contain 8 digits"
			}
		}
	});
});
</script>
<script>
function get_subcat(id){
	if(id!=""){
		$.ajax({
			type: "post",
			url : "subcatajax.php?id="+id,
			success:function(response){
				$("#prof_sub").html(response);
			}
		});
	}
}
</script>
<script>
function checkusername(user){
	if(user!=""){
		$.ajax({
			type: "post",
			url : "checkusername.php?user="+user,
			success:function(response){
				if(response==0){
					$("#err").show().html("<b>Valid.</b>").css("background","#008000").css("color","#ffffff");
					$("#prof_upd").prop("disabled",false);
				}else if(response==1){
					$("#err").show().html("<b>This user name already exists.</b>").css("background","#ffd0d0").css("color","red");
					$("#prof_upd").prop("disabled",true);
				}
			}
		});
	}else{
		$("#err").hide();
	}
}

function checkemail(mail){
	if(mail!=""){
		$.ajax({
			type : "post",
			url : "checkprofemail.php?mail="+mail,
			success: function(response){
				if(response==0){
					$("#emailerr").show().html("<b>Valid Email.!").css("background","#008000").css("color","#ffffff");
					$("#prof_upf").prof("disabled",false);
				}else if(response==1){
					$("#emailerr").show().html("<b>This Email already exists.</b>").css("background","#ffd0d0").css("color","red");
					$("#prof_upd").prop("disabled",true);
				}
			}
		});
	}else{
		$("#emailerr").hide();
	}
}
</script>

  </body>
</html>