<?php
include "connect.php";
require ('core.php');
	if(isset($_SESSION['admin_id'])&&!empty($_SESSION['admin_id'])){
		session_destroy();
		header('Location: '.$http_referer);
		$admin_id= $_SESSION['admin_id'];
		$query = "UPDATE `admin` SET `online`='0' WHERE id='".mysql_real_escape_string($admin_id)."'";
		$query_run = mysqli_query($dbc, $query);
		$qr = "UPDATE `admin_status` SET `uid11`='0',`uid12`='0',`uid13`='0' WHERE admin_id='".mysql_real_escape_string($admin_id)."'";
		$qr_run = mysqli_query($dbc, $qr);
	} 
?>