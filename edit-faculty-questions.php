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
	$query = $db->query("select * from questions where id='$id'") or die(mysqli_error());
	$row = mysqli_fetch_assoc($query);	//echo "<pre />"; print_r($row); die;
	
	if(isset($_POST['update_question'])){ //echo "<pre />"; print_r($_POST); die;
		$ques = $_POST['question'];
		$ans1 = $_POST['ans_1'];
		$ans2 = $_POST['ans_2'];
		$ans3 = $_POST['ans_3'];
		$ans4 = $_POST['ans_4'];
		$correct_ans = $_POST['correct_ans'];
		$query = $db->query("UPDATE `questions` SET `question`='$ques',`ans_1`='$ans1',`ans_2`='$ans2',`ans_3`='$ans3',`ans_4`='$ans4',`correct_ans`='$correct_ans' WHERE id='$id'") or die(mysqli_error);
		
		if($query){
		header('location:view-faculty-questions.php');
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
        <div class="col-md-4 col-sm-4">
        	<form action="" method="post">
             <div class="row">
             <div class="col-md-12">
             <label class="lable_1">Add Question</label>
             <textarea cols="" rows="2" class="form-control modal_form" placeholder="Add Question" name="question"><?php echo $row['question'];?></textarea>
             </div>
             <div class="row">
             <div class="col-md-6"><label class="lable_1">a) Answer</label></div>
             <div class="col-md-6"><label class="lable_1"><div align="right">Correct Ans : <input type="radio" name="correct_ans" value="Ans1" <?php if($row['correct_ans']=='Ans1') echo 'checked' ?>  /></div></label></div>
             </div>
             <div class="col-md-12">
             <textarea cols="" rows="2" class="form-control modal_form" placeholder="Answer One" name="ans_1"><?php echo $row['ans_1'];?></textarea>
             </div>
            <div class="row">
             <div class="col-md-6"><label class="lable_1">b) Answer</label></div>
             <div class="col-md-6"><label class="lable_1"><div align="right">Correct Ans : <input type="radio" name="correct_ans" value="Ans2" <?php if($row['correct_ans']=='Ans2') echo 'checked' ?> /></div></label></div>
             </div>
             <div class="col-md-12">
             <textarea cols="" rows="2" class="form-control modal_form" placeholder="Answer Two" name="ans_2"><?php echo $row['ans_2'];?></textarea>
             </div>
             <div class="row">
             <div class="col-md-6"><label class="lable_1">c) Answer</label></div>
             <div class="col-md-6"><label class="lable_1"><div align="right">Correct Ans : <input type="radio" name="correct_ans" value="Ans3" <?php if($row['correct_ans']=='Ans3') echo 'checked' ?> /></div></label></div>
             </div>
             <div class="col-md-12">
             <textarea cols="" rows="2" class="form-control modal_form" placeholder="Answer Three" name="ans_3"><?php echo $row['ans_3'];?></textarea>
             </div>
             <div class="row">
             <div class="col-md-6"><label class="lable_1">d) Answer</label></div>
             <div class="col-md-6"><label class="lable_1"><div align="right">Correct Ans : <input type="radio" name="correct_ans" value="Ans4" <?php if($row['correct_ans']=='Ans4') echo 'checked' ?>  /></div></label></div>
             </div>
             <div class="col-md-12">
             <textarea cols="" rows="2" class="form-control modal_form" placeholder="Answer Four" name="ans_4"><?php echo $row['ans_4'];?></textarea>
             </div>
            </div>
           <div class="clearfix"></div>
           <div class="clearfix"></div>
           <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="submit" class="btn cus_btn" name="update_question" value="UPDATE QUESTION" />
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