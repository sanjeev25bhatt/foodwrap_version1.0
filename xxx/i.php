<!DOCTYPE HTML>
<html>
<head>
<title>Index</title>
</head>
<body>

<?php
include("connect.php");
 $result = mysql_query("SELECT * FROM admin_panel") or die(mysql_error());
 echo '<h1>table display here</h1>';
 echo '<table name="product_Name" id="something">';
 echo '<th>product ID</th><th>product Name</th>';
 while($row = mysql_fetch_array($result)) {
	 echo '<tr><td>';
	 
	 echo $row['product_ID'];
	 echo '</td><td>';
	 echo $row['product_Name'];
	 echo '</td></tr>';
	 
	 echo '</table>';
 }

?>





</body>
</html>