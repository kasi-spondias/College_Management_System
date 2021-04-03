<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>View Attendance</title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php 
include('db.php');
include('faculty_header.php');
if(isset($_SESSION['email_id'])){ 
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
                    <option value="MECHANICAL" >MECHANICAL</option>
             </select>
            <label class="lable_1">Select Semester</label>
            <select class="form-control modal_form" name="semester" id="sem">
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
            <label>Month</label>
<select name="month"><option value="jan">Jan</option>
<option value="feb">Feb</option>
<option value="mar">Mar</option>
<option value="apr">Apr</option>
<option value="may">May</option>
<option value="june">June</option>
<option value="july">July</option><option value="aug">Aug</option>
<option value="sep">Sep</option><option value="oct">Oct</option>
<option value="nov">Nov</option>
<option value="dec">Dec</option>
</select>

            <input class="btn modal_form_btn" type="submit" name="submit" />
</form>
</div></div></div></div>

<!-- Start Content -->
    
    <div class="row m40_0">
        <div class="contact_form_text" style="margin-top:20px;">View Attendance</div>
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
                    <th class="text-center">Working days</th>
                     <th class="text-center">Attended days</th>
                     <th class="text-center">Attendance Percentage</th>
                </tr>
            </thead>
            <tbody>
            
<?php if(isset($_POST['submit'])){ 
$branch = $_POST['branch'];
$sem = $_POST['semester'];
$month = $_POST['month'];
$i=1;
    $get_att = $db->query("select * from attendance where branch='$branch' AND semester='$sem' AND month = '$month'") or die(mysqli_error());
    $get_rows = mysqli_num_rows($get_att);
	//$i=1;
	while($c_row = mysqli_fetch_assoc($get_att)){ 
    echo '<tr align="center">'; 
	echo '<td>'.$i.'</td>';
	?>
	<span class="rollno"> <?php echo '<td>'.$c_row['roll_no'].'</td>'; ?></span>
	<span class="working"> <?php echo '<td>'.$c_row['working_days'].'</td>'; ?></span>
	<span class="attend"> <?php echo '<td>'.$c_row['attended_days'].'</td>'; ?></span>
   <span class="percentage"><?php  $work = $c_row['working_days'];  $att =  $c_row['attended_days']; ?> <?php $tot = ($att / $work)*100;  echo '<td>'.$tot.'</td>'; ?></span>
	<?php
	
	$i++;
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