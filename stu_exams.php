<?php
@ob_start();
session_start();
$duration = $_SESSION['TIME'];
$_SESSION['TIMER'] = time() + ($duration * 60); // Give the user Ten minutes
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
$exam_id=$_GET['exam_id'];
$roll_no = $_SESSION['roll_no'];
	//$query = $db->query("select * from student_register where roll_no='$roll_no'") or die(mysqli_error());
	//$row = mysqli_fetch_assoc($query);
	//$sem = $row['semister'];
		
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
        <div class="contact_form_text" style="margin-top:20px;">ATTEMPT EXAM</div>
        <div id="timer" style="width:100px; height:auto; float:right"></div>
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
          <div class="col-md-12 col-sm-12 col-xs-12">
       	  <form action="" method="post" >
          <div class="col-md-12 col-sm-12 col-xs-12">  
          	<?php
				$i =1;
				$sql = $db->query("select * from questions where exam_id='$exam_id'") or die(mysqli_error());
				while($row = mysqli_fetch_assoc($sql)){
					$ques_id = $row['id'];
					$branch = $row['branch'];
					$sem = $row['semester'];
					$subject = $row['subject'];
			?>	    
        	   <input type="hidden" name="ques_id" value="<?php echo $ques_id?>">
					<p class="p0-10"><b><?php echo $i?> . <?php echo $row['question'];?></b></p>	
                    
                    <div class="radio radio-success">
                        <input type="radio" name="radio<?php echo $ques_id?>" id="radio<?php echo $ques_id?>1" value="Ans1">
                        <label for="radio<?php echo $ques_id?>1">
                           A) <?php echo $row['ans_1'];?>
                        </label>
            		</div>
                    <div class="radio radio-success">
                        <input type="radio" name="radio<?php echo $ques_id?>" id="radio<?php echo $ques_id?>2" value="Ans2">
                        <label for="radio<?php echo $ques_id?>2">
                          B) <?php echo $row['ans_2'];?>           
                        </label>
                    </div>
                    <div class="radio radio-success">
                        <input type="radio" name="radio<?php echo $ques_id?>" id="radio<?php echo $ques_id?>3" value="Ans3">
                        <label for="radio<?php echo $ques_id?>3">
                          C) <?php echo $row['ans_3'];?>                 
                        </label>
                    </div>
                    <div class="radio radio-success">
                        <input type="radio" name="radio<?php echo $ques_id?>" id="radio<?php echo $ques_id?>4" value="Ans4">
                        <label for="radio<?php echo $ques_id?>4">
                          D)<?php echo $row['ans_4'];?>                 
                        </label>
                    </div>
                    <?php 
						//Submitting the exam values
						if(isset($_POST['submit'])){
							$crt_ans = $_POST['radio'.$ques_id];
							$query = $db->query("INSERT INTO `stud_ans`(`ans_id`, `roll_no`, `subject`, `exam_id`, `ques_id`, `stud_ans`) VALUES ('','$roll_no','$subject','$exam_id','$ques_id','$crt_ans')") or die(mysqli_error());				
						}
						$i++;}
						if(isset($query)){
							header("location:stu_exams_report.php?exam_id=".$exam_id."&ins=ins"); 	
						} 
						?>
                  </div>
                  <input type="submit" class="btn cus_btn" value="SUBMIT" name="submit">
            <!--<a href="stu_exams_report.php" name="submit" class="btn cus_btn">SUBMIT</a>-->							
        </form>
        </div>
  </div>
    
	<!-- End Section 1 -->
    
<!-- End Content -->
<script type="text/javascript">
var TimeLimit = new Date('<?php echo date('r', $_SESSION['TIMER']) ?>');
</script>
<script type="text/javascript">
function countdownto() {
  var date = Math.round((TimeLimit-new Date())/1000);
  var hours = Math.floor(date/3600);
  date = date - (hours*3600);
  var mins = Math.floor(date/60);
  date = date - (mins*60);
  var secs = date;
  if (hours<10) hours = '0'+hours;
  if (mins<10) mins = '0'+mins;
  if (secs<10) secs = '0'+secs;
  document.getElementById('timer').innerHTML = hours+':'+mins+':'+secs;
  setTimeout("countdownto()",1000);
  }

countdownto();
</script> 
<script type="text/javascript">
var time = <?php echo ($duration * 60);?>;
// Our countdown plugin takes a callback, a duration, and an optional message
$.fn.countdown = function (callback, duration, message) {
    // If no message is provided, we use an empty string
    message = message || "";
    // Get reference to container, and set initial content
    var container = $(this[0]).html(duration + message);
    // Get reference to the interval doing the countdown
    var countdown = setInterval(function () {
        // If seconds remain
        if (--duration) {
            // Update our container's message
            container.html(duration + message);
        // Otherwise
        } else {
            // Clear the countdown interval
            clearInterval(countdown);
            // And fire the callback passing our container as `this`
            callback.call(container);   
        }
    // Run interval every 1000ms (1 second)
    }, 1000);

};

// Use p.countdown as container, pass redirect, duration, and optional message

$(".countdown").countdown(redirect, time, "s remaining");

// Function to be called after 5 seconds
function redirect () {
	alert('Your Exam Session Has been Completed');
    this.html("Done counting, redirecting.");
    window.location = "stu_exams_report.php?exam_id=<?php echo $exam_id?>";
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