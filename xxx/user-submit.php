<?php
	include "chat/connect.php";
	
	if(isset($_POST['email'])&&isset($_POST['message'])){
		$email = $_POST['email'];
		$message = $_POST['message'];
		if(!empty($email)&&!empty($message)){
			$query = "SELECT `email` FROM `users` WHERE `email`='$email'";
			
			if($query_run = mysqli_query($dbc, $query)){
				$query_num_rows = mysqli_num_rows($query_run);
				if($query_num_rows==0){
					echo 'You are not an authorized user yet, please sign up and then try again later.';
				} else if($query_num_rows==1){
					echo 'Your query has been picked, we owe you a greate thanks for connecting with us. <br />';
				}
			}
		} else { echo 'You must fill all the required fields.';}
	}
?>