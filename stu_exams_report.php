<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>STUDENT EXAM REPORTS</title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php 
include('db.php');
include('stu_header.php'); 
if(isset($_GET['exam_id'])){
	$exam_id = $_GET['exam_id'];
}
if(isset($_GET['ins'])){
	echo "<script>alert('Exam has been Submitted Successfully. Thank You for Participating');</script>";
}
if(isset($_SESSION['roll_no'])){ 
	$roll_no = $_SESSION['roll_no'];
	$query = $db->query("select * from student_register where roll_no='$roll_no'") or die(mysqli_error());
	$row = mysqli_fetch_assoc($query);
	$sem = $row['semister'];
    $stu_name = $row['name'];

?>
<!-- Start Content -->
<div class="sub_header_bg">
    EXAM REPORTS
</div>	
<div class="strip" align="right">
    <a href="faculty_dashboard.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">EXAM REPORTS</a>
</div>
<!-- Start Section 1 -->  
    <div class="row m40_0">
     <div class="col-md-2"></div>
    	<div class="col-md-8">
        	<?php
				//Getting correct answers count by joind exam_ques and stud_ans tables
				$crt_query = $db->query("select * from questions inner join stud_ans on questions.exam_id=stud_ans.exam_id where questions.exam_id='$exam_id' and questions.id=stud_ans.ques_id and questions.correct_ans=stud_ans.stud_ans and stud_ans.roll_no='$roll_no'") or die(mysqli_error());				
				$crt_count = mysqli_num_rows($crt_query);
				//Getting Total No. Of Questions from exams table
				$tot_query = $db->query("select * from stud_ans where exam_id='$exam_id' and roll_no='$roll_no'") or die(mysqli_error());
				//$tot_row = mysqli_fetch_assoc($tot_ques);
				$no_of_ques = mysqli_num_rows($tot_query);
				
				//Getting the no. of answered and unanswered questions
				$ans_query = $db->query("select * from stud_ans where exam_id='$exam_id' and stud_ans !='' and roll_no='$roll_no'") or die(mysqli_error());
				$ans_cnt = mysqli_num_rows($ans_query);
				$unans_cnt = $no_of_ques - $ans_cnt;
				//Getting the Subject Details
				$subj_row = mysqli_fetch_assoc($ans_query);
				$subject = $subj_row['subject'];
				 
				//Inserting the exam result into database
				//Remove Duplicates
				$dup_query = $db->query("select * from exam_report where exam_id='$exam_id' and roll_no='$roll_no'") or die(mysqli_error());
				$dup_cnt= mysqli_num_rows($dup_query);
				if($dup_cnt < 1){
					$db->query("INSERT INTO `exam_report`(`id`, `exam_id`, `roll_no`,`student_name`, `subject`, `marks_secured`, `total_marks`) VALUES ('','$exam_id','$roll_no','$stu_name','$subject','$crt_count','$no_of_ques')") or die(mysqli_error());
				}
			
			?>
        	<div style="border:1px solid #06F;">
			    <div class="inner_strip" align="center"> <b>MARKS : <?php echo $crt_count?> / <?php echo $no_of_ques?></b> </div>  
                 <div class="row course_border">
                    <div class="p20_0"><div class="exam_ret">Total number of questions</div> <div class="exam_ret_1">:</div> <div class="exam_ret_2"><?php echo $no_of_ques?></div></div>
                    <div class="p20_0"><div class="exam_ret">Number of answered questions</div> <div class="exam_ret_1">:</div><div class="exam_ret_2"><?php echo $ans_cnt?></div></div>
                    <div class="p20_0" style="margin-bottom:10px;"><div class="exam_ret">Number of unanswered questions</div> <div class="exam_ret_1">:</div><div class="exam_ret_2"><?php echo $unans_cnt?></div></div>  
					
                </div>
             </div>
             <div class="row" style="border:1px solid #CCC;">
             	<div class="exam_re_text_color">Test Review : View answers for this test.</div>  
               <div class="clearfix"></div>
               <form action="" method="post" enctype="multipart/form-data">  	    
                    <div class="row m10">
                    	 <?php
                            $i = 1;
                            $ques = $db->query("select * from questions inner join stud_ans on questions.exam_id=stud_ans.exam_id where questions.exam_id='$exam_id' and questions.id=stud_ans.ques_id and stud_ans.roll_no='$roll_no'") or die(mysqli_error()); 
							//echo "<pre />"; print_r(mysqli_fetch_assoc($ques)); die;
                            while($row = mysqli_fetch_assoc($ques)){ 
                                $ques_id = $row['id'];
								
								//Coverting the Answers into Options
								if($row['correct_ans']=="Ans1"){
									$c_ans = "A";
								} elseif($row['correct_ans']=="Ans2"){
									$c_ans = "B";
								} elseif($row['correct_ans']=="Ans3"){
									$c_ans = "C";
								} elseif($row['correct_ans']=="Ans4"){
									$c_ans = "D";
								}
								
								if($row['stud_ans']=="Ans1"){
									$us_ans = "A";
								} elseif($row['stud_ans']=="Ans2"){
									$us_ans = "B";
								} elseif($row['stud_ans']=="Ans3"){
									$us_ans = "C";
								} elseif($row['stud_ans']=="Ans4"){
									$us_ans = "D";
								} elseif($row['stud_ans']==""){
									$us_ans = "No Answer";
								}
                            ?>
                        <input type="hidden" name="ques_id" value="<?php echo $ques_id?>">
                            <p><?php echo $i?> . <?php echo $row['question']?></p>	
                            <div class="radio radio-success">
                            <input type="radio" name="radio<?php echo $ques_id?>" id="radio<?php echo $ques_id?>1" value="Ans1" <?php if($row['correct_ans']=="Ans1") echo "checked=checked"?>>
                                <label for="radio<?php echo $ques_id?>1">
                                   A) <?php echo $row['ans_1']?>
                                </label>
                            </div>
                            <div class="radio radio-success">
                            <input type="radio" name="radio<?php echo $ques_id?>" id="radio<?php echo $ques_id?>2" value="Ans2" <?php if($row['correct_ans']=="Ans2") echo "checked=checked"?>>
                            <label for="radio<?php echo $ques_id?>2">
                              B) <?php echo $row['ans_2']?>
                            </label>
                            </div>
                            <div class="radio radio-success">
                                <input type="radio" name="radio<?php echo $ques_id?>" id="radio<?php echo $ques_id?>3" value="Ans3" <?php if($row['correct_ans']=="Ans3") echo "checked=checked"?>>
                                <label for="radio<?php echo $ques_id?>3">
                                  C) <?php echo $row['ans_3']?>
                                </label>
                            </div>
                            <div class="radio radio-success">
                                <input type="radio" name="radio<?php echo $ques_id?>" id="radio<?php echo $ques_id?>4" value="Ans4" <?php if($row['correct_ans']=="Ans4") echo "checked=checked"?>>
                                <label for="radio<?php echo $ques_id?>4">
                                  D) <?php echo $row['ans_4']?>
                                </label>
                            </div>
                           <div class="exam_ret_color">Your Answer : Opction <span class="c_ans">( <?php echo $us_ans?> )</span></div>
                    	   <div class="exam_ret_color_1">Correct Answer : Opction <span class="c_ans">( <?php echo $c_ans; ?>)</span></div>
                           <div class="clearfix m20_0"></div>
  						<?php $i++;} ?>
                     </div>
                
            </form> 
             </div>
         </div>
         <div class="col-md-2"></div>
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