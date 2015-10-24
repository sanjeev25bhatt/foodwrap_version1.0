<?php
 $dbc = mysqli_connect('localhost', 'root', '', 'a_database') or die('Error');
 require ('core.inc.php');

 if(!isset($_SESSION['user_id'])&&empty($_SESSION['user_id'])){
		   if(isset($_POST['firstname'])&&isset($_POST['surname'])&&isset($_POST['email'])&&isset($_POST['phone'])&&isset($_POST['password'])&&isset($_POST['password_again'])){
			 
			 $firstname = $_POST['firstname'];
			 $surname = $_POST['surname'];
			 $email = $_POST['email'];
			 $phone = $_POST['phone'];
			 $password = $_POST['password'];
			 $password_again = $_POST['password_again'];
			 $password_hash = md5($password);
		 
			 if(!empty($_POST['firstname'])&&!empty($_POST['surname'])&&!empty($_POST['email'])&&!empty($_POST['phone'])&&!empty($_POST['password'])&&!empty($_POST['password_again'])){
			   if(strlen($firstname)>40||strlen($surname)>40||strlen($email)>65||strlen($phone)>10){
				 echo 'Please ahear to maximum length of fields';
			   } else if($password!=$password_again){
				 echo 'Passwords do not match, try again!';
			   } else {
				 $query = "SELECT `email` FROM `users` WHERE `email`='$email'";
				 if($query_run = mysqli_query($dbc, $query)){
				   if(mysqli_num_rows($query_run)==1){
					 echo 'You have already registered with the email id: '.$email;
				   }else if(mysqli_num_rows($query_run)==0){
					 $query = "INSERT INTO `users` VALUES('','$firstname','$surname','$email','$phone','$password_hash')";
					 if($query_run = mysqli_query($dbc, $query)){
					   echo 'You have successfully registered, log in and be with us!';
					 }
				   }else {echo 'Sorry we could\'t register, try again later'; }
				 }
			   }
			 } else { echo 'All fields are required'; }
		   }
		 } else if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
		   echo 'You\'re are already registered and logged in, click <a href="logout.php">here</a> to logout.';
		 }
	

?>
