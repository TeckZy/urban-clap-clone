<?php
include "AMframe/config.php";
$id=isset($id)?$id:'';
$autoid=isset($autoid)?$autoid:'';
$upd=isset($upd)?$upd:'';
$GetRecord = $db->singlerec("select * from sent_enquiry where id='$autoid' ");
$senterid=$GetRecord['senter_id'];
$receiverid=$GetRecord['receiver_id'];
$qus1=$GetRecord['qusans1'];
$radio=$com_obj->commonmailansonly($GetRecord['qusans1']);
$inputfld=$com_obj->commonmailansonly($GetRecord['qusans3']);
$select=$com_obj->commonmailansonly($GetRecord['qusans4']);
$checkbux=$com_obj->mailcheckboxQusonly($GetRecord['qusans2']);
$compqus=$com_obj->mailCompQusonly($GetRecord['comp_qusans']);
$user_location=$GetRecord['comp_location'];
if(!empty($id)){
	$catid=$com_obj->getUsercatid($id);
?>
<div class="col-md-12">
      <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs bgnavcl" role="tablist">
				<?php 
					$sql="";
					$query=$db->get_all("select * from question_mgmt where cat_id='$catid' and  status='1' or q_type='5' order by id asc");
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
					<?php  } else{ ?>
						<li>No Questions found</li>
					<?php } ?>
                </ul>
            </div>

            <!--<form role="form">-->
                <div class="tab-content">
				<?php 
					  //$catid=base64_decode($_GET['catid']);
					  $sql="";
						
					 if(!empty($catid)){
						$sql.="and cat_id='$catid'";
					 }		
					  $query=$db->get_all("select * from question_mgmt where cat_id='$catid' and status='1' or q_type='5'  order by id asc");
					  foreach($query as $i=>$qid):
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
						if($type==0) { $input=$com_obj->input_text_field($qusId,$i,$inputfld);  }
						if($type==1) { $input=$com_obj->getcheckbox_field($qusId,$i,$checkbux); }
						if($type==2) { $input=$com_obj->radiobox_field($qusId,$i,$radio); }
						if($type==3) { $input=$com_obj->dropselect_field($qusId,$i); }
						if($qus_typ==5) { $comp=$com_obj->dropselect_field_from($qusId,$compqus); } 
						$user_location=isset($user_location)?$user_location:'';
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
					<?php endforeach; ?>
                    
					<div class="tab-pane" role="tabpanel" id="step6">
                        <div class="row">
							<div class="col-sm-12 mt15 wiz_frm text-center">
								<h3>User Location</h3>
								<input type="text" name="comp_location" id="comp_location" value="<?php echo $user_location; ?>">
							</div>
						</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <!--</form>-->
        </div>
    </div>
<input type="hidden" name="catid" value="<?php echo $catid; ?>" />
<input type="hidden" name="receiverid" id="receiverid" value="<?php echo $id; ?>"/>
<?php } ?>