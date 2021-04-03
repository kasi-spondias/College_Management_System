<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>Free PHP Projects | Free B.Tech, M.Tech Projects</title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php
 	include('db.php');
	include('admin_header.php'); 
	if(isset($_SESSION['u_name'])){
		
	$id = $_GET['id'];
	$query = $db->query("select * from alumni_reg where id='$id'") or die(mysqli_error());
	$row = mysqli_fetch_assoc($query);	//echo "<pre />"; print_r($row); die;
	
	if(isset($_POST['update'])){ //echo "<pre />"; print_r($_POST); die;
		$u_name = $_POST['u_name'];
		$roll_no = $_POST['roll_no'];
		$email_id = $_POST['email_id'];
		$dob = $_POST['dob'];
		$batch = $_POST['batch'];
		$branch = $_POST['branch'];
		$designation=$_POST['designation'];
		$work=$_POST['work'];
		$query = $db->query("UPDATE `alumni_reg` SET `u_name`='$u_name',`roll_no`='$roll_no',`email_id`='$email_id',`dob`='$dob',`batch`='$batch',`branch`='$branch',`designation`='$designation',`work`='$work' WHERE id='$id'") or die(mysqli_error());
		
		if($query){
		header('location:view-alumni.php');
		//header('location: '.$_SERVER['PHP_SELF']);	
		}else{
		echo "<script>alert('Updation Failure.');</script>";	
		//header('location: '.$_SERVER['PHP_SELF']);
		}

	}

?>

<div class="sub_header_bg">
	UPDATE ALUMNI DETAILS
</div>	
<div class="strip" align="right">
	<a href="index.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">Alumni Details</a>
</div>


<!-- Start Content -->
    
    <div class="row m40_0">
    	<form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8 col-sm-8 col-xs-12" align="center"><img src="images/ad_course.png" class="img img-responsive" /></div>  
      <div class="col-md-4 col-sm-4 col-xs-12">
        	 <label class="lable_1">Student Name</label>
             <input class="form-control modal_form" type="text" name="u_name" placeholder="Name" value="<?php echo $row['name'];?>" />
             <label class="lable_1">Roll Number</label>
             <input class="form-control modal_form" type="text" name="roll_no" placeholder="Roll Number" value="<?php echo $row['roll_no'];?>" />
             <label class="lable_1">Email Id</label>
             <input class="form-control modal_form" type="email" name="email_id" placeholder="Email Id" value="<?php echo $row['email_id'];?>" />
             <label class="lable_1">Date of Birth</label>
             <input class="form-control modal_form" type="date" name="dob" placeholder="Date of Birth" value="<?php echo $row['dob'];?>" />
			 <label class="lable_1">Batch</label>
             <input class="form-control modal_form" type="text" name="batch" placeholder="Year of Study" value="<?php echo $row['batch'];?>" />
			 
             <label class="lable_1">Branch</label>
             <select class="form-control modal_form" name="branch">
             	<option value="">Select Branch</option>
                <option value="ECE" <?php if($row['branch']== 'ECE') echo "selected"?>>ECE</option>
                <option value="EEE" <?php if($row['branch']== 'EEE') echo "selected"?>>EEE</option>
                <option value="CSE" <?php if($row['branch']== 'CSE') echo "selected"?>>CSE</option>
                <option value="CIVIL" <?php if($row['branch']== 'CIVIL') echo "selected"?>>CIVIL</option>
                <option value="MECHANICAL" <?php if($row['branch']== 'MECHANICAL') echo "selected"?>>MECHANICAL</option>
             </select>
             <label class="lable_1">Designation</label>
			 <select class="form-control modal_form" name="designation">
             	<option value="">Select Designation</option>
                <option value="higher_studies" <?php if($row['designation']== 'higher_studies') echo "selected"?>>Higher Studies</option>
                <option value="placements" <?php if($row['designation']== 'placements') echo "selected"?>>Placements</option>
                <option value="others" <?php if($row['designation']== 'others') echo "selected"?>>Others</option>
             </select>
			 <label class="lable_1">Work</label>
             <input class="form-control modal_form" type="work" name="work" placeholder="Write about your work" value="<?php echo $row['work'];?>" />
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