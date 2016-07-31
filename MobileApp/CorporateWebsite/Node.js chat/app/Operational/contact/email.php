<?php
	if(isset($_POST['email'])&&isset($_POST['subject'])&&isset($_POST['message'])){
		$to = 'sales@softnerve.com';
		$another = 'hr@softnerve.com'
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		if(!empty($email)&&!empty($subject)&&!empty($message)){
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				echo 'Please enter a valid Email address.';				
			}else {
				if(mail($to, $subject, $message, $email)&&mail($another, $subject, $message, $email)){
					echo "We have recieved your request. We'll get back soon!";
				} else {
					echo 'Unable to process your request, try again later.';
				}
			}	
			
		}
	}
?>