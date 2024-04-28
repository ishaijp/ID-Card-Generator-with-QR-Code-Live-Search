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
			<div class="content">			<h2>Member Information Adding Form  : </h2>     </div>
			 <p class="msg"> 
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$a_id = $_POST['a_id'];
						$en_no = $_POST['en_no'];
						$name = $_POST['name'];
						$na_vo_num = $_POST['na_vo_num'];
						$blood = $_POST['blood'];
						$address = $_POST['address'];
						$cellphone = $_POST['cellphone'];
						$email = $_POST['email'];
						
						$imgFile = $_FILES['img']['name'];
						$tmp_dir = $_FILES['img']['tmp_name'];
						$imgSize = $_FILES['img']['size'];
						
						if(empty($a_id)or empty($en_no) or empty($name) or empty($na_vo_num) or empty($blood) or empty($address) or empty($cellphone) or empty($email) or empty($imgFile)){
							$errMSG = "<span style='color:#e53d37'>Error...Field Must Not Be Empty</span>";
						} else {
							$upload_dir = 'mem_images/'; 
							$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
                             $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                            $userpic = rand(1000,1000000).".".$imgExt;
                             if(in_array($imgExt, $valid_extensions)){   
                            if($imgSize < 1000000)    {
                             move_uploaded_file($tmp_dir,$upload_dir.$userpic);
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
							$addmem = $user->addMem($en_no,$name,$na_vo_num,$blood,$address,$cellphone,$email,$userpic,$a_id);
						    if($addmem){
								echo "<span style='color:green'>Member Information Added</span>";
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
					<td><label>  Authority: </label></td>
					<td>
						<select id="select" name="a_id">
						   <option>Select Authority</option>
						             <?php
			                           $getAuth = $user->getAllAuth();
										foreach($getAuth as $user){
			                            ?>
							<option value="<?php echo $user['a_id']; ?>"><?php echo $user['a_name']; ?></option>
									   <?php } ?>
			            </select> 
				     </td>	
					 </tr>
						<tr>
							<td>Enrollment No:</td>
							<td><input type="text" name="en_no"  /></td>
						</tr>

						<tr>
							<td>Name :</td>
							<td><input type="text" name="name" /></td>
						</tr>	

						<tr>
							<td>National Voter ID Number:</td>
							<td><input type="text" name="na_vo_num" /></td>
						</tr>

                        <tr>
							<td>Blood Group:</td>
							<td><input type="text" name="blood" /></td>
						</tr>					
						
						<tr>
							<td>Address:</td>
							<td><input type="text" name="address"  /></td>
						</tr>
						
						<tr>
							<td>Cellphone:</td>
							<td><input type="text" name="cellphone" /></td>
						</tr>
						
						<tr>
							<td>Email:</td>
							<td><input type="email" name="email" /></td>
						</tr>	

						<td>Profile Img:</td>
                        <td><input class="input-group" type="file" name="img" accept="image/*" /></td>	
						
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
		<div class="space"></div>	
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