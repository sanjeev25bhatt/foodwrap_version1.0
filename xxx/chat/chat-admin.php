<?php
	$dbc = mysqli_connect('localhost', 'root', '', 'a_database') or die('Error');
	require ('core.php');
	if(isset($_SESSION['admin_id'])&&!empty($_SESSION['admin_id'])){
			$userid = '8';
			$adminid = $_SESSION['admin_id'];
			$chattext = $_POST['chat'];
			$by = 'admin';
			$query = "INSERT INTO `chat` VALUES('','$userid','$adminid','$chattext','$by')";
			if($query_run = mysqli_query($dbc, $query)){
				echo $adminid;
			} 
	} 
?>