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
<!-- Start Content -->
<div class="sub_header_bg">
    ADD EXAM
</div>	
<div class="strip" align="right">
    <a href="faculty_dashboard.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">EXAM</a>
</div>
	<!-- Start Section 1 -->
    <?php
	if(isset($_POST['add_exam'])){ //echo "<pre />"; print_r($_POST); die;
		$branch = $_POST['branch'];
		$sem = $_POST['semester'];
		$subject = $_POST['subject'];
		$time_duration = $_POST['time_duration'];
		$no_of_ques = $_POST['no_of_ques'];
		$query = $db->query("INSERT INTO `exams`(`id`, `branch`, `semester`, `subject`, `time_duration`, `no_of_questions`, `uploaded_by`) VALUES ('','$branch','$sem','$subject','$time_duration','$no_of_ques','$name')") or die(mysqli_error());
		
		if($query){
			echo "<script>alert('Successfully Added Exam')</script>";
			}
			
		
		}

?>
 		  
<div class="container">
    <div class="row m50_0">
    	<div class="col-md-5 col-sm-5 col-xs-12 centerconten">
		<div class="innercontsec">
        	<form action="" method="post">
             <div class="row">
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
            <select class="form-control modal_form" name="semester" id="sem" required="required>
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
            <label class="lable_1">Select Subject</label>
             <span id="subj_loader"></span>
            <select class="form-control modal_form" name="subject" id="subj_dropdown" required="required>
                <option value="">Select Subject</option>
             </select>
             <label class="lable_1">Time Duration(Mins)</label>
             <input type="text" class="form-control modal_form" placeholder="Time Duration" name="time_duration" required="required" value="" />
             <label class="lable_1">Number of Questions</label>
              <input type="text" class="form-control modal_form" placeholder="Number of Questions" name="no_of_ques" required="required" value="" />
            </div>
           <div class="clearfix"></div>
           <div class="row">
                <input type="submit" class="btn cus_btn" name="add_exam" value="SUBMIT" />
                <input type="reset" class="btn cus_btn" value="CLEAR" />
           </div>
        </form>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-12"></div>
    </div></div>
    
	<!-- End Section 1 -->
    
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