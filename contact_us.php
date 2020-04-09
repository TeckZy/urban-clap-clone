<?php include "includes/title.php"; 
$user_name=isset($user_name)?$user_name:'';
$user_email=isset($user_email)?$user_email:'';
$user_number=isset($user_number)?$user_number:'';
$user_subject=isset($user_subject)?$user_subject:'';
$user_message=isset($user_message)?$user_message:'';
$adminemail=$from_email;

if(isset($user_submit)){
	$user_name = $db->escapstr($user_name);
	$user_email = $db->escapstr($user_email);
	$user_number = $db->escapstr($user_number);
	$user_subject = $db->escapstr($user_subject);
	$user_message = $db->escapstr($user_message);
	$date=date("Y-m-d H:i:s");
	$ip=$_SERVER['REMOTE_ADDR'];
	
	$set = "fname='$user_name'";
	$set .= ",email='$user_email'";
	$set .= ",contact_no='$user_number'";
	$set .= ",msg='$user_message'";
	$set .= ",subject='$user_subject'";
	$set .= ",user_ip='$ip'";
	$set .= ",crcdt='$date'";
	
	$db->insertrec("insert into user_contact_us set $set");
        header("Location: contact_us?suc");
	echo "<script>href.location='contact_us?suc'</script>";
	exit;
        
}
?>
<body>

<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

   
    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
     <?php include "includes/header.php"; ?>
    
    <section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_2.jpg" data-natural-width="1400" data-natural-height="470">
               <div class="parallax-content-1">
                  <div class="animated fadeInDown">
                     <div id="search_bar_container" style="background:transparent;">
                        <div class="container">
                           <?php include "search.php"; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

<?php $cms=$db->singlerec("select * from cms"); ?>
   <div class="container-fluid test3_bg">
  <div class="container margin_60 marbot52">
		         <div class="col-md-12 main_title">
							<h2 style="color:#575757;letter-spacing:1px;">contact us</h2>
						   
				</div>
			    <div class="row">
	                   <div class="col-sm-12">
					    <div id="map_contact" class="contact_2"></div>
					   
						</div>
	           </div>
    </div>	
 </div>  

 
 <div class="container-fluid test3_bg">
      <div class="container margin_60">
                <div class="col-md-12 main_title">
                    <h2 style="color:#575757;letter-spacing:1px;">We are excited to here from you</h2>
                   
                </div>
				
    
	<div class="row">
	     <div class="col-md-6 col-sm-6">
		    <div class="conpara">
		      <p><?php echo strip_tags($cms['contactus_text']); ?></p>
		   </div>
		 <div class="condetail">
				<div class="col-xs-1 martop10">
				 <i class="icon-location-6 "></i>
				</div>
				
				<div class="col-xs-11">
					<h4> Address</h4>
					<p>
						<?php echo strip_tags($cms['ctc_addr']); ?>
					</p>
				</div>
				
				<div class="col-xs-1 martop10">
				 <i class="icon-phone"></i>
				</div>
				<div class="col-xs-11">
					<h4> Phone</h4>
					<p>
						<?php echo strip_tags($cms['ctc_num']); ?>
					</p>
				</div>
				 <div class="col-xs-1 martop10">
				 <i class="icon-mail"></i>
				</div>
				 <div class="col-xs-11">
					<h4>Email</h4>
					<p>
						<?php echo strip_tags($cms['ctc_email']); ?>
					</p>
				</div>
			</div>
		   
		 </div>
	
	    
		<div class="col-md-6 col-sm-6">
<?php if(isset($_REQUEST['suc'])) { ?> 
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok green"></i>
		<strong class="green">
			Your Message sent successfully, Admin will contact you soon..!!!
		</strong>

	</div>
<?php } ?>
			<div class="step">
            
				 
				<form method="post">
					<div class="row">
						<div class="form-group">
							<input type="text" class="form-control contactin" name="user_name" placeholder="Your Name" required>
						</div>
						
						<div class="form-group">
							<input type="email" class="form-control contactin" name="user_email" placeholder="Email" required>
						</div>
						
						<div class="form-group">
							<input type="text" class="form-control contactin" name="user_number" placeholder="Phone Number" required>
						</div>
						
						<div class="form-group">
							<input type="text" class="form-control contactin" name="user_subject" placeholder="Subject">
						</div>
						
						<div class="form-group">
							<textarea class="form-control contactin" placeholder="Message" name="user_message" rows="4" required></textarea>
						</div>
						
						<div class="form-group">
							<button class="btn btn-block btn-success contactin" name="user_submit" type="submit">Submit</button>
						</div>
						
						
					</div>
					<!-- End row -->
				</form>
			</div>
		</div><!-- End col-md-8 -->
        
		
	</div><!-- End row -->
	
	
	
	
</div><!-- End container -->
</div>

<?php include "includes/footer.php"; ?>

<div id="toTop"></div><!-- Back to top button -->
<?php 
$latitude=$cms['lat'];
$longitude=$cms['lon'];
$latitude=!empty($latitude)?$latitude:13.0827;
$longitude=!empty($longitude)?$longitude:80.2707;
$addr=strip_tags($cms['ctc_addr']);
$string = str_replace(' ', '', $addr);
?>
 <!-- Common scripts -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>

 <!-- Specific scripts -->
<script src="assets/validate.js"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="js/map_contact.js"></script>
<!--<script src="js/infobox.js"></script>-->
<script>
$().ready(function(){
	jsmap(<?php echo $latitude; ?>,<?php echo $longitude; ?>);
});
</script>

  </body>
</html>