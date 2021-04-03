<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>FACULTY REGISTER</title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php 
include('db.php'); 
include('header.php'); 
?>
<div class="sub_header_bg">
	FACULTY REGISTER
</div>	
<div class="strip" align="right">
	<a href="index.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">Faculty Register</a>
</div>
<?php
	if(isset($_POST['faculty_register'])){ //echo "<pre />"; print_r($_POST); die;
		$name = $_POST['faculty_name'];
		$mobile_no = $_POST['mobile_no'];
		$email_id = $_POST['email_id'];
		$clg_email_id = $_POST['clg_email_id'];
		$pass = md5($_POST['faculty_pass']);
		$branch = $_POST['branch'];
		$query = $db->query("INSERT INTO `faculty_register`(`id`, `name`, `mobile_no`, `email_id`, `clg_mail_id`, `password`, `branch`) VALUES ('','$name','$mobile_no','$email_id','$clg_email_id','$pass','$branch')") or die(mysqli_error());
		
		if($query){
			echo "<script>alert('Successfully Registered')</script>";
			}
			
		
		}

?>

<!-- Start Content -->
<div class="container">
    <div class="row m50_0">
    	<div class="col-md-5 col-sm-5 col-xs-12 centerconten">
		<div class="innercontsec">
          <form action="" method="post" enctype="multipart/form-data">
        	<input class="form-control modal_form" type="text" name="faculty_name" placeholder="Name" pattern="[a-z,A-Z]{3,20}" required="required" />
			<input class="form-control modal_form" type="tel" name="mobile_no" placeholder="Mobile" pattern="[6789]{1}[0-9]{9}" title="Mobile number" required="required" />
            <input class="form-control modal_form" type="email" name="email_id" placeholder="Email Id" required="required" />
            <input class="form-control modal_form" type="email" name="clg_email_id" placeholder="College Email Id" required="required" />
            <input class="form-control modal_form" type="password" name="faculty_pass" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
            <select class="form-control modal_form" name="branch" required="required">
            	<option value="">Select Branch</option>
                <option value="CSE">CSE</option>
                <option value="EEE">EEE</option>
                <option value="ECE">ECE</option>
            </select>            
            <button class="btn modal_form_btn" name="faculty_register" type="submit">REGISTER NOW</button>
           </form>
           <div style="margin-top:20px; font-size:16px;">Already Register? Please <a href="#myModal_2" data-toggle="modal"> Login Now</a></div></div>
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