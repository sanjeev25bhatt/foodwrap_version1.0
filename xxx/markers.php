<?php
	include "chat/connect.php";
	require ('core.inc.php');

	if((!isset($_SESSION['user_id'])&&empty($_SESSION['user_id']))||(!isset($_COOKIE['user_id'])&&empty($_COOKIE['user_id']))){
		$city = $_POST['city'];
		$query = "SELECT * FROM `map_markers` WHERE `city`='".mysql_real_escape_string($city)."'";
		if($query_run = mysqli_query($dbc, $query)){
			$query_num_rows = mysqli_num_rows($query_run);
			
			$i=0;
			$marker_array = array();
			while($user_row = mysqli_fetch_assoc($query_run)){
				
				$marker_array[$i] = $user_row;
				$i++;
			}
			echo json_encode($marker_array);
		}
	}
?>