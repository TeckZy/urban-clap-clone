<?php include 'header.php';
include 'leftmenu.php';
$msg=isSet($Message)?$Message:'';
$question = isset($question)?$question:'';
$answer = isset($answer)?$answer:'';
$GetRecord = $db->singlerec("select * from faq where id='".$_GET['update']."'");
$question=$GetRecord['question'];
$answer=$GetRecord['answer'];

if(isset($_REQUEST['updt']))
{
	$ban_id = $db->escapstr($_REQUEST['update']);
	$question = $db->escapstr($_REQUEST['question']);
	$answer = $db->escapstr($_REQUEST['answer']); 	
	$update1 = $db->insertrec("UPDATE faq SET question='$question',answer='$answer' WHERE id=$ban_id");
	header("Location:faq.php?editsuccess");		
    ?>
	<script>
	window.location="faq.php?editsuccess";
	</script>	
	<?php
}

if((isset($_REQUEST['submit'])) ){
	$question = $db->escapstr($_REQUEST['question']);
	$answer = $db->escapstr($_REQUEST['answer']); 
	if($question!=""){
		$insert = $db->insertrec("INSERT INTO faq (question,answer,date) VALUES ('$question','$answer',NOW())");
		header("Location:faq.php?succ");
	}else{
		header("Location:faq.php?err");
	}
	
}

 ?>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Ad FAQ</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title">Add New FAQ</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block card-dashboard table-responsive">
	               <form name="myfor" id="myfor" method="post" enctype="multipart/form-data"  class="form-horizontal" >
                         
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Question <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="question" id="question" class="form-control" value="<?php if($update==1) echo $question=""; else echo $question;?>"/>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Answer <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="textarea" cols="50" rows="5" name="answer" id="answer" class="form-control tiny" value="<?php if($update==1) echo $answer=""; else echo  $answer;?>"/></textarea>
									</div>
								</div>
					
					       <div class="form-actions center col-sm-12">
						   <?php If(isset($update) && ($update!=1) ) {?>
								<a type="button" href="faq.php" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Cancel
								</a>
								<button type="submit"  class="btn btn-primary" name="updt" onClick="return ban_validate1()">
									<i class="fa fa-check-square-o"></i> Save
								</button>
						   <?php } else { ?>
						   <a type="button" href="faq.php" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Cancel
								</a>
								<button type="submit"  class="btn btn-primary" name="submit" onClick="return ban_validate()">
									<i class="fa fa-check-square-o"></i> Save
								</button>
						   <?php  } ?>								
							</div>
					</form>
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
<script>
	
	function ban_validate(){
		var qus=document.getElementById('question').value;
		var ans=document.getElementById('answer').value;
		if(qus==""){
			alert('Please enter the question');
			document.getElementById('question').focus();
			return false;
		}
		
		if(ans==""){
			alert('please enter the answer');
			document.getElementById('answer').focus();
			return false;
		}
	
	}
	</script>
	<script>
	
	function ban_validate1(){
	var qus=document.getElementById('question').value;
		var ans=document.getElementById('answer').value;
		if(qus==""){
			alert('Please enter the question');
			document.getElementById('question').focus();
			return false;
		}
		
		if(ans==""){
			alert('please enter the answer');
			document.getElementById('answer').focus();
			return false;
		}
	}
	</script>
<?php include 'footer.php'; ?>