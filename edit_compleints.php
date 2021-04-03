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
	include('faculty_header.php'); 
	if(isset($_SESSION['email_id'])){
		$email = $_SESSION['email_id'];
	$query = $db->query("select * from faculty_register where email_id='$email'") or die(mysqli_error());
	$row = mysqli_fetch_assoc($query);
	$name = $row['name'];

	$id = $_GET['id'];
	$query = $db->query("select * from queries where id='$id'") or die(mysqli_error());
	$row = mysqli_fetch_assoc($query);	//echo "<pre />"; print_r($row); die;
	
	if(isset($_POST['update_queries'])){ //echo "<pre />"; print_r($_POST); die;
		$solution = $_POST['solution'];
		$query = $db->query("UPDATE `queries` SET `solution`=CONCAT('$solution,<br />',solution),`uploaded_by`=CONCAT('$name,<br />',uploaded_by) WHERE id='$id'") or die(mysqli_error);
		
		if($query){
		header('location:view-queries-complaints.php');
		//header('location: '.$_SERVER['PHP_SELF']);	
		}else{
		echo "<script>alert('Updation Failure.');</script>";	
		//header('location: '.$_SERVER['PHP_SELF']);
		}

	}

?>

<div class="sub_header_bg">
	Reply Complaints
</div>	
<div class="strip" align="right">
	<a href="index.php">Index</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">UPDATE Complaints</a>
</div>


<!-- Start Content -->
    
    <div class="row m50_0">
    	<div class="col-md-5 col-sm-5 col-xs-12">
          <form action="" method="post">
          	<label class="lable_1">Student Roll Number</label>
             <input type="text" class="form-control modal_form" placeholder="Student Id" name="stu_id" readonly="readonly" value="<?php echo $row['roll_no'] ?>" />
             <label class="lable_1">Qualification</label>
             <select class="form-control modal_form" name="qualification" required="required" disabled="disabled">
                <option value="B.Tech" <?php if($row['qualification']== 'B.Tech') echo "selected"?>>B.Tech</option>
             </select>
             <label class="lable_1">Select Stream</label>
             <select class="form-control modal_form" name="stream" required="required" disabled="disabled">
                <option value="">Select Stream</option>
                    <option value="ECE" <?php if($row['stream']== 'ECE') echo "selected"?>>ECE</option>
                    <option value="EEE" <?php if($row['stream']== 'EEE') echo "selected"?>>EEE</option>
                    <option value="CSE" <?php if($row['stream']== 'CSE') echo "selected"?>>CSE</option>
                    <option value="CIVIL" <?php if($row['stream']== 'CIVIL') echo "selected"?>>CIVIL</option>
                    <option value="MECHANICAL" <?php if($row['stream']== 'MECHANICAL') echo "selected"?>>MECHANICAL</option>
             </select>
			<label class="lable_1">Select Semester</label>
            <select class="form-control modal_form" name="semester" disabled="disabled">
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
            
            <label class="lable_1">Query</label>
            <textarea cols="" rows="3" class="form-control modal_form" name="queries"><?php echo $row['query'] ?></textarea>
            
 			<label class="lable_1">Solution</label>
            <textarea cols="" rows="3" class="form-control modal_form" name="solution"></textarea>
            
            <button class="btn modal_form_btn" name="update_queries" type="submit">SUBMIT SOLUTION</button>
           </form>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-12"></div>
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