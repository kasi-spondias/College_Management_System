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
include('faculty_header.php'); 
if(isset($_SESSION['email_id'])){ 
$exam_id=$_GET['exam_id'];
$roll_no = $_SESSION['email_id'];

?>

<div class="container">
<div class="row m50_0">
    	<div class="col-md-5 col-sm-5 col-xs-12 centerconten">
		<div class="innercontsec neclasec">
<form method="post">
<label class="lable_1">Select Branch</label>
 <select class="form-control modal_form" name="branch" id="branch" onchange="selectSubj(this.options[this.selectedIndex].value)" required="required">
                <option value="">Select Branch</option>
                    <option value="ECE" >ECE</option>
                    <option value="EEE" >EEE</option>
                    <option value="CSE">CSE</option>
                    <option value="CIVIL" >CIVIL</option>
                   
             </select>
 <label class="lable_1">Select Semester</label>
            <select name="semester" id="sem" required>
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
            <select name="exam" id="exam" required>
            	<option value="">Select Exam</option>
                <option value="Mid-1">Mid-1</option>
                <option value="Mid-2">Mid-2</option>
            </select>
<label class="lable_1">Select Subject</label>
             <span id="subj_loader"></span>
            <select class="form-control modal_form" name="subject" id="subj_dropdown"required>
                <option value="">Select Subject</option>
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
if(isset($_POST['submit'])){
$branch = $_POST['branch'];
$sem = $_POST['semester'];
$exam = $_POST['exam'];
$subject = $_POST['subject'];


    $get_mark = $db->query("select * from add_stu_marks where branch='$branch' AND semester ='$sem' AND exam ='$exam' AND subject='$subject'") or die(mysqli_error());
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
	
	$i++;
	}
		}
}
?>
            </tbody>
         </table>
    </div>
  </div>
    
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