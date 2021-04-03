<?php
	include('db.php');
	error_reporting(0);
	$loadType=$_POST['loadType']; //echo $loadId;
	$loadId=$_POST['loadId'];
	
	$sql = $db->query("select * from `stu_subjects` where stream='$loadId'") or die(mysqli_error());
	while($row = mysqli_fetch_assoc($sql)){
		$HTML.="<option value='".$row['subject']."'>".$row['subject']."</option>";
	}
	echo $HTML;
?>