<?php

include("connect.php");


mysql_query("INSERT INTO admin_panel (product_Id, product_Name) VALUES ('".$_POST['product_Id']."','".$_POST['product_Name']."')");

header("Location: i.php");
mysql_close($dbconnection) ;








?>