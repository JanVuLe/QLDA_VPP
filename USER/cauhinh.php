<?php
	header("Content-type: text/html; charset=utf-8");
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "vanphongpham";	
	
	$connect = new mysqli($servername, $username, $password, $dbname);	
	mysqli_set_charset($connect, 'UTF8');
	//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
	if ($connect->connect_error) {
	    die("Không kết nối :" . $conn->connect_error);
	    exit();
	}	
?>