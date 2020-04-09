<div class="white_bg">
        <div class="container margin_60">
            <div class="main_title">
                <h2 class="mainttl">Browse By  <span class="clr_txt">Location</span></h2>
                
            </div>
            <div class="row add_bottom_45">
<?php
$homelocation=$db->get_all("select distinct state from register where active_status='1' and user_role='1' and state!='' order by RAND() limit 18");
if(!empty($homelocation)){
	foreach($homelocation as $locInfo){
		$state=getState($locInfo['state']);
		$count=$com_obj->getReghomeCount($locInfo['state']);
		if($state!=""){
?>
                <div class="col-md-4 other_tours">
                    <ul>
                        <li><a href="list?searchstate=<?php echo $locInfo['state']; ?>"><?php echo $state; ?><span class="other_tours_price"><?php echo $count; ?></span></a>
                        </li>
                    </ul>
                </div>
		<?php } } } else{ ?>
<h3 class="text-center">No Location Available</h3>
<?php } ?>
                
            </div><!-- End row -->
                        
        </div><!-- End container -->
    </div>