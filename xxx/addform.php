<?php

if($_POST['submit']=="Submit")
{
	$email = cleanData($_POST['email']);
	$first = cleanData($_POST['first']);
	$last = cleanData($_POST['last']);
	$mobile = cleanData($_POST['mobile']);
	$image = cleanData($_POST['image']);
	//print "Data cleaned";
	addData($email, $first, $last, $mobile, $image);
}
else
{
printForm();
}
function claenData($data){
	
	 $data = trim($data);
	 $data = stripslashes($data);
	 $data = htmlspecialchars($data);
	 $data = strip_tags($data);
	 return $data;
}

function addData($email, $first, $last, $mobile, $image)
{
//print "ready to add data";
include("mili.php")	;
}
function printForm(){
 //displays the html form
 $pageTitle = "Add a Contact"; 
 include("header.php");
 print <<<HERE
  <h2>Add a Contact</h2>
  <form id = "myForm" method="POSt">
 
  
   <div> 
    <label for="email">Email :</label>
	<input type= "name="email" id="email" required="required">
  </div>
  
   <div> 
    <label for="first">First Name :</label>
	<input type= "name="first" id="first" required="required">
  </div>
  
   <div> 
    <label for="last">Last Name :</label>
	<input type= "name="last" id="last" required="required">
  </div>
  
   <div> 
    <label for="mobile">Mobile No:</label>
	<input type= "name="mobile" id="mobile"required="required">
  </div>
	
	<div> 
    <label for="image">image :</label>
	<input type= "text" name="image id="image">
	</div>
	
	<div id= "mySubmit">
	  <input type="submit" name="submit value="Submit">
	  </div>
	  
	</form>
	
HERE;
	
	
}