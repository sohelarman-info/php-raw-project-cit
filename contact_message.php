<?php 
require 'db.php' ;
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name 		= $_POST['name'];
	$email 		= $_POST['email'];
	$message 	= $_POST['message'];

	//Query
	$insert 	= "INSERT INTO contact_message(name, email,message) VALUES('$name', '$email','$message')";
	$int_query 	= mysqli_query($db, $insert);
	if ($int_query) {
		if (empty($int_query)) {
			echo "Message empty";
		}else{
			echo "Message send successfully";
		}
	}else{
		$_SESSION['wrong'] = "<div style='color:red'>Something was wrong</div>";
		header('location:index.php#contact');
	}
}
?>
