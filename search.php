<?php
$searchcountry=isset($searchcountry)?$searchcountry:'';
$searchstate=isset($searchstate)?$searchstate:'';
$searchservice=isset($searchservice)?$searchservice:'';
?>
<form method="get" action="list" enctype="multipart-form/data">
	<div class="search_bar">
	  <div class="col-sm-3 padd0i">
	  <select class="searchSelect form-control bucol" name="searchcountry" id="country" onchange="return get_state(this.value);">
			<option value="">Select Country</option>
			<?=$drop->get_dropdown($db,"select country_id,country_name from country where country_status='1' order by country_name asc",$searchcountry);?>
		</select>
		
		<p class="text-left">Sample Country: <b>(India)</b></p>
		
	  </div>
	  <div class="col-sm-3 padd0i">
		 <select class="searchSelect form-control bucol" name="searchstate" onchange="return get_city(this.value);" id="state1">
			<option value="">Select State</option>
			<?=$drop->get_dropdown($db,"SELECT state_id,state_name FROM state WHERE state_country_id='$searchcountry' and state_status='1' order by state_name asc",$searchstate);?>
		</select>
		
		<p class="text-left">Sample State: <b>(TamilNadu)</b></p>
		
	  </div>
	  <div class="col-sm-4 padd0i">
		 <select title="Search in" class="searchSelect form-control bucol " id="" name="searchservice">
			<option value=""  title="All Tours">Select Type of Service</option>
			<?=$drop->get_dropdown($db,"select id,category_name from category where active_status='1' and parent_id='0' order by category_name asc",$searchservice);?>
		 </select>
		 
		 <p class="text-left">Sample Service: <b>(Electrical)</b></p>
		 
	  </div>
	  <div class="col-sm-2 padd0i"> 
		 <button class="form-control btn_dflt  bucol sercbt " type="text" autocomplete="off"><i class="icon-search"></i> Search</button>
	  </div>
	</div>
	</div>
</form>
	<!-- End search bar-->
<script>
function get_state(val){
		 $.ajax({
			 url: "state_ajax.php?val="+val, 
			success: function(result){
			$("#state1").html(result);
		}
		});
	}
function get_city(val){
	 $.ajax({url: "city_ajax.php?val="+val, success: function(result){
        $("#city1").html(result);
    }});
}
</script>
<script>
function get_subcat(id){
	if(id!=""){
		$.ajax({
			type: "post",
			url : "subcatajax.php?id="+id,
			success:function(response){
				$("#prof_sub").html(response);
			}
		});
	}
}
</script>