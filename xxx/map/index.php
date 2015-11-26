<?php
	include "connect.php";
	require ('core.inc.php');
	if((isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))||(isset($_COOKIE['user_id'])&&!empty($_COOKIE['user_id']))){
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
</head>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<body>

	<div id="map-canvas"></div>
	<script src="js/jquery.min.js"></script>
	<script src="js/script.js"></script>

</body>
</html>
<?php
} else {
	echo 'You are not registered, kindly log in and then continue';
}

?>