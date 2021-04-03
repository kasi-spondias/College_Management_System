<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>REFERENCE BOOKS</title>
<?php include('css_files.php'); ?>
</head>

<body>
<?php
	include('db.php');
	include('admin_header.php'); 
?>

<div class="sub_header_bg">
	REFERENCE BOOKS
</div>	
<div class="strip" align="right">
	<a href="dashboard.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">Reference Books</a>
</div>
<?php
	if(isset($_SESSION['u_name'])){
		$name = $_SESSION['u_name'];
	if(isset($_POST['ad_ref_book'])){ //echo "<pre />"; print_r($_POST); die;
		$branch = $_POST['branch'];
		$sem = $_POST['semester'];
		$subject_name = $_POST['sub_name'];
		$book_name = $_POST['book_name'];
		$file = $_FILES['add_book']['name'];
		$link = $_POST['add_link'];
		if($file != ''){
			move_uploaded_file($_FILES['add_book']['tmp_name'],'uploads/'.$_FILES['add_book']['name']);
		}
		$query = $db->query("INSERT INTO `books`(`id`, `branch`, `semester`, `sub_name`, `book_name`, `add_book`, `add_link`, `uploaded_by`) VALUES ('','$branch','$sem','$subject_name','$book_name','$file','$link','$name')") or die(mysqli_error());
		
		if($query){
			echo "<script>alert('Successfully Updated Books Details')</script>";
			}
			
		
		}

?>

<!-- Start Content -->
    <div class="row m50_0">
    	<div class="col-md-5 col-sm-5 col-xs-12">
          <form action="" method="post" enctype="multipart/form-data">
          	<label class="lable_1">Select Branch</label>
             <select class="form-control modal_form" name="branch" id="branch" onchange="selectSubj(this.options[this.selectedIndex].value)" required="required">
                <option value="">Select Branch</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                    <option value="CSE">CSE</option>
                    <option value="CIVIL">CIVIL</option>
                    <option value="MECHANICAL">MECHANICAL</option>
             </select>
			<label class="lable_1">Select Semester</label>
            <select class="form-control modal_form" name="semester" id="sem" required="required>
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
            <label class="lable_1">Select Subject Name</label>
            <span id="subj_loader"></span>
            <select class="form-control modal_form" name="sub_name" id="subj_dropdown" required="required>
            	<option value="">Select Subject</option>
            </select>
            <label class="lable_1">Book Name</label>
            <input class="form-control modal_form" type="text" name="book_name" placeholder="Book Name" required="required" />
            <label class="lable_1">Add Book</label>
            <input class="form-control modal_form" type="file" name="add_book" placeholder="Add Book" required="required" />
            <label class="lable_1">Add Link (Video Links)</label>
            <input class="form-control modal_form" type="text" name="add_link" placeholder="Book Link" />
            <button class="btn modal_form_btn" name="ad_ref_book" type="submit">SUBMIT</button>
           </form>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-12"></div>
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