<?php require '../db.php';
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST') {
 $address   	= $_POST['address'];
 $phone   		= $_POST['phone'];
 $email   		= $_POST['email'];
 $description   = $_POST['description'];


 $insert      = "INSERT INTO footer_section(address, phone, email, description) VALUES('$address','$phone','$email', '$description')";
 $insert_q    = mysqli_query($db, $insert);
 if ($insert_q) {
   $_SESSION['insert'] = 'Footer Inserted';
   header('location:footer_section.php');
 }else{
  $_SESSION['warning'] = 'Footer Inserted Wrong';
  header('location:footer_section.php');
 }
}else{
  echo "Something was wrong";
}

?>