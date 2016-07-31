<?php
	if(isset($_POST['file_name'])&&!empty($_POST['file_name'])){
		$file_name = $_POST['file_name'];
		$file_path = 'files/'.$file_name;
		if(!file_exists($file_path)){
			die("Error: The file does not exist !");
		} else {			
			header("Cache-Control: public");
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=$file_path");
			header('Content-Type: application/pdf');
			header("Content-Transfer-Encoding: binary");
			readfile($file_path);
		}
	}
?>
