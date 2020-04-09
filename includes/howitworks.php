<section class="container-fluid margin_30 test3_bg how_its_work">
       <div class="container">
        <div class="main_title">
            <h2 class="main_ttl">How it works</h2>
           
        </div>

       <div class="row">
<?php 
$getworks=$db->get_all("select * from howworks where slider_status='0'");
foreach($getworks as $works){
?>
            <div class="col-md-4 col-sm-4 wow zoomIn" data-wow-delay="0.1s">
                <div style="text-align: center;">
                    <div class="">
                        <img src="<?php echo $siteurl; ?>/admin/uploads/indexworks/original/<?php echo $works['sliderimg']; ?>" style=" " class="" alt="Image">
                    </div>
                    <div class="tour_title">
                        <h3 class="howwork"><?php echo $works['slider_text1']; ?></h3>
                        <div class="rating">
                            <p style="line-height: 22px;"><?php echo $works['slider_text2']; ?>  </p>
                        </div><!-- end rating -->
                       
                    </div>
                </div><!-- End box tour -->
            </div><!-- End col-md-4 -->
<?php } ?>
            
           <!-- End col-md-4 -->
            
            
        </div><!-- End row -->
        
      </div>
    </section><!-- End section -->