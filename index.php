<?php include "includes/title.php"; ?>
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

	
	<!-- Slider -->
    <?php include "includes/homeslider.php"; ?>
    <!-- End Slider -->
	<?php include "includes/homesearch.php"; ?>

	<?php include "includes/homecategory.php"; ?>
	
	<?php include "includes/featuredmember.php"; ?>
	
	<?php include "includes/howitworks.php"; ?>

  <!--Testimonials starting-->
	
	<?php include "includes/homelocation.php"; ?>
	
	<?php include "includes/testimonials.php"; ?>
	
	<div class="clearfix"></div>	
	
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




  </body>
</html>