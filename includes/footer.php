<?php 
$site=$siteinfo;
$site_logo=$site['sitelogo'];
?>
<?php $cms=$db->singlerec("select * from cms"); ?>
<footer>
        <div class="container-fluid footer_bg pdt5i pdb20i">
		<div class="container">
            <div class="row">
                <div class="col-sm-3">
				<div style="margin-top: 20px;">
                    	<a href="index" title="City tours travel template"><img src="<?php echo $site['siteurl']; ?>/img/<?php echo $site_logo; ?>" class="img-responsive" style="max-width:180px;"></a>
						<p><?php echo $com_obj->limit_text($cms['home_footer1'],200); ?></p>
                    </div>
                   
                </div>
				
<?php


$cat=$db->get_all("SELECT distinct category.id,category.category_name, COUNT(register.cat_id)  FROM register INNER JOIN category ON register.cat_id = category.id and category.active_status='1' and category.parent_id='0' and register.user_role='1' and register.active_status='1' GROUP BY category.category_name ORDER BY 
 COUNT(register.cat_id) desc LIMIT 7");
?>
                <div class=" col-sm-3">
                    <h3>Top Category</h3>
                    <ul>
			<?php foreach($cat as $catInfo): ?>
                        <li><a href="list?list=<?php echo $catInfo['category_name']; ?>&catid=<?php echo base64_encode($catInfo['id']); ?>"><?php echo $catInfo['category_name']; ?></a></li>
			<?php endforeach; ?>
                    </ul>
                </div>
                <div class=" col-sm-3">
                    <h3>Top Locations</h3>
                    <ul>
<?php
/* SELECT distinct state.state_id,state.state_name, COUNT(register.state)  FROM register INNER JOIN state ON register.state = state.state_id and state.state_status='0'  and register.user_role='1' and register.active_status='1' GROUP BY state.state_name ORDER BY 
 COUNT(register.state) desc LIMIT 7 */

$homelocation=$db->get_all("select distinct state from register where state!='' and user_role=1 and active_status=1 limit 7");
if(!empty($homelocation)){
	foreach($homelocation as $locInfo){
		$state=getState($locInfo['state']);
		$count=$com_obj->getReghomeCount($locInfo['state']);
		if($state!=""){
?>
                        <li><a href="list?searchstate=<?php echo $locInfo['state']; ?>"><?php echo $state; ?></a></li>
<?php } } } else{ ?>
<h3 class="text-center">No Location Available</h3>
<?php } ?>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h3>Contact Us</h3>
					<p class="text-left">
						<?php echo $cms['ctc_addr']; ?>
						</p>
					<div id="social_footer">
                        
						<ul>
                          <li><a href="<?php echo $fburl; ?>" target="_blank"><i class="icon-facebook"></i></a></li>
                            <li><a href="<?php echo $twurl; ?>" target="_blank"><i class="icon-twitter"></i></a></li>
                            <li><a href="<?php echo $gpurl; ?>" target="_blank"><i class="icon-google"></i></a></li>
                            <li><a href="<?php echo $INurl; ?>" target="_blank"><i class="icon-instagram"></i></a></li>
                            <li><a href="<?php echo $lnurl; ?>" target="_blank"><i class="icon-linkedin"></i></a></li>
                        </ul>
                       
                    </div>
                </div>
            </div>
			</div>
			</div>
			<!-- End row -->
			<div class="container-fluid footer_btm_bg">
			<div class="container">
             <div class="row">
                <div class="row pdt10i pdb10i">
                    <div class="col-sm-6">
						<p><?php echo $copyright; ?></p>
					</div>
					<div class="col-sm-6 text-right">
						<p><a href="terms" target="_blank">Terms & Condition</a> | <a href="privacy-policy" target="_blank">Privacy Policy</a></p>
					</div>
				</div>
            </div><!-- End row -->
        </div>
		</div><!-- End container -->
    </footer><!-- End footer -->