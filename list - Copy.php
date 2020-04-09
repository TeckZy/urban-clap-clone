<?php 
include "includes/title.php";
if(!(isset($_SESSION['id'])) || !(isset($_SESSION['email'])) || !(isset($_SESSION['fname'])))
{
header("location:login");
echo "<script>window.location='login'</script>";

}

if(isset($_SESSION['pid'])){
header("location:index");
echo "<script>window.location='index'</script>";	
}

$_id=isset($_SESSION['id'])?$_SESSION['id']:'';
$user_location=$com_obj->getLocation($_id);
$radio_box0=isset($radio_box0)?$radio_box0:'';
$radio_box1=isset($radio_box1)?$radio_box1:'';
$radio_box2=isset($radio_box2)?$radio_box2:'';
$radio_box3=isset($radio_box3)?$radio_box3:'';
$radio_box4=isset($radio_box4)?$radio_box4:'';
$prf_input0=isset($prf_input0)?$prf_input0:'';
$prf_input1=isset($prf_input1)?$prf_input1:'';
$prf_input2=isset($prf_input2)?$prf_input2:'';
$prf_input3=isset($prf_input3)?$prf_input3:'';
$prf_input4=isset($prf_input4)?$prf_input4:'';
$prf_select0=isset($prf_select0)?$prf_select0:'';
$prf_select1=isset($prf_select1)?$prf_select1:'';
$prf_select2=isset($prf_select2)?$prf_select2:'';
$prf_select3=isset($prf_select3)?$prf_select3:'';
$prf_select4=isset($prf_select4)?$prf_select4:'';
$radio_box_comp0=isset($radio_box_comp0)?$radio_box_comp0:'';
$radio_box_comp1=isset($radio_box_comp1)?$radio_box_comp1:'';
$radio_box_comp2=isset($radio_box_comp2)?$radio_box_comp2:'';
$radio_box_comp3=isset($radio_box_comp3)?$radio_box_comp3:'';
$radio_box_comp4=isset($radio_box_comp4)?$radio_box_comp4:'';
$prf_type=isset($prf_type)?$prf_type:'';
$radioid=isset($radioid)?$radioid:'';
$checkid=isset($checkid)?$checkid:'';
$input_field=isset($input_field)?$input_field:'';
$selid=isset($selid)?$selid:'';
$prf_checkbox=isset($prf_checkbox)?$prf_checkbox:'';
$comp_location=isset($comp_location)?$comp_location:'';
$budget_from=isset($budget_from)?$budget_from:'';
$budget_to=isset($budget_to)?$budget_to:'';
$radioid_comp=isset($radioid_comp)?$radioid_comp:'';
$searchcountry=isset($searchcountry)?$searchcountry:'';
$searchstate=isset($searchstate)?$searchstate:'';
$searchservice=isset($searchservice)?$searchservice:'';
$price=isset($price)?$price:'';
$rank=isset($rank)?$rank:'';
$loc_0=isset($loc_0)?$loc_0:'';
$loc_1=isset($loc_1)?$loc_1:'';
$loc_2=isset($loc_2)?$loc_2:'';
$loc_3=isset($loc_3)?$loc_3:'';
$loc_4=isset($loc_4)?$loc_4:'';
$loc_5=isset($loc_5)?$loc_5:'';
$option_1=isset($option_1)?$option_1:'';
$option_2=isset($option_2)?$option_2:'';
$option_3=isset($option_3)?$option_3:'';
$option_4=isset($option_4)?$option_4:'';
$option_5=isset($option_5)?$option_5:'';

