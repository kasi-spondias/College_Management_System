<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>ADD SUBJECTS </title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php
 	include('db.php');
	include('admin_header.php'); 
	if(isset($_SESSION['u_name'])){
		if(isset($_POST['stu_subjects'])){ //echo "<pre />"; print_r($_POST); die;
		$qual = $_POST['qualification'];
		$stream = $_POST['stream'];
		$sem = $_POST['semister'];
		$sub = $_POST['subject'];
		$query = $db->query("INSERT INTO `stu_subjects`(`id`, `qualification`, `stream`, `semister`, `subject`) VALUES ('','$qual','$stream','$sem','$sub')") or die(mysqli_error());
		
		if($query){
			echo "<script>alert('Successfully Updated Subject Details')</script>";
			}
			
		
		}

?>

<div class="sub_header_bg">
	ADD SUBJECTS
</div>	
<div class="strip" align="right">
	<a href="dashboard.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">Add SUBJECTS</a>
</div>


<!-- Start Content -->
    
    <div class="row m40_0">
    	<form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8 col-sm-8 col-xs-12" align="center"><img src="images/ad_course.png" class="img img-responsive" /></div>
<div class="col-md-4 col-sm-4 col-xs-12">
        	 <label class="lable_1">Qualification</label>
             <select class="form-control modal_form" name="qualification" required="required">
             	<option value="B.Tech">B.Tech</option>
             </select>
             <label class="lable_1">Stream</label>
             <select class="form-control modal_form" name="stream" required="required">
             	<option value="">Select Stream</option>
                <option value="ECE">ECE</option>
                <option value="EEE">EEE</option>
                <option value="CSE">CSE</option>
                <option value="CIVIL">CIVIL</option>
                
             </select>
             <label class="lable_1">Semister</label>
			 <select class="form-control modal_form" name="semister" required="required">
             	<option value="">Select Semister</option>
                <option value="1-1">1-1</option>
                <option value="1-2">1-2</option>
                <option value="2-1">2-1</option>
                <option value="2-2">2-2</option>
                <option value="3-1">3-1</option>
                <option value="3-2">3-2</option>
                <option value="4-1">4-1</option>
                <option value="4-2">4-2</option>
             </select>
             <label class="lable_1">Subject</label>
			 <input type="text" class="form-control modal_form" name="subject" required="required" placeholder="Subject Name"/>
             <input type="submit" class="btn cus_btn" name="stu_subjects" value="ADD SUBJECT" />
            <input type="reset" class="btn reset_btn" value="CLEAR" />
        </div>
        <div class="clearfix"></div>
        <div class="row">
        <div class="col-md-8 col-sm-8"></div>
        <div class="col-md-4 col-sm-4">
        	
        </div>
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