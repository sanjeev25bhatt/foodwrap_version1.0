<?php
	include "chat/connect.php";
	require ('core.inc.php');
	if((isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))||(isset($_COOKIE['user_id'])&&!empty($_COOKIE['user_id']))){
		if(isset($_COOKIE['user_id'])&&!empty($_COOKIE['user_id'])){		
			$user_id = $_COOKIE['user_id'];
		} else if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
			$user_id = $_COOKIE['user_id'];
		}
		$order_id = $_POST['order_id'];
		if(isset($order_id)&&!empty($order_id)){
			$query = "SELECT * FROM `map-tracker` WHERE `order_id`='".mysql_real_escape_string($order_id)."' AND `user_id`='".mysql_real_escape_string($user_id)."'";
			if($query_run = mysqli_query($dbc, $query)){
				$query_num_rows = mysqli_num_rows($query_run);
				
				$i=0;
				$track_array = array();
				while($track_row = mysqli_fetch_assoc($query_run)){
					
					$track_array[$i] = $track_row;
					$i++;
				}
				echo json_encode($track_array);
			}
		}
	}
?>