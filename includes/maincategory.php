<?php
$cat=$db->get_all("select * from category where parent_id='0' and active_status='1'");
?>
<section class="container-fluid margin_60 test3_bg">
	 <div class="container">
		<div class="main_title_2">
		   <h2 class="main_ttl">How Can <span class="clr_txt">We Help You</span> Today?</h2>
		</div>
		<div class="row home_2">
		<?php foreach($cat as $catInfo): ?>
		   <div class="col-md-2 col-sm-4 col-xs-6 wow zoomIn" data-wow-delay="0.1s">
			  <div class="col-sm-12 cat_box">
				 <a href="list?list=<?php echo $catInfo['category_name']; ?>&catid=<?php echo base64_encode($catInfo['id']); ?>">
					<div class="icon_box">
					   <img src="<?php echo $siteurl; ?>/admin/uploads/category/<?php echo $catInfo['img']; ?>"  class="img-responsive" alt="Image">
					</div>
					<div class="icon_title text-center">
					   <h3 class="icnttl"><?php echo $catInfo['category_name']; ?> </h3>
					</div>
				 </a>
			  </div>
		   </div>
		<?php endforeach; ?>
		   <!-- End col-md-4 -->
		</div>
		<!-- End row -->
	 </div>
 </section>