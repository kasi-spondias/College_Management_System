<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>STUDENT REGISTRATION</title>
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
include('header.php'); 
?>
<div class="sub_header_bg">
	STUDENT REGISTER
</div>	
<div class="strip" align="right">
	<a href="index.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">Student Register</a>
</div>
<?php
	//if(isset($_POST['student_register'])){ //echo "<pre />"; print_r($_POST); die;
		$name = $_POST['stu_name'];
		$roll_no = $_POST['roll_no'];
		$dob = $_POST['dob'];
		$mobile_no = $_POST['mobile_no'];
		$email_id = $_POST['email_id'];
		$pass = md5($_POST['stu_pass']);
		$branch = $_POST['branch'];
		$semister = $_POST['sem'];
		
		$check_roll_no = mysqli_query($conn, "SELECT roll_no FROM student_register where roll_no = '$roll_no' ");
if(mysqli_num_rows($check_roll_no) >0){
	
    echo('Roll Number Already exists');
	return false;
}
else{
    if (isset($_POST['student_register'])) {
    $query = $db->query("INSERT INTO `student_register`(`id`, `name`, `roll_no`, `dob`, `mobile_no`, `email_id`, `password`, `branch`, `semister`) VALUES ('','$name','$roll_no','$dob','$mobile_no','$email_id','$pass','$branch','$semister')") or die(mysqli_error());
		
    echo('Data Entered Successfully');
}
}

?>

<!-- Start Content -->
<div class="container">
    <div class="row m50_0">
    	<div class="col-md-5 col-sm-5 col-xs-12 centerconten">
		<div class="innercontsec">
          <form action="" method="post" enctype="multipart/form-data" onSubmit="return hello()";>
        	<input class="form-control modal_form" type="text" name="stu_name" placeholder="Name" pattern="[a-z,A-Z]{3,20}" required="required" />
            <input class="form-control modal_form" type="text" name="roll_no" id="roll_no" placeholder="Roll Number" required="required" />
			<SPAN id="roll_error"></SPAN>
			<label class="lable_1">Date of Birth</label>
			<input class="form-control modal_form" type="date" name="dob" placeholder="Date of Birth" required="required" />
			<input class="form-control modal_form" type="tel" name="mobile_no" placeholder="Mobile" pattern="[6789]{1}[0-9]{9}" title="Mobile number" required="required" />
            <input class="form-control modal_form" type="email" name="email_id" placeholder="Email Id" required="required" />
	<input class="form-control modal_form" type="password" name="stu_pass" placeholder="Password" pattern="(?=^.{8,10}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
            
			<select class="form-control modal_form" name="branch" required="required">
            	<option value="">Select Branch</option>
                <option value="CSE">CSE</option>
                <option value="EEE">EEE</option>
                <option value="ECE">ECE</option>
            </select>
            <select class="form-control modal_form" name="sem" required="required">
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
            <button class="btn modal_form_btn" name="student_register" type="submit">REGISTER NOW</button>
           </form>
           <div style="margin-top:20px; font-size:16px;">Already Register? Please <a href="#myModal_1" data-toggle="modal"> Login Now</a></div></div>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-12"></div>
    </div></div>
<!-- End Content -->



<?php 
include('footer.php');
include('js_files.php');
?>
</body>
</html>