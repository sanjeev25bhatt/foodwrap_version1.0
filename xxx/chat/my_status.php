<?php
include "connect.php";
require ('core.php');
	if(isset($_SESSION['admin_id'])&&!empty($_SESSION['admin_id'])){
		$admin_id = $_SESSION['admin_id'];
		$query = "SELECT `online` FROM `admin` WHERE `id`='".mysql_real_escape_string($admin_id)."'";
		if($query_run = mysqli_query($dbc, $query)){
			$query_num_rows = mysqli_num_rows($query_run);
			if($query_num_rows!=0){
				while($admin_id_row = mysqli_fetch_array($query_run)){
					$status = $admin_id_row['online'];
				}
				echo $status;
			}		
		}
	}
?>