$catid=isset($catid)?$catid:'';
$catid=base64_decode($catid);
$list=isset($list)?$list:'';
if(isset($qus_upd)){
	$date=date("Y-m-d H:i:s");
	$ip=$_SERVER['REMOTE_ADDR'];
	//radio box ans and question
	$radio_box0=$db->escapstr($radio_box0);
	$radio_box1=$db->escapstr($radio_box1);
	$radio_box2=$db->escapstr($radio_box2);
	$radio_box3=$db->escapstr($radio_box3);
	$radio_box4=$db->escapstr($radio_box4);
	$radioid=$db->escapstr($radioid);
	$budget_from=$db->escapstr($budget_from);
	$budget_to=$db->escapstr($budget_to);
	$comp_location=$db->escapstr($comp_location);
	$radioid_comp=$db->escapstr($radioid_comp);
	$json_radio=json_encode(array("qus1" => $radioid, "ans1" => $radio_box0,
								  "qus2" => $radioid, "ans2" => $radio_box1,
								  "qus3" => $radioid, "ans3" => $radio_box2,
								  "qus4" => $radioid, "ans4" => $radio_box3,
								  "qus5" => $radioid, "ans5" => $radio_box4));
	//checkbox ans and question
	if(isset($_POST['0prf_checkbox'])) $prf_checkbox0=$_POST['0prf_checkbox']; else $prf_checkbox0="";
	if(isset($_POST['1prf_checkbox'])) $prf_checkbox1=$_POST['1prf_checkbox']; else $prf_checkbox1="";
	if(isset($_POST['2prf_checkbox'])) $prf_checkbox2=$_POST['2prf_checkbox']; else $prf_checkbox2="";
	if(isset($_POST['3prf_checkbox'])) $prf_checkbox3=$_POST['3prf_checkbox']; else $prf_checkbox3="";
	if(isset($_POST['4prf_checkbox'])) $prf_checkbox4=$_POST['4prf_checkbox']; else $prf_checkbox4="";
	$checkboxid=$db->escapstr($checkid);
	$json_checkbox=json_encode(array("qus1" => $checkboxid, "ans1" => $prf_checkbox0,
									 "qus2" => $checkboxid, "ans2" => $prf_checkbox1,
									 "qus3" => $checkboxid, "ans3" => $prf_checkbox2,
									 "qus4" => $checkboxid, "ans4" => $prf_checkbox3,
									 "qus5" => $checkboxid, "ans5" => $prf_checkbox4));
	//input box ans and question
	$prf_input0=$db->escapstr($prf_input0);
	$prf_input1=$db->escapstr($prf_input1);
	$prf_input2=$db->escapstr($prf_input2);
	$prf_input3=$db->escapstr($prf_input3);
	$prf_input4=$db->escapstr($prf_input4);
	$input_field=$db->escapstr($input_field);
	$json_inputbox=json_encode(array("qus1" => $input_field, "ans1" => $prf_input0,
									 "qus2" => $input_field, "ans2" => $prf_input1,
									 "qus3" => $input_field, "ans3" => $prf_input2,
									 "qus4" => $input_field, "ans4" => $prf_input3,
									 "qus5" => $input_field, "ans5" => $prf_input4));
									
	//select box qus and ans
	$prf_select0=$db->escapstr($prf_select0);
	$prf_select1=$db->escapstr($prf_select1);
	$prf_select2=$db->escapstr($prf_select2);
	$prf_select3=$db->escapstr($prf_select3);
	$prf_select4=$db->escapstr($prf_select4);
	$selid=$db->escapstr($selid);
	$json_selectkbox=json_encode(array("qus1" => $selid, "ans1" => $prf_select0,
									   "qus2" => $selid, "ans2" => $prf_select1,
									   "qus3" => $selid, "ans3" => $prf_select2,
									   "qus4" => $selid, "ans4" => $prf_select3,
									   "qus5" => $selid, "ans5" => $prf_select4));
									   
	//compulsory qus
	$radio_box_comp0=$db->escapstr($radio_box_comp0);
	$radio_box_comp1=$db->escapstr($radio_box_comp1);
	$radio_box_comp2=$db->escapstr($radio_box_comp2);
	$radio_box_comp3=$db->escapstr($radio_box_comp3);
	$radio_box_comp4=$db->escapstr($radio_box_comp4);
	$json_comp=json_encode(array("qus1" => $radioid_comp, "ans1" => $radio_box_comp0,
								 "qus2" => $radioid_comp, "ans2" => $radio_box_comp1,
								 "qus3" => $radioid_comp, "ans3" => $radio_box_comp2,
								 "qus4" => $radioid_comp, "ans4" => $radio_box_comp3,
								 "qus5" => $radioid_comp, "ans5" => $radio_box_comp4));
	$compans=$com_obj->mailCompQus($json_comp);
	$checkans=$com_obj->mailcheckboxQus($json_checkbox);
	$inputans=$com_obj->commonmailans($json_inputbox);
	$selectboxqus=$com_obj->commonmailans($json_selectkbox);
	$json_radioqus=$com_obj->commonmailans($json_radio);
	
	$getname=$com_obj->get_name($_id);
	$bud=array("bud_frm" => $budget_from, "bud_to" => $budget_to, "comp_loc" => $comp_location);
	
	$getfname=$com_obj->get_name($_id);
	
	$sql="";
	 if(!empty($searchcountry)){
		$sql.="and country='$searchcountry'";
	 }
	 if(!empty($searchstate)){
		$sql.="and state='$searchstate'";
	 }
	 if(!empty($searchservice)){
		$sql.="and cat_id='$searchservice'";
	 }
	 if(!empty($catid)){
		$sql.="and cat_id='$catid'";
	 }
	//insert process
	
	//echo "select id from register where  user_role='1'  and active_status='1' $sql"; exit;
	$sel_=$db->get_all("select id from register where  user_role='1'  and active_status='1' $sql");
	$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if(!empty($sel_)){
		foreach($sel_ as $tem){
			$cunt=$tem['id'];
		$cat=$db->singlerec("select * from register where  id='$cunt'");	
			$catid=$cat['cat_id'];
			$set="senter_id='$_id'";
			$set.=",receiver_id='$cunt'";
			$set.=",cat_id='$catid'";
			$set.=",qusans1='$json_radio'";
			$set.=",qusans2='$json_checkbox'";
			$set.=",qusans3='$json_inputbox'";
			$set.=",qusans4='$json_selectkbox'";
			$set.=",comp_qusans='$json_comp'";
			$set.=",comp_budget_from='$budget_from'";
			$set.=",comp_budget_to='$budget_to'";
			$set.=",comp_location='$comp_location'";
			$set.=",ip='$ip'";
			$set.=",crcdt='$date'";
			$set.=",status='0'";
			$set.=",role='0'";
			$toemail=$com_obj->getEmail($cunt);
			$getmailres=$email_temp->sentQusEmail($siteinfo,$json_radioqus,$selectboxqus,$inputans,$checkans,$compans,$bud,$getname);
			$subject="User Requirements";
			//echo "insert into sent_enquiry set $set"; exit;
			$db->insertrec("insert into sent_enquiry set $set");
			$com_obj->email($from_email,$toemail,$subject,$getmailres);
			header("Location: $siteurl/user-request?succ");
		    echo "<script>href.location='$siteurl/user-request?succ'</script>";
		}
	}else{
		header("Location: $siteurl/list?list=$list&catid=$catid&noprof");
		echo "<script>href.location='$siteurl/list?list=$list&catid=$catid&noprof'</script>";
		exit;
	}
}
?>

         <body>
            <!-- End Preload -->
            <div class="layer"></div>
            <!-- Mobile menu overlay mask -->
            <!-- Header================================================== -->
           <?php include "includes/header.php"; ?>
            <section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_2.jpg" data-natural-width="1400" data-natural-height="470">
               <div class="parallax-content-1">
                  <div class="animated fadeInDown">
                     <div id="search_bar_container" style="background:transparent;">
                        <div class="container">
                           <?php include "search.php"; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- End section -->
            <section style="background:#f1f1f1">
			<div class="container pdt30i pdb30i">
			<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<div class="col-md-12">
