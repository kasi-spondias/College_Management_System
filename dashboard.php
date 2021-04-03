<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>Admin DASHBOARD</title>
<?php include('css_files.php'); ?>
</head>

<body>

<?php 
include('db.php');
include('admin_header.php'); 
if(isset($_SESSION['u_name'])){ 
?>
<!-- Start Content -->
<div class="sub_header_bg">
    DASHBOARD
</div>	
<div class="strip" align="right">
    <a href="index.php">Index</a> &nbsp;<span style="color:#FFF;" class="fa fa-angle-right"></span>&nbsp; <a href="">DASHBOARD</a>
</div>
	<!-- Start Section 1 -->
 		  
		<div class="dashboard_bg" align="center">
        	Welcome To Admin
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