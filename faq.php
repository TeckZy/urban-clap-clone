<?php include"includes/title.php"; ?>
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
                           <?php include "search.php"; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

<div class="container-fluid test3_bg">
  <div  class="container margin_60 ">
          
    	<div class="row">
        	 
			  <div class="col-md-12 main_title">
                    <h2 style="color:#575757;letter-spacing:1px;">FAQ's</h2>
                   
                </div>
		
          <div class="col-lg-12 col-md-12 faqmenu" id="faq">
       	
			
           <div class="panel-group" id="accordion">
<?php 
$getFaq=$db->get_all("select * from faq where active_status='0'");
foreach($getFaq as $i=>$faq){
	$qus=$faq['question'];
	$ans=$faq['answer'];
	if($i==0) $in="in"; else $in="";
?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $i; ?>"><?php echo $qus; ?><i class="indicator icon-up-open pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseOne<?php echo $i; ?>" class="panel-collapse collapse <?php echo $in; ?>">
                      <div class="panel-body">
                        <p><?php echo $ans; ?></p>
                      </div>
                    </div>
                  </div>
<?php } ?>
                  </div>
                </div>
    			
        </div><!-- End col lg-9 -->
		
		 <!-- <div class="col-lg-2 col-md-2" > -->
		 <!-- </div> -->
		
    </div><!-- End row -->
</div><!-- End container -->
</div>  

<?php include "includes/footer.php"; ?>

<div id="toTop"></div><!-- Back to top button -->

<!-- Common scripts -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>

<!-- Specific scripts -->
<!-- Cat nav mobile -->
<script  src="js/cat_nav_mobile.js"></script>
<script>$('#cat_nav').mobileMenu();</script>

  </body>
</html>