<?php
 $dbc = mysqli_connect('localhost', 'root', 'root', 'a_database') or die('Error');
 require('core.inc.php');

 if((isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))||(isset($_COOKIE['user_id'])&&!empty($_COOKIE['user_id']))){
   if(!empty($_SESSION['user_id'])){
     $user_id = $_SESSION['user_id'];
   } else if(empty($_SESSION['user_id'])&&!empty($_COOKIE['user_id'])){
     $user_id = $_COOKIE['user_id'];
   }
   $query = "SELECT `firstname` FROM `users` WHERE `id`='$user_id'";
   if($query_run = mysqli_query($dbc, $query)){
     $query_num_rows = mysqli_num_rows($query_run);
     if($query_num_rows==1){
       while($user_data_row = mysqli_fetch_array($query_run)){
         $firstname = $user_data_row['firstname'];
       }
     }
   }
   $query = "SELECT `surname` FROM `users` WHERE `id`='$user_id'";
   if($query_run = mysqli_query($dbc, $query)){
     $query_num_rows = mysqli_num_rows($query_run);
     if($query_num_rows==1){
       while($user_data_row = mysqli_fetch_array($query_run)){
         $surname = $user_data_row['surname'];
       }
     }
   }
	
   echo 'You\'re logged in, '.$firstname.' '.$surname;
 } else {
	 echo '5';
 }
?>