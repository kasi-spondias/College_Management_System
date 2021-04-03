<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>Admin DASHBOARD</title>
<?php include('css_files.php'); ?>
</head>

<body>
<script type="text/javascript">
function hello(){
    
var regex = /[0-9]{4}364[0-9]{5}\b/;

function getValue()  {
    return document.getElementById("roll_no").value;
}




if(!regex.test(getValue())){
document.getElementById("roll_error").innerHTML = "Enter a valid roll no";
return false;
}else{
return true;

}

    //alert(getValue().match(regex));    
}

</script>

<?php 
include('db.php');
include('admin_header.php'); 
if(isset($_SESSION['u_name'])){ 
?>
<?php if(isset($_POST['submit'])){ 

$branch = $_POST['branch'];
$sem = $_POST['semester'];
$roll = $_POST['roll_no'];
$month = $_POST['month'];
$work = $_POST['working_days'];
$attend = $_POST['attend_days'];

    $get_att = $db->query("select * from attendance where roll_no='$roll' AND month='$month'") or die(mysqli_error());
    $get_rows = mysqli_num_rows($get_att);
	if($get_rows>0){
	echo "<script>alert('You have already added attendance for the entered roll no and month')</script>";
	}

else {
$query = $db->query("INSERT INTO `attendance`(`id`, `branch`, `semester` ,`roll_no`, `month`, `working_days`, `attended_days`) VALUES ('','$branch','$sem','$roll','$month','$work','$attend')") or die(mysqli_error());
		
		if($query){
			echo "<script>alert('Successful')</script>";
			}
			else{
				echo "<script>alert('Failed')</script>";
				}
}
}?>
<div class="container">
<div class="row m50_0">
    	<div class="col-md-5 col-sm-5 col-xs-12 centerconten">
		<div class="innercontsec neclasec">
<form method="post">
<label class="lable_1">Select Branch</label>
<select name="branch" id="branch" required="required">
       <option value="">Select Branch</option>
                    <option value="ECE" >ECE</option>
                    <option value="EEE" >EEE</option>
                    <option value="CSE">CSE</option>
                    <option value="CIVIL" >CIVIL</option>
                    <option value="MECHANICAL" >MECHANICAL</option>
</select>
       <label class="lable_1">Select Semester</label>
            <select name="semester" id="sem" required="required">
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
<label>Enter Student Roll No:</label><input class="form-control modal_form" type="text" name="roll_no" id="roll_no" placeholder="Roll Number" required="required"/>
<SPAN id="roll_error"></SPAN>
<label>Month</label>
<select name="month" required="required"><option value="jan">Jan</option>
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
<label>Total Working Days</label><input type="text" name="working_days" required="required" />
<label>Total Attended Days</label><input type="text" name="attend_days" required="required"/>
<input class="btn modal_form_btn" type="submit" name="submit" />
</form>
</div>
</div></div></div>
<?php 
include('footer.php');
include('js_files.php');
}else{
	header("location:index.php");
	}
?>
</body>
</html>