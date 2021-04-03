<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>SUBJECTS</title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php 
include('db.php'); 
include('header.php'); 
?>
<div class="sub_header_bg">
	COURSES
</div>	
<div class="strip" align="right">
	<a href="index.php">Index</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">COURSES</a>
</div>

<!-- Start Content -->
    <div class="row m40_0">
        <div class="contact_form_text" style="margin-top:20px;">VIEW COURSE DETAILS</div>
        <div align="center"><img src="images/shadow.png" class="img img-responsive" /></div>
        <div style="overflow-x:scroll">
        <table class="table table-bordered table-responsive table-bg" id="pages">
                          <thead>
                            <tr align="center">
                                <th class="text-center">S.No.</th>
                                <th class="text-center">Course&nbsp;Code</th>
                                <th class="text-center">Course&nbsp;Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Minimum&nbsp;Attendance %</th>
                                <th class="text-center">Total&nbsp;Working&nbsp;Days</th>
                            </tr>
              </thead>
                <tbody>
               <?php 
               $query = $db->query("select * from courses ORDER BY id DESC") or die(mysqli_error());
               $id = 1;
                while($row=mysqli_fetch_array($query)) 
                {
					//print_r($row); die;
                    echo "<tr align='center'>";
                    echo "<td align='center'>".$id."</td>";
                    echo "<td align='center'>".$row['course_code']."</td>";
					echo "<td align='center'>".$row['course_name']."</td>";
					echo "<td align='center'>".$row['description']."</td>";
					echo "<td align='center'>".$row['attendance_per']."</td>";
					echo "<td align='center'>".$row['total_w_days']."</td>";
					echo "</tr>";
                    $id++;
				}
				?>
            </tbody>
        </table>
    </div>
  </div>
<!-- End Content -->



<?php include('footer.php'); ?>
<?php include('js_files.php'); ?>
</body>
</html>