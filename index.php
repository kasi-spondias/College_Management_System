<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial=scale=1" />
<title>Dr Lankapalli Bullayya College</title>
<?php include('css_files.php'); ?>
</head>

<body>
<?php 
include('db.php');
include('header.php'); 
?>
<!-- Start Slider -->
<!--<div id="banner_main_slider">
<div class="ws_images"><ul>
		<li><img src="images/banner_1.jpg" alt="banner_1" title=""/></li>
		<li><img src="images/banner_2.jpg" alt="banner_2" title=""/></li>
        <li><img src="images/banner_3.jpg" alt="banner_2" title=""/></li>
	</ul></div>
</div>	-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.3.15/slick.css">
<script src="https://cdn.jsdelivr.net/jquery.slick/1.3.15/slick.min.js"></script>
<div class="slider">
  <div>
<img src="images/slider1.jpg">
</div>
<div>
<img src="images/slider2.jpg">
</div>
</div>
<script>
jQuery('.slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    infinite: true,
autoplay: true,
autoplaySpeed: 3000,
pauseOnHover: false,
responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
{
          breakpoint: 500,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
   
});
</script>
<!-- End Slider -->

<!-- Start Content -->

	<!-- Start Section 1 -->
    <div class="container">
        <div class="row m50_0" align="center">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="maincla"><div class="imgclas"><img src="images/education.png" width="110" height="100" /></div>
                <div class="contclass"><h4>Education</h4>
                <p>Dr.Lankapalli Bullayya College of Education was established in the Academic year 2002-03 with ten faculty members, four supporting staff and five non-teaching staff with student strength of 100 and it has been running successfully since then. Four batches of students passed out of the College with high percentage of marks. The second, third and fourth batches of students secured 100 % pass percentage with 60 % securing first class. One of our students secured the University 1st rank in the year 2002-2003.</p></div></div>
          </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="maincla"><div class="imgclas"><img src="images/Activities.png" width="110" height="100" /></div>
                 <div class="contclass"><h4>Activities</h4>
                <p>Dr. Lankapalli Bullayya College in Visakhapatnam is all geared up for its cultural fest –JASHN 2K18 on 29th, 30th, 31st January 2018. Loaded with many fun-filled and entertaining activities, this fest seems to keep all the participants hooked over the three days..</p></div></div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="maincla"><div class="imgclas"><img src="images/special.png" width="110" height="100" /></div>
                 <div class="contclass"><h4>Special Education</h4>
                <p>Dr. Lankapalli Bullayya College is situated in Visakhapatnam in Andhra Pradesh state of India. Established in 2002, it is accredited from NAAC and it is affiliated to Andhra University. DR LANKAPALLI BULLAYYA COLLEGE, Visakhapatnam offers 5 courses across 2 streams namely Education, Engineering and across 2 degrees like B.Tech, B.Ed.Hostel facility is not available for its students. Additional campus facilities such as Computer Lab, Counselling, Guest house, Cls. Room, Grounds, WiFi are also there..</p></div></div>
            </div>
             <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="maincla"><div class="imgclas"><img src="images/Library.png" width="110" height="100" /></div>
                 <div class="contclass"><h4>Central Library</h4>
                <p>Dr. Lankapalli Bullayya College is situated in Visakhapatnam in Andhra Pradesh state of India has a ,Library & Information Centre provides uncompromising information and intellectual requirements to its students and faculty with a user-friendly approach. It offers a fully integrated and dynamic environment for conducting academic study. 
.</p></div></div>
            </div>
        </div></div>
	<!-- End Section 1 -->
    
<!-- End Content -->



<?php include('footer.php'); ?>
<?php include('js_files.php'); ?>
</body>
</html>