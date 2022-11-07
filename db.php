<?php 
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'esweb2001');
	$db = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

	//Database Check

/*
	if ($db) {
		echo "Connected";
	}else{
		echo "Error";
	}
	*/
 ?>
<!-- 
 <?php
$servername = "localhost";
$username 	= "username";
$password 	= "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
 -->