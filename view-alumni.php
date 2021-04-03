<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>VIEW ALUMNI DETAILS</title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php
 	include('db.php');
	include('admin_header.php'); 
	if(isset($_SESSION['u_name'])){
?>

<div class="sub_header_bg">
	VIEW ALUMNI DETAILS
</div>	
<div class="strip" align="right">
	<a href="dashboard.php">Home</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">View Alumni</a>
</div>


<!-- Start Content -->
    
    <div class="row m40_0">
        <div class="contact_form_text" style="margin-top:20px;">VIEW ALUMNI DETAILS</div>
        <div align="center"><img src="images/shadow.png" class="img img-responsive" /></div>
        <?php
			if(isset($_GET['del'])){ ?>
                <div class="col-sm-12">
                	<div class="alert alert-danger" role="alert">
                    	<strong>Success!</strong> Alumni has been deleted successfully!
                    </div>
                </div>	
		<?php }?>
        <div class="clearfix"></div>
        <div style="overflow-x:scroll">
        <table class="table table-bordered table-responsive table-bg" id="pages">
                          <thead>
                            <tr align="center">
                                <th class="text-center">S.No.</th>
                                <th class="text-center">Alumni&nbsp;Name</th>
                                <th class="text-center">Roll&nbsp;No</th>
                                <th class="text-center">Email&nbsp;Id</th>
								<th class="text-center">Date&nbsp;of&nbsp;Birth</th>
								<th class="text-center">Mobile</th>
								<th class="text-center">Batch</th>
                                <th class="text-center">Branch</th>
                                <th class="text-center">Designation</th>
								<th class="text-center">Work</th>
								
                                <th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
              </thead>
                <tbody>
               <?php 
               $query = $db->query("select * from alumni_reg ORDER BY id DESC") or die(mysqli_error());
               $id = 1;
                while($row=mysqli_fetch_array($query)) 
                {
					//print_r($row); die;
                    echo "<tr align='center'>";
                    echo "<td align='center'>".$id."</td>";
                    echo "<td align='center'>".$row['u_name']."</td>";
					echo "<td align='center'>".$row['roll_no']."</td>";
					echo "<td align='center'>".$row['email_id']."</td>";
					echo "<td align='center'>".$row['dob']."</td>";
					echo "<td align='center'>".$row['mobile_no']."</td>";
					echo "<td align='center'>".$row['batch']."</td>";
					echo "<td align='center'>".$row['branch']."</td>";
					echo "<td align='center'>".$row['designation']."</td>";
					echo "<td align='center'>".$row['work']."</td>";
					?>
                    <?php echo "<td align='center'><a href='edit-alumni.php?id=".$row['id']."' class='btn btn-sm btn-warning'>Edit</a>&nbsp;&nbsp;<a href='delete.php?id=".$row['id']."' class='btn btn-sm btn-danger'>Delete</a></td>";
                    echo "</tr>";
                    $id++;
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