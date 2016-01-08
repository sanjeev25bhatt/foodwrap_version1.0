<?php 
	include "connect.php";
	require ('core.php');
	$query = "SELECT `id` FROM `admin` WHERE `online`='10'";
	if($query_run = mysqli_query($dbc, $query)){
		$query_num_rows = mysqli_num_rows($query_run);
		if($query_num_rows==0){
			$query1 = "SELECT `id` FROM `admin` WHERE `online`='11'";
			if($query_run1 = mysqli_query($dbc, $query1)){
				$query_num_rows1 = mysqli_num_rows($query_run1);
				if($query_num_rows1==0){
					$query2 = "SELECT `id` FROM `admin` WHERE `online`='12'";
					if($query_run2 = mysqli_query($dbc, $query2)){
						$query_num_rows2 = mysqli_num_rows($query_run2);
						if($query_num_rows2==0){
							echo 'Currently no admin is available to chat';
						} else {
							while($admin_id_row2 = mysqli_fetch_array($query_run2)){
								$free_admin2 = $admin_id_row2['id'];
								echo $free_admin2;
								break;
							}
						}
					} else {
						echo '3rd query';
					}
				} else {
					while($admin_id_row1 = mysqli_fetch_array($query_run1)){
						$free_admin1 = $admin_id_row1['id'];
						echo $free_admin1;
						break;
					}
				}
			} else {
				echo '2nd query';
			}
		} else {
			while($admin_id_row = mysqli_fetch_array($query_run)){
				$free_admin = $admin_id_row['id'];
				echo $free_admin;
				break;
			}
		}
	} else {
		echo '1st query';
	}
?>
			