<div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
		
		<div id="testimonial4" class="carousel slide margin_60" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
		<div class="main_title">
			<h2 class="mainttl">What our <span class="clr_txt">Customers</span> are saying</h2>
		</div>

		<ol class="carousel-indicators">
			<li data-target="#testimonial4" data-slide-to="0" class="active"></li>
			<li data-target="#testimonial4" data-slide-to="1"></li>
			<li data-target="#testimonial4" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
<?php 
$testimonial=$db->get_all("select * from testimonials where slider_status='0' order by RAND() limit 3");
foreach($testimonial as $i=>$testItem){
	if($i==0){
		$class="active";
	}else{
		$class="";
	}
?>
			<div class="item <?php echo $class; ?>">
				<div class="testimonial4_slide">
					<img src="<?php echo $siteurl; ?>/admin/uploads/testimonials/original/<?php echo $testItem['sliderimg']; ?>" class="img-circle img-responsive" style="width:100px;"/>
					<p><?php echo $testItem['slider_text2']; ?></p>
					<h4><?php echo $testItem['slider_text1']; ?></h4>
				</div>
			</div>
<?php } ?>
		</div>
		<a class="left carousel-control" href="#testimonial4" role="button" data-slide="prev">
			<span class="fa fa-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#testimonial4" role="button" data-slide="next">
			<span class="fa fa-chevron-right"></span>
		</a>
	</div>
</div>