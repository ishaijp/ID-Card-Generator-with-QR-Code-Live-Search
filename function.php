<?php
require "config.php";

class IDcard{
	
	private $db;
	function __construct(){
		$this->db = new DatabaseConnection();
	}
	public function addMem($en_no,$name,$na_vo_num,$blood,$address,$cellphone,$email,$userpic,$a_id){
		global $pdo;
		$query = $pdo->prepare("SELECT id FROM members WHERE name = ? AND email = ?");
		$query->execute(array($name, $email));
		$num = $query->rowCount();
		
		if($num == 0){
			$query = $pdo->prepare("INSERT INTO members (en_no,name,na_vo_num,blood,address,cellphone,email,img,a_id) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)");
		    $query->execute(array($en_no,$name,$na_vo_num,$blood,$address,$cellphone,$email,$userpic,$a_id));
			return true;
		} else {
			print "<span style='color:#e53d7'>Error....username/email already used</span>";
		}
	}
	
	public function getAllMem(){
		global $pdo;
		
		$query = $pdo->prepare("SELECT * FROM members ORDER BY en_no DESC");
		$query->execute(array());
		 return $query->fetchALL(PDO::FETCH_ASSOC);		

	}
	
	public function getMemByID($id){
		global $pdo;
		
		$query = $pdo->prepare("SELECT * FROM members Where en_no='$id' ");
		$query->execute(array());
		return $query->fetchALL(PDO::FETCH_ASSOC);		

	}
	
	public function addAuth($a_name,$designation,$signpic){
		global $pdo;
		$query = $pdo->prepare("SELECT a_id FROM back_info WHERE a_name = ? ");
		$query->execute(array($a_name));
		$num = $query->rowCount();
		
		if($num == 0){
			$query = $pdo->prepare("INSERT INTO back_info (a_name,designation,signature) VALUES (?, ?, ?)");
		    $query->execute(array($a_name,$designation,$signpic));
			return true;
		} else {
			print "<span style='color:#e53d7'>Error....name already used</span>";
		}
	}
	
	public function getAllAuth(){
		global $pdo;
		
		$query = $pdo->prepare("SELECT * FROM back_info ORDER BY a_id ASC");
	    $query->execute(array());	
		return $query->fetchALL(PDO::FETCH_ASSOC);	
	}
	
	public function getAuthByID($a_id){
		global $pdo;
		
		$query = $pdo->prepare("SELECT * FROM back_info Where a_id='$a_id' ");
		$query->execute(array());
		return $query->fetchALL(PDO::FETCH_ASSOC);		

	}
	
	public function liveSearch($search){
		global $pdo;
		
		$query = $pdo->prepare("SELECT * FROM members WHERE en_no LIKE '%$search%'");
        $query->execute(array());
		$getsdata = $query->fetchALL(PDO::FETCH_ASSOC);
		if($getsdata) {
			$data = "";
			$data .='<table class="tbl_one"><tr>
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
						</tr>';
				foreach($getsdata as $result){
					$data .='<tr>
								<td>'.$result["en_no"].'</td>
								<td>'.$result["name"].'</td>
								<td>'.$result["na_vo_num"].'</td>
								<td>'.$result["blood"].'</td>
								<td>'.$result["address"].'</td>
								<td>'.$result["cellphone"].'</td>
								<td>'.$result["email"].'</td>
								<td><img src="mem_images/'.$result["img"].'" width="50px" height="50px" /></td>';
								
					$en =  htmlspecialchars("Enrollment#");					
					$na = htmlspecialchars("Name:");
					$nid = htmlspecialchars("NID:");
					$bg = htmlspecialchars("Blood Group:");
					$add = htmlspecialchars("Address:");
					$cell = htmlspecialchars("Cellphone;");
					$email = htmlspecialchars("Email:");
					$web = htmlspecialchars("Web: icab.org.bd");
					$text =  $en. $result["en_no"]. ', '. $na. $result["name"]. ', '. $nid. $result["na_vo_num"]. ', '. $bg. $result["blood"]. ', '. $add. $result["address"]. ', '. $cell. $result["cellphone"]. ', '. $email. $result["email"]. ', '. $web;
					
                    $data .='<td><form action="viewall.php" method="post" >
                      <input type="hidden" name="qr_text" value=""/>
                      <input type="submit" name="generate_text" value="GeN">
                      </form>';
					  if(isset($_POST["qr_text"]))
                      {
                       include("phpqrcode/qrlib.php"); 
                       $qr=$_POST["qr_text"];
                       $folder="images/";
                       $file_name=md5($qr).'.png';
                       $file_name=$folder.$file_name;
                       QRcode::png($qr,$file_name);
                        //To Display Code Without Storing
                       QRcode::png($qr);
					   header("location: " . $_SERVER["PHP_SELF"]);				  
					  }
					  $data .= '</td>';
					  $image = md5($text) ;				  
								$data .='<td><img src="images/'.basename($image).'.png'.'" width="50px" height="50px"/></td>
								<td>'.$result["a_id"].'</td>      					
					<td><a href="generate.php?id='.$result['en_no'].'&photo='.$image.'&a_id='.$result['a_id'].'" target="_blank">Print</a></td>
								</tr>';	
				}
                echo $data;  				
		}else {
			echo "Data not found.";
		}
	} 
}
?>	