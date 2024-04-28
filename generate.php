<?php
 session_start();
require_once "function.php";

$user     = new IDcard();

if(isset($_REQUEST['id'])){
	 $id = $_REQUEST['id'];
	 $photo = $_REQUEST['photo'];
	 $a_id = $_REQUEST['a_id'];
 } else {
	 header('Location: viewall.php');
	 exit();
 }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	   <meat charset="UTF-8">
	   <title>ID Card Generator!</title>
	   <link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
    <!DOCTYPE html>
  <html>
   <body>
    <div class="card_front">
	<div class="logo">
       <img src="img/id_logo.png" alt="logo" style="width:20%" height="85px"> 	
	   <h4><font color="blue">The Institute of <br/>Chartered Accountants </br>of Bangladesh</font></h4>
	</div>   
     <div class="container">
	   <?php
			   $getMem = $user->getMemById($id);
			   foreach($getMem as $mem){
			?>
			  <p>
		        <img src="mem_images/<?php echo $mem['img']; ?>" width="140px" height="150px"/>
		      </p>
	</div>		  
			  <div class="id_card">
				<table width="93%">
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr>
					<td align="right" width="100%" ><font size="4"><strong><?php  echo $mem['name'];?></strong></font></td>
				</tr>
				<tr>	
					<td align="right" width="100%"><font size="2"><strong>Enrollment Number :<?php  echo $mem['en_no']; ?></strong></font></td>
				</tr>
				<tr>	
					<td>&nbsp;&nbsp;&nbsp;<img src="images/<?php echo $photo.".png"; ?>" width="95px" height="95px" /></td>						
				</tr>
				</table>  
                </div>  				
			   <?php } ?>        		   		          
    </div>

	<div class="card_back">
     <div class="container_back">
	   <?php
			   $getMem = $user->getMemById($id);
			   foreach($getMem as $mem){
			?>
				<table width="100%">
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr>
					<td align="left" width="100%" ><font size="2.5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<strong>National ID No:<?php  echo $mem['na_vo_num'];?></strong></font></td>
				</tr>
				<tr>	
					<td align="left" width="100%"><font size="2.5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<strong>Blood Group : <?php  echo $mem['blood']; ?></strong></font></td>
				</tr>
				</table>               
			   <?php } ?>        		   
     </div> 
      <div class="sign_desg">
	  <?php
			$getAuth = $user->getAuthById($a_id);
			   foreach($getAuth as $auth){   
			?>
	        <table width="100%">
			    <tr><td></td></tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr>
					<td align="center" width="100%" ><img src="auth_images/<?php echo $auth['signature']; ?>" width="50px" height="50px" /></td>
				</tr>
				<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-----------</td></tr>
				<tr>	
					<td align="center" width="100%"><font size="3"><?php  echo $auth['designation']; ?></font></td>
				</tr>
				</table> 
			   <?php  } ?>	
	  </div>	 
      <div class="warning">
	     <article>
		    <p align="center"><font size="0.6" color="white">If found,please return this card to</font><hr/></p>
			<p align="center">
			<font size="0.8" color="white"><small><strong>The Institute of Chartered Accounts of Bangladesh</strong></small></font><br/>
			<font size="0.4" color="white"><small>Chartered Account Bhaban,100 Kazi Nazrul Islam Avenue,Dhaka-1215</small>
			                               <small>Tel:+880-2-9117521, 9115340,9137847, Fax:+880-2-9125266</small><br/>
			                               <small>Email:
										   <?php
			                              $getMem = $user->getMemById($id);
			                              foreach($getMem as $mem){
			                                 echo $mem['email'] ;?>
										  </small><?php } ?></font></p>
		 </article>
	  </div>
        <p width="100%"><font size="1.2" color="741C09">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;www.icab.org.bd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('F Y'); ?></font></p>  	  
    </div>
	<div class="end" ></div>
	<div class="button">
	<button id="printPageButton" onclick="myFunction()">Print</button>
		     <script>
               function myFunction() {
               window.print();
              }
             </script>
			  <style type="text/css" media="print">
         @page {	 
         margin:0;
		 body { 
        writing-mode: horizontal-tb;
    }
		 }
@media print
{    
    #printPageButton {
    display: none !important;
  }
}
</style>
	</div>		 
   </body>
   </html>