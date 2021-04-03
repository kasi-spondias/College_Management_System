<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>STUDENT REFERENCE BOOK DETAILS</title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php 
include('db.php');
include('stu_header.php'); 
if(isset($_SESSION['roll_no'])){ 
$roll_no = $_SESSION['roll_no'];
	$query = $db->query("select * from student_register where roll_no='$roll_no'") or die(mysqli_error());
	$row = mysqli_fetch_assoc($query);
	$sem = $row['semister'];
?>
<div class="sub_header_bg">
	ADD QUERIES/COMPLAINTS
</div>	
<div class="strip" align="right">
	<a href="index.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">ADD QUERIES/COMPLAINTS</a>
</div>
<?php
		if(isset($_POST['query_submit'])){ //echo "<pre />"; print_r($_POST); die;
		$std_id = $_POST['stu_id'];
		$qual = $_POST['qualification'];
		$stream = $_POST['stream'];
		$sem = $_POST['semester'];
		$queries = $_POST['queries'];
		$query = $db->query("INSERT INTO `queries`(`id`, `roll_no`, `qualification`, `stream`, `semester`, `query`) VALUES ('','$std_id','$qual','$stream','$sem','$queries')") or die(mysqli_error());
		
		if($query){
			echo "<script>alert('Successfully Updated Queries...!')</script>";
	}
			
		
}
?>

<!-- Start Content -->
    
<div class="row m40_0">
        
	<div class="col-md-4">
    	<form action="" method="post">
             <div class="row">
             <label class="lable_1">Student Roll Number</label>
             <input type="text" class="form-control modal_form" placeholder="Student Id" name="stu_id" readonly="readonly" value="<?php echo $roll_no; ?>" />
             <label class="lable_1">Qualification</label>
             <select class="form-control modal_form" name="qualification" required="required">
                <option value="B.Tech" selected="selected">B.Tech</option>
             </select>
             <label class="lable_1">Select Stream</label>
             <select class="form-control modal_form" name="stream" required="required">
                <option value="">Select Stream</option>
                    <option value="ECE" <?php if($row['branch']=='ECE')echo "selected" ?> >ECE</option>
                    <option value="EEE" <?php if($row['branch']=='EEE')echo "selected" ?> >EEE</option>
                    <option value="CSE" <?php if($row['branch']=='CSE')echo "selected" ?> >CSE</option>
                    <option value="CIVIL"  <?php if($row['branch']=='CIVIL')echo "selected" ?>>CIVIL</option>
                    <option value="MECHANICAL" <?php if($row['branch']=='MECHANICAL')echo "selected" ?> >MECHANICAL</option>
             </select>
             <label class="lable_1">Semester</label>
			 <select class="form-control modal_form" name="semester" required="required>
             	<option value="">Select Semester</option>
                <option value="1-1" <?php if($row['semister']=='1-1')echo "selected" ?> >1-1</option>
                <option value="1-2" <?php if($row['semister']=='1-2')echo "selected" ?> >1-2</option>
                <option value="2-1" <?php if($row['semister']=='2-1')echo "selected" ?> >2-1</option>
                <option value="2-2" <?php if($row['semister']=='2-2')echo "selected" ?> >2-2</option>
                <option value="3-1" <?php if($row['semister']=='3-1')echo "selected" ?> >3-1</option>
                <option value="3-2" <?php if($row['semister']=='3-2')echo "selected" ?> >3-2</option>
                <option value="4-1" <?php if($row['semister']=='4-1')echo "selected" ?> >4-1</option>
                <option value="4-2" <?php if($row['semister']=='4-2')echo "selected" ?> >4-2</option>
             </select>
             <label class="lable_1">Query</label>
             <textarea cols="" rows="3" class="form-control modal_form" name="queries"></textarea>
            </div>
           <div class="clearfix"></div>
           <div class="row">
                <input type="submit" class="btn cus_btn" name="query_submit" value="SUBMIT" />
                <input type="reset" class="btn cus_btn" value="CLEAR" />
           </div>
         </form>
    </div>
    
    <div class="col-md-8">
    	
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