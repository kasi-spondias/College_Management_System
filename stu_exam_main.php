<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>STUDENT EXAMS</title>
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
	$branch = $row['branch']; //echo $branch;
	$sem = $row['semister']; //echo $sem;
?>
<!-- Start Content -->
<div class="sub_header_bg">
    EXAMS
</div>	
<div class="strip" align="right">
    <a href="faculty_dashboard.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">EXAMS</a>
</div>
	<!-- Start Section 1 -->
 		  
		<div class="row m40_0">
        <div class="clearfix"></div>
          <div class="row m20_auto">
                <?php
					$sql = $db->query("select * from exams where branch='$branch' and semester='$sem'") or die(mysqli_error());
					while($rows = mysqli_fetch_assoc($sql)){ $_SESSION['TIME'] = $rows['time_duration'];
					$subject = $rows['subject'];
				?>
                <div class="col-md-4" align="center">
                <div class="row c_assignments_1">
                <div class="h4_bold_font"><?php echo $rows['subject'];?></div>
                <div class="h6_bold_font">
                    <div class="row">
                        <div class="std_exams_box">Number of questions : <?php echo $rows['no_of_questions'];?></div>
                        <div class="std_exams_box">Time : <?php echo $rows['time_duration'];?> minutes</div>
                    </div>
                </div>
                <div class="h6_bold_font_1">DO NOT refresh the page.</div>
                <?php
					$cnt_query = $db->query("select * from stud_ans where roll_no='$roll_no' and subject='$subject'") or die(mysqli_error());
					$count = mysqli_num_rows($cnt_query);
				?>
                <div class="asmts_btn_bottom"><a href="<?php if($count >= 1){ ?> javascript:alert('You have already attended for the exam') <?php } else {?> stu_exams.php?exam_id=<?php echo $rows['id'];}?>" class="cus_form_btn_1"> Start Test</a></div>
            </div>
            </div>
            <?php } ?>
		</div>
        
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