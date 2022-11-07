<?php require '../db.php';
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST') {
 $address   	= $_POST['address'];
 $phone   		= $_POST['phone'];
 $email   		= $_POST['email'];
 $description  	= $_POST['description'];
 $link1   		= $_POST['link1'];
 $link2   		= $_POST['link2'];
 $link3   		= $_POST['link3'];
 $link4   		= $_POST['link4'];
 $name1   		= $_POST['name1'];
 $name2   		= $_POST['name2'];
 $name3   		= $_POST['name3'];
 $name4   		= $_POST['name4'];
 $icon1   		= $_POST['icon1'];
 $icon2   		= $_POST['icon2'];
 $icon3   		= $_POST['icon3'];
 $icon4   		= $_POST['icon4'];
 $id        	= $_POST['id'];

 $update      = "UPDATE footer_section SET address = '$address', phone = '$phone', email = '$email', description = '$description', link1 = '$link1', link2  = '$link2',  link3 = '$link3', link4  = '$link4', name1 = '$name1', name2  = '$name2',  name3 = '$name3', name4  = '$name4', icon1 = '$icon1', icon2  = '$icon2',  icon3 = '$icon3', icon4  = '$icon4' WHERE id = $id";
 $update_query = mysqli_query($db, $update);

 if ($update_query) {
   $_SESSION['update'] = 'Footer Section Updeted';
   header('location:footer_section.php');
 }else{
  $_SESSION['warning'] = 'Footer Section Updated wrong';
  header('location:footer_section.php');
 }
}else{
  echo "Something was wrong";
}

?>