<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>Free PHP Projects | Free B.Tech, M.Tech Projects</title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php
 	include('db.php');
	include('faculty_header.php'); 
	if(isset($_SESSION['email_id'])){
		
	$id = $_GET['id'];
	$query = $db->query("select * from books where id='$id'") or die(mysqli_error());
	$row = mysqli_fetch_assoc($query);	//echo "<pre />"; print_r($row); die;
	
	if(isset($_POST['update_book'])){ //echo "<pre />"; print_r($_POST); die;
		$branch = $_POST['branch'];
		$sem = $_POST['semester'];
		$sub = $_POST['sub_name'];
		$book_name = $_POST['book_name'];
		$file = $_FILES['add_book']['name'];
		$link = $_POST['add_link'];
		if($file != ''){
			move_uploaded_file($_FILES['add_book']['tmp_name'],'uploads/'.$_FILES['add_book']['name']);
			$db->query("UPDATE books set `add_book`='$file' where id='$id'") or die(mysqli_error());
		}
		$query = $db->query("UPDATE `books` SET `branch`='$branch',`semester`='$sem',`sub_name`='$sub',`book_name`='$book_name',`add_link`='$link' WHERE id='$id'") or die(mysqli_error());
		
		if($query){
		header('location:view-faculty-books.php');
		//header('location: '.$_SERVER['PHP_SELF']);	
		}else{
		echo "<script>alert('Updation Failure.');</script>";	
		//header('location: '.$_SERVER['PHP_SELF']);
		}

	}

?>

<div class="sub_header_bg">
	UPDATE SUBJECTS
</div>	
<div class="strip" align="right">
	<a href="index.php">Index</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">UPDATE Subjects</a>
</div>


<!-- Start Content -->
    
    <div class="row m50_0">
    	<div class="col-md-5 col-sm-5 col-xs-12">
          <form action="" method="post" enctype="multipart/form-data">
          	<label class="lable_1">Select Branch</label>
             <select class="form-control modal_form" name="branch" id="branch" onchange="selectSubj(this.options[this.selectedIndex].value)" required="required">
                <option value="">Select Branch</option>
                    <option value="ECE" <?php if($row['branch']== 'ECE') echo "selected"?>>ECE</option>
                    <option value="EEE" <?php if($row['branch']== 'EEE') echo "selected"?>>EEE</option>
                    <option value="CSE" <?php if($row['branch']== 'CSE') echo "selected"?>>CSE</option>
                    <option value="CIVIL" <?php if($row['branch']== 'CIVIL') echo "selected"?>>CIVIL</option>
                    <option value="MECHANICAL" <?php if($row['branch']== 'MECHANICAL') echo "selected"?>>MECHANICAL</option>
             </select>
			<label class="lable_1">Select Semester</label>
            <select class="form-control modal_form" name="semester">
            	<option value="">Select Semester</option>
                <option value="1-1" <?php if($row['semester']== '1-1') echo "selected"?>>1-1</option>
                <option value="1-2" <?php if($row['semester']== '1-2') echo "selected"?>>1-2</option>
                <option value="2-1" <?php if($row['semester']== '2-1') echo "selected"?>>2-1</option>
                <option value="2-2" <?php if($row['semester']== '2-2') echo "selected"?>>2-2</option>
                <option value="3-1" <?php if($row['semester']== '3-1') echo "selected"?>>3-1</option>
                <option value="3-2" <?php if($row['semester']== '3-2') echo "selected"?>>3-2</option>
                <option value="4-1" <?php if($row['semester']== '4-1') echo "selected"?>>4-1</option>
                <option value="4-2" <?php if($row['semester']== '4-2') echo "selected"?>>4-2</option>
            </select>
            <label class="lable_1">Select Subject Name</label>
            <select class="form-control modal_form" name="sub_name">
            	<option value="">Select Subject</option>
                <option value="<?php echo $row['sub_name']?>" selected><?php echo $row['sub_name']?></option>
            </select>
            <label class="lable_1">Book Name</label>
            <input class="form-control modal_form" type="text" name="book_name" placeholder="Book Name" value="<?php echo $row['book_name'];?>" />
            <label class="lable_1">Add Book</label>
            <input class="form-control modal_form" type="file" name="add_book" placeholder="Add Book" value="<?php echo $row['add_book'];?>" />
            File : <a href="uploads/<?php echo $row['add_book']?>"><?php echo $row['add_book']?></a><br />
            <label class="lable_1">Add Link (Video Links)</label>
            <input class="form-control modal_form" type="text" name="add_link" placeholder="Book Link" value="<?php echo $row['add_link'];?>" />
            <button class="btn modal_form_btn" name="update_book" type="submit">SUBMIT</button>
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