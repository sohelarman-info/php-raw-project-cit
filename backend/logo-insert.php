<?php  
session_start();
require '../db.php';
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $text          = $_POST['text'];
   $upload_images = $_FILES['logo'];
   $explode       = explode('.', $upload_images['name']);
   $ext           = end($explode);
   $allow_format  = ['JPG','jpg','PNG','png','JPEG','jpeg','GIF','gif','psd','ai'];
   if (in_array($ext, $allow_format)) {
     if ($upload_images['size'] <= 999999) {
       $insert    = "INSERT INTO `settings`(`text_logo`) VALUES ('$text')";
       $insert_query     = mysqli_query($db, $insert);
       $last_id   = mysqli_insert_id($db);
       $image_name   = $last_id.'.'.$ext;
       $new_location = '../upload/logo/'.$image_name;
       move_uploaded_file($upload_images['tmp_name'], $new_location);
       $update    = "UPDATE settings SET logo = '$image_name' WHERE id = $last_id";
       $query     = mysqli_query($db, $update);

      if ($insert_query) {
      	$_SESSION['insert'] = 'Logo Inserted successfully.';
      	header('location:logo.php');
      }
     }else{
      echo "Images size to long!";
     }
   }else{
    echo "Not Allow";
   }
 }

 ?>