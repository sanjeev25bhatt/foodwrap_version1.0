<?php
 $dbc = mysqli_connect('localhost', 'root', '', 'a_database') or die('Error');
 require ('core.inc.php');
 
 if(!isset($_SESSION['user_id'])&&empty($_SESSION['user_id'])){
	 if(isset($_POST['email'])&&isset($_POST['password'])){
	   $email = $_POST['email'];
	   $password = $_POST['password'];
	   $password_hash = md5($password);

	   if(!empty($email)&&!empty($password)){
		 $query = "SELECT `id` FROM `users` WHERE `email`='".mysql_real_escape_string($email)."' AND `password`='".mysql_real_escape_string($password_hash)."'";

		 if($query_run = mysqli_query($dbc, $query)){
		   $query_num_rows = mysqli_num_rows($query_run);
		   if($query_num_rows==0){
			 echo '1';
		   } else if($query_num_rows==1){
			 while($user_id_row = mysqli_fetch_array($query_run)){
			   $_SESSION['user_id'] = $user_id_row['id'].'<br />';
			   }
			   header('Location: loggedin.php');
		   }
		 }

	   } 
	 }
 } else if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
		echo 'You\'re are already registered and logged in, click <a href="logout.php">here</a> to logout.';
	} 

?>