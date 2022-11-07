<?php  
session_start();
require '../db.php';
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $title          = $_POST['title'];
   $summary          = $_POST['summary'];
   $upload_images = $_FILES['logo'];
   $explode       = explode('.', $upload_images['name']);
   $ext           = end($explode);
   $allow_format  = ['JPG','jpg','PNG','png','JPEG','jpeg','GIF','gif','psd','ai'];
   if (in_array($ext, $allow_format)) {
     if ($upload_images['size'] <= 999999) {
       $insert    = "INSERT INTO services(title, summary) VALUES ('$title','$summary')";
       $insert_query     = mysqli_query($db, $insert);
       $last_id   = mysqli_insert_id($db);
       $image_name   = $last_id.'.'.$ext;
       $new_location = '../upload/services/'.$image_name;
       move_uploaded_file($upload_images['tmp_name'], $new_location);
       $update    = "UPDATE services SET image = '$image_name' WHERE id = $last_id";
       $query     = mysqli_query($db, $update);

      if ($insert_query) {
      	$_SESSION['insert'] = 'Add your services successfully.';
      	header('location:services-list.php');
      }
     }else{
      echo "Images size to long!";
     }
   }else{
    echo "Not Allow";
   }
 }

 ?>