<?php
$qusenable=$com_obj->checkSentButton($_id);
if($qusenable==true){
	$style="style='display:block'";
}else{
	$style="style='display:none'";
}
?>

<?php if(isset($succ)){?>
<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-ok green"></i>
		<strong class="green">
			Your Order Posted Successfully!!!
		</strong>

	</div>
<?php } ?>
      <div class="wizard" <?php echo $style; ?>>
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">
				<?php 
					$sql="";
					if(!empty($searchservice)){
						$sql.="and cat_id='$searchservice'";
					 }
					 if(!empty($catid)){
						$sql.="and cat_id='$catid'";
					 }
					if(!empty($catid) || !empty($searchservice)){
					$query=$db->get_all("select * from question_mgmt where  status='1' $sql or q_type='5'");
					if(!empty($query)){
					  foreach($query as $i=>$qid){
						$qusId=$qid['id'];
						if($i==0) $class="active"; else $class="disabled";
				?>
                    <li role="presentation" class="<?php echo $class; ?>">
                        <a href="#step<?php echo $i; ?>" data-toggle="tab" aria-controls="step<?php echo $i; ?>" role="tab" title="Step <?php echo $i; ?>">
                            <span class="round-tab">
                                Step <?php echo $i; ?>
                            </span>
                        </a>
                    </li>
					<?php } ?>
					<li role="presentation" class="disabled">
                        <a href="#step6" data-toggle="tab" aria-controls="step6" role="tab" title="complete">
                            <span class="round-tab">
                                Complete
                            </span>
                        </a>
                    </li>
					<?php  }else{ ?>
						<li>No Questions found</li>
					<?php } }?>
                </ul>
            </div>
            <form role="form" method="post">
                <div class="tab-content">
				<?php 
					  //$catid=base64_decode($_GET['catid']);
					  $sql="";
						if(!empty($searchservice)){
							$sql.="and cat_id='$searchservice'";
						 }
						 if(!empty($catid)){
							$sql.="and cat_id='$catid'";
						 }
					if(!empty($catid) || !empty($searchservice)){	
					  $query=$db->get_all("select * from question_mgmt where status='1' $sql or q_type='5' order by id desc ");
					  if(!empty($query)){
					  foreach($query as $i=>$qid){
						$qusId=$qid['id'];
						$q_ty=$qid['q_type'];
						if($i==0) $class="active"; else $class="disabled";
				?>
                    <div class="tab-pane <?php echo $class; ?>" role="tabpanel" id="step<?php echo $i; ?>">
                        <div class="row">
						<?php 
						$type=$com_obj->getTypeid($qusId); 
						$type=$type['ques_type'];
						$com_typ=$com_obj->getCompType($qusId);
						$qus_typ=$com_typ['questin_type'];
						if($type==0) { $input=$com_obj->input_text_field($qusId,$i);  }
						if($type==1) { $input=$com_obj->getcheckbox_field($qusId,$i); }
						if($type==2) { $input=$com_obj->radiobox_field($qusId,$i); }
						if($type==3) { $input=$com_obj->dropselect_field($qusId,$i); }
						if($qus_typ==5) { $comp=$com_obj->dropselect_field_from($qusId); }
						?>
							<div class="col-sm-12 mt15 wiz_frm">
								<h3><?php if($qus_typ==5 && $type!=2) echo $comp['main_head']; else  echo $input['main_head']; ?></h3>
								<p><?php if($qus_typ==5 && $type!=2) echo $comp['sub_head']; else echo $input['sub_head']; ?></p>
								<div class="col-sm-12 mt15i">
								<?php if($qus_typ==5 && $type!=2) echo $comp['input'];  else echo $input['input']; ?>
								</div>
								<input type="hidden" name="<?php echo "question".$i; ?>" value="<?php echo $input['qus_type']; ?>">
								<ul class="list-inline pull-right">
									<?php if($i!=0): ?><li><button type="button" class="btn btn-default prev-step">Previous</button></li><?php endif; ?>
									<li><button type="button" class="btn btn-primary next-step">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></button></li>
								</ul>
							</div>
							
						</div>
                    </div>
					  <?php } ?>
					
                    
					<div class="tab-pane" role="tabpanel" id="step6">
                        <div class="row">
							<div class="col-sm-12 mt15 wiz_frm text-center">
								
								<h3>User Location</h3>
								<!--<p class="pdb30i">1 to 3 interested fitness trainers will respond in 24 hours with their profiles & prices</p>-->
								
								<input type="text" name="comp_location" id="comp_location" value="<?php echo $user_location; ?>">
								<ul class="list-inline pull-right">
									<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
									
									<button class="btn btn-success btn-info-full next-step" name="qus_upd">Complete</button>
								</ul>
							</div>
						</div>
                    </div>
					<?php  }else{ ?>
						<li>No Questions found</li>
					<?php } }
					
					//else{ ?> 
						<!--<p style="font-size: 23px;
    text-align: center;
    color: #ff7941;
    font-weight: 600;"> Please Choose any of category or Location</p>-->
					<?php //} ?>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
					</div>
					<div class="col-sm-2"></div>
			   </div>
			
			</div>
			</section>
				
            <div class="container mt30i mb30i">
               			   
			   <div class="row">
			  
                  <aside class="col-lg-3 col-md-3">
                     <div id="filters_col">
                        <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filters <i class="icon-plus-1 pull-right"></i></a>
                        <div class="collapse" id="collapseFilters">
                           <div class="filter_type ">
