<?php 
include "includes/title.php";
if(!(isset($_SESSION['id'])) || !(isset($_SESSION['email'])) || !(isset($_SESSION['fname'])))
{
header("location:login");
echo "<script>window.location='login'</script>";
}

if(isset($_POST['_upd'])){
	$curpsw=$db->escapstr($u_cur_psw);
	$newpsw=$db->escapstr($u_new_psw);
	$conpsw=$db->escapstr($u_con_psw);
	if($newpsw==$conpsw){
		$db->insertrec("update register set password='$newpsw' where id='$_SESSION[id]'");
		header("location:user-pass?succ");
		echo"location.href='user-pass?succ'";
		exit;
	}else{
		header("location:user-pass?err");
		echo"location.href='user-pass?err'";
		exit;
	}
}

?>
<body>

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
     <?php include "includes/header.php"; ?>
    <section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_2.jpg" data-natural-width="1400" data-natural-height="470">
               <div class="parallax-content-1">
                  <div class="animated fadeInDown">
                     <div id="search_bar_container" style="background:transparent;">
                        <div class="container">
                           <?php include"search.php"; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

	<section class="container-fluid margin_31 test3_bg">
       <div class="container mt30 mb30">
		  <div class="row">
			<?php include"leftmenu.php"; ?>
			
			<div class="col-lg-9 col-md-9">
                     <div class="col-sm-12 profile_box">
					  
				<!--<?php if(isset($_REQUEST['err'])) { ?>
					<p style="color:#FF0000;margin-left:300px;"> Invalid Username/Password.</p>
				<?php }?>-->
				<!--<?php if(isset($_REQUEST['succ'])) { ?>
					<p style="color:green;margin-left:300px;"> Your Password Changed Successfully.</p>
				<?php }?>-->
<?php if(isset($_REQUEST['succ'])) { ?> 
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok green"></i>
		<strong class="green">
			Your Password Changed Successfully !!!
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
			Your Password Changed unuccessfully !!!
		</strong>

	</div>
<?php } ?>
		<div class="row mb10">
		   <div class="col-sm-12">
		       <h3 class="clr_txt">Change Password</h3> 
		   </div>
		   <div class="clearfix"></div>
		   <div class="col-sm-12">
		       
                    <form class="" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" name="pass_upd" id="pass_upd">
					    <div class="form-group mt15">
						    <label class="col-sm-4">Current Password</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <input type="password" name="u_cur_psw" id="u_cur_psw" onchange="return checkpass(this.value);" class="form-control">
								<div id="errr"></div>
							</div>
						</div>
						
						<div class="clearfix"></div>
						<div class="form-group mt15">
						    <label class="col-sm-4">New Password</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
								<input type="password" name="u_new_psw" id="u_new_psw" class="form-control">
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group mt15">
						    <label class="col-sm-4">Confirm Password</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
								<input type="password" name="u_con_psw" id="u_con_psw" class="form-control">
							</div>
						</div>
						<div class="clearfix"></div>
						
						
						<div class="clearfix"></div>
						<div class="form-group mt15 text-center">
						   <button class="btn btn-success" id="_upd" name="_upd">Save</button>
						</div>
						
						
					</form>
                 
		   </div>
		</div>
		
		
					 </div>
                  </div>
		  </div>
      </div>
    </section> 
	

 
		
<!--*********************** Footer ****************************-->

<?php include "includes/footer.php"; ?>

<div id="toTop"></div><!-- Back to top button -->

 <!-- Common scripts -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<!--Validate JS-->
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script type="text/javascript">
$.validator.setDefaults({
		SubmitHandler: function(){
			form.submit();
		}
	});
	
	$().ready(function(){
		$("#pass_upd").validate({
			rules: {
				u_cur_psw: "required",
				u_new_psw: {
					required: true,
					minlength: 8
				},
				u_con_psw:{
					required:true,
					minlength:8,
					equalTo:"#u_new_psw",
				},
			},
			messages: {
				u_cur_psw: "Please enter your current password",
				u_new_psw:{
					required: "Please enter your new password",
					minlength: "The password must be contain 8 char"
				},
				u_con_psw:{
					required: "Please enter your confirm password",
					equalTo: "Please enter confirm password same as above password",
					minlength: "Confirm password must be contain 8 digits"
				}
			}
		});
	});
</script>	
<script>
function checkpass(pass){
	var lmail="<?php echo $_SESSION['email']; ?>";
	if(pass!="" && lmail!=""){
		$.ajax({
			type : "post",
			url : "checkpass.php?lmail="+lmail+"&pass="+pass,
			success:function(response){
				if(response==2){
					$("#errr").show().html("<b>Valid!</b>").css("background","#008000").css("color","white");
					$("#_upd").prop('disabled',false);
				}else if(response==3){
					$("#err").hide();
					$("#errr").show().html("<b>Invalid Credential!</b>").css("background","#ffd0d0").css("color","red");
					$("#_upd").prop('disabled',true);
				}
			}
		});
	}
}
</script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
  </body>
</html>