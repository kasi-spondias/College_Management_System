<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>EXAM RESULTS</title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php 
include('db.php');
include('stu_header.php'); 
if(isset($_SESSION['roll_no'])){ 
$exam_id=$_GET['exam_id'];
$roll_no = $_SESSION['roll_no'];
?>
<div class="sub_header_bg">
	View exam Results
</div>	
<div class="strip" align="right">
	<a href="index.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">View exams</a>
</div>


<!-- Start Content -->
    
    <div class="row m40_0">
        <div class="contact_form_text" style="margin-top:20px;">EXAM RESULTS</div>
        <div align="center"><img src="images/shadow.png" class="img img-responsive" /></div>
        <div class="clearfix"></div>
        <div style="overflow-x:scroll">
        <table class="table table-bordered" id="pages">
        	<thead>
            	<tr>
                	<th class="text-center">S.No</th>
                    <th class="text-center">Subject</th>
                    <th class="text-center">Marks</th>
                </tr>
            </thead>
            <tbody>
            	<?php
					$i=1;
					$query = $db->query("select * from exam_report where roll_no = '$roll_no' ORDER BY id DESC") or die(mysqli_error());
					while($row = mysqli_fetch_assoc($query)){
						echo '<tr align="center">';
						echo '<td>'.$i.'</td>';
						echo '<td>'.$row['subject'].'</td>';
						echo '<td>'.$row['marks_secured'].'</td>';
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