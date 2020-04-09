<?php include 'header.php';
include 'leftmenu.php'; 
$msg="";

$id = isSet($id) ? $db->escapstr($id):'';
$GetRecords=$db->get_all("select * from question_mgmt where id='$id'");
                     
if(count($GetRecords)==0)
    $Message="No Record found";
$disp = "";

    foreach($GetRecords as $i=>$GetRecord) {
	$idvalue = $GetRecord['id'];
	$cat_id = $GetRecord['cat_id'];
	$sub_cat_id = $GetRecord['sub_cat_id'];
	$question_type=$GetRecord['question_type'];
	$reg_ip=$GetRecord['ip'];	
	$active_status = $GetRecord['status'] ;
	$crcdt=$GetRecord['crcdt'];		
	$q_type=$GetRecord['q_type'];
	$m_head=$GetRecord['main_heading'];
	$s_head=$GetRecord['sub_heading'];
	$choice1=$GetRecord['choice1'];
	$choice2=$GetRecord['choice2'];
	$choice3=$GetRecord['choice3'];
	$choice4=$GetRecord['choice4'];
	$choice5=$GetRecord['choice5'];
	
	if($question_type==0) $type="Input Box";
	if($question_type==1) $type="Check Box";
	if($question_type==2) $type="Radio Button";
	if($question_type==3) $type="Dropdown Box";
	
	if(empty($cat_id) && $q_type==5){
		$cat_name="Compulsory";
	}else{
		$cat_name=$com_obj->cat_name($cat_id);
	}
}
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Question Details</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $msg;?></h4>
	                <h4 class="card-title">Question Details</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			<div class="heading-elements">
	                    <ul class="list-inline mb-0">
	                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
	                        <!--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>-->
	                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
	                        <!--<li><a data-action="close"><i class="ft-x"></i></a></li>-->
	                    </ul>
	                </div>
	            </div>
	            <div class="card-body collapse in">
				    <div class="row">
						<div class="col-sm-6">
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Category</b></label>
							    <div class="col-sm-8">
									<label>  <?php echo !empty($cat_name)?$cat_name:'';?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Question Type</b></label>
							    <div class="col-sm-8">
									<label><?php echo !empty($type)?$type:'';?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Main Heading</b></label>
							    <div class="col-sm-8">
									<label><?php echo !empty($m_head)?$m_head:'';?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Sub Heading</b></label>
							    <div class="col-sm-8">
									<label><?php echo !empty($s_head)?$s_head:''; ?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Choice1</b></label>
							    <div class="col-sm-8">
									<label> <?php echo !empty($choice1)?$choice1:'';?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Choice2</b></label>
							    <div class="col-sm-8">
									<label> <?php echo !empty($choice2)?$choice2:'';?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Choice3</b></label>
							    <div class="col-sm-8">
									<label> <?php echo !empty($choice3)?$choice3:'';?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Choice4</b></label>
							    <div class="col-sm-8">
									<label> <?php echo !empty($choice4)?$choice4:'';?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Choice5</b></label>
							    <div class="col-sm-8">
									<label> <?php echo !empty($choice5)?$choice5:'';?></label>
								</div>
							</div>
							
							
						</div>

					</div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
<!--/ HTML (DOM) sourced data -->

        </div>
      </div>
    </div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<?php include 'footer.php'; ?>