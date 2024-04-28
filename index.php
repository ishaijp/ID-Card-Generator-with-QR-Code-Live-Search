<?php
 session_start();
require_once "function.php";

$user     = new IDcard();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	   <meat charset="UTF-8">
	   <title>ID Card Generator!</title>
	   <link rel="stylesheet" type="text/css" href="style.css" />
	   <link rel="stylesheet" type="text/css" href="footer-distributed-with-address-and-phones.css"/>
	</head>
	<body>
	<div class="wrapper">
	    <div class="header">
		  <h3><i>auto</i> - ID Card Generating System</h3>
		</div> 
		<div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="index.php">Home</a>
            <a href="memberadd.php">Add Member</a>
            <a href="sign_desg.php">Add Authority</a>
            <a href="viewall.php">Generate</a>
         </div>
         <div id="main">
          <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
        </div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}
</script>	
		<div class="box">
			<h2><font color="#A5333C" size="5">Welcome to the <strong><i>auto</i>-ID Card generating System</strong></font></h2>
			<p><font size="6"><strong>About This System:</strong></font><br/><br/><font size="2">This is an automatic ID card generating system with valid QR code. 
			After submitting <br/>full valid information, anyone
			can easily generate ID-card with stable graphics. <br/>This system is exclusively designed for ICAB.<br/><br/>Please Click 'Menu' for
			furhter assistance...!!</font></p>
		</div>
	<footer class="footer-distributed">

			<div class="footer-left">

			  <div class="footer-icon">
				<a href="icab.org.bd"><img src="img/logo.jpg" alt="icab" /></a>
              </div>

				<p class="footer-links">
					<a href="index.php">Home</a>
					·
					<a href="#">Faq</a>
					·
					<a href="#">Contact</a>
				</p>

				<p class="footer-company-name">isha_ijp &copy; 2017</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Developed By</span><span>Ishrat Jahan</span> Junior Executive (IT)<span>The Institute of Chartered</span><span>Accountants of Bangladesh</span></p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">isha_ijp@ymail.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>System Specification</span>
					This is a ID card printing system made for internal use of ICAB staffs.
				</p>
				<div class="footer-icons">

				   <a href="facebook.com"><img src="img/fb.png" alt="fb" /></a>
				   <a href="twitter.com"><img src="img/tw.png" alt="twitter" /></a>
				   <a href="linkedin.com"><img src="img/in.png" alt="Linkedin" /></a>
				</div>
			</div>

		</footer>
    </div>	
</body>	
</html> 	