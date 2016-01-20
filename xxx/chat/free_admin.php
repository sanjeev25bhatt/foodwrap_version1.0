<?php 
	include "connect.php";
	require ('core.php');
	$user_id = $_POST['user_id'];
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
							echo 'Sorry for the inconvenience but currently no live chat rooms are available.';
						} else {
							while($admin_id_row2 = mysqli_fetch_array($query_run2)){
								$free_admin2 = $admin_id_row2['id'];
								$var = '13';
								$q2 = "UPDATE `admin` SET `online`='$var' WHERE id='".mysql_real_escape_string($free_admin2)."'";
								$q_run2 = mysqli_query($dbc, $q2);
								$qr2 = "UPDATE `admin_status` SET `uid13`='$user_id' WHERE admin_id='".mysql_real_escape_string($free_admin2)."'";
								$qr2_run = mysqli_query($dbc, $qr2);
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
						$var = '12';
						$q1 = "UPDATE `admin` SET `online`='$var' WHERE id='".mysql_real_escape_string($free_admin1)."'";
						$q_run1 = mysqli_query($dbc, $q1);
						$qr1 = "UPDATE `admin_status` SET `uid12`='$user_id' WHERE admin_id='".mysql_real_escape_string($free_admin1)."'";
						$qr1_run = mysqli_query($dbc, $qr1);
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
				$var = '11';
				$q = "UPDATE `admin` SET `online`='$var' WHERE id='".mysql_real_escape_string($free_admin)."'";
				$q_run = mysqli_query($dbc, $q);
				$qr = "UPDATE `admin_status` SET `uid11`='$user_id' WHERE admin_id='".mysql_real_escape_string($free_admin)."'";
				$qr_run = mysqli_query($dbc, $qr);
				echo $free_admin;
				break;
			}
		}
	} else {
		echo '1st query';
	}
?>
			