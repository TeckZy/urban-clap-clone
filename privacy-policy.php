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

  

	
	<section class="container-fluid margin_31 test3_bg">
       <div class="container">
      
<?php $cms=$db->singlerec("select * from cms"); ?>
		 <div class="row" style="margin-top: 50px;">
		
			   <div class="col-sm-12 aboutwhowe">
			       <div class="wathead">
			             <h2 style="color:#575757;letter-spacing:1px;">Privacy Policy</h2>
				    </div>		 
				<?php echo $cms['privacy']; ?>
			   
			   </div>
           
            
        </div><!-- End row -->
		
		
		
		
        
      </div>
    </section><!-- End section -->
	

 
			
     
	 
	
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modbgcol">
      <div class="modal-header modhed">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cancel-circled2" aria-hidden="true" style="font-size: 27px;"></span></button>
        <h4 class="modal-title headsig" id="myModalLabel">Sign In</h4>
      </div>
      <div class="modal-body">
	     <div class="row">
		             <div class="col-md-1 col-sm-1">
					  </div> 
					<div class="col-md-10 col-sm-10">
						<div class="form-group sigfonsiz">
							<label> Role </label>
							 <ul class="maidtype">
								 <li><input type="radio" name="New Maid"> Maid Advisor</li>
								 <li><input type="radio" name="New Maid"> Maid User</li>
								 <li><input type="radio" name="New Maid"> Guest</li>
							 </ul>
							
						</div>
					</div>
					  <div class="col-md-1 col-sm-1">
					  </div>
				</div>
        <div class="row">
	   
					 <div class="col-md-1 col-sm-1">
					  </div>
					<div class="col-md-10 col-sm-10">
						<div class="form-group sigfonsiz">
							<label>Email Address</label>
							<input type="email" class="form-control singinpu" id="firstname_booking" name="firstname_booking">
						</div>
					</div>
					 <div class="col-md-1 col-sm-1">
	                </div>
				</div>
			<div class="row">
			         <div class="col-md-1 col-sm-1">
	                 </div>
					<div class="col-md-10 col-sm-10">
						<div class="form-group sigfonsiz">
							<label>Password</label>
							<input type="password" class="form-control singinpu" id="firstname_booking" name="firstname_booking">
						</div>
					</div>
					 <div class="col-md-1 col-sm-1">
	                </div>
				</div>
				
				<div class="row">
				
				  <div class="col-md-12 col-sm-12 remb">
				     <div class="form-group">
				     <input type="checkbox">  Rember me
					 </div>
				  </div>
				</div>
				
				
				<div class="row">
			         <div class="col-md-1 col-sm-1">
	                 </div>
					<div class="col-md-10 col-sm-10">
						
							
							<a href="#" class="btn_3 form-control">Sign in</a>
							
						
					</div>
					 <div class="col-md-1 col-sm-1">
	                </div>
				</div>
      </div>
      <div class="modal-footer modfot">
	  
	  <div class="row">
	     <div class="col-md-1 col-sm-1">
	      </div>
			  <div class="col-md-10 col-sm-10 regfor">
					<a href="register.html"  class=" pull-left" >Register</a>
					<a href="#" class="">Forgot Password</a>
			  </div>		
		 <div class="col-md-1 col-sm-1">
	      </div>
      </div>
    </div>
  </div>
</div>
</div>
		
	<!-- ************************* Login Model ******************-->	
		
		
	<!-- ************************* Register Model ******************-->
	
	
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modbgcol">
      <div class="modal-header modhed">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="icon-cancel-circled2" aria-hidden="true" style="font-size: 27px;"></span></button>
        <h4 class="modal-title headsig" id="myModalLabel">Register</h4>
      </div>
      <div class="modal-body">
	     <div class="row">
	   
					 <div class="col-md-1 col-sm-1">
					  </div>
					<div class="col-md-10 col-sm-10">
						<div class="form-group sigfonsiz">
							<label>Name</label>
							<input type="text" class="form-control singinpu" id="firstname_booking" name="firstname_booking">
						</div>
					</div>
					 <div class="col-md-1 col-sm-1">
	                </div>
			</div>
	    
         <div class="row">
	   
					 <div class="col-md-1 col-sm-1">
					  </div>
					<div class="col-md-10 col-sm-10">
						<div class="form-group sigfonsiz">
							<label>Email Address</label>
							<input type="email" class="form-control singinpu" id="firstname_booking" name="firstname_booking">
						</div>
					</div>
					 <div class="col-md-1 col-sm-1">
	                </div>
			</div>
			<div class="row">
			         <div class="col-md-1 col-sm-1">
	                 </div>
					<div class="col-md-10 col-sm-10">
						<div class="form-group sigfonsiz">
							<label>Password</label>
							<input type="password" class="form-control singinpu" id="firstname_booking" name="firstname_booking">
						</div>
					</div>
					 <div class="col-md-1 col-sm-1">
	                </div>
				</div>
				
				
				
				
				<div class="row">
			         <div class="col-md-1 col-sm-1">
	                 </div>
					<div class="col-md-10 col-sm-10">
						
							
							<a href="#" class="btn_3 form-control">Submit</a>
							
						
					</div>
					 <div class="col-md-1 col-sm-1">
	                </div>
				</div>
      </div>
      <div class="modal-footer modfot">
	  
	  <div class="row">
	     <div class="col-md-1 col-sm-1">
	      </div>
			  <div class="col-md-10 col-sm-10 regfor">
					<a href="#"  class=" pull-left" >Login</a>
					
			  </div>		
		 <div class="col-md-1 col-sm-1">
	      </div>
      </div>
    </div>
  </div>
</div>
</div>
		
	<!-- ************************* Register Model ******************-->	
			



	
		

	
		
		
<!--*********************** Footer ****************************-->

<?php include "includes/footer.php"; ?>

<div id="toTop"></div><!-- Back to top button -->

 <!-- Common scripts -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>

  </body>
</html>
