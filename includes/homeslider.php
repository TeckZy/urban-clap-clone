<div class="tp-banner-container subheader_plain" style="margin-top:30px">
        <div class="tp-banner">
            <ul>
                <!-- SLIDE  -->
<?php 
$getslider=$db->get_all("select * from slider where slider_status='0'");
foreach($getslider as $slider){
?>
                 <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
                    <!-- MAIN IMAGE -->
                    <img src="img/slides_bg/dummy.png" alt="slidebg1" data-lazyload="<?php echo $siteurl ?>/admin/uploads/indexslider/original/<?php echo $slider['sliderimg']; ?>" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <!-- LAYER NR. 1 -->
                    <div style="border:1px solid #22a2b487;background-color:#22a2b487;padding:20px;" class="tp-caption white_heavy_40 customin customout text-center text-uppercase" data-x="center" data-y="center" data-hoffset="0" data-voffset="-20" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1700" data-easing="Back.easeInOut" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;"><?php echo $slider['slider_text1']; ?>
					
					<p class="slidetestpa"><?php echo $slider['slider_text2']; ?></p>
                    </div>
                </li>
<?php } ?>
                
            </ul>
            <div class="tp-bannertimer tp-bottom"></div>
        </div>
    </div>