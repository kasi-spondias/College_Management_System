<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>Faculty edit</title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php
 	include('db.php');
	include('admin_header.php'); 
	if(isset($_SESSION['u_name'])){
		
	$id = $_GET['id'];
	$query = $db->query("select * from faculty_register where id='$id'") or die(mysqli_error());
	$row = mysqli_fetch_assoc($query);	//echo "<pre />"; print_r($row); die;
	
	if(isset($_POST['update'])){ //echo "<pre />"; print_r($_POST); die;
		$name = $_POST['faculty_name'];
		$mobile_no = $_POST['mobile_no'];
		$email = $_POST['email_id'];
		$clg_email_id = $_POST['clg_email_id'];
		$branch = $_POST['branch'];
		$query = $db->query("UPDATE `faculty_register` SET `name`='$name',`mobile_no`='$mobile_no',`email_id`='$email',`clg_mail_id`='$clg_email_id',`branch`='$branch' WHERE id='$id'") or die(mysqli_error());
		
		if($query){
		header('location:view-faculty.php');
		//header('location: '.$_SERVER['PHP_SELF']);	
		}else{
		echo "<script>alert('Updation Failure.');</script>";	
		//header('location: '.$_SERVER['PHP_SELF']);
		}

	}

?>

<div class="sub_header_bg">
	UPDATE FACULTY DETAILS
</div>	
<div class="strip" align="right">
	<a href="index.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">Faculty Details</a>
</div>


<!-- Start Content -->
    
    <div class="row m40_0">
        
    	<form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8 col-sm-8 col-xs-12" align="center"><img src="images/ad_course.png" class="img img-responsive" /></div>  
      <div class="col-md-4 col-sm-4 col-xs-12">
      
      		<input class="form-control modal_form" type="text" name="faculty_name" placeholder="Name" value="<?php echo $row['name'];?>" />
			<input class="form-control modal_form" type="tel" name="mobile_no" placeholder="Mobile" value="<?php echo $row['mobile_no'];?>" />
            <input class="form-control modal_form" type="email" name="email_id" placeholder="Email Id" value="<?php echo $row['email_id'];?>" />
            <input class="form-control modal_form" type="email" name="clg_email_id" placeholder="College Email Id" value="<?php echo $row['clg_mail_id'];?>" />
            <select class="form-control modal_form" name="branch">
            	<option value="">Select Branch</option>
                <option value="ECE" <?php if($row['branch']== 'ECE') echo "selected"?>>ECE</option>
                <option value="EEE" <?php if($row['branch']== 'EEE') echo "selected"?>>EEE</option>
                <option value="CSE" <?php if($row['branch']== 'CSE') echo "selected"?>>CSE</option>
                <option value="CIVIL" <?php if($row['branch']== 'CIVIL') echo "selected"?>>CIVIL</option>
                <option value="MECHANICAL" <?php if($row['branch']== 'MECHANICAL') echo "selected"?>>MECHANICAL</option>
            </select>
             <input type="submit" class="btn cus_btn" name="update" value="UPDATE" />
            <input type="reset" class="btn reset_btn" value="CLEAR" />
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