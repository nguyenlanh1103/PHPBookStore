<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "quanlysach"; 

	//Tạo kết nối
	$conn = new mysqli($servername, $username, $password, $dbname);
	//Kiểm tra kết nối
	if (mysqli_connect_error()) {
		die("Database connection failed: " . mysqli_connect_error());
	}
?>