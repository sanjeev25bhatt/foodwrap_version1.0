<?php
	include "connect.php";
	require ('core.php');
	if((isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))||(isset($_COOKIE['user_id'])&&!empty($_COOKIE['user_id']))){
		if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
			$chatuserid = $_SESSION['user_id'];
		} else if(isset($_COOKIE['user_id'])&&!empty($_COOKIE['user_id'])) {
			$chatuserid = $_COOKIE['user_id'];
		}
		$adminid = $_POST['admin_id'];
		$chattext = $_POST['chat'];
		if(isset($chattext)&&!empty($chattext)){	
			$by = 'user';
			$query = "INSERT INTO `chat` VALUES('','$chatuserid','$adminid','$chattext','$by')";
			if($query_run = mysqli_query($dbc, $query)){
				echo $chatuserid;
			} 
		}
	} 
?>