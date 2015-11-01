<?php
$dbc = mysqli_connect('localhost', 'root', '', 'a_database') or die('Error');
require ('core.php');
	if(!isset($_SESSION['admin_id'])&&empty($_SESSION['admin_id'])){
		if(isset($_POST['adminname'])&&isset($_POST['password'])){
			$adminname = $_POST['adminname'];
			$password = $_POST['password'];
			$password_hash = md5($password);
			if(!empty($adminname)&&!empty($password)){
				$query = "SELECT `id` FROM `admin` WHERE `adminname`='".mysql_real_escape_string($adminname)."' AND `password`='".mysql_real_escape_string($password_hash)."'";
				if($query_run = mysqli_query($dbc, $query)){
					$query_num_rows = mysqli_num_rows($query_run);
					if($query_num_rows==0){
						echo 'in';
					} else if($query_num_rows==1){
						while($admin_id_row = mysqli_fetch_array($query_run)){
						$_SESSION['admin_id'] = $admin_id_row['id'];
						}	
						echo $_SESSION['admin_id'];
					}
				}
			}
		}
	} 
?>