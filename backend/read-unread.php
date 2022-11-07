<?php 
require '../db.php';
$id = $_GET['id'];

$select = "SELECT * FROM contact_message WHERE id = $id";
$query 	= mysqli_query($db, $select);
$assoc 	= mysqli_fetch_assoc($query);
$status = $assoc['status'];
if ($status == 1) {
	$update = "UPDATE contact_message SET status = 2 WHERE id = $id";
	$update_q = mysqli_query($db, $update);
}else{
	$update = "UPDATE contact_message SET status = 1 WHERE id = $id";
	$update_q = mysqli_query($db, $update);
}
header('location:mailbox.php');
 ?>

