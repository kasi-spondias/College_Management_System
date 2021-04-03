<?php
@ob_start();
session_start();
?>
<div class="row">
	<div class="row header_main">
        	<div class="col-md-6 col-sm-2 col-xs-12 logo" align="center"><a href="index.php"><img src="images/logo1.png" width="154" height="150" /><h1 class="titlcont" align="center">E-Z COLLEGE PORTAL</h1></a></div>
            
            <div class="col-md-6 col-sm-3 col-xs-12 rigtarea">
                <div class="social_icons">
                    <ul>
                        <li><a href="https://www.facebook.com/freeonlineprojects/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://plus.google.com/101612697119159092378" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/free-time-learn-07598b143/" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
           </div>
    </div>
	<div class="clearfix"></div>
	<!-- Start Navbar -->
  <nav class="navbar navbar-default" id="flat-mega-menu">
  <div class="row">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand" href="index.php">LOGO</a>-->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
       		 <li><a href="index.php">HOME</a></li>
             <li><a href="about_us.php">ABOUT US</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="contact_us.php"><i class="fa fa-map-marker"></i> CONTACT US</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LOGIN<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#myModal_1" data-toggle="modal"><i class="fa fa-user"></i> Student</a></li>
                <li><a href="#myModal_2" data-toggle="modal"><i class="fa fa-user"></i> Faculty</a></li>
                <li><a href="#myModal_3" data-toggle="modal"><i class="fa fa-user"></i> Admin</a></li>
				<li><a href="alumni_reg.php"><i class="fa fa-user"></i> Alumni</a></li>
              </ul>
             </li>
          </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <!-- End Nav Bar -->
</div>

<!--modal for login form starts -->
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4 modal_bg">
	<div id="myModal_1" class="modal modal_2 fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
  <div class="modal-header">
   <form action="" method="post">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="images/close.png" width="20" height="20" /></button>
    <h4 class="modal-title">STUDENT LOGIN</h4>
  </div>
  <div class="modal-body">
    <input class="form-control modal_form" type="text" name="roll_no" data-tabindex="2" placeholder="Roll Number" required />
    <input class="form-control modal_form" type="password" name="password" data-tabindex="5" placeholder="Password" required />
    <button class="btn modal_form_btn" name="student_login" type="submit">LOGIN NOW</button>
	<a href="#myModal_5" data-toggle="modal"><i class="fa fa-user"></i> forgot password</a>
    <div style="margin-top:20px; font-size:18px;">New Student? <a href="student_register.php">Register Now</a></div>
  </div>
 </form>
</div>
</div>
<div class="col-md-4"></div>
</div>
<!--modal for login form ends --> 
<?php 
	if(isset($_POST['student_login'])){ //print_r($_POST); die;
		$roll_number = $_POST['roll_no'];
		$pass = md5($_POST['password']);
	$query = $db->query("select * from student_register where roll_no='$roll_number' and password ='$pass'") or die(mysqli_error());
	 $result=mysqli_fetch_assoc($query); //print_r($result); die;
   if($result)
   {
	$user = $result['roll_no'];
	$_SESSION['roll_no']= $user;
    header('location:stu_dashboard.php');
   }
   else
   {
	$message = "Please Check Your Username or password";
			echo "<script type='text/javascript'>alert('$message');</script>";
   }
   if(isset($_SESSION['roll_no'])){ 
	header("location:stu_dashboard.php");
	}	
}
?>

<!--modal for login form starts -->
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4 modal_bg">
	<div id="myModal_2" class="modal modal_2 fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
  <div class="modal-header">
   <form action="" method="post">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="images/close.png" width="20" height="20" /></button>
    <h4 class="modal-title">FACULTY LOGIN</h4>
  </div>
  <div class="modal-body">
    <input class="form-control modal_form" type="email" name="email_id" data-tabindex="2" placeholder="Email Id" required />
    <input class="form-control modal_form" type="password" name="password" data-tabindex="5" placeholder="Password" required />
    <button class="btn modal_form_btn" name="faculty_login" type="submit">LOGIN NOW</button>
	<a href="#myModal_6" data-toggle="modal"><i class="fa fa-user"></i> forgot password</a>
    <div style="margin-top:20px; font-size:18px;">New Faculty? <a href="faculty_register.php">Register Now</a></div>
  </div>
 </form>
</div>
</div>
<div class="col-md-4"></div>
</div>
<!--modal for login form ends --> 
<?php 
	if(isset($_POST['faculty_login'])){ //print_r($_POST); die;
		$email = $_POST['email_id'];
		$pass = md5($_POST['password']);
	$query = $db->query("select * from faculty_register where email_id='$email' and password ='$pass'") or die(mysqli_error());
	 $result=mysqli_fetch_assoc($query); //print_r($result); die;
   if($result)
   {
	$user = $result['email_id'];
	$_SESSION['email_id']= $user;
    header('location:faculty_dashboard.php');
   }
   else
   {
	$message = "Please Check Your Username or password";
			echo "<script type='text/javascript'>alert('$message');</script>";
   }
   if(isset($_SESSION['email_id'])){ 
	header("location:faculty_dashboard.php");
	}	
}
?>

