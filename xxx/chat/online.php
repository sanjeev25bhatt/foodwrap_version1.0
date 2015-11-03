<?php
include "connect.php";
require ('core.php');
	if(isset($_POST['action'])&&!empty($_POST['action'])){
			
			$admin_id= $_SESSION['admin_id'];
			$admin_action = $_POST['action'];
			if($admin_action=='online'){
				$query = "UPDATE `admin` SET `online`='1' WHERE id='".mysql_real_escape_string($admin_id)."'";
				if($query_run = mysqli_query($dbc, $query)){
					echo 'Ok';
				} else {
					echo 'Not Ok';
				}
			} else if($admin_action=='offline'){
				$query = "UPDATE `admin` SET `online`='0' WHERE id='".mysql_real_escape_string($admin_id)."'";
				$query_run = mysqli_query($dbc, $query);
			} 
	} else {echo 'Empty';}
	
?>