<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>VIEW ATTENDANCE</title>
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
            	
               <?php
if(isset($_SESSION['roll_no'])){ 
$exam_id=$_GET['exam_id'];
$roll_no = $_SESSION['roll_no'];
if(isset($_POST['submit'])){ 

$month = $_POST['month'];
    $get_att = $db->query("select * from attendance where roll_no ='$roll_no' AND month ='$month'") or die(mysqli_error());
    $get_rows = mysqli_num_rows($get_att);
	$i=1;
	if($get_rows==0){
		 echo "<script>alert('No Data Available for this month')</script>";
	}else{
		while($c_row = mysqli_fetch_assoc($get_att)){ 
            echo '<tr align="center">'; 
	echo '<td>'.$i.'</td>';
	?>
	<span class="rollno"> <?php echo '<td>'.$c_row['roll_no'].'</td>'; ?></span>
	<span class="working"> <?php echo '<td>'.$c_row['working_days'].'</td>'; ?></span>
	<span class="attend"> <?php echo '<td>'.$c_row['attended_days'].'</td>'; ?></span>
   <span class="percentage"><?php  $work = $c_row['working_days'].'</td>';  $att =  $c_row['attended_days']; ?> <?php $tot = ($att / $work)*100;  echo '<td>'.$tot.'</td>'; ?></span>

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