<?php
$basename="";
if($basename=="user-dashboard.php"){
	$active="class='active'";
}elseif($basename=="user-profile.php"){
	$active="class='active'";
}elseif($basename=="user-profile-edit.php"){
	$active="class='active'";
}elseif($basename=="user-order.php"){
	$active="class='active'";
}elseif($basename=="user-request.php"){
	$active="class='active'";
}elseif($basename=="user-completed.php"){
	$active="class='active'";
}elseif($basename=="user-photo.php"){
	$active="class='active'";
}elseif($basename=="user-pass.php"){
	$active="class='active'";
}elseif($basename=="user-favourite.php"){
	$active="class='active'";
}elseif($basename=="user-review.php"){
	$active="class='active'";
}elseif($basename=="userlogout.php"){
	$active="class='active'";
}else{
	$active="class=''";
}
$USER_ROLE=isset($USER_ROLE)?$USER_ROLE:'';
if(isset($_SESSION['id'])){
$USER_ROLE=$db->Extract_Single("select user_role from register where id='$_SESSION[id]'");
}else if(isset($_SESSION['pid'])){
$USER_ROLE=$db->Extract_Single("select user_role from register where id='$_SESSION[pid]'");	
}

?>

<style>#chk_frame{display:none !important;}.iifr{display:none !important;}</style>
<header id="plain">
         <div class="container">
            <div class="row">
               <div class="col-md-2 col-sm-9 col-xs-9">
                  <div id="logo_home">
                     <a href="index" title="Professional Services"><img src="img/logo.png" class="img-responsive" style="max-width:180px;"></a>
                  </div>
               </div>
               <nav class="col-md-10 col-sm-3 col-xs-3">
                  <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                  <div class="main-menu">
                     <div id="header_menu">
                        <img src="img/logo.png" width="160" height="34" alt="Paid Services" data-retina="true">
                     </div>
                     <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                     <ul>
                        <li class="submenu">
                           <a href="index" class="show-submenu">Home </a>
                        </li>
                        <li class="submenu">
                           <a href="about" class="show-submenu">About Us </a>
                        </li>
                        <?php if($USER_ROLE==0) {?>
                        <li class="submenu">
                           <a href="list" class="show-submenu">Search </a>
                        </li>
                        <?php } ?>
                        <li class="submenu">
                           <a href="faq" class="show-submenu">FAQ </a>
                        </li>
                        <li class="submenu">
                           <a href="contact_us" class="show-submenu">Contact </a>
                        </li>
                        
                        <?php
				  if((isset($_SESSION['id'])) && (isset($_SESSION['email'])) && (isset($_SESSION['fname']))){ ?>
				  
                <li class="submenu hidden-lg hidden-md"><a href="user-dashboard" class="show-submenu"><i class=" icon_set_1_icon-94"></i> Dashboard</a></li>
			   <li class="submenu hidden-lg hidden-md"><a href="user-profile" class="show-submenu"><i class=" icon_set_1_icon-29"></i> My Profile</a></li>
			   <li class="submenu hidden-lg hidden-md"><a href="user-favourite" class="show-submenu"><i class=" icon-heart-empty"></i> My Favourite</a></li>
			   <li class="submenu hidden-lg hidden-md"><a href="user-review" class="show-submenu"><i class="icon_set_1_icon-85"></i> My Reviews</a></li>
			   <li class="submenu hidden-lg hidden-md"><a href="user-order" class="show-submenu"><i class=" icon_set_1_icon-53"></i> My Order</a></li>
			   <li class="submenu hidden-lg hidden-md"><a href="userlogout" class="show-submenu"><i class="icon-logout"></i> Logout</a></li>
                        
                        <?php } else  if((isset($_SESSION['pid'])) && (isset($_SESSION['pemail'])) && (isset($_SESSION['pfname']))){ ?>
                   
                   <li class="submenu hidden-lg hidden-md"><a href="prof-dashboard" class="show-submenu"><i class=" icon_set_1_icon-94"></i> Dashboard</a></li>
				   <li class="submenu hidden-lg hidden-md"><a href="prof-profile" class="show-submenu"><i class=" icon_set_1_icon-29"></i> My Profile</a></li>
				   <li class="submenu hidden-lg hidden-md"><a href="prof-review" class="show-submenu"><i class="icon_set_1_icon-85"></i> All Reviews</a></li>
				   <li class="submenu hidden-lg hidden-md"><a href="prof-order" class="show-submenu"><i class=" icon_set_1_icon-53"></i> All Order</a></li>
				   <li class="submenu hidden-lg hidden-md"><a href="proflogout" class="show-submenu"><i class="icon-logout"></i> Logout</a></li>
                        
                        <?php } else { ?>
                        
                        <li class="submenu hidden-lg hidden-md">
                           <a href="login" class="show-submenu">Login </a>
                        </li>
                        <li class="submenu hidden-lg hidden-md">
                           <a href="register" class="show-submenu">Register </a>
                        </li>
                        <li class="submenu hidden-lg hidden-md">
                           <a href="become-a-professional" class="show-submenu">Become A Professional </a>
                        </li>
                        
                        
                        <?php } ?>
                        
                        
                     </ul>
                  </div>
                  <!-- End main-menu -->
				  <?php
				  if((isset($_SESSION['id'])) && (isset($_SESSION['email'])) && (isset($_SESSION['fname']))){ ?>
				  <ul id="top_tools" class="hidden-sm hidden-xs">
				  <li>
						  <a href='userlogout' class="buton_out out "><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
						   
						  <div class="dropdown dropdown-cart">
							<a href="#" class="dropdown-toggle buton_out out" data-toggle="dropdown"><?php echo ucfirst($_SESSION['fname']); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
							<ul class="dropdown-menu prfl_drp" id="cart_items" style="margin-top:0;">
			   <li><a href="user-dashboard" ><i class=" icon_set_1_icon-94"></i> Dashboard</a></li>
			   <li><a href="user-profile" class="active"><i class=" icon_set_1_icon-29"></i> My Profile</a></li>
			   <li><a href="user-favourite" class=""><i class=" icon-heart-empty"></i> My Favourite</a></li>
			   <li><a href="user-review" class=""><i class="icon_set_1_icon-85"></i> My Reviews</a></li>
			   <li><a href="user-order" class=""><i class=" icon_set_1_icon-53"></i> My Order</a></li>
			   <li><a href="userlogout" class=""><i class="icon-logout"></i> Logout</a></li>
							</ul>  
						</div>
					   </li>  
                  </ul>
				  <?php } else  if((isset($_SESSION['pid'])) && (isset($_SESSION['pemail'])) && (isset($_SESSION['pfname']))){ ?>
					<ul id="top_tools" class="hidden-sm hidden-xs">
                     <!-- <li> -->
                     <!-- <div class="dropdown dropdown-cart"> -->
                     <!-- <a href='agent-login.php' class="agen_butt out">Agent</a> -->
                     <!-- </div> -->
                     <!-- </li> --> 
                      <li>
                              <a href='userlogout.php' class="buton_out out "><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                               
                              <div class="dropdown dropdown-cart">
                                <a href="#" class="dropdown-toggle buton_out out" data-toggle="dropdown"><?php echo ucfirst($_SESSION['pfname']); ?>  <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu prfl_drp" id="cart_items" style="margin-top:0;">
				   <li><a href="prof-dashboard" class=""><i class=" icon_set_1_icon-94"></i> Dashboard</a></li>
				   <li><a href="prof-profile" class="active"><i class=" icon_set_1_icon-29"></i> My Profile</a></li>
				   <li><a href="prof-review" class=""><i class="icon_set_1_icon-85"></i> All Reviews</a></li>
				   <li><a href="prof-order" class=""><i class=" icon_set_1_icon-53"></i> All Order</a></li>
				   <li><a href="proflogout" class=""><i class="icon-logout"></i> Logout</a></li> 
                                </ul>
                            </div> 
                           </li> 
                  </ul>
				  <?php } else { ?>
                  <ul id="top_tools" class="hidden-sm hidden-xs">
                      <li>
						  <a href='login' class="buton_out out "><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
						  <a href='register' class="buton_out out "><i class="fa fa-pencil" aria-hidden="true"></i> Register</a>
						  <a href='become-a-professional' class="buton_out out "><i class="fa fa-user-circle" aria-hidden="true"></i> Become A Professional</a>
					   </li>
                  </ul>
				  <?php } ?>
               </nav>
            </div>
         </div>
         <!-- container -->
      </header><!-- End Header -->