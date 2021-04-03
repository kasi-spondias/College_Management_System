<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>ALUMNI REGISTRATION</title>
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
	ALUMNI REGISTER
</div>	
<div class="strip" align="right">
	<a href="index.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">ALUMNI Register</a>
</div>
<?php
	if(isset($_POST['alumni_reg'])){ //echo "<pre />"; print_r($_POST); die;
		$u_name = $_POST['u_name'];
		$roll_no = $_POST['roll_no'];
		$email_id = $_POST['email_id'];
		$dob=$_POST['dob'];
		$mobile_no = $_POST['mobile_no'];
		$batch=$_POST['batch'];
		$branch = $_POST['branch'];
		$designation= $_POST['designation'];
		$work=$_POST['work'];
		$query = $db->query("INSERT INTO `alumni_reg`(`id`, `u_name`, `roll_no`, `email_id`, `dob`, `batch`, `branch`, `designation`, `work`) VALUES ('','$u_name','$roll_no','$email_id','$dob','$batch','$branch','$designation','$work')") or die(mysqli_error());
		
		if($query){
			echo "<script>alert('Successfully Updated Alumni Details')</script>";
			}
			else{
				echo "<script>alert('Failed')</script>";
				}
		}

?>

<!-- Start Content -->
<div class="container">
    <div class="row m50_0">
    	<div class="col-md-5 col-sm-5 col-xs-12 centerconten">
		<div class="innercontsec">
          <form action="" method="post" enctype="multipart/form-data" onSubmit="return hello()";>
        	<input class="form-control modal_form" type="text" name="u_name" placeholder="Name" pattern="[a-z,A-Z]{3,20}" required="required" />
            <input class="form-control modal_form" type="text" name="roll_no" id="roll_no" placeholder="Roll Number" required="required" />
            <SPAN id="roll_error"></SPAN>
            <input class="form-control modal_form" type="email" name="email_id" placeholder="Email Id" required="required" />
			<label class="lable_1">Date of Birth</label>
			<input class="form-control modal_form" type="date" name="dob" placeholder="Date of Birth" required="required" />
			<input class="form-control modal_form" type="tel" name="mobile_no" placeholder="Mobile" pattern="[6789]{1}[0-9]{9}" title="Mobile number" required="required" />
			<input class="form-control modal_form" type="text" pattern="\d{4}" class="datepicker" name="batch" placeholder="Passedout year" required="required" />
            <select class="form-control modal_form" name="branch" required="required">
            	<option value="">Select Branch</option>
                <option value="CSE">CSE</option>
                <option value="EEE">EEE</option>
                <option value="ECE">ECE</option>
            </select>
            <select class="form-control modal_form" name="designation" required="required">
            	<option value="">Select Designation</option>
                <option value="higher_studies">Higher Studies</option>
                <option value="EEE">Placements</option>
                <option value="ECE">Others</option>
            </select>
			<input class="form-control modal_form" type="text" name="work" placeholder="write about your work" required="required" />
            <button class="btn modal_form_btn" name="alumni_reg" type="submit">SUBMIT</button>
           </form>
           <!--<div style="margin-top:20px; font-size:16px;">THANK YOU</div>-->
        </div>
        <div class="col-md-7 col-sm-7 col-xs-12"></div>
    </div></div></div>
<!-- End Content -->



<?php 
include('footer.php');
include('js_files.php');
?>
</body>
</html>