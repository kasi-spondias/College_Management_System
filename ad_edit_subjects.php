<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>SUBJECTS MODIFICATION</title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php
 	include('db.php');
	include('admin_header.php'); 
	if(isset($_SESSION['u_name'])){
		
	$id = $_GET['id'];
	$query = $db->query("select * from stu_subjects where id='$id'") or die(mysqli_error());
	$row = mysqli_fetch_assoc($query);	//echo "<pre />"; print_r($row); die;
	
	if(isset($_POST['update'])){ //echo "<pre />"; print_r($_POST); die;
		$stream = $_POST['stream'];
		$sem = $_POST['semister'];
		$sub = $_POST['subject'];
		$query = $db->query("UPDATE `stu_subjects` SET `stream`='$stream',`semister`='$sem',`subject`='$sub' WHERE id='$id'") or die(mysqli_error);
		
		if($query){
		header('location:ad-view-subjects.php');
		//header('location: '.$_SERVER['PHP_SELF']);	
		}else{
		echo "<script>alert('Updation Failure.');</script>";	
		//header('location: '.$_SERVER['PHP_SELF']);
		}

	}

?>

<div class="sub_header_bg">
	UPDATE SUBJECTS
</div>	
<div class="strip" align="right">
	<a href="index.php">Index</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">UPDATE Subjects</a>
</div>


<!-- Start Content -->
    
    <div class="row m40_0">
    	<form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8 col-sm-8 col-xs-12" align="center"><img src="images/ad_course.png" class="img img-responsive" /></div>  
      <div class="col-md-4 col-sm-4 col-xs-12">
        	 <label class="lable_1">Qualification</label>
             <select class="form-control modal_form" name="qualification" required="required">
             	<option value="B.Tech">B.Tech</option>
             </select>
             <label class="lable_1">Stream</label>
             <select class="form-control modal_form" name="stream" required="required">
             	<option value="">Select Stream</option>
                <option value="ECE" <?php if($row['stream']== 'ECE') echo "selected"?>>ECE</option>
                <option value="EEE" <?php if($row['stream']== 'EEE') echo "selected"?>>EEE</option>
                <option value="CSE" <?php if($row['stream']== 'CSE') echo "selected"?>>CSE</option>
                <option value="CIVIL" <?php if($row['stream']== 'CIVIL') echo "selected"?>>CIVIL</option>
                
             </select>
             <label class="lable_1">Semester</label>
			 <select class="form-control modal_form" name="semister" required="required">
             	<option value="">Select Semester</option>
                <option value="1-1" <?php if($row['semister']== '1-1') echo "selected"?>>1-1</option>
                <option value="1-2" <?php if($row['semister']== '1-2') echo "selected"?>>1-2</option>
                <option value="2-1" <?php if($row['semister']== '2-1') echo "selected"?>>2-1</option>
                <option value="2-2" <?php if($row['semister']== '2-2') echo "selected"?>>2-2</option>
                <option value="3-1" <?php if($row['semister']== '3-1') echo "selected"?>>3-1</option>
                <option value="3-2" <?php if($row['semister']== '3-2') echo "selected"?>>3-2</option>
                <option value="4-1" <?php if($row['semister']== '4-1') echo "selected"?>>4-1</option>
                <option value="4-2" <?php if($row['semister']== '4-2') echo "selected"?>>4-2</option>
             </select>
             <label class="lable_1">Subject</label>
			 <input type="text" class="form-control modal_form" name="subject" value="<?php echo $row['subject'];?>" required="required" placeholder="Subject Name" required="required"/>
             <input type="submit" class="btn cus_btn" name="update" value="UPDATE" />
            <input type="reset" class="btn reset_btn" value="CLEAR" />
        </div>  
        
    </div>
    
<!-- End Content -->



<?php 
include('footer.php');
include('js_files.php');
}else{
	header("location:index.php");
	}
?>
</body>
</html>