<?php $value=$com_obj->getTodalAmount(); ?>
                              <h6>Price</h6>
        <div class="col-xs-12 price_range mb20i">
          <div class="range range-info">
            <input type="range" name="range" min="1" max="<?php echo $value; ?>" value="<?php echo isset($min)?$min:'50'; ?>" onchange="rangeInfoo(this.value);">
            <output id="rangeInfo"><?php echo isset($min)?$min:$value; ?></output>
          </div>
        </div>
                           </div>
						   <div class="clearfix"></div>
                           <div class="filter_type">
                              <h6>Star Category</h6>
                              <ul>
							  <?php // echo $com_obj->getRevCount(3); ?>
							  <form method="get" enctype="multipart-form/data">
                                 <li><label><input type="checkbox" name="option_1" <?php if($option_1==$com_obj->getRevCount(5)){ ?> checked <?php } ?> id="checkbox_1" value="5" ><span class="rating">
                                    <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i>
                                    </span><?php //echo $com_obj->getRevCount(5); ?>(5)</label>
                                 </li>
                                 <li><label><input type="checkbox" name="option_2" <?php if($option_2==$com_obj->getRevCount(4)){ ?> checked <?php } ?> value="4"><span class="rating">
                                    <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i>
                                    </span><?php //echo $com_obj->getRevCount(4); ?>(4)</label>
                                 </li>
                                 <li><label><input type="checkbox" name="option_3" <?php if($option_3==$com_obj->getRevCount(3)){ ?> checked <?php } ?> value="3"><span class="rating">
                                    <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
                                    </span><?php //echo $com_obj->getRevCount(3); ?>(3)</label>
                                 </li>
                                 <li><label><input type="checkbox" name="option_4" <?php if($option_4==$com_obj->getRevCount(2)){ ?> checked <?php } ?> value="2"><span class="rating">
                                    <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
                                    </span><?php //echo $com_obj->getRevCount(2); ?>(2)</label>
                                 </li>
                                 <li><label><input type="checkbox" name="option_5" <?php if($option_5==$com_obj->getRevCount(1)){ ?> checked <?php } ?> value="1"><span class="rating">
                                    <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
                                    </span><?php //echo $com_obj->getRevCount(1); ?>(1)</label>
                                 </li>
								 
                              </ul>
                           </div>

                           <div class="filter_type">
                              <h6>Location</h6>
                              <ul>
