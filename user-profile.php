<?php 
include "includes/title.php";
if(!(isset($_SESSION['id'])) && !(isset($_SESSION['email'])) && !(isset($_SESSION['fname'])))
{
header("location:login");
echo "<script>window.location='login'</script>";
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
<?php if(isset($_REQUEST['succ'])) { ?>
							<p style="color:#24a3b5;font-size: 24px;
    font-style: italic;
    margin-top: 33px;
    text-align: center;font-weight: 500;"> Your profile updated successfully..</p>
						<?php }?>
  
			<?php include "userinfo.php"; ?>

		
<!--*********************** Footer ****************************-->

<?php include "includes/footer.php"; ?>

<div id="toTop"></div><!-- Back to top button -->

 <!-- Common scripts -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>
  </body>
</html>