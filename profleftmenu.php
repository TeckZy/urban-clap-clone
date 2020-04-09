<?php
$livepage = $_SERVER["PHP_SELF"];
$livepage = substr(strrchr($livepage, '/'), 1);
$livepage= str_replace('.php',"",$livepage);
 ?>

<aside class="col-lg-3 col-md-3">
  <div class="box_style_cat">
	<ul id="cat_nav" class="profile_menu">
	   <li class="head">My Account</li>
	   <li><a href="prof-dashboard" <?php if($livepage=="prof-dashboard"){ echo "class='active'";}?> ><i class="icon_set_1_icon-94"></i> Dashboard</a></li>
	   
	   <li><a href="prof-profile" <?php if($livepage=="prof-profile"){ echo "class='active'";}?>><i class="icon_set_1_icon-29"></i> My Profile</a></li>
	   
	   <li><a href="prof-profile-edit" <?php if($livepage=="prof-profile-edit"){ echo "class='active'";}?>><i class="icon_set_1_icon-17"></i> Edit Profile</a></li>
	   
	   <li><a href="prof-order" <?php if($livepage=="prof-order"){ echo "class='active'";}?>><i class=" icon-calendar-empty"></i> All Order</a></li>
	   
	   <li><a href="prof-request" <?php if($livepage=="prof-request"){ echo "class='active'";}?>><i class=" icon_set_1_icon-53"></i> All Request</a></li>
	   
	   <li><a href="prof-pending" <?php if($livepage=="prof-pending"){ echo "class='active'";}?>><i class="icon_set_1_icon-52"></i> Pending</a></li>
	   
	   <li><a href="prof-progress" <?php if($livepage=="prof-progress"){ echo "class='active'";}?>><i class="icon_set_1_icon-95"></i> Inprogress</a></li>
	   
	   <li><a href="prof-completed" <?php if($livepage=="prof-completed"){ echo "class='active'";}?>><i class="icon_set_1_icon-76"></i> Completed</a></li>
	   
	   <li><a href="prof-photo" <?php if($livepage=="prof-photo"){ echo "class='active'";}?>><i class="icon_set_1_icon-34"></i> Change Profile Picture</a></li>
	   
	   <li><a href="prof-pass" <?php if($livepage=="prof-pass"){ echo "class='active'";}?>><i class="icon_set_1_icon-46"></i> Change Password</a></li>
	   
	   <li><a href="prof-review" <?php if($livepage=="prof-review"){ echo "class='active'";}?>><i class="icon_set_1_icon-85"></i> All Reviews</a></li>
	   
	   <li><a href="proflogout" <?php if($livepage=="proflogout"){ echo "class='active'";}?>><i class="icon-logout"></i> Logout</a></li>
	</ul>
  </div>
</aside>