<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>EDIT EXAMS</title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php 
include('db.php');
include('faculty_header.php'); 
if(isset($_SESSION['email_id'])){
	$email = $_SESSION['email_id'];
	$query = $db->query("select * from faculty_register where email_id='$email'") or die(mysqli_error());
	$row = mysqli_fetch_assoc($query);
	$name = $row['name'];
	
	$id = $_GET['id'];
	$query = $db->query("select * from exams where id='$id'") or die(mysqli_error());
	$row = mysqli_fetch_assoc($query);	//echo "<pre />"; print_r($row); die;
	
	if(isset($_POST['update_exam'])){ //echo "<pre />"; print_r($_POST); die;
		$branch = $_POST['branch'];
		$sem = $_POST['semester'];
		$time_duration = $_POST['time_duration'];
		$no_of_ques = $_POST['no_of_ques'];
		$query = $db->query("UPDATE `exams` SET `branch`='$branch',`semester`='$sem',`time_duration`='$time_duration',`no_of_questions`='$no_of_ques',`uploaded_by`='$name' WHERE id='$id'") or die(mysqli_error);
		
		if($query){
		header('location:view-faculty-exam.php');
		//header('location: '.$_SERVER['PHP_SELF']);	
		}else{
		echo "<script>alert('Updation Failure.');</script>";	
		//header('location: '.$_SERVER['PHP_SELF']);
		}

	}

?>

<!-- Start Content -->
<div class="sub_header_bg">
    ADD EXAM
</div>	
<div class="strip" align="right">
    <a href="faculty_dashboard.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">EXAM</a>
</div>
	<!-- Start Section 1 -->
	  
	<div class="row" style="margin:50px auto;">
    	<div class="col-md-4 col-sm-12 col-xs-12">
        	<form action="" method="post">
             <div class="row">
             <label class="lable_1">Select Branch</label>
             <select class="form-control modal_form" name="branch" required="required">
                <option value="">Select Branch</option>
                    <option value="ECE" <?php if($row['branch']== 'ECE') echo "selected"?>>ECE</option>
                    <option value="EEE" <?php if($row['branch']== 'EEE') echo "selected"?>>EEE</option>
                    <option value="CSE" <?php if($row['branch']== 'CSE') echo "selected"?> >CSE</option>
                    <option value="CIVIL" <?php if($row['branch']== 'CIVIL') echo "selected"?> >CIVIL</option>
                    <option value="MECHANICAL" <?php if($row['branch']== 'MECHANICAL') echo "selected"?> >MECHANICAL</option>
             </select>
            <label class="lable_1">Select Semester</label>
            <select class="form-control modal_form" name="semester">
            	<option value="">Select Semester</option>
                <option value="1-1" <?php if($row['semester']== '1-1') echo "selected"?>>1-1</option>
                <option value="1-2" <?php if($row['semester']== '1-2') echo "selected"?>>1-2</option>
                <option value="2-1" <?php if($row['semester']== '2-1') echo "selected"?>>2-1</option>
                <option value="2-2" <?php if($row['semester']== '2-2') echo "selected"?>>2-2</option>
                <option value="3-1" <?php if($row['semester']== '3-1') echo "selected"?>>3-1</option>
                <option value="3-2" <?php if($row['semester']== '3-2') echo "selected"?>>3-2</option>
                <option value="4-1" <?php if($row['semester']== '4-1') echo "selected"?>>4-1</option>
                <option value="4-2" <?php if($row['semester']== '4-2') echo "selected"?>>4-2</option>
            </select>
             <label class="lable_1">Time Duration(Mins)</label>
             <input type="text" class="form-control modal_form" value="<?php echo $row['time_duration'];?>" placeholder="Time Duration" name="time_duration" required="required" value="" />
             <label class="lable_1">Number of Questions</label>
              <input type="text" class="form-control modal_form" placeholder="Number of Questions" value="<?php echo $row['no_of_questions'];?>" name="no_of_ques" required="required" value="" />
            </div>
           <div class="clearfix"></div>
           <div class="row">
                <input type="submit" class="btn cus_btn" name="update_exam" value="UPDATE EXAM" />
                <input type="reset" class="btn cus_btn" value="CLEAR" />
           </div>
        </form>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12"></div>
    </div>
    
	<!-- End Section 1 -->
    
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