<?php
$livepage = $_SERVER["PHP_SELF"];
$livepage = substr(strrchr($livepage, '/'), 1);
$livepage= str_replace('.php',"",$livepage);
 ?>
<aside class="col-lg-3 col-md-3">
  <div class="box_style_cat">
	<ul id="cat_nav" class="profile_menu">
	   <li class="head">My Account</li>
	   <li><a href="user-dashboard" <?php if($livepage=="user-dashboard"){ echo "class='active'";}?> ><i class=" icon_set_1_icon-94"></i> Dashboard</a></li>
	   
	   <li><a href="user-profile" <?php if($livepage=="user-profile"){ echo "class='active'";}?>><i class=" icon_set_1_icon-29"></i> My Profile</a></li>
	   
	   <li><a href="user-profile-edit" <?php if($livepage=="user-profile-edit"){ echo "class='active'";}?>><i class=" icon_set_1_icon-17"></i> Edit Profile</a></li>
	   
	   <li><a href="user-order" <?php if($livepage=="user-order"){ echo "class='active'";}?>><i class="  icon-calendar-empty"></i> My Order</a></li>
	   
	   <li><a href="user-request" <?php if($livepage=="user-request"){ echo "class='active'";}?>><i class=" icon_set_1_icon-53"></i> My Request</a></li>
	   
	   <li><a href="user-completed" <?php if($livepage=="user-completed"){ echo "class='active'";}?>><i class="  icon_set_1_icon-76"></i> Completed</a></li>
	   
	   <li><a href="user-photo" <?php if($livepage=="user-photo"){ echo "class='active'";}?>><i class=" icon_set_1_icon-34"></i> Change Profile Picture</a></li>
	   
	   <li><a href="user-pass" <?php if($livepage=="user-pass"){ echo "class='active'";}?>><i class=" icon_set_1_icon-46"></i> Change Password</a></li>
	   
	   <li><a href="user-favourite" <?php if($livepage=="user-favourite"){ echo "class='active'";}?>><i class=" icon-heart-empty"></i> My Favourite</a></li>
	   
	   <li><a href="user-review" <?php if($livepage=="user-review"){ echo "class='active'";}?>><i class="icon_set_1_icon-85"></i> My Reviews</a></li>
	   
	   <li><a href="userlogout" <?php if($livepage=="userlogout"){ echo "class='active'";}?>><i class=" icon-logout"></i> Logout</a></li>
	</ul>
  </div>
</aside>