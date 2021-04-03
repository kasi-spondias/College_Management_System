<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>EXAM DETAILS</title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php 
include('db.php');
include('faculty_header.php'); 
if(isset($_SESSION['email_id'])){ 
$email = $_SESSION['email_id'];
	$query = $db->query("select * from faculty_register where email_id='$email'") or die(mysqli_error());
	$row = mysqli_fetch_assoc($query);
	$name = $row['name'];
?>
<div class="sub_header_bg">
	View exams
</div>	
<div class="strip" align="right">
	<a href="index.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">View exams</a>
</div>


<!-- Start Content -->
    
    <div class="row m40_0">
        <div class="contact_form_text" style="margin-top:20px;">EXAM DETAILS</div>
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
                	<th class="text-center">Branch</th>
                    <th class="text-center">Semester</th>
                    <th class="text-center">Subject</th>
                    <th class="text-center">Time&nbsp;(mins)</th>
                    <th class="text-center">No&nbsp;Questions</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            	<?php
					$i=1;
					$query = $db->query("select * from exams where uploaded_by = '$name' ORDER BY id DESC") or die(mysqli_error());
					while($row = mysqli_fetch_assoc($query)){
						echo '<tr align="center">';
						echo '<td>'.$i.'</td>';
						echo '<td>'.$row['branch'].'</td>';
						echo '<td>'.$row['semester'].'</td>';
						echo '<td>'.$row['subject'].'</td>';
						echo '<td>'.$row['time_duration'].'</td>';
						echo '<td>'.$row['no_of_questions'].'&nbsp;&nbsp;&nbsp;<a href="add-faculty-questions.php?id='.$row['id'].'" class="btn btn-sm btn-warning">Add Questions</a></td>';
						echo '<td><a href="edit-faculty-exams.php?id='.$row['id'].'" class="btn btn-sm btn-warning">Edit</a>&nbsp;&nbsp;&nbsp;<a href="delete.php?exam_id='.$row['id'].'" class="btn btn-sm btn-danger">Delete</a></td>';
						echo '</tr>';
						$i++;	
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