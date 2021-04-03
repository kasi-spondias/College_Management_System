<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>EXAM RESULTS</title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php 
include('db.php');
include('stu_header.php'); 
if(isset($_SESSION['roll_no'])){ 
$exam_id=$_GET['exam_id'];
$roll_no = $_SESSION['roll_no'];
}
?>

<div class="container">
<div class="row m50_0">
    	<div class="col-md-5 col-sm-5 col-xs-12 centerconten">
		<div class="innercontsec neclasec">
<form method="post">
<label>Enter Student Roll No:</label><input type="text" name="roll_no" value = "<?php  echo $roll_no; ?>" disabled="disabled"/>
 <label class="lable_1">Select Semester</label>
            <select name="semester" id="sem">
            	<option value="">Select Semester</option>
                <option value="1-1">1-1</option>
                <option value="1-2">1-2</option>
                <option value="2-1">2-1</option>
                <option value="2-2">2-2</option>
                <option value="3-1">3-1</option>
                <option value="3-2">3-2</option>
                <option value="4-1">4-1</option>
                <option value="4-2">4-2</option>
            </select>
 <label class="lable_1">Exams</label>
            <select name="exam" id="exam">
            	<option value="">Select Exam</option>
                <option value="Mid-1">Mid-1</option>
                <option value="Mid-2">Mid-2</option>
            </select>
            
<input class="btn modal_form_btn" type="submit" name="submit" />
</form>
</div></div></div></div>


<!-- Start Content -->
    
    <div class="row m40_0">
        <div class="contact_form_text" style="margin-top:20px;">View marks</div>
        <div align="center"><img src="images/shadow.png" class="img img-responsive" /></div>
        <?php
			if(isset($_GET['del'])){ ?>
                <div class="col-sm-12">
                	<div class="alert alert-danger" role="alert">
                    	<strong>Success!</strong> Reference Books has been deleted successfully!
                    </div>
                </div>	
		<?php }?>
        <div class="clearfix"></div>
        <div style="overflow-x:scroll">
        <table class="table table-bordered" id="pages">
        	<thead>
            	<tr>
                	<th class="text-center">S.No</th>
                    <th class="text-center">Student Roll No</th>
                    <th class="text-center">Exam</th>
					<th class="text-center">Subject</th>
                    <th class="text-center">Total marks</th>
                    <th class="text-center">student marks</th>
                </tr>
            </thead>
            <tbody>
            	
               <?php
if(isset($_SESSION['roll_no'])){ 
$exam_id=$_GET['exam_id'];
$roll_no = $_SESSION['roll_no'];
if(isset($_POST['submit'])){ 

$exam = $_POST['exam'];
$sem = $_POST['semester'];
    $get_mark = $db->query("select * from add_stu_marks where roll_no ='$roll_no' AND exam ='$exam' AND semester ='$sem'") or die(mysqli_error());
    $get_rows = mysqli_num_rows($get_mark);
	$i=1;
	if($get_rows==0){
		 echo "<script>alert('No Data Available for this exam')</script>";
	}else{
		while($c_row = mysqli_fetch_assoc($get_mark)){ 
            echo '<tr align="center">'; 
	echo '<td>'.$i.'</td>';
	?>
	<span class="rollno"> <?php echo '<td>'.$c_row['roll_no'].'</td>'; ?></span>
	<span class="working"> <?php echo '<td>'.$c_row['exam'].'</td>'; ?></span>
	<span class="working"> <?php echo '<td>'.$c_row['subject'].'</td>'; ?></span>
	<span class="attend"> <?php echo '<td>'.$c_row['total_marks'].'</td>'; ?></span>
	<span class="attend"> <?php echo '<td>'.$c_row['stu_marks'].'</td>'; ?></span>

    <?php
	
	
	}
		}
}
?>
            </tbody>
         </table>
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