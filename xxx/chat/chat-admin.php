<?php
	include "connect.php";
	require ('core.php');
	if(isset($_SESSION['admin_id'])&&!empty($_SESSION['admin_id'])){
		$userid = $_POST['userid'];
		$adminid = $_SESSION['admin_id'];
		$chattext = $_POST['chat'];
		$by = 'admin';
		if(isset($chattext)&&!empty($chattext)){
			$query = "INSERT INTO `chat` VALUES('','$userid','$adminid','$chattext','$by')";
			$query_run = mysqli_query($dbc, $query); 
		}
	} 
?>