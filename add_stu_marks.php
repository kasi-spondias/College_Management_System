<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>FACULTY DASHBOARD</title>
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
?>
<?php 
if(isset($_POST['submit'])){ 
$branch = $_POST['branch'];
$sem = $_POST['semester'];
$roll = $_POST['roll_no'];
$exa = $_POST['exam'];
$subject=$_POST['subject'];
$totmarks = $_POST['total_marks'];
$stumarks = $_POST['stu_marks'];

    $get_mark = $db->query("select * from add_stu_marks where roll_no='$roll'") or die(mysqli_error());
    $get_rows = mysqli_num_rows($get_mark);
$query = $db->query("INSERT INTO `add_stu_marks`(`id`, `roll_no` , `branch`, `semester` , `exam` , `subject`, `total_marks`, `stu_marks`) VALUES ('','$roll','$branch','$sem','$exa','$subject','$totmarks','$stumarks')") or die(mysqli_error());
		
		if($query){
			echo "<script>alert('Successful')</script>";
			}
			else{
				echo "<script>alert('Failed')</script>";
				}
}
?>
<div class="container">
<div class="row m50_0">
    	<div class="col-md-5 col-sm-5 col-xs-12 centerconten">
		<div class="innercontsec neclasec">
<form method="post">
<label>Enter Student Roll No:</label><input type="text" name="roll_no"required />
<label class="lable_1">Select Branch</label>
<select class="form-control modal_form" name="branch" id="branch" onchange="selectSubj(this.options[this.selectedIndex].value)" required="required">
       <option value="">Select Branch</option>
                    <option value="ECE" >ECE</option>
                    <option value="EEE" >EEE</option>
                    <option value="CSE">CSE</option>
                    <option value="CIVIL" >CIVIL</option>
                    <option value="MECHANICAL" >MECHANICAL</option>
</select>
       <label class="lable_1">Select Semester</label>
            <select name="semester" id="sem"required >
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
            <select name="exam" id="exa" required>
            	<option value="">Select Exam</option>
                <option value="Mid-1">Mid-1</option>
                <option value="Mid-2">Mid-2</option>
            </select>
			<label class="lable_1">Select Subject</label>
             <span id="subj_loader"></span>
            <select class="form-control modal_form" name="subject" id="subj_dropdown"required>
                <option value="">Select Subject</option>
             </select>
<label>Total Marks</label><input type="text" name="total_marks"required />
<label>Student marks</label><input type="text" name="stu_marks"required />
<input class="btn modal_form_btn" type="submit" name="submit" />
</form>
</div>
</div></div></div>

<!-- End Content -->

<script type="text/javascript">
	function selectSubj(branch){ //alert(branch);
	if(branch!=""){
		loadBatch('Select Subject',branch);	
	}else{
		$("#subj_dropdown").html("<option value=''>Select Subject</option>");	
	}
}

function loadBatch(loadType,loadId){ 
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	$("#subj_loader").show();
    $("#subj_loader").fadeIn(400).html('Please wait... <img src="images/loading.gif" />');
	$.ajax({
		type: "POST",
		url: "load_subj.php",
		data: dataString,
		cache: false,
		success: function(result){
			$("#subj_loader").hide();
			$("#subj_dropdown").html("<option value=''> "+loadType+"</option>");  
			$("#subj_dropdown").append(result);  
		}
	});
}
</script>
<?php 
include('footer.php');
include('js_files.php');
}else{
	header("location:index.php");
	}
?>
</body>
</html>