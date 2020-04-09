<?php
include "admin/AMframe/config.php";
$u_id=isset($id)?$id:'';
$_sid=isset($_SESSION['id'])?$_SESSION['id']:'';
$uid=isset($uid)?$uid:'';
$uid=base64_decode($uid);
if(!empty($u_id)){
$showLimit = 1;
$revw=$db->get_all("select * from review where professionalid= '{$u_id}' order by review_id DESC LIMIT ".$showLimit);
$count=$db->singlerec("select count(*) as tot from review where review_id='{$u_id}'");
foreach($revw as $revwInfo){
	$revid=$revwInfo['review_id'];
	$date=$revwInfo['crcdt'];
	$date=date("d-M-Y",strtotime($date));
	$userid=$revwInfo['user_id'];
	$profid=$revwInfo['professionalid'];
	$userrevname=$com_obj->get_name($userid);
	$comment=$revwInfo['comment'];
	$img=$com_obj->getimg($userid);
	if(empty($img)){
		$img="uploads/userprofile/noimage.jpg";
	}
	$reviewCount=$com_obj->getReview($profid);
	$totalreview=getStar($reviewCount);
?>
<div class="review_strip_single">
<img src="<?php echo $siteurl; ?>/<?php echo $img; ?>" alt="Image" class="img-circle" width="80px" height="80px">
<small> - <?php echo $date; ?> -</small>
<h4><?php echo ucfirst($userrevname); ?></h4>
<?php if($userid==$_sid){ ?>
<span class="pull-right"><a href="#" class="btn btn-sm btn-warning add_bottom_30" data-toggle="modal" onclick="return fillform(<?php echo $revid; ?>)" data-target="#myReview-<?php echo $uid; ?>">Edit My Review</a></span>
<?php } ?>
<div class="rating">
	<?php echo $totalreview; ?>
</div>
<p>
	<?php echo $com_obj->limit_text($comment,1000); ?>
</p>
</div><!-- End review strip -->
  
<?php  } ?>
<?php if($count > $showLimit){ ?>
    <div class="show_more_main" id="show_more_main<?php echo $profid; ?>">
        <span id="<?php echo $profid; ?>" class="show_more" title="Load more posts">Show more</span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading…</span></span>
    </div>
<?php } ?>
<?php } ?>