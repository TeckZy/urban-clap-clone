<?php $hide=$db->singlerec("select * from register where user_role='1' and featured_member='1' and active_status='1' order by id desc limit 12");
if(!empty($hide)):
?>
<section class="container-fluid margin_60 test3_bg">
    <div class="container">
        <div class="main_title">
            <h2 class="main_ttl">Our <span class="clr_txt">Featured</span> Members</h2>
        </div>

       <div class="row">
<?php 
$featured=$db->get_all("select * from register where user_role='1' and featured_member='1' and active_status='1' order by id desc limit 12"); 
if(!empty($featured)){
	foreach($featured as $featuredInfo){
	$f_img=$featuredInfo['img'];
	if(empty($f_img)){
		$f_img="no-img.png";
	}
	$featurename=$com_obj->get_name($featuredInfo['id']);
?>
            <div class="col-md-3 col-sm-3 wow zoomIn" data-wow-delay="0.1s">
                <div class="tour_container">
					
                    <div class="img_container">
                        <a href="list-detail?uid=<?php echo base64_encode($featuredInfo['id']); ?>">
                        <img src="<?php echo $siteurl ?>/<?=$f_img; ?>"  class="img-responsive" width="400" style="height:390px" alt="Image">
                       
                        </a>
                    </div>
                    <div class="tour_title">
                        <h3 class="text-center"><?php echo ucfirst($featurename); ?> </h3>
                        <div class="rating">
                            <p><?php echo $com_obj->limit_text($featuredInfo['about_self'],30); ?></p>
                        </div><!-- end rating -->
                       
                    </div>
                </div><!-- End box tour -->
            </div><!-- End col-md-4 -->
<?php } } else{ ?>
	<h3 class="text-center">No Featured Members</h3>
<?php } ?>
        </div><!-- End row -->
        </div>
      
    </section>
<?php endif; ?>