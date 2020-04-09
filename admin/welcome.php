<?php include'header.php'; 
include'leftmenu.php';?> 

   

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Stats -->
<div class="row">
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-primary bg-darken-2 media-left media-middle">
                        <i class="icon-users font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-primary white media-body">
                        <h5>Users</h5>
                        <h5 class="text-bold-400"><!--<i class="ft-plus"></i>--> <?php echo $com_obj->approved_user(); ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-danger bg-darken-2 media-left media-middle">
                        <i class="fa fa-building-o font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-danger white media-body">
                        <h5><?=$keyword;?>s</h5>
                        <h5 class="text-bold-400"><!--<i class="ft-arrow-up"></i>--><?php echo $com_obj->approved_lawyer(); ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-warning bg-darken-2 media-left media-middle">
                        <i class="fa fa-calendar font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-warning white media-body">
                        <h5>Completed Orders</h5>
                        <h5 class="text-bold-400"><!--<i class="ft-arrow-down"></i>--><?php echo $com_obj->ordercunt(); ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-success bg-darken-2 media-left media-middle">
                        <i class="fa fa-comments-o font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-success white media-body">
                        <h5>Reviews</h5>
                        <h5 class="text-bold-400"><!--<i class="ft-arrow-up"></i>--><?php echo $com_obj->approved_reviews(); ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Stats -->
<!--Product sale & buyers -->
<!--<div class="row match-height">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header card_bg_green">
                <h4 class="card-title" style="color:#000;">Recent Booking</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <!--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>-->
                        <!--<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body brdr_green">
               <? $GetRecords=$db->get_all("select * from appointment order by id desc limit 5"); ?>
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                                <th>S.No.</th>
									<th>User Name</th>
									<th><?=$keyword;?> Name</th>
									<th>Services</th>
									<th>Consultant Fee</th>
									<th>Booking Date</th>
                                   
                                    
                            </tr>
                        </thead>
                        <tbody>
						<?
						$sno=1;
						foreach($GetRecords as $i=>$GetRecord) {
                        $idvalue = $GetRecord['id'];
	                    $booking_id = $GetRecord['booking_id'];
	                    $user_id = $GetRecord['user_id'];
	                    $lawyer_id = $GetRecord['lawyer_id'];
	                    $book_date=$GetRecord['book_date'];
	                    $time=$GetRecord['time'];
	                    $case_type=$GetRecord['case_type'];
	                    $getcase=$db->singlerec("select * from category where id='$case_type'");
	                    $comment = $GetRecord['comment'] ;	
	                    $approve_status = $GetRecord['approve_status'] ;
	                    $getAmount=$db->singlerec("select pay_amount from  transaction where trans_id='$booking_id'");
	                    $tot_amount = $getAmount["pay_amount"]; ?>
                            <tr>
                                <td  align='left'><?=$sno;?></td>
				               <td  align='left' class='name'><? echo $com_obj->get_name($user_id); ?></a></td>
				               <td  align='left'><? echo $com_obj->get_name($lawyer_id); ?></a></td>
				                <td  align='left'><?=ucfirst($getcase['category_name']);?></td>
				                <td  align='left'><?=$tot_amount;?></td>				
				                <td  align='left'><?=date('d-M-Y',strtotime($book_date));?></td>
                            </tr>
							<? $sno++;
                             } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>-->


<div class="row match-height">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header card_bg_orng">
                <h4 class="card-title">Recent <?=$keyword;?>s</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <!--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>-->
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body brdr_orng">
                
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th><?=$keyword;?> Name</th>
                                <th>Email</th>
                                <th>IP</th>
                                <th>Date of Join</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php $recentuser=$db->get_all("select fname,email,lname,id,crcdt,reg_ip,login_ip_addr,crcdt from register where active_status='1' and user_role='1' order by id desc limit 5 " );?>
                           
						   <?php 
						   $sno=1;
						   foreach($recentuser as $user){
							 $idvalue1=$user['id'];
							 $fname = $user['fname'];
	                         $lname = $user['lname'];
							 $name= $fname.' '.$lname;
                             $crcdt=date('d-M-Y',strtotime($user['crcdt']));	
                             $rating = overall_Rate($idvalue);								 ?>
						   <tr>
                                <td class="text-truncate"><?=$sno;?></td>
                                <td class="text-truncate"><?=$name;?></td>
								<td class="text-truncate"><?=$user['email'];?></td>
								<td class="text-truncate"><?=$user['reg_ip'];?></td>
								<td class="text-truncate"><?=$crcdt;?></td>
								<td class="text-truncate"><a href="company-view.php?id=<?=$idvalue1;?>">View</a></td>
                            </tr>
						   <? $sno++; } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row match-height">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header card_bg_red">
                <h4 class="card-title">Recent User</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <!--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>-->
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body brdr_red">
                
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
						
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>IP</th>
                                <th>Date of Join</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php $penduser=$db->get_all("select id,email,reg_ip,fname,login_ip_addr,crcdt from register where active_status='1' and user_role='0' order by id desc limit 5 " );?>
                          <?php 
						        $sno=1;
						        foreach($penduser as $pend){
							    $idvalue= $pend['id'];
								$username = $pend['fname'];
								$username = checkLength($username,15);
								 $crcdt=date('d-M-Y',strtotime($pend['crcdt']));	
							?>
						<tr>
                                <td class="text-truncate"><?=$sno;?></td>
                                <td class="text-truncate"><?=$username;?></td>
								<td class="text-truncate"><?=$pend['email'];?></td>
								<td class="text-truncate"><?=$pend['reg_ip'];?></td>
								<td class="text-truncate"><?=$crcdt;?></td>
								<td class="text-truncate"><a href="userview.php?id=<?=$idvalue;?>">View</a></td>
                            </tr>
								<? $sno++; } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




        </div>
      </div>
    </div>
    
<? include 'footer.php';?>