<?php
$homelocation=$db->get_all("select * from register where active_status='1' and user_role='1' and state!='' order by RAND() limit 6");
if(!empty($homelocation)){
	
	foreach($homelocation as $i=>$locInfo){
		$state=getState($locInfo['state']);
		$count=$com_obj->getReghomeCount($locInfo['state']);
		
		if($state!=""){
			$sel="";
			if($loc_0==$locInfo['state']) $sel="checked";
			if($loc_1==$locInfo['state']) $sel="checked";
			if($loc_2==$locInfo['state']) $sel="checked";
			if($loc_3==$locInfo['state']) $sel="checked";
			if($loc_4==$locInfo['state']) $sel="checked";
			if($loc_5==$locInfo['state']) $sel="checked";
?>
                                 <li><label><input type="checkbox" name="loc_<?php echo $i; ?>" value="<?php echo $locInfo['state']; ?>" <?php //echo $sel; ?> ><?php echo $state; ?></label></li>
<?php }  } } else{ ?>
<h3 class="text-center">No Location Available</h3>
<?php } ?>
                              </ul>
                           </div>
                        </div>
                        <!--End collapse -->
						 <input class="btn_dflt btn btn-block" type="submit" value="search"/>
                     </div>
                     <!--End filters col-->
                  </aside>
				 
				  </form>

                  <div class="col-lg-9 col-md-9">
                     <div id="tools">
                        <div class="row">
						<form method="Post">
                           <div class="col-md-3 col-sm-3 col-xs-6">
                              <div class="styled-select-filters">
                                 <select name="sort_price" id="sort_price" onchange="return price(this.value)">
                                    <option value="" selected>Sort by price</option>
                                    <option value="lower" <?php if($price=="lower"){ ?> selected <?php } ?>>Lowest price</option>
                                    <option value="higher" <?php if($price=="higher"){ ?> selected <?php } ?>>Highest price</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-3 col-xs-6">
                              <div class="styled-select-filters">
                                 <select  name="sort_rating" id="sort_rating" onchange="return rank(this.value)">
                                    <option value="" >Sort by ranking</option>
                                    <option value="ranklow" <?php if($rank=="ranklow"){ ?> selected <?php } ?>>Lowest ranking</option>
                                    <option value="rankhigh" <?php if($rank=="rankhigh"){ ?> selected <?php } ?> >Highest ranking</option>
                                 </select>
                              </div>
                           </div>
						 </form>
                        </div>
                     </div>
                     <!--/tools -->
					 <?php
					 $option_1=isset($option_1)?$option_1:'0';
					 $option_2=isset($option_2)?$option_2:'0';
					 $option_3=isset($option_3)?$option_3:'0';
					 $option_4=isset($option_4)?$option_4:'0';
					 $option_5=isset($option_5)?$option_5:'0';
					 $min=isset($min)?$min:'';
					 $max=isset($max)?$max:'';
					 $rowsPerPage=4;
					$limit=limitation($rowsPerPage);
					 $sql="";
					 if(!empty($searchcountry)){
						$sql.="and country='$searchcountry'";
					 }
					 if(!empty($searchstate)){
						$sql.="and state='$searchstate'";
					 }
					 if(!empty($searchservice)){
						$sql.="and cat_id='$searchservice'";
					 }
					 if(!empty($catid)){
						$sql.="and cat_id='$catid'";
					 }
					 
					 if(($price=="lower")){
						 $sql.="order by estimate_fee asc";
					 }
					 
					 if(($price=="higher")){
						 $sql.="order by estimate_fee desc";
					 }
					 if(($rank=="ranklow")){
						 $sql.="order by review.stars asc";
					 }
					 
					 if(($rank=="rankhigh")){
						 $sql.="order by review.stars desc";
					 }
					 if(!empty($loc_0)){
						 $sql.="and state='$loc_0'";
					 }
					 if(!empty($loc_1)){
						 $sql.="and state='$loc_1'";
					 }
					 if(!empty($loc_2)){
						 $sql.="and state='$loc_2'";
					 }
					 if(!empty($loc_3)){
						 $sql.="and state='$loc_3'";
					 }
					 if(!empty($loc_4)){
						 $sql.="and state='$loc_4'";
					 }
					 if(!empty($loc_5)){
						 $sql.="and state='$loc_5'";
					 }
					 if(!empty($min)){
						 $sql.=" and estimate_fee  BETWEEN 1 AND '$min'";
					 }
					 
					 if(!empty($option_1)){
						$sql.=" and review.stars='5'";
					 }
					 if(!empty($option_2)){
						$sql.=" and review.stars='4'";
					 }
					 if(!empty($option_3)){
						$sql.=" and review.stars='3'";
					 }
					 if(!empty($option_4)){
						$sql.=" and review.stars='2'";
					 }
					 if(!empty($option_5)){
						$sql.=" and review.stars='1'";
					 }
					 
					 
					 //echo "select * from register where user_role='1' and active_status='1' $sql";
					 echo "select * from register LEFT JOIN review on register.id=review.professionalid where register.user_role='1' $sql";
					 $que="select * from register LEFT JOIN review on register.id=review.professionalid where register.user_role='1' $sql";
					 
					 $getInfo=$db->get_all($que.$limit);
					 if(!empty($getInfo)){
						 foreach($getInfo as $detail){
							$fname=ucfirst($detail['fname']);
							$lname=ucfirst($detail['lname']);
							$desc=$com_obj->limit_text($detail['about_self'],100);
							$location=getCity($detail['city']);
							$fees=$detail['estimate_fee'];
							$duration=$detail['fee_duration'];
							$exp1=$detail['exp1'];
							$exp2=$detail['exp2'];
							$exp1_dur=$detail['exp_dur1'];
							$exp2_dur=$detail['exp_dur2'];
							$img=$detail['img'];
							if(!empty($fees)){
								$e_fees="$".$fees;
								$e_dur=$duration;
							}else{
								$e_fees="$"."0";
								$e_dur="";
							}
							$name=$fname." ".$lname;
							if(!empty($img)){
								$pic="$siteurl/$img";
							}else{
								$pic="$siteurl/uploads/profprofile/noimage.jpg";
							}
							if(!empty($exp1)){
								$exp_details=$exp1." ".$exp1_dur;
							}else{
								$exp_details="";
							}
							if(!empty($exp2)){
								$exp2_details=$exp2." ".$exp2_dur;
							}else{
								$exp2_details="";
							}
					 ?>
<?php 
$reviewCount=$com_obj->getReviewProfcount($detail['id']);
$reviewCount=$reviewCount['count'];
$totalreview=getStar($reviewCount);
?>
                     <div class="strip_all_tour_list all_cat_list wow fadeIn" data-wow-delay="0.1s">
                        <div class="row">
                           <div class="col-lg-3 col-md-3 col-sm-3">
                              <a href="#" class="lstimg">
                              <img  src="<?php echo $pic; ?>" alt="Image" class="img-responsive img-circle list_img">
                              </a>
                           </div>
                           <div class="clearfix visible-xs-block"></div>
                           <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="tour_list_desc row">
                                <div class="rating">
							<?php if($reviewCount == 0){?>
								<i class="fa font14px fa-star "></i>
								<i class="fa font14px fa-star "></i>
								<i class="fa font14px fa-star "></i>
								<i class="fa font14px fa-star "></i>
								<i class="fa font14px fa-star"></i>&nbsp;(<?php echo $totalreview; ?>)
							<?php }else{ ?>
								<span class="cntnt font14px"><?php echo $totalreview; ?></span>
							<?php } ?>
							</div>
                                 <a href="list-detail?uid=<?php echo base64_encode($detail['id']); ?>"><h3 class="u_nme"><?php echo $name; ?></h3></a>
                                 <p><?php echo $desc; ?></p>
                                 <div class="clearfix"></div>
                                 <div class="col-sm-8 mt15i pdl0i">
                                    <?php if(!empty($location)): ?><p><strong>Location  : </strong> <?php echo $location; ?></p><?php endif; ?>
                                    <p><strong>Number of times hired  : </strong> <?php echo $com_obj->completeProjCount($detail['id']); ?></p>
                                    <p><strong>Professional Experience  : </strong> <?php echo $exp_details; ?> <?php echo $exp2_details; ?></p>
                                 </div>
                                 <div class="col-sm-4 mt40i text-center">
                                    <a href="list-detail?uid=<?php echo base64_encode($detail['id']); ?>" class="btn btn-sm btn_dflt">View Details</a>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3 col-md-3 col-sm-3 text-center">
                              <div class="price_list">
                                 <div class="price"><?php echo $e_fees; ?> <span><?php echo $e_dur; ?></span></div>
                              </div>
                              <!--<div class="text-center">
                                 <h4><strong>View Gallery</strong></h4>
                                 <a href="#"><img src="img/gallery.png" width="25px"></a>
                              </div>-->
                           </div>
                        </div>
                     </div>
						 <?php } }else{ ?>
<?php
$catname=$com_obj->cat_name($catid);
if(isset($_REQUEST['err'])) { ?> 
	<div class="alert alert-block alert-error">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
	 <i class="icon-trash red"></i>
		<strong class="red">
			<h3 class="text-center">No professional available in <?php echo "{$catname}" ?> categoty !!!</h3>
		</strong>

	</div>
<?php } ?>
					 <div class="strip_all_tour_list all_cat_list wow fadeIn" data-wow-delay="0.1s">
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="tour_list_desc row">
                               <h3 class="text-center"> No Professionals found </h3>
                              </div>
                           </div>
                        </div>
                     </div>
					 <?php } ?>
                     <!--End strip -->
                     <hr>
                     <div class="text-center">
                        <?php $db->insertrec(getPagingQuery1($que, $rowsPerPage, "")); ?>
					<?php echo $pagingLink = getPagingLink1($que,$rowsPerPage,"",$db); ?>
                     </div>
                     <!-- end pagination-->
                  </div>
                  <!-- End col lg-9 -->
               </div>
               <!-- End row -->
            </div>
            <!-- End container -->
            <!-- End col lg-9 -->
            </div><!-- End row -->
            </div><!-- End container -->
          <?php include "includes/footer.php"; ?>
            <!-- End footer -->
            <div id="toTop"></div>
            <!-- Back to top button -->
            <!-- Common scripts -->