<!--modal for login form starts -->
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4 modal_bg">
	<div id="myModal_3" class="modal modal_2 fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
  <div class="modal-header">
   <form action="" method="post">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="images/close.png" width="20" height="20" /></button>
    <h4 class="modal-title">ADMIN ACCOUNT</h4>
  </div>
  <div class="modal-body">
    <input class="form-control modal_form" type="text" name="user_name" data-tabindex="2" placeholder="User Name" required />
    <input class="form-control modal_form" type="password" name="user_pass" data-tabindex="5" placeholder="Password" required />
    <button class="btn modal_form_btn" name="admin_login" type="submit">LOGIN NOW</button>
  </div>
 </form>
</div>
</div>
<div class="col-md-4"></div>
</div>
<!--modal for login form ends --> 
<?php 
	if(isset($_POST['admin_login'])){ //print_r($_POST); die;
		$name = $_POST['user_name'];
		$pass = $_POST['user_pass'];
	$query = $db->query("select * from admin where u_name='$name' and u_pass ='$pass'") or die(mysqli_error());
	 $result=mysqli_fetch_assoc($query); //print_r($result); die;
   if($result)
   {
	$user = $result['u_name'];
	$_SESSION['u_name']= $user;
    header('location:dashboard.php');
   }
   else
   {
	$message = "Please Check Your Username or password";
			echo "<script type='text/javascript'>alert('$message');</script>";
   }
   if(isset($_SESSION['u_name'])){ 
	header("location:dashboard.php");
	}	
}
?>

<!--modal for login form starts -->
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4 modal_bg">
	<div id="myModal_4" class="modal modal_2 fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
  <div class="modal-header">
   <form action="" method="post">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="images/close.png" width="20" height="20" /></button>
    <h4 class="modal-title">ALUMNI LOGIN</h4>
  </div>
  <div class="modal-body">
    <input class="form-control modal_form" type="text" name="roll_no" data-tabindex="2" placeholder="Roll Number" required />
    <input class="form-control modal_form" type="password" name="password" data-tabindex="5" placeholder="Password" required />
	<button class="btn modal_form_btn" name="alumni_login" type="submit" >LOGIN</a></button>
<a href="#myModal_5" data-toggle="modal"><i class="fa fa-user"></i> forgot password</a>
  </div>
 </form>
</div>
</div>
<div class="col-md-4"></div>
</div>
<!--modal for login form ends --> 
<?php 
	if(isset($_POST['alumni_login'])){ //print_r($_POST); die;
		$roll_number = $_POST['roll_no'];
		$pass = md5($_POST['password']);
	$query = $db->query("select * from alumni_register where roll_no='$roll_number' and password ='$pass'") or die(mysqli_error());
	 $result=mysqli_fetch_assoc($query); //print_r($result); die;
   if($result)
   {
	$user = $result['roll_no'];
	$_SESSION['roll_no']= $user;
    header('location:alumni.php');
   }
   else
   {
	$message = "Please Check Your Username or password";
			echo "<script type='text/javascript'>alert('$message');</script>";
   }
   if(isset($_SESSION['roll_no'])){ 
	header("location:alumni.php");
	}	
}
?>


<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4 modal_bg">
	<div id="myModal_5" class="modal modal_2 fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
  <div class="modal-header">
  <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Forgot Password</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">@</span>
	  <input type="text" name="for_email" class="form-control" placeholder="Email" required>
	</div>
	<br />
        <input type="submit" name="for_pass" value="Forgot Password">
      </form>
</div>
</div>
<div class="col-md-4"></div>
</div>
<?php
if(isset($_POST['for_pass']) && !empty($_POST['for_pass'])){
	$emailid = $_POST['for_email'];
	$sql = $db->query("SELECT * FROM student_register WHERE email_id = '$emailid'");
	$r = mysqli_fetch_assoc($sql);
	//$res = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($sql);
	if($count == 1){
		
$password = $r['password'];
$to = $emailid;
$subject = "Your Recovered Password";
$message = "Please use this password to login " . $password;
$headers = "From : checking.testing@yahoo.com";
if(mail($to, $subject, $message, $headers)){
	echo "Your Password has been sent to your email id";
}else{
	echo "Failed";
	
}

	}else{
	echo "Email does not exist in database";
	}
	
}
?>

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4 modal_bg">
	<div id="myModal_6" class="modal modal_2 fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
  <div class="modal-header">
  <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Forgot Password</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">@</span>
	  <input type="text" name="for1_email" class="form-control" placeholder="Email" required>
	</div>
	<br />
        <input type="submit" name="for1_pass" value="Forgot Password">
      </form>
</div>
</div>
<div class="col-md-4"></div>
</div>

<?php
if(isset($_POST['for1_pass']) && !empty($_POST['for1_pass'])){
	$emailid = $_POST['for1_email'];
	$sql = $db->query("SELECT * FROM faculty_register WHERE email_id = '$emailid'");
	$r = mysqli_fetch_assoc($sql);
	//$res = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($sql);
	if($count == 1){
		
$password = $r['password'];
$to = $emailid;
$subject = "Your Recovered Password";
$message = "Please use this password to login " . $password;
$headers = "From : checking.testing@yahoo.com";
if(mail($to, $subject, $message, $headers)){
	echo "Your Password has been sent to your email id";
}else{
	echo "Failed";
	
}

	}else{
	echo "Email does not exist in database";
	}
	
}
?>

