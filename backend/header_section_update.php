<?php require '../db.php';
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST') {
 $section_1   = $_POST['section_1'];
 $section_2   = $_POST['section_2'];
 $section_3   = $_POST['section_3'];
 $section_4   = $_POST['section_4'];
 $section_5   = $_POST['section_5'];
 $call_today  = $_POST['call_today'];
 $phone1      = $_POST['phone1'];
 $id          = $_POST['id'];

 $update      = "UPDATE header_section SET section_1 = '$section_1', section_2 = '$section_2', section_3 = '$section_3', section_4 = '$section_4', section_5 = '$section_5', call_today = '$call_today', phone1 = '$phone1' WHERE id = $id";
 $update_query = mysqli_query($db, $update);

 if ($update_query) {
   $_SESSION['update'] = 'Header Section Updeted';
   header('location:header_section.php');
 }else{
  $_SESSION['warning'] = 'Header Section Updated wrong';
  header('location:header_section.php');
 }
}else{
  echo "Something was wrong";
}

?>