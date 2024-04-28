<?php
	include_once ('function.php');
	$user     = new IDcard();
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$search = $_POST['search'];
		$lsearch = $user->liveSearch($search);
	}
?>