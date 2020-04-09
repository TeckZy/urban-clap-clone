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
<?php $cms=$db->singlerec("select * from cms"); ?>	
	<section class="container-fluid margin_31 test3_bg">
       <div class="container">
       <div class="main_title">
        <h2>About Us</h2>
      
    </div>

       <div class="row">
	      <div class="col-sm-2"></div>
		   
		
			   <div class="col-sm-8 about">
			     <?php echo $cms['aboutus']; ?>
			   
			   </div>
           <div class="col-sm-2"></div>
		 
            
        </div><!-- End row -->
		
		
		
		
		
		 <div class="row" style="margin-top: 50px;">
	      
		   
		
			   <div class="col-sm-6 aboutwhowe">
			       <div class="wathead">
			             <h2 style="color:#575757;letter-spacing:1px;">Who We Are</h2>
				    </div>		 
				
			      <?php echo $cms['whatweare']; ?>
			   
			   </div>
           <div class="col-sm-6">
		        <div class="wathead">
			       <h2 style="color:#575757;letter-spacing:1px;">What We Do</h2>
				 </div>  
		     
		       <?php echo $cms['what_wedo']; ?>
			   
		   
		   </div>
		 
            
        </div><!-- End row -->
		
		
		
		
        
      </div>
    </section><!-- End section -->
	

 
			
     
	 
      <!-- **********Image letter************ -->

	  
	<!--<section class="margin_60 test3_bg">
        <div class="container">
           
                <div class="col-md-12 main_title">
                    <h2 style="color:#575757;letter-spacing:1px;">About Us </h2>
                   
                </div>
				<div class="row magnific-gallery add_bottom_60">
				
				<div class="col-sm-12">
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

<p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>

<p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>

<p>Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.</p>

<p>Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>

<p>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam
				</div>
				
				 
				
			</div>	
            
			
			
			
			
        </div><!-- End container -->
    <!--</section><!-- End section -->
		
<!--*********************** Footer ****************************-->


	<?php include "includes/footer.php"; ?>

<div id="toTop"></div><!-- Back to top button -->

 <!-- Common scripts -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>

  </body>
</html>