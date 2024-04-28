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
            <a href="#">Add Authority</a>
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
			<div class="content">			<h2>Designation Details Adding Form  : </h2>     </div>
			 <p class="msg"> 
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$a_name = $_POST['a_name'];
						$designation = $_POST['designation'];
						
						$imgFile = $_FILES['signature']['name'];
						$tmp_dir = $_FILES['signature']['tmp_name'];
						$imgSize = $_FILES['signature']['size'];
						
						if(empty($a_name) or empty($designation) or empty($imgFile)){
							$errMSG = "<span style='color:#e53d37'>Error...Field Must Not Be Empty</span>";
						} else {
							$upload_dir = 'auth_images/'; 
							$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
                             $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                            $signpic = rand(1000,1000000).".".$imgExt;
                             if(in_array($imgExt, $valid_extensions)){   
                            if($imgSize < 1000000)    {
                             move_uploaded_file($tmp_dir,$upload_dir.$signpic);
                              }
                              else{
                            $errMSG = "Sorry, your file is too large.";
                               }
                              }
                             else{
                              $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
                            }
						}
							if(!isset($errMSG))
                            {
							$addauth = $user->addAuth($a_name,$designation,$signpic);
						    if($addauth){
								echo "<span style='color:green'>Authority Information Added</span>";
							}  else {
								echo "<span style='color:#e53d7'>Name or Email already exist</span>";
							}
						}
					}
				?>			 
			 </p>
		
	<div class="login_reg"> 
				<form action="" enctype="multipart/form-data"  method="post">
					<table>	
						<tr>
							<td>Name:</td>
							<td><input type="text" name="a_name" /></td>
						</tr>	
						<tr>
							<td>Designation:</td>
							<td><input type="text" name="designation" /></td>
						</tr>
						<td>Signature:</td>
                        <td><input class="input-group" type="file" name="signature" accept="image/*" /></td>	
						
						<tr>
							<td colspan="2"> 
							<span style="float:right">
								<input type="submit" name="enter" value="Enter" />
								<input type="reset" value="Reset" />
							<span>
							</td>
						</tr>
						
					</table>
				</form>
			</div>	
		<div class="space1"></div>	
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