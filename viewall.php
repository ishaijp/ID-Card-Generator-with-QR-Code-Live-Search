<?php
 session_start();
require_once "function.php";

$user     = new IDcard();
$search     = new IDcard();
$auth     = new IDcard();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	   <meat charset="UTF-8">
	   <title>ID Card Generator!</title>
	   <link rel="stylesheet" type="text/css" href="style.css" />
	   <link rel="stylesheet" type="text/css" href="footer-distributed-with-address-and-phones.css"/>
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	   <script src="js/jquery.js"></script>
	   <script src="js/main.js"></script>
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
			<div class="content">
			<div class="content">
	  <form action="" method="post">
	     <table>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<font color="blue"><strong>Search</strong></font></td>
				<td>:</td>
				<td>
					<input type="text" name="livesearch" id="livesearch" placeholder="Enter Enroll Number..." style="width: 130px;"/>
				</td>
			</tr>
		 </table>
		   <div id="statuslive"></div>
	  </form>
	</div>
				<h2>All Member Information: </h2>
			</div>
        <script>   			
			$(document).ready(function() {
            $('#example').DataTable( {
           "pagingType": "full_numbers"
          } );
           } );
		</script>   	
			 	  </br><table id="example" class="tbl_one">
					<tr>
						<th>Enroll</th>
						<th>Name</th>
						<th>NV ID Num.</th>
						<th>Blood Group</th>
						<th>Address</th>
						<th>Cellphone</th>
						<th>Email</th>
						<th>Photo</th>
                        <th>GeN</th>   						
                        <th>QR Code</th>   						
                        <th>Authority</th>   						
                           						
					</tr>
					
				<tr>
									
			   <?php
			   $getMem = $user->getAllMem();
			   foreach($getMem as $user){
			?>                
					<td><?php  echo $user['en_no']; ?></td>
					<td><?php  echo $user['name']; ?></td>
					<td><?php  echo $user['na_vo_num']; ?></td>
					<td><?php  echo $user['blood']; ?></td>
					<td><?php  echo $user['address']; ?></td>
					<td><?php  echo $user['cellphone']; ?></td>
					<td><?php  echo $user['email']; ?></td>
					<td><img src="mem_images/<?php echo $user['img']; ?>" width="50px" height="50px" /></td>
					<?php
                    $en =  htmlspecialchars("Enrollment#");					
					$na = htmlspecialchars("Name:");
					$nid = htmlspecialchars("NID:");
					$bg = htmlspecialchars("Blood Group:");
					$add = htmlspecialchars("Address:");
					$cell = htmlspecialchars("Cellphone;");
					$email = htmlspecialchars("Email:");
					$web = htmlspecialchars("Web: icab.org.bd");
					$text =  $en. $user['en_no']. ', '. $na. $user['name']. ', '. $nid. $user['na_vo_num']. ', '. $bg. $user['blood']. ', '. $add. $user['address']. ', '. $cell. $user['cellphone']. ', '. $email. $user['email']. ', '. $web;
					?>  
					<td>
                      <form action="viewall.php" method="post" >
                      <input type="hidden" name="qr_text" value='<?php echo "$text";?>'/>
                      <input type="submit" name="generate_text" value="GeN">
                      </form>
					  <?php
					  if(isset($_POST['qr_text']))
                      {
                       include('phpqrcode/qrlib.php'); 
                       $qr=$_POST['qr_text'];
                       $folder="images/";
                       $file_name=md5($qr).".png";
                       $file_name=$folder.$file_name;
                       QRcode::png($qr,$file_name);
                        //To Display Code Without Storing
                       QRcode::png($qr);
					   header('location: ' . $_SERVER['PHP_SELF']);				  
					  }
					  ?> 
					</td>
					  <?php $image = md5($text) ; ?>
					<td><img src="images/<?php echo basename($image).".png"; ?>" width="50px" height="50px"/></td>
                    <td><?php  echo $user['a_id']; ?></td>        					
					<td><a href="generate.php?id=<?php echo $user['en_no'];?>&photo=<?php echo $image;?>&a_id=<?php echo $user['a_id']; ?>" target="_blank">Print</a></td>
				</tr>	
						<?php } ?>							
               </table>	
		<div class="pagination">
               <a href="viewall.php">&laquo;</a>
               <a class="active" href="viewall.php">1</a>
               <a href="viewall.php">2</a>
               <a href="viewall.php">3</a>
               <a href="viewall.php">4</a>
               <a href="viewall.php">5</a>
               <a href="viewall.php">6</a>
               <a href="viewall.php">&raquo;</a>
            </div>
		<div class="space2"></div>				
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