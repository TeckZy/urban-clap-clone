<?php 
include "includes/title.php";
if(!(isset($_SESSION['id'])) && !(isset($_SESSION['email'])) && !(isset($_SESSION['fname'])))
{
header("location:login");

echo "<script>window.location='login'</script>";

}
$_id=isset($_SESSION['id'])?$_SESSION['id']:'';
$catid=isset($catid)?$catid:'';
$catid=base64_decode($catid);
if(isset($res_accept)){
	
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
                           <div class="search_bar">
                              <div class="col-sm-3 padd0i">
                                 <select title="Search in" class="searchSelect form-control bucol " id="" name="tours_category">
                                    <option value="All Tours"  title="All Tours">Select City</option>
                                    <option value="Museums" title="Museums">USA</option>
                                    <option value="Tickets" title="Tickets">Singapore</option>
                                    <option value="Hotels" title="Hotels">Malysia</option>
                                    <option value="Restaurants" title="Restaurants">India</option>
                                 </select>
                              </div>
                              <div class="col-sm-3 padd0i">
                                 <select title="Search in" class="searchSelect form-control bucol " id="" name="tours_category">
                                    <option value="All Tours"  title="All Tours">Select Area</option>
                                    <option value="Museums" title="Museums">Textas</option>
                                    <option value="Tickets" title="Tickets">Kula Lambur</option>
                                    <option value="Hotels" title="Hotels">Las wekas</option>
                                    <option value="Restaurants" title="Restaurants">Maxture</option>
                                 </select>
                              </div>
                              <div class="col-sm-4 padd0i">
                                 <select title="Search in" class="searchSelect form-control bucol " id="" name="tours_category">
                                    <option value="All Tours"  title="All Tours">Select Type of Service</option>
                                    <option value="Museums" title="Museums">House Keeping</option>
                                    <option value="Tickets" title="Tickets">Cleaning</option>
                                    <option value="Hotels" title="Hotels">Gardining</option>
                                    <option value="Restaurants" title="Restaurants">Washing</option>
                                 </select>
                              </div>
                              <div class="col-sm-2 padd0i"> 
                                 <button class="form-control  bucol sercbt " type="text" autocomplete="off"><i class="icon-search"></i> Search</button>
                              </div>
                              <!-- <div class="nav-searchfield-outer"> -->
                              <!-- <input type="text" autocomplete="off" name="field-keywords" placeholder="Type your search terms ...." id="twotabsearchtextbox"> -->
                              <!-- </div> -->
                              <!-- <div class="nav-submit-button"> -->
                              <!-- <input type="submit" title="Cerca" class="nav-submit-input" value="Search"> -->
                              <!-- </div> -->
                           </div>
                           <!-- End search bar-->
                        </div>
                     </div>
                  </div>
               </div>
            </section>

  

	
	<section class="container-fluid margin_31 test3_bg">
       <div class="container mt30 mb30">
		  <div class="row">
			<?php include "leftmenu.php"; ?>
			
			<div class="col-lg-9 col-md-9">
                     <div class="col-sm-12 profile_box">
					  
		
		<div class="row mb10">
		   <div class="col-sm-12">
		       <h3 class="clr_txt">Respose Details</h3>
		   </div>
		   <div class="clearfix"></div>
		   <div class="row">
		   <div id="suc"></div>
		   <div id="can"></div>
				<div class="col-sm-5">
					  <!-- Nav tabs -->
  <ul class="nav nav-tabs horz_tab resonse_list" role="tablist">
    <?php	
		$sql = "";
		if(!empty($catid)){
			$sql .="and cat_id='$catid'";
		}
		$Getval=$db->Extract_Single("select status from response where id='$_SESSION[id]' and status='3' $sql");
		
		if($Getval!=4){
		$proInfo=$db->get_all("select * from response where senter_id='$_SESSION[id]'  $sql");
		static $firstid;
		if(!empty($proInfo)){
			foreach($proInfo as $info){
				GLOBAL $firstid;
				$respid=$info['responser_autoid'];
				$resInfo=$db->singlerec("select * from register where id='$info[responser_id]'");
				$firstid=$info['responser_id'];
				$name=$resInfo['fname']." ".$resInfo['lname'];
				$fee=$resInfo['estimate_fee'];
				$fee_duration=$resInfo['fee_duration'];
				$message=$info['message'];
				$amt="";
				if(!empty($fee)){
					$amt.=$site_currency." ".$fee;
				}
				if(!empty($fee) && !empty($fee_duration)){
					$amt.=" / ".$fee_duration;
				}else{
					$amt.="No Budget Found";
				}
				$resid=base64_encode($info['responser_id']);
	?>
	
    <li role="presentation" >
		<div class="row">
			<div class="col-sm-12">
				<a href="list-detail.php?uid=<?php echo base64_encode($info['responser_id']); ?>"><h4><?php echo ucfirst($name); ?></h4></a>
				<h5>Estimated budget<h5>
				<p class="clr_txt"><?php echo $amt; ?></p>
				<p><?php echo $com_obj->limit_text($message,40); ?></p>
				<a href="#respon-<?php echo $info['responser_id']; ?>" onclick="return check(<?php echo $info['responser_id']; ?>,<?php echo $respid; ?>);" class="btn_1 outline mt15i" aria-controls="respon-<?php echo $info['responser_id']; ?>" role="tab" data-toggle="tab">View Details</a>
			</div>
		</div>
	</li>
		<?php } } else{ ?>
		<h3 class="text-center">No Response Found</h3>
		<?php } } else { ?>
		<h3 class="text-center">Response Sent</h3>
		<?php } ?>
	
  </ul>
					
				</div>
<?php
$resid=isset($resid)?$resid:'';
$resid=base64_decode($resid);
?>
				<div id="resprofile"></div>
  
  </div>
<?php 
if(!empty($firstid)){ 
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
	// $(document).ready(function(){
		// var tempid="<?php echo $firstid; ?>";
			// check(tempid);
	// });						
</script>
<?php } ?>
<script>
function check(id,respid){
	if(id!=""){
		$.ajax({
			type : "post",
		url : "responseprofile.php?id="+id+"&respid="+respid,
		success:function(response){
			$("#resprofile").html(response);
		}
	});
	}
}
</script>
		   </div>
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