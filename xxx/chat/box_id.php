<?php
include "connect.php";
require ('core.php');
	if(isset($_SESSION['admin_id'])&&!empty($_SESSION['admin_id'])){
		$admin_id = $_SESSION['admin_id'];
		$new_q = "SELECT * FROM `admin_status` WHERE `admin_id`='".mysql_real_escape_string($admin_id)."'";
		if($new_q_run = mysqli_query($dbc, $new_q)){
			$new_q_num_rows = mysqli_num_rows($new_q_run);
			if($new_q_num_rows!=0){
				$i=0;
				$status_array = array();
				while($user_id_row = mysqli_fetch_array($new_q_run)){
					$status_array[$i] = $user_id_row;
					$i++;
				}
				echo json_encode($status_array);
			}	
		}
	}
?>