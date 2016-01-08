<?php
include "connect.php";
require ('core.php');
	if(isset($_SESSION['admin_id'])&&!empty($_SESSION['admin_id'])){
		session_destroy();
		$admin_id= $_POST['admin_id'];
		$query = "UPDATE `admin` SET `online`='00' WHERE id='".mysql_real_escape_string($admin_id)."'";
		if($query_run = mysqli_query($dbc, $query)){
			echo 'Ok';
		} else {
			echo 'Not Ok';
		}
	} else {
		echo 'query';
	}
?>