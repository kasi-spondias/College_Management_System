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

$id = $_GET['id']; 

    


if(isset($_GET['id'])){
	$exam_id = $_GET['id'];
	$sql = $db->query("select * from exams where id='$exam_id'") or die(mysqli_error());		
	$row = mysqli_fetch_assoc($sql);
	$branch = $row['branch'];
	$sem = $row['semester'];
	$subject = $row['subject'];
}
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
    <a href="faculty_dashboard.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">Add Questions for <b><?php echo $subject?></b></a>
</div>
	<!-- Start Section 1 -->
    <?php
	if(isset($_POST['submit'])){
    $get_questions = $db->query("Select * from exams where id='$id'");
    $q_row = mysqli_fetch_assoc($get_questions);
    $ques = $q_row['no_of_questions'];
    
    $get_count = $db->query("Select * from questions where exam_id='$id'");
    $c_row = mysqli_fetch_assoc($get_count);
    $get_rows = mysqli_num_rows($get_count);

       if($get_rows<$ques){
			$ques = $_POST['question'];
			$ans1 = $_POST['ans_1'];
			$ans2 = $_POST['ans_2'];
			$ans3 = $_POST['ans_3'];
			$ans4 = $_POST['ans_4'];
			$correct_ans = $_POST['correct_ans'];
		$query = $db->query("INSERT INTO `questions`(`id`, `exam_id`, `branch`, `semester`, `subject`, `question`, `ans_1`, `ans_2`, `ans_3`, `ans_4`, `correct_ans`) VALUES ('','$exam_id','$branch','$sem','$subject','$ques','$ans1','$ans2','$ans3','$ans4','$correct_ans')") or die(mysqli_error());
		
		if($query){
			echo "<script>alert('Successfully Added Questions.....!')</script>";
			}
			}else{
                echo "<script>alert('Reached the limit.....!')</script>";
            }
		
		}

?>
 		  
<div class="container">
    <div class="row m50_0">
    	<div class="col-md-5 col-sm-5 col-xs-12 centerconten">
		<div class="innercontsec">
        	<form action="" method="post">
         <div class="row">
         <div class="col-md-12">
         <label class="lable_1">Add Question</label>
         <textarea cols="" rows="2" class="form-control modal_form" placeholder="Add Question" name="question" required="required" ></textarea>
         </div>
         <div class="row">
         <div class="col-md-6"><label class="lable_1">a) Answer</label></div>
         <div class="col-md-6"><label class="lable_1"><div align="right">Correct Ans : <input type="radio" name="correct_ans" value="Ans1" required/></div></label></div>
         </div>
         <div class="col-md-12">
         <textarea cols="" rows="2" class="form-control modal_form" placeholder="Answer One" name="ans_1"></textarea>
         </div>
        <div class="row">
         <div class="col-md-6"><label class="lable_1">b) Answer</label></div>
         <div class="col-md-6"><label class="lable_1"><div align="right">Correct Ans : <input type="radio" name="correct_ans" value="Ans2" required/></div></label></div>
         </div>
         <div class="col-md-12">
         <textarea cols="" rows="2" class="form-control modal_form" placeholder="Answer Two" name="ans_2"></textarea>
         </div>
         <div class="row">
         <div class="col-md-6"><label class="lable_1">c) Answer</label></div>
         <div class="col-md-6"><label class="lable_1"><div align="right">Correct Ans : <input type="radio" name="correct_ans" value="Ans3" required/></div></label></div>
         </div>
         <div class="col-md-12">
         <textarea cols="" rows="2" class="form-control modal_form" placeholder="Answer Three" name="ans_3"></textarea>
         </div>
         <div class="row">
         <div class="col-md-6"><label class="lable_1">d) Answer</label></div>
         <div class="col-md-6"><label class="lable_1"><div align="right">Correct Ans : <input type="radio" name="correct_ans" value="Ans4" required/></div></label></div>
         </div>
         <div class="col-md-12">
         <textarea cols="" rows="2" class="form-control modal_form" placeholder="Answer Four" name="ans_4"></textarea>
         </div>
        </div>
       <div class="clearfix"></div>
       <div class="col-md-12">
       	            <input type="submit" class="btn cus_btn" name="submit" value="SUBMIT" />
            <input type="reset" class="btn cus_btn" value="CLEAR" />
         
                    
       </div>
    </form>
	</div>
     <div class="col-md-7 col-sm-7 col-xs-12"></div>
    </div></div>
    
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