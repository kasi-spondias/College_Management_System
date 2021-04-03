<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>STUDENT QUERIES COMPLAINTS</title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php 
include('db.php');
include('stu_header.php'); 
if(isset($_SESSION['roll_no'])){ 
$roll_no = $_SESSION['roll_no'];
	$query = $db->query("select * from student_register where roll_no='$roll_no'") or die(mysqli_error());
	$row = mysqli_fetch_assoc($query);
	$branch = $row['branch'];
	$sem = $row['semister'];
?>
<!-- Start Content -->
<div class="sub_header_bg">
    QUERIES/COMPLAINTS
</div>	
<div class="strip" align="right">
    <a href="faculty_dashboard.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">QUERIES/COMPLAINTS</a>
</div>
	<!-- Start Section 1 -->
 		  
		<div class="row m40_0">
        <div class="contact_form_text" style="margin-top:20px;">VIEW QUERIES/COMPLAINTS</div>
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
        <table class="table table-bordered table-responsive table-bg" id="pages">
                          <thead>
                            <tr align="center">
                                <th class="text-center">S.No.</th>
                                <th class="text-center">Roll&nbsp;Number</th>
                                <th class="text-center">Qualification</th>
                                <th class="text-center">Stream</th>
                                <th class="text-center">Semester</th>
                                <th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Query&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Solution&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th class="text-center">Uploded&nbsp;By</th>
                            </tr>
              </thead>
                <tbody>
               <?php 
               $query = $db->query("select * from queries where stream='$branch' and semester = '$sem'  ORDER BY id DESC") or die(mysqli_error());
			   //$query = $db->query("select * from books where semester = '$sem' ORDER BY id DESC") 
               $id = 1;
                while($row=mysqli_fetch_array($query)) 
                {
					//print_r($row); die;
                    echo "<tr align='center'>";
                    echo "<td align='center'>".$id."</td>";
					 echo "<td align='center'>".$row['roll_no']."</td>";
					echo "<td align='center'>".$row['qualification']."</td>";
					echo "<td align='center'>".$row['stream']."</td>";
                    echo "<td align='center'>".$row['semester']."</td>";
					echo "<td align='center'>".$row['query']."</td>";
					echo "<td align='center'>".$row['solution']."</td>";
					echo "<td align='center'>".$row['uploaded_by']."</td>";
                    echo "</tr>";
                    $id++;
                } 
                ?>
            </tbody>
        </table>
    </div>
  </div>
    
	<!-- End Section 1 -->
    
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