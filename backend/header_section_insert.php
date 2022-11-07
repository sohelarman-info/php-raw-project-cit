<?php require '../db.php';
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST') {
 $section_1   = $_POST['section_1'];
 $section_2   = $_POST['section_2'];
 $section_3   = $_POST['section_3'];
 $section_4   = $_POST['section_4'];
 $section_5   = $_POST['section_5'];
 $phone1      = $_POST['phone1'];
 $call_today  = $_POST['call_today'];


 $insert      = "INSERT INTO header_section(section_1, section_2, section_3, section_4, section_5, call_today, phone1) VALUES('$section_1','$section_2','$section_3','$section_4','$section_5', '$phone1','$call_today')";
 $insert_q    = mysqli_query($db, $insert);
 if ($insert_q) {
   $_SESSION['insert'] = 'Field Inserted';
   header('location:header_section.php');
 }else{
  $_SESSION['warning'] = 'Field Inserted Wrong';
  header('location:header_section.php');
 }
}else{
  echo "Something was wrong";
}

?>