<script>
('input[id^="checkbox_"]').not('#checkbox_all').click(function () {
            $('#checkbox_all').prop('checked', false);

   alert($(this).val());  

});
</script>
            <script src="js/jquery-1.11.2.min.js"></script>
            <script src="js/common_scripts_min.js"></script>
            <script src="js/functions.js"></script>
            <!-- Specific scripts -->
            <!-- Check and radio inputs -->
            <script src="js/icheck.js"></script>
            <script>  
               $('input').iCheck({
                  checkboxClass: 'icheckbox_square-grey',
                  radioClass: 'iradio_square-grey'
                });
                
            </script>
			<script>
			$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
			</script>
            <!-- Map -->
            <script src="http://maps.googleapis.com/maps/api/js"></script>
            <script src="js/map_hotels.js"></script>
            <script src="js/infobox.js"></script>
			<script src="js/jquery.js"></script>
			<script src="js/jquery.validate.js"></script>
         </body>
      </html>
<script>
$().ready(function(){
	$(".irs").click(function(){
		var inputvalue=$("#range").val();
		var res = inputvalue.split(";");
		var frst=res[0];
		var scnt=res[1];
		if(frst!="" && scnt!=""){
			location.href='list.php?min='+frst+'&max='+scnt;
		}
	});
});
</script>
<script>
function rangeInfoo(val){
	if(val!=""){
		location.href='list.php?min='+val;
	}
}
function price(val){
	if(val!=""){
		location.href='list.php?price='+val;
	}
}

function rank(val){
	if(val!=""){
		location.href='list.php?rank='+val;
	}
